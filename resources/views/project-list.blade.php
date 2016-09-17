@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Project List
                        <a href="{{ url('add-project') }}" class="pull-right">Add</a>
                    </div>

                    <div class="panel-body">
                        @if (session()->has('message'))
                            <div class="alert alert-success">
                                {{ session('message') }}
                            </div>
                        @endif
                        <ul class="list-group">
                            @foreach ($projects as $project)
                            <li class="list-group-item">
                                <a href="javascript:;" class="badge">Edit</a>
                                {{ $project->pname }}
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
