<div class="px-0 pt-0 overflow-auto h-[calc(100vh-24em)] ">
    <table id="datatable" datatable data-page-size="10" data-column-table="{{request()->get('column') ?? 'created_at'}}"
           data-column-direction="{{request()->get('direction') ?? 'desc'}}" data-total="{{$encoders->total()}}"
           class="text-sm border-separate table-auto overflow-y-clip w-full min-w-max text-white text-left !border-t-0">
        <thead class="sticky top-0">
        <tr class="bg-[#142132] transition-colors text-md">
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
            <th class='pl-2 py-2 text-center'>
                Quality
            </th>
            <th class='pl-2 py-2 text-center'>
                Size
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
            <th></th>
        </tr>
        </thead>
        <tbody>
        @php
            function formatSize($bytes) {
                $units = ['B', 'KB', 'MB', 'GB', 'TB'];
                $bytes = max($bytes, 0);
                $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
                $pow = min($pow, count($units) - 1);
                $bytes /= (1 << (10 * $pow));
                return round($bytes, 2) . ' ' . $units[$pow];
            }
        @endphp
        @forelse( $encoders as $index => $encoder)
            @php
                switch ($encoder->status) {
                    case 1:
                    case 3:
                    case 2:
                        $text = 'text-orange-500';
                        break;
                    case 0:
                        $text = 'text-white';
                        break;
                    case 19:
                    case 11:
                        $text = 'text-rose-600';
                        break;
                    default:
                        $text = 'text-teal-500';
                }
                $size = formatSize($encoder->size);
            @endphp
            <tr class="my-3 h-12 odd:bg-transparent even:bg-[#142132] {{ $encoder->slug }}" id="{{ $encoder->id }}">
                <td class="user-name hover:text-[#009FB2] text-center">
                    <a href="{{ route('user.show', ['user' => $encoder->user_id]) }}" target="_blank">{{ $encoder->user_id }}</a>
                </td>
                <td class="pl-2 {{ $text }} slug">{{ $encoder->slug }}</td>
                <td class="pl-2 text-center">{{ $encoder->quality }}</td>
                <td class="pl-2 text-center">{{ $size }}</td>
                <td class="pl-2 status">{{ $encoder->status }}</td>
                <td class="pl-2">{{ $encoder->priority }}</td>
                <td class="pl-2">{{ $encoder->sv_upload }}</td>
                <td class="pl-2 cursor-pointer sv-encoder" btn-retry-encoder data-encoder-id={{ $encoder->id }}>{{ $encoder->sv_encoder }}</td>
                <td class="pl-2 cursor-pointer sv-sto" btn-retry-storage data-storage-id={{ $encoder->id }}>{{ $encoder->sv_storage }}</td>
                <td class="pl-2">
                    {{ $encoder->start_encoder ?? 0 }}
                </td>
                <td class="pl-2">
                    {{ $encoder->finish_encoder ?? 0 }}
                </td>
                <td class="w-max text-center cursor-pointer hover:text-[#009fb2]" btn-remove-encoder data-slug="{{ $encoder->slug }}">
                    <i class="material-symbols-outlined opacity-1">delete</i>
                </td>
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
