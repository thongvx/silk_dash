<div class="flex justify-between items-center w-full mb-3">
    <div class="mb-2" id='title'>
        <h5 class="items-center text-transparent flex bg-clip-text bg-gradient-to-r from-purple-500 to-pink-500">
            <span>Create New Ticket</span>
        </h5>
    </div>
    <div class="text-white">
        <button
            class="tab-lifted text-white tab-lifted  bg-[#142132] rounded-lg hover:bg-[#009FB2] cursor-pointer px-2  items-center flex"
            data-content="ticket">
            <span class="px-2 py-1">All Ticket</span>
        </button>
    </div>
</div>
<div class="px-0 pt-0 overflow-auto max-h-[calc(100vh-20em)] mt-3">
    <form action="" id="ticket-form" class="text-white">
        @csrf
        <div class="flex flex-col">
            <label for="topic" class="mb-2">Topic *</label>
            <select id="topic" name="topic" class="h-max outline-none bg-[#142132] px-3 py-2 rounded-lg hover:bg-[#00424a] text-sm">
                <option value="Upload" selected>Upload</option>
                <option value="Video Manage">Video Manage</option>
                <option value="Player Setting">Player Setting</option>
                <option value="Advertisement">Advertisement</option>
                <option value="Other">Other</option>
            </select>
        </div>
        <div class="mt-6">
            <label for="Subject">
                Subject *
            </label>
            <div class="mt-2 text-white rounded-lg flex items-center px-2 hover:bg-[#00424a] bg-[#142132]/70">
                <input type="text" id="Subject" name="subject" value=""
                       class="py-1.5 bg-transparent text-white placeholder:text-gray-400/80 placeholder:font-normal w-full mx-1 pl-2 appearance-none outline-none autofill:bg-yellow-200"
                       placeholder="Subject">
            </div>
        </div>
        <div class="mt-6">
            <label for="Message">
                Message *
            </label>
            <div class="mt-2 text-white rounded-lg flex items-center hover:bg-[#00424a] bg-[#142132]/70">
                <textarea rows="8" name="message" id="Message" placeholder="Message"
                    class="py-1.5 bg-transparent text-white placeholder:text-gray-400/80 placeholder:font-normal w-full mx-1 pl-2 appearance-none outline-none autofill:bg-yellow-200"
                ></textarea>
            </div>
        </div>
        <div class="flex my-6 justify-between">
            <div class="bg-[#142132] rounded-lg text-center flex relative h-max box-img">
                <input name="file-attach" type="file" id="file-attach" accept=".jpg, .png, .jpeg"
                       class="absolute opacity-0 file-img cursor-pointer w-full">
                <label for="file-attach" class="w-full px-10 py-2">Choose file</label>
            </div>
            <div class="text-center">
                <button type="submit" class="px-10 py-2 rounded-lg bg-[#142132] text-white" disabled>Save</button>
            </div>
        </div>
    </form>
</div>
