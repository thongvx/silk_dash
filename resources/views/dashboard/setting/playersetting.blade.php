<div class="mt-2">
    <form id="form-setting" action="" useID="{{$setting -> user_id}}">
        @csrf
        <div class="grid grid-cols-2 gap-x-8 gap-y-10 text-slate-400 font-medium px-2 md:px-4 overflow-auto max-h-[calc(100vh-23em)] md:max-h-[calc(100vh-17em)]">
            <div class="col-span-2 md:col-span-1 gap-4 ">
                <div class="w-full">
                    <h1 class="text-white text-2xl mb-3 ">Player</h1>
                    <div class="items-center flex">
                        <input type="checkbox" id="embeds" class="w-4 h-4 ease rounded-md checked:bg-[#009FB2] after:text-xxs after:material-symbols-outlined
                                                      after:duration-250 after:ease-in-out duration-250 relative float-left mt-1 cursor-pointer appearance-none border
                                                      border-solid border-slate-200 bg-white bg-contain bg-center bg-no-repeat align-top transition-all after:absolute after:flex after:h-full
                                                      after:w-full after:items-center after:justify-center after:text-white after:opacity-0 after:transition-all after:content-['✓']
                                                      checked:border-0 checked:border-transparent checked:after:opacity-100"
                               value="{{$setting -> showTitle}}" name="showTitle" {{$setting -> showTitle == 1 ? 'checked' : ''}}>
                        <label for="embeds" class="ml-3">
                            Show title
                        </label>
                    </div>
                    <div class="items-center mt-3 flex">
                        <input type="checkbox" id="embeds" class="w-4 h-4 ease rounded-md checked:bg-[#009FB2] after:text-xxs after:material-symbols-outlined
                                                      after:duration-250 after:ease-in-out duration-250 relative float-left mt-1 cursor-pointer appearance-none border
                                                      border-solid border-slate-200 bg-white bg-contain bg-center bg-no-repeat align-top transition-all after:absolute after:flex after:h-full
                                                      after:w-full after:items-center after:justify-center after:text-white after:opacity-0 after:transition-all after:content-['✓']
                                                      checked:border-0 checked:border-transparent checked:after:opacity-100"
                               value="" name="show_logo">
                        <label for="embeds" class="ml-3">
                            Show Logo
                        </label>
                    </div>
                    <div class="items-center mt-3 flex">
                        <input type="checkbox" id="embeds" class="w-4 h-4 ease rounded-md checked:bg-[#009FB2] after:text-xxs after:material-symbols-outlined
                                                      after:duration-250 after:ease-in-out duration-250 relative float-left mt-1 cursor-pointer appearance-none border
                                                      border-solid border-slate-200 bg-white bg-contain bg-center bg-no-repeat align-top transition-all after:absolute after:flex after:h-full
                                                      after:w-full after:items-center after:justify-center after:text-white after:opacity-0 after:transition-all after:content-['✓']
                                                      checked:border-0 checked:border-transparent checked:after:opacity-100"
                               value="{{$setting -> showTitle}}" name="" {{$setting -> showTitle == 1 ? 'checked' : ''}}>
                        <label for="embeds" class="ml-3">
                            Show poster
                        </label>
                    </div>
                    <div class="items-center mt-3 flex">
                        <input type="checkbox" id="" class="w-4 h-4 ease rounded-md checked:bg-[#009FB2] after:text-xxs after:material-symbols-outlined
                                                      after:duration-250 after:ease-in-out duration-250 relative float-left mt-1 cursor-pointer appearance-none border
                                                      border-solid border-slate-200 bg-white bg-contain bg-center bg-no-repeat align-top transition-all after:absolute after:flex after:h-full
                                                      after:w-full after:items-center after:justify-center after:text-white after:opacity-0 after:transition-all after:content-['✓']
                                                      checked:border-0 checked:border-transparent checked:after:opacity-100"
                               value="" name="">
                        <label for="embeds" class="ml-3">
                            Show Download Button
                        </label>
                    </div>
                    <div class="items-center mt-3 flex">
                        <input type="checkbox" id="" class="w-4 h-4 ease rounded-md checked:bg-[#009FB2] after:text-xxs after:material-symbols-outlined
                                                      after:duration-250 after:ease-in-out duration-250 relative float-left mt-1 cursor-pointer appearance-none border
                                                      border-solid border-slate-200 bg-white bg-contain bg-center bg-no-repeat align-top transition-all after:absolute after:flex after:h-full
                                                      after:w-full after:items-center after:justify-center after:text-white after:opacity-0 after:transition-all after:content-['✓']
                                                      checked:border-0 checked:border-transparent checked:after:opacity-100"
                               value="" name="">
                        <label for="embeds" class="ml-3">
                            Show Preview
                        </label>
                    </div>
                    <div class="items-center mt-3 flex">
                        <input type="checkbox" id="" class="w-4 h-4 ease rounded-md checked:bg-[#009FB2] after:text-xxs after:material-symbols-outlined
                                                      after:duration-250 after:ease-in-out duration-250 relative float-left mt-1 cursor-pointer appearance-none border
                                                      border-solid border-slate-200 bg-white bg-contain bg-center bg-no-repeat align-top transition-all after:absolute after:flex after:h-full
                                                      after:w-full after:items-center after:justify-center after:text-white after:opacity-0 after:transition-all after:content-['✓']
                                                      checked:border-0 checked:border-transparent checked:after:opacity-100"
                               value="" name="">
                        <label for="embeds" class="ml-3">
                            Infinite Loop
                        </label>
                    </div>
                    <div class="items-center mt-3 flex">
                        <input type="checkbox" id="adblock" class="w-4 h-4 ease rounded-md checked:bg-[#009FB2] after:text-xxs after:material-symbols-outlined
                                                      after:duration-250 after:ease-in-out duration-250 relative float-left mt-1 cursor-pointer appearance-none border
                                                      border-solid border-slate-200 bg-white bg-contain bg-center bg-no-repeat align-top transition-all after:absolute after:flex after:h-full
                                                      after:w-full after:items-center after:justify-center after:text-white after:opacity-0 after:transition-all after:content-['✓']
                                                      checked:border-0 checked:border-transparent checked:after:opacity-100"
                               value="{{$setting -> adblock}}"   name="adblock" {{$setting -> adblock == 1 ? 'checked' : ''}}>
                        <label for="adblock" class="ml-3">
                            Force to disable adblocker
                        </label>
                    </div>
                    <div class="items-center mt-3 w-full">
                        <div class="mt-2 flex items-center">
                            <label for="block" class="w-40">
                                Thumbnail Gird Size
                            </label>
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
                                <div class="mx-8">
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
                    <div class="items-center mt-3 w-full">
                        <div class="mt-2 flex items-center">
                            <label for="block" class="w-40">
                                Primary Color
                            </label>
                            <input type="color"  name=""  value=""
                                   class=" text-white placeholder:text-gray-400/80 placeholder:font-normal
                                   w-full mx-1 p-0 bg-transparent h-8 appearance-none outline-none autofill:bg-yellow-200 rounded-lg">
                        </div>
                    </div>
                    <div class="items-center mt-3 w-full">
                        <div class="mt-2 flex items-center">
                            <label for="block" class="w-40">
                                Embed Width
                            </label>
                            <input type="text"  name="" value="800"
                                   class="py-1.5 hover:bg-[#142132] bg-[#142132]/70 text-white placeholder:text-gray-400/80 placeholder:font-normal
                                   w-full mx-1 pl-2 appearance-none outline-none autofill:bg-yellow-200 rounded-lg">
                        </div>
                    </div>
                    <div class="items-center mt-5 w-full">
                        <div class="mt-2 flex items-center">
                            <label for="block" class="w-40">
                                Embed Height
                            </label>
                            <input type="text"  name="" value="800"
                                   class="py-1.5 hover:bg-[#142132] bg-[#142132]/70 text-white placeholder:text-gray-400/80 placeholder:font-normal
                                   w-full mx-1 pl-2 appearance-none outline-none autofill:bg-yellow-200 rounded-lg">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-span-2 md:col-span-1 gap-4 ">
                <div class="w-full">
                    <h1 class="text-white text-2xl mb-3 ">Customize Logo</h1>
                    <div class="items-center w-full">
                        <div class="flex box-img">
                            <img src="{{ in_array($setting->logo, ['', null, 0]) ? '' : Storage::url($setting->logo) }}" alt="" class="{{ in_array($setting->logo, ['', null, 0]) ? 'hidden' : ''}} w-1/3 h-12 mr-3 mb-3">
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
                            <input type="text" id="power" name="power" value="{{ in_array($setting->logo, ['', null, 0]) ? '' : asset(Storage::url($setting->logo)) }}"
                                   class="py-1.5 bg-transparent text-white placeholder:text-gray-400/80 placeholder:font-normal w-full mx-1 pl-2 appearance-none outline-none autofill:bg-yellow-200"
                                   placeholder="Power url">
                        </div>
                    </div>
                    <div class="items-center mt-3 w-full">
                        <div class="flex items-center">
                            <label for="position" class="mr-3">Position:</label>
                            <select name="position" class="w-full h-max text-white outline-none bg-[#142132] px-3 py-1.5 rounded-lg hover:bg-[#009FB2]"
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
                    </div>
                </div>
                <div class="w-full mt-8">
                    <h1 class="text-white text-2xl mb-3 ">Customize Poster</h1>
                    <div class="items-center mt-3 w-full">
                        <div class="flex box-img">
                            <img src="{{ in_array($setting->poster, ['', null, 0]) ? '' : Storage::url($setting->poster) }}" alt="" class="{{ in_array($setting->poster, ['', null, 0])  ? 'hidden' : ''}} w-1/3 h-12 mr-3 mb-3">
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
            <div class="col-span-2 md:col-span-1 gap-4 ">
                <h1 class="text-white text-2xl mb-3 ">Subtitle</h1>
                <div class="items-center flex">
                    <input name="captionsMode" id="captionsMode"  type="checkbox"
                           class="w-4 h-4 ease rounded-md checked:bg-[#009FB2] after:text-xxs after:material-symbols-outlined
                                  after:duration-250 after:ease-in-out duration-250 relative float-left mt-1 cursor-pointer appearance-none border
                                  border-solid border-slate-200 bg-white bg-contain bg-center bg-no-repeat align-top transition-all after:absolute after:flex after:h-full
                                  after:w-full after:items-center after:justify-center after:text-white after:opacity-0 after:transition-all after:content-['✓']
                                  checked:border-0 checked:border-transparent checked:after:opacity-100"
                           value="{{$setting -> captionsMode ==1 ? '0': '1'}}" {{$setting -> captionsMode ==1 ? 'checked': ''}}>
                    <label for="embeds" class="ml-3">
                        Enable Caption/Subtitles
                    </label>
                </div>
            </div>
            <div class="col-span-2 md:col-span-1 gap-4 ">
                <div class="w-full">
                    <h1 class="text-white text-2xl mb-3 ">Resume</h1>
                    <div class="items-center w-full">
                        <label for="block" class="w-40">
                            Title
                        </label>
                        <div class="text-white col-span-2 rounded-lg flex items-center backdrop-blur-3xl px-2 hover:bg-[#142132] bg-[#142132]/70">
                            <input type="text" id="power" name="power" value="{{ in_array($setting->logo, ['', null, 0]) ? '' : asset(Storage::url($setting->logo)) }}"
                                   class="py-1.5 bg-transparent text-white placeholder:text-gray-400/80 placeholder:font-normal w-full mx-1 pl-2 appearance-none outline-none autofill:bg-yellow-200"
                                   placeholder="Power url">
                        </div>
                    </div>
                    <div class="items-center w-full">
                        <label for="block" class="w-40">
                            Message
                        </label>
                        <div class="text-white col-span-2 rounded-lg flex items-center backdrop-blur-3xl px-2 hover:bg-[#142132] bg-[#142132]/70">
                            <input type="text" id="power" name="power" value="{{ in_array($setting->logo, ['', null, 0]) ? '' : asset(Storage::url($setting->logo)) }}"
                                   class="py-1.5 bg-transparent text-white placeholder:text-gray-400/80 placeholder:font-normal w-full mx-1 pl-2 appearance-none outline-none autofill:bg-yellow-200"
                                   placeholder="Power url">
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-x-4">
                        <div class="items-center w-full">
                            <label for="block" class="w-40">
                                Yes
                            </label>
                            <div class="text-white col-span-2 rounded-lg flex items-center backdrop-blur-3xl px-2 hover:bg-[#142132] bg-[#142132]/70">
                                <input type="text" id="power" name="power" value="{{ in_array($setting->logo, ['', null, 0]) ? '' : asset(Storage::url($setting->logo)) }}"
                                       class="py-1.5 bg-transparent text-white placeholder:text-gray-400/80 placeholder:font-normal w-full mx-1 pl-2 appearance-none outline-none autofill:bg-yellow-200"
                                       placeholder="Power url">
                            </div>
                        </div>
                        <div class="items-center w-full">
                            <label for="block" class="w-40">
                                No
                            </label>
                            <div class="text-white col-span-2 rounded-lg flex items-center backdrop-blur-3xl px-2 hover:bg-[#142132] bg-[#142132]/70">
                                <input type="text" id="power" name="power" value="{{ in_array($setting->logo, ['', null, 0]) ? '' : asset(Storage::url($setting->logo)) }}"
                                       class="py-1.5 bg-transparent text-white placeholder:text-gray-400/80 placeholder:font-normal w-full mx-1 pl-2 appearance-none outline-none autofill:bg-yellow-200"
                                       placeholder="Power url">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-[#009FB2]">
            <div class="text-center mt-3 my-10">
                <button type="submit" class="px-10 py-2 rounded-lg bg-[#142132] text-white" disabled>Save</button>
            </div>
        </div>
    </form>
</div>
