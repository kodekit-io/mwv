<li class="uk-width-medium-1-3">
    <?php //RATING BAR ?>
    <div class="md-card hoverable">
        <div class="md-card-toolbar">
            <div class="md-card-toolbar-actions">
                <a class="btn waves-effect waves-light z-depth-0 amber lighten-4" data-uk-tooltip title="{{ config('tooltips.videorating-bar') }}"><i class="material-icons">help</i></a>
                <a class="btn waves-effect waves-light z-depth-0 green lighten-4" data-uk-tooltip title="Minimize" data-uk-toggle="{target:'#barwrap1'}"><i class="material-icons md-icon">fullscreen</i></a>
            </div>
            <h2 class="md-card-toolbar-heading-text">RATING</h2>
        </div>
        <div id="barwrap1" class="md-card-content">
            <div id="ratingbar" class="md-chart"></div>
        </div>
    </div>
</li>

<li class="uk-width-medium-1-3">
    <?php //VIEW COUNT BAR ?>
    <div class="md-card hoverable">
        <div class="md-card-toolbar">
            <div class="md-card-toolbar-actions">
                <a class="btn waves-effect waves-light z-depth-0 amber lighten-4" data-uk-tooltip title="{{ config('tooltips.videocount-bar') }}"><i class="material-icons">help</i></a>
                <a class="btn waves-effect waves-light z-depth-0 green lighten-4" data-uk-tooltip title="Minimize" data-uk-toggle="{target:'#barwrap2'}"><i class="material-icons md-icon">fullscreen</i></a>
            </div>
            <h2 class="md-card-toolbar-heading-text">VIEW COUNT</h2>
        </div>
        <div id="barwrap2" class="md-card-content">
            <div id="countbar" class="md-chart"></div>
        </div>
    </div>
</li>

<li class="uk-width-medium-1-3">
    <?php //COMMENT BAR ?>
    <div class="md-card hoverable">
        <div class="md-card-toolbar">
            <div class="md-card-toolbar-actions">
                <a class="btn waves-effect waves-light z-depth-0 amber lighten-4" data-uk-tooltip title="{{ config('tooltips.comment-bar') }}"><i class="material-icons">help</i></a>
                <a class="btn waves-effect waves-light z-depth-0 green lighten-4" data-uk-tooltip title="Minimize" data-uk-toggle="{target:'#barwrap3'}"><i class="material-icons md-icon">fullscreen</i></a>
            </div>
            <h2 class="md-card-toolbar-heading-text">COMMENTS</h2>
        </div>
        <div id="barwrap3" class="md-card-content">
            <div id="commentbar" class="md-chart"></div>
        </div>
    </div>
</li>
