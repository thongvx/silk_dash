@extends('admin.layouts.app')

@section('content')
    <!-- cards -->
    <div class="flex flex-wrap -mx-3 flex-col-reverse lg:flex-row mt-4">
        <div class="w-full max-w-full px-3 mt-0 text-white lg:flex-none ">
            <div class="mt-3 md:mt-0 rounded-b-xl rounded-tr-xl relative  max-w-full w-full rounded-xl">
                <div
                    class="border-[#121520] rounded-b-xl rounded-tr-xl gap-2 bg-[#121520] bg-top [border-width:var(--tab-border)] undefined">
                    <div class="lg:min-h-[calc(100vh-12em)]" id="box-content" page-video>
                        <div class="rounded-xl">
                            <div class="relative rounded-xl">
                                <div class="px-2 pt-4 md:p-4  rounded-xl">
                                    <div class="mb-2">
                                        <h4>Search: {{ $searchTerm }}</h4>
                                    </div>
                                    <div class="flex justify-between items-center w-full mb-3">
                                        <div class="text-sm bg-[#142132] rounded-lg p-2">
                                            <label for="limit">Show:</label>
                                            <select name="limit" class="bg-transparent outline-none"
                                                    id="limit">
                                                <option value="10"
                                                        class="limit" {{ $videos->perPage() == 10 ? 'selected' : '' }}>
                                                    10
                                                </option>
                                                <option value="20"
                                                        class="limit" {{ $videos->perPage() == 20 ? 'selected' : '' }}>
                                                    20
                                                </option>
                                                <option value="50"
                                                        class="limit" {{ $videos->perPage() == 50 ? 'selected' : '' }}>
                                                    50
                                                </option>
                                                <option value="100"
                                                        class="limit" {{ $videos->perPage() == 100 ? 'selected' : '' }}>
                                                    100
                                                </option>
                                            </select>
                                            <span>entries</span>
                                        </div>
                                    </div>
                                    <div id="box-datatable"
                                         class="tab-content flex flex-col bg-clip-border rounded-xl text-gray-700 bg-transparent">
                                        @include('admin.video.table')
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div fixed-video>
        <!-- -right-90 in loc de 0-->
        <div fixed-video-card
             class="opacity-0 hidden bg-black/20 z-50 shadow-3xl w-screen ease fixed top-0 left-0 flex h-full  backdrop-blur-sm
           min-w-0 flex-col break-words rounded-none border-0 bg-clip-border duration-200 justify-center items-center px-3" id="fixed-video">
            <div class="absolute h-full w-full fixed-plugin-close-button z-10" fixed-video-close-button>
            </div>
            <div
                class="w-11/12 sm:w-4/5 xl:w-2/5 bg-[#121520] z-20 py-4 px-3 rounded-lg relative shadow-lg shadow-slate-900">
                <div class="absolute right-4 top-3">
                    <button fixed-video-close-button
                            class="inline-block p-0 text-sm font-bold leading-normal text-center uppercase align-middle transition-all ease-in bg-transparent border-0 rounded-lg shadow-none cursor-pointer hover:-translate-y-px tracking-tight-rem bg-150 bg-x-25 active:opacity-85 dark:text-white text-slate-700">
                        <i class="material-symbols-outlined text-3xl">close</i>
                    </button>
                </div>
                <div  id="fixed-box-control">

                    <div class="export hidden" id="export">
                        <h5 class="mb-0 text-[#009FB2] text-lg font-semibold">Files Export</h5>
                        <div class="grid mt-3" box-lifted>
                            <div
                                class="tabs tabs-lifted z-10 -mb-[var(--tab-border)] justify-self-start flex flex-col items-start md:grid">
                                <button
                                    class="tab-export EmbedLink [--tab-border-color:#142132] tab !text-[#009FB2] text-white font-bold h-auto text-md px-4 tab-active [--tab-bg:#142132] !border-b-0 md:!border-b-1 !rounded-b-lg md:!rounded-b-none before:!hidden md:before:!block"
                                    data-content="EmbedLink">
                                    EmbedLink
                                </button>
                                <button
                                    class="tab-export Embedcode [--tab-border-color:#142132] tab text-white font-bold h-auto text-md px-4 [--tab-bg:#142132] my-3 md:my-0 !border-b-0 md:!border-b-1 !rounded-b-lg md:!rounded-b-none before:!hidden md:before:~block"
                                    data-content="Embedcode">
                                    Embedcode
                                </button>
                                <button
                                    class="tab-export Download [--tab-border-color:#142132] tab text-white font-bold h-auto text-md px-4 [--tab-bg:#142132] !border-b-0 md:!border-b-1 !rounded-b-lg md:!rounded-b-none before:!hidden md:before:~block"
                                    data-content="Download">
                                    Download Link
                                </button>
                            </div>
                            <div class="mt-3 md:mt-0 rounded-b-xl rounded-tr-xl relative">
                                <div
                                    class="border-[#142132] rounded-b-xl rounded-tr-xl gap-2 bg-[#142132] bg-top py-4 pl-4 [border-width:var(--tab-border)] undefined">
                                    <div id="EmbedLink" class="tab-content-export">
                                        <textarea class="bg-transparent w-full h-[calc(40vh)] text-white max-h-96 overflow-auto"></textarea>
                                    </div>
                                    <div id="Embedcode" class="tab-content-export hidden">
                                        <textarea class="bg-transparent w-full h-[calc(40vh)] text-white max-h-96 overflow-auto"> </textarea>
                                    </div>
                                    <div id="Download" class="tab-content-export hidden">
                                        <textarea class="bg-transparent w-full h-[calc(40vh)] text-white max-h-96 overflow-auto"></textarea>
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
