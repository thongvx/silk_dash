<div class="mb-2 text-green-400" id='title'>
    <h5 class="">
        Ticket
    </h5>
</div>
<div class="flex justify-between items-center w-full mb-3">
    <div class="text-sm rounded-lg p-2">
        <label for="limit">Show:</label>
        <select name="limit" class="bg-transparent outline-transparent"
                id="limit">
            <option value="10"
                    class="limit" >
                10
            </option>
            <option value="20"
                    class="limit">
                20
            </option>
            <option value="50"
                    class="limit">
                50
            </option>
            <option value="100"
                    class="limit">
                100
            </option>
        </select>
        <span>entries</span>
    </div>
    <div class="grid grid-cols-3 grid-flow-col gap-2">
        <button type="button" btn-video disabled class="cursor-not-allowed"
                title="delete">
            <i btn-delete class="material-symbols-outlined opacity-1 text-3xl">delete</i>
        </button>
        <button type="button" btn-video disabled class="cursor-not-allowed"
                title="export">
            <i btn-export
               class="material-symbols-outlined opacity-1 text-3xl">ios_share</i>
        </button>
        <button type="button" btn-video disabled class="cursor-not-allowed"
                title="folder">
            <i btn-move
               class="material-symbols-outlined opacity-1 text-3xl">folder_open</i>
        </button>
    </div>
</div>
