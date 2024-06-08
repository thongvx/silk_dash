<div id="transfer" class=" bg-[#121520] p-4 border-[#121520] rounded-b-box rounded-se-box gap-2 bg-top [border-width:var(--tab-border)]" transfer_link>
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
    <div class='-mb-12 bg-slate-900 mx-6 rounded-xl flex justify-between items-center px-3'>
        <h3 class='py-4  dark:text-white font-bold'>Save To <span id="folderName" class="italic text-[#009FB2]">{{ $currentFolderName-> name_folder }}( Default Folder)</span></h3>
        <div class="changefolder text-[#009FB2] font-bold cursor-pointer" change-folder>
            Change Folder
        </div>
    </div>
</div>
<div class="mt-14 bg-[#121520] rounded-xl py-3" id="box-list-upload">
    <div class="text-white pl-3 pt-3 flex justify-between items-center">
        <div class=" text-lg font-bold" transfer>Transfer</div>
        <div class="text-white">
            <button class="px-4 py-1 rounded-lg bg-red-500 mr-3">Remote all pending</button>
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
                    <div class="mx-3 mb-5 info-link" id="{{ $value['slug'] }}">
                        <div class="text-white pb-2 flex justify-between">
                            <div class="title-file">{{ $value['url'] }}</div>
                            <div class="size">{{ \App\Models\File::formatSizeUnits($value['size_download']) }} / {{ \App\Models\File::formatSizeUnits($value['size']) }}</div>
                        </div>
                        <div class="progress bg-gray-600 h-3.5 rounded-lg">
                            <div class="bar {{ $value['progress'] == 100 ? 'bg-green-500' : 'bg-orange-500' }} h-full rounded-lg text-xs text-white font-semibold pl-2 flex items-center"
                                 style="width:{{ $value['progress'] }}%">{{ $value['progress'] }}%
                            </div>
                        </div>
                        @if($value['status'] == 2)
                            <div class="text-teal-500 mt-3 status">
                                Transfer successfully
                            </div>
                        @endif
                        <div class="text-white mt-3">
                            <button class="px-4 py-1 rounded-lg bg-red-500 mr-3">Remote</button>
                            <button class="px-4 py-1 rounded-lg bg-blue-500">Retry</button>
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
