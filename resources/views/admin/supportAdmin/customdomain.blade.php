<div class="px-0 pt-0">
    <div class="relative rounded-xl bg-[#121520]" id="manage-task">
        <div class="pt-4 md:p-4">
            <div class="mb-2 flex justify-between">
                <h5 class="text-white" id="total-encoder">
                    Custom domain
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
                                <th
                                    class="before:!bottom-2 after:!bottom-2 pl-2 py-2 cursor-pointer px-1">
                                    User ID
                                </th>
                                <th
                                    class="before:!bottom-2 after:!bottom-2 pl-2 py-2 cursor-pointer">
                                    Domain
                                </th>
                                <th
                                    class="before:!bottom-2 after:!bottom-2 pl-2 py-2 cursor-pointer">
                                    Created
                                </th>
                                <th
                                    class="before:!bottom-2 after:!bottom-2 pl-2 py-2 cursor-pointer">
                                    Status
                                </th>
                                <th
                                    class="before:!bottom-2 after:!bottom-2 pl-2 py-2 cursor-pointer">
                                    Default
                                </th>
                                <th
                                    class="before:!bottom-2 after:!bottom-2 pl-2 py-2 cursor-pointer">
                                    Action
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="my-3 h-12 odd:bg-transparent even:bg-[#142132]">
                                <td class="userID">100003</td>
                                <td class="domain">abc.com</td>
                                <td>27/12/2023, 16:16:33</td>
                                <td class="Status text-amber-400	">Pending</td>
                                <td>
                                    <div class="flex justify-center items-center">
                                        <div
                                            class="bg-orange-500 rounded-lg text-center px-6 py-1 w-max">
                                            No
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="flex justify-center items-center">
                                        <div
                                            class="bg-rose-500 rounded-lg text-center px-6 py-1 w-max"
                                            onclick="delete_doamin(this)">
                                            <i class="fa fa-trash pe-2"
                                               aria-hidden="true"></i>Delete
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr class="my-3 h-12 odd:bg-transparent even:bg-[#142132]">
                                <td class=" userID">101805</td>
                                <td class=" domain">javgrandpa.site</td>
                                <td>31/12/2023, 21:42:15</td>
                                <td class="Status text-teal-400	">Active</td>
                                <td>
                                    <div class="flex justify-center items-center">
                                        <div
                                            class="bg-teal-500 rounded-lg text-center px-6 py-1 w-max">
                                            Yes
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="flex justify-center items-center">
                                        <div
                                            class="bg-rose-500 rounded-lg text-center px-6 py-1 w-max"
                                            onclick="delete_doamin(this)">
                                            <i class="fa fa-trash pe-2"
                                               aria-hidden="true"></i>Delete
                                        </div>
                                        <div
                                            class="bg-teal-500 rounded-lg text-center px-6 py-1 w-max ml-5"
                                            onclick="make(this)">
                                            <i class="fa fa-tag pe-2"
                                               aria-hidden="true"></i>Make Default
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr class="my-3 h-12 odd:bg-transparent even:bg-[#142132]">
                                <td class=" userID">101930</td>
                                <td class=" domain">yongjav.com</td>
                                <td>08/01/2024, 08:33:07</td>
                                <td class="Status text-amber-400	">Pending</td>
                                <td>
                                    <div class="flex justify-center items-center">
                                        <div
                                            class="bg-orange-500 rounded-lg text-center px-6 py-1 w-max">
                                            No
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="flex justify-center items-center">
                                        <div
                                            class="bg-rose-500 rounded-lg text-center px-6 py-1 w-max"
                                            onclick="delete_doamin(this)">
                                            <i class="fa fa-trash pe-2"
                                               aria-hidden="true"></i>Delete
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr class="my-3 h-12 odd:bg-transparent even:bg-[#142132]">
                                <td class=" userID">101187</td>
                                <td class=" domain">mmtv01.xyz</td>
                                <td>18/01/2024, 14:20:12</td>
                                <td class="Status text-teal-400	">Active</td>
                                <td>
                                    <div class="flex justify-center items-center">
                                        <div
                                            class="bg-teal-500 rounded-lg text-center px-6 py-1 w-max">
                                            Yes
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="flex justify-center items-center">
                                        <div
                                            class="bg-rose-500 rounded-lg text-center px-6 py-1 w-max"
                                            onclick="delete_doamin(this)">
                                            <i class="fa fa-trash pe-2"
                                               aria-hidden="true"></i>Delete
                                        </div>
                                        <div
                                            class="bg-teal-500 rounded-lg text-center px-6 py-1 w-max ml-5"
                                            onclick="make(this)">
                                            <i class="fa fa-tag pe-2"
                                               aria-hidden="true"></i>Make Default
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr class="my-3 h-12 odd:bg-transparent even:bg-[#142132]">
                                <td class=" userID">102092</td>
                                <td class=" domain">freejavguru.top</td>
                                <td>20/01/2024, 23:46:18</td>
                                <td class="Status text-teal-400	">Active</td>
                                <td>
                                    <div class="flex justify-center items-center">
                                        <div
                                            class="bg-teal-500 rounded-lg text-center px-6 py-1 w-max">
                                            Yes
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="flex justify-center items-center">
                                        <div
                                            class="bg-rose-500 rounded-lg text-center px-6 py-1 w-max"
                                            onclick="delete_doamin(this)">
                                            <i class="fa fa-trash pe-2"
                                               aria-hidden="true"></i>Delete
                                        </div>
                                        <div
                                            class="bg-teal-500 rounded-lg text-center px-6 py-1 w-max ml-5"
                                            onclick="make(this)">
                                            <i class="fa fa-tag pe-2"
                                               aria-hidden="true"></i>Make Default
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr class="my-3 h-12 odd:bg-transparent even:bg-[#142132]">
                                <td class=" userID">101140</td>
                                <td class=" domain">emturbojav.com</td>
                                <td>26/01/2024, 18:38:18</td>
                                <td class="Status text-amber-400	">Pending</td>
                                <td>
                                    <div class="flex justify-center items-center">
                                        <div
                                            class="bg-orange-500 rounded-lg text-center px-6 py-1 w-max">
                                            No
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="flex justify-center items-center">
                                        <div
                                            class="bg-rose-500 rounded-lg text-center px-6 py-1 w-max"
                                            onclick="delete_doamin(this)">
                                            <i class="fa fa-trash pe-2"
                                               aria-hidden="true"></i>Delete
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr class="my-3 h-12 odd:bg-transparent even:bg-[#142132]">
                                <td class=" userID">101949</td>
                                <td class=" domain">nandazo.eu.org</td>
                                <td>10/02/2024, 14:13:11</td>
                                <td class="Status text-amber-400	">Pending</td>
                                <td>
                                    <div class="flex justify-center items-center">
                                        <div
                                            class="bg-orange-500 rounded-lg text-center px-6 py-1 w-max">
                                            No
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="flex justify-center items-center">
                                        <div
                                            class="bg-rose-500 rounded-lg text-center px-6 py-1 w-max"
                                            onclick="delete_doamin(this)">
                                            <i class="fa fa-trash pe-2"
                                               aria-hidden="true"></i>Delete
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr class="my-3 h-12 odd:bg-transparent even:bg-[#142132]">
                                <td class=" userID">102231</td>
                                <td class=" domain">alldeepfake.xyz</td>
                                <td>12/02/2024, 03:15:06</td>
                                <td class="Status text-teal-400	">Active</td>
                                <td>
                                    <div class="flex justify-center items-center">
                                        <div
                                            class="bg-teal-500 rounded-lg text-center px-6 py-1 w-max">
                                            Yes
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="flex justify-center items-center">
                                        <div
                                            class="bg-rose-500 rounded-lg text-center px-6 py-1 w-max"
                                            onclick="delete_doamin(this)">
                                            <i class="fa fa-trash pe-2"
                                               aria-hidden="true"></i>Delete
                                        </div>
                                        <div
                                            class="bg-teal-500 rounded-lg text-center px-6 py-1 w-max ml-5"
                                            onclick="make(this)">
                                            <i class="fa fa-tag pe-2"
                                               aria-hidden="true"></i>Make Default
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr class="my-3 h-12 odd:bg-transparent even:bg-[#142132]">
                                <td class=" userID">102288</td>
                                <td class=" domain">
                                    https://dev-galaxy-lifetime.pantheonsite.io
                                </td>
                                <td>15/02/2024, 22:52:29</td>
                                <td class="Status text-amber-400	">Pending</td>
                                <td>
                                    <div class="flex justify-center items-center">
                                        <div
                                            class="bg-orange-500 rounded-lg text-center px-6 py-1 w-max">
                                            No
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="flex justify-center items-center">
                                        <div
                                            class="bg-rose-500 rounded-lg text-center px-6 py-1 w-max"
                                            onclick="delete_doamin(this)">
                                            <i class="fa fa-trash pe-2"
                                               aria-hidden="true"></i>Delete
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr class="my-3 h-12 odd:bg-transparent even:bg-[#142132]">
                                <td class=" userID">102287</td>
                                <td class=" domain">Digital</td>
                                <td>15/02/2024, 23:00:17</td>
                                <td class="Status text-amber-400	">Pending</td>
                                <td>
                                    <div class="flex justify-center items-center">
                                        <div
                                            class="bg-orange-500 rounded-lg text-center px-6 py-1 w-max">
                                            No
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="flex justify-center items-center">
                                        <div
                                            class="bg-rose-500 rounded-lg text-center px-6 py-1 w-max"
                                            onclick="delete_doamin(this)">
                                            <i class="fa fa-trash pe-2"
                                               aria-hidden="true"></i>Delete
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr class="my-3 h-12 odd:bg-transparent even:bg-[#142132]">
                                <td class=" userID">102263</td>
                                <td class=" domain">jasper.ns.cloudflare.com</td>
                                <td>25/02/2024, 02:14:21</td>
                                <td class="Status text-amber-400	">Pending</td>
                                <td>
                                    <div class="flex justify-center items-center">
                                        <div
                                            class="bg-orange-500 rounded-lg text-center px-6 py-1 w-max">
                                            No
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="flex justify-center items-center">
                                        <div
                                            class="bg-rose-500 rounded-lg text-center px-6 py-1 w-max"
                                            onclick="delete_doamin(this)">
                                            <i class="fa fa-trash pe-2"
                                               aria-hidden="true"></i>Delete
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr class="my-3 h-12 odd:bg-transparent even:bg-[#142132]">
                                <td class=" userID">102445</td>
                                <td class=" domain">kinoger.pw</td>
                                <td>01/03/2024, 14:16:15</td>
                                <td class="Status text-teal-400	">Active</td>
                                <td>
                                    <div class="flex justify-center items-center">
                                        <div
                                            class="bg-teal-500 rounded-lg text-center px-6 py-1 w-max">
                                            Yes
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="flex justify-center items-center">
                                        <div
                                            class="bg-rose-500 rounded-lg text-center px-6 py-1 w-max"
                                            onclick="delete_doamin(this)">
                                            <i class="fa fa-trash pe-2"
                                               aria-hidden="true"></i>Delete
                                        </div>
                                        <div
                                            class="bg-teal-500 rounded-lg text-center px-6 py-1 w-max ml-5"
                                            onclick="make(this)">
                                            <i class="fa fa-tag pe-2"
                                               aria-hidden="true"></i>Make Default
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr class="my-3 h-12 odd:bg-transparent even:bg-[#142132]">
                                <td class=" userID">102318</td>
                                <td class=" domain">thefreepornvideo.com</td>
                                <td>06/03/2024, 19:15:01</td>
                                <td class="Status text-amber-400	">Pending</td>
                                <td>
                                    <div class="flex justify-center items-center">
                                        <div
                                            class="bg-orange-500 rounded-lg text-center px-6 py-1 w-max">
                                            No
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="flex justify-center items-center">
                                        <div
                                            class="bg-rose-500 rounded-lg text-center px-6 py-1 w-max"
                                            onclick="delete_doamin(this)">
                                            <i class="fa fa-trash pe-2"
                                               aria-hidden="true"></i>Delete
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

