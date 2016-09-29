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
                <form class="md-card-content">
                    <ul class="uk-subnav left">
                        <li class="">
                            <input type="checkbox" class="filled-in" id="key1" checked="checked" />
                            <label for="key1">Keyword 1</label>
                        </li>
                        <li class="">
                            <input type="checkbox" class="filled-in" id="key2" checked="checked" />
                            <label for="key2">Keyword 2</label>
                        </li>
                        <li class="">
                            <input type="checkbox" class="filled-in" id="key3" checked="checked" />
                            <label for="key3">Keyword 3</label>
                        </li>
                    </ul>

                    <div class="nav-wrapper right">
                        <div class="input-field md-daterange">
                            <input id="startdate" type="text" class="uk-datepicker" data-uk-datepicker="{pos:'bottom',format:'DD/MM/YY'}" placeholder="10/12/16">
                            <label for="startdate"><i class="material-icons prefix">date_range</i></label>
                        </div> -
                        <div class="input-field md-daterange">
                            <input id="enddate" type="text" class="uk-datepicker" data-uk-datepicker="{pos:'bottom',format:'DD/MM/YY'}" placeholder="17/12/16">
                            <label for="enddate"><i class="material-icons prefix">date_range</i></label>
                        </div>
                        <button class="btn pink darken-4 uk-margin-left z-depth-0" type="submit">UPDATE</button>
                    </div>
                </form>
            </div>
            <ul class="uk-grid uk-grid-medium" data-uk-grid data-uk-grid-margin>
                <li class="uk-width-medium-1-1">
                    <div class="md-card hoverable">
                        <div class="md-card-toolbar">
                            <div class="md-card-toolbar-actions">
                                <a class="btn waves-effect waves-light z-depth-0 amber lighten-4 tooltipped" data-position="top" data-delay="25" data-tooltip="Help"><i class="material-icons">help</i></a>
                                <a class="btn waves-effect waves-light z-depth-0 green lighten-4 tooltipped" data-position="top" data-delay="25" data-tooltip="Minimize" data-uk-toggle="{target:'#trend'}"><i class="material-icons md-icon">fullscreen</i></a>
                            </div>
                            <div class="md-card-toolbar-heading-text">
                                <ul class="uk-subnav uk-subnav-pill" data-uk-switcher="{connect:'#trend ul'}">
                                    <li class="uk-active"><a>BUZZ TREND</a></li>
                                    <li><a>USER TREND</a></li>
                                    <li><a>REACH TREND</a></li>
                                </ul>
                            </div>
                        </div>
                        <?php //TRENDS ?>
                        <div id="trend" class="md-card-content">
                            <ul class="uk-switcher">
                                <li>
                                    <div id="buzztrend" class="md-chart">BUZZ TREND</div>
                                </li>
                                <li>
                                    <div id="usertrend" class="md-chart">USER TREND</div>
                                </li>
                                <li>
                                    <div id="reachtrend" class="md-chart">REACH TREND</div>
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
                    <?php //VIRAL REACH PIE ?>
                    <div class="md-card hoverable">
                        <div class="md-card-toolbar">
                            <div class="md-card-toolbar-actions">
                                <a class="btn waves-effect waves-light z-depth-0 amber lighten-4 tooltipped" data-position="top" data-delay="25" data-tooltip="Help"><i class="material-icons">help</i></a>
                                <a class="btn waves-effect waves-light z-depth-0 green lighten-4 tooltipped" data-position="top" data-delay="25" data-tooltip="Minimize" data-uk-toggle="{target:'#viralreach'}"><i class="material-icons md-icon">fullscreen</i></a>
                            </div>
                            <h2 class="md-card-toolbar-heading-text">VIRAL REACH</h2>
                        </div>
                        <div id="viralreach" class="md-card-content">
                            <div id="id-chartnya-disini" class="md-chart">Pie Chart</div>
                        </div>
                    </div>
                </li>

                <li class="uk-width-medium-1-4">
                    <?php //POTENTIAL REACH PIE ?>
                    <div class="md-card hoverable">
                        <div class="md-card-toolbar">
                            <div class="md-card-toolbar-actions">
                                <a class="btn waves-effect waves-light z-depth-0 amber lighten-4 tooltipped" data-position="top" data-delay="25" data-tooltip="Help"><i class="material-icons">help</i></a>
                                <a class="btn waves-effect waves-light z-depth-0 green lighten-4 tooltipped" data-position="top" data-delay="25" data-tooltip="Minimize" data-uk-toggle="{target:'#potreach'}"><i class="material-icons md-icon">fullscreen</i></a>
                            </div>
                            <h2 class="md-card-toolbar-heading-text">POTENTIAL REACH</h2>
                        </div>
                        <div id="potreach" class="md-card-content">
                            <div id="id-chartnya-disini" class="md-chart">Pie Chart</div>
                        </div>
                    </div>
                </li>
                <li class="uk-width-medium-1-2">
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
                <li class="uk-width-medium-1-2">
                    <?php //INTERACTIONS RATE BAR ?>
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
