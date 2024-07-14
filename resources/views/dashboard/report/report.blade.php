@extends('dashboard.layouts.app')

@section('content')
    <div class="mt-10 grid grid-cols-1 lg:grid-cols-4 gap-4">
        <div class=" grid grid-cols-1 lg:grid-cols-2 gap-6 lg:col-span-3">
            <!-- card1 -->
            <div class="xl:mb-0">
                <div
                    class='bg-[#121520] rounded-3xl py-2 px-5 shadow-gray-600/30 dark:shadow-slate-900'>
                    <div class='flex items-center justify-between py-2.5'>
                        <h3 class='text-lg text-slate-400'>User watching</h3>
                        <h5 class="mb-0 font-bold text-2xl text-white flex items-center justify-end">
                            {{ $userWatching }}
                            <span class="ml-3 relative flex h-3 w-3">
                              <span
                                  class="animate-ping absolute inline-flex h-full w-full rounded-full bg-sky-400 opacity-75"></span>
                              <span class="relative inline-flex rounded-full h-3 w-3 bg-sky-500"></span>
                            </span>
                        </h5>
                    </div>
                </div>
            </div>
            <!-- card1 -->
            <div class="xl:mb-0">
                <div
                    class='bg-[#121520] rounded-3xl py-2 px-5 shadow-gray-600/30 dark:shadow-slate-900'>
                    <div class='flex items-center justify-between py-2.5'>
                        <h3 class='text-lg text-slate-400'>Today earning</h3>
                        <h5 class="mb-0 font-bold text-2xl text-white  flex items-start">
                            <span class='text-slate-400 text-xl mr-0.5'>$</span> {{ number_format($earnings['today'], 2, '.', ',') }}
                        </h5>
                    </div>
                </div>
            </div>
            <!-- card1 -->
            <div class="xl:mb-0">
                <div
                    class='bg-[#121520] rounded-3xl py-2 px-5 shadow-gray-600/30 dark:shadow-slate-900'>
                    <div class='flex items-center justify-between py-2.5'>
                        <h3 class='text-lg text-slate-400'>Yesterday earning</h3>
                        <h5 class="mb-0 font-bold text-2xl text-white  flex items-start">
                            <span class='text-slate-400 text-xl mr-0.5'>$</span> {{ $earnings['yesterday'] }}
                        </h5>
                    </div>
                </div>
            </div>
            <!-- card1 -->
            <div class="xl:mb-0">
                <div
                    class='bg-[#121520] rounded-3xl py-2 px-5 shadow-gray-600/30 dark:shadow-slate-900'>
                    <div class='flex items-center justify-between py-2.5'>
                        <h3 class='text-lg text-slate-400'>Total Withdrawals</h3>
                        <h5 class="mb-0 font-bold text-2xl text-white  flex items-start">
                            <span class='text-slate-400 text-xl mr-0.5'>$</span> {{ number_format($totalWithdrawals, 0, '.', ',') }}
                        </h5>
                    </div>
                </div>
            </div>
        </div>
        <!-- card1 -->
        <div class="xl:mb-0 lg:col-span-1">
            <div
                class='bg-[#121520] rounded-3xl py-2 px-5 shadow-gray-600/30 dark:shadow-slate-900'>
                <div class='flex flex-col items-center justify-center py-2.5'>
                    <div class='font-semibold text-center'>
                        <h3 class='text-lg text-slate-400'>Total balance</h3>
                        <h5 class="mb-0 font-bold text-2xl text-white mt-3  flex items-start">
                            <span class='text-slate-400 text-xl mr-0.5'>$</span> {{ number_format(($totalProfit-$totalWithdrawals), 0, '.', ',') }}
                        </h5>
                    </div>
                    <button class="button-payout px-4 py-2 rounded-3xl bg-[#142132] hover:bg-[#009FB2] text-white mt-6"
                            report>Request payout
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="text-white mt-3 lg:mt-0 pb-4">
        <div class="py-6">
            <form class="grid grid-cols-3 gap-x-8 font-bold flex-col justify-center items-center h-full" id="get-data-report">
                <div class="col-span-full">
                    <button class="{{request()->get('date') === 'yesterday' ? 'text-[#009fb2]' : 'text-white'}}
                            px-6 py-1 rounded-lg hover:text-[#009fb2] yesterday"
                            data-start-date="{{ date('Y-m-d', strtotime('-1 day')) }}"
                            data-end-date="{{ date('Y-m-d', strtotime('-1 day')) }}"
                            data-tab="yesterday" btn-date-report>Yesterday</button>
                    <span>-</span>
                    <button class="{{request()->get('date') === 'today' ? 'text-[#009fb2]' : 'text-white'}}
                            px-6 py-1 rounded-lg hover:text-[#009fb2] yesterday"
                            data-start-date="{{ date('Y-m-d') }}"
                            data-end-date="{{ date('Y-m-d') }}"
                            data-tab="today" btn-date-report>Today</button>
                    <span>-</span>
                    <button class="{{request()->get('date') === 'week' || request()->get('date') == '' ? 'text-[#009fb2]' : 'text-white'}}
                            px-6 py-1 rounded-lg hover:text-[#009fb2] yesterday"
                            data-start-date="{{ date('Y-m-d', strtotime('-7 day')) }}"
                            data-end-date="{{ date('Y-m-d') }}"
                            data-tab="week" btn-date-report>7 days</button>
                    <span>-</span>
                    <button class="{{request()->get('date') === 'month' ? 'text-[#009fb2]' : 'text-white'}}
                            px-6 py-1 rounded-lg hover:text-[#009fb2] yesterday"
                            data-start-date="{{ date('Y-m-d', strtotime('-30 day')) }}"
                            data-end-date="{{ date('Y-m-d') }}"
                            data-tab="month" btn-date-report>30 days</button>
                </div>
                <div class="col-span-full lg:col-span-2 rounded-lg mt-3 flex">
                    <div date-rangepicker class="w-full flex items-center flex-row">
                        <div class="w-full flex items-center">
                            <div class="relative w-full">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                    </svg>
                                </div>
                                <input name="startDate" value="{{ $startDate }}" type="text" autocomplete="off" class="bg-[#121520] placeholder:text-gray-500 text-white text-sm rounded-lg outline-none
                                focus:ring-blue-500 block w-full ps-10 p-2.5" placeholder="Select date start">
                            </div>
                        </div>
                        <span class="mx-3">-</span>
                        <div class="w-full flex items-center lg:mt-0">
                            <div class="relative w-full">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                    </svg>
                                </div>
                                <input name="endDate"  value="{{ $endDate }}" type="text" autocomplete="off" class="bg-[#121520] placeholder:text-gray-500 text-white text-sm rounded-lg outline-none
                                 focus:ring-blue-500 block w-full ps-10 p-2.5" placeholder="Select date end">
                            </div>
                        </div>
                        <button type="submit" class="text-white ml-3 px-6 py-2 rounded-lg bg-[#121520] hover:bg-[#009fb2]">Apply</button>
                    </div>
                </div>
                <div class="col-span-full lg:col-span-1 rounded-lg">
                    <div class="flex items-center mt-2 w-full">
                        <h4 class="mr-4">Country</h4>
                        <select class="select2 w-full" multiple id="btn-country" data-placeholder="Select country">
                            @foreach( $AllCountries as $country)
                                @if(in_array($country->code, $countries))
                                    <option value="{{ $country->code }}" selected>{{ $country->name }}({{ $country->code }})</option>
                                @else
                                    <option value="{{ $country->code }}">{{ $country->name }}({{ $country->code }})</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
        </form>
        <div class="grid col-span-full mt-4" box-lifted>
            <div
                class="tabs tabs-lifted z-10 -mb-[var(--tab-border)] justify-self-start grid flex-col items-start">
                <button
                    class="{{request()->get('tab') === 'date' ? 'date tab-active !text-[#009FB2]' : 'date'}}
                     tab-report text-white  hover:text-[#009FB2] tab-export [--tab-border-color:#121520] tab font-bold
                    h-auto text-lg px-4 [--tab-bg:#121520] !border-b-0 md:!border-b-1 !rounded-b-lg md:!rounded-b-none before:!hidden md:before:!block"
                    data-content="date">
                    Date
                </button>
                <button
                    class="{{request()->get('tab') === 'country' ? 'country tab-active !text-[#009FB2]' : 'country'}}
                     tab-report text-white  hover:text-[#009FB2] tab-export [--tab-border-color:#121520] tab font-bold
                    h-auto text-lg px-4 [--tab-bg:#121520] !border-b-0 md:!border-b-1 !rounded-b-lg md:!rounded-b-none before:!hidden md:before:!block"
                    data-content="country">
                   Country
                </button>
            </div>
            <div class="rounded-b-xl rounded-tr-xl relative bg-[#121520] grid" id="box-content">
                @include('dashboard.report.'.request()->get('tab', 'date'))
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
                class="w-11/12 sm:w-4/5 xl:w-2/5 bg-[#121520] z-20 py-4 px-3 rounded-lg relative">
                <div class="absolute right-4 top-3">
                    <button fixed-payout-close-button
                            class="inline-block p-0 text-sm font-bold leading-normal text-center uppercase align-middle transition-all ease-in bg-transparent border-0 rounded-lg shadow-none cursor-pointer hover:-translate-y-px tracking-tight-rem bg-150 bg-x-25 active:opacity-85 dark:text-white text-slate-700">
                        <i class="fa fa-close text-xl"></i>
                    </button>
                </div>
                <div>
                    <div class="payout" id="payout">
                        <h5 class="mb-0 text-[#009FB2] text-lg font-semibold">Request Payout</h5>
                        <h4 class="text-4xl text-center font-bold flex items-start justify-center">
                            <span class="text-slate-400 text-2xl">$</span>{{ number_format(($totalProfit-$totalWithdrawals), 0, '.', ',') }}
                        </h4>
                        <div class="text-white mt-3 flex justify-between items-center">
                            <h5>
                                Your USDT Address: {{  Auth::user()->usdt_address }}<br>
                                Network: {{  Auth::user()->network }}
                            </h5>

                        </div>
                        <h5 class="text-start text-slate-400 text-md italic">
                            *Update your USDT address in your profile.
                        </h5>
                        <form class="text-white mt-6 flex justify-between" id="request-payment" method="POST" action="{{route('request.payment')}}">
                            @csrf
                            <div class="bg-[#142132] rounded-lg flex w-full px-3 items-center">
                                <label for="amount" class="mr-3">
                                    Amount:
                                </label>
                                <input type="number" min="50" max="{{ number_format(($totalProfit-$totalWithdrawals), 0, '.', ',') }}" name="amount" id="amount"
                                       class="w-full bg-transparent focus:shadow-primary-outline py-2 pr-3 placeholder:text-gray-500 focus:border-blue-500 focus:outline-none focus:transition-shadow"
                                       placeholder="100"/>
                                <h5>
                                    USD
                                </h5>
                            </div>
                            <button type="submit" class="bg-[#009fb2]/60 rounded-xl px-5 py-2 h-max ml-3 hover:bg-[#009fb2]">
                                Submit
                            </button>
                        </form>
                        <h5 class="text-start text-slate-400 text-lg italic">
                            *Minimal payout is <span class="text-[#009FB2]">$50</span><br>
                        </h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('assets/js/daterangepicker/datepicker.min.js') }}"></script>
@endsection
