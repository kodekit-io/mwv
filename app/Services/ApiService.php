<?php

namespace App;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Response;
use Illuminate\Support\Facades\Log;
use stdClass;

class ApiService
{
    protected $apiBaseUrl;
    protected $apiDummyUrl;
    protected $client;

    private $apiMode;

    /**
     * ApiService constructor.
     */
    public function __construct()
    {
        $this->apiBaseUrl = config('services.mediawave.api_base_url');
        $this->apiDummyUrl = config('services.mediawave.api_dummy_url');
        $this->client = new Client();
        $this->apiMode = config('services.mediawave.api_mode');
    }

    public function postDummy($url, $params, $withToken = true)
    {
        if ($withToken) {
            $params['auth_token'] = session('api_token');
        }
        $apiUrl = $this->apiDummyUrl . $url;

        $response = $this->client->post($apiUrl, [
            'form_params' => $params
        ]);

        $parsedResponse = $this->parseResponse($response);

        return $parsedResponse;
    }

    public function postDirectDummy($url, $params, $withToken = true)
    {
        if ($withToken) {
            $params['auth_token'] = session('api_token');
        }
        $apiUrl = $this->apiDummyUrl . $url;

        $response = $this->client->post($apiUrl, [
            'form_params' => $params
        ]);

        return $response->getBody();
    }

    public function post($url, $params, $withToken=true)
    {
        if ($withToken) {
            $params['auth_token'] = session('api_token');
        }
//        var_dump($params); exit;
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
        if (isset($response->status)) {
            if ($response->status == 'KO' && $response->code == 205) {
                \Auth::logout();
                session()->forget('userAttributes');
                return redirect('/')->withErrors(['session_expired' => $response->msg]);
            }
        }

        return $response;
    }

    public function login($params)
    {
        if ($this->apiMode == 'PRODUCTION') {
            try {
                $this->post('auth/login', $params, false);
            } catch (RequestException $e) {
                $ret = new stdClass();
                $ret->status = 'KO';
                $ret->msg = 'Network error.';
                return $ret;
            }
            return $this->post('auth/login', $params, false);
        }

        $user = new \stdClass();
        $user->userId = '837475';
        $user->userName = 'Dummy User';
        $dummy = new \stdClass();
        $dummy->status = 'OK';
        $dummy->token = '23ssdf';
        $dummy->user = $user;
        return $dummy;
    }


}