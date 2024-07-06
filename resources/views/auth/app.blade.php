<!DOCTYPE html>
<html>
@include('auth.components.header')
<body class="m-0  font-sans antialiased font-normal text-start text-base leading-default">
<main class="mt-0 transition-all duration-200 ease-in-out flex justify-between flex-col  min-h-screen">
    <div class="fixed w-full z-30">
        @include('auth.components.navbar')
    </div>
    <!-- cards -->
    <div class="w-full mx-auto">
        @yield('content')
    </div>
</main>
@yield('scripts')
</body>
</html>


