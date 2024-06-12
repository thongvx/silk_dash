<!DOCTYPE html>
<html>
@include('admin.components.header')
<body
        class=" bg-[#142132] m-0 font-sans text-base antialiased font-normal leading-default text-slate-500 min-h-screen h-full">
<div id="loading" class="w-full justify-center items-center flex h-full absolute bg-[#142132] z-[200]">
    <div class="flex text-white my-20 items-center">
        <div class="loading">
            <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                 viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor"
                      d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
        </div>
        <span>Loading</span>
    </div>
</div>
<main
        class="relative h-full transition-all duration-200 ease-in-out bg-[#142132]">
    @include('admin.components.navbar')
    @include('admin.components.sidebar')
    <!-- cards -->
    <div class="w-full px-3 md:px-6 mx-auto">
        @yield('content')
    </div>
    <!-- end cards -->
</main>
@include('admin.components.footer')
@vite('resources/js/admin/admin.js')
@yield('scripts')
</body>
</html>


