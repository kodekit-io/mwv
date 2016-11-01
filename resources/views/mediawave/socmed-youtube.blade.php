@extends('layouts.mediawave')

@section('page-level-styles')
    <link rel="stylesheet" href="{!! asset('mediawave/css/dataTables.mw.css') !!}" />
@endsection

@section('content')
@include('layouts.socmed-subnav')
    <main class="uk-width-1-1">
        <div class="md-container">
            @include('layouts.socmed-filter')
            <ul class="uk-grid uk-grid-medium" data-uk-grid data-uk-grid-margin>

                @include('mediawave.socmed-youtubes.trend')

                @include('mediawave.socmed-youtubes.bar')

                @include('mediawave.socmed-youtubes.wordcloud-conversation')
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
        var mediaId = 5;
        var type = 2;
        var startDate = '{!! $startDate !!}';
        var endDate = '{!! $endDate !!}';
        var brands = '{!! $brands !!}';
        var search = '{!! $shownSearch !!}';
    </script>
    <script src="{!! asset('js/socmeds/post-trend.js') !!}"></script>
    <script src="{!! asset('js/socmeds/comment-trend.js') !!}"></script>
    <script src="{!! asset('js/socmeds/view-trend.js') !!}"></script>
    <script src="{!! asset('js/socmeds/rating-bar.js') !!}"></script>
    <script src="{!! asset('js/socmeds/count-bar.js') !!}"></script>
    <script src="{!! asset('js/socmeds/comment-bar.js') !!}"></script>

    <script src="{!! asset('js/socmeds/word-cloud.js') !!}"></script>
    <script src="{!! asset('js/socmeds/influencer.js') !!}"></script>
	<script src="{!! asset('js/socmeds/convo-video.js') !!}"></script>
    <script>
        //wordCloud('wordcloud-container', jQuery.parseJSON('{{--!! $wordCloud !!--}}'));
        $(document).ready(function() {
            wordCloudTemporary('wordcloud-container','http://103.28.15.104:8821/dummy_api/project/'+type+'/'+mediaId+'/wordcloud');
            influencerTable('top10Vid','http://103.28.15.104:8821/dummy_api/project/'+type+'/'+mediaId+'/influencer');
        });
    </script>

@endsection
