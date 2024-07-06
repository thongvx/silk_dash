<!-- Navbar -->
<nav class="flex z-20 items-center py-2 xl:px-20 px-4 sm:px-8 w-full text-[#009FB2] bg-transparent"
     navbar-main navbar-scroll="false">
    <div class="flex items-center justify-between w-full px-0 py-1 mx-auto flex-wrap container">
        <div class="flex justify-center w-full sm:block sm:w-auto scale-75 md:scale-100 bg-transparent">
            <a class="flex m-0 text-sm whitespace-nowrap items-center" href="/" target="_blank" logo>
                <img src="{{ asset('image/logo/logo4.webp') }}"
                     class="brightness-150	h-full max-w-full transition-all duration-200 ease-nav-brand max-h-12"
                     alt="main_logo"/>
                <span class="font-semibold ml-3 transition-all duration-200 ease-nav-brand" name-web>
                    <img src="{{ asset('image/logo/name-web1.webp') }}"
                         class="brightness-150	h-full max-w-full transition-all duration-200 ease-nav-brand max-h-10"
                         alt="main_logo"/>
                </span>
            </a>
        </div>
        <div class="absolute top-4 block md:hidden" aria-expanded="false"  dropdown-trigger>
            <button class=" focus:outline-none" id="navbar-toggle">
                <svg class="w-10 h-10 hover:fill-current fill-white" viewBox="0 0 24 24">
                    <path fill="none" d="M0 0h24v24H0z"/>
                    <path
                        d="M4 6h16v2H4zm0 5h16v2H4zm0 5h16v2H4z"/>
                </svg>
            </button>
        </div>
        <div class="absolute top-16 text-slate-950 w-full py-4 hidden md:block md:relative sm:py-0 sm:top-0 sm:w-auto"  dropdown-menu>
            <ul class="w-full h-full items-start sm:items-center flex flex-col sm:flex-row sm:justify-end pl-0 mb-0 list-none md-max:w-full transform-dropdown" >
                <li class="items-center pr-2 md:inline">
                    <a href="/"
                       class="px-0 py-2 text-lg font-semibold hover:text-[#009fb2]">
                        Home
                    </a>
                </li>
                <li class="items-center pr-2 md:inline sm:ml-3">
                    <a href="/affiliate"
                       class="px-0 py-2 text-lg font-semibold hover:text-[#009fb2]">
                        Affiliate
                    </a>
                </li>
                <li class="items-center pr-2 md:inline sm:ml-3">
                    <a href="/premium"
                       class="px-0 py-2 text-lg font-semibold hover:text-[#009fb2]">
                        Premium
                    </a>
                </li>
                <li class="items-center pl-2 md:inline">
                    <a href="/dashboard"
                       class="flex flex-col px-0 py-2 font-semibold transition-all ease-nav-brand">
                        <button class="bg-[#009FB2]/80 hover:bg-[#009FB2] rounded-lg px-8 py-2 text-white">Dashboard
                        </button>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- end Navbar -->
