@extends('admin.layouts.app')

@section('content')

    <!-- cards -->
    <div class="w-full mx-auto mt-5">
        <div class="flex flex-wrap -mx-3 flex-col-reverse lg:flex-row">
            <div class="w-full max-w-full px-2 mt-0 text-white lg:flex-none">
                <div class="lg:mr-2 flex flex-col font-semibold">
                    <div
                            class="tabs tabs-lifted z-10 -mb-[var(--tab-border)] justify-self-start items-start grid-cols-2 grid-rows-2 md:!flex">
                        <button
                                class="{{request()->get('tab') === 'encodingTask' ? 'encodingTask tab-active !text-[#009FB2]' : 'encodingTask'}}
                    hover:text-[#009FB2] text-white tab-lifted [--tab-border-color:#121520] tab font-bold h-auto text-md px-4 [--tab-bg:#121520] !border-b-0 md:!border-b-1 !rounded-b-lg md:!rounded-b-none before:!hidden md:before:!block"
                                data-content="encodingTask">
                            <span class="px-2 py-1">Encoding Task</span>
                        </button>
                        <button
                                class="{{request()->get('tab') === 'transferTask' ? 'transferTask tab-active !text-[#009FB2]' : 'transferTask'}}
                    hover:text-[#009FB2] text-white tab-lifted [--tab-border-color:#121520] tab font-bold h-auto text-md px-4 [--tab-bg:#121520] !border-b-0 md:!border-b-1 !rounded-b-lg md:!rounded-b-none before:!hidden md:before:!block"
                                data-content="transferTask">
                            <span class="px-2 py-1">Transfer Task</span>
                        </button>
                        <button
                                class="{{request()->get('tab') === 'torrentTask' ? 'torrentTask tab-active !text-[#009FB2]' : 'torrentTask'}}
                    hover:text-[#009FB2] text-white tab-lifted [--tab-border-color:#121520] tab font-bold h-auto text-md px-4 [--tab-bg:#121520] !border-b-0 md:!border-b-1 !rounded-b-lg md:!rounded-b-none before:!hidden md:before:!block"
                                data-content="torrentTask">
                            <span class="px-2 py-1">Torrent Task</span>
                        </button>
                        <button
                                class="{{request()->get('tab') === 'streamTask' ? 'streamTask tab-active !text-[#009FB2]' : 'streamTask'}}
                    hover:text-[#009FB2] text-white tab-lifted [--tab-border-color:#121520] tab font-bold h-auto text-md px-4 [--tab-bg:#121520] !border-b-0 md:!border-b-1 !rounded-b-lg md:!rounded-b-none before:!hidden md:before:!block"
                                data-content="streamTask">
                            <span class="px-2 py-1">Stream Task</span>
                        </button>

                    </div>
                    <div class="mt-3 md:mt-0 rounded-b-xl rounded-tr-xl relative  max-w-full w-full">
                        <div class="border-base-300 rounded-b-xl rounded-tr-xl gap-2 bg-[#121520] bg-top">
                            <div class="tab-content-video">
                                <div class="rounded-xl box-datatable" id="box-content">
                                    @include(request()->path() . '.' . request()->get('tab'))
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
@endsection
