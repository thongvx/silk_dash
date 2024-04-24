@extends('layouts.app')

@section('content')
    <div class="min-h-[calc(100vh-10em)]">
        <div class="flex flex-col" box-lifted data-page="upload">
            <div
                class="tabs tabs-lifted z-10 -mb-[var(--tab-border)] justify-self-start items-start !flex flex-col md:flex-row">
                <button
                    class="tab-upload webupload hover:text-[#009FB2] tab-lifted [--tab-border-color:#121520] tab text-white font-bold h-auto text-md px-4 [--tab-bg:#121520] !border-b-0 md:!border-b-1 !rounded-b-lg md:!rounded-b-none before:!hidden md:before:!block"
                    data-content="webupload">
                    <i class="material-symbols-outlined mr-3 py-2">cloud_upload</i>File Upload
                </button>
                <button
                    class="tab-upload transfer hover:text-[#009FB2] tab-lifted [--tab-border-color:#121520] tab text-white font-bold h-auto text-md px-4 [--tab-bg:#121520] !border-b-0 md:!border-b-1 !rounded-b-lg md:!rounded-b-none before:!hidden md:before:!block"
                    data-content="transfer">
                    <i class="material-symbols-outlined mr-3 py-2">link</i>Remote / URL Upload
                </button>
                <button
                    class="tab-upload clone hover:text-[#009FB2] tab-lifted [--tab-border-color:#121520] tab text-white font-bold h-auto text-md px-4 [--tab-bg:#121520] !border-b-0 md:!border-b-1 !rounded-b-lg md:!rounded-b-none before:!hidden md:before:!block"
                    data-content="clone">
                    <i class="material-symbols-outlined mr-3 py-2">content_copy</i>Clone Upload
                </button>
            </div>
            <div class="mt-3 sm:mt-0 rounded-b-box rounded-se-box relative">
                <div
                    class=""
                    id="box-content" file-upload>
                </div>
            </div>
        </div>
    </div>
    @include('upload.folder')
@endsection
