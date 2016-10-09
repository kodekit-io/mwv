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
    <script type="text/javascript" src="{{ asset('js/jquery.blockUI.js') }}"></script>

    <script type="text/javascript">
        var ajaxUrl = '{!! url('/') !!}';
        var csrfToken = '{!! csrf_token() !!}';
        var projectId = '{!! $project->pid !!}';
    </script>

    <script src="{!! asset('js/projects/brand-equity.js') !!}"></script>
    <script src="{!! asset('js/projects/buzz-trend.js') !!}"></script>
    <script src="{!! asset('js/projects/post-trend.js') !!}"></script>
    <script src="{!! asset('js/projects/reach-trend.js') !!}"></script>
    <script src="{!! asset('js/projects/interaction-trend.js') !!}"></script>

    <script src="{!! asset('js/projects/buzz-pie.js') !!}"></script>
    <script src="{!! asset('js/projects/post-pie.js') !!}"></script>
    <script src="{!! asset('js/projects/interaction-pie.js') !!}"></script>
    <script src="{!! asset('js/projects/unique-user-pie.js') !!}"></script>

    <script src="{!! asset('js/projects/sentiment-bar.js') !!}"></script>
    <script src="{!! asset('js/projects/interaction-bar.js') !!}"></script>
    <script src="{!! asset('js/projects/share-of-media-bar.js') !!}"></script>

    <script src="{!! asset('js/projects/word-cloud.js') !!}"></script>

    <script src="{!! asset('js/projects/convo-twitter.js') !!}"></script>
    <script src="{!! asset('js/projects/convo-facebook.js') !!}"></script>
    <script src="{!! asset('js/projects/convo-news.js') !!}"></script>
    <script src="{!! asset('js/projects/convo-forum.js') !!}"></script>

    <script type="text/javascript">
        wordCloud('wordcloud-container', jQuery.parseJSON('{!! $wordCloud !!}'));
    </script>

@endsection
