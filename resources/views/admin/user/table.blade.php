<div class="px-0 pt-0 overflow-auto h-[calc(100vh-24em)] ">
    <table id="datatable" datatable data-page-size="10" data-column-table="{{request()->get('column') ?? 'created_at'}}"
           data-column-direction="{{request()->get('direction') ?? 'desc'}}"
           class="text-sm border-separate table-auto overflow-y-clip w-full min-w-max text-white text-left !border-t-0">
        <thead class="sticky top-0 z-10">
        <tr class="bg-[#142132] transition-colors text-md ">
            <th data-column="id" class='pl-2 sortable-column cursor-pointer relative  py-2' aria-sort>
                                <span class="text-xs sort-icon absolute opacity-50 bottom-[45%] right-2 asc"
                                      data-direction="asc">▲</span>
                <a href="javascript:void(0)">User ID</a>
                <span class="text-xs sort-icon absolute opacity-50 top-[45%] right-2 desc"
                      data-direction="desc">▼</span>
            </th>
            <th data-column="name" class='pl-2 sortable-column cursor-pointer relative text-center' aria-sort>
                                <span class="text-xs sort-icon absolute opacity-50 bottom-[45%] right-2 asc"
                                      data-direction="asc">▲</span>
                <a href="javascript:void(0)">User Name</a>
                <span class="text-xs sort-icon absolute opacity-50 top-[45%] right-2 desc"
                      data-direction="desc">▼</span>
            </th>
            <th class='pl-2 text-center'>
                Email
            </th>
            <th data-column="video" class='pl-2 sortable-column cursor-pointer relative' aria-sort>
                                <span class="text-xs sort-icon absolute opacity-50 bottom-[45%] right-2 asc"
                                      data-direction="asc">▲</span>
                <a href="javascript:void(0)">Videos</a>
                <span class="text-xs sort-icon absolute opacity-50 top-[45%] right-2 desc"
                      data-direction="desc">▼</span>
            </th>
            <th data-column="play" class='pl-2 sortable-column cursor-pointer relative' aria-sort>
                                <span class="text-xs sort-icon absolute opacity-50 bottom-[45%] right-2 asc"
                                      data-direction="asc">▲</span>
                <a href="javascript:void(0)">Views</a>
                <span class="text-xs sort-icon absolute opacity-50 top-[45%] right-2 desc"
                      data-direction="desc">▼</span>
            </th>
            <th data-column="storage" class='pl-2 sortable-column cursor-pointer relative' aria-sort>
                                <span class="text-xs sort-icon absolute opacity-50 bottom-[45%] right-2 asc"
                                      data-direction="asc">▲</span>
                <a href="javascript:void(0)">Storage</a>
                <span class="text-xs sort-icon absolute opacity-50 top-[45%] right-2 desc"
                      data-direction="desc">▼</span>
            </th>
            <th class='pl-2 text-center'>
                Earning
            </th>
            <th data-column="created_at" class='pl-2 sortable-column cursor-pointer relative' aria-sort>
                                <span class="text-xs sort-icon absolute opacity-50 bottom-[45%] right-2 asc"
                                      data-direction="asc">▲</span>
                <a href="javascript:void(0)">Start Date</a>
                <span   class="text-xs sort-icon absolute opacity-50 top-[45%] right-2 desc"
                        data-direction="desc">▼</span>
            </th>
            <th data-column="last_upload" class='pl-2 sortable-column cursor-pointer relative' aria-sort>
                                <span class="text-xs sort-icon absolute opacity-50 bottom-[45%] right-2 asc"
                                      data-direction="asc">▲</span>
                <a href="javascript:void(0)">last Update</a>
                <span   class="text-xs sort-icon absolute opacity-50 top-[45%] right-2 desc"
                        data-direction="desc">▼</span>
            </th>
            <th class='text-center'>
                Login
            </th>
        </tr>
        </thead>
        <tbody class="text-center">
        @forelse($users as $index => $user)
            @if( $user->active == 1 || $user->active == 2)
                @if($user->encoder_priority >= 5)
                    @php $class = 'text-violet-400'; @endphp
                @else
                    @php $class = ''; @endphp
                @endif
{{--                @switch($user->encoder_priority > 0)--}}
{{--                    @case(1)--}}
{{--                        @php $class = 'text-violet-500'; @endphp--}}
{{--                        @break--}}
{{--                    @case(2)--}}
{{--                        @php $class = 'text-sky-500'; @endphp--}}
{{--                        @break--}}
{{--                    @case(3)--}}
{{--                        @php $class = 'text-indigo-500'; @endphp--}}
{{--                        @break--}}
{{--                    @default--}}
{{--                        @php $class = ''; @endphp--}}
{{--                @endswitch--}}
            @elseif( $user->active == 0)
                @php $class = "text-orange-400" @endphp
            @else
                @php $class = "text-rose-500" @endphp
            @endif


            <tr class="my-3 h-12 odd:bg-transparent even:bg-[#142132]">
                <td class="userID sorting_1 ">{{ $user->id }}</td>
                <td class="user-name col-lg-2 hover:text-[#009FB2] {{ $class }}">
                    <a href="{{ route('user.show', ['user' => $user->id]) }}" target="_blank">{{ $user->name }}</a>
                </td>
                <td class="user-name hover:text-[#009FB2]  {{ $class }}">
                    <a href="{{ route('user.show', ['user' => $user->id]) }}" target="_blank">{{ $user->email }}</a>
                </td>
                <td class="video">{{ !$user->video ? 0 : \App\Models\File::formatNumber($user->video) }}</td>
                <td class="play">{{ !$user->play ? 0 : \App\Models\File::formatNumber($user->play) }}</td>
                <td class="storage">{{ !$user->storage ? 0 : \App\Models\File::formatSizeUnits($user->storage ) }}</td>
                <td class="earning">{{ !$user->earning ? 0 : '$ '.number_format($user->earning) }}</td>
                <td class="max-w-12">{{ $user->created_at->format('Y-m-d H:m:s') }}</td>
                <td class="max-w-12">{{ $user->last_upload ? date("Y-m-d H:m:s", $user->last_upload) : 0 }}</td>
                <td>
                    <a class="rounded-lg px-4 py-1.5 bg-[#009FB2]/40 hover:bg-[#009FB2] text-md text-white"
                       href="https://streamsilk.com/login-as/<?=$user->id?>"
                       target="_blank">Login
                    </a>
                </td>
            </tr>
        @empty
            <tr class="my-3 h-12 bg-[#142132]">
                <td class="text-center" colspan="10">No data available in table</td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>
<div class="button-table pt-4 text-white text-sm flex justify-between items-center">
    <div class="dataTables_info bg-[#142132] rounded-lg hidden sm:block">
        <p class="p-2">
            Showing
            <span class="font-medium">{{$users->firstItem()  }}</span>
            to
            <span class="font-medium">{{$users->lastItem()  }}</span>
            of
            <span class="font-medium">{{$users->total()  }}</span>
            results
        </p>
    </div>
    <div class="pagination flex items-center pb-3 sm:pb-0">
        {{-- Previous Page Link --}}
        @if ($users->onFirstPage())
            <span
                class="opacity-50 py-2 px-3 w-max rounded-lg cursor-not-allowed bg-[#142132]">Previous</span>
        @else
            <li class="page-datatable list-none page-item" data-page="{{ $users->currentPage() -1 }}">
                <a class="hover:bg-[#009FB2] py-2 px-4 w-max rounded-lg bg-[#142132]"
                   href="javascript:void(0)" rel="prev">Previous</a>
            </li>
        @endif


        {{-- Pagination Elements --}}
        @if ($users->currentPage() > 2)
            <li class="page-datatable list-none" data-page="1">
                <a class="hover:bg-[#009FB2] mx-1 py-2 px-3 w-max rounded-lg bg-[#142132]"
                   href="javascript:void(0)">1</a>
            </li>
            @if ($users->currentPage() > 3)
                <li class="list-none page-item disabled px-2"><span class="page-link">...</span></li>
            @endif
        @endif

        @for ($i = max(1, $users->currentPage() - 1); $i <= min($users->lastPage(), $users->currentPage() + 1); $i++)
            <li class="page-datatable list-none page-item" data-page="{{ $i }}">
                <a class="mx-1 py-2 px-3 w-max rounded-lg {{ ($users->currentPage() == $i) ? 'bg-[#009FB2] cursor-not-allowed text-white' : 'bg-[#142132] hover:bg-[#009FB2]' }}"
                   href="javascript:void(0)">{{ $i }}</a>
            </li>
        @endfor

        @if ($users->currentPage() < $users->lastPage() - 1)
            @if ($users->currentPage() < $users->lastPage() - 2)
                <li class=" list-none page-item disabled px-2"><span
                        class="page-link">...</span></li>
            @endif
            <li class="page-datatable list-none page-item" data-page="{{ $users->lastPage() }}">
                <a class="hover:bg-[#009FB2] mx-1 py-2 px-3 w-max rounded-lg bg-[#142132]"
                   href="javascript:void(0)">{{ $users->lastPage() }}</a>
            </li>
        @endif

        {{-- Next Page Link --}}
        @if ($users->hasMorePages())
            <li class="page-datatable list-none page-item" data-page="{{ $users->currentPage() +1 }}">
                <a class="hover:bg-[#009FB2] py-2 px-4 w-max rounded-lg bg-[#142132]"
                   href="javascript:void(0)" rel="next">Next</a>
            </li>
        @else
            <span
                class="text-white opacity-50 py-2 px-3 w-max rounded-lg cursor-not-allowed bg-[#142132]">Next</span>
        @endif
    </div>
</div>
