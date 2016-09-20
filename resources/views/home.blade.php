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
<script type="text/javascript" src="{{ asset('js/jquery.blockUI.js') }}"></script>
<script>
{{--@foreach($projects as $project)--}}
    {{--@if (isset($charts[$project->pid]))--}}
    {{--var chartData_{!! $project->pid !!} = jQuery.parseJSON('{!! $charts[$project->pid]['brandEquity'] !!}');--}}
    {{--brandChart('container-{!! $project->pid !!}', chartData_{!! $project->pid !!});--}}
    {{--@endif--}}
{{--@endforeach--}}
    @foreach($projects as $project)
        {{--$.get('{{ url('chart-1/' . $project->pid) }}',function(result) {--}}
            {{--brandChart('container-{!! $project->pid !!}', jQuery.parseJSON(result));--}}
        {{--});--}}

        $.ajax({
            url : '{{ url('chart-1/' . $project->pid) }}',
            beforeSend : function(xhr) {
                $('#' + 'container-{!! $project->pid !!}').block({
                    message: '<span>Processing</span>',
                    css: { border: '3px solid #a00' }
                });
            },
            complete : function(xhr, status) {
                $('#' + 'container-{!! $project->pid !!}').unblock();
            },
            success : function(result) {
                brandChart('container-{!! $project->pid !!}', jQuery.parseJSON(result));
            }
        });
    @endforeach
</script>

@endsection
