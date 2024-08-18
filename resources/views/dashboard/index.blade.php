@extends('dashboard.layouts.app')

@section('content')
    <div class="flex flex-wrap -mx-3">
        <div class="w-full mb-4 pl-3 text-transparent bg-clip-text bg-gradient-to-b from-[#0692C6] to-[#00D9E1]">
            <h2 class="text-4xl font-bold italic">
                Welcome back, {{ Auth::user()->name }} !
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
                                        {{ $userWatching }}
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
                                        <h5 class="mb-0 text-white">{{ $storage }}</h5>
                                        <span
                                            class="text-emerald-500 pl-3 text-sm font-bold leading-normal items-center flex">
                                            {{ $totalFile }} file
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
                                        <h5 class="mb-0 text-white">0 Views</h5>
                                        <span
                                            class="text-rose-500 pl-3 text-sm font-bold leading-normal items-center flex">
                                            <i class="material-symbols-outlined opacity-1 text-xl">arrow_drop_down</i> +0%
                                        </span>
                                    </div>
                                    <div>
                                        <h5 class="mb-0 text-white">0 Day</h5>
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
                                            <span
                                                class='text-slate-400 text-lg mr-0.5'>$</span>{{ number_format(($totalProfit-$totalWithdrawals), 0, '.', ',') }}
                                        </h5>
                                        <span
                                            class="text-emerald-500 pl-3 text-sm font-bold leading-normal items-center hidden">
                                            <i class="material-symbols-outlined opacity-1 text-xl">arrow_drop_up</i> +55%
                                        </span>
                                    </div>
                                </div>
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
                                        @php
                                            if ( $earnings['2days'] != 0)
                                            $bounce1 = round(($earnings['yesterday'] - $earnings['2days']) / $earnings['2days'] * 100, 2);
                                            else
                                            $bounce1 = 0;

                                        @endphp
                                        @if($earnings['yesterday'] > $earnings['2days'] && $earnings['2days'] != 0)
                                            <span
                                                class="text-emerald-500 pl-3 text-sm font-bold leading-normal items-center flex">
                                            <i class="material-symbols-outlined opacity-1 text-xl">arrow_drop_up</i> +{{ $bounce1 }}%
                                        </span>
                                        @else
                                            <span
                                                class="text-rose-500 pl-3 text-sm font-bold leading-normal items-center flex">
                                            <i class="material-symbols-outlined opacity-1 text-xl">arrow_drop_down</i> -{{ $bounce1 }}%
                                        </span>
                                        @endif
                                    </div>
                                    <h5 class="text-2xl mb-0 text-white mt-2 flex items-start">
                                        <span
                                            class='text-slate-400 text-lg mr-0.5'>$</span>{{ number_format($earnings['yesterday'], 2, '.', ',') }}
                                    </h5>
                                </div>
                            </div>
                            <!-- card2 -->
                            <div class="px-2 py-2 rounded-xl xl:mb-0 bg-[#142132]">
                                <div class=''>
                                    <div class='text-md w-full flex items-center justify-between'>
                                        <h3 class='text-slate-400'>Today’s Earning</h3>
                                        @php
                                            if ($earnings['yesterday'] != 0)
                                                $bounce2 = round(($earnings['today'] - $earnings['yesterday']) / $earnings['yesterday'] * 100, 2);
                                            else
                                                $bounce2 = 0;
                                        @endphp
                                        @if($earnings['today'] > $earnings['yesterday'] && $earnings['yesterday'] != 0)
                                            <span
                                                class="text-emerald-500 pl-3 text-sm font-bold leading-normal items-center flex">
                                            <i class="material-symbols-outlined opacity-1 text-xl">arrow_drop_up</i> +{{ $bounce2 }}%
                                        </span>
                                        @else
                                            <span
                                                class="text-rose-500 pl-3 text-sm font-bold leading-normal items-center flex">
                                            <i class="material-symbols-outlined opacity-1 text-xl">arrow_drop_down</i> -{{ $bounce2 }}%
                                        </span>
                                        @endif
                                    </div>
                                    <h5 class="text-2xl mb-0 text-white mt-2 flex items-start">
                                        <span
                                            class='text-slate-400 text-lg mr-0.5'>$</span>{{ number_format($earnings['today'], 2, '.', ',') }}
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
                    <h6 class="text-[#009FB2] font-bold">
                        <a href="/report?tab=date">Statistics</a>
                    </h6>
                    <div class="text-white">
                        <button class="rounded-lg px-4 py-1 bg-[#009FB2] switchButton week"
                                data-chart="week" data-date="{{ $dates['week'] }}">Week
                        </button>
                        <button class="rounded-lg px-4 py-1 bg-[#142132] switchButton"
                                data-chart="month" data-date="{{ $dates['month'] }}">Month
                        </button>
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
                    @if(Auth::user()->email_verified_at->addMonth()->format('Y-m-d') >= now()->format('Y-m-d') && $payments->count() == 0)
                        <a href="javascript:;" data-box="gift" btn-info-noti-important
                           class="bg-[#009FB2] sticky top-0 flex z-20 items-center justify-center rounded-lg py-2 px-2 text-white shadow-lg drop-shadow-sm mb-4 ">
                        <span class="absolute -left-2 -bottom-4 w-16">
                            <img src="{{ asset('image/voucher/discount2.svg') }}" alt="" class="animate-ping !scale-125 opacity-50 absolute">
                            <img src="{{ asset('image/voucher/discount2.svg') }}" alt="">
                        </span>
                            <span class="absolute left-44 top-2 w-16 opacity-75 hidden">
                            <img src="{{ asset('image/voucher/Fireworks.gif') }}" alt="">
                        </span>
                            <span class="absolute right-48 top-0 w-20 opacity-75">
                            <img src="{{ asset('image/voucher/Confetti.gif') }}" alt="">
                        </span>
                            <span class="absolute left-20 w-20 hidden lg:hidden xl:block">
                            <img src="{{ asset('image/voucher/party.svg') }}" alt="">
                        </span>
                            <span class="absolute -right-4 w-20">
                            <img src="{{ asset('image/voucher/BitcoinTrade.gif') }}" alt="" class="scale-x-[-1]">
                        </span>
                            <span class="absolute right-20 w-20 hidden lg:hidden xl:block">
                            <img src="{{ asset('image/voucher/party.svg') }}" alt="" class="scale-x-[-1]">
                        </span>
                            <div class="info sticky z-30">
                                <h6 class="text-white font-bold w-max subject text-center">
                                    Gift up to 30% for first withdrawal!<br>
                                    <span
                                        class="text-sm">Expires: {{ Auth::user()->email_verified_at->addMonth()->format('Y-m-d') }}</span>
                                </h6>
                            </div>
                        </a>
                    @endif
                        <a href="javascript:;" data-box="zoom" btn-info-noti-important
                           class="bg-[#009FB2] sticky {{Auth::user()->email_verified_at->addMonth()->format('Y-m-d') >= now()->format('Y-m-d') || $payments->count() == 0 ? 'top-20' : 'top-0' }} flex z-20 items-center justify-center rounded-lg py-2 px-2 text-white shadow-lg drop-shadow-sm mb-4 ">
                            <div class="info sticky z-30">
                                <h6 class="text-white font-bold w-max subject text-center py-3">
                                    Please use newest Z-o-o-m version to upload videos!<br>
                                </h6>
                            </div>
                        </a>
                    @forelse($notifications as $notification)
                        <a href="javascript:;" data-id="{{ $notification->id }}" btn-read btn-info-noti
                           class="bg-[#142132] flex items-center rounded-lg py-2 px-2 text-white group shadow-lg drop-shadow-sm mb-4">
                            <i class="material-symbols-outlined mr-3 text-3xl {{ $notification->type  == 'error' || $notification->type == 'delete' ? 'text-red-500' : 'text-orange-500'}}">
                                {{ $notification->type }}
                            </i>
                            <div class="info">
                                <h6 class="text-white font-bold w-max subject group-hover:text-[#009FB2]">
                                    {{ $notification->subject }}
                                </h6>
                                <span class="text-slate-400 text-sm date"
                                      data-date="{{ $notification->created_at }}">{{ $notification->created_at->diffForHumans() }}</span>
                                <span class="hidden message">{{ $notification->message }}</span>
                            </div>
                        </a>
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
                        class="text-sm border-separate table-auto overflow-y-clip w-full min-w-max text-white text-left !border-t-0">
                        <tbody>
                        @forelse( $topVideos as $video )
                            <tr class="my-3 h-12 odd:bg-transparent even:bg-[#142132] text-white">
                                <td class="p-2  max-w-[4rem] truncate">
                                    <a href="{{route('play', $video->slug)}}" target="_black"
                                       class="hover:text-[#009FB2] ">{{ $video->title }}</a>
                                </td>
                                <td class="p-2 text-center">
                                    {{ $video->views }}
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
                        class="text-center text-sm border-separate table-auto overflow-y-clip w-full min-w-max text-white text-left !border-t-0">
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
                                            {{ $data['country'] }}
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
                                        <h6 class="mb-0 text-sm leading-normal">{{ $data['percentage'] }} %</h6>
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
    <div fixed-noti-gift-card
         class="opacity-1 bg-black/20 z-50 shadow-3xl w-screen ease fixed top-0 left-0 hidden h-full backdrop-blur-sm
                min-w-0 flex-col break-words rounded-none border-0 bg-clip-border duration-200 justify-center items-center px-3">
        <div class="absolute h-full w-full fixed-plugin-close-button z-10" fixed-noti-close-button>
        </div>
        <div
            class="w-11/12 sm:w-4/5 xl:w-2/5 bg-[#121520] z-20 py-4 px-3 rounded-lg relative">
            <div class="absolute right-4 top-3">
                <button fixed-noti-close-button
                        class="inline-block p-0 text-sm font-bold leading-normal text-center uppercase align-middle transition-all ease-in bg-transparent border-0 rounded-lg shadow-none cursor-pointer hover:-translate-y-px tracking-tight-rem bg-150 bg-x-25 active:opacity-85 dark:text-white text-slate-700">
                    <i class="material-symbols-outlined text-3xl">close</i>
                </button>
            </div>
            <div  id="fixed-box-control" class="mb-4">
                @if(Auth::user()->email_verified_at->addMonth()->format('Y-m-d') >= now()->format('Y-m-d') && $payments->count() == 0)
                <div class="box gift text-white hidden">
                    <h1><b><i>Dear member,</i></b></h1><br>
                    <p>I’m Richard, manager of <a href="https://streamsilk.com/">StreamSilk.com</a>.</p><br>
                    <p>I’m very happy to give you our <span class="font-bold"><i>Gift program for new members. On your first withdrawal, you will receive an
                        additional 10% to 30%</i></span>.</p>
                    <p>The bigger the amount, the bigger the gift. The program is valid for <b><i>1 month from the time you register
                        your account.</i></b></p><br>
                    <p>Please access the Report page to get details.</p>
                    <div class="text-center mt-3">
                        <button class="rounded-lg bg-[#142132] px-4 py-1 text-white hover:bg-[#009FB2]">
                            <a href="https://streamsilk.com/report?tab=date">Report Page</a>
                        </button>
                    </div><br>
                    <p>Let’s start uploading your videos and sharing them to make lots of money now!</p>
                    <p>If you need any further support, please don’t hesitate to contact me!</p>
                    <p >Telegram: <a class="font-bold"  href="https://t.me/RichardSSilk" target="_black"><i>https://t.me/RichardSSilk</i></a><br>
                        Skype: <a class="font-bold" href="skype:live:.cid.62ed279799bfed31" target="_black"><i>live:.cid.62ed279799bfed31</i></a></p><br>
                    <p><i>Regards,<br><b>Richard - StreamSilk</b></i></p>
                </div>
                @endif
                <div class="box zoom text-white hidden">
                    <h1><b><i>Dear member,</i></b></h1>
                    <br>
                    <p>
                        How are you doing?<br>
                        I’m Richard, manager of <a href="https://streamsilk.com/">StreamSilk</a>.<br>
                    </p>
                    <br>
                    <p>
                        <span class="font-medium italic">We are excited to announce that we have partnered with Zoom to increase video upload speeds to the highest possible level.</span><br>
                        Please use newest version of Z-o-o-m app to continue uploading your videos.<br>
                        <span class="text-rose-600 italic font-semibold">And the streamsilk[api] has best speed for upload videos</span>
                    </p>
                    <br>
                    <p>
                        Let’s upload your videos and experience our “silky” uploading and playing service 😊
                    </p>
                    <br>
                    <p>
                        If you need any further support, please don’t hesitate to contact me!<br>
                        Telegram: <a href="https://t.me/RichardSSilk" class="font-bold hover:text-[#009FB2] italic">https://t.me/RichardSSilk</a><br>
                        Skype: <a href="skype:live:.cid.62ed279799bfed31" class="font-bold hover:text-[#009FB2] italic">live:.cid.62ed279799bfed31</a>
                    </p>
                    <br>
                    <p><i>Regards,<br><b>Richard - StreamSilk</b></i></p>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/chart/filechart.js') }}"></script>
@endsection
