@extends('dashboard.layouts.app')

@section('content')
    <div class="flex flex-wrap -mx-3 flex-col-reverse lg:flex-row">
        <div class="w-full max-w-full px-3 mt-0 lg:w-9/12 text-white lg:flex-none">
            <div
                    class="flex flex-col font-semibold" box-lifted data-page="videos">
                <div
                        class="tabs tabs-lifted z-10 -mb-[var(--tab-border)] justify-self-start items-start grid-cols-2 grid-rows-2 md:!flex">
                    <button
                            class="{{request()->get('tab') === 'live' ? 'live tab-active !text-[#009FB2]' : 'live'}}
                        live hover:text-[#009FB2] text-white tab-lifted [--tab-border-color:#121520] tab font-bold h-auto text-md px-4 [--tab-bg:#121520] !border-b-0 md:!border-b-1 !rounded-b-lg md:!rounded-b-none before:!hidden md:before:!block"
                            data-content="live">
                        <span class="px-2 py-1">Live Videos</span>
                    </button>
                    <button
                            class="{{request()->get('tab') === 'processing' ? 'processing tab-active !text-[#009FB2]' : 'processing'}}
                        processing hover:text-[#009FB2] text-white tab-lifted [--tab-border-color:#121520] tab font-bold h-auto text-md px-4 [--tab-bg:#121520] !border-b-0 md:!border-b-1 !rounded-b-lg md:!rounded-b-none before:!hidden md:before:!block"
                            data-content="processing">
                        <span class="px-2 py-1">Processing Videos</span>
                    </button>
                    <button
                            class="{{request()->get('tab') === 'DMCA' ? 'DMCA tab-active !text-[#009FB2]' : 'DMCA'}}
                        DMCA hover:text-[#009FB2] text-white tab-lifted [--tab-border-color:#121520] tab font-bold h-auto text-md px-4 [--tab-bg:#121520] !border-b-0 md:!border-b-1 !rounded-b-lg md:!rounded-b-none before:!hidden md:before:!block"
                            data-content="dmca">
                        <span class="px-2 py-1">DMCA Warnings</span>
                    </button>
                    <button
                            class="{{request()->get('tab') === 'removed' ? 'removed tab-active !text-[#009FB2]' : 'removed'}}
                        removed hover:text-[#009FB2] text-white tab-lifted [--tab-border-color:#121520] tab font-bold h-auto text-md px-4 [--tab-bg:#121520] !border-b-0 md:!border-b-1 !rounded-b-lg md:!rounded-b-none before:!hidden md:before:!block"
                            data-content="removed">
                        <span class="px-2 py-1">Removed Videos</span>
                    </button>
                </div>
                <div class="mt-3 md:mt-0 rounded-b-xl rounded-tr-xl relative  max-w-full w-full  bg-[#121520]">
                    <div class="lg:min-h-[calc(100vh-11em)]" id="box-content" page-video>
                        @include('dashboard.'.request()->path() . '.' . request()->get('tab'))
                    </div>
                </div>
            </div>
        </div>

        @include('dashboard.video.folder')
    </div>
    @include('dashboard.video.fixed-video')
@endsection
