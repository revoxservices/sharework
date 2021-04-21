<?php

namespace App\Http\Controllers\Customers;

use App\Http\Controllers\Controller;
use App\Repositories\PlanRepository;
use App\Repositories\CustomFieldRepository;
use App\Repositories\SubscriptionRepository;
use App\Repositories\UploadRepository;
use App\Repositories\UserRepository;


use App\Models\Subscription;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use Prettus\Validator\Exceptions\ValidatorException;


class SubscriptionsController extends Controller
{
    /** @var  SubscriptionRepository */
    private $subscriptionRepository;

    /**
     * @var CustomFieldRepository
     */
    private $customFieldRepository;

    /**
     * @var UploadRepository
     */
    private $uploadRepository;


    /**
     * @var PlanRepository
     */
    private $planRepository;


    /**
     * @var UserRepository
     */
    private $userRepository;


    public function __construct(PlanRepository  $planRepo, SubscriptionRepository $subscriptionRepo, CustomFieldRepository $customFieldRepo, UploadRepository $uploadRepo, UserRepository $userRepo)
    {
        parent::__construct();
        $this->subscriptionRepository = $subscriptionRepo;
        $this->planRepository = $planRepo;
        $this->customFieldRepository = $customFieldRepo;
        $this->uploadRepository = $uploadRepo;
        $this->userRepository = $userRepo;
    }

    public function index()
    {
        $projects = $this->subscriptionRepository->myProjects();
        return view('customers.views.projects.index')->with("customFields", isset($html) ? $html : false)->with('projects', $projects);
    }

    public function plans()
    {   
        $plans = $this->planRepository->allPlans();
        $sub = $this->subscriptionRepository->findSubscription();
        return view('customers.views.subscriptions.plans')->with("customFields", isset($html) ? $html : false)->with('plans', $plans)->with('sub', $sub);

    }

    public function history()
    {   
        $plans = $this->planRepository->allPlans();
        $sub = $this->subscriptionRepository->findSubscription();
        return view('customers.views.subscriptions.history')->with('plans', $plans)->with('sub', $sub);

    }


    

    public function store(Request $request){


        if ($request->ajax()) {
            
            $user = User::auth();

            $subscription = new Subscription;;
            $subscription->user_id = $user->id;
            $subscription->plan_id = $request->plan;
            $subscription->status = 1;
            $subscription->description = 1;
            $subscription->save();

            return 'true';

        }
    }

}
