<li class="uk-width-medium-1-1">
    <div class="md-card hoverable">
        <div class="md-card-toolbar">
            <div class="md-card-toolbar-actions">
                <a class="btn waves-effect waves-light z-depth-0 amber lighten-4" data-uk-tooltip title="Help"><i class="material-icons">help</i></a>
                <a class="btn waves-effect waves-light z-depth-0 green lighten-4" data-uk-tooltip title="Minimize" data-uk-toggle="{target:'#trend'}"><i class="material-icons md-icon">fullscreen</i></a>
            </div>
            <div class="md-card-toolbar-heading-text">
                <ul class="uk-subnav uk-subnav-pill" data-uk-switcher="{connect:'#trendwrap ul'}">
                    <li class="uk-active"><a>POST TREND</a></li>
                    <li><a>USER TREND</a></li>
                    <li><a>REACH TREND</a></li>
                </ul>
            </div>
        </div>
        <?php //TREND ?>
        <div id="trendwrap" class="md-card-content">
            <ul class="uk-switcher">
                <li>
                    <div id="posttrend" class="md-chart">Post Trend</div>
                </li>
                <li>
                    <div id="usertrend" class="md-chart">User Trend</div>
                </li>
                <li>
                    <div id="reachtrend" class="md-chart">Reach Trend</div>
                </li>
            </ul>
        </div>
    </div>
</li>