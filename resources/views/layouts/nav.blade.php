<header class="navbar-fixed">
    <nav class="md-head-container gradient-fluenza z-depth-0">
        <a href="{!! url('/dashboard') !!}" title="MediaWave" class="left">
            <img class="md-logo-head" src="{!! asset('mediawave/img/logo-white.png') !!}" alt="MediaWave" />
        </a>
        <h1 class="md-title-page left">{!! $pageTitle !!}</h1>
        <ul class="right hide-on-med-and-down" id="mainnav">
            <li class="nav-dashboard">
                <a href="{!! url('/dashboard') !!}" name="topnav" class="dropdown-button" title="Dashboard" data-activates="projectlist" data-beloworigin="true" data-hover="true" data-constrainwidth="false">
                    <i class="material-icons left">dashboard</i>All Projects
                </a>
                <ul id="projectlist" class="dropdown-content">
                    @if(count($gProjects) > 0)
                        @foreach($gProjects as $project)
                            <li><a href="{!! url('project-detail/' . $project->pid) !!}">{!! $project->pname !!}</a></li>
                        @endforeach
                    @endif
                </ul>
            </li>
            <li class="nav-socmed">
                <a href="{!! url('/socmed-twitter') !!}" name="topnav" title="Social Media Page">
                    <i class="material-icons left">group</i>Socmed Page
                </a>
            </li>
            <li class="nav-newproject">
                <a href="{!! url('/create-project') !!}" name="topnav" title="Create Project">
                    <i class="material-icons left">add_circle</i>New Project
                </a>
            </li>
            <li class="nav-report">
                <a href="{!! url('/report-add') !!}" name="topnav" title="Report">
                    <i class="material-icons left">assignment</i>Report
                </a>
            </li>
            <li class="nav-profile">
                <a href="{!! url('/profile') !!}" name="topnav" title="Profile">
                    <i class="material-icons left">account_circle</i>Profile
                </a>
            </li>
            <li class="uk-margin-left">
                <a href="{!! url('/logout') !!}" class="uk-margin-remove md-btn-logout" data-uk-tooltip title="LOGOUT">
                    <span class="uk-border-circle black"><i class="material-icons">power_settings_new</i></span>
                </a>
            </li>
        </ul>
        <a href="#!" data-activates="mobile-nav" class="right button-collapse"><i class="material-icons">menu</i></a>
        <ul class="side-nav" id="mobile-nav">
            <li class="nav-dashboard">
                <a href="{!! url('/dashboard') !!}" name="topnav" class="" title="Dashboard">
                    <i class="material-icons left">dashboard</i>All Projects
                </a>
            </li>
            <li class="nav-socmed">
                <a href="{!! url('/socmed-twitter') !!}" name="topnav" class="" title="Social Media Page">
                    <i class="material-icons left">group</i>Socmed Page
                </a>
            </li>
            <li class="nav-newproject">
                <a href="{!! url('/create-project') !!}" name="topnav" class="" title="Create Project">
                    <i class="material-icons left">add_circle</i>New Project
                </a>
            </li>
            <li class="nav-report">
                <a href="{!! url('/report-add') !!}" name="topnav" class="" title="Report">
                    <i class="material-icons left">assignment</i>Report
                </a>
            </li>
            <li class="nav-profile">
                <a href="{!! url('/profile') !!}" name="topnav" class="" title="Profile">
                    <i class="material-icons left">account_circle</i>Profile
                </a>
            </li>
            <li class="">
                <a href="{!! url('/logout') !!}" class="" title="LOGOUT">
                    <i class="material-icons left">power_settings_new</i>Logout</span>
                </a>
            </li>
        </ul>
    </nav>
</header>
