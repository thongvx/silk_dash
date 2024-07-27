<div class="relative rounded-xl bg-[#121520]">
    <div class="pt-4 md:p-4">
        <div class="mb-2">
            <h5 class="text-white">
                User: {{ $users->total() }}
            </h5>
        </div>
        <div class="flex justify-between items-center w-full mb-3">
            <div class="text-sm bg-[#142132] rounded-lg p-2">
                <label for="limit">Show:</label>
                <select name="limit" class="bg-transparent outline-none"
                        id="limit">
                    <option value="20"
                            class="limit" {{ $users->perPage() == 20 ? 'selected' : '' }}>
                        20
                    </option>
                    <option value="50"
                            class="limit" {{ $users->perPage() == 50 ? 'selected' : '' }}>
                        50
                    </option>
                    <option value="100"
                            class="limit" {{ $users->perPage() == 100 ? 'selected' : '' }}>
                        100
                    </option>
                </select>
                <span>entries</span>
            </div>
            <div class="items-center md:ml-auto px-2 flex">
                <form class="flex items-center relative bg-[#142132] w-full rounded-lg ease" id="form-search-user" search>
                    <label for="search-user" class="p-1 flex bg-[#142132] items-center translate-x-3 transition duration-300 ease-in-out z-30 absolute text-slate-400">Search User</label>
                    <input type="text" id="search-user" name="videoID" value="" search-user
                           class="z-20 px-3 py-2 text-sm relative -ml-px block min-w-0 lg:w-52 flex-auto text-white rounded-lg bg-transparent bg-clip-padding focus:outline-none
                         border border-solid border-[#142132]"
                    />
                    <input type="submit" value="Search" class="hidden" />
                </form>
            </div>
        </div>
        <div
            class="flex flex-col bg-clip-border rounded-xl text-gray-700 bg-transparent">
            <div class="px-0 pt-0 h-[calc(100vh-21em)]" id="box-datatable">
                @include('admin.user.table')
            </div>
        </div>
    </div>
</div>

