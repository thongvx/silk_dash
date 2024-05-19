@extends('layouts.app')

@section('content')
    <div class="flex flex-wrap -mx-3">
        <div class="w-full text-[#009FB2] mb-10 pl-3">
            <h2 class="text-4xl font-bold italic">
                Welcome back to {{\Illuminate\Support\Facades\Auth::user()->name}}
            </h2>
        </div>
        <!-- card -->
        <div class="w-full max-w-full px-3 mb-6">
            <div
                class='flex flex-wrap justify-between mt-2 drop-shadow-sm bg-gradient-to-r from-[#009FB2] to-[#4CBE1F] rounded-2xl py-2 px-3'>
                <!-- card1 -->
                <div class="max-w-full px-1.5 mb-6 xl:mb-0 w-full lg:w-1/4">
                    <div
                        class='px-3 mt-2'>
                        <div class='flex items-center justify-between'>
                            <div
                                class='py-1.5 px-2 rounded-full border border-white leading-none'>
                                <i class="material-symbols-outlined opacity-1 text-white text-3xl">database</i>
                            </div>
                            <div class='text-md lg:text-lg w-full flex flex-col mt-3 text-end'>
                                <h3 class='text-[#000dffdb] font-bold'>Storage</h3>
                                <h5 class="mb-0 text-white">
                                    5.1 GB
                                </h5>
                            </div>
                        </div>
                        <hr class="h-px mx-1 mt-4 mb-2 bg-transparent bg-gradient-to-r from-transparent via-white to-transparent border-none"/>
                        <div>
                            <p class="mb-0 text-white opacity-0.8">
                                <span class="text-sm font-bold leading-normal">255</span>
                                file
                            </p>
                        </div>
                    </div>

                </div>

                <!-- card3 -->
                <div class="max-w-full px-1.5 mb-6 xl:mb-0 w-full lg:w-1/4">
                    <div
                        class='px-3 mt-2'>
                        <div class='flex items-center justify-between'>
                            <div
                                class='py-1.5 px-2 rounded-full border border-white leading-none'>
                                <i class="material-symbols-outlined opacity-1 text-white text-3xl">monitoring</i>
                            </div>
                            <div class='text-md lg:text-lg w-full flex flex-col mt-3 text-end'>
                                <h3 class='text-[#000dffdb]  font-bold '>Yesterday’s Earning</h3>
                                <h5 class="mb-0 text-white">
                                    $53,000
                                </h5>
                            </div>
                        </div>
                        <hr class="h-px mx-1 mt-4 mb-2 bg-transparent bg-gradient-to-r from-transparent via-white to-transparent border-none"/>
                        <div>
                            <p class="mb-0 text-white opacity-0.8">
                                <span class="text-sm font-bold leading-normal">+55%</span>
                                since yesterday
                            </p>
                        </div>
                    </div>

                </div>
                <!-- card2 -->
                <div class="max-w-full px-1.5 mb-6 xl:mb-0 w-full lg:w-1/4">
                    <div
                        class='px-3 mt-2'>
                        <div class='flex items-center justify-between'>
                            <div
                                class='py-1.5 px-2 rounded-full border border-white leading-none'>
                                <i class="material-symbols-outlined opacity-1 text-white text-3xl">leaderboard
                                </i>
                            </div>
                            <div class='text-md lg:text-lg w-full flex flex-col mt-3 text-end'>
                                <h3 class='text-[#000dffdb] font-bold '>Today’s Earning</h3>
                                <h5 class="mb-0 text-white">
                                    $53,000
                                </h5>
                            </div>
                        </div>
                        <hr class="h-px mx-1 mt-4 mb-2 bg-transparent bg-gradient-to-r from-transparent via-white to-transparent border-none"/>
                        <div>
                            <p class="mb-0 text-white opacity-0.8">
                                <span class="text-sm font-bold leading-normal">+55%</span>
                                since yesterday
                            </p>
                        </div>
                    </div>

                </div>

                <!-- card4 -->
                <div class="max-w-full px-1.5 mb-6 xl:mb-0 w-full lg:w-1/4">
                    <div
                        class='px-3 mt-2'>
                        <div class='flex items-center justify-between'>
                            <div
                                class='py-1.5 px-2 rounded-full border border-white leading-none'>
                                <i class="material-symbols-outlined opacity-1 text-white text-3xl">attach_money</i>
                            </div>
                            <div class='text-md lg:text-lg w-full flex flex-col mt-3 text-end'>
                                <h3 class='text-[#000dffdb] font-bold '>Total Balance</h3>
                                <h5 class="mb-0 text-white">
                                    $53,000
                                </h5>
                            </div>
                        </div>
                        <hr class="h-px mx-1 mt-4 mb-2 bg-transparent bg-gradient-to-r from-transparent via-white to-transparent border-none"/>
                        <div>
                            <p class="mb-0 text-white opacity-0.8">
                                <span class="text-sm font-bold leading-normal">+55%</span>
                                since yesterday
                            </p>
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
                <div class="border-black/12.5 mb-0 rounded-t-2xl border-b-0 border-solid p-6 pt-4 pb-0">
                    <h6 class="text-[#009FB2] font-bold">Statistics</h6>
                    <p class="mb-0 text-sm leading-normal">
                        <i class="fa fa-arrow-up text-[#009FB2]"></i>
                        <span class="font-semibold">4% more</span> in 2024
                    </p>
                </div>
                <div class="flex-auto p-4">
                    <div>
                        <canvas id="chart-line" height="350"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-full max-w-full px-3 lg:w-5/12 lg:flex-none">
            <div class="border-black/12.5 bg-[#121520] shadow-xl relative z-10 flex min-w-0 flex-col break-words rounded-2xl
                      border-0 border-solid bg-clip-border pb-3">
                <div class="border-black/12.5 mb-0 rounded-t-2xl border-b-0 border-solid p-6 pt-4 pb-0">
                    <h6 class="text-[#009FB2] font-bold">Notification</h6>
                </div>
                <div class="grid grid-cols-1 gap-4 px-4 mt-3 h-[calc(380px)] overflow-auto">
                    <div
                            class="bg-[#142132] flex items-center rounded-lg py-2 px-2 text-white shadow-lg drop-shadow-sm">
                        <i class="material-symbols-outlined mr-3 text-3xl text-red-500">error</i>
                        <div>
                            <h6 class="text-red-500 font-bold">
                                Error encoder video GoPNmF4T0oEjnennbwt5
                            </h6>
                            <p class="italic">
                                The video GoPNmF4T0oEjnennbwt5(PETS-036.mp4) has been deleted. Because I can not
                                encode the video
                            </p>
                        </div>
                    </div>
                    <div
                            class="bg-[#142132] flex items-center rounded-lg py-2 px-2 text-white shadow-lg drop-shadow-sm">
                        <i class="material-symbols-outlined mr-3 text-3xl text-red-500">error</i>
                        <div>
                            <h6 class="text-red-500 font-bold">
                                Error encoder video GoPNmF4T0oEjnennbwt5
                            </h6>
                            <p class="italic">
                                The video GoPNmF4T0oEjnennbwt5(PETS-036.mp4) has been deleted. Because I can not
                                encode the video
                            </p>
                        </div>
                    </div>
                    <div
                            class="bg-[#142132] flex items-center rounded-lg py-2 px-2 text-white shadow-lg drop-shadow-sm">
                        <i class="material-symbols-outlined mr-3 text-3xl text-red-500">error</i>
                        <div>
                            <h6 class="text-red-500 font-bold">
                                Error encoder video GoPNmF4T0oEjnennbwt5
                            </h6>
                            <p class="italic">
                                The video GoPNmF4T0oEjnennbwt5(PETS-036.mp4) has been deleted. Because I can not
                                encode the video
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- cards row 3 -->
    <div class="flex flex-wrap mt-6 -mx-3">
        <div class="w-full max-w-full px-3 mt-0 mb-6 lg:mb-0 lg:w-7/12 lg:flex-none">
            <div
                    class="relative flex flex-col min-w-0 break-wordsborder-0 border-solid shadow-xl bg-[#121520] border-black-125 rounded-2xl bg-clip-border">
                <div class="p-4 pb-0 mb-0 rounded-t-4">
                    <div class="flex justify-between">
                        <h6 class="mb-2 text-[#009FB2] font-bold text-lg">Top 10 viewed videos today</h6>
                    </div>
                </div>
                <div class="overflow-auto h-[calc(25vh)]">
                    <table
                            class="items-center w-full mb-4 align-top border-collapse border-gray-200 overflow-hidden">
                        <tbody>
                        <tr>
                            <td class="p-2 align-middle bg-transparent border-b w-3/10 whitespace-nowrap ">
                                <div class="flex items-center px-2 py-1">
                                    <div class="text-white">
                                        sub-WAAA-135.mp4
                                    </div>
                                </div>
                            </td>
                            <td
                                    class="p-2 text-sm leading-normal align-middle bg-transparent border-b whitespace-nowrap ">
                                <div class="flex-1 text-center">
                                    <h6 class="mb-0 text-sm leading-normal">3400</h6>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="p-2 align-middle bg-transparent border-b w-3/10 whitespace-nowrap">
                                <div class="flex items-center px-2 py-1">
                                    <div class="text-white">
                                        sub-WAAA-135.mp4
                                    </div>
                                </div>
                            </td>
                            <td
                                    class="p-2 text-sm leading-normal align-middle bg-transparent border-b whitespace-nowrap ">
                                <div class="flex-1 text-center">
                                    <h6 class="mb-0 text-sm leading-normal">3400</h6>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="p-2 align-middle bg-transparent border-b w-3/10 whitespace-nowrap ">
                                <div class="flex items-center px-2 py-1">
                                    <div class="text-white">
                                        sub-WAAA-135.mp4
                                    </div>
                                </div>
                            </td>
                            <td
                                    class="p-2 text-sm leading-normal align-middle bg-transparent border-b whitespace-nowrap ">
                                <div class="flex-1 text-center">
                                    <h6 class="mb-0 text-sm leading-normal">3400</h6>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="p-2 align-middle bg-transparent border-b w-3/10 whitespace-nowrap ">
                                <div class="flex items-center px-2 py-1">
                                    <div class="text-white">
                                        sub-WAAA-135.mp4
                                    </div>
                                </div>
                            </td>
                            <td
                                    class="p-2 text-sm leading-normal align-middle bg-transparent border-b whitespace-nowrap ">
                                <div class="flex-1 text-center">
                                    <h6 class="mb-0 text-sm leading-normal">3400</h6>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="p-2 align-middle bg-transparent border-b w-3/10 whitespace-nowrap ">
                                <div class="flex items-center px-2 py-1">
                                    <div class="text-white">
                                        sub-WAAA-135.mp4
                                    </div>
                                </div>
                            </td>
                            <td
                                    class="p-2 text-sm leading-normal align-middle bg-transparent border-b whitespace-nowrap ">
                                <div class="flex-1 text-center">
                                    <h6 class="mb-0 text-sm leading-normal">3400</h6>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="p-2 align-middle bg-transparent border-b w-3/10 whitespace-nowrap ">
                                <div class="flex items-center px-2 py-1">
                                    <div class="text-white">
                                        sub-WAAA-135.mp4
                                    </div>
                                </div>
                            </td>
                            <td
                                    class="p-2 text-sm leading-normal align-middle bg-transparent border-b whitespace-nowrap ">
                                <div class="flex-1 text-center">
                                    <h6 class="mb-0 text-sm leading-normal">3400</h6>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="p-2 align-middle bg-transparent border-b w-3/10 whitespace-nowrap ">
                                <div class="flex items-center px-2 py-1">
                                    <div class="text-white">
                                        sub-WAAA-135.mp4
                                    </div>
                                </div>
                            </td>
                            <td
                                    class="p-2 text-sm leading-normal align-middle bg-transparent border-b whitespace-nowrap ">
                                <div class="flex-1 text-center">
                                    <h6 class="mb-0 text-sm leading-normal">3400</h6>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="p-2 align-middle bg-transparent border-b w-3/10 whitespace-nowrap ">
                                <div class="flex items-center px-2 py-1">
                                    <div class="text-white">
                                        sub-WAAA-135.mp4
                                    </div>
                                </div>
                            </td>
                            <td
                                    class="p-2 text-sm leading-normal align-middle bg-transparent border-b whitespace-nowrap ">
                                <div class="flex-1 text-center">
                                    <h6 class="mb-0 text-sm leading-normal">3400</h6>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="p-2 align-middle bg-transparent border-b w-3/10 whitespace-nowrap ">
                                <div class="flex items-center px-2 py-1">
                                    <div class="text-white">
                                        sub-WAAA-135.mp4
                                    </div>
                                </div>
                            </td>
                            <td
                                    class="p-2 text-sm leading-normal align-middle bg-transparent border-b whitespace-nowrap ">
                                <div class="flex-1 text-center">
                                    <h6 class="mb-0 text-sm leading-normal">3400</h6>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="p-2 align-middle bg-transparent border-b w-3/10 whitespace-nowrap ">
                                <div class="flex items-center px-2 py-1">
                                    <div class="text-white">
                                        sub-WAAA-135.mp4
                                    </div>
                                </div>
                            </td>
                            <td
                                    class="p-2 text-sm leading-normal align-middle bg-transparent border-b whitespace-nowrap ">
                                <div class="flex-1 text-center">
                                    <h6 class="mb-0 text-sm leading-normal">3400</h6>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="w-full max-w-full px-3 mt-0 lg:w-5/12 lg:flex-none">
            <div
                    class="border-black/12.5 shadow-xl bg-[#121520] relative flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-clip-border">
                <div class="p-4 pb-0 rounded-t-4">
                    <h6 class="mb-0 text-[#009FB2] font-bold text-lg">Top Country</h6>
                </div>
                <div class="overflow-auto">
                    <table
                            class="items-center w-full mb-4 align-top border-collapse border-gray-200 ">
                        <tbody>
                        <tr>
                            <td class="p-2 align-middle bg-transparent border-b w-3/10 whitespace-nowrap ">
                                <div class="flex items-center px-2 py-1">
                                    <div>
                                        <img src="" alt="Country flag"/>
                                    </div>
                                    <div class="ml-6">
                                        <p class="mb-0 text-xs font-semibold leading-tight">
                                            Country:
                                        </p>
                                        <h6 class="mb-0 text-sm leading-normal">United States</h6>
                                    </div>
                                </div>
                            </td>
                            <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap ">
                                <div class="text-center">
                                    <p class="mb-0 text-xs font-semibold leading-tight">
                                        Sales:</p>
                                    <h6 class="mb-0 text-sm leading-normal">2500</h6>
                                </div>
                            </td>
                            <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap ">
                                <div class="text-center">
                                    <p class="mb-0 text-xs font-semibold leading-tight">
                                        Value:</p>
                                    <h6 class="mb-0 text-sm leading-normal">$230,900</h6>
                                </div>
                            </td>
                            <td
                                    class="p-2 text-sm leading-normal align-middle bg-transparent border-b whitespace-nowrap ">
                                <div class="flex-1 text-center">
                                    <p class="mb-0 text-xs font-semibold leading-tight">
                                        Bounce:</p>
                                    <h6 class="mb-0 text-sm leading-normal">29.9%</h6>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="p-2 align-middle bg-transparent border-b w-3/10 whitespace-nowrap ">
                                <div class="flex items-center px-2 py-1">
                                    <div>
                                        <img src="" alt="Country flag"/>
                                    </div>
                                    <div class="ml-6">
                                        <p class="mb-0 text-xs font-semibold leading-tight">
                                            Country:
                                        </p>
                                        <h6 class="mb-0 text-sm leading-normal">Germany</h6>
                                    </div>
                                </div>
                            </td>
                            <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap ">
                                <div class="text-center">
                                    <p class="mb-0 text-xs font-semibold leading-tight">
                                        Sales:</p>
                                    <h6 class="mb-0 text-sm leading-normal">3.900</h6>
                                </div>
                            </td>
                            <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap ">
                                <div class="text-center">
                                    <p class="mb-0 text-xs font-semibold leading-tight">
                                        Value:</p>
                                    <h6 class="mb-0 text-sm leading-normal">$440,000</h6>
                                </div>
                            </td>
                            <td
                                    class="p-2 text-sm leading-normal align-middle bg-transparent border-b whitespace-nowrap ">
                                <div class="flex-1 text-center">
                                    <p class="mb-0 text-xs font-semibold leading-tight">
                                        Bounce:</p>
                                    <h6 class="mb-0 text-sm leading-normal">40.22%</h6>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="p-2 align-middle bg-transparent border-b w-3/10 whitespace-nowrap ">
                                <div class="flex items-center px-2 py-1">
                                    <div>
                                        <img src="" alt="Country flag"/>
                                    </div>
                                    <div class="ml-6">
                                        <p class="mb-0 text-xs font-semibold leading-tight">
                                            Top Country:
                                        </p>
                                        <h6 class="mb-0 text-sm leading-normal">Great Britain</h6>
                                    </div>
                                </div>
                            </td>
                            <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap ">
                                <div class="text-center">
                                    <p class="mb-0 text-xs font-semibold leading-tight">
                                        Sales:</p>
                                    <h6 class="mb-0 text-sm leading-normal">1.400</h6>
                                </div>
                            </td>
                            <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap ">
                                <div class="text-center">
                                    <p class="mb-0 text-xs font-semibold leading-tight">
                                        Value:</p>
                                    <h6 class="mb-0 text-sm leading-normal">$190,700</h6>
                                </div>
                            </td>
                            <td
                                    class="p-2 text-sm leading-normal align-middle bg-transparent border-b whitespace-nowrap ">
                                <div class="flex-1 text-center">
                                    <p class="mb-0 text-xs font-semibold leading-tight">
                                        Bounce:</p>
                                    <h6 class="mb-0 text-sm leading-normal">23.44%</h6>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="p-2 align-middle bg-transparent border-0 w-3/10 whitespace-nowrap">
                                <div class="flex items-center px-2 py-1">
                                    <div>
                                        <img src="" alt="Country flag"/>
                                    </div>
                                    <div class="ml-6">
                                        <p class="mb-0 text-xs font-semibold leading-tight">
                                            Country:
                                        </p>
                                        <h6 class="mb-0 text-sm leading-normal">Brasil</h6>
                                    </div>
                                </div>
                            </td>
                            <td class="p-2 align-middle bg-transparent border-0 whitespace-nowrap">
                                <div class="text-center">
                                    <p class="mb-0 text-xs font-semibold leading-tight">
                                        Sales:</p>
                                    <h6 class="mb-0 text-sm leading-normal">562</h6>
                                </div>
                            </td>
                            <td class="p-2 align-middle bg-transparent border-0 whitespace-nowrap">
                                <div class="text-center">
                                    <p class="mb-0 text-xs font-semibold leading-tight">
                                        Value:</p>
                                    <h6 class="mb-0 text-sm leading-normal">$143,960</h6>
                                </div>
                            </td>
                            <td class="p-2 text-sm leading-normal align-middle bg-transparent border-0 whitespace-nowrap">
                                <div class="flex-1 text-center">
                                    <p class="mb-0 text-xs font-semibold leading-tight">
                                        Bounce:</p>
                                    <h6 class="mb-0 text-sm leading-normal">32.14%</h6>
                                </div>
                            </td>
                        </tr>
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
