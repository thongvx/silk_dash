@extends('dashboard.layouts.app')

@section('content')
    <div id="webupload" class="bg-[#121520] p-4 border-[#121520] rounded-b-xl rounded-tr-xl gap-2 bg-top [border-width:var(--tab-border)] mb-20" web-upload>
        <div class="text-center pb-10">
            <div class="text-start block text-sm font-medium leading-6 text-white italic">
                You can upload multiple video files per a session with total sizes up to 100 GB
            </div>
            <hr class="h-px my-6 bg-transparent bg-gradient-to-r from-transparent via-white to-transparent border-none" />
            <form action="https://e02.encosilk.cc/upload"
                  class="dropzone"
                  id="my-awesome-dropzone">
                <input type="file" name="file"  style="display: none;">
                <input class="hidden" type="text" id="userID" name="userID" value="1">
                <input class="hidden" type="text" id="folderPost" name="folderID" value="1">
            </form>
            <ul id="file-upload-list" class="list-unstyled">

            </ul>
            <div class="lg:mx-32" id="list-upload-file">
            </div>
        </div>
        <div class='-mb-12 bg-slate-900 mx-6 rounded-xl flex justify-between items-center px-3'>
            <h3 class='py-4  dark:text-white font-bold'>Save To <span id="folderName" class="italic text-[#009FB2]">1 ( Default Folder)</span></h3>
            <div class="changefolder text-[#009FB2] font-bold cursor-pointer" change-folder>
                Change Folder
            </div>
        </div>
    </div>
    @vite('resources/js/dropzone/app-dropzone.js')
    @vite('resources/css/dropzone/dropzone.css')

@endsection
