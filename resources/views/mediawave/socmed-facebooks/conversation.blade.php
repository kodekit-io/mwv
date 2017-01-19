<li class="uk-width-medium-1-1">
    <div class="md-card hoverable">
        <div class="md-card-toolbar">
            <div class="md-card-toolbar-actions">
                <a class="btn waves-effect waves-light z-depth-0 amber lighten-4" data-uk-tooltip title="{{ config('tooltips.convotable') }}"><i class="material-icons">help</i></a>
                <a class="btn waves-effect waves-light z-depth-0 green lighten-4" data-uk-tooltip title="Minimize" data-uk-toggle="{target:'#convfacebook'}"><i class="material-icons md-icon">fullscreen</i></a>
            </div>
            <h2 class="md-card-toolbar-heading-text">PUBLIC PAGE</h2>
        </div>
        <div id="convfacebook" class="md-card-content">
            <?php //FB TABLE ?>
            <table id="table_facebook" class="uk-table uk-table-hover uk-table-striped uk-margin-remove responsive-table"></table>
        </div>
    </div>
</li>
