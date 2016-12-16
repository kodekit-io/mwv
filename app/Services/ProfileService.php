<?php

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

    public function getMediaAccounts($idMedia = 1)
    {
        $params = [
            'id_login'  => \Auth::user()->id,
            'id_Media' => $idMedia
        ];

        $result = $this->apiService->postDummy('sosmedpageinfo', $params);
        return $result->projectInfo;
    }

    public function updateProfile(array $inputs)
    {
        $params = [
            'id_login' => \Auth::user()->id,
            'userName' => $inputs['name'],
            'email' => $inputs['email'],
            'company' => $inputs['company']
        ];

        return $this->apiService->postDummy('project/editprofile', $params);
    }

    public function updateAccounts(array $inputs)
    {
        $twitters = $inputs['twitters'];
        $facebooks = $inputs['facebooks'];
        $youtubes = $inputs['youtubes'];
        $instagrams = $inputs['instagrams'];

        $params = [
            'uid' => \Auth::user()->id,
        ];

        if (count($twitters) > 0) {
            foreach ($twitters as $key => $twitter) {
                $words = $this->validateInput($twitter);
                $params['tw' . $key] = $words;
            }
        }

        if (count($facebooks) > 0) {
            foreach ($facebooks as $key => $facebook) {
                $words = $this->validateInput($facebook);
                $params['fb' . $key] = $words;
            }
        }

        if (count($youtubes) > 0) {
            foreach ($youtubes as $key => $youtube) {
                $words = $this->validateInput($youtube);
                $params['yt' . $key] = $words;
            }
        }

        if (count($instagrams) > 0) {
            foreach ($instagrams as $key => $instagram) {
                $words = $this->validateInput($instagram);
                $params['ig' . $key] = $words;
            }
        }

        return $this->apiService->postDummy('project/editprofile', $params);

    }

    private function validateInput($w)
    {
        return str_replace("'", "\\'", $w);
    }
}