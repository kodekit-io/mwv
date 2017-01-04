<?php

namespace App;

class ProjectService
{
    use LastSevenDays;

    protected $apiService;
    /**
     * @var FakeResult
     */
    private $fakeResult;
    private $apiMode;
    /**
     * @var ProfileService
     */
    private $profileService;

    /**
     * ProjectService constructor.
     * @param ApiService $apiService
     * @param ProfileService $profileService
     * @param FakeResult $fakeResult
     */
    public function __construct(ApiService $apiService, ProfileService $profileService, FakeResult $fakeResult)
    {
        $this->apiService = $apiService;
        $this->fakeResult = $fakeResult;
        $this->apiMode = config('services.mediawave.api_mode');
        $this->profileService = $profileService;
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
//        var_dump($inputs); exit();
        $projectName = $inputs['projectname'];
//        $mode = $inputs['form_mode'];
        $mode = '';
        if ($inputs['adv_field_key'] == '' && $inputs['adv_field_topic'] == '' && $excludes = $inputs['adv_field_excld'] == '') {
            $mode = 'advanced';
        }

        $params = [
            'uid' => \Auth::user()->id,
            'pname' => $projectName
        ];

        if ($mode == 'advanced') {
            $keywords = $inputs['adv_field_key'];
            $topics = $inputs['adv_field_topic'];
            $excludes = $inputs['adv_field_excld'];

            if (count($keywords) > 0) {
                foreach ($keywords as $key => $keyword) {
                    $words = $this->validateInput($keyword);
                    $params['mo' . $key] = $words;
                }
            }

            if (count($topics) > 0) {
                foreach ($topics as $key => $topic) {
                    $words = $this->validateInput($topic);
                    $params['to' . $key] = $words;
                }
            }

            if (count($excludes) > 0) {
                foreach ($excludes as $key => $exclude) {
                    $words = $this->validateInput($exclude);
                    $params['no' . $key] = $words;
                }
            }
        } else {
            $keywords = $inputs['field_key'];
            $topics = $inputs['field_topic'];
            $excludes = $inputs['field_excld'];

            if (count($keywords) > 0) {
                foreach ($keywords as $key => $keyword) {
                    $words = $this->generateWords($keyword);
                    $params['mo' . $key] = $words;
                }
            }

            if (count($topics) > 0) {
                foreach ($topics as $key => $topic) {
                    $words = $this->generateWords($keyword);
                    $params['to' . $key] = $words;
                }
            }

            if (count($excludes) > 0) {
                foreach ($excludes as $key => $exclude) {
                    $words = $this->generateWords($keyword);
                    $params['no' . $key] = $words;
                }
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

    public function deleteProject($projectId)
    {
        $params['pid'] = $projectId;
        $response = $this->apiService->post('project/delete', $params);

        return $response;
    }

    public function projectSelect($projectInfos, $name, $id=null)
    {
        $select = '<select name="' . $name . '" id="' . $id . '" class="browser-default">';
        foreach ($projectInfos as $projectInfo) {
            $select .= '<option value="' . $projectInfo->project->pid . '">' . $projectInfo->project->pname . '</option>';
        }
        $select.= '</select>';

        return $select;
    }

    public function keywordSelect($projectInfos, $name, $id = null)
    {
        $select = '<select name="' . $name . '" id="' . $id . '" class="browser-default">';
        $select .= '<option value="">All Keyword</option>';
        foreach ($projectInfos as $projectInfo) {
            $project = $projectInfo->project;
            $keywords = $projectInfo->projectInfo->keywordList;
            foreach ($keywords as $keyword) {
                $select .= '<option value="' . $keyword->keyword->keywordId . '" class="' . $project->pid . '">' . $keyword->keyword->keywordName . '</option>';
            }
        }
        $select.= '</select>';

        return $select;
    }

    public function accountSelect($name, $id)
    {
        $profiles = $this->profileService->getProfile();
        $socmedAccounts = $profiles['socmed'];
        $select = '<select name="' . $name . '" id="' . $id . '" class="browser-default">';
        if (count($socmedAccounts) > 0) {
            foreach ($socmedAccounts as $socmedAccount) {
                $twitters = isset($socmedAccount->twitter) ? $socmedAccount->twitter : [];
                $instagrams = isset($socmedAccount->instagram) ? $socmedAccount->instagram : [];
                $facebooks = isset($socmedAccount->facebook) ? $socmedAccount->facebook : [];
                $youtubes = isset($socmedAccount->youtube) ? $socmedAccount->youtube : [];
                foreach ($twitters as $twitter) {
                    $select .= '<option value="' . $twitter->id . '" >' . $twitter->name . '</option>';
                }
                foreach ($instagrams as $instagram) {
                    $select .= '<option value="' . $instagram->id . '" >' . $instagram->name . '</option>';
                }
                foreach ($facebooks as $facebook) {
                    $select .= '<option value="' . $facebook->id . '" >' . $facebook->name . '</option>';
                }
                foreach ($youtubes as $youtube) {
                    $select .= '<option value="' . $youtube->id . '" >' . $youtube->name . '</option>';
                }
            }
        }
        $select.= '</select>';

        return $select;
    }

    private function generateWords($keyword)
    {
        $words = '';
        foreach ($keyword as $word) {
            $w = ( $word == '' ? $word : ' ' . $word );
            $words .= $this->validateInput($w);
        }
        return $words;
    }

    private function validateInput($w)
    {
        return str_replace("'", "\\'", $w);
    }

}