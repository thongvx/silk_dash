<div class="px-0 pt-0 overflow-auto max-h-[calc(100vh-20em)] ">
    <div class="mb-2 text-emerald-500" id='title'>
        <h5 class="">
            Account Settings
        </h5>
    </div>
</div>
<div>
    <form action="">
        <div class="text-emerald-500">
            <div class="grid grid-cols-4 gap-4 ">
                <h5 class="col-span-1 text-end">
                    Video type
                </h5>
                <div class="col-span-2 flex flex-col text-white font-normal">
                    <div class="flex justify-between">
                        <div>
                            <input type="radio" id="Non" name="videoType" class="w-4 h-4 ease rounded-full checked:bg-gradient-to-tl checked:from-blue-500 checked:to-violet-500 after:text-xxs after:material-icons
                                                  after:duration-250 after:ease-in-out duration-250 relative float-left mt-1 cursor-pointer appearance-none border
                                                  border-solid border-slate-200 bg-white bg-contain bg-center bg-no-repeat align-top transition-all after:absolute after:flex after:h-full
                                                  after:w-full after:justify-center after:text-white after:opacity-0 after:transition-all
                                                  checked:border-0 checked:border-transparent checked:bg-transparent checked:after:opacity-100"
                            >

                            <label for="Non" class="ml-3">Non Adult</label>
                        </div>
                        <div>
                            <input type="radio" id="Adult" name="videoType" class="w-4 h-4 ease rounded-full checked:bg-gradient-to-tl checked:from-blue-500 checked:to-violet-500 after:text-xxs after:material-icons
                                                  after:duration-250 after:ease-in-out duration-250 relative float-left mt-1 cursor-pointer appearance-none border
                                                  border-solid border-slate-200 bg-white bg-contain bg-center bg-no-repeat align-top transition-all after:absolute after:flex after:h-full
                                                  after:w-full after:justify-center after:text-white after:opacity-0 after:transition-all
                                                  checked:border-0 checked:border-transparent checked:bg-transparent checked:after:opacity-100"
                            >

                            <label for="Adult" class="ml-3">Adult (18+)</label>
                        </div>

                        <div>
                            <input type="radio" id="Both" name="videoType" class="w-4 h-4 ease rounded-full checked:bg-gradient-to-tl checked:from-blue-500 checked:to-violet-500 after:text-xxs after:material-icons
                                                  after:duration-250 after:ease-in-out duration-250 relative float-left mt-1 cursor-pointer appearance-none border
                                                  border-solid border-slate-200 bg-white bg-contain bg-center bg-no-repeat align-top transition-all after:absolute after:flex after:h-full
                                                  after:w-full after:justify-center after:text-white after:opacity-0 after:transition-all
                                                  checked:border-0 checked:border-transparent checked:bg-transparent checked:after:opacity-100"
                            >

                            <label for="Both" class="ml-3">Both Adult & Non Adult</label>
                        </div>
                    </div>
                    <div class="mt-2">
                        <input type="checkbox" id="adblocker" class="w-4 h-4 ease rounded-md checked:bg-gradient-to-tl checked:from-blue-500 checked:to-violet-500 after:text-xxs after:material-icons
                                                      after:duration-250 after:ease-in-out duration-250 relative float-left mt-1 cursor-pointer appearance-none border
                                                      border-solid border-slate-200 bg-white bg-contain bg-center bg-no-repeat align-top transition-all after:absolute after:flex after:h-full
                                                      after:w-full after:items-center after:justify-center after:text-white after:opacity-0 after:transition-all after:content-['✓']
                                                      checked:border-0 checked:border-transparent checked:bg-transparent checked:after:opacity-100"
                              >
                        <label for="adblocker" class="ml-3">
                            Force to disable adblocker
                        </label>
                    </div>
                    <div class="mt-2">
                        <input type="checkbox" id="embeds" class="w-4 h-4 ease rounded-md checked:bg-gradient-to-tl checked:from-blue-500 checked:to-violet-500 after:text-xxs after:material-icons
                                                      after:duration-250 after:ease-in-out duration-250 relative float-left mt-1 cursor-pointer appearance-none border
                                                      border-solid border-slate-200 bg-white bg-contain bg-center bg-no-repeat align-top transition-all after:absolute after:flex after:h-full
                                                      after:w-full after:items-center after:justify-center after:text-white after:opacity-0 after:transition-all after:content-['✓']
                                                      checked:border-0 checked:border-transparent checked:bg-transparent checked:after:opacity-100"
                              >
                        <label for="embeds" class="ml-3">
                            Show title in embeds
                        </label>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-4 gap-4 mt-6">
                <h5 class="col-span-1 text-end">
                    Access Restriction
                </h5>
                <div class="col-span-2 text-white font-normal">
                    <h5>(Allow who will be able to access your videos)</h5>
                    <div class="mt-2">
                        <input type="checkbox" id="block" class="w-4 h-4 ease rounded-md checked:bg-gradient-to-tl checked:from-blue-500 checked:to-violet-500 after:text-xxs after:material-icons
                                                      after:duration-250 after:ease-in-out duration-250 relative float-left mt-1 cursor-pointer appearance-none border
                                                      border-solid border-slate-200 bg-white bg-contain bg-center bg-no-repeat align-top transition-all after:absolute after:flex after:h-full
                                                      after:w-full after:items-center after:justify-center after:text-white after:opacity-0 after:transition-all after:content-['✓']
                                                      checked:border-0 checked:border-transparent checked:bg-transparent checked:after:opacity-100"
                        >
                        <label for="block" class="ml-3">
                            Block direct access & only allow embeds
                        </label>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-4 gap-4 mt-6">
                <h5 class="col-span-1 text-end">
                    Only follow (sub) domains to embed (comma seperated)
                </h5>
                <div class="col-span-2 text-white font-normal">
                    <div class="mt-2">
                        <div class="text-white col-span-2 rounded-lg flex items-center backdrop-blur-3xl px-2 hover:bg-slate-900 bg-slate-900/70">
                            <input type="text" name="website" value=""
                                   class="py-1.5 bg-transparent text-white placeholder:text-gray-400/80 placeholder:font-normal w-full mx-1 pl-2 appearance-none outline-none autofill:bg-yellow-200"
                                   placeholder="website">
                        </div>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-4 gap-4 items-center mt-6">
                <h5 class="col-span-1 text-end">
                   Mode
                </h5>
                <div class="col-span-2 text-white font-normal grid grid-cols-2 gap-4 items-center">
                    <div class="flex">
                        <h5 class="mr-4">
                            Premium Mode
                        </h5>
                        <input name="remember" id="remember" class="rounded-xl duration-200 ease-in-out after:rounded-full after:shadow-2xl
                                                         after:duration-200 checked:after:translate-x-5 h-5 relative
                                                         float-left mt-1 w-10 cursor-pointer appearance-none border
                                                         border-solid border-gray-200 bg-slate-800/10 bg-none bg-contain
                                                         bg-left bg-no-repeat align-top transition-all after:absolute
                                                         after:top-px after:h-4 after:w-4 after:translate-x-0.5 after:bg-white
                                                         after:content-[''] checked:border-green-500/95 checked:bg-green-500/95
                                                         checked:bg-none checked:bg-right" type="checkbox">
                    </div>
                    <div class="flex">
                        <h5 class="mr-4">
                            Disable Download
                        </h5>
                        <input name="remember" id="remember" class="rounded-xl duration-200 ease-in-out after:rounded-full after:shadow-2xl
                                                         after:duration-200 checked:after:translate-x-5 h-5 relative
                                                         float-left mt-1 w-10 cursor-pointer appearance-none border
                                                         border-solid border-gray-200 bg-slate-800/10 bg-none bg-contain
                                                         bg-left bg-no-repeat align-top transition-all after:absolute
                                                         after:top-px after:h-4 after:w-4 after:translate-x-0.5 after:bg-white
                                                         after:content-[''] checked:border-green-500/95 checked:bg-green-500/95
                                                         checked:bg-none checked:bg-right" type="checkbox">
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-4 gap-4 items-center mt-6">
                <h5 class="col-span-1 text-end">
                    Public Videos
                </h5>
                <div class="text-white col-span-2">
                    <div class="mt-2">
                        <input type="checkbox" class="w-4 h-4 ease rounded-md checked:bg-gradient-to-tl checked:from-blue-500 checked:to-violet-500 after:text-xxs after:material-icons
                                                      after:duration-250 after:ease-in-out duration-250 relative float-left mt-1 cursor-pointer appearance-none border
                                                      border-solid border-slate-200 bg-white bg-contain bg-center bg-no-repeat align-top transition-all after:absolute after:flex after:h-full
                                                      after:w-full after:items-center after:justify-center after:text-white after:opacity-0 after:transition-all after:content-['✓']
                                                      checked:border-0 checked:border-transparent checked:bg-transparent checked:after:opacity-100"
                        >
                        <span class="ml-3">
                            Allow other users tranfer (copy) videos
                        </span>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-4 gap-4 mt-6">
                <h5 class="col-span-1 text-end text-warning">
                    Earning Modes
                </h5>
                <div class="text-white col-span-2 rounded-lg flex items-center backdrop-blur-3xl px-2 bg-slate-900">
                    <div class="flex justify-between flex-col p-2">
                        <div class="mb-3">
                            <input type="radio" id="Not" name="earning" class="w-4 h-4 ease rounded-full checked:bg-gradient-to-tl checked:from-blue-500 checked:to-violet-500 after:text-xxs after:material-icons
                                                  after:duration-250 after:ease-in-out duration-250 relative float-left mt-1 cursor-pointer appearance-none border
                                                  border-solid border-slate-200 bg-white bg-contain bg-center bg-no-repeat align-top transition-all after:absolute after:flex after:h-full
                                                  after:w-full after:justify-center after:text-white after:opacity-0 after:transition-all
                                                  checked:border-0 checked:border-transparent checked:bg-transparent checked:after:opacity-100"
                            >

                            <label for="Not" class="ml-3">No Earning: 1 Popunder on pre-roll (per page)</label>
                        </div>
                        <div class="mb-3">
                            <input type="radio" id="1" name="earning" class="w-4 h-4 ease rounded-full checked:bg-gradient-to-tl checked:from-blue-500 checked:to-violet-500 after:text-xxs after:material-icons
                                                  after:duration-250 after:ease-in-out duration-250 relative float-left mt-1 cursor-pointer appearance-none border
                                                  border-solid border-slate-200 bg-white bg-contain bg-center bg-no-repeat align-top transition-all after:absolute after:flex after:h-full
                                                  after:w-full after:justify-center after:text-white after:opacity-0 after:transition-all
                                                  checked:border-0 checked:border-transparent checked:bg-transparent checked:after:opacity-100"
                            >

                            <label for="1" class="ml-3">$1 per 10k views:  2 Popunders on pre-roll </label>
                        </div>

                        <div>
                            <input type="radio" id="2.5" name="earning" class="w-4 h-4 ease rounded-full checked:bg-gradient-to-tl checked:from-blue-500 checked:to-violet-500 after:text-xxs after:material-icons
                                                  after:duration-250 after:ease-in-out duration-250 relative float-left mt-1 cursor-pointer appearance-none border
                                                  border-solid border-slate-200 bg-white bg-contain bg-center bg-no-repeat align-top transition-all after:absolute after:flex after:h-full
                                                  after:w-full after:justify-center after:text-white after:opacity-0 after:transition-all
                                                  checked:border-0 checked:border-transparent checked:bg-transparent checked:after:opacity-100"
                            >

                            <label for="2.5" class="ml-3">$2.5 per 10k views: 3 Popunders on pre-roll</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center mt-3">
                <button type="submit" class="px-10 py-2 rounded-lg bg-blue-400 text-white" disabled>Save</button>
            </div>
        </div>
    </form>
</div>
