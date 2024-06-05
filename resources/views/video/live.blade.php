<div class="rounded-xl">
    <div class="relative rounded-xl">
        <div class="px-2 pt-4 md:p-4">
            <div class="mb-2" id='title'>
                <h5 class="items-center text-white flex">
                    <i class="material-symbols-outlined cursor-pointer btn-folder-root hover:text-[#009FB2]" data-folderid="{{$folders->last()->id}}">folder</i>
                    <span class="flex items-center {{$currentFolderName -> name_folder == 'root' ? 'hidden' : ''}}" id="currentFolderName">
                        <i class="material-symbols-outlined">navigate_next</i>{{ $currentFolderName -> name_folder }}
                    </span>
                </h5>
            </div>
            <div class="flex justify-between items-center w-full mb-3">
                <div class="text-sm bg-[#142132] rounded-lg p-2">
                    <label for="limit">Show:</label>
                    <select name="limit" class="bg-transparent outline-transparent outline-none"
                            id="limit">
                        <option value="10"
                                class="limit" {{ $videos->perPage() == 10 ? 'selected' : '' }}>
                            10
                        </option>
                        <option value="20"
                                class="limit" {{ $videos->perPage() == 20 ? 'selected' : '' }}>
                            20
                        </option>
                        <option value="50"
                                class="limit" {{ $videos->perPage() == 50 ? 'selected' : '' }}>
                            50
                        </option>
                        <option value="100"
                                class="limit" {{ $videos->perPage() == 100 ? 'selected' : '' }}>
                            100
                        </option>
                    </select>
                    <span>entries</span>
                </div>
                <div class="flex ">
                    <button type="button" class="hover:bg-[#009FB2] rounded-lg flex items-center px-1.5 {{ request() -> get('poster') ? 'bg-[#009FB2]' : 'bg-[#142132]' }}"
                            title="poster"  btn-poster>
                        {!!
                            request() -> get('poster')
                            ? '<i class="material-symbols-outlined opacity-1 text-xl mr-1">visibility_off</i><span class="hidden sm:block">hide poster</span>'
                            : '<i class="material-symbols-outlined opacity-1 text-xl mr-1">visibility</i><span class="hidden sm:block">show poster</span>'
                        !!}
                    </button>
                    <button type="button" btn-video disabled class="cursor-not-allowed px-2"
                            title="delete">
                        <i btn-delete class="material-symbols-outlined opacity-1 text-3xl">delete</i>
                    </button>
                    <button type="button" btn-video disabled class="cursor-not-allowed px-2"
                            title="export">
                        <i btn-export
                           class="material-symbols-outlined opacity-1 text-3xl">ios_share</i>
                    </button>
                    <button type="button" btn-video disabled class="cursor-not-allowed px-2"
                            title="folder">
                        <i btn-move
                           class="material-symbols-outlined opacity-1 text-3xl">folder_open</i>
                    </button>
                </div>
            </div>
            <div id="live"
                 class="tab-content flex flex-col bg-clip-border rounded-xl text-gray-700 bg-transparent">
                @include('video.table')
            </div>
        </div>
    </div>
</div>
