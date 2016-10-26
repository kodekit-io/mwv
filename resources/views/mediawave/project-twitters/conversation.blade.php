<li class="uk-width-medium-1-1">
    <div class="md-card hoverable">
        <div class="md-card-toolbar">
            <div class="md-card-toolbar-actions">
                <a class="btn waves-effect waves-light z-depth-0 amber lighten-4" data-uk-tooltip title="{{ config('tooltips.convotable') }}"><i class="material-icons">help</i></a>
                <a class="btn waves-effect waves-light z-depth-0 green lighten-4" data-uk-tooltip title="Minimize" data-uk-toggle="{target:'#conv'}"><i class="material-icons md-icon">fullscreen</i></a>
            </div>
            <h2 class="md-card-toolbar-heading-text">TWITTER CONVERSATIONS</h2>
            <?php /*
            <div class="md-card-toolbar-heading-text">
                <ul class="uk-subnav uk-subnav-pill" data-uk-switcher="{connect:'#convwrap ul'}">
                    <li class="uk-active"><a class="active" href="#convposts">Posts</a></li>
                    <li><a href="#convhashtags">Hashtags</a></li>
                    <li><a href="#convlinks">Links</a></li>
                </ul>
            </div>
            */ ?>
        </div>
        <div id="convwrap" class="md-card-content conv-wrap">
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
            <?php /*
            <ul class="uk-switcher">
                <li>
                    <div id="convposts" class="col s12">
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
                </li>
                <li>
                    <div id="convhashtags" class="col s12">
                        <?php //HASHTAG  ?>
                        <table id="table_hashtag" class="striped bordered highlight responsive-table">
                            <thead>
                            <tr>
                                <th>Author</th>
                                <th>Posts</th>
                                <th>Original Reach</th>
                                <th>Viral Reach</th>
                                <th>Interactions</th>
                                <th>Viral Score</th>
                                <th>Sentiment</th>
                                <th><input type="checkbox" class="" id="" /><label for="">Select All</label></th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </li>
                <li>
                    <div id="convlinks" class="col s12">
                        <?php //LINKS ?>
                        <table id="table_links"  class="striped bordered highlight responsive-table">
                            <thead>
                            <tr>
                                <th>Site</th>
                                <th>Title</th>
                                <th>Original Reach</th>
                                <th>Viral Reach</th>
                                <th>Interactions</th>
                                <th>Viral Score</th>
                                <th>Sentiment</th>
                                <th><input type="checkbox" class="" id="" /><label for="">Select All</label></th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </li>
            </ul>
            */ ?>
        </div>
    </div>

</li>
