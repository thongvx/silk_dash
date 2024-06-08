<div class="flex justify-between items-center w-full mb-3">
    <div class="mb-2" id='title'>
        <h5 class="items-center text-transparent flex bg-clip-text bg-gradient-to-r from-purple-500 to-pink-500">
            <span>Ticket</span>
        </h5>
    </div>
    <div class="text-white">
        <button type="button" btn-video disabled class="bg-[#142132] rounded-lg hover:bg-[#009FB2] cursor-pointer px-2  items-center flex"
                title="folder">
            <i btn-move
               class="material-symbols-outlined opacity-1 text-3xl mr-3">add</i>
            <span>Create new ticket</span>
        </button>
    </div>
</div>
<div class="px-0 pt-0 overflow-auto max-h-[calc(100vh-20em)] mt-3">
    <table id="live-table" datatable data-page-size="10"
           class="text-sm table-auto border-separate overflow-y-clip w-full min-w-max text-white text-left border-t-0">
        <thead class="sticky top-0 z-10">
        <tr class="bg-[#142132] transition-colors text-md">
            <th class="py-2.5 px-3">Date</th>
            <th class="py-2.5 px-3">Views</th>
            <th class="py-2.5 px-3">Paid Views</th>
            <th class="py-2.5 px-3">VPN ADS Views</th>
            <th class="py-2.5 px-3">Revenue</th>
        </tr>
        </thead>
        <tbody>
        <tr class="my-3 h-12 bg-[#142132]">
            <td class="text-center" colspan="5">No data available in table</td>
        </tr>
        </tbody>
    </table>
</div>
