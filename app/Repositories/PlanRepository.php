<?php

namespace App\Repositories;

use App\Models\Plan;
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
class PlanRepository extends BaseRepository implements CacheableInterface
{

    use CacheableRepository;
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'description',
        'address',
        'latitude',
        'longitude',
        'phone',
        'mobile',
        'information',
        'delivery_fee',
        'default_tax',
        'delivery_range',
        'available_for_delivery',
        'closed',
        'admin_commission',
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Plan::class;
    }

    /**
     * get my restaurants
     */

    public function allPlans()
    {
        return Plan::get();
    }

    public function myPlans()
    {
        return Plan::join("user_Plans", "Plan_id", "=", "Plans.id")
            ->where('user_Plans.user_id', auth()->id())->get();
    }

    
    public function myTeamsPlans($plan)
    {
        return Plan::join("user_Plans", "Plan_id", "=", "Plans.id")
            ->join("users", "user_Plans.user_id", "=", "users.id")
            ->where('plan.id', $plan->id)
            ->where('plan.status','=','1')->get();
    }

     /**
     * Scope a query to order posts by latest posted
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function findWithoutToken($token)
    {
        return Plan::where('token', $token)->first();
    }


}
