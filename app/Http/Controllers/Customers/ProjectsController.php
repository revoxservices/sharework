<?php

namespace App\Http\Controllers\Customers;

use App\Http\Controllers\Controller;
use App\Repositories\CustomFieldRepository;
use App\Repositories\ProjectRepository;
use App\Repositories\UploadRepository;
use App\Repositories\UserRepository;
use App\Repositories\PrivilegeRepository;

use Flash;
use App\Models\UserProject;
use App\Models\Project;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use Prettus\Validator\Exceptions\ValidatorException;

class ProjectsController extends Controller
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

    public function index()
    {
        $projects = $this->projectRepository->myProjects();
        return view('customers.views.projects.index')->with("customFields", isset($html) ? $html : false)->with('projects', $projects);
    }
    
    public function view($token)
    {   
        $project = $this->projectRepository->findWithoutToken($token);
        $uploads = $this->uploadRepository->outUploads($project->id); 
        $teams = $this->projectRepository->myTeamsProjects($project);

        return view('customers.views.projects.view')->with("customFields", isset($html) ? $html : false)->with('project', $project)->with('uploads', $uploads)->with('teams', $teams);

    }


    public function files($token){   

        $project = $this->projectRepository->findWithoutToken($token);
        $privilege = $this->projectRepository->findWithoutPrivilege(auth()->id(), $project->id);
        $uploads = $this->uploadRepository->myUploads($project->id , auth()->id()); 
        $shares = $this->uploadRepository->myShares($project->id , auth()->id()); 

        return view('customers.views.projects.files')->with("customFields", isset($html) ? $html : false)
        ->with('privilege', $privilege)
        ->with('project', $project)
        ->with('shares', $shares)
        ->with('uploads', $uploads);
    }


    public function create()
    {
        return view('customers.views.projects.create')->with("customFields", isset($html) ? $html : false);
    }


    public function store(Request $request)
    {
        $project = new Project;
        $project->user_id = auth()->id();
        $project->token = Project::generate();
        $project->title = $request->title;
        $project->subtitle = $request->subtitle;
        $project->description = $request->description;

        if($request->status == "on"){
            $project->status = 1;
        }else{
            $project->status = 0;
        }
        
        $project->save();
        
        $conect = new UserProject;
        $conect->user_id = auth()->id();
        $conect->project_id = $project->id;
        $conect->privilege_id = 1;
        $conect->save();

        return redirect(route('customers.projects'));
    }


    
    public function storeTeam(Request $request)
    {
        

        return true;

    }

    public function edit($token)
    {
        $project = Project::find($token);
        
        return view('customers.views.projects.edit')->with("customFields", isset($html) ? $html : false)->with('project', $project);   
    }

    public function update(Request $request)
    {
        $project = $this->projectRepository->findWithoutToken($request->token);
        $project->title = $request->title;
        $project->subtitle = $request->subtitle;
        $project->description = $request->description;

        if($request->status == "on"){
            $project->status = 1;
        }else{
            $project->status = 0;
        }
        
        $project->save();

        return redirect(route('customers.projects'));
    }

 
    public function destroy($token)
    {
        $project = $this->projectRepository->findWithoutToken($token);

        $this->projectRepository->delete($project->id);

        return redirect(route('customers.projects'));
    }

}
