@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Project Form
                    </div>

                    <div class="panel-body">
                        @if (session()->has('message'))
                            <div class="alert alert-danger">
                                {{ session('message') }}
                            </div>
                        @endif
                        <form action="{{ url('save-project') }}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="name">Project Name</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Project Name" value="{{ old('name') }}">
                            </div>
                            <button type="submit" class="btn btn-default">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
