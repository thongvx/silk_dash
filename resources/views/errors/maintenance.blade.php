<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('image/logo/logo4.webp')}}"/>
    <link rel="icon" type="image/png" href="{{asset('image/logo/logo4.webp')}}"/>
    <title>Maintenance</title>
    <!-- CSS Files -->
    @vite('resources/css/app.css')
    <!-- Main Styling -->
    <style>
        @font-face {
            font-family: 'Material Symbols Outlined';
            src: url('{{ asset('assets/fonts/materialsymbolsoutlined.woff2') }}') format('woff2');
            font-display: swap;
        }
    </style>
</head>
<body>
<article class="bg-[#142132] w-screen h-screen">
    <div class="flex  flex-col items-center h-full font-bold">
        <div class="xl:w-1/4 lg:w-1/3 sm:w-1/2 w-full pt-40 px-4">
            <img src="{{ asset('image/errors/maintenance.svg') }}" loading="lazy" alt="">
        </div>
        <p class="text-2xl text-white mt-2">We are currently undergoing maintenance. We'll be back soon.</p>
        <p class="text-white mt-2">For more information, please contact us at</p>
        <button class="rounded-lg bg-teal-300 text-white hover:bg-[#009FB2] w-max py-2 px-5 mt-3">
            <a href="/support?tab=newticket">Contact us</a>
        </button>
    </div>
</article>
</body>
</html>
