<li class="uk-width-medium-1-1">
    <?php //WORDS CLOUD ?>
    <div class="md-card hoverable">
        <div class="md-card-toolbar">
            <div class="md-card-toolbar-actions">
                <a class="btn waves-effect waves-light z-depth-0 amber lighten-4" data-uk-tooltip title="{{ config('tooltips.wordclouds') }}"><i class="material-icons">help</i></a>
                <a class="btn waves-effect waves-light z-depth-0 green lighten-4" data-uk-tooltip title="Minimize" data-uk-toggle="{target:'#wordcloud'}"><i class="material-icons md-icon">fullscreen</i></a>
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
                <ul class="uk-subnav uk-subnav-pill" data-uk-switcher="{connect:'#influencer ul'}">
                    <li class="uk-active"><a>TOP LIKE VIDEO</a></li>
                    <?php /*
                    <li class="uk-active"><a>TOP LIKE VIDEO</a></li>
                    <li><a>TOP RATE VIDEO</a></li>
                    */ ?>
                </ul>
            </div>
        </div>
        <div id="influencer" class="md-card-content conv-wrap">
            <?php //INFLUENCER/AUTHOR TABLE ?>
            <ul class="uk-switcher">
                <?php /*
                <li>
                    <table id="topLikeVid" class="uk-table uk-table-hover uk-table-striped uk-margin-remove responsive-table"></table>
                </li>
                <li>
                    <table id="topRateVid" class="uk-table uk-table-hover uk-table-striped uk-margin-remove responsive-table"></table>
                </li>
                */ ?>
                <li>
                    <table id="top10LikeStatus" class="uk-table uk-table-hover uk-table-striped uk-margin-remove responsive-table"></table>
                </li>
            </ul>
        </div>
    </div>
</li>
<li class="uk-width-medium-1-1">
    <div class="md-card hoverable">
        <div class="md-card-toolbar">
            <div class="md-card-toolbar-actions">
                <a class="btn waves-effect waves-light z-depth-0 amber lighten-4" data-uk-tooltip title="{{ config('tooltips.convotable') }}"><i class="material-icons">help</i></a>
                <a class="btn waves-effect waves-light z-depth-0 green lighten-4" data-uk-tooltip title="Minimize" data-uk-toggle="{target:'#convwrap'}"><i class="material-icons md-icon">fullscreen</i></a>
            </div>
            <h2 class="md-card-toolbar-heading-text">VIDEO POST</h2>
        </div>
        <div id="convwrap" class="md-card-content conv-wrap">
			<?php //VIDEO TABLE ?>
			<table id="table_video" class="uk-table uk-table-hover uk-table-striped uk-margin-remove responsive-table"></table>
        </div>
    </div>

</li>
