<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('image/logo/logo4.webp')}}"/>
    <link rel="icon" type="image/png" href="{{asset('image/logo/logo4.webp')}}"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>StreamSilk</title>
    @vite('resources/css/app.css')
    <!-- ... other head elements ... -->
    <script src="https://www.google.com/recaptcha/enterprise.js" async defer></script>

</head>
<body class="m-0  font-sans antialiased font-normal text-start text-base leading-default
    text-slate-500 bg-[#142132]">
<main class="mt-0 transition-all duration-200 ease-in-out auth flex flex-col justify-between min-h-screen">
    @include('landing-page.components.navbar')

    <section class="container mx-auto md:px-16 mb-10">
        <div class="flex flex-col justify-center items-center">
            <!-- ... other body elements ... -->
            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" fill="white"
                 width="100" height="80"
                 x="0px" y="0px" viewBox="0 0 122.88 105.21"
                 style="enable-background:new 0 0 122.88 105.21" xml:space="preserve"><style type="text/css">.st0 {
                        fill-rule: evenodd;
                        clip-rule: evenodd;
                    }</style>
                <g>
                    <path class="st0"
                          d="M63.91,18.75v12.16h33.51c5.43,0,9.87,4.44,9.87,9.87v12.47h13.42c1.19,0,2.17,0.97,2.17,2.17v25.28 c0,1.19-0.97,2.17-2.17,2.17h-13.42v12.47c0,5.43-4.44,9.87-9.87,9.87h-73c-5.43,0-9.87-4.44-9.87-9.87V82.87H2.17 C0.97,82.87,0,81.9,0,80.71V55.42c0-1.19,0.97-2.17,2.17-2.17h12.38V40.79c0-5.43,4.44-9.87,9.87-9.87h33.51V18.75 c-3.85-1.26-6.62-4.87-6.62-9.14c0-5.31,4.3-9.61,9.61-9.61c5.31,0,9.61,4.3,9.61,9.61C70.53,13.88,67.75,17.49,63.91,18.75 L63.91,18.75z M41.03,79.74h40.81c1.99,0,3.62,1.63,3.62,3.62v1.7c0,1.99-1.63,3.62-3.62,3.62H41.03c-1.99,0-3.62-1.63-3.62-3.62 v-1.7C37.41,81.36,39.04,79.74,41.03,79.74L41.03,79.74z M78.7,47.59c5.37,0,9.73,4.35,9.73,9.73c0,5.37-4.35,9.72-9.73,9.72 s-9.72-4.35-9.72-9.72C68.97,51.94,73.33,47.59,78.7,47.59L78.7,47.59z M44.18,47.59c5.37,0,9.72,4.35,9.72,9.73 c0,5.37-4.35,9.72-9.72,9.72c-5.37,0-9.72-4.35-9.72-9.72C34.46,51.94,38.81,47.59,44.18,47.59L44.18,47.59z"/>
                </g></svg>
            <h1 class="text-xl text-white mb-5 mt-6 font-bold">Verify you're not a robot to continue</h1>
            <form id="download-form" class="text-center" action="{{ route('verify-recaptcha', ['slug' => $slug]) }}"
                  method="POST">
                @csrf
                <div class="g-recaptcha" data-sitekey="{{ config('services.recaptcha.site_key') }}"
                     data-lang="en"></div>
                <button type="submit"
                        class="px-7 py-2 mt-2 text-xl rounded-xl bg-[#121520] hover:bg-[#009FB2] text-white">Verify
                </button>
            </form>
        </div>
        <!-- ... other body elements ... -->
    </section>
    @include('landing-page.components.footer')
</main>
</body>
</html>
