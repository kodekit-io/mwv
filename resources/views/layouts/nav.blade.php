<header class="navbar-fixed">
    <nav class="md-head-container gradient-fluenza z-depth-0">
        <a href="home.php" title="MediaWave" class="left">
            <img class="md-logo-head" src="assets/img/logo-white.png" alt="MediaWave" />
        </a>
        <h1 class="md-title-page left">
            <?php
            if (isset($project)) {
                echo '<a data-activates="projectlist" class="dropdown-button truncate">';
                echo $pagetitle;
                echo '<i class="material-icons right">arrow_drop_down</i></a>';
            } else {
                echo $pagetitle;
            }
            ?>
        </h1>
        <!-- Projectlist -->
        <ul id="projectlist" class="dropdown-content">
            <li><a href="#!">Project Name 1</a></li>
            <li><a href="#!">Project Name 2</a></li>
            <li><a href="#!">Project Name 3</a></li>
        </ul>

        <ul class="right hide-on-med-and-down">
            <li>
                <a href="home.php" name="topnav" class="tooltipped" data-position="bottom" data-delay="25" data-tooltip="Dashboard">
                    <i class="material-icons left">dashboard</i>All Projects
                </a>
            </li>
            <li>
                <a href="socmed-all.php" name="topnav" class="tooltipped" data-position="bottom" data-delay="25" data-tooltip="Social Media Page">
                    <i class="material-icons left">group</i>Socmed Page
                </a>
            </li>
            <li>
                <a href="project-create.php" name="topnav" class="tooltipped" data-position="bottom" data-delay="25" data-tooltip="New Project">
                    <i class="material-icons left">add_circle</i>New Project
                </a>
            </li>
            <li>
                <a href="report.php" name="topnav" class="tooltipped" data-position="bottom" data-delay="25" data-tooltip="Report">
                    <i class="material-icons left">assignment</i>Report
                </a>
            </li>
            <li>
                <a href="profile.php" name="topnav" class="tooltipped" data-position="bottom" data-delay="25" data-tooltip="Profile">
                    <i class="material-icons left">account_circle</i>Profile
                </a>
            </li>
            <li class="uk-margin-left">
                <a href="#" class="uk-margin-remove md-btn-logout  tooltipped" data-position="bottom" data-delay="25" data-tooltip="LOGOUT">
                    <span class="uk-border-circle black"><i class="material-icons">power_settings_new</i></span>
                </a>
            </li>
        </ul>
    </nav>
</header>