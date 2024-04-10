<div id="webupload" class="" file-upload>
    <div class="text-center pb-10">
        <div class="text-start block text-sblockm font-medium leading-6 text-green-400 italic">
            You can upload multiple video files per a session with total sizes up to 100 GB
        </div>
        <hr class="h-px my-6 bg-transparent bg-gradient-to-r from-transparent via-white to-transparent border-none" />
        <form class='lg:mx-32 from-current' method="POST" action="e01.streamsilk.com/uploadapi" onsubmit="uploadFile(event)">
            <label htmlfor="file" class="rounded-xl py-10 bg-slate-900 flex justify-center flex-col h-full w-full relative ">
                <span class='font-semibold text-green-400'>Select Video files to upload</span>
                <p class="pl-1">or drag and drop</p>
                <input id="file"  name="file" accept="video/*" type="file" multiple class="opacity-0 absolute cursor-pointer z-20 h-full w-full top-0 left-0" />
            </label>
            <input class="hidden" type="text" id="userID" name="userID" value="{{\Illuminate\Support\Facades\Auth::user()->id}}">
            <input class="hidden" type="text" id="nameFolderPost" name="nameFolder" value="single videos">
        </form>
        <div id="list-upload">
        </div>
    </div>
    <div class='-mb-12 bg-slate-900 mx-6 rounded-xl'>
        <h3 class='py-4 px-3 dark:text-white font-bold'>Save To <span id="folder">Single Videos( Default Folder)</span></h3>
    </div>
</div>
