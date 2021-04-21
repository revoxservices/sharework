<?php

namespace App\Criteria\Projects;

use App\Models\User;
use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;
use Illuminate\Support\Facades\DB;

/**
 * Class RestaurantsOfManagerCriteria.
 *
 * @package namespace App\Criteria\Restaurants;
 */
class ProjectsOfManagerCriteria implements CriteriaInterface
{
    /**
     * @var User
     */
    private $userId;

    /**
     * RestaurantsOfManagerCriteria constructor.
     */
    public function __construct($userId)
    {
        $this->userId = $userId;
    }

    /**
     * Apply criteria in query repository
     *
     * @param string              $model
     * @param RepositoryInterface $repository
     *
     * @return mixed
     */
    public function apply($model, RepositoryInterface $repository)
    {

       /*
        return DB::table('projects')->join('user_projects', function($join) {
            $join->on('user_projects.id', '=', 'projects.id');
          })->where('user_projects.user_id',$this->userId);
*/
        
        return $model->where('user_id',$this->userId);    
    }
}

