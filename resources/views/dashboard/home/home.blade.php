<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/png" href="../assets/img/logo3.png" />
    <title>Stream Silk</title>
    @vite('resources/css/app.css')
    <style>
        @font-face {
            font-family: 'Material Symbols Outlined';
            src: url('{{ asset('assets/fonts/materialsymbolsoutlined.woff2') }}') format('woff2');
            font-display: swap;
        }
    </style>
</head>
<body class="m-0  font-sans antialiased font-normal text-start text-base leading-default">
    <main class="mt-0 transition-all duration-200 ease-in-out pb-20">
        <!-- Navbar -->
        <nav class="fixed top-0 flex z-20 backdrop-blur-xl bg-white/20 items-center px-3 py-2 lg:px-20 w-full text-[#009FB2]"
            navbar-main navbar-scroll="false">
            <div class="flex items-center justify-between w-full px-0 py-1 mx-auto flex-wrap">
                <div class="h-10">
                    <a class="flex m-0 text-sm whitespace-nowrap items-center" target="_blank" logo>
                        <img src="../assets/img/logo3.png"
                             class="brightness-150	h-full max-w-full transition-all duration-200 ease-nav-brand max-h-10" alt="main_logo" />
                        <span class=" ml-1 font-semibold transition-all duration-200 ease-nav-brand" name-web>
                            <img src="../assets/img/name-web3.png"
                             class="brightness-150	h-full max-w-full transition-all duration-200 ease-nav-brand max-h-8" alt="main_logo" />
                        </span>
                    </a>
                </div>
                <ul class="items-center	flex flex-row justify-end pl-0 mb-0 list-none md-max:w-full">
                    <li class="items-center pr-2 hidden md:inline">
                        <a href="/premium"
                           class="flex flex-col px-0 py-2 font-semibold transition-all ease-nav-brand">
                            <button class="bg-amber-500 hover:bg-amber-600 rounded-lg px-8 py-2 text-white">Premium</button>
                        </a>
                    </li>
                    <li class="items-center pl-2 hidden md:inline">
                        <a href="/dashboard"
                           class="flex flex-col px-0 py-2 font-semibold transition-all ease-nav-brand">
                            <button class="bg-[#009FB2]/80 hover:bg-[#009FB2] rounded-lg px-8 py-2 text-white">Dashboard</button>
                        </a>
                    </li>


                </ul>
            </div>
        </nav>

        <!-- end Navbar -->

        <section>
            <div class="relative flex items-center w-full lg:min-h-screen p-0 overflow-hidden bg-cover bg-center bg-no-repeat">
                <div class="w-6/12 hidden md:block md:pl-20">
                    <div class="text-[#005f6a]">
                        <h5 class="text-6xl font-semibold">Secure & Powerful<br>
                            Video Streaming Platform</h5>
                        <h6 class="text-lg mt-6">Enjoy the freedom of storing and sharing your videos online with our multi-quality support, designed to deliver an optimal viewing experience.<br> Our platform is committed to providing a seamless, high-quality video streaming service that caters to your needs.</h6>
                        <a href="/dashboard">
                            <button class="px-8 py-2 rounded-full bg-[#009FB2]/90 hover:bg-[#009FB2] text-white text-2xl mt-6 italic">Get Start</button>
                        </a>
                    </div>
                </div>
                <div class="md:w-6/12 w-full flex justify-center relative">
                    <div class="bg-[#e0fcff]"  style="background-image: url({{asset('assets/img/background-homepage.svg')}})"></div>
                    <img src="../image/image-homepage.webp" alt="">
                </div>
            </div>
            <div class="relative w-full px-20">
                <div class="w-full bg-[#ecfdff] bg-cover bg-center bg-no-repeat rounded-3xl text-[#005f6a] px-8 pb-20"
                     style="background-image: url({{asset('assets/img/background-homepage.svg')}})">
                    <h4 class="text-5xl text-center font-semibold pt-14 mb-24">Our Features</h4>
                    <div class="grid grid-cols-5 gap-10 mt-6">
                        <div class="text-[#005f6a] flex items-center flex-col bg-white py-8 px-4 rounded-xl">
                            <i class="material-symbols-outlined rounded-full flex items-center justify-center h-24 w-24 text-8xl bg-gradient-to-r from-pink-500 to-red-500 border-1 text-white">play_arrow</i>
                            <h4 class="mt-4 h-14 text-xl font-semibold text-transparent bg-clip-text bg-gradient-to-r from-pink-500 to-red-500">HLS Streaming</h4>
                            <p>HLS Streaming technology and Global server system, optimize video playback speed.</p>
                        </div>
                        <div class="text-[#005f6a] flex items-center flex-col bg-white py-8 px-4 rounded-xl">
                            <i class="material-symbols-outlined rounded-full flex items-center justify-center h-24 w-24 text-6xl bg-gradient-to-r from-cyan-500 to-blue-500 text-white">storage</i>
                            <h4 class="mt-4 h-14 text-xl font-semibold text-transparent bg-clip-text bg-gradient-to-r from-cyan-500 to-blue-500">Unlimited storage</h4>
                            <p>Upload as many videos as you want. Active files will be saved on a secure server system.</p>
                        </div>
                        <div class="text-[#005f6a] flex items-center flex-col bg-white py-8 px-4 rounded-xl">
                            <i class="material-symbols-outlined rounded-full flex items-center justify-center h-24 w-24 text-6xl bg-gradient-to-r from-teal-500 to-green-500 text-white">speed</i>
                            <h4 class="mt-4 h-14 text-xl font-semibold text-transparent bg-clip-text bg-gradient-to-r from-teal-500 to-green-500">Unlimited bandwidth</h4>
                            <p>Stream videos from anywhere, anytime with unlimited bandwidth and speed</p>
                        </div>
                        <div class="text-[#005f6a] flex items-center flex-col bg-white py-8 px-4 rounded-xl">
                            <i class="material-symbols-outlined rounded-full flex items-center justify-center h-24 w-24 text-6xl bg-gradient-to-r from-yellow-500 to-amber-600 text-white">upload_file</i>
                            <h4 class="mt-4 h-14 text-xl font-semibold text-transparent bg-clip-text bg-gradient-to-r from-yellow-500 to-amber-600">Large File accepted</h4>
                            <p>You are allowed to upload a file up to 15 GB</p>
                        </div>
                        <div class="text-[#005f6a] flex items-center flex-col bg-white py-8 px-4 rounded-xl">
                            <i class="fa fa-venus-mars rounded-full flex items-center justify-center h-24 w-24 text-6xl bg-gradient-to-r from-violet-500 to-fuchsia-500 text-white"></i>
                            <h4 class="mt-4 h-14 text-xl font-semibold text-transparent bg-clip-text bg-gradient-to-r from-violet-500 to-fuchsia-500">Adult Content</h4>
                            <p>All the legal adult contents are allowed without any restrictions.</p>
                        </div>
                    </div>

                </div>
                <div class="w-full bg-[#ecfdff] bg-cover bg-center bg-no-repeat rounded-3xl text-[#005f6a] px-8 pb-20 mt-40"
                     style="background-image: url({{asset('assets/img/background-homepage.svg')}})">
                    <div class="grid grid-cols-2 gap-10 mt-6 items-center">
                        <div class="py-8 px-4">
                            <img src="../image/Extensive.webp" alt="" style="transform: rotateY(-180deg)">
                        </div>
                        <div class="text-[#005f6a] flex items-center flex-col">
                            <h4 class="mt-4 h-14 text-5xl font-semibold">Extensive statistics</h4>
                            <p class="text-lg mt-6">We got you covered! See where your viewers are coming from. See if they use adblock. Improve your metrics based on that!</p>
                            <p class="text-lg mt-6">Not interested in statistics and numbers? In case you want to do a product placement in one of your videos, your potential advertisers need to know all your statistics. VideoVard got you covered!</p>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </main>
    <footer>
        <div class="bg-[#005f6a] text-white text-center py-8">
            <p class="text-lg">© 2021 Stream Silk. All rights reserved.</p>
        </div>
    </footer>
</body>

</html>
