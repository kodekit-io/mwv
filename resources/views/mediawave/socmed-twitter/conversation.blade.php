<li class="uk-width-medium-1-1">
    <div class="md-card hoverable">
        <div class="md-card-toolbar">
            <div class="md-card-toolbar-actions">
                <a class="btn waves-effect waves-light z-depth-0 amber lighten-4" data-uk-tooltip title="{{ config('tooltips.convotable') }}"><i class="material-icons">help</i></a>
                <a class="btn waves-effect waves-light z-depth-0 green lighten-4" data-uk-tooltip title="Minimize" data-uk-toggle="{target:'#convtwiter'}"><i class="material-icons md-icon">fullscreen</i></a>
            </div>
            <h2 class="md-card-toolbar-heading-text">TWITTER CONVERSATIONS</h2>
        </div>
        <div id="convtwiter" class="md-card-content">
            <?php //TWITTER TABLE ?>
            <table id="table_twitter" class="striped bordered highlight responsive-table"></table>
        </div>
    </div>

</li>
