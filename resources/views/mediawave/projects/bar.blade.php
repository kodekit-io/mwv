<li class="uk-width-medium-1-3">
    <?php //SENTIMENT BAR ?>
    <div class="md-card hoverable">
        <div class="md-card-toolbar">
            <div class="md-card-toolbar-actions">
                <a class="btn waves-effect waves-light z-depth-0 amber lighten-4 " data-uk-tooltip title="{{ config('tooltips.sentiment-bar') }}"><i class="material-icons">help</i></a>
                <a class="btn waves-effect waves-light z-depth-0 green lighten-4 " data-uk-tooltip title="Minimize" data-uk-toggle="{target:'#sentiment'}"><i class="material-icons md-icon">fullscreen</i></a>
            </div>
            <h2 class="md-card-toolbar-heading-text">SENTIMENT</h2>
        </div>
        <div id="sentiment" class="md-card-content">
            <div id="sentimentbar" class="md-chart">Bar Chart</div>
        </div>
    </div>
</li>
<li class="uk-width-medium-1-3">
    <?php //INTERACTION RATE BAR (with mid-range) ?>
    <div class="md-card hoverable">
        <div class="md-card-toolbar">
            <div class="md-card-toolbar-actions">
                <a class="btn waves-effect waves-light z-depth-0 amber lighten-4 " data-uk-tooltip title="{{ config('tooltips.interactions-bar') }}"><i class="material-icons">help</i></a>
                <a class="btn waves-effect waves-light z-depth-0 green lighten-4 " data-uk-tooltip title="Minimize" data-uk-toggle="{target:'#ir'}"><i class="material-icons md-icon">fullscreen</i></a>
            </div>
            <h2 class="md-card-toolbar-heading-text">INTERACTION RATE</h2>
        </div>
        <div id="ir" class="md-card-content">
            <div id="interactionbar" class="md-chart">Bar Chart</div>
        </div>
    </div>
</li>
<li class="uk-width-medium-1-3">
    <?php //SHARE OF MEDIA BAR ?>
    <div class="md-card hoverable">
        <div class="md-card-toolbar">
            <div class="md-card-toolbar-actions">
                <a class="btn waves-effect waves-light z-depth-0 amber lighten-4 " data-uk-tooltip title="{{ config('tooltips.shareofmedia-bar') }}"><i class="material-icons">help</i></a>
                <a class="btn waves-effect waves-light z-depth-0 green lighten-4 " data-uk-tooltip title="Minimize" data-uk-toggle="{target:'#mediashare'}"><i class="material-icons md-icon">fullscreen</i></a>
            </div>
            <h2 class="md-card-toolbar-heading-text">SHARE OF MEDIA</h2>
        </div>
        <div id="mediashare" class="md-card-content">
            <div id="shareofmediabar" class="md-chart">Bar Chart</div>
        </div>
    </div>
</li>
