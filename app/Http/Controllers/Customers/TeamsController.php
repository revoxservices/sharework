<?php

namespace App\Http\Controllers\Customers;

use App\Http\Controllers\Controller;
use App\Repositories\CustomFieldRepository;
use App\Repositories\ProjectRepository;
use App\Repositories\UploadRepository;
use App\Repositories\UserRepository;
use App\Repositories\PrivilegeRepository;

use Flash;
use App\Models\User;
use App\Models\UserProject;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use Prettus\Validator\Exceptions\ValidatorException;

class TeamsController extends Controller
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

   
    public function teams($token)
    {   
        $users = $this->userRepository->myUsers();
        $users->prepend('' , '');
        $users = $users->pluck('email','id');
        $privileges = $this->privilegeRepository->myPrivileges();
        $privileges->prepend('' , '');
        $privileges = $privileges->pluck('title','id');
        $project = $this->projectRepository->findWithoutToken($token);
        $teams = $this->projectRepository->myTeam($project);

        return view('customers.views.teams.index')->with("customFields", isset($html) ? $html : false)->with('teams', $teams)->with('project', $project);

    }

    public function create($token)
    {
        $users = $this->userRepository->myUsers();
        $users->prepend('' , '');
        $users = $users->pluck('email','id');
        $privileges = $this->privilegeRepository->myPrivileges();
        $privileges->prepend('' , '');
        $privileges = $privileges->pluck('title','id');
        $project = $this->projectRepository->findWithoutToken($token);
        $teams = $this->projectRepository->myTeamsProjects($project);
        //dd($users);
        
        return view('customers.views.teams.create')->with("customFields", isset($html) ? $html : false)->with('project', $project)->with('users', $users)->with('teams', $teams)->with('privileges', $privileges);
    }

    public function store(Request $request)
    {
        $conect = new UserProject;
        $conect->user_id = auth()->id();
        $conect->project_id = $request->project;
        $conect->privilege_id = $request->privilege;
        $conect->user_id = $request->user;
        $conect->save();

        return redirect(route('customers.projects'));
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
