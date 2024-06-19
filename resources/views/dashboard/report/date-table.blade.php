<div class="px-0 pt-0 overflow-auto max-h-[calc(100vh-20em)] mx-3 my-4">
    <table id="live-table" datatable data-page-size="10"
           class="text-sm table-auto border-separate overflow-y-clip w-full min-w-max text-white text-left border-t-none">
        <thead class="sticky top-0 z-10">
        <tr class="bg-[#142132] transition-colors text-md">
            <th class="py-2.5 px-3">Date</th>
            <th class="py-2.5 px-3">Views</th>
            <th class="py-2.5 px-3">Download</th>
            <th class="py-2.5 px-3">Paid Views</th>
            <th class="py-2.5 px-3">VPN ADS Views</th>
            <th class="py-2.5 px-3">Revenue</th>
        </tr>
        </thead>
        <tbody>
        @forelse ($report as $data)
            <tr class="my-3 h-12 bg-[#142132]">
                <td class="text-center">{{ $data->date }}</td>
                <td class="text-center">{{ $data->views }}</td>
                <td class="text-center">{{ $data->download }}</td>
                <td class="text-center">{{ $data->paid_views }}</td>
                <td class="text-center">{{ $data->vpn_ads_views }}</td>
                <td class="text-center">{{ $data->revenue }}</td>
            </tr>
        @empty
            <tr class="my-3 h-12 bg-[#142132]">
                <td class="text-center" colspan="6">No data available in table</td>
            </tr>
        @endforelse
        </tbody>
        <tfoot>
        <tr class="bg-[#142132]">
            <th class="py-1.5 px-3">Total</th>
            <th class="py-1.5 px-3">0</th>
            <th class="py-1.5 px-3">0</th>
            <th class="py-1.5 px-3">0</th>
            <th class="py-1.5 px-3">0</th>
            <th class="py-1.5 px-3">0</th>
        </tr>
        </tfoot>
    </table>
</div>
