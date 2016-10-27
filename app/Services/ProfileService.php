<?php
/**
 * Created by PhpStorm.
 * User: thor
 * Date: 10/26/2016
 * Time: 7:49 PM
 */

namespace App;


class ProfileService
{
    /**
     * @var ApiService
     */
    private $apiService;

    /**
     * ProfileService constructor.
     */
    public function __construct(ApiService $apiService)
    {
        $this->apiService = $apiService;
    }

    public function getProfile()
    {
        $params = [
            'id_login'  => \Auth::user()->id
        ];
        $profiles = $this->apiService->postDummy('project/getprofile', $params);
        $profile['user'] = $profiles->user;
        $profile['socmed'] = $profiles->sosmed;

        return $profile;
    }

    public function getMediaAccounts()
    {
        $params = [
            'id_login'  => \Auth::user()->id
        ];

        $result = $this->apiService->postDummy('project/sosmedpageinfo', $params);
        return $result->projectInfo;
    }
}