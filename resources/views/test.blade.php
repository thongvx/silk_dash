<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png"/>
    <link rel="icon" type="image/png" href="../assets/img/logo-stream2.png"/>
    <title>{{$title}}</title><!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Nucleo Icons -->
    <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Popper -->
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <!-- Main Styling -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700"  rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.7.2/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        .material-icons {
            font-family: 'Material Icons';
            font-weight: normal;
            font-style: normal;
            font-size: 24px;
            line-height: 1;
            text-transform: none;
            display: inline-block;
            vertical-align: middle;
            white-space: nowrap;
            word-wrap: normal;
            direction: ltr;
            -webkit-font-feature-settings: 'liga';
            -webkit-font-smoothing: antialiased;
        }
    </style>
</head>

<body
    class="!font-[Roboto] m-0 font-sans text-base bg-[#142132] antialiased font-normal leading-default text-slate-500 min-h-screen h-full">
<!-- sidenav  -->
<aside class="fixed inset-y-0 flex-wrap items-center justify-between block w-full xl:w-max p-0 my-4
         antialiased transition-transform duration-300 -translate-x-full border-0 shadow-xl max-w-64
         ease-nav-brand z-30 xl:ml-6 rounded-2xl xl:left-0 xl:translate-x-0" style="background-color: #121520" aside-menu
        aria-expanded="false">
    <div class="h-19">
        <i class="absolute top-0 right-0 p-4 opacity-50 cursor-pointer fas fa-times text-white text-slate-400 xl:hidden"
           sidenav-close></i>
        <a class="flex px-2 py-4 m-0 text-sm whitespace-nowrap items-center xl:scale-75" href="" target="_blank" logo>
            <img src="../assets/img/logo3.png"
                 class="brightness-150	h-full max-w-full transition-all duration-200 ease-nav-brand max-h-12" alt="main_logo" />
            <span class="xl:max-w-0 xl:opacity-0 ml-1 font-semibold transition-all duration-200 ease-nav-brand" name-web>
        <img src="../assets/img/name-web3.png"
             class="brightness-150	h-full max-w-full transition-all duration-200 ease-nav-brand max-h-8" alt="main_logo" />
      </span>
        </a>
    </div>
    <div button-mini-sidebar mini-sidebar="false"
         class="z-10 p-1 absolute text-white top-16 -right-3 transition-all duration-300 rounded-full bg-[#009FB2] hidden xl:flex cursor-pointer">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true" class="h-5 w-5"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"></path></svg>
    </div>
    <hr class="h-px mt-0 bg-transparent bg-gradient-to-r from-transparent via-white to-transparent border-none" />

    <div class="items-center block w-auto max-h-[calc(100vh-9em)] overflow-y-auto h-sidenav grow basis-full mt-3 ">
        <ul class="flex flex-col pl-0 mb-0">
            <li class="mt-2.5 w-full xl:w-max" li-menu>
                <a class="{{$title}} menu-sidebar px-2 py-1.5 text-white opacity-80 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-lg font-semibold text-slate-700 transition-colors"
                   href="/dashboard">
                    <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5" icon-menu>
                        <i class="material-icons opacity-1 text-3xl">dashboard</i>
                    </div>
                    <span class="xl:max-w-0 xl:hidden ml-3 opacity-1 pointer-events-none ease" name-menu name="dashboard">Dashboard</span>
                </a>
            </li>

            <li class="mt-2.5 w-full xl:w-max" li-menu>
                <a class="w-full menu-sidebar bg-[#009FB2] text-white opacity-80 hover:bg-slate-900 py-1.5 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-2 rounded-lg font-semibold transition-colors"
                   href="{{route('upload')}}" style="background-color: #009FB2">
                    <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5" icon-menu>
                        <i class="material-icons opacity-1 text-3xl">cloud_upload</i>
                    </div>
                    <span class="xl:max-w-0 xl:hidden ml-3 opacity-1 pointer-events-none ease" name-menu name="upload">Upload</span>
                </a>
            </li>

            <li class="mt-2.5 w-full xl:w-max" li-menu>
                <a class="menu-sidebar text-white opacity-80 hover:bg-slate-900 py-1.5 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap font-semibold rounded-lg px-2 transition-colors"
                   href="/video">
                    <div
                        class="flex h-8 w-8 items-center justify-center rounded-lg bg-center fill-current stroke-0 text-center xl:p-2.5" icon-menu>
                        <i class="material-icons opacity-1 text-3xl">video_library</i>
                    </div>
                    <span class="xl:max-w-0 xl:hidden ml-3 opacity-1 pointer-events-none ease" name-menu name="video">My Videos</span>
                </a>
            </li>

            <li class="mt-2.5 w-full xl:w-max" li-menu>
                <a class="menu-sidebar text-white opacity-80 hover:bg-slate-900 py-1.5 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap font-semibold rounded-lg px-2 transition-colors"
                   href="/report">
                    <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5" icon-menu>
                        <i class="material-icons opacity-1 text-3xl">show_chart</i>
                    </div>
                    <span class="xl:max-w-0 xl:hidden ml-3 opacity-1 pointer-events-none ease" name-menu name="report">Reports</span>
                </a>
            </li>
            <li class="mt-2.5 w-full xl:w-max" li-menu>
                <a class="menu-sidebar text-white opacity-80 hover:bg-slate-900 py-1.5 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap font-semibold rounded-lg px-2 transition-colors"
                   href="/support">
                    <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5" icon-menu>
                        <i class="material-icons opacity-1 text-3xl">support_agent</i>
                    </div>
                    <span class="xl:max-w-0 xl:hidden ml-3 opacity-1 pointer-events-none ease" name-menu name="support">Support</span>
                </a>
            </li>
            <li class="mt-2.5 w-full xl:w-max" li-menu>
                <a class="menu-sidebar text-white opacity-80 hover:bg-slate-900 py-1.5 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap font-semibold rounded-lg px-2 transition-colors"
                   href="/dmca">
                    <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5" icon-menu>
                        <i class="material-icons opacity-1 text-3xl">report</i>
                    </div>
                    <span class="xl:max-w-0 xl:hidden ml-3 opacity-1 pointer-events-none ease" name-menu name="dmca">DMCA</span>
                </a>
            </li>

            <li class="w-full mt-4 mb-2 xl:hidden" account-pages>
                <h6 class="pl-6 ml-2 text-xs font-bold leading-tight uppercase dark:text-white opacity-60">Account pages</h6>
            </li>

            <li class="mt-2.5 w-full xl:w-max" li-menu>
                <a class="menu-sidebar text-white opacity-80 hover:bg-slate-900 py-1.5 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap font-semibold rounded-lg px-2 transition-colors"
                   href="/setting">
                    <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5" icon-menu>
                        <i class="material-icons opacity-1">person</i>
                    </div>
                    <span class="xl:max-w-0 xl:hidden ml-3 opacity-1 pointer-events-none ease" name-menu name="setting">My Account</span>
                </a>
            </li>

            <li class="mt-2.5 w-full xl:w-max" li-menu>
                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                    <input type="hidden" name="_method" value="POST">
                    <button type="submit" class="menu-sidebar pl-2 pr-12 text-red-500 opacity-80 hover:bg-slate-900 py-1.5 text-sm ease-nav-brand my-0 flex items-center whitespace-nowrap font-semibold rounded-lg transition-colors">
                        <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5" icon-menu>
                            <i class="material-icons opacity-1 font-bold">logout</i>
                        </div>
                        <span class="xl:max-w-0 xl:hidden ml-3 opacity-1 pointer-events-none ease" name-menu>Log Out</span>
                    </button>
                </form>
            </li>

        </ul>
    </div>
</aside>
<!-- end sidenav -->
<div id="loading">
    <div class="loader bg-[#142132]"></div>
</div>
<main class="relative h-full transition-all duration-200 ease-in-out xl:ml-24 rounded-xl bg-[#142132]">
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
                        </span>
                        <input type="text"
                               class="z-20 px-3 py-2 text-sm relative -ml-px block min-w-0 flex-auto w-52 rounded-lg text-white bg-transparent bg-clip-padding text-gray-700 focus:outline-none
                         border border-solid border-slate-900"
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
                            <i class="material-icons text-3xl">cloud_upload</i>
                        </a>
                    </li>
                    <!-- notifications -->

                    <li class="relative flex items-center pr-2">
                        <p class="hidden transform-dropdown-show"></p>
                        <a href="javascript:;" class="block p-0 text-sm text-white transition-all ease-nav-brand" dropdown-trigger
                           aria-expanded="false">
                            <i class="cursor-pointer fa fa-bell text-lg"></i>
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
                                <a class="menu-sidebar pl-2 pr-12 text-white opacity-80 hover:bg-slate-900 py-1.5 text-sm ease-nav-brand my-0  flex items-center whitespace-nowrap font-semibold rounded-lg transition-colors"
                                   href="/setting">
                                    <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                                        <i class="material-icons opacity-1">person</i>
                                    </div>
                                    <span class="ml-1 duration-300 opacity-1 pointer-events-none ease" name="setting">My Account</span>
                                </a>
                            </li>

                            <li class="relative mb-2">
                                <a class=" pl-2 pr-12 menu-sidebar text-white opacity-80 hover:bg-slate-900 py-1.5 text-sm ease-nav-brand my-0 flex items-center whitespace-nowrap font-semibold rounded-lg transition-colors"
                                   href="/premium">
                                    <div class="mr-2 flex h-8 w-8 bg-yellow-400 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                                        <i class="material-icons text-white font-bold	">star</i>
                                    </div>
                                    <span class="ml-1 duration-300 opacity-1 pointer-events-none ease" name="premium">Go Premium</span>
                                </a>
                            </li>

                            <li class="relative mb-2">
                                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="_method" value="POST">
                                    <button type="submit" class="menu-sidebar pl-2 pr-12 text-red-500 opacity-80 hover:bg-slate-900 py-1.5 text-sm ease-nav-brand my-0 flex items-center whitespace-nowrap font-semibold rounded-lg transition-colors">
                                        <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                                            <i class="material-icons opacity-1 font-bold">logout</i>
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
    <!-- cards -->
    <div class="w-full px-3 md:px-6 mx-auto bg-[#142132]">
        <div class="min-h-[calc(100vh-10em)]">
            <div class="flex flex-col" box-lifted data-page="upload">
                <div
                    class="tabs tabs-lifted z-10 -mb-[var(--tab-border)] justify-self-start items-start md:!flex">
                    <button
                        class="tab-upload webupload tab-lifted [--tab-border-color:#121520] tab text-white font-bold h-auto text-md px-4 [--tab-bg:#121520] !border-b-0 md:!border-b-1 !rounded-b-lg md:!rounded-b-none before:!hidden md:before:!block"
                        data-content="webupload">
                        <i class="material-icons mr-3 py-2">cloud_upload</i>File Upload
                    </button>
                    <button
                        class="tab-upload transfer tab-lifted [--tab-border-color:#121520] tab text-white font-bold h-auto text-md px-4 [--tab-bg:#121520] !border-b-0 md:!border-b-1 !rounded-b-lg md:!rounded-b-none before:!hidden md:before:!block"
                        data-content="transfer">
                        <i class="material-icons mr-3 py-2">link</i>Remote / URL Upload
                    </button>
                    <button
                        class="tab-upload clone tab-lifted [--tab-border-color:#121520] tab text-white font-bold h-auto text-md px-4 [--tab-bg:#121520] !border-b-0 md:!border-b-1 !rounded-b-lg md:!rounded-b-none before:!hidden md:before:!block"
                        data-content="clone">
                        <i class="material-icons mr-3 py-2">content_copy</i>Clone Upload
                    </button>
                </div>
                <div class="mt-3 md:mt-0 rounded-b-box rounded-se-box relative">
                    <div
                        class="border-[#121520] rounded-b-box rounded-se-box gap-2 bg-[#121520] bg-top p-4 [border-width:var(--tab-border)]"
                        >
                        <div id="webupload" class="">
                            <div class="text-center pb-10">
                                <div class="text-start block text-sblockm font-medium leading-6 text-[#009FB2] italic">
                                    You can upload multiple video files per a session with total sizes up to 100 GB
                                </div>
                                <hr class="h-px my-6 bg-transparent bg-gradient-to-r from-transparent via-white to-transparent border-none" />
                                <form class='lg:mx-32 from-current' method="POST" id="form-upload-file" action="https://e01.streamsilk.com/upload"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <label htmlfor="file" class="rounded-xl py-10 bg-[#142132] flex justify-center flex-col h-full w-full relative ">
                                        <span class='font-semibold text-[#009FB2]'>Select Video files to upload</span>
                                        <p class="pl-1 text-white">or drag and drop</p>
                                        <input id="file"  name="file" accept="video/*" type="file"
                                               multiple class="opacity-0 absolute cursor-pointer z-20 h-full w-full top-0 left-0" />
                                    </label>
                                    <input class="hidden" type="text" id="userID" name="userID" value="1">
                                    <input class="hidden" type="text" id="folderPost" name="folderID" value="1">
                                </form>
                                <div class="lg:mx-32" id="list-upload-file">
                                </div>
                            </div>
                            <div class='-mb-12 bg-sky-950 mx-6 rounded-xl flex justify-between items-center px-3'>
                                <h3 class='py-4 text-white font-bold'>Save To <span id="folderName" class="italic text-emerald-500">Single Videos( Default Folder)</span></h3>
                                <div class="changefolder text-gray-300 font-bold cursor-pointer" change-folder>
                                    Change Folder
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="mt-10 bg-[#202940] rounded-xl py-3" id="box-list-upload">
                <div class="text-white pl-3 pt-3 flex justify-between items-center">
                    <div class=" text-lg font-bold ">Transfer</div>
                    <div class="text-white">
                        <button class="px-4 py-1 rounded-lg bg-red-500 mr-3">Remote all pending</button>
                    </div>
                </div>
                <hr class="h-px my-3 bg-transparent bg-gradient-to-r from-transparent via-white to-transparent border-none"/>
                <div class="text-center text-emerald-500 font-bold">
                    No Active Tasks
                </div>
                <div id="list-upload">
                </div>

            </div>

        </div>
    </div>
    <footer class="pt-3 bg-[#142132]">
        <div class="w-full px-3 mx-auto">
            <div class="flex flex-wrap items-center -mx-3 lg:justify-between">
                <div class="w-full max-w-full mt-0 shrink-0 lg:w-1/2 lg:flex-none">
                    <ul class="flex flex-wrap justify-center pl-0 mb-0 list-none lg:justify-start">
                        <li class="nav-item">
                            <a href="https://www.creative-tim.com"
                               class="block px-4 pt-0 pb-1 text-sm font-normal transition-colors ease-in-out text-slate-500"
                               target="_blank">Creative Tim</a>
                        </li>
                        <li class="nav-item">
                            <a href="https://www.creative-tim.com/presentation"
                               class="block px-4 pt-0 pb-1 text-sm font-normal transition-colors ease-in-out text-slate-500"
                               target="_blank">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a href="https://creative-tim.com/blog"
                               class="block px-4 pt-0 pb-1 text-sm font-normal transition-colors ease-in-out text-slate-500"
                               target="_blank">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a href="https://www.creative-tim.com/license"
                               class="block px-4 pt-0 pb-1 pr-0 text-sm font-normal transition-colors ease-in-out text-slate-500"
                               target="_blank">License</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    </div>
    <!-- end cards -->
</main>
</body>

<!-- plugin for scrollbar  -->
<script src="../assets/js/plugins/perfect-scrollbar.min.js" async></script>

<!-- main script file  -->
<script src="../assets/js/main.js" async></script>
</html>


