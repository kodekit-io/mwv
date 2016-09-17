<?php

namespace App;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;

class ApiService
{
    protected $apiBaseUrl;
    protected $client;

    /**
     * ApiService constructor.
     */
    public function __construct()
    {
        $this->apiBaseUrl = config('services.mediawave.api_base_url');

        $this->client = new Client();
    }

    public function post($url, $params, $withToken=true)
    {
        if ($withToken) {
            $params['auth_token'] = session('api_token');
        }
        $apiUrl = $this->apiBaseUrl . $url;
        $response = $this->client->post($apiUrl, [
            'form_params' => $params
        ]);

//        if ($url == 'dashboard/analytics/charts') {
//            print_r($params);
//            exit;
//        }

        $parsedResponse = $this->parseResponse($response);

        return $parsedResponse;
    }

    private function parseResponse($response)
    {
        $body = $response->getBody();
        $response = \GuzzleHttp\json_decode($body);

        // check api session, throw exception when expired
        if ($response->status == 'KO' && $response->code == 205) {
            \Auth::logout();
            session()->forget('userAttributes');
            return redirect('/')->withErrors(['session_expired' => $response->msg]);
        }

        return $response;
    }

    public function projectList()
    {
        $params = [
            'uid'  => \Auth::user()->id
        ];
        $projectListApi = $this->post('project/list', $params);

        return $projectListApi->projectList;
    }

    public function addProject($projectName)
    {
        $params = [
            'uid' => \Auth::user()->id,
            'pname' => $projectName
        ];
        $addProjectResponse = $this->post('project/add', $params);

        return $addProjectResponse;
    }


}