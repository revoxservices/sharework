<?php
/**
 * File name: RestaurantsOfUserCriteria.php
 * Last modified: 2020.04.30 at 08:24:08
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2020
 *
 */

namespace App\Criteria\Projects;

use App\Models\User;
use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class RestaurantsOfUserCriteria.
 *
 * @package namespace App\Criteria\Restaurants;
 */
class RestaurantsOfUserCriteria implements CriteriaInterface
{

    /**
     * @var User
     */
    private $userId;

    /**
     * RestaurantsOfUserCriteria constructor.
     */
    public function __construct($userId)
    {
        $this->userId = $userId;
    }

    /**
     * Apply criteria in query repository
     *
     * @param string $model
     * @param RepositoryInterface $repository
     *
     * @return mixed
     */
    public function apply($model, RepositoryInterface $repository)
    {
        if (auth()->user()->hasRole('admin')) {
            return $model;
        }elseif (auth()->user()->hasRole('manager')) {
            return $model->join('user_projects', 'user_projects.user_id', '=', 'users.id')
                ->select('projects.*')
                ->where('user_projects.user_id', $this->userId);
        }elseif (auth()->user()->hasRole('customer')) {
            return $model->join('user_projects', 'user_projects.user_id', '=', 'users.id')
                ->select('projects.*')
                ->where('user_projects.user_id', $this->userId);
        }else {
            return $model;
        }
    }
}
