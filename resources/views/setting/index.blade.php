@extends('layouts.app')

@section('content')
    <div class="flex flex-wrap -mx-3 flex-col-reverse lg:flex-row">
        <div class="w-full max-w-full px-3 mt-0 text-white lg:flex-none">
            <div
                class="flex flex-col font-semibold" box-lifted data-page="setting">
                <div
                    class="tabs tabs-lifted z-10 -mb-[var(--tab-border)] justify-self-start items-start grid-cols-2 grid-rows-2 md:!flex">
                    <button
                        class="tab-upload profile hover:text-[#009FB2] tab-lifted [--tab-border-color:#202940] tab text-white font-bold h-auto text-md px-4 [--tab-bg:#121520] !border-b-0 md:!border-b-1 !rounded-b-lg md:!rounded-b-none before:!hidden md:before:!block"
                        data-content="profile">
                        <span class="px-2 py-1">Profile</span>
                    </button>
                    <button
                        class="tab-upload accountsetting hover:text-[#009FB2] tab-lifted [--tab-border-color:#202940] tab text-white font-bold h-auto text-md px-4 [--tab-bg:#121520] !border-b-0 md:!border-b-1 !rounded-b-lg md:!rounded-b-none before:!hidden md:before:!block"
                        data-content="accountsetting">
                        <span class="px-2 py-1">Account Settings</span>
                    </button>
                    <button
                        class="tab-upload playersetting hover:text-[#009FB2] tab-lifted [--tab-border-color:#202940] tab text-white font-bold h-auto text-md px-4 [--tab-bg:#121520] !border-b-0 md:!border-b-1 !rounded-b-lg md:!rounded-b-none before:!hidden md:before:!block"
                        data-content="playersetting">
                        <span class="px-2 py-1">Player Setting</span>
                    </button>
                    <button
                        class="tab-upload customdomain hover:text-[#009FB2] tab-lifted [--tab-border-color:#202940] tab text-white font-bold h-auto text-md px-4 [--tab-bg:#121520] !border-b-0 md:!border-b-1 !rounded-b-lg md:!rounded-b-none before:!hidden md:before:!block"
                        data-content="customdomain">
                        <span class="px-2 py-1">Custom Domain</span>
                    </button>
                    <button
                        class="tab-upload customads hover:text-[#009FB2] tab-lifted [--tab-border-color:#202940] tab text-white font-bold h-auto text-md px-4 [--tab-bg:#121520] !border-b-0 md:!border-b-1 !rounded-b-lg md:!rounded-b-none before:!hidden md:before:!block"
                        data-content="customads">
                        <span class="px-2 py-1">Custom Ads</span>
                    </button>
                </div>
                <div class="mt-3 md:mt-0 rounded-b-box rounded-se-box relative  max-w-full w-full">
                    <div
                        class="border-[#202940] rounded-b-box rounded-se-box gap-2 bg-[#121520] bg-top [border-width:var(--tab-border)] undefined">
                        <div class="lg:min-h-[calc(100vh-11em)]">
                            <div class="rounded-xl">
                                <div class="relative rounded-xl">
                                    <div class="px-2 pt-4 md:p-4">
                                        <div id="box-content" setting
                                             class="tab-content flex flex-col bg-clip-border rounded-xl text-gray-700 bg-transparent">
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