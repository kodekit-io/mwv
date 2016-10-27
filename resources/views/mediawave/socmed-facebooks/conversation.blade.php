<li class="uk-width-medium-1-1">
    <div class="md-card hoverable">
        <div class="md-card-toolbar">
            <div class="md-card-toolbar-actions">
                <a class="btn waves-effect waves-light z-depth-0 amber lighten-4" data-uk-tooltip title="Help"><i class="material-icons">help</i></a>
                <a class="btn waves-effect waves-light z-depth-0 green lighten-4" data-uk-tooltip title="Minimize" data-uk-toggle="{target:'#convwrap'}"><i class="material-icons md-icon">fullscreen</i></a>
            </div>
            <h2 class="md-card-toolbar-heading-text">PUBLIC PAGE</h2>
        </div>
        <div id="convwrap" class="md-card-content conv-wrap">
            <?php //POSTS ?>
            <table id="table_page" class="striped bordered highlight responsive-table">
                <thead>
                <tr>
                    <th>Author</th>
                    <th>Posts</th>
                    <th>Comment</th>
                    <th>Like</th>
                    <th>Share</th>
                    <th>Media Type</th>
                    <th>Sentiment</th>
                    <th><input type="checkbox" class="" id="selectall" /><label for="selectall">Select All</label></th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
</li>