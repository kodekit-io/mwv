<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
use GuzzleHttp\Client;
use App\ApiService;

Route::get('/', function () {
    return redirect('/dashboard');
});

Route::get('/login', 'ApiAuthController@getLogin');
Route::post('/login', 'ApiAuthController@postLogin');
Route::post('/logout', 'ApiAuthController@logout');
Route::get('/logout', 'ApiAuthController@logout');


Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', 'DashboardController@index');
    Route::get('/project-management', 'ProjectController@index');
    Route::get('/create-project', 'ProjectController@add');
    Route::get('/create-project-ig', 'ProjectController@addig');
    Route::post('/save-project', 'ProjectController@saveProject');
    Route::get('/project-detail/{pid}', 'ProjectController@detail');
    Route::get('/project-detail-twitter/{pid}', 'ProjectController@detailTwitter');
    Route::get('/report-add', 'ProjectController@reportAdd');
    Route::get('/report-view', 'ProjectController@reportView');

    Route::get('/chart-1/{pid}', 'ChartController@chartOne');
});

Route::get('/datatable', function() {
    return view('datatable');
});

Route::get( '/apiclient', function() {

    $client = new Client();
    $service = new ApiService();

    $params = [
        'appkey' => config('services.mediawave.app_key'),
        'username'  => 'nanang',
        'password'  => 'omnanang'
    ];

    $response = $service->post('auth/login', $params);

    $body = json_decode($response->getBody());
    // print_r($body);

    $authToken = $body->token;
    $response2 = $client->post('http://103.28.15.104:8821/api_2.9/dashboard/analytics/charts', [
        'form_params' => [
            'auth_token'    => $authToken,
            'widgetID'      => '1,2,3,4',
            'pid'           => '1715362982016',
            'StartDate'     => '2016-07-01',
            'EndDate'       => '2016-07-30',
            'sentiment'     => '1,0,-1'
        ]
    ]);

    echo $response2->getBody();

});
