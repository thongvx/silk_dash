@include('components.header')
<body
        class="m-0 font-sans text-base bg-[#142132] antialiased font-normal leading-default text-slate-500 min-h-screen h-full">
@include('components.sidebar')
<div id="loading">
    <div class="loader bg-[#1a2035]"></div>
</div>
<main class="relative h-full transition-all duration-200 ease-in-out {{$minimenu === 'true' ? 'xl:ml-24' :'xl:ml-72'}} rounded-xl bg-[#142132]">
    @include('components.navbar')
    <!-- cards -->
    <div class="w-full px-3 md:px-6 mx-auto">
        @yield('content')
    </div>
@include('components.footer')


