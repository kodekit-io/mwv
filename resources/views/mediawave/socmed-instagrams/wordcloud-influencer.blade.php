<li class="uk-width-medium-1-1">
    <?php //WORDS CLOUD ?>
    <div class="md-card hoverable">
        <div class="md-card-toolbar">
            <div class="md-card-toolbar-actions">
                <a class="btn waves-effect waves-light z-depth-0 amber lighten-4" data-uk-tooltip title="{{ config('tooltips.wordclouds') }}"><i class="material-icons">help</i></a>
                <a class="btn waves-effect waves-light z-depth-0 green lighten-4" data-uk-tooltip title="Minimize" data-uk-toggle="{target:'#wordcloudwrap'}"><i class="material-icons md-icon">fullscreen</i></a>
            </div>
            <h2 class="md-card-toolbar-heading-text">WORD CLOUDS</h2>
        </div>
        <div id="wordcloud" class="md-card-content">
            <div id="wordcloud-container" class="md-chart"></div>
        </div>
    </div>
</li>

<li class="uk-width-medium-1-1">
    <div class="md-card hoverable">
        <div class="md-card-toolbar">
            <div class="md-card-toolbar-actions">
                <a class="btn waves-effect waves-light z-depth-0 amber lighten-4" data-uk-tooltip title="{{ config('tooltips.influencer') }}"><i class="material-icons">help</i></a>
                <a class="btn waves-effect waves-light z-depth-0 green lighten-4" data-uk-tooltip title="Minimize" data-uk-toggle="{target:'#author'}"><i class="material-icons md-icon">fullscreen</i></a>
            </div>
            <div class="md-card-toolbar-heading-text">
                <ul class="uk-subnav uk-subnav-pill" data-uk-switcher="{connect:'#author ul'}">
                    <li class="uk-active"><a>TOP COMMENT</a></li>
                    <li><a>TOP LOVE</a></li>
                    <li><a>TOP VIEW</a></li>
                </ul>
            </div>
        </div>
        <div id="author" class="md-card-content conv-wrap">
            <?php //TOP COMMENT ?>
            <ul class="uk-switcher">
                <li><table id="topCommentIG" class="uk-table uk-table-hover uk-table-striped uk-margin-remove responsive-table"></table></li>
                <li><table id="topLoveIG" class="uk-table uk-table-hover uk-table-striped uk-margin-remove responsive-table"></table></li>
                <li><table id="topViewIG" class="uk-table uk-table-hover uk-table-striped uk-margin-remove responsive-table"></table></li>
            </ul>

        </div>
    </div>
</li>
