<li class="uk-width-medium-1-1">
    <div class="md-card hoverable">
        <div class="md-card-toolbar">
            <div class="md-card-toolbar-actions">
                <a class="btn waves-effect waves-light z-depth-0 amber lighten-4" data-uk-tooltip title="{{ config('tooltips.influencer') }}"><i class="material-icons">help</i></a>
                <a class="btn waves-effect waves-light z-depth-0 green lighten-4" data-uk-tooltip title="Minimize" data-uk-toggle="{target:'#author'}"><i class="material-icons md-icon">fullscreen</i></a>
            </div>
            <div class="md-card-toolbar-heading-text">
                <ul class="uk-subnav uk-subnav-pill" data-uk-switcher="{connect:'#authorwrap ul'}">
                    <li class="uk-active"><a>TOP REACH</a></li>
                    <li><a>TOP POST</a></li>
                    <li><a>TOP IMPACT</a></li>
                </ul>
            </div>
        </div>
        <div id="authorwrap" class="md-card-content conv-wrap">
            <?php //INFLUENCER/AUTHOR TABLE ?>
            <ul class="uk-switcher">
                <li>
                    <table id="top10ByReachTW" class="striped bordered highlight responsive-table"></table>
                </li>
                <li>
                    <table id="top10ByNumberTW" class="striped bordered highlight responsive-table"></table>
                </li>
                <li>
                    <table id="top10ByImpactTW" class="striped bordered highlight responsive-table"></table>
                </li>
            </ul>
        </div>
    </div>
</li>
