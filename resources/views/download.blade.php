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
        .div_pop{
            position: absolute;
            top: 0;
            right: 0;
            width: -webkit-fill-available;
            height: 100vh;
            cursor: pointer;
        }
        #pop{

            z-index: 99998;
        }
        #pop1{
            z-index: 999999;
        }
    </style>
</head>

<body class="m-0  font-sans antialiased font-normal text-start text-base leading-default
    text-slate-500 bg-[#142132]">
<main class="mt-0 transition-all duration-200 ease-in-out auth flex flex-col justify-between min-h-screen">
    @include('landing-page.components.navbar')
    <section class="container mx-auto md:px-16 mb-10">
        <div class="flex flex-col justify-center items-center">
            <div class="text-slate-200 font-medium mt-6 text-3xl text-center">{{ $video['title'] }}</div>
            <img src="{{ $video['poster'] }}" alt="" class="mt-4 lg:w-1/2">
            <div class="mt-3 text-center" id="box-download" data-slug="{{ $video['slug'] }}"
                 data-title="{{ base64_encode($video['title']) }}" data-sv="{{ $svDownload }}">
                @if((empty($video['sd']) || $video['sd'] ==19) && (empty($video['hd']) || $video['hd'] ==19) && (empty($video['fhd']) || $video['fhd'] ==19))
                    <h4 class="text-white">Video is currently encoding, please check back later.</h4>
                @else
                    <h4 class="text-white">Click the button to get link download</h4>
                    <div class="flex font-bold justify-center">
                        @if(isset($video['sd']) && !empty($video['sd']) && $video['sd'] != 19)
                            <button class="px-7 py-2 mt-2 text-xl rounded-xl bg-[#121520] hover:bg-[#009FB2] text-white"
                                    data-path="{{ $video['sd'] }}" data-quality="480" btn-download-link>
                                480
                            </button>
                        @endif
                        @if(isset($video['hd']) && !empty($video['hd']) && $video['hd'] != 19)
                            <button class="px-7 py-2 mt-2 text-xl rounded-xl bg-[#121520] hover:bg-[#009FB2] text-white mx-3"
                                    data-path="{{ $video['hd'] }}" data-quality="720" btn-download-link>
                                720
                            </button>
                        @endif
                        @if(isset($video['fhd']) && !empty($video['fhd']) && $video['fhd'] != 19)
                            <button class="px-7 py-2 mt-2 text-xl rounded-xl bg-[#121520] hover:bg-[#009FB2] text-white"
                                    data-path="{{ $video['fhd'] }}" data-quality="1080" btn-download-link>
                                1080
                            </button>
                        @endif
                    </div>
                @endif
            </div>
        </div>
    </section>
    @include('landing-page.components.footer')
</main>
@if($accountSetting['earningModes'] == 2)
    <div id="pop1" class="div_pop"></div>
    <div id="pop" class="div_pop"></div>
@elseif($accountSetting['earningModes'] == 1)
    <div id="pop1" class="div_pop"></div>
@else
    <script src="https://streamsilk.com/ads.js"></script>
@endif
</body>
<script src="{{asset('assets/js/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('assets/js/jquery-ui.min.js')}}"></script>
@vite('resources/js/download.js')
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-Q2MFXEGDES"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-Q2MFXEGDES');
</script>
<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
    (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
        m[i].l=1*new Date();
        for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }}
        k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
    (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

    ym(97794899, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true
    });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/97794899" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
</html>
