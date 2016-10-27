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
                <form class="md-card-content" action="{!! url('socmed-instagram/') !!}" method="POST">
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
                                <input id="startdate" name="start_date" type="text" class="uk-datepicker" data-uk-datepicker="{pos:'bottom',format:'DD/MM/YY'}" placeholder="10/12/16" value="{!! $shownStartDate !!}">
                                <label for="startdate"><i class="material-icons prefix">date_range</i></label>
                            </div> -
                            <div class="input-field md-daterange">
                                <input id="enddate" name="end_date" type="text" class="uk-datepicker" data-uk-datepicker="{pos:'bottom',format:'DD/MM/YY'}" placeholder="17/12/16" value="{!! $shownEndDate !!}">
                                <label for="enddate"><i class="material-icons prefix">date_range</i></label>
                            </div>
                            <button class="btn pink darken-4 uk-align-right z-depth-0" name="filter" value="1" type="submit">UPDATE</button>
                        </div>
                    </div>
                </form>
            </div>
            <ul class="uk-grid uk-grid-medium" data-uk-grid data-uk-grid-margin>

                @include('mediawave.socmed-instagrams.trend')

                @include('mediawave.socmed-instagrams.pie')

                @include('mediawave.socmed-instagrams.bar')

                @include('mediawave.socmed-instagrams.wordcloud-influencer')

                @include('mediawave.socmed-instagrams.conversation')

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
        var mediaId = 7;
        var type = 2;
        var startDate = '{!! $startDate !!}';
        var endDate = '{!! $endDate !!}';
        var brands = '{!! $brands !!}';
    </script>
    <script src="{!! asset('js/socmeds/post-trend.js') !!}"></script>
    <script src="{!! asset('js/socmeds/comment-trend.js') !!}"></script>
    <script src="{!! asset('js/socmeds/interaction-trend.js') !!}"></script>
    <script src="{!! asset('js/socmeds/reach-trend.js') !!}"></script>
    <script src="{!! asset('js/socmeds/post-pie.js') !!}"></script>
    <script src="{!! asset('js/socmeds/reach-pie.js') !!}"></script>
    <script src="{!! asset('js/socmeds/sentiment-bar.js') !!}"></script>
    <script src="{!! asset('js/socmeds/interaction-bar.js') !!}"></script>

    <script>
        $(document).ready(function() {
            $('#table_vid').DataTable( {
                "order": [[ 0, "desc" ]]
            });
        });
    </script>

@endsection
