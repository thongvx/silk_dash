@extends('admin.layouts.app')

@section('content')
    <div class="mt-10 grid grid-cols-1 lg:grid-cols-2 gap-4">
        <div class="lg:col-span-1">
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
            <!-- card1 -->
            <div class="xl:mb-0">
                <div
                    class='bg-[#121520] rounded-3xl py-2 px-5 shadow-gray-600/30 dark:shadow-slate-900'>
                    <div class='flex items-center justify-between py-2.5'>
                        <h3 class='text-lg text-slate-400'>Total Balance</h3>
                        <h5 class="mb-0 font-bold text-2xl text-white  flex items-start">
                            <span class='text-slate-400 text-xl mr-0.5'>$</span> {{ number_format(($totalBalance), 0, '.', ',') }}
                        </h5>
                    </div>
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
                    @include('admin.statistic.date')
                </div>
            </div>
        </div>

        @endsection
        @section('scripts')
            <script src="{{ asset('assets/js/daterangepicker/datepicker.min.js') }}"></script>
@endsection
