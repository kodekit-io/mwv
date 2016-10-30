
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
            <table id="table_facebook" class="striped bordered highlight responsive-table">
                <thead>
                <tr>
                    <th>Date</th>
                    <th>Page</th>
                    <th>Post</th>
                    <th>Comments</th>
                    <th>Likes</th>
                    <th>Shares</th>
                    <th>Media Type</th>
                    <th>Sentiment</th>
                    {{--<th>Page Link</th>--}}
                    <th>Post Link</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
</li>
