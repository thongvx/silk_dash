<!DOCTYPE html>
<html>
@include('dashboard.components.header')
<body
    class="m-0 font-sans text-base bg-[#142132] antialiased font-normal leading-default text-slate-500 min-h-screen h-full">
@include('dashboard.components.sidebar')
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
    class="relative h-full transition-all duration-200 ease-in-out {{$minimenu === 'true' ? 'xl:ml-24' :'xl:ml-72'}} rounded-xl bg-[#142132]">
    @include('dashboard.components.navbar')
    <!-- cards -->
    <div class="w-full px-3 md:px-6 mx-auto">
        <nav class="mb-4 lg:hidden">
            <!-- breadcrumb -->
            <ol class="flex flex-wrap pt-1 bg-transparent rounded-lg sm:mr-16 w-max">
                <li class="text-sm leading-normal">
                    <a class="text-white opacity-50" href="javascript:;">Pages</a>
                </li>
                <li
                    class="text-sm pl-2 capitalize leading-normal text-white before:float-left before:pr-2 before:text-white before:content-['/']"
                    aria-current="page">{{$title}}</li>
            </ol>
            <h6 class="mb-0 font-bold text-white capitalize" title-tab>{{ request()->get('tab') ?? '' }}</h6>
        </nav>
        @yield('content')
    </div>
    <!-- end cards -->
</main>
@include('dashboard.components.footer')
<script src="{{asset('assets/js/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('assets/js/jquery-ui.min.js')}}"></script>
<script src="{{ asset('assets/js/select2/select2.min.js') }}"></script>
@vite('resources/js/app.js')
@yield('scripts')
</body>
</html>


