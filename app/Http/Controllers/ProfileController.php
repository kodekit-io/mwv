<?php

namespace App\Http\Controllers;

use App\ProfileService;
use Illuminate\Http\Request;

use App\Http\Requests;

class ProfileController extends Controller
{
    /**
     * @var ProfileService
     */
    private $profileService;


    /**
     * ProfileController constructor.
     */
    public function __construct(ProfileService $profileService)
    {
        $this->profileService = $profileService;
    }

    public function profile()
    {
        $profiles = $this->profileService->getProfile();

        $data['userProfile'] = $profiles['user'];
        $data['socmeds'] = $profiles['socmed'];
        $data['pageTitle'] = 'Profile';

        return view('mediawave.profile', $data);
    }
}
