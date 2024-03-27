<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png"/>
    <link rel="icon" type="image/png" href="../assets/img/logo-stream2.png"/>
    <title>Dashboard</title>
@include('dashboard.components.header')
<body
    class="!font-[Roboto] m-0 font-sans text-base bg-[#1a2035] antialiased font-normal leading-default text-slate-500 min-h-screen h-full">
@include('dashboard.components.sidebar')
<main class="relative h-full transition-all duration-200 ease-in-out xl:ml-24 rounded-xl bg-[#1a2035]">
    @include('dashboard.components.navbar')
    <!-- cards -->
    <div class="w-full px-3 md:px-6 mx-auto">
       @yield('content')
    </div>
@include('dashboard.components.footer')


