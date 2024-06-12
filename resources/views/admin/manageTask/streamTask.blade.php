<div class="px-0 pt-0">
    <div class="relative rounded-xl bg-[#121520]" id="manage-task">
        <div class="pt-4 md:p-4">
            <div class="mb-2 flex justify-between">
                <h5 class="text-white">
                    Encoder: {{ $transfers->total() }}
                </h5>
            </div>
            <div class="flex justify-between items-center w-full mb-3">
                <div class="text-sm bg-[#142132] rounded-lg p-2">
                    <label for="limit">Show:</label>
                    <select name="limit" class="bg-transparent outline-transparent"
                            id="limit">
                        <option value="20"
                                class="limit" {{ $transfers->perPage() == 20 ? 'selected' : '' }}>
                            20
                        </option>
                        <option value="50"
                                class="limit" {{ $transfers->perPage() == 50 ? 'selected' : '' }}>
                            50
                        </option>
                        <option value="100"
                                class="limit" {{ $transfers->perPage() == 100 ? 'selected' : '' }}>
                            100
                        </option>
                    </select>
                    <span>entries</span>
                </div>
            </div>
            <div
                class="flex flex-col bg-clip-border rounded-xl text-gray-700 bg-transparent">
                <div class="px-0 pt-0">
                    <div class="px-0 pt-0 overflow-auto h-[calc(100vh-24em)] ">
                        <table id="datatable" datatable data-page-size="10"
                               class="text-sm border-separate table-auto overflow-y-clip w-full min-w-max text-white text-left !border-t-0">
                            <thead class="sticky top-0">
                            <tr class="bg-[#142132] transition-colors text-md">
                                <th data-column="id" class='pl-2 sortable-column cursor-pointer relative  py-2' aria-sort>
                                <span class="text-xs sort-icon absolute opacity-50 bottom-[45%] right-2 asc"
                                      data-direction="asc">▲</span>
                                    <a href="javascript:void(0)">ID</a>
                                    <span class="text-xs sort-icon absolute opacity-50 top-[45%] right-2 desc"
                                          data-direction="desc">▼</span>
                                </th>
                                <th data-column="id" class='pl-2 sortable-column cursor-pointer relative  py-2' aria-sort>
                                <span class="text-xs sort-icon absolute opacity-50 bottom-[45%] right-2 asc"
                                      data-direction="asc">▲</span>
                                    <a href="javascript:void(0)">User ID</a>
                                    <span class="text-xs sort-icon absolute opacity-50 top-[45%] right-2 desc"
                                          data-direction="desc">▼</span>
                                </th>
                                <th data-column="id" class='pl-2 sortable-column cursor-pointer relative  py-2' aria-sort>
                                <span class="text-xs sort-icon absolute opacity-50 bottom-[45%] right-2 asc"
                                      data-direction="asc">▲</span>
                                    <a href="javascript:void(0)">Video ID</a>
                                    <span class="text-xs sort-icon absolute opacity-50 top-[45%] right-2 desc"
                                          data-direction="desc">▼</span>
                                </th>
                                <th class='pl-2 sortable-column cursor-pointer relative  py-2'>
                                    Quality
                                </th>
                                <th data-column="id" class='pl-2 sortable-column cursor-pointer relative  py-2' aria-sort>
                                <span class="text-xs sort-icon absolute opacity-50 bottom-[45%] right-2 asc"
                                      data-direction="asc">▲</span>
                                    <a href="javascript:void(0)">Size</a>
                                    <span class="text-xs sort-icon absolute opacity-50 top-[45%] right-2 desc"
                                          data-direction="desc">▼</span>
                                </th>
                                <th data-column="id" class='pl-2 sortable-column cursor-pointer relative  py-2' aria-sort>
                                <span class="text-xs sort-icon absolute opacity-50 bottom-[45%] right-2 asc"
                                      data-direction="asc">▲</span>
                                    <a href="javascript:void(0)">Status</a>
                                    <span class="text-xs sort-icon absolute opacity-50 top-[45%] right-2 desc"
                                          data-direction="desc">▼</span>
                                </th>
                                <th data-column="id" class='pl-2 sortable-column cursor-pointer relative  py-2' aria-sort>
                                <span class="text-xs sort-icon absolute opacity-50 bottom-[45%] right-2 asc"
                                      data-direction="asc">▲</span>
                                    <a href="javascript:void(0)">Priority</a>
                                    <span class="text-xs sort-icon absolute opacity-50 top-[45%] right-2 desc"
                                          data-direction="desc">▼</span>
                                </th>
                                <th class='pl-2 sortable-column cursor-pointer relative  py-2'>
                                    DL
                                </th>
                                <th data-column="id" class='pl-2 sortable-column cursor-pointer relative  py-2' aria-sort>
                                <span class="text-xs sort-icon absolute opacity-50 bottom-[45%] right-2 asc"
                                      data-direction="asc">▲</span>
                                    <a href="javascript:void(0)">EC</a>
                                    <span class="text-xs sort-icon absolute opacity-50 top-[45%] right-2 desc"
                                          data-direction="desc">▼</span>
                                </th>
                                <th class='pl-2 sortable-column cursor-pointer relative  py-2'>
                                    ST
                                </th>
                                <th data-column="id" class='w-24 pl-1 sortable-column cursor-pointer relative  py-2' aria-sort>
                                <span class="text-xs sort-icon absolute opacity-50 bottom-[45%] right-2 asc"
                                      data-direction="asc">▲</span>
                                    <a href="javascript:void(0)">Started</a>
                                    <span class="text-xs sort-icon absolute opacity-50 top-[45%] right-2 desc"
                                          data-direction="desc">▼</span>
                                </th>
                                <th data-column="id" class='w-24 pl-1 sortable-column cursor-pointer relative  py-2' aria-sort>
                                <span class="text-xs sort-icon absolute opacity-50 bottom-[45%] right-2 asc"
                                      data-direction="asc">▲</span>
                                    <a href="javascript:void(0)">Finished</a>
                                    <span class="text-xs sort-icon absolute opacity-50 top-[45%] right-2 desc"
                                          data-direction="desc">▼</span>
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse( $transfers as $index => $transfer)
                                <tr class="my-3 h-12 odd:bg-transparent even:bg-[#142132]">
                                    <td class="pl-2">{{ $transfer->id }}</td>
                                    <td class="pl-2">{{ $transfer->user_id }}</td>
                                    <td class="pl-2">{{ $transfer->slug }}</td>
                                    <td class="pl-2">{{ $transfer->quality }}</td>
                                    <td class="pl-2">{{ $transfer->size }}</td>
                                    <td class="pl-2">{{ $transfer->status }}</td>
                                    <td class="pl-2">{{ $transfer->priority }}</td>
                                    <td class="pl-2">{{ $transfer->sv_upload }}</td>
                                    <td class="pl-2">{{ $transfer->sv_encoder }}</td>
                                    <td class="pl-2">{{ $transfer->sv_storage }}</td>
                                    <td class="pl-2">{{ $transfer->start_encoder }}</td>
                                    <td class="pl-2">{{ $transfer->finish_encoder }}</td>
                                </tr>
                            @empty
                                <tr class="my-3 h-12 bg-[#142132]">
                                    <td colspan="12" class="text-center py-4">No data available</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="button-table pt-4 text-white text-sm flex justify-between items-center">
                        <div class="dataTables_info bg-[#142132] rounded-lg hidden sm:block">
                            <p class="p-2">
                                Showing
                                <span class="font-medium">{{$transfers->firstItem()  }}</span>
                                to
                                <span class="font-medium">{{$transfers->lastItem()  }}</span>
                                of
                                <span class="font-medium">{{$transfers->total()  }}</span>
                                results
                            </p>
                        </div>
                        <div class="pagination flex items-center pb-3 sm:pb-0">
                            {{-- Previous Page Link --}}
                            @if ($transfers->onFirstPage())
                                <span
                                    class="opacity-50 py-2 px-3 w-max rounded-lg cursor-not-allowed bg-[#142132]">Previous</span>
                            @else
                                <li class="page-encoder list-none page-item" data-page="{{ $transfers->currentPage() -1 }}">
                                    <a class="hover:bg-[#009FB2] py-2 px-4 w-max rounded-lg bg-[#142132]"
                                       href="javascript:void(0)" rel="prev">Previous</a>
                                </li>
                            @endif


                            {{-- Pagination Elements --}}
                            @if ($transfers->currentPage() > 2)
                                <li class="page-encoder list-none" data-page="1">
                                    <a class="hover:bg-[#009FB2] mx-1 py-2 px-3 w-max rounded-lg bg-[#142132]"
                                       href="javascript:void(0)">1</a>
                                </li>
                                @if ($transfers->currentPage() > 3)
                                    <li class="list-none page-item disabled px-2"><span class="page-link">...</span></li>
                                @endif
                            @endif

                            @for ($i = max(1, $transfers->currentPage() - 1); $i <= min($transfers->lastPage(), $transfers->currentPage() + 1); $i++)
                                <li class="page-encoder list-none page-item" data-page="{{ $i }}">
                                    <a class="mx-1 py-2 px-3 w-max rounded-lg {{ ($transfers->currentPage() == $i) ? 'bg-[#009FB2] cursor-not-allowed text-white' : 'bg-[#142132] hover:bg-[#009FB2]' }}"
                                       href="javascript:void(0)">{{ $i }}</a>
                                </li>
                            @endfor

                            @if ($transfers->currentPage() < $transfers->lastPage() - 1)
                                @if ($transfers->currentPage() < $transfers->lastPage() - 2)
                                    <li class=" list-none page-item disabled px-2"><span
                                            class="page-link">...</span></li>
                                @endif
                                <li class="page-encoder list-none page-item" data-page="{{ $transfers->lastPage() }}">
                                    <a class="hover:bg-[#009FB2] mx-1 py-2 px-3 w-max rounded-lg bg-[#142132]"
                                       href="javascript:void(0)">{{ $transfers->lastPage() }}</a>
                                </li>
                            @endif

                            {{-- Next Page Link --}}
                            @if ($transfers->hasMorePages())
                                <li class="page-encoder list-none page-item" data-page="{{ $transfers->currentPage() +1 }}">
                                    <a class="hover:bg-[#009FB2] py-2 px-4 w-max rounded-lg bg-[#142132]"
                                       href="javascript:void(0)" rel="next">Next</a>
                                </li>
                            @else
                                <span
                                    class="text-white opacity-50 py-2 px-3 w-max rounded-lg cursor-not-allowed bg-[#142132]">Next</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
