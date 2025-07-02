<!DOCTYPE html>
<html lang="en">
<!-- index.html  21 Nov 2019 03:44:50 GMT -->
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') - Website</title>

    @yield('css')

</head>

<body>
<div class="loader"></div>

<div id="app">
    <div class="main-wrapper main-wrapper-1">
        @include('web.common.header')
        @yield('content')
        @include('web.common.footer')
    </div>
</div>


@yield('js')

</body>


<!-- index.html  21 Nov 2019 03:47:04 GMT -->
</html>
