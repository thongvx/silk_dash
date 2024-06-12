<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="../assets/img/logo-stream2.png" />
    <title>Custom Domain</title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Nucleo Icons -->
    <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
    <link href="../assets/datatable/datatables.min.css" rel="stylesheet" />
    <!-- Popper -->
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <!-- Main Styling -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.7.2/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../assets/datatable/datatables.min.js"></script>
    <style>
        .material-symbols-outlined {
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

        span a.paginate_button {
            background: #0f172a;
            margin: 0 5px;
            text-align: center;
            border-radius: 6px;
            padding: 5px 12px;
        }

        span a.paginate_button.current {
            background: rgb(16 185 129);
        }
        .dataTables_paginate .previous{
          margin-right: 15px;
        }
        .dataTables_paginate .next{
          margin-left: 15px;
        }
        #table-sto_length select,
        #table-encoder_length select,
        #table-download_length select {
            background-color: transparent;
            border: none;
            outline: none;
        }
    </style>
</head>

<body class="m-0 font-sans text-base antialiased font-normal leading-default text-slate-500 lg:min-h-screen"
    style="background-color: #1a2035">
    <main class="relative h-full max-h-screen transition-all duration-200 ease-in-out rounded-xl"
        style="background-color: #1a2035">
        <div>
            @include('components/navbar')
            @include('components/sidebar')
        </div>


        <!-- cards -->
        <div class="w-full px-3 lg:px-6 pt-6 mx-auto" style="background-color: #1a2035">
            <div class="flex flex-wrap -mx-3 flex-col-reverse lg:flex-row">
                <div class="w-full max-w-full px-2 mt-0 text-white lg:flex-none">
                    <div class="lg:mr-2 flex flex-col font-semibold">
                        <div class="mt-3 md:mt-0 rounded-b-box rounded-se-box relative  max-w-full w-full">
                            <div
                                class="border-base-300 rounded-b-box rounded-se-box gap-2 bg-[#121520] bg-top [border-width:var(--tab-border)] undefined">
                                <div class="tab-content-video">
                                    <div class="rounded-xl">
                                        <div class="relative rounded-xl bg-[#121520]">
                                            <div class="px-2 pt-4 md:p-4">
                                                <div class="mb-2">
                                                    <h5 class="text-emerald-400">
                                                        Custom Domain
                                                    </h5>
                                                </div>
                                                <div
                                                    class="flex flex-col bg-clip-border rounded-xl text-gray-700 bg-transparent">
                                                    <div class="px-0 pt-0">
                                                        <table id="table-sto" datatable data-page-size="10"
                                                            class="overflow-y-clip w-full text-white text-sm text-left border-b border-gray-100/80">
                                                            <thead>
                                                                <tr
                                                                    class="bg-slate-900 transition-colors text-md text-center">
                                                                    <th
                                                                        class="before:!bottom-2 after:!bottom-2 pl-2 py-2 cursor-pointer px-1">
                                                                        User ID</th>
                                                                    <th
                                                                        class="before:!bottom-2 after:!bottom-2 pl-2 py-2 cursor-pointer">
                                                                        Domain </th>
                                                                    <th
                                                                        class="before:!bottom-2 after:!bottom-2 pl-2 py-2 cursor-pointer">
                                                                        Created</th>
                                                                    <th
                                                                        class="before:!bottom-2 after:!bottom-2 pl-2 py-2 cursor-pointer">
                                                                        Status</th>
                                                                    <th
                                                                        class="before:!bottom-2 after:!bottom-2 pl-2 py-2 cursor-pointer">
                                                                        Default</th>
                                                                    <th
                                                                        class="before:!bottom-2 after:!bottom-2 pl-2 py-2 cursor-pointer">
                                                                        Action</th>
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
                                                                          <div class="bg-orange-500 rounded-lg text-center px-6 py-1 w-max">
                                                                              No
                                                                          </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="flex justify-center items-center">
                                                                            <div class="bg-rose-500 rounded-lg text-center px-6 py-1 w-max"
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
                                                                          <div class="bg-teal-500 rounded-lg text-center px-6 py-1 w-max">
                                                                              Yes
                                                                          </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                      <div class="flex justify-center items-center">
                                                                            <div class="bg-rose-500 rounded-lg text-center px-6 py-1 w-max"
                                                                                onclick="delete_doamin(this)">
                                                                                <i class="fa fa-trash pe-2"
                                                                                    aria-hidden="true"></i>Delete
                                                                            </div>
                                                                            <div class="bg-teal-500 rounded-lg text-center px-6 py-1 w-max ml-5"
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
                                                                          <div class="bg-orange-500 rounded-lg text-center px-6 py-1 w-max">
                                                                              No
                                                                          </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="flex justify-center items-center">
                                                                            <div class="bg-rose-500 rounded-lg text-center px-6 py-1 w-max"
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
                                                                          <div class="bg-teal-500 rounded-lg text-center px-6 py-1 w-max">
                                                                              Yes
                                                                          </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="flex justify-center items-center">
                                                                            <div class="bg-rose-500 rounded-lg text-center px-6 py-1 w-max"
                                                                                onclick="delete_doamin(this)">
                                                                                <i class="fa fa-trash pe-2"
                                                                                    aria-hidden="true"></i>Delete
                                                                            </div>
                                                                            <div class="bg-teal-500 rounded-lg text-center px-6 py-1 w-max ml-5"
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
                                                                          <div class="bg-teal-500 rounded-lg text-center px-6 py-1 w-max">
                                                                              Yes
                                                                          </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="flex justify-center items-center">
                                                                            <div class="bg-rose-500 rounded-lg text-center px-6 py-1 w-max"
                                                                                onclick="delete_doamin(this)">
                                                                                <i class="fa fa-trash pe-2"
                                                                                    aria-hidden="true"></i>Delete
                                                                            </div>
                                                                            <div class="bg-teal-500 rounded-lg text-center px-6 py-1 w-max ml-5"
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
                                                                          <div class="bg-orange-500 rounded-lg text-center px-6 py-1 w-max">
                                                                              No
                                                                          </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="flex justify-center items-center">
                                                                            <div class="bg-rose-500 rounded-lg text-center px-6 py-1 w-max"
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
                                                                          <div class="bg-orange-500 rounded-lg text-center px-6 py-1 w-max">
                                                                              No
                                                                          </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="flex justify-center items-center">
                                                                            <div class="bg-rose-500 rounded-lg text-center px-6 py-1 w-max"
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
                                                                    <td >
                                                                        <div class="flex justify-center items-center">
                                                                          <div class="bg-teal-500 rounded-lg text-center px-6 py-1 w-max">
                                                                              Yes
                                                                          </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="flex justify-center items-center">
                                                                            <div class="bg-rose-500 rounded-lg text-center px-6 py-1 w-max"
                                                                                onclick="delete_doamin(this)">
                                                                                <i class="fa fa-trash pe-2"
                                                                                    aria-hidden="true"></i>Delete
                                                                            </div>
                                                                            <div class="bg-teal-500 rounded-lg text-center px-6 py-1 w-max ml-5"
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
                                                                        https://dev-galaxy-lifetime.pantheonsite.io</td>
                                                                    <td>15/02/2024, 22:52:29</td>
                                                                    <td class="Status text-amber-400	">Pending</td>
                                                                    <td>
                                                                        <div class="flex justify-center items-center">
                                                                          <div class="bg-orange-500 rounded-lg text-center px-6 py-1 w-max">
                                                                              No
                                                                          </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="flex justify-center items-center">
                                                                            <div class="bg-rose-500 rounded-lg text-center px-6 py-1 w-max"
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
                                                                          <div class="bg-orange-500 rounded-lg text-center px-6 py-1 w-max">
                                                                              No
                                                                          </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="flex justify-center items-center">
                                                                            <div class="bg-rose-500 rounded-lg text-center px-6 py-1 w-max"
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
                                                                          <div class="bg-orange-500 rounded-lg text-center px-6 py-1 w-max">
                                                                              No
                                                                          </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="flex justify-center items-center">
                                                                            <div class="bg-rose-500 rounded-lg text-center px-6 py-1 w-max"
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
                                                                          <div class="bg-teal-500 rounded-lg text-center px-6 py-1 w-max">
                                                                              Yes
                                                                          </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="flex justify-center items-center">
                                                                            <div class="bg-rose-500 rounded-lg text-center px-6 py-1 w-max"
                                                                                onclick="delete_doamin(this)">
                                                                                <i class="fa fa-trash pe-2"
                                                                                    aria-hidden="true"></i>Delete
                                                                            </div>
                                                                            <div class="bg-teal-500 rounded-lg text-center px-6 py-1 w-max ml-5"
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
                                                                          <div class="bg-orange-500 rounded-lg text-center px-6 py-1 w-max">
                                                                              No
                                                                          </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="flex justify-center items-center">
                                                                            <div class="bg-rose-500 rounded-lg text-center px-6 py-1 w-max"
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
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>
        @include('components/footer')
</body>
<!-- plugin for scrollbar  -->
<script src="../assets/js/plugins/perfect-scrollbar.min.js" async></script>
<!-- main script file  -->
<script src="../assets/js/argon-dashboard-tailwind.js?v=1.5.7" async></script>
<script src="../assets/datatable/datatables.min.js"></script>
<script>

    $(function () {
        "use strict";
        $('#table-sto, #table-encoder, #table-download').each(function () {
            var table = $(this).DataTable({
                paging: true,
                lengthChange: true,
                searching: false,
                ordering: true,
                info: true,
                autoWidth: false,
                responsive: true,
                scrollY: "calc(100vh - 24.5em)",
                scrollCollapse: true,
                scrollX: true,
                stripeClasses: ['my-3 h-12 text-center', 'my-3 h-12 bg-slate-900 text-center'],
                dom: '<"text-white bg-slate-900 py-2 px-4 w-max rounded-lg mb-1 relative z-10"l>frt<"text-white w-max rounded-lg mt-1"i><"absolute right-0 -bottom-1 text-white py-2 px-4 w-max rounded-lg mb-2"p>',
                language: {
                    paginate: {
                        button: {
                            className: 'text-green'
                        }
                    }
                },
            });
        });
    });
</script>

</html>
