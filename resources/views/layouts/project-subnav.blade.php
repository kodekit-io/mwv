
<nav class="uk-navbar md-subnav gradient-fluenza darken">
    <div class="md-head-container">
        <ul class="uk-navbar-nav">
            <li>
                <a href="{!! url('project-detail/' . $project->pid) !!}" name="subnav" data-uk-tooltip title="All Media">
                    <span class="uk-border-circle pink accent-4"><i class="material-icons left">work</i></span>
                    <span class="uk-hidden-small">All Media</span>
                </a>
            </li>
            <li>
                <a href="{!! url('project-twitter/' . $project->pid) !!}" name="subnav" data-uk-tooltip title="Twitter">
                    <span class="uk-border-circle light-blue lighten-2"><i class="uk-icon-twitter"></i></span>
                    <span class="uk-hidden-small">Twitter</span>
                </a>
            </li>
            <li>
                <a href="{!! url('project-facebook/' . $project->pid) !!}" name="subnav" data-uk-tooltip title="Facebook">
                    <span class="uk-border-circle blue darken-4"><i class="uk-icon-facebook"></i></span>
                    <span class="uk-hidden-small">Facebook</span>
                </a>
            </li>
            <li>
                <a href="{!! url('project-news/' . $project->pid) !!}" name="subnav" data-uk-tooltip title="Online Media">
                    <span class="uk-border-circle teal"><i class="material-icons">web</i></span>
                    <span class="uk-hidden-small">Online Media</span>
                </a>
            </li>
            <li>
                <a href="{!! url('project-forum/' . $project->pid) !!}" name="subnav" data-uk-tooltip title="Forum">
                    <span class="uk-border-circle lime darken-4"><i class="material-icons">forum</i></span>
                    <span class="uk-hidden-small">Forum</span>
                </a>
            </li>
            <li>
                <a href="{!! url('project-video/' . $project->pid) !!}" name="subnav" data-uk-tooltip title="Video">
                    <span class="uk-border-circle red darken-4"><i class="material-icons">videocam</i></span>
                    <span class="uk-hidden-small">Video</span>
                </a>
            </li>
            <li>
                <a href="{!! url('project-blog/' . $project->pid) !!}" name="subnav" data-uk-tooltip title="Blog">
                    <span class="uk-border-circle orange darken-4"><i class="material-icons">rss_feed</i></span>
                    <span class="uk-hidden-small">Blog</span>
                </a>
            </li>
            <li>
                <a href="{!! url('project-ig/' . $project->pid) !!}" name="subnav" data-uk-tooltip title="Instagram">
                    <span class="uk-border-circle brown"><i class="uk-icon-instagram"></i></span>
                    <span class="uk-hidden-small">Instagram</span>
                </a>
            </li>
        </ul>

    </div>
</nav>
