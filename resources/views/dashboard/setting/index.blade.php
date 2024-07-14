@extends('dashboard.layouts.app')

@section('content')
    <div class="flex flex-wrap -mx-3 flex-col-reverse lg:flex-row">
        <div class="w-full max-w-full px-3 mt-0 text-white lg:flex-none">
            <div
                class="flex flex-col font-semibold" box-lifted data-page="setting">
                <div
                    class="tabs tabs-lifted z-10 -mb-[var(--tab-border)] justify-self-start items-start grid-cols-2 sm:grid-cols-3 grid-rows-2 lg:!flex">
                    <button
                        class="{{request()->get('tab') === 'profile' ? 'profile tab-active !text-[#009FB2]' : 'profile'}}
                        hover:text-[#009FB2]  text-white tab-lifted [--tab-border-color:#121520] tab font-bold h-auto text-md px-4 [--tab-bg:#121520] !border-b-0 lg:!border-b-1 !rounded-b-lg lg:!rounded-b-none before:!hidden lg:before:!block"
                        data-content="profile">
                        <span class="px-2 py-1">Profile</span>
                    </button>
                    <button
                        class="{{request()->get('tab') === 'accountsetting' ? 'accountsetting tab-active !text-[#009FB2]' : 'accountsetting'}}
                        hover:text-[#009FB2]  text-white tab-lifted [--tab-border-color:#121520] tab font-bold h-auto text-md px-4 [--tab-bg:#121520] !border-b-0 lg:!border-b-1 !rounded-b-lg lg:!rounded-b-none before:!hidden lg:before:!block"
                        data-content="accountsetting">
                        <span class="px-2 py-1">Account Settings</span>
                    </button>
                    <button
                        class="{{request()->get('tab') === 'playersetting' ? 'playersetting tab-active !text-[#009FB2]' : 'playersetting'}}
                        hover:text-[#009FB2]  text-white tab-lifted [--tab-border-color:#121520] tab font-bold h-auto text-md px-4 [--tab-bg:#121520] !border-b-0 lg:!border-b-1 !rounded-b-lg lg:!rounded-b-none before:!hidden lg:before:!block"
                        data-content="playersetting">
                        <span class="px-2 py-1">Player Setting</span>
                    </button>
                    <button
                        class="{{request()->get('tab') === 'customdomain' ? 'customdomain tab-active !text-[#009FB2]' : 'customdomain'}}
                        hover:text-[#009FB2]  text-white tab-lifted [--tab-border-color:#121520] tab font-bold h-auto text-md px-4 [--tab-bg:#121520] !border-b-0 lg:!border-b-1 !rounded-b-lg lg:!rounded-b-none before:!hidden lg:before:!block"
                        data-content="customdomain">
                        <span class="px-2 py-1">Custom Domain</span>
                    </button>
                    <button
                        class="{{request()->get('tab') === 'customads' ? 'customads tab-active !text-[#009FB2]' : 'customads'}}
                        hover:text-[#009FB2]  text-white tab-lifted [--tab-border-color:#121520] tab font-bold h-auto text-md px-4 [--tab-bg:#121520] !border-b-0 lg:!border-b-1 !rounded-b-lg lg:!rounded-b-none before:!hidden lg:before:!block"
                        data-content="customads">
                        <span class="px-2 py-1">Custom Ads</span>
                    </button>
                    <button
                        class="{{request()->get('tab') === 'activities' ? 'activities tab-active !text-[#009FB2]' : 'activities'}}
                        hover:text-[#009FB2]  text-white tab-lifted [--tab-border-color:#121520] tab font-bold h-auto text-md px-4 [--tab-bg:#121520] !border-b-0 lg:!border-b-1 !rounded-b-lg lg:!rounded-b-none before:!hidden lg:before:!block"
                        data-content="activities">
                        <span class="px-2 py-1">Activity</span>
                    </button>
                </div>
                <div class="mt-3 md:mt-0 rounded-b-xl rounded-tr-xl relative  max-w-full w-full">
                    <div
                        class="border-[#121520] rounded-b-xl rounded-tr-xl gap-2 bg-[#121520] bg-top [border-width:var(--tab-border)] undefined">
                        <div class="lg:min-h-[calc(100vh-11em)]">
                            <div class="rounded-xl">
                                <div class="relative rounded-xl">
                                    <div class="px-2 pt-4 md:p-4">
                                        <div id="box-content" setting
                                             class="tab-content flex flex-col bg-clip-border rounded-xl text-gray-700 bg-transparent">
                                            @include('dashboard.'.request()->path() . '.' . request()->get('tab'))
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
