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
    Route::post('/save-project', 'ProjectController@save');

    Route::get('/project/chart-data/brand-equity', 'ChartController@brandEquityData');

    // Reusable chart
    Route::get('/project/chart-data/reach-trend/{mediaId}', 'ChartController@reachTrendData');
    Route::get('/project/chart-data/buzz-trend/{mediaId}', 'ChartController@buzzTrendData');
    Route::get('/project/chart-data/buzz-pie/{mediaId}', 'ChartController@buzzPieData');
    Route::get('/project/chart-data/interaction-pie/{mediaId}', 'ChartController@interactionPieData');
    Route::get('/project/chart-data/potential-pie/{mediaId}', 'ChartController@potentialPieData');
    Route::get('/project/chart-data/sentiment-bar/{mediaId}', 'ChartController@sentimentBarData');
    Route::get('/project/chart-data/interaction-bar/{mediaId}', 'ChartController@interactionBarData');
    Route::get('/project/chart-data/post-pie/{mediaId}', 'ChartController@postPieData');
    Route::get('/project/chart-data/comment-pie/{mediaId}', 'ChartController@commentPieData');
    Route::get('/project/chart-data/share-pie/{mediaId}', 'ChartController@sharePieData');
    Route::get('/project/chart-data/reach-pie/{mediaId}', 'ChartController@reachPieData');

    Route::get('/project/chart-data/post-trend', 'ChartController@postTrendData');
    Route::get('/project/chart-data/interaction-trend', 'ChartController@interactionTrendData');
    Route::get('/project/chart-data/user-trend', 'ChartController@userTrend');

    Route::get('/project/chart-data/unique-user-pie', 'ChartController@uniqueUserPieData');
    Route::get('/project/chart-data/viral-pie', 'ChartController@viralPieData');
    Route::get('/project/chart-data/like-pie', 'ChartController@likePieData');

    Route::get('/project/chart-data/share-of-media-bar', 'ChartController@shareOfMediaBarData');
    Route::get('/project/chart-data/comment-bar', 'ChartController@commentBarData');

    Route::get('/project/chart-data/convo-twitter', 'ChartController@convoTwitterData');
    Route::get('/project/chart-data/convo-facebook', 'ChartController@convoFacebookData');
    Route::get('/project/chart-data/convo-news', 'ChartController@convoNewsData');
    Route::get('/project/chart-data/convo-forum', 'ChartController@convoForumData');
    Route::get('/project/chart-data/convo-video', 'ChartController@convoVideoData');
    Route::get('/project/chart-data/convo-blog', 'ChartController@convoBlogData');
    Route::get('/project/chart-data/convo-instagram', 'ChartController@convoInstagramData');


    Route::get('/project-detail/{pid}', 'ProjectController@detail');
    Route::post('/project-detail/{pid}', 'ProjectController@detail');
    Route::get('/conversation', 'ProjectController@conversation');

    Route::get('/project-twitter/{pid}', 'ProjectTwitterController@detail');
    Route::get('/project-facebook/{pid}', 'ProjectFacebookController@detail');
    Route::get('/project-news/{pid}', 'ProjectNewsController@detail');
    Route::get('/project-forum/{pid}', 'ProjectController@detailForum');
    Route::get('/project-video/{pid}', 'ProjectController@detailVideo');
    Route::get('/project-blog/{pid}', 'ProjectController@detailBlog');

    Route::get('/project-ig/{pid}', 'ProjectController@detailIG');

    Route::get('/edit-project/{pid}', 'ProjectController@edit');
    Route::get('/profile', 'ProjectController@profile');
    Route::post('/update-project', 'ProjectController@update');
    Route::get('/chart-1/{pid}', 'ChartController@chartOne');

    Route::get('/report-add', 'ReportController@add');
    Route::get('/report-view', 'ReportController@view');
    Route::post('/report-save', 'ReportController@save');
    Route::get('/delete-report/{id}', 'ReportController@delete');

    Route::get('/socmed-twitter', 'ProjectController@socmedTW');
    Route::get('/socmed-facebook', 'ProjectController@socmedFB');
    Route::get('/socmed-youtube', 'ProjectController@socmedYT');
    Route::get('/socmed-instagram', 'ProjectController@socmedIG');

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
