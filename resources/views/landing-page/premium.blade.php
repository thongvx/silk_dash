@extends('landing-page.layouts.app')

@section('content')
    <section class="text-white xl:px-20 px-4 sm:px-8">
        <div class="flex justify-center pb-20">
            <div class="relative rounded-xl container">
                <div class="flex items-center flex-col mb-8">
                    <div class="mb-2" id='title'>
                        <h5 class="text-white text-4xl font-bold mt-8">
                            <span>Choose the right plan for you</span>
                        </h5>
                    </div>
                    <div class="flex items-center w-max mt-3">
                        <button data-plan="User" class="tab-premium bg-[#121520] hover:bg-[#009FB2] px-3 sm:px-8 py-2  rounded-l-full">Premium User Plans</button>
                        <button data-plan="Views" class="tab-premium bg-[#009FB2] px-3 sm:px-8 py-2 hover:bg-[#009FB2] rounded-r-full">Premium Views Plans</button>
                    </div>
                </div>
                <div class="w-full max-w-full mb-4 plan" id="Views">
                    <div
                        class='flex flex-wrap drop-shadow-sm rounded-2xl py-2'>
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 grid-flow-row gap-8 w-full max-w-full ">
                            <!-- card1 -->
                            <div class="">
                                <div
                                    class='h-full px-3 mt-2 bg-[#121520] py-10 rounded-2xl'>
                                    <div class='flex flex-col justify-between w-full'>
                                        <div>
                                            <h4 class="text-4xl text-[#00bbd2] flex items-end">
                                                $5 <span class="text-xl pl-2 mb-1">/ 10K views</span>
                                            </h4>
                                        </div>
                                        <div class="mt-4 text-lg pl-4">
                                            <ul class="list-disc">
                                                <li class="my-3">No StreamSilk Ads</li>
                                                <li class="my-3">Detailed Reports</li>
                                                <li class="my-3">Premium Views Manage</li>
                                                <li class="my-3">Unlimited Bandwidth</li>
                                            </ul>
                                        </div>
                                        <div class="mt-8 flex justify-center w-full">
                                            <button class="flex items-center bg-[#142132] hover:bg-[#009FB2] px-6 py-1 rounded-full">
                                                <i class="material-symbols-outlined opacity-1 text-white text-3xl">currency_bitcoin</i>
                                                Bitcoin
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- card2 -->
                            <div class="">
                                <div
                                    class='h-full px-3 mt-2 bg-[#121520] py-10 rounded-2xl'>
                                    <div class='flex flex-col justify-between w-full'>
                                        <div>
                                            <h4 class="text-4xl text-[#00bbd2] flex items-end">
                                                $20 <span class="text-xl pl-2 mb-1">/ 40K views</span>
                                            </h4>
                                        </div>
                                        <div class="mt-4 text-lg pl-4">
                                            <ul class="list-disc list-outside">
                                                <li class="my-3">No StreamSilk Ads</li>
                                                <li class="my-3">Detailed Reports</li>
                                                <li class="my-3">Premium Views Manage</li>
                                                <li class="my-3">Unlimited Bandwidth</li>
                                            </ul>
                                        </div>
                                        <div class="mt-8 flex justify-center w-full">
                                            <button class="flex items-center bg-[#142132] hover:bg-[#009FB2] px-6 py-1 rounded-full">
                                                <i class="material-symbols-outlined opacity-1 text-white text-3xl">currency_bitcoin</i>
                                                Bitcoin
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- card3 -->
                            <div class="">
                                <div
                                    class='h-full px-3 mt-2 bg-[#121520] py-10 rounded-2xl'>
                                    <div class='flex flex-col justify-between w-full'>
                                        <div>
                                            <h4 class="text-4xl text-[#00bbd2] flex items-end">
                                                $50 <span class="text-xl pl-2 mb-1">/ 100K views</span>
                                            </h4>
                                        </div>
                                        <div class="mt-4 text-lg pl-4">
                                            <ul class="list-disc list-outside">
                                                <li class="my-3">No StreamSilk Ads</li>
                                                <li class="my-3">Detailed Reports</li>
                                                <li class="my-3">Premium Views Manage</li>
                                                <li class="my-3">Unlimited Bandwidth</li>
                                            </ul>
                                        </div>
                                        <div class="mt-8 flex justify-center w-full">
                                            <button class="flex items-center bg-[#142132] hover:bg-[#009FB2] px-6 py-1 rounded-full">
                                                <i class="material-symbols-outlined opacity-1 text-white text-3xl">currency_bitcoin</i>
                                                Bitcoin
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- card4 -->
                            <div class="">
                                <div
                                    class='h-full px-3 mt-2 bg-[#121520] py-10 rounded-2xl'>
                                    <div class='flex flex-col justify-between w-full'>
                                        <div>
                                            <h4 class="text-4xl text-[#00bbd2] flex items-end">
                                                $100 <span class="text-xl pl-2 mb-1">/ 200K views</span>
                                            </h4>
                                        </div>
                                        <div class="mt-4 text-lg pl-4">
                                            <ul class="list-disc list-outside">
                                                <li class="my-3">No StreamSilk Ads</li>
                                                <li class="my-3">Detailed Reports</li>
                                                <li class="my-3">Premium Views Manage</li>
                                                <li class="my-3">Unlimited Bandwidth</li>
                                            </ul>
                                        </div>
                                        <div class="mt-8 flex justify-center w-full">
                                            <button class="flex items-center bg-[#142132] hover:bg-[#009FB2] px-6 py-1 rounded-full">
                                                <i class="material-symbols-outlined opacity-1 text-white text-3xl">currency_bitcoin</i>
                                                Bitcoin
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full max-w-full mb-4 plan hidden" id="User">
                    <div
                        class='flex flex-wrap drop-shadow-sm rounded-2xl py-2'>
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 grid-flow-row gap-8 w-full max-w-full ">
                            <!-- card1 -->
                            <div class="">
                                <div
                                    class='h-full px-3 mt-2 bg-[#121520] py-10 rounded-2xl'>
                                    <div class='flex flex-col justify-between w-full'>
                                        <div>
                                            <h4 class="text-4xl text-[#00bbd2] flex items-end">
                                                $30 <span class="text-xl pl-2 mb-1">/Month</span>
                                            </h4>
                                        </div>
                                        <div class="mt-4 text-lg pl-4">
                                            <ul class="list-disc">
                                                <li class="my-3">Priority Upload</li>
                                                <li class="my-3">Multi Quality</li>
                                                <li class="my-3">Priority Encoding</li>
                                                <li class="my-3">Keep Orginal File</li>
                                            </ul>
                                        </div>
                                        <div class="mt-8 flex justify-center w-full">
                                            <button class="flex items-center bg-[#142132] hover:bg-[#009FB2] px-6 py-1 rounded-full">
                                                <i class="material-symbols-outlined opacity-1 text-white text-3xl">currency_bitcoin</i>
                                                Bitcoin
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- card2 -->
                            <div class="">
                                <div
                                    class='h-full px-3 mt-2 bg-[#121520] py-10 rounded-2xl'>
                                    <div class='flex flex-col justify-between w-full'>
                                        <div>
                                            <h4 class="text-4xl text-[#00bbd2] flex items-end">
                                                $90 <span class="text-xl pl-2 mb-1">/ 3 Month</span>
                                            </h4>
                                        </div>
                                        <div class="mt-4 text-lg pl-4">
                                            <ul class="list-disc list-outside">
                                                <li class="my-3">Priority Upload</li>
                                                <li class="my-3">Multi Quality</li>
                                                <li class="my-3">Priority Encoding</li>
                                                <li class="my-3">Keep Orginal File</li>
                                            </ul>
                                        </div>
                                        <div class="mt-8 flex justify-center w-full">
                                            <button class="flex items-center bg-[#142132] hover:bg-[#009FB2] px-6 py-1 rounded-full">
                                                <i class="material-symbols-outlined opacity-1 text-white text-3xl">currency_bitcoin</i>
                                                Bitcoin
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- card3 -->
                            <div class="">
                                <div
                                    class='h-full px-3 mt-2 bg-[#121520] py-10 rounded-2xl'>
                                    <div class='flex flex-col justify-between w-full'>
                                        <div>
                                            <h4 class="text-4xl text-[#00bbd2] flex items-end">
                                                $180 <span class="text-xl pl-2 mb-1">/ 7 Month</span>
                                            </h4>
                                        </div>
                                        <div class="mt-4 text-lg pl-4">
                                            <ul class="list-disc list-outside">
                                                <li class="my-3">Priority Upload</li>
                                                <li class="my-3">Multi Quality</li>
                                                <li class="my-3">Priority Encoding</li>
                                                <li class="my-3">Keep Orginal File</li>
                                            </ul>
                                        </div>
                                        <div class="mt-8 flex justify-center w-full">
                                            <button class="flex items-center bg-[#142132] hover:bg-[#009FB2] px-6 py-1 rounded-full">
                                                <i class="material-symbols-outlined opacity-1 text-white text-3xl">currency_bitcoin</i>
                                                Bitcoin
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- card4 -->
                            <div class="">
                                <div
                                    class='h-full px-3 mt-2 bg-[#121520] py-10 rounded-2xl'>
                                    <div class='flex flex-col justify-between w-full'>
                                        <div>
                                            <h4 class="text-4xl text-[#00bbd2] flex items-end">
                                                $250 <span class="text-xl pl-2 mb-1">/ Year</span>
                                            </h4>
                                        </div>
                                        <div class="mt-4 text-lg pl-4">
                                            <ul class="list-disc list-outside">
                                                <li class="my-3">Priority Upload</li>
                                                <li class="my-3">Multi Quality</li>
                                                <li class="my-3">Priority Encoding</li>
                                                <li class="my-3">Keep Orginal File</li>
                                            </ul>
                                        </div>
                                        <div class="mt-8 flex justify-center w-full">
                                            <button class="flex items-center bg-[#142132] hover:bg-[#009FB2] px-6 py-1 rounded-full">
                                                <i class="material-symbols-outlined opacity-1 text-white text-3xl">currency_bitcoin</i>
                                                Bitcoin
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <script>
        $(document).on('click', '.tab-premium', function() {
            $('.tab-premium').removeClass('bg-[#009FB2]').addClass('bg-[#142132]');
            const data = $(this).data('plan');
            $(this).addClass('bg-[#009FB2]').removeClass('bg-[#142132]');
            $('.plan').hide()
            $('#'+data).show();
        })
    </script>
@endsection

