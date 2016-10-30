<li class="uk-width-medium-1-1">
    <div class="md-card hoverable">
        <div class="md-card-toolbar">
            <div class="md-card-toolbar-actions">
                <a class="btn waves-effect waves-light z-depth-0 amber lighten-4" data-uk-tooltip title="{{ config('tooltips.influencer') }}"><i class="material-icons">help</i></a>
                <a class="btn waves-effect waves-light z-depth-0 green lighten-4" data-uk-tooltip title="Minimize" data-uk-toggle="{target:'#authorwrap'}"><i class="material-icons md-icon">fullscreen</i></a>
            </div>
            <div class="md-card-toolbar-heading-text">
                <ul class="uk-subnav uk-subnav-pill" data-uk-switcher="{connect:'#authorwrap ul'}">
                    <li class="uk-active"><a>TOP LIKE STATUS</a></li>
                    <li><a>TOP LIKE PHOTO</a></li>
                    <li><a>TOP LIKE LINK</a></li>
                    <li><a>TOP LIKE VIDEO</a></li>
                </ul>
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
