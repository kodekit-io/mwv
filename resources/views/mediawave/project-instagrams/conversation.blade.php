<li class="uk-width-medium-1-1">
    <div class="md-card hoverable">
        <div class="md-card-toolbar">
            <div class="md-card-toolbar-actions">
                <a class="btn waves-effect waves-light z-depth-0 amber lighten-4" data-uk-tooltip title="{{ config('tooltips.convotable') }}"><i class="material-icons">help</i></a>
                <a class="btn waves-effect waves-light z-depth-0 green lighten-4" data-uk-tooltip title="Minimize" data-uk-toggle="{target:'#convwrap'}"><i class="material-icons md-icon">fullscreen</i></a>
            </div>
            <h2 class="md-card-toolbar-heading-text">INSTAGRAM POST</h2>
        </div>
        <div id="convwrap" class="md-card-content conv-wrap">
            <?php //POSTS ?>
            <table id="table_ig" class="uk-table uk-table-hover uk-table-striped uk-margin-remove responsive-table"></table>
        </div>
    </div>
</li>
