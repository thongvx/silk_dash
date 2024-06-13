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
        </div>
        <div
            class="flex flex-col bg-clip-border rounded-xl text-gray-700 bg-transparent">
            <div class="px-0 pt-0 h-[calc(100vh-21em)]" id="box-datatable">
                @include('admin.user.table')
            </div>
        </div>
    </div>
</div>

