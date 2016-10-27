<li class="uk-width-medium-1-1">
    <?php //WORDS CLOUD ?>
    <div class="md-card hoverable">
        <div class="md-card-toolbar">
            <div class="md-card-toolbar-actions">
                <a class="btn waves-effect waves-light z-depth-0 amber lighten-4" data-uk-tooltip title="Help"><i class="material-icons">help</i></a>
                <a class="btn waves-effect waves-light z-depth-0 green lighten-4" data-uk-tooltip title="Minimize" data-uk-toggle="{target:'#wordcloud'}"><i class="material-icons md-icon">fullscreen</i></a>
            </div>
            <h2 class="md-card-toolbar-heading-text">WORD CLOUDS</h2>
        </div>
        <div id="wordcloud" class="md-card-content">
            <div id="id-chartnya-disini" class="md-chart"></div>
        </div>
    </div>
</li>

<li class="uk-width-medium-1-1">
    <div class="md-card hoverable">
        <div class="md-card-toolbar">
            <div class="md-card-toolbar-actions">
                <a class="btn waves-effect waves-light z-depth-0 amber lighten-4" data-uk-tooltip title="Help"><i class="material-icons">help</i></a>
                <a class="btn waves-effect waves-light z-depth-0 green lighten-4" data-uk-tooltip title="Minimize" data-uk-toggle="{target:'#author'}"><i class="material-icons md-icon">fullscreen</i></a>
            </div>
            <h2 class="md-card-toolbar-heading-text">INFLUENCER</h2>
        </div>
        <div id="author" class="md-card-content conv-wrap">
            <?php //INFLUENCER/AUTHOR TABLE ?>
            <table id="table_author"  class="striped bordered highlight responsive-table">
                <thead>
                <tr>
                    <th>Author</th>
                    <th>Popular</th>
                    <th>Active</th>
                    <th>Impact</th>
                    <th></th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
</li>