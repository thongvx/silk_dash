<div class="mt-5">
    <form id="form-setting" action="" useID="{{$setting -> user_id}}">
        @csrf
        <div class="text-[#009FB2]">
            <div class="grid grid-cols-4 gap-4">
                <h5 class="col-span-4 sm:col-span-1 md:text-end">
                    Customize Logo
                </h5>
                <div class="col-span-4 sm:col-span-3 md:col-span-2 flex flex-col text-white font-normal">
                    <div class="w-full pr-3 text-white">
                        <div class="flex box-img">
                            <img src="{{ optional($setting->logo) ? '' : Storage::url($setting->logo) }}" alt="" class="{{optional($setting->logo) ? 'hidden' : ''}} w-1/3 h-12 mr-3 mb-3">
                            <div class="bg-[#142132] rounded-lg py-1 text-center mb-3 flex w-full items-center relative">
                                <input name="logo" type="file" id="file-logo" accept=".jpg, .png, .jpeg"
                                       class="absolute opacity-0 file-img cursor-pointer w-full h-full">
                                <label for="file-logo" class="w-full">choose file</label>
                            </div>
                            <div btn-delete-selected class="hidden items-center rounded-lg bg-rose-500 hover:bg-red-700 px-3 py-1 cursor-pointer mb-3 ml-3">
                                <h4 class="w-max flex h-full items-center">Delete selected</h4>
                            </div>
                        </div>
                        <div class="text-white col-span-2 rounded-lg flex items-center backdrop-blur-3xl px-2 hover:bg-[#142132] bg-[#142132]/70">
                            <input type="text" id="power" name="power" value=""
                                   class="py-1.5 bg-transparent text-white placeholder:text-gray-400/80 placeholder:font-normal w-full mx-1 pl-2 appearance-none outline-none autofill:bg-yellow-200"
                                   placeholder="Power url">
                        </div>
                    </div>
                    <div class="flex md:items-center mt-3 flex-col md:flex-row">
                        <div class="flex items-center">
                            <label for="position" class="mr-3">Position:</label>
                            <select name="position" class="h-max outline-none bg-[#142132] px-3 py-1.5 rounded-lg hover:bg-[#009FB2]"
                                    id="position">
                                <option value="tl"
                                        class="position" {{ $setting -> position == 'tl' ? 'selected' : ''}}>
                                    Top left
                                </option>
                                <option value="tr"
                                        class="position" {{ $setting -> position == 'tr' ? 'selected' : ''}}>
                                    Top right
                                </option>
                                <option value="bl"
                                        class="position" {{ $setting -> position == 'bl' ? 'selected' : ''}}>
                                    Bottom left
                                </option>
                                <option value="br"
                                        class="position" {{ $setting -> position == 'br' ? 'selected' : ''}}>
                                    Bottom right
                                </option>
                                <option value=""
                                        class="position" {{ $setting -> position == null || $setting -> position == '' ? 'selected' : ''}}>
                                    Control bar
                                </option>
                            </select>
                        </div>
                        <div class="mt-3 md:mt-0 md:ml-4">
                            <div class="rounded-lg bg-rose-500 hover:bg-red-700 px-3 py-1 flex items-center cursor-pointer">
                                <i class="material-symbols-outlined opacity-1 font-bold">delete</i>Remove Logo
                            </div>
                        </div>
                    </div>
                    <div class="mt-2">
                        <label for="power">
                            Power URL
                        </label>
                        <div class="text-white rounded-lg flex items-center backdrop-blur-3xl px-2 hover:bg-[#142132] bg-[#142132]/70">
                            <input type="text" id="power" name="power-logo" value=""
                                   class="py-1.5 bg-transparent text-white placeholder:text-gray-400/80 placeholder:font-normal w-full mx-1 pl-2 appearance-none outline-none autofill:bg-yellow-200"
                                   placeholder="Power url">
                        </div>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-4 gap-4 mt-6">
                <h5 class="col-span-4 sm:col-span-1 md:text-end">
                    Customize Poster
                </h5>
                <div class="col-span-4 sm:col-span-3 md:col-span-2 text-white font-normal">
                    <div class="w-full pr-3 text-white">
                        <div class="flex box-img">
                            <img src="{{ optional($setting->poster) ? '' : Storage::url($setting->poster) }}" alt="" class="{{optional($setting->poster) ? 'hidden' : ''}} w-1/3 h-12 mr-3 mb-3">
                            <div class="bg-[#142132] rounded-lg py-1 text-center mb-3 flex w-full relative">
                                <input name="poster" type="file" id="file-poster" accept=".jpg, .png, .jpeg"
                                       class="absolute opacity-0 file-img cursor-pointer w-full h-full">
                                <label for="file-logo" class="w-full">choose file</label>
                            </div>
                            <div btn-delete-selected class="hidden items-center rounded-lg bg-rose-500 hover:bg-red-700 px-3 py-1 cursor-pointer mb-3 ml-3">
                                <h4 class="w-max flex h-full items-center">Delete selected</h4>
                            </div>
                        </div>
                        <div class="rounded-lg flex items-center backdrop-blur-3xl px-2 hover:bg-[#142132] bg-[#142132]/70">
                            <input type="text" id="power" name="power-poster" value=""
                                   class="py-1.5 bg-transparent text-white placeholder:text-gray-400/80 placeholder:font-normal w-full mx-1 pl-2 appearance-none outline-none autofill:bg-yellow-200"
                                   placeholder="Power url">
                        </div>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-4 gap-4 items-center mt-6">
                <h5 class="col-span-4 sm:col-span-1 md:text-end">
                    Enable Caption/Subtitles
                </h5>
                <div class="col-span-4 sm:col-span-3 md:col-span-2 text-white font-normal grid grid-cols-2 gap-4 items-center">
                    <input name="captionsMode" id="captionsMode" class="rounded-xl duration-200 ease-in-out after:rounded-full after:shadow-2xl
                                                         after:duration-200 checked:after:translate-x-5 h-5 relative
                                                         float-left mt-1 w-10 cursor-pointer appearance-none border
                                                         border-solid border-gray-200 bg-slate-800/10 bg-none bg-contain
                                                         bg-left bg-no-repeat align-top transition-all after:absolute
                                                         after:top-px after:h-4 after:w-4 after:translate-x-0.5 after:bg-white
                                                         after:content-[''] checked:border-green-500/95 checked:bg-green-500/95
                                                         checked:bg-none checked:bg-right" type="checkbox"
                    value="{{$setting -> captionsMode ==1 ? '0': '1'}}" {{$setting -> captionsMode ==1 ? 'checked': ''}}>
                </div>
            </div>
            <div class="grid grid-cols-4 gap-4 items-center mt-6">
                <h5 class="col-span-4 sm:col-span-1 md:text-end">
                    Thumbnail Gird Size
                </h5>
                <div class="col-span-4 sm:col-span-3 md:col-span-2 flex flex-col text-white font-normal">
                    <div class="flex justify-between">
                        <div>
                            <input type="radio" id="1" name="gridPoster" class="w-4 h-4 ease rounded-md checked:bg-[#009FB2] after:text-xxs after:material-symbols-outlined
                                                      after:duration-250 after:ease-in-out duration-250 relative float-left mt-1 cursor-pointer appearance-none border
                                                      border-solid border-slate-200 bg-white bg-contain bg-center bg-no-repeat align-top transition-all after:absolute after:flex after:h-full
                                                      after:w-full after:items-center after:justify-center after:text-white after:opacity-0 after:transition-all after:content-['✓']
                                                      checked:border-0 checked:border-transparent checked:after:opacity-100"
                            value="1" {{$setting -> gridPoster == 1 ? 'checked' : ''}}>

                            <label for="1" class="ml-3">1x1</label>
                        </div>
                        <div>
                            <input type="radio" id="4" name="gridPoster" class="w-4 h-4 ease rounded-md checked:bg-[#009FB2] after:text-xxs after:material-symbols-outlined
                                                      after:duration-250 after:ease-in-out duration-250 relative float-left mt-1 cursor-pointer appearance-none border
                                                      border-solid border-slate-200 bg-white bg-contain bg-center bg-no-repeat align-top transition-all after:absolute after:flex after:h-full
                                                      after:w-full after:items-center after:justify-center after:text-white after:opacity-0 after:transition-all after:content-['✓']
                                                      checked:border-0 checked:border-transparent checked:after:opacity-100"
                            value="4" {{$setting -> gridPoster == 4 ? 'checked' : ''}}>

                            <label for="4" class="ml-3">4x4</label>
                        </div>

                        <div>
                            <input type="radio" id="5" name="gridPoster" class="w-4 h-4 ease rounded-md checked:bg-[#009FB2] after:text-xxs after:material-symbols-outlined
                                                      after:duration-250 after:ease-in-out duration-250 relative float-left mt-1 cursor-pointer appearance-none border
                                                      border-solid border-slate-200 bg-white bg-contain bg-center bg-no-repeat align-top transition-all after:absolute after:flex after:h-full
                                                      after:w-full after:items-center after:justify-center after:text-white after:opacity-0 after:transition-all after:content-['✓']
                                                      checked:border-0 checked:border-transparent checked:after:opacity-100"
                            value="5" {{$setting -> gridPoster == 5 ? 'checked' : ''}}>

                            <label for="5" class="ml-3">5x5</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center mt-3 my-10">
                <button type="submit" class="px-10 py-2 rounded-lg bg-[#142132] text-white" disabled>Save</button>
            </div>
        </div>
    </form>
</div>
