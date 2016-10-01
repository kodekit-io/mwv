<header class="navbar-fixed">
    <nav class="md-head-container gradient-fluenza z-depth-0">
        <a href="{!! url('/dashboard') !!}" title="MediaWave" class="left">
            <img class="md-logo-head" src="{!! asset('mediawave/img/logo-white.png') !!}" alt="MediaWave" />
        </a>
        <h1 class="md-title-page left">{!! $pageTitle !!}</h1>
        <?php
        /*
        if (isset($projectName)) {
            echo '<a data-activates="projectlist" class="dropdown-button truncate">';
            echo $pageTitle;
            echo '<i class="material-icons right">arrow_drop_down</i></a>';
        } else {
            echo $pageTitle;
        }

        <!-- Projectlist -->
        <ul id="projectlist" class="dropdown-content">
            @foreach($projects as $project)
            <li><a href="{!! url('project-detail/' . $project->pid) !!}">{!! $project->pname !!}</a></li>
            @endforeach
        </ul>
        */
        ?>
        <ul class="right hide-on-med-and-down">
            <li class="nav-dashboard">
                <a href="{!! url('/dashboard') !!}" name="topnav" class="tooltipped" data-position="bottom" data-delay="25" data-tooltip="Dashboard">
                    <i class="material-icons left">dashboard</i>All Projects
                </a>
            </li>
            <li class="nav-socmed">
                <a href="{!! url('/socmed-twitter') !!}" name="topnav" class="tooltipped" data-position="bottom" data-delay="25" data-tooltip="Social Media Page">
                    <i class="material-icons left">group</i>Socmed Page
                </a>
            </li>
            <li class="nav-newproject">
                <a href="{!! url('/create-project') !!}" name="topnav" class="tooltipped" data-position="bottom" data-delay="25" data-tooltip="Create Project">
                    <i class="material-icons left">add_circle</i>New Project
                </a>
            </li>
            <li class="nav-report">
                <a href="{!! url('/report-add') !!}" name="topnav" class="tooltipped" data-position="bottom" data-delay="25" data-tooltip="Report">
                    <i class="material-icons left">assignment</i>Report
                </a>
            </li>
            <li class="nav-profile">
                <a href="{!! url('/profile') !!}" name="topnav" class="tooltipped" data-position="bottom" data-delay="25" data-tooltip="Profile">
                    <i class="material-icons left">account_circle</i>Profile
                </a>
            </li>
            <li class="uk-margin-left">
                <a href="{!! url('/logout') !!}" class="uk-margin-remove md-btn-logout  tooltipped" data-position="bottom" data-delay="25" data-tooltip="LOGOUT">
                    <span class="uk-border-circle black"><i class="material-icons">power_settings_new</i></span>
                </a>
            </li>
        </ul>
    </nav>
</header>
