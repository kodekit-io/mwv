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
        
    </div>

</main>
@endsection

@section('page-level-scripts')
    <!--<script src="{!! asset('js/add-project.js') !!}" type="text/javascript"></script>-->
@endsection
