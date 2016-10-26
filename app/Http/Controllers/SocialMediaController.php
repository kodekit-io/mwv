<?php

namespace App\Http\Controllers;

use App\ChartService;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;

class SocialMediaController extends Controller
{
    /**
     * @var ChartService
     */
    private $chartService;

    /**
     * SocialMediaController constructor.
     * @param ChartService $chartService
     */
    public function __construct(ChartService $chartService)
    {
        $this->chartService = $chartService;
    }

    public function twitter(Request $request)
    {
        $brands = '';
        $last7DaysRange = $this->chartService->getLastSevenDaysRange();
        $startDate = $last7DaysRange['startDate'];
        $endDate = $last7DaysRange['endDate'];
        if ($request->has('filter')) {
            $startDate = $request->input('start_date');
            $endDate = $request->input('end_date');
            $startDate = ( $startDate != '' ) ? Carbon::createFromFormat('d/m/y', $startDate)->format('Y-m-d') : null;
            $endDate = ( $endDate != '' ) ? Carbon::createFromFormat('d/m/y', $endDate)->format('Y-m-d') : null;
            $brands = ( $request->has('keywords') ? implode(',', $request->input('keywords')) : '' );
        }

        $data['pageTitle'] = 'Twitter';
        $data['startDate'] = Carbon::createFromFormat('Y-m-d', $startDate)->format('d/m/y');
        $data['endDate'] = Carbon::createFromFormat('Y-m-d', $endDate)->format('d/m/y');;

        return view('mediawave.socmed-twitter', $data);
    }

    public function facebook()
    {

    }

    public function youtube()
    {

    }

    public function instagram()
    {

    }


}
