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

                </div>
            </div>
        </div>
    </div>
</div>

