<div fixed-video>
    <!-- -right-90 in loc de 0-->
    <div fixed-video-card
         class="opacity-0 hidden bg-black/20 z-50 shadow-3xl w-screen ease fixed top-0 left-0 flex h-full  backdrop-blur-sm
           min-w-0 flex-col break-words rounded-none border-0 bg-clip-border duration-200 justify-center items-center px-3" id="fixed-video">
        <div class="absolute h-full w-full fixed-plugin-close-button z-10" fixed-video-close-button>
        </div>
        <div
            class="w-11/12 sm:w-4/5 xl:w-2/5 bg-[#121520] z-20 py-4 px-3 rounded-lg relative shadow-lg shadow-slate-900">
            <div class="absolute right-4 top-3">
                <button fixed-video-close-button
                        class="inline-block p-0 text-sm font-bold leading-normal text-center uppercase align-middle transition-all ease-in bg-transparent border-0 rounded-lg shadow-none cursor-pointer hover:-translate-y-px tracking-tight-rem bg-150 bg-x-25 active:opacity-85 dark:text-white text-slate-700">
                    <i class="material-symbols-outlined text-3xl">close</i>
                </button>
            </div>
            <div>
                <div class="edit hidden" id="edit">
                    <h5 class="mb-0 text-[#009FB2] text-lg font-semibold">Edit file details</h5>

                </div>
                <div class="export hidden" id="export">
                    <h5 class="mb-0 text-[#009FB2] text-lg font-semibold">Files Export</h5>
                    <div class="grid mt-3" box-lifted>
                        <div
                            class="tabs tabs-lifted z-10 -mb-[var(--tab-border)] justify-self-start flex flex-col items-start md:grid">
                            <button
                                class="tab-export EmbedLink [--tab-border-color:#142132] tab !text-[#009FB2] text-white font-bold h-auto text-md px-4 tab-active [--tab-bg:#142132] !border-b-0 md:!border-b-1 !rounded-b-lg md:!rounded-b-none before:!hidden md:before:!block"
                                data-content="EmbedLink">
                                EmbedLink
                            </button>
                            <button
                                class="tab-export Embedcode [--tab-border-color:#142132] tab text-white font-bold h-auto text-md px-4 [--tab-bg:#142132] my-3 md:my-0 !border-b-0 md:!border-b-1 !rounded-b-lg md:!rounded-b-none before:!hidden md:before:~block"
                                data-content="Embedcode">
                                Embedcode
                            </button>
                            <button
                                class="tab-export Download [--tab-border-color:#142132] tab text-white font-bold h-auto text-md px-4 [--tab-bg:#142132] !border-b-0 md:!border-b-1 !rounded-b-lg md:!rounded-b-none before:!hidden md:before:~block"
                                data-content="Download">
                                Download Link
                            </button>
                        </div>
                        <div class="mt-3 md:mt-0 rounded-b-box rounded-se-box relative">
                            <div
                                class="border-[#142132] rounded-b-box rounded-se-box gap-2 bg-[#142132] bg-top py-4 pl-4 [border-width:var(--tab-border)] undefined">
                                <div id="EmbedLink" class="tab-content-export">
                                    <textarea class="bg-transparent w-full h-[calc(40vh)] text-white max-h-96 overflow-auto"></textarea>
                                </div>
                                <div id="Embedcode" class="tab-content-export hidden">
                                    <textarea class="bg-transparent w-full h-[calc(40vh)] text-white max-h-96 overflow-auto"> </textarea>
                                </div>
                                <div id="Download" class="tab-content-export hidden">
                                    <textarea class="bg-transparent w-full h-[calc(40vh)] text-white max-h-96 overflow-auto"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="delete hidden" id="delete">
                    <form action="">
                        <h5 class="text-center text-white text-lg">Are you sure you want to remove the selected video?</h5>
                        <input type="text" class="hidden" name="videoid-remove" value="">
                        <div class="flex justify-center mt-3 text-white ">
                            <button type="button" class="px-7 py-1.5 rounded-lg bg-gray-400 hover:bg-gray-600 mr-4" fixed-video-close-button>Cancel</button>
                            <button type="submit" class="px-7 py-1.5 rounded-lg bg-rose-400 hover:bg-rose-600">Delete</button>
                        </div>
                    </form>
                </div>
                <div class="move hidden" id="move">
                    <h5 class="mb-0 text-[#009FB2] text-lg font-semibold">Choose folder to move selected to</h5>
                    <div class="mt-3" list-folder>
                        <div class="items-center w-full">
                            <div
                                class="relative flex flex-wrap mr-3 items-stretch transition-all rounded-lg ease">
                                <span
                                    class="text-sm ease leading-5.6 absolute z-10 -ml-px flex h-full items-center whitespace-nowrap rounded-lg rounded-tr-none rounded-br-none border border-r-0 border-transparent bg-transparent py-2 px-2.5 text-center font-normal text-slate-500 transition-all">
                                  <i class="fa fa-search"></i>
                                </span>
                                <input type="text" onkeyup="searchFolder(this)"
                                       class="pl-9 text-sm focus:shadow-primary-outline ease leading-5.6 relative -ml-px block min-w-0 flex-auto rounded-lg bg-[#142132] text-white bg-clip-padding py-2 pr-3 text-gray-700 transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none focus:transition-shadow"
                                       placeholder="Search folder"/>
                            </div>
                        </div>
                        <div
                            class="grid grid-cols-3 sm:grid-cols-4 lg:grid-cols-6 gap-4 text-white mt-2 min-h-80 max-h-80 overflow-auto">
                            @foreach($folders as $folder)
                                <div  folder data-folder-id="{{$folder -> id}}" class="item-folder text-center cursor-pointer hover:text-transparent bg-clip-text from-violet-500 to-fuchsia-500">
                                    <div class="text-center">
                                        <i class="material-symbols-outlined text-3xl">folder</i>
                                    </div>
                                    <h5 name-folder>
                                        {{$folder -> name_folder}}
                                    </h5>
                                </div>
                            @endforeach
                        </div>
                        <div class="pt-2 w-max text-white">
                            <button move-to-folder
                                class="bg-[#142132] rounded-lg hover:bg-gradient-to-r from-yellow-600 to-rose-400 w-max font-semibold text-md py-2.5 px-5">
                                Move To Folder
                            </button>
                        </div>
                    </div>
                </div>
                <div class="add-folder hidden" id="add-folder">
                    <h5 class="mb-0 text-[#009FB2] text-lg font-semibold">Edit file details</h5>
                    <form class="text-white mt-3">
                        <div class="grid grid-cols-3 gap-4 items-center">
                            <h5>
                                Folder name
                            </h5>
                            <div class="col-span-2 pr-2">
                                <input type="text" class="pl-2 text-sm w-full focus:shadow-primary-outline ease leading-5.6 relative -ml-px block min-w-0 flex-auto rounded-lg
                       bg-[#142132] text-white bg-clip-padding py-2 pr-3 text-gray-700 transition-all placeholder:text-gray-500
                       focus:border-blue-500 focus:outline-none focus:transition-shadow" placeholder="title"/>
                            </div>
                        </div>
                        <button type="submit" class="mt-2 px-5 py-1.5 rounded-lg bg-[#142132] hover:bg-[#009FB2]">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
