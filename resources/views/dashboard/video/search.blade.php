@extends('dashboard.layouts.app')

@section('content')
    <div class="flex flex-wrap -mx-3 flex-col-reverse lg:flex-row">
        <div class="w-full max-w-full px-3 mt-0 text-white lg:flex-none ">
            <div class="mt-3 md:mt-0 rounded-b-xl rounded-tr-xl relative  max-w-full w-full rounded-xl">
                <div
                    class="border-[#121520] rounded-b-xl rounded-tr-xl gap-2 bg-[#121520] bg-top [border-width:var(--tab-border)] undefined">
                    <div class="lg:min-h-[calc(100vh-8em)]" id="box-content" page-video>
                        <div class="rounded-xl">
                            <div class="relative rounded-xl">
                                <div class="px-2 pt-4 md:p-4  rounded-xl">
                                    <div class="mb-2 md:flex justify-between" id='title'>
                                        <h5 class="items-center text-white flex">
                                            <span class="flex items-center" id="currentFolderName">
                                                Search video: {{ $searchTerm }}
                                            </span>
                                        </h5>
                                        <div class="flex items-center md:ml-auto px-0 md:px-2 mt-3 md:mt-0 xl:hidden">
                                            <form class="flex items-center relative bg-[#142132] w-full rounded-lg ease" action="/video/search" method="GET" search>
                                                <label for="search" class="p-1 flex bg-[#142132] items-center translate-x-3 transition duration-300 ease-in-out z-10 absolute text-slate-400">Search video...</label>
                                                <input type="text" id="search" name="videoID" value="" search-input
                                                       class="z-20 px-3 py-2 text-sm relative -ml-px block min-w-0 lg:w-52 flex-auto text-white rounded-lg bg-transparent bg-clip-padding focus:outline-none
                         border border-solid border-[#142132]"
                                                />
                                                <input type="submit" value="Search" class="hidden" />
                                            </form>
                                        </div>
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
                                        <div class="flex ">
                                            <button type="button"
                                                    class="hover:bg-[#009FB2] rounded-lg flex items-center px-2 {{ request() -> get('poster') ? 'bg-[#009FB2]' : 'bg-[#142132]' }}"
                                                    title="Poster" btn-poster>
                                                {!!
                                                    request() -> get('poster')
                                                    ? '<i class="material-symbols-outlined opacity-1 text-lg md:mr-1.5">visibility_off</i><span class="hidden sm:block">hide poster</span>'
                                                    : '<i class="material-symbols-outlined opacity-1 text-lg md:mr-1.5">visibility</i><span class="hidden sm:block">show poster</span>'
                                                !!}
                                            </button>
                                            <button type="button" btn-video disabled class="cursor-not-allowed px-2"
                                                    title="Edit File">
                                                <i btn-edit class="material-symbols-outlined opacity-1 text-3xl">edit_square</i>
                                            </button>
                                            <button btn-subtitle disabled class="cursor-not-allowed px-2"
                                                    title="Add Subtitle">
                                                <a href=""><i btn-subtitle
                                                              class="material-symbols-outlined opacity-1 text-3xl">closed_caption_add</i></a>
                                            </button>
                                            <button type="button" btn-video disabled class="cursor-not-allowed px-2"
                                                    title="Delete File">
                                                <i btn-delete class="material-symbols-outlined opacity-1 text-3xl">delete</i>
                                            </button>
                                            <button type="button" btn-video disabled class="cursor-not-allowed px-2"
                                                    title="Export File">
                                                <i btn-export
                                                   class="material-symbols-outlined opacity-1 text-3xl">ios_share</i>
                                            </button>
                                            <button type="button" btn-video disabled class="cursor-not-allowed px-2"
                                                    title="Move File">
                                                <i btn-move
                                                   class="material-symbols-outlined opacity-1 text-3xl">folder_open</i>
                                            </button>
                                        </div>
                                    </div>
                                    <div id="live"
                                         class="tab-content flex flex-col bg-clip-border rounded-xl text-gray-700 bg-transparent">
                                        @include('dashboard.video.table')

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('dashboard.video.fixed-video')
@endsection
