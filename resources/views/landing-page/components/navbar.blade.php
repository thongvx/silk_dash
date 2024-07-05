<!-- Navbar -->
<nav class="flex z-20 items-center px-3 py-2 lg:px-20 w-full text-[#009FB2] bg-[#142132]"
     navbar-main navbar-scroll="false">
    <div class="flex items-center justify-between w-full px-0 py-1 mx-auto flex-wrap container">
        <div>
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
        <ul class="items-center	flex flex-row justify-end pl-0 mb-0 list-none md-max:w-full">
            <li class="items-center pr-2 hidden md:inline">
                <a href="/"
                   class="px-0 py-2 text-lg font-semibold text-white hover:text-[#009fb2]">
                    Home
                </a>
            </li>
            <li class="items-center pr-2 hidden md:inline ml-3">
                <a href="/premium"
                   class="px-0 py-2 text-lg font-semibold text-white hover:text-[#009fb2]">
                    Premium
                </a>
            </li>
            <li class="items-center pl-2 hidden md:inline">
                <a href="/dashboard"
                   class="flex flex-col px-0 py-2 font-semibold transition-all ease-nav-brand">
                    <button class="bg-[#009FB2]/80 hover:bg-[#009FB2] rounded-lg px-8 py-2 text-white">Dashboard
                    </button>
                </a>
            </li>
        </ul>
    </div>
</nav>
<!-- end Navbar -->
