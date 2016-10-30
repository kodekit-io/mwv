@extends('layouts.mediawave')

@section('page-level-styles')
    <link rel="stylesheet" href="{!! asset('mediawave/css/dataTables.mw.css') !!}" />
@endsection

@section('content')
@include('layouts.project-subnav')
    <main class="uk-width-1-1">
        <div class="md-container">
            @include('layouts.project-filter')

            <ul class="uk-grid uk-grid-medium" data-uk-grid data-uk-grid-margin>

                @include('mediawave.project-facebooks.trend')

                @include('mediawave.project-facebooks.pie')

                @include('mediawave.project-facebooks.bar')

                @include('mediawave.project-facebooks.wordcloud')

                @include('mediawave.project-facebooks.conversation')
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
        var mediaId = 1;
        var startDate = '{!! $startDate !!}';
        var endDate = '{!! $endDate !!}';
        var brands = '{!! $brands !!}';
    </script>
    <script src="{!! asset('js/projects/post-trend.js') !!}"></script>
    <script src="{!! asset('js/projects/post-pie.js') !!}"></script>
    <script src="{!! asset('js/projects/comment-pie.js') !!}"></script>
    <script src="{!! asset('js/projects/like-pie.js') !!}"></script>
    <script src="{!! asset('js/projects/share-pie.js') !!}"></script>

    <script src="{!! asset('js/projects/sentiment-bar.js') !!}"></script>
    <script src="{!! asset('js/projects/comment-bar.js') !!}"></script>

    <script src="{!! asset('js/projects/word-cloud.js') !!}"></script>
    <script src="{!! asset('js/projects/influencer.js') !!}"></script>
    <script src="{!! asset('js/projects/convo-facebook.js') !!}"></script>

    <script type="text/javascript">
        //wordCloud('wordcloud-container', jQuery.parseJSON('{{--!! $wordCloud !!--}}'));
        wordCloudTemporary('wordcloud-container','http://103.28.15.104:8821/dummy_api/project/1/'+mediaId+'/wordcloud');
        influencerTable('top10LikeStatusFB','http://103.28.15.104:8821/dummy_api/project/1/'+mediaId+'/influencer');
        influencerTable('top10LikePhotoFB','http://103.28.15.104:8821/dummy_api/project/1/'+mediaId+'/influencer');
        influencerTable('top10LikeLinkFB','http://103.28.15.104:8821/dummy_api/project/1/'+mediaId+'/influencer');
        influencerTable('top10LikeVideoFB','http://103.28.15.104:8821/dummy_api/project/1/'+mediaId+'/influencer');
    </script>

@endsection
