@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @foreach($projects as $project)
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">{{ $project->pname }} - {{ $project->pid }}</div>

                <div class="panel-body">
                    <div id="container-{{ $project->pid }}" style="width:100%; height:400px;"></div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection

@section('page-level-scripts')
<script type="text/javascript" src="{{ asset('js/dashboard.js') }}"></script>
<script>
@foreach($projects as $project)
    @if (isset($charts[$project->pid]))
    var chartData_{!! $project->pid !!} = jQuery.parseJSON('{!! $charts[$project->pid]['brandEquity'] !!}');
    brandChart('container-{!! $project->pid !!}', chartData_{!! $project->pid !!});
    @endif
@endforeach
</script>

@endsection
