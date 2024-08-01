<div class="mt-5">
    @if($setting->earningModes == 0)
        <div class="text-white">
            <h1 class="text-2xl text-center w-full mb-10">Custom Ads</h1>

            <form class="text-white form-change" id="form-custom-ads">
                <div id="list-ads">
                    @foreach( $AllCustomAds as $CustomAds)
                        <div class=" bg-[#142132] mb-8 rounded-2xl px-4 py-6 relative box-ads">
                            <div class="absolute right-4 top-3">
                                <button btn-remove-ads
                                        class="inline-block p-0 text-sm font-bold leading-normal text-center uppercase align-middle transition-all ease-in bg-transparent border-0 rounded-lg shadow-none cursor-pointer hover:-translate-y-px tracking-tight-rem bg-150 bg-x-25 active:opacity-85 dark:text-white text-slate-700">
                                    <i class="material-symbols-outlined text-3xl">close</i>
                                </button>
                            </div>
                            <div class="grid md:grid-cols-2 gap-8">
                                <div class="flex items-center">
                                    <label for="type" class="w-max">Ads Type</label>
                                    <select name="adsType[]" id="type"
                                            class="ml-4 h-max text-white outline-none bg-[#121520] px-3 py-1.5 rounded-lg hover:bg-[#009FB2]">
                                        <option value="direct" {{$CustomAds['adsType'] == 'direct' ? 'selected' : ''}}>
                                            Direct Link Ads
                                        </option>
                                        <option value="vast" {{$CustomAds['adsType'] == 'vast' ? 'selected' : ''}}>VAST
                                            Ads
                                        </option>
                                    </select>
                                </div>
                                <div class="flex items-center">
                                    <label for="position">Position (Delay)</label>
                                    <div
                                        class="ml-4 text-white rounded-lg flex items-center backdrop-blur-3xl px-2 hover:bg-[#009FB2] bg-[#121520]">
                                        <input type="number" id="position" name="offset[]"
                                               class="py-1.5 bg-transparent text-white placeholder:text-gray-400/80 placeholder:font-normal w-full mx-1 pl-2 appearance-none outline-none autofill:bg-yellow-200"
                                               value="{{$CustomAds['offset']}}" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="pt-2">
                                <label for="url">Link Ads</label>
                                <div
                                    class="mt-1 text-white rounded-lg flex items-center backdrop-blur-3xl px-2 hover:bg-[#009FB2] bg-[#121520]">
                                    <input type="text" id="url" name="linkAds[]" value="{{$CustomAds['linkAds']}}"
                                           class="py-1.5 bg-transparent text-white placeholder:text-gray-400/80 placeholder:font-normal w-full mx-1 pl-2 appearance-none outline-none autofill:bg-yellow-200"
                                           placeholder="Link Ads">
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class=" bg-[#142132] mb-8 rounded-2xl px-4 py-6">
                    <div class="grid grid-cols-2 gap-8">
                        <div class="flex items-center">
                            <label for="type" class="w-max">Ads Type</label>
                            <select name="adsType[]" id="type"
                                    class="ml-4 h-max text-white outline-none bg-[#121520] px-3 py-1.5 rounded-lg hover:bg-[#009FB2]">
                                <option value="direct" selected>Direct Link Ads</option>
                                <option value="vast">VAST Ads</option>
                            </select>
                        </div>
                        <div class="flex items-center">
                            <label for="position">Position (Delay)</label>
                            <div
                                class="ml-4 text-white rounded-lg flex items-center backdrop-blur-3xl px-2 hover:bg-[#009FB2] bg-[#121520]">
                                <input type="number" id="position" name="offset[]"
                                       class="py-1.5 bg-transparent text-white placeholder:text-gray-400/80 placeholder:font-normal w-full mx-1 pl-2 appearance-none outline-none autofill:bg-yellow-200"
                                       value="" placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="mt-2">
                        <label for="url">Link Ads</label>
                        <div
                            class="mt-1 text-white rounded-lg flex items-center backdrop-blur-3xl px-2 hover:bg-[#009FB2] bg-[#121520]">
                            <input type="text" id="url" name="linkAds[]" value=""
                                   class="py-1.5 bg-transparent text-white placeholder:text-gray-400/80 placeholder:font-normal w-full mx-1 pl-2 appearance-none outline-none autofill:bg-yellow-200"
                                   placeholder="Link Ads">
                        </div>
                    </div>
                </div>
                <div class="text-[#009FB2]">
                    <div class="text-center mt-3 my-10">
                        <button type="submit" class="px-10 py-2 rounded-lg bg-[#142132] text-white" disabled>Save
                        </button>
                    </div>
                </div>
            </form>
        </div>
    @else
        <h5 class="text-white text-lg text-center pt-4">
            You need to update your earning modes setting to zero earnings to use this feature!<br>
            Thank you!
        </h5>
    @endif

</div>
