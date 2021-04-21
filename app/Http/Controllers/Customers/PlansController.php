<?php
/**
 * File name: RestaurantController.php
 * Last modified: 2020.04.30 at 08:21:08
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2020
 *
 */

namespace App\Http\Controllers\Customers;

use App\Http\Controllers\Controller;
use App\Criteria\Restaurants\RestaurantsOfUserCriteria;
use App\Criteria\Users\AdminsCriteria;
use App\Criteria\Users\ClientsCriteria;
use App\Criteria\Users\DriversCriteria;
use App\Criteria\Users\ManagersClientsCriteria;
use App\Criteria\Users\ManagersCriteria;
use App\DataTables\RestaurantDataTable;
use App\DataTables\RequestedRestaurantDataTable;
use App\Events\RestaurantChangedEvent;
use App\Http\Requests\CreateRestaurantRequest;
use App\Http\Requests\UpdateRestaurantRequest;
use App\Repositories\CustomFieldRepository;
use App\Repositories\CuisineRepository;
use App\Repositories\ProjectRepository;
use App\Repositories\UploadRepository;
use App\Repositories\UserRepository;
use Flash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use Prettus\Validator\Exceptions\ValidatorException;


class PlansController extends Controller
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


    public function __construct(ProjectRepository $projectRepo, CustomFieldRepository $customFieldRepo, UploadRepository $uploadRepo, UserRepository $userRepo)
    {
        parent::__construct();
        $this->projectRepository = $projectRepo;
        $this->customFieldRepository = $customFieldRepo;
        $this->uploadRepository = $uploadRepo;
        $this->userRepository = $userRepo;
    }

    /**
     * Display a listing of the Restaurant.
     *
     * @param RestaurantDataTable $restaurantDataTable
     * @return Response
     */
    public function index()
    {
        return view('customers.views.plans.index')->with("customFields", isset($html) ? $html : false);
    }

    /**
     * Display a listing of the Restaurant.
     *
     * @param RestaurantDataTable $restaurantDataTable
     * @return Response
     */
    public function files()
    {   
        return view('customers.views.plans.files')->with("customFields", isset($html) ? $html : false);
    }


    public function requestedRestaurants(Request $requestedRestaurantDataTable)
    {
        return $requestedRestaurantDataTable->render('restaurants.requested');
    }

    public function create(){

        /*
                $user = $this->userRepository->getByCriteria(new ManagersCriteria())->pluck('name', 'id');
                $drivers = $this->userRepository->getByCriteria(new DriversCriteria())->pluck('name', 'id');
                $cuisine = $this->cuisineRepository->pluck('name', 'id');
                $usersSelected = [];
                $driversSelected = [];
                $cuisinesSelected = [];
                $hasCustomField = in_array($this->restaurantRepository->model(), setting('custom_field_models', []));
                if ($hasCustomField) {
                    $customFields = $this->customFieldRepository->findByField('custom_field_model', $this->restaurantRepository->model());
                    $html = generateCustomField($customFields);
                }
        */
        return view('customers.views.plans.create')->with("customFields", isset($html) ? $html : false);
    }

    public function store(Request $request){
        $input = $request->all();
        if (auth()->user()->hasRole(['manager','client'])) {
            $input['users'] = [auth()->id()];
        }
        $customFields = $this->customFieldRepository->findByField('custom_field_model', $this->restaurantRepository->model());
        try {
            $restaurant = $this->restaurantRepository->create($input);
            $restaurant->customFieldsValues()->createMany(getCustomFieldsValues($customFields, $request));
            if (isset($input['image']) && $input['image']) {
                $cacheUpload = $this->uploadRepository->getByUuid($input['image']);
                $mediaItem = $cacheUpload->getMedia('image')->first();
                $mediaItem->copy($restaurant, 'image');
            }
        } catch (ValidatorException $e) {
            Flash::error($e->getMessage());
        }

        Flash::success(__('lang.saved_successfully', ['operator' => __('lang.restaurant')]));

        return redirect(route('restaurants.index'));
    }

    /**
     * Display the specified Restaurant.
     *
     * @param int $id
     *
     * @return Response
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function show($id)
    {
        $this->restaurantRepository->pushCriteria();
        $restaurant = $this->restaurantRepository->findWithoutFail($id);

        if (empty($restaurant)) {
            Flash::error('Restaurant not found');

            return redirect(route('restaurants.index'));
        }

        return view('restaurants.show')->with('restaurant', $restaurant);
    }

    public function edit($id)
    {
        /*
        $this->restaurantRepository->pushCriteria(new RestaurantsOfUserCriteria(auth()->id()));
        $restaurant = $this->restaurantRepository->findWithoutFail($id);

        if (empty($restaurant)) {
            Flash::error(__('lang.not_found', ['operator' => __('lang.restaurant')]));
            return redirect(route('restaurants.index'));
        }
        if($restaurant['active'] == 0){
            $user = $this->userRepository->getByCriteria(new ManagersClientsCriteria())->pluck('name', 'id');
        } else {
        $user = $this->userRepository->getByCriteria(new ManagersCriteria())->pluck('name', 'id');
        }
        $drivers = $this->userRepository->getByCriteria(new DriversCriteria())->pluck('name', 'id');
        $cuisine = $this->cuisineRepository->pluck('name', 'id');


        $usersSelected = $restaurant->users()->pluck('users.id')->toArray();
        $driversSelected = $restaurant->drivers()->pluck('users.id')->toArray();
        $cuisinesSelected = $restaurant->cuisines()->pluck('cuisines.id')->toArray();

        $customFieldsValues = $restaurant->customFieldsValues()->with('customField')->get();
        $customFields = $this->customFieldRepository->findByField('custom_field_model', $this->restaurantRepository->model());
        $hasCustomField = in_array($this->restaurantRepository->model(), setting('custom_field_models', []));
        if ($hasCustomField) {
            $html = generateCustomField($customFields, $customFieldsValues);
        }*/

        return view('customers.views.plans.edit')->with("customFields", isset($html) ? $html : false);        
    }

    
    public function update($id, Request $request){

        $this->restaurantRepository->pushCriteria();
        $oldRestaurant = $this->restaurantRepository->findWithoutFail($id);

        if (empty($oldRestaurant)) {
            Flash::error('Restaurant not found');
            return redirect(route('restaurants.index'));
        }
        $input = $request->all();
        $customFields = $this->customFieldRepository->findByField('custom_field_model', $this->restaurantRepository->model());
        try {

            $restaurant = $this->restaurantRepository->update($input, $id);
            if (isset($input['image']) && $input['image']) {
                $cacheUpload = $this->uploadRepository->getByUuid($input['image']);
                $mediaItem = $cacheUpload->getMedia('image')->first();
                $mediaItem->copy($restaurant, 'image');
            }
            foreach (getCustomFieldsValues($customFields, $request) as $value) {
                $restaurant->customFieldsValues()
                    ->updateOrCreate(['custom_field_id' => $value['custom_field_id']], $value);
            }
            event(new RestaurantChangedEvent($restaurant, $oldRestaurant));
        } catch (ValidatorException $e) {
            Flash::error($e->getMessage());
        }

        Flash::success(__('lang.updated_successfully', ['operator' => __('lang.restaurant')]));

        return redirect(route('restaurants.index'));
    }

    
    public function destroy($id)
    {
        if (!env('APP_DEMO', false)) {
            $this->restaurantRepository->pushCriteria(new RestaurantsOfUserCriteria(auth()->id()));
            $restaurant = $this->restaurantRepository->findWithoutFail($id);

            if (empty($restaurant)) {
                Flash::error('Restaurant not found');

                return redirect(route('restaurants.index'));
            }

            $this->restaurantRepository->delete($id);

            Flash::success(__('lang.deleted_successfully', ['operator' => __('lang.restaurant')]));
        } else {
            Flash::warning('This is only demo app you can\'t change this section ');
        }
        return redirect(route('restaurants.index'));
    }

    public function removeMedia(Request $request){
        $input = $request->all();
        $restaurant = $this->restaurantRepository->findWithoutFail($input['id']);
        try {
            if ($restaurant->hasMedia($input['collection'])) {
                $restaurant->getFirstMedia($input['collection'])->delete();
            }
        } catch (\Exception $e) {
            Log::error($e->getMessage());
        }
    }
    
}
