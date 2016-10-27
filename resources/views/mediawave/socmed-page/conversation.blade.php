<li class="uk-width-medium-1-1">
    <div class="md-card hoverable">
        <div class="md-card-toolbar">
            <div class="md-card-toolbar-actions">
                <a class="btn waves-effect waves-light z-depth-0 amber lighten-4" data-uk-tooltip title="Help"><i class="material-icons">help</i></a>
                <a class="btn waves-effect waves-light z-depth-0 green lighten-4" data-uk-tooltip title="Minimize" data-uk-toggle="{target:'#convwrap'}"><i class="material-icons md-icon">fullscreen</i></a>
            </div>
            <h2 class="md-card-toolbar-heading-text">CONVERSATIONS</h2>
        </div>

        <div id="convwrap" class="md-card-content">
            <div class="row conv-wrap">
                <?php //POST TABLE ?>
                <table id="table_post" class="striped bordered highlight responsive-table">
                    <thead>
                    <tr>
                        <th>Author</th>
                        <th>Post</th>
                        <th>Original Reach</th>
                        <th>Interaction</th>
                        <th>Viral Reach</th>
                        <th>Viral Score</th>
                        <th>Sentiment</th>
                        <th></th>
                    </tr>
                    </thead>
                </table>

            </div>
        </div>
    </div>
</li>