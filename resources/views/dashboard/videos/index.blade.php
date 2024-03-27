@extends('dashboard.layouts.app')

@section('content')
    <div class="flex flex-wrap -mx-3 flex-col-reverse lg:flex-row">
        <div class="w-full max-w-full px-3 mt-0 lg:w-9/12 text-white lg:flex-none">
            <div
                class="lg:mr-3 flex flex-col font-semibold" box-lifted>
                <div
                    class="tabs tabs-lifted z-10 -mb-[var(--tab-border)] justify-self-start items-start grid-cols-2 grid-rows-2 md:!flex">
                    <button
                        class="[--tab-border-color:#202940] md:shadow-[0_-8px_15px_0px_rgb(15,23,42,1)] row-start-auto tab tab-lifted w-max !text-green-400 text-white font-bold h-auto text-md px-4 tab-active [--tab-bg:#202940] !border-b-0 md:!border-b-1 !rounded-b-lg md:!rounded-b-none before:!hidden md:before:!block"
                        data-content="live"
                        data-title='<h5 class="text-green-400"><i class="material-icons">folder</i><i class="material-icons">navigate_next</i>folder1</h5>'>
                        <span class="px-2 py-1">Live Videos</span>
                    </button>
                    <button
                        class="[--tab-border-color:#202940] row-start-auto	tab tab-lifted w-max text-white font-bold h-auto text-md px-4 [--tab-bg:#202940] !border-b-0 md:!border-b-1 !rounded-b-lg md:!rounded-b-none before:!hidden md:before:!block"
                        data-content="processing" data-title='Processing Videos'>
                        <span class="px-2 py-1">Processing Videos</span>
                    </button>
                    <button
                        class="[--tab-border-color:#202940] row-start-auto	tab tab-lifted w-max text-white font-bold h-auto text-md px-4 [--tab-bg:#202940] !border-b-0 md:!border-b-1 !rounded-b-lg md:!rounded-b-none before:!hidden md:before:!block"
                        data-content="DMCA" data-title='DMCA Warnings'>
                        <span class="px-2 py-1">DMCA Warnings</span>
                    </button>
                    <button
                        class="[--tab-border-color:#202940] row-start-auto	tab tab-lifted w-max text-white font-bold h-auto text-md px-4 [--tab-bg:#202940] !border-b-0 md:!border-b-1 !rounded-b-lg md:!rounded-b-none before:!hidden md:before:!block"
                        data-content="removed" data-title='DMCA Warnings'>
                        <span class="px-2 py-1">Removed Videos</span>
                    </button>
                </div>
                <div class="mt-3 md:mt-0 rounded-b-box rounded-se-box relative  max-w-full w-full">
                    <div
                        class="border-[#202940] rounded-b-box rounded-se-box gap-2 bg-[#202940] bg-top [border-width:var(--tab-border)] undefined">
                        <div class="lg:min-h-[calc(100vh-11em)]">
                            <div class="rounded-xl">
                                <div class="relative rounded-xl bg-[#202940]">
                                    <div class="px-2 pt-4 md:p-4">
                                        <div class="mb-2 text-green-400" id='title'>
                                            <h5 class="">
                                                <i class="material-icons">folder</i>
                                                <i class="material-icons">navigate_next</i>
                                                folder1
                                            </h5>
                                        </div>
                                        <div class="flex justify-between items-center w-full mb-3">
                                            <form action="{{ route("video.index") }}" method="GET" class="text-sm bg-slate-900 rounded-lg p-2">
                                                <label for="limit">Show:</label>
                                                <select name="limit" class="bg-transparent" id="limit" onchange="this.form.submit()">
                                                    <option value="10" {{ $videos->perPage() == 10 ? 'selected' : '' }}>10</option>
                                                    <option value="20" {{ $videos->perPage() == 20 ? 'selected' : '' }}>20</option>
                                                    <option value="50" {{ $videos->perPage() == 50 ? 'selected' : '' }}>50</option>
                                                    <option value="100" {{ $videos->perPage() == 100 ? 'selected' : '' }}>100</option>
                                                </select>
                                                <span>entries</span>
                                            </form>
                                            <div class="grid grid-cols-4 grid-flow-col gap-2">
                                                <button type="button" btn-video disabled class="cursor-not-allowed"
                                                        title="edit">
                                                    <i btn-edit
                                                       class="material-icons opacity-1 text-3xl">edit_square</i>
                                                </button>
                                                <button type="button" btn-video disabled class="cursor-not-allowed"
                                                        title="delete">
                                                    <i btn-delete class="material-icons opacity-1 text-3xl">delete</i>
                                                </button>
                                                <button type="button" btn-video disabled class="cursor-not-allowed"
                                                        title="export">
                                                    <i btn-export
                                                       class="material-icons opacity-1 text-3xl">ios_share</i>
                                                </button>
                                                <button type="button" btn-video disabled class="cursor-not-allowed"
                                                        title="folder">
                                                    <i btn-move
                                                       class="material-icons opacity-1 text-3xl">folder_open</i>
                                                </button>
                                            </div>
                                        </div>
                                        <div id="live"
                                             class="tab-content flex flex-col bg-clip-border rounded-xl text-gray-700 bg-transparent">
                                            <div class="px-0 pt-0 overflow-auto max-h-[calc(100vh-20em)] ">
                                                <table id="live-table" datatable data-page-size="10"
                                                       class="text-sm table-auto overflow-y-clip w-full min-w-max text-white text-left border-t-0">
                                                    <thead class="sticky top-0 z-10">
                                                    <tr class="bg-slate-900 transition-colors text-md">
                                                        <th class="flex justify-center item-center py-2">
                                                            <input type="checkbox" class="w-4 h-4 ease rounded-md checked:bg-gradient-to-tl checked:from-blue-500 checked:to-violet-500 after:text-xxs after:material-icons
                                                  after:duration-250 after:ease-in-out duration-250 relative float-left mt-1 cursor-pointer appearance-none border
                                                  border-solid border-slate-200 bg-white bg-contain bg-center bg-no-repeat align-top transition-all after:absolute after:flex after:h-full
                                                  after:w-full after:items-center after:justify-center after:text-white after:opacity-0 after:transition-all after:content-['✓']
                                                  checked:border-0 checked:border-transparent checked:bg-transparent checked:after:opacity-100"
                                                                   checked-All>
                                                        </th>
                                                        <th class='before:mr-2 after:mr-2 before:!bottom-1/2 after:!top-1/2 leading-3 pl-2 cursor-pointer relative'>
                                                            Filename
                                                        </th>
                                                        <th class="before:mr-2 after:mr-2 before:!bottom-1/2 after:!top-1/2 leading-3 pl-2">
                                                            ID</h6>
                                                        </th>
                                                        <th class="before:mr-2 after:mr-2 before:!bottom-1/2 after:!top-1/2 leading-3 pl-2 cursor-pointer">
                                                            Poster
                                                        </th>
                                                        <th class="before:mr-2 after:mr-2 before:!bottom-1/2 after:!top-1/2 leading-3 pl-2 cursor-pointer">
                                                            Filesize
                                                        </th>
                                                        <th class="before:mr-2 after:mr-2 before:!bottom-1/2 after:!top-1/2 leading-3 pl-2 cursor-pointer">
                                                            Views
                                                        </th>
                                                        <th class="before:mr-2 after:mr-2 before:!bottom-1/2 after:!top-1/2 leading-3 pl-2 cursor-pointer">
                                                            Uploaded
                                                        </th>
                                                        <th class="before:mr-2 after:mr-2 before:!bottom-1/2 after:!top-1/2 leading-3 pl-2 cursor-pointer">
                                                            Note
                                                        </th>
                                                        <th>
                                                            <h6
                                                                class="antialiased tracking-normal font-sans text-base text-inherit flex py-5 items-center justify-between px-2 font-semibold leading-none">
                                                            </h6>
                                                        </th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($videos as $index => $video)
                                                        <tr class="my-3 h-12 {{ $index % 2 == 0 ? '' : 'bg-slate-900' }}">
                                                            <td class="flex items-center justify-center h-[inherit] px-2">
                                                                <input type="checkbox"
                                                                       class="checkbox w-4 h-4 ease rounded-md checked:bg-gradient-to-tl checked:from-blue-500 checked:to-violet-500 after:text-xxs after:material-icons                                                   after:duration-250 after:ease-in-out duration-250 relative float-left mt-1 cursor-pointer appearance-none border                                                    border-solid border-slate-200 bg-white bg-contain bg-center bg-no-repeat align-top transition-all after:absolute after:flex after:h-full                                                    after:w-full after:items-center after:justify-center after:text-white after:opacity-0 after:transition-all after:content-['✓']                                                    checked:border-0 checked:border-transparent checked:bg-transparent checked:after:opacity-100">
                                                            </td>
                                                            <td>{{ $video->title }}</td>
                                                            <td>{{ $video->id }}</td>
                                                            <td>
                                                                <img class="h-10" src="{{ $video->poster }}">
                                                            </td>
                                                            <td>{{ $video->size }}</td>
                                                            <td>{{ $video->total_play }}</td>
                                                            <td>{{ $video->created_at }}</td>
                                                            <td>{{ $video->is_sub }}</td>
                                                            <td data-label="Idioma" class="relative"><a
                                                                    href="javascript:;" dropdown-trigger
                                                                    aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                                <ul dropdown-menu
                                                                    class="text-sm transform-dropdown bg-[#1a2035] before:font-awesome before:leading-default before:duration-350 before:ease
                                     shadow-lg shadow-slate-900 duration-250 px-5 before:sm:right-3 before:text-lg pointer-events-none absolute right-1 top-12 lg:top-12
                                     origin-top list-none rounded-lg  bg-clip-padding text-white z-10
                                     px-2 py-4 text-left opacity-0 transition-all before:absolute before:right-0 before:left-auto before:top-0 before:z-10
                                     before:inline-block before:font-normal before:text-[#1a2035] before:antialiased before:transition-all before:text-xl before:content-['▲'] sm:-mr-6                         lg:absolute lg:right-6 lg:left-auto lg:mt-2 lg:block lg:cursor-pointer">
                                                                    <li class="relative w-max"><i
                                                                            class="material-icons opacity-1">edit_square</i>
                                                                        Edit
                                                                        File
                                                                    </li>
                                                                    <li class="relative my-3"><i
                                                                            class="material-icons opacity-1">content_copy</i>
                                                                        Clone
                                                                    </li>
                                                                    <li class="relative"><i
                                                                            class="material-icons opacity-1">delete</i>
                                                                        Delete
                                                                    </li>
                                                                </ul>
                                                            </td>
                                                        </tr>Ï
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="button-table pt-6 text-white text-sm flex justify-between items-center">
                                                <div class="dataTables_info bg-slate-900 rounded-lg">
                                                    <p class="p-2">
                                                        Showing
                                                        <span class="font-medium">{{$videos->firstItem()  }}</span>
                                                        to
                                                        <span class="font-medium">{{$videos->lastItem()  }}</span>
                                                        of
                                                        <span class="font-medium">{{$videos->total()  }}</span>
                                                        results
                                                    </p>
                                                </div>
                                                <div class="pagination flex items-center">
                                                    {{-- Previous Page Link --}}
                                                    @if ($videos->onFirstPage())
                                                        <span class="text-white opacity-50 py-2 px-3 w-max rounded-lg cursor-not-allowed bg-slate-900">Previous</span>
                                                    @else
                                                        <a class="hover:bg-emerald-400 py-2 px-4 w-max rounded-lg bg-slate-900" href="{{ $videos->previousPageUrl() }}&limit={{ $videos->perPage() }}" rel="prev">Previous</a>
                                                    @endif


                                                    {{-- Pagination Elements --}}
                                                    @if ($videos->currentPage() > 2)
                                                        <li class="list-none ">
                                                            <a class="hover:bg-emerald-400 text-white mx-1 py-2 px-3 w-max rounded-lg bg-slate-900" href="{{ $videos->url(1) }}&limit={{ $videos->perPage() }}">1</a>
                                                        </li>
                                                        @if ($videos->currentPage() > 3)
                                                            <li class="list-none page-item disabled px-2"><span class="page-link">...</span></li>
                                                        @endif
                                                    @endif

                                                    @for ($i = max(1, $videos->currentPage() - 1); $i <= min($videos->lastPage(), $videos->currentPage() + 1); $i++)
                                                        <li class="list-none page-item">
                                                            <a class="text-white mx-1 py-2 px-3 w-max rounded-lg {{ ($videos->currentPage() == $i) ? 'bg-emerald-400 cursor-not-allowed ' : 'bg-slate-900 hover:bg-emerald-400' }}" href="{{ $videos->url($i) }}&limit={{ $videos->perPage() }}">{{ $i }}</a>
                                                        </li>
                                                    @endfor

                                                    @if ($videos->currentPage() < $videos->lastPage() - 1)
                                                        @if ($videos->currentPage() < $videos->lastPage() - 2)
                                                            <li class="list-none page-item disabled px-2"><span class="page-link">...</span></li>
                                                        @endif
                                                        <li class="list-none page-item">
                                                            <a class="hover:bg-emerald-400 text-white mx-1 py-2 px-3 w-max rounded-lg bg-slate-900" href="{{ $videos->url($videos->lastPage()) }}&limit={{ $videos->perPage() }}">{{ $videos->lastPage() }}</a>
                                                        </li>
                                                    @endif

                                                    {{-- Next Page Link --}}
                                                    @if ($videos->hasMorePages())
                                                        <a class="hover:bg-emerald-400 py-2 px-4 w-max rounded-lg bg-slate-900" href="{{ $videos->nextPageUrl() }}&limit={{ $videos->perPage() }}" rel="next">Next</a>
                                                    @else
                                                        <span class="text-white opacity-50 py-2 px-3 w-max rounded-lg cursor-not-allowed bg-slate-900">Next</span>
                                                    @endif
                                                </div>
                                            </div>

                                        </div>
                                        <div id="processing"
                                             class="tab-content flex flex-col bg-clip-border rounded-xl text-gray-700 bg-transparent">
                                            <div class="px-0 pt-0 overflow-auto max-h-[calc(100vh-20em)] ">
                                                <table id="processing-table" datatable data-page-size="10"
                                                       class="text-sm table-auto overflow-y-clip w-full min-w-max text-white text-left border-t-0">
                                                    <thead class="sticky top-0 z-10">
                                                    <tr class="bg-slate-900 transition-colors text-md">
                                                        <th class="flex justify-center item-center py-2">
                                                            <input type="checkbox" class="w-4 h-4 ease rounded-md checked:bg-gradient-to-tl checked:from-blue-500 checked:to-violet-500 after:text-xxs after:material-icons
                                                  after:duration-250 after:ease-in-out duration-250 relative float-left mt-1 cursor-pointer appearance-none border
                                                  border-solid border-slate-200 bg-white bg-contain bg-center bg-no-repeat align-top transition-all after:absolute after:flex after:h-full
                                                  after:w-full after:items-center after:justify-center after:text-white after:opacity-0 after:transition-all after:content-['✓']
                                                  checked:border-0 checked:border-transparent checked:bg-transparent checked:after:opacity-100"
                                                                   checked-All>
                                                        </th>
                                                        <th class='before:mr-2 after:mr-2 before:!bottom-1/2 after:!top-1/2 leading-3 pl-2 cursor-pointer relative'>
                                                            Filename
                                                        </th>
                                                        <th class="before:mr-2 after:mr-2 before:!bottom-1/2 after:!top-1/2 leading-3 pl-2">
                                                            ID</h6>
                                                        </th>
                                                        <th class="before:mr-2 after:mr-2 before:!bottom-1/2 after:!top-1/2 leading-3 pl-2 cursor-pointer">
                                                            Poster
                                                        </th>
                                                        <th class="before:mr-2 after:mr-2 before:!bottom-1/2 after:!top-1/2 leading-3 pl-2 cursor-pointer">
                                                            Filesize
                                                        </th>
                                                        <th class="before:mr-2 after:mr-2 before:!bottom-1/2 after:!top-1/2 leading-3 pl-2 cursor-pointer">
                                                            Views
                                                        </th>
                                                        <th class="before:mr-2 after:mr-2 before:!bottom-1/2 after:!top-1/2 leading-3 pl-2 cursor-pointer">
                                                            Uploaded
                                                        </th>
                                                        <th class="before:mr-2 after:mr-2 before:!bottom-1/2 after:!top-1/2 leading-3 pl-2 cursor-pointer">
                                                            Note
                                                        </th>
                                                        <th>
                                                            <h6
                                                                class="antialiased tracking-normal font-sans text-base text-inherit flex py-5 items-center justify-between px-2 font-semibold leading-none">
                                                            </h6>
                                                        </th>
                                                    </tr>
                                                    </thead>
                                                </table>
                                            </div>
                                        </div>
                                        <div id="DMCA"
                                             class="tab-content flex flex-col bg-clip-border rounded-xl text-gray-700 bg-transparent">
                                            <div class="px-0 pt-0 overflow-auto max-h-[calc(100vh-20em)] ">
                                                <table id="DMCA-table" datatable data-page-size="10"
                                                       class="text-sm table-auto overflow-y-clip w-full min-w-max text-white text-left border-t-0">
                                                    <thead class="sticky top-0 z-10">
                                                    <tr class="bg-slate-900 transition-colors text-md">
                                                        <th class="flex justify-center item-center py-2">
                                                            <input type="checkbox" class="w-4 h-4 ease rounded-md checked:bg-gradient-to-tl checked:from-blue-500 checked:to-violet-500 after:text-xxs after:material-icons
                                                  after:duration-250 after:ease-in-out duration-250 relative float-left mt-1 cursor-pointer appearance-none border
                                                  border-solid border-slate-200 bg-white bg-contain bg-center bg-no-repeat align-top transition-all after:absolute after:flex after:h-full
                                                  after:w-full after:items-center after:justify-center after:text-white after:opacity-0 after:transition-all after:content-['✓']
                                                  checked:border-0 checked:border-transparent checked:bg-transparent checked:after:opacity-100"
                                                                   checked-All>
                                                        </th>
                                                        <th class='before:mr-2 after:mr-2 before:!bottom-1/2 after:!top-1/2 leading-3 pl-2 cursor-pointer relative'>
                                                            Filename
                                                        </th>
                                                        <th class="before:mr-2 after:mr-2 before:!bottom-1/2 after:!top-1/2 leading-3 pl-2">
                                                            ID</h6>
                                                        </th>
                                                        <th class="before:mr-2 after:mr-2 before:!bottom-1/2 after:!top-1/2 leading-3 pl-2 cursor-pointer">
                                                            Poster
                                                        </th>
                                                        <th class="before:mr-2 after:mr-2 before:!bottom-1/2 after:!top-1/2 leading-3 pl-2 cursor-pointer">
                                                            Filesize
                                                        </th>
                                                        <th class="before:mr-2 after:mr-2 before:!bottom-1/2 after:!top-1/2 leading-3 pl-2 cursor-pointer">
                                                            Views
                                                        </th>
                                                        <th class="before:mr-2 after:mr-2 before:!bottom-1/2 after:!top-1/2 leading-3 pl-2 cursor-pointer">
                                                            Uploaded
                                                        </th>
                                                        <th class="before:mr-2 after:mr-2 before:!bottom-1/2 after:!top-1/2 leading-3 pl-2 cursor-pointer">
                                                            Note
                                                        </th>
                                                        <th>
                                                            <h6
                                                                class="antialiased tracking-normal font-sans text-base text-inherit flex py-5 items-center justify-between px-2 font-semibold leading-none">
                                                            </h6>
                                                        </th>
                                                    </tr>
                                                    </thead>
                                                </table>
                                            </div>
                                        </div>
                                        <div id="removed"
                                             class="tab-content flex flex-col bg-clip-border rounded-xl text-gray-700 bg-transparent">
                                            <div class="px-0 pt-0 overflow-auto max-h-[calc(100vh-20em)] ">
                                                <table id="removed-table" datatable data-page-size="10"
                                                       class="text-sm table-auto overflow-y-clip w-full min-w-max text-white text-left border-t-0">
                                                    <thead class="sticky top-0 z-10">
                                                    <tr class="bg-slate-900 transition-colors text-md">
                                                        <th class="flex justify-center item-center py-2">
                                                            <input type="checkbox" class="w-4 h-4 ease rounded-md checked:bg-gradient-to-tl checked:from-blue-500 checked:to-violet-500 after:text-xxs after:material-icons
                                                  after:duration-250 after:ease-in-out duration-250 relative float-left mt-1 cursor-pointer appearance-none border
                                                  border-solid border-slate-200 bg-white bg-contain bg-center bg-no-repeat align-top transition-all after:absolute after:flex after:h-full
                                                  after:w-full after:items-center after:justify-center after:text-white after:opacity-0 after:transition-all after:content-['✓']
                                                  checked:border-0 checked:border-transparent checked:bg-transparent checked:after:opacity-100"
                                                                   checked-All>
                                                        </th>
                                                        <th class='before:mr-2 after:mr-2 before:!bottom-1/2 after:!top-1/2 leading-3 pl-2 cursor-pointer relative'>
                                                            Filename
                                                        </th>
                                                        <th class="before:mr-2 after:mr-2 before:!bottom-1/2 after:!top-1/2 leading-3 pl-2">
                                                            ID</h6>
                                                        </th>
                                                        <th class="before:mr-2 after:mr-2 before:!bottom-1/2 after:!top-1/2 leading-3 pl-2 cursor-pointer">
                                                            Poster
                                                        </th>
                                                        <th class="before:mr-2 after:mr-2 before:!bottom-1/2 after:!top-1/2 leading-3 pl-2 cursor-pointer">
                                                            Filesize
                                                        </th>
                                                        <th class="before:mr-2 after:mr-2 before:!bottom-1/2 after:!top-1/2 leading-3 pl-2 cursor-pointer">
                                                            Views
                                                        </th>
                                                        <th class="before:mr-2 after:mr-2 before:!bottom-1/2 after:!top-1/2 leading-3 pl-2 cursor-pointer">
                                                            Uploaded
                                                        </th>
                                                        <th class="before:mr-2 after:mr-2 before:!bottom-1/2 after:!top-1/2 leading-3 pl-2 cursor-pointer">
                                                            Note
                                                        </th>
                                                        <th>
                                                            <h6
                                                                class="antialiased tracking-normal font-sans text-base text-inherit flex py-5 items-center justify-between px-2 font-semibold leading-none">
                                                            </h6>
                                                        </th>
                                                    </tr>
                                                    </thead>
                                                </table>
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

        <div folder
             class="w-full max-w-full px-3 lg:w-3/12 lg:flex-none boder-none lg:border-l lg:border-white/70 mb-5 lg:mb-0">
            <div class="lg:mr-3 mb-3">
                <div class="pl-3 rounded-lg flex justify-between items-center font-bold text-white">
                    <h3 class="text-lg">
                        My Folders
                    </h3>
                    <div class="flex items-center">
                <span
                    class="px-2 text-green-400 text-3xl h-full px-1 items-center flex material-icons cursor-pointer">create_new_folder</span>Add
                        Folder
                    </div>

                </div>

            </div>
            <div class="lg:mr-3 mb-3 mt-4 lg:mt-0">
                <div class="md:ml-auto">
                    <div class="flex items-center relative bg-slate-900 w-full rounded-lg ease" search>
                        <label
                            class="p-1 bg-slate-900 flex items-center translate-x-3 transition duration-300 ease-in-out z-10 absolute text-slate-400">Search
                            folder</label>
                        </span>
                        <input type="text" onkeyup="searchFolder(this)"
                               class="z-20 px-3 py-2 text-sm relative -ml-px block min-w-0 flex-auto rounded-lg text-white bg-transparent bg-clip-padding text-gray-700 focus:outline-none
                         border border-solid border-slate-900"
                               onfocus="focused(this)" onfocusout="defocused(this)"/>
                    </div>
                </div>

            </div>
            <div class="list-folder max-h-[calc(100vh-30em)] lg:max-h-[calc(100vh-16em)]  overflow-scroll">
                <div class="w-full overflow-hidden">
                    <div class="item-folder rounded-lg text-white flex justify-between px-2 py-3 mb-2 bg-[#202940]">
                        <h4>
                            folder-1
                        </h4>
                        <span class="relative"><a href="javascript:;" dropdown-trigger aria-expanded="false"><i
                                    class="material-icons">more_vert</i></a>
                  <ul dropdown-menu
                      class="text-sm transform-dropdown bg-[#1a2035] before:font-awesome before:leading-default before:duration-350 before:ease
                         shadow-lg shadow-slate-900 duration-250 px-5 before:sm:right-1 before:text-5.5 pointer-events-none absolute right-1 top-8 z-10 lg:top-6
                         origin-top list-none rounded-lg  bg-clip-padding text-white z-10
                         px-2 py-4 text-left text-slate-500 opacity-0 transition-all before:absolute before:right-0 before:left-auto before:top-0 before:z-10
                         before:inline-block before:font-normal before:text-[#1a2035] before:antialiased before:transition-all before:text-xl before:content-['▲'] sm:-mr-6                         lg:absolute lg:right-6 lg:left-auto lg:mt-2 lg:block lg:cursor-pointer">
                    <!-- add show class on dropdown open js -->
                    <li class="relative w-max"> <i class="material-icons opacity-1">edit_square</i> Edit File </li>
                    <li class="relative my-3"> <i class="material-icons opacity-1">content_copy</i> Clone </li>
                    <li class="relative"> <i class="material-icons opacity-1">delete</i> Delete </li>
                  </ul>
                </span>
                    </div>
                    <div class="item-folder rounded-lg text-white flex justify-between px-2 py-3 mb-2 bg-[#202940]">
                        <h4>
                            gdsfg-1
                        </h4>
                        <span class="relative"><a href="javascript:;" dropdown-trigger aria-expanded="false"><i
                                    class="material-icons">more_vert</i></a>
                  <ul dropdown-menu
                      class="text-sm transform-dropdown bg-[#1a2035] before:font-awesome before:leading-default before:duration-350 before:ease
                         shadow-lg shadow-slate-900 duration-250 px-5 before:sm:right-1 before:text-5.5 pointer-events-none absolute right-1 top-8 z-10 lg:top-6
                         origin-top list-none rounded-lg  bg-clip-padding text-white z-10
                         px-2 py-4 text-left text-slate-500 opacity-0 transition-all before:absolute before:right-0 before:left-auto before:top-0 before:z-10
                         before:inline-block before:font-normal before:text-[#1a2035] before:antialiased before:transition-all before:text-xl before:content-['▲'] sm:-mr-6                         lg:absolute lg:right-6 lg:left-auto lg:mt-2 lg:block lg:cursor-pointer">
                    <!-- add show class on dropdown open js -->
                    <li class="relative w-max"> <i class="material-icons opacity-1">edit_square</i> Edit File </li>
                    <li class="relative my-3"> <i class="material-icons opacity-1">content_copy</i> Clone </li>
                    <li class="relative"> <i class="material-icons opacity-1">delete</i> Delete </li>
                  </ul>
                </span>
                    </div>
                    <div class="item-folder rounded-lg text-white flex justify-between px-2 py-3 mb-2 bg-[#202940]">
                        <h4>
                            gdsg-1
                        </h4>
                        <span class="relative"><a href="javascript:;" dropdown-trigger aria-expanded="false"><i
                                    class="material-icons">more_vert</i></a>
                  <ul dropdown-menu
                      class="text-sm transform-dropdown bg-[#1a2035] before:font-awesome before:leading-default before:duration-350 before:ease
                         shadow-lg shadow-slate-900 duration-250 px-5 before:sm:right-1 before:text-5.5 pointer-events-none absolute right-1 top-8 z-10 lg:top-6
                         origin-top list-none rounded-lg  bg-clip-padding text-white z-10
                         px-2 py-4 text-left text-slate-500 opacity-0 transition-all before:absolute before:right-0 before:left-auto before:top-0 before:z-10
                         before:inline-block before:font-normal before:text-[#1a2035] before:antialiased before:transition-all before:text-xl before:content-['▲'] sm:-mr-6                         lg:absolute lg:right-6 lg:left-auto lg:mt-2 lg:block lg:cursor-pointer">
                    <!-- add show class on dropdown open js -->
                    <li class="relative w-max"> <i class="material-icons opacity-1">edit_square</i> Edit File </li>
                    <li class="relative my-3"> <i class="material-icons opacity-1">content_copy</i> Clone </li>
                    <li class="relative"> <i class="material-icons opacity-1">delete</i> Delete </li>
                  </ul>
                </span>
                    </div>
                    <div class="item-folder rounded-lg text-white flex justify-between px-2 py-3 mb-2 bg-[#202940]">
                        <h4>
                            fold fhsgh. er-1
                        </h4>
                        <span class="relative"><a href="javascript:;" dropdown-trigger aria-expanded="false"><i
                                    class="material-icons">more_vert</i></a>
                  <ul dropdown-menu
                      class="text-sm transform-dropdown bg-[#1a2035] before:font-awesome before:leading-default before:duration-350 before:ease
                         shadow-lg shadow-slate-900 duration-250 px-5 before:sm:right-1 before:text-5.5 pointer-events-none absolute right-1 top-8 z-10 lg:top-6
                         origin-top list-none rounded-lg  bg-clip-padding text-white z-10
                         px-2 py-4 text-left text-slate-500 opacity-0 transition-all before:absolute before:right-0 before:left-auto before:top-0 before:z-10
                         before:inline-block before:font-normal before:text-[#1a2035] before:antialiased before:transition-all before:text-xl before:content-['▲'] sm:-mr-6                         lg:absolute lg:right-6 lg:left-auto lg:mt-2 lg:block lg:cursor-pointer">
                    <!-- add show class on dropdown open js -->
                    <li class="relative w-max"> <i class="material-icons opacity-1">edit_square</i> Edit File </li>
                    <li class="relative my-3"> <i class="material-icons opacity-1">content_copy</i> Clone </li>
                    <li class="relative"> <i class="material-icons opacity-1">delete</i> Delete </li>
                  </ul>
                </span>
                    </div>
                    <div class="item-folder rounded-lg text-white flex justify-between px-2 py-3 mb-2 bg-[#202940]">
                        <h4>
                            fol f sf gdder-1
                        </h4>
                        <span class="relative"><a href="javascript:;" dropdown-trigger aria-expanded="false"><i
                                    class="material-icons">more_vert</i></a>
                  <ul dropdown-menu
                      class="text-sm transform-dropdown bg-[#1a2035] before:font-awesome before:leading-default before:duration-350 before:ease
                         shadow-lg shadow-slate-900 duration-250 px-5 before:sm:right-1 before:text-5.5 pointer-events-none absolute right-1 top-8 z-10 lg:top-6
                         origin-top list-none rounded-lg  bg-clip-padding text-white z-10
                         px-2 py-4 text-left text-slate-500 opacity-0 transition-all before:absolute before:right-0 before:left-auto before:top-0 before:z-10
                         before:inline-block before:font-normal before:text-[#1a2035] before:antialiased before:transition-all before:text-xl before:content-['▲'] sm:-mr-6                         lg:absolute lg:right-6 lg:left-auto lg:mt-2 lg:block lg:cursor-pointer">
                    <!-- add show class on dropdown open js -->
                    <li class="relative w-max"> <i class="material-icons opacity-1">edit_square</i> Edit File </li>
                    <li class="relative my-3"> <i class="material-icons opacity-1">content_copy</i> Clone </li>
                    <li class="relative"> <i class="material-icons opacity-1">delete</i> Delete </li>
                  </ul>
                </span>
                    </div>
                    <div class="item-folder rounded-lg text-white flex justify-between px-2 py-3 mb-2 bg-[#202940]">
                        <h4>
                            f. f gdf df-1
                        </h4>
                        <span class="relative"><a href="javascript:;" dropdown-trigger aria-expanded="false"><i
                                    class="material-icons">more_vert</i></a>
                  <ul dropdown-menu
                      class="text-sm transform-dropdown bg-[#1a2035] before:font-awesome before:leading-default before:duration-350 before:ease
                         shadow-lg shadow-slate-900 duration-250 px-5 before:sm:right-1 before:text-5.5 pointer-events-none absolute right-1 top-8 z-10 lg:top-6
                         origin-top list-none rounded-lg  bg-clip-padding text-white z-10
                         px-2 py-4 text-left text-slate-500 opacity-0 transition-all before:absolute before:right-0 before:left-auto before:top-0 before:z-10
                         before:inline-block before:font-normal before:text-[#1a2035] before:antialiased before:transition-all before:text-xl before:content-['▲'] sm:-mr-6                         lg:absolute lg:right-6 lg:left-auto lg:mt-2 lg:block lg:cursor-pointer">
                    <!-- add show class on dropdown open js -->
                    <li class="relative w-max"> <i class="material-icons opacity-1">edit_square</i> Edit File </li>
                    <li class="relative my-3"> <i class="material-icons opacity-1">content_copy</i> Clone </li>
                    <li class="relative"> <i class="material-icons opacity-1">delete</i> Delete </li>
                  </ul>
                </span>
                    </div>
                    <div class="item-folder rounded-lg text-white flex justify-between px-2 py-3 mb-2 bg-[#202940]">
                        <h4>
                            ffd dkjd older-1
                        </h4>
                        <span class="relative"><a href="javascript:;" dropdown-trigger aria-expanded="false"><i
                                    class="material-icons">more_vert</i></a>
                  <ul dropdown-menu
                      class="text-sm transform-dropdown bg-[#1a2035] before:font-awesome before:leading-default before:duration-350 before:ease
                         shadow-lg shadow-slate-900 duration-250 px-5 before:sm:right-1 before:text-5.5 pointer-events-none absolute right-1 top-8 z-10 lg:top-6
                         origin-top list-none rounded-lg  bg-clip-padding text-white z-10
                         px-2 py-4 text-left text-slate-500 opacity-0 transition-all before:absolute before:right-0 before:left-auto before:top-0 before:z-10
                         before:inline-block before:font-normal before:text-[#1a2035] before:antialiased before:transition-all before:text-xl before:content-['▲'] sm:-mr-6                         lg:absolute lg:right-6 lg:left-auto lg:mt-2 lg:block lg:cursor-pointer">
                    <!-- add show class on dropdown open js -->
                    <li class="relative w-max"> <i class="material-icons opacity-1">edit_square</i> Edit File </li>
                    <li class="relative my-3"> <i class="material-icons opacity-1">content_copy</i> Clone </li>
                    <li class="relative"> <i class="material-icons opacity-1">delete</i> Delete </li>
                  </ul>
                </span>
                    </div>
                    <div class="item-folder rounded-lg text-white flex justify-between px-2 py-3 mb-2 bg-[#202940]">
                        <h4>
                            fold dk fer-1
                        </h4>
                        <span class="relative"><a href="javascript:;" dropdown-trigger aria-expanded="false"><i
                                    class="material-icons">more_vert</i></a>
                  <ul dropdown-menu
                      class="text-sm transform-dropdown bg-[#1a2035] before:font-awesome before:leading-default before:duration-350 before:ease
                         shadow-lg shadow-slate-900 duration-250 px-5 before:sm:right-1 before:text-5.5 pointer-events-none absolute right-1 top-8 z-10 lg:top-6
                         origin-top list-none rounded-lg  bg-clip-padding text-white z-10
                         px-2 py-4 text-left text-slate-500 opacity-0 transition-all before:absolute before:right-0 before:left-auto before:top-0 before:z-10
                         before:inline-block before:font-normal before:text-[#1a2035] before:antialiased before:transition-all before:text-xl before:content-['▲'] sm:-mr-6                         lg:absolute lg:right-6 lg:left-auto lg:mt-2 lg:block lg:cursor-pointer">
                    <!-- add show class on dropdown open js -->
                    <li class="relative w-max"> <i class="material-icons opacity-1">edit_square</i> Edit File </li>
                    <li class="relative my-3"> <i class="material-icons opacity-1">content_copy</i> Clone </li>
                    <li class="relative"> <i class="material-icons opacity-1">delete</i> Delete </li>
                  </ul>
                </span>
                    </div>
                    <div class="item-folder rounded-lg text-white flex justify-between px-2 py-3 mb-2 bg-[#202940]">
                        <h4>
                            fold dfsl er-1
                        </h4>
                        <span class="relative"><a href="javascript:;" dropdown-trigger aria-expanded="false"><i
                                    class="material-icons">more_vert</i></a>
                  <ul dropdown-menu
                      class="text-sm transform-dropdown bg-[#1a2035] before:font-awesome before:leading-default before:duration-350 before:ease
                         shadow-lg shadow-slate-900 duration-250 px-5 before:sm:right-1 before:text-5.5 pointer-events-none absolute right-1 top-8 z-10 lg:top-6
                         origin-top list-none rounded-lg  bg-clip-padding text-white z-10
                         px-2 py-4 text-left text-slate-500 opacity-0 transition-all before:absolute before:right-0 before:left-auto before:top-0 before:z-10
                         before:inline-block before:font-normal before:text-[#1a2035] before:antialiased before:transition-all before:text-xl before:content-['▲'] sm:-mr-6                         lg:absolute lg:right-6 lg:left-auto lg:mt-2 lg:block lg:cursor-pointer">
                    <!-- add show class on dropdown open js -->
                    <li class="relative w-max"> <i class="material-icons opacity-1">edit_square</i> Edit File </li>
                    <li class="relative my-3"> <i class="material-icons opacity-1">content_copy</i> Clone </li>
                    <li class="relative"> <i class="material-icons opacity-1">delete</i> Delete </li>
                  </ul>
                </span>
                    </div>
                    <div class="item-folder rounded-lg text-white flex justify-between px-2 py-3 mb-2 bg-[#202940]">
                        <h4>
                            fold df er-1
                        </h4>
                        <span class="relative"><a href="javascript:;" dropdown-trigger aria-expanded="false"><i
                                    class="material-icons">more_vert</i></a>
                  <ul dropdown-menu
                      class="text-sm transform-dropdown bg-[#1a2035] before:font-awesome before:leading-default before:duration-350 before:ease
                         shadow-lg shadow-slate-900 duration-250 px-5 before:sm:right-1 before:text-5.5 pointer-events-none absolute right-1 top-8 z-10 lg:top-6
                         origin-top list-none rounded-lg  bg-clip-padding text-white z-10
                         px-2 py-4 text-left text-slate-500 opacity-0 transition-all before:absolute before:right-0 before:left-auto before:top-0 before:z-10
                         before:inline-block before:font-normal before:text-[#1a2035] before:antialiased before:transition-all before:text-xl before:content-['▲'] sm:-mr-6                         lg:absolute lg:right-6 lg:left-auto lg:mt-2 lg:block lg:cursor-pointer">
                    <!-- add show class on dropdown open js -->
                    <li class="relative w-max"> <i class="material-icons opacity-1">edit_square</i> Edit File </li>
                    <li class="relative my-3"> <i class="material-icons opacity-1">content_copy</i> Clone </li>
                    <li class="relative"> <i class="material-icons opacity-1">delete</i> Delete </li>
                  </ul>
                </span>
                    </div>
                    <div class="item-folder rounded-lg text-white flex justify-between px-2 py-3 mb-2 bg-[#202940]">
                        <h4>
                            fold fh er-1
                        </h4>
                        <span class="relative"><a href="javascript:;" dropdown-trigger aria-expanded="false"><i
                                    class="material-icons">more_vert</i></a>
                  <ul dropdown-menu
                      class="text-sm transform-dropdown bg-[#1a2035] before:font-awesome before:leading-default before:duration-350 before:ease
                         shadow-lg shadow-slate-900 duration-250 px-5 before:sm:right-1 before:text-5.5 pointer-events-none absolute right-1 top-8 z-10 lg:top-6
                         origin-top list-none rounded-lg  bg-clip-padding text-white z-10
                         px-2 py-4 text-left text-slate-500 opacity-0 transition-all before:absolute before:right-0 before:left-auto before:top-0 before:z-10
                         before:inline-block before:font-normal before:text-[#1a2035] before:antialiased before:transition-all before:text-xl before:content-['▲'] sm:-mr-6                         lg:absolute lg:right-6 lg:left-auto lg:mt-2 lg:block lg:cursor-pointer">
                    <!-- add show class on dropdown open js -->
                    <li class="relative w-max"> <i class="material-icons opacity-1">edit_square</i> Edit File </li>
                    <li class="relative my-3"> <i class="material-icons opacity-1">content_copy</i> Clone </li>
                    <li class="relative"> <i class="material-icons opacity-1">delete</i> Delete </li>
                  </ul>
                </span>
                    </div>
                    <div class="item-folder rounded-lg text-white flex justify-between px-2 py-3 mb-2 bg-[#202940]">
                        <h4>
                            fol dfk der-1
                        </h4>
                        <span class="relative"><a href="javascript:;" dropdown-trigger aria-expanded="false"><i
                                    class="material-icons">more_vert</i></a>
                  <ul dropdown-menu
                      class="text-sm transform-dropdown bg-[#1a2035] before:font-awesome before:leading-default before:duration-350 before:ease
                         shadow-lg shadow-slate-900 duration-250 px-5 before:sm:right-1 before:text-5.5 pointer-events-none absolute right-1 top-8 z-10 lg:top-6
                         origin-top list-none rounded-lg  bg-clip-padding text-white z-10
                         px-2 py-4 text-left text-slate-500 opacity-0 transition-all before:absolute before:right-0 before:left-auto before:top-0 before:z-10
                         before:inline-block before:font-normal before:text-[#1a2035] before:antialiased before:transition-all before:text-xl before:content-['▲'] sm:-mr-6                         lg:absolute lg:right-6 lg:left-auto lg:mt-2 lg:block lg:cursor-pointer">
                    <!-- add show class on dropdown open js -->
                    <li class="relative w-max"> <i class="material-icons opacity-1">edit_square</i> Edit File </li>
                    <li class="relative my-3"> <i class="material-icons opacity-1">content_copy</i> Clone </li>
                    <li class="relative"> <i class="material-icons opacity-1">delete</i> Delete </li>
                  </ul>
                </span>
                    </div>
                    <div class="item-folder rounded-lg text-white flex justify-between px-2 py-3 mb-2 bg-[#202940]">
                        <h4>
                            fold ds er-1
                        </h4>
                        <span class="relative"><a href="javascript:;" dropdown-trigger aria-expanded="false"><i
                                    class="material-icons">more_vert</i></a>
                  <ul dropdown-menu
                      class="text-sm transform-dropdown bg-[#1a2035] before:font-awesome before:leading-default before:duration-350 before:ease
                         shadow-lg shadow-slate-900 duration-250 px-5 before:sm:right-1 before:text-5.5 pointer-events-none absolute right-1 top-8 z-10 lg:top-6
                         origin-top list-none rounded-lg  bg-clip-padding text-white z-10
                         px-2 py-4 text-left text-slate-500 opacity-0 transition-all before:absolute before:right-0 before:left-auto before:top-0 before:z-10
                         before:inline-block before:font-normal before:text-[#1a2035] before:antialiased before:transition-all before:text-xl before:content-['▲'] sm:-mr-6                         lg:absolute lg:right-6 lg:left-auto lg:mt-2 lg:block lg:cursor-pointer">
                    <!-- add show class on dropdown open js -->
                    <li class="relative w-max"> <i class="material-icons opacity-1">edit_square</i> Edit File </li>
                    <li class="relative my-3"> <i class="material-icons opacity-1">content_copy</i> Clone </li>
                    <li class="relative"> <i class="material-icons opacity-1">delete</i> Delete </li>
                  </ul>
                </span>
                    </div>
                    <div class="item-folder rounded-lg text-white flex justify-between px-2 py-3 mb-2 bg-[#202940]">
                        <h4>
                            fold df er-1
                        </h4>
                        <span class="relative"><a href="javascript:;" dropdown-trigger aria-expanded="false"><i
                                    class="material-icons">more_vert</i></a>
                  <ul dropdown-menu
                      class="text-sm transform-dropdown bg-[#1a2035] before:font-awesome before:leading-default before:duration-350 before:ease
                         shadow-lg shadow-slate-900 duration-250 px-5 before:sm:right-1 before:text-5.5 pointer-events-none absolute right-1 top-8 z-10 lg:top-6
                         origin-top list-none rounded-lg  bg-clip-padding text-white z-10
                         px-2 py-4 text-left text-slate-500 opacity-0 transition-all before:absolute before:right-0 before:left-auto before:top-0 before:z-10
                         before:inline-block before:font-normal before:text-[#1a2035] before:antialiased before:transition-all before:text-xl before:content-['▲'] sm:-mr-6                         lg:absolute lg:right-6 lg:left-auto lg:mt-2 lg:block lg:cursor-pointer">
                    <!-- add show class on dropdown open js -->
                    <li class="relative w-max"> <i class="material-icons opacity-1">edit_square</i> Edit File </li>
                    <li class="relative my-3"> <i class="material-icons opacity-1">content_copy</i> Clone </li>
                    <li class="relative"> <i class="material-icons opacity-1">delete</i> Delete </li>
                  </ul>
                </span>
                    </div>
                    <div class="item-folder rounded-lg text-white flex justify-between px-2 py-3 mb-2 bg-[#202940]">
                        <h4>
                            fo dsk lder-1
                        </h4>
                        <span class="relative"><a href="javascript:;" dropdown-trigger aria-expanded="false"><i
                                    class="material-icons">more_vert</i></a>
                  <ul dropdown-menu
                      class="text-sm transform-dropdown bg-[#1a2035] before:font-awesome before:leading-default before:duration-350 before:ease
                         shadow-lg shadow-slate-900 duration-250 px-5 before:sm:right-1 before:text-5.5 pointer-events-none absolute right-1 top-8 z-10 lg:top-6
                         origin-top list-none rounded-lg  bg-clip-padding text-white z-10
                         px-2 py-4 text-left text-slate-500 opacity-0 transition-all before:absolute before:right-0 before:left-auto before:top-0 before:z-10
                         before:inline-block before:font-normal before:text-[#1a2035] before:antialiased before:transition-all before:text-xl before:content-['▲'] sm:-mr-6                         lg:absolute lg:right-6 lg:left-auto lg:mt-2 lg:block lg:cursor-pointer">
                    <!-- add show class on dropdown open js -->
                    <li class="relative w-max"> <i class="material-icons opacity-1">edit_square</i> Edit File </li>
                    <li class="relative my-3"> <i class="material-icons opacity-1">content_copy</i> Clone </li>
                    <li class="relative"> <i class="material-icons opacity-1">delete</i> Delete </li>
                  </ul>
                </span>
                    </div>
                    <div class="item-folder rounded-lg text-white flex justify-between px-2 py-3 mb-2 bg-[#202940]">
                        <h4>
                            fold djk er-1
                        </h4>
                        <span class="relative"><a href="javascript:;" dropdown-trigger aria-expanded="false"><i
                                    class="material-icons">more_vert</i></a>
                  <ul dropdown-menu
                      class="text-sm transform-dropdown bg-[#1a2035] before:font-awesome before:leading-default before:duration-350 before:ease
                         shadow-lg shadow-slate-900 duration-250 px-5 before:sm:right-1 before:text-5.5 pointer-events-none absolute right-1 top-8 z-10 lg:top-6
                         origin-top list-none rounded-lg  bg-clip-padding text-white z-10
                         px-2 py-4 text-left text-slate-500 opacity-0 transition-all before:absolute before:right-0 before:left-auto before:top-0 before:z-10
                         before:inline-block before:font-normal before:text-[#1a2035] before:antialiased before:transition-all before:text-xl before:content-['▲'] sm:-mr-6                         lg:absolute lg:right-6 lg:left-auto lg:mt-2 lg:block lg:cursor-pointer">
                    <!-- add show class on dropdown open js -->
                    <li class="relative w-max"> <i class="material-icons opacity-1">edit_square</i> Edit File </li>
                    <li class="relative my-3"> <i class="material-icons opacity-1">content_copy</i> Clone </li>
                    <li class="relative"> <i class="material-icons opacity-1">delete</i> Delete </li>
                  </ul>
                </span>
                    </div>
                    <div class="item-folder rounded-lg text-white flex justify-between px-2 py-3 mb-2 bg-[#202940]">
                        <h4>
                            folder-1
                        </h4>
                        <span class="relative"><a href="javascript:;" dropdown-trigger aria-expanded="false"><i
                                    class="material-icons">more_vert</i></a>
                  <ul dropdown-menu
                      class="text-sm transform-dropdown bg-[#1a2035] before:font-awesome before:leading-default before:duration-350 before:ease
                         shadow-lg shadow-slate-900 duration-250 px-5 before:sm:right-1 before:text-5.5 pointer-events-none absolute right-1 top-8 z-10 lg:top-6
                         origin-top list-none rounded-lg  bg-clip-padding text-white z-10
                         px-2 py-4 text-left text-slate-500 opacity-0 transition-all before:absolute before:right-0 before:left-auto before:top-0 before:z-10
                         before:inline-block before:font-normal before:text-[#1a2035] before:antialiased before:transition-all before:text-xl before:content-['▲'] sm:-mr-6                         lg:absolute lg:right-6 lg:left-auto lg:mt-2 lg:block lg:cursor-pointer">
                    <!-- add show class on dropdown open js -->
                    <li class="relative w-max"> <i class="material-icons opacity-1">edit_square</i> Edit File </li>
                    <li class="relative my-3"> <i class="material-icons opacity-1">content_copy</i> Clone </li>
                    <li class="relative"> <i class="material-icons opacity-1">delete</i> Delete </li>
                  </ul>
                </span>
                    </div>
                    <div class="item-folder rounded-lg text-white flex justify-between px-2 py-3 mb-2 bg-[#202940]">
                        <h4>
                            folder-1
                        </h4>
                        <span class="relative"><a href="javascript:;" dropdown-trigger aria-expanded="false"><i
                                    class="material-icons">more_vert</i></a>
                  <ul dropdown-menu
                      class="text-sm transform-dropdown bg-[#1a2035] before:font-awesome before:leading-default before:duration-350 before:ease
                         shadow-lg shadow-slate-900 duration-250 px-5 before:sm:right-1 before:text-5.5 pointer-events-none absolute right-1 top-8 z-10 lg:top-6
                         origin-top list-none rounded-lg  bg-clip-padding text-white z-10
                         px-2 py-4 text-left text-slate-500 opacity-0 transition-all before:absolute before:right-0 before:left-auto before:top-0 before:z-10
                         before:inline-block before:font-normal before:text-[#1a2035] before:antialiased before:transition-all before:text-xl before:content-['▲'] sm:-mr-6                         lg:absolute lg:right-6 lg:left-auto lg:mt-2 lg:block lg:cursor-pointer">
                    <!-- add show class on dropdown open js -->
                    <li class="relative w-max"> <i class="material-icons opacity-1">edit_square</i> Edit File </li>
                    <li class="relative my-3"> <i class="material-icons opacity-1">content_copy</i> Clone </li>
                    <li class="relative"> <i class="material-icons opacity-1">delete</i> Delete </li>
                  </ul>
                </span>
                    </div>
                    <div class="item-folder rounded-lg text-white flex justify-between px-2 py-3 mb-2 bg-[#202940]">
                        <h4>
                            folder-1
                        </h4>
                        <span class="relative"><a href="javascript:;" dropdown-trigger aria-expanded="false"><i
                                    class="material-icons">more_vert</i></a>
                  <ul dropdown-menu
                      class="text-sm transform-dropdown bg-[#1a2035] before:font-awesome before:leading-default before:duration-350 before:ease
                         shadow-lg shadow-slate-900 duration-250 px-5 before:sm:right-1 before:text-5.5 pointer-events-none absolute right-1 top-8 z-10 lg:top-6
                         origin-top list-none rounded-lg  bg-clip-padding text-white z-10
                         px-2 py-4 text-left text-slate-500 opacity-0 transition-all before:absolute before:right-0 before:left-auto before:top-0 before:z-10
                         before:inline-block before:font-normal before:text-[#1a2035] before:antialiased before:transition-all before:text-xl before:content-['▲'] sm:-mr-6                         lg:absolute lg:right-6 lg:left-auto lg:mt-2 lg:block lg:cursor-pointer">
                    <!-- add show class on dropdown open js -->
                    <li class="relative w-max"> <i class="material-icons opacity-1">edit_square</i> Edit File </li>
                    <li class="relative my-3"> <i class="material-icons opacity-1">content_copy</i> Clone </li>
                    <li class="relative"> <i class="material-icons opacity-1">delete</i> Delete </li>
                  </ul>
                </span>
                    </div>
                    <div class="item-folder rounded-lg text-white flex justify-between px-2 py-3 mb-2 bg-[#202940]">
                        <h4>
                            folder-1
                        </h4>
                        <span class="relative"><a href="javascript:;" dropdown-trigger aria-expanded="false"><i
                                    class="material-icons">more_vert</i></a>
                  <ul dropdown-menu
                      class="text-sm transform-dropdown bg-[#1a2035] before:font-awesome before:leading-default before:duration-350 before:ease
                         shadow-lg shadow-slate-900 duration-250 px-5 before:sm:right-1 before:text-5.5 pointer-events-none absolute right-1 top-8 z-10 lg:top-6
                         origin-top list-none rounded-lg  bg-clip-padding text-white z-10
                         px-2 py-4 text-left text-slate-500 opacity-0 transition-all before:absolute before:right-0 before:left-auto before:top-0 before:z-10
                         before:inline-block before:font-normal before:text-[#1a2035] before:antialiased before:transition-all before:text-xl before:content-['▲'] sm:-mr-6                         lg:absolute lg:right-6 lg:left-auto lg:mt-2 lg:block lg:cursor-pointer">
                    <!-- add show class on dropdown open js -->
                    <li class="relative w-max"> <i class="material-icons opacity-1">edit_square</i> Edit File </li>
                    <li class="relative my-3"> <i class="material-icons opacity-1">content_copy</i> Clone </li>
                    <li class="relative"> <i class="material-icons opacity-1">delete</i> Delete </li>
                  </ul>
                </span>
                    </div>
                    <div class="item-folder rounded-lg text-white flex justify-between px-2 py-3 mb-2 bg-[#202940]">
                        <h4>
                            folder-1
                        </h4>
                        <span class="relative"><a href="javascript:;" dropdown-trigger aria-expanded="false"><i
                                    class="material-icons">more_vert</i></a>
                  <ul dropdown-menu
                      class="text-sm transform-dropdown bg-[#1a2035] before:font-awesome before:leading-default before:duration-350 before:ease
                         shadow-lg shadow-slate-900 duration-250 px-5 before:sm:right-1 before:text-5.5 pointer-events-none absolute right-1 top-8 z-10 lg:top-6
                         origin-top list-none rounded-lg  bg-clip-padding text-white z-10
                         px-2 py-4 text-left text-slate-500 opacity-0 transition-all before:absolute before:right-0 before:left-auto before:top-0 before:z-10
                         before:inline-block before:font-normal before:text-[#1a2035] before:antialiased before:transition-all before:text-xl before:content-['▲'] sm:-mr-6                         lg:absolute lg:right-6 lg:left-auto lg:mt-2 lg:block lg:cursor-pointer">
                    <!-- add show class on dropdown open js -->
                    <li class="relative w-max"> <i class="material-icons opacity-1">edit_square</i> Edit File </li>
                    <li class="relative my-3"> <i class="material-icons opacity-1">content_copy</i> Clone </li>
                    <li class="relative"> <i class="material-icons opacity-1">delete</i> Delete </li>
                  </ul>
                </span>
                    </div>
                    <div class="item-folder rounded-lg text-white flex justify-between px-2 py-3 mb-2 bg-[#202940]">
                        <h4>
                            folder-1
                        </h4>
                        <span class="relative"><a href="javascript:;" dropdown-trigger aria-expanded="false"><i
                                    class="material-icons">more_vert</i></a>
                  <ul dropdown-menu
                      class="text-sm transform-dropdown bg-[#1a2035] before:font-awesome before:leading-default before:duration-350 before:ease
                         shadow-lg shadow-slate-900 duration-250 px-5 before:sm:right-1 before:text-5.5 pointer-events-none absolute right-1 top-8 z-10 lg:top-6
                         origin-top list-none rounded-lg  bg-clip-padding text-white z-10
                         px-2 py-4 text-left text-slate-500 opacity-0 transition-all before:absolute before:right-0 before:left-auto before:top-0 before:z-10
                         before:inline-block before:font-normal before:text-[#1a2035] before:antialiased before:transition-all before:text-xl before:content-['▲'] sm:-mr-6                         lg:absolute lg:right-6 lg:left-auto lg:mt-2 lg:block lg:cursor-pointer">
                    <!-- add show class on dropdown open js -->
                    <li class="relative w-max"> <i class="material-icons opacity-1">edit_square</i> Edit File </li>
                    <li class="relative my-3"> <i class="material-icons opacity-1">content_copy</i> Clone </li>
                    <li class="relative"> <i class="material-icons opacity-1">delete</i> Delete </li>
                  </ul>
                </span>
                    </div>
                    <div class="item-folder rounded-lg text-white flex justify-between px-2 py-3 mb-2 bg-[#202940]">
                        <h4>
                            folder-1
                        </h4>
                        <span class="relative"><a href="javascript:;" dropdown-trigger aria-expanded="false"><i
                                    class="material-icons">more_vert</i></a>
                  <ul dropdown-menu
                      class="text-sm transform-dropdown bg-[#1a2035] before:font-awesome before:leading-default before:duration-350 before:ease
                         shadow-lg shadow-slate-900 duration-250 px-5 before:sm:right-1 before:text-5.5 pointer-events-none absolute right-1 top-8 z-10 lg:top-6
                         origin-top list-none rounded-lg  bg-clip-padding text-white z-10
                         px-2 py-4 text-left text-slate-500 opacity-0 transition-all before:absolute before:right-0 before:left-auto before:top-0 before:z-10
                         before:inline-block before:font-normal before:text-[#1a2035] before:antialiased before:transition-all before:text-xl before:content-['▲'] sm:-mr-6                         lg:absolute lg:right-6 lg:left-auto lg:mt-2 lg:block lg:cursor-pointer">
                    <!-- add show class on dropdown open js -->
                    <li class="relative w-max"> <i class="material-icons opacity-1">edit_square</i> Edit File </li>
                    <li class="relative my-3"> <i class="material-icons opacity-1">content_copy</i> Clone </li>
                    <li class="relative"> <i class="material-icons opacity-1">delete</i> Delete </li>
                  </ul>
                </span>
                    </div>
                    <div class="item-folder rounded-lg text-white flex justify-between px-2 py-3 mb-2 bg-[#202940]">
                        <h4>
                            folder-1
                        </h4>
                        <span class="relative"><a href="javascript:;" dropdown-trigger aria-expanded="false"><i
                                    class="material-icons">more_vert</i></a>
                  <ul dropdown-menu
                      class="text-sm transform-dropdown bg-[#1a2035] before:font-awesome before:leading-default before:duration-350 before:ease
                         shadow-lg shadow-slate-900 duration-250 px-5 before:sm:right-1 before:text-5.5 pointer-events-none absolute right-1 top-8 z-10 lg:top-6
                         origin-top list-none rounded-lg  bg-clip-padding text-white z-10
                         px-2 py-4 text-left text-slate-500 opacity-0 transition-all before:absolute before:right-0 before:left-auto before:top-0 before:z-10
                         before:inline-block before:font-normal before:text-[#1a2035] before:antialiased before:transition-all before:text-xl before:content-['▲'] sm:-mr-6                         lg:absolute lg:right-6 lg:left-auto lg:mt-2 lg:block lg:cursor-pointer">
                    <!-- add show class on dropdown open js -->
                    <li class="relative w-max"> <i class="material-icons opacity-1">edit_square</i> Edit File </li>
                    <li class="relative my-3"> <i class="material-icons opacity-1">content_copy</i> Clone </li>
                    <li class="relative"> <i class="material-icons opacity-1">delete</i> Delete </li>
                  </ul>
                </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
