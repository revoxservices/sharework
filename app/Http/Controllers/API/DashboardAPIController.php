<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Prettus\Repository\Exceptions\RepositoryException;

class DashboardAPIController extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function customer($id, Request $request)
    {
        $statistics = [];
        
        try{
       
        } catch (RepositoryException $e) {
            return $this->sendError($e->getMessage());
        }

        return $this->sendResponse($statistics, 'Statistics retrieved successfully');
    }
}
