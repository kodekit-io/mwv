<?php

namespace App;


class FakeResult
{
    public function fakeChart($widgetId)
    {
        $chart = new ChartFaker();
        return $chart->fakeChart($widgetId);
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

    public function report()
    {
        $chart = new ReportFaker();
        return $chart;
    }


}