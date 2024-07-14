<div class="mt-4">
    <div>
        <form action="" id="form-profile">
            <div class="grid grid-cols-2 gap-x-8 gap-y-10 text-slate-400 font-medium px-2 md:px-4 overflow-auto max-h-[calc(100vh-23em)] md:max-h-[calc(100vh-17em)]">
                <div class="col-span-2 md:col-span-1 gap-4 ">
                    <h1 class="text-white text-2xl mb-3 ">Account Information</h1>
                    <div class="items-center flex">
                        <h5 class="text-stat mr-3 w-20">
                            Name
                        </h5>
                        <div class="text-white w-full rounded-lg flex items-center backdrop-blur-3xl px-2 bg-[#142132]/60">
                            <i class="material-symbols-outlined opacity-1 text-xl  py-1 px-2 border-r border-gray-200/30">person</i>
                            <input type="text" name="name" value="{{ Auth::user()->name}}"
                                   class=" bg-transparent text-white placeholder:text-gray-400/80 placeholder:font-normal w-full mx-1 pl-2 appearance-none outline-none autofill:bg-yellow-200"
                                   placeholder="name">
                        </div>
                    </div>
                    <div class="items-center mt-6 flex">
                        <h5 class="text-start mr-3 w-20">
                            Email
                        </h5>
                        <div class="text-white w-full  rounded-lg flex items-center backdrop-blur-3xl px-2 bg-[#142132]/60">
                            <i class="material-symbols-outlined opacity-1 text-xl  py-1 px-2 border-r border-gray-200/30">email</i>
                            <input type="email" name="email" value="{{ Auth::user()->email}}"
                                   class=" bg-transparent text-white placeholder:text-gray-400/80 placeholder:font-normal w-full mx-1 pl-2 appearance-none outline-none autofill:bg-yellow-200"
                                   placeholder="email" readonly>
                            <i class="material-symbols-outlined opacity-1 text-xl  py-1 px-2 cursor-pointer" btn-change-email>edit</i>
                        </div>
                    </div>
                    <div class="items-center mt-6 flex">
                        <h5 class="text-stat mr-3 w-20">
                            Password
                        </h5>
                        <div class="text-white w-full rounded-lg flex items-center backdrop-blur-3xl px-2 bg-[#142132]/60">
                            <i class="material-symbols-outlined opacity-1 text-xl  py-1 px-2 border-r border-gray-200/30">key</i>
                            <input type="text" value="********"
                                   class=" bg-transparent text-white placeholder:text-gray-400/80 placeholder:font-normal w-full mx-1 pl-2 appearance-none outline-none autofill:bg-yellow-200"
                                   placeholder="Enter current password" readonly>
                            <i class="material-symbols-outlined opacity-1 text-xl  py-1 px-2 cursor-pointer" btn-change-password>edit</i>
                        </div>
                    </div>
                    <div class="items-center mt-6 flex">
                        <h5 class="text-start mr-3 w-20">
                            Website
                        </h5>
                        <div class="text-white w-full rounded-lg flex items-center backdrop-blur-3xl px-2 hover:bg-[#142132] bg-[#142132]/60">
                            <i class="material-symbols-outlined opacity-1 text-xl  py-1 px-2 border-r border-gray-200/30">language</i>
                            <input type="text" name="website" value="{{ Auth::user()->website}}"
                                   class=" bg-transparent text-white placeholder:text-gray-400/80 placeholder:font-normal w-full mx-1 pl-2 appearance-none outline-none autofill:bg-yellow-200"
                                   placeholder="website">
                        </div>
                    </div>
                    <div class="items-center mt-6 flex">
                        <h5 class="text-start mr-3 w-20">
                            Telegram
                        </h5>
                        <div class="text-white w-full rounded-lg flex items-center backdrop-blur-3xl px-2 hover:bg-[#142132] bg-[#142132]/60">
                            <i  class="py-1.5 px-[0.55rem] border-r border-gray-200/30">
                                <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20" viewBox="0 0 496 512">
                                    <path fill="#ffffff" d="M248 8C111 8 0 119 0 256S111 504 248 504 496 393 496 256 385 8 248 8zM363 176.7c-3.7 39.2-19.9 134.4-28.1 178.3-3.5 18.6-10.3 24.8-16.9 25.4-14.4 1.3-25.3-9.5-39.3-18.7-21.8-14.3-34.2-23.2-55.3-37.2-24.5-16.1-8.6-25 5.3-39.5 3.7-3.8 67.1-61.5 68.3-66.7 .2-.7 .3-3.1-1.2-4.4s-3.6-.8-5.1-.5q-3.3 .7-104.6 69.1-14.8 10.2-26.9 9.9c-8.9-.2-25.9-5-38.6-9.1-15.5-5-27.9-7.7-26.8-16.3q.8-6.7 18.5-13.7 108.4-47.2 144.6-62.3c68.9-28.6 83.2-33.6 92.5-33.8 2.1 0 6.6 .5 9.6 2.9a10.5 10.5 0 0 1 3.5 6.7A43.8 43.8 0 0 1 363 176.7z"/>
                                </svg>
                            </i>
                            <input type="text" name="telegram" value="{{ Auth::user()->telegram}}"
                                   class=" bg-transparent text-white placeholder:text-gray-400/80 placeholder:font-normal w-full mx-1 pl-2 appearance-none outline-none autofill:bg-yellow-200"
                                   placeholder="telegram">
                        </div>
                    </div>
                    <div class="items-center mt-6 flex">
                        <h5 class="text-start mr-3 w-20">
                            Skype
                        </h5>
                        <div class="text-white w-full rounded-lg flex items-center backdrop-blur-3xl px-2 hover:bg-[#142132] bg-[#142132]/60">
                            <i class="py-1.5 px-[0.55rem] border-r border-gray-200/30">
                                <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20" viewBox="0 0 448 512"><path fill="#ffffff" d="M424.7 299.8c2.9-14 4.7-28.9 4.7-43.8 0-113.5-91.9-205.3-205.3-205.3-14.9 0-29.7 1.7-43.8 4.7C161.3 40.7 137.7 32 112 32 50.2 32 0 82.2 0 144c0 25.7 8.7 49.3 23.3 68.2-2.9 14-4.7 28.9-4.7 43.8 0 113.5 91.9 205.3 205.3 205.3 14.9 0 29.7-1.7 43.8-4.7 19 14.6 42.6 23.3 68.2 23.3 61.8 0 112-50.2 112-112 .1-25.6-8.6-49.2-23.2-68.1zm-194.6 91.5c-65.6 0-120.5-29.2-120.5-65 0-16 9-30.6 29.5-30.6 31.2 0 34.1 44.9 88.1 44.9 25.7 0 42.3-11.4 42.3-26.3 0-18.7-16-21.6-42-28-62.5-15.4-117.8-22-117.8-87.2 0-59.2 58.6-81.1 109.1-81.1 55.1 0 110.8 21.9 110.8 55.4 0 16.9-11.4 31.8-30.3 31.8-28.3 0-29.2-33.5-75-33.5-25.7 0-42 7-42 22.5 0 19.8 20.8 21.8 69.1 33 41.4 9.3 90.7 26.8 90.7 77.6 0 59.1-57.1 86.5-112 86.5z"/></svg>
                            </i>
                            <input type="text" name="skype" value="{{ Auth::user()->skype}}"
                                   class="before:content-['\f2c6'] bg-transparent text-white placeholder:text-gray-400/80 placeholder:font-normal w-full mx-1 pl-2 appearance-none outline-none autofill:bg-yellow-200"
                                   placeholder="skype">
                        </div>
                    </div>
                </div>
                <div class="col-span-2 md:col-span-1 gap-4 ">
                    <h1 class="text-white text-2xl mb-3 ">API and FTP Credentials</h1>
                    <div class="items-center flex" id="box-key-api">
                        <h5 class="text-stat w-40 mr-3">
                            API Key
                        </h5>
                        <div class="text-white w-full rounded-lg flex items-center backdrop-blur-3xl px-2 bg-[#142132]/60">
                            <i class="material-symbols-outlined opacity-1 text-xl  py-1 px-2 border-r border-gray-200/30">key</i>
                            <input type="text" value="{{ Auth::user()->key_api }}" id="key_api"
                                   class=" bg-transparent text-white placeholder:text-gray-400/80 placeholder:font-normal w-full mx-1 pl-2 appearance-none outline-none autofill:bg-yellow-200"
                                   placeholder="key_api" readonly>
                            <div class="rounded-lg py-1 hover:text-[#009fb2] cursor-pointer" btn-get-keyApi>
                                <i class="material-symbols-outlined opacity-1 text-2xl">autorenew</i>
                            </div>
                        </div>
                    </div>
                    <div class="items-center mt-6 flex">
                        <h5 class="text-start w-40 mr-3">
                            FTP User
                        </h5>
                        <div class="text-white w-full  rounded-lg flex items-center backdrop-blur-3xl px-2 bg-[#142132]/60">
                            <i class="material-symbols-outlined opacity-1 text-xl  py-1 px-2 border-r border-gray-200/30">person</i>
                            <input type="text" value="{{ Auth::user()->name }}"
                                   class=" bg-transparent text-white placeholder:text-gray-400/80 placeholder:font-normal w-full mx-1 pl-2 appearance-none outline-none autofill:bg-yellow-200"
                                   placeholder="ftp_user">
                        </div>
                    </div>
                    <div class="items-center mt-6 flex">
                        <h5 class="text-start w-40 mr-3">
                            FTP Password
                        </h5>
                        <div class="text-white w-full rounded-lg flex items-center backdrop-blur-3xl px-2 hover:bg-[#142132] bg-[#142132]/60">
                            <i class="material-symbols-outlined opacity-1 text-xl  py-1 px-2 border-r border-gray-200/30">key</i>
                            <input type="password" value=""
                                   class=" bg-transparent text-white placeholder:text-gray-400/80 placeholder:font-normal w-full mx-1 pl-2 appearance-none outline-none autofill:bg-yellow-200"
                                   placeholder="ftp_password">
                        </div>
                    </div>
                    <div class="items-center mt-6 flex">
                        <h5 class="text-start w-40 mr-3">
                            FTP Link
                        </h5>
                        <div class="text-white w-full rounded-lg flex items-center backdrop-blur-3xl px-2 hover:bg-[#142132] bg-[#142132]/60">
                            <i class="material-symbols-outlined opacity-1 text-xl  py-1 px-2 border-r border-gray-200/30">link</i>
                            <input type="text" value=""
                                   class=" bg-transparent text-white placeholder:text-gray-400/80 placeholder:font-normal w-full mx-1 pl-2 appearance-none outline-none autofill:bg-yellow-200"
                                   placeholder="ftp_link">
                        </div>
                    </div>
                </div>
                <div class="col-span-2 md:col-span-1 gap-4 ">
                    <h1 class="text-white text-2xl mb-3 ">Payment Information</h1>
                    <div class="items-center md:flex">
                        <h5 class="text-stat w-72 mb-2 md:mb-0">
                            USDT Address
                        </h5>
                        <div class="text-white w-full rounded-lg flex items-center backdrop-blur-3xl px-2 bg-[#142132]/60">
                            <i class="material-symbols-outlined opacity-1 text-xl  py-1 px-2 border-r border-gray-200/30">paid</i>
                            <input type="text" name="usdt_address" value="{{ Auth::user()->usdt_address}}"
                                   class=" bg-transparent text-white placeholder:text-gray-400/80 placeholder:font-normal w-full mx-1 pl-2 appearance-none outline-none autofill:bg-yellow-200"
                                   placeholder="USDT Address">
                        </div>
                    </div>
                    <div class="items-center mt-6 md:flex">
                        <h5 class="text-start w-72 mb-2 md:mb-0">
                            Network
                        </h5>
                        <div class="text-white w-full  rounded-lg flex items-center backdrop-blur-3xl px-2 bg-[#142132]/60">
                            <i class="material-symbols-outlined opacity-1 text-xl  py-1 px-2 border-r border-gray-200/30">public</i>
                            <input type="text" name="network" value="{{ Auth::user()->network}}"
                                   class=" bg-transparent text-white placeholder:text-gray-400/80 placeholder:font-normal w-full mx-1 pl-2 appearance-none outline-none autofill:bg-yellow-200"
                                   placeholder="Network">
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-[#009FB2] mt-6">
                <div class="text-center mt-4 mb-10">
                    <button type="submit" class="px-10 py-2 rounded-lg bg-[#142132] text-white" disabled>Save</button>
                </div>
            </div>
        </form>
    </div>
</div>
<div fixed-profile>
    <!-- -right-90 in loc de 0-->
    <div fixed-profile-card
         class="opacity-0 hidden bg-black/20 z-50 w-screen ease fixed top-0 left-0 h-full  backdrop-blur-sm
           min-w-0 flex-col break-words rounded-none border-0 bg-clip-border duration-200 justify-center items-center px-3">
        <div class="absolute h-full w-full fixed-plugin-close-button z-10" fixed-profile-close-button>
        </div>
        <div
            class="w-11/12 sm:w-4/5 xl:w-1/4 bg-[#121520] z-20 py-4 px-3 rounded-lg relative ">
            <div class="absolute right-4 top-3">
                <button fixed-profile-close-button
                        class="inline-block p-0 text-sm font-bold leading-normal text-center uppercase align-middle transition-all ease-in bg-transparent border-0 rounded-lg shadow-none cursor-pointer hover:-translate-y-px tracking-tight-rem bg-150 bg-x-25 active:opacity-85 dark:text-white text-slate-700">
                    <i class="fa fa-close text-xl"></i>
                </button>
            </div>
            <div>
                <form class="profile text-slate-400 hidden" id="password">
                    <h5 class="mb-0 text-[#009FB2] text-lg font-semibold">Change Password</h5>
                    <div class="items-center mt-6">
                        <h5 class="text-stat mb-2">
                            Current Password
                        </h5>
                        <div class="text-white w-full rounded-lg flex items-center backdrop-blur-3xl px-2 bg-[#142132]/60">
                            <i class="material-symbols-outlined opacity-1 text-xl  py-1 px-2 border-r border-gray-200/30">key</i>
                            <input type="password" value="" name="current-password"
                                   class=" bg-transparent text-white placeholder:text-gray-400/80 placeholder:font-normal w-full mx-1 pl-2 appearance-none outline-none autofill:bg-yellow-200"
                                   placeholder="Enter current password" autocomplete="off">
                        </div>
                    </div>
                    <div class="items-center mt-3">
                        <h5 class="text-start mb-2">
                            New Password
                        </h5>
                        <div class="text-white w-full  rounded-lg flex items-center backdrop-blur-3xl px-2 bg-[#142132]/60">
                            <i class="material-symbols-outlined opacity-1 text-xl  py-1 px-2 border-r border-gray-200/30">key</i>
                            <input type="password" value="" name="new-password"
                                   class=" bg-transparent text-white placeholder:text-gray-400/80 placeholder:font-normal w-full mx-1 pl-2 appearance-none outline-none autofill:bg-yellow-200"
                                   placeholder="Enter new password" autocomplete="off">
                        </div>
                    </div>
                    <div class="items-center mt-3">
                        <h5 class="text-start mb-2">
                            Confirm New Password
                        </h5>
                        <div class="text-white w-full rounded-lg flex items-center backdrop-blur-3xl px-2 hover:bg-[#142132] bg-[#142132]/60">
                            <i class="material-symbols-outlined opacity-1 text-xl  py-1 px-2 border-r border-gray-200/30">key</i>
                            <input type="password" value="" name="new-password_confirmation"
                                   class=" bg-transparent text-white placeholder:text-gray-400/80 placeholder:font-normal w-full mx-1 pl-2 appearance-none outline-none autofill:bg-yellow-200"
                                   placeholder="Repeat new password" autocomplete="off">
                        </div>
                    </div>
                    <span class="font-italic error invalid-feedback text-red-500" role="alert">
                        </span>
                    <div class="text-[#009FB2] mt-6">
                        <div class="text-center mt-4">
                            <button type="submit" class="px-10 py-2 rounded-lg bg-[#142132] text-white" disabled>Save</button>
                        </div>
                    </div>
                </form>
                <form class="profile text-slate-400 hidden" id="email">
                    <h5 class="mb-0 text-[#009FB2] text-lg font-semibold">Change Email</h5>
                    <div class="items-center mt-6">
                        <h5 class="text-stat mb-2">
                            Password
                        </h5>
                        <div class="text-white w-full rounded-lg flex items-center backdrop-blur-3xl px-2 bg-[#142132]/60">
                            <i class="material-symbols-outlined opacity-1 text-xl  py-1 px-2 border-r border-gray-200/30">key</i>
                            <input type="password" value="" name="password-email"
                                   class="bg-transparent text-white placeholder:text-gray-400/80 placeholder:font-normal w-full mx-1 pl-2 appearance-none outline-none autofill:bg-yellow-200"
                                   placeholder="password" autocomplete="off">
                        </div>
                    </div>
                    <div class="items-center mt-3">
                        <h5 class="text-start mb-2">
                            New Email
                        </h5>
                        <div class="text-white w-full  rounded-lg flex items-center backdrop-blur-3xl px-2 bg-[#142132]/60">
                            <i class="material-symbols-outlined opacity-1 text-xl  py-1 px-2 border-r border-gray-200/30">email</i>
                            <input type="email" value="" name="new_email"
                                   class=" bg-transparent text-white placeholder:text-gray-400/80 placeholder:font-normal w-full mx-1 pl-2 appearance-none outline-none autofill:bg-yellow-200"
                                   placeholder="Enter new email" autocomplete="off">
                        </div>
                    </div>
                    <div class="items-center mt-3">
                        <h5 class="text-start mb-2">
                            Confirm New email
                        </h5>
                        <div class="text-white w-full rounded-lg flex items-center backdrop-blur-3xl px-2 hover:bg-[#142132] bg-[#142132]/60">
                            <i class="material-symbols-outlined opacity-1 text-xl  py-1 px-2 border-r border-gray-200/30">email</i>
                            <input type="email" value="" name="new_email_confirmation"
                                   class=" bg-transparent text-white placeholder:text-gray-400/80 placeholder:font-normal w-full mx-1 pl-2 appearance-none outline-none autofill:bg-yellow-200"
                                   placeholder="Repeat new email" autocomplete="off">
                        </div>
                    </div>
                    <span class="font-italic error invalid-feedback text-red-500" role="alert">
                        </span>
                    <div class="text-[#009FB2] mt-6">
                        <div class="text-center mt-4">
                            <button type="submit" class="px-10 py-2 rounded-lg bg-[#142132] text-white" disabled>Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
