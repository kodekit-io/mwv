<?php

namespace App\Http\Controllers;

use App\ApiService;
use Illuminate\Http\Request;

use App\Http\Requests;

class DashboardController extends Controller
{
    protected $apiService;

    /**
     * DashboardController constructor.
     * @param $apiService
     */
    public function __construct(ApiService $apiService)
    {
        $this->apiService = $apiService;
    }

    public function index()
    {
        $projects = $this->apiService->projectList();
        $data['projects'] = $projects;
        $data['pageTitle'] = 'Dashboard';

        return view('mediawave.home', $data);
    }


}
