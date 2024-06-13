<!-- sidenav  -->
<aside
    class="fixed  inset-y-0 lg:sticky lg:top-0 lg:inset-x-0 flex-wrap items-center justify-between block p-0 my-4 lg:my-0
         antialiased transition-transform duration-200 -translate-x-full border-0 shadow-xl max-w-64 lg:max-w-full
         ease-nav-brand z-20 xl:mx-6 rounded-2xl lg:rounded-lg xl:left-0 xl:translate-x-0 bg-[#121520]"
    aria-expanded="false">
    <div class="h-19 lg:hidden">
        <i class="absolute top-0 right-0 p-4 opacity-50 cursor-pointer fas fa-times text-white xl:hidden"
           sidenav-close></i>
        <a class="flex px-6 py-4 m-0 text-sm whitespace-nowrap items-center" href="" target="_blank">
            <img src="../assets/img/logo3.png"
                 class="brightness-150	h-full max-w-full transition-all duration-200 ease-nav-brand max-h-12"
                 alt="main_logo"/>
            <span class="ml-1 font-semibold transition-all duration-200 ease-nav-brand">
        <img src="../assets/img/name-web3.png"
             class="brightness-150	h-full max-w-full transition-all duration-200 ease-nav-brand max-h-8"
             alt="main_logo"/>
      </span>
        </a>
    </div>
    <hr class="lg:hidden h-px mt-0 bg-transparent bg-gradient-to-r from-transparent via-white to-transparent border-none"/>

    <div class="items-center block w-auto max-h-screen overflow-auto h-sidenav grow basis-full">
        <ul class="flex flex-col lg:flex-row pl-0 mb-0">
            <li class="my-1.5 w-full">
                <a class="menu-sidebar text-white opacity-80 py-1.5 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap font-semibold rounded-lg px-4 hover:bg-[#009FB2] duration-300"
                   href="/admin/dashboard">
                    <div
                        class="mr-1 flex h-8 w-8 lg:h-4 lg:w-4 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                        <i class="material-symbols-outlined opacity-1">dashboard</i>
                    </div>
                    <span class="ml-1 duration-300 opacity-1 pointer-events-none ease" name="dashboard">Dashboard</span>
                </a>
            </li>

            <li class="my-1.5 w-full">
                <a class="menu-sidebar text-white opacity-80 py-1.5 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap font-semibold rounded-lg px-4 hover:bg-[#009FB2] duration-300"
                   href="javascript:;" dropdown-trigger aria-expanded="false">
                    <div
                        class="mr-1 flex h-8 w-8 lg:h-4 lg:w-4 items-center justify-center rounded-lg bg-center fill-current stroke-0 text-center xl:p-2.5">
                        <i class="material-symbols-outlined opacity-1">mail</i>
                    </div>
                    <span class="ml-1 duration-300 opacity-1 pointer-events-none ease" name="email">Mail</span>
                </a>
                <ul class="text-sm transform-dropdown bg-[#121520] shadow-lg shadow-slate-900 duration-250 min-w-48 pointer-events-none absolute top-10 z-30
 origin-top list-none rounded-lg border-none bg-clip-padding pr-2 py-2 text-left text-slate-500 opacity-0 transition-all sm:-mr-6
 lg:absolute lg:left-auto lg:block lg:cursor-pointer" dropdown-menu>
                    <li class="my-1.5 w-full">
                        <a class="menu-sidebar text-white opacity-80 py-1.5 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap font-semibold rounded-lg px-4 hover:bg-[#009FB2] duration-300"
                           href="/admin/setting">
                            <div
                                class="mr-1 flex h-8 w-8 lg:h-4 lg:w-4 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                                <i class="material-symbols-outlined opacity-1">commit</i>
                            </div>
                            <span class="ml-1 duration-300 opacity-1 pointer-events-none ease"
                                  name="setting">Mail Box</span>
                        </a>
                    </li>
                    <li class="my-1.5 w-full">
                        <a class="menu-sidebar text-white opacity-80 py-1.5 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap font-semibold rounded-lg px-4 hover:bg-[#009FB2] duration-300"
                           href="/admin/setting">
                            <div
                                class="mr-1 flex h-8 w-8 lg:h-4 lg:w-4 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                                <i class="material-symbols-outlined opacity-1">commit</i>
                            </div>
                            <span class="ml-1 duration-300 opacity-1 pointer-events-none ease"
                                  name="setting">Email</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="my-1.5 w-full">
                <a class="menu-sidebar text-white opacity-80 py-1.5 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap font-semibold rounded-lg px-4 hover:bg-[#009FB2] duration-300"
                   href="/admin/compute?tab=storage">
                    <div
                        class="mr-1 flex h-8 w-8 lg:h-4 lg:w-4 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                        <i class="material-symbols-outlined opacity-1">computer</i>
                    </div>
                    <span class="ml-1 duration-300 opacity-1 pointer-events-none ease" name="compute">Compute</span>
                </a>
            </li>
            <li class="my-1.5 w-full">
                <a class="menu-sidebar text-white opacity-80 py-1.5 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap font-semibold rounded-lg px-4 hover:bg-[#009FB2] duration-300"
                   href="/admin/statistic?tab=user">
                    <div
                        class="mr-1 flex h-8 w-8 lg:h-4 lg:w-4 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                        <i class="material-symbols-outlined opacity-1">analytics</i>
                    </div>
                    <span class="ml-1 duration-300 opacity-1 pointer-events-none ease" name="statistic">Statistic</span>
                </a>
            </li>
            <li class="my-1.5 w-full">
                <a class="menu-sidebar text-white opacity-80 py-1.5 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap font-semibold rounded-lg px-4 hover:bg-[#009FB2] duration-300"
                   href="javascript:;" dropdown-trigger aria-expanded="false">
                    <div
                        class="mr-1 flex h-8 w-8 lg:h-4 lg:w-4 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                        <i class="material-symbols-outlined opacity-1">sync_alt</i>
                    </div>
                    <span class="ml-1 duration-300 opacity-1 pointer-events-none ease" name="manageTask">Manage Task</span>
                </a>
                <ul class="text-sm transform-dropdown bg-[#121520] shadow-lg shadow-slate-900 duration-250 min-w-48 pointer-events-none absolute top-10 z-20
 origin-top list-none rounded-lg border-none bg-clip-padding pr-2 py-2 text-left text-slate-500 opacity-0 transition-all sm:-mr-6
 lg:absolute lg:left-auto lg:block lg:cursor-pointer" dropdown-menu>
                    <li class="my-1.5 w-full">
                        <a class="menu-sidebar text-white opacity-80 py-1.5 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap font-semibold rounded-lg px-4 hover:bg-[#009FB2] duration-300"
                           href="/admin/manageTask?tab=encodingTask&status=all">
                            <div
                                class="mr-1 flex h-8 w-8 lg:h-4 lg:w-4 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                                <i class="material-symbols-outlined opacity-1">commit</i>
                            </div>
                            <span class="tab-menu ml-1 duration-300 opacity-1 pointer-events-none ease" tab="encodingTask">Encoding Task</span>
                        </a>
                    </li>
                    <li class="my-1.5 w-full">
                        <a class="menu-sidebar text-white opacity-80 py-1.5 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap font-semibold rounded-lg px-4 hover:bg-[#009FB2] duration-300"
                           href="/admin/manageTask?tab=transferTask">
                            <div
                                class="mr-1 flex h-8 w-8 lg:h-4 lg:w-4 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                                <i class="material-symbols-outlined opacity-1">commit</i>
                            </div>
                            <span class="tab-menu ml-1 duration-300 opacity-1 pointer-events-none ease" tab="transferTask">Trasfer Task</span>
                        </a>
                    </li>
                    <li class="my-1.5 w-full">
                        <a class="menu-sidebar text-white opacity-80 py-1.5 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap font-semibold rounded-lg px-4 hover:bg-[#009FB2] duration-300"
                           href="/admin/manageTask?tab=torrentTask">
                            <div
                                class="mr-1 flex h-8 w-8 lg:h-4 lg:w-4 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                                <i class="material-symbols-outlined opacity-1">commit</i>
                            </div>
                            <span class="tab-menu ml-1 duration-300 opacity-1 pointer-events-none ease" tab="setting">Torrent Task</span>
                        </a>
                    </li>
                    <li class="my-1.5 w-full">
                        <a class="menu-sidebar text-white opacity-80 py-1.5 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap font-semibold rounded-lg px-4 hover:bg-[#009FB2] duration-300"
                           href="/admin/manageTask?tab=streamTask">
                            <div
                                class="mr-1 flex h-8 w-8 lg:h-4 lg:w-4 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                                <i class="material-symbols-outlined opacity-1">commit</i>
                            </div>
                            <span class="tab-menu ml-1 duration-300 opacity-1 pointer-events-none ease" tab="setting">Stream Task</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="my-1.5 w-full">
                <a class="menu-sidebar text-white opacity-80 py-1.5 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap font-semibold rounded-lg px-4 hover:bg-[#009FB2] duration-300"
                   href="/admin/user?tab=all">
                    <div
                        class="mr-1 flex h-8 w-8 lg:h-4 lg:w-4 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                        <i class="material-symbols-outlined opacity-1">person</i>
                    </div>
                    <span class="ml-1 duration-300 opacity-1 pointer-events-none ease" name="user">User</span>
                </a>
            </li>

            <li class="my-1.5 w-full">
                <a class="menu-sidebar text-white opacity-80 py-1.5 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap font-semibold rounded-lg px-4 hover:bg-[#009FB2] duration-300"
                   href="javascript:;" dropdown-trigger aria-expanded="false">
                    <div
                        class="mr-1 flex h-8 w-8 lg:h-4 lg:w-4 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                        <i class="material-symbols-outlined opacity-1">support_agent</i>
                    </div>
                    <span class="ml-1 duration-300 opacity-1 pointer-events-none ease" name="support">Support</span>
                </a>
                <ul class="text-sm transform-dropdown bg-[#121520] shadow-lg shadow-slate-900 duration-250 min-w-48 pointer-events-none absolute top-10 z-30
 origin-top list-none rounded-lg border-none bg-clip-padding pr-2 py-2 text-left text-slate-500 opacity-0 transition-all sm:-mr-6
 lg:absolute lg:left-auto lg:block lg:cursor-pointer" dropdown-menu>
                    <li class="my-1.5 w-full">
                        <a class="menu-sidebar text-white opacity-80 py-1.5 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap font-semibold rounded-lg px-4 hover:bg-[#009FB2] duration-300"
                           href="/admin/support?tab=cases">
                            <div
                                class="mr-1 flex h-8 w-8 lg:h-4 lg:w-4 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                                <i class="material-symbols-outlined opacity-1">commit</i>
                            </div>
                            <span class="ml-1 duration-300 opacity-1 pointer-events-none ease" name="cases">Cases</span>
                        </a>
                    </li>
                    <li class="my-1.5 w-full">
                        <a class="menu-sidebar text-white opacity-80 py-1.5 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap font-semibold rounded-lg px-4 hover:bg-[#009FB2] duration-300"
                           href="/admin/support?tab=reports">
                            <div
                                class="mr-1 flex h-8 w-8 lg:h-4 lg:w-4 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                                <i class="material-symbols-outlined opacity-1">commit</i>
                            </div>
                            <span class="ml-1 duration-300 opacity-1 pointer-events-none ease"
                                  name="report">Reports</span>
                        </a>
                    </li>
                    <li class="my-1.5 w-full">
                        <a class="menu-sidebar text-white opacity-80 py-1.5 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap font-semibold rounded-lg px-4 hover:bg-[#009FB2] duration-300"
                           href="/admin/support?tab=customdomain">
                            <div
                                class="mr-1 flex h-8 w-8 lg:h-4 lg:w-4 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                                <i class="material-symbols-outlined opacity-1">commit</i>
                            </div>
                            <span class="ml-1 duration-300 opacity-1 pointer-events-none ease" name="customDomain">Custom Domain</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="my-1.5 w-full">
                <a class="menu-sidebar text-white opacity-80 py-1.5 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap font-semibold rounded-lg px-4 hover:bg-[#009FB2] duration-300"
                   href="">
                    <div
                        class="mr-1 flex h-8 w-8 lg:h-4 lg:w-4 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                        <i class="material-symbols-outlined opacity-1">edit_note</i>
                    </div>
                    <span class="ml-1 duration-300 opacity-1 pointer-events-none ease">Advert Manage</span>
                </a>
            </li>
            <li class="my-1.5 w-full">
                <a class="menu-sidebar text-white opacity-80 py-1.5 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap font-semibold rounded-lg px-4 hover:bg-[#009FB2] duration-300"
                   href="">
                    <div
                        class="mr-1 flex h-8 w-8 lg:h-4 lg:w-4 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                        <i class="material-symbols-outlined opacity-1">payments</i>
                    </div>
                    <span class="ml-1 duration-300 opacity-1 pointer-events-none ease">Payment</span>
                </a>
            </li>
            <li class="my-1.5 w-full">
                <a class="menu-sidebar text-white opacity-80 py-1.5 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap font-semibold rounded-lg px-4 hover:bg-[#009FB2] duration-300"
                   href="">
                    <div
                        class="mr-1 flex h-8 w-8 lg:h-4 lg:w-4 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                        <i class="material-symbols-outlined opacity-1">error</i>
                    </div>
                    <span class="ml-1 duration-300 opacity-1 pointer-events-none ease">Error</span>
                </a>
            </li>
        </ul>
    </div>
</aside>

<!-- end sidenav -->
