@extends('admin.layouts.app')
@section('content')
    <!-- cards -->
    <div class="w-full pt-6 mx-auto">
        <div class="flex flex-wrap -mx-3 flex-col-reverse lg:flex-row">
            <div class="w-full max-w-full px-2 mt-0 text-white lg:flex-none">
                <div class="rounded-xl">
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
                                    <h4 class="ml-3">{{ $users->active == 1 ? 'Free Active' : ($users->active == 19 ? 'Ban' : 'Unverified' )}}
                                    </h4>
                                </div>
                            </div>
                            <div class="grid sm:grid-cols-2 sm:grid-cols-3 xl:grid-cols-4 gap-6 mt-4">
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
                                    <h5 class="py-2">{{ $users->website ?? 0 }}</h5>
                                </div>
                                <div class="flex justify-between bg-[#121520] rounded-lg px-3">
                                    <h5
                                        class="py-2 min-h-max h-max text-slate-300 ">
                                        Skype:</h5>
                                    <h5 class="py-2">{{ $users->skype ?? 0 }}</h5>
                                </div>
                                <div class="flex justify-between bg-[#121520] rounded-lg px-3">
                                    <h5
                                        class="py-2 min-h-max h-max text-slate-300 ">
                                        Telegram:</h5>
                                    <h5 class="py-2">{{ $users->telegram ?? 0 }}</h5>
                                </div>
                                <div class="flex justify-between bg-[#121520] rounded-lg px-3">
                                    <h5
                                        class="py-2 min-h-max h-max text-slate-300 ">
                                        Support:</h5>
                                    <h5 class="py-2">{{ $users->support ?? 0 }}</h5>
                                </div>
                                <div class="flex justify-between bg-[#121520] rounded-lg px-3">
                                    <h5
                                        class="py-2 min-h-max h-max text-slate-300 ">
                                        Dmca:</h5>
                                    <h5 class="py-2">{{ $users->dmca ?? 0 }}</h5>
                                </div>
                                <div class="flex justify-between bg-[#121520] rounded-lg px-3">
                                    <h5
                                        class="py-2 min-h-max h-max text-slate-300  ">
                                        Latest Upload:</h5>
                                    <h5 class="py-2">{{ $users->last_upload ? date("Y-m-d H:m:s", $users->last_upload) : 0 }}</h5>
                                </div>
                                <div class="flex justify-between bg-[#121520] rounded-lg px-3">
                                    <h5
                                        class="py-2 min-h-max h-max text-slate-300 ">
                                        Total Balance:</h5>
                                    <h5 class="py-2">{{ $users->earning ? '$ '.number_format($user->earning) : 0 }}</h5>
                                </div>
                                <div class="flex justify-between bg-[#121520] rounded-lg px-3">
                                    <h5
                                        class="py-2 min-h-max h-max text-slate-300 ">
                                        Video:</h5>
                                    <h5 class="py-2">{{ \App\Models\File::formatNumber($users->video) ?? 0 }}</h5>
                                </div>
                                <div class="flex justify-between bg-[#121520] rounded-lg px-3">
                                    <h5
                                        class="py-2 min-h-max h-max text-slate-300 ">
                                        Play:</h5>
                                    <h5 class="py-2">{{ \App\Models\File::formatNumber($users->play) ?? 0 }}</h5>
                                </div>
                                <div class="flex justify-between bg-[#121520] rounded-lg px-3">
                                    <h5
                                        class="py-2 min-h-max h-max text-slate-300 ">
                                        Storage:</h5>
                                    <h5 class="py-2">{{ \App\Models\File::formatSizeUnits($users->storage ) ?? 0 }}</h5>
                                </div>
                                <div class="flex justify-between bg-[#121520] rounded-lg px-3">
                                    <h5
                                        class="py-2 min-h-max h-max text-slate-300 ">
                                        Domain:</h5>
                                    <h5 class="py-2">{{ $settings->domain ?? 0 }}</h5>
                                </div>
                            </div>
                        </div> <!--end-info-->
                        <div class="traffic w-full mt-3 py-2">
                            <h4 class="title mb-3 lg:mb-10 text-teal-400 text-lg font-bold">Traffic</h4>
                            <table id="traffic1"
                                   class="hidden lg:table text-sm border-separate table-auto overflow-y-clip w-full text-white text-center bg-[#121520]">
                                <thead class="w-full">
                                    <tr class="border-b border-gray-100/80 font-semibold text-md text-center">
                                        <th class="py-2">Date</th>
                                        @foreach($dataReport as $data)
                                            <td>{{ $data->date }}</td>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody class="my-3 h-12">
                                    <tr class="text-white text-center bg-[#142132]">
                                        <td class="font-bold py-2">Views</td>
                                        @foreach($dataReport as $data)
                                            <td>{{ $data->views }}</td>
                                        @endforeach
                                    </tr>
                                    <tr class="text-white text-center">
                                        <td class="font-bold py-2">Paid Views</td>
                                        @foreach($dataReport as $data)
                                            <td>{{ $data->paid_views }}</td>
                                        @endforeach
                                    </tr>
                                    <tr class="text-white text-center bg-[#142132]">
                                        <td class="font-bold py-2">Revenue</td>
                                        @foreach($dataReport as $data)
                                            <td>{{ $data->revenue }}</td>
                                        @endforeach
                                    </tr>
                                </tbody>

                            </table>
                            <table id="traffic"
                                   class="lg:hidden text-sm border-separate table-auto overflow-y-clip w-full text-white text-center bg-[#121520]">
                                <thead>
                                <tr class="border-b border-gray-100/80 text-teal-500 text-center">
                                    <th class="py-2">Date</th>
                                    <th>Views</th>
                                    <th>Paid Views</th>
                                    <th class="py-2">Revenue</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($dataReport as $data)
                                    <tr class="text-white text-center my-1.5 h-12 odd:bg-transparent even:bg-[#142132]">
                                        <td>{{ $data->date }}</td>
                                        <td>{{ $data->views }}</td>
                                        <td>{{ $data->paid_views }}</td>
                                        <td>{{ $data->revenue }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div> <!--end-traffic-->
                        <div class="actions mt-3 flex flex-col	">
                            <h4 class="text-teal-400 text-lg font-bold">Actions</h4>
                            <div class="flex justify-center	">
                                <div
                                    class="ml-4 rounded-lg bg-[#121520] hover:bg-gradient-to-r from-pink-500 to-red-500 w-max py-2 px-5">
                                    <form action="{{ route('user.destroy', ['user' => $users->id]) }}" method="POST"
                                          onsubmit="return confirm('Are you sure you want to delete this user?');"
                                          style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <a href="javascript:void(0)" onclick="this.closest('form').submit();"
                                           class="text-white">
                                            <i class="fa fa-ban" aria-hidden="true"></i>
                                            Ban It
                                        </a>
                                    </form>
                                </div>
                                <div
                                    class="ml-4 rounded-lg bg-[#121520] hover:bg-gradient-to-r from-blue-400 to-green-500 w-max py-2 px-5"
                                    onclick="premium()">
                                    <i class="fa fa-money" aria-hidden="true"></i>
                                    Add Premium View
                                </div>
                                <a class="ml-4 rounded-lg bg-[#121520] hover:bg-gradient-to-r from-indigo-500 to-purple-500 w-max py-2 px-5"
                                   href="https://streamsilk.com/login-as/{{$users->id}}"
                                   target="_blank">
                                    <i class="fa fa-sign-in" aria-hidden="true"></i>
                                    Login As User
                                </a>
                                <div class="hidden">
                                    <i class="fa fa-ban" aria-hidden="true"></i>
                                    Delete
                                </div>
                            </div>
                        </div> <!--end-actions-->
                        <div>
                            <h4 class="title text-teal-400 text-lg font-bold">Earning Modes </h4>
                            <form action="/admin/updateEarning" method="post" class="mt-3 bg-[#121520] rounded-lg p-3">
                                @csrf
                                <input name="userID" class="hidden" value="{{ $users->id }}">
                                <fieldset class="">
                                    <input name="earningModes" id="2" class="w-4 h-4 ease rounded-full checked:bg-[#009FB2] after:text-xxs after:material-symbols-outlined
                                                  after:duration-250 after:ease-in-out duration-250 relative float-left mt-1 cursor-pointer appearance-none border
                                                  border-solid border-slate-200 bg-white bg-contain bg-center bg-no-repeat align-top transition-all after:absolute after:flex after:h-full
                                                  after:w-full after:justify-center after:text-white after:opacity-0 after:transition-all
                                                  checked:border-0 checked:border-transparent checked:after:opacity-100"
                                           type="radio"
                                           value="2" {{ $settings -> earningModes == 2 ? 'checked' : '' }}>
                                    <label for="2" class="ml-3">Maximum Ads - 100% Earnings</label>
                                </fieldset>
                                <fieldset class="mt-3">
                                    <input name="earningModes" id="1" class="w-4 h-4 ease rounded-full checked:bg-[#009FB2] after:text-xxs after:material-symbols-outlined
                                                  after:duration-250 after:ease-in-out duration-250 relative float-left mt-1 cursor-pointer appearance-none border
                                                  border-solid border-slate-200 bg-white bg-contain bg-center bg-no-repeat align-top transition-all after:absolute after:flex after:h-full
                                                  after:w-full after:justify-center after:text-white after:opacity-0 after:transition-all
                                                  checked:border-0 checked:border-transparent checked:after:opacity-100"
                                           type="radio"
                                           value="1" {{ $settings -> earningModes == 1 ? 'checked' : '' }}>
                                    <label for="1" class="ml-3">Medium Ads - 50% Earnings</label>
                                </fieldset>
                                <fieldset class="mt-3">
                                    <input name="earningModes" id="0" class="w-4 h-4 ease rounded-full checked:bg-[#009FB2] after:text-xxs after:material-symbols-outlined
                                                  after:duration-250 after:ease-in-out duration-250 relative float-left mt-1 cursor-pointer appearance-none border
                                                  border-solid border-slate-200 bg-white bg-contain bg-center bg-no-repeat align-top transition-all after:absolute after:flex after:h-full
                                                  after:w-full after:justify-center after:text-white after:opacity-0 after:transition-all
                                                  checked:border-0 checked:border-transparent checked:after:opacity-100"
                                           type="radio"
                                           value="0" {{ $settings -> earningModes == 0 ? 'checked' : '' }}>
                                    <label for="0" class="ml-3">Minimal Ads - No Earnings</label>
                                </fieldset>
                                <div class=" save text-center mt-3">
                                    <button
                                        class="bg-[#142132] rounded-lg px-6 py-2 hover:bg-gradient-to-r hover:from-indigo-500 hover:to-purple-500">
                                        <i class="fa fa-check" aria-hidden="true"></i>
                                        Save Mode
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="note mt-3 py-2">
                            <h4 class="title text-teal-400 text-lg font-bold">Note</h4>
                            <textarea name="note" id="noteUser" value="{{ $users->note ?? 0 }}"
                                      class="pl-3 text-sm focus:shadow-primary-outline ease w-1/100 leading-5.6 relative -ml-px block min-w-0 flex-auto
                                                       rounded-lg bg-[#121520] text-white bg-clip-padding
                                                       py-2 pr-3 transition-all placeholder:text-gray-500 focus:border-blue-500
                                                       focus:outline-none focus:transition-shadow w-full">no</textarea>
                            <a href="{{ $users->website ?? 0 }}/{{ $users->key_api }}-turboviplay.html" target="_black">
                                <h5 class="text-warning">
                                    {{ $users->website ?? 0 }}/{{ $users->key_api }}-turboviplay.html</h5>
                            </a>
                        </div><!--end-note-->
                        <div class="px-0 mt-3" id="send_mail">
                            <form class="modal-body px-0">
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
                                    <div
                                        class="rounded-lg bg-teal-400 px-6 py-2 relative hover:bg-gradient-to-r hover:from-blue-400 hover:to-green-500">
                                        <label htmlfor="file-upload"
                                               class="flex justify-center flex-col cursor-pointer h-full w-max top-0 left-0">
                                                  <span class="items-center flex">
                                                    <i class="fa fa-paperclip pr-2"></i> Attachment
                                                  </span>
                                            <input id="file-upload" name="file-upload" type="file" class="sr-only">
                                        </label>
                                    </div>
                                    <div
                                        class="bg-indigo-500 rounded-lg px-6 py-2 hover:bg-gradient-to-r hover:from-indigo-500 hover:to-purple-500 w-max"
                                        id="send_reply">
                                        <h5 class="mb-0">Send</h5>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- end send mail -->
                        <form class="setting mt-3 py-2" method="post" action="/admin/updateUser">
                            @csrf
                            <h4 class="title text-teal-400 text-lg font-bold">Setting</h4>
                            <input name="userID" class="hidden" value="{{ $users->id }}">
                            <div class="grid grid-cols-4 mb-5 gap-6">
                                <div class="">
                                    <h6 class="mb-2">Max Transfer</h6>
                                    <input id="maxTransfer" name="max_transfer" class="pl-3 text-sm focus:shadow-primary-outline ease w-1/100 leading-5.6 relative -ml-px block min-w-0 flex-auto
                                                       rounded-lg bg-[#121520] text-white bg-clip-padding
                                                       py-2 pr-3 transition-all placeholder:text-gray-500 focus:border-blue-500
                                                       focus:outline-none focus:transition-shadow w-full" type="text"
                                           value="{{ $users->max_transfer ?? 0 }}">
                                </div>
                                <div class="">
                                    <h6 class="mb-2">Max Torrent</h6>
                                    <input id="maxTorrent" name="max_torrent" class="pl-3 text-sm focus:shadow-primary-outline ease w-1/100 leading-5.6 relative -ml-px block min-w-0 flex-auto
                                                       rounded-lg bg-[#121520] text-white bg-clip-padding
                                                       py-2 pr-3 transition-all placeholder:text-gray-500 focus:border-blue-500
                                                       focus:outline-none focus:transition-shadow w-full" type="text"
                                           value="{{ $users->max_torrent ?? 0 }}">
                                </div>
                            </div>
                            <div class="grid grid-cols-4 mb-5 gap-6">
                                <div class="">
                                    <h6 class="mb-2">Encode Priority</h6>
                                    <input id="encodePriority" name="encoder_priority" class="pl-3 text-sm focus:shadow-primary-outline ease w-1/100 leading-5.6 relative -ml-px block min-w-0 flex-auto
                                                       rounded-lg bg-[#121520] text-white bg-clip-padding
                                                       py-2 pr-3 transition-all placeholder:text-gray-500 focus:border-blue-500
                                                       focus:outline-none focus:transition-shadow w-full"
                                           type="text" value="{{ $users->encoder_priority ?? 0 }}">
                                </div>
                                <div class="">
                                    <h6 class="mb-2">Transfer Priority</h6>
                                    <input id="transferPriority" name="transfer_priority" class="pl-3 text-sm focus:shadow-primary-outline ease w-1/100 leading-5.6 relative -ml-px block min-w-0 flex-auto
                                                       rounded-lg bg-[#121520] text-white bg-clip-padding
                                                       py-2 pr-3 transition-all placeholder:text-gray-500 focus:border-blue-500
                                                       focus:outline-none focus:transition-shadow w-full"
                                           type="text" value="{{ $users->transfer_priority ?? 0 }}">
                                </div>
                                <div class="">
                                    <h6 class="mb-2">Download Priority</h6>
                                    <input id="downloadPriority" name="download_priority" class="pl-3 text-sm focus:shadow-primary-outline ease w-1/100 leading-5.6 relative -ml-px block min-w-0 flex-auto
                                                       rounded-lg bg-[#121520] text-white bg-clip-padding
                                                       py-2 pr-3 transition-all placeholder:text-gray-500 focus:border-blue-500
                                                       focus:outline-none focus:transition-shadow w-full"
                                           type="text" value="{{ $users->download_priority ?? 0 }}">
                                </div>
                                <div class="">
                                    <h6 class="mb-2">Torrent Priority</h6>
                                    <input id="torrentPriority" name="torrent_priority" class="pl-3 text-sm focus:shadow-primary-outline ease w-1/100 leading-5.6 relative -ml-px block min-w-0 flex-auto
                                                       rounded-lg bg-[#121520] text-white bg-clip-padding
                                                       py-2 pr-3 transition-all placeholder:text-gray-500 focus:border-blue-500
                                                       focus:outline-none focus:transition-shadow w-full"
                                           type="text" value="{{ $users->torrent_priority ?? 0 }}">
                                </div>
                            </div>
                            <div class="grid grid-cols-2 row mb-5 mt-30 gap-6">
                                <div class="flex items-center">
                                    <h4 class="me-4 mb-0 w-max">Streming Priority</h4>
                                    <input id="streamPriority" name="stream_priority" class="pl-3 text-sm focus:shadow-primary-outline ease w-1/100 leading-5.6 relative -ml-px block min-w-0 flex-auto
                                                       rounded-lg bg-[#121520] text-white bg-clip-padding
                                                       py-2 pr-3 transition-all placeholder:text-gray-500 focus:border-blue-500
                                                       focus:outline-none focus:transition-shadow "
                                           type="text" value="{{ $users->stream_priority ?? 0 }}">
                                </div>
                            </div>
                            <div class="col-xl-12 save text-center mt-3">
                                <button type="submit"
                                        class="rounded-lg bg-teal-400 px-6 py-2 relative hover:bg-gradient-to-r hover:from-blue-400 hover:to-green-500">
                                    <i class="fa fa-check" aria-hidden="true"></i>
                                    Save
                                </button>
                            </div>
                        </form> <!--end-settings-->
                    </div>
                    <!-- /box-body -->
                </div>

            </div>

        </div>

    </div>
@endsection
