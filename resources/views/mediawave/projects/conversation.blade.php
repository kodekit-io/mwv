<li class="uk-width-medium-1-1">
    <div class="md-card hoverable">
        <div class="md-card-toolbar">
            <div class="md-card-toolbar-actions">
                <a class="btn waves-effect waves-light z-depth-0 amber lighten-4 tooltipped" data-position="top" data-delay="25" data-tooltip="Help"><i class="material-icons">help</i></a>
                <a class="btn waves-effect waves-light z-depth-0 green lighten-4 tooltipped" data-position="top" data-delay="25" data-tooltip="Minimize" data-uk-toggle="{target:'#author'}"><i class="material-icons md-icon">fullscreen</i></a>
            </div>
            <h2 class="md-card-toolbar-heading-text">INFLUENCER</h2>
        </div>
        <div id="author" class="md-card-content conv-wrap">
            <table id="table_author" class="striped bordered highlight responsive-table">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Score</th>
                    <th>Value</th>
                    <th>Link</th>
                </tr>
                </thead>
                <tbody>
                @if (count($viewInfluencers) > 0)
                    @foreach($viewInfluencers->top10LikeStatus->data as $influencer)
                        <tr>
                            <td>{!! $influencer->name !!}</td>
                            <td>{!! $influencer->score !!}</td>
                            <td>{!! $influencer->value !!}</td>
                            <td><a href="{!! $influencer->url !!}" class="uk-button uk-button-mini uk-button-success white-text" target="_blank">See Details</a></td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
</li>

<li class="uk-width-medium-1-1">
    <div class="md-card hoverable">
        <div class="md-card-toolbar">
            <div class="md-card-toolbar-actions">
                <a class="btn waves-effect waves-light z-depth-0 amber lighten-4 tooltipped" data-position="top" data-delay="25" data-tooltip="Help"><i class="material-icons">help</i></a>
                <a class="btn waves-effect waves-light z-depth-0 green lighten-4 tooltipped" data-position="top" data-delay="25" data-tooltip="Minimize" data-uk-toggle="{target:'#conv'}"><i class="material-icons md-icon">fullscreen</i></a>
            </div>
            <h2 class="md-card-toolbar-heading-text">CONVERSATIONS</h2>
        </div>
        <div id="conv" class="md-card-content">
            <div class="row conv-wrap">
                <div class="col s12">
                    <ul class="tabs conv-tabs">
                        <li class="tab col s3"><a class="active light-blue-text" href="#convtwiter"><i class="uk-icon-twitter"></i> Twitter</a></li>
                        <li class="tab col s3"><a class="blue-text text-darken-4" href="#convfacebook"><i class="uk-icon-facebook"></i> Facebook</a></li>
                        <li class="tab col s3"><a class="brown-text text-accent-4" href="#convnews"><i class="material-icons">web</i> Online News</a></li>
                        <li class="tab col s3"><a class="lime-text text-darken-4" href="#convforum"><i class="material-icons">forum</i> Forum</a></li>
                        <li class="tab col s3"><a class="red-text text-darken-4" href="#convvideo"><i class="material-icons">videocam</i> Video</a></li>
                        <li class="tab col s3"><a class="orange-text text-darken-4" href="#convblog"><i class="material-icons">rss_feed</i> Blog</a></li>
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
                            <th></th>
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
                            <th>Author</th>
                            <th>Post</th>
                            <th>Comments</th>
                            <th>Likes</th>
                            <th>Shares</th>
                            <th>Media Type</th>
                            <th>Sentiment</th>
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
                            <th>Url</th>
                            <th>Comments</th>
                            <th>Summary</th>
                            <th>Sentiment</th>
                            <th>Reach</th>
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
                            <th>Author</th>
                            <th>Post</th>
                            <th>Original Reach</th>
                            <th>Viral Reach</th>
                            <th>Interactions</th>
                            <th>Viral Score</th>
                            <th>Sentiment</th>
                            <th>Link</th>
                            <th></th>
                        </tr>
                        </thead>
                    </table>
                </div>
                <div id="convvideo" class="">
                    <?php //VIDEO TABLE ?>
                    <table id="table_video" class="striped bordered highlight responsive-table">
                        <thead>
                        <tr>
                            <th>Author</th>
                            <th>Posts</th>
                            <th>Likes</th>
                            <th>Comments</th>
                            <th>Potential Reach</th>
                            <th>Sentiment</th>
                        </tr>
                        </thead>
                    </table>
                </div>
                <div id="convblog" class="">
                    <?php //BLOG TABLE ?>
                    <table id="table_blog" class="striped bordered highlight responsive-table">
                        <thead>
                        <tr>
                            <th>Authors</th>
                            <th>Title</th>
                            <th>Summary</th>
                            <th></th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>

</li>