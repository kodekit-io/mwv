@extends('layouts.mediawave')

@section('page-level-styles')
    <link rel="stylesheet" href="{!! asset('mediawave/css/dataTables.mw.css') !!}" />
    <link rel="stylesheet" href="{!! asset('mediawave/css/buttons.dataTables.min.css') !!}" />
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

                @include('mediawave.projects.equity-trend')

                @include('mediawave.projects.pie')

                @include('mediawave.projects.bar')

                @include('mediawave.projects.word-cloud')

                @include('mediawave.projects.conversation')

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
    <script src="{!! asset('mediawave/js/dataTables.mw.js') !!}"></script>
@endsection

@section('page-level-scripts')
    <script type="text/javascript" src="{{ asset('js/projects/project-detail.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/projects/sentiment-media-distribution.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/projects/sentiment-brand-distribution.js') }}"></script>

    <script type="text/javascript" src="{{ asset('js/projects/buzz-trend.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/projects/post-trend.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/projects/reach-trend.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/projects/interaction-trend.js') }}"></script>

    <script type="text/javascript" src="{{ asset('js/projects/buzz-pie.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/projects/word-cloud.js') }}"></script>
    <!-- script type="text/javascript" src="{{ asset('js/jquery.blockUI.js') }}"></script -->
    <script type="text/javascript" src="{{ asset('js/projects/allchart-testing.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#table_author').DataTable( {
                "order": [[ 0, "desc" ]]
            });
            $('#table_twitter').DataTable( {
                //"processing": true,
                //"serverSide": true,
                //"searching": false,
                //"info": false,
                "ajax": {
                    "url": "{{ asset('mediawave/jsontest/conv-twitter.json') }}",
                    "data": {
                        "project_id": '{!! $project->pid !!}',
                        "source": 'twitter',
                        "start_date": '{!! $startDate !!}',
                        "end_date": '{!! $endDate !!}'
                    }
                },
                "columns": [
                    { "data": "Date" },
                    { "data": "Author" },
                    { "data": "Post" },
                    { "data": "Original Reach" },
                    { "data": "Viral Reach" },
                    { "data": "Interactions" },
                    { "data": "Viral Score" },
                    { "data": "Sentiment" },
                    { "data": "Link" },
                    {
                        "data": null,
                        "defaultContent": "",
                        "className": "namaclass",
                        "orderable": false
                    }
                ],
                "columnDefs": [{
                    "visible": false,
                    "targets": [0, 8]
                }],
            });
            /*$('#table_twitter').on('click', 'tr', function (e) {
                e.preventDefault();
                var rowIndex =  $(this).find('td:eq(6)').text();
                alert(rowIndex);
            });*/

            $('#table_facebook').DataTable( {
                "ajax": {
                    "url": "{{ asset('mediawave/jsontest/conv-fb.json') }}",
                    "data": {
                        "project_id": '{!! $project->pid !!}',
                        "source": 'facebook',
                        "start_date": '{!! $startDate !!}',
                        "end_date": '{!! $endDate !!}'
                    }
                },
                "columns": [
                    { "data": "Date" },
                    { "data": "Author" },
                    { "data": "Post" },
                    { "data": "Comments" },
                    { "data": "Likes" },
                    { "data": "Shares" },
                    { "data": "Media Type" },
                    { "data": "Sentiment" },
                ],
                "columnDefs": [{
                    "visible": false,
                    "targets": [0, 4, 5]
                }]
            });

            $('#table_news').DataTable( {
                "ajax": {
                    "url": "{{ asset('mediawave/jsontest/conv-news.json') }}",
                    "data": {
                        "project_id": '{!! $project->pid !!}',
                        "source": 'news',
                        "start_date": '{!! $startDate !!}',
                        "end_date": '{!! $endDate !!}'
                    }
                },
                "columns": [
                    { "data": "Date" },
                    { "data": "Media" },
                    { "data": "Title" },
                    { "data": "Url" },
                    { "data": "Comments" },
                    { "data": "Summary" },
                    { "data": "Sentiment" },
                    { "data": "Reach" },
                ],
                "columnDefs": [{
                    "visible": false,
                    "targets": [0, 3]
                }]
            });
            $('#table_forum').DataTable( {
                "order": [[ 0, "desc" ]]
            });
            $('#table_video').DataTable( {
                /*
                "processing": true,
                "serverSide": true,
                "searching": false,
                "info": false,
                "ajax": {
                    "url": '{!! url('conversation') !!}',
                    "data": {
                        "project_id": '{!! $project->pid !!}',
                        "source": 'video',
                        "start_date": '{!! $startDate !!}',
                        "end_date": '{!! $endDate !!}'
                    }
                }*/
            });
            $('#table_blog').DataTable( {
                "order": [[ 0, "desc" ]]
            });
        });
        brandChart('brand-equity-container', jQuery.parseJSON('{!! $brandEquity !!}'));
        buzzTrend('buzztrend', jQuery.parseJSON('{!! $projectBuzzTrend !!}'));
        postTrend('posttrend', jQuery.parseJSON('{!! $postTrend !!}'));
        reachTrend('reachtrend', jQuery.parseJSON('{!! $reachTrend !!}'));
        interactionTrend('interacttrend', jQuery.parseJSON('{!! $interactionTrend !!}'));
        //buzzPie('buzz-container', jQuery.parseJSON('{!! $mediaDistribution !!}'));
        // shareOfVoice('share-of-voice-container', jQuery.parseJSON('{!! $shareOfVoice !!}'));
        //sentimentMediaDistribution('share-media-container', jQuery.parseJSON('{!! $sentimentMediaDistribution !!}'));
        //sentimentBrandDistribution('share-brand-container', jQuery.parseJSON('{!! $sentimentBrandDistributions !!}'));
        wordCloud('wordcloud-container', jQuery.parseJSON('{!! $wordCloud !!}'));


        buzzpie("buzzpie");
        postpie("postpie");
        interactionpie("interactionpie");
        authorpie("authorpie");
        sentimentbar("sentimentbar");
        interactionbar("interactionbar");
        shareofmediabar("shareofmediabar");
    </script>

@endsection
