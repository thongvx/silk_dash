
<div id="webupload" class="pt-10 bg-[#121520] p-4 border-[#121520] rounded-b-xl rounded-tr-xl gap-2 bg-top [border-width:var(--tab-border)] mb-20" web-upload>
    <div class="text-center pb-10">
        <form class='lg:mx-32 from-current' method="POST" id="form-upload-file" action="https://e02.encosilk.cc/upload"
              enctype="multipart/form-data">
            @csrf
            <label for="file" class="rounded-xl py-10 text-orange-600  hover:text-white bg-[#142132] hover:bg-[#009FB2] flex justify-center flex-col h-full w-full relative ">
                <span class='font-semibold text-white text-xl'>Drag & drop here or browse</span>
                <p class="pl-1 pt-2 text-lg italic">All video formats allowed, maximum of total files is 200GB</p>
                <input id="file"  name="file" accept="video/*" type="file"
                       multiple class="opacity-0 absolute cursor-pointer z-20 h-full w-full top-0 left-0" />
            </label>
            <input class="hidden" type="text" id="userID" name="userID" value="{{ Auth::user()->id}}">
            <input class="hidden" type="text" id="folderPost" name="folderID" value="{{ $currentFolderName->id }}">
        </form>
        <div class="lg:mx-32" id="list-upload-file">
        </div>
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
