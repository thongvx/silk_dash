<!-- sidenav  -->
<aside class="fixed inset-y-0 flex-wrap items-center justify-between block w-full {{$minimenu === 'true' ? 'xl:w-max' :''}} p-0 my-4
         antialiased transition-transform duration-300 -translate-x-full border-0 shadow-xl max-w-64
         ease-nav-brand z-30 xl:ml-6 rounded-2xl xl:left-0 xl:translate-x-0 bg-[#121520]" aside-menu
       aria-expanded="false">
    <div class="h-19">
        <i class="material-symbols-outlined absolute top-0 right-0 p-4 opacity-50 cursor-pointer text-white xl:hidden font-bold" sidenav-close>close</i>
        <a class="{{$minimenu === 'true' ? 'px-2 py-4 xl:scale-75' :'px-6 py-4'}} flex m-0 text-sm whitespace-nowrap items-center" target="_blank" logo>
            <img src="../assets/img/logo3.png"
                 class="brightness-150	h-full max-w-full transition-all duration-200 ease-nav-brand max-h-12" alt="main_logo" />
            <span class="{{$minimenu === 'true' ? 'xl:max-w-0 xl:opacity-0' :''}} ml-1 font-semibold transition-all duration-200 ease-nav-brand" name-web>
        <img src="../assets/img/name-web3.png"
             class="brightness-150	h-full max-w-full transition-all duration-200 ease-nav-brand max-h-8" alt="main_logo" />
      </span>
        </a>
    </div>

    <div button-mini-sidebar mini-sidebar="{{$minimenu}}"
         class="{{$minimenu === 'false' ? '-rotate-180' :''}} z-10 p-1 absolute text-white top-16 -right-3 transition-all duration-300 rounded-full bg-[#009FB2] hidden xl:flex cursor-pointer">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true" class="h-5 w-5"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"></path></svg>
    </div>
    <hr class="h-px mt-0 bg-transparent bg-gradient-to-r from-transparent via-white to-transparent border-none" />

    <div class="items-center block w-auto max-h-[calc(100vh-9em)] overflow-y-auto h-sidenav grow basis-full mt-3 ">
        <ul class="flex flex-col pl-0 mb-0">
            <li class="{{$minimenu === 'true' ? 'xl:w-max' :''}} mt-2.5 w-full" li-menu>
                <a class="{{$minimenu === 'true' ? 'px-2' :'px-4'}} py-1.5 menu-sidebar hover:bg-[#009FB2] text-white opacity-80 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-lg font-semibold text-slate-700 transition-colors"
                   href="/dashboard">
                    <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5" icon-menu>
                        <i class="material-symbols-outlined opacity-1 text-3xl">dashboard</i>
                    </div>
                    <span class="{{$minimenu === 'true' ? 'xl:max-w-0 xl:hidden' :''}} ml-3 opacity-1 pointer-events-none ease" name-menu name="dashboard">Dashboard</span>
                </a>
            </li>

            <li class="{{$minimenu === 'true' ? 'xl:w-max' :''}} mt-2.5 w-full" li-menu>
                <a class="{{$minimenu === 'true' ? 'px-2' :'px-4'}} py-1.5 menu-sidebar hover:bg-[#009FB2] text-white opacity-80 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-lg font-semibold text-slate-700 transition-colors"
                   href="/upload?tab=webupload">
                    <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5" icon-menu>
                        <i class="material-symbols-outlined opacity-1 text-3xl">cloud_upload</i>
                    </div>
                    <span class="{{$minimenu === 'true' ? 'xl:max-w-0 xl:hidden' :''}} ml-3 opacity-1 pointer-events-none ease" name-menu name="upload">Upload</span>
                </a>
            </li>

            <li class="{{$minimenu === 'true' ? 'xl:w-max' :''}} mt-2.5 w-full" li-menu>
                <a class="{{$minimenu === 'true' ? 'px-2' :'px-4'}} py-1.5 menu-sidebar hover:bg-[#009FB2] text-white opacity-80 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-lg font-semibold text-slate-700 transition-colors"
                   href="/video?tab=live">
                    <div
                        class="flex h-8 w-8 items-center justify-center rounded-lg bg-center fill-current stroke-0 text-center xl:p-2.5" icon-menu>
                        <i class="material-symbols-outlined opacity-1 text-3xl">video_library</i>
                    </div>
                    <span class="{{$minimenu === 'true' ? 'xl:max-w-0 xl:hidden' :''}} ml-3 opacity-1 pointer-events-none ease" name-menu name="video">My Videos</span>
                </a>
            </li>

            <li class="{{$minimenu === 'true' ? 'xl:w-max' :''}} mt-2.5 w-full" li-menu>
                <a class="{{$minimenu === 'true' ? 'px-2' :'px-4'}} py-1.5 menu-sidebar hover:bg-[#009FB2] text-white opacity-80 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-lg font-semibold text-slate-700 transition-colors"
                   href="/report">
                    <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5" icon-menu>
                        <i class="material-symbols-outlined opacity-1 text-3xl">show_chart</i>
                    </div>
                    <span class="{{$minimenu === 'true' ? 'xl:max-w-0 xl:hidden' :''}} ml-3 opacity-1 pointer-events-none ease" name-menu name="report">Reports</span>
                </a>
            </li>
            <li class="{{$minimenu === 'true' ? 'xl:w-max' :''}} mt-2.5 w-full" li-menu>
                <a class="{{$minimenu === 'true' ? 'px-2' :'px-4'}} py-1.5 menu-sidebar hover:bg-[#009FB2] text-white opacity-80 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-lg font-semibold text-slate-700 transition-colors"
                   href="/support?tab=ticket">
                    <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5" icon-menu>
                        <i class="material-symbols-outlined opacity-1 text-3xl">support_agent</i>
                    </div>
                    <span class="{{$minimenu === 'true' ? 'xl:max-w-0 xl:hidden' :''}} ml-3 opacity-1 pointer-events-none ease" name-menu name="support">Support</span>
                </a>
            </li>
            <li class="{{$minimenu === 'true' ? 'xl:w-max' :''}} mt-2.5 w-full" li-menu>
                <a class="{{$minimenu === 'true' ? 'px-2' :'px-4'}} py-1.5 menu-sidebar hover:bg-[#009FB2] text-white opacity-80 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-lg font-semibold text-slate-700 transition-colors"
                   href="/dmca">
                    <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5" icon-menu>
                        <i class="material-symbols-outlined opacity-1 text-3xl">report</i>
                    </div>
                    <span class="{{$minimenu === 'true' ? 'xl:max-w-0 xl:hidden' :''}} ml-3 opacity-1 pointer-events-none ease" name-menu name="dmca">DMCA</span>
                </a>
            </li>

            <li class="{{$minimenu === 'true' ? 'xl:hidden' :''}} w-full mt-4 mb-2" account-pages>
                <h6 class="pl-6 ml-2 text-xs font-bold leading-tight uppercase dark:text-white opacity-60">Account pages</h6>
            </li>

            <li class="{{$minimenu === 'true' ? 'xl:w-max' :''}} mt-2.5 w-full" li-menu>
                <a class="{{$minimenu === 'true' ? 'px-2' :'px-4'}} py-1.5 menu-sidebar hover:bg-[#009FB2] text-white opacity-80 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-lg font-semibold text-slate-700 transition-colors"
                   href="/setting?tab=profile">
                    <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5" icon-menu>
                        <i class="material-symbols-outlined opacity-1">person</i>
                    </div>
                    <span class="{{$minimenu === 'true' ? 'xl:max-w-0 xl:hidden' :''}} ml-3 opacity-1 pointer-events-none ease" name-menu name="setting">My Account</span>
                </a>
            </li>

            <li class="{{$minimenu === 'true' ? 'xl:w-max' :''}} mt-2.5 w-full" li-menu>
                <form class="{{$minimenu === 'true' ? 'px-2' :'px-4'}} py-1.5 menu-sidebar hover:bg-[#009FB2] text-white opacity-80 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-lg font-semibold text-slate-700 transition-colors" id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                    <input type="hidden" name="_method" value="POST">
                    <button type="submit" class="flex items-center text-red-500">
                        <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5" icon-menu>
                            <i class="material-symbols-outlined opacity-1 font-bold">logout</i>
                        </div>
                        <span class="{{$minimenu === 'true' ? 'xl:max-w-0 xl:hidden' :''}} ml-3 opacity-1 pointer-events-none ease" name-menu>Log Out</span>
                    </button>
                </form>
            </li>

        </ul>
    </div>
</aside>
<!-- end sidenav -->
