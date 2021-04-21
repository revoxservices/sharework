<?php


namespace App\Http\Controllers\Customers;

use App\Http\Controllers\Controller;

class DashboardController extends Controller {


    public function index(){

        $user = auth()->user();
        
        return view('customers.views.dashboard.index')->with("user", $user);

    }



}
