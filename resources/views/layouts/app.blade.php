<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <script src="https://smtpjs.com/v3/smtp.js"></script>
    <meta charset="utf-8">
    <link rel="icon" type="image/x-icon" href="/images/favicon.ico">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta charset="utf-8">
    <title>Projectimmo - Werde Projektentwickler</title>
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1">
    <meta name="description"
          content="Immobilienmakler für Immobilien deutschlandweit ✔ Kostenlose Bewertung ✔ Individuelle Vermarktung ✔ TÜV-zertifiziert">
    <meta name="robots" content="noindex">

    <meta name="theme-color" content="#000000">
{{--    <style>a, button, h1, h2, h3, h4, h5, h6, p, span {--}}
{{--            font-family: Rubik, sans-serif !important--}}
{{--        }</style>--}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    @yield('css')
</head>
<body>
<div id="app">
{{--    @include('partials.header')--}}
    @yield('content')
{{--    @include('partials.footer')--}}
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"></script>
<script src="{{ mix('/js/app.js') }}"></script>

@yield('scripts')

</body>
</html>
