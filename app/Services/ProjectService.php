<?php

namespace App;

class ProjectService
{

    protected $apiService;
    /**
     * @var FakeResult
     */
    private $fakeResult;
    private $apiMode;

    /**
     * ProjectService constructor.
     * @param $apiService
     */
    public function __construct(ApiService $apiService, FakeResult $fakeResult)
    {
        $this->apiService = $apiService;
        $this->fakeResult = $fakeResult;
        $this->apiMode = config('services.mediawave.api_mode');
    }

    public function projectList()
    {
        if ($this->apiMode == 'PRODUCTION') {
            $params = [
                'uid'  => \Auth::user()->id
            ];
            $projectListApi = $this->apiService->post('project/list', $params);

            return $projectListApi->projectList;
        }

        $fakeProjects = \GuzzleHttp\json_decode($this->fakeResult->fakeProjects());
        return $fakeProjects->projectList;
    }

    public function addProject(array $inputs)
    {
        $projectName = $inputs['projectname'];

        $keywords = $inputs['field_key'];
        $topics = $inputs['field_topic'];
        $excludes = $inputs['field_excld'];

        $params = [
            'uid' => \Auth::user()->id,
            'pname' => $projectName
        ];

        if (count($keywords) > 0) {
            foreach ($keywords as $key => $keyword) {
                $words = '';
                foreach ($keyword as $word) {
                    $w = ( $word == '' ? $word : ' ' . $word );
                    $words .= str_replace("'", "\\'", $w);
                }
                $params['mo' . $key] = $words;
            }
        }

        if (count($topics) > 0) {
            foreach ($topics as $key => $topic) {
                $words = '';
                foreach ($topic as $word) {
                    $w = ( $word == '' ? $word : ' ' . $word );
                    $words .= str_replace("'", "\\'", $w);
                }
                $params['to' . $key] = $words;
            }
        }

        if (count($excludes) > 0) {
            foreach ($excludes as $key => $exclude) {
                $words = '';
                foreach ($exclude as $word) {
                    $w = ( $word == '' ? $word : ' ' . $word );
                    $words .= str_replace("'", "\\'", $w);
                }
                $params['no' . $key] = $words;
            }
        }

//        var_dump($params); exit;

        $addProjectResponse = $this->apiService->post('project/add', $params);

        return $addProjectResponse;
    }
}