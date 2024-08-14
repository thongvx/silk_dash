<div list-folder
     class="w-full max-w-full px-3 lg:w-3/12 lg:flex-none mb-5 lg:mb-0" id="#list-folder">
    <div class="mb-1">
        <div class="rounded-lg flex justify-between items-center font-bold text-white">
            <h3 class="text-lg">
                My Folders
            </h3>
            <div class="flex items-center text-white hover:text-[#009FB2] cursor-pointer" btn-add-folder>
                <span
                    class="px-2 text-3xl h-full items-center flex material-symbols-outlined cursor-pointer">create_new_folder</span>Add
                Folder
            </div>
        </div>
    </div>
    <div class="bg-[#121520] px-3 rounded-lg">
        <div class="mb-3 pt-4 lg:mt-0">
            <div class="md:ml-auto">
                <div class="flex items-center relative bg-[#142132] w-full rounded-lg ease" search>
                    <label
                        class="p-1 bg-[#142132] flex items-center translate-x-3 transition duration-300 ease-in-out z-10 absolute text-slate-400">Search
                        folder</label>
                    </span>
                    <input type="text" search-input search-folder
                           class="px-3 py-2 text-sm -ml-px block min-w-0 flex-auto rounded-lg text-white bg-transparent bg-clip-padding focus:outline-none
                             border border-solid border-transparent"
                          />
                </div>
            </div>
        </div>
        <div class="max-h-[calc(100vh-30em)] {{ $folders->count() > 7 ? 'overflow-auto': ''}} lg:max-h-[calc(100vh-17em)]">
            <div class="w-full  list-folder">
                @if($currentFolderName -> name_folder != 'root')
                <div folder
                    class="item-folder rounded-lg text-white flex justify-between px-2 py-1.5 mb-2 bg-[#009FB2] from-[#009FB2] to-[#4CBE1F]">
                    <a class="w-full" href="javascript:;" data-folderid="{{$currentFolderName -> id}}" data-limit="{{$videos->perPage()}}">
                        <h5>
                            <span name-folder>{{ $currentFolderName->name_folder }}</span> - {{ $currentFolderName -> number_file }} files
                        </h5>
                    </a>
                    <li class="list-none pl-4">
                        <span class="relative"><a href="javascript:;" dropdown-trigger
                                                  aria-expanded="false" class="flex items-center"><i
                                    class="material-symbols-outlined">more_vert</i></a>
                          <ul dropdown-menu
                              class="text-sm transform-dropdown bg-[#009FB2] before:font-awesome before:leading-default before:duration-350 before:ease
                                             duration-250 before:sm:right-3 before:text-lg after:text-lg pointer-events-none absolute right-0
                                             origin-top list-none rounded-lg  bg-clip-padding text-white z-20 sm:-mr-6
                                             top-12 lg:top-10 before:-top-5  before:content-['▲']
                                             px-2 py-4 text-left opacity-0 transition-all before:absolute after:absolute before:right-3 after:right-3.5 before:left-auto before:z-10
                                             before:font-normal before:text-[#009FB2] after:text-[#009FB2] before:antialiased before:transition-all
                                             lg:absolute lg:right-6 lg:left-auto lg:mt-2 lg:block lg:cursor-pointer">
                            <!-- add show class on dropdown open js -->
                            <li class="relative w-max btn-edit-folder hover:text-[#142132] items-center flex"><i
                                    class="material-symbols-outlined opacity-1 mr-2">edit_square</i>
                                Edit Folder
                            </li>
                            <li class=" mt-3 relative btn-delete-folder hover:text-[#142132] items-center flex"><i
                                    class="material-symbols-outlined opacity-1 mr-2">delete</i>
                                Delete
                            </li>
                          </ul>
                        </span>
                    </li>
                </div>
                @endif
                @foreach($folders as $folder)
                    @if ($folder -> name_folder != $currentFolderName -> name_folder && $folder -> name_folder != 'root')
                        <div folder
                            class="item-folder rounded-lg text-white flex justify-between px-2 py-1.5 mb-2 bg-[#142132] hover:bg-[#009FB2]">
                            <a class="w-full btn-page-folder" href="javascript:;" data-folderid="{{$folder->id}}" data-limit="{{$videos->perPage()}}">
                                <h5><span name-folder>{{$folder -> name_folder}}</span> - {{ $folder -> number_file }} files</h5>
                            </a>
                            <li class="list-none pl-4">
                                <span class="relative">
                                    <a href="javascript:;" class="flex items-center" dropdown-trigger aria-expanded="false"><i
                                            class="material-symbols-outlined">more_vert</i></a>
                                  <ul dropdown-menu
                                      class="text-sm transform-dropdown bg-[#009FB2] before:font-awesome before:leading-default before:duration-350 before:ease
                                             duration-250 before:sm:right-3 before:text-lg after:text-lg pointer-events-none absolute right-0
                                             origin-top list-none rounded-lg  bg-clip-padding text-white z-20 sm:-mr-6
                                             {{ $loop->iteration >= 3 && $loop->iteration >= $loop->last - 3  ? " bottom-12 lg:bottom-12 after:-bottom-5 after:content-['▼']": "  top-12 lg:top-10 before:-top-5  before:content-['▲']"}}
                                             px-2 py-4 text-left opacity-0 transition-all before:absolute after:absolute before:right-3 after:right-3.5 before:left-auto before:z-10
                                             before:font-normal before:text-[#009FB2] after:text-[#009FB2] before:antialiased before:transition-all
                                             lg:absolute lg:right-6 lg:left-auto lg:mt-2 lg:block lg:cursor-pointer">
                                    <!-- add show class on dropdown open js -->
                                    <li class="relative w-max btn-edit-folder cursor-pointer hover:text-[#142132] items-center flex"><i
                                            class="material-symbols-outlined opacity-1 mr-2">edit_square</i>
                                        Edit Folder
                                    </li>
                                    <li class=" mt-3 relative btn-delete-folder cursor-pointer hover:text-[#142132] items-center flex"><i
                                            class="material-symbols-outlined opacity-1 mr-2">delete</i>
                                        Delete
                                    </li>
                                  </ul>
                                </span>
                            </li>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
        <div class="pb-3 text-white">
            <h4>Folder: {{ $folders->reject(function ($folder) { return $folder->name_folder == 'root'; })->count() }}</h4>
        </div>
    </div>
</div>
