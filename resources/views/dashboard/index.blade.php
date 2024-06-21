@extends('dashboard.layouts.app')

@section('content')
    <div class="flex flex-wrap -mx-3">
        <div class="w-full mb-4 pl-3 text-transparent bg-clip-text bg-gradient-to-b from-[#0692C6] to-[#00D9E1]">
            <h2 class="text-4xl font-bold italic">
                Welcome back to {{\Illuminate\Support\Facades\Auth::user()->name}} !
            </h2>
        </div>
        <!-- card -->
        <div class="w-full max-w-full mb-4">
            <div
                class='flex flex-wrap drop-shadow-sm rounded-2xl py-2 px-3'>
                <div class="grid grid-cols-1 lg:grid-cols-2 grid-flow-row gap-4 lg:w-7/12 w-full max-w-full ">
                    <!-- card1 -->
                    <div class="px-1.5 xl:mb-0">
                        <div
                            class='h-full px-5 mt-2 bg-[#121520] py-2 rounded-2xl flex items-center'>
                            <div class='flex items-center justify-between w-full'>
                                <div
                                    class='py-1.5 px-2 rounded-full border border-white leading-none'>
                                    <i class="material-symbols-outlined opacity-1 text-white text-3xl">person</i>
                                </div>
                                <div class='text-md lg:text-lg w-full flex flex-col mt-3 text-end'>
                                    <h3 class='text-slate-400 flex items-center justify-end'>
                                        User watching
                                        <span class="ml-3 relative flex h-3 w-3">
                                          <span
                                              class="animate-ping absolute inline-flex h-full w-full rounded-full bg-sky-400 opacity-75"></span>
                                          <span class="relative inline-flex rounded-full h-3 w-3 bg-sky-500"></span>
                                        </span>
                                    </h3>
                                    <h5 class="mb-0 text-white text-xl">
                                        400
                                    </h5>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- card2 -->
                    <div class="px-1.5 xl:mb-0">
                        <div
                            class='h-full px-5 mt-2  bg-[#121520] py-2 rounded-2xl flex items-center'>
                            <div class='flex items-center justify-between w-full'>
                                <div
                                    class='py-1.5 px-2 rounded-full border border-white leading-none'>
                                    <i class="material-symbols-outlined opacity-1 text-white text-3xl">database</i>
                                </div>
                                <div class='text-md lg:text-lg w-full flex flex-col mt-3 items-end'>
                                    <h3 class='text-slate-400'>Storage</h3>
                                    <div class="flex items-center text-xl">
                                        <h5 class="mb-0 text-white">5.1 GB</h5>
                                        <span
                                            class="text-emerald-500 pl-3 text-sm font-bold leading-normal items-center flex">
                                            255 file
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- card3 -->
                    <div class="px-1.5 xl:mb-0">
                        <div
                            class='h-full px-5 mt-2 bg-[#121520] py-2 rounded-2xl  flex items-center'>
                            <div class='flex items-center justify-between w-full'>
                                <div
                                    class='py-1.5 px-2 rounded-full border border-white leading-none'>
                                    <i class="material-symbols-outlined opacity-1 text-white text-3xl">star</i>
                                </div>
                                <div class='text-md lg:text-lg w-full flex flex-col mt-3 items-end'>
                                    <h3 class='text-slate-400'>Premium</h3>
                                    <div class="flex items-center text-xl">
                                        <h5 class="mb-0 text-white">40K Views</h5>
                                        <span
                                            class="text-rose-500 pl-3 text-sm font-bold leading-normal items-center flex">
                                            <i class="material-symbols-outlined opacity-1 text-xl">arrow_drop_down</i> +55%
                                        </span>
                                    </div>
                                    <div>
                                        <h5 class="mb-0 text-white">40 Day</h5>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- card4 -->
                    <div class="px-1.5 xl:mb-0">
                        <div
                            class='h-full px-5 mt-2 bg-[#121520] py-2 rounded-2xl flex items-center'>
                            <div class='flex items-center justify-between w-full'>
                                <div
                                    class='py-1.5 px-2 rounded-full border border-white leading-none'>
                                    <i class="material-symbols-outlined opacity-1 text-white text-3xl">attach_money</i>
                                </div>
                                <div class='text-md lg:text-lg w-full flex flex-col mt-3 items-end'>
                                    <h3 class='text-slate-400'>Total Balance</h3>
                                    <div class="flex items-center text-xl">
                                        <h5 class="text-2xl mb-0 text-white mt-2 flex items-start">
                                            <span class='text-slate-400 text-lg mr-0.5'>$</span>53,000
                                        </h5>
                                        <span
                                            class="text-emerald-500 pl-3 text-sm font-bold leading-normal items-center flex">
                                            <i class="material-symbols-outlined opacity-1 text-xl">arrow_drop_up</i> +55%
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- card2 -->
                    <div class="hidden px-2 py-2 rounded-xl mb-6 xl:mb-0 bg-[#142132]">
                        <div class='flex items-center justify-between'>
                            <div
                                class='py-1.5 px-2 rounded-full border border-white leading-none'>
                                <i class="material-symbols-outlined opacity-1 text-white text-3xl">leaderboard
                                </i>
                            </div>
                            <div class='text-md lg:text-lg w-full flex flex-col mt-3 text-end'>
                                <h3 class='text-[#009FB2] font-bold '>Today’s Earning</h3>
                                <h5 class="mb-0 text-white">
                                    $53,000 <span class="text-sm font-bold leading-normal">+55%</span>
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="lg:w-5/12 w-full max-w-full px-1.5 lg:px-0 lg:pl-3 mt-4 lg:mt-0">
                    <div class="h-full px-3 mt-2 bg-[#121520] py-2 rounded-2xl">
                        <h1 class="text-[#009FB2] text-lg font-bold my-3">Earning</h1>
                        <div class="grid grid-rows-2 gap-4">
                            <!-- card1 -->
                            <div class="px-2 py-2 rounded-xl xl:mb-0 bg-[#142132]">
                                <div class=''>
                                    <div class='text-md w-full flex items-center justify-between'>
                                        <h3 class='text-slate-400'>Yesterday’s Earning</h3>
                                        <span
                                            class="text-emerald-500 pl-3 text-sm font-bold leading-normal items-center flex">
                                            <i class="material-symbols-outlined opacity-1 text-xl">arrow_drop_up</i> +55%
                                        </span>
                                    </div>
                                    <h5 class="text-2xl mb-0 text-white mt-2 flex items-start">
                                        <span class='text-slate-400 text-lg mr-0.5'>$</span>53,000
                                    </h5>
                                </div>
                            </div>
                            <!-- card2 -->
                            <div class="px-2 py-2 rounded-xl xl:mb-0 bg-[#142132]">
                                <div class=''>
                                    <div class='text-md w-full flex items-center justify-between'>
                                        <h3 class='text-slate-400'>Today’s Earning</h3>
                                        <span
                                            class="text-emerald-500 pl-3 text-sm font-bold leading-normal items-center flex">
                                            <i class="material-symbols-outlined opacity-1 text-xl">arrow_drop_up</i> +55%
                                        </span>
                                    </div>
                                    <h5 class="text-2xl mb-0 text-white mt-2 flex items-start">
                                        <span class='text-slate-400 text-lg mr-0.5'>$</span>53,000
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- cards row 2 -->
    <div class="flex flex-wrap mt-6 -mx-3">
        <div class="w-full max-w-full px-3 mt-0 mb-6 lg:mb-0 lg:w-7/12 lg:flex-none">
            <div
                class="border-black/12.5 bg-[#121520] shadow-xl relative z-10 flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-clip-border">
                <div class="mb-0 rounded-t-2xl p-6 pt-4 pb-0 flex justify-between">
                    <h6 class="text-[#009FB2] font-bold">Statistics</h6>
                    <div class="text-white">
                        <button class="rounded-lg px-4 py-1 bg-[#142132] switchButton"
                                data-chart="day" data-date="{{ $dates['day'] }}">Day</button>
                        <button class="rounded-lg px-4 py-1 bg-[#009FB2] switchButton week"
                                data-chart="week" data-date="{{ $dates['week'] }}">Week</button>
                        <button class="rounded-lg px-4 py-1 bg-[#142132] switchButton"
                                data-chart="month" data-date="{{ $dates['month'] }}">Month</button>
                    </div>
                </div>
                <div class="h-80">
                    <canvas id="chart-line"></canvas>
                </div>
            </div>
        </div>

        <div class="w-full max-w-full px-3 lg:w-5/12 lg:flex-none">
            <div class="border-black/12.5 bg-[#121520] shadow-xl relative z-10 flex min-w-0 flex-col break-words rounded-2xl
                      border-0 border-solid bg-clip-border pb-3">
                <div
                    class="flex justify-between items-center border-black/12.5 mb-0 rounded-t-2xl border-b-0 border-solid p-6 pt-4 pb-0">
                    <h6 class="text-[#009FB2] font-bold">Notification</h6>
                    <a href="" class="rounded-lg bg-[#142132] px-4 py-1 text-white hover:text-[#009FB2]">View All</a>
                </div>
                <div class="px-4 pb-1 mt-4 h-72 overflow-auto">
                    @forelse($notifications as $notification)
                        <div
                            class="bg-[#142132] flex items-center rounded-lg py-2 px-2 text-white shadow-lg drop-shadow-sm mb-4">
                            <i class="material-symbols-outlined mr-3 text-3xl text-red-500">error</i>
                            <div>
                                <h6 class="text-red-500 font-bold">
                                    {{ $notification->subject }}
                                </h6>
                                <p class="italic">
                                    {{ $notification->message }}
                                </p>
                            </div>
                        </div>
                    @empty
                        <div class="my-3 text-white text-center">
                            No notifications
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    <!-- cards row 3 -->
    <div class="flex flex-wrap mt-6 -mx-3">
        <div class="w-full max-w-full px-3 mt-0 mb-6 lg:mb-0 lg:w-7/12 lg:flex-none">
            <div
                class="relative flex flex-col min-w-0 pb-3 px-2 break-wordsborder-0 border-solid shadow-xl bg-[#121520] border-black-125 rounded-2xl bg-clip-border">
                <div class="p-4 pb-0 mb-0 rounded-t-4">
                    <div class="flex justify-between">
                        <h6 class="mb-2 text-[#009FB2] font-bold text-lg">Top 10 viewed videos today</h6>
                    </div>
                </div>
                <div class="overflow-auto h-[calc(30vh)]">
                    <table
                        class="items-center w-full mb-4 align-top border-collapse border-gray-200 overflow-hidden">
                        <tbody>
                        @forelse( $topVideos as $video )
                            <tr>
                                <td class="p-2 align-middle bg-transparent border-b w-3/10 whitespace-nowrap ">
                                    <div class="flex items-center px-2 py-1">
                                        <div class="text-white">
                                            {{ $video->title }}
                                        </div>
                                    </div>
                                </td>
                                <td
                                    class="p-2 text-sm leading-normal align-middle bg-transparent border-b whitespace-nowrap ">
                                    <div class="flex-1 text-center">
                                        <h6 class="mb-0 text-sm leading-normal">{{ $video->views }}</h6>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr class="my-3 h-12 text-white">
                                <td class="text-center" colspan="2">No data available in table</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="w-full max-w-full px-3 mt-0 lg:w-5/12 lg:flex-none">
            <div
                class="border-black/12.5  pb-3 px-2 shadow-xl bg-[#121520] relative flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-clip-border">
                <div class="p-4 pb-0 rounded-t-4">
                    <h6 class="mb-2 text-[#009FB2] font-bold text-lg">Top Country</h6>
                </div>
                <div class="overflow-auto  h-[calc(30vh)]">
                    <table
                        class="items-center w-full mb-4 align-top border-separate border-gray-200 ">
                        <thead class="bg-[#142132] transition-colors text-sm">
                        <tr class="text-white">
                            <th class="p-2 ">
                                Country
                            </th>
                            <th class="p-2">
                                Views
                            </th>
                            <th class="p-2">
                                Bounce
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse ($topCountries as $country => $data)
                            <tr class="my-3 h-12 odd:bg-transparent even:bg-[#142132]">
                                <td class="p-2">
                                    <div class="flex items-center px-2 py-1">
                                        <div class="text-white">
                                            {{ $country }}
                                        </div>
                                    </div>
                                </td>
                                <td
                                    class="p-2">
                                    <div class="flex-1 text-center">
                                        <h6 class="mb-0 text-sm leading-normal">{{ $data['views'] }}</h6>
                                    </div>
                                </td>
                                <td
                                    class="p-2">
                                    <div class="flex-1 text-center">
                                        <h6 class="mb-0 text-sm leading-normal">{{ $data['bounce'] }}</h6>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr class="my-3 h-12 text-white">
                                <td class="text-center" colspan="3">No data available in table</td>
                            </tr>
                        @endforelse

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    {{--    @vite('resources/js/chart/filechart.js')--}}
    {{--    @vite('resources/js/chart/charts.js')--}}
@endsection
