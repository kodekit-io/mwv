<?php

namespace App;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;

class ApiService
{
    protected $apiBaseUrl;
    protected $client;
    /**
     * @var FakeResult
     */
    private $fakeResult;

    /**
     * ApiService constructor.
     */
    public function __construct()
    {
        $this->apiBaseUrl = config('services.mediawave.api_base_url');

        $this->client = new Client();
        $this->fakeResult = new FakeResult();
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
        $fakeProjects = \GuzzleHttp\json_decode($this->fakeResult->fakeProjects());
        return $fakeProjects->projectList;
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

    public function login($params)
    {
        return $this->post('auth/login', $params, false);
        $user = new \stdClass();
        $user->userId = '837475';
        $user->userName = 'Dummy User';
        $dummy = new \stdClass();
        $dummy->status = 'OK';
        $dummy->token = '23ssdf';
        $dummy->user = $user;
        return $dummy;
    }

    public function getChart($params)
    {
        return $this->post('dashboard/analytics/charts', $params, true);
        $fakeResult = $this->fakeResult->fakeChart($params['pid']);
        if ($fakeResult) {
            return \GuzzleHttp\json_decode($fakeResult);
        }
    }


}