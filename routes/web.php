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


Route::group(['middleware' => ['auth', 'projects']], function () {
    Route::get('/dashboard', 'DashboardController@index');
    Route::get('/project-management', 'ProjectController@index');
    Route::get('/create-project', 'ProjectController@add');
    Route::get('/create-project-ig', 'ProjectController@addig');
    Route::post('/save-project', 'ProjectController@save');
    Route::get('/delete-project/{pid}', 'ProjectController@delete');

    Route::get('/project/chart-data/brand-equity', 'ChartController@brandEquityData');

    // Reusable chart
    Route::get('/project/chart-data/post-trend/{mediaId}/{type?}', 'ChartController@postTrendData');
    Route::get('/project/chart-data/reach-trend/{mediaId}/{type?}', 'ChartController@reachTrendData');
    Route::get('/project/chart-data/buzz-trend/{mediaId}/{type?}', 'ChartController@buzzTrendData');
    Route::get('/project/chart-data/comment-trend/{mediaId}/{type?}', 'ChartController@commentTrendData');
    Route::get('/project/chart-data/interaction-trend/{media}/{type?}', 'ChartController@interactionTrendData');
    Route::get('/project/chart-data/buzz-pie/{mediaId}/{type?}', 'ChartController@buzzPieData');
    Route::get('/project/chart-data/interaction-pie/{mediaId}/{type?}', 'ChartController@interactionPieData');
    Route::get('/project/chart-data/potential-pie/{mediaId}/{type?}', 'ChartController@potentialPieData');
    Route::get('/project/chart-data/sentiment-bar/{mediaId}/{type?}', 'ChartController@sentimentBarData');
    Route::get('/project/chart-data/interaction-bar/{mediaId}/{type?}', 'ChartController@interactionBarData');
    Route::get('/project/chart-data/post-pie/{mediaId}/{type?}', 'ChartController@postPieData');
    Route::get('/project/chart-data/comment-pie/{mediaId}/{type?}', 'ChartController@commentPieData');
    Route::get('/project/chart-data/share-pie/{mediaId}/{type?}', 'ChartController@sharePieData');
    Route::get('/project/chart-data/reach-pie/{mediaId}/{type?}', 'ChartController@reachPieData');

    Route::get('/project/chart-data/user-trend/{type?}', 'ChartController@userTrendData');
    Route::get('/project/chart-data/view-trend/{type?}', 'ChartController@viewTrendData');
    Route::get('/project/chart-data/potential-reach-trend/{type?}', 'ChartController@potentialReachTrendData');

    //START 2016-12-25
    Route::get('/project/chart-data/fans-trend/{type?}', 'ChartController@fansTrendData');
    Route::get('/project/chart-data/like-trend/{type?}', 'ChartController@likeTrendData');
    Route::get('/project/chart-data/dislike-trend/{type?}', 'ChartController@dislikeTrendData');
    Route::get('/project/chart-data/subscribes-trend/{type?}', 'ChartController@subscribesTrendData');
    Route::get('/project/chart-data/love-trend/{type?}', 'ChartController@loveTrendData');
    Route::get('/project/chart-data/love-pie/{type?}', 'ChartController@loveData');
    Route::get('/project/chart-data/view-pie/{type?}', 'ChartController@viewData');
    //END 2016-12-25

    Route::get('/project/chart-data/unique-user-pie', 'ChartController@uniqueUserPieData');
    Route::get('/project/chart-data/viral-pie/{type?}', 'ChartController@viralPieData');
    Route::get('/project/chart-data/like-pie/{type?}', 'ChartController@likePieData');

    Route::get('/project/chart-data/share-of-media-bar', 'ChartController@shareOfMediaBarData');
    Route::get('/project/chart-data/comment-bar/{type?}', 'ChartController@commentBarData');
    Route::get('/project/chart-data/rating-bar/{type?}', 'ChartController@ratingBarData');
    Route::get('/project/chart-data/count-bar/{type?}', 'ChartController@countBarData');

    Route::get('/project/chart-data/wordcloud/{mediaId}/{type?}', 'ChartController@wordcloudData');
    Route::get('/project/chart-data/influencer/{mediaId}/{type?}', 'ChartController@influencerData');

    Route::get('/project/chart-data/convo-twitter/{type?}', 'ChartController@convoTwitterData');
    Route::get('/project/chart-data/convo-facebook/{type?}', 'ChartController@convoFacebookData');
    Route::get('/project/chart-data/convo-news', 'ChartController@convoNewsData');
    Route::get('/project/chart-data/convo-forum', 'ChartController@convoForumData');
    Route::get('/project/chart-data/convo-video/{type?}', 'ChartController@convoVideoData');
    Route::get('/project/chart-data/convo-blog', 'ChartController@convoBlogData');
    Route::get('/project/chart-data/convo-ig/{type?}', 'ChartController@convoInstagramData');

    Route::any('/project-detail/{pid}', 'ProjectController@detail');
    Route::any('/project-twitter/{pid}', 'ProjectTwitterController@detail');
    Route::any('/project-facebook/{pid}', 'ProjectFacebookController@detail');
    Route::any('/project-news/{pid}', 'ProjectNewsController@detail');
    Route::any('/project-forum/{pid}', 'ProjectForumController@detail');
    Route::any('/project-video/{pid}', 'ProjectVideoController@detail');
    Route::any('/project-blog/{pid}', 'ProjectBlogController@detail');
    Route::any('/project-ig/{pid}', 'ProjectIGController@detail');
    Route::get('/conversation', 'ProjectController@conversation');
    Route::get('/chart-1/{pid}', 'ChartController@chartOne');

    Route::get('/edit-project/{pid}', 'ProjectController@edit');
    Route::post('/update-project', 'ProjectController@update');

    Route::get('/profile', 'ProfileController@profile');
    Route::post('/update-profile', 'ProfileController@update');

    Route::get('/report-add', 'ReportController@add');
    Route::get('/report-view', 'ReportController@view');
    Route::post('/report-save', 'ReportController@save');
    Route::get('/delete-report/{id}', 'ReportController@delete');

    Route::any('/socmed-twitter', 'SocialMediaController@twitter');
    Route::any('/socmed-facebook', 'SocialMediaController@facebook');
    Route::any('/socmed-youtube', 'SocialMediaController@youtube');
    Route::any('/socmed-instagram', 'SocialMediaController@instagram');

});

Route::get('test/regex', function() {
    $words = [
        'asdfsadf',
        'AND asdfas asdfsadfa asdfsadfasdf',
        'OR asdf asf asdf asdf asd fads fasdf asdf sadf'
    ];
    foreach ($words as $word) {
        if (preg_match('/AND /', $word)) {
            $xplodedWord = explode('AND ', $word);
            $word = $xplodedWord[1];
        }
        if (preg_match('/OR /', $word)) {
            $xplodedWord = explode('OR ', $word);
            $word = $xplodedWord[1];
        }
        if (preg_match('/\s/', $word)) {
            $word = '|' . $word . '|';
        }

        echo $word . '<BR>';

    }
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
            'StartDate'     => '2016-07-01T00:00:00Z',
            'EndDate'       => '2016-07-30T00:00:00Z',
            'sentiment'     => '1,0,-1'
        ]
    ]);

    echo $response2->getBody();

});
