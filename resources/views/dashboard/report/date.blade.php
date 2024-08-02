<div class="px-0 pt-0 overflow-auto mx-3 my-4">
    <table id="datatable" datatable data-column-table="{{ $column }}"
           data-column-direction="{{ $direction }}"
           class="text-sm table-auto border-separate overflow-y-clip w-full min-w-max text-white text-left border-t-none">
        <thead class="sticky top-0 z-10">
            <tr class="bg-[#142132] transition-colors text-md text-center">
                <th data-column="date" class=' py-2 pl-2 sortable-column-report cursor-pointer relative' aria-sort>
                    <span class="text-xs sort-icon absolute opacity-50 bottom-[45%] right-2 asc"
                          data-direction="asc">▲</span>
                    <a href="javascript:void(0)">Date</a>
                    <span class="text-xs sort-icon absolute opacity-50 top-[45%] right-2 desc"
                          data-direction="desc">▼</span>
                </th>
                <th data-column="views" class='pl-2 pr-6 sortable-column-report cursor-pointer relative' aria-sort>
                    <span class="text-xs sort-icon absolute opacity-50 bottom-[45%] right-2 asc"
                          data-direction="asc">▲</span>
                    <a href="javascript:void(0)">Views</a>
                    <span class="text-xs sort-icon absolute opacity-50 top-[45%] right-2 desc"
                          data-direction="desc">▼</span>
                </th>
                <th data-column="download" class='pl-2 pr-6 sortable-column-report cursor-pointer relative' aria-sort>
                    <span class="text-xs sort-icon absolute opacity-50 bottom-[45%] right-2 asc"
                          data-direction="asc">▲</span>
                    <a href="javascript:void(0)">Download</a>
                    <span class="text-xs sort-icon absolute opacity-50 top-[45%] right-2 desc"
                          data-direction="desc">▼</span>
                </th>
                <th data-column="paid_views" class='pl-2 pr-6 sortable-column-report cursor-pointer relative' aria-sort>
                    <span class="text-xs sort-icon absolute opacity-50 bottom-[45%] right-2 asc"
                          data-direction="asc">▲</span>
                    <a href="javascript:void(0)">Paid Views</a>
                    <span class="text-xs sort-icon absolute opacity-50 top-[45%] right-2 desc"
                          data-direction="desc">▼</span>
                </th>
                <th data-column="vpn_ads_views" class='pl-2 pr-6 sortable-column-report cursor-pointer relative' aria-sort>
                    <span class="text-xs sort-icon absolute opacity-50 bottom-[45%] right-2 asc"
                          data-direction="asc">▲</span>
                    <a href="javascript:void(0)">VPN ADS Views</a>
                    <span class="text-xs sort-icon absolute opacity-50 top-[45%] right-2 desc"
                          data-direction="desc">▼</span>
                </th>
                <th data-column="cpm" class='pl-2 pr-6 sortable-column-report cursor-pointer relative' aria-sort>
                    <span class="text-xs sort-icon absolute opacity-50 bottom-[45%] right-2 asc"
                          data-direction="asc">▲</span>
                    <a href="javascript:void(0)">CPM</a>
                    <span class="text-xs sort-icon absolute opacity-50 top-[45%] right-2 desc"
                          data-direction="desc">▼</span>
                </th>
                <th data-column="revenue" class='pl-2 pr-6 sortable-column-report cursor-pointer relative' aria-sort>
                    <span class="text-xs sort-icon absolute opacity-50 bottom-[45%] right-2 asc"
                          data-direction="asc">▲</span>
                    <a href="javascript:void(0)">Profit</a>
                    <span class="text-xs sort-icon absolute opacity-50 top-[45%] right-2 desc"
                          data-direction="desc">▼</span>
                </th>
            </tr>
        </thead>
        <tbody>
        @forelse ($reports as $report)
            <tr class="my-3 h-12 odd:bg-transparent even:bg-[#142132]">
                <td class="text-center">{{ $report->date }}</td>
                <td class="text-center">{{ $report->views }}</td>
                <td class="text-center">{{ $report->download }}</td>
                <td class="text-center">{{ $report->paid_views }}</td>
                <td class="text-center">{{ $report->vpn_ads_views }}</td>
                <td class="text-center">{{ number_format($report->cpm, 2, '.', ',') }}</td>
                <td class="text-center">{{ number_format($report->revenue, 2, '.', ',') }} $</td>
            </tr>
        @empty
            <tr class="my-3 h-12 bg-[#142132]">
                <td class="text-center" colspan="7">No data available in table</td>
            </tr>
        @endforelse
        </tbody>
        <tfoot>
            <tr class="bg-[#142132] text-center">
                <th class="py-1.5 px-3">Total
                </th>
                <th class="py-1.5 px-3">{{ $reports->sum('views') }}
                </th>
                <th class="py-1.5 px-3">{{ $reports->sum('download') }}
                </th>
                <th class="py-1.5 px-3">{{ $reports->sum('paid_views') }}
                </th>
                <th class="py-1.5 px-3">{{ $reports->sum('vpn_ads_views') }}
                </th>
                <th class="py-1.5 px-3">{{ number_format($reports->avg('cpm'), 2, '.', ',') }}
                </th>
                <th class="py-1.5 px-3">{{ number_format($reports->sum('revenue'), 2, '.', ',') }} $
                </th>
            </tr>
        </tfoot>
    </table>
</div>
