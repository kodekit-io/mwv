<?php

namespace App\Http\Middleware;

use App\ProjectService;
use Closure;
use Illuminate\Support\Facades\View;

class ProjectList
{
    /**
     * @var ProjectService
     */
    private $projectService;

    /**
     * ProjectList constructor.
     */
    public function __construct(ProjectService $projectService)
    {
        $this->projectService = $projectService;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $projects = $this->projectService->projectList();
        View::share('gProjects', $projects);
        return $next($request);
    }
}
