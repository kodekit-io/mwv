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

                @include('mediawave.socmed-twitter.trend')

                @include('mediawave.socmed-twitter.pie')

                @include('mediawave.socmed-twitter.bar')

                @include('mediawave.socmed-twitter.wordcloud-influencer')

                @include('mediawave.socmed-twitter.conversation')

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
    <script src="{!! asset('mediawave/js/dataTables.select.min.js') !!}"></script>
    <script src="{!! asset('mediawave/js/dataTables.mw.js') !!}"></script>
@endsection

@section('page-level-scripts')
    <script type="text/javascript" src="{{ asset('js/jquery.blockUI.js') }}"></script>
    <script type="text/javascript">
        var ajaxUrl = '{!! url('/') !!}';
        var csrfToken = '{!! csrf_token() !!}';
        var mediaId = 2;
        var type = 2;
        var startDate = '{!! $startDate !!}';
        var endDate = '{!! $endDate !!}';
        var brands = '{!! $brands !!}';
        var search = '{!! $shownSearch !!}';
        //var influencers = ["top10ByReachTW", "top10ByNumberTW", "top10ByImpactTW"];
    </script>
    <script src="{!! asset('js/socmeds/post-trend.js') !!}"></script>
    <?php /*
    <script src="{!! asset('js/socmeds/user-trend.js') !!}"></script>
    <script src="{!! asset('js/socmeds/reach-trend.js') !!}"></script>

    <script src="{!! asset('js/socmeds/buzz-pie.js') !!}"></script>
    <script src="{!! asset('js/socmeds/interaction-pie.js') !!}"></script>
    <script src="{!! asset('js/socmeds/viral-pie.js') !!}"></script>
    <script src="{!! asset('js/socmeds/potential-pie.js') !!}"></script>

    <script src="{!! asset('js/socmeds/sentiment-bar.js') !!}"></script>
    <script src="{!! asset('js/socmeds/interaction-bar.js') !!}"></script>

    <script src="{!! asset('js/socmeds/word-cloud.js') !!}"></script>
    <script src="{!! asset('js/socmeds/influencer.js') !!}"></script>
    <script src="{!! asset('js/socmeds/convo-twitter.js') !!}"></script>
    */ ?>

@endsection
