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
                                    <div class="mb-2" id='title'>
                                        <h5 class="items-center text-transparent flex bg-clip-text bg-gradient-to-r from-purple-500 to-pink-500">
                                            <i class="material-symbols-outlined">folder</i>
                                            <i class="material-symbols-outlined">navigate_next</i>
                                            <span id="currentFolderName"></span>
                                        </h5>
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
                                                    class="rounded-lg flex items-center px-1.5 {{ request() -> get('poster') ? 'bg-[#009FB2]' : 'bg-[#142132]' }}"
                                                    title="poster" btn-poster>
                                                {!!
                                                    request() -> get('poster')
                                                    ? '<i class="material-symbols-outlined opacity-1 text-xl mr-1">visibility_off</i>hide poster'
                                                    : '<i class="material-symbols-outlined opacity-1 text-xl mr-1">visibility</i>show poster'
                                                !!}
                                            </button>
                                            <button type="button" btn-video disabled class="cursor-not-allowed px-2"
                                                    title="delete">
                                                <i btn-delete class="material-symbols-outlined opacity-1 text-3xl">delete</i>
                                            </button>
                                            <button type="button" btn-video disabled class="cursor-not-allowed px-2"
                                                    title="export">
                                                <i btn-export
                                                   class="material-symbols-outlined opacity-1 text-3xl">ios_share</i>
                                            </button>
                                            <button type="button" btn-video disabled class="cursor-not-allowed px-2"
                                                    title="folder">
                                                <i btn-move
                                                   class="material-symbols-outlined opacity-1 text-3xl">folder_open</i>
                                            </button>
                                        </div>
                                    </div>
                                    <div id="live"
                                         class="tab-content flex flex-col bg-clip-border rounded-xl text-gray-700 bg-transparent">
                                        <div class="px-0 pt-0 overflow-auto max-h-[calc(100vh-20em)] ">
                                            <table id="datatable" datatable data-page-size="10"
                                                   data-column-table="{{ $column }}"
                                                   data-column-direction="{{ $direction }}"
                                                   class="text-sm border-separate table-auto overflow-y-clip w-full min-w-max text-white text-left !border-t-0">
                                                <thead class="sticky top-0 z-10">
                                                <tr class="bg-[#142132] transition-colors text-md">
                                                    <th class="flex justify-center item-center py-2">
                                                        <input type="checkbox" class="checkbox w-4 h-4 ease rounded-md checked:bg-gradient-to-tl checked:from-blue-500 checked:to-violet-500 after:text-xxs after:material-symbols-outlined
                                                      after:duration-250 after:ease-in-out duration-250 relative float-left mt-1 cursor-pointer appearance-none border
                                                      border-solid border-slate-200 bg-white bg-contain bg-center bg-no-repeat align-top transition-all after:absolute after:flex after:h-full
                                                      after:w-full after:items-center after:justify-center after:text-white after:opacity-0 after:transition-all after:content-['✓']
                                                      checked:border-0 checked:border-transparent checked:bg-transparent checked:after:opacity-100"
                                                               checked-All>
                                                    </th>
                                                    <th data-column="title"
                                                        class='pl-2 sortable-column cursor-pointer relative' aria-sort>
                    <span class="text-xs sort-icon absolute opacity-50 bottom-[45%] right-2 asc"
                          data-direction="asc">▲</span>
                                                        <a href="javascript:void(0)">Filename</a>
                                                        <span class="text-xs sort-icon absolute opacity-50 top-[45%] right-2 desc"
                                                              data-direction="desc">▼</span>
                                                    </th>
                                                    <th class="text-center">
                                                        ID
                                                    </th>
                                                    <th class="text-center" poster>
                                                        Poster
                                                    </th>
                                                    <th data-column="size"
                                                        class='pl-2 pr-6 sortable-column cursor-pointer relative'
                                                        aria-sort>
                    <span class="text-xs sort-icon absolute opacity-50 bottom-[45%] right-2 asc"
                          data-direction="asc">▲</span>
                                                        <a href="javascript:void(0)">Filesize</a>
                                                        <span class="text-xs sort-icon absolute opacity-50 top-[45%] right-2 desc"
                                                              data-direction="desc">▼</span>
                                                    </th>
                                                    <th data-column="total_play"
                                                        class='pl-2 sortable-column pr-6 cursor-pointer relative'
                                                        aria-sort>
                    <span class="text-xs sort-icon absolute opacity-50 bottom-[45%] right-2 asc"
                          data-direction="asc">▲</span>
                                                        <a href="javascript:void(0)">Views</a>
                                                        <span class="text-xs sort-icon absolute opacity-50 top-[45%] right-2 desc"
                                                              data-direction="desc">▼</span>
                                                    </th>
                                                    <th data-column="created_at"
                                                        class='pl-2 sortable-column cursor-pointer relative' aria-sort>
                    <span class="text-xs sort-icon absolute opacity-50 bottom-[45%] right-2 asc"
                          data-direction="asc">▲</span>
                                                        <a href="javascript:void(0)">Uploaded</a>
                                                        <span class="text-xs sort-icon absolute opacity-50 top-[45%] right-2 desc"
                                                              data-direction="desc">▼</span>
                                                    </th>
                                                    <th class="px-1 text-center">
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
                                                @if($videos->count() == 0)
                                                    <tr class="my-3 h-12 bg-[#142132]">
                                                        <td class="text-center" colspan="9">No data available in table
                                                        </td>
                                                    </tr>
                                                @else
                                                    @foreach($videos as $index => $video)
                                                        <tr class="my-3 h-12 {{ $index % 2 == 0 ? '' : 'bg-[#142132]' }}"
                                                            data-videoid="{{ $video->id }}">
                                                            <td class="flex items-center justify-center h-[inherit] px-2">
                                                                <input type="checkbox"
                                                                       class="checkbox w-4 h-4 ease rounded-md checked:bg-gradient-to-tl checked:from-blue-500 checked:to-violet-500 after:text-xxs after:material-symbols-outlined                                                   after:duration-250 after:ease-in-out duration-250 relative float-left mt-1 cursor-pointer appearance-none border                                                    border-solid border-slate-200 bg-white bg-contain bg-center bg-no-repeat align-top transition-all after:absolute after:flex after:h-full                                                    after:w-full after:items-center after:justify-center after:text-white after:opacity-0 after:transition-all after:content-['✓']                                                    checked:border-0 checked:border-transparent checked:bg-transparent checked:after:opacity-100">
                                                            </td>
                                                            <td class="pl-2 w-[25rem] video-title">
                                                                <a href="{{$video -> slug }}">{{ $video->title }}</a>
                                                            </td>
                                                            <td class="text-center px-2 videoID">{{ $video->slug }}</td>
                                                            <td class="{{request()->get('poster') ? '' : 'hidden'}} flex justify-center items-center"
                                                                poster>
                                                                <img class="h-10 my-2 px-2" src="{{ $video->poster }}"
                                                                     alt="" loading="lazy">
                                                            </td>
                                                            <td class="text-center w-max">{{ $video->size }}</td>
                                                            <td class="text-center w-max">{{ $video->total_play }}</td>
                                                            <td class="pl-2 w-24">{{ $video->created_at }}</td>
                                                            <td class="text-center w-max">{{ $video->is_sub }}</td>
                                                            <td class="relative">
                                                                <li class="list-none">
                                                                    <a
                                                                            href="javascript:" dropdown-trigger
                                                                            aria-expanded="false"><i
                                                                                class="material-symbols-outlined">more_vert</i></a>
                                                                    <ul dropdown-menu
                                                                        class="text-sm transform-dropdown bg-slate-900 before:font-awesome before:leading-default before:duration-350 before:ease
                                             shadow-lg shadow-slate-900 duration-250 px-5 before:sm:right-3 before:text-lg pointer-events-none absolute right-1 top-12 lg:top-12
                                             origin-top list-none rounded-lg  bg-clip-padding text-white z-10
                                             px-2 py-4 text-left opacity-0 transition-all before:absolute before:right-0 before:left-auto before:top-0 before:z-10
                                             before:inline-block before:font-normal before:text-[#1a2035] before:antialiased before:transition-all before:text-xl before:content-['▲'] sm:-mr-6                         lg:absolute lg:right-6 lg:left-auto lg:mt-2 lg:block lg:cursor-pointer">
                                                                        <li class="relative w-max btn-edit hover:text-[#009FB2] items-center flex">
                                                                            <i
                                                                                    class="material-symbols-outlined opacity-1 mr-2">edit_square</i>
                                                                            Edit File
                                                                        </li>
                                                                        <li class="relative my-3 hover:text-[#009FB2] items-center flex">
                                                                            <i
                                                                                    class="material-symbols-outlined opacity-1 mr-2">content_copy</i>
                                                                            Clone
                                                                        </li>
                                                                        <li class="relative btn-delete hover:text-[#009FB2] items-center flex">
                                                                            <i
                                                                                    class="material-symbols-outlined opacity-1 mr-2">delete</i>
                                                                            Delete
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @endif
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="button-table pt-4 text-white text-sm flex justify-between items-center">
                                            <div class="dataTables_info bg-[#142132] rounded-lg">
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
                                                    <span
                                                            class="text-white opacity-50 py-2 px-3 w-max rounded-lg cursor-not-allowed bg-[#142132]">Previous</span>
                                                @else
                                                    <li class="page list-none page-item"
                                                        data-page="{{ $videos->currentPage() -1 }}">
                                                        <a class="hover:bg-[#009FB2] py-2 px-4 w-max rounded-lg bg-[#142132]"
                                                           href="javascript:void(0)" rel="prev">Previous</a>
                                                    </li>
                                                @endif


                                                {{-- Pagination Elements --}}
                                                @if ($videos->currentPage() > 2)
                                                    <li class="page list-none " data-page="1">
                                                        <a class="hover:bg-[#009FB2] text-white mx-1 py-2 px-3 w-max rounded-lg bg-[#142132]"
                                                           href="javascript:void(0)">1</a>
                                                    </li>
                                                    @if ($videos->currentPage() > 3)
                                                        <li class="list-none page-item disabled px-2"><span
                                                                    class="page-link">...</span></li>
                                                    @endif
                                                @endif

                                                @for ($i = max(1, $videos->currentPage() - 1); $i <= min($videos->lastPage(), $videos->currentPage() + 1); $i++)
                                                    <li class="page list-none page-item" data-page="{{ $i }}">
                                                        <a class="text-white mx-1 py-2 px-3 w-max rounded-lg {{ ($videos->currentPage() == $i) ? 'bg-[#009FB2] cursor-not-allowed ' : 'bg-[#142132] hover:bg-[#009FB2]' }}"
                                                           href="javascript:void(0)">{{ $i }}</a>
                                                    </li>
                                                @endfor

                                                @if ($videos->currentPage() < $videos->lastPage() - 1)
                                                    @if ($videos->currentPage() < $videos->lastPage() - 2)
                                                        <li class="list-none page-item disabled px-2"><span
                                                                    class="page-link">...</span></li>
                                                    @endif
                                                    <li class="page list-none page-item"
                                                        data-page="{{ $videos->lastPage() }}">
                                                        <a class="hover:bg-[#009FB2] text-white mx-1 py-2 px-3 w-max rounded-lg bg-[#142132]"
                                                           href="javascript:void(0)">{{ $videos->lastPage() }}</a>
                                                    </li>
                                                @endif

                                                {{-- Next Page Link --}}
                                                @if ($videos->hasMorePages())
                                                    <li class="page list-none page-item"
                                                        data-page="{{ $videos->currentPage() +1 }}">
                                                        <a class="hover:bg-[#009FB2] py-2 px-4 w-max rounded-lg bg-[#142132]"
                                                           href="javascript:void(0)" rel="next">Next</a>
                                                    </li>
                                                @else
                                                    <span class="text-white opacity-50 py-2 px-3 w-max rounded-lg cursor-not-allowed bg-[#142132]">Next</span>
                                                @endif
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
    @include('dashboard.video.fixed-video')
@endsection
