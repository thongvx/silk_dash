<div id="transfer" class="bg-[#121520] p-4 border-[#121520] rounded-b-box rounded-se-box gap-2 bg-top [border-width:var(--tab-border)]" transfer_link>
    <div class="col-span-full text-center">
        <div class="noti text-white italic">
            <h4 class="mb-3">Click the button below to create your FTP account</h4>
            <button class="rounded-lg bg-[#142132] hover:bg-[#009FB2] px-6 py-1" create-ftp>Create Account</button>
        </div>
        <hr class="h-px my-6 bg-transparent bg-gradient-to-r from-transparent via-white to-transparent border-none" />
    </div>
    <div class="box-ftp hidden">
        <div class="noti text-white italic">
            <h4 class="mb-3">FPT Account</h4>
        </div>
        <form action="" class="text-white">
            <div class="grid grid-cols-4 gap-4 items-center">
                <label for="name-ftp" class="col-span-1 text-end">
                    User Name
                </label>
                <div class="text-white col-span-3 md:col-span-2 rounded-lg flex items-center backdrop-blur-3xl hover:bg-[#142132] bg-[#142132]/60">
                    <input type="text" name="name" id="name-ftp" value=""
                           class="py-2 bg-transparent text-white placeholder:text-gray-400/80 placeholder:font-normal w-full mx-1 pl-2 appearance-none outline-none"
                           placeholder="name">
                </div>
            </div>
            <div class="grid grid-cols-4 gap-4 items-center mt-6">
                <label for="pass-ftp" class="col-span-1 text-end">
                    Password
                </label>
                <div class="text-white col-span-3 md:col-span-2 rounded-lg flex items-center backdrop-blur-3xl hover:bg-[#142132] bg-[#142132]/60">
                    <input type="password" name="password" id="pass-ftp" value=""
                           class="py-2 bg-transparent text-white placeholder:text-gray-400/80 placeholder:font-normal w-full mx-1 pl-2 appearance-none outline-none"
                           placeholder="password">
                </div>
            </div>
            <button type="submit" disabled class="rounded-lg bg-[#142132] hover:bg-[#009FB2] px-6 py-1">submit</button>
        </form>
    </div>
    <div class="col-span-full text-center hidden">
        <div class="noti text-white italic">
            <h4>FPT Account</h4>
        </div>
        <div class="grid grid-cols-2 lg:w-1/2 text-white">
            <div class="flex">
                <div>User Name:</div>
                <div class="ml-3">Ryo</div>
            </div>
            <div class="flex">
                <div>Password:</div>
                <div class="ml-3">fdfsdffsdfdfs</div>
            </div>
            <div class="flex">
                <div>Host:</div>
                <div class="ml-3">124.1.1.234</div>
            </div>
            <div class="flex">
                <div>Port:</div>
                <div class="ml-3">22</div>
            </div>
        </div>
        <hr class="h-px my-6 bg-transparent bg-gradient-to-r from-transparent via-white to-transparent border-none" />
    </div>
    <div class='hidden -mb-12 bg-slate-900 mx-6 rounded-xl flex justify-between items-center px-3'>
        <h3 class='py-4  dark:text-white font-bold'>Save To <span id="folderName" class="italic text-[#009FB2]">Single Videos( Default Folder)</span></h3>
        <div class="changefolder text-[#009FB2] font-bold cursor-pointer" change-folder>
            Change Folder
        </div>
    </div>
</div>

