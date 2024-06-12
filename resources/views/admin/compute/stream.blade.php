<div class="rounded-xl">
    <div class="relative rounded-xl bg-[#121520]">
        <div class="px-2 pt-4 md:p-4">
            <div class="mb-2 text-sm">
                <h5 class="text-emerald-400">
                    Stream : 50
                </h5>
                <div class="flex justify-end items-center absolute w-full top-2 right-2 md:px-4 px-2">
                    <div class="hover:text-emerald-400 cursor-pointer" title="edit">
                        <a href="javascript:;"><i btn-edit class="material-symbols-outlined opacity-1 text-3xl">add</i>
                            Add</a>
                    </div>
                </div>
            </div>
            <div class="flex flex-col bg-clip-border rounded-xl text-gray-700 bg-transparent">
                <div class="px-0 pt-0">
                    <table id="table-sto" datatable data-page-size="10"
                           class="text-sm border-separate table-auto overflow-y-clip w-full min-w-max text-white text-center !border-t-0">
                        <thead>
                        <tr class="bg-[#142132] transition-colors text-md">
                            <th class="before:!bottom-2 after:!bottom-2 pl-2 py-2 cursor-pointer text-center">
                                ID
                            </th>
                            <th class="before:!bottom-2 after:!bottom-2 pl-2 py-2 cursor-pointer text-center">
                                ID SV
                            </th>
                            <th class="before:!bottom-2 after:!bottom-2 pl-2 py-2 cursor-pointer">
                                Domain
                            </th>
                            <th class="before:!bottom-2 after:!bottom-2 pl-2 py-2">
                                IPV4
                            </th>
                            <th class=" before:!bottom-2 after:!bottom-2 pl-2 py-2 cursor-pointer">
                                Password
                            </th>
                            <th class="before:!bottom-2 after:!bottom-2 pl-2 py-2 cursor-pointer">
                                Space
                            </th>
                            <th class="before:!bottom-2 after:!bottom-2 pl-2 py-2 cursor-pointer">
                                Used Space
                            </th>
                            <th class="before:!bottom-2 after:!bottom-2 pl-2 py-2 cursor-pointer">
                                BW
                            </th>
                            <th class="before:!bottom-2 after:!bottom-2 pl-2 py-2 cursor-pointer">
                                Used BW
                            </th>
                            <th class="before:!bottom-2 after:!bottom-2 pl-2 py-2 cursor-pointer">
                                Provider
                            </th>
                            <th class="before:!bottom-2 after:!bottom-2 pl-2 py-2 cursor-pointer">
                                Status
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr class="my-3 h-12 odd:bg-transparent even:bg-[#142132]">
                            <td class="sorting_1">21</td>
                            <td>10924968</td>
                            <td class="domain" onclick="edit(this)">
                                <a class="text-emerald-400">ss21</a>
                            </td>
                            <td class="ipv4 text-emerald-400">23.106.58.233</td>
                            <td class="ipv6 text-emerald-400">_4Fcm,wNf8p2</td>
                            <td class="space">14000</td>
                            <td>7168</td>
                            <td class="BW">150</td>
                            <td>128.5</td>
                            <td class="provider">LSW_UK</td>
                            <td class="Status d-flex justify-content-center align-items-center">
                                <input navbarfixed="" class="rounded-xl duration-200 ease-in-out after:rounded-full after:shadow-2xl
                                                         after:duration-200 checked:after:translate-x-5 h-5 relative
                                                         float-left mt-1 mx-3 w-12 cursor-pointer appearance-none border
                                                         border-solid border-gray-200 bg-slate-800/10 bg-none bg-contain
                                                         bg-left bg-no-repeat align-top transition-all after:absolute
                                                         after:top-px after:h-4 after:w-4 after:translate-x-0.5 after:bg-white
                                                         after:content-[''] checked:border-green-500/95 checked:bg-green-500/95
                                                         checked:bg-none checked:bg-right" type="checkbox">
                            </td>
                        </tr>
                        <tr class="my-3 h-12 odd:bg-transparent even:bg-[#142132]">
                            <td class="sorting_1">22</td>
                            <td>10924969</td>
                            <td class="domain" onclick="edit(this)">
                                <a class="text-emerald-400">ss22</a>
                            </td>
                            <td class="ipv4 text-emerald-400">23.106.58.232</td>
                            <td class="ipv6 text-emerald-400">5QqX36Dfx%,j</td>
                            <td class="space">14000</td>
                            <td>11264</td>
                            <td class="BW">150</td>
                            <td>134.4</td>
                            <td class="provider">LSW_UK</td>
                            <td class="Status d-flex justify-content-center align-items-center">
                                <input navbarfixed="" class="rounded-xl duration-200 ease-in-out after:rounded-full after:shadow-2xl
                                                         after:duration-200 checked:after:translate-x-5 h-5 relative
                                                         float-left mt-1 mx-3 w-12 cursor-pointer appearance-none border
                                                         border-solid border-gray-200 bg-slate-800/10 bg-none bg-contain
                                                         bg-left bg-no-repeat align-top transition-all after:absolute
                                                         after:top-px after:h-4 after:w-4 after:translate-x-0.5 after:bg-white
                                                         after:content-[''] checked:border-green-500/95 checked:bg-green-500/95
                                                         checked:bg-none checked:bg-right" type="checkbox">
                            </td>
                        </tr>
                        <tr class="my-3 h-12 odd:bg-transparent even:bg-[#142132]">
                            <td class="sorting_1">23</td>
                            <td>10924970</td>
                            <td class="domain" onclick="edit(this)">
                                <a class="text-emerald-400">ss23</a>
                            </td>
                            <td class="ipv4 text-emerald-400">23.106.58.231</td>
                            <td class="ipv6 text-emerald-400">v4r_95MFt~Hy</td>
                            <td class="space">14000</td>
                            <td>13312</td>
                            <td class="BW">150</td>
                            <td>116.2</td>
                            <td class="provider">LSW_UK</td>
                            <td class="Status d-flex justify-content-center align-items-center">
                                <input navbarfixed="" class="rounded-xl duration-200 ease-in-out after:rounded-full after:shadow-2xl
                                                         after:duration-200 checked:after:translate-x-5 h-5 relative
                                                         float-left mt-1 mx-3 w-12 cursor-pointer appearance-none border
                                                         border-solid border-gray-200 bg-slate-800/10 bg-none bg-contain
                                                         bg-left bg-no-repeat align-top transition-all after:absolute
                                                         after:top-px after:h-4 after:w-4 after:translate-x-0.5 after:bg-white
                                                         after:content-[''] checked:border-green-500/95 checked:bg-green-500/95
                                                         checked:bg-none checked:bg-right" type="checkbox">
                            </td>
                        </tr>
                        <tr class="my-3 h-12 odd:bg-transparent even:bg-[#142132]">
                            <td class="sorting_1">24</td>
                            <td>10924971</td>
                            <td class="domain" onclick="edit(this)">
                                <a class="text-emerald-400">ss24</a>
                            </td>
                            <td class="ipv4 text-emerald-400">23.106.58.230</td>
                            <td class="ipv6 text-emerald-400">83k-pKBx^65s</td>
                            <td class="space">14000</td>
                            <td>11264</td>
                            <td class="BW">150</td>
                            <td>129.1</td>
                            <td class="provider">LSW_UK</td>
                            <td class="Status d-flex justify-content-center align-items-center">
                                <input navbarfixed="" class="rounded-xl duration-200 ease-in-out after:rounded-full after:shadow-2xl
                                                         after:duration-200 checked:after:translate-x-5 h-5 relative
                                                         float-left mt-1 mx-3 w-12 cursor-pointer appearance-none border
                                                         border-solid border-gray-200 bg-slate-800/10 bg-none bg-contain
                                                         bg-left bg-no-repeat align-top transition-all after:absolute
                                                         after:top-px after:h-4 after:w-4 after:translate-x-0.5 after:bg-white
                                                         after:content-[''] checked:border-green-500/95 checked:bg-green-500/95
                                                         checked:bg-none checked:bg-right" type="checkbox">
                            </td>
                        </tr>
                        <tr class="my-3 h-12 odd:bg-transparent even:bg-[#142132]">
                            <td class="sorting_1">25</td>
                            <td>10924973</td>
                            <td class="domain" onclick="edit(this)">
                                <a class="text-emerald-400">ss25</a>
                            </td>
                            <td class="ipv4 text-emerald-400">23.106.58.229</td>
                            <td class="ipv6 text-emerald-400">@yS42c53^Mqx</td>
                            <td class="space">14000</td>
                            <td>11264</td>
                            <td class="BW">150</td>
                            <td>131.3</td>
                            <td class="provider">LSW_UK</td>
                            <td class="Status d-flex justify-content-center align-items-center">
                                <input navbarfixed="" class="rounded-xl duration-200 ease-in-out after:rounded-full after:shadow-2xl
                                                         after:duration-200 checked:after:translate-x-5 h-5 relative
                                                         float-left mt-1 mx-3 w-12 cursor-pointer appearance-none border
                                                         border-solid border-gray-200 bg-slate-800/10 bg-none bg-contain
                                                         bg-left bg-no-repeat align-top transition-all after:absolute
                                                         after:top-px after:h-4 after:w-4 after:translate-x-0.5 after:bg-white
                                                         after:content-[''] checked:border-green-500/95 checked:bg-green-500/95
                                                         checked:bg-none checked:bg-right" type="checkbox">
                            </td>
                        </tr>
                        <tr class="my-3 h-12 odd:bg-transparent even:bg-[#142132]">
                            <td class="sorting_1">26</td>
                            <td>648655</td>
                            <td class="domain" onclick="edit(this)">
                                <a class="text-emerald-400">ss26</a>
                            </td>
                            <td class="ipv4 text-emerald-400">23.106.235.198</td>
                            <td class="ipv6 text-emerald-400">^9qSKce5_s6Y</td>
                            <td class="space">14000</td>
                            <td>9011.2</td>
                            <td class="BW">100</td>
                            <td>103</td>
                            <td class="provider">LSW_UK</td>
                            <td class="Status d-flex justify-content-center align-items-center">
                                <input navbarfixed="" class="rounded-xl duration-200 ease-in-out after:rounded-full after:shadow-2xl
                                                         after:duration-200 checked:after:translate-x-5 h-5 relative
                                                         float-left mt-1 mx-3 w-12 cursor-pointer appearance-none border
                                                         border-solid border-gray-200 bg-slate-800/10 bg-none bg-contain
                                                         bg-left bg-no-repeat align-top transition-all after:absolute
                                                         after:top-px after:h-4 after:w-4 after:translate-x-0.5 after:bg-white
                                                         after:content-[''] checked:border-green-500/95 checked:bg-green-500/95
                                                         checked:bg-none checked:bg-right" type="checkbox">
                            </td>
                        </tr>
                        <tr class="my-3 h-12 odd:bg-transparent even:bg-[#142132]">
                            <td class="sorting_1">27</td>
                            <td>648600</td>
                            <td class="domain" onclick="edit(this)">
                                <a class="text-emerald-400">ss27</a>
                            </td>
                            <td class="ipv4 text-emerald-400">23.106.235.87</td>
                            <td class="ipv6 text-emerald-400">chGvVz36x_9-</td>
                            <td class="space">14000</td>
                            <td>13312</td>
                            <td class="BW">100</td>
                            <td>127.3</td>
                            <td class="provider">LSW_UK</td>
                            <td class="Status d-flex justify-content-center align-items-center">
                                <input navbarfixed="" class="rounded-xl duration-200 ease-in-out after:rounded-full after:shadow-2xl
                                                         after:duration-200 checked:after:translate-x-5 h-5 relative
                                                         float-left mt-1 mx-3 w-12 cursor-pointer appearance-none border
                                                         border-solid border-gray-200 bg-slate-800/10 bg-none bg-contain
                                                         bg-left bg-no-repeat align-top transition-all after:absolute
                                                         after:top-px after:h-4 after:w-4 after:translate-x-0.5 after:bg-white
                                                         after:content-[''] checked:border-green-500/95 checked:bg-green-500/95
                                                         checked:bg-none checked:bg-right" type="checkbox">
                            </td>
                        </tr>
                        <tr class="my-3 h-12 odd:bg-transparent even:bg-[#142132]">
                            <td class="sorting_1">29</td>
                            <td>648594</td>
                            <td class="domain" onclick="edit(this)">
                                <a class="text-emerald-400">ss29</a>
                            </td>
                            <td class="ipv4 text-emerald-400">23.106.62.23</td>
                            <td class="ipv6 text-emerald-400">Ra,s8t%3Mj_2</td>
                            <td class="space">14000</td>
                            <td>10137.6</td>
                            <td class="BW">100</td>
                            <td>96.5</td>
                            <td class="provider">LSW_UK</td>
                            <td class="Status d-flex justify-content-center align-items-center">
                                <input navbarfixed="" class="rounded-xl duration-200 ease-in-out after:rounded-full after:shadow-2xl
                                                         after:duration-200 checked:after:translate-x-5 h-5 relative
                                                         float-left mt-1 mx-3 w-12 cursor-pointer appearance-none border
                                                         border-solid border-gray-200 bg-slate-800/10 bg-none bg-contain
                                                         bg-left bg-no-repeat align-top transition-all after:absolute
                                                         after:top-px after:h-4 after:w-4 after:translate-x-0.5 after:bg-white
                                                         after:content-[''] checked:border-green-500/95 checked:bg-green-500/95
                                                         checked:bg-none checked:bg-right" type="checkbox">
                            </td>
                        </tr>
                        <tr class="my-3 h-12 odd:bg-transparent even:bg-[#142132]">
                            <td class="sorting_1">30</td>
                            <td>648593</td>
                            <td class="domain" onclick="edit(this)">
                                <a class="text-emerald-400">ss30</a>
                            </td>
                            <td class="ipv4 text-emerald-400">23.106.235.79</td>
                            <td class="ipv6 text-emerald-400">^2Y%9Q~5bjth</td>
                            <td class="space">14000</td>
                            <td>11264</td>
                            <td class="BW">100</td>
                            <td>129.5</td>
                            <td class="provider">LSW_UK</td>
                            <td class="Status d-flex justify-content-center align-items-center">
                                <input navbarfixed="" class="rounded-xl duration-200 ease-in-out after:rounded-full after:shadow-2xl
                                                         after:duration-200 checked:after:translate-x-5 h-5 relative
                                                         float-left mt-1 mx-3 w-12 cursor-pointer appearance-none border
                                                         border-solid border-gray-200 bg-slate-800/10 bg-none bg-contain
                                                         bg-left bg-no-repeat align-top transition-all after:absolute
                                                         after:top-px after:h-4 after:w-4 after:translate-x-0.5 after:bg-white
                                                         after:content-[''] checked:border-green-500/95 checked:bg-green-500/95
                                                         checked:bg-none checked:bg-right" type="checkbox">
                            </td>
                        </tr>
                        <tr class="my-3 h-12 odd:bg-transparent even:bg-[#142132]">
                            <td class="sorting_1">31</td>
                            <td>67212</td>
                            <td class="domain" onclick="edit(this)">
                                <a class="text-emerald-400">ss31</a>
                            </td>
                            <td class="ipv4 text-emerald-400">23.106.62.25</td>
                            <td class="ipv6 text-emerald-400">4p85qRd~z^V@</td>
                            <td class="space">14000</td>
                            <td>12288</td>
                            <td class="BW">100</td>
                            <td>132.1</td>
                            <td class="provider">LSW_UK</td>
                            <td class="Status d-flex justify-content-center align-items-center">
                                <input navbarfixed="" class="rounded-xl duration-200 ease-in-out after:rounded-full after:shadow-2xl
                                                         after:duration-200 checked:after:translate-x-5 h-5 relative
                                                         float-left mt-1 mx-3 w-12 cursor-pointer appearance-none border
                                                         border-solid border-gray-200 bg-slate-800/10 bg-none bg-contain
                                                         bg-left bg-no-repeat align-top transition-all after:absolute
                                                         after:top-px after:h-4 after:w-4 after:translate-x-0.5 after:bg-white
                                                         after:content-[''] checked:border-green-500/95 checked:bg-green-500/95
                                                         checked:bg-none checked:bg-right" type="checkbox">
                            </td>
                        </tr>
                        <tr class="my-3 h-12 odd:bg-transparent even:bg-[#142132]">
                            <td class="sorting_1">32</td>
                            <td>67201</td>
                            <td class="domain" onclick="edit(this)">
                                <a class="text-emerald-400">ss32</a>
                            </td>
                            <td class="ipv4 text-emerald-400">23.106.62.18</td>
                            <td class="ipv6 text-emerald-400">@8kp-4vzVK3T</td>
                            <td class="space">14000</td>
                            <td>13312</td>
                            <td class="BW">100</td>
                            <td>120.4</td>
                            <td class="provider">LSW_UK</td>
                            <td class="Status d-flex justify-content-center align-items-center">
                                <input navbarfixed="" class="rounded-xl duration-200 ease-in-out after:rounded-full after:shadow-2xl
                                                         after:duration-200 checked:after:translate-x-5 h-5 relative
                                                         float-left mt-1 mx-3 w-12 cursor-pointer appearance-none border
                                                         border-solid border-gray-200 bg-slate-800/10 bg-none bg-contain
                                                         bg-left bg-no-repeat align-top transition-all after:absolute
                                                         after:top-px after:h-4 after:w-4 after:translate-x-0.5 after:bg-white
                                                         after:content-[''] checked:border-green-500/95 checked:bg-green-500/95
                                                         checked:bg-none checked:bg-right" type="checkbox">
                            </td>
                        </tr>
                        <tr class="my-3 h-12 odd:bg-transparent even:bg-[#142132]">
                            <td class="sorting_1">34</td>
                            <td>67195</td>
                            <td class="domain" onclick="edit(this)">
                                <a class="text-emerald-400">ss34</a>
                            </td>
                            <td class="ipv4 text-emerald-400">23.106.235.77</td>
                            <td class="ipv6 text-emerald-400">@dq4eX6.kU5w</td>
                            <td class="space">14000</td>
                            <td>12288</td>
                            <td class="BW">100</td>
                            <td>132</td>
                            <td class="provider">LSW_UK</td>
                            <td class="Status d-flex justify-content-center align-items-center">
                                <input navbarfixed="" class="rounded-xl duration-200 ease-in-out after:rounded-full after:shadow-2xl
                                                         after:duration-200 checked:after:translate-x-5 h-5 relative
                                                         float-left mt-1 mx-3 w-12 cursor-pointer appearance-none border
                                                         border-solid border-gray-200 bg-slate-800/10 bg-none bg-contain
                                                         bg-left bg-no-repeat align-top transition-all after:absolute
                                                         after:top-px after:h-4 after:w-4 after:translate-x-0.5 after:bg-white
                                                         after:content-[''] checked:border-green-500/95 checked:bg-green-500/95
                                                         checked:bg-none checked:bg-right" type="checkbox">
                            </td>
                        </tr>
                        <tr class="my-3 h-12 odd:bg-transparent even:bg-[#142132]">
                            <td class="sorting_1">35</td>
                            <td>21531</td>
                            <td class="domain" onclick="edit(this)">
                                <a class="text-emerald-400">ss35</a>
                            </td>
                            <td class="ipv4 text-emerald-400">95.168.180.72</td>
                            <td class="ipv6 text-emerald-400">vB3d~m8y@-R4</td>
                            <td class="space">14000</td>
                            <td>13312</td>
                            <td class="BW">100</td>
                            <td>123.8</td>
                            <td class="provider">LSW_UK</td>
                            <td class="Status d-flex justify-content-center align-items-center">
                                <input navbarfixed="" class="rounded-xl duration-200 ease-in-out after:rounded-full after:shadow-2xl
                                                         after:duration-200 checked:after:translate-x-5 h-5 relative
                                                         float-left mt-1 mx-3 w-12 cursor-pointer appearance-none border
                                                         border-solid border-gray-200 bg-slate-800/10 bg-none bg-contain
                                                         bg-left bg-no-repeat align-top transition-all after:absolute
                                                         after:top-px after:h-4 after:w-4 after:translate-x-0.5 after:bg-white
                                                         after:content-[''] checked:border-green-500/95 checked:bg-green-500/95
                                                         checked:bg-none checked:bg-right" type="checkbox">
                            </td>
                        </tr>
                        <tr class="my-3 h-12 odd:bg-transparent even:bg-[#142132]">
                            <td class="sorting_1">36</td>
                            <td>648574</td>
                            <td class="domain" onclick="edit(this)">
                                <a class="text-emerald-400">ss36</a>
                            </td>
                            <td class="ipv4 text-emerald-400">23.106.235.89</td>
                            <td class="ipv6 text-emerald-400">B4fv26_nyX~s</td>
                            <td class="space">14000</td>
                            <td>13312</td>
                            <td class="BW">100</td>
                            <td>123.1</td>
                            <td class="provider">LSW_UK</td>
                            <td class="Status d-flex justify-content-center align-items-center">
                                <input navbarfixed="" class="rounded-xl duration-200 ease-in-out after:rounded-full after:shadow-2xl
                                                         after:duration-200 checked:after:translate-x-5 h-5 relative
                                                         float-left mt-1 mx-3 w-12 cursor-pointer appearance-none border
                                                         border-solid border-gray-200 bg-slate-800/10 bg-none bg-contain
                                                         bg-left bg-no-repeat align-top transition-all after:absolute
                                                         after:top-px after:h-4 after:w-4 after:translate-x-0.5 after:bg-white
                                                         after:content-[''] checked:border-green-500/95 checked:bg-green-500/95
                                                         checked:bg-none checked:bg-right" type="checkbox">
                            </td>
                        </tr>
                        <tr class="my-3 h-12 odd:bg-transparent even:bg-[#142132]">
                            <td class="sorting_1">37</td>
                            <td>648570</td>
                            <td class="domain" onclick="edit(this)">
                                <a class="text-emerald-400">ss37</a>
                            </td>
                            <td class="ipv4 text-emerald-400">23.106.235.76</td>
                            <td class="ipv6 text-emerald-400">T3k6@v8ybG2~</td>
                            <td class="space">14000</td>
                            <td>11264</td>
                            <td class="BW">100</td>
                            <td>132.9</td>
                            <td class="provider">LSW_UK</td>
                            <td class="Status d-flex justify-content-center align-items-center">
                                <input navbarfixed="" class="rounded-xl duration-200 ease-in-out after:rounded-full after:shadow-2xl
                                                         after:duration-200 checked:after:translate-x-5 h-5 relative
                                                         float-left mt-1 mx-3 w-12 cursor-pointer appearance-none border
                                                         border-solid border-gray-200 bg-slate-800/10 bg-none bg-contain
                                                         bg-left bg-no-repeat align-top transition-all after:absolute
                                                         after:top-px after:h-4 after:w-4 after:translate-x-0.5 after:bg-white
                                                         after:content-[''] checked:border-green-500/95 checked:bg-green-500/95
                                                         checked:bg-none checked:bg-right" type="checkbox">
                            </td>
                        </tr>
                        <tr class="my-3 h-12 odd:bg-transparent even:bg-[#142132]">
                            <td class="sorting_1">38</td>
                            <td>648568</td>
                            <td class="domain" onclick="edit(this)">
                                <a class="text-emerald-400">ss38</a>
                            </td>
                            <td class="ipv4 text-emerald-400">23.106.235.90</td>
                            <td class="ipv6 text-emerald-400">D-6kX%42Fjfe</td>
                            <td class="space">14000</td>
                            <td>13312</td>
                            <td class="BW">100</td>
                            <td>126.7</td>
                            <td class="provider">LSW_UK</td>
                            <td class="Status d-flex justify-content-center align-items-center">
                                <input navbarfixed="" class="rounded-xl duration-200 ease-in-out after:rounded-full after:shadow-2xl
                                                         after:duration-200 checked:after:translate-x-5 h-5 relative
                                                         float-left mt-1 mx-3 w-12 cursor-pointer appearance-none border
                                                         border-solid border-gray-200 bg-slate-800/10 bg-none bg-contain
                                                         bg-left bg-no-repeat align-top transition-all after:absolute
                                                         after:top-px after:h-4 after:w-4 after:translate-x-0.5 after:bg-white
                                                         after:content-[''] checked:border-green-500/95 checked:bg-green-500/95
                                                         checked:bg-none checked:bg-right" type="checkbox">
                            </td>
                        </tr>
                        <tr class="my-3 h-12 odd:bg-transparent even:bg-[#142132]">
                            <td class="sorting_1">39</td>
                            <td>648563</td>
                            <td class="domain" onclick="edit(this)">
                                <a class="text-emerald-400">ss39</a>
                            </td>
                            <td class="ipv4 text-emerald-400">23.106.235.85</td>
                            <td class="ipv6 text-emerald-400">pGJq28x^5d,~</td>
                            <td class="space">14000</td>
                            <td>12288</td>
                            <td class="BW">100</td>
                            <td>130.4</td>
                            <td class="provider">LSW_UK</td>
                            <td class="Status d-flex justify-content-center align-items-center">
                                <input navbarfixed="" class="rounded-xl duration-200 ease-in-out after:rounded-full after:shadow-2xl
                                                         after:duration-200 checked:after:translate-x-5 h-5 relative
                                                         float-left mt-1 mx-3 w-12 cursor-pointer appearance-none border
                                                         border-solid border-gray-200 bg-slate-800/10 bg-none bg-contain
                                                         bg-left bg-no-repeat align-top transition-all after:absolute
                                                         after:top-px after:h-4 after:w-4 after:translate-x-0.5 after:bg-white
                                                         after:content-[''] checked:border-green-500/95 checked:bg-green-500/95
                                                         checked:bg-none checked:bg-right" type="checkbox">
                            </td>
                        </tr>
                        <tr class="my-3 h-12 odd:bg-transparent even:bg-[#142132]">
                            <td class="sorting_1">40</td>
                            <td>648561</td>
                            <td class="domain" onclick="edit(this)">
                                <a class="text-emerald-400">ss40</a>
                            </td>
                            <td class="ipv4 text-emerald-400">23.106.236.56</td>
                            <td class="ipv6 text-emerald-400">cC,v@j~3t52Z</td>
                            <td class="space">14000</td>
                            <td>12288</td>
                            <td class="BW">100</td>
                            <td>131.4</td>
                            <td class="provider">LSW_UK</td>
                            <td class="Status d-flex justify-content-center align-items-center">
                                <input navbarfixed="" class="rounded-xl duration-200 ease-in-out after:rounded-full after:shadow-2xl
                                                         after:duration-200 checked:after:translate-x-5 h-5 relative
                                                         float-left mt-1 mx-3 w-12 cursor-pointer appearance-none border
                                                         border-solid border-gray-200 bg-slate-800/10 bg-none bg-contain
                                                         bg-left bg-no-repeat align-top transition-all after:absolute
                                                         after:top-px after:h-4 after:w-4 after:translate-x-0.5 after:bg-white
                                                         after:content-[''] checked:border-green-500/95 checked:bg-green-500/95
                                                         checked:bg-none checked:bg-right" type="checkbox">
                            </td>
                        </tr>
                        <tr class="my-3 h-12 odd:bg-transparent even:bg-[#142132]">
                            <td class="sorting_1">41</td>
                            <td>648558</td>
                            <td class="domain" onclick="edit(this)">
                                <a class="text-emerald-400">ss41</a>
                            </td>
                            <td class="ipv4 text-emerald-400">23.106.235.82</td>
                            <td class="ipv6 text-emerald-400">6mrfUh94F%8@</td>
                            <td class="space">14000</td>
                            <td>13312</td>
                            <td class="BW">100</td>
                            <td>125.8</td>
                            <td class="provider">LSW_UK</td>
                            <td class="Status d-flex justify-content-center align-items-center">
                                <input navbarfixed="" class="rounded-xl duration-200 ease-in-out after:rounded-full after:shadow-2xl
                                                         after:duration-200 checked:after:translate-x-5 h-5 relative
                                                         float-left mt-1 mx-3 w-12 cursor-pointer appearance-none border
                                                         border-solid border-gray-200 bg-slate-800/10 bg-none bg-contain
                                                         bg-left bg-no-repeat align-top transition-all after:absolute
                                                         after:top-px after:h-4 after:w-4 after:translate-x-0.5 after:bg-white
                                                         after:content-[''] checked:border-green-500/95 checked:bg-green-500/95
                                                         checked:bg-none checked:bg-right" type="checkbox">
                            </td>
                        </tr>
                        <tr class="my-3 h-12 odd:bg-transparent even:bg-[#142132]">
                            <td class="sorting_1">42</td>
                            <td>648557</td>
                            <td class="domain" onclick="edit(this)">
                                <a class="text-emerald-400">ss42</a>
                            </td>
                            <td class="ipv4 text-emerald-400">23.106.235.78</td>
                            <td class="ipv6 text-emerald-400">_arm4XR2Z9%p</td>
                            <td class="space">14000</td>
                            <td>13312</td>
                            <td class="BW">100</td>
                            <td>128.8</td>
                            <td class="provider">LSW_UK</td>
                            <td class="Status d-flex justify-content-center align-items-center">
                                <input navbarfixed="" class="rounded-xl duration-200 ease-in-out after:rounded-full after:shadow-2xl
                                                         after:duration-200 checked:after:translate-x-5 h-5 relative
                                                         float-left mt-1 mx-3 w-12 cursor-pointer appearance-none border
                                                         border-solid border-gray-200 bg-slate-800/10 bg-none bg-contain
                                                         bg-left bg-no-repeat align-top transition-all after:absolute
                                                         after:top-px after:h-4 after:w-4 after:translate-x-0.5 after:bg-white
                                                         after:content-[''] checked:border-green-500/95 checked:bg-green-500/95
                                                         checked:bg-none checked:bg-right" type="checkbox">
                            </td>
                        </tr>
                        <tr class="my-3 h-12 odd:bg-transparent even:bg-[#142132]">
                            <td class="sorting_1">43</td>
                            <td>648556</td>
                            <td class="domain" onclick="edit(this)">
                                <a class="text-emerald-400">ss43</a>
                            </td>
                            <td class="ipv4 text-emerald-400">23.106.235.84</td>
                            <td class="ipv6 text-emerald-400">u_a5njv43JX-</td>
                            <td class="space">14000</td>
                            <td>13312</td>
                            <td class="BW">100</td>
                            <td>125.2</td>
                            <td class="provider">LSW_UK</td>
                            <td class="Status d-flex justify-content-center align-items-center">
                                <input navbarfixed="" class="rounded-xl duration-200 ease-in-out after:rounded-full after:shadow-2xl
                                                         after:duration-200 checked:after:translate-x-5 h-5 relative
                                                         float-left mt-1 mx-3 w-12 cursor-pointer appearance-none border
                                                         border-solid border-gray-200 bg-slate-800/10 bg-none bg-contain
                                                         bg-left bg-no-repeat align-top transition-all after:absolute
                                                         after:top-px after:h-4 after:w-4 after:translate-x-0.5 after:bg-white
                                                         after:content-[''] checked:border-green-500/95 checked:bg-green-500/95
                                                         checked:bg-none checked:bg-right" type="checkbox">
                            </td>
                        </tr>
                        <tr class="my-3 h-12 odd:bg-transparent even:bg-[#142132]">
                            <td class="sorting_1">55</td>
                            <td>26383</td>
                            <td class="domain" onclick="edit(this)">
                                <a class="text-emerald-400">ss55</a>
                            </td>
                            <td class="ipv4 text-emerald-400">23.19.60.135</td>
                            <td class="ipv6 text-emerald-400">DEvw83,m9-bY</td>
                            <td class="space">14000</td>
                            <td>13312</td>
                            <td class="BW">150</td>
                            <td>119.2</td>
                            <td class="provider">LSW_UK</td>
                            <td class="Status d-flex justify-content-center align-items-center">
                                <input navbarfixed="" class="rounded-xl duration-200 ease-in-out after:rounded-full after:shadow-2xl
                                                         after:duration-200 checked:after:translate-x-5 h-5 relative
                                                         float-left mt-1 mx-3 w-12 cursor-pointer appearance-none border
                                                         border-solid border-gray-200 bg-slate-800/10 bg-none bg-contain
                                                         bg-left bg-no-repeat align-top transition-all after:absolute
                                                         after:top-px after:h-4 after:w-4 after:translate-x-0.5 after:bg-white
                                                         after:content-[''] checked:border-green-500/95 checked:bg-green-500/95
                                                         checked:bg-none checked:bg-right" type="checkbox">
                            </td>
                        </tr>
                        <tr class="my-3 h-12 odd:bg-transparent even:bg-[#142132]">
                            <td class="sorting_1">76</td>
                            <td>627990</td>
                            <td class="domain" onclick="edit(this)">
                                <a class="text-emerald-400">ss76</a>
                            </td>
                            <td class="ipv4 text-emerald-400">23.106.39.210</td>
                            <td class="ipv6 text-emerald-400">jMsy2%45~gAq</td>
                            <td class="space">14000</td>
                            <td>9830.4</td>
                            <td class="BW">100</td>
                            <td>126.6</td>
                            <td class="provider">LSW_UK</td>
                            <td class="Status d-flex justify-content-center align-items-center">
                                <input navbarfixed="" class="rounded-xl duration-200 ease-in-out after:rounded-full after:shadow-2xl
                                                         after:duration-200 checked:after:translate-x-5 h-5 relative
                                                         float-left mt-1 mx-3 w-12 cursor-pointer appearance-none border
                                                         border-solid border-gray-200 bg-slate-800/10 bg-none bg-contain
                                                         bg-left bg-no-repeat align-top transition-all after:absolute
                                                         after:top-px after:h-4 after:w-4 after:translate-x-0.5 after:bg-white
                                                         after:content-[''] checked:border-green-500/95 checked:bg-green-500/95
                                                         checked:bg-none checked:bg-right" type="checkbox">
                            </td>
                        </tr>
                        <tr class="my-3 h-12 odd:bg-transparent even:bg-[#142132]">
                            <td class="sorting_1">77</td>
                            <td>87260</td>
                            <td class="domain" onclick="edit(this)">
                                <a class="text-emerald-400">ss77</a>
                            </td>
                            <td class="ipv4 text-emerald-400">23.106.36.115</td>
                            <td class="ipv6 text-emerald-400">Za2W9w4chb~,</td>
                            <td class="space">14000</td>
                            <td>11264</td>
                            <td class="BW">100</td>
                            <td>125.2</td>
                            <td class="provider">LSW_UK</td>
                            <td class="Status d-flex justify-content-center align-items-center">
                                <input navbarfixed="" class="rounded-xl duration-200 ease-in-out after:rounded-full after:shadow-2xl
                                                         after:duration-200 checked:after:translate-x-5 h-5 relative
                                                         float-left mt-1 mx-3 w-12 cursor-pointer appearance-none border
                                                         border-solid border-gray-200 bg-slate-800/10 bg-none bg-contain
                                                         bg-left bg-no-repeat align-top transition-all after:absolute
                                                         after:top-px after:h-4 after:w-4 after:translate-x-0.5 after:bg-white
                                                         after:content-[''] checked:border-green-500/95 checked:bg-green-500/95
                                                         checked:bg-none checked:bg-right" type="checkbox">
                            </td>
                        </tr>
                        <tr class="my-3 h-12 odd:bg-transparent even:bg-[#142132]">
                            <td class="sorting_1">78</td>
                            <td>107227</td>
                            <td class="domain" onclick="edit(this)">
                                <a class="text-emerald-400">ss78</a>
                            </td>
                            <td class="ipv4 text-emerald-400">23.106.36.116</td>
                            <td class="ipv6 text-emerald-400">y-b4H2pW,9Bc</td>
                            <td class="space">14000</td>
                            <td>10240</td>
                            <td class="BW">100</td>
                            <td>127</td>
                            <td class="provider">LSW_UK</td>
                            <td class="Status d-flex justify-content-center align-items-center">
                                <input navbarfixed="" class="rounded-xl duration-200 ease-in-out after:rounded-full after:shadow-2xl
                                                         after:duration-200 checked:after:translate-x-5 h-5 relative
                                                         float-left mt-1 mx-3 w-12 cursor-pointer appearance-none border
                                                         border-solid border-gray-200 bg-slate-800/10 bg-none bg-contain
                                                         bg-left bg-no-repeat align-top transition-all after:absolute
                                                         after:top-px after:h-4 after:w-4 after:translate-x-0.5 after:bg-white
                                                         after:content-[''] checked:border-green-500/95 checked:bg-green-500/95
                                                         checked:bg-none checked:bg-right" type="checkbox">
                            </td>
                        </tr>
                        <tr class="my-3 h-12 odd:bg-transparent even:bg-[#142132]">
                            <td class="sorting_1">80</td>
                            <td>631014</td>
                            <td class="domain" onclick="edit(this)">
                                <a class="text-emerald-400">ss80</a>
                            </td>
                            <td class="ipv4 text-emerald-400">23.19.60.132</td>
                            <td class="ipv6 text-emerald-400">mx5kD_8v6.%T</td>
                            <td class="space">14000</td>
                            <td>11264</td>
                            <td class="BW">100</td>
                            <td>130.6</td>
                            <td class="provider">LSW_UK</td>
                            <td class="Status d-flex justify-content-center align-items-center">
                                <input navbarfixed="" class="rounded-xl duration-200 ease-in-out after:rounded-full after:shadow-2xl
                                                         after:duration-200 checked:after:translate-x-5 h-5 relative
                                                         float-left mt-1 mx-3 w-12 cursor-pointer appearance-none border
                                                         border-solid border-gray-200 bg-slate-800/10 bg-none bg-contain
                                                         bg-left bg-no-repeat align-top transition-all after:absolute
                                                         after:top-px after:h-4 after:w-4 after:translate-x-0.5 after:bg-white
                                                         after:content-[''] checked:border-green-500/95 checked:bg-green-500/95
                                                         checked:bg-none checked:bg-right" type="checkbox">
                            </td>
                        </tr>
                        <tr class="my-3 h-12 odd:bg-transparent even:bg-[#142132]">
                            <td class="sorting_1">81</td>
                            <td>631021</td>
                            <td class="domain" onclick="edit(this)">
                                <a class="text-emerald-400">ss81</a>
                            </td>
                            <td class="ipv4 text-emerald-400">23.106.63.136</td>
                            <td class="ipv6 text-emerald-400">wjB9,2U8ye.f</td>
                            <td class="space">14000</td>
                            <td>10035.2</td>
                            <td class="BW">100</td>
                            <td>122.5</td>
                            <td class="provider">LSW_UK</td>
                            <td class="Status d-flex justify-content-center align-items-center">
                                <input navbarfixed="" class="rounded-xl duration-200 ease-in-out after:rounded-full after:shadow-2xl
                                                         after:duration-200 checked:after:translate-x-5 h-5 relative
                                                         float-left mt-1 mx-3 w-12 cursor-pointer appearance-none border
                                                         border-solid border-gray-200 bg-slate-800/10 bg-none bg-contain
                                                         bg-left bg-no-repeat align-top transition-all after:absolute
                                                         after:top-px after:h-4 after:w-4 after:translate-x-0.5 after:bg-white
                                                         after:content-[''] checked:border-green-500/95 checked:bg-green-500/95
                                                         checked:bg-none checked:bg-right" type="checkbox">
                            </td>
                        </tr>
                        <tr class="my-3 h-12 odd:bg-transparent even:bg-[#142132]">
                            <td class="sorting_1">82</td>
                            <td>631023</td>
                            <td class="domain" onclick="edit(this)">
                                <a class="text-emerald-400">ss82</a>
                            </td>
                            <td class="ipv4 text-emerald-400">23.106.63.106</td>
                            <td class="ipv6 text-emerald-400">2GCax.fR6@y8</td>
                            <td class="space">14000</td>
                            <td>10240</td>
                            <td class="BW">100</td>
                            <td>127.7</td>
                            <td class="provider">LSW_UK</td>
                            <td class="Status d-flex justify-content-center align-items-center">
                                <input navbarfixed="" class="rounded-xl duration-200 ease-in-out after:rounded-full after:shadow-2xl
                                                         after:duration-200 checked:after:translate-x-5 h-5 relative
                                                         float-left mt-1 mx-3 w-12 cursor-pointer appearance-none border
                                                         border-solid border-gray-200 bg-slate-800/10 bg-none bg-contain
                                                         bg-left bg-no-repeat align-top transition-all after:absolute
                                                         after:top-px after:h-4 after:w-4 after:translate-x-0.5 after:bg-white
                                                         after:content-[''] checked:border-green-500/95 checked:bg-green-500/95
                                                         checked:bg-none checked:bg-right" type="checkbox">
                            </td>
                        </tr>
                        <tr class="my-3 h-12 odd:bg-transparent even:bg-[#142132]">
                            <td class="sorting_1">83</td>
                            <td>631015</td>
                            <td class="domain" onclick="edit(this)">
                                <a class="text-emerald-400">ss83</a>
                            </td>
                            <td class="ipv4 text-emerald-400">23.106.63.131</td>
                            <td class="ipv6 text-emerald-400">hs9%^JU3a5~u</td>
                            <td class="space">14000</td>
                            <td>11264</td>
                            <td class="BW">100</td>
                            <td>133.3</td>
                            <td class="provider">LSW_UK</td>
                            <td class="Status d-flex justify-content-center align-items-center">
                                <input navbarfixed="" class="rounded-xl duration-200 ease-in-out after:rounded-full after:shadow-2xl
                                                         after:duration-200 checked:after:translate-x-5 h-5 relative
                                                         float-left mt-1 mx-3 w-12 cursor-pointer appearance-none border
                                                         border-solid border-gray-200 bg-slate-800/10 bg-none bg-contain
                                                         bg-left bg-no-repeat align-top transition-all after:absolute
                                                         after:top-px after:h-4 after:w-4 after:translate-x-0.5 after:bg-white
                                                         after:content-[''] checked:border-green-500/95 checked:bg-green-500/95
                                                         checked:bg-none checked:bg-right" type="checkbox">
                            </td>
                        </tr>
                        <tr class="my-3 h-12 odd:bg-transparent even:bg-[#142132]">
                            <td class="sorting_1">84</td>
                            <td>631011</td>
                            <td class="domain" onclick="edit(this)">
                                <a class="text-emerald-400">ss84</a>
                            </td>
                            <td class="ipv4 text-emerald-400">23.106.61.205</td>
                            <td class="ipv6 text-emerald-400">3dwh-W48T~ke</td>
                            <td class="space">14000</td>
                            <td>11264</td>
                            <td class="BW">100</td>
                            <td>129.3</td>
                            <td class="provider">LSW_UK</td>
                            <td class="Status d-flex justify-content-center align-items-center">
                                <input navbarfixed="" class="rounded-xl duration-200 ease-in-out after:rounded-full after:shadow-2xl
                                                         after:duration-200 checked:after:translate-x-5 h-5 relative
                                                         float-left mt-1 mx-3 w-12 cursor-pointer appearance-none border
                                                         border-solid border-gray-200 bg-slate-800/10 bg-none bg-contain
                                                         bg-left bg-no-repeat align-top transition-all after:absolute
                                                         after:top-px after:h-4 after:w-4 after:translate-x-0.5 after:bg-white
                                                         after:content-[''] checked:border-green-500/95 checked:bg-green-500/95
                                                         checked:bg-none checked:bg-right" type="checkbox">
                            </td>
                        </tr>
                        <tr class="my-3 h-12 odd:bg-transparent even:bg-[#142132]">
                            <td class="sorting_1">85</td>
                            <td>631022</td>
                            <td class="domain" onclick="edit(this)">
                                <a class="text-emerald-400">ss85</a>
                            </td>
                            <td class="ipv4 text-emerald-400">23.106.62.79</td>
                            <td class="ipv6 text-emerald-400">6uLz-Yq^5fw8</td>
                            <td class="space">14000</td>
                            <td>10035.2</td>
                            <td class="BW">100</td>
                            <td>127.7</td>
                            <td class="provider">LSW_UK</td>
                            <td class="Status d-flex justify-content-center align-items-center">
                                <input navbarfixed="" class="rounded-xl duration-200 ease-in-out after:rounded-full after:shadow-2xl
                                                         after:duration-200 checked:after:translate-x-5 h-5 relative
                                                         float-left mt-1 mx-3 w-12 cursor-pointer appearance-none border
                                                         border-solid border-gray-200 bg-slate-800/10 bg-none bg-contain
                                                         bg-left bg-no-repeat align-top transition-all after:absolute
                                                         after:top-px after:h-4 after:w-4 after:translate-x-0.5 after:bg-white
                                                         after:content-[''] checked:border-green-500/95 checked:bg-green-500/95
                                                         checked:bg-none checked:bg-right" type="checkbox">
                            </td>
                        </tr>
                        <tr class="my-3 h-12 odd:bg-transparent even:bg-[#142132]">
                            <td class="sorting_1">86</td>
                            <td>53540</td>
                            <td class="domain" onclick="edit(this)">
                                <a class="text-emerald-400">ss86</a>
                            </td>
                            <td class="ipv4 text-emerald-400">23.106.35.168</td>
                            <td class="ipv6 text-emerald-400">wv9r8V%D4,ez</td>
                            <td class="space">14000</td>
                            <td>11264</td>
                            <td class="BW">100</td>
                            <td>127</td>
                            <td class="provider">LSW_UK</td>
                            <td class="Status d-flex justify-content-center align-items-center">
                                <input navbarfixed="" class="rounded-xl duration-200 ease-in-out after:rounded-full after:shadow-2xl
                                                         after:duration-200 checked:after:translate-x-5 h-5 relative
                                                         float-left mt-1 mx-3 w-12 cursor-pointer appearance-none border
                                                         border-solid border-gray-200 bg-slate-800/10 bg-none bg-contain
                                                         bg-left bg-no-repeat align-top transition-all after:absolute
                                                         after:top-px after:h-4 after:w-4 after:translate-x-0.5 after:bg-white
                                                         after:content-[''] checked:border-green-500/95 checked:bg-green-500/95
                                                         checked:bg-none checked:bg-right" type="checkbox">
                            </td>
                        </tr>
                        <tr class="my-3 h-12 odd:bg-transparent even:bg-[#142132]">
                            <td class="sorting_1">87</td>
                            <td>71352</td>
                            <td class="domain" onclick="edit(this)">
                                <a class="text-emerald-400">ss87</a>
                            </td>
                            <td class="ipv4 text-emerald-400">23.106.35.135</td>
                            <td class="ipv6 text-emerald-400">xH7RlkzMPOoSHbCyiijZvDx4t4s19ImgEQ2</td>
                            <td class="space">15000</td>
                            <td>14336</td>
                            <td class="BW">100</td>
                            <td>122.9</td>
                            <td class="provider">LSW_UK</td>
                            <td class="Status d-flex justify-content-center align-items-center">
                                <input navbarfixed="" class="rounded-xl duration-200 ease-in-out after:rounded-full after:shadow-2xl
                                                         after:duration-200 checked:after:translate-x-5 h-5 relative
                                                         float-left mt-1 mx-3 w-12 cursor-pointer appearance-none border
                                                         border-solid border-gray-200 bg-slate-800/10 bg-none bg-contain
                                                         bg-left bg-no-repeat align-top transition-all after:absolute
                                                         after:top-px after:h-4 after:w-4 after:translate-x-0.5 after:bg-white
                                                         after:content-[''] checked:border-green-500/95 checked:bg-green-500/95
                                                         checked:bg-none checked:bg-right" type="checkbox">
                            </td>
                        </tr>
                        <tr class="my-3 h-12 odd:bg-transparent even:bg-[#142132]">
                            <td class="sorting_1">88</td>
                            <td>81631</td>
                            <td class="domain" onclick="edit(this)">
                                <a class="text-emerald-400">ss88</a>
                            </td>
                            <td class="ipv4 text-emerald-400">23.106.35.248</td>
                            <td class="ipv6 text-emerald-400">PnIejcgLncKXhtZSXsJdlIkfJZxQeXsh9VR</td>
                            <td class="space">15000</td>
                            <td>14336</td>
                            <td class="BW">100</td>
                            <td>120</td>
                            <td class="provider">LSW_UK</td>
                            <td class="Status d-flex justify-content-center align-items-center">
                                <input navbarfixed="" class="rounded-xl duration-200 ease-in-out after:rounded-full after:shadow-2xl
                                                         after:duration-200 checked:after:translate-x-5 h-5 relative
                                                         float-left mt-1 mx-3 w-12 cursor-pointer appearance-none border
                                                         border-solid border-gray-200 bg-slate-800/10 bg-none bg-contain
                                                         bg-left bg-no-repeat align-top transition-all after:absolute
                                                         after:top-px after:h-4 after:w-4 after:translate-x-0.5 after:bg-white
                                                         after:content-[''] checked:border-green-500/95 checked:bg-green-500/95
                                                         checked:bg-none checked:bg-right" type="checkbox">
                            </td>
                        </tr>
                        <tr class="my-3 h-12 odd:bg-transparent even:bg-[#142132]">
                            <td class="sorting_1">89</td>
                            <td>108851</td>
                            <td class="domain" onclick="edit(this)">
                                <a class="text-emerald-400">ss89</a>
                            </td>
                            <td class="ipv4 text-emerald-400">23.106.35.239</td>
                            <td class="ipv6 text-emerald-400">ZYau2jYXXdBORTd7ix1SdnOhwpe45G7rlEB</td>
                            <td class="space">15000</td>
                            <td>13312</td>
                            <td class="BW">100</td>
                            <td>131.7</td>
                            <td class="provider">LSW_UK</td>
                            <td class="Status d-flex justify-content-center align-items-center">
                                <input navbarfixed="" class="rounded-xl duration-200 ease-in-out after:rounded-full after:shadow-2xl
                                                         after:duration-200 checked:after:translate-x-5 h-5 relative
                                                         float-left mt-1 mx-3 w-12 cursor-pointer appearance-none border
                                                         border-solid border-gray-200 bg-slate-800/10 bg-none bg-contain
                                                         bg-left bg-no-repeat align-top transition-all after:absolute
                                                         after:top-px after:h-4 after:w-4 after:translate-x-0.5 after:bg-white
                                                         after:content-[''] checked:border-green-500/95 checked:bg-green-500/95
                                                         checked:bg-none checked:bg-right" type="checkbox">
                            </td>
                        </tr>
                        <tr class="my-3 h-12 odd:bg-transparent even:bg-[#142132]">
                            <td class="sorting_1">90</td>
                            <td>631024</td>
                            <td class="domain" onclick="edit(this)">
                                <a class="text-emerald-400">ss90</a>
                            </td>
                            <td class="ipv4 text-emerald-400">23.106.63.108</td>
                            <td class="ipv6 text-emerald-400">2dhOGFPsQW5uDwZ4xaH67WdNk8VzC1vpTzQ</td>
                            <td class="space">15000</td>
                            <td>14336</td>
                            <td class="BW">100</td>
                            <td>123.8</td>
                            <td class="provider">LSW_UK</td>
                            <td class="Status d-flex justify-content-center align-items-center">
                                <input navbarfixed="" class="rounded-xl duration-200 ease-in-out after:rounded-full after:shadow-2xl
                                                         after:duration-200 checked:after:translate-x-5 h-5 relative
                                                         float-left mt-1 mx-3 w-12 cursor-pointer appearance-none border
                                                         border-solid border-gray-200 bg-slate-800/10 bg-none bg-contain
                                                         bg-left bg-no-repeat align-top transition-all after:absolute
                                                         after:top-px after:h-4 after:w-4 after:translate-x-0.5 after:bg-white
                                                         after:content-[''] checked:border-green-500/95 checked:bg-green-500/95
                                                         checked:bg-none checked:bg-right" type="checkbox">
                            </td>
                        </tr>
                        <tr class="my-3 h-12 odd:bg-transparent even:bg-[#142132]">
                            <td class="sorting_1">91</td>
                            <td>631031</td>
                            <td class="domain" onclick="edit(this)">
                                <a class="text-emerald-400">ss91</a>
                            </td>
                            <td class="ipv4 text-emerald-400">23.106.33.184</td>
                            <td class="ipv6 text-emerald-400">qGNrb7pY2OoYOr5ijCPU0VgwsZPeseSFFCG</td>
                            <td class="space">15000</td>
                            <td>14336</td>
                            <td class="BW">100</td>
                            <td>127.6</td>
                            <td class="provider">LSW_UK</td>
                            <td class="Status d-flex justify-content-center align-items-center">
                                <input navbarfixed="" class="rounded-xl duration-200 ease-in-out after:rounded-full after:shadow-2xl
                                                         after:duration-200 checked:after:translate-x-5 h-5 relative
                                                         float-left mt-1 mx-3 w-12 cursor-pointer appearance-none border
                                                         border-solid border-gray-200 bg-slate-800/10 bg-none bg-contain
                                                         bg-left bg-no-repeat align-top transition-all after:absolute
                                                         after:top-px after:h-4 after:w-4 after:translate-x-0.5 after:bg-white
                                                         after:content-[''] checked:border-green-500/95 checked:bg-green-500/95
                                                         checked:bg-none checked:bg-right" type="checkbox">
                            </td>
                        </tr>
                        <tr class="my-3 h-12 odd:bg-transparent even:bg-[#142132]">
                            <td class="sorting_1">92</td>
                            <td>82957</td>
                            <td class="domain" onclick="edit(this)">
                                <a class="text-emerald-400">ss92</a>
                            </td>
                            <td class="ipv4 text-emerald-400">23.106.239.152</td>
                            <td class="ipv6 text-emerald-400">c_5nfWExU4%3</td>
                            <td class="space">14000</td>
                            <td>12288</td>
                            <td class="BW">100</td>
                            <td>134.6</td>
                            <td class="provider">LSW_UK</td>
                            <td class="Status d-flex justify-content-center align-items-center">
                                <input navbarfixed="" class="rounded-xl duration-200 ease-in-out after:rounded-full after:shadow-2xl
                                                         after:duration-200 checked:after:translate-x-5 h-5 relative
                                                         float-left mt-1 mx-3 w-12 cursor-pointer appearance-none border
                                                         border-solid border-gray-200 bg-slate-800/10 bg-none bg-contain
                                                         bg-left bg-no-repeat align-top transition-all after:absolute
                                                         after:top-px after:h-4 after:w-4 after:translate-x-0.5 after:bg-white
                                                         after:content-[''] checked:border-green-500/95 checked:bg-green-500/95
                                                         checked:bg-none checked:bg-right" type="checkbox">
                            </td>
                        </tr>
                        <tr class="my-3 h-12 odd:bg-transparent even:bg-[#142132]">
                            <td class="sorting_1">93</td>
                            <td>648764</td>
                            <td class="domain" onclick="edit(this)">
                                <a class="text-emerald-400">ss93</a>
                            </td>
                            <td class="ipv4 text-emerald-400">23.106.35.187</td>
                            <td class="ipv6 text-emerald-400">xfOaukZegqWXFJ8jH9UIASPURmvqSXCXQZo</td>
                            <td class="space">15000</td>
                            <td>14336</td>
                            <td class="BW">100</td>
                            <td>118.3</td>
                            <td class="provider">LSW_UK</td>
                            <td class="Status d-flex justify-content-center align-items-center">
                                <input navbarfixed="" class="rounded-xl duration-200 ease-in-out after:rounded-full after:shadow-2xl
                                                         after:duration-200 checked:after:translate-x-5 h-5 relative
                                                         float-left mt-1 mx-3 w-12 cursor-pointer appearance-none border
                                                         border-solid border-gray-200 bg-slate-800/10 bg-none bg-contain
                                                         bg-left bg-no-repeat align-top transition-all after:absolute
                                                         after:top-px after:h-4 after:w-4 after:translate-x-0.5 after:bg-white
                                                         after:content-[''] checked:border-green-500/95 checked:bg-green-500/95
                                                         checked:bg-none checked:bg-right" type="checkbox">
                            </td>
                        </tr>
                        <tr class="my-3 h-12 odd:bg-transparent even:bg-[#142132]">
                            <td class="sorting_1">94</td>
                            <td>648760</td>
                            <td class="domain" onclick="edit(this)">
                                <a class="text-emerald-400">ss94</a>
                            </td>
                            <td class="ipv4 text-emerald-400">23.106.58.106</td>
                            <td class="ipv6 text-emerald-400">t3D-2~6vC4xk</td>
                            <td class="space">14000</td>
                            <td>10035.2</td>
                            <td class="BW">100</td>
                            <td>125.9</td>
                            <td class="provider">LSW_UK</td>
                            <td class="Status d-flex justify-content-center align-items-center">
                                <input navbarfixed="" class="rounded-xl duration-200 ease-in-out after:rounded-full after:shadow-2xl
                                                         after:duration-200 checked:after:translate-x-5 h-5 relative
                                                         float-left mt-1 mx-3 w-12 cursor-pointer appearance-none border
                                                         border-solid border-gray-200 bg-slate-800/10 bg-none bg-contain
                                                         bg-left bg-no-repeat align-top transition-all after:absolute
                                                         after:top-px after:h-4 after:w-4 after:translate-x-0.5 after:bg-white
                                                         after:content-[''] checked:border-green-500/95 checked:bg-green-500/95
                                                         checked:bg-none checked:bg-right" type="checkbox">
                            </td>
                        </tr>
                        <tr class="my-3 h-12 odd:bg-transparent even:bg-[#142132]">
                            <td class="sorting_1">95</td>
                            <td>648863</td>
                            <td class="domain" onclick="edit(this)">
                                <a class="text-emerald-400">ss95</a>
                            </td>
                            <td class="ipv4 text-emerald-400">23.106.58.103</td>
                            <td class="ipv6 text-emerald-400">iFNaqdEPR8OZrVV1Dnc7pymlqF9dcL6vr2K</td>
                            <td class="space">15000</td>
                            <td>14336</td>
                            <td class="BW">100</td>
                            <td>127.6</td>
                            <td class="provider">LSW_UK</td>
                            <td class="Status d-flex justify-content-center align-items-center">
                                <input navbarfixed="" class="rounded-xl duration-200 ease-in-out after:rounded-full after:shadow-2xl
                                                         after:duration-200 checked:after:translate-x-5 h-5 relative
                                                         float-left mt-1 mx-3 w-12 cursor-pointer appearance-none border
                                                         border-solid border-gray-200 bg-slate-800/10 bg-none bg-contain
                                                         bg-left bg-no-repeat align-top transition-all after:absolute
                                                         after:top-px after:h-4 after:w-4 after:translate-x-0.5 after:bg-white
                                                         after:content-[''] checked:border-green-500/95 checked:bg-green-500/95
                                                         checked:bg-none checked:bg-right" type="checkbox">
                            </td>
                        </tr>
                        <tr class="my-3 h-12 odd:bg-transparent even:bg-[#142132]">
                            <td class="sorting_1">96</td>
                            <td>10924974</td>
                            <td class="domain" onclick="edit(this)">
                                <a class="text-emerald-400">ss96</a>
                            </td>
                            <td class="ipv4 text-emerald-400">23.106.58.228</td>
                            <td class="ipv6 text-emerald-400">zte@925CW4,c</td>
                            <td class="space">14000</td>
                            <td>11264</td>
                            <td class="BW">100</td>
                            <td>127.3</td>
                            <td class="provider">LSW_UK</td>
                            <td class="Status d-flex justify-content-center align-items-center">
                                <input navbarfixed="" class="rounded-xl duration-200 ease-in-out after:rounded-full after:shadow-2xl
                                                         after:duration-200 checked:after:translate-x-5 h-5 relative
                                                         float-left mt-1 mx-3 w-12 cursor-pointer appearance-none border
                                                         border-solid border-gray-200 bg-slate-800/10 bg-none bg-contain
                                                         bg-left bg-no-repeat align-top transition-all after:absolute
                                                         after:top-px after:h-4 after:w-4 after:translate-x-0.5 after:bg-white
                                                         after:content-[''] checked:border-green-500/95 checked:bg-green-500/95
                                                         checked:bg-none checked:bg-right" type="checkbox">
                            </td>
                        </tr>
                        <tr class="my-3 h-12 odd:bg-transparent even:bg-[#142132]">
                            <td class="sorting_1">97</td>
                            <td>10924975</td>
                            <td class="domain" onclick="edit(this)">
                                <a class="text-emerald-400">ss97</a>
                            </td>
                            <td class="ipv4 text-emerald-400">23.106.58.227</td>
                            <td class="ipv6 text-emerald-400">e269d4zTB^@h</td>
                            <td class="space">14000</td>
                            <td>10240</td>
                            <td class="BW">100</td>
                            <td>131.7</td>
                            <td class="provider">LSW_UK</td>
                            <td class="Status d-flex justify-content-center align-items-center">
                                <input navbarfixed="" class="rounded-xl duration-200 ease-in-out after:rounded-full after:shadow-2xl
                                                         after:duration-200 checked:after:translate-x-5 h-5 relative
                                                         float-left mt-1 mx-3 w-12 cursor-pointer appearance-none border
                                                         border-solid border-gray-200 bg-slate-800/10 bg-none bg-contain
                                                         bg-left bg-no-repeat align-top transition-all after:absolute
                                                         after:top-px after:h-4 after:w-4 after:translate-x-0.5 after:bg-white
                                                         after:content-[''] checked:border-green-500/95 checked:bg-green-500/95
                                                         checked:bg-none checked:bg-right" type="checkbox">
                            </td>
                        </tr>
                        <tr class="my-3 h-12 odd:bg-transparent even:bg-[#142132]">
                            <td class="sorting_1">98</td>
                            <td>10924976</td>
                            <td class="domain" onclick="edit(this)">
                                <a class="text-emerald-400">ss98</a>
                            </td>
                            <td class="ipv4 text-emerald-400">23.106.58.226</td>
                            <td class="ipv6 text-emerald-400">z5vq@6d_9tRA</td>
                            <td class="space">14000</td>
                            <td>10035.2</td>
                            <td class="BW">100</td>
                            <td>126.3</td>
                            <td class="provider">LSW_UK</td>
                            <td class="Status d-flex justify-content-center align-items-center">
                                <input navbarfixed="" class="rounded-xl duration-200 ease-in-out after:rounded-full after:shadow-2xl
                                                         after:duration-200 checked:after:translate-x-5 h-5 relative
                                                         float-left mt-1 mx-3 w-12 cursor-pointer appearance-none border
                                                         border-solid border-gray-200 bg-slate-800/10 bg-none bg-contain
                                                         bg-left bg-no-repeat align-top transition-all after:absolute
                                                         after:top-px after:h-4 after:w-4 after:translate-x-0.5 after:bg-white
                                                         after:content-[''] checked:border-green-500/95 checked:bg-green-500/95
                                                         checked:bg-none checked:bg-right" type="checkbox">
                            </td>
                        </tr>
                        <tr class="my-3 h-12 odd:bg-transparent even:bg-[#142132]">
                            <td class="sorting_1">99</td>
                            <td>11587890</td>
                            <td class="domain" onclick="edit(this)">
                                <a class="text-emerald-400">ss99</a>
                            </td>
                            <td class="ipv4 text-emerald-400">23.106.235.144</td>
                            <td class="ipv6 text-emerald-400">xsdE^5_8eU2J</td>
                            <td class="space">14000</td>
                            <td>10137.6</td>
                            <td class="BW">100</td>
                            <td>126.6</td>
                            <td class="provider">LSW_UK</td>
                            <td class="Status d-flex justify-content-center align-items-center">
                                <input navbarfixed="" class="rounded-xl duration-200 ease-in-out after:rounded-full after:shadow-2xl
                                                         after:duration-200 checked:after:translate-x-5 h-5 relative
                                                         float-left mt-1 mx-3 w-12 cursor-pointer appearance-none border
                                                         border-solid border-gray-200 bg-slate-800/10 bg-none bg-contain
                                                         bg-left bg-no-repeat align-top transition-all after:absolute
                                                         after:top-px after:h-4 after:w-4 after:translate-x-0.5 after:bg-white
                                                         after:content-[''] checked:border-green-500/95 checked:bg-green-500/95
                                                         checked:bg-none checked:bg-right" type="checkbox">
                            </td>
                        </tr>
                        <tr class="my-3 h-12 odd:bg-transparent even:bg-[#142132]">
                            <td class="sorting_1">100</td>
                            <td>11587893</td>
                            <td class="domain" onclick="edit(this)">
                                <a class="text-emerald-400">ss100</a>
                            </td>
                            <td class="ipv4 text-emerald-400">23.106.235.142</td>
                            <td class="ipv6 text-emerald-400">H29Qk-.g5zq8</td>
                            <td class="space">14000</td>
                            <td>11264</td>
                            <td class="BW">100</td>
                            <td>127.3</td>
                            <td class="provider">LSW_UK</td>
                            <td class="Status d-flex justify-content-center align-items-center">
                                <input navbarfixed="" class="rounded-xl duration-200 ease-in-out after:rounded-full after:shadow-2xl
                                                         after:duration-200 checked:after:translate-x-5 h-5 relative
                                                         float-left mt-1 mx-3 w-12 cursor-pointer appearance-none border
                                                         border-solid border-gray-200 bg-slate-800/10 bg-none bg-contain
                                                         bg-left bg-no-repeat align-top transition-all after:absolute
                                                         after:top-px after:h-4 after:w-4 after:translate-x-0.5 after:bg-white
                                                         after:content-[''] checked:border-green-500/95 checked:bg-green-500/95
                                                         checked:bg-none checked:bg-right" type="checkbox">
                            </td>
                        </tr>
                        <tr class="my-3 h-12 odd:bg-transparent even:bg-[#142132]">
                            <td class="sorting_1">102</td>
                            <td>67194</td>
                            <td class="domain" onclick="edit(this)">
                                <a class="text-emerald-400">ss102</a>
                            </td>
                            <td class="ipv4 text-emerald-400">23.106.62.143</td>
                            <td class="ipv6 text-emerald-400">e2t6x~D35g@V</td>
                            <td class="space">14000</td>
                            <td>9523.2</td>
                            <td class="BW">100</td>
                            <td>127.8</td>
                            <td class="provider">LSW_UK</td>
                            <td class="Status d-flex justify-content-center align-items-center">
                                <input navbarfixed="" class="rounded-xl duration-200 ease-in-out after:rounded-full after:shadow-2xl
                                                         after:duration-200 checked:after:translate-x-5 h-5 relative
                                                         float-left mt-1 mx-3 w-12 cursor-pointer appearance-none border
                                                         border-solid border-gray-200 bg-slate-800/10 bg-none bg-contain
                                                         bg-left bg-no-repeat align-top transition-all after:absolute
                                                         after:top-px after:h-4 after:w-4 after:translate-x-0.5 after:bg-white
                                                         after:content-[''] checked:border-green-500/95 checked:bg-green-500/95
                                                         checked:bg-none checked:bg-right" type="checkbox">
                            </td>
                        </tr>
                        <tr class="my-3 h-12 odd:bg-transparent even:bg-[#142132]">
                            <td class="sorting_1">104</td>
                            <td>67199</td>
                            <td class="domain" onclick="edit(this)">
                                <a class="text-emerald-400">ss104</a>
                            </td>
                            <td class="ipv4 text-emerald-400">23.106.62.140</td>
                            <td class="ipv6 text-emerald-400">jK5hD3%48-yp</td>
                            <td class="space">14000</td>
                            <td>9830.4</td>
                            <td class="BW">100</td>
                            <td>126.6</td>
                            <td class="provider">LSW_UK</td>
                            <td class="Status d-flex justify-content-center align-items-center">
                                <input navbarfixed="" class="rounded-xl duration-200 ease-in-out after:rounded-full after:shadow-2xl
                                                         after:duration-200 checked:after:translate-x-5 h-5 relative
                                                         float-left mt-1 mx-3 w-12 cursor-pointer appearance-none border
                                                         border-solid border-gray-200 bg-slate-800/10 bg-none bg-contain
                                                         bg-left bg-no-repeat align-top transition-all after:absolute
                                                         after:top-px after:h-4 after:w-4 after:translate-x-0.5 after:bg-white
                                                         after:content-[''] checked:border-green-500/95 checked:bg-green-500/95
                                                         checked:bg-none checked:bg-right" type="checkbox">
                            </td>
                        </tr>
                        <tr class="my-3 h-12 odd:bg-transparent even:bg-[#142132]">
                            <td class="sorting_1">105</td>
                            <td>10843225</td>
                            <td class="domain" onclick="edit(this)">
                                <a class="text-emerald-400">ss105</a>
                            </td>
                            <td class="ipv4 text-emerald-400">23.106.236.209</td>
                            <td class="ipv6 text-emerald-400">jsuDy-6.H3h2</td>
                            <td class="space">14000</td>
                            <td>10137.6</td>
                            <td class="BW">100</td>
                            <td>124.2</td>
                            <td class="provider">LSW_UK</td>
                            <td class="Status d-flex justify-content-center align-items-center">
                                <input navbarfixed="" class="rounded-xl duration-200 ease-in-out after:rounded-full after:shadow-2xl
                                                         after:duration-200 checked:after:translate-x-5 h-5 relative
                                                         float-left mt-1 mx-3 w-12 cursor-pointer appearance-none border
                                                         border-solid border-gray-200 bg-slate-800/10 bg-none bg-contain
                                                         bg-left bg-no-repeat align-top transition-all after:absolute
                                                         after:top-px after:h-4 after:w-4 after:translate-x-0.5 after:bg-white
                                                         after:content-[''] checked:border-green-500/95 checked:bg-green-500/95
                                                         checked:bg-none checked:bg-right" type="checkbox">
                            </td>
                        </tr>
                        <tr class="my-3 h-12 odd:bg-transparent even:bg-[#142132]">
                            <td class="sorting_1">107</td>
                            <td>10858402</td>
                            <td class="domain" onclick="edit(this)">
                                <a class="text-emerald-400">ss107</a>
                            </td>
                            <td class="ipv4 text-emerald-400">23.106.236.206</td>
                            <td class="ipv6 text-emerald-400">yc2s8Y,gL^~3</td>
                            <td class="space">14000</td>
                            <td>10035.2</td>
                            <td class="BW">100</td>
                            <td>129</td>
                            <td class="provider">LSW_UK</td>
                            <td class="Status d-flex justify-content-center align-items-center">
                                <input navbarfixed="" class="rounded-xl duration-200 ease-in-out after:rounded-full after:shadow-2xl
                                                         after:duration-200 checked:after:translate-x-5 h-5 relative
                                                         float-left mt-1 mx-3 w-12 cursor-pointer appearance-none border
                                                         border-solid border-gray-200 bg-slate-800/10 bg-none bg-contain
                                                         bg-left bg-no-repeat align-top transition-all after:absolute
                                                         after:top-px after:h-4 after:w-4 after:translate-x-0.5 after:bg-white
                                                         after:content-[''] checked:border-green-500/95 checked:bg-green-500/95
                                                         checked:bg-none checked:bg-right" type="checkbox">
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
