<div class="px-0 pt-0 overflow-auto max-h-[calc(100vh-20em)] ">
    <div class="mb-2 text-emerald-500" id='title'>
        <h5 class="">
            Player Settings
        </h5>
    </div>
</div>
<div>
    <form action="">
        <div class="text-emerald-500">
            <div class="grid grid-cols-4 gap-4 ">
                <h5 class="col-span-1 text-end">
                    Customize Logo
                </h5>
                <div class="col-span-2 flex flex-col text-white font-normal">
                    <div class="flex justify-between">
                        <div>
                            <div class="bg-slate-900">
                                <input name="fileLogo" type="file" id="file-logo" onchange="File_image(this)" accept=".jpg, .png, .jpeg"
                                        class="absolute opacity-0">
                                <label for="file-logo" class="ml-3">choose file</label>
                            </div>
                            <div class="text-white col-span-2 rounded-lg flex items-center backdrop-blur-3xl px-2 hover:bg-slate-900 bg-slate-900/70">
                                <input type="text" id="power" name="power" value=""
                                       class="py-1.5 bg-transparent text-white placeholder:text-gray-400/80 placeholder:font-normal w-full mx-1 pl-2 appearance-none outline-none autofill:bg-yellow-200"
                                       placeholder="Power url">
                            </div>
                        </div>
                        <div class=" flex items-center">
                            <label for="position" class="mr-3">Position:</label>
                            <select name="position" class="outline-transparent bg-slate-900 px-3 py-1.5 rounded-lg"
                                    id="position">
                                <option value="10"
                                        class="position" >
                                    Top left
                                </option>
                                <option value="20"
                                        class="position">
                                    Top right
                                </option>
                                <option value="50"
                                        class="position">
                                    Bottom left
                                </option>
                                <option value="100"
                                        class="position">
                                    Bottom right
                                </option>
                                <option value="100"
                                        class="position" selected>
                                    Control bar
                                </option>
                            </select>

                        </div>
                    </div>
                    <div class="mt-2">
                        <label for="power">
                            Power URL
                        </label>
                        <div class="text-white col-span-2 rounded-lg flex items-center backdrop-blur-3xl px-2 hover:bg-slate-900 bg-slate-900/70">
                            <input type="text" id="power" name="power" value=""
                                   class="py-1.5 bg-transparent text-white placeholder:text-gray-400/80 placeholder:font-normal w-full mx-1 pl-2 appearance-none outline-none autofill:bg-yellow-200"
                                   placeholder="Power url">
                        </div>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-4 gap-4 mt-6">
                <h5 class="col-span-1 text-end">
                    Customize Poster
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
            <div class="grid grid-cols-4 gap-4 items-center mt-6">
                <h5 class="col-span-1 text-end">
                    Mode
                </h5>
                <div class="col-span-2 text-white font-normal grid grid-cols-2 gap-4 items-center">
                    <div class="flex">
                        <h5 class="mr-4">
                            Enable Caption/Subtitles
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
                            Thumbnail Gird Size
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
            <div class="text-center mt-3">
                <button type="submit" class="px-10 py-2 rounded-lg bg-blue-400 text-white" disabled>Save</button>
            </div>
        </div>
    </form>
</div>
