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
        <form class='from-current pb-8' id="transferLink" method="POST" action="/remoteUpload">
            @csrf
            <div class="mt-2 lg:mx-32 shadow-lg flex justify-center relative rounded-lg bg-[#142132] hover:bg-[#009FB2]">
                <textarea name="url" id="" class='w-full bg-transparent rounded-xl px-3 py-2 text-white' rows="8"></textarea>
                <input class="hidden" type="text" id="userID" name="userID" value="{{\Illuminate\Support\Facades\Auth::user()->id}}">
                <input class="hidden" type="text" id="folderPost" name="FolderID" value="{{ $currentFolderName-> id }}">
            </div>
            <button type="submit" class='font-semibold hover:text-indigo-600 dark:hover:text-indigo-600 mt-4 dark:text-white rounded-lg px-6 py-1.5 shadow-lg shadow-gray-400/50 dark:shadow-slate-900 bg-gray-100 dark:bg-gray-900'>Submit</button>
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
    <div class="text-center text-emerald-500 font-bold">
        No Active Tasks
    </div>
    <div id="list-upload">
    </div>

</div>
