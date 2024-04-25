@extends('layouts.app')

@section('content')
    <div class="flex flex-wrap -mx-3 flex-col-reverse lg:flex-row">
        <div class="w-full max-w-full px-3 mt-0 lg:w-9/12 text-white lg:flex-none">
            <div
                class="flex flex-col font-semibold" box-lifted data-page="videos">
                <div
                    class="tabs tabs-lifted z-10 -mb-[var(--tab-border)] justify-self-start items-start grid-cols-2 grid-rows-2 md:!flex">
                    <button
                        class="tab-upload live hover:text-[#009FB2] tab-lifted [--tab-border-color:#202940] tab text-white font-bold h-auto text-md px-4 [--tab-bg:#121520] !border-b-0 md:!border-b-1 !rounded-b-lg md:!rounded-b-none before:!hidden md:before:!block"
                        data-content="live">
                        <span class="px-2 py-1">Live Videos</span>
                    </button>
                    <button
                        class="tab-upload processing hover:text-[#009FB2] tab-lifted [--tab-border-color:#202940] tab text-white font-bold h-auto text-md px-4 [--tab-bg:#121520] !border-b-0 md:!border-b-1 !rounded-b-lg md:!rounded-b-none before:!hidden md:before:!block"
                        data-content="processing">
                        <span class="px-2 py-1">Processing Videos</span>
                    </button>
                    <button
                        class="tab-upload DMCA hover:text-[#009FB2] tab-lifted [--tab-border-color:#202940] tab text-white font-bold h-auto text-md px-4 [--tab-bg:#121520] !border-b-0 md:!border-b-1 !rounded-b-lg md:!rounded-b-none before:!hidden md:before:!block"
                        data-content="DMCA">
                        <span class="px-2 py-1">DMCA Warnings</span>
                    </button>
                    <button
                        class="tab-upload removed hover:text-[#009FB2] tab-lifted [--tab-border-color:#202940] tab text-white font-bold h-auto text-md px-4 [--tab-bg:#121520] !border-b-0 md:!border-b-1 !rounded-b-lg md:!rounded-b-none before:!hidden md:before:!block"
                        data-content="removed">
                        <span class="px-2 py-1">Removed Videos</span>
                    </button>
                </div>
                <div class="mt-3 md:mt-0 rounded-b-box rounded-se-box relative  max-w-full w-full">
                    <div
                        class="border-[#121520] rounded-b-box rounded-se-box gap-2 bg-[#121520] bg-top [border-width:var(--tab-border)] undefined">
                        <div class="lg:min-h-[calc(100vh-11em)]" id="box-content" page-video>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('videos.folder')
    </div>
    @include('videos.fixed-video')

@endsection
