<div fixed-folder>
    <!-- -right-90 in loc de 0-->
    <div fixed-folder-card
         class="opacity-0 hidden bg-black/10 z-50 shadow-3xl w-screen ease fixed top-0 left-0 flex h-full backdrop-blur-sm
           min-w-0 flex-col break-words rounded-none border-0 bg-clip-border duration-200 justify-center items-center px-3">
        <div class="absolute h-full w-full fixed-plugin-close-button z-10" fixed-folder-close-button>
        </div>
        <div class="w-11/12 sm:w-4/5 xl:w-2/5 bg-[#121520] z-20 py-4 px-3 rounded-lg relative shadow-lg shadow-slate-900">
            <div class="absolute right-4 top-3">
                <button fixed-folder-close-button
                        class="inline-block p-0 text-sm font-bold leading-normal text-center uppercase align-middle transition-all ease-in bg-transparent border-0 rounded-lg shadow-none cursor-pointer hover:-translate-y-px tracking-tight-rem bg-150 bg-x-25 active:opacity-85 dark:text-white text-slate-700">
                    <i class="fa fa-close text-xl"></i>
                </button>
            </div>
            <div class="folder" id="list-folder">
                <h5 class="mb-0 text-green-400 text-lg font-semibold">Choose folder to move selected to</h5>
                <div class="mt-3" list-folder>
                    <div class="grid grid-cols-3 md:flex items-center w-full">
                        <div class="col-span-2 relative flex flex-wrap mr-3 items-stretch transition-all rounded-lg ease">
                                <span
                                    class="text-sm ease leading-5.6 absolute z-10 -ml-px flex h-full items-center whitespace-nowrap rounded-lg rounded-tr-none rounded-br-none border border-r-0 border-transparent bg-transparent py-2 px-2.5 text-center font-normal text-slate-500 transition-all">
                                  <i class="fas fa-search"></i>
                                </span>
                            <input type="text" search-folder
                                   class="pl-9 text-sm focus:shadow-primary-outline ease leading-5.6 relative -ml-px block min-w-0 flex-auto rounded-lg border border-solid border-gray-300 bg-slate-900 text-white bg-clip-padding py-2 pr-3 text-gray-700 transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none focus:transition-shadow"
                                   placeholder="Search folder" />
                        </div>
                        <div class="rounded-lg bg-gradient-to-r from-blue-400 to-green-500 text-white">
                            <button class="w-max font-semibold text-sm md:text-base	 py-2 px-1.5 md:px-3">
                                Filter Folders
                            </button>
                        </div>
                    </div>
                    <div
                        class="grid grid-cols-3 sm:grid-cols-4 lg:grid-cols-6 gap-4 text-white mt-2 min-h-80 max-h-80 overflow-auto">
                        @foreach($folders as $folder)
                            <div  folder data-folderid="{{$folder -> id}}" class="item-folder text-center cursor-pointer hover:text-transparent hover:bg-gradient-to-r bg-clip-text from-violet-500 to-fuchsia-500">
                                <div class="text-center">
                                    <i class="material-symbols-outlined text-3xl">folder</i>
                                </div>
                                <h5 name-folder>
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
