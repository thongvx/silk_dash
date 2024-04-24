<div class="px-0 pt-0 overflow-auto max-h-[calc(100vh-20em)] ">
    <table id="live-table" datatable data-page-size="10" data-column-table="{{ $column }}"
           data-column-direction="{{ $direction }}"
           class="text-sm border-separate table-auto overflow-y-clip w-full min-w-max text-white text-left !border-t-0">
        <thead class="sticky top-0 z-10">
        <tr class="bg-[#142132] transition-colors text-md">
            <th class="flex justify-center item-center py-2">
                <input type="checkbox" class="w-4 h-4 ease rounded-md checked:bg-gradient-to-tl checked:from-blue-500 checked:to-violet-500 after:text-xxs after:material-symbols-outlined
                                                  after:duration-250 after:ease-in-out duration-250 relative float-left mt-1 cursor-pointer appearance-none border
                                                  border-solid border-slate-200 bg-white bg-contain bg-center bg-no-repeat align-top transition-all after:absolute after:flex after:h-full
                                                  after:w-full after:items-center after:justify-center after:text-white after:opacity-0 after:transition-all after:content-['✓']
                                                  checked:border-0 checked:border-transparent checked:bg-transparent checked:after:opacity-100"
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
            <th class="text-center">
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
        @foreach($videos as $index => $video)
            @if($videos->count() == 0 || $videos->count() == null)
                <tr class="my-3 h-12 bg-[#142132]">
                    <td class="flex items" colspan="9">No data available in table</td>
                </tr>
            @endif
            <tr class="my-3 h-12 {{ $index % 2 == 0 ? '' : 'bg-[#142132]' }}">
                <td class="flex items-center justify-center h-[inherit] px-2">
                    <input type="checkbox"
                           class="checkbox w-4 h-4 ease rounded-md checked:bg-gradient-to-tl checked:from-blue-500 checked:to-violet-500 after:text-xxs after:material-symbols-outlined                                                   after:duration-250 after:ease-in-out duration-250 relative float-left mt-1 cursor-pointer appearance-none border                                                    border-solid border-slate-200 bg-white bg-contain bg-center bg-no-repeat align-top transition-all after:absolute after:flex after:h-full                                                    after:w-full after:items-center after:justify-center after:text-white after:opacity-0 after:transition-all after:content-['✓']                                                    checked:border-0 checked:border-transparent checked:bg-transparent checked:after:opacity-100">
                </td>
                <td class="pl-2 w-96">{{ $video->title }}</td>
                <td class="text-center px-2">{{ $video->id }}</td>
                <td>
                    <img class="h-10 px-2" src="{{ $video->poster }}">
                </td>
                <td class="text-center w-max">{{ $video->size }}</td>
                <td class="text-center w-max">{{ $video->total_play }}</td>
                <td class="pl-2 w-24">{{ $video->created_at }}</td>
                <td class="text-center w-max">{{ $video->is_sub }}</td>
                <td class="relative">
                    <li class="list-none">
                        <a
                            href="javascript:" dropdown-trigger
                            aria-expanded="false"><i class="material-symbols-outlined">more_vert</i></a>
                        <ul dropdown-menu
                            class="text-sm transform-dropdown bg-[#1a2035] before:font-awesome before:leading-default before:duration-350 before:ease
                                         shadow-lg shadow-slate-900 duration-250 px-5 before:sm:right-3 before:text-lg pointer-events-none absolute right-1 top-12 lg:top-12
                                         origin-top list-none rounded-lg  bg-clip-padding text-white z-10
                                         px-2 py-4 text-left opacity-0 transition-all before:absolute before:right-0 before:left-auto before:top-0 before:z-10
                                         before:inline-block before:font-normal before:text-[#1a2035] before:antialiased before:transition-all before:text-xl before:content-['▲'] sm:-mr-6                         lg:absolute lg:right-6 lg:left-auto lg:mt-2 lg:block lg:cursor-pointer">
                            <li class="relative w-max btn-edit"><i
                                    class="material-symbols-outlined opacity-1">edit_square</i>
                                Edit File
                            </li>
                            <li class="relative my-3"><i
                                    class="material-symbols-outlined opacity-1">content_copy</i>
                                Clone
                            </li>
                            <li class="relative"><i
                                    class="material-symbols-outlined opacity-1">delete</i>
                                Delete
                            </li>
                        </ul>
                    </li>
                </td>
            </tr>
        @endforeach
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
            <li class="page list-none page-item" data-page="{{ $videos->currentPage() -1 }}">
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
                <li class="list-none page-item disabled px-2"><span class="page-link">...</span></li>
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
                <li class="list-none page-item disabled px-2"><span class="page-link">...</span></li>
            @endif
            <li class="page list-none page-item" data-page="{{ $videos->lastPage() }}">
                <a class="hover:bg-[#009FB2] text-white mx-1 py-2 px-3 w-max rounded-lg bg-[#142132]"
                   href="javascript:void(0)">{{ $videos->lastPage() }}</a>
            </li>
        @endif

        {{-- Next Page Link --}}
        @if ($videos->hasMorePages())
            <li class="page list-none page-item" data-page="{{ $videos->currentPage() +1 }}">
                <a class="hover:bg-[#009FB2] py-2 px-4 w-max rounded-lg bg-[#142132]"
                   href="javascript:void(0)" rel="next">Next</a>
            </li>
        @else
            <span class="text-white opacity-50 py-2 px-3 w-max rounded-lg cursor-not-allowed bg-[#142132]">Next</span>
        @endif
    </div>
</div>
