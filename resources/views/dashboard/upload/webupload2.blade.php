<div id="webupload" class="bg-[#121520] p-4 border-[#121520] rounded-b-xl rounded-tr-xl gap-2 bg-top [border-width:var(--tab-border)]" web-upload>
    <div class="text-center pb-10">
        <div class="text-start block text-sm font-medium leading-6 text-white italic">
            You can upload multiple video files per a session with total sizes up to 100 GB
        </div>
        <hr class="h-px my-6 bg-transparent bg-gradient-to-r from-transparent via-white to-transparent border-none" />
        <div id="box-upload-file" class="cursor-pointer rounded-xl text-[#009FB2] hover:text-white bg-[#142132] hover:bg-[#009FB2] flex justify-center flex-col h-full w-full relative ">
            <div id="resumable-drop" class="py-10">
                <span class='font-semibold'>Select Video files to upload</span>
                <p class="pl-1">or drag and drop</p>
            </div>
            <input type="file" id="resumable-browse" multiple data-url="https://e02.encosilk.cc/upload"
                   class="absolute w-full h-full opacity-0 cursor-pointer rounded-xl">
            <input class="hidden" type="text" id="userID" name="userID" value="{{ Auth::user()->id}}">
            <input class="hidden" type="text" id="folderPost" name="folderID" value="{{ $currentFolderName-> id }}">
        </div>
        <ul id="file-upload-list"></ul>
    </div>
    <div class='-mb-12 bg-slate-900 mx-6 rounded-xl flex justify-between items-center px-3'>
        <h3 class='py-4  dark:text-white font-bold'>Save To <span id="folderName" class="italic text-[#009FB2]">{{ $currentFolderName-> name_folder }}( Default Folder)</span></h3>
        <div class="changefolder text-[#009FB2] font-bold cursor-pointer" change-folder>
            Change Folder
        </div>
    </div>
</div>
@section('scripts')
    <script src="{{ asset('assets/js/resumable/lb-resumable.js') }}"></script>
    @vite('resources/js/resumable/resumable.js')
@endsection
