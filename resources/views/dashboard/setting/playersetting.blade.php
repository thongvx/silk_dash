@php use Illuminate\Support\Facades\Storage; @endphp
<div class="mt-2">
    <form id="form-player-setting">
        <div class="grid grid-cols-2 gap-x-8 gap-y-10 text-slate-400 font-medium px-2 md:px-4 overflow-auto max-h-[calc(100vh-23em)] md:max-h-[calc(100vh-17em)]">
            <div class="col-span-2 md:col-span-1 gap-4 ">
                <div class="w-full">
                    <h1 class="text-white text-2xl mb-3 ">Player</h1>
                    <div class="items-center flex">
                        <input type="checkbox" id="show_title" class="rounded-xl duration-200 ease-in-out after:rounded-full after:shadow-2xl
                                                         after:duration-200 checked:after:translate-x-5 h-5 relative
                                                         float-left mt-1 w-10 cursor-pointer appearance-none border
                                                         border-solid border-gray-200 bg-slate-800/10 bg-none bg-contain
                                                         bg-left bg-no-repeat align-top transition-all after:absolute
                                                         after:top-px after:h-4 after:w-4 after:translate-x-0.5 after:bg-white
                                                         after:content-[''] checked:border-[#009FB2] checked:bg-[#009FB2]
                                                         checked:bg-none checked:bg-right"
                               value="{{$playerSettings->show_title}}" name="show_title" {{$playerSettings->show_title == 1 ? 'checked' : ''}}>
                        <label for="show_title" class="ml-3">
                            Show Title
                        </label>
                    </div>
                    <div class="items-center mt-3 flex">
                        <input type="checkbox" id="show_logo" class="rounded-xl duration-200 ease-in-out after:rounded-full after:shadow-2xl
                                                         after:duration-200 checked:after:translate-x-5 h-5 relative
                                                         float-left mt-1 w-10 cursor-pointer appearance-none border
                                                         border-solid border-gray-200 bg-slate-800/10 bg-none bg-contain
                                                         bg-left bg-no-repeat align-top transition-all after:absolute
                                                         after:top-px after:h-4 after:w-4 after:translate-x-0.5 after:bg-white
                                                         after:content-[''] checked:border-[#009FB2] checked:bg-[#009FB2]
                                                         checked:bg-none checked:bg-right"
                               value="{{$playerSettings->show_logo}}" name="show_logo" {{$playerSettings->show_logo == 1 ? 'checked' : ''}}>
                        <label for="show_logo" class="ml-3">
                            Show Logo
                        </label>
                    </div>
                    <div class="items-center mt-3 flex">
                        <input type="checkbox" id="show_poster" class="rounded-xl duration-200 ease-in-out after:rounded-full after:shadow-2xl
                                                         after:duration-200 checked:after:translate-x-5 h-5 relative
                                                         float-left mt-1 w-10 cursor-pointer appearance-none border
                                                         border-solid border-gray-200 bg-slate-800/10 bg-none bg-contain
                                                         bg-left bg-no-repeat align-top transition-all after:absolute
                                                         after:top-px after:h-4 after:w-4 after:translate-x-0.5 after:bg-white
                                                         after:content-[''] checked:border-[#009FB2] checked:bg-[#009FB2]
                                                         checked:bg-none checked:bg-right"
                               value="{{$playerSettings->show_poster}}" name="show_poster" {{$playerSettings->show_poster == 1 ? 'checked' : ''}}>
                        <label for="show_poster" class="ml-3">
                            Show Poster
                        </label>
                    </div>
                    <div class="items-center mt-3 flex">
                        <input type="checkbox" id="show_download" class="rounded-xl duration-200 ease-in-out after:rounded-full after:shadow-2xl
                                                         after:duration-200 checked:after:translate-x-5 h-5 relative
                                                         float-left mt-1 w-10 cursor-pointer appearance-none border
                                                         border-solid border-gray-200 bg-slate-800/10 bg-none bg-contain
                                                         bg-left bg-no-repeat align-top transition-all after:absolute
                                                         after:top-px after:h-4 after:w-4 after:translate-x-0.5 after:bg-white
                                                         after:content-[''] checked:border-[#009FB2] checked:bg-[#009FB2]
                                                         checked:bg-none checked:bg-right"
                               value="{{$playerSettings->show_download}}" name="show_download" {{$playerSettings->show_download == 1 ? 'checked' : ''}}>
                        <label for="show_download" class="ml-3">
                            Show Download Button
                        </label>
                    </div>
                    <div class="items-center mt-3 flex">
                        <input type="checkbox" id="show_preview" class="rounded-xl duration-200 ease-in-out after:rounded-full after:shadow-2xl
                                                         after:duration-200 checked:after:translate-x-5 h-5 relative
                                                         float-left mt-1 w-10 cursor-pointer appearance-none border
                                                         border-solid border-gray-200 bg-slate-800/10 bg-none bg-contain
                                                         bg-left bg-no-repeat align-top transition-all after:absolute
                                                         after:top-px after:h-4 after:w-4 after:translate-x-0.5 after:bg-white
                                                         after:content-[''] checked:border-[#009FB2] checked:bg-[#009FB2]
                                                         checked:bg-none checked:bg-right"
                               value="{{$playerSettings->show_preview}}" name="show_preview" {{$playerSettings->show_preview == 1 ? 'checked' : ''}}>
                        <label for="show_preview" class="ml-3">
                            Show Preview
                        </label>
                    </div>
                    <div class="items-center mt-3 flex">
                        <input type="checkbox" id="infinite_loop" class="rounded-xl duration-200 ease-in-out after:rounded-full after:shadow-2xl
                                                         after:duration-200 checked:after:translate-x-5 h-5 relative
                                                         float-left mt-1 w-10 cursor-pointer appearance-none border
                                                         border-solid border-gray-200 bg-slate-800/10 bg-none bg-contain
                                                         bg-left bg-no-repeat align-top transition-all after:absolute
                                                         after:top-px after:h-4 after:w-4 after:translate-x-0.5 after:bg-white
                                                         after:content-[''] checked:border-[#009FB2] checked:bg-[#009FB2]
                                                         checked:bg-none checked:bg-right"
                               value="{{$playerSettings->infinite_loop}}" name="infinite_loop" {{$playerSettings->infinite_loop == 1 ? 'checked' : ''}}>
                        <label for="infinite_loop" class="ml-3">
                            Infinite Loop
                        </label>
                    </div>
                    <div class="items-center mt-3 w-full">
                        <div class="mt-2 md:flex items-center">
                            <label for="block" class="w-60">
                                Thumbnail/Poster Gird Size
                            </label>
                            <div class="flex justify-between">
                                <div>
                                    <input type="radio" id="1" name="thumbnail_grid" class="w-4 h-4 ease rounded-md checked:bg-[#009FB2] after:text-xxs after:material-symbols-outlined
                                                      after:duration-250 after:ease-in-out duration-250 relative float-left mt-1 cursor-pointer appearance-none border
                                                      border-solid border-slate-200 bg-white bg-contain bg-center bg-no-repeat align-top transition-all after:absolute after:flex after:h-full
                                                      after:w-full after:items-center after:justify-center after:text-white after:opacity-0 after:transition-all after:content-['✓']
                                                      checked:border-0 checked:border-transparent checked:after:opacity-100"
                                           value="1" {{$playerSettings->thumbnail_grid == 1 ? 'checked' : ''}}>

                                    <label for="1" class="ml-3">1x1</label>
                                </div>
                                <div class="mx-8">
                                    <input type="radio" id="4" name="thumbnail_grid" class="w-4 h-4 ease rounded-md checked:bg-[#009FB2] after:text-xxs after:material-symbols-outlined
                                                      after:duration-250 after:ease-in-out duration-250 relative float-left mt-1 cursor-pointer appearance-none border
                                                      border-solid border-slate-200 bg-white bg-contain bg-center bg-no-repeat align-top transition-all after:absolute after:flex after:h-full
                                                      after:w-full after:items-center after:justify-center after:text-white after:opacity-0 after:transition-all after:content-['✓']
                                                      checked:border-0 checked:border-transparent checked:after:opacity-100"
                                           value="4" {{$playerSettings->thumbnail_grid == 4 ? 'checked' : ''}}>

                                    <label for="4" class="ml-3">4x4</label>
                                </div>

                                <div>
                                    <input type="radio" id="5" name="thumbnail_grid" class="w-4 h-4 ease rounded-md checked:bg-[#009FB2] after:text-xxs after:material-symbols-outlined
                                                      after:duration-250 after:ease-in-out duration-250 relative float-left mt-1 cursor-pointer appearance-none border
                                                      border-solid border-slate-200 bg-white bg-contain bg-center bg-no-repeat align-top transition-all after:absolute after:flex after:h-full
                                                      after:w-full after:items-center after:justify-center after:text-white after:opacity-0 after:transition-all after:content-['✓']
                                                      checked:border-0 checked:border-transparent checked:after:opacity-100"
                                           value="5" {{$playerSettings->thumbnail_grid == 5 ? 'checked' : ''}}>

                                    <label for="5" class="ml-3">5x5</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="items-center mt-3 w-full">
                        <div class="mt-2 flex items-center">
                            <label for="premium_color" class="w-40">
                                Primary Color
                            </label>
                            <input type="color" id="premium_color"  name="premium_color"  value="{{ $playerSettings->premium_color }}"
                                   class=" text-white placeholder:text-gray-400/80 placeholder:font-normal
                                   w-full mx-1 p-0 bg-transparent h-8 appearance-none outline-none autofill:bg-yellow-200 rounded-lg">
                        </div>
                    </div>
                    <div class="items-center mt-3 w-full">
                        <div class="mt-2 flex items-center">
                            <label for="embed_width" class="w-40">
                                Embed Width
                            </label>
                            <input type="text" id="embed_width" name="embed_width"  value="{{ $playerSettings->embed_width }}"
                                   class="py-1.5 hover:bg-[#142132] bg-[#142132]/70 text-white placeholder:text-gray-400/80 placeholder:font-normal
                                   w-full mx-1 pl-2 appearance-none outline-none autofill:bg-yellow-200 rounded-lg">
                        </div>
                    </div>
                    <div class="items-center mt-5 w-full">
                        <div class="mt-2 flex items-center">
                            <label for="embed_height" class="w-40">
                                Embed Height
                            </label>
                            <input type="text" id="embed_height" name="embed_height"  value="{{ $playerSettings->embed_height }}"
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
                            @php
                                $checkUrl = strpos($playerSettings->logo_link, 'http') !== false ? 0 : 1;
                                if ($checkUrl == 0) {
                                    $logoLink = $playerSettings->logo_link;
                                } else {
                                    $logoLink = asset(Storage::url($playerSettings->logo_link));
                                }
                            @endphp
                            <img src="{{ !empty($playerSettings->logo_link) ? $logoLink : '' }}" alt="" class="{{ empty($playerSettings->logo_link) ? 'hidden' : '' }} w-1/3 h-12 mr-3 mb-3">
                            <div class="bg-[#142132] rounded-lg py-1 text-center mb-3 flex w-full items-center relative">
                                <input name="logo" type="file" id="file-logo" accept=".jpg, .png, .jpeg"
                                       class="absolute opacity-0 file-img cursor-pointer w-full h-full">
                                <label for="file-logo" class="w-full">choose file</label>
                            </div>
                            <div btn-delete-selected class="hidden items-center rounded-lg bg-rose-500 hover:bg-red-700 px-3 py-1 cursor-pointer mb-3 ml-3">
                                <h4 class="w-max flex h-full items-center text-white">Delete selected</h4>
                            </div>
                        </div>
                        <div class="text-white col-span-2 rounded-lg flex items-center backdrop-blur-3xl px-2 hover:bg-[#142132] bg-[#142132]/70">
                            <input type="text" id="power" name="power_url_logo" value="{{ $playerSettings->power_url_logo }}"
                                   class="py-1.5 bg-transparent text-white placeholder:text-gray-400/80 placeholder:font-normal w-full mx-1 pl-2 appearance-none outline-none autofill:bg-yellow-200"
                                   placeholder="Power url">
                        </div>
                    </div>
                    <div class="items-center mt-3 w-full">
                        <div class="flex items-center">
                            <label for="position" class="mr-3">Position:</label>
                            <select name="position" class="w-full h-max text-white outline-none bg-[#142132] px-3 py-1.5 rounded-lg hover:bg-[#009FB2]"
                                    id="position">
                                <option value="top-left"
                                        class="position" {{ $playerSettings->position == 'top-left' ? 'selected' : ''}}>
                                    Top left
                                </option>
                                <option value="top-right"
                                        class="position" {{ $playerSettings->position == 'top-right' ? 'selected' : ''}}>
                                    Top right
                                </option>
                                <option value="bottom-left"
                                        class="position" {{ $playerSettings->position == 'bottom-left' ? 'selected' : ''}}>
                                    Bottom left
                                </option>
                                <option value="bottom-right"
                                        class="position" {{ $playerSettings->position == 'bottom-right' ? 'selected' : ''}}>
                                    Bottom right
                                </option>
                                <option value="control-bar"
                                        class="position" {{ $playerSettings->position == 'control-bar' ? 'selected' : ''}}>
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
                            <img src="{{ in_array($playerSettings->poster_link, ['', null, 0]) ? '' : Storage::url($playerSettings->poster_link) }}" alt="" class="{{ in_array($playerSettings->poster_link, ['', null, 0])  ? 'hidden' : ''}} w-1/3 h-12 mr-3 mb-3">
                            <div class="bg-[#142132] rounded-lg py-1 text-center mb-3 flex w-full relative">
                                <input name="poster" type="file" id="file-poster" accept=".jpg, .png, .jpeg"
                                       class="absolute opacity-0 file-img cursor-pointer w-full h-full">
                                <label for="file-logo" class="w-full">choose file</label>
                            </div>
                            <div btn-delete-selected class="hidden items-center rounded-lg bg-rose-500 hover:bg-red-700 px-3 py-1 cursor-pointer mb-3 ml-3">
                                <h4 class="w-max flex h-full items-center">Delete selected</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-span-2 md:col-span-1 gap-4 ">
                <h1 class="text-white text-2xl mb-3 ">Subtitle</h1>
                <div class="items-center flex">
                    <input name="enable_caption" id="enable_caption"  type="checkbox"
                           class="rounded-xl duration-200 ease-in-out after:rounded-full after:shadow-2xl
                                                         after:duration-200 checked:after:translate-x-5 h-5 relative
                                                         float-left mt-1 w-10 cursor-pointer appearance-none border
                                                         border-solid border-gray-200 bg-slate-800/10 bg-none bg-contain
                                                         bg-left bg-no-repeat align-top transition-all after:absolute
                                                         after:top-px after:h-4 after:w-4 after:translate-x-0.5 after:bg-white
                                                         after:content-[''] checked:border-[#009FB2] checked:bg-[#009FB2]
                                                         checked:bg-none checked:bg-right"
                           value="{{$playerSettings->enable_caption ==1 ? '0': '1'}}" {{$playerSettings->enable_caption ==1 ? 'checked': ''}}>
                    <label for="enable_caption" class="ml-3">
                        Enable Caption/Subtitles
                    </label>
                </div>
            </div>
            <div class="col-span-2 md:col-span-1 gap-4 hidden">
                <div class="w-full">
                    <h1 class="text-white text-2xl mb-3 ">Resume</h1>
                    <div class="items-center w-full">
                        <label for="block" class="w-40">
                            Title
                        </label>
                        <div class="text-white col-span-2 rounded-lg flex items-center backdrop-blur-3xl px-2 hover:bg-[#142132] bg-[#142132]/70">
                            @php
                                $url = $playerSettings->logo;
                                $checkUrl = strpos($url, 'https://');
                                if($checkUrl == 0){
                                    $slugClone = asset(Storage::url($playerSettings->logo));
                                }
                                else
                                    $slugClone = $url;
                            @endphp
                            <input type="text" id="power"
                                   value="{{ in_array($playerSettings->logo, ['', null, 0]) ? '' :  $slugClone}}"
                                   class="py-1.5 bg-transparent text-white placeholder:text-gray-400/80 placeholder:font-normal w-full mx-1 pl-2 appearance-none outline-none autofill:bg-yellow-200"
                                   placeholder="Power url">
                        </div>
                    </div>
                    <div class="items-center w-full">
                        <label for="block" class="w-40">
                            Message
                        </label>
                        <div class="text-white col-span-2 rounded-lg flex items-center backdrop-blur-3xl px-2 hover:bg-[#142132] bg-[#142132]/70">
                            <input type="text" id="power"
                                   value="{{ in_array($playerSettings->logo, ['', null, 0]) ? '' : $slugClone }}"
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
                                <input type="text" id="power"  value="{{ in_array($playerSettings->logo, ['', null, 0]) ? '' : asset(Storage::url($playerSettings->logo)) }}"
                                       class="py-1.5 bg-transparent text-white placeholder:text-gray-400/80 placeholder:font-normal w-full mx-1 pl-2 appearance-none outline-none autofill:bg-yellow-200"
                                       placeholder="Power url">
                            </div>
                        </div>
                        <div class="items-center w-full">
                            <label for="block" class="w-40">
                                No
                            </label>
                            <div class="text-white col-span-2 rounded-lg flex items-center backdrop-blur-3xl px-2 hover:bg-[#142132] bg-[#142132]/70">
                                <input type="text" id="power"  value="{{ in_array($playerSettings->logo, ['', null, 0]) ? '' : asset(Storage::url($playerSettings->logo)) }}"
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
