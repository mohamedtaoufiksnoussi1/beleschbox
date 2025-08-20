<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
    <meta name="author" content="AdminKit">
    <meta name="keywords"
          content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

    <link rel="preconnect" href="https://fonts.gstatic.com/">
    <link rel="shortcut icon" href="{{asset('admin/img/icons/icon-48x48.png')}}"/>

    <title>@yield('title')</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&amp;display=swap" rel="stylesheet">
    <link href="{{asset('admin/css/light.css')}}" rel="stylesheet">
    @yield('extraCss')
    {{--<script src="{{asset('admin/js/settings.js')}}"></script>--}}

    @livewireStyles
    <style>
        span svg {
            touch-action: none;
            width: 15px;
        }
    </style>
</head>
<body class="antialiased">
@yield('content')

@livewireScripts
@stack('scriptBottom')

<script>

    $(document).ready(function () {
        $("#componentFrontend,#componentBackend,#createModel,#createController,#alterTable,#createTable").modal({
            show: false,
            backdrop: 'static'
        });
    });

    $(function () {
        $('.noSpacesField').bind('input', function () {
            $(this).val(function (_, v) {
                return v.replace(/\s+/g, '');
            });
        });
    });

    function toastMessage(message, type) {
        var message = message;
        var type = type;
        var duration = 5000;
        var ripple = '';
        var dismissible = '';
        var positionX = 'center';
        var positionY = 'bottom';
        window.notyf.open({
            type,
            message,
            duration,
            ripple,
            dismissible,
            position: {
                x: positionX,
                y: positionY
            }
        });
    }
</script>
@yield('extraJs')


</body>
</html>
