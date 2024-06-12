<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="../assets/img/logo-stream2.png" />
    <title>Compute</title>
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

        #table-sto_length select,
        #table-encoder_length select,
        #table-download_length select {
            background-color: transparent;
            border: none;
            outline: none;
        }
    </style>
</head>

<body class="m-0 font-sans text-base antialiased font-normal leading-default text-slate-500 lg:min-h-screen">
    <main class="relative h-full transition-all duration-200 ease-in-out rounded-xl pb-20"
        style="background-color: #1a2035">
          @include('components/navbar')
          @include('components/sidebar')
        <!-- cards -->
        <div class="w-full px-3 lg:px-6 pt-6 mx-auto" style="background-color: #1a2035">
            <div class="flex flex-wrap -mx-3 flex-col-reverse lg:flex-row">
                <div class="w-full max-w-full px-2 mt-0 text-white lg:flex-none">
                    <div class="px-3 rounded-xl">
                            <div class="box-header no-border pb-0">
                                <h4 id="statics" class="text-xl text-sky-500 text-center font-bold"
                                    email="jwplayerplay01@gmail.com">ngocphuong123
                                    (jwplayerplay01@gmail.com)</h4>
                            </div>
                            <div class="box-body">
                                <div class="info">
                                    <h4 class="title text-lg text-teal-400 font-bold">User Info</h4>
                                    <div class="mt-3 flex justify-between">
                                        <div class="flex items-center	">
                                            <h4 class="py-1 px-5 rounded-lg bg-teal-400 w-max">Premium</h4>
                                            <h4 class="ml-3" status="">Free-ad:
                                                0 </h4>
                                        </div>
                                        <div class="flex items-center	">
                                            <h4 class="py-1 px-5 rounded-lg bg-teal-400 w-max">Status</h4>
                                            <h4 class="ml-3">Free-Active
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-4 gap-4 mt-4">
                                        <div class="grid grid-cols-2 gap-4">
                                            <h5
                                                class="rounded-lg border border-solid border-gray-300 bg-slate-900 text-center py-2 min-h-max h-max">
                                                ID</h5>
                                            <h5 class="bg-indigo-500 rounded-lg text-center py-2">100000</h5>
                                        </div>
                                        <div class="grid grid-cols-2 gap-4">
                                            <h5
                                                class="rounded-lg border border-solid border-gray-300 bg-slate-900 text-center py-2 min-h-max h-max ">
                                                Website</h5>
                                            <h5 class="bg-indigo-500 rounded-lg text-center py-2">askfm.com</h5>
                                        </div>
                                        <div class="grid grid-cols-2 gap-4">
                                            <h5
                                                class="rounded-lg border border-solid border-gray-300 bg-slate-900 text-center py-2 min-h-max h-max ">
                                                Skype</h5>
                                            <h5 class="bg-indigo-500 rounded-lg text-center py-2">sdoifj</h5>
                                        </div>
                                        <div class="grid grid-cols-2 gap-4">
                                            <h5
                                                class="rounded-lg border border-solid border-gray-300 bg-slate-900 text-center py-2 min-h-max h-max ">
                                                Telegram</h5>
                                            <h5 class="bg-indigo-500 rounded-lg text-center py-2">posidfj</h5>
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-4 gap-4 my-4">
                                        <div class="grid grid-cols-2 gap-4 items-center	">
                                            <h5
                                                class="rounded-lg border border-solid border-gray-300 bg-slate-900 text-center py-2 min-h-max h-max ">
                                                Support</h5>
                                            <h5 class="bg-amber-500	rounded-lg text-center py-2">0</h5>
                                        </div>
                                        <div class="grid grid-cols-2 gap-4 items-center	">
                                            <h5
                                                class="rounded-lg border border-solid border-gray-300 bg-slate-900 text-center py-2 min-h-max h-max ">
                                                Dmca</h5>
                                            <h5 class="bg-amber-500	rounded-lg text-center py-2">0</h5>
                                        </div>
                                        <div class="grid grid-cols-2 gap-4 items-center	">
                                            <h5
                                                class="rounded-lg border border-solid border-gray-300 bg-slate-900 text-center py-2 min-h-max h-max  ">
                                                Latest Upload</h5>
                                            <h5 class="bg-amber-500	rounded-lg text-center py-2">2023-09-24</h5>
                                        </div>
                                        <div class="grid grid-cols-2 gap-4 items-center	">
                                            <h5
                                                class="rounded-lg border border-solid border-gray-300 bg-slate-900 text-center py-2 min-h-max h-max ">
                                                Uploaded</h5>
                                            <h5 class="bg-amber-500	rounded-lg text-center py-2">1970-01-01</h5>
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-4 gap-4">
                                        <div class="grid grid-cols-2 gap-4">
                                            <h5
                                                class="rounded-lg border border-solid border-gray-300 bg-slate-900 text-center py-2 min-h-max h-max ">
                                                Video</h5>
                                            <h5 class="bg-teal-400 rounded-lg text-center py-2">46</h5>
                                        </div>
                                        <div class="grid grid-cols-2 gap-4">
                                            <h5
                                                class="rounded-lg border border-solid border-gray-300 bg-slate-900 text-center py-2 min-h-max h-max ">
                                                Play</h5>
                                            <h5 class="bg-teal-400 rounded-lg text-center py-2">108</h5>
                                        </div>
                                        <div class="grid grid-cols-2 gap-4">
                                            <h5
                                                class="rounded-lg border border-solid border-gray-300 bg-slate-900 text-center py-2 min-h-max h-max ">
                                                Storage</h5>
                                            <h5 class="bg-teal-400 rounded-lg text-center py-2">27.94 GB</h5>
                                        </div>
                                        <div class="grid grid-cols-2 gap-4">
                                            <h5
                                                class="rounded-lg border border-solid border-gray-300 bg-slate-900 text-center py-2 min-h-max h-max ">
                                                Domain</h5>
                                            <h5 class="bg-teal-400 rounded-lg text-center py-2">0</h5>
                                        </div>
                                    </div>
                                </div> <!--end-info-->
                                <div class="traffic col-xl-12 mt-3 py-2">
                                    <h4 class="title mb-10 text-teal-400 text-lg font-bold">Traffic</h4>
                                    <table id="tickets"
                                        class="table rounded-md table-hover no-wrap dataTable border bg-slate-900">
                                        <tbody>
                                            <tr class="border-b border-gray-100/80 text-indigo-500 text-center">
                                                <th>Date</th>
                                                <th>22/02</th>
                                                <th>23/02</th>
                                                <th>24/02</th>
                                                <th>25/02</th>
                                                <th>26/02</th>
                                                <th>27/02</th>
                                                <th>28/02</th>
                                                <th>29/02</th>
                                                <th>1/03</th>
                                                <th>2/03</th>
                                                <th>3/03</th>
                                                <th>4/03</th>
                                                <th>5/03</th>
                                                <th>6/03</th>
                                            </tr>
                                            <tr class="text-teal-500 text-center">
                                                <td class="fonr-bold">Plays</td>
                                                <td class="fonr-bold">0</td>
                                                <td class="fonr-bold">0</td>
                                                <td class="fonr-bold">0</td>
                                                <td class="fonr-bold">0</td>
                                                <td class="fonr-bold">0</td>
                                                <td class="fonr-bold">0</td>
                                                <td class="fonr-bold">0</td>
                                                <td class="fonr-bold">0</td>
                                                <td class="fonr-bold">0</td>
                                                <td class="fonr-bold">0</td>
                                                <td class="fonr-bold">0</td>
                                                <td class="fonr-bold">0</td>
                                                <td class="fonr-bold">0</td>
                                                <td class="fonr-bold">0</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div> <!--end-traffic-->
                                <div class="actions mt-3 flex flex-col	">
                                    <h4 class="text-teal-400 text-lg font-bold">Actions</h4>
                                    <div class="flex justify-center	">
                                      <div class="rounded-lg bg-gradient-to-r from-yellow-600 to-rose-400 w-max py-2 px-5 ">
                                          <i class="fa fa-comment-o" aria-hidden="true"></i>
                                          Open Cases
                                      </div>
                                      <div class="ml-4 rounded-lg bg-gradient-to-r from-pink-500 to-red-500 w-max py-2 px-5">
                                          <a href="https://turboviplay.com/verifyAccount/f1zSePGDjX"
                                              style="color: white;">
                                              <i class="fa fa-ban" aria-hidden="true"></i>
                                              Ban It </a>
                                      </div>
                                      <div class="ml-4 rounded-lg bg-gradient-to-r from-blue-400 to-green-500 w-max py-2 px-5" onclick="premium()">
                                          <i class="fa fa-money" aria-hidden="true"></i>
                                          Add Premium View
                                      </div>
                                      <a class="ml-4 rounded-lg bg-gradient-to-r from-indigo-500 to-purple-500 w-max py-2 px-5"
                                          href="https://turboviplay.com/loginUserAdmin?keyLogin=eigjcnehwjru34&amp;email=jwplayerplay01@gmail.com&amp;password=1234567890"
                                          target="_blank">
                                          <i class="fa fa-sign-in" aria-hidden="true"></i>
                                          Login As User
                                      </a>
                                      <div class="hidden" onclick="delete()">
                                          <i class="fa fa-ban" aria-hidden="true"></i>
                                          Delete
                                      </div>
                                    </div>
                                </div> <!--end-actions-->
                                <form action="/setEarning" method="post" class="form-group mt-3">
                                    <input type="hidden" name="_token"
                                        value="hnsUay77M18h5ZyUPUFDJh3ClLBHs1UyzcrffHpl">
                                    <h4 class="title text-teal-400 text-lg font-bold">Earning Modes </h4>
                                    <input name="userID" style="display : none;" value="100000">
                                    <fieldset class="controls">
                                        <input name="earningMode" class="combo-ads" type="radio"
                                            id="radio_1" value="0" checked="">
                                        <label for="radio_1">No Earning: 1 Popunder on pre-roll (per
                                            page)</label>
                                        <div class="help-block"></div>
                                    </fieldset>
                                    <fieldset>
                                        <input name="earningMode" class="combo-ads" type="radio"
                                            id="radio_2" value="1">
                                        <label for="radio_2">$1 per 10k views: 2 Popunders on
                                            pre-roll </label>
                                    </fieldset>
                                    <fieldset>
                                        <input name="earningMode" class="combo-ads" type="radio"
                                            id="radio_3" value="2">
                                        <label for="radio_3">$2.5 per 10k views: 3 Popunders on
                                            pre-roll</label>
                                    </fieldset>
                                    <div class=" save text-center mt-3">
                                        <button class="bg-indigo-500 rounded-lg px-6 py-2 hover:bg-gradient-to-r hover:from-indigo-500 hover:to-purple-500">
                                            <i class="fa fa-check" aria-hidden="true"></i>
                                            Save Mode
                                        </button>
                                    </div>
                                </form>
                                <div class="note mt-3 py-2">
                                    <h4 class="title text-teal-400 text-lg font-bold">Note</h4>
                                    <textarea name="" id="noteUser" value="no"
                                        class="pl-3 text-sm focus:shadow-primary-outline ease w-1/100 leading-5.6 relative -ml-px block min-w-0 flex-auto
                                                       rounded-lg border border-solid border-gray-300 bg-slate-900 text-white bg-clip-padding
                                                       py-2 pr-3 text-gray-700 transition-all placeholder:text-gray-500 focus:border-blue-500
                                                       focus:outline-none focus:transition-shadow w-full">no</textarea>
                                    <a href="askfm.com/f1zSePGDjX-turboviplay.html" target="_black">
                                        <h5 class="text-warning">
                                            askfm.com/f1zSePGDjX-turboviplay.html</h5>
                                    </a>
                                </div><!--end-note-->
                                <div class="px-0" id="send_mail">
                                    <div class="modal-body px-0">
                                        <h4 class="title text-teal-400 text-lg font-bold">Compose</h4>
                                        <div class="subject">
                                            <h5 class=" mb-2">Subject</h5>
                                            <input type="text" value=""
                                                class="pl-3 text-sm focus:shadow-primary-outline ease w-1/100 leading-5.6 relative -ml-px block min-w-0 flex-auto
                                                       rounded-lg border border-solid border-gray-300 bg-slate-900 text-white bg-clip-padding
                                                       py-2 pr-3 text-gray-700 transition-all placeholder:text-gray-500 focus:border-blue-500
                                                       focus:outline-none focus:transition-shadow w-full">
                                        </div>
                                        <div class="form-group">
                                            <h5 class="mb-2">Message</h5>
                                            <textarea id="compose-textarea"
                                                class="pl-3 text-sm focus:shadow-primary-outline ease w-1/100 leading-5.6 relative -ml-px block min-w-0 flex-auto
                                                       rounded-lg border border-solid border-gray-300 bg-slate-900 text-white bg-clip-padding
                                                       py-2 pr-3 text-gray-700 transition-all placeholder:text-gray-500 focus:border-blue-500
                                                       focus:outline-none focus:transition-shadow w-full"
                                                rows="7"></textarea>
                                        </div>
                                        <div class="flex justify-between mt-3">
                                            <div class="rounded-lg bg-teal-400 px-6 py-2 relative hover:bg-gradient-to-r hover:from-blue-400 hover:to-green-500">
                                                <label htmlfor="file-upload" class="flex justify-center flex-col cursor-pointer h-full w-max top-0 left-0">
                                                  <span class="items-center flex">
                                                    <i class="fa fa-paperclip pr-2"></i> Attachment
                                                  </span>
                                                   <input id="file-upload" name="file-upload" type="file" class="sr-only">
                                                 </label>
                                            </div>
                                            <div class="bg-indigo-500 rounded-lg px-6 py-2 hover:bg-gradient-to-r hover:from-indigo-500 hover:to-purple-500 w-max" id="send_reply"
                                                onclick="reply(this)">
                                                <h5 class="mb-0">Send</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end send mail -->
                                <div class="setting mt-3 py-2">
                                    <h4 class="title text-teal-400 text-lg font-bold">Setting</h4>
                                    <div class="grid grid-cols-4 mb-5 gap-6">
                                        <div class="">
                                            <h6 class="mb-2">Max Transfer</h6>
                                            <input id="maxTransfer" class="pl-3 text-sm focus:shadow-primary-outline ease w-1/100 leading-5.6 relative -ml-px block min-w-0 flex-auto
                                                       rounded-lg border border-solid border-gray-300 bg-slate-900 text-white bg-clip-padding
                                                       py-2 pr-3 text-gray-700 transition-all placeholder:text-gray-500 focus:border-blue-500
                                                       focus:outline-none focus:transition-shadow w-full" type="text"
                                                value="10">
                                        </div>
                                        <div class="">
                                            <h6 class="mb-2">Max Torrent</h6>
                                            <input id="maxTorrent" class="pl-3 text-sm focus:shadow-primary-outline ease w-1/100 leading-5.6 relative -ml-px block min-w-0 flex-auto
                                                       rounded-lg border border-solid border-gray-300 bg-slate-900 text-white bg-clip-padding
                                                       py-2 pr-3 text-gray-700 transition-all placeholder:text-gray-500 focus:border-blue-500
                                                       focus:outline-none focus:transition-shadow w-full" type="text"
                                                value="10">
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-4 mb-5 gap-6">
                                        <div class="">
                                            <h6 class="mb-2">Encode Priority</h6>
                                            <input id="encodePriority" class="pl-3 text-sm focus:shadow-primary-outline ease w-1/100 leading-5.6 relative -ml-px block min-w-0 flex-auto
                                                       rounded-lg border border-solid border-gray-300 bg-slate-900 text-white bg-clip-padding
                                                       py-2 pr-3 text-gray-700 transition-all placeholder:text-gray-500 focus:border-blue-500
                                                       focus:outline-none focus:transition-shadow w-full"
                                                type="text" value="0">
                                        </div>
                                        <div class="">
                                            <h6 class="mb-2">Transfer Priority</h6>
                                            <input id="transferPriority" class="pl-3 text-sm focus:shadow-primary-outline ease w-1/100 leading-5.6 relative -ml-px block min-w-0 flex-auto
                                                       rounded-lg border border-solid border-gray-300 bg-slate-900 text-white bg-clip-padding
                                                       py-2 pr-3 text-gray-700 transition-all placeholder:text-gray-500 focus:border-blue-500
                                                       focus:outline-none focus:transition-shadow w-full"
                                                type="text" value="0">
                                        </div>
                                        <div class="">
                                            <h6 class="mb-2">Download Priority</h6>
                                            <input id="downloadPriority" class="pl-3 text-sm focus:shadow-primary-outline ease w-1/100 leading-5.6 relative -ml-px block min-w-0 flex-auto
                                                       rounded-lg border border-solid border-gray-300 bg-slate-900 text-white bg-clip-padding
                                                       py-2 pr-3 text-gray-700 transition-all placeholder:text-gray-500 focus:border-blue-500
                                                       focus:outline-none focus:transition-shadow w-full"
                                                type="text" value="0">
                                        </div>
                                        <div class="">
                                            <h6 class="mb-2">Torrent Priority</h6>
                                            <input id="torrentPriority" class="pl-3 text-sm focus:shadow-primary-outline ease w-1/100 leading-5.6 relative -ml-px block min-w-0 flex-auto
                                                       rounded-lg border border-solid border-gray-300 bg-slate-900 text-white bg-clip-padding
                                                       py-2 pr-3 text-gray-700 transition-all placeholder:text-gray-500 focus:border-blue-500
                                                       focus:outline-none focus:transition-shadow w-full"
                                                type="text" value="0">
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-2 row mb-5 mt-30 gap-6">
                                        <div class="flex items-center">
                                            <h4 class="me-4 mb-0 w-max">Streming Priority</h4>
                                            <input id="streamPriority" class="pl-3 text-sm focus:shadow-primary-outline ease w-1/100 leading-5.6 relative -ml-px block min-w-0 flex-auto
                                                       rounded-lg border border-solid border-gray-300 bg-slate-900 text-white bg-clip-padding
                                                       py-2 pr-3 text-gray-700 transition-all placeholder:text-gray-500 focus:border-blue-500
                                                       focus:outline-none focus:transition-shadow "
                                                type="text" value="1">
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <h4 style="display:none;" id="nof" class="text-center">
                                            Sucees</h4>
                                    </div>
                                    <div class="col-xl-12 save text-center mt-3">
                                        <button onclick="saveSetting()" class="rounded-lg bg-teal-400 px-6 py-2 relative hover:bg-gradient-to-r hover:from-blue-400 hover:to-green-500">
                                            <i class="fa fa-check" aria-hidden="true"></i>
                                            Save
                                        </button>
                                    </div>
                                </div> <!--end-settings-->
                            </div>
                            <!-- /box-body -->
                        </div>

                </div>

            </div>

        </div>
</body>
<!-- plugin for scrollbar  -->
<script src="../assets/js/plugins/perfect-scrollbar.min.js" async></script>
<!-- main script file  -->
<script src="../assets/js/argon-dashboard-tailwind.js?v=1.1.7" async></script>
<script src="../assets/datatable/datatables.min.js"></script>


</html>
