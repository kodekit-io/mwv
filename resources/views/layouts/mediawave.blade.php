<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>MediaWave Platform</title>

    <link href="{!! asset('mediawave/img/favicon.png') !!}" rel="shortcut icon">

    <link rel="stylesheet" href="{!! asset('mediawave/css/uikit.min.css') !!}" />
    <link rel="stylesheet" href="{!! asset('mediawave/css/components/datepicker.min.css') !!}" />
    <link rel="stylesheet" href="{!! asset('mediawave/css/components/tooltip.min.css') !!}" />
    <link rel="stylesheet" href="{!! asset('mediawave/css/materialize.min.css') !!}" />
    <link rel="stylesheet" href="{!! asset('mediawave/css/main.css') !!}" />

    @section('page-level-styles')
    @show

    <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>

@include('layouts.nav')

@yield('content')


<footer class="page-footer grey lighten-3">
    <div class="footer-copyright md-head-container grey-text text-darken-1">
        &copy; <?php echo date('Y'); ?> Copyright <a class="grey-text text-darken-1" href="http://www.mediawave.biz" target="_blank" title="MediaWave">MediaWave</a> | All Rights Reserved
    </div>
</footer>

<!-- link all the scripts -->
<script src="{!! asset('mediawave/js/jquery.js') !!}"></script>
<script src="{!! asset('mediawave/js/uikit.min.js') !!}"></script>
<script src="{!! asset('mediawave/js/components/tooltip.min.js') !!}"></script>
<script src="{!! asset('mediawave/js/materialize.min.js') !!}"></script>
<script src="{!! asset('mediawave/js/jquery.validate.min.js') !!}"></script>
<script src="{!! asset('mediawave/js/html2canvas.js') !!}"></script>
<script src="{!! asset('mediawave/js/html2canvas.svg.js') !!}"></script>
<script src="{!! asset('mediawave/js/jquery.plugin.html2canvas.js') !!}"></script>

@section('page-level-plugins')
@show

<script src="{!! asset('mediawave/js/main.js') !!}"></script>

<div class="fixed-action-btn" style="bottom: 5px; right: 5px;">
    <a class="btn-floating tooltipped" data-position="left" data-delay="25" data-tooltip="Take a Screenshot" onclick="capture();">
        <i class="material-icons">camera_enhance</i>
    </a>
</div>

@section('page-level-scripts')
@show
</body>
</html>
