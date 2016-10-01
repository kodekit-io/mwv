@extends('layouts.mediawave')

@section('page-level-styles')
    <link rel="stylesheet" href="{!! asset('mediawave/css/dataTables.mw.css') !!}" />
@endsection

@section('content')
@include('layouts.project-subnav')
    <main class="uk-width-1-1">
        <div class="md-container">
            <div class="md-card uk-width-1-1 md-keywords">
                <div class="md-card-toolbar">
                    <h1 class="md-card-toolbar-heading-text large proxima-nova-bold">
                        Project Name: {!! $project->pname !!}
                    </h1>
                </div>
                <form class="md-card-content" action="{!! url('project-detail/' . $project->pid) !!}" method="POST">
                    {{ csrf_field() }}
                    @if (count($keywords) > 0)
                    <ul class="uk-subnav left">
                        @foreach($keywords as $key => $keywords)
                        <li class="">
                            <input type="checkbox" name="keywords[]" value="{!! $key !!}" class="filled-in" id="{!! $key !!}" {!! $keywords['selected'] !!}  />
                            <label for="{!! $key !!}">{!! $keywords['value'] !!}</label>
                        </li>
                       @endforeach
                    </ul>
                    @endif

                    <div class="nav-wrapper right">
                        <div class="input-field md-daterange">
                            <input id="startdate" name="start_date" type="text" class="uk-datepicker" data-uk-datepicker="{pos:'bottom',format:'DD/MM/YY'}" placeholder="10/12/16" value="{!! $startDate !!}">
                            <label for="startdate"><i class="material-icons prefix">date_range</i></label>
                        </div> -
                        <div class="input-field md-daterange">
                            <input id="enddate" name="end_date" type="text" class="uk-datepicker" data-uk-datepicker="{pos:'bottom',format:'DD/MM/YY'}" placeholder="17/12/16" value="{!! $endDate !!}">
                            <label for="enddate"><i class="material-icons prefix">date_range</i></label>
                        </div>
                        <button class="btn pink darken-4 uk-margin-left z-depth-0" name="filter" value="1" type="submit">UPDATE</button>
                    </div>
                </form>
            </div>
            <ul class="uk-grid uk-grid-medium" data-uk-grid data-uk-grid-margin>
                <li class="uk-width-medium-1-2">
                    <div class="md-card hoverable">
                        <div class="md-card-toolbar">
                            <div class="md-card-toolbar-actions">
                                <a class="btn waves-effect waves-light z-depth-0 amber lighten-4 tooltipped" data-position="top" data-delay="25" data-tooltip="Help"><i class="material-icons">help</i></a>
                                <a class="btn waves-effect waves-light z-depth-0 green lighten-4 tooltipped" data-position="top" data-delay="25" data-tooltip="Minimize" data-uk-toggle="{target:'#brandequity'}"><i class="material-icons md-icon">fullscreen</i></a>
                            </div>
                            <h2 class="md-card-toolbar-heading-text">BRAND EQUITY</h2>
                        </div>
                        <div id="brandequity" class="md-card-content">
                            <div id="brand-equity-container" class="md-chart"></div>
                        </div>
                    </div>
                </li>
                <li class="uk-width-medium-1-2">
                    <div class="md-card hoverable">
                        <div class="md-card-toolbar">
                            <div class="md-card-toolbar-actions">
                                <a class="btn waves-effect waves-light z-depth-0 amber lighten-4 tooltipped" data-position="top" data-delay="25" data-tooltip="Help"><i class="material-icons">help</i></a>
                                <a class="btn waves-effect waves-light z-depth-0 green lighten-4 tooltipped" data-position="top" data-delay="25" data-tooltip="Minimize" data-uk-toggle="{target:'#trend'}"><i class="material-icons md-icon">fullscreen</i></a>
                            </div>
                            <div class="md-card-toolbar-heading-text">
                                <ul class="uk-subnav uk-subnav-pill" data-uk-switcher="{connect:'#trend ul'}">
                                    <li class="uk-active"><a>BUZZ TREND</a></li>
                                    <li><a>POST TREND</a></li>
                                    <li><a>REACH TREND</a></li>
                                    <li><a>INTERACTIONS</a></li>
                                </ul>
                            </div>

                        </div>
                        <?php //TRENDS ?>
                        <div id="trend" class="md-card-content">
                            <ul class="uk-switcher">
                                <li>
                                    <div id="buzztrend" class="md-chart"></div>
                                </li>
                                <li>
                                    <div id="posttrend" class="md-chart">Line Chart</div>
                                </li>
                                <li>
                                    <div id="reachtrend" class="md-chart">Line Chart</div>
                                </li>
                                <li>
                                    <div id="interacttrend" class="md-chart">Line Chart</div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
                <li class="uk-width-medium-1-4">
                    <?php //BUZZ PIE ?>
                    <div class="md-card hoverable">
                        <div class="md-card-toolbar">
                            <div class="md-card-toolbar-actions">
                                <a class="btn waves-effect waves-light z-depth-0 amber lighten-4 tooltipped" data-position="top" data-delay="25" data-tooltip="Help"><i class="material-icons">help</i></a>
                                <a class="btn waves-effect waves-light z-depth-0 green lighten-4 tooltipped" data-position="top" data-delay="25" data-tooltip="Minimize" data-uk-toggle="{target:'#buzz'}"><i class="material-icons md-icon">fullscreen</i></a>
                            </div>
                            <h2 class="md-card-toolbar-heading-text">BUZZ</h2>
                        </div>
                        <div id="buzz" class="md-card-content">
                            <div id="buzz-container" class="md-chart">Pie Chart</div>
                        </div>
                    </div>
                </li>
                <li class="uk-width-medium-1-4">
                    <?php //POST PIE ?>
                    <div class="md-card hoverable">
                        <div class="md-card-toolbar">
                            <div class="md-card-toolbar-actions">
                                <a class="btn waves-effect waves-light z-depth-0 amber lighten-4 tooltipped" data-position="top" data-delay="25" data-tooltip="Help"><i class="material-icons">help</i></a>
                                <a class="btn waves-effect waves-light z-depth-0 green lighten-4 tooltipped" data-position="top" data-delay="25" data-tooltip="Minimize" data-uk-toggle="{target:'#post'}"><i class="material-icons md-icon">fullscreen</i></a>
                            </div>
                            <h2 class="md-card-toolbar-heading-text">POST</h2>
                        </div>
                        <div id="post" class="md-card-content">
                            <div id="id-chartnya-disini" class="md-chart">Pie Chart</div>
                        </div>
                    </div>
                </li>
                <li class="uk-width-medium-1-4">
                    <?php //INTERACTIONS PIE ?>
                    <div class="md-card hoverable">
                        <div class="md-card-toolbar">
                            <div class="md-card-toolbar-actions">
                                <a class="btn waves-effect waves-light z-depth-0 amber lighten-4 tooltipped" data-position="top" data-delay="25" data-tooltip="Help"><i class="material-icons">help</i></a>
                                <a class="btn waves-effect waves-light z-depth-0 green lighten-4 tooltipped" data-position="top" data-delay="25" data-tooltip="Minimize" data-uk-toggle="{target:'#interaction'}"><i class="material-icons md-icon">fullscreen</i></a>
                            </div>
                            <h2 class="md-card-toolbar-heading-text">INTERACTIONS</h2>
                        </div>
                        <div id="interaction" class="md-card-content">
                            <div id="id-chartnya-disini" class="md-chart">Pie Chart</div>
                        </div>
                    </div>
                </li>
                <li class="uk-width-medium-1-4">
                    <?php //UNIQUE USERS PIE ?>
                    <div class="md-card hoverable">
                        <div class="md-card-toolbar">
                            <div class="md-card-toolbar-actions">
                                <a class="btn waves-effect waves-light z-depth-0 amber lighten-4 tooltipped" data-position="top" data-delay="25" data-tooltip="Help"><i class="material-icons">help</i></a>
                                <a class="btn waves-effect waves-light z-depth-0 green lighten-4 tooltipped" data-position="top" data-delay="25" data-tooltip="Minimize" data-uk-toggle="{target:'#unique'}"><i class="material-icons md-icon">fullscreen</i></a>
                            </div>
                            <h2 class="md-card-toolbar-heading-text">UNIQUE USERS</h2>
                        </div>
                        <div id="unique" class="md-card-content">
                            <div id="id-chartnya-disini" class="md-chart">Pie Chart</div>
                        </div>
                    </div>
                </li>
                <li class="uk-width-medium-1-3">
                    <?php //SENTIMENT BAR ?>
                    <div class="md-card hoverable">
                        <div class="md-card-toolbar">
                            <div class="md-card-toolbar-actions">
                                <a class="btn waves-effect waves-light z-depth-0 amber lighten-4 tooltipped" data-position="top" data-delay="25" data-tooltip="Help"><i class="material-icons">help</i></a>
                                <a class="btn waves-effect waves-light z-depth-0 green lighten-4 tooltipped" data-position="top" data-delay="25" data-tooltip="Minimize" data-uk-toggle="{target:'#sentiment'}"><i class="material-icons md-icon">fullscreen</i></a>
                            </div>
                            <h2 class="md-card-toolbar-heading-text">SENTIMENT</h2>
                        </div>
                        <div id="sentiment" class="md-card-content">
                            <div id="share-brand-container" class="md-chart">Bar Chart</div>
                        </div>
                    </div>
                </li>
                <li class="uk-width-medium-1-3">
                    <?php //INTERACTION RATE BAR (with mid-range) ?>
                    <div class="md-card hoverable">
                        <div class="md-card-toolbar">
                            <div class="md-card-toolbar-actions">
                                <a class="btn waves-effect waves-light z-depth-0 amber lighten-4 tooltipped" data-position="top" data-delay="25" data-tooltip="Help"><i class="material-icons">help</i></a>
                                <a class="btn waves-effect waves-light z-depth-0 green lighten-4 tooltipped" data-position="top" data-delay="25" data-tooltip="Minimize" data-uk-toggle="{target:'#ir'}"><i class="material-icons md-icon">fullscreen</i></a>
                            </div>
                            <h2 class="md-card-toolbar-heading-text">INTERACTION RATE</h2>
                        </div>
                        <div id="ir" class="md-card-content">
                            <div id="id-chartnya-disini" class="md-chart">Bar Chart</div>
                        </div>
                    </div>
                </li>
                <li class="uk-width-medium-1-3">
                    <?php //SHARE OF MEDIA BAR ?>
                    <div class="md-card hoverable">
                        <div class="md-card-toolbar">
                            <div class="md-card-toolbar-actions">
                                <a class="btn waves-effect waves-light z-depth-0 amber lighten-4 tooltipped" data-position="top" data-delay="25" data-tooltip="Help"><i class="material-icons">help</i></a>
                                <a class="btn waves-effect waves-light z-depth-0 green lighten-4 tooltipped" data-position="top" data-delay="25" data-tooltip="Minimize" data-uk-toggle="{target:'#mediashare'}"><i class="material-icons md-icon">fullscreen</i></a>
                            </div>
                            <h2 class="md-card-toolbar-heading-text">SHARE OF MEDIA</h2>
                        </div>
                        <div id="mediashare" class="md-card-content">
                            <div id="share-media-container" class="md-chart">Bar Chart</div>
                        </div>
                    </div>
                </li>
                <li class="uk-width-medium-1-1">
                    <?php //WORDS CLOUD ?>
                    <div class="md-card hoverable">
                        <div class="md-card-toolbar">
                            <div class="md-card-toolbar-actions">
                                <a class="btn waves-effect waves-light z-depth-0 amber lighten-4 tooltipped" data-position="top" data-delay="25" data-tooltip="Help"><i class="material-icons">help</i></a>
                                <a class="btn waves-effect waves-light z-depth-0 green lighten-4 tooltipped" data-position="top" data-delay="25" data-tooltip="Minimize" data-uk-toggle="{target:'#wordcloud'}"><i class="material-icons md-icon">fullscreen</i></a>
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
                                        <td><a href="{!! $influencer->url !!}" class="uk-button uk-button-mini uk-button-success" target="_blank">See Details</a></td>
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
                                            <th>Author</th>
                                            <th>Post</th>
                                            <th>Name</th>
                                            <th>Interaction</th>
                                            <th>Viral Reach</th>
                                            <th>Sentiment</th>
                                            <th><input type="checkbox" class="" id="selectall" /><label for="selectall">Select All</label></th>
                                        </tr>
                                        </thead>
                                    </table>
                                </div>
                                <div id="convfacebook" class="">
                                    <?php //FB TABLE ?>
                                    <table id="table_facebook" class="striped bordered highlight responsive-table">
                                        <thead>
                                        <tr>
                                            <th>Page</th>
                                            <th>Post</th>
                                            <th>Comment</th>
                                            <th>Media Type</th>
                                            <th>Sentiment</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                    </table>
                                </div>
                                <div id="convnews" class="">
                                    <?php //NEWS TABLE ?>
                                    <table id="table_news" class="striped bordered highlight responsive-table">
                                        <thead>
                                        <tr>
                                            <th>Media</th>
                                            <th>Title</th>
                                            <th>Density</th>
                                            <th>Reach</th>
                                            <th>Comments</th>
                                            <th>Summary</th>
                                            <th>Sentiment</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                    </table>
                                </div>
                                <div id="convforum" class="">
                                    <?php //FORUM TABLE ?>
                                    <table id="table_forum" class="striped bordered highlight responsive-table">
                                        <thead>
                                        <tr>
                                            <th>Forum</th>
                                            <th>Thread Title</th>
                                            <th>Post Count</th>
                                            <th>Thread Starter</th>
                                            <th>Sentiment</th>
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
                                            <th></th>
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
            </ul>
        </div>
    </main>
@endsection

@section('page-level-plugins')
    <script src="{!! asset('mediawave/js/jquery.validate.min.js') !!}"></script>
    <script src="{!! asset('mediawave/js/components/datepicker.min.js') !!}"></script>
    <script src="{!! asset('mediawave/js/highchart/highcharts.js') !!}"></script>
    <script src="{!! asset('mediawave/js/highchart/highcharts-more.js') !!}"></script>
    <script src="{!! asset('mediawave/js/highchart/modules/exporting.js') !!}"></script>
    <script src="{!! asset('mediawave/js/highchart/themes/mw.js') !!}"></script>
    <script src="{!! asset('mediawave/js/html2canvas.js') !!}"></script>
    <script src="{!! asset('mediawave/js/html2canvas.svg.js') !!}"></script>
    <script src="{!! asset('mediawave/js/jquery.plugin.html2canvas.js') !!}"></script>
    <script src="{!! asset('mediawave/js/jqcloud.min.js') !!}"></script>
    <script src="{!! asset('mediawave/js/jquery.dataTables.min.js') !!}"></script>
    <script src="{!! asset('mediawave/js/dataTables.select.min.js') !!}"></script>
    <script src="{!! asset('mediawave/js/dataTables.mw.js') !!}"></script>
@endsection

@section('page-level-scripts')
    <script type="text/javascript" src="{{ asset('js/projects/project-detail.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/projects/sentiment-media-distribution.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/projects/sentiment-brand-distribution.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/projects/buzz-trend.js') }}"></script>
    {{--<script type="text/javascript" src="{{ asset('js/projects/post-trend.js') }}"></script>--}}
    <script type="text/javascript" src="{{ asset('js/projects/buzz-pie.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/projects/word-cloud.js') }}"></script>
    <!-- script type="text/javascript" src="{{ asset('js/jquery.blockUI.js') }}"></script -->
    <script>
        $(document).ready(function() {
            $('#table_author').DataTable( {
                "order": [[ 0, "desc" ]]
            });
            $('#table_twitter').DataTable( {
                serverSide: true,
                ajax: '{!! url('conversation/twitter') !!}'
            });
            $('#table_facebook').DataTable( {
                "order": [[ 0, "desc" ]]
            });
            $('#table_news').DataTable( {
                "order": [[ 0, "desc" ]]
            });
            $('#table_forum').DataTable( {
                "order": [[ 0, "desc" ]]
            });
            $('#table_video').DataTable( {
                "order": [[ 0, "desc" ]]
            });
            $('#table_blog').DataTable( {
                "order": [[ 0, "desc" ]]
            });
        });
        brandChart('brand-equity-container', jQuery.parseJSON('{!! $brandEquity !!}'));
        buzzTrend('buzztrend', jQuery.parseJSON('{!! $projectBuzzTrend !!}'));
        {{--postTrend('posttrend', jQuery.parseJSON('{!! $projectPostTrend !!}'));--}}
        buzzPie('buzz-container', jQuery.parseJSON('{!! $mediaDistribution !!}'));
        // shareOfVoice('share-of-voice-container', jQuery.parseJSON('{!! $shareOfVoice !!}'));
        sentimentMediaDistribution('share-media-container', jQuery.parseJSON('{!! $sentimentMediaDistribution !!}'));
        sentimentBrandDistribution('share-brand-container', jQuery.parseJSON('{!! $sentimentBrandDistributions !!}'));
        wordCloud('wordcloud-container', jQuery.parseJSON('{!! $wordCloud !!}'));
    </script>

@endsection
