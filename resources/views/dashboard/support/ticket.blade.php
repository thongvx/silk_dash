<div class="flex justify-between items-center w-full mb-3">
    <div class="mb-2" id='title'>
        <h5 class="items-center text-white flex">
            <span>Ticket</span>
        </h5>
    </div>
    <div class="text-white">
        <button
            class="{{request()->get('tab') === 'newticket' ? 'newticket tab-active !text-[#009FB2]' : 'newticket'}}
                   tab-lifted  ticket text-white tab-lifted  bg-[#142132] rounded-lg hover:bg-[#009FB2] cursor-pointer px-2  items-center flex"
            data-content="newticket">
            <i btn-move
               class="material-symbols-outlined opacity-1 text-3xl mr-1">add</i>
            <span class="px-2 py-1">New ticket</span>
        </button>
    </div>
</div>
<div class="px-0 pt-0 overflow-auto max-h-[calc(100vh-20em)] mt-3">
    <table id="live-table" datatable data-page-size="10"
           class="text-sm table-auto border-separate overflow-y-clip w-full min-w-max text-white text-left border-t-0">
        <thead class="sticky top-0 z-10">
        <tr class="bg-[#142132] transition-colors text-md">
            <th class="py-2.5 px-3">Ticket ID</th>
            <th class="py-2.5 px-3">Subject</th>
            <th class="py-2.5 px-3">Topic</th>
            <th class="py-2.5 px-3">Status</th>
            <th class="py-2.5 px-3">Created At</th>
            <th class="py-2.5 px-3">Last Updated</th>
        </tr>
        </thead>
        <tbody>
            @forelse($tickets as $ticket)
                <tr class="my-3 h-12 odd:bg-transparent even:bg-[#142132]">
                    <td class="px-2">{{ $ticket -> id }}</td>
                    <td class="px-2">
                        <a href="{{ route('support.show', ['support' => $ticket->id]) }}">{{ $ticket -> subject }}</a>
                    </td>
                    <td class="px-2">{{ $ticket -> topic }}</td>
                    <td class="px-2">
                        @if($ticket -> status === 'completed')
                            <span class="rounded-lg px-3 py-1 bg-emerald-400 completed">{{ $ticket -> status }}</span>
                        @elseif ($ticket -> status === 'pending')
                            <span class="rounded-lg px-3 py-1 bg-rose-600 pending">{{ $ticket -> status }}</span>
                        @else
                            <span class="rounded-lg px-3 py-1 bg-orange-500 open">{{ $ticket -> status }}</span>
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
    <div class="dataTables_info bg-[#142132] rounded-lg">
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
    <div class="pagination flex items-center">
        {{-- Previous Page Link --}}
        @if ($tickets->onFirstPage())
            <span
                class="text-white opacity-50 py-2 px-3 w-max rounded-lg cursor-not-allowed bg-[#142132]">Previous</span>
        @else
            <li class="page list-none page-item" data-page="{{ $tickets->currentPage() -1 }}">
                <a class="hover:bg-[#009FB2] py-2 px-4 w-max rounded-lg bg-[#142132]"
                   href="javascript:void(0)" rel="prev">Previous</a>
            </li>
        @endif


        {{-- Pagination Elements --}}
        @if ($tickets->currentPage() > 2)
            <li class="page list-none " data-page="1">
                <a class="hover:bg-[#009FB2] text-white mx-1 py-2 px-3 w-max rounded-lg bg-[#142132]"
                   href="javascript:void(0)">1</a>
            </li>
            @if ($tickets->currentPage() > 3)
                <li class="list-none page-item disabled px-2"><span class="page-link">...</span></li>
            @endif
        @endif

        @for ($i = max(1, $tickets->currentPage() - 1); $i <= min($tickets->lastPage(), $tickets->currentPage() + 1); $i++)
            <li class="page list-none page-item" data-page="{{ $i }}">
                <a class="text-white mx-1 py-2 px-3 w-max rounded-lg {{ ($tickets->currentPage() == $i) ? 'bg-[#009FB2] cursor-not-allowed ' : 'bg-[#142132] hover:bg-[#009FB2]' }}"
                   href="javascript:void(0)">{{ $i }}</a>
            </li>
        @endfor

        @if ($tickets->currentPage() < $tickets->lastPage() - 1)
            @if ($tickets->currentPage() < $tickets->lastPage() - 2)
                <li class="list-none page-item disabled px-2"><span class="page-link">...</span></li>
            @endif
            <li class="page list-none page-item" data-page="{{ $tickets->lastPage() }}">
                <a class="hover:bg-[#009FB2] text-white mx-1 py-2 px-3 w-max rounded-lg bg-[#142132]"
                   href="javascript:void(0)">{{ $tickets->lastPage() }}</a>
            </li>
        @endif

        {{-- Next Page Link --}}
        @if ($tickets->hasMorePages())
            <li class="page list-none page-item" data-page="{{ $tickets->currentPage() +1 }}">
                <a class="hover:bg-[#009FB2] py-2 px-4 w-max rounded-lg bg-[#142132]"
                   href="javascript:void(0)" rel="next">Next</a>
            </li>
        @else
            <span class="text-white opacity-50 py-2 px-3 w-max rounded-lg cursor-not-allowed bg-[#142132]">Next</span>
        @endif
    </div>
</div>

