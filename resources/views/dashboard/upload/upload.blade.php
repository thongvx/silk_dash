@extends('dashboard.layouts.app')

@section('content')
    <div class="min-h-[calc(100vh-10em)]">
        <div class="flex flex-col" box-lifted>
            <div
                class="tabs tabs-lifted z-10 -mb-[var(--tab-border)] justify-self-start items-start grid-cols-2 grid-rows-2 md:!flex">
                <button
                        class="{{request()->get('tab') === 'webupload' ? 'webupload tab-active !text-[#009FB2]' : 'webupload'}}
                    tab-upload hover:text-[#009FB2] text-white tab-lifted [--tab-border-color:#121520] tab font-bold h-auto text-md px-4 [--tab-bg:#121520] !border-b-0 md:!border-b-1 !rounded-b-lg md:!rounded-b-none before:!hidden md:before:!block"
                        data-content="webupload">
                    <i class="material-symbols-outlined mr-3 py-1">cloud_upload</i>File Upload
                </button>
                <button
                        class="{{request()->get('tab') === 'transfer' ? 'transfer tab-active !text-[#009FB2]' : 'transfer'}}
                    tab-upload hover:text-[#009FB2] text-white tab-lifted [--tab-border-color:#121520] tab font-bold h-auto text-md px-4 [--tab-bg:#121520] !border-b-0 md:!border-b-1 !rounded-b-lg md:!rounded-b-none before:!hidden md:before:!block"
                        data-content="transfer">
                    <i class="material-symbols-outlined mr-3 py-1">link</i>Remote / URL Upload
                </button>
                <button
                        class="{{request()->get('tab') === 'FTP' ? 'FTP tab-active !text-[#009FB2]' : 'FTP'}}
                    tab-upload hover:text-[#009FB2] text-white tab-lifted [--tab-border-color:#121520] tab font-bold h-auto text-md px-4 [--tab-bg:#121520] !border-b-0 md:!border-b-1 !rounded-b-lg md:!rounded-b-none before:!hidden md:before:!block"
                        data-content="FTP">
                    <i class="material-symbols-outlined mr-3 py-1">upload</i>FTP Upload
                </button>
                <button
                        class="{{request()->get('tab') === 'clone' ? 'clone tab-active !text-[#009FB2]' : 'clone'}}
                    tab-upload hover:text-[#009FB2] text-white tab-lifted [--tab-border-color:#121520] tab font-bold h-auto text-md px-4 [--tab-bg:#121520] !border-b-0 md:!border-b-1 !rounded-b-lg md:!rounded-b-none before:!hidden md:before:!block"
                        data-content="clone">
                    <i class="material-symbols-outlined mr-3 py-1">content_copy</i>Clone Upload
                </button>
            </div>
            <div class="mt-3 sm:mt-0 rounded-b-xl rounded-tr-xl relative">
                <div
                        class=""
                        id="box-content" file-upload>
                    @include('dashboard.'.request()->path() . '.' . request()->get('tab'))
                </div>
            </div>
        </div>
    </div>
@endsection

