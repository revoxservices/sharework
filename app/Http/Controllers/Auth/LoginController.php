<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Repositories\UploadRepository;
use App\Repositories\UserRepository;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;
use Prettus\Validator\Exceptions\ValidatorException;



class LoginController extends Controller
{
   
    use AuthenticatesUsers;

    protected $redirectTo = '/';
    private $userRepository;
    private $uploadRepository;

    public function __construct(UserRepository $userRepository, UploadRepository $uploadRepository)
    {
        //$this->middleware('guest')->except('logout');
        $this->userRepository = $userRepository;
        $this->uploadRepository = $uploadRepository;
    }

   
    public function redirectToProvider($service)
    {
        return null;
    }

 
    public function handleProviderCallback($service)
    {
        
    }

    
    public function showLoginForm()
    {
        $user = User::auth();     
        if($user!=null){

            //return view('auth.login');
            $routes = $user->getRoleNames()[0];

            switch ($routes){
                case 'manager' :
                    return redirect()->route('managers.dashboard')->withErrors(__('auth.not_authorized'));
                    break;
                case 'customer' :
                    return redirect()->route('customers.dashboard')->withErrors(__('auth.not_authorized'));
                    break;
            }

        }else{
            return view('auth.login');
        }

    }


}
