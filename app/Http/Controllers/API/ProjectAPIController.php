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
use Flash;

class ProjectAPIController extends Controller
{
    /** @var  ProjectRepository */
    private $projectRepository;

    /**
     * @var CustomFieldRepository
     */
    private $customFieldRepository;

    /**
     * @var UploadRepository
     */
    private $uploadRepository;


    public function __construct(ProjectRepository $projectRepo, CustomFieldRepository $customFieldRepo, UploadRepository $uploadRepo)
    {
        parent::__construct();
        $this->projectRepository = $projectRepo;
        $this->customFieldRepository = $customFieldRepo;
        $this->uploadRepository = $uploadRepo;

    }

    public function index(Request $request)
    {
        try{
            $this->projectRepository->pushCriteria(new RequestCriteria($request));
            $this->projectRepository->pushCriteria(new LimitOffsetCriteria($request));
            $this->projectRepository->pushCriteria(new ProjectsOfManagerCriteria(auth()->id()));
            $projects = $this->projectRepository->all();

        } catch (RepositoryException $e) {
            return $this->sendError($e->getMessage());
        }

        return $this->sendResponse($projects->toArray(), 'Projects retrieved successfully');
    }

    public function show(Request $request, $id)
    {
        if (!empty($this->projectRepository)) {
            try{
                $this->projectRepository->pushCriteria(new RequestCriteria($request));
                $this->projectRepository->pushCriteria(new LimitOffsetCriteria($request));
                $this->projectRepository->pushCriteria(new ProjectsOfUploadsCriteria($request));
            } catch (RepositoryException $e) {
                return $this->sendError($e->getMessage());
            }
            $food = $this->projectRepository->findWithoutFail($id);
        }

        if (!empty($this->projectRepository)) {
            $project = $this->projectRepository->findWithoutFail($id);
        }
        
        if (empty($project)) {
            return $this->sendError('Faq not found');
        }

        return $this->sendResponse($project->toArray(), 'Faq retrieved successfully');
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

    public function update($id, Request $request)
    {
        $project = $this->projectRepository->findWithoutFail($id);

        if (empty($project)) {
            return $this->sendError('Project not found');
        }

        $input = $request->all();
        $customFields = $this->customFieldRepository->findByField('custom_field_model', $this->projectRepository->model());

        try {
            
        } catch (ValidatorException $e) {
            return $this->sendError($e->getMessage());
        }

        return $this->sendResponse($project->toArray(),__('lang.updated_successfully', ['operator' => __('lang.restaurant')]));
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
