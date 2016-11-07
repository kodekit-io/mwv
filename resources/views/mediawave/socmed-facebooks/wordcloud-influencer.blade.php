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
        <div id="wordcloudwrap" class="md-card-content">
            <div id="wordcloud-container" class="md-chart"></div>
        </div>
    </div>
</li>

<li class="uk-width-medium-1-1">
    <div class="md-card hoverable">
        <div class="md-card-toolbar">
            <div class="md-card-toolbar-actions">
                <a class="btn waves-effect waves-light z-depth-0 amber lighten-4" data-uk-tooltip title="{{ config('tooltips.influencer') }}"><i class="material-icons">help</i></a>
                <a class="btn waves-effect waves-light z-depth-0 green lighten-4" data-uk-tooltip title="Minimize" data-uk-toggle="{target:'#authorwrap'}"><i class="material-icons md-icon">fullscreen</i></a>
            </div>
            <div class="md-card-toolbar-heading-text uk-hidden-small">
                <ul class="uk-subnav uk-subnav-pill" data-uk-switcher="{connect:'#authorwrap ul'}">
                    <li class="uk-active"><a>TOP LIKE STATUS</a></li>
                    <li><a>TOP LIKE PHOTO</a></li>
                    <li><a>TOP LIKE LINK</a></li>
                    <li><a>TOP LIKE VIDEO</a></li>
                </ul>
            </div>
            <div class="uk-button-dropdown uk-visible-small" data-uk-dropdown="{mode:'click'}">
                <button class="uk-button">CHOOSE <i class="uk-icon-caret-down"></i></button>
                <div class="uk-dropdown uk-dropdown-top">
                    <ul class="uk-nav uk-nav-dropdown" data-uk-switcher="{connect:'#authorwrap ul'}">
                        <li class="uk-active"><a>TOP LIKE STATUS</a></li>
                        <li><a>TOP LIKE PHOTO</a></li>
                        <li><a>TOP LIKE LINK</a></li>
                        <li><a>TOP LIKE VIDEO</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div id="authorwrap" class="md-card-content conv-wrap">
            <?php //INFLUENCER/AUTHOR TABLE ?>
            <ul class="uk-switcher">
                <li>
                    <table id="top10LikeStatusFB" class="striped bordered highlight responsive-table"></table>
                </li>
                <li>
                    <table id="top10LikePhotoFB" class="striped bordered highlight responsive-table"></table>
                </li>
                <li>
                    <table id="top10LikeLinkFB" class="striped bordered highlight responsive-table"></table>
                </li>
                <li>
                    <table id="top10LikeVideoFB" class="striped bordered highlight responsive-table"></table>
                </li>
            </ul>
        </div>
    </div>
</li>
