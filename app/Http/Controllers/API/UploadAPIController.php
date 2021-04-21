<?php

namespace App\Http\Controllers\API;


use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Exceptions\RepositoryException;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Criteria\Projects\ProjectsOfManagerCriteria;
use App\Criteria\Projects\ProjectsOfUploadsCriteria;
use App\Repositories\CustomFieldRepository;
use App\Repositories\ProjectRepository;
use App\Repositories\UploadRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Upload;
use Flash;

class UploadAPIController extends Controller
{
    /**
     * @var CustomFieldRepository
     */
    private $customFieldRepository;

    /**
     * @var UploadRepository
     */
    private $uploadRepository;


    public function __construct(CustomFieldRepository $customFieldRepo, UploadRepository $uploadRepo)
    {
        parent::__construct();
        $this->customFieldRepository = $customFieldRepo;
        $this->uploadRepository = $uploadRepo;

    }
    public function show(Request $request, $id)
    {
        if (!empty($this->uploadRepository)) {
            try{
                $this->uploadRepository->pushCriteria(new RequestCriteria($request));
                $this->uploadRepository->pushCriteria(new LimitOffsetCriteria($request));
            } catch (RepositoryException $e) {
                return $this->sendError($e->getMessage());
            }
            $upload = $this->uploadRepository->findWithoutFail($id);
        }

        
        if (empty($upload)) {
            return $this->sendError('Faq not found');
        }

        return $this->sendResponse($upload->toArray(), 'Faq retrieved successfully');
    }

    public function uploads(Request $request, $id)
    {   
        /** @var Restaurant $restaurant */
        if (!empty($this->uploadRepository)) {
            try{
                $this->uploadRepository->pushCriteria(new RequestCriteria($request));
                $this->uploadRepository->pushCriteria(new LimitOffsetCriteria($request));               
            } catch (RepositoryException $e) {
                return $this->sendError($e->getMessage());
            }
            $uploads = $this->uploadRepository->outUploads($id);
        }

        if (empty($uploads)) {
            return $this->sendError('Uploads not found');
        }

        return $this->sendResponse($uploads->toArray(), 'Uploads retrieved successfully');
    }

    public function store(Request $request)
    {
        $input = $request->all();

        $customFields = $this->customFieldRepository->findByField('custom_field_model', $this->projectRepository->model());
        
        try {

            $project = $this->projectRepository->create($input);
            $project->customFieldsValues()->createMany(getCustomFieldsValues($customFields, $request));

            if (isset($input['image']) && $input['image']) {
                $cacheUpload = $this->uploadRepository->getByUuid($input['image']);
                $mediaItem = $cacheUpload->getMedia('image')->first();
                $mediaItem->copy($project, 'image');
            }
        } catch (ValidatorException $e) {
            return $this->sendError($e->getMessage());
        }

        return $this->sendResponse($project->toArray(),__('lang.saved_successfully', ['operator' => __('lang.restaurant')]));
    }


    public function destroy($id)
    {
        $project = $this->projectRepository->findWithoutFail($id);

        if (empty($project)) {
            return $this->sendError('Project not found');
        }

        $project = $this->projectRepository->delete($id);

        return $this->sendResponse($project,__('lang.deleted_successfully', ['operator' => __('lang.restaurant')]));
    }


}
