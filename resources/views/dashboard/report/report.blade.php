@extends('dashboard.layouts.app')

@section('content')
    <div class="mt-10 grid grid-cols-1 lg:grid-cols-4 gap-4">
        <div class=" grid grid-cols-1 lg:grid-cols-2 gap-4 lg:col-span-3">
            <!-- card1 -->
            <div class="px-3 xl:mb-0">
                <div
                    class='bg-[#121520] rounded-3xl py-2 px-5 shadow-gray-600/30 dark:shadow-slate-900'>
                    <div class='flex items-center justify-between py-2.5'>
                        <h3 class='text-lg text-slate-400'>User watching</h3>
                        <h5 class="mb-0 font-bold text-2xl text-white">
                            2000
                        </h5>
                    </div>
                </div>
            </div>
            <!-- card1 -->
            <div class="px-3 xl:mb-0">
                <div
                    class='bg-[#121520] rounded-3xl py-2 px-5 shadow-gray-600/30 dark:shadow-slate-900'>
                    <div class='flex items-center justify-between py-2.5'>
                        <h3 class='text-lg text-slate-400'>Today earning</h3>
                        <h5 class="mb-0 font-bold text-2xl text-white">
                            $ 0
                        </h5>
                    </div>
                </div>
            </div>
            <!-- card1 -->
            <div class="px-3 xl:mb-0">
                <div
                    class='bg-[#121520] rounded-3xl py-2 px-5 shadow-gray-600/30 dark:shadow-slate-900'>
                    <div class='flex items-center justify-between py-2.5'>
                        <h3 class='text-lg text-slate-400'>Yesterday earning</h3>
                        <h5 class="mb-0 font-bold text-2xl text-white">
                            $ 0
                        </h5>
                    </div>
                </div>
            </div>
            <!-- card1 -->
            <div class="px-3 xl:mb-0">
                <div
                    class='bg-[#121520] rounded-3xl py-2 px-5 shadow-gray-600/30 dark:shadow-slate-900'>
                    <div class='flex items-center justify-between py-2.5'>
                        <h3 class='text-lg text-slate-400'>Total Withdrawals</h3>
                        <h5 class="mb-0 font-bold text-2xl text-white">
                            $ 0
                        </h5>
                    </div>
                </div>
            </div>
        </div>
        <!-- card1 -->
        <div class="px-3 xl:mb-0 lg:col-span-1">
            <div
                class='bg-[#121520] rounded-3xl py-2 px-5 shadow-gray-600/30 dark:shadow-slate-900'>
                <div class='flex flex-col items-center justify-center py-2.5'>
                    <div class='font-semibold text-center'>
                        <h3 class='text-lg text-slate-400'>Total balance</h3>
                        <h5 class="mb-0 font-bold text-2xl text-white mt-3">
                            $ 0.00
                        </h5>
                    </div>
                    <button class="button-payout px-4 py-2 rounded-3xl bg-[#142132] hover:bg-[#009FB2] text-white mt-6"
                            report>Request payout
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="text-end mt-3">
        <a href="/setting?tab=accountsetting"
           class="rounded-lg bg-orange-500 px-2 py-2 text-white text-sm">
           <i class="material-symbols-outlined text-lg mr-2">settings</i>Earning Mode
        </a>
    </div>
    <div class="text-white mt-3 lg:mt-0 pb-4 grid grid-cols-7 gap-4">
        <div class="date col-span-7 lg:col-span-2  bg-[#121520] rounded-lg py-6">
            <form action="" id="date-report" class="flex font-bold flex-col justify-center items-center h-full">
                <h4>Select date</h4>
                <div class="w-full px-6">
                    <div date-rangepicker class="flex items-center flex-col">
                        <div class="w-full">
                            <span class="mx-4 text-white">From</span>
                            <div class="relative">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                    </svg>
                                </div>
                                <input name="start" type="text" autocomplete="off" class="bg-[#142132] placeholder:text-gray-500 text-white text-sm rounded-lg outline-none
                                focus:ring-blue-500 block w-full ps-10 p-2.5" placeholder="Select date start">
                            </div>
                        </div>
                        <div class="w-full mt-3">
                            <span class="mx-4 text-white">To</span>
                            <div class="relative">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                    </svg>
                                </div>
                                <input name="end" type="text" autocomplete="off" class="bg-[#142132] placeholder:text-gray-500 text-white text-sm rounded-lg outline-none
                                 focus:ring-blue-500 block w-full ps-10 p-2.5" placeholder="Select date end">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="items-end mt-4 w-full px-6">
                    <button class="bg-[#142132] hover:bg-[#009FB2] px-6 py-1.5 rounded-lg text-lg w-full" type="submit">
                        Apply
                    </button>
                </div>
            </form>
        </div>
        <div class="grid col-span-7 lg:col-span-5" box-lifted>
            <div
                class="tabs tabs-lifted z-10 -mb-[var(--tab-border)] justify-self-start grid flex-col items-start">
                <button
                    class="yesterday tab-chart-report text-white hover:text-[#009FB2] tab-export [--tab-border-color:#121520] tab font-bold
                    h-auto text-md px-4 [--tab-bg:#121520] !border-b-0 md:!border-b-1 !rounded-b-lg md:!rounded-b-none before:!hidden md:before:!block"
                    data-content="yesterday">
                    Yesterday
                </button>
                <button
                    class="last-7-days tab-chart-report tab-active !text-[#009FB2] text-white hover:text-[#009FB2] tab-export [--tab-border-color:#121520] tab font-bold
                    h-auto text-md px-4 [--tab-bg:#121520] !border-b-0 md:!border-b-1 !rounded-b-lg md:!rounded-b-none before:!hidden md:before:!block"
                    data-content="last-7-days">
                    Last 7 days
                </button>
                <button
                    class="last-30-days tab-chart-report text-white hover:text-[#009FB2] tab-export [--tab-border-color:#121520] tab font-bold
                    h-auto text-md px-4 [--tab-bg:#121520] !border-b-0 md:!border-b-1 !rounded-b-lg md:!rounded-b-none before:!hidden md:before:!block"
                    data-content="last-30-days">
                    last 30 days
                </button>
            </div>
            <div class="rounded-b-xl rounded-tr-xl relative bg-[#121520] grid">
                <div class="flex-auto">
                    <div>
                        <canvas id="chart-bars" height="300"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="text-white bg-[#121520] mt-6 rounded-lg p-4">
        @include('dashboard.report.payment')
    </div>

    <div fixed-payout>
        <!-- -right-90 in loc de 0-->
        <div fixed-payout-card
             class="opacity-0 hidden bg-black/20 z-50 shadow-3xl w-screen ease fixed top-0 left-0 flex h-full  backdrop-blur-sm
           min-w-0 flex-col break-words rounded-none border-0 bg-clip-border duration-200 justify-center items-center px-3">
            <div class="absolute h-full w-full fixed-plugin-close-button z-10" fixed-payout-close-button>
            </div>
            <div
                class="w-11/12 sm:w-4/5 xl:w-2/5 bg-[#121520] z-20 py-4 px-3 rounded-lg relative shadow-lg shadow-slate-900">
                <div class="absolute right-4 top-3">
                    <button fixed-payout-close-button
                            class="inline-block p-0 text-sm font-bold leading-normal text-center uppercase align-middle transition-all ease-in bg-transparent border-0 rounded-lg shadow-none cursor-pointer hover:-translate-y-px tracking-tight-rem bg-150 bg-x-25 active:opacity-85 dark:text-white text-slate-700">
                        <i class="fa fa-close text-xl"></i>
                    </button>
                </div>
                <div>
                    <div class="payout" id="payout">
                        <h5 class="mb-0 text-[#009FB2] text-lg font-semibold">Request Payout</h5>
                        <h5 class="text-center text-white">
                            *Min payout: $100<br>
                            (We only pay via USDT - we do not charge any network fees)
                        </h5>
                        <div class="text-white mt-3 flex justify-between items-center">
                            <h5>
                                Your USDT Address: aaaaaaaaaaaaaa<br>
                                Network: Ethereum
                            </h5>
                            <a href="" class="rounded-xl bg-blue-400 px-5 py-2 h-max">Change</a>
                        </div>
                        <form class="text-white mt-3 flex justify-between">
                            <div class="bg-[#142132] rounded-lg flex w-full px-3 items-center">
                                <label for="amount" class="mr-3">
                                    Amount:
                                </label>
                                <input type="number" min="100" max="2000" name="amount" id="amount"
                                       class="w-full bg-transparent focus:shadow-primary-outline py-2 pr-3 placeholder:text-gray-500 focus:border-blue-500 focus:outline-none focus:transition-shadow"
                                       placeholder="100"/>
                                <h5>
                                    USD
                                </h5>
                            </div>
                            <button class="bg-green-300 rounded-xl px-5 py-2 h-max ml-3 hover:bg-green-500" disabled>
                                Submit
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

