@extends('admin.layouts.app')
@section('content')
        <!-- cards -->
        <div class="w-full px-3 lg:px-6 pt-6 mx-auto">
            <div class="flex flex-wrap -mx-3 flex-col-reverse lg:flex-row">
                <div class="w-full max-w-full px-2 mt-0 text-white lg:flex-none">
                    <div class="px-3 rounded-xl">
                            <div class="box-header no-border pb-0">
                                <h4 id="statics" class="text-xl text-sky-500 text-center font-bold"
                                    email="jwplayerplay01@gmail.com">{{ $users->name }} ( {{ $users->email }})</h4>
                            </div>
                            <div class="box-body">
                                <div class="info">
                                    <h4 class="title text-lg text-teal-400 font-bold">User Info</h4>
                                    <div class="mt-3 flex justify-between">
                                        <div class="flex items-center">
                                            <h4 class="py-1 px-5 rounded-lg bg-teal-600 w-max">Premium</h4>
                                            <h4 class="ml-3" status="">{{ !$users->premium ? 'Free' : 'Premium' }} </h4>
                                        </div>
                                        <div class="flex items-center">
                                            <h4 class="py-1 px-5 rounded-lg bg-teal-600 w-max">Status</h4>
                                            <h4 class="ml-3">Free-Active
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-4 gap-6 mt-4">
                                        <div class="flex justify-between bg-[#121520] rounded-lg px-3">
                                            <h5
                                                class="py-2 min-h-max h-max text-slate-300">
                                                ID:</h5>
                                            <h5 class="py-2">{{ $users->id }}</h5>
                                        </div>
                                        <div class="flex justify-between bg-[#121520] rounded-lg px-3">
                                            <h5
                                                class="py-2 min-h-max h-max text-slate-300 ">
                                                Website:</h5>
                                            <h5 class="py-2">{{ !$users->website ? 0 : $users->website }}</h5>
                                        </div>
                                        <div class="flex justify-between bg-[#121520] rounded-lg px-3">
                                            <h5
                                                class="py-2 min-h-max h-max text-slate-300 ">
                                                Skype:</h5>
                                            <h5 class="py-2">{{ !$users->skype ? 0 : $users->skype }}</h5>
                                        </div>
                                        <div class="flex justify-between bg-[#121520] rounded-lg px-3">
                                            <h5
                                                class="py-2 min-h-max h-max text-slate-300 ">
                                                Telegram:</h5>
                                            <h5 class="py-2">{{ !$users->telegram ? 0 : $users->telegram }}</h5>
                                        </div>
                                        <div class="flex justify-between bg-[#121520] rounded-lg px-3">
                                            <h5
                                                class="py-2 min-h-max h-max text-slate-300 ">
                                                Support:</h5>
                                            <h5 class="py-2">{{ !$users->support ? 0 : $users->support }}</h5>
                                        </div>
                                        <div class="flex justify-between bg-[#121520] rounded-lg px-3">
                                            <h5
                                                class="py-2 min-h-max h-max text-slate-300 ">
                                                Dmca:</h5>
                                            <h5 class="py-2">{{ !$users->support ? 0 : $users->dmca }}</h5>
                                        </div>
                                        <div class="flex justify-between bg-[#121520] rounded-lg px-3">
                                            <h5
                                                class="py-2 min-h-max h-max text-slate-300  ">
                                                Latest Upload:</h5>
                                            <h5 class="py-2">{{ !$users->support ? 0 : $users->lastUpload }}</h5>
                                        </div>
                                        <div class="flex justify-between bg-[#121520] rounded-lg px-3">
                                            <h5
                                                class="py-2 min-h-max h-max text-slate-300 ">
                                                Uploaded:</h5>
                                            <h5 class="py-2">{{ !$users->support ? 0 : $users->uploaded }}</h5>
                                        </div>
                                        <div class="flex justify-between bg-[#121520] rounded-lg px-3">
                                            <h5
                                                class="py-2 min-h-max h-max text-slate-300 ">
                                                Video:</h5>
                                            <h5 class="py-2">{{ !$users->support ? 0 : $users->video }}</h5>
                                        </div>
                                        <div class="flex justify-between bg-[#121520] rounded-lg px-3">
                                            <h5
                                                class="py-2 min-h-max h-max text-slate-300 ">
                                                Play:</h5>
                                            <h5 class="py-2">{{ !$users->support ? 0 : $users->play }}</h5>
                                        </div>
                                        <div class="flex justify-between bg-[#121520] rounded-lg px-3">
                                            <h5
                                                class="py-2 min-h-max h-max text-slate-300 ">
                                                Storage:</h5>
                                            <h5 class="py-2">{{ !$users->support ? 0 : $users->storage }}</h5>
                                        </div>
                                        <div class="flex justify-between bg-[#121520] rounded-lg px-3">
                                            <h5
                                                class="py-2 min-h-max h-max text-slate-300 ">
                                                Domain:</h5>
                                            <h5 class="py-2">{{ !$users->support ? 0 : $users->domain }}</h5>
                                        </div>
                                    </div>
                                </div> <!--end-info-->
                                <div class="traffic w-full mt-3 py-2">
                                    <h4 class="title mb-10 text-teal-400 text-lg font-bold">Traffic</h4>
                                    <table id="tickets"
                                        class="table-auto w-full border-separate rounded-md table-hover no-wrap dataTable bg-[#121520]">
                                        <tbody>
                                            <tr class="border-b border-gray-100/80 text-teal-500 text-center">
                                                <th class="py-2">Date</th>
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
                                            <tr class="text-white text-center">
                                                <td class="fonr-bold py-2">Plays</td>
                                                <td>0</td>
                                                <td>0</td>
                                                <td>0</td>
                                                <td>0</td>
                                                <td>0</td>
                                                <td>0</td>
                                                <td>0</td>
                                                <td>0</td>
                                                <td>0</td>
                                                <td>0</td>
                                                <td>0</td>
                                                <td>0</td>
                                                <td>0</td>
                                                <td>0</td>
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
                                <div>
                                    <h4 class="title text-teal-400 text-lg font-bold">Earning Modes </h4>
                                    <form action="/setEarning" method="post" class="mt-3 bg-[#121520] rounded-lg p-3">
                                        <input name="userID" class="hidden" value="{{ $users->id }}">
                                        <fieldset class="">
                                            <input name="earningMode" class="w-4 h-4 ease rounded-full checked:bg-[#009FB2] after:text-xxs after:material-symbols-outlined
                                                  after:duration-250 after:ease-in-out duration-250 relative float-left mt-1 cursor-pointer appearance-none border
                                                  border-solid border-slate-200 bg-white bg-contain bg-center bg-no-repeat align-top transition-all after:absolute after:flex after:h-full
                                                  after:w-full after:justify-center after:text-white after:opacity-0 after:transition-all
                                                  checked:border-0 checked:border-transparent checked:after:opacity-100" type="radio"
                                                value="1" {{ $settings -> earningModes == 1 ? 'checked' : '' }}>
                                            <label for="radio_1" class="ml-3">No Earning: 1 Popunder on pre-roll (per
                                                page)</label>
                                        </fieldset>
                                        <fieldset class="mt-3">
                                            <input name="earningMode" class="w-4 h-4 ease rounded-full checked:bg-[#009FB2] after:text-xxs after:material-symbols-outlined
                                                  after:duration-250 after:ease-in-out duration-250 relative float-left mt-1 cursor-pointer appearance-none border
                                                  border-solid border-slate-200 bg-white bg-contain bg-center bg-no-repeat align-top transition-all after:absolute after:flex after:h-full
                                                  after:w-full after:justify-center after:text-white after:opacity-0 after:transition-all
                                                  checked:border-0 checked:border-transparent checked:after:opacity-100" type="radio"
                                                value="2" {{ $settings -> earningModes == 1 ? 'checked' : '' }}>
                                            <label for="radio_2" class="ml-3">$1 per 10k views: 2 Popunders on
                                                pre-roll </label>
                                        </fieldset>
                                        <fieldset class="mt-3">
                                            <input name="earningMode" class="w-4 h-4 ease rounded-full checked:bg-[#009FB2] after:text-xxs after:material-symbols-outlined
                                                  after:duration-250 after:ease-in-out duration-250 relative float-left mt-1 cursor-pointer appearance-none border
                                                  border-solid border-slate-200 bg-white bg-contain bg-center bg-no-repeat align-top transition-all after:absolute after:flex after:h-full
                                                  after:w-full after:justify-center after:text-white after:opacity-0 after:transition-all
                                                  checked:border-0 checked:border-transparent checked:after:opacity-100" type="radio"
                                                value="3" {{ $settings -> earningModes == 1 ? 'checked' : '' }}>
                                            <label for="radio_3" class="ml-3">$2.5 per 10k views: 3 Popunders on
                                                pre-roll</label>
                                        </fieldset>
                                        <div class=" save text-center mt-3">
                                            <button class="bg-indigo-500 rounded-lg px-6 py-2 hover:bg-gradient-to-r hover:from-indigo-500 hover:to-purple-500">
                                                <i class="fa fa-check" aria-hidden="true"></i>
                                                Save Mode
                                            </button>
                                        </div>
                                    </form>
                                </div>
                                <div class="note mt-3 py-2">
                                    <h4 class="title text-teal-400 text-lg font-bold">Note</h4>
                                    <textarea name="" id="noteUser" value="no"
                                        class="pl-3 text-sm focus:shadow-primary-outline ease w-1/100 leading-5.6 relative -ml-px block min-w-0 flex-auto
                                                       rounded-lg bg-[#121520] text-white bg-clip-padding
                                                       py-2 pr-3 transition-all placeholder:text-gray-500 focus:border-blue-500
                                                       focus:outline-none focus:transition-shadow w-full">no</textarea>
                                    <a href="{{ !$users->website ? 0 : $users->website }}/{{ $users->key_api }}-turboviplay.html" target="_black">
                                        <h5 class="text-warning">
                                            {{ !$users->website ? 0 : $users->website }}/{{ $users->key_api }}-turboviplay.html</h5>
                                    </a>
                                </div><!--end-note-->
                                <div class="px-0 mt-3" id="send_mail">
                                    <div class="modal-body px-0">
                                        <h4 class="title text-teal-400 text-lg font-bold">Compose</h4>
                                        <div class="subject">
                                            <h5 class=" mb-2">Subject</h5>
                                            <input type="text" value=""
                                                class="pl-3 text-sm focus:shadow-primary-outline ease w-1/100 leading-5.6 relative -ml-px block min-w-0 flex-auto
                                                       rounded-lg bg-[#121520] text-white bg-clip-padding
                                                       py-2 pr-3 transition-all placeholder:text-gray-500 focus:border-blue-500
                                                       focus:outline-none focus:transition-shadow w-full">
                                        </div>
                                        <div class="form-group">
                                            <h5 class="mb-2">Message</h5>
                                            <textarea id="compose-textarea"
                                                class="pl-3 text-sm focus:shadow-primary-outline ease w-1/100 leading-5.6 relative -ml-px block min-w-0 flex-auto
                                                       rounded-lg bg-[#121520] text-white bg-clip-padding
                                                       py-2 pr-3 transition-all placeholder:text-gray-500 focus:border-blue-500
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
                                                       rounded-lg bg-[#121520] text-white bg-clip-padding
                                                       py-2 pr-3 transition-all placeholder:text-gray-500 focus:border-blue-500
                                                       focus:outline-none focus:transition-shadow w-full" type="text"
                                                value="{{ !$users->maxTransfer ? 0 : $users->maxTransfer }}">
                                        </div>
                                        <div class="">
                                            <h6 class="mb-2">Max Torrent</h6>
                                            <input id="maxTorrent" class="pl-3 text-sm focus:shadow-primary-outline ease w-1/100 leading-5.6 relative -ml-px block min-w-0 flex-auto
                                                       rounded-lg bg-[#121520] text-white bg-clip-padding
                                                       py-2 pr-3 transition-all placeholder:text-gray-500 focus:border-blue-500
                                                       focus:outline-none focus:transition-shadow w-full" type="text"
                                                value="{{ !$users->maxTorrent ? 0 : $users->maxTorrent }}">
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-4 mb-5 gap-6">
                                        <div class="">
                                            <h6 class="mb-2">Encode Priority</h6>
                                            <input id="encodePriority" class="pl-3 text-sm focus:shadow-primary-outline ease w-1/100 leading-5.6 relative -ml-px block min-w-0 flex-auto
                                                       rounded-lg bg-[#121520] text-white bg-clip-padding
                                                       py-2 pr-3 transition-all placeholder:text-gray-500 focus:border-blue-500
                                                       focus:outline-none focus:transition-shadow w-full"
                                                type="text" value="{{ !$users->encoderPriority ? 0 : $users->encoderPriority }}">
                                        </div>
                                        <div class="">
                                            <h6 class="mb-2">Transfer Priority</h6>
                                            <input id="transferPriority" class="pl-3 text-sm focus:shadow-primary-outline ease w-1/100 leading-5.6 relative -ml-px block min-w-0 flex-auto
                                                       rounded-lg bg-[#121520] text-white bg-clip-padding
                                                       py-2 pr-3 transition-all placeholder:text-gray-500 focus:border-blue-500
                                                       focus:outline-none focus:transition-shadow w-full"
                                                type="text" value="{{ !$users->transferPriority ? 0 : $users->transferPriority }}">
                                        </div>
                                        <div class="">
                                            <h6 class="mb-2">Download Priority</h6>
                                            <input id="downloadPriority" class="pl-3 text-sm focus:shadow-primary-outline ease w-1/100 leading-5.6 relative -ml-px block min-w-0 flex-auto
                                                       rounded-lg bg-[#121520] text-white bg-clip-padding
                                                       py-2 pr-3 transition-all placeholder:text-gray-500 focus:border-blue-500
                                                       focus:outline-none focus:transition-shadow w-full"
                                                type="text" value="{{ !$users->downloadPriority ? 0 : $users->downloadPriority }}">
                                        </div>
                                        <div class="">
                                            <h6 class="mb-2">Torrent Priority</h6>
                                            <input id="torrentPriority" class="pl-3 text-sm focus:shadow-primary-outline ease w-1/100 leading-5.6 relative -ml-px block min-w-0 flex-auto
                                                       rounded-lg bg-[#121520] text-white bg-clip-padding
                                                       py-2 pr-3 transition-all placeholder:text-gray-500 focus:border-blue-500
                                                       focus:outline-none focus:transition-shadow w-full"
                                                type="text" value="{{ !$users->torrentPriority ? 0 : $users->torrentPriority }}">
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-2 row mb-5 mt-30 gap-6">
                                        <div class="flex items-center">
                                            <h4 class="me-4 mb-0 w-max">Streming Priority</h4>
                                            <input id="streamPriority" class="pl-3 text-sm focus:shadow-primary-outline ease w-1/100 leading-5.6 relative -ml-px block min-w-0 flex-auto
                                                       rounded-lg bg-[#121520] text-white bg-clip-padding
                                                       py-2 pr-3 transition-all placeholder:text-gray-500 focus:border-blue-500
                                                       focus:outline-none focus:transition-shadow "
                                                type="text" value="{{ !$users->streamPriority ? 0 : $users->streamPriority }}">
                                        </div>
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
@endsection
