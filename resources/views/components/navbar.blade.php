<!-- Navbar -->
    <nav
      class="sticky top-0 flex z-20 flex-wrap bg-[#142132] items-center justify-between px-3 py-2 lg:px-3 transition-all ease-in shadow-none duration-250 rounded-2xl lg:flex-nowrap lg:justify-start"
      navbar-main navbar-scroll="false">
      <div class="flex items-center justify-between w-full px-0 sm:px-4 py-1 mx-auto flex-wrap">
        <nav>
          <!-- breadcrumb -->
          <ol class="flex flex-wrap pt-1 mr-12 bg-transparent rounded-lg sm:mr-16">
            <li class="text-sm leading-normal">
              <a class="text-white opacity-50" href="javascript:;">Pages</a>
            </li>
            <li
              class="text-sm pl-2 capitalize leading-normal text-white before:float-left before:pr-2 before:text-white before:content-['/']"
              aria-current="page">{{$title}}</li>
          </ol>
          <h6 class="mb-0 font-bold text-white capitalize">{{$title}}</h6>
        </nav>

        <div class="flex items-center justify-between mt-2 grow sm:mt-0 sm:mr-6 md:mr-0 lg:flex lg:basis-auto">
          <div class="flex items-center md:ml-auto pr-4">
            <div class="flex items-center relative bg-[#121520] w-full rounded-lg ease" search>
                <label class="p-1 flex bg-[#121520] items-center translate-x-3 transition duration-300 ease-in-out z-10 absolute text-slate-400">Search video...</label>
                <input type="text"
                  class="z-20 px-3 py-2 text-sm relative -ml-px block min-w-0 flex-auto w-52 rounded-lg text-white bg-transparent bg-clip-padding text-gray-700 focus:outline-none
                         border border-solid border-[#121520]"
                  onfocus="focused(this)" onfocusout="defocused(this)"/>
              </div>
          </div>
          <ul class="items-center	flex flex-row justify-end pl-0 mb-0 list-none md-max:w-full">
            <!-- online builder btn  -->
            <!-- <li class="flex items-center">
                <a class="inline-block px-8 py-2 mb-0 mr-4 text-xs font-bold text-center text-blue-500 uppercase align-middle transition-all ease-in bg-transparent border border-blue-500 border-solid rounded-lg shadow-none cursor-pointer leading-pro hover:-translate-y-px active:shadow-xs hover:border-blue-500 active:bg-blue-500 active:hover:text-blue-500 hover:text-blue-500 tracking-tight-rem hover:bg-transparent hover:opacity-75 hover:shadow-none active:text-white active:hover:bg-transparent" target="_blank" href="https://www.creative-tim.com/builder/soft-ui?ref=navbar-dashboard&amp;_ga=2.76518741.1192788655.1647724933-1242940210.1644448053">Online Builder</a>
              </li> -->
            <li class="flex items-center px-4 hidden md:inline">
              <a href="upload"
                class="flex flex-col px-0 py-2 font-semibold text-white transition-all ease-nav-brand">
                <i class="material-symbols-outlined text-3xl">cloud_upload</i>
              </a>
            </li>
            <!-- notifications -->

            <li class="relative flex items-center pr-2">
              <p class="hidden transform-dropdown-show"></p>
              <a href="javascript:;" class="block p-0 text-sm text-white transition-all ease-nav-brand" dropdown-trigger
                aria-expanded="false">
                  <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5.365V3m0 2.365a5.338 5.338 0 0 1 5.133 5.368v1.8c0 2.386 1.867 2.982 1.867 4.175 0 .593 0 1.292-.538 1.292H5.538C5 18 5 17.301 5 16.708c0-1.193 1.867-1.789 1.867-4.175v-1.8A5.338 5.338 0 0 1 12 5.365ZM8.733 18c.094.852.306 1.54.944 2.112a3.48 3.48 0 0 0 4.646 0c.638-.572 1.236-1.26 1.33-2.112h-6.92Z"/>
                  </svg>
              </a>

              <ul dropdown-menu
                class="text-sm transform-dropdown bg-[#121520] before:font-awesome before:leading-default before:duration-350 before:ease
                       shadow-lg shadow-slate-900 duration-250 min-w-44 before:sm:right-3 before:text-5.5 pointer-events-none absolute right-0 top-10 z-10 lg:top-10
                       origin-top list-none rounded-lg border-none bg-clip-padding
                       px-2 py-4 text-left text-slate-500 opacity-0 transition-all before:absolute before:right-2 before:left-auto before:top-0 before:z-10
                       before:inline-block before:font-normal before:text-[#121520] before:antialiased before:transition-all before:text-xl before:content-['▲'] sm:-mr-6
                       lg:absolute lg:right-5 lg:left-auto lg:mt-2 lg:block lg:cursor-pointer">
                <!-- add show class on dropdown open js -->
                <li class="relative mb-2">
                  <a class="dark:hover:bg-slate-900 ease py-1.5 clear-both block w-full whitespace-nowrap rounded-lg bg-transparent px-4 duration-300 hover:bg-gray-200 hover:text-slate-700 lg:transition-colors"
                    href="javascript:;">
                    <div class="flex py-1">
                      <div class="my-auto">
                        <img src="../assets/img/team-2.jpg"
                          class="inline-flex items-center justify-center mr-4 text-sm text-white h-9 w-9 max-w-none rounded-xl" />
                      </div>
                      <div class="flex flex-col justify-center">
                        <h6 class="mb-1 text-sm font-normal leading-normal dark:text-white"><span
                            class="font-semibold">New message</span> from Laur</h6>
                        <p class="mb-0 text-xs leading-tight text-slate-400 dark:text-white/80">
                          <i class="mr-1 fa fa-clock"></i>
                          13 minutes ago
                        </p>
                      </div>
                    </div>
                  </a>
                </li>

                <li class="relative mb-2">
                  <a class="dark:hover:bg-slate-900 ease py-1.2 clear-both block w-full whitespace-nowrap rounded-lg px-4 transition-colors duration-300 hover:bg-gray-200 hover:text-slate-700"
                    href="javascript:;">
                    <div class="flex py-1">
                      <div class="my-auto">
                        <img src="../assets/img/small-logos/logo-spotify.svg"
                          class="inline-flex items-center justify-center mr-4 text-sm text-white bg-gradient-to-tl from-zinc-800 to-zinc-700 dark:bg-gradient-to-tl dark:from-slate-750 dark:to-gray-850 h-9 w-9 max-w-none rounded-xl" />
                      </div>
                      <div class="flex flex-col justify-center">
                        <h6 class="mb-1 text-sm font-normal leading-normal dark:text-white"><span
                            class="font-semibold">New album</span> by Travis Scott</h6>
                        <p class="mb-0 text-xs leading-tight text-slate-400 dark:text-white/80">
                          <i class="mr-1 fa fa-clock"></i>
                          1 day
                        </p>
                      </div>
                    </div>
                  </a>
                </li>

                <li class="relative">
                  <a class="dark:hover:bg-slate-900 ease py-1.2 clear-both block w-full whitespace-nowrap rounded-lg px-4 transition-colors duration-300 hover:bg-gray-200 hover:text-slate-700"
                    href="javascript:;">
                    <div class="flex py-1">
                      <div
                        class="inline-flex items-center justify-center my-auto mr-4 text-sm text-white transition-all duration-200 ease-nav-brand bg-gradient-to-tl from-slate-600 to-slate-300 h-9 w-9 rounded-xl">
                        <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1"
                          xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                          <title>credit-card</title>
                          <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF" fill-rule="nonzero">
                              <g transform="translate(1716.000000, 291.000000)">
                                <g transform="translate(453.000000, 454.000000)">
                                  <path class="color-background"
                                    d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z"
                                    opacity="0.593633743"></path>
                                  <path class="color-background"
                                    d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z">
                                  </path>
                                </g>
                              </g>
                            </g>
                          </g>
                        </svg>
                      </div>
                      <div class="flex flex-col justify-center">
                        <h6 class="mb-1 text-sm font-normal leading-normal dark:text-white">Payment successfully
                          completed</h6>
                        <p class="mb-0 text-xs leading-tight text-slate-400 dark:text-white/80">
                          <i class="mr-1 fa fa-clock"></i>
                          2 days
                        </p>
                      </div>
                    </div>
                  </a>
                </li>
              </ul>
            </li>
            <li class="relative flex items-center px-4 hidden md:inline">
              <a href="javascript:;" aria-expanded="false"  dropdown-trigger
                class="flex flex-col text-sm font-semibold text-white transition-all ease-nav-brand">
                <span class="rounded-full border h-10 w-10 text-lg font-bold flex items-center justify-center">VD</span>
              </a>
              <ul dropdown-menu
                class="text-sm transform-dropdown bg-[#121520] before:font-awesome before:leading-default before:duration-350 before:ease
                       shadow-lg shadow-slate-900 duration-250 before:sm:right-8 before:text-5.5 pointer-events-none absolute right-0 top-10 z-10 lg:top-12
                       origin-top list-none rounded-lg border-none bg-clip-padding
                       pl-1 py-2 text-left text-slate-500 opacity-0 transition-all before:absolute before:right-2 before:left-auto before:top-0 before:z-10
                       before:inline-block before:font-normal before:text-[#121520] before:antialiased before:transition-all before:text-xl before:content-['▲'] sm:-mr-6
                       lg:absolute lg:right-5 lg:left-auto lg:mt-2 lg:block lg:cursor-pointer">
                <li class="relative mb-1">
                  <a class="ease py-1.5 clear-both block w-full whitespace-nowrap rounded-lg bg-transparent px-4 duration-300 lg:transition-colors"
                    href="javascript:;">
                    <div class="flex py-1">
                      <div class="flex flex-col justify-center">
                        <h6 class="mb-1 text-lg font-semibold leading-normal dark:text-white">{{\Illuminate\Support\Facades\Auth::user()->name}}</h6>
                        <p class="mb-0 text-xs leading-tight text-white/80">
                            {{\Illuminate\Support\Facades\Auth::user()->email}}
                        </p>
                      </div>
                    </div>
                  </a>
                </li>
                <hr class="h-px mt-0 bg-transparent bg-gradient-to-r from-transparent via-white to-transparent border-none" />
                <!-- add show class on dropdown open js -->
                <li class="relative my-2">
                  <a class="menu-sidebar pl-2 pr-12 text-white opacity-80 hover:bg-[#009FB2] py-1.5 text-sm ease-nav-brand my-0  flex items-center whitespace-nowrap font-semibold rounded-lg transition-colors"
                    href="/setting">
                    <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                      <i class="material-symbols-outlined opacity-1">person</i>
                    </div>
                    <span class="ml-1 duration-300 opacity-1 pointer-events-none ease" name="setting">My Account</span>
                  </a>
                </li>

                <li class="relative mb-2">
                  <a class=" pl-2 pr-12 menu-sidebar text-white opacity-80 hover:bg-[#009FB2] py-1.5 text-sm ease-nav-brand my-0 flex items-center whitespace-nowrap font-semibold rounded-lg transition-colors"
                    href="/premium">
                    <div class="mr-2 flex h-8 w-8 bg-yellow-400 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                      <i class="material-symbols-outlined text-white font-bold	">star</i>
                    </div>
                    <span class="ml-1 duration-300 opacity-1 pointer-events-none ease" name="premium">Go Premium</span>
                  </a>
                </li>

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
            <li class="flex items-center px-4 xl:hidden">
              <a href="javascript:;" class="block p-0 text-sm text-white transition-all ease-nav-brand" sidenav-trigger>
                <div class="w-6 overflow-hidden">
                  <i class="ease mb-1.5 relative block h-0.5 rounded-sm bg-white transition-all"></i>
                  <i class="ease mb-1.5 relative block h-0.5 rounded-sm bg-white transition-all"></i>
                  <i class="ease relative block h-0.5 rounded-sm bg-white transition-all"></i>
                </div>
              </a>
            </li>


          </ul>
        </div>
      </div>
    </nav>

    <!-- end Navbar -->
