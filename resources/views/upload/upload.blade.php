@extends('layouts.app')

@section('content')
    <div class="min-h-[calc(100vh-10em)]">
        <div class="flex flex-col" box-lifted data-page="upload">
            <div
                class="tabs tabs-lifted z-10 -mb-[var(--tab-border)] justify-self-start items-start md:!flex">
                <button
                    class="tab-upload webupload hover:text-[#009FB2] tab-lifted [--tab-border-color:#202940] tab text-white font-bold h-auto text-md px-4 [--tab-bg:#121520] !border-b-0 md:!border-b-1 !rounded-b-lg md:!rounded-b-none before:!hidden md:before:!block"
                    data-content="webupload">
                    <i class="material-icons mr-3 py-2">cloud_upload</i>File Upload
                </button>
                <button
                    class="tab-upload transfer hover:text-[#009FB2] tab-lifted [--tab-border-color:#202940] tab text-white font-bold h-auto text-md px-4 [--tab-bg:#121520] !border-b-0 md:!border-b-1 !rounded-b-lg md:!rounded-b-none before:!hidden md:before:!block"
                    data-content="transfer">
                    <i class="material-icons mr-3 py-2">link</i>Remote / URL Upload
                </button>
                <button
                    class="tab-upload clone hover:text-[#009FB2] tab-lifted [--tab-border-color:#202940] tab text-white font-bold h-auto text-md px-4 [--tab-bg:#121520] !border-b-0 md:!border-b-1 !rounded-b-lg md:!rounded-b-none before:!hidden md:before:!block"
                    data-content="clone">
                    <i class="material-icons mr-3 py-2">content_copy</i>Clone Upload
                </button>
            </div>
            <div class="mt-3 md:mt-0 rounded-b-box rounded-se-box relative">
                <div
                    class="border-[#202940] rounded-b-box rounded-se-box gap-2 bg-[#121520] bg-top p-4 [border-width:var(--tab-border)]"
                    id="box-content" file-upload>
                </div>
            </div>
        </div>
        <div class="mt-10 bg-[#202940] rounded-xl py-3" id="box-list-upload">
            <div class="text-white pl-3 pt-3 flex justify-between items-center">
                <div class=" text-lg font-bold ">Transfer</div>
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

    </div>
    @include('upload.folder')
@endsection