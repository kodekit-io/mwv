@extends('layouts.mediawave')

@section('page-level-styles')
    <link rel="stylesheet" href="{!! asset('mediawave/css/dataTables.mw.css') !!}" />
    <link rel="stylesheet" href="{!! asset('mediawave/css/buttons.dataTables.min.css') !!}" />
@endsection

@section('content')
@include('layouts.project-subnav')
    <main class="uk-width-1-1">
        <div class="md-container">
            @include('layouts.project-filter')

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
    <script src="{!! asset('mediawave/js/components/datepicker.min.js') !!}"></script>
    <script src="{!! asset('mediawave/js/highchart/highcharts.js') !!}"></script>
    <script src="{!! asset('mediawave/js/highchart/highcharts-more.js') !!}"></script>
    <script src="{!! asset('mediawave/js/highchart/modules/exporting.js') !!}"></script>
    <script src="{!! asset('mediawave/js/highchart/themes/mw.js') !!}"></script>
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
        var mediaId = 8;
        var startDate = '{!! $startDate !!}';
        var endDate = '{!! $endDate !!}';
        var brands = '{!! $brands !!}';
        var search = '{!! $shownSearch !!}';
        var influencers = ["top10LikeStatus"];
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
	<?php //<script src="{!! asset('js/projects/influencer.js') !!}"></script> ?>

    <script src="{!! asset('js/projects/convo-twitter.js') !!}"></script>
    <script src="{!! asset('js/projects/convo-facebook.js') !!}"></script>
    <script src="{!! asset('js/projects/convo-news.js') !!}"></script>
    <script src="{!! asset('js/projects/convo-forum.js') !!}"></script>
    <script src="{!! asset('js/projects/convo-video.js') !!}"></script>
    <script src="{!! asset('js/projects/convo-blog.js') !!}"></script>
    <script src="{!! asset('js/projects/convo-ig.js') !!}"></script>

@endsection
