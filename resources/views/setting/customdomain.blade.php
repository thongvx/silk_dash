
<div class="mt-5">
    <div class="flex justify-center">
        <h5 class="text-white md:w-3/4 w-full text-center">
            To add your custom domain, ensure your authoritative DNS servers, or nameservers have been changed. These are your assigned nameservers.
        </h5>
    </div>
    <div class="grid grid-cols-4 gap-4">
        <h5 class="col-span-4 sm:col-span-1 md:text-end text-[#009FB2]">
            Our Namesevers:
        </h5>
        <div class="col-span-4 sm:col-span-3 md:col-span-2 flex flex-col text-white font-normal">
            <h5><span class="pr-5">NS</span>fatima.ns.cloudflare.com</h5>
            <h5><span class="pr-5">NS</span>fatima.ns.cloudflare.com</h5>
        </div>
    </div>
    <form action="" class="grid grid-cols-4 gap-4 mt-6 items-center">
        <h5 class="col-span-4 sm:col-span-1 md:text-end text-[#009FB2]">
            Add Domain:
        </h5>
        <div class="col-span-4 sm:col-span-3 md:col-span-2 flex flex-col text-white font-normal">
            <div class="flex">
                <div class="w-full text-white rounded-lg flex items-center backdrop-blur-3xl px-2 hover:bg-[#142132] bg-[#142132]/70">
                    <input type="text" id="power" name="power" value=""
                           class="py-1.5 bg-transparent text-white placeholder:text-gray-400/80 placeholder:font-normal w-full mx-1 pl-2 appearance-none outline-none autofill:bg-yellow-200"
                           placeholder="Power url">
                </div>
                <div class="text-center ml-3">
                    <button type="submit" class="px-10 py-2 rounded-lg bg-blue-400 text-white" disabled>Add</button>
                </div>
            </div>
        </div>
    </form>
    <div class="px-0 pt-0 overflow-auto mt-6">
        <table id="live-table" datatable data-page-size="10"
               class="text-sm border-separate table-auto w-full min-w-max text-white text-left border-gray-200 border">
            <thead class="sticky top-0 z-10">
                <tr class="bg-[#142132] transition-colors text-md">
                    <th class="py-1.5 pl-3">Domain</th>
                    <th class="py-1.5 pl-3">Created</th>
                    <th class="py-1.5 pl-3">Status</th>
                    <th class="py-1.5 pl-3">Default</th>
                    <th class="py-1.5 pl-3">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="py-1.5 px-2 text-center" colspan="5">No matching records found</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
