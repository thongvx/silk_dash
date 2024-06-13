<div class="px-0 pt-0">
    <div class="relative rounded-xl bg-[#121520]" id="manage-task">
        <div class="pt-4 md:p-4">
            <div class="mb-2 flex justify-between">
                <h5 class="text-white" id="total-encoder">
                    Encoder: {{ $encoders->total() }}
                </h5>
                <div class="text-sm">
                    <button btn-encoder-task id="all" class="px-4 py-1 rounded-lg text-white hover:bg-[#009FB2] ml-2
                {{ request()->get('status') == 'all' || !request()->get('status') ? 'bg-[#009FB2]' : 'bg-[#142132]' }}" data-task="all">
                        <a href="javascript:;">All Task</a>
                    </button>
                    <button btn-encoder-task id="pending" class="px-4 py-1 rounded-lg text-white hover:bg-gray-500 ml-2
                {{ request()->get('status') == 'pending' ? 'bg-gray-500' : 'bg-[#142132]' }}" data-task="pending">
                        <a href="javascript:;">Pending Task</a>
                    </button>
                    <button btn-encoder-task id="encoding" class="px-4 py-1 rounded-lg text-white hover:bg-orange-500 ml-2
                {{ request()->get('status') == 'encoding' ? 'bg-orange-500' : 'bg-[#142132]' }}" data-task="encoding">
                        <a href="javascript:;">Encoding Task</a>
                    </button>
                    <button btn-encoder-task id="completed" class="px-4 py-1 rounded-lg text-white hover:bg-emerald-500 ml-2
                {{ request()->get('status') == 'completed' ? 'bg-emerald-500' : 'bg-[#142132]' }}" data-task="completed">
                        <a href="javascript:;">Completed Task</a>
                    </button>
                    <button btn-encoder-task id="failed" class="px-4 py-1 rounded-lg text-white hover:bg-rose-600
                {{ request()->get('status') == 'failed' ? 'bg-rose-600' : 'bg-[#142132]' }}" data-task="failed">
                        <a href="javascript:;">Failed Task</a>
                    </button>
                </div>
            </div>
            <div class="flex justify-between items-center w-full mb-3">
                <div class="text-sm bg-[#142132] rounded-lg p-2">
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
            <div
                class="flex flex-col bg-clip-border rounded-xl text-gray-700 bg-transparent">
                <div class="px-0 pt-0">
                    <div class="px-0 pt-0 overflow-auto h-[calc(100vh-24em)] ">
                        <table id="datatable" datatable data-page-size="10" data-column-table="{{request()->get('column') ?? 'created_at'}}"
                               data-column-direction="{{request()->get('direction') ?? 'desc'}}" data-total="{{$encoders->total()}}"
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
                                <th data-column="user_id" class='pl-2 sortable-column cursor-pointer relative  py-2' aria-sort>
                                <span class="text-xs sort-icon absolute opacity-50 bottom-[45%] right-2 asc"
                                      data-direction="asc">▲</span>
                                    <a href="javascript:void(0)">User ID</a>
                                    <span class="text-xs sort-icon absolute opacity-50 top-[45%] right-2 desc"
                                          data-direction="desc">▼</span>
                                </th>
                                <th data-column="slug" class='pl-2 sortable-column cursor-pointer relative  py-2' aria-sort>
                                <span class="text-xs sort-icon absolute opacity-50 bottom-[45%] right-2 asc"
                                      data-direction="asc">▲</span>
                                    <a href="javascript:void(0)">Video ID</a>
                                    <span class="text-xs sort-icon absolute opacity-50 top-[45%] right-2 desc"
                                          data-direction="desc">▼</span>
                                </th>
                                <th class='pl-2 py-2'>
                                    Quality
                                </th>
                                <th data-column="size" class='pl-2 sortable-column cursor-pointer relative  py-2' aria-sort>
                                <span class="text-xs sort-icon absolute opacity-50 bottom-[45%] right-2 asc"
                                      data-direction="asc">▲</span>
                                    <a href="javascript:void(0)">Size</a>
                                    <span class="text-xs sort-icon absolute opacity-50 top-[45%] right-2 desc"
                                          data-direction="desc">▼</span>
                                </th>
                                <th data-column="status" class='pl-2 sortable-column cursor-pointer relative  py-2' aria-sort>
                                <span class="text-xs sort-icon absolute opacity-50 bottom-[45%] right-2 asc"
                                      data-direction="asc">▲</span>
                                    <a href="javascript:void(0)">Status</a>
                                    <span class="text-xs sort-icon absolute opacity-50 top-[45%] right-2 desc"
                                          data-direction="desc">▼</span>
                                </th>
                                <th data-column="priority" class='pl-2 sortable-column cursor-pointer relative  py-2' aria-sort>
                                <span class="text-xs sort-icon absolute opacity-50 bottom-[45%] right-2 asc"
                                      data-direction="asc">▲</span>
                                    <a href="javascript:void(0)">Priority</a>
                                    <span class="text-xs sort-icon absolute opacity-50 top-[45%] right-2 desc"
                                          data-direction="desc">▼</span>
                                </th>
                                <th class='pl-2'>
                                    DL
                                </th>
                                <th data-column="sv_encoder" class='pl-2 sortable-column cursor-pointer relative  py-2' aria-sort>
                                <span class="text-xs sort-icon absolute opacity-50 bottom-[45%] right-2 asc"
                                      data-direction="asc">▲</span>
                                    <a href="javascript:void(0)">EC</a>
                                    <span class="text-xs sort-icon absolute opacity-50 top-[45%] right-2 desc"
                                          data-direction="desc">▼</span>
                                </th>
                                <th class='pl-2 py-2'>
                                    ST
                                </th>
                                <th data-column="start_encoder" class='w-24 pl-1 sortable-column cursor-pointer relative  py-2' aria-sort>
                                <span class="text-xs sort-icon absolute opacity-50 bottom-[45%] right-2 asc"
                                      data-direction="asc">▲</span>
                                    <a href="javascript:void(0)">Started</a>
                                    <span class="text-xs sort-icon absolute opacity-50 top-[45%] right-2 desc"
                                          data-direction="desc">▼</span>
                                </th>
                                <th data-column="finish_encoder" class='w-24 pl-1 sortable-column cursor-pointer relative  py-2'
                                    aria-sort>
                                <span class="text-xs sort-icon absolute opacity-50 bottom-[45%] right-2 asc"
                                      data-direction="asc">▲</span>
                                    <a href="javascript:void(0)">Finished</a>
                                    <span class="text-xs sort-icon absolute opacity-50 top-[45%] right-2 desc"
                                          data-direction="desc">▼</span>
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse( $encoders as $index => $encoder)
                                @php
                                    switch ($encoder->status) {
                                        case 1:
                                            $text = 'text-orange-500';
                                            break;
                                        case 0:
                                            $text = 'text-white';
                                            break;
                                        case 19:
                                            $text = 'text-rose-600';
                                            break;
                                        default:
                                            $text = 'text-teal-500';
                                    }
                                @endphp
                                <tr class="my-3 h-12 odd:bg-transparent even:bg-[#142132] {{ $text }}">
                                    <td class="pl-2">{{ $encoder->id }}</td>
                                    <td class="pl-2">{{ $encoder->user_id }}</td>
                                    <td class="pl-2">{{ $encoder->slug }}</td>
                                    <td class="pl-2">{{ $encoder->quality }}</td>
                                    <td class="pl-2">{{ $encoder->size }}</td>
                                    <td class="pl-2">{{ $encoder->status }}</td>
                                    <td class="pl-2">{{ $encoder->priority }}</td>
                                    <td class="pl-2">{{ $encoder->sv_upload }}</td>
                                    <td class="pl-2">{{ $encoder->sv_encoder }}</td>
                                    <td class="pl-2">{{ $encoder->sv_storage }}</td>
                                    <td class="pl-2">{{ $encoder->start_encoder }}</td>
                                    <td class="pl-2">{{ $encoder->finish_encoder }}</td>
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
