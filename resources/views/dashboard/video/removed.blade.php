<div class="rounded-xl">
    <div class="relative rounded-xl">
        <div class="px-2 pt-4 md:p-4">
            <div class="flex justify-between items-center w-full mb-3">
                <div class="text-sm bg-[#142132] rounded-lg p-2">
                    <label for="limit">Show:</label>
                    <select name="limit" class="bg-transparent outline-none"
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
            </div>
            <div id="live"
                 class="tab-content flex flex-col bg-clip-border rounded-xl text-gray-700 bg-transparent">
                @include('dashboard.video.table')
            </div>
        </div>
    </div>
</div>
