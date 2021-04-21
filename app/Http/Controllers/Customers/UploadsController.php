<?php

namespace App\Http\Controllers\Customers;

 
use Flash;
use App\Models\User;
use App\Models\Project;
use App\Models\UserProject;
use App\Models\UserUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use App\Repositories\UploadRepository;
use App\Repositories\ProjectRepository;
use Illuminate\Support\Facades\Response;
use App\Repositories\PrivilegeRepository;
use App\Repositories\CustomFieldRepository;
use Prettus\Validator\Exceptions\ValidatorException;

class UploadsController extends Controller
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

    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * @var PrivilegeRepository
     */
    private $privilegeRepo;


    public function __construct(ProjectRepository $projectRepo, CustomFieldRepository $customFieldRepo, UploadRepository $uploadRepo, UserRepository $userRepo, PrivilegeRepository $privilegeRepo)
    {
        parent::__construct();
        $this->projectRepository = $projectRepo;
        $this->customFieldRepository = $customFieldRepo;
        $this->uploadRepository = $uploadRepo;
        $this->userRepository = $userRepo;
        $this->privilegeRepository = $privilegeRepo;
    }

   
    public function share($token)
    {   
        $privileges = $this->privilegeRepository->myPrivileges();
        $privileges->prepend('' , '');
        $privileges = $privileges->pluck('title','id');
        $upload = $this->uploadRepository->myUpload($token);
        $project = $this->projectRepository->findWithoutToken($upload->project->token);
        $shares = $this->uploadRepository->myTeamsUploads($upload->id);

        $users = $this->projectRepository->myTeamsProject($project);
        $users->prepend('' , '');
        $users = $users->pluck('email','id');

        return view('customers.views.uploads.index')->with("customFields", isset($html) ? $html : false)->with('shares', $shares)->with('project', $project)->with('upload', $upload);

    }

    public function create($token)
    {
        $privileges = $this->privilegeRepository->myPrivileges();
        $privileges->prepend('' , '');
        $privileges = $privileges->pluck('title','id');
        $upload = $this->uploadRepository->myUpload($token);
        $project = $this->projectRepository->findWithoutToken($upload->project->token);;
        $shares = $this->uploadRepository->myTeamsUploads($upload->id);
        
        $users = $this->projectRepository->myTeam($project);
        $users->prepend('' , '');
        $users = $users->pluck('email','id');
        
        return view('customers.views.uploads.create')->with("customFields", isset($html) ? $html : false)->with('project', $project)->with('users', $users)->with('upload', $upload)->with('shares', $shares)->with('privileges', $privileges);
    }

    public function store(Request $request)
    {
        $share = new UserUpload;;
        $share->project_id = $request->project;
        $share->upload_id = $request->upload;
        $share->privilege_id = $request->privilege;
        $share->user_id = $request->user;
        $share->save();

        return redirect(route('customers.uploads.share', $request->upload));
    }


    public function edit($token)
    {
        $team = UserProject::find($token);
        $user = $team->user;
        $privilege = $team->privilege->id;
        $project = $team->project;
        
        $privileges = $this->privilegeRepository->myPrivileges();
        $privileges->prepend('' , '');
        $privileges = $privileges->pluck('title','id');
        
        
        return view('customers.views.teams.edit')->with("customFields", isset($html) ? $html : false)->with('project', $project)->with('privilege', $privilege)->with('team', $team)->with('user', $user) ->with('privileges', $privileges);   
    }

    public function update(Request $request)
    {
        
        $team = UserProject::find($request->team);
        $team->privilege_id = $request->privilege;
        $team->save();

        return redirect(route('customers.projects.teams', $request->project));
    }

 
    public function destroy($token,$project)
    {
        $team = UserProject::find($token);
        $team->delete();

        return redirect(route('customers.projects.teams', $project));
    }

}
