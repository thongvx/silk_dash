<!-- Navbar -->
    <nav
      class="flex z-20 flex-wrap items-center justify-between px-3 py-2 lg:px-3 transition-all ease-in shadow-none duration-250 rounded-2xl lg:flex-nowrap lg:justify-start"
      navbar-main navbar-scroll="false">
      <div class="flex items-center justify-between w-full px-0 mx-auto flex-wrap">
          <a href="javascript:;" class="block xl:hidden p-0 text-sm text-white transition-all ease-nav-brand" sidenav-trigger>
              <div class="w-6 overflow-hidden">
                  <i class="ease mb-1.5 relative block h-0.5 rounded-sm bg-white transition-all"></i>
                  <i class="ease mb-1.5 relative block h-0.5 rounded-sm bg-white transition-all"></i>
                  <i class="ease relative block h-0.5 rounded-sm bg-white transition-all"></i>
              </div>
          </a>
         <div class="">
          <a class="flex ld:px-6 m-0 text-sm whitespace-nowrap items-center" href="" target="_blank">
            <img src="{{asset('image/logo/logo4.webp')}}"
              class="h-full max-w-full transition-all duration-200 ease-nav-brand max-h-10"
              alt="main_logo" />
            <span class="ml-3 font-semibold transition-all duration-200 ease-nav-brand">
              <img src="{{asset('image/logo/name.webp')}}"
              class="h-full max-w-full transition-all duration-200 ease-nav-brand max-h-10"
              alt="main_logo" />
            </span>
          </a>
        </div>

          <div class="block xl:flex items-center justify-between mt-2 grow sm:mt-0 sm:mr-6 md:mr-0 lg:flex lg:basis-auto max-w-max">
              <div id="time" class="text-white hidden lg:block">
              </div>
              <div class="hidden items-center md:ml-auto px-2 xl:flex">
                  <form class="flex items-center relative bg-[#121520] w-full rounded-lg ease" action="/admin/videoAdmin/search" method="GET" search>
                      <label for="search" class="p-1 flex bg-[#121520] items-center translate-x-3 transition duration-300 ease-in-out z-30 absolute text-slate-400">Search video...</label>
                      <input type="text" id="search" name="videoID" value="" search-input
                             class="z-20 px-3 py-2 text-sm relative -ml-px block min-w-0 lg:w-52 flex-auto text-white rounded-lg bg-transparent bg-clip-padding focus:outline-none
                         border border-solid border-[#121520]"
                      />
                      <input type="submit" value="Search" class="hidden" />
                  </form>
              </div>
          <ul class="flex flex-row justify-end pl-0 mb-0 list-none md-max:w-full">
            <!-- online builder btn  -->
            <!-- <li class="flex items-center">
                <a class="inline-block px-8 py-2 mb-0 mr-4 text-xs font-bold text-center text-blue-500 uppercase align-middle transition-all ease-in bg-transparent border border-blue-500 border-solid rounded-lg shadow-none cursor-pointer leading-pro hover:-translate-y-px active:shadow-xs hover:border-blue-500 active:bg-blue-500 active:hover:text-blue-500 hover:text-blue-500 tracking-tight-rem hover:bg-transparent hover:opacity-75 hover:shadow-none active:text-white active:hover:bg-transparent" target="_blank" href="https://www.creative-tim.com/builder/soft-ui?ref=navbar-dashboard&amp;_ga=2.76518741.1192788655.1647724933-1242940210.1644448053">Online Builder</a>
              </li> -->
            <!-- notifications -->
              <li class="relative items-center lg:px-4 md:flex">
                  <a href="javascript:;" aria-expanded="false"  dropdown-trigger
                     class="flex flex-col text-sm font-semibold text-white transition-all ease-nav-brand">
                <span class="rounded-full border h-10 w-10 text-lg font-bold flex items-center justify-center">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                </span>
                  </a>
                  <ul dropdown-menu
                      class="text-sm transform-dropdown bg-[#121520] before:font-awesome before:leading-default before:duration-350 before:ease
                       shadow-lg shadow-slate-900 duration-250 before:sm:right-8 before:text-5.5 pointer-events-none absolute right-0 top-10 z-40 lg:top-12
                       origin-top list-none rounded-lg border-none bg-clip-padding
                       pl-1 py-2 text-left text-slate-500 opacity-0 transition-all before:absolute before:right-2 before:left-auto before:-top-4 before:z-10
                       before:inline-block before:font-normal before:text-[#121520] before:antialiased before:transition-all before:text-xl before:content-['▲'] sm:-mr-6
                       lg:absolute lg:right-5 lg:left-auto lg:mt-2 lg:block lg:cursor-pointer">
                      <li class="relative mb-1">
                          <a class="ease py-1.5 clear-both block w-full whitespace-nowrap rounded-lg bg-transparent px-4 duration-300 lg:transition-colors"
                             href="javascript:;">
                              <div class="flex py-1">
                                  <div class="flex flex-col justify-center">
                                      <h6 class="mb-1 text-lg font-semibold leading-normal dark:text-white">{{ Auth::user()->name}}</h6>
                                      <p class="mb-0 text-xs leading-tight text-white/80">
                                          {{ Auth::user()->email}}
                                      </p>
                                      <p class="mb-0 text-sm leading-tight {{ Auth::user()->premium == 1 ? 'text-indigo-500' : 'text-emerald-500' }}">
                                          {{ Auth::user()->premium == 1 ? 'Premium' : 'Free' }}
                                      </p>
                                  </div>
                              </div>
                          </a>
                      </li>
                      <hr class="h-px mt-0 bg-transparent bg-gradient-to-r from-transparent via-white to-transparent border-none" />
                      <!-- add show class on dropdown open js -->
                      <li class="relative mb-2">
                          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="menu-sidebar pl-2 pr-12opacity-80 hover:bg-[#009FB2] py-1.5 text-sm ease-nav-brand my-0 flex items-center whitespace-nowrap font-semibold rounded-lg transition-colors">
                              @csrf
                              <input type="hidden" name="_method" value="POST">
                              <button type="submit" class=" text-red-500 flex items-center">
                                  <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                                      <i class="material-symbols-outlined opacity-1 font-bold">logout</i>
                                  </div>
                                  <span class="ml-1 duration-300 opacity-1 pointer-events-none ease">Log Out</span>
                              </button>
                          </form>
                      </li>
                  </ul>
              </li>


          </ul>
        </div>
      </div>
    </nav>

    <!-- end Navbar -->
