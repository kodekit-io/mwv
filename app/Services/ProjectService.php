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

    public function projectListWithKeywords()
    {
        if ($this->apiMode == 'PRODUCTION') {
            $params = [
                'uid' => \Auth::user()->id,
                'key' => 1,
                'top' => 0,
                'nos' => 0
            ];
            $projectListApi = $this->apiService->post('project/listprojectinfo', $params);

            return $projectListApi->dataProjectList;
        }

        $fakeProjects = \GuzzleHttp\json_decode($this->fakeResult->projectInfoWithKeywords());
        return $fakeProjects->dataProjectList;
    }

    public function projectInfo($projectId)
    {
        if ($this->apiMode == 'PRODUCTION') {
            $params = [
                'pid'   => $projectId
            ];
            $projectInfoApi = $this->apiService->post('project/get', $params);

            return $projectInfoApi;
        }

        $fakeProjects = \GuzzleHttp\json_decode($this->fakeResult->projectInfo());
        return $fakeProjects;
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

    public function updateProject(array $inputs)
    {
        $oriKeywordsNumber = $inputs['keywords_number'];
        $oriTopicsNumber = $inputs['topics_number'];
        $oriExcludesNumber = $inputs['excludes_number'];

        $keywords = $inputs['field_key'];
        $topics = $inputs['field_topic'];
        $excludes = $inputs['field_excld'];

        $params['pname'] = $inputs['projectname'];
        $params['pid'] = $inputs['project_id'];

        if ($oriKeywordsNumber >= count($keywords)) {
            for ($x = 1; $x <= $oriKeywordsNumber; $x++) {
                if (isset($keywords[$x])) {
                    $params['mo' . $x] = str_replace("'", "\\'", $keywords[$x]);
                } else {
                    $params['mo' . $x] = '';
                }
            }
        } else {
            foreach ($keywords as $id => $keyword) {
                $params['mo' . $id] = str_replace("'", "\\'", $keyword);
            }
        }

        if ($oriTopicsNumber >= count($topics)) {
            for ($x = 1; $x <= $oriTopicsNumber; $x++) {
                if (isset($topics[$x])) {
                    $params['to' . $x] = str_replace("'", "\\'", $topics[$x]);
                } else {
                    $params['to' . $x] = '';
                }

            }
        } else {
            foreach ($topics as $id => $topic) {
                $params['to' . $id] = str_replace("'", "\\'", $topic);
            }
        }

        if ($oriExcludesNumber >= count($excludes)) {
            for ($x = 1; $x <= $oriExcludesNumber; $x++) {
                if (isset($excludes[$x])) {
                    $params['no' . $x] = str_replace("'", "\\'", $excludes[$x]);
                } else {
                    $params['no' . $x] = '';
                }
            }
        } else {
            foreach ($excludes as $id => $exclude) {
                $params['no' . $id] = str_replace("'", "\\'", $exclude);
            }
        }

        $updateProjectResponse = $this->apiService->post('project/edit', $params);

        return $updateProjectResponse;

    }
}