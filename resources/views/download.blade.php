<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('image/logo/logo4.webp')}}"/>
    <link rel="icon" type="image/png" href="{{asset('image/logo/logo4.webp')}}"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>StreamSilk</title>
    @vite('resources/css/app.css')
    <style>
        @font-face {
            font-family: 'Material Symbols Outlined';
            src: url('{{ asset('assets/fonts/materialsymbolsoutlined.woff2') }}') format('woff2');
            font-display: swap;
        }
    </style>
    <script src="{{asset('assets/js/jquery-3.6.0.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery-ui.min.js')}}"></script>
    @vite('resources/js/download.js')
</head>
<body class="m-0  font-sans antialiased font-normal text-start text-base leading-default
    text-slate-500 bg-[#142132]">
<main class="mt-0 transition-all duration-200 ease-in-out auth flex flex-col justify-between min-h-screen">
    @include('landing-page.components.navbar')
    <section class="container mx-auto md:px-16 mb-10">
        <div class="flex flex-col justify-center items-center">
            <div class="text-slate-200 font-medium mt-6 text-3xl text-center">{{ $video->title }}</div>
            <img src="{{ $video->poster }}" alt="" class="mt-4 lg:w-1/2">
            <div class="mt-3 text-center" id="box-download" data-slug="{{ $video->slug }}"
                 data-title="{{ base64_encode($video->title) }}" data-svDownload="{{ $svDownload }}">
                <h4 class="text-white">Click the button to get link download</h4>
                <div class="flex font-bold justify-center">
                    @if( !empty($video->sd) && $video->sd != 19)
                        <button class="px-7 py-2 mt-2 text-xl rounded-xl bg-[#121520] hover:bg-[#009FB2] text-white"
                                data-path="{{ $video->sd }}" data-quality="480" btn-download-link>
                            480
                        </button>
                    @endif
                    @if( !empty($video->hd) && $video->hd != 19)
                        <button class="px-7 py-2 mt-2 text-xl rounded-xl bg-[#121520] hover:bg-[#009FB2] text-white mx-3"
                                data-path="{{ $video->hd }}" data-quality="720" btn-download-link>
                            720
                        </button>
                    @endif
                    @if( !empty($video->fhd) && $video->fhd != 19)
                        <button class="px-7 py-2 mt-2 text-xl rounded-xl bg-[#121520] hover:bg-[#009FB2] text-white"
                                data-path="{{ $video->fhd }}" data-quality="1080" btn-download-link>
                            1080
                        </button>
                    @endif
                </div>
            </div>
        </div>
    </section>
    @include('landing-page.components.footer')
</main>
</body>

</html>
