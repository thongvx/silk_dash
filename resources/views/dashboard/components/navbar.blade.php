<!-- Navbar -->
    <nav
      class="sticky top-0 flex z-20 flex-wrap bg-[#142132] items-center justify-between px-3 py-2 lg:px-3 transition-all ease-in shadow-none duration-250 rounded-2xl lg:flex-nowrap lg:justify-start"
      navbar-main navbar-scroll="false">
      <div class="flex items-center justify-between w-full px-0 sm:px-4 py-1 mx-auto flex-row">
          <a href="javascript:;" class="block xl:hidden p-0 text-sm text-white transition-all ease-nav-brand" sidenav-trigger>
              <div class="w-6 overflow-hidden">
                  <i class="ease mb-1.5 relative block h-0.5 rounded-sm bg-white transition-all"></i>
                  <i class="ease mb-1.5 relative block h-0.5 rounded-sm bg-white transition-all"></i>
                  <i class="ease relative block h-0.5 rounded-sm bg-white transition-all"></i>
              </div>
          </a>
          <div class="h-19 block xl:hidden scale-75">
              <a class="flex m-0 text-sm whitespace-nowrap items-center"
                 href="/" target="_blank" logo>
                  <img src="{{asset('image/logo/logo4.webp')}}"
                       class="h-full max-w-full transition-all duration-200 ease-nav-brand max-h-12" alt="main_logo" />
                  <span class="ml-3 font-semibold transition-all duration-200 ease-nav-brand" name-web>
                        <img src="{{asset('image/logo/name.webp')}}"
                             class="h-full max-w-full transition-all duration-200 ease-nav-brand max-h-12" alt="main_logo" />
                  </span>
              </a>
          </div>
          <div class="block xl:hidden">
              <ul class="items-center flex flex-row justify-end pl-0 mb-0 list-none md-max:w-full">
                    <li class="items-center px-4">
                      <a href="javascript:;" aria-expanded="false"  dropdown-trigger
                         class="flex flex-col text-sm font-semibold text-white transition-all ease-nav-brand">
                        <span class="rounded-full border h-10 w-10 text-lg font-bold flex items-center justify-center">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                        </span>
                      </a>
                      <ul dropdown-menu
                          class="text-sm transform-dropdown bg-[#121520] before:font-awesome before:leading-default before:duration-350 before:ease
                                duration-250 before:text-5.5 pointer-events-none absolute right-3 top-30 z-10
                               origin-top list-none rounded-lg border-none bg-clip-padding
                               pl-1 py-2 text-left text-slate-500 opacity-0 transition-all before:absolute before:right-6 before:left-auto before:-top-4 before:z-10
                               before:inline-block before:font-normal before:text-[#121520] before:antialiased before:transition-all before:text-xl before:content-['▲']
                               ">
                          <li class="relative mb-1">
                              <a class="ease py-1.5 clear-both block w-full whitespace-nowrap rounded-lg bg-transparent px-4 duration-300 lg:transition-colors"
                                 href="javascript:;">
                                  <div class="flex py-1">
                                      <div class="flex flex-col justify-center">
                                          <h6 class="mb-1 text-lg font-semibold leading-normal dark:text-white">{{ Auth::user()->name}}</h6>
                                          <p class="mb-0 text-xs leading-tight text-white/80">
                                              {{ Auth::user()->email}}
                                          </p>
                                          <p class="mb-0 text-sm leading-tight font-bold {{ Auth::user()->encoder_priority != 0  ? 'text-violet-400' : 'text-emerald-500' }}">
                                              {{ Auth::user()->encoder_priority != 0  ? 'Premium' : 'Free' }}
                                          </p>
                                      </div>
                                  </div>
                              </a>
                          </li>
                          <hr class="h-px mt-0 bg-transparent bg-gradient-to-r from-transparent via-white to-transparent border-none" />
                          <!-- add show class on dropdown open js -->
                          <li class="relative my-2">
                              <a class="menu-sidebar pl-2 pr-12 text-white opacity-80 hover:bg-[#009FB2] py-1.5 text-sm ease-nav-brand my-0  flex items-center whitespace-nowrap font-semibold rounded-lg transition-colors"
                                 href="/setting?tab=profile">
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
            </ul>
          </div>
        <nav class="hidden xl:block">
          <!-- breadcrumb -->
          <ol class="flex flex-wrap pt-1 bg-transparent rounded-lg sm:mr-16 w-max">
            <li class="text-sm leading-normal">
              <a class="text-white opacity-50" href="javascript:;">Pages</a>
            </li>
            <li
              class="text-sm pl-2 capitalize leading-normal text-white before:float-left before:pr-2 before:text-white before:content-['/']"
              aria-current="page">{{$title}}</li>
          </ol>
            <h6 class="mb-0 font-bold text-white capitalize" title-tab>{{ request()->get('tab') ?? '' }}</h6>
        </nav>

        <div class="hidden xl:flex items-center justify-between mt-2 grow sm:mt-0 sm:mr-6 md:mr-0 lg:basis-auto">

          <div class="flex items-center md:ml-auto px-2">
              <div id="time" class="text-white w-full mr-2 text-lg italic font-normal">
              </div>
            <form class="flex items-center relative bg-[#121520] w-full rounded-lg ease z-10" action="/video/search" method="GET" search>
                <label for="search" class="p-1 flex bg-[#121520] items-center translate-x-3 transition duration-300 ease-in-out z-10 absolute text-slate-400">Search video...</label>
                <input type="text" id="search" name="videoID" value="" search-input
                  class="px-3 py-2 text-sm relative -ml-px block min-w-0 lg:w-52 flex-auto text-white rounded-lg bg-transparent bg-clip-padding focus:outline-none
                         border border-solid border-[#121520]"
                  />
                <input type="submit" value="Search" class="hidden" />
            </form>
          </div>
          <ul class="items-center flex flex-row justify-end pl-0 mb-0 list-none md-max:w-full">
            <!-- online builder btn  -->
            <li class="items-center px-4 hidden md:flex">
              <a href="/upload?tab=webupload"
                class="flex flex-col px-0 py-2 font-semibold text-white transition-all ease-nav-brand">
                <i class="material-symbols-outlined text-3xl">cloud_upload</i>
              </a>
            </li>
            <!-- notifications -->

            <li class="relative flex items-center pr-2 z-30">
                <div class="relative">
                  <a href="javascript:;" class="block p-0 text-sm text-white transition-all ease-nav-brand" dropdown-trigger
                    aria-expanded="false">
                      <svg class="w-8 h-8 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5.365V3m0 2.365a5.338 5.338 0 0 1 5.133 5.368v1.8c0 2.386 1.867 2.982 1.867 4.175 0 .593 0 1.292-.538 1.292H5.538C5 18 5 17.301 5 16.708c0-1.193 1.867-1.789 1.867-4.175v-1.8A5.338 5.338 0 0 1 12 5.365ZM8.733 18c.094.852.306 1.54.944 2.112a3.48 3.48 0 0 0 4.646 0c.638-.572 1.236-1.26 1.33-2.112h-6.92Z"/>
                      </svg>
                  </a>
                    <span class="{{ $notifications->where('read', 0)->count() > 0 ? 'block' : 'hidden'}} absolute top-0 right-0" no-read>
                        <span class="ml-3 relative flex h-2 w-2">
                          <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-rose-400 opacity-75"></span>
                          <span class="relative inline-flex rounded-full h-2 w-2 bg-rose-500"></span>
                        </span>
                    </span>
                </div>
              <ul dropdown-menu
                class="text-sm transform-dropdown bg-[#121520] before:font-awesome before:leading-default before:duration-350 before:ease
                       duration-250 min-w-44 before:sm:right-3 before:text-5.5 pointer-events-none absolute right-0 top-10 z-30 lg:top-10
                       origin-top list-none rounded-lg border-none bg-clip-padding
                       text-left text-slate-500 opacity-0 transition-all before:absolute before:right-2 before:left-auto before:-top-4 before:z-20
                       before:inline-block before:font-normal before:text-[#121520] before:antialiased before:transition-all before:text-xl before:content-['▲'] sm:-mr-6
                       lg:absolute lg:right-5 lg:left-auto lg:mt-2 lg:block" notification>
                  @if($notifications->count() > 0)
                      <li class="flex items-center justify-between text-white font-bold px-2 my-3">
                          <h4 class="text-xl">Notifications</h4>
                          <a href="javascript:;" class="hover:text-emerald-400" btn-read-all>
                              <i class="material-symbols-outlined mr-3 text-3xl hover:text-[#009FB2]">select_check_box</i>
                          </a>
                      </li>
                  @endif
                  <div class=" max-h-64 overflow-auto">
                  @forelse($notifications as $notification)
                      <!-- add show class on dropdown open js -->
                      <li class="relative z-30 {{ $notification->read == 0 ? 'bg-[#142132]' :'' }}">
                          <a class="flex items-center rounded-lg px-2 text-white shadow-lg drop-shadow-sm py-3"
                             href="javascript:;" data-id="{{ $notification->id }}" btn-read btn-info-noti>
                              <i class="material-symbols-outlined mr-3 text-3xl {{ $notification->type  == 'error' || $notification->type == 'delete' ? 'text-red-500' : 'text-orange-500'}}">
                                  {{ $notification->type }}
                              </i>
                              <div class="info">
                                  <h6 class="text-white font-bold w-max subject">
                                      {{ $notification->subject }}
                                  </h6>
                                  <span class="text-slate-400 text-sm date" data-date="{{ $notification->created_at }}">{{ $notification->created_at->diffForHumans() }}</span>
                                  <span class="hidden message">{{ $notification->message }}</span>
                              </div>
                          </a>
                      </li>
                  @empty
                      <li class="my-3 text-white text-center">
                          No notifications
                      </li>
                @endforelse
              </div>
                  @if($notifications->count() > 0)
                     <li class="flex items-center justify-between text-white font-bold px-2 my-3">
                          <a href="javascript:;" class="hover:text-emerald-500">View All</a>
                          <a href="javascript:;" class="hover:text-red-500" btn-delete-noti>Clear All</a>
                      </li>
                  @endif
              </ul>
            </li>
            <li class="relative items-center px-4 hidden md:flex">
              <a href="javascript:;" aria-expanded="false"  dropdown-trigger
                class="flex flex-col text-sm font-semibold text-white transition-all ease-nav-brand">
                <span class="rounded-full border h-10 w-10 text-lg font-bold flex items-center justify-center">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                </span>
              </a>
              <ul dropdown-menu
                class="text-sm transform-dropdown bg-[#121520] before:font-awesome before:leading-default before:duration-350 before:ease
                       duration-250 before:sm:right-8 before:text-5.5 pointer-events-none absolute right-0 top-10 z-10 lg:top-12
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
                <li class="relative my-2">
                  <a class="menu-sidebar pl-2 pr-12 text-white opacity-80 hover:bg-[#009FB2] py-1.5 text-sm ease-nav-brand my-0  flex items-center whitespace-nowrap font-semibold rounded-lg transition-colors"
                    href="/setting?tab=profile">
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
{{--            <li class="flex items-center px-4 xl:hidden">--}}
{{--              <a href="javascript:;" class="block p-0 text-sm text-white transition-all ease-nav-brand" sidenav-trigger>--}}
{{--                <div class="w-6 overflow-hidden">--}}
{{--                  <i class="ease mb-1.5 relative block h-0.5 rounded-sm bg-white transition-all"></i>--}}
{{--                  <i class="ease mb-1.5 relative block h-0.5 rounded-sm bg-white transition-all"></i>--}}
{{--                  <i class="ease relative block h-0.5 rounded-sm bg-white transition-all"></i>--}}
{{--                </div>--}}
{{--              </a>--}}
{{--            </li>--}}


          </ul>
        </div>
      </div>
    </nav>

    <!-- end Navbar -->
