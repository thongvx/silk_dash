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
    <div class="text-white bg-[#121520] mt-3 rounded-lg p-4 hidden">
        <div class="date">
            <form action="" class="flex font-bold justify-between items-center">
                <div class="flex">
                    <div class="bg-teal-500	w-max px-3 py-1.5 rounded-lg mr-3">
                        <label for="from">From:</label>
                        <input type="date" name="from" id="from" class="outline-none bg-transparent">
                    </div>
                    <div class="bg-teal-500	w-max px-3 py-1.5 rounded-lg">
                        <label for="from">To:</label>
                        <label for="to"></label><input type="date" name="to" id="to" class="outline-none bg-transparent">
                    </div>
                    <div class="ml-4">
                        <button type="button" class="bg-[#142132] hover:bg-[#009FB2] rounded-3xl px-3 py-1.5">
                            Yesterday
                        </button>
                        <span class="mx-3">-</span>
                        <button type="button" class="bg-[#009FB2] rounded-3xl px-3 py-1.5">Last 7 days</button>
                        <span class="mx-3">-</span>
                        <button type="button" class="bg-[#142132] hover:bg-[#009FB2] rounded-3xl px-3 py-1.5">last 30
                            days
                        </button>
                    </div>
                </div>
                <div class="items-end">
                    <button class="bg-[#142132] hover:bg-[#009FB2] px-6 py-1.5 rounded-2xl text-xl" type="submit">
                        Apply
                    </button>
                </div>
            </form>
            <div class="table-earning">
                @include('dashboard.report.dataEarning')
            </div>

        </div>
    </div>
    <div class="grid mt-3" box-lifted>
        <div
            class="tabs tabs-lifted z-10 -mb-[var(--tab-border)] justify-self-start grid flex-col items-start">
            <button
                class="yesterday tab-active !text-[#009FB2] text-white hover:text-[#009FB2] tab-export [--tab-border-color:#121520] tab font-bold
                    h-auto text-md px-4 [--tab-bg:#121520] !border-b-0 md:!border-b-1 !rounded-b-lg md:!rounded-b-none before:!hidden md:before:!block"
                data-content="yesterday">
                Yesterday
            </button>
            <button
                class="last-7-days text-white hover:text-[#009FB2] tab-export [--tab-border-color:#121520] tab font-bold
                    h-auto text-md px-4 [--tab-bg:#121520] !border-b-0 md:!border-b-1 !rounded-b-lg md:!rounded-b-none before:!hidden md:before:!block"
                data-content="last-7-days">
                Last 7 days
            </button>
            <button
                class="last-30-days text-white hover:text-[#009FB2] tab-export [--tab-border-color:#121520] tab font-bold
                    h-auto text-md px-4 [--tab-bg:#121520] !border-b-0 md:!border-b-1 !rounded-b-lg md:!rounded-b-none before:!hidden md:before:!block"
                data-content="last-30-days">
                last 30 days
            </button>
        </div>
        <div class="rounded-b-xl rounded-tr-xl relative bg-[#121520] grid">
            @include('dashboard.report.dataEarning')
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

