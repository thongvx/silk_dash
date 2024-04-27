<!DOCTYPE html>
<html>
@include('components.header')
<body
        class="m-0 font-sans text-base bg-[#142132] antialiased font-normal leading-default text-slate-500 min-h-screen h-full">
@include('components.sidebar')
<div id="loading" class="hidden w-full justify-center items-center flex h-full absolute bg-[#142132] z-[200]">
    <div class="flex text-white my-20">
        <div class="loading"></div>
        <span class="ml-3">Loading</span>
    </div>
</div>
<main class="relative h-full transition-all duration-200 ease-in-out {{$minimenu === 'true' ? 'xl:ml-24' :'xl:ml-72'}} rounded-xl bg-[#142132]">
    @include('components.navbar')
    <!-- cards -->
    <div class="w-full px-3 md:px-6 mx-auto">
        @yield('content')
    </div>
    <!-- end cards -->
</main>
@include('components.footer')
<script src="{{asset('assets/js/plugins/perfect-scrollbar.min.js')}}" async></script>
<script src="{{asset('assets/js/dropdown.js')}}" async></script>
@vite('resources/js/tabs-lifted.js')
<script src="{{asset('assets/js/fixed-plugin.js')}}" async></script>
@vite('resources/js/sidebar.js')
@yield('scripts')
</body>
</html>


