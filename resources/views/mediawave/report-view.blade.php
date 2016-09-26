@extends('layouts.mediawave')

@section('content')
<nav class="uk-navbar md-subnav gradient-fluenza darken">
    <ul class="uk-navbar-nav md-head-container">
         <li><a href="{!! url('/report-add') !!}">Create Report</a></li>
         <li class="uk-active"><a href="{!! url('/report-view') !!}">View Report</a></li>
    </ul>
</nav>
<main class="">
    <div class="md-container">
        <div class="md-card">
            <div class="md-card-toolbar">
                <h2 class="md-card-toolbar-heading-text">EXPORT REPORT</h2>
            </div>
            <div class="md-card-content">
                <table id="tblreportlist" class="uk-table uk-table-hover bordered">
                    <thead>
                        <tr>
                            <td class="">No</td>
                            <td class="uk-width-2-10">Name</td>
                            <td class="uk-width-3-10">Summary</td>
                            <td class="uk-width-1-10">Start Date</td>
                            <td class="uk-width-1-10">End Date</td>
                            <td class="uk-width-3-10">Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>testing</td>
                            <td>testing</td>
                            <td>2016-08-30</td>
                            <td>2016-08-30</td>
                            <td>
                                <a  class="chip hoverable green white-text tooltipped"
                                    data-position="top"
                                    data-delay="25"
                                    data-tooltip="Export as Excel"
                                    onclick="window.location='http://103.28.15.104:8821/api_2.9/report/get?report=551_1715362982016_10049.xlsx'">
                                    <i class="uk-icon uk-icon-file-excel-o"></i> EXCEL
                                </a>
                                <a  class="chip hoverable red white-text tooltipped"
                                    data-position="top"
                                    data-delay="25"
                                    data-tooltip="Export as PDF"
                                    onclick="generatePDF('10049','testing','1715362982016','2016-08-30','2016-08-30','1,2,3','1,2,3,4,5,6','1','','1,0,-1');">
                                    <i class="uk-icon uk-icon-file-pdf-o"></i> PDF
                                </a>
                                <a  class="chip hoverable black white-text tooltipped"
                                    data-position="top"
                                    data-delay="25"
                                    data-tooltip="Delete Forever"
                                    onclick="deleteReport(10049)">
                                    <i class="uk-icon uk-icon-trash-o"></i> DELETE
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>testing</td>
                            <td>testing</td>
                            <td>2016-08-30</td>
                            <td>2016-08-30</td>
                            <td>
                                <a  class="chip hoverable green white-text tooltipped"
                                    data-position="top"
                                    data-delay="25"
                                    data-tooltip="Export as Excel"
                                    onclick="window.location='http://103.28.15.104:8821/api_2.9/report/get?report=551_1715362982016_10049.xlsx'">
                                    <i class="uk-icon uk-icon-file-excel-o"></i> EXCEL
                                </a>
                                <a  class="chip hoverable red white-text tooltipped"
                                    data-position="top"
                                    data-delay="25"
                                    data-tooltip="Export as PDF"
                                    onclick="generatePDF('10049','testing','1715362982016','2016-08-30','2016-08-30','1,2,3','1,2,3,4,5,6','1','','1,0,-1');">
                                    <i class="uk-icon uk-icon-file-pdf-o"></i> PDF
                                </a>
                                <a  class="chip hoverable black white-text tooltipped"
                                    data-position="top"
                                    data-delay="25"
                                    data-tooltip="Delete Forever"
                                    onclick="deleteReport(10049)">
                                    <i class="uk-icon uk-icon-trash-o"></i> DELETE
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>testing</td>
                            <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</td>
                            <td>2016-08-30</td>
                            <td>2016-08-30</td>
                            <td>
                                <a  class="chip hoverable green white-text tooltipped"
                                    data-position="top"
                                    data-delay="25"
                                    data-tooltip="Export as Excel"
                                    onclick="window.location='http://103.28.15.104:8821/api_2.9/report/get?report=551_1715362982016_10049.xlsx'">
                                    <i class="uk-icon uk-icon-file-excel-o"></i> EXCEL
                                </a>
                                <a  class="chip hoverable red white-text tooltipped"
                                    data-position="top"
                                    data-delay="25"
                                    data-tooltip="Export as PDF"
                                    onclick="generatePDF('10049','testing','1715362982016','2016-08-30','2016-08-30','1,2,3','1,2,3,4,5,6','1','','1,0,-1');">
                                    <i class="uk-icon uk-icon-file-pdf-o"></i> PDF
                                </a>
                                <a  class="chip hoverable black white-text tooltipped"
                                    data-position="top"
                                    data-delay="25"
                                    data-tooltip="Delete Forever"
                                    onclick="deleteReport(10049)">
                                    <i class="uk-icon uk-icon-trash-o"></i> DELETE
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</main>
@endsection

@section('page-level-scripts')
    <script src="{!! asset('js/report.js') !!}" type="text/javascript"></script>
@endsection
