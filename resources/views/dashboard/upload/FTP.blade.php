<div id="transfer" class="bg-[#121520] p-4 border-[#121520] rounded-b-xl rounded-tr-xl gap-2 bg-top [border-width:var(--tab-border)]" transfer_link>
    @if(Auth::user()->ftp_user == null)
        <div class="col-span-full text-center">
            <div class="noti text-white italic">
                <h4 class="mb-3">Please create support ticket or contact admin to request this feature!</h4>
                <h4>Thanks!</h4>
            </div>
        </div>
    @else
        <div class="box-ftp pb-4">
            <div class="noti text-white italic">
                <h4 class="mb-3">FPT Account</h4>
            </div>
            <form action="" class="text-white flex justify-center w-full">
                <div class="w-full lg:w-1/2 ">
                    <div class="items-center mt-6 flex">
                        <label class="text-start w-40 mr-3" for="ftp_user">
                            FTP User
                        </label>
                        <div class="text-white w-full  rounded-lg flex items-center backdrop-blur-3xl px-2 bg-[#142132]/60">
                            <i class="material-symbols-outlined opacity-1 text-xl  py-1 px-2 border-r border-gray-200/30">person</i>
                            <input type="text" value="{{ Auth::user()->ftp_user ?? '' }}" id="ftp_user"
                                   class=" bg-transparent text-white placeholder:text-gray-400/80 placeholder:font-normal w-full mx-1 pl-2 appearance-none outline-none autofill:bg-yellow-200"
                                   placeholder="FTP User" readonly>
                        </div>
                    </div>
                    <div class="items-center mt-6 flex">
                        <label class="text-start w-40 mr-3" for="ftp_password">
                            FTP Password
                        </label>
                        <div class="text-white w-full rounded-lg flex items-center backdrop-blur-3xl px-2 hover:bg-[#142132] bg-[#142132]/60">
                            <i class="material-symbols-outlined opacity-1 text-xl  py-1 px-2 border-r border-gray-200/30">key</i>
                            <input type="password" value="{{ Auth::user()->ftp_password ?? '' }}" id="ftp_password"
                                   class=" bg-transparent text-white placeholder:text-gray-400/80 placeholder:font-normal w-full mx-1 pl-2 appearance-none outline-none autofill:bg-yellow-200"
                                   placeholder="FTP Password" readonly>
                            <span class="rounded-lg py-1 hover:text-[#009fb2] cursor-pointer" btn-show-password>
                                <i class="material-symbols-outlined opacity-1 text-2xl">visibility</i>
                            </span>
                        </div>
                    </div>
                    <div class="items-center mt-6 flex">
                        <label class="text-start w-40 mr-3" for="ftp_link">
                            FTP Link
                        </label>
                        <div class="text-white w-full rounded-lg flex items-center backdrop-blur-3xl px-2 hover:bg-[#142132] bg-[#142132]/60">
                            <i class="material-symbols-outlined opacity-1 text-xl  py-1 px-2 border-r border-gray-200/30">link</i>
                            <input type="text" value="{{ Auth::user()->ftp_link ?? '' }}" id="ftp_link"
                                   class=" bg-transparent text-white placeholder:text-gray-400/80 placeholder:font-normal w-full mx-1 pl-2 appearance-none outline-none autofill:bg-yellow-200"
                                   placeholder="FTP Link" readonly>
                        </div>
                    </div>
                    <button type="submit" disabled class="rounded-lg bg-[#142132] hover:bg-[#009FB2] px-6 py-1 hidden">submit</button>
                </div>
            </form>
        </div>

    @endif

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

