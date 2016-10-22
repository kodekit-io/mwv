<li class="uk-width-medium-1-3">
    <?php //THREAD PIE ?>
    <div class="md-card hoverable">
        <div class="md-card-toolbar">
            <div class="md-card-toolbar-actions">
                <a class="btn waves-effect waves-light z-depth-0 amber lighten-4" data-uk-tooltip title="{{ config('tooltips.post-pie') }}"><i class="material-icons">help</i></a>
                <a class="btn waves-effect waves-light z-depth-0 green lighten-4" data-uk-tooltip title="Minimize" data-uk-toggle="{target:'#piewrap1'}"><i class="material-icons md-icon">fullscreen</i></a>
            </div>
            <h2 class="md-card-toolbar-heading-text">THREAD</h2>
        </div>
        <div id="piewrap1" class="md-card-content">
            <div id="postpie" class="md-chart">Pie Chart</div>
        </div>
    </div>
</li>

<li class="uk-width-medium-1-3">
    <?php //COMMENT PIE ?>
    <div class="md-card hoverable">
        <div class="md-card-toolbar">
            <div class="md-card-toolbar-actions">
                <a class="btn waves-effect waves-light z-depth-0 amber lighten-4" data-uk-tooltip title="{{ config('tooltips.comment-pie) }}"><i class="material-icons">help</i></a>
                <a class="btn waves-effect waves-light z-depth-0 green lighten-4" data-uk-tooltip title="Minimize" data-uk-toggle="{target:'#piewrap2'}"><i class="material-icons md-icon">fullscreen</i></a>
            </div>
            <h2 class="md-card-toolbar-heading-text">COMMENTS</h2>
        </div>
        <div id="piewrap2" class="md-card-content">
            <div id="commentpie" class="md-chart">Pie Chart</div>
        </div>
    </div>
</li>

<li class="uk-width-medium-1-3">
    <?php //FORUM REACH PIE ?>
    <div class="md-card hoverable">
        <div class="md-card-toolbar">
            <div class="md-card-toolbar-actions">
                <a class="btn waves-effect waves-light z-depth-0 amber lighten-4" data-uk-tooltip title="{{ config('tooltips.reach-pie') }}"><i class="material-icons">help</i></a>
                <a class="btn waves-effect waves-light z-depth-0 green lighten-4" data-uk-tooltip title="Minimize" data-uk-toggle="{target:'#piewrap3'}"><i class="material-icons md-icon">fullscreen</i></a>
            </div>
            <h2 class="md-card-toolbar-heading-text">FORUM REACH</h2>
        </div>
        <div id="piewrap3" class="md-card-content">
            <div id="reachpie" class="md-chart">Pie Chart</div>
        </div>
    </div>
</li>
