@extends('layouts.app')

@section('content')
    <div class="mt-10 grid grid-cols-3 gap-4 items-center">
        <!-- card1 -->
        <div class="px-3 mb-6 xl:mb-0">
            <div
                class=' mt-2 shadow-xl drop-shadow-sm bg-[#202940] rounded-3xl py-2 px-5 shadow-gray-600/30 dark:shadow-slate-900'>
                <div class='flex items-center justify-center py-2.5'>
                    <div class='font-semibold text-center'>
                        <h3 class='text-lg text-emerald-500'>Today earning</h3>
                        <h5 class="mb-0 font-bold text-2xl text-white mt-3">
                            $ 0
                        </h5>
                    </div>
                </div>
            </div>
        </div>
        <!-- card1 -->
        <div class="px-3 mb-6 xl:mb-0">
            <div
                class=' mt-2 shadow-xl drop-shadow-sm bg-[#202940] rounded-3xl py-2 px-5 shadow-gray-600/30 dark:shadow-slate-900'>
                <div class='flex flex-col items-center justify-center py-2.5'>
                    <div class='font-semibold text-center'>
                        <h3 class='text-lg text-emerald-500'>Total balance</h3>
                        <h5 class="mb-0 font-bold text-2xl text-white mt-3">
                            $ 0.00
                        </h5>
                    </div>
                    <button class="px-4 py-2 rounded-3xl bg-emerald-500 text-white mt-6">Request payout</button>
                </div>
            </div>
        </div>
        <!-- card1 -->
        <div class="px-3 mb-6 xl:mb-0">
            <div
                class=' mt-2 shadow-xl drop-shadow-sm bg-[#202940] rounded-3xl py-2 px-5 shadow-gray-600/30 dark:shadow-slate-900'>
                <div class='flex items-center justify-center py-2.5'>
                    <div class='font-semibold text-center'>
                        <h3 class='text-lg text-emerald-500'>Total Withdrawals</h3>
                        <h5 class="mb-0 font-bold text-2xl text-white mt-3">
                            $ 0
                        </h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="text-end mt-3">
        <a href="/setting?page=setting&content=accountsetting" class="rounded-lg bg-orange-500 px-2 py-2 text-white text-sm">
            <i class="material-icons text-lg mr-2">settings</i>Earning Mode
        </a>
    </div>
    <div class="text-white bg-[#202940] mt-3 rounded-lg p-4">
        <div class="date">
            <form action="" class="flex font-bold justify-between items-center">
                <div class="flex">
                    <div class="bg-teal-500	w-max px-3 py-1.5 rounded-lg mr-3">
                        <label for="from">From:</label>
                        <input type="date" name="from" id="from" class="outline-none bg-transparent">
                    </div>
                    <div class="bg-teal-500	w-max px-3 py-1.5 rounded-lg">
                        <label for="from">To:</label>
                        <input type="date" name="to" id="to" class="outline-none bg-transparent">
                    </div>
                    <div class="ml-4">
                        <button type="button" class="bg-slate-900 rounded-3xl px-3 py-1.5">Yesterday</button>
                        <span>-</span>
                        <button type="button" class="bg-indigo-500 rounded-3xl px-3 py-1.5">Last 7 days</button>
                        <span>-</span>
                        <button type="button" class="bg-slate-900 rounded-3xl px-3 py-1.5">last 30 days</button>
                    </div>
                </div>
                <div class="items-end">
                    <button class="bg-green-500 px-6 py-1.5 rounded-2xl text-xl" type="submit">Apply</button>
                </div>
            </form>
            <div class="table-earning">
                @include('Report.dataEarning')
            </div>
        </div>
    </div>
    <div class="text-white bg-[#202940] mt-6 rounded-lg p-4">
        @include('Report.payment')
    </div>
@endsection
