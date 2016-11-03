<li class="uk-width-medium-1-1">
    <div class="md-card hoverable">
        <div class="md-card-toolbar">
            <div class="md-card-toolbar-actions">
                <a class="btn waves-effect waves-light z-depth-0 amber lighten-4 " data-uk-tooltip title="{{ config('tooltips.influencer') }}"><i class="material-icons">help</i></a>
                <a class="btn waves-effect waves-light z-depth-0 green lighten-4 " data-uk-tooltip title="Minimize" data-uk-toggle="{target:'#author'}"><i class="material-icons md-icon">fullscreen</i></a>
            </div>
            <h2 class="md-card-toolbar-heading-text">TOP 10 STATUS INFLUENCER</h2>
        </div>
        <div id="author" class="md-card-content conv-wrap">
			<table id="top10LikeStatus" class="striped bordered highlight responsive-table"></table>
        </div>
    </div>
</li>

<li class="uk-width-medium-1-1">
    <div class="md-card hoverable">
        <div class="md-card-toolbar">
            <div class="md-card-toolbar-actions">
                <a class="btn waves-effect waves-light z-depth-0 amber lighten-4 " data-uk-tooltip title="{{ config('tooltips.convotable') }}"><i class="material-icons">help</i></a>
                <a class="btn waves-effect waves-light z-depth-0 green lighten-4 " data-uk-tooltip title="Minimize" data-uk-toggle="{target:'#conv'}"><i class="material-icons md-icon">fullscreen</i></a>
            </div>
            <h2 class="md-card-toolbar-heading-text">CONVERSATIONS</h2>
        </div>
        <div id="conv" class="md-card-content convo-all">
            <div class="row conv-wrap">
                <div class="col s12">
                    <ul class="tabs conv-tabs">
                        <li class="tab col s3"><a class="active light-blue-text" href="#convtwiter"><i class="uk-icon-twitter"></i> Twitter</a></li>
                        <li class="tab col s3"><a class="blue-text text-darken-4" href="#convfacebook"><i class="uk-icon-facebook"></i> Facebook</a></li>
                        <li class="tab col s3"><a class="brown-text text-accent-4" href="#convnews"><i class="material-icons">web</i> Online News</a></li>
                        <li class="tab col s3"><a class="lime-text text-darken-4" href="#convforum"><i class="material-icons">forum</i> Forum</a></li>
                        <li class="tab col s3"><a class="red-text text-darken-4" href="#convvideo"><i class="material-icons">videocam</i> Video</a></li>
                        <li class="tab col s3"><a class="orange-text text-darken-4" href="#convblog"><i class="material-icons">rss_feed</i> Blog</a></li>
                        <li class="tab col s3"><a class="brown-text text-darken-4" href="#convig"><i class="uk-icon-instagram"></i> Instagram</a></li>
                    </ul>
                </div>
                <div id="convtwiter" class="">
                    <?php //TWITTER TABLE ?>
                    <table id="table_twitter" class="striped bordered highlight responsive-table">
                        <thead>
                        <tr>
                            <th>Date</th>
                            <th>Author</th>
                            <th>Post</th>
                            <th>Original Reach</th>
                            <th>Viral Reach</th>
                            <th>Interactions</th>
                            <th>Viral Score</th>
                            <th>Sentiment</th>
                            <th>Link</th>
                        </tr>
                        </thead>
                    </table>
                </div>
                <div id="convfacebook" class="">
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
                <div id="convnews" class="">
                    <?php //NEWS TABLE ?>
                    <table id="table_news" class="striped bordered highlight responsive-table">
                        <thead>
                        <tr>
                            <th>Date</th>
                            <th>Media</th>
                            <th>Title</th>
                            <th>Summary</th>
                            <th>Comments</th>
                            <th>Reach</th>
                            <th>Sentiment</th>
                            <th>Media Url</th>
                            <th>Url</th>
                        </tr>
                        </thead>
                    </table>
                </div>
                <div id="convforum" class="">
                    <?php //FORUM TABLE ?>
                    <table id="table_forum" class="striped bordered highlight responsive-table">
                        <thead>
                        <tr>
                            <th>Date</th>
                            <th>Forum</th>
                            <th>Thread Starter</th>
                            <th>Thread Title</th>
                            <th>Replies</th>
                            <th>Sentiment</th>
                            <th>Url</th>
                        </tr>
                        </thead>
                    </table>
                </div>
                <div id="convvideo" class="">
                    <?php //VIDEO TABLE ?>
                    <table id="table_video" class="striped bordered highlight responsive-table">
                        <thead>
                        <tr>
                            <th>Date</th>
                            <th>Author</th>
                            <th>Post</th>
                            <th>Likes</th>
                            <th>Comments</th>
                            <th>View</th>
                            <th>Author Url</th>
                            <th>Post Url</th>
                        </tr>
                        </thead>
                    </table>
                </div>
                <div id="convblog" class="">
                    <?php //BLOG TABLE ?>
                    <table id="table_blog" class="striped bordered highlight responsive-table">
                        <thead>
                        <tr>
                            <th>Date</th>
                            <th>Author</th>
                            <th>Title</th>
                            <th>Summary</th>
                            <th>Author Url</th>
                            <th>Url</th>
                        </tr>
                        </thead>
                    </table>
                </div>
                <div id="convig" class="">
                    <?php //IG TABLE ?>
                    <table id="table_ig" class="striped bordered highlight responsive-table"></table>
                </div>
            </div>
        </div>
    </div>

</li>
