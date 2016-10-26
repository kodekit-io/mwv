@extends('layouts.mediawave')

@section('page-level-styles')
    <link rel="stylesheet" href="{!! asset('mediawave/css/dataTables.mw.css') !!}" />
@endsection

@section('content')
@include('layouts.socmed-subnav')
    <main class="uk-width-1-1">
        <div class="md-container">
            <div class="md-card uk-width-1-1 md-keywords">
                <div class="md-card-toolbar">
                    <h1 class="md-card-toolbar-heading-text large proxima-nova-bold">
                        Social Media Page
                    </h1>
                </div>
                <form class="md-card-content" action="{!! url('project-detail/') !!}" method="POST">
                    {{ csrf_field() }}
                    <div class="uk-grid uk-grid-medium" data-uk-grid data-uk-grid-margin>
                        <div class="uk-width-medium-2-3 uk-width-small-1-1">
                            {{--@if (count($keywords) > 0)--}}
                            {{--<ul class="uk-subnav">--}}
                                {{--@foreach($keywords as $key => $keywords)--}}
                                {{--<li class="">--}}
                                    {{--<input type="checkbox" name="keywords[]" value="{!! $key !!}" class="filled-in" id="{!! $key !!}" {!! $keywords['selected'] !!}  />--}}
                                    {{--<label for="{!! $key !!}">{!! $keywords['value'] !!}</label>--}}
                                {{--</li>--}}
                                {{--@endforeach--}}
                            {{--</ul>--}}
                            {{--@endif--}}
                        </div>
                        <div class="nav-wrapper uk-width-medium-1-3 uk-width-small-1-1">
                            <div class="input-field md-daterange">
                                <input id="startdate" name="start_date" type="text" class="uk-datepicker" data-uk-datepicker="{pos:'bottom',format:'DD/MM/YY'}" placeholder="10/12/16" value="{!! $startDate !!}">
                                <label for="startdate"><i class="material-icons prefix">date_range</i></label>
                            </div> -
                            <div class="input-field md-daterange">
                                <input id="enddate" name="end_date" type="text" class="uk-datepicker" data-uk-datepicker="{pos:'bottom',format:'DD/MM/YY'}" placeholder="17/12/16" value="{!! $endDate !!}">
                                <label for="enddate"><i class="material-icons prefix">date_range</i></label>
                            </div>
                            <button class="btn pink darken-4 uk-align-right z-depth-0" name="filter" value="1" type="submit">UPDATE</button>
                        </div>
                    </div>
                </form>
            </div>
            <ul class="uk-grid uk-grid-medium" data-uk-grid data-uk-grid-margin>
                <li class="uk-width-medium-1-1">
                    <div class="md-card hoverable">
                        <div class="md-card-toolbar">
                            <div class="md-card-toolbar-actions">
                                <a class="btn waves-effect waves-light z-depth-0 amber lighten-4" data-uk-tooltip title="Help"><i class="material-icons">help</i></a>
                                <a class="btn waves-effect waves-light z-depth-0 green lighten-4" data-uk-tooltip title="Minimize" data-uk-toggle="{target:'#trend'}"><i class="material-icons md-icon">fullscreen</i></a>
                            </div>
                            <div class="md-card-toolbar-heading-text">
                                <ul class="uk-subnav uk-subnav-pill" data-uk-switcher="{connect:'#trendwrap ul'}">
                                    <li class="uk-active"><a>POST TREND</a></li>
                                    <li><a>USER TREND</a></li>
                                    <li><a>REACH TREND</a></li>
                                </ul>
                            </div>
                        </div>
                        <?php //TREND ?>
                        <div id="trendwrap" class="md-card-content">
                            <ul class="uk-switcher">
                                <li>
                                    <div id="posttrend" class="md-chart">Post Trend</div>
                                </li>
                                <li>
                                    <div id="usertrend" class="md-chart">User Trend</div>
                                </li>
                                <li>
                                    <div id="reachtrend" class="md-chart">Reach Trend</div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
                <li class="uk-width-medium-1-4">
                    <?php //POST PIE ?>
                    <div class="md-card hoverable">
                        <div class="md-card-toolbar">
                            <div class="md-card-toolbar-actions">
                                <a class="btn waves-effect waves-light z-depth-0 amber lighten-4" data-uk-tooltip title="Help"><i class="material-icons">help</i></a>
                                <a class="btn waves-effect waves-light z-depth-0 green lighten-4" data-uk-tooltip title="Minimize" data-uk-toggle="{target:'#piewrap1'}"><i class="material-icons md-icon">fullscreen</i></a>
                            </div>
                            <h2 class="md-card-toolbar-heading-text">POST</h2>
                        </div>
                        <div id="piewrap1" class="md-card-content">
                            <div id="id-chartnya-disini" class="md-chart">Pie</div>
                        </div>
                    </div>
                </li>
                <li class="uk-width-medium-1-4">
                    <?php //INTERACTION PIE ?>
                    <div class="md-card hoverable">
                        <div class="md-card-toolbar">
                            <div class="md-card-toolbar-actions">
                                <a class="btn waves-effect waves-light z-depth-0 amber lighten-4" data-uk-tooltip title="Help"><i class="material-icons">help</i></a>
                                <a class="btn waves-effect waves-light z-depth-0 green lighten-4" data-uk-tooltip title="Minimize" data-uk-toggle="{target:'#piewrap2'}"><i class="material-icons md-icon">fullscreen</i></a>
                            </div>
                            <h2 class="md-card-toolbar-heading-text">INTERACTION</h2>
                        </div>
                        <div id="piewrap2" class="md-card-content">
                            <div id="id-chartnya-disini" class="md-chart">Pie</div>
                        </div>
                    </div>
                </li>
                <li class="uk-width-medium-1-4">
                    <?php //VIRAL REACH PIE ?>
                    <div class="md-card hoverable">
                        <div class="md-card-toolbar">
                            <div class="md-card-toolbar-actions">
                                <a class="btn waves-effect waves-light z-depth-0 amber lighten-4" data-uk-tooltip title="Help"><i class="material-icons">help</i></a>
                                <a class="btn waves-effect waves-light z-depth-0 green lighten-4" data-uk-tooltip title="Minimize" data-uk-toggle="{target:'#piewrap3'}"><i class="material-icons md-icon">fullscreen</i></a>
                            </div>
                            <h2 class="md-card-toolbar-heading-text">VIRAL REACH</h2>
                        </div>
                        <div id="piewrap3" class="md-card-content">
                            <div id="id-chartnya-disini" class="md-chart">Pie</div>
                        </div>
                    </div>
                </li>
                <li class="uk-width-medium-1-4">
                    <?php //POTENTIAL REACH PIE ?>
                    <div class="md-card hoverable">
                        <div class="md-card-toolbar">
                            <div class="md-card-toolbar-actions">
                                <a class="btn waves-effect waves-light z-depth-0 amber lighten-4" data-uk-tooltip title="Help"><i class="material-icons">help</i></a>
                                <a class="btn waves-effect waves-light z-depth-0 green lighten-4" data-uk-tooltip title="Minimize" data-uk-toggle="{target:'#piewrap4'}"><i class="material-icons md-icon">fullscreen</i></a>
                            </div>
                            <h2 class="md-card-toolbar-heading-text">POTENTIAL REACH</h2>
                        </div>
                        <div id="piewrap4" class="md-card-content">
                            <div id="id-chartnya-disini" class="md-chart">Pie</div>
                        </div>
                    </div>
                </li>

                <li class="uk-width-medium-1-2">
                    <?php //SENTIMENT BAR ?>
                    <div class="md-card hoverable">
                        <div class="md-card-toolbar">
                            <div class="md-card-toolbar-actions">
                                <a class="btn waves-effect waves-light z-depth-0 amber lighten-4" data-uk-tooltip title="Help"><i class="material-icons">help</i></a>
                                <a class="btn waves-effect waves-light z-depth-0 green lighten-4" data-uk-tooltip title="Minimize" data-uk-toggle="{target:'#barwrap1'}"><i class="material-icons md-icon">fullscreen</i></a>
                            </div>
                            <h2 class="md-card-toolbar-heading-text">SENTIMENT</h2>
                        </div>
                        <div id="barwrap1" class="md-card-content">
                            <div id="share-brand-container" class="md-chart">Sentiment Bar</div>
                        </div>
                    </div>
                </li>

                <li class="uk-width-medium-1-2">
                    <?php //INTERACTION RATE BAR ?>
                    <div class="md-card hoverable">
                        <div class="md-card-toolbar">
                            <div class="md-card-toolbar-actions">
                                <a class="btn waves-effect waves-light z-depth-0 amber lighten-4" data-uk-tooltip title="Help"><i class="material-icons">help</i></a>
                                <a class="btn waves-effect waves-light z-depth-0 green lighten-4" data-uk-tooltip title="Minimize" data-uk-toggle="{target:'#barwrap2'}"><i class="material-icons md-icon">fullscreen</i></a>
                            </div>
                            <h2 class="md-card-toolbar-heading-text">INTERACTION RATE</h2>
                        </div>
                        <div id="barwrap2" class="md-card-content">
                            <div id="share-brand-container" class="md-chart">INTERACTION RATE Bar</div>
                        </div>
                    </div>
                </li>

                <li class="uk-width-medium-1-1">
                    <?php //WORDS CLOUD ?>
                    <div class="md-card hoverable">
                        <div class="md-card-toolbar">
                            <div class="md-card-toolbar-actions">
                                <a class="btn waves-effect waves-light z-depth-0 amber lighten-4" data-uk-tooltip title="Help"><i class="material-icons">help</i></a>
                                <a class="btn waves-effect waves-light z-depth-0 green lighten-4" data-uk-tooltip title="Minimize" data-uk-toggle="{target:'#wordcloudwrap'}"><i class="material-icons md-icon">fullscreen</i></a>
                            </div>
                            <h2 class="md-card-toolbar-heading-text">WORD CLOUDS</h2>
                        </div>
                        <div id="wordcloudwrap" class="md-card-content">
                            <div id="id-chartnya-disini" class="md-chart"></div>
                        </div>
                    </div>
                </li>

                <li class="uk-width-medium-1-1">
                    <div class="md-card hoverable">
                        <div class="md-card-toolbar">
                            <div class="md-card-toolbar-actions">
                                <a class="btn waves-effect waves-light z-depth-0 amber lighten-4" data-uk-tooltip title="Help"><i class="material-icons">help</i></a>
                                <a class="btn waves-effect waves-light z-depth-0 green lighten-4" data-uk-tooltip title="Minimize" data-uk-toggle="{target:'#author'}"><i class="material-icons md-icon">fullscreen</i></a>
                            </div>
                            <h2 class="md-card-toolbar-heading-text">INFLUENCER</h2>
                        </div>
                        <div id="author" class="md-card-content conv-wrap">
                            <?php //INFLUENCER/AUTHOR TABLE ?>
                            <table id="table_author" class="striped bordered highlight responsive-table">
                                <thead>
                                <tr>
                                    <th>Author</th>
                                    <th>Popular</th>
                                    <th>Active</th>
                                    <th>Impact</th>
                                    <th></th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                   </div>
                </li>

                <li class="uk-width-medium-1-1">
                    <div class="md-card hoverable">
                        <div class="md-card-toolbar">
                            <div class="md-card-toolbar-actions">
                                <a class="btn waves-effect waves-light z-depth-0 amber lighten-4" data-uk-tooltip title="Help"><i class="material-icons">help</i></a>
                                <a class="btn waves-effect waves-light z-depth-0 green lighten-4" data-uk-tooltip title="Minimize" data-uk-toggle="{target:'#convwrap'}"><i class="material-icons md-icon">fullscreen</i></a>
                            </div>
                            <h2 class="md-card-toolbar-heading-text">CONVERSATIONS</h2>
                        </div>

                        <div id="convwrap" class="md-card-content">
                            <div class="row conv-wrap">
                                <div class="col s12">
                                    <ul class="tabs conv-tabs">
                                        <li class="tab col s4"><a class="active" href="#convpost"> POST</a></li>
                                        <li class="tab col s4"><a href="#convhashtag"> HASHTAG</a></li>
                                        <li class="tab col s4"><a href="#convlinks"> LINKS</a></li>
                                    </ul>
                                </div>
                                <div id="convpost" class="">
                                    <?php //POST TABLE ?>
                                    <table id="table_post" class="striped bordered highlight responsive-table">
                                        <thead>
                                            <tr>
                                                <th>Author</th>
                                                <th>Post</th>
                                                <th>Original Reach</th>
                                                <th>Interaction</th>
                                                <th>Viral Reach</th>
                                                <th>Viral Score</th>
                                                <th>Sentiment</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>

                                <div id="convhashtag" class="">
                                    <?php //HASHTAG TABLE ?>
                                    <table id="table_hashtag" class="striped bordered highlight responsive-table">
                                        <thead>
                                            <tr>
                                                <th>Author</th>
                                                <th>Post</th>
                                                <th>Original Reach</th>
                                                <th>Interaction</th>
                                                <th>Viral Reach</th>
                                                <th>Viral Score</th>
                                                <th>Sentiment</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>

                                <div id="convlinks" class="">
                                    <?php //LINKS TABLE ?>
                                    <table id="table_links"  class="striped bordered highlight responsive-table">
                                        <thead>
                                            <tr>
                                                <th>Site</th>
                                                <th>Title</th>
                                                <th>Original Reach</th>
                                                <th>Interaction</th>
                                                <th>Viral Reach</th>
                                                <th>Viral Score</th>
                                                <th>Sentiment</th>
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

    <script>
        $(document).ready(function() {
            $('#table_author').DataTable( {
                "order": [[ 0, "desc" ]]
            });
            $('#table_post').DataTable( {
                "order": [[ 0, "desc" ]]
            });
            $('#table_hashtag').DataTable( {
                "order": [[ 0, "desc" ]]
            });
            $('#table_links').DataTable( {
                "order": [[ 0, "desc" ]]
            });
        });
    </script>

@endsection
