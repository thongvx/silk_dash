<div id="transfer" class=" bg-[#121520] p-4 border-[#121520] rounded-b-xl rounded-tr-xl gap-2 bg-top [border-width:var(--tab-border)]" transfer_link>
    <div class="col-span-full text-center">
        <div class="noti text-white italic">
            <label htmlFor="cover-photo" class="text-start block text-sm font-medium leading-6">
                You can enter up to 100 URLs:
            </label>
        </div>
        <hr class="h-px my-6 bg-transparent bg-gradient-to-r from-transparent via-white to-transparent border-none" />
        <form class='from-current pb-8' id="clone">
            <div class="mt-2 lg:mx-32 shadow-lg flex justify-center relative rounded-lg bg-[#142132] hover:bg-[#009FB2]">
                <textarea name="url" id="clone" class='w-full bg-transparent rounded-xl px-3 py-2 text-white outline-none' rows="8"></textarea>
                <input class="hidden" type="text" id="folderPost" name="folderID" value="{{ $currentFolderName-> id }}">
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
<div class="mt-14 py-3 hidden" id="box-list-upload">
    <div class="text-white pl-3 pt-3 mb-5">
        <div class=" text-lg font-bold">Clone</div>
    </div>
    <div id="list-clone">
    </div>

</div>
