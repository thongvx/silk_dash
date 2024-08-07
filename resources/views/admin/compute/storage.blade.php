<div class="rounded-xl">
    <div class="relative rounded-xl bg-[#121520]">
        <div class="px-2 pt-4 md:p-4">
            <div class="mb-2 flex justify-between items-center">
                <h5 class="text-white" id="sever">
                    Sever : {{ $storages->total() }}
                </h5>
                <div class="bg-[#142132] px-5 py-1 rounded-lg hover:text-[#009FB2] cursor-pointer"  btn-add-sever>
                    <a href="javascript:;" class="flex items-center text-sm">
                        <i class="material-symbols-outlined opacity-1 text-2xl">add</i>
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
                                    class="limit" {{ $storages->perPage() == 20 ? 'selected' : '' }}>
                                20
                            </option>
                            <option value="50"
                                    class="limit" {{ $storages->perPage() == 50 ? 'selected' : '' }}>
                                50
                            </option>
                            <option value="100"
                                    class="limit" {{ $storages->perPage() == 100 ? 'selected' : '' }}>
                                100
                            </option>
                        </select>
                        <span>entries</span>
                    </div>
                </div>
                <div class="px-0 pt-0">
                    <div class="px-0 pt-0 overflow-auto h-[calc(100vh-25em)] ">
                        <table id="datatable" datatable data-page-size="10" data-column-table="{{ $column }}"
                               data-column-direction="{{ $direction }}" data-total="{{ $storages->total() }}"
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
                                <th data-column="domain" class='pl-2 sortable-column cursor-pointer relative  py-2' aria-sort>
                                <span class="text-xs sort-icon absolute opacity-50 bottom-[45%] right-2 asc"
                                      data-direction="asc">▲</span>
                                    <a href="javascript:void(0)">Domain</a>
                                    <span class="text-xs sort-icon absolute opacity-50 top-[45%] right-2 desc"
                                          data-direction="desc">▼</span>
                                </th>
                                <th data-column="name" class='pl-2 sortable-column cursor-pointer relative  py-2' aria-sort>
                                <span class="text-xs sort-icon absolute opacity-50 bottom-[45%] right-2 asc"
                                      data-direction="asc">▲</span>
                                    <a href="javascript:void(0)">Name</a>
                                    <span class="text-xs sort-icon absolute opacity-50 top-[45%] right-2 desc"
                                          data-direction="desc">▼</span>
                                </th>
                                <th data-column="ip" class='pl-2 sortable-column cursor-pointer relative  py-2' aria-sort>
                                <span class="text-xs sort-icon absolute opacity-50 bottom-[45%] right-2 asc"
                                      data-direction="asc">▲</span>
                                    <a href="javascript:void(0)">IP</a>
                                    <span class="text-xs sort-icon absolute opacity-50 top-[45%] right-2 desc"
                                          data-direction="desc">▼</span>
                                </th>
                                <th data-column="pass" class='pl-2 sortable-column cursor-pointer relative  py-2' aria-sort>
                                <span class="text-xs sort-icon absolute opacity-50 bottom-[45%] right-2 asc"
                                      data-direction="asc">▲</span>
                                    <a href="javascript:void(0)">Password</a>
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
                                <th data-column="space" class='pl-2 sortable-column cursor-pointer relative  py-2' aria-sort>
                                <span class="text-xs sort-icon absolute opacity-50 bottom-[45%] right-2 asc"
                                      data-direction="asc">▲</span>
                                    <a href="javascript:void(0)">Space</a>
                                    <span class="text-xs sort-icon absolute opacity-50 top-[45%] right-2 desc"
                                          data-direction="desc">▼</span>
                                </th>
                                <th data-column="used_space" class='pl-2 sortable-column cursor-pointer relative  py-2' aria-sort>
                                <span class="text-xs sort-icon absolute opacity-50 bottom-[45%] right-2 asc"
                                      data-direction="asc">▲</span>
                                    <a href="javascript:void(0)">Used</a>
                                    <span class="text-xs sort-icon absolute opacity-50 top-[45%] right-2 desc"
                                          data-direction="desc">▼</span>
                                </th>
                                <th data-column="provider" class='pl-2 sortable-column cursor-pointer relative  py-2' aria-sort>
                                <span class="text-xs sort-icon absolute opacity-50 bottom-[45%] right-2 asc"
                                      data-direction="asc">▲</span>
                                    <a href="javascript:void(0)">Provider</a>
                                    <span class="text-xs sort-icon absolute opacity-50 top-[45%] right-2 desc"
                                          data-direction="desc">▼</span>
                                </th>
                                <th data-column="used_bw" class='pl-2 sortable-column cursor-pointer relative  py-2' aria-sort>
                                <span class="text-xs sort-icon absolute opacity-50 bottom-[45%] right-2 asc"
                                      data-direction="asc">▲</span>
                                    <a href="javascript:void(0)">Used BW</a>
                                    <span class="text-xs sort-icon absolute opacity-50 top-[45%] right-2 desc"
                                          data-direction="desc">▼</span>
                                </th>
                                <th data-column="in_speed" class='pl-2 sortable-column cursor-pointer relative  py-2' aria-sort>
                                <span class="text-xs sort-icon absolute opacity-50 bottom-[45%] right-2 asc"
                                      data-direction="asc">▲</span>
                                    <a href="javascript:void(0)">In</a>
                                    <span class="text-xs sort-icon absolute opacity-50 top-[45%] right-2 desc"
                                          data-direction="desc">▼</span>
                                </th>
                                <th data-column="out_speed" class='pl-2 sortable-column cursor-pointer relative  py-2' aria-sort>
                                <span class="text-xs sort-icon absolute opacity-50 bottom-[45%] right-2 asc"
                                      data-direction="asc">▲</span>
                                    <a href="javascript:void(0)">Out</a>
                                    <span class="text-xs sort-icon absolute opacity-50 top-[45%] right-2 desc"
                                          data-direction="desc">▼</span>
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse( $storages as $index => $storage )
                                <tr class="my-3 h-12 odd:bg-transparent even:bg-[#142132]">
                                    <td class="sorting_1">{{ $storage->id }}</td>
                                    <td class="domain text-success" onclick="edit(this)">{{ $storage->domain }}</td>
                                    <td class="name text-success">{{ $storage->name }}</td>
                                    <td class="ip text-success">{{ $storage->ip }}</td>
                                    <td>{{ $storage->pass }}</td>
                                    <td>{{ $storage->cpu }}</td>
                                    <td class="space">{{ $storage->space }}</td>
                                    <td>{{ $storage->used_space }}</td>
                                    <td class="BW">{{ $storage->provider }}</td>
                                    <td>{{ $storage->used_bw }}</td>
                                    <td>{{ $storage->in_speed }}</td>
                                    <td>{{ $storage->out_speed }}</td>
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
                                <span class="font-medium">{{$storages->firstItem()  }}</span>
                                to
                                <span class="font-medium">{{$storages->lastItem()  }}</span>
                                of
                                <span class="font-medium">{{$storages->total()  }}</span>
                                results
                            </p>
                        </div>
                        <div class="pagination flex items-center pb-3 sm:pb-0">
                            {{-- Previous Page Link --}}
                            @if ($storages->onFirstPage())
                                <span
                                    class="opacity-50 py-2 px-3 w-max rounded-lg cursor-not-allowed bg-[#142132]">Previous</span>
                            @else
                                <li class="page-datatable list-none page-item" data-page="{{ $storages->currentPage() -1 }}">
                                    <a class="hover:bg-[#009FB2] py-2 px-4 w-max rounded-lg bg-[#142132]"
                                       href="javascript:void(0)" rel="prev">Previous</a>
                                </li>
                            @endif


                            {{-- Pagination Elements --}}
                            @if ($storages->currentPage() > 2)
                                <li class="page-datatable list-none" data-page="1">
                                    <a class="hover:bg-[#009FB2] mx-1 py-2 px-3 w-max rounded-lg bg-[#142132]"
                                       href="javascript:void(0)">1</a>
                                </li>
                                @if ($storages->currentPage() > 3)
                                    <li class="list-none page-item disabled px-2"><span class="page-link">...</span></li>
                                @endif
                            @endif

                            @for ($i = max(1, $storages->currentPage() - 1); $i <= min($storages->lastPage(), $storages->currentPage() + 1); $i++)
                                <li class="page-datatable list-none page-item" data-page="{{ $i }}">
                                    <a class="mx-1 py-2 px-3 w-max rounded-lg {{ ($storages->currentPage() == $i) ? 'bg-[#009FB2] cursor-not-allowed text-white' : 'bg-[#142132] hover:bg-[#009FB2]' }}"
                                       href="javascript:void(0)">{{ $i }}</a>
                                </li>
                            @endfor

                            @if ($storages->currentPage() < $storages->lastPage() - 1)
                                @if ($storages->currentPage() < $storages->lastPage() - 2)
                                    <li class=" list-none page-item disabled px-2"><span
                                            class="page-link">...</span></li>
                                @endif
                                <li class="page-datatable list-none page-item" data-page="{{ $storages->lastPage() }}">
                                    <a class="hover:bg-[#009FB2] mx-1 py-2 px-3 w-max rounded-lg bg-[#142132]"
                                       href="javascript:void(0)">{{ $storages->lastPage() }}</a>
                                </li>
                            @endif

                            {{-- Next Page Link --}}
                            @if ($storages->hasMorePages())
                                <li class="page-datatable list-none page-item" data-page="{{ $storages->currentPage() +1 }}">
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
