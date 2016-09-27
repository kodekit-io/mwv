
<nav class="uk-navbar md-subnav gradient-fluenza darken">
    <div class="md-head-container">
        <ul class="uk-navbar-nav">
            <li>
                <a href="{!! url('project-detail/' . $project->pid) !!}" name="subnav" class="tooltipped" data-position="bottom" data-delay="25" data-tooltip="All Media">
                    <span class="uk-border-circle pink accent-4"><i class="material-icons left">work</i></span>
                </a>
            </li>
            <li>
                <a href="{!! url('project-detail-twitter/' . $project->pid) !!}" name="subnav" class="tooltipped" data-position="bottom" data-delay="25" data-tooltip="Twitter">
                    <span class="uk-border-circle light-blue lighten-2"><i class="uk-icon-twitter"></i></span>
                </a>
            </li>
            <li>
                <a href="#" name="subnav" class="tooltipped" data-position="bottom" data-delay="25" data-tooltip="Facebook">
                    <span class="uk-border-circle blue darken-4"><i class="uk-icon-facebook"></i></span>
                </a>
            </li>
            <li>
                <a href="#" name="subnav" class="tooltipped" data-position="bottom" data-delay="25" data-tooltip="Online Media">
                    <span class="uk-border-circle brown"><i class="material-icons">web</i></span>
                </a>
            </li>
            <li>
                <a href="#" name="subnav" class="tooltipped" data-position="bottom" data-delay="25" data-tooltip="Forum">
                    <span class="uk-border-circle lime darken-4"><i class="material-icons">forum</i></span>
                </a>
            </li>
            <li>
                <a href="#" name="subnav" class="tooltipped" data-position="bottom" data-delay="25" data-tooltip="Video">
                    <span class="uk-border-circle red darken-4"><i class="material-icons">videocam</i></span>
                </a>
            </li>
            <li>
                <a href="#" name="subnav" class="tooltipped" data-position="bottom" data-delay="25" data-tooltip="Blog">
                    <span class="uk-border-circle orange darken-4"><i class="material-icons">rss_feed</i></span>
                </a>
            </li>
        </ul>
        <div class="uk-navbar-flip">
            <form>
                <div class="nav-wrapper md-search">
                    <div class="input-field">
                        <input id="search" type="search">
                        <label for="search"><i class="material-icons">search</i></label>
                        <i class="material-icons emptysearch">close</i>
                    </div>
                </div>
            </form>
        </div>
    </div>
</nav>
