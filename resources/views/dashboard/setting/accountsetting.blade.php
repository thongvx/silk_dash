
<div class="mt-5">
    <form id="form-setting">
        @csrf
        <div class="grid grid-cols-2 gap-x-8 gap-y-10 text-slate-400 font-medium px-2 md:px-4 overflow-auto max-h-[calc(100vh-23em)] md:max-h-[calc(100vh-17em)]">
            <div class="col-span-2 md:col-span-1 gap-4 ">
                <div class="mb-10">
                    <h1 class="text-white text-2xl mb-3 ">Video type</h1>
                    <div class="items-center flex">
                        <input type="radio" id="Non" name="videoType" class="w-4 h-4 ease rounded-full checked:bg-[#009FB2] after:text-xxs after:material-symbols-outlined
                                                  after:duration-250 after:ease-in-out duration-250 relative float-left mt-1 cursor-pointer appearance-none border
                                                  border-solid border-slate-200 bg-white bg-contain bg-center bg-no-repeat align-top transition-all after:absolute after:flex after:h-full
                                                  after:w-full after:justify-center after:text-white after:opacity-0 after:transition-all
                                                  checked:border-0 checked:border-transparent checked:after:opacity-100"
                               value="1" {{$setting -> videoType == 1 ? 'checked' : ''}}>
                        <label for="Non" class="ml-3">Non Adult</label>
                    </div>
                    <div class="items-center mt-5 flex">
                        <input type="radio" id="Adult" name="videoType" class="w-4 h-4 ease rounded-full checked:bg-[#009FB2] after:text-xxs after:material-symbols-outlined
                                                  after:duration-250 after:ease-in-out duration-250 relative float-left mt-1 cursor-pointer appearance-none border
                                                  border-solid border-slate-200 bg-white bg-contain bg-center bg-no-repeat align-top transition-all after:absolute after:flex after:h-full
                                                  after:w-full after:justify-center after:text-white after:opacity-0 after:transition-all
                                                  checked:border-0 checked:border-transparent checked:after:opacity-100"
                               value="2" {{$setting -> videoType == 2 ? 'checked' : ''}}>
                        <label for="Adult" class="ml-3">Adult (18+)</label>
                    </div>
                    <div class="items-center mt-5 flex">
                        <input type="radio" id="Both" name="videoType" class="w-4 h-4 ease rounded-full checked:bg-[#009FB2] after:text-xxs after:material-symbols-outlined
                                                  after:duration-250 after:ease-in-out duration-250 relative float-left mt-1 cursor-pointer appearance-none border
                                                  border-solid border-slate-200 bg-white bg-contain bg-center bg-no-repeat align-top transition-all after:absolute after:flex after:h-full
                                                  after:w-full after:justify-center after:text-white after:opacity-0 after:transition-all
                                                  checked:border-0 checked:border-transparent checked:after:opacity-100"
                               value="3" {{$setting -> videoType == 3 ? 'checked' : ''}}>
                        <label for="Both" class="ml-3">Both Adult & Non Adult</label>
                    </div>
                </div>
                <div>
                    <h1 class="text-white text-2xl mb-3 ">Access Settings</h1>
                    <div class="items-center flex">
                        <div class="mt-2">
                            <input type="checkbox" id="blockDirect" class="rounded-xl duration-200 ease-in-out after:rounded-full after:shadow-2xl
                                                         after:duration-200 checked:after:translate-x-5 h-5 relative
                                                         float-left mt-1 w-10 cursor-pointer appearance-none border
                                                         border-solid border-gray-200 bg-slate-800/10 bg-none bg-contain
                                                         bg-left bg-no-repeat align-top transition-all after:absolute
                                                         after:top-px after:h-4 after:w-4 after:translate-x-0.5 after:bg-white
                                                         after:content-[''] checked:border-[#009FB2] checked:bg-[#009FB2]
                                                         checked:bg-none checked:bg-right"
                                   name="blockDirect" value="{{$setting -> blockDirect}}"  {{$setting -> blockDirect == 1 ? 'checked' : ''}}>
                            <label for="blockDirect" class="ml-3">
                                Disable direct access
                            </label>
                        </div>
                    </div>
                    <div class="items-center mt-3 flex">
                        <div class="mt-2">
                            <input name="disableDownload" id="disableDownload" type="checkbox"   class="rounded-xl duration-200 ease-in-out after:rounded-full after:shadow-2xl
                                                         after:duration-200 checked:after:translate-x-5 h-5 relative
                                                         float-left mt-1 w-10 cursor-pointer appearance-none border
                                                         border-solid border-gray-200 bg-slate-800/10 bg-none bg-contain
                                                         bg-left bg-no-repeat align-top transition-all after:absolute
                                                         after:top-px after:h-4 after:w-4 after:translate-x-0.5 after:bg-white
                                                         after:content-[''] checked:border-[#009FB2] checked:bg-[#009FB2]
                                                         checked:bg-none checked:bg-right"
                                   value="{{$setting -> disableDownload}}" {{$setting -> disableDownload == 1 ? 'checked' : ''}}>
                            <label for="disableDownload" class="ml-3">
                                Disable Download
                            </label>
                        </div>
                    </div>
                    <div class="items-center mt-3 flex">
                        <div class="mt-2">
                            <input type="checkbox" id="embed_page" class="rounded-xl duration-200 ease-in-out after:rounded-full after:shadow-2xl
                                                         after:duration-200 checked:after:translate-x-5 h-5 relative
                                                         float-left mt-1 w-10 cursor-pointer appearance-none border
                                                         border-solid border-gray-200 bg-slate-800/10 bg-none bg-contain
                                                         bg-left bg-no-repeat align-top transition-all after:absolute
                                                         after:top-px after:h-4 after:w-4 after:translate-x-0.5 after:bg-white
                                                         after:content-[''] checked:border-[#009FB2] checked:bg-[#009FB2]
                                                         checked:bg-none checked:bg-right"
                                   value="" >
                            <label for="embed_page" class="ml-3">
                                Disable Video Embed Page
                            </label>
                        </div>
                    </div>
                    <div class="items-center mt-3 flex">
                        <div class="mt-2">
                            <input type="checkbox" id="publicVideo"  name="publicVideo" class="rounded-xl duration-200 ease-in-out after:rounded-full after:shadow-2xl
                                                         after:duration-200 checked:after:translate-x-5 h-5 relative
                                                         float-left mt-1 w-10 cursor-pointer appearance-none border
                                                         border-solid border-gray-200 bg-slate-800/10 bg-none bg-contain
                                                         bg-left bg-no-repeat align-top transition-all after:absolute
                                                         after:top-px after:h-4 after:w-4 after:translate-x-0.5 after:bg-white
                                                         after:content-[''] checked:border-[#009FB2] checked:bg-[#009FB2]
                                                         checked:bg-none checked:bg-right"
                                   value="{{$setting -> publicVideo}}" {{$setting -> publicVideo == 1 ? 'checked' : ''}}>
                            <label for="publicVideo" class="ml-3">
                                Disable Video Cloning
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-span-2 md:col-span-1 gap-4 ">
                <h1 class="text-white text-2xl mb-3 ">Earning Modes</h1>
                <div>
                    <h4 class="text-[#009FB2] text-lg">Views</h4>
                    <div class="items-center flex">
                        <div class="mt-2">
                            <input type="radio" id="2" name="earningModes" class="w-4 h-4 ease rounded-full checked:bg-[#009FB2] after:text-xxs after:material-symbols-outlined
                                                      after:duration-250 after:ease-in-out duration-250 relative float-left mt-1 cursor-pointer appearance-none border
                                                      border-solid border-slate-200 bg-white bg-contain bg-center bg-no-repeat align-top transition-all after:absolute after:flex after:h-full
                                                      after:w-full after:justify-center after:text-white after:opacity-0 after:transition-all
                                                      checked:border-0 checked:border-transparent checked:after:opacity-100"
                                   value="1"  {{$setting -> earningModes == 1 ? 'checked' : ''}}>

                            <label for="1" class="ml-3">Maximum Ads - 100% Earnings</label>
                        </div>
                    </div>
                    <div class="items-center mt-3 flex">
                        <div class="mt-2">
                            <input type="radio" id="2" name="earningModes" class="w-4 h-4 ease rounded-full checked:bg-[#009FB2] after:text-xxs after:material-symbols-outlined
                                                      after:duration-250 after:ease-in-out duration-250 relative float-left mt-1 cursor-pointer appearance-none border
                                                      border-solid border-slate-200 bg-white bg-contain bg-center bg-no-repeat align-top transition-all after:absolute after:flex after:h-full
                                                      after:w-full after:justify-center after:text-white after:opacity-0 after:transition-all
                                                      checked:border-0 checked:border-transparent checked:after:opacity-100"
                                   value="2"  {{$setting -> earningModes == 2 ? 'checked' : ''}}>

                            <label for="2" class="ml-3">Medium Ads - 50% Earnings</label>
                        </div>
                    </div>
                    <div class="items-center mt-3 flex">
                        <div class="mt-2">
                            <input type="radio" id="2.5" name="earningModes" class="w-4 h-4 ease rounded-full checked:bg-[#009FB2] after:text-xxs after:material-symbols-outlined
                                                      after:duration-250 after:ease-in-out duration-250 relative float-left mt-1 cursor-pointer appearance-none border
                                                      border-solid border-slate-200 bg-white bg-contain bg-center bg-no-repeat align-top transition-all after:absolute after:flex after:h-full
                                                      after:w-full after:justify-center after:text-white after:opacity-0 after:transition-all
                                                      checked:border-0 checked:border-transparent checked:after:opacity-100"
                                   value="3"  {{$setting -> earningModes == 3 ? 'checked' : ''}}>

                            <label for="3" class="ml-3">Minimal Ads - No Earnings</label>
                        </div>
                    </div>
                </div>
                <div class="mt-8">
                    <h4 class="text-[#009FB2] text-lg">Download</h4>
                    <div class="items-center flex">
                        <div class="mt-2">
                            <input type="radio" id="2" class="w-4 h-4 ease rounded-full checked:bg-[#009FB2] after:text-xxs after:material-symbols-outlined
                                                      after:duration-250 after:ease-in-out duration-250 relative float-left mt-1 cursor-pointer appearance-none border
                                                      border-solid border-slate-200 bg-white bg-contain bg-center bg-no-repeat align-top transition-all after:absolute after:flex after:h-full
                                                      after:w-full after:justify-center after:text-white after:opacity-0 after:transition-all
                                                      checked:border-0 checked:border-transparent checked:after:opacity-100"
                                   value="1"  {{$setting -> earningModes == 1 ? 'checked' : ''}}>

                            <label for="1" class="ml-3">Maximum Ads - 100% Earnings</label>
                        </div>
                    </div>
                    <div class="items-center mt-3 flex">
                        <div class="mt-2">
                            <input type="radio" id="2" class="w-4 h-4 ease rounded-full checked:bg-[#009FB2] after:text-xxs after:material-symbols-outlined
                                                      after:duration-250 after:ease-in-out duration-250 relative float-left mt-1 cursor-pointer appearance-none border
                                                      border-solid border-slate-200 bg-white bg-contain bg-center bg-no-repeat align-top transition-all after:absolute after:flex after:h-full
                                                      after:w-full after:justify-center after:text-white after:opacity-0 after:transition-all
                                                      checked:border-0 checked:border-transparent checked:after:opacity-100"
                                   value="2"  {{$setting -> earningModes == 2 ? 'checked' : ''}}>

                            <label for="2" class="ml-3">Medium Ads - 50% Earnings</label>
                        </div>
                    </div>
                    <div class="items-center mt-3 flex">
                        <div class="mt-2">
                            <input type="radio" id="2.5" class="w-4 h-4 ease rounded-full checked:bg-[#009FB2] after:text-xxs after:material-symbols-outlined
                                                      after:duration-250 after:ease-in-out duration-250 relative float-left mt-1 cursor-pointer appearance-none border
                                                      border-solid border-slate-200 bg-white bg-contain bg-center bg-no-repeat align-top transition-all after:absolute after:flex after:h-full
                                                      after:w-full after:justify-center after:text-white after:opacity-0 after:transition-all
                                                      checked:border-0 checked:border-transparent checked:after:opacity-100"
                                   value="3"  {{$setting -> earningModes == 3 ? 'checked' : ''}}>

                            <label for="3" class="ml-3">Minimal Ads - No Earnings</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-[#009FB2]">
            <div class=" hidden col-span-4 sm:col-span-3 md:col-span-2 text-white font-normal grid grid-cols-2 gap-4 items-center">
                <div class="flex">
                    <h5 class="mr-4">
                        Premium Mode
                    </h5>
                    <input name="premiumMode" type="checkbox" id="remember" class="rounded-xl duration-200 ease-in-out after:rounded-full after:shadow-2xl
                                                         after:duration-200 checked:after:translate-x-5 h-5 relative
                                                         float-left mt-1 w-10 cursor-pointer appearance-none border
                                                         border-solid border-gray-200 bg-slate-800/10 bg-none bg-contain
                                                         bg-left bg-no-repeat align-top transition-all after:absolute
                                                         after:top-px after:h-4 after:w-4 after:translate-x-0.5 after:bg-white
                                                         after:content-[''] checked:border-green-500/95 checked:bg-green-500/95
                                                         checked:bg-none checked:bg-right"
                           value="{{$setting -> premiumMode}}" {{$setting -> premiumMode == 1 ? 'checked' : ''}}>
                </div>
            </div>
            <div class="text-center mt-3 my-10">
                <button type="submit" class="px-10 py-2 rounded-lg bg-[#142132] text-white" disabled>Save</button>
            </div>
        </div>
    </form>
</div>
