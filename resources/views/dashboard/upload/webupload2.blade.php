<div id="webupload" class="pt-10 bg-[#121520] p-4 border-[#121520] rounded-b-xl rounded-tr-xl gap-2 bg-top [border-width:var(--tab-border)]" web-upload>
    <div class="text-center pb-10">
        <div class="lg:mx-32 ">
            <div id="box-upload-file" class="cursor-pointer rounded-xl text-orange-600  hover:text-white bg-[#142132] hover:bg-[#009FB2] flex justify-center flex-col h-full w-full relative ">
                <div id="resumable-drop" class="py-10">
                    <span class='font-semibold text-white text-xl'>Drag & drop here or browse</span>
                    <p class="pl-1 pt-2 text-lg italic">All video formats allowed, maximum of total files is 200GB</p>
                </div>
                <input type="file" id="resumable-browse" multiple data-url="https://e02.encosilk.cc/upload"
                       class="absolute w-full h-full opacity-0 cursor-pointer rounded-xl">
                <input class="hidden" type="text" id="userID" name="userID" value="{{ Auth::user()->id}}">
                <input class="hidden" type="text" id="folderPost" name="folderID" value="{{ $currentFolderName-> id }}">
            </div>
        </div>
        <ul id="file-upload-list"></ul>
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
@section('scripts')
    <script src="{{ asset('assets/js/resumable/lb-resumable.js') }}"></script>
    @vite('resources/js/resumable/resumable.js')
@endsection
