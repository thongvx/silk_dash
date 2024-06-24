<div class="text-[#009FB2]">
    <h5 class="text-xl font-semibold">Withdrawals History</h5>
</div>
<div class="px-0 pt-0 overflow-auto max-h-[calc(100vh-20em)] mt-3">
    <table id="live-table" datatable data-page-size="10"
           class="text-sm table-auto border-separate overflow-y-clip w-full min-w-max text-white text-left border-t-0">
        <thead class="sticky top-0 z-10">
        <tr class="bg-[#142132] transition-colors text-md">
            <th class="py-2.5 px-3">Create Date</th>
            <th class="py-2.5 px-3">USDT Address</th>
            <th class="py-2.5 px-3">Amount</th>
            <th class="py-2.5 px-3">Status</th>
        </tr>
        </thead>
        <tbody>
        @forelse($payments as $payment)
            <tr class="my-3 h-12 font-medium odd:bg-transparent even:bg-[#142132] {{ $payment->status == 0 ? 'text-orange-400' : 'text-emerald-500' }}">
                <td class="text-center">{{ $payment->created_at }}</td>
                <td class="text-center">{{ $payment->transaction_ID }}</td>
                <td class="text-center">{{ $payment->amount }}</td>
                <td class="text-center">{{ $payment->status == 0 ? 'pending' : 'paid' }}</td>
            </tr>
        @empty
            <tr class="my-3 h-12 bg-[#142132]">
                <td class="text-center" colspan="4">No data available in table</td>
            </tr>
        @endforelse

        </tbody>
        <tfoot>
        <tr class="bg-[#142132]">
            <th class="py-1.5 px-3">Total</th>
            <th class="py-1.5 px-3">0</th>
            <th class="py-1.5 px-3">0</th>
            <th class="py-1.5 px-3">0</th>
        </tr>
        </tfoot>
    </table>
</div>
