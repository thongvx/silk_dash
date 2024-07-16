<div id="streaming" class="tab-content-video">
    <div class="rounded-xl">
        <div class="relative rounded-xl bg-[#121520]">
            <div class="px-2 pt-4 md:p-4">
                <div class="mb-2 flex justify-between">
                    <h5 class="text-emerald-400">
                        Streams : {{ $total }}
                    </h5>
                    <div class="hover:text-emerald-400 cursor-pointer" title="edit">
                        <a href="javascript:;" class="flex items-center">
                            <i btn-edit class="material-symbols-outlined opacity-1 text-3xl">add</i>
                            Add</a>
                    </div>
                </div>
                <div
                    class="flex flex-col bg-clip-border rounded-xl text-gray-700 bg-transparent">
                    <div class="flex justify-between items-center w-full mb-3">
                        <div class="text-sm bg-[#142132] text-white rounded-lg p-2">
                            <label for="limit">Show:</label>
                            <select name="limit" class="bg-transparent outline-none"
                                    id="limit">
                                <option value="20"
                                        class="limit" {{ $streams->perPage() == 20 ? 'selected' : '' }}>
                                    20
                                </option>
                                <option value="50"
                                        class="limit" {{ $streams->perPage() == 50 ? 'selected' : '' }}>
                                    50
                                </option>
                                <option value="100"
                                        class="limit" {{ $streams->perPage() == 100 ? 'selected' : '' }}>
                                    100
                                </option>
                            </select>
                            <span>entries</span>
                        </div>
                    </div>
                    <div class="px-0 pt-0">
                        <table id="datatable" datatable data-page-size="10" data-column-table="{{ $column }}"
                               data-column-direction="{{ $direction }}" data-total="{{ $streams->total() }}"
                               class="text-sm border-separate table-auto overflow-y-clip w-full min-w-max text-white text-center !border-t-0">
                            <thead>
                                <tr class="bg-[#142132] transition-colors text-md">
                                    <th class="before:!bottom-2 after:!bottom-2 pl-2 py-2 cursor-pointer text-center">
                                        ID
                                    </th>
                                    <th class="before:!bottom-2 after:!bottom-2 pl-2 py-2 cursor-pointer">
                                        Domain
                                    </th>
                                    <th class="before:!bottom-2 after:!bottom-2 pl-2 py-2">
                                        IP
                                    </th>
                                    <th class="before:!bottom-2 after:!bottom-2 pl-2 py-2 cursor-pointer">
                                        CPU
                                    </th>
                                    <th class="before:!bottom-2 after:!bottom-2 pl-2 py-2 cursor-pointer">
                                        Video
                                    </th>
                                    <th class="before:!bottom-2 after:!bottom-2 pl-2 py-2 cursor-pointer">
                                        Space
                                    </th>
                                    <th class="before:!bottom-2 after:!bottom-2 pl-2 py-2 cursor-pointer">
                                        Used Space
                                    </th>
                                    <th class="before:!bottom-2 after:!bottom-2 pl-2 py-2 cursor-pointer">
                                        Percent Space
                                    </th>
                                    <th class="before:!bottom-2 after:!bottom-2 pl-2 py-2 cursor-pointer">
                                        Provider
                                    </th>
                                    <th class="before:!bottom-2 after:!bottom-2 pl-2 py-2 cursor-pointer">
                                        Used BW
                                    </th>
                                    <th class="before:!bottom-2 after:!bottom-2 pl-2 py-2 cursor-pointer">
                                        Max
                                    </th>
                                    <th class="before:!bottom-2 after:!bottom-2 pl-2 py-2 cursor-pointer">
                                        In
                                    </th>
                                    <th class="before:!bottom-2 after:!bottom-2 pl-2 py-2 cursor-pointer">
                                        Out
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                            @forelse( $streams as $index => $stream )
                                <tr class="my-3 h-12 odd:bg-transparent even:bg-[#142132]">
                                    <td class="sorting_1">{{ $stream->id }}</td>
                                    <td class="domain" onclick="edit(this)">
                                        <a href="#edit" class="text-emerald-400">{{ $stream->domain }}</a>
                                    </td>
                                    <td class="ip text-emerald-400">{{ $stream->ip }}</td>
                                    <td>{{ $stream->cpu }}</td>
                                    <td>{{ $stream->number_video }}</td>
                                    <td class="space">{{ $stream->space }}</td>
                                    <td>{{ $stream->used_space }}</td>
                                    <td>{{ $stream->percent_space }}</td>
                                    <td class="BW">{{ $stream->provider }}</td>
                                    <td>0</td>
                                    <td class="max">{{ $stream->max_speed }}</td>
                                    <td>{{ $stream->in_speed }}</td>
                                    <td>{{ $stream->out_speed }}</td>
                                </tr>
                            @empty
                                <tr class="my-3 h-12 bg-[#142132]">
                                    <td colspan="15" class="text-white text-center">No data found</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="button-table pt-4 text-white text-sm flex justify-between items-center">
                        <div class="dataTables_info bg-[#142132] rounded-lg hidden sm:block">
                            <p class="p-2">
                                Showing
                                <span class="font-medium">{{$streams->firstItem()  }}</span>
                                to
                                <span class="font-medium">{{$streams->lastItem()  }}</span>
                                of
                                <span class="font-medium">{{$streams->total()  }}</span>
                                results
                            </p>
                        </div>
                        <div class="pagination flex items-center pb-3 sm:pb-0">
                            {{-- Previous Page Link --}}
                            @if ($streams->onFirstPage())
                                <span
                                    class="opacity-50 py-2 px-3 w-max rounded-lg cursor-not-allowed bg-[#142132]">Previous</span>
                            @else
                                <li class="page-datatable list-none page-item" data-page="{{ $streams->currentPage() -1 }}">
                                    <a class="hover:bg-[#009FB2] py-2 px-4 w-max rounded-lg bg-[#142132]"
                                       href="javascript:void(0)" rel="prev">Previous</a>
                                </li>
                            @endif


                            {{-- Pagination Elements --}}
                            @if ($streams->currentPage() > 2)
                                <li class="page-datatable list-none" data-page="1">
                                    <a class="hover:bg-[#009FB2] mx-1 py-2 px-3 w-max rounded-lg bg-[#142132]"
                                       href="javascript:void(0)">1</a>
                                </li>
                                @if ($streams->currentPage() > 3)
                                    <li class="list-none page-item disabled px-2"><span class="page-link">...</span></li>
                                @endif
                            @endif

                            @for ($i = max(1, $streams->currentPage() - 1); $i <= min($streams->lastPage(), $streams->currentPage() + 1); $i++)
                                <li class="page-datatable list-none page-item" data-page="{{ $i }}">
                                    <a class="mx-1 py-2 px-3 w-max rounded-lg {{ ($streams->currentPage() == $i) ? 'bg-[#009FB2] cursor-not-allowed text-white' : 'bg-[#142132] hover:bg-[#009FB2]' }}"
                                       href="javascript:void(0)">{{ $i }}</a>
                                </li>
                            @endfor

                            @if ($streams->currentPage() < $streams->lastPage() - 1)
                                @if ($streams->currentPage() < $streams->lastPage() - 2)
                                    <li class=" list-none page-item disabled px-2"><span
                                            class="page-link">...</span></li>
                                @endif
                                <li class="page-datatable list-none page-item" data-page="{{ $streams->lastPage() }}">
                                    <a class="hover:bg-[#009FB2] mx-1 py-2 px-3 w-max rounded-lg bg-[#142132]"
                                       href="javascript:void(0)">{{ $streams->lastPage() }}</a>
                                </li>
                            @endif

                            {{-- Next Page Link --}}
                            @if ($streams->hasMorePages())
                                <li class="page-datatable list-none page-item" data-page="{{ $streams->currentPage() +1 }}">
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
