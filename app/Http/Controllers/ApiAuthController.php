<?php

namespace App\Http\Controllers;

use App\ApiService;
use Illuminate\Http\Request;

use App\Http\Requests;

class ApiAuthController extends Controller
{
    protected $apiService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
        $this->apiService = new ApiService();
    }

    public function getLogin()
    {
        return view('login');
    }

    public function postLogin(Request $request)
    {
        $params = $request->only(['username', 'password']);
        $params['appkey'] = config('services.mediawave.app_key');

        $apiLoginResult = $this->apiService->post('auth/login', $params, false);

        if ($apiLoginResult->status == 'OK') {
            $token = $apiLoginResult->token;
            $mediawaveUser = $apiLoginResult->user;
            $this->signIn($mediawaveUser, $request->get('password'), $token);

            return redirect('/dashboard');
        } else {
            return redirect('/login')->withErrors(['error' => $apiLoginResult->msg]);
        }

    }

    protected function signIn($user, $password, $token)
    {
        $attributes = [
            'id'        => $user->userId,
            'password'  => $password,
            'email'     => $user->userId . '@mediawave.com',
            'name'      => $user->userName,
            'remember_token' => ''
        ];

        session(['userAttributes' => $attributes]);

        \Auth::loginUsingId($user->userId);

        $this->saveApiToken($token);
    }

    public function logout()
    {
        \Auth::logout();
        session()->forget('userAttributes');

        return redirect('/dashboard');
    }

    protected function saveApiToken($token)
    {
        session(['api_token' => $token]);
    }
}
