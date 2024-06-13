<div class="px-0 pt-0">
    <div class="relative rounded-xl bg-[#121520]" id="manage-task">
        <div class="pt-4 md:p-4">
            <div class="mb-2 flex justify-between">
                <h5 class="text-white" id="total-encoder">
                    Reports
                </h5>
            </div>
            <div class="flex justify-between items-center w-full mb-3">

            </div>
            <div
                class="flex flex-col bg-clip-border rounded-xl text-gray-700 bg-transparent">
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
                                <th class="before:!bottom-2 after:!bottom-2 pl-2 py-2 cursor-pointer px-1">
                                    User ID
                                </th>
                                <th class="before:!bottom-2 after:!bottom-2 pl-2 py-2 cursor-pointer px-1">
                                    User Name
                                </th>
                                <th class="before:!bottom-2 after:!bottom-2 pl-2 py-2 cursor-pointer">
                                    Play
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
                                <tr></tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

