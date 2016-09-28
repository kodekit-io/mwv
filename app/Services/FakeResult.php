<?php

namespace App;


class FakeResult
{
    public function fakeChart($projectId)
    {
        $chart = new ChartFaker();
        return $chart->fakeChart($projectId);
    }

    public function fakeProjects()
    {
        $project = new ProjectFaker();
        return $project->fakeProjects();
    }

    public function projectInfo()
    {
        $project = new ProjectFaker();
        return $project->fakeProjectInfo();
    }

    public function projectInfoWithKeywords()
    {
        $project = new ProjectFaker();
        return $project->fakeProjectWithInfo();
    }

    public function fakeReports()
    {
        $chart = new ReportFaker();
        return $chart->fakeReports();
    }


}