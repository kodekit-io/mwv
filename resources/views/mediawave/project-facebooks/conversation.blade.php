<li class="uk-width-medium-1-1">
    <div class="md-card hoverable">
        <div class="md-card-toolbar">
            <div class="md-card-toolbar-actions">
                <a class="btn waves-effect waves-light z-depth-0 amber lighten-4 tooltipped" data-position="top" data-delay="25" data-tooltip="Help"><i class="material-icons">help</i></a>
                <a class="btn waves-effect waves-light z-depth-0 green lighten-4 tooltipped" data-position="top" data-delay="25" data-tooltip="Minimize" data-uk-toggle="{target:'#authorwrap'}"><i class="material-icons md-icon">fullscreen</i></a>
            </div>
            <h2 class="md-card-toolbar-heading-text">INFLUENCER</h2>
        </div>
        <div id="authorwrap" class="md-card-content conv-wrap">
            <?php //INFLUENCER/AUTHOR TABLE ?>
            <table id="table_author" class="striped bordered highlight responsive-table">
                <thead>
                <tr>
                    <th>Author</th>
                    <th>Popular</th>
                    <th>Active</th>
                    <th>Impact</th>
                </tr>
                </thead>
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
            </table>
        </div>
    </div>
</li>
<li class="uk-width-medium-1-1">
    <div class="md-card hoverable">
        <div class="md-card-toolbar">
            <div class="md-card-toolbar-actions">
                <a class="btn waves-effect waves-light z-depth-0 amber lighten-4 tooltipped" data-position="top" data-delay="25" data-tooltip="Help"><i class="material-icons">help</i></a>
                <a class="btn waves-effect waves-light z-depth-0 green lighten-4 tooltipped" data-position="top" data-delay="25" data-tooltip="Minimize" data-uk-toggle="{target:'#convwrap'}"><i class="material-icons md-icon">fullscreen</i></a>
            </div>
            <h2 class="md-card-toolbar-heading-text">PUBLIC PAGE</h2>
        </div>
        <div id="convwrap" class="md-card-content conv-wrap">
            <?php //POSTS ?>
            <table id="table_facebook" class="striped bordered highlight responsive-table">
                <thead>
                <tr>
                    <th>Author</th>
                    <th>Posts</th>
                    <th>Comment</th>
                    <th>Like</th>
                    <th>Share</th>
                    <th>Media Type</th>
                    <th>Sentiment</th>
                    {{--<th><input type="checkbox" class="" id="" /><label for="">Select All</label></th>--}}
                </tr>
                </thead>
            </table>
        </div>
    </div>
</li>