@extends('dashboard.layouts.app')

@section('content')
    <div class="min-h-[calc(100vh-10em)]">
        <div class="flex flex-col" box-lifted>
            <div class="tabs tabs-lifted z-10 -mb-[var(--tab-border)] justify-self-start items-start grid-cols-2 grid-rows-2 md:!flex">
                <button
                    class="tab-upload webupload tab-lifted [--tab-border-color:#202940] tab text-white font-bold h-auto text-md px-4 [--tab-bg:#202940] !border-b-0 md:!border-b-1 !rounded-b-lg md:!rounded-b-none before:!hidden md:before:!block"
                    data-content="webupload">
                    <i class="material-icons mr-3 py-2">cloud_upload</i>File Upload
                </button>
                <button
                    class="tab-upload transfer tab-lifted [--tab-border-color:#202940] tab text-white font-bold h-auto text-md px-4 [--tab-bg:#202940] my-3 md:my-0 !border-b-0 md:!border-b-1 !rounded-b-lg md:!rounded-b-none before:!hidden md:before:!block"
                    data-content="transfer">
                    <i class="material-icons mr-3 py-2">link</i>Remote / URL Upload
                </button>
                <button
                    class="tab-upload clone tab-lifted [--tab-border-color:#202940] tab text-white font-bold h-auto text-md px-4 [--tab-bg:#202940] !border-b-0 md:!border-b-1 !rounded-b-lg md:!rounded-b-none before:!hidden md:before:!block"
                    data-content="clone">
                    <i class="material-icons mr-3 py-2">content_copy</i>Clone Upload
                </button>
            </div>
            <div class="mt-3 md:mt-0 rounded-b-box rounded-se-box relative">
                <div class="border-[#202940] rounded-b-box rounded-se-box gap-2 bg-[#202940] bg-top p-4 [border-width:var(--tab-border)]" id="box-upload">
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
            <hr class="h-px my-3 bg-transparent bg-gradient-to-r from-transparent via-white to-transparent border-none" />
            <div class="text-center text-emerald-500 font-bold">
                No Active Tasks
            </div>
            <div id="list-upload">
            </div>

        </div>
        <div fixed-folder>
            <!-- -right-90 in loc de 0-->
            <div fixed-folder-card
                 class="opacity-0 hidden bg-black/20 z-50 shadow-3xl w-screen ease fixed top-0 left-0 flex h-full
           min-w-0 flex-col break-words rounded-none border-0 bg-clip-border duration-200 justify-center items-center px-3">
                <div class="absolute h-full w-full fixed-plugin-close-button z-10" fixed-folder-close-button>
                </div>
                <div class="w-11/12 sm:w-4/5 xl:w-2/5 bg-[#202940] z-20 py-4 px-3 rounded-lg relative shadow-lg shadow-slate-900">
                    <div class="absolute right-4 top-3">
                        <button fixed-folder-close-button
                                class="inline-block p-0 text-sm font-bold leading-normal text-center uppercase align-middle transition-all ease-in bg-transparent border-0 rounded-lg shadow-none cursor-pointer hover:-translate-y-px tracking-tight-rem bg-150 bg-x-25 active:opacity-85 dark:text-white text-slate-700">
                            <i class="fa fa-close text-xl"></i>
                        </button>
                    </div>
                    <div class="folder" id="list-folder">
                        <h5 class="mb-0 text-green-400 text-lg font-semibold">Choose folder to move selected to</h5>
                        <div class="mt-3">
                            <div class="grid grid-cols-3 md:flex items-center w-full">
                                <div class="col-span-2 relative flex flex-wrap mr-3 items-stretch transition-all rounded-lg ease">
                                <span
                                    class="text-sm ease leading-5.6 absolute z-10 -ml-px flex h-full items-center whitespace-nowrap rounded-lg rounded-tr-none rounded-br-none border border-r-0 border-transparent bg-transparent py-2 px-2.5 text-center font-normal text-slate-500 transition-all">
                                  <i class="fas fa-search"></i>
                                </span>
                                    <input type="text" onkeyup="searchFolder(this)"
                                           class="pl-9 text-sm focus:shadow-primary-outline ease leading-5.6 relative -ml-px block min-w-0 flex-auto rounded-lg border border-solid border-gray-300 bg-slate-900 text-white bg-clip-padding py-2 pr-3 text-gray-700 transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none focus:transition-shadow"
                                           placeholder="Search folder" />
                                </div>
                                <div class="rounded-lg bg-gradient-to-r from-blue-400 to-green-500 text-white">
                                    <button class="w-max font-semibold text-sm md:text-base	 py-2 px-1.5 md:px-3">
                                        Filter Folders
                                    </button>
                                </div>
                            </div>
                            <div class="grid grid-cols-3 sm:grid-cols-4 lg:grid-cols-6 gap-4 text-white mt-2 min-h-80 max-h-80 overflow-auto">
                                @foreach($folders as $folder)
                                    <div class="item-folder text-center cursor-pointer hover:text-blue-500" folder data-folderid="{{$folder -> id}}">
                                        <div class="text-center">
                                            <i class="material-icons text-3xl">folder</i>
                                        </div>
                                        <h5>
                                            {{$folder -> name_folder}}
                                        </h5>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
