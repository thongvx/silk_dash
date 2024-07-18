<div class="px-0 pt-0 overflow-auto max-h-[calc(100vh-20em)] lg:max-h-[calc(100vh-25em)] xl:max-h-[calc(100vh-20em)] ">
    <table id="datatable" datatable data-page-size="10" data-column-table="{{ $column }}"
           data-column-direction="{{ $direction }}"
           class=" text-sm border-separate table-auto overflow-y-clip w-full min-w-max text-white text-left !border-t-0 ">
        <thead class="sticky top-0 z-10">
            <tr class="bg-[#142132] transition-colors text-md">
                <th class="flex justify-center item-center py-2">
                    <input type="checkbox" class="checkbox w-4 h-4 ease rounded-md checked:bg-[#009FB2] after:text-xxs after:material-symbols-outlined
                                  after:duration-250 after:ease-in-out duration-250 relative float-left mt-1 cursor-pointer appearance-none border
                                  border-solid border-slate-200 bg-white bg-contain bg-center bg-no-repeat align-top transition-all
                                  after:absolute after:flex after:h-full after:w-full after:items-center after:justify-center
                                  after:text-white after:opacity-0 after:transition-all after:content-['✓'] checked:border-0
                                  checked:border-transparent checked:after:opacity-100"
                           checked-All>
                </th>
                <th data-column="title" class='pl-2 sortable-column cursor-pointer relative' aria-sort>
                    <span class="text-xs sort-icon absolute opacity-50 bottom-[45%] right-2 asc"
                          data-direction="asc">▲</span>
                    <a href="javascript:void(0)">Filename</a>
                    <span class="text-xs sort-icon absolute opacity-50 top-[45%] right-2 desc"
                          data-direction="desc">▼</span>
                </th>
                <th class="text-center">
                    ID
                </th>
                <th class="text-center {{request()->get('poster') == 'show' ? '' : 'hidden'}}" poster>
                    Poster
                </th>
                <th data-column="size" class='pl-2 pr-6 sortable-column cursor-pointer relative' aria-sort>
                    <span class="text-xs sort-icon absolute opacity-50 bottom-[45%] right-2 asc"
                          data-direction="asc">▲</span>
                    <a href="javascript:void(0)">Filesize</a>
                    <span class="text-xs sort-icon absolute opacity-50 top-[45%] right-2 desc"
                          data-direction="desc">▼</span>
                </th>
                <th data-column="total_play" class='pl-2 sortable-column pr-6 cursor-pointer relative' aria-sort>
                    <span class="text-xs sort-icon absolute opacity-50 bottom-[45%] right-2 asc"
                          data-direction="asc">▲</span>
                    <a href="javascript:void(0)">Views</a>
                    <span class="text-xs sort-icon absolute opacity-50 top-[45%] right-2 desc"
                          data-direction="desc">▼</span>
                </th>
                <th data-column="created_at" class='pl-2 sortable-column cursor-pointer relative' aria-sort>
                    <span class="text-xs sort-icon absolute opacity-50 bottom-[45%] right-2 asc"
                          data-direction="asc">▲</span>
                    <a href="javascript:void(0)">Uploaded</a>
                    <span class="text-xs sort-icon absolute opacity-50 top-[45%] right-2 desc"
                          data-direction="desc">▼</span>
                </th>
                <th data-column="updated_at" class='pl-2 sortable-column cursor-pointer relative' aria-sort>
                    <span class="text-xs sort-icon absolute opacity-50 bottom-[45%] right-2 asc"
                          data-direction="asc">▲</span>
                    <a href="javascript:void(0)">Last Play</a>
                    <span class="text-xs sort-icon absolute opacity-50 top-[45%] right-2 desc"
                          data-direction="desc">▼</span>
                </th>
                <th class="px-1 text-center">
                </th>
            </tr>
        </thead>
        <tbody>
        @forelse($videos as $index => $video)
            <tr class="my-3 h-12 odd:bg-transparent even:bg-[#142132]" id="{{ $video->id }}" data-videoid="{{ $video->slug }}">
                <td class="flex items-center justify-center h-[inherit] px-2">
                    <input type="checkbox"
                           class="checkbox w-4 h-4 ease rounded-md checked:bg-[#009FB2] after:text-xxs after:material-symbols-outlined
                                  after:duration-250 after:ease-in-out duration-250 relative float-left mt-1 cursor-pointer appearance-none border
                                  border-solid border-slate-200 bg-white bg-contain bg-center bg-no-repeat align-top transition-all
                                  after:absolute after:flex after:h-full after:w-full after:items-center after:justify-center
                                  after:text-white after:opacity-0 after:transition-all after:content-['✓'] checked:border-0
                                  checked:border-transparent checked:after:opacity-100">
                </td>
                <td class="px-2 max-w-[15rem] video-title">
                    <div class=" truncate hover:text-clip">
                        <a href="{{route('vPlay', $video->slug)}}" title="{{ $video->title }}" target="_black" class="hover:text-[#009FB2] ">{{ $video->title }}</a>
                    </div>
                </td>
                <td class="text-center px-2 videoID">{{ $video->slug }}</td>
                <td class="{{request()->get('poster') == 'show' ? '' : 'hidden'}} flex justify-center items-center" poster>
                    <img class="h-10 my-2 px-2" src="{{ $video->poster }}" alt="" loading="lazy">
                </td>
                <td class="text-center w-max">{{ $video->size }}</td>
                <td class="text-center w-max">{{ $video->total_play }}</td>
                <td class="pl-2 w-24">{{ $video->created_at }}</td>
                <td class="pl-2 w-24">{{ $video->total_play != 0 ? $video->updated_at : 0 }}</td>
                <td class="relative {{ request()->get('tab') != 'removed' ? '' : 'hidden' }}">
                    <li class="list-none">
                        <a
                            href="javascript:" dropdown-trigger
                            aria-expanded="false"><i class="material-symbols-outlined">more_vert</i></a>
                        <ul dropdown-menu
                            class="text-sm transform-dropdown bg-[#009FB2] before:font-awesome before:leading-default before:duration-350 before:ease
                                             duration-250 before:sm:right-3 before:text-lg after:text-lg pointer-events-none absolute right-0
                                             origin-top list-none rounded-lg  bg-clip-padding text-white z-30 sm:-mr-6
                                             {{ $loop->count>4 && $loop->last || $loop->iteration === $loop->count - 1  ? " bottom-12 lg:bottom-12 after:-bottom-5 after:content-['▼']": " top-12 lg:top-10 before:-top-5  before:content-['▲']"}}
                                             px-2 py-4 text-left opacity-0 transition-all before:absolute after:absolute before:right-3 after:right-3.5 before:left-auto before:z-10
                                             before:font-normal before:text-[#009FB2] after:text-[#009FB2] before:antialiased before:transition-all
                                             lg:absolute lg:right-6 lg:left-auto lg:mt-2 lg:block lg:cursor-pointer">
                            <li class="relative w-max btn-edit hover:text-[#142132] items-center flex"><i
                                    class="material-symbols-outlined opacity-1 mr-2">edit_square</i>
                                <a href="{{ Route('video.editVideo', $video->slug) }}">Edit File</a>
                            </li>
                            <li class="relative btn-delete hover:text-[#142132] items-center flex mt-3"><i
                                    class="material-symbols-outlined opacity-1 mr-2">delete</i>
                                Delete
                            </li>
                        </ul>
                    </li>
                </td>
            </tr>
        @empty
            <tr class="my-3 h-12 bg-[#142132]">
                <td class="text-center" colspan="8">No data available in table</td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>
<div class="button-table pt-4 text-white text-sm flex justify-between items-center">
    <div class="dataTables_info bg-[#142132] rounded-lg hidden sm:block">
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
    <div class="pagination flex items-center pb-3 sm:pb-0">
        {{-- Previous Page Link --}}
        @if ($videos->onFirstPage())
            <span
                class="opacity-50 py-2 px-3 w-max rounded-lg cursor-not-allowed bg-[#142132]">Previous</span>
        @else
            <li class="page-datatable list-none page-item" data-page="{{ $videos->currentPage() -1 }}">
                <a class="hover:bg-[#009FB2] py-2 px-4 w-max rounded-lg bg-[#142132]"
                   href="javascript:void(0)" rel="prev">Previous</a>
            </li>
        @endif


        {{-- Pagination Elements --}}
        @if ($videos->currentPage() > 2)
            <li class="page-datatable list-none" data-page="1">
                <a class="hover:bg-[#009FB2] mx-1 py-2 px-3 w-max rounded-lg bg-[#142132]"
                   href="javascript:void(0)">1</a>
            </li>
            @if ($videos->currentPage() > 3)
                <li class="list-none page-item disabled px-2"><span class="page-link">...</span></li>
            @endif
        @endif

        @for ($i = max(1, $videos->currentPage() - 1); $i <= min($videos->lastPage(), $videos->currentPage() + 1); $i++)
            <li class="page-datatable list-none page-item" data-page="{{ $i }}">
                <a class="mx-1 py-2 px-3 w-max rounded-lg {{ ($videos->currentPage() == $i) ? 'bg-[#009FB2] cursor-not-allowed text-white' : 'bg-[#142132] hover:bg-[#009FB2]' }}"
                   href="javascript:void(0)">{{ $i }}</a>
            </li>
        @endfor

        @if ($videos->currentPage() < $videos->lastPage() - 1)
            @if ($videos->currentPage() < $videos->lastPage() - 2)
                <li class="list-none page-item disabled px-2"><span class="page-link">...</span></li>
            @endif
            <li class="page-datatable list-none page-item" data-page="{{ $videos->lastPage() }}">
                <a class="hover:bg-[#009FB2] mx-1 py-2 px-3 w-max rounded-lg bg-[#142132]"
                   href="javascript:void(0)">{{ $videos->lastPage() }}</a>
            </li>
        @endif

        {{-- Next Page Link --}}
        @if ($videos->hasMorePages())
            <li class="page-datatable list-none page-item" data-page="{{ $videos->currentPage() +1 }}">
                <a class="hover:bg-[#009FB2] py-2 px-4 w-max rounded-lg bg-[#142132]"
                   href="javascript:void(0)" rel="next">Next</a>
            </li>
        @else
            <span class="text-white opacity-50 py-2 px-3 w-max rounded-lg cursor-not-allowed bg-[#142132]">Next</span>
        @endif
    </div>
</div>
