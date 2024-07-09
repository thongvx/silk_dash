<div id="webupload" class="bg-[#121520] p-4 border-[#121520] rounded-b-xl rounded-tr-xl gap-2 bg-top [border-width:var(--tab-border)]" web-upload>
    <div class="text-center pb-10">
        <div class="text-start block text-sm font-medium leading-6 text-white italic">
            You can upload multiple video files per a session with total sizes up to 100 GB
        </div>
        <hr class="h-px my-6 bg-transparent bg-gradient-to-r from-transparent via-white to-transparent border-none" />
        <form class='lg:mx-32 from-current' method="POST" id="form-upload-file" action="https://e01.encosilk.cc/upload"
              enctype="multipart/form-data">
            @csrf
            <label htmlfor="file" class="rounded-xl py-10 text-[#009FB2] hover:text-white bg-[#142132] hover:bg-[#009FB2] flex justify-center flex-col h-full w-full relative ">
                <span class='font-semibold'>Select Video files to upload</span>
                <p class="pl-1">or drag and drop</p>
                <input id="file"  name="file" accept="video/*" type="file"
                       multiple class="opacity-0 absolute cursor-pointer z-20 h-full w-full top-0 left-0" />
            </label>
            <input class="hidden" type="text" id="userID" name="userID" value="{{ Auth::user()->id}}">
            <input class="hidden" type="text" id="folderPost" name="folderID" value="{{ $currentFolderName-> id }}">
        </form>
        <div class="lg:mx-32" id="list-upload-file">
        </div>
    </div>
    <div class='-mb-12 bg-slate-900 mx-6 rounded-xl flex justify-between items-center px-3'>
        <h3 class='py-4  dark:text-white font-bold'>Save To <span id="folderName" class="italic text-[#009FB2]">{{ $currentFolderName-> name_folder }}( Default Folder)</span></h3>
        <div class="changefolder text-[#009FB2] font-bold cursor-pointer" change-folder>
            Change Folder
        </div>
    </div>
</div>
