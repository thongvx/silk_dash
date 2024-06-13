<div class="px-0 pt-0">
    <div class="relative rounded-xl bg-[#121520]" id="manage-task">
        <div class="pt-4 md:p-4">
            <div class="flex justify-between items-center">
                <div class="mb-2">
                    <h5 class="text-white">
                        Cases
                    </h5>
                </div>
                <div class="flex items-center text-sm md:px-4 px-2">
                    <div
                        class="hover:bg-[#009FB2] bg-[#142132] hover:border-none cursor-pointer px-5 py-1 rounded-xl mr-4 w-max">
                        <a href="javascript:" class="flex items-center"><i btn-edit
                                                 class="material-symbols-outlined opacity-1 text-xl">add</i>
                            Create New Case</a>
                    </div>
                    <div
                        class="hover:bg-[#009FB2] bg-[#142132] hover:border-none cursor-pointer px-5 py-1 rounded-xl w-max">
                        <a href="javascript:" class="flex items-center"><i btn-edit
                                                 class="material-symbols-outlined opacity-1 text-xl">add</i>
                            Create New Notification</a>
                    </div>
                </div>
            </div>
            <div
                class="mt-3 flex flex-col bg-clip-border rounded-xl text-gray-700 bg-transparent">
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
                                <th class="before:!bottom-2 after:!bottom-2 pl-2 py-2 cursor-pointer col-xl-1">
                                    Topic
                                </th>
                                <th class="before:!bottom-2 after:!bottom-2 pl-2 py-2 cursor-pointer col-xl-4">
                                    Subject
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
                            <tr class="my-3 h-12 odd:bg-transparent even:bg-[#142132]">
                                <td class="sorting_1"><a href="/ticket/102427-tk1">1</a>
                                </td>
                                <td>upload</td>
                                <td>
                                    <a href="/ticket/102427-tk1">Access ftp or webdav</a>
                                </td>
                                <td>loro</td>
                                <td>1000</td>
                                <td class="status" style="color: rgb(255, 168, 0);">
                                    pendding
                                </td>
                                <td>02/25/2024</td>
                                <td>02/25/2024</td>
                            </tr>
                            <tr class="my-3 h-12 odd:bg-transparent even:bg-[#142132]">
                                <td class="sorting_1"><a href="/ticket/102403-tk1">2</a>
                                </td>
                                <td>player-setting</td>
                                <td>
                                    <a href="/ticket/102403-tk1">PLAYER COLOUR CHANGE
                                        OPTION</a>
                                </td>
                                <td>John V Nelson</td>
                                <td>1000</td>
                                <td class="status" style="color: rgb(255, 168, 0);">
                                    pendding
                                </td>
                                <td>02/24/2024</td>
                                <td>02/24/2024</td>
                            </tr>
                            <tr class="my-3 h-12 odd:bg-transparent even:bg-[#142132]">
                                <td class="sorting_1"><a href="/ticket/101987-tk2">3</a>
                                </td>
                                <td>player-setting</td>
                                <td>
                                    <a href="/ticket/101987-tk2">Audio disabled</a>
                                </td>
                                <td>hngexp</td>
                                <td>1000</td>
                                <td class="status" style="color: rgb(255, 168, 0);">
                                    pendding
                                </td>
                                <td>02/22/2024</td>
                                <td>02/22/2024</td>
                            </tr>
                            <tr class="my-3 h-12 odd:bg-transparent even:bg-[#142132]">
                                <td class="sorting_1"><a href="/ticket/102199-tk1">4</a>
                                </td>
                                <td>upload</td>
                                <td>
                                    <a href="/ticket/102199-tk1">Very slow Upload Videos</a>
                                </td>
                                <td>AnimeKu</td>
                                <td>1000</td>
                                <td class="status" style="color: rgb(255, 168, 0);">
                                    pendding
                                </td>
                                <td>02/15/2024</td>
                                <td>02/15/2024</td>
                            </tr>
                            <tr class="my-3 h-12 odd:bg-transparent even:bg-[#142132]">
                                <td class="sorting_1"><a href="/ticket/102229-tk1">5</a>
                                </td>
                                <td>upload</td>
                                <td>
                                    <a href="/ticket/102229-tk1">Remote Transfer does not
                                        work</a>
                                </td>
                                <td>Babu Molla</td>
                                <td>1000</td>
                                <td class="status" style="color: rgb(255, 168, 0);">
                                    pendding
                                </td>
                                <td>02/13/2024</td>
                                <td>02/14/2024</td>
                            </tr>
                            <tr class="my-3 h-12 odd:bg-transparent even:bg-[#142132]">
                                <td class="sorting_1"><a href="/ticket/101805-tk5">6</a>
                                </td>
                                <td>upload</td>
                                <td>
                                    <a href="/ticket/101805-tk5">error232011</a>
                                </td>
                                <td>javgrandpa</td>
                                <td>1000</td>
                                <td class="status" style="color: rgb(255, 168, 0);">
                                    pendding
                                </td>
                                <td>02/11/2024</td>
                                <td>02/11/2024</td>
                            </tr>
                            <tr class="my-3 h-12 odd:bg-transparent even:bg-[#142132]">
                                <td class="sorting_1"><a href="/ticket/101903-tk2">7</a>
                                </td>
                                <td>other</td>
                                <td>
                                    <a href="/ticket/101903-tk2">Error Code</a>
                                </td>
                                <td>film21</td>
                                <td>1000</td>
                                <td class="status" style="color: rgb(255, 168, 0);">
                                    pendding
                                </td>
                                <td>02/07/2024</td>
                                <td>02/07/2024</td>
                            </tr>
                            <tr class="my-3 h-12 odd:bg-transparent even:bg-[#142132]">
                                <td class="sorting_1"><a href="/ticket/101903-tk1">8</a>
                                </td>
                                <td>upload</td>
                                <td>
                                    <a href="/ticket/101903-tk1">Slow encoding of turbo</a>
                                </td>
                                <td>film21</td>
                                <td>1000</td>
                                <td class="status" style="color: rgb(255, 168, 0);">
                                    pendding
                                </td>
                                <td>02/07/2024</td>
                                <td>02/07/2024</td>
                            </tr>
                            <tr class="my-3 h-12 odd:bg-transparent even:bg-[#142132]">
                                <td class="sorting_1"><a href="/ticket/102007-tk2">9</a>
                                </td>
                                <td>video-manage</td>
                                <td>
                                    <a href="/ticket/102007-tk2">Folder</a>
                                </td>
                                <td>Prakash6</td>
                                <td>1000</td>
                                <td class="status" style="color: rgb(255, 168, 0);">
                                    pendding
                                </td>
                                <td>01/22/2024</td>
                                <td>01/22/2024</td>
                            </tr>
                            <tr class="my-3 h-12 odd:bg-transparent even:bg-[#142132]">
                                <td class="sorting_1"><a href="/ticket/102092-tk2">10</a>
                                </td>
                                <td>other</td>
                                <td>
                                    <a href="/ticket/102092-tk2">custom domain status
                                        pending</a>
                                </td>
                                <td>Jessica norwatian</td>
                                <td>1000</td>
                                <td class="status" style="color: rgb(255, 168, 0);">
                                    pendding
                                </td>
                                <td>01/20/2024</td>
                                <td>01/21/2024</td>
                            </tr>
                            <tr class="my-3 h-12 odd:bg-transparent even:bg-[#142132]">
                                <td class="sorting_1"><a href="/ticket/102092-tk1">11</a>
                                </td>
                                <td>other</td>
                                <td>
                                    <a href="/ticket/102092-tk1">custom domain status
                                        pending</a>
                                </td>
                                <td>Jessica norwatian</td>
                                <td>1000</td>
                                <td class="status" style="color: rgb(255, 168, 0);">
                                    pendding
                                </td>
                                <td>01/20/2024</td>
                                <td>01/20/2024</td>
                            </tr>
                            <tr class="my-3 h-12 odd:bg-transparent even:bg-[#142132]">
                                <td class="sorting_1"><a href="/ticket/102087-tk3">12</a>
                                </td>
                                <td>upload</td>
                                <td>
                                    <a href="/ticket/102087-tk3">Multi audio</a>
                                </td>
                                <td>kimo</td>
                                <td>1000</td>
                                <td class="status" style="color: rgb(255, 168, 0);">
                                    pendding
                                </td>
                                <td>01/18/2024</td>
                                <td>01/18/2024</td>
                            </tr>
                            <tr class="my-3 h-12 odd:bg-transparent even:bg-[#142132]">
                                <td class="sorting_1"><a href="/ticket/102087-tk2">13</a>
                                </td>
                                <td>upload</td>
                                <td>
                                    <a href="/ticket/102087-tk2">Remote upload</a>
                                </td>
                                <td>kimo</td>
                                <td>1000</td>
                                <td class="status" style="color: rgb(255, 168, 0);">
                                    pendding
                                </td>
                                <td>01/18/2024</td>
                                <td>01/18/2024</td>
                            </tr>
                            <tr class="my-3 h-12 odd:bg-transparent even:bg-[#142132]">
                                <td class="sorting_1"><a href="/ticket/102087-tk1">14</a>
                                </td>
                                <td>player-setting</td>
                                <td>
                                    <a href="/ticket/102087-tk1">multi quality option</a>
                                </td>
                                <td>kimo</td>
                                <td>1000</td>
                                <td class="status" style="color: rgb(255, 168, 0);">
                                    pendding
                                </td>
                                <td>01/18/2024</td>
                                <td>01/18/2024</td>
                            </tr>
                            <tr class="my-3 h-12 odd:bg-transparent even:bg-[#142132]">
                                <td class="sorting_1"><a href="/ticket/102007-tk1">15</a>
                                </td>
                                <td>video-manage</td>
                                <td>
                                    <a href="/ticket/102007-tk1">Help</a>
                                </td>
                                <td>Prakash6</td>
                                <td>1000</td>
                                <td class="status" style="color: rgb(255, 168, 0);">
                                    pendding
                                </td>
                                <td>01/12/2024</td>
                                <td>01/12/2024</td>
                            </tr>
                            <tr class="my-3 h-12 odd:bg-transparent even:bg-[#142132]">
                                <td class="sorting_1"><a href="/ticket/101987-tk1">16</a>
                                </td>
                                <td>video-manage</td>
                                <td>
                                    <a href="/ticket/101987-tk1">import subtitle from mkv
                                        file</a>
                                </td>
                                <td>hngexp</td>
                                <td>1000</td>
                                <td class="status" style="color: rgb(255, 168, 0);">
                                    pendding
                                </td>
                                <td>01/08/2024</td>
                                <td>01/08/2024</td>
                            </tr>
                            <tr class="my-3 h-12 odd:bg-transparent even:bg-[#142132]">
                                <td class="sorting_1"><a href="/ticket/101805-tk4">17</a>
                                </td>
                                <td>other</td>
                                <td>
                                    <a href="/ticket/101805-tk4">Encoding</a>
                                </td>
                                <td>javgrandpa</td>
                                <td>1000</td>
                                <td class="status" style="color: rgb(255, 168, 0);">
                                    pendding
                                </td>
                                <td>01/05/2024</td>
                                <td>01/05/2024</td>
                            </tr>
                            <tr class="my-3 h-12 odd:bg-transparent even:bg-[#142132]">
                                <td class="sorting_1"><a href="/ticket/101805-tk3">18</a>
                                </td>
                                <td>other</td>
                                <td>
                                    <a href="/ticket/101805-tk3">Download page</a>
                                </td>
                                <td>javgrandpa</td>
                                <td>1000</td>
                                <td class="status" style="color: rgb(246, 78, 96);">
                                    complete
                                </td>
                                <td>01/01/2024</td>
                                <td>01/01/2024</td>
                            </tr>
                            <tr class="my-3 h-12 odd:bg-transparent even:bg-[#142132]">
                                <td class="sorting_1"><a href="/ticket/101805-tk2">19</a>
                                </td>
                                <td>upload</td>
                                <td>
                                    <a href="/ticket/101805-tk2">Error code 232011</a>
                                </td>
                                <td>javgrandpa</td>
                                <td>1000</td>
                                <td class="status" style="color: rgb(246, 78, 96);">
                                    complete
                                </td>
                                <td>12/07/2023</td>
                                <td>12/07/2023</td>
                            </tr>
                            <tr class="my-3 h-12 odd:bg-transparent even:bg-[#142132]">
                                <td class="sorting_1"><a href="/ticket/101848-tk1">20</a>
                                </td>
                                <td>upload</td>
                                <td>
                                    <a href="/ticket/101848-tk1">Upload not working</a>
                                </td>
                                <td>Arnooth</td>
                                <td>1000</td>
                                <td class="status" style="color: rgb(255, 168, 0);">
                                    pendding
                                </td>
                                <td>12/07/2023</td>
                                <td>12/07/2023</td>
                            </tr>
                            <tr class="my-3 h-12 odd:bg-transparent even:bg-[#142132]">
                                <td class="sorting_1"><a href="/ticket/101805-tk1">21</a>
                                </td>
                                <td>upload</td>
                                <td>
                                    <a href="/ticket/101805-tk1">torrent Upload not
                                        working</a>
                                </td>
                                <td>javgrandpa</td>
                                <td>1000</td>
                                <td class="status" style="color: rgb(246, 78, 96);">
                                    complete
                                </td>
                                <td>12/03/2023</td>
                                <td>12/05/2023</td>
                            </tr>
                            <tr class="my-3 h-12 odd:bg-transparent even:bg-[#142132]">
                                <td class="sorting_1"><a href="/ticket/101136-tk1">22</a>
                                </td>
                                <td>upload</td>
                                <td>
                                    <a href="/ticket/101136-tk1">api not working</a>
                                </td>
                                <td>John Teo</td>
                                <td>1000</td>
                                <td class="status" style="color: rgb(255, 168, 0);">
                                    pendding
                                </td>
                                <td>10/31/2023</td>
                                <td>10/31/2023</td>
                            </tr>
                            <tr class="my-3 h-12 odd:bg-transparent even:bg-[#142132]">
                                <td class="sorting_1"><a href="/ticket/101222-tk1">23</a>
                                </td>
                                <td>player-setting</td>
                                <td>
                                    <a href="/ticket/101222-tk1">The player setting page is
                                        "server 500"</a>
                                </td>
                                <td>Jarvis James</td>
                                <td>1000</td>
                                <td class="status" style="color: rgb(255, 168, 0);">
                                    pendding
                                </td>
                                <td>08/03/2023</td>
                                <td>08/04/2023</td>
                            </tr>
                            <tr class="my-3 h-12 odd:bg-transparent even:bg-[#142132]">
                                <td class="sorting_1"><a href="/ticket/100481-tk3">24</a>
                                </td>
                                <td>upload</td>
                                <td>
                                    <a href="/ticket/100481-tk3">can't upload</a>
                                </td>
                                <td>peterikvetalii</td>
                                <td>1000</td>
                                <td class="status" style="color: rgb(255, 168, 0);">
                                    pendding
                                </td>
                                <td>07/07/2023</td>
                                <td>07/07/2023</td>
                            </tr>
                            <tr class="my-3 h-12 odd:bg-transparent even:bg-[#142132]">
                                <td class="sorting_1"><a href="/ticket/100619-tk1">25</a>
                                </td>
                                <td>upload</td>
                                <td>
                                    <a href="/ticket/100619-tk1">Encode</a>
                                </td>
                                <td>fullvoyeur</td>
                                <td>1000</td>
                                <td class="status" style="color: rgb(255, 168, 0);">
                                    pendding
                                </td>
                                <td>06/17/2023</td>
                                <td>06/17/2023</td>
                            </tr>
                            <tr class="my-3 h-12 odd:bg-transparent even:bg-[#142132]">
                                <td class="sorting_1"><a href="/ticket/101028-tk1">26</a>
                                </td>
                                <td>upload</td>
                                <td>
                                    <a href="/ticket/101028-tk1">How to Remote Upload Drive
                                        Google Using API</a>
                                </td>
                                <td>bossjarwo</td>
                                <td>1000</td>
                                <td class="status" style="color: rgb(255, 168, 0);">
                                    pendding
                                </td>
                                <td>06/10/2023</td>
                                <td>06/10/2023</td>
                            </tr>
                            <tr class="my-3 h-12 odd:bg-transparent even:bg-[#142132]">
                                <td class="sorting_1"><a href="/ticket/100925-tk6">27</a>
                                </td>
                                <td>other</td>
                                <td>
                                    <a href="/ticket/100925-tk6">Encoding videos</a>
                                </td>
                                <td>Luis Molina</td>
                                <td>1000</td>
                                <td class="status" style="color: rgb(255, 168, 0);">
                                    pendding
                                </td>
                                <td>06/02/2023</td>
                                <td>06/03/2023</td>
                            </tr>
                            <tr class="my-3 h-12 odd:bg-transparent even:bg-[#142132]">
                                <td class="sorting_1"><a href="/ticket/100925-tk5">28</a>
                                </td>
                                <td>other</td>
                                <td>
                                    <a href="/ticket/100925-tk5">500 Internal Server
                                        Error</a>
                                </td>
                                <td>Luis Molina</td>
                                <td>1000</td>
                                <td class="status" style="color: rgb(255, 168, 0);">
                                    pendding
                                </td>
                                <td>05/26/2023</td>
                                <td>05/27/2023</td>
                            </tr>
                            <tr class="my-3 h-12 odd:bg-transparent even:bg-[#142132]">
                                <td class="sorting_1"><a href="/ticket/100925-tk4">29</a>
                                </td>
                                <td>player-setting</td>
                                <td>
                                    <a href="/ticket/100925-tk4">The poster is not
                                        displayed</a>
                                </td>
                                <td>Luis Molina</td>
                                <td>1000</td>
                                <td class="status" style="color: rgb(255, 168, 0);">
                                    pendding
                                </td>
                                <td>05/21/2023</td>
                                <td>05/24/2023</td>
                            </tr>
                            <tr class="my-3 h-12 odd:bg-transparent even:bg-[#142132]">
                                <td class="sorting_1"><a href="/ticket/100925-tk3">30</a>
                                </td>
                                <td>other</td>
                                <td>
                                    <a href="/ticket/100925-tk3">What happens with my
                                        premium account?</a>
                                </td>
                                <td>Luis Molina</td>
                                <td>1000</td>
                                <td class="status" style="color: rgb(246, 78, 96);">
                                    complete
                                </td>
                                <td>05/18/2023</td>
                                <td>05/19/2023</td>
                            </tr>
                            <tr class="my-3 h-12 odd:bg-transparent even:bg-[#142132]">
                                <td class="sorting_1"><a href="/ticket/100925-tk2">31</a>
                                </td>
                                <td>player-setting</td>
                                <td>
                                    <a href="/ticket/100925-tk2">CUSTOM ADS</a>
                                </td>
                                <td>Luis Molina</td>
                                <td>1000</td>
                                <td class="status" style="color: rgb(246, 78, 96);">
                                    complete
                                </td>
                                <td>05/16/2023</td>
                                <td>05/17/2023</td>
                            </tr>
                            <tr class="my-3 h-12 odd:bg-transparent even:bg-[#142132]">
                                <td class="sorting_1"><a href="/ticket/100925-tk1">32</a>
                                </td>
                                <td>player-setting</td>
                                <td>
                                    <a href="/ticket/100925-tk1">Custom Ads on Player</a>
                                </td>
                                <td>Luis Molina</td>
                                <td>1000</td>
                                <td class="status" style="color: rgb(246, 78, 96);">
                                    complete
                                </td>
                                <td>05/13/2023</td>
                                <td>05/16/2023</td>
                            </tr>
                            <tr class="my-3 h-12 odd:bg-transparent even:bg-[#142132]">
                                <td class="sorting_1"><a href="/ticket/100081-tk5">33</a>
                                </td>
                                <td>other</td>
                                <td>
                                    <a href="/ticket/100081-tk5">please delete my files from
                                        here</a>
                                </td>
                                <td>Google</td>
                                <td>1000</td>
                                <td class="status" style="color: rgb(255, 168, 0);">
                                    pendding
                                </td>
                                <td>05/13/2023</td>
                                <td>05/13/2023</td>
                            </tr>
                            <tr class="my-3 h-12 odd:bg-transparent even:bg-[#142132]">
                                <td class="sorting_1"><a href="/ticket/100282-tk4">34</a>
                                </td>
                                <td>upload</td>
                                <td>
                                    <a href="/ticket/100282-tk4">All the videos uploaded
                                        today are 232011</a>
                                </td>
                                <td>sungnet</td>
                                <td>1000</td>
                                <td class="status" style="color: rgb(255, 168, 0);">
                                    pendding
                                </td>
                                <td>05/05/2023</td>
                                <td>05/05/2023</td>
                            </tr>
                            <tr class="my-3 h-12 odd:bg-transparent even:bg-[#142132]">
                                <td class="sorting_1"><a href="/ticket/100282-tk3">35</a>
                                </td>
                                <td>upload</td>
                                <td>
                                    <a href="/ticket/100282-tk3">many error code 232011
                                        these days</a>
                                </td>
                                <td>sungnet</td>
                                <td>1000</td>
                                <td class="status" style="color: rgb(255, 168, 0);">
                                    pendding
                                </td>
                                <td>05/05/2023</td>
                                <td>05/05/2023</td>
                            </tr>
                            <tr class="my-3 h-12 odd:bg-transparent even:bg-[#142132]">
                                <td class="sorting_1"><a href="/ticket/100081-tk4">36</a>
                                </td>
                                <td>other</td>
                                <td>
                                    <a href="/ticket/100081-tk4">iPhone issue</a>
                                </td>
                                <td>Felix</td>
                                <td>1000</td>
                                <td class="status" style="color: rgb(255, 168, 0);">
                                    pendding
                                </td>
                                <td>03/30/2023</td>
                                <td>03/30/2023</td>
                            </tr>
                            <tr class="my-3 h-12 odd:bg-transparent even:bg-[#142132]">
                                <td class="sorting_1"><a href="/ticket/100012-tk1">37</a>
                                </td>
                                <td>upload</td>
                                <td>
                                    <a href="/ticket/100012-tk1">Uploaded Successfully! But
                                        Not Have Videos :(</a>
                                </td>
                                <td>SHIGEO TOKUDA</td>
                                <td>1000</td>
                                <td class="status" style="color: rgb(255, 168, 0);">
                                    pendding
                                </td>
                                <td>03/06/2023</td>
                                <td>03/06/2023</td>
                            </tr>
                            <tr class="my-3 h-12 odd:bg-transparent even:bg-[#142132]">
                                <td class="sorting_1"><a href="/ticket/100481-tk2">38</a>
                                </td>
                                <td>player-setting</td>
                                <td>
                                    <a href="/ticket/100481-tk2">Subtitle</a>
                                </td>
                                <td>peterikvetalii</td>
                                <td>1000</td>
                                <td class="status" style="color: rgb(255, 168, 0);">
                                    pendding
                                </td>
                                <td>12/10/2022</td>
                                <td>12/10/2022</td>
                            </tr>
                            <tr class="my-3 h-12 odd:bg-transparent even:bg-[#142132]">
                                <td class="sorting_1"><a href="/ticket/100481-tk1">39</a>
                                </td>
                                <td>upload</td>
                                <td>
                                    <a href="/ticket/100481-tk1">Uplaod api</a>
                                </td>
                                <td>peterikvetalii</td>
                                <td>1000</td>
                                <td class="status" style="color: rgb(246, 78, 96);">
                                    complete
                                </td>
                                <td>11/04/2022</td>
                                <td>11/12/2022</td>
                            </tr>
                            <tr class="my-3 h-12 odd:bg-transparent even:bg-[#142132]">
                                <td class="sorting_1"><a href="/ticket/100344-tk2">40</a>
                                </td>
                                <td>upload</td>
                                <td>
                                    <a href="/ticket/100344-tk2">I want to upload using
                                        FTP</a>
                                </td>
                                <td>Zakku Arai</td>
                                <td>1000</td>
                                <td class="status" style="color: rgb(255, 168, 0);">
                                    pendding
                                </td>
                                <td>10/26/2022</td>
                                <td>10/26/2022</td>
                            </tr>
                            <tr class="my-3 h-12 odd:bg-transparent even:bg-[#142132]">
                                <td class="sorting_1"><a href="/ticket/100008-tk2">41</a>
                                </td>
                                <td>upload</td>
                                <td>
                                    <a href="/ticket/100008-tk2">New uploaded videos are not
                                        encoded, please check</a>
                                </td>
                                <td>zhanghao00099@gmail.com</td>
                                <td>1000</td>
                                <td class="status" style="color: rgb(255, 168, 0);">
                                    pendding
                                </td>
                                <td>10/19/2022</td>
                                <td>10/19/2022</td>
                            </tr>
                            <tr class="my-3 h-12 odd:bg-transparent even:bg-[#142132]">
                                <td class="sorting_1"><a href="/ticket/100344-tk1">42</a>
                                </td>
                                <td>other</td>
                                <td>
                                    <a href="/ticket/100344-tk1">I want my account to have
                                        fast video encoding</a>
                                </td>
                                <td>Zakku Arai</td>
                                <td>1000</td>
                                <td class="status" style="color: rgb(255, 168, 0);">
                                    pendding
                                </td>
                                <td>09/12/2022</td>
                                <td>09/14/2022</td>
                            </tr>
                            <tr class="my-3 h-12 odd:bg-transparent even:bg-[#142132]">
                                <td class="sorting_1"><a href="/ticket/100471-tk1">43</a>
                                </td>
                                <td>other</td>
                                <td>
                                    <a href="/ticket/100471-tk1">Video deletion time</a>
                                </td>
                                <td>Jet</td>
                                <td>1000</td>
                                <td class="status" style="color: rgb(255, 168, 0);">
                                    pendding
                                </td>
                                <td>08/02/2022</td>
                                <td>08/02/2022</td>
                            </tr>
                            <tr class="my-3 h-12 odd:bg-transparent even:bg-[#142132]">
                                <td class="sorting_1"><a href="/ticket/100081-tk3">44</a>
                                </td>
                                <td>upload</td>
                                <td>
                                    <a href="/ticket/100081-tk3">500 Internal Server
                                        Error</a>
                                </td>
                                <td>Felix</td>
                                <td>1000</td>
                                <td class="status" style="color: rgb(255, 168, 0);">
                                    pendding
                                </td>
                                <td>07/22/2022</td>
                                <td>07/23/2022</td>
                            </tr>
                            <tr class="my-3 h-12 odd:bg-transparent even:bg-[#142132]">
                                <td class="sorting_1"><a href="/ticket/100282-tk2">45</a>
                                </td>
                                <td>video-manage</td>
                                <td>
                                    <a href="/ticket/100282-tk2">Is there any way to change
                                        the poster of a video?</a>
                                </td>
                                <td>sungnet</td>
                                <td>1000</td>
                                <td class="status" style="color: rgb(255, 168, 0);">
                                    pendding
                                </td>
                                <td>07/18/2022</td>
                                <td>07/18/2022</td>
                            </tr>
                            <tr class="my-3 h-12 odd:bg-transparent even:bg-[#142132]">
                                <td class="sorting_1"><a href="/ticket/100008-tk1">46</a>
                                </td>
                                <td>upload</td>
                                <td>
                                    <a href="/ticket/100008-tk1">remote upload not
                                        working</a>
                                </td>
                                <td>zhanghao00099@gmail.com</td>
                                <td>1000</td>
                                <td class="status" style="color: rgb(246, 78, 96);">
                                    complete
                                </td>
                                <td>07/11/2022</td>
                                <td>07/11/2022</td>
                            </tr>
                            <tr class="my-3 h-12 odd:bg-transparent even:bg-[#142132]">
                                <td class="sorting_1"><a href="/ticket/100438-tk1">47</a>
                                </td>
                                <td>player-setting</td>
                                <td>
                                    <a href="/ticket/100438-tk1">Custom domain</a>
                                </td>
                                <td>Gaduin Pauline</td>
                                <td>1000</td>
                                <td class="status" style="color: rgb(255, 168, 0);">
                                    pendding
                                </td>
                                <td>06/10/2022</td>
                                <td>07/27/2022</td>
                            </tr>
                            <tr class="my-3 h-12 odd:bg-transparent even:bg-[#142132]">
                                <td class="sorting_1"><a href="/ticket/100358-tk5">48</a>
                                </td>
                                <td>player-setting</td>
                                <td>
                                    <a href="/ticket/100358-tk5">Please add my custom
                                        domain</a>
                                </td>
                                <td>Muhammad Muzamil</td>
                                <td>1000</td>
                                <td class="status" style="color: rgb(255, 168, 0);">
                                    pendding
                                </td>
                                <td>05/24/2022</td>
                                <td>05/24/2022</td>
                            </tr>
                            <tr class="my-3 h-12 odd:bg-transparent even:bg-[#142132]">
                                <td class="sorting_1"><a href="/ticket/100358-tk4">49</a>
                                </td>
                                <td>player-setting</td>
                                <td>
                                    <a href="/ticket/100358-tk4">Add my custom domain</a>
                                </td>
                                <td>Muhammad Muzamil</td>
                                <td>1000</td>
                                <td class="status" style="color: rgb(255, 168, 0);">
                                    pendding
                                </td>
                                <td>05/08/2022</td>
                                <td>05/08/2022</td>
                            </tr>
                            <tr class="my-3 h-12 odd:bg-transparent even:bg-[#142132]">
                                <td class="sorting_1"><a href="/ticket/100358-tk3">50</a>
                                </td>
                                <td>player-setting</td>
                                <td>
                                    <a href="/ticket/100358-tk3">You have not set up my
                                        custom domain yet?</a>
                                </td>
                                <td>Muhammad Muzamil</td>
                                <td>1000</td>
                                <td class="status" style="color: rgb(255, 168, 0);">
                                    pendding
                                </td>
                                <td>05/01/2022</td>
                                <td>05/05/2022</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

