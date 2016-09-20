@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        {{ $projectId }}
                    </div>

                    <div class="panel-body">
                        <div id="brand-equity-container" style="width:100%; height:400px;"></div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Share of Voice
                    </div>

                    <div class="panel-body">
                        <div id="share-of-voice-container" style="width:100%; height:400px;"></div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Media Distribution
                    </div>

                    <div class="panel-body">
                        <div id="share-media-container" style="width:100%; height:400px;"></div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('page-level-scripts')
    <script type="text/javascript" src="{{ asset('js/dashboard.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.blockUI.js') }}"></script>
    <script>
        brandChart('brand-equity-container', jQuery.parseJSON('{!! $brandEquity !!}'));
        shareOfVoice('share-of-voice-container', jQuery.parseJSON('{!! $shareOfVoice !!}'));
        shareMedia('share-media-container', jQuery.parseJSON('{!! $mediaDistribution !!}'));
    </script>

@endsection
