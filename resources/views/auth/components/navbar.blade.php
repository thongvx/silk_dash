<!-- Navbar -->
<nav class="flex z-20 items-center py-2 xl:px-20 px-4 sm:px-8 w-full text-[#009FB2] lg:bg-transparent"
     navbar-main navbar-scroll="false">
    <div class="flex items-center justify-between w-full px-0 py-1">
        <div class="flex justify-center w-full sm:block sm:w-auto scale-75 md:scale-100">
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
        <div class="absolute top-4 sm:right-1 block lg:hidden" aria-expanded="false"  dropdown-trigger>
            <button class=" focus:outline-none" id="navbar-toggle">
                <svg class="w-10 h-10 hover:fill-current fill-white sm:fill-[#142132]" viewBox="0 0 24 24">
                    <path fill="none" d="M0 0h24v24H0z"/>
                    <path
                        d="M4 6h16v2H4zm0 5h16v2H4zm0 5h16v2H4z"/>
                </svg>
            </button>
        </div>
        <div class="absolute left-0 top-16 lg:text-slate-950 lg:bg-transparent px-4 sm:px-8 lg:px-0 w-full py-2 hidden
                    lg:block lg:relative lg:py-0 lg:top-0 lg:w-auto"  dropdown-menu>
            <ul class="w-full h-full items-start lg:items-center flex flex-col lg:flex-row lg:justify-end pl-0 mb-0 list-none
                        md-max:w-full transform-dropdown pb-3 lg:pb-0">
                <li class="items-center pr-2 lg:inline  mb-2 lg:mb-0">
                    <a href="/"
                       class="px-0 py-2 text-lg font-semibold hover:text-[#009fb2]">
                        Home
                    </a>
                </li>
                <li class="items-center pr-2 lg:inline lg:ml-3 mb-2 lg:mb-0">
                    <a href="/affiliate"
                       class="px-0 py-2 text-lg font-semibold hover:text-[#009fb2]">
                        Affiliate
                    </a>
                </li>
                <li class="items-center pr-2 lg:inline lg:ml-3 mb-2 lg:mb-0">
                    <a href="/premium"
                       class="px-0 py-2 text-lg font-semibold hover:text-[#009fb2]">
                        Premium
                    </a>
                </li>
                <li class="items-center md:inline">
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
