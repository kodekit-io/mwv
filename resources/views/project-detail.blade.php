@extends('layouts.mediawave')

@section('page-level-styles')
    <link rel="stylesheet" href="{!! asset('mediawave/css/dataTables.mw.css') !!}" />
@endsection

@section('content')
    <nav class="uk-navbar md-subnav gradient-fluenza darken">
        <div class="md-head-container">
            <ul class="uk-navbar-nav">
                <li class="uk-active">
                    <a href="#" name="subnav" class="tooltipped" data-position="bottom" data-delay="25" data-tooltip="All Media">
                        <span class="uk-border-circle pink accent-4"><i class="material-icons left">work</i></span>
                    </a>
                </li>
                <li>
                    <a href="#" name="subnav" class="tooltipped" data-position="bottom" data-delay="25" data-tooltip="Twitter">
                        <span class="uk-border-circle blue lighten-2"><i class="uk-icon-twitter"></i></span>
                    </a>
                </li>
                <li>
                    <a href="#" name="subnav" class="tooltipped" data-position="bottom" data-delay="25" data-tooltip="Facebook">
                        <span class="uk-border-circle blue darken-4"><i class="uk-icon-facebook"></i></span>
                    </a>
                </li>
                <li>
                    <a href="#" name="subnav" class="tooltipped" data-position="bottom" data-delay="25" data-tooltip="Online Media">
                        <span class="uk-border-circle cyan accent-4"><i class="material-icons">web</i></span>
                    </a>
                </li>
                <li>
                    <a href="#" name="subnav" class="tooltipped" data-position="bottom" data-delay="25" data-tooltip="Forum">
                        <span class="uk-border-circle lime darken-4"><i class="material-icons">forum</i></span>
                    </a>
                </li>
                <li>
                    <a href="#" name="subnav" class="tooltipped" data-position="bottom" data-delay="25" data-tooltip="Video">
                        <span class="uk-border-circle red darken-4"><i class="material-icons">videocam</i></span>
                    </a>
                </li>
                <li>
                    <a href="#" name="subnav" class="tooltipped" data-position="bottom" data-delay="25" data-tooltip="Blog">
                        <span class="uk-border-circle orange darken-4"><i class="material-icons">rss_feed</i></span>
                    </a>
                </li>
            </ul>
            <div class="uk-navbar-flip">
                <form>
                    <div class="nav-wrapper md-search">
                        <div class="input-field">
                            <input id="search" type="search">
                            <label for="search"><i class="material-icons">search</i></label>
                            <i class="material-icons emptysearch">close</i>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </nav>
    <main class="uk-width-1-1">
        <div class="md-container">
            <div class="md-card uk-width-1-1 md-keywords">
                <form class="md-card-content">
                    <ul class="uk-subnav left">
                        <li class="">
                            <input type="checkbox" class="filled-in" id="key1" checked="checked" />
                            <label for="key1">Lorem</label>
                        </li>
                        <li class="">
                            <input type="checkbox" class="filled-in" id="key2" checked="checked" />
                            <label for="key2">ipsum</label>
                        </li>
                        <li class="">
                            <input type="checkbox" class="filled-in" id="key3" checked="checked" />
                            <label for="key3">amet</label>
                        </li>
                    </ul>

                    <div class="nav-wrapper right">
                        <div class="input-field md-daterange">
                            <input id="startdate" type="text" class="uk-datepicker" data-uk-datepicker="{pos:'bottom',format:'DD/MM/YY'}" placeholder="10/12/16">
                            <label for="startdate"><i class="material-icons prefix">date_range</i></label>
                        </div> -
                        <div class="input-field md-daterange">
                            <input id="enddate" type="text" class="uk-datepicker" data-uk-datepicker="{pos:'bottom',format:'DD/MM/YY'}" placeholder="17/12/16">
                            <label for="enddate"><i class="material-icons prefix">date_range</i></label>
                        </div>
                        <button class="btn uk-margin-left z-depth-0" type="submit">UPDATE</button>
                    </div>
                </form>
            </div>
            <ul class="uk-grid uk-grid-medium" data-uk-grid data-uk-grid-margin>
                <li class="uk-width-medium-1-2">
                    <div class="md-card hoverable">
                        <div class="md-card-toolbar">
                            <div class="md-card-toolbar-actions">
                                <a class="btn waves-effect waves-light z-depth-0 amber lighten-4 tooltipped" data-position="top" data-delay="25" data-tooltip="Help"><i class="material-icons">help</i></a>
                                <a class="btn waves-effect waves-light z-depth-0 green lighten-4 tooltipped" data-position="top" data-delay="25" data-tooltip="Minimize" data-uk-toggle="{target:'#brandequity'}"><i class="material-icons md-icon">fullscreen</i></a>
                            </div>
                            <h2 class="md-card-toolbar-heading-text">BRAND EQUITY</h2>
                        </div>
                        <div id="brand-equity-container" class="md-card-content">
                            <div class="md-chart"></div>
                        </div>
                    </div>
                </li>
                <li class="uk-width-medium-1-2">
                    <div class="md-card hoverable">
                        <div class="md-card-toolbar">
                            <div class="md-card-toolbar-actions">
                                <a class="btn waves-effect waves-light z-depth-0 amber lighten-4 tooltipped" data-position="top" data-delay="25" data-tooltip="Help"><i class="material-icons">help</i></a>
                                <a class="btn waves-effect waves-light z-depth-0 green lighten-4 tooltipped" data-position="top" data-delay="25" data-tooltip="Minimize" data-uk-toggle="{target:'#trend'}"><i class="material-icons md-icon">fullscreen</i></a>
                            </div>
                            <div class="md-card-toolbar-heading-text">
                                <ul class="uk-subnav uk-subnav-pill" data-uk-switcher="{connect:'#trend ul'}">
                                    <li class="uk-active"><a>BUZZ</a></li>
                                    <li><a>POST</a></li>
                                    <li><a>REACH</a></li>
                                    <li><a>INTERACTIONS</a></li>
                                </ul>
                            </div>

                        </div>
                        <div id="trend" class="md-card-content">
                            <ul class="uk-switcher">
                                <li>
                                    <div id="buzztrend" class="md-chart"></div>
                                </li>
                                <li>
                                    <div id="posttrend" class="md-chart"></div>
                                </li>
                                <li>
                                    <div id="reachtrend" class="md-chart"></div>
                                </li>
                                <li>
                                    <div id="interacttrend" class="md-chart"></div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
                <li class="uk-width-medium-1-4">
                    <div class="md-card hoverable">
                        <div class="md-card-toolbar">
                            <div class="md-card-toolbar-actions">
                                <a class="btn waves-effect waves-light z-depth-0 amber lighten-4 tooltipped" data-position="top" data-delay="25" data-tooltip="Help"><i class="material-icons">help</i></a>
                                <a class="btn waves-effect waves-light z-depth-0 green lighten-4 tooltipped" data-position="top" data-delay="25" data-tooltip="Minimize" data-uk-toggle="{target:'#buzz'}"><i class="material-icons md-icon">fullscreen</i></a>
                            </div>
                            <h2 class="md-card-toolbar-heading-text">BUZZ</h2>
                        </div>
                        <div id="buzz" class="md-card-content">
                            <div class="md-chart"></div>
                        </div>
                    </div>
                </li>
                <li class="uk-width-medium-1-4">
                    <div class="md-card hoverable">
                        <div class="md-card-toolbar">
                            <div class="md-card-toolbar-actions">
                                <a class="btn waves-effect waves-light z-depth-0 amber lighten-4 tooltipped" data-position="top" data-delay="25" data-tooltip="Help"><i class="material-icons">help</i></a>
                                <a class="btn waves-effect waves-light z-depth-0 green lighten-4 tooltipped" data-position="top" data-delay="25" data-tooltip="Minimize" data-uk-toggle="{target:'#post'}"><i class="material-icons md-icon">fullscreen</i></a>
                            </div>
                            <h2 class="md-card-toolbar-heading-text">POST</h2>
                        </div>
                        <div id="post" class="md-card-content">
                            <div class="md-chart"></div>
                        </div>
                    </div>
                </li>
                <li class="uk-width-medium-1-4">
                    <div class="md-card hoverable">
                        <div class="md-card-toolbar">
                            <div class="md-card-toolbar-actions">
                                <a class="btn waves-effect waves-light z-depth-0 amber lighten-4 tooltipped" data-position="top" data-delay="25" data-tooltip="Help"><i class="material-icons">help</i></a>
                                <a class="btn waves-effect waves-light z-depth-0 green lighten-4 tooltipped" data-position="top" data-delay="25" data-tooltip="Minimize" data-uk-toggle="{target:'#interaction'}"><i class="material-icons md-icon">fullscreen</i></a>
                            </div>
                            <h2 class="md-card-toolbar-heading-text">INTERACTIONS</h2>
                        </div>
                        <div id="interaction" class="md-card-content">
                            <div class="md-chart"></div>
                        </div>
                    </div>
                </li>
                <li class="uk-width-medium-1-4">
                    <div class="md-card hoverable">
                        <div class="md-card-toolbar">
                            <div class="md-card-toolbar-actions">
                                <a class="btn waves-effect waves-light z-depth-0 amber lighten-4 tooltipped" data-position="top" data-delay="25" data-tooltip="Help"><i class="material-icons">help</i></a>
                                <a class="btn waves-effect waves-light z-depth-0 green lighten-4 tooltipped" data-position="top" data-delay="25" data-tooltip="Minimize" data-uk-toggle="{target:'#unique'}"><i class="material-icons md-icon">fullscreen</i></a>
                            </div>
                            <h2 class="md-card-toolbar-heading-text">UNIQUE USERS</h2>
                        </div>
                        <div id="unique" class="md-card-content">
                            <div class="md-chart"></div>
                        </div>
                    </div>
                </li>
                <li class="uk-width-medium-1-3">
                    <div class="md-card hoverable">
                        <div class="md-card-toolbar">
                            <div class="md-card-toolbar-actions">
                                <a class="btn waves-effect waves-light z-depth-0 amber lighten-4 tooltipped" data-position="top" data-delay="25" data-tooltip="Help"><i class="material-icons">help</i></a>
                                <a class="btn waves-effect waves-light z-depth-0 green lighten-4 tooltipped" data-position="top" data-delay="25" data-tooltip="Minimize" data-uk-toggle="{target:'#sentiment'}"><i class="material-icons md-icon">fullscreen</i></a>
                            </div>
                            <h2 class="md-card-toolbar-heading-text">SENTIMENT</h2>
                        </div>
                        <div id="sentiment" class="md-card-content">
                            <div class="md-chart"></div>
                        </div>
                    </div>
                </li>
                <li class="uk-width-medium-1-3">
                    <div class="md-card hoverable">
                        <div class="md-card-toolbar">
                            <div class="md-card-toolbar-actions">
                                <a class="btn waves-effect waves-light z-depth-0 amber lighten-4 tooltipped" data-position="top" data-delay="25" data-tooltip="Help"><i class="material-icons">help</i></a>
                                <a class="btn waves-effect waves-light z-depth-0 green lighten-4 tooltipped" data-position="top" data-delay="25" data-tooltip="Minimize" data-uk-toggle="{target:'#ir'}"><i class="material-icons md-icon">fullscreen</i></a>
                            </div>
                            <h2 class="md-card-toolbar-heading-text">INTERACTION RATE</h2>
                        </div>
                        <div id="ir" class="md-card-content">
                            <div class="md-chart"></div>
                        </div>
                    </div>
                </li>
                <li class="uk-width-medium-1-3">
                    <div class="md-card hoverable">
                        <div class="md-card-toolbar">
                            <div class="md-card-toolbar-actions">
                                <a class="btn waves-effect waves-light z-depth-0 amber lighten-4 tooltipped" data-position="top" data-delay="25" data-tooltip="Help"><i class="material-icons">help</i></a>
                                <a class="btn waves-effect waves-light z-depth-0 green lighten-4 tooltipped" data-position="top" data-delay="25" data-tooltip="Minimize" data-uk-toggle="{target:'#mediashare'}"><i class="material-icons md-icon">fullscreen</i></a>
                            </div>
                            <h2 class="md-card-toolbar-heading-text">SHARE OF MEDIA</h2>
                        </div>
                        <div id="share-media-container" class="md-card-content">
                            <div class="md-chart"></div>
                        </div>
                    </div>
                </li>
                <li class="uk-width-medium-1-1">
                    <div class="md-card hoverable">
                        <div class="md-card-toolbar">
                            <div class="md-card-toolbar-actions">
                                <a class="btn waves-effect waves-light z-depth-0 amber lighten-4 tooltipped" data-position="top" data-delay="25" data-tooltip="Help"><i class="material-icons">help</i></a>
                                <a class="btn waves-effect waves-light z-depth-0 green lighten-4 tooltipped" data-position="top" data-delay="25" data-tooltip="Minimize" data-uk-toggle="{target:'#wordcloud'}"><i class="material-icons md-icon">fullscreen</i></a>
                            </div>
                            <h2 class="md-card-toolbar-heading-text">WORD CLOUDS</h2>
                        </div>
                        <div id="wordcloud" class="md-card-content">
                            <div class="md-chart"></div>
                        </div>
                    </div>
                </li>
                <li class="uk-width-medium-1-1">
                    <div class="md-card hoverable">
                        <div class="md-card-toolbar">
                            <div class="md-card-toolbar-actions">
                                <a class="btn waves-effect waves-light z-depth-0 amber lighten-4 tooltipped" data-position="top" data-delay="25" data-tooltip="Help"><i class="material-icons">help</i></a>
                                <a class="btn waves-effect waves-light z-depth-0 green lighten-4 tooltipped" data-position="top" data-delay="25" data-tooltip="Minimize" data-uk-toggle="{target:'#conv'}"><i class="material-icons md-icon">fullscreen</i></a>
                            </div>
                            <h2 class="md-card-toolbar-heading-text">CONVERSATIONS</h2>
                        </div>
                        <div id="conv" class="md-card-content">
                            <div class="row conv-wrap">
                                <div class="col s12 uk-margin-bottom">
                                    <ul class="tabs conv-tabs">
                                        <li class="tab col s3"><a class="active" href="#convtwiter">Twitter</a></li>
                                        <li class="tab col s3"><a href="#convfacebook">Facebook</a></li>
                                        <li class="tab col s3"><a href="#convnews">Online News</a></li>
                                        <li class="tab col s3"><a href="#convforum">Forum</a></li>
                                        <li class="tab col s3"><a href="#convvideo">Video</a></li>
                                        <li class="tab col s3"><a href="#convblog">Blog</a></li>
                                    </ul>
                                </div>
                                <div id="convtwiter" class="col s12">
                                    <?php //TWITTER ?>
                                    <table id="table_twitter" class="uk-table uk-table-striped uk-table-hover bordered" cellspacing="0" width="100%">
                                        <thead>
                                        <tr>
                                            <th>Post Date</th>
                                            <th>Author</th>
                                            <th>Content</th>
                                            <th>Interaction</th>
                                            <th>Sentiment</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>21/09/2016 17:02:06</td>
                                            <td>joniiskandar729</td>
                                            <td><a href="http://twitter.com/joniiskandar729/status/778534761450967041" target="_blank">Tak Kecewa ke Ahok yang Pilih Djarot, Heru: Semoga Bisa Atasi Macet Jakarta</a></td>
                                            <td>547</td>
                                            <td>Netral</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>21/09/2016 17:52:20</td>
                                            <td>nongandah</td>
                                            <td><a href="http://twitter.com/nongandah/status/778547405520121856" target="_blank">Ngga, kan mengikuti himbauan Ahok utk mengikuti live streaming FBnya aja spy ngga bikin macet</a></td>
                                            <td>752</td>
                                            <td>Negative</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>21/09/2016 18:01:06</td>
                                            <td>snhadi</td>
                                            <td><a href="http://twitter.com/snhadi/status/778549702958559232" target="_blank">Reklamasi jakarta..lanjut! Penggusuran..lanjut! Banjir..lanjut! Sumber waras..mandek! Ahok..kira2 lanjut/mandek? Tunggu kejutan mlm ini..</a></td>
                                            <td>122</td>
                                            <td>Positive</td>
                                            <td></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div id="convfacebook" class="col s12">Facebook</div>
                                <div id="convnews" class="col s12">Online News</div>
                                <div id="convforum" class="col s12">Forum</div>
                                <div id="convvideo" class="col s12">Video</div>
                                <div id="convblog" class="col s12">Blog</div>
                            </div>
                        </div>
                    </div>

                </li>
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
    <script type="text/javascript" src="{{ asset('js/project-detail.js') }}"></script>
    <!-- script type="text/javascript" src="{{ asset('js/jquery.blockUI.js') }}"></script -->
    <script>
        $(document).ready(function() {
            $('#table_twitter').DataTable( {
                "order": [[ 0, "desc" ]]
            });
        });
        brandChart('brand-equity-container', jQuery.parseJSON('{!! $brandEquity !!}'));
        // shareOfVoice('share-of-voice-container', jQuery.parseJSON('{!! $shareOfVoice !!}'));
        shareMedia('share-media-container', jQuery.parseJSON('{!! $mediaDistribution !!}'));
    </script>

@endsection
