<div id="transfer" class=" bg-[#121520] p-4 border-[#121520] rounded-b-xl rounded-tr-xl gap-2 bg-top [border-width:var(--tab-border)]" transfer_link>
    <div class="col-span-full text-center">
        <div class="noti text-white italic">
            <label htmlFor="cover-photo" class="text-start block text-sm font-medium leading-6">
                After submiting torrent, only files with allowed extensions (mkv, wmv, avi, mp4,
                mpeg4, mpegps, flv, 3gp, webm, mov, mpg, m4v) and allowed size (less than 10GB)
                will be shown, then you can select one or more files for uploading.
            </label>
            <label htmlFor="cover-photo" class="text-start block text-sm font-medium leading-6">
                Please note each task has maximum 24 hours to finish downloading, after that it
                will be cleared. If you facing any issues, please open support ticket and let us
                know
            </label>
        </div>
        <hr class="h-px my-6 bg-transparent bg-gradient-to-r from-transparent via-white to-transparent border-none" />
        <form class='from-current pb-8' id="transferLink" method="POST" action="">
            @csrf
            <div class="mt-2 lg:mx-32 shadow-lg flex justify-center relative rounded-lg bg-[#142132]  hover:bg-[#01545e]">
                <textarea name="url" id=""
                          class='outline-none w-full bg-transparent rounded-xl px-3 py-2 text-white focus:bg-[#01545e]'
                          rows="8"></textarea>
                <input class="hidden" type="text" id="folderPost" name="FolderID" value="{{ $currentFolderName-> id }}">
            </div>

            <button type="submit" disabled class='mt-5 px-10 py-2 rounded-lg bg-[#142132] text-white'>Submit</button>
        </form>
    </div>
    <div class='-mb-12 bg-slate-900 mx-6 rounded-xl flex items-center px-3'>
        <label for="select-folder" class='py-4 font-bold w-28 sm:w-24 text-[#009FB2]'>Save To </label>
        <select class="select2 w-full sm:w-1/2 bg-[#009FB2]" id="select-folder" data-placeholder="Select folder">
            <option value="{{ $currentFolderName->id }}" selected>{{ $currentFolderName->name_folder }}( Default Folder)</option>
            @foreach($folders as $folder)
                @if($folder->id != $currentFolderName->id)
                    <option value="{{ $folder->id }}">{{ $folder->name_folder }}</option>
                @endif
            @endforeach
        </select>
    </div>
</div>
<div class="mt-14 bg-[#121520] rounded-xl py-3" id="box-list-upload">
    <div class="text-white pl-3 pt-3 flex justify-between items-center">
        <div class=" text-lg font-bold" transfer>Transfer</div>
        <div class="text-white">
            <button class="px-4 py-1 rounded-lg bg-red-500 mr-3" button-remove-failed>Remote all failed</button>
        </div>
    </div>
    <hr class="h-px my-3 bg-transparent bg-gradient-to-r from-transparent via-white to-transparent border-none"/>
    <div id="list-upload">
        @if($getProgressTransfer && is_string($getProgressTransfer))
            @php
                $decodedTransfer = json_decode($getProgressTransfer, true);
            @endphp
            @if(is_array($decodedTransfer)&& count($decodedTransfer) > 0)
                @foreach ($decodedTransfer as $key => $value)
                    <div class="mx-3 mb-5 info-link flex justify-between items-center"  id="{{ $value['slug'] }}">
                        <div>
                            <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 111.87 122.88"
                                 fill="white" width="60" height="50">
                                <defs><style>.cls-1{fill-rule:evenodd;}</style></defs><title>video-file</title>
                                <path class="cls-1" d="M56.75,113.57V75.07a9.34,9.34,0,0,1,9.31-9.31h36.5a9.34,9.34,0,0,1,9.31,9.31v38.5a9.34,9.34,0,0,1-9.31,9.31H66.06a9.34,9.34,0,0,1-9.31-9.31Zm2.74-102.1L79.08,29.82H59.49V11.47ZM20.72,69.38a2.12,2.12,0,0,0-2,2.21,2.08,2.08,0,0,0,2,2.21H45.3V69.38Zm.68,15.83a2.12,2.12,0,0,0-2,2.21,2.09,2.09,0,0,0,2,2.21H46V85.21Zm-.7-47.5a2.12,2.12,0,0,0-2,2.21,2.09,2.09,0,0,0,2,2.21H43.45a2.12,2.12,0,0,0,2-2.21,2.1,2.1,0,0,0-2-2.21Zm0-15.83a2.12,2.12,0,0,0-2,2.21,2.08,2.08,0,0,0,2,2.21h12.5a2.12,2.12,0,0,0,2-2.21,2.1,2.1,0,0,0-2-2.21Zm0,31.67a2.12,2.12,0,0,0-2,2.21,2.09,2.09,0,0,0,2,2.21H59.16a2.12,2.12,0,0,0,2-2.21,2.09,2.09,0,0,0-2-2.21ZM90,32.45a3.26,3.26,0,0,0-2.37-3.14L58.74,1.2A3.21,3.21,0,0,0,56.23,0H5.87A5.86,5.86,0,0,0,0,5.86V106.25a5.84,5.84,0,0,0,1.72,4.15,5.91,5.91,0,0,0,4.15,1.71H45.39v-6.55H6.55v-99H52.94V33.08a3.29,3.29,0,0,0,3.29,3.29h27.2V57.82H90V32.45Zm4.3,63.73c1.9-1.23,1.89-2.59,0-3.68L77.39,81.23c-1.55-1-3.16-.4-3.12,1.62l.06,22.78c.13,2.19,1.38,2.79,3.23,1.77L94.28,96.18Z"/></svg>
                        </div>
                        <div class="px-5 w-full">
                            <div class="text-white pb-2 flex justify-between items-center">
                                <div class="title-file resumable-file-name">{{ $value['url'] }}</div>
                                <div class="flex ml-5 items-end">
                                    @if($value['status'] == 2)
                                        <div class="text-teal-500 mt-3 status">
                                            Transfer successfully
                                        </div>
                                    @elseif($value['status'] == 19)
                                        <div class="text-red-500 mt-3 status">
                                            Transfer failed
                                        </div>
                                    @elseif($value['status'] == 1)
                                        <div class="text-yellow-500 mt-3 status">
                                            Transferring
                                        </div>
                                    @else
                                        <div class="text-blue-500 mt-3 status">
                                            Pending
                                        </div>
                                    @endif
                                    <div class="text-progress ml-3 text-md font-bold">{{ $value['progress'] }}%</div>
                                </div>
                            </div>
                            <div class="progress bg-gray-600 h-3.5 rounded-lg resumable-file-progress">
                                <div class="bar {{ $value['progress'] == 100 ? 'bg-green-500' : 'bg-orange-500' }} h-full rounded-lg text-xs text-white font-semibold pl-2 flex items-center"
                                     style="width: {{ $value['progress'] }}%"></div>
                            </div>
                            <div class="flex justify-between mt-2">
                                <div class="size">{{ \App\Models\File::formatSizeUnits($value['size_download']) }} / {{ \App\Models\File::formatSizeUnits($value['size']) }}</div>
                                <div class="estimated-time text-slate-400 hidden">Estimated time: 0</div>
                            </div>

                        </div>
                        <div class="flex justify-between mt-2 button-file">
                            <button class="resumable-pause-btn hover:text-orange-500 text-white rounded-lg" button-retry>
                                <i class="material-symbols-outlined opacity-1 text-3xl">cached</i>
                            </button>
                            <button class="resumable-remove-btn hover:text-rose-600 text-white ml-2 rounded-lg" button-remove>
                                <i class="material-symbols-outlined opacity-1 text-3xl">close</i>
                            </button>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="text-center text-emerald-500 font-bold">
                    No Active Tasks
                </div>
            @endif
        @endif
    </div>

</div>
