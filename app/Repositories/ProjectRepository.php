<?php

namespace App\Repositories;

use App\Models\Project;
use App\Models\UserProject;
use InfyOm\Generator\Common\BaseRepository;
use Prettus\Repository\Contracts\CacheableInterface;
use Prettus\Repository\Traits\CacheableRepository;
/**
 * Class RestaurantRepository
 * @package App\Repositories
 * @version August 29, 2019, 9:38 pm UTC
 *
 * @method Restaurant findWithoutFail($id, $columns = ['*'])
 * @method Restaurant find($id, $columns = ['*'])
 * @method Restaurant first($columns = ['*'])
 */
class ProjectRepository extends BaseRepository implements CacheableInterface
{
    use CacheableRepository;
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'token',
        'title',
        'subtitle',
        'description',
        'status',
        'user_id',
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Project::class;
    }

    /**
     * get my restaurants
     */

    public function myProjects()
    {
        return Project::join("user_projects", "project_id", "=", "projects.id")
            ->where('user_projects.user_id', auth()->id())->get();
    }

    
    public function myTeamsProject($project)
    {
        return Project::join("user_projects", "project_id", "=", "projects.id")
            ->join("users", "user_projects.user_id", "=", "users.id")
            ->where('projects.id', $project->id)
            ->where('projects.status','=','1')
            ->select( 
                'users.firstname',
                'users.lastname',
                'users.email',
                'user_projects.privilege_id',
                'user_projects.id'
             )->get();
    }

    
    public function myTeamsProjects($project)
    {
        return Project::join("user_projects", "project_id", "=", "projects.id")
            ->join("users", "user_projects.user_id", "=", "users.id")
            ->where('projects.id', $project->id)
            ->where('projects.status','=','1')->get();
    }

    public function myTeam($project)
    {
        return Project::join("user_projects", "project_id", "=", "projects.id")
            ->join("users", "user_projects.user_id", "=", "users.id")
            ->where('projects.id', $project->id)->get();
    }


     /**
     * Scope a query to order posts by latest posted
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function findWithoutId($id)
    {
        return Project::where('id', $id)->first();
    }

     /**
     * Scope a query to order posts by latest posted
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function findWithoutToken($token)
    {
        return Project::where('token', $token)->first();
    }

     /**
     * Scope a query to order posts by latest posted
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function findWithoutPrivilege($user , $project)
    {
        return UserProject::where("user_id", '=', $user)->where("project_id", '=', $project)->first();
    }


}
