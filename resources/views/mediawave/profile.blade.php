@extends('layouts.mediawave')

@section('content')

<style>
@font-face {
	font-family: 'weather';
	src: url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/93/artill_clean_icons-webfont.eot');
	src: url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/93/artill_clean_icons-webfont.eot?#iefix') format('embedded-opentype'),
         url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/93/artill_clean_icons-webfont.woff') format('woff'),
         url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/93/artill_clean_icons-webfont.ttf') format('truetype'),
         url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/93/artill_clean_icons-webfont.svg#artill_clean_weather_iconsRg') format('svg');
	font-weight: normal;
	font-style: normal;
}
.widget-weather {
    height: 50px;
}
.widget-weather span {
    line-height: 48px !important;
    padding-left: 5px !important;
}
.widget-weather i {
    display: inline-block !important;
    font-size: 1em !important;
}
.widget-weather #weather {
    display: inline-block;
}
.widget-weather #weather i {
	font-family: 'weather';
    font-size: 2em !important;
    height: 48px;
    line-height: 48px;
}
.widget-weather a.js-geolocation {
    padding-left: 5px !important;
    cursor: help !important;
}
.icon-0:before { content: ":"; }
.icon-1:before { content: "p"; }
.icon-2:before { content: "S"; }
.icon-3:before { content: "Q"; }
.icon-4:before { content: "S"; }
.icon-5:before { content: "W"; }
.icon-6:before { content: "W"; }
.icon-7:before { content: "W"; }
.icon-8:before { content: "W"; }
.icon-9:before { content: "I"; }
.icon-10:before { content: "W"; }
.icon-11:before { content: "I"; }
.icon-12:before { content: "I"; }
.icon-13:before { content: "I"; }
.icon-14:before { content: "I"; }
.icon-15:before { content: "W"; }
.icon-16:before { content: "I"; }
.icon-17:before { content: "W"; }
.icon-18:before { content: "U"; }
.icon-19:before { content: "Z"; }
.icon-20:before { content: "Z"; }
.icon-21:before { content: "Z"; }
.icon-22:before { content: "Z"; }
.icon-23:before { content: "Z"; }
.icon-24:before { content: "E"; }
.icon-25:before { content: "E"; }
.icon-26:before { content: "3"; }
.icon-27:before { content: "a"; }
.icon-28:before { content: "A"; }
.icon-29:before { content: "a"; }
.icon-30:before { content: "A"; }
.icon-31:before { content: "6"; }
.icon-32:before { content: "1"; }
.icon-33:before { content: "6"; }
.icon-34:before { content: "1"; }
.icon-35:before { content: "W"; }
.icon-36:before { content: "1"; }
.icon-37:before { content: "S"; }
.icon-38:before { content: "S"; }
.icon-39:before { content: "S"; }
.icon-40:before { content: "M"; }
.icon-41:before { content: "W"; }
.icon-42:before { content: "I"; }
.icon-43:before { content: "W"; }
.icon-44:before { content: "a"; }
.icon-45:before { content: "S"; }
.icon-46:before { content: "U"; }
.icon-47:before { content: "S"; }

</style>
<nav class="uk-navbar md-subnav gradient-fluenza darken">
    <div class="md-head-container white-text">
        <span class="">Hi Username!</span>
        <div class="widget-weather right">
            <span class="today"><i class="uk-icon uk-icon-calendar"></i> <?php echo(date("j F Y")); ?> </span>
            <a class="js-geolocation" title="Your locations"><i class="uk-icon uk-icon-map-marker"></i></a>
            <div id="weather"></div>
        </div>
    </div>
</nav>

<main class="">
    <div class="md-container">

    </div>

</main>
@endsection

@section('page-level-scripts')
    <script src="{!! asset('js/jquery.simpleweather.js') !!}" type="text/javascript"></script>
    <script src="{!! asset('js/profile.js') !!}" type="text/javascript"></script>
@endsection
