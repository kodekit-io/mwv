@extends('layouts.mediawave')

@section('content')
<nav class="uk-navbar md-subnav gradient-fluenza darken">
    <ul class="uk-navbar-nav md-head-container">
        <li class="uk-active"><a href="{!! url('/report-add') !!}">Create Report</a></li>
        <li><a href="{!! url('/report-view') !!}">View Report</a></li>
    </ul>
</nav>
<main class="">
    <div class="md-container">
        <form method="post" action="{!! url('report-save') !!}" >
            {!! csrf_field() !!}
            <div class="uk-grid uk-grid-medium uk-grid-match" data-uk-grid-margin>
                <div class="uk-width-medium-1-3">
                    <div class="md-card z-depth-0">
                        <div class="md-card-toolbar">
                            <h2 class="md-card-toolbar-heading-text">REPORT INFORMATIONS</h2>
                        </div>
                        <div class="md-card-content">
                            <div class="input-field">
                                <input id="report_name" name="report_name" type="text" class="validate" required>
                                <label for="report_name">Report Name</label>
                            </div>
                            <div class="input-field">
                                <textarea id="report_desc" name="report_desc" class="validate materialize-textarea uk-margin-remove"></textarea>
                                <label for="report_desc">Report Descriptions</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="uk-width-medium-1-3">
                    <div class="md-card z-depth-0">
                        <div class="md-card-toolbar">
                            <h2 class="md-card-toolbar-heading-text">REPORT PERIOD</h2>
                        </div>
                        <div class="md-card-content">
                            From
                            <div class="input-field md-daterange">
                                <input id="startdate" name="start_date" type="text" class="uk-datepicker" data-uk-datepicker="{pos:'bottom',format:'DD/MM/YY'}" placeholder="10/12/16">
                                <label for="startdate"><i class="material-icons prefix">date_range</i></label>
                            </div>
                            to
                            <div class="input-field md-daterange">
                                <input id="enddate" name="end_date" type="text" class="uk-datepicker" data-uk-datepicker="{pos:'bottom',format:'DD/MM/YY'}" placeholder="17/12/16">
                                <label for="enddate"><i class="material-icons prefix">date_range</i></label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="uk-width-medium-1-3">
                    <div class="md-card z-depth-0">
                        <div class="md-card-toolbar">
                            <div class="md-card-toolbar-heading-text uk-hidden-small">
                                <ul class="uk-subnav uk-subnav-pill md-radiogroup" data-uk-switcher="{connect:'#switchproject, #switchchart'}">
                                    <li class="uk-active"><a>PROJECT</a></li>
                                    <li><a>SOCMED PAGE</a></li>
                                </ul>
                            </div>
                            <div class="uk-button-dropdown uk-visible-small" data-uk-dropdown="{mode:'click'}">
                                <button class="uk-button">CHOOSE <i class="uk-icon-caret-down"></i></button>
                                <div class="uk-dropdown uk-dropdown-top">
                                    <ul class="uk-nav uk-nav-dropdown" data-uk-switcher="{connect:'#switchproject, #switchchart'}">
                                        <li class="uk-active"><a>PROJECT</a></li>
                                        <li><a>SOCMED PAGE</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="md-card-content">
                            <ul id="switchproject" class="uk-switcher">
                                <li>
                                    <h6>CHOOSE PROJECT</h6>
                                    <div class="select-field">
                                        {!! $projectSelect !!}
                                    </div>
                                    <h6 class="uk-margin-top">CHOOSE KEYWORDS</h6>
                                    <div class="select-field">
                                        {!! $keywordSelect !!}
                                    </div>
                                </li>
                                <li>
                                    <h6>CHOOSE ACCOUNT</h6>
                                    <div class="select-field">
                                        {!! $keywordSelect !!}
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <ul id="switchchart" class="uk-switcher" style="margin:25px 0;">
                <li class="uk-width-medium-1-1 disiniproject">
                    <ul class="uk-grid uk-grid-medium uk-grid-width-1-1 uk-grid-match"  data-uk-grid-margin>
                        <li id="plist"></li>
                    </ul>
                </li>
                <li class="uk-width-medium-1-1 disinisocmed">
                    <ul class="uk-grid uk-grid-medium uk-grid-width-1-1 uk-grid-match"  data-uk-grid-margin>
                        <li id="slist"></li>
                    </ul>
                </li>
            </ul>
            <div class="uk-width-medium-1-1">
                <div class="uk-panel uk-panel-box white">
                    <button type="submit" class="btn amber darken-4 right" data-uk-tooltip title="Save Report Request">SAVE NOW</button>
                </div>
            </div>
        </form>
    </div>

</main>
@endsection

@section('page-level-scripts')
    <script src="{!! asset('mediawave/js/components/datepicker.min.js') !!}"></script>

    {{--<script src="{!! asset('js/jquery-migrate.min.js') !!}"></script>--}}
    <script src="{!! asset('js/jquery.chained.js') !!}"></script>
    <script src="{!! asset('js/report.js') !!}"></script>
@endsection
