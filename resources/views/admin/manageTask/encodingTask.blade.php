<div class="px-0 pt-0">
    <div class="relative rounded-xl bg-[#121520]" id="manage-task">
        <div class="pt-4 md:p-4">
            <div class="mb-2 flex justify-between">
                <h5 class="text-white" id="total-encoder">
                    Encoder: {{ $encoders->total() }}
                </h5>
                <div class="text-sm">
                    <button btn-encoder-task id="all" class="px-4 py-1 rounded-lg text-white hover:bg-[#009FB2] ml-2
                {{ request()->get('status') == 'all' || !request()->get('status') ? 'bg-[#009FB2]' : 'bg-[#142132]' }}" data-task="all">
                        <a href="javascript:;">All Task</a>
                    </button>
                    <button btn-encoder-task id="pending" class="px-4 py-1 rounded-lg text-white hover:bg-gray-500 ml-2
                {{ request()->get('status') == 'pending' ? 'bg-gray-500' : 'bg-[#142132]' }}" data-task="pending">
                        <a href="javascript:;">Pending Task</a>
                    </button>
                    <button btn-encoder-task id="encoding" class="px-4 py-1 rounded-lg text-white hover:bg-orange-500 ml-2
                {{ request()->get('status') == 'encoding' ? 'bg-orange-500' : 'bg-[#142132]' }}" data-task="encoding">
                        <a href="javascript:;">Encoding Task</a>
                    </button>
                    <button btn-encoder-task id="completed" class="px-4 py-1 rounded-lg text-white hover:bg-emerald-500 ml-2
                {{ request()->get('status') == 'completed' ? 'bg-emerald-500' : 'bg-[#142132]' }}" data-task="completed">
                        <a href="javascript:;">Completed Task</a>
                    </button>
                    <button btn-encoder-task id="failed" class="px-4 py-1 rounded-lg text-white hover:bg-rose-600
                {{ request()->get('status') == 'failed' ? 'bg-rose-600' : 'bg-[#142132]' }}" data-task="failed">
                        <a href="javascript:;">Failed Task</a>
                    </button>
                </div>
            </div>
            <div class="flex justify-between items-center w-full mb-3">
                <div class="text-sm bg-[#142132] rounded-lg p-2">
                    <label for="limit">Show:</label>
                    <select name="limit" class="bg-transparent outline-none"
                            id="limit">
                        <option value="20"
                                class="limit" {{ $encoders->perPage() == 20 ? 'selected' : '' }}>
                            20
                        </option>
                        <option value="50"
                                class="limit" {{ $encoders->perPage() == 50 ? 'selected' : '' }}>
                            50
                        </option>
                        <option value="100"
                                class="limit" {{ $encoders->perPage() == 100 ? 'selected' : '' }}>
                            100
                        </option>
                    </select>
                    <span>entries</span>
                </div>
                <div class="items-center md:ml-auto px-2 flex">
                    <form class="flex items-center relative bg-[#142132] w-full rounded-lg ease" id="form-search-encoder" search>
                        <label for="search-encoder" class="p-1 flex bg-[#142132] items-center translate-x-3 transition duration-300 ease-in-out z-30 absolute text-slate-400">Search Encoder</label>
                        <input type="text" id="search-encoder" name="videoID" value="" search-user
                               class="z-20 px-3 py-2 text-sm relative -ml-px block min-w-0 lg:w-52 flex-auto text-white rounded-lg bg-transparent bg-clip-padding focus:outline-none
                         border border-solid border-[#142132]"
                        />
                        <input type="submit" value="Search" class="hidden" />
                    </form>
                </div>
            </div>
            <div
                class="flex flex-col bg-clip-border rounded-xl text-gray-700 bg-transparent">
                <div  class="px-0 pt-0 h-[calc(100vh-21em)]" id="box-datatable">
                    @include('admin.manageTask.tableEncoder')

                </div>
            </div>
        </div>
    </div>
</div>

