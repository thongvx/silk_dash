<!DOCTYPE html>
<html>
@include('landing-page.components.header')
<body class="m-0  font-sans antialiased font-normal text-start text-base leading-default scroll-smooth">
    <main class="mt-0 transition-all duration-200 ease-in-out flex justify-between flex-col  min-h-screen  bg-[#142132]">
        @include('landing-page.components.navbar')
        <!-- cards -->
        <div class="w-full mx-auto">
            @yield('content')
        </div>
        <!-- end cards -->
        @include('landing-page.components.footer')
    </main>
@yield('scripts')
</body>
</html>


