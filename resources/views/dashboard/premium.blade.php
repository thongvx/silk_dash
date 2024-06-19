@extends('dashboard.layouts.app')

@section('content')
    <div class="flex flex-wrap -mx-3 flex-col-reverse lg:flex-row">
        <div class="w-full max-w-full px-3 mt-0 text-white lg:flex-none ">
            <div class="mt-3 md:mt-0 rounded-b-xl rounded-tr-xl relative  max-w-full w-full rounded-xl">
                <div
                    class="border-[#121520] rounded-b-xl rounded-tr-xl gap-2 bg-[#121520] bg-top [border-width:var(--tab-border)] undefined">
                    <div class="lg:min-h-[calc(100vh-8em)]" id="box-content">
                        <div class="rounded-xl">
                            <div class="relative rounded-xl">
                                <div class="px-2 pt-4 md:p-4 flex items-center flex-col">
                                    <div class="mb-2" id='title'>
                                        <h5 class="text-white text-xl font-bold mt-16">
                                            <span>Choose the right plan for you</span>
                                        </h5>
                                    </div>
                                    <div class="flex items-center w-max mt-3">
                                        <button data-plan="User" class="tab-premium bg-[#142132] hover:bg-[#009FB2] px-8 py-2  rounded-l-full">Premium User Plans</button>
                                        <button data-plan="Views" class="tab-premium bg-[#009FB2] px-8 py-2 hover:bg-[#009FB2] rounded-r-full">Premium Views Plans</button>
                                    </div>
                                </div>
                                <div class="w-full max-w-full mb-4 plan" id="Views">
                                    <div
                                        class='flex flex-wrap drop-shadow-sm rounded-2xl py-2 px-3'>
                                        <div class="px-6 xl:px-0 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 grid-flow-row gap-4 w-full max-w-full ">
                                            <!-- card1 -->
                                            <div class="px-1.5 xl:mb-0">
                                                <div
                                                    class='h-full px-3 mt-2 bg-[#142132] py-10 rounded-2xl'>
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
                                                            <button class="flex items-center bg-[#121520] hover:bg-[#009FB2] px-6 py-1 rounded-full">
                                                                <i class="material-symbols-outlined opacity-1 text-white text-3xl">currency_bitcoin</i>
                                                                Bitcoin
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- card2 -->
                                            <div class="px-1.5 xl:mb-0">
                                                <div
                                                    class='h-full px-3 mt-2 bg-[#142132] py-10 rounded-2xl'>
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
                                                            <button class="flex items-center bg-[#121520] hover:bg-[#009FB2] px-6 py-1 rounded-full">
                                                                <i class="material-symbols-outlined opacity-1 text-white text-3xl">currency_bitcoin</i>
                                                                Bitcoin
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- card3 -->
                                            <div class="px-1.5 xl:mb-0">
                                                <div
                                                    class='h-full px-3 mt-2 bg-[#142132] py-10 rounded-2xl'>
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
                                                            <button class="flex items-center bg-[#121520] hover:bg-[#009FB2] px-6 py-1 rounded-full">
                                                                <i class="material-symbols-outlined opacity-1 text-white text-3xl">currency_bitcoin</i>
                                                                Bitcoin
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- card4 -->
                                            <div class="px-1.5 xl:mb-0">
                                                <div
                                                    class='h-full px-3 mt-2 bg-[#142132] py-10 rounded-2xl'>
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
                                                            <button class="flex items-center bg-[#121520] hover:bg-[#009FB2] px-6 py-1 rounded-full">
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
                                        class='flex flex-wrap drop-shadow-sm rounded-2xl py-2 px-3'>
                                        <div class="px-6 xl:px-0 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 grid-flow-row gap-4 w-full max-w-full ">
                                            <!-- card1 -->
                                            <div class="px-1.5 xl:mb-0">
                                                <div
                                                    class='h-full px-3 mt-2 bg-[#142132] py-10 rounded-2xl'>
                                                    <div class='flex flex-col justify-between w-full'>
                                                        <div>
                                                            <h4 class="text-4xl text-[#00bbd2] flex items-end">
                                                                $30 <span class="text-xl pl-2 mb-1">/Month</span>
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
                                                            <button class="flex items-center bg-[#121520] hover:bg-[#009FB2] px-6 py-1 rounded-full">
                                                                <i class="material-symbols-outlined opacity-1 text-white text-3xl">currency_bitcoin</i>
                                                                Bitcoin
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- card2 -->
                                            <div class="px-1.5 xl:mb-0">
                                                <div
                                                    class='h-full px-3 mt-2 bg-[#142132] py-10 rounded-2xl'>
                                                    <div class='flex flex-col justify-between w-full'>
                                                        <div>
                                                            <h4 class="text-4xl text-[#00bbd2] flex items-end">
                                                                $90 <span class="text-xl pl-2 mb-1">/ 3 Month</span>
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
                                                            <button class="flex items-center bg-[#121520] hover:bg-[#009FB2] px-6 py-1 rounded-full">
                                                                <i class="material-symbols-outlined opacity-1 text-white text-3xl">currency_bitcoin</i>
                                                                Bitcoin
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- card3 -->
                                            <div class="px-1.5 xl:mb-0">
                                                <div
                                                    class='h-full px-3 mt-2 bg-[#142132] py-10 rounded-2xl'>
                                                    <div class='flex flex-col justify-between w-full'>
                                                        <div>
                                                            <h4 class="text-4xl text-[#00bbd2] flex items-end">
                                                                $180 <span class="text-xl pl-2 mb-1">/ 7 Month</span>
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
                                                            <button class="flex items-center bg-[#121520] hover:bg-[#009FB2] px-6 py-1 rounded-full">
                                                                <i class="material-symbols-outlined opacity-1 text-white text-3xl">currency_bitcoin</i>
                                                                Bitcoin
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- card4 -->
                                            <div class="px-1.5 xl:mb-0">
                                                <div
                                                    class='h-full px-3 mt-2 bg-[#142132] py-10 rounded-2xl'>
                                                    <div class='flex flex-col justify-between w-full'>
                                                        <div>
                                                            <h4 class="text-4xl text-[#00bbd2] flex items-end">
                                                                $250 <span class="text-xl pl-2 mb-1">/ Year</span>
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
                                                            <button class="flex items-center bg-[#121520] hover:bg-[#009FB2] px-6 py-1 rounded-full">
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

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
