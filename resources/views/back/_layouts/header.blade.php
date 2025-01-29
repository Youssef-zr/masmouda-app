<!doctype html>
<html lang="en" class="remember-theme">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>
        {{ config('app.name') }}
        @yield("title")
    </title>

    <!-- Icons -->
    <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
    <link rel="shortcut icon" href="{{ url("assets/back/>media/favicons/favicon.png") }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ url("assets/back/media/favicons/favicon-192x192.png") }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ url("assets/back/media/favicons/apple-touch-icon-180x180.png") }}">
    <!-- END Icons -->

    <!-- Stylesheets -->
    @stack("css")

    <!-- Dashmix framework -->
    <link rel="stylesheet" id="css-main" href="{{ url("assets/back/css/dashmix.min.css") }}">

    <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
    <link rel="stylesheet" id="css-theme" href="{{ url("assets/back/css/themes/xwork.min.css") }}">
    <!-- END Stylesheets -->

    <!-- Load and set color theme + dark mode preference (blocking script to prevent flashing) -->
    <script src="{{ url("assets/back/js/setTheme.js") }}"></script>
</head>

<body>
