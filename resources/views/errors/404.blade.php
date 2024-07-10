<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('image/logo/logo4.webp')}}"/>
    <link rel="icon" type="image/png" href="{{asset('image/logo/logo4.webp')}}"/>
    <title>404 Not Found</title>
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
                <img src="{{ asset('image/errors/404-error.svg') }}" loading="lazy" alt="">
            </div>
            <h1 class="text-4xl text-white">Not Found</h1>
            <p class="text-xl text-white mt-2">The page no longer exists</p>
        </div>
    </article>
</body>
</html>
