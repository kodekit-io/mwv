<li class="uk-width-medium-1-2">
    <?php //SENTIMENT BAR ?>
    <div class="md-card hoverable">
        <div class="md-card-toolbar">
            <div class="md-card-toolbar-actions">
                <a class="btn waves-effect waves-light z-depth-0 amber lighten-4" data-uk-tooltip title="{{ config('tooltips.sentiment-bar') }}"><i class="material-icons">help</i></a>
                <a class="btn waves-effect waves-light z-depth-0 green lighten-4" data-uk-tooltip title="Minimize" data-uk-toggle="{target:'#barwrap1'}"><i class="material-icons md-icon">fullscreen</i></a>
            </div>
            <h2 class="md-card-toolbar-heading-text">SENTIMENT</h2>
        </div>
        <div id="barwrap1" class="md-card-content">
            <div id="sentimentbar" class="md-chart">Bar Chart</div>
        </div>
    </div>
</li>

<li class="uk-width-medium-1-2">
    <?php //COMMENT INTERACTIONS BAR ?>
    <div class="md-card hoverable">
        <div class="md-card-toolbar">
            <div class="md-card-toolbar-actions">
                <a class="btn waves-effect waves-light z-depth-0 amber lighten-4" data-uk-tooltip title="{{ config('tooltips.interactions-bar') }}"><i class="material-icons">help</i></a>
                <a class="btn waves-effect waves-light z-depth-0 green lighten-4" data-uk-tooltip title="Minimize" data-uk-toggle="{target:'#barwrap2'}"><i class="material-icons md-icon">fullscreen</i></a>
            </div>
            <h2 class="md-card-toolbar-heading-text">COMMENT INTERACTION</h2>
        </div>
        <div id="barwrap2" class="md-card-content">
            <div id="commentbar" class="md-chart">Bar Chart</div>
        </div>
    </div>
</li>
