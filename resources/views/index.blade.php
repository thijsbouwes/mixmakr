<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    @include('partials._head')
</head>

<body class="leading-normal tracking-normal text-white gradient">
    <!--content-->
    <main id="app"></main>
</body>
    <script src="{{ mix('/js/main.js') }}"></script>
</html>