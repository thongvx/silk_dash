<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/png" href="{{ asset('image/logo/logo4.webp') }}" />
    <title>Stream Silk</title>
    @vite('resources/css/app.css')
    <link rel="preload" href="{{ asset('assets/fonts/materialsymbolsoutlined.woff2') }}" as="font" type="font/woff2" crossorigin="anonymous">
    <style>
        @font-face {
            font-family: 'Material Symbols Outlined';
            src: url('{{ asset('assets/fonts/materialsymbolsoutlined.woff2') }}') format('woff2');
            font-display: swap;
        }
    </style>
    <script src="{{asset('assets/js/jquery-3.6.0.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery-ui.min.js')}}"></script>
    @vite('resources/js/landing.js')
</head>
