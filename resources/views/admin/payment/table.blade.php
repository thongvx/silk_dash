<div class="px-0 pt-0 overflow-auto h-[calc(100vh-19em)] ">
    <table id="datatable" datatable data-page-size="10" data-column-table="{{request()->get('column') ?? 'created_at'}}"
           data-column-direction="{{request()->get('direction') ?? 'desc'}}"
           class="text-sm border-separate table-auto overflow-y-clip w-full min-w-max text-white text-left !border-t-0">
        <thead class="sticky top-0 z-10">
        <tr class="bg-[#142132] transition-colors text-md text-center">
            <th data-column="user_id" class='pl-2 sortable-column cursor-pointer relative  py-2' aria-sort>
                                <span class="text-xs sort-icon absolute opacity-50 bottom-[45%] right-2 asc"
                                      data-direction="asc">▲</span>
                <a href="javascript:void(0)">
                User ID</a>
                <span class="text-xs sort-icon absolute opacity-50 top-[45%] right-2 desc"
                      data-direction="desc">▼</span>
            </th>
            <th class='pl-2 relative text-center'>
                USDT Address
            </th>
            <th data-column="network" class='pl-2 sortable-column cursor-pointer relative' aria-sort>
                                <span class="text-xs sort-icon absolute opacity-50 bottom-[45%] right-2 asc"
                                      data-direction="asc">▲</span>
                <a href="javascript:void(0)">Network</a>
                <span class="text-xs sort-icon absolute opacity-50 top-[45%] right-2 desc"
                      data-direction="desc">▼</span>
            </th>
            <th data-column="amount" class='pl-2 sortable-column cursor-pointer relative' aria-sort>
                                <span class="text-xs sort-icon absolute opacity-50 bottom-[45%] right-2 asc"
                                      data-direction="asc">▲</span>
                <a href="javascript:void(0)">
                Amount</a>
                <span class="text-xs sort-icon absolute opacity-50 top-[45%] right-2 desc"
                      data-direction="desc">▼</span>
            </th>
            <th data-column="comment" class='pl-2 sortable-column cursor-pointer relative text-center' aria-sort>
                                <span class="text-xs sort-icon absolute opacity-50 bottom-[45%] right-2 asc"
                                      data-direction="asc">▲</span>
                <a href="javascript:void(0)">
                Comment</a>
                <span class="text-xs sort-icon absolute opacity-50 top-[45%] right-2 desc"
                      data-direction="desc">▼</span>
            </th>
            <th data-column="status" class='pl-2 sortable-column cursor-pointer relative text-center' aria-sort>
                                <span class="text-xs sort-icon absolute opacity-50 bottom-[45%] right-2 asc"
                                      data-direction="asc">▲</span>
                <a href="javascript:void(0)">
                Status</a>
                <span class="text-xs sort-icon absolute opacity-50 top-[45%] right-2 desc"
                      data-direction="desc">▼</span>
            </th>
            <th data-column="created_at" class='pl-2 sortable-column cursor-pointer relative text-center' aria-sort>
                                <span class="text-xs sort-icon absolute opacity-50 bottom-[45%] right-2 asc"
                                      data-direction="asc">▲</span>
                <a href="javascript:void(0)">Created Date</a>
                <span class="text-xs sort-icon absolute opacity-50 top-[45%] right-2 desc"
                      data-direction="desc">▼</span>
            </th>
            <th class="before:!bottom-2 after:!bottom-2 pl-2 py-2 cursor-pointer px-1">
            </th>
        </tr>
        </thead>
        <tbody>
        @forelse( $payments as $payment)
            <tr class="my-3 h-12 odd:bg-transparent even:bg-[#142132] text-center" data-id="{{ $payment->id }}">
                <td class="text-center {{ $payment->status == 1 ? 'text-[#04f4f5]' : '' }}">{{ $payment->user_ID }}</td>
                <td>{{ $payment->transaction_ID }}</td>
                <td>{{ $payment->network }}</td>
                <td class=" {{ $payment->status == 1 ? 'text-[#04f4f5]' : '' }}">$ {{ $payment->amount + $payment->gift}} ( {{$payment->gift}})</td>
                <td class="px-3">
                    @if($payment->status == 1)
                        <input type="email" name="comment" value="{{ $payment->comment }}" input-comment
                               class=" bg-transparent text-white placeholder:text-gray-200 placeholder:font-normal w-full mx-1 pl-2 appearance-none outline-none
                                                                                            autofill:bg-yellow-200"
                               placeholder="comment" readonly>

                    @else
                        <input type="email" name="comment" value="" input-comment
                               class=" bg-transparent text-white placeholder:text-gray-200 placeholder:font-normal w-full mx-1 pl-2 appearance-none outline-none
                                                                                            autofill:bg-yellow-200 border border-gray-600 py-1 rounded-lg"
                               placeholder="comment" >
                    @endif
                </td>
                <td>
                    <select name="status" class=" {{ $payment->status == 1 ? 'bg-[#009FB2]' : 'bg-orange-500' }} text-white placeholder:text-gray-400/80 placeholder:font-normal px-3 py-1.5 pl-2
                                                                                                        rounded-lg outline-none autofill:bg-yellow-200 w-max" select-status>
                        <option value="0" {{ $payment->status == 0 ? 'selected' : ''}}>Pending</option>
                        <option value="1" {{ $payment->status == 1 ? 'selected' : ''}}>Paid</option>
                    </select>
                </td>
                <td>{{ $payment->created_at }}</td>
                <td class="w-max">
                    @if($payment->status == 0)
                        <button btn-submit-payment id="all" class="px-4 py-1 rounded-lg text-white hover:bg-[#009FB2] ml-2 bg-blue-600" data-task="all">
                            <a href="javascript:;"><i class="material-symbols-outlined opacity-1 text-xl">check</i></a>
                        </button>
                    @else
                        <button btn-edit-payment id="all" class="px-4 py-1 rounded-lg text-white hover:bg-[#009FB2] ml-2 bg-blue-600" data-task="all">
                            <a href="javascript:;"><i class="material-symbols-outlined opacity-1 text-xl">edit</i></a>
                        </button>
                    @endif

                </td>
            </tr>
        @empty
            <tr>
                <td colspan="8" class="text-center py-4">No data
                    available
                </td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>
<div class="button-table pt-4 text-white text-sm flex justify-between items-center">
    <div class="dataTables_info bg-[#142132] rounded-lg hidden sm:block">
        <p class="p-2">
            Showing
            <span class="font-medium">{{$payments->firstItem()  }}</span>
            to
            <span class="font-medium">{{$payments->lastItem()  }}</span>
            of
            <span class="font-medium">{{$payments->total()  }}</span>
            results
        </p>
    </div>
    <div class="pagination flex items-center pb-3 sm:pb-0">
        {{-- Previous Page Link --}}
        @if ($payments->onFirstPage())
            <span
                class="opacity-50 py-2 px-3 w-max rounded-lg cursor-not-allowed bg-[#142132]">Previous</span>
        @else
            <li class="page-datatable list-none page-item" data-page="{{ $payments->currentPage() -1 }}">
                <a class="hover:bg-[#009FB2] py-2 px-4 w-max rounded-lg bg-[#142132]"
                   href="javascript:void(0)" rel="prev">Previous</a>
            </li>
        @endif


        {{-- Pagination Elements --}}
        @if ($payments->currentPage() > 2)
            <li class="page-datatable list-none" data-page="1">
                <a class="hover:bg-[#009FB2] mx-1 py-2 px-3 w-max rounded-lg bg-[#142132]"
                   href="javascript:void(0)">1</a>
            </li>
            @if ($payments->currentPage() > 3)
                <li class="list-none page-item disabled px-2"><span class="page-link">...</span></li>
            @endif
        @endif

        @for ($i = max(1, $payments->currentPage() - 1); $i <= min($payments->lastPage(), $payments->currentPage() + 1); $i++)
            <li class="page-datatable list-none page-item" data-page="{{ $i }}">
                <a class="mx-1 py-2 px-3 w-max rounded-lg {{ ($payments->currentPage() == $i) ? 'bg-[#009FB2] cursor-not-allowed text-white' : 'bg-[#142132] hover:bg-[#009FB2]' }}"
                   href="javascript:void(0)">{{ $i }}</a>
            </li>
        @endfor

        @if ($payments->currentPage() < $payments->lastPage() - 1)
            @if ($payments->currentPage() < $payments->lastPage() - 2)
                <li class=" list-none page-item disabled px-2"><span
                        class="page-link">...</span></li>
            @endif
            <li class="page-datatable list-none page-item" data-page="{{ $payments->lastPage() }}">
                <a class="hover:bg-[#009FB2] mx-1 py-2 px-3 w-max rounded-lg bg-[#142132]"
                   href="javascript:void(0)">{{ $payments->lastPage() }}</a>
            </li>
        @endif

        {{-- Next Page Link --}}
        @if ($payments->hasMorePages())
            <li class="page-datatable list-none page-item" data-page="{{ $payments->currentPage() +1 }}">
                <a class="hover:bg-[#009FB2] py-2 px-4 w-max rounded-lg bg-[#142132]"
                   href="javascript:void(0)" rel="next">Next</a>
            </li>
        @else
            <span
                class="text-white opacity-50 py-2 px-3 w-max rounded-lg cursor-not-allowed bg-[#142132]">Next</span>
        @endif
    </div>
</div>
