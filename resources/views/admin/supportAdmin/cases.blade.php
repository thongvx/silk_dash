<div class="px-0 pt-0">
    <div class="relative rounded-xl bg-[#121520]" id="manage-task">
        <div class="pt-4 md:p-4">
            <div class="flex justify-between items-center">
                <div class="mb-2">
                    <h5 class="text-white">
                        Cases
                    </h5>
                </div>
            </div>
            <div
                class="mt-3 flex flex-col bg-clip-border rounded-xl text-gray-700 bg-transparent">
                <div class="flex justify-between items-center w-full mb-3">
                    <div class="text-sm bg-[#142132] text-white rounded-lg p-2">
                        <label for="limit">Show:</label>
                        <select name="limit" class="bg-transparent outline-none"
                                id="limit">
                            <option value="20"
                                    class="limit" {{ $tickets->perPage() == 20 ? 'selected' : '' }}>
                                20
                            </option>
                            <option value="50"
                                    class="limit" {{ $tickets->perPage() == 50 ? 'selected' : '' }}>
                                50
                            </option>
                            <option value="100"
                                    class="limit" {{ $tickets->perPage() == 100 ? 'selected' : '' }}>
                                100
                            </option>
                        </select>
                        <span>entries</span>
                    </div>
                </div>
                <div class="px-0 pt-0">
                    <div class="px-0 pt-0 overflow-auto h-[calc(100vh-24em)] ">
                        <table id="datatable" datatable data-page-size="10"
                               data-column-table="{{request()->get('column') ?? 'created_at'}}"
                               data-column-direction="{{request()->get('direction') ?? 'desc'}}"
                               class="text-sm border-separate table-auto overflow-y-clip w-full min-w-max text-white text-left !border-t-0">
                            <thead class="sticky top-0 z-10">
                            <tr class="bg-[#142132] transition-colors text-md">
                                <th class="before:!bottom-2 after:!bottom-2 pl-2 py-2 cursor-pointer text-start px-1">
                                    ID
                                </th>
                                <th class="before:!bottom-2 after:!bottom-2 pl-2 py-2 cursor-pointer col-xl-1">
                                    UserID
                                </th>
                                <th class="before:!bottom-2 after:!bottom-2 pl-2 py-2 cursor-pointer col-xl-1">
                                    Topic
                                </th>
                                <th class="before:!bottom-2 after:!bottom-2 pl-2 py-2 cursor-pointer col-xl-4">
                                    Subject
                                </th>
                                <th class="before:!bottom-2 after:!bottom-2 pl-2 py-2 cursor-pointer">
                                    Status
                                </th>
                                <th class="before:!bottom-2 after:!bottom-2 pl-2 py-2 cursor-pointer">
                                    Created At
                                </th>
                                <th class="before:!bottom-2 after:!bottom-2 pl-2 py-2 cursor-pointer px-1">
                                    Last Updated
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($tickets as $ticket)
                                <tr class="my-3 h-12 odd:bg-transparent even:bg-[#142132]">
                                    <td class="px-2">{{ $ticket -> id }}</td>
                                    <td class="px-2">{{ $ticket -> user_id }}</td>
                                    <td class="px-2">
                                        <a href="{{ route('supportAdmin.show', ['supportAdmin' => $ticket->id, 'user_id' => $ticket -> user_id]) }}">{{ $ticket -> subject }}</a>
                                    </td>
                                    <td class="px-2">{{ $ticket -> topic }}</td>
                                    <td class="px-2">
                                        @if($ticket->status === 'completed')
                                            <span class="rounded-lg px-3 py-1 bg-emerald-400 completed">{{ $ticket -> status }}</span>
                                        @elseif ($ticket -> status === 'pending')
                                            <span class="rounded-lg px-3 py-1 bg-orange-600 pending">{{ $ticket -> status }}</span>
                                        @else
                                            <span class="rounded-lg px-3 py-1 bg-blue-600 open">{{ $ticket -> status }}</span>
                                        @endif
                                    </td>
                                    <td class="px-2">{{ $ticket -> created_at }}</td>
                                    <td class="px-2">{{ $ticket -> updated_at }}</td>
                                </tr>
                            @empty
                                <tr class="my-3 h-12 bg-[#142132]">
                                    <td class="text-center" colspan="6">No data available in table</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="button-table pt-4 text-white text-sm flex justify-between items-center">
                        <div class="dataTables_info bg-[#142132] rounded-lg hidden sm:block">
                            <p class="p-2">
                                Showing
                                <span class="font-medium">{{$tickets->firstItem()  }}</span>
                                to
                                <span class="font-medium">{{$tickets->lastItem()  }}</span>
                                of
                                <span class="font-medium">{{$tickets->total()  }}</span>
                                results
                            </p>
                        </div>
                        <div class="pagination flex items-center pb-3 sm:pb-0">
                            {{-- Previous Page Link --}}
                            @if ($tickets->onFirstPage())
                                <span
                                    class="opacity-50 py-2 px-3 w-max rounded-lg cursor-not-allowed bg-[#142132]">Previous</span>
                            @else
                                <li class="page-datatable list-none page-item" data-page="{{ $tickets->currentPage() -1 }}">
                                    <a class="hover:bg-[#009FB2] py-2 px-4 w-max rounded-lg bg-[#142132]"
                                       href="javascript:void(0)" rel="prev">Previous</a>
                                </li>
                            @endif


                            {{-- Pagination Elements --}}
                            @if ($tickets->currentPage() > 2)
                                <li class="page-datatable list-none" data-page="1">
                                    <a class="hover:bg-[#009FB2] mx-1 py-2 px-3 w-max rounded-lg bg-[#142132]"
                                       href="javascript:void(0)">1</a>
                                </li>
                                @if ($tickets->currentPage() > 3)
                                    <li class="list-none page-item disabled px-2"><span class="page-link">...</span></li>
                                @endif
                            @endif

                            @for ($i = max(1, $tickets->currentPage() - 1); $i <= min($tickets->lastPage(), $tickets->currentPage() + 1); $i++)
                                <li class="page-datatable list-none page-item" data-page="{{ $i }}">
                                    <a class="mx-1 py-2 px-3 w-max rounded-lg {{ ($tickets->currentPage() == $i) ? 'bg-[#009FB2] cursor-not-allowed text-white' : 'bg-[#142132] hover:bg-[#009FB2]' }}"
                                       href="javascript:void(0)">{{ $i }}</a>
                                </li>
                            @endfor

                            @if ($tickets->currentPage() < $tickets->lastPage() - 1)
                                @if ($tickets->currentPage() < $tickets->lastPage() - 2)
                                    <li class=" list-none page-item disabled px-2"><span
                                            class="page-link">...</span></li>
                                @endif
                                <li class="page-datatable list-none page-item" data-page="{{ $tickets->lastPage() }}">
                                    <a class="hover:bg-[#009FB2] mx-1 py-2 px-3 w-max rounded-lg bg-[#142132]"
                                       href="javascript:void(0)">{{ $tickets->lastPage() }}</a>
                                </li>
                            @endif

                            {{-- Next Page Link --}}
                            @if ($tickets->hasMorePages())
                                <li class="page-datatable list-none page-item" data-page="{{ $tickets->currentPage() +1 }}">
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

