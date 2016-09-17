@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @foreach($projects as $project)
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">{{ $project->pname }} - {{ $project->pid }}</div>

                <div class="panel-body">
                    <div id="container" style="width:100%; height:400px;"></div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
