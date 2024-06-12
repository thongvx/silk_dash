@extends('admin.layouts.app')

@section('content')

    <!-- cards -->
    <div class="w-full pt-4 mx-auto">
        <div class="flex flex-wrap -mx-3 flex-col-reverse lg:flex-row">
            <div class="w-full max-w-full px-2 mt-0 text-white lg:flex-none">
                <div class="lg:mr-2 flex flex-col font-semibold">
                    <div
                        class="tabs tabs-lifted z-[1] -mb-[var(--tab-border)] justify-self-start items-start grid-cols-2 grid-rows-2 md:!flex">
                        <button
                            class="{{request()->get('tab') === 'all' ? 'all tab-active !text-[#009FB2]' : 'all'}}
                    tab-user hover:text-[#009FB2] text-white [--tab-border-color:#121520] tab font-bold h-auto text-md px-4 [--tab-bg:#121520] !border-b-0 md:!border-b-1 !rounded-b-lg md:!rounded-b-none before:!hidden md:before:!block"
                            data-content="all">
                            <span class="px-2 py-1">All</span>
                        </button>
                        <button
                            class="{{request()->get('tab') === 'premium' ? 'premium tab-active !text-[#009FB2]' : 'premium'}}
                    tab-user hover:text-[#009FB2] text-white [--tab-border-color:#121520] tab font-bold h-auto text-md px-4 [--tab-bg:#121520] !border-b-0 md:!border-b-1 !rounded-b-lg md:!rounded-b-none before:!hidden md:before:!block"
                            data-content="premium">
                            <span class="px-2 py-1">Premium</span>
                        </button>
                        <button
                            class="{{request()->get('tab') === 'free' ? 'free tab-active !text-[#009FB2]' : 'free'}}
                    tab-user hover:text-[#009FB2] text-white [--tab-border-color:#121520] tab font-bold h-auto text-md px-4 [--tab-bg:#121520] !border-b-0 md:!border-b-1 !rounded-b-lg md:!rounded-b-none before:!hidden md:before:!block"
                            data-content="free">
                            <span class="px-2 py-1">Free Active</span>
                        </button>
                        <button
                            class="{{request()->get('tab') === 'unverified' ? 'unverified tab-active !text-[#009FB2]' : 'unverified'}}
                    tab-user hover:text-[#009FB2] text-white [--tab-border-color:#121520] tab font-bold h-auto text-md px-4 [--tab-bg:#121520] !border-b-0 md:!border-b-1 !rounded-b-lg md:!rounded-b-none before:!hidden md:before:!block"
                            data-content="unverified">
                            <span class="px-2 py-1">Unverified</span>
                        </button>
                        <button
                            class="{{request()->get('tab') === 'delete' ? 'delete tab-active !text-[#009FB2]' : 'delete'}}
                    tab-user hover:text-[#009FB2] text-white [--tab-border-color:#121520] tab font-bold h-auto text-md px-4 [--tab-bg:#121520] !border-b-0 md:!border-b-1 !rounded-b-lg md:!rounded-b-none before:!hidden md:before:!block"
                            data-content="delete">
                            <span class="px-2 py-1">Delete</span>
                        </button>
                    </div>
                    <div class="mt-3 md:mt-0 rounded-b-box rounded-se-box relative  max-w-full w-full">
                        <div
                            class="border-base-300 rounded-b-box rounded-se-box gap-2 bg-[#121520] bg-top border-none undefined">
                            <div class="tab-content-video">
                                <div class="rounded-xl" id="box-user">
                                    @include('admin.user.table')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
