<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login - MediaWave Platform</title>

    <link href="{!! asset('mediawave/img/favicon.png') !!}" rel="shortcut icon">

    <link rel="stylesheet" href="{!! asset('mediawave/css/uikit.min.css') !!}" />
    <link rel="stylesheet" href="{!! asset('mediawave/css/materialize.min.css') !!}" />
    <link rel="stylesheet" href="{!! asset('mediawave/css/main.css') !!}" />

    <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>

<header class="uk-width-1-1 md-head-login gradient">
    <img src="{!! asset('mediawave/img/logo-white.png') !!}" alt="MediaWave Dasboard" />
</header>
<h1 class="md-title-login uk-width-1-1 black white-text">LOGIN</h1>
<main class="valign-wrapper">
    <div class="uk-width-medium-1-3 uk-width-4-5 uk-container-center valign">
        <form id="login" name="login" class="" method="post" action="{!! url('/login') !!}">
            {!! csrf_field() !!}
            <div class="input-field">
                <i class="material-icons prefix">account_circle</i>
                <input id="username" name="username" type="text" class="validate" required>
                <label for="username">Username</label>
            </div>
            <div class="input-field">
                <i class="material-icons prefix">lock</i>
                <input id="password" name="password" type="password" class="validate" required>
                <label for="password">Password</label>
            </div>
            <div class="input-field">
                <button class="btn waves-effect waves-light btn-large uk-width-1-1 gradient-clearsky hoverable" type="submit" name="action">LOG ME IN!</button>
            </div>

        </form>
    </div>
</main>


<footer class="page-footer grey lighten-3">
    <div class="footer-copyright md-head-container grey-text text-darken-1">
        &copy; <?php echo date('Y'); ?> Copyright <a class="grey-text text-darken-1" href="http://www.mediawave.biz" target="_blank" title="MediaWave">MediaWave</a> | All Rights Reserved
    </div>
</footer>

<!-- link all the scripts -->
<script src="{!! asset('mediawave/js/jquery.min.js') !!}"></script>
<script src="{!! asset('mediawave/js/jquery.validate.min.js') !!}"></script>
<script src="{!! asset('mediawave/js/materialize.min.js') !!}"></script>
<script src="{!! asset('mediawave/js/main.js') !!}"></script>
</body>
</html>
