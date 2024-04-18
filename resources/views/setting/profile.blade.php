<div class="px-0 pt-0 overflow-auto max-h-[calc(100vh-20em)] ">
    <div class="mb-2 text-emerald-500" id='title'>
        <h5 class="">
            Profile - Api key: iCDR9HRrRY
        </h5>
    </div>
</div>
<div class="">
    <div>
        <form action="">
            <div class="text-emerald-500">
                <div class="grid grid-cols-4 gap-4 items-center">
                    <h5 class="col-span-1 text-end">
                        Name
                    </h5>
                    <div class="text-white col-span-3 md:col-span-2 rounded-lg flex items-center backdrop-blur-3xl px-2 hover:bg-slate-900 bg-slate-900/70">
                        <i class="material-icons opacity-1 text-xl  py-1 px-2 border-r border-gray-200/30">person</i>
                        <input type="text" name="name" value="{{\Illuminate\Support\Facades\Auth::user()->name}}"
                               class=" bg-transparent text-white placeholder:text-gray-400/80 placeholder:font-normal w-full mx-1 pl-2 appearance-none outline-none autofill:bg-yellow-200"
                               placeholder="name">
                    </div>
                </div>
                <div class="grid grid-cols-4 gap-4 items-center mt-6">
                    <h5 class="col-span-1 text-end">
                        Email
                    </h5>
                    <div class="text-white col-span-3 md:col-span-2 rounded-lg flex items-center backdrop-blur-3xl px-2 hover:bg-slate-900 bg-slate-900/70">
                        <i class="material-icons opacity-1 text-xl  py-1 px-2 border-r border-gray-200/30">email</i>
                        <input type="email" name="email" value="{{\Illuminate\Support\Facades\Auth::user()->email}}"
                               class=" bg-transparent text-white placeholder:text-gray-400/80 placeholder:font-normal w-full mx-1 pl-2 appearance-none outline-none autofill:bg-yellow-200"
                               placeholder="email">
                    </div>
                </div>
                <div class="grid grid-cols-4 gap-4 items-center mt-6">
                    <h5 class="col-span-1 text-end">
                        Password
                    </h5>
                    <div class="text-white col-span-3 md:col-span-2 rounded-lg flex items-center backdrop-blur-3xl px-2 hover:bg-slate-900 bg-slate-900/70">
                        <i class="material-icons opacity-1 text-xl  py-1 px-2 border-r border-gray-200/30">key</i>
                        <input type="password" name="password" readonly value="{{\Illuminate\Support\Facades\Auth::user()->password}}"
                               class=" bg-transparent text-white placeholder:text-gray-400/80 placeholder:font-normal w-full mx-1 pl-2 appearance-none outline-none autofill:bg-yellow-200"
                               placeholder="password">
                    </div>
                </div>
                <div class="grid grid-cols-4 gap-4 items-center mt-6">
                    <h5 class="col-span-1 text-end">
                        Website
                    </h5>
                    <div class="text-white col-span-3 md:col-span-2 rounded-lg flex items-center backdrop-blur-3xl px-2 hover:bg-slate-900 bg-slate-900/70">
                        <i class="material-icons opacity-1 text-xl  py-1 px-2 border-r border-gray-200/30">language</i>
                        <input type="text" name="website" value="{{\Illuminate\Support\Facades\Auth::user()->website}}"
                               class=" bg-transparent text-white placeholder:text-gray-400/80 placeholder:font-normal w-full mx-1 pl-2 appearance-none outline-none autofill:bg-yellow-200"
                               placeholder="website">
                    </div>
                </div>
                <div class="grid grid-cols-4 gap-4 items-center mt-6">
                    <h5 class="col-span-1 text-end">
                        Skype
                    </h5>
                    <div class="text-white col-span-3 md:col-span-2 rounded-lg flex items-center backdrop-blur-3xl px-2 hover:bg-slate-900 bg-slate-900/70">
                        <i class="fa fa-skype text-xl  py-1 px-[0.55rem] border-r border-gray-200/30"></i>
                        <input type="text" name="skype" value="{{\Illuminate\Support\Facades\Auth::user()->skype}}"
                               class=" bg-transparent text-white placeholder:text-gray-400/80 placeholder:font-normal w-full mx-1 pl-2 appearance-none outline-none autofill:bg-yellow-200"
                               placeholder="skype">
                    </div>
                </div>
                <div class="grid grid-cols-4 gap-4 items-center mt-6">
                    <h5 class="col-span-1 text-end">
                        Telegram
                    </h5>
                    <div class="text-white col-span-3 md:col-span-2 rounded-lg flex items-center backdrop-blur-3xl px-2 hover:bg-slate-900 bg-slate-900/70">
                        <i class="fa fa-telegram text-xl py-1 px-2 border-r border-gray-200/30"></i>
                        <input type="text" name="telegram" value="{{\Illuminate\Support\Facades\Auth::user()->telegram}}"
                               class=" bg-transparent text-white placeholder:text-gray-400/80 placeholder:font-normal w-full mx-1 pl-2 appearance-none outline-none autofill:bg-yellow-200"
                               placeholder="telegram">
                    </div>
                </div>
                <div class="text-center mt-3">
                    <button type="submit" class="px-10 py-2 rounded-lg bg-blue-400 text-white" disabled>Save</button>
                </div>
            </div>
        </form>
    </div>
</div>
