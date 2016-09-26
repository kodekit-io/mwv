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
        <div class="uk-grid uk-grid-medium uk-grid-match" data-uk-grid-match="{target:'.md-card'}" data-uk-grid-margin>
            <div class="uk-width-medium-1-3">
                <div class="md-card hoverable">
                    <div class="md-card-toolbar">
                        <h2 class="md-card-toolbar-heading-text">REPORT INFORMATIONS</h2>
                    </div>
                    <div class="md-card-content">
                        <div class="input-field">
                            <input id="projectname" name="projectname" type="text" class="validate" required>
                            <label for="projectname">Report Name</label>
                        </div>
                        <div class="input-field">
                            <textarea id="projectobj" name="projectobj" class="validate materialize-textarea uk-margin-remove"></textarea>
                            <label for="projectobj">Report Descriptions</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="uk-width-medium-1-3">
                <div class="md-card hoverable">
                    <div class="md-card-toolbar">
                        <h2 class="md-card-toolbar-heading-text">REPORT OPTIONS</h2>
                    </div>
                    <div class="md-card-content">
                        Period from
                        <div class="input-field md-daterange">
                            <input id="startdate" type="text" class="uk-datepicker" data-uk-datepicker="{pos:'bottom',format:'DD/MM/YY'}" placeholder="10/12/16">
                            <label for="startdate"><i class="material-icons prefix">date_range</i></label>
                        </div>
                        to
                        <div class="input-field md-daterange">
                            <input id="enddate" type="text" class="uk-datepicker" data-uk-datepicker="{pos:'bottom',format:'DD/MM/YY'}" placeholder="17/12/16">
                            <label for="enddate"><i class="material-icons prefix">date_range</i></label>
                        </div>
                    </div>
                    <div class="md-card-content">
                        <select id="reportProject">
                            <option value="-" disabled selected>Select Projects</option>
                            <option value="1715362982016">Gubernur DKI</option>
                            <option value="1431242592016">New Pilgub DKI 2017</option>
                            <option value="1841342492016">Pilkada Kabupaten Bekasi</option>
                        </select>
                        <select id="reportKeyword">
                            <option value="1,2,3,4,5">All Keyword </option>
                            <option value="1">Ahok - Djarot OR Basuki Tjahaja Purnama - Djarot Saiful Hidayat</option>
                            <option value="2">Agus - Sylviana OR Agus Harimurti - Sylviana Murni</option>
                            <option value="3">Anies - Sandiaga OR Anies Baswedan - Sandiaga Uno OR Anies - SandiUno</option>
                        </select>
                        <select id="reportMedia">
    						<option value="1,2,3,4,5,6">All Media</option>
    						<option value="1">Facebook</option>
    						<option value="2">Twitter</option>
    						<option value="3">Blog</option>
    						<option value="4">News</option>
    						<option value="5">Forum</option>
    						<option value="6">Video</option>
    					</select>
                    </div>
                </div>
            </div>
            <div class="uk-width-medium-1-3">
                <div class="md-card hoverable">
                    <div class="md-card-toolbar">
                        <h2 class="md-card-toolbar-heading-text">CHOOSE CHART TO EXPORT</h2>
                    </div>
                    <div class="md-card-content">
                        <ul class="uk-list">
                            <li class="uk-margin-bottom">
                                <input type="checkbox" name="checkedAll" id="checkedAll" class="filled-in" />
                                <label for="checkedAll" class="black-text">Select All</label>
                            </li>
                            <li>
                                <input type="checkbox" name="id1" id="id1" value="1" class="filled-in checkSingle" />
                                <label for="id1" class="black-text">Brand Equity</label>
                            </li>
                            <li>
                                <input type="checkbox" name="id2" id="id2" value="2" class="filled-in checkSingle" />
                                <label for="id2" class="black-text">Share of Voice</label>
                            </li>
                            <li>
                                <input type="checkbox" name="id3" id="id3" value="3" class="filled-in checkSingle" />
                                <label for="id3" class="black-text">Volume Trending</label>
                            </li>
                            <li>
                                <input type="checkbox" name="id4" id="id4" value="4" class="filled-in checkSingle" />
                                <label for="id4" class="black-text">Media Distribution</label>
                            </li>
                            <li>
                                <input type="checkbox" name="id5" id="id5" value="5" class="filled-in checkSingle" />
                                <label for="id5" class="black-text">Sentiment Media Distribution</label>
                            </li>
                            <li>
                                <input type="checkbox" name="id6" id="id6" value="6" class="filled-in checkSingle" />
                                <label for="id6" class="black-text">Topic Distribution</label>
                            </li>
                            <li>
                                <input type="checkbox" name="id12" id="id12" value="12" class="filled-in checkSingle" />
                                <label for="id12" class="black-text">Sentiment Brand Distribution</label>
                            </li>
                            <li>
                                <input type="checkbox" name="id8" id="id8"  value="8" class="filled-in checkSingle" />
                                <label for="id8" class="black-text">Cloud</label>
                            </li>
                            <li>
                                <input type="checkbox" name="id9" id="id9" value="9" class="filled-in checkSingle" />
                                <label for="id9" class="black-text">Media Per Brand Distribution</label>
                            </li>
                            <li>
                                <input type="checkbox" name="idF" id="idF" value="F" class="filled-in checkSingle" />
                                <label for="idF" class="black-text">Media Details</label>
                            </li>
                            <li>
                                <input type="checkbox" name="idE" id="idE"  value="E" class="filled-in checkSingle" />
                                <label for="idE" class="black-text">Influencer</label>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="uk-width-medium-1-1">
                <div class="uk-panel uk-panel-box">
                    <button type="submit" class="btn amber darken-4 right tooltipped" data-position="top" data-delay="25" data-tooltip="Save Report Request">SAVE NOW</button>
                </div>
            </div>
        </div>
    </div>

</main>
@endsection

@section('page-level-scripts')
    <script src="{!! asset('mediawave/js/components/datepicker.min.js') !!}"></script>
    <script src="{!! asset('js/report.js') !!}" type="text/javascript"></script>
@endsection
