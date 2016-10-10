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
                    <div class="uk-grid uk-grid-medium" data-uk-grid data-uk-grid-margin>
                        <div class="uk-width-medium-2-3 uk-width-small-1-1">
                            @if (count($keywords) > 0)
                            <ul class="uk-subnav">
                                @foreach($keywords as $key => $keywords)
                                <li class="">
                                    <input type="checkbox" name="keywords[]" value="{!! $key !!}" class="filled-in" id="{!! $key !!}" {!! $keywords['selected'] !!}  />
                                    <label for="{!! $key !!}">{!! $keywords['value'] !!}</label>
                                </li>
                               @endforeach
                            </ul>
                            @endif
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

                @include('mediawave.project-twitters.trend')

                @include('mediawave.project-twitters.pie')

                @include('mediawave.project-twitters.bar')

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
                            <div id="id-chartnya-disini" class="md-chart"></div>
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
                                <a class="btn waves-effect waves-light z-depth-0 amber lighten-4 tooltipped" data-position="top" data-delay="25" data-tooltip="Help"><i class="material-icons">help</i></a>
                                <a class="btn waves-effect waves-light z-depth-0 green lighten-4 tooltipped" data-position="top" data-delay="25" data-tooltip="Minimize" data-uk-toggle="{target:'#conv'}"><i class="material-icons md-icon">fullscreen</i></a>
                            </div>
                            <div class="md-card-toolbar-heading-text">
                                <ul class="uk-subnav uk-subnav-pill" data-uk-switcher="{connect:'#convwrap ul'}">
                                    <li class="uk-active"><a class="active" href="#convposts">Posts</a></li>
                                    <li><a href="#convhashtags">Hashtags</a></li>
                                    <li><a href="#convlinks">Links</a></li>
                                </ul>
                            </div>
                        </div>
                        <div id="convwrap" class="md-card-content conv-wrap">
                            <ul class="uk-switcher">
                                <li>
                                    <div id="convposts" class="col s12">
                                        <?php //POSTS ?>
                                        <table id="table_posts" class="striped bordered highlight responsive-table">
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
    <script type="text/javascript" src="{{ asset('js/jquery.blockUI.js') }}"></script>
    <script type="text/javascript">
        var ajaxUrl = '{!! url('/') !!}';
        var csrfToken = '{!! csrf_token() !!}';
        var projectId = '{!! $project->pid !!}';
        var mediaId = 2;
        var startDate = '{!! $startDate !!}';
        var endDate = '{!! $endDate !!}';
    </script>
    <script src="{!! asset('js/projects/buzz-trend.js') !!}"></script>
    <script src="{!! asset('js/projects/user-trend.js') !!}"></script>
    <script src="{!! asset('js/projects/reach-trend.js') !!}"></script>

    <script src="{!! asset('js/projects/buzz-pie.js') !!}"></script>
    <script src="{!! asset('js/projects/interaction-pie.js') !!}"></script>
    <script src="{!! asset('js/projects/viral-pie.js') !!}"></script>
    <script src="{!! asset('js/projects/potential-pie.js') !!}"></script>

    <script src="{!! asset('js/projects/sentiment-bar.js') !!}"></script>
    <script src="{!! asset('js/projects/interaction-bar.js') !!}"></script>
    <script>

        $(document).ready(function() {
            $('#table_author').DataTable( {
                "order": [[ 0, "desc" ]]
            });
            $('#table_posts').DataTable( {
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
