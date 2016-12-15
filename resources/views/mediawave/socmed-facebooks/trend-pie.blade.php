<li class="uk-width-medium-1-1">
    <div class="md-card hoverable">
        <div class="md-card-toolbar">
            <div class="md-card-toolbar-actions">
                <a class="btn waves-effect waves-light z-depth-0 amber lighten-4" data-uk-tooltip title="{{ config('tooltips.trend-chart') }}"><i class="material-icons">help</i></a>
                <a class="btn waves-effect waves-light z-depth-0 green lighten-4" data-uk-tooltip title="Minimize" data-uk-toggle="{target:'#trendwrap'}"><i class="material-icons md-icon">fullscreen</i></a>
            </div>
            <div class="md-card-toolbar-heading-text">
                <ul class="uk-subnav uk-subnav-pill" data-uk-switcher="{connect:'#trendwrap ul'}">
                    <li class="uk-active"><a>Daily Activity</a></li>
                    <li><a>Fans Trend</a></li>
                </ul>
            </div>
        </div>
        <?php //TRENDS ?>
        <div id="trendwrap" class="md-card-content">
            <ul class="uk-switcher">
                <li>
                    <div id="posttrend" class="md-chart"></div>
                </li>
                <li>
                    <div id="fanstrend" class="md-chart"></div>
                </li>
            </ul>
        </div>
    </div>
</li>

<li class="uk-width-medium-1-4">
    <?php //POST PIE ?>
    <div class="md-card hoverable">
        <div class="md-card-toolbar">
            <div class="md-card-toolbar-actions">
                <a class="btn waves-effect waves-light z-depth-0 amber lighten-4" data-uk-tooltip title="{{ config('tooltips.post-pie') }}"><i class="material-icons">help</i></a>
                <a class="btn waves-effect waves-light z-depth-0 green lighten-4" data-uk-tooltip title="Minimize" data-uk-toggle="{target:'#piewrap1'}"><i class="material-icons md-icon">fullscreen</i></a>
            </div>
            <h2 class="md-card-toolbar-heading-text">POST</h2>
        </div>
        <div id="piewrap1" class="md-card-content">
            <div id="postpie" class="md-chart"></div>
        </div>
    </div>
</li>

<li class="uk-width-medium-1-4">
    <?php //COMMENTS PIE ?>
    <div class="md-card hoverable">
        <div class="md-card-toolbar">
            <div class="md-card-toolbar-actions">
                <a class="btn waves-effect waves-light z-depth-0 amber lighten-4" data-uk-tooltip title="{{ config('tooltips.comment-pie') }}"><i class="material-icons">help</i></a>
                <a class="btn waves-effect waves-light z-depth-0 green lighten-4" data-uk-tooltip title="Minimize" data-uk-toggle="{target:'#piewrap2'}"><i class="material-icons md-icon">fullscreen</i></a>
            </div>
            <h2 class="md-card-toolbar-heading-text">COMMENTS</h2>
        </div>
        <div id="piewrap2" class="md-card-content">
            <div id="commentpie" class="md-chart"></div>
        </div>
    </div>
</li>

<li class="uk-width-medium-1-4">
    <?php //LIKE PIE ?>
    <div class="md-card hoverable">
        <div class="md-card-toolbar">
            <div class="md-card-toolbar-actions">
                <a class="btn waves-effect waves-light z-depth-0 amber lighten-4" data-uk-tooltip title="{{ config('tooltips.like-pie') }}"><i class="material-icons">help</i></a>
                <a class="btn waves-effect waves-light z-depth-0 green lighten-4" data-uk-tooltip title="Minimize" data-uk-toggle="{target:'#piewrap3'}"><i class="material-icons md-icon">fullscreen</i></a>
            </div>
            <h2 class="md-card-toolbar-heading-text">LIKES</h2>
        </div>
        <div id="piewrap3" class="md-card-content">
            <div id="likepie" class="md-chart"></div>
        </div>
    </div>
</li>

<li class="uk-width-medium-1-4">
    <?php //SHARE PIE ?>
    <div class="md-card hoverable">
        <div class="md-card-toolbar">
            <div class="md-card-toolbar-actions">
                <a class="btn waves-effect waves-light z-depth-0 amber lighten-4" data-uk-tooltip title="{{ config('tooltips.share-pie') }}"><i class="material-icons">help</i></a>
                <a class="btn waves-effect waves-light z-depth-0 green lighten-4" data-uk-tooltip title="Minimize" data-uk-toggle="{target:'#piewrap4'}"><i class="material-icons md-icon">fullscreen</i></a>
            </div>
            <h2 class="md-card-toolbar-heading-text">SHARE</h2>
        </div>
        <div id="piewrap4" class="md-card-content">
            <div id="sharepie" class="md-chart"></div>
        </div>
    </div>
</li>
