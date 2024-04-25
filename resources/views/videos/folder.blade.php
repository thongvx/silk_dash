<div list-folder
     class="w-full max-w-full px-3 lg:w-3/12 lg:flex-none mb-5 lg:mb-0" id="#list-folder">
    <div class="mb-3">
        <div class="pl-3  rounded-lg flex justify-between items-center font-bold text-white">
            <h3 class="text-lg">
                My Folders
            </h3>
            <div class="flex items-center text-white hover:text-[#009FB2] cursor-pointer" btn-add-folder>
                <span
                    class="px-2 text-3xl h-full px-1 items-center flex material-symbols-outlined cursor-pointer">create_new_folder</span>Add
                Folder
            </div>
        </div>
    </div>
    <div class="mb-3 mt-4 lg:mt-0">
        <div class="md:ml-auto">
            <div class="flex items-center relative bg-[#121520] w-full rounded-lg ease" search>
                <label
                    class="p-1 bg-[#121520] flex items-center translate-x-3 transition duration-300 ease-in-out z-10 absolute text-slate-400">Search
                    folder</label>
                </span>
                <input type="text" onkeyup="searchFolder(this)"
                       class="z-20 px-3 py-2 text-sm relative -ml-px block min-w-0 flex-auto rounded-lg text-white bg-transparent bg-clip-padding text-gray-700 focus:outline-none
                         border border-solid border-[#121520]"
                       onfocus="focused(this)" onfocusout="defocused(this)"/>
            </div>
        </div>

    </div>
    <div class="max-h-[calc(100vh-30em)] lg:max-h-[calc(100vh-14em)]  overflow-scroll">
        <div class="w-full overflow-hidden list-folder ">
            <div folder
                class="item-folder rounded-lg text-white flex justify-between px-2 py-1.5 mb-2 bg-gradient-to-r from-[#009FB2] to-[#4CBE1F]">
                <h5>
                    <span>{{ $currentFolderName -> name_folder }}</span> - {{ $currentFolderName -> number_file }} files
                </h5>
                <li class="list-none">
                                    <span class="relative"><a href="javascript:;" dropdown-trigger
                                                              aria-expanded="false"><i
                                                class="material-symbols-outlined">more_vert</i></a>
                                      <ul dropdown-menu
                                          class="text-sm transform-dropdown bg-[#1a2035] before:font-awesome before:leading-default before:duration-350 before:ease
                                             shadow-lg shadow-slate-900 duration-250 px-5 before:sm:right-1 before:text-5.5 pointer-events-none absolute right-1 top-8 z-10 lg:top-6
                                             origin-top list-none rounded-lg  bg-clip-padding text-white z-10
                                             px-2 py-4 text-left text-slate-500 opacity-0 transition-all before:absolute before:right-0 before:left-auto before:top-0 before:z-10
                                             before:inline-block before:font-normal before:text-[#1a2035] before:antialiased before:transition-all before:text-xl before:content-['▲'] sm:-mr-6                         lg:absolute lg:right-6 lg:left-auto lg:mt-2 lg:block lg:cursor-pointer">
                                        <!-- add show class on dropdown open js -->
                                        <li class="relative w-max"> <i class="material-symbols-outlined opacity-1">edit_square</i> Edit File </li>
                                        <li class="relative"> <i
                                                class="material-symbols-outlined opacity-1">delete</i> Delete </li>
                                      </ul>
                                    </span>
                </li>
            </div>
            @foreach($folders as $folder)
                @if ($folder -> name_folder != $currentFolderName -> name_folder)
                    <div folder
                        class="item-folder rounded-lg text-white flex justify-between px-2 py-1.5 mb-2 bg-[#121520] hover:bg-gradient-to-r from-[#009FB2] to-[#4CBE1F]">
                        <a class="w-full btn-page-folder" href="javascript:;" data-folderid="{{$folder->id}}" data-limit="{{$videos->perPage()}}">
                            <h5><span>{{$folder -> name_folder}}</span> - {{ $folder -> number_file }} files</h5>
                        </a>
                        <li class="list-none">
                                    <span class="relative"><a href="javascript:;" dropdown-trigger
                                                              aria-expanded="false"><i
                                                class="material-symbols-outlined">more_vert</i></a>
                                      <ul dropdown-menu
                                          class="text-sm transform-dropdown bg-[#1a2035] before:font-awesome before:leading-default before:duration-350 before:ease
                                             shadow-lg shadow-slate-900 duration-250 px-5 before:sm:right-1 before:text-5.5 pointer-events-none absolute right-1 top-8 z-10 lg:top-6
                                             origin-top list-none rounded-lg  bg-clip-padding text-white z-10
                                             px-2 py-4 text-left text-slate-500 opacity-0 transition-all before:absolute before:right-0 before:left-auto before:top-0 before:z-10
                                             before:inline-block before:font-normal before:text-[#1a2035] before:antialiased before:transition-all before:text-xl before:content-['▲'] sm:-mr-6                         lg:absolute lg:right-6 lg:left-auto lg:mt-2 lg:block lg:cursor-pointer">
                                        <!-- add show class on dropdown open js -->
                                        <li class="relative w-max"> <i class="material-symbols-outlined opacity-1">edit_square</i> Edit File </li>
                                        <li class="relative"> <i
                                                class="material-symbols-outlined opacity-1">delete</i> Delete </li>
                                      </ul>
                                    </span>
                        </li>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</div>
