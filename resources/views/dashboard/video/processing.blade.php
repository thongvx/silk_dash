<div class="rounded-xl">
    <div class="relative rounded-xl">
        <div class="px-2 pt-4 md:p-4">
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
            <div
                 class="tab-content flex flex-col bg-clip-border rounded-xl text-gray-700 bg-transparent">
                <div class="px-0 pt-0 overflow-auto max-h-[calc(100vh-20em)] ">
                    <table id="datatable" datatable data-page-size="10" data-column-table="{{ $column }}"
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
                            <th class="text-center" poster>
                                Quality
                            </th>
                            <th class='text-center'>
                                Filesize
                            </th>
                            <th data-column="created_at" class='pl-2 sortable-column cursor-pointer relative' aria-sort>
                    <span class="text-xs sort-icon absolute opacity-50 bottom-[45%] right-2 asc"
                          data-direction="asc">▲</span>
                                <a href="javascript:void(0)">Uploaded</a>
                                <span class="text-xs sort-icon absolute opacity-50 top-[45%] right-2 desc"
                                      data-direction="desc">▼</span>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($videos as $index => $video)
                            @php
                                $qualities = explode(',', $video->qualities);
                                $statuses = explode(',', $video->status);
                            @endphp
                            <tr class="my-3 h-12 odd:bg-transparent even:bg-[#142132]">
                                <td class="flex items-center justify-center h-[inherit] px-2">
                                    <input type="checkbox"
                                           class="checkbox w-4 h-4 ease rounded-md checked:bg-gradient-to-tl checked:from-blue-500 checked:to-violet-500 after:text-xxs after:material-symbols-outlined                                                   after:duration-250 after:ease-in-out duration-250 relative float-left mt-1 cursor-pointer appearance-none border                                                    border-solid border-slate-200 bg-white bg-contain bg-center bg-no-repeat align-top transition-all after:absolute after:flex after:h-full                                                    after:w-full after:items-center after:justify-center after:text-white after:opacity-0 after:transition-all after:content-['✓']                                                    checked:border-0 checked:border-transparent checked:bg-transparent checked:after:opacity-100">
                                </td>
                                <td class="pl-2 video-title max-w-[15rem] video-title truncate">
                                    <a href="{{$video -> slug }}" target="_black" class="hover:text-[#009FB2]">{{ $video -> title }}</a>
                                </td>
                                <td class="text-center px-2 videoID">{{ $video->slug }}</td>
                                <td class="text-center px-2">
                                    @for($i = 0; $i < 3; $i++)
                                        @php
                                            $quality = $qualities[$i] ?? null;
                                            $status = $statuses[$i] ?? null;
                                            switch ($status) {
                                                case '1':
                                                case '2':
                                                case '3':
                                                    $bgColor = 'bg-orange-500';
                                                    break;
                                                case '4':
                                                case '6':
                                                    $bgColor = 'bg-green-500';
                                                    break;
                                                case '0':
                                                    $bgColor = 'bg-slate-500';
                                                    break;
                                                default:
                                                    $bgColor = 'bg-red-500';
                                                    break;
                                            }
                                        @endphp
                                        @if($quality)
                                            <span class="rounded-lg px-2 py-1 mx-1.5 {{ $bgColor }}">{{ $quality }}</span>
                                        @endif
                                    @endfor
                                </td>
                                <td class="text-center w-max">{{ $video -> size }}</td>
                                <td class="pl-2 w-24">{{ $video -> updated_at}}</td>
                            </tr>
                        @empty
                            <tr class="my-3 h-12 bg-[#142132]">
                                <td class="text-center" colspan="9">No data available in table</td>
                            </tr>
                        @endforelse
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
                            <li class="page-datatable list-none " data-page="1">
                                <a class="hover:bg-[#009FB2] text-white mx-1 py-2 px-3 w-max rounded-lg bg-[#142132]"
                                   href="javascript:void(0)">1</a>
                            </li>
                            @if ($videos->currentPage() > 3)
                                <li class="list-none page-item disabled px-2"><span class="page-link">...</span></li>
                            @endif
                        @endif

                        @for ($i = max(1, $videos->currentPage() - 1); $i <= min($videos->lastPage(), $videos->currentPage() + 1); $i++)
                            <li class="page-datatable list-none page-item" data-page="{{ $i }}">
                                <a class="text-white mx-1 py-2 px-3 w-max rounded-lg {{ ($videos->currentPage() == $i) ? 'bg-[#009FB2] cursor-not-allowed ' : 'bg-[#142132] hover:bg-[#009FB2]' }}"
                                   href="javascript:void(0)">{{ $i }}</a>
                            </li>
                        @endfor

                        @if ($videos->currentPage() < $videos->lastPage() - 1)
                            @if ($videos->currentPage() < $videos->lastPage() - 2)
                                <li class="list-none page-item disabled px-2"><span class="page-link">...</span></li>
                            @endif
                            <li class="page-datatable list-none page-item" data-page="{{ $videos->lastPage() }}">
                                <a class="hover:bg-[#009FB2] text-white mx-1 py-2 px-3 w-max rounded-lg bg-[#142132]"
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

            </div>
        </div>
    </div>
</div>
