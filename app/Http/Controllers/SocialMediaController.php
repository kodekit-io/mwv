<?php

namespace App\Http\Controllers;

use App\ChartService;
use App\KeywordSelected;
use App\ProfileService;
use App\ProjectService;
use App\SocmedRequestParser;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;

class SocialMediaController extends Controller
{
    use KeywordSelected;
    use SocmedRequestParser;

    /**
     * @var ProfileService
     */
    private $profileService;
    /**
     * @var ProjectService
     */
    private $projectService;

    /**
     * SocialMediaController constructor.
     * @param ProjectService $projectService
     * @param ProfileService $profileService
     */
    public function __construct(ProjectService $projectService, ProfileService $profileService)
    {
        $this->profileService = $profileService;
        $this->projectService = $projectService;
    }

    public function twitter(Request $request)
    {
        $data = $this->parseRequest($request, 2);
        $data['pageTitle'] = 'Twitter';

        return view('mediawave.socmed-twitter', $data);
    }

    public function facebook(Request $request)
    {
        $data = $this->parseRequest($request, 1);
        $data['pageTitle'] = 'Facebook';

        return view('mediawave.socmed-facebook', $data);
    }

    public function youtube(Request $request)
    {
        $data = $this->parseRequest($request, 5);
        $data['pageTitle'] = 'Youtube';

        return view('mediawave.socmed-youtube', $data);
    }

    public function instagram(Request $request)
    {
        $data = $this->parseRequest($request, 7);
        $data['pageTitle'] = 'Instagram';

        return view('mediawave.socmed-instagram', $data);
    }

}
