<?php

namespace App\Repositories;

use App\Models\Subscription;
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
class SubscriptionRepository extends BaseRepository implements CacheableInterface
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
        return Subscription::class;
    }

    public static function findWithoutSubscription(){
        if(auth()->id()!=null){
            $capacitys = Subscription::where('user_id', auth()->id())->first();    

            if($capacitys!=null){
                $capacity = $capacitys->plan->size;
                return  round($capacity/1024 ,2);
            }else{
                return  0;
            }
        }
       
    }
    public static function findSubscription(){
        return Subscription::where('user_id', auth()->id())->first(); 
    }


}
