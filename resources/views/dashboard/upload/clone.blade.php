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
<div class="mt-14 py-3 hidden" id="box-list-upload">
    <div class="text-white pl-3 pt-3 mb-5">
        <div class=" text-lg font-bold">Clone</div>
    </div>
    <div id="list-clone">
    </div>

</div>
