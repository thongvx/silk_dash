<div class="rounded-xl">
    <div class="relative rounded-xl bg-[#121520]">
        <div class="px-2 pt-4 md:p-4">
            <div class="mb-2 flex justify-between items-center">
                <h5 class="text-white" id="sever">
                    Sever : {{ $encoders->total() }}
                </h5>
                <div class="bg-[#142132] px-5 py-1 rounded-lg hover:text-[#009FB2] cursor-pointer" title="edit">
                    <a href="javascript:;" class="flex items-center text-sm">
                        <i btn-edit class="material-symbols-outlined opacity-1 text-2xl">add</i>
                        Add
                    </a>
                </div>
            </div>
            <div class="flex flex-col bg-clip-border rounded-xl text-gray-700 bg-transparent">
                <div class="flex justify-between items-center w-full mb-3">
                    <div class="text-sm bg-[#142132] text-white rounded-lg p-2">
                        <label for="limit">Show:</label>
                        <select name="limit" class="bg-transparent outline-none"
                                id="limit">
                            <option value="20"
                                    class="limit" {{ $encoders->perPage() == 20 ? 'selected' : '' }}>
                                20
                            </option>
                            <option value="50"
                                    class="limit" {{ $encoders->perPage() == 50 ? 'selected' : '' }}>
                                50
                            </option>
                            <option value="100"
                                    class="limit" {{ $encoders->perPage() == 100 ? 'selected' : '' }}>
                                100
                            </option>
                        </select>
                        <span>entries</span>
                    </div>
                </div>
                <div class="px-0 pt-0">
                    <div class="px-0 pt-0 overflow-auto h-[calc(100vh-25em)] ">
                        <table id="datatable" datatable data-page-size="10" data-column-table="{{ $column }}"
                               data-column-direction="{{ $direction }}" data-total="{{ $encoders->total() }}"
                               class="text-sm border-separate table-auto overflow-y-clip w-full min-w-max text-white text-center !border-t-0">
                            <thead class="sticky top-0 z-10">
                            <tr class="bg-[#142132] transition-colors text-md">
                                <th data-column="id" class='pl-2 sortable-column cursor-pointer relative  py-2' aria-sort>
                                <span class="text-xs sort-icon absolute opacity-50 bottom-[45%] right-2 asc"
                                      data-direction="asc">▲</span>
                                    <a href="javascript:void(0)">ID</a>
                                    <span class="text-xs sort-icon absolute opacity-50 top-[45%] right-2 desc"
                                          data-direction="desc">▼</span>
                                </th>
                                <th data-column="name" class='pl-2 sortable-column cursor-pointer relative  py-2' aria-sort>
                                <span class="text-xs sort-icon absolute opacity-50 bottom-[45%] right-2 asc"
                                      data-direction="asc">▲</span>
                                    <a href="javascript:void(0)">name</a>
                                    <span class="text-xs sort-icon absolute opacity-50 top-[45%] right-2 desc"
                                          data-direction="desc">▼</span>
                                </th>
                                <th data-column="taskFF" class='pl-2 sortable-column cursor-pointer relative  py-2' aria-sort>
                                <span class="text-xs sort-icon absolute opacity-50 bottom-[45%] right-2 asc"
                                      data-direction="asc">▲</span>
                                    <a href="javascript:void(0)">Task FF</a>
                                    <span class="text-xs sort-icon absolute opacity-50 top-[45%] right-2 desc"
                                          data-direction="desc">▼</span>
                                </th>
                                <th data-column="encoder_task" class='pl-2 sortable-column cursor-pointer relative  py-2' aria-sort>
                                <span class="text-xs sort-icon absolute opacity-50 bottom-[45%] right-2 asc"
                                      data-direction="asc">▲</span>
                                    <a href="javascript:void(0)">Encoder</a>
                                    <span class="text-xs sort-icon absolute opacity-50 top-[45%] right-2 desc"
                                          data-direction="desc">▼</span>
                                </th>
                                <th data-column="transfer_task" class='pl-2 sortable-column cursor-pointer relative  py-2' aria-sort>
                                <span class="text-xs sort-icon absolute opacity-50 bottom-[45%] right-2 asc"
                                      data-direction="asc">▲</span>
                                    <a href="javascript:void(0)">Transfer</a>
                                    <span class="text-xs sort-icon absolute opacity-50 top-[45%] right-2 desc"
                                          data-direction="desc">▼</span>
                                </th>
                                <th data-column="cpu" class='pl-2 sortable-column cursor-pointer relative  py-2' aria-sort>
                                <span class="text-xs sort-icon absolute opacity-50 bottom-[45%] right-2 asc"
                                      data-direction="asc">▲</span>
                                    <a href="javascript:void(0)">CPU</a>
                                    <span class="text-xs sort-icon absolute opacity-50 top-[45%] right-2 desc"
                                          data-direction="desc">▼</span>
                                </th>
                                <th class='pl-2 py-2'>
                                    Space
                                </th>
                                <th data-column="used_space" class='pl-2 sortable-column cursor-pointer relative  py-2' aria-sort>
                                <span class="text-xs sort-icon absolute opacity-50 bottom-[45%] right-2 asc"
                                      data-direction="asc">▲</span>
                                    <a href="javascript:void(0)">Used Space</a>
                                    <span class="text-xs sort-icon absolute opacity-50 top-[45%] right-2 desc"
                                          data-direction="desc">▼</span>
                                </th>
                                <th class='pl-2 py-2'>
                                    Percent Space
                                </th>
                                <th data-column="inSpeed" class='pl-2 sortable-column cursor-pointer relative  py-2' aria-sort>
                                <span class="text-xs sort-icon absolute opacity-50 bottom-[45%] right-2 asc"
                                      data-direction="asc">▲</span>
                                    <a href="javascript:void(0)">In Speed</a>
                                    <span class="text-xs sort-icon absolute opacity-50 top-[45%] right-2 desc"
                                          data-direction="desc">▼</span>
                                </th>
                                <th data-column="out_speed" class='pl-2 sortable-column cursor-pointer relative  py-2' aria-sort>
                                <span class="text-xs sort-icon absolute opacity-50 bottom-[45%] right-2 asc"
                                      data-direction="asc">▲</span>
                                    <a href="javascript:void(0)">Out Speed</a>
                                    <span class="text-xs sort-icon absolute opacity-50 top-[45%] right-2 desc"
                                          data-direction="desc">▼</span>
                                </th>
                                <th data-column="active" class='pl-2 sortable-column cursor-pointer relative  py-2' aria-sort>
                                <span class="text-xs sort-icon absolute opacity-50 bottom-[45%] right-2 asc"
                                      data-direction="asc">▲</span>
                                    <a href="javascript:void(0)">Active</a>
                                    <span class="text-xs sort-icon absolute opacity-50 top-[45%] right-2 desc"
                                          data-direction="desc">▼</span>
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse( $encoders as $index => $encoder )
                                <tr class="my-3 h-12 odd:bg-transparent even:bg-[#142132]">
                                    <td class="sorting_1">{{ $index+1 }}</td>
                                    <td class="name text-success">{{ $encoder['name'] }}</td>
                                    <td class="ip text-success">{{ $encoder['taskFF'] }}</td>
                                    <td>{{ $encoder['encoder_task'] }}</td>
                                    <td>{{ $encoder['transfer_task'] }}</td>
                                    <td>{{ $encoder['cpu'] }}</td>
                                    <td>{{ $encoder['usedSpace']*100/$encoder['percent_space'] }}</td>
                                    <td>{{ $encoder['usedSpace'] }}</td>
                                    <td>{{ $encoder['percent_space'] }}</td>
                                    <td>{{ $encoder['inSpeed'] }}</td>
                                    <td>{{ $encoder['out_speed'] }}</td>
                                    <td>{{ $encoder['active'] }}</td>
                                </tr>

                            @empty
                                <tr class="my-3 h-12 bg-[#142132]">
                                    <td colspan="12" class="text-white text-center">No data found</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="button-table pt-4 text-white text-sm flex justify-between items-center">
                        <div class="dataTables_info bg-[#142132] rounded-lg hidden sm:block">
                            <p class="p-2">
                                Showing
                                <span class="font-medium">{{$encoders->firstItem()  }}</span>
                                to
                                <span class="font-medium">{{$encoders->lastItem()  }}</span>
                                of
                                <span class="font-medium">{{$encoders->total()  }}</span>
                                results
                            </p>
                        </div>
                        <div class="pagination flex items-center pb-3 sm:pb-0">
                            {{-- Previous Page Link --}}
                            @if ($encoders->onFirstPage())
                                <span
                                    class="opacity-50 py-2 px-3 w-max rounded-lg cursor-not-allowed bg-[#142132]">Previous</span>
                            @else
                                <li class="page-datatable list-none page-item" data-page="{{ $encoders->currentPage() -1 }}">
                                    <a class="hover:bg-[#009FB2] py-2 px-4 w-max rounded-lg bg-[#142132]"
                                       href="javascript:void(0)" rel="prev">Previous</a>
                                </li>
                            @endif


                            {{-- Pagination Elements --}}
                            @if ($encoders->currentPage() > 2)
                                <li class="page-datatable list-none" data-page="1">
                                    <a class="hover:bg-[#009FB2] mx-1 py-2 px-3 w-max rounded-lg bg-[#142132]"
                                       href="javascript:void(0)">1</a>
                                </li>
                                @if ($encoders->currentPage() > 3)
                                    <li class="list-none page-item disabled px-2"><span class="page-link">...</span></li>
                                @endif
                            @endif

                            @for ($i = max(1, $encoders->currentPage() - 1); $i <= min($encoders->lastPage(), $encoders->currentPage() + 1); $i++)
                                <li class="page-datatable list-none page-item" data-page="{{ $i }}">
                                    <a class="mx-1 py-2 px-3 w-max rounded-lg {{ ($encoders->currentPage() == $i) ? 'bg-[#009FB2] cursor-not-allowed text-white' : 'bg-[#142132] hover:bg-[#009FB2]' }}"
                                       href="javascript:void(0)">{{ $i }}</a>
                                </li>
                            @endfor

                            @if ($encoders->currentPage() < $encoders->lastPage() - 1)
                                @if ($encoders->currentPage() < $encoders->lastPage() - 2)
                                    <li class=" list-none page-item disabled px-2"><span
                                            class="page-link">...</span></li>
                                @endif
                                <li class="page-datatable list-none page-item" data-page="{{ $encoders->lastPage() }}">
                                    <a class="hover:bg-[#009FB2] mx-1 py-2 px-3 w-max rounded-lg bg-[#142132]"
                                       href="javascript:void(0)">{{ $encoders->lastPage() }}</a>
                                </li>
                            @endif

                            {{-- Next Page Link --}}
                            @if ($encoders->hasMorePages())
                                <li class="page-datatable list-none page-item" data-page="{{ $encoders->currentPage() +1 }}">
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
