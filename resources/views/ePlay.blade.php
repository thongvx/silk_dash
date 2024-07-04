<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('image/logo/logo1.png')}}"/>
    <link rel="icon" type="image/png" href="{{asset('image/logo/logo1.png')}}"/>
    <title>Stream Silk</title>
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
    @vite('resources/js/eplay.js')
</head>
<body class="m-0  font-sans antialiased font-normal text-start text-base leading-default
    text-slate-500 bg-[#142132]">
<main class="mt-0 transition-all duration-200 ease-in-out auth">
    <section class="container mx-auto md:px-16 mb-10">
        <div class="rows">
            <div class="text-slate-200 font-medium mt-10 text-3xl text-center">{{ $video->title }}</div>
            <div class="aspect-video mt-4">
                <iframe src="{{ route('play', $video->slug) }}" width="100%" height="100%"></iframe>
            </div>
        </div>
        <div>
            <div class="grid mt-3 text-lg" box-lifted>
                <div
                    class="tabs tabs-lifted z-10 -mb-[var(--tab-border)] justify-self-start flex flex-col items-start md:grid">
                    <button
                        class="text-lg tab-export EmbedLink [--tab-border-color:#121520] tab !text-[#009FB2] text-white font-bold h-auto px-4 tab-active [--tab-bg:#121520] !border-b-0 md:!border-b-1 !rounded-b-lg md:!rounded-b-none before:!hidden md:before:!block"
                        data-content="EmbedLink">
                        EmbedLink
                    </button>
                    <button
                        class="text-lg tab-export Embedcode [--tab-border-color:#121520] tab text-white font-bold h-auto px-4 [--tab-bg:#121520] my-3 md:my-0 !border-b-0 md:!border-b-1 !rounded-b-lg md:!rounded-b-none before:!hidden md:before:~block"
                        data-content="Embedcode">
                        Embedcode
                    </button>
                    <button
                        class="text-lg hidden tab-export Download [--tab-border-color:#121520] tab text-white font-bold h-auto px-4 [--tab-bg:#121520] !border-b-0 md:!border-b-1 !rounded-b-lg md:!rounded-b-none before:!hidden md:before:~block"
                        data-content="Download">
                        Download Link
                    </button>
                </div>
                <div class="mt-3 md:mt-0 rounded-b-xl rounded-tr-xl relative">
                    <div
                        class="border-[#121520] rounded-b-xl rounded-tr-xl gap-2 bg-[#121520] bg-top [border-width:var(--tab-border)] undefined">
                        <div id="EmbedLink" class="tab-content-export">
                            <i class="material-symbols-outlined absolute right-4 top-4 cursor-pointer hover:text-blue-500 text-4xl" clipboard-copy>content_copy</i>
                            <textarea rows="5" class="text-clipboard px-4 pt-2 outline-none bg-transparent w-full text-white overflow-auto">{{ route('play', $video->slug) }}</textarea>
                        </div>
                        <div id="Embedcode" class="tab-content-export hidden">
                            <i class="material-symbols-outlined absolute right-4 top-4 cursor-pointer hover:text-blue-500 text-4xl" clipboard-copy>content_copy</i>
                            <textarea rows="5" class="text-clipboard px-4 pt-2 outline-none bg-transparent w-full text-white overflow-auto">&lt;iframe src="{{ route('play', $video->slug) }}" width="{{ $playerSetting->embed_width }}" height="{{ $playerSetting->embed_height }}" frameborder="0" marginwidth="0" marginheight="0" scrolling="no" allowfullscreen="true"&gt;&lt;/iframe&gt;</textarea>
                        </div>
                        <div id="Download" class="tab-content-export hidden">
                            <i class="material-symbols-outlined absolute right-4 top-4 cursor-pointer hover:text-blue-500 text-4xl" clipboard-copy>content_copy</i>
                            <textarea rows="5" class="text-clipboard px-4 pt-2 outline-none bg-transparent w-full text-white overflow-auto">{{ route('play', $video->slug) }}
                            </textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
</body>

</html>
