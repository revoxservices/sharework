<?php


namespace App\Http\Controllers\Customers;

use App\Models\Media;
use App\Models\UserUpload;
use Illuminate\Http\Request;
use App\Http\Requests\UploadRequest;
use App\Http\Controllers\Controller;
use App\Repositories\UploadRepository;
use App\Repositories\ProjectRepository;
use Illuminate\Support\Facades\Storage;
use App\Repositories\PrivilegeRepository;
use Prettus\Validator\Exceptions\ValidatorException;


class UploadController extends Controller
{

    private $uploadRepository;
    private $projectRepository;

    public function __construct(UploadRepository $uploadRepository,ProjectRepository $projectRepository,PrivilegeRepository $privilegeRepository)
    {
        parent::__construct();
        $this->uploadRepository = $uploadRepository;
        $this->projectRepository = $projectRepository;
        $this->privilegeRepository = $privilegeRepository;

        
    }

    public function index()
    {
        return view('medias.index');
    }

    public function storage($id, $conversion, $filename = null)
    {
        $array = explode('.', $conversion . $filename);
        $extension = strtolower(end($array));
        if (isset($filename)) {
            return response()->file(storage_path('app/public/' . $id . '/' . $conversion . '/' . $filename));
        } else {
            $filename = $conversion;
            return response()->file(storage_path('app/public/' . $id . '/' . $filename));
        }
    }

    public function all(Request $request, $collection = null)
    {
        $allMedias = $this->uploadRepository->allMedia($collection);

        if (!auth()->user()->hasRole('admin')) {
            $allMedias = $allMedias->filter(function ($element) {
                if (isset($element['custom_properties']['user_id'])) {
                    return $element['custom_properties']['user_id'] == auth()->id();
                }
                return false;
            });
        }
        return $allMedias->toJson();
    }


    public function collectionsNames(Request $request)
    {
        $allMedias = $this->uploadRepository->collectionsNames();
        return $this->sendResponse($allMedias, 'Get Collections Successfully');
    }


    public function store(Request $request , $token)
    {   

        $input = $request->all();
        $project = $this->projectRepository->findWithoutToken($token);
        $user  = auth()->id();

        try {
            
            $upload = $this->uploadRepository->created($input, $project->id, $user);
            $media =  $upload->addMedia($input['file'])->withCustomProperties(['user_id' => auth()->id()])->toMediaCollection('downloads', 's3');

            $url = Media::query()->where('model_id', $upload->id)->first();
            $upload->url = $url->getUrl();
            $upload->save();


        } catch (ValidatorException $e) {
            return $this->sendResponse(false, $e->getMessage());
        }
    }

    public function clear(Request $request ,$token){

        if ($request->ajax()) {

            $result = $this->uploadRepository->clearUpload($token);
            
            return $this->sendResponse($result, 'Media deleted successfully');
        }
    }

    public function download($token){
            $upload = $this->uploadRepository->myUpload($token);
            $media = Media::query()->where('model_id', $upload->id)->first();
            return $media->getUrl();
    }

    public function video($token){

        $upload = $this->uploadRepository->myUpload($token);
        $media = Media::query()->where('model_id', $upload->id)->first();
        return $media->getUrl();

    }


    public function image($token){

        $upload = $this->uploadRepository->myUpload($token);
        $media = Media::query()->where('model_id', $upload->id)->first();
        return $media->getUrl();
    }

    
    public function reports(){

        $uploads = $this->uploadRepository->findWithoutUploads();
        
        return view('customers.views.reports.uploads')->with("customFields", isset($html) ? $html : false)->with('uploads', $uploads);

    }

    
    public function uploads(Request $request ,$token){

        if ($request->ajax()) {

            $project = $this->projectRepository->findWithoutToken($token);
            $uploads = $this->uploadRepository->myUploads($project->id, auth()->id()); 
            $privilege = $this->projectRepository->findWithoutPrivilege(auth()->id(), $project->id);
            
            $response = array(
                'uploads' => $uploads,
                'privilege' => $privilege
            );

            return view('customers.partials.sections.files.uploads')->with($response);

        }
    }

    public function shares(Request $request ,$token){

        if ($request->ajax()) {

            $project = $this->projectRepository->findWithoutToken($token);
            $shares = $this->uploadRepository->myShares($project->id, auth()->id()); 
            $privilege = $this->projectRepository->findWithoutPrivilege(auth()->id(), $project->id);
            
            
            $response = array(
                'shares' => $shares,
                'privilege' => $privilege
            );

            return view('customers.partials.sections.files.shares')->with($response);

        }
    }

    public function clearAll()
    {
        $this->uploadRepository->clearAll();
        return redirect()->back();
    }
    

    

    
    public function storeShare(Request $request){

        if ($request->ajax()) {
            
            $share = new UserUpload;;
            $share->project_id = $request->project;
            $share->upload_id = $request->upload;
            $share->privilege_id = $request->privilege;
            $share->user_id = $request->user;
            $share->save();

            return "true";

        }
    }


    public function modalShare(Request $request ,$token){

        if ($request->ajax()) {

            
            $privileges = $this->privilegeRepository->myPrivileges();
            $privileges->prepend('' , '');
            $privileges = $privileges->pluck('title','id');
            $upload = $this->uploadRepository->myUpload($token);
            $project = $this->projectRepository->findWithoutToken($upload->project->token);

            $userProjects = $project->users;            
            $userShares = $upload->share;

            
            $allProjects = collect($userProjects);
            $allShares = collect($userShares);
            $users = $allShares->merge($allProjects);

            $users->values()->all();
            $users->prepend('' , '');
            $shares = $users->pluck('email','id');

            $response = array(
                'project' => $project,
                'privileges' => $privileges,
                'upload' => $upload,
                'shares' => $shares
            );            

            return view('customers.partials.modals.share')->with($response);

        }
    }

    
    public function modalDetails(Request $request ,$token){

        if ($request->ajax()) {

            
            $project = $this->projectRepository->findWithoutToken($token);
            $upload = $this->uploadRepository->myUpload($token);
            
            $response = array(
                'upload' => $upload,
                'project' => $project
            );
            
            return view('customers.partials.modals.details')->with($response);

        }
    }




}

