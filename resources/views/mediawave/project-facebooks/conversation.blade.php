<li class="uk-width-medium-1-1">
    <div class="md-card hoverable">
        <div class="md-card-toolbar">
            <div class="md-card-toolbar-actions">
                <a class="btn waves-effect waves-light z-depth-0 amber lighten-4" data-uk-tooltip title="{{ config('tooltips.influencer') }}"><i class="material-icons">help</i></a>
                <a class="btn waves-effect waves-light z-depth-0 green lighten-4" data-uk-tooltip title="Minimize" data-uk-toggle="{target:'#influencer'}"><i class="material-icons md-icon">fullscreen</i></a>
            </div>
            <div class="md-card-toolbar-heading-text uk-hidden-small">
                <ul class="uk-subnav uk-subnav-pill" data-uk-switcher="{connect:'#influencer ul'}">
                    <li class="uk-active"><a>TOP LIKE STATUS</a></li>
                    <li><a>TOP LIKE PHOTO</a></li>
                    <li><a>TOP LIKE LINK</a></li>
                    <li><a>TOP LIKE VIDEO</a></li>
                </ul>
            </div>
            <div class="uk-button-dropdown uk-visible-small" data-uk-dropdown="{mode:'click'}">
                <button class="uk-button">CHOOSE <i class="uk-icon-caret-down"></i></button>
                <div class="uk-dropdown uk-dropdown-top">
                    <ul class="uk-nav uk-nav-dropdown" data-uk-switcher="{connect:'#influencer ul'}">
                        <li class="uk-active"><a>TOP LIKE STATUS</a></li>
                        <li><a>TOP LIKE PHOTO</a></li>
                        <li><a>TOP LIKE LINK</a></li>
                        <li><a>TOP LIKE VIDEO</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div id="influencer" class="md-card-content conv-wrap">
            <?php //INFLUENCER/AUTHOR TABLE ?>
            <ul class="uk-switcher">
                <li>
                    <table id="topStatusFB" class="striped bordered highlight responsive-table"></table>
                </li>
                <li>
                    <table id="topPhotoFB" class="striped bordered highlight responsive-table"></table>
                </li>
                <li>
                    <table id="topLinkFB" class="striped bordered highlight responsive-table"></table>
                </li>
                <li>
                    <table id="topVideoFB" class="striped bordered highlight responsive-table"></table>
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
                <a class="btn waves-effect waves-light z-depth-0 green lighten-4" data-uk-tooltip title="Minimize" data-uk-toggle="{target:'#convfacebook'}"><i class="material-icons md-icon">fullscreen</i></a>
            </div>
            <h2 class="md-card-toolbar-heading-text">PUBLIC PAGE</h2>
        </div>
        <div id="convfacebook" class="md-card-content">
            <?php //FB TABLE ?>
            <table id="table_facebook" class="striped bordered highlight responsive-table"></table>
        </div>
    </div>
</li>
