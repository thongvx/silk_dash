@extends('dashboard.layouts.app')

@section('content')
    <div class="min-h-[calc(100vh-10em)]">
        <div class="flex flex-col" box-lifted>
            <div class="tabs tabs-lifted z-10 -mb-[var(--tab-border)] justify-self-start items-start grid-cols-2 grid-rows-2 md:!flex">
                <button
                    class="tab-lifted [--tab-border-color:#202940] tab !text-green-400 text-white font-bold h-auto text-md px-4 tab-active [--tab-bg:#202940] !border-b-0 md:!border-b-1 !rounded-b-lg md:!rounded-b-none before:!hidden md:before:!block"
                    data-content="file-upload">
                    <i class="material-icons mr-3 py-2">cloud_upload</i>File Upload
                </button>
                <button
                    class="tab-lifted [--tab-border-color:#202940] tab text-white font-bold h-auto text-md px-4 [--tab-bg:#202940] my-3 md:my-0 !border-b-0 md:!border-b-1 !rounded-b-lg md:!rounded-b-none before:!hidden md:before:!block"
                    data-content="remote">
                    <i class="material-icons mr-3 py-2">link</i>Remote / URL Upload
                </button>
                <button
                    class="tab-lifted [--tab-border-color:#202940] tab text-white font-bold h-auto text-md px-4 [--tab-bg:#202940] !border-b-0 md:!border-b-1 !rounded-b-lg md:!rounded-b-none before:!hidden md:before:!block"
                    data-content="clone">
                    <i class="material-icons mr-3 py-2">content_copy</i>Clone Upload
                </button>
            </div>
            <div class="mt-3 md:mt-0 rounded-b-box rounded-se-box relative">
                <div class="border-[#202940] rounded-b-box rounded-se-box gap-2 bg-[#202940] bg-top p-4 [border-width:var(--tab-border)] undefined">
                    <div id="file-upload" class="tab-content" file-upload>
                        <div class="text-center pb-10">
                            <div class="text-start block text-sm font-medium leading-6 text-green-400 italic">
                                You can upload multiple video files per a session with total sizes up to 100 GB
                            </div>
                            <hr class="h-px my-6 bg-transparent bg-gradient-to-r from-transparent via-white to-transparent border-none" />
                            <form class='lg:mx-32 from-current' onsubmit="uploadFile(event)">
                                <label htmlfor="file" class="rounded-xl py-10 bg-slate-900 flex justify-center flex-col h-full w-full relative ">
                                    <span class='font-semibold text-green-400'>Select Video files to upload</span>
                                    <p class="pl-1">or drag and drop</p>
                                    <input id="file"  name="file" accept="video/*" type="file" multiple class="opacity-0 absolute cursor-pointer z-20 h-full w-full top-0 left-0" />
                                </label>
                                <input class="hidden" type="text" id="userID" name="userID" value="{{\Illuminate\Support\Facades\Auth::user()->id}}">
                                <input class="hidden" type="text" id="nameFolderPost" name="nameFolder" value="single videos">
                            </form>
                            <div id="list-upload">
                            </div>
                        </div>
                        <div class='-mb-12 bg-slate-900 mx-6 rounded-xl'>
                            <h3 class='py-4 px-3 dark:text-white font-bold'>Save To <span>Single Videos( Default Folder)</span></h3>
                        </div>
                    </div>
                    <div id="remote" class="tab-content">
                        <form class='from-current pb-8'>
                            <div class="col-span-full text-center">
                                <div class="noti text-green-400 italic">
                                    <label htmlFor="cover-photo" class="text-start block text-sm font-medium leading-6">
                                        After submiting torrent, only files with allowed extensions (mkv, wmv, avi, mp4,
                                        mpeg4, mpegps, flv, 3gp, webm, mov, mpg, m4v) and allowed size (less than 10GB)
                                        will be shown, then you can select one or more files for uploading.
                                    </label>
                                    <label htmlFor="cover-photo" class="text-start block text-sm font-medium leading-6">
                                        Please note each task has maximum 24 hours to finish downloading, after that it
                                        will be cleared. If you facing any issues, please open support ticket and let us
                                        know
                                    </label>
                                </div>
                                <hr class="h-px my-6 bg-transparent bg-gradient-to-r from-transparent via-white to-transparent border-none" />
                                <div
                                    class="mt-2 lg:mx-32 shadow-lg hover:shadow-indigo-500/40 hover:border-indigo-600 dark:hover:border-indigo-600 flex justify-center relative rounded-lg border border-solid border-gray-900/25 dark:border-gray-200">
                                    <textarea name="" id="" class='w-full bg-transparent rounded-xl px-2 py-1' rows="8"></textarea>
                                </div>
                                <button type="submit"
                                        class='font-semibold hover:text-indigo-600 dark:hover:text-indigo-600 mt-4 dark:text-white rounded-lg px-6 py-1.5 shadow-lg shadow-gray-400/50 dark:shadow-slate-900 bg-gray-100 dark:bg-gray-900'>Submit</button>
                            </div>
                        </form>
                        <div class='-mb-12 bg-slate-900 mx-6 rounded-xl'>
                            <h3 class='py-4 px-3 dark:text-white font-bold'>Save To <span>Single Videos( Default
                          Folder)</span></h3>
                        </div>
                    </div>
                    <div id="clone" class="tab-content">
                        <form class='from-current pb-8'>
                            <div class="col-span-full text-center">
                                <div class="noti text-green-400 italic">
                                    <label htmlFor="cover-photo" class="text-start block text-sm font-medium leading-6">
                                        You can enter up to 100 URLs:
                                    </label>
                                </div>
                                <hr class="h-px my-6 bg-transparent bg-gradient-to-r from-transparent via-white to-transparent border-none" />
                                <div
                                    class="mt-2 lg:mx-32 shadow-lg hover:shadow-indigo-500/40 hover:border-indigo-600 dark:hover:border-indigo-600 flex justify-center relative rounded-lg border border-solid border-gray-900/25 dark:border-gray-200">
                                    <textarea name="" id="" class='w-full bg-transparent rounded-xl px-2 py-1' rows="8"></textarea>
                                </div>
                                <button type="submit"
                                        class='font-semibold hover:text-indigo-600 dark:hover:text-indigo-600 mt-4 dark:text-white rounded-lg px-6 py-1.5 shadow-lg shadow-gray-400/50 dark:shadow-slate-900 bg-gray-100 dark:bg-gray-900'>Submit</button>
                            </div>
                        </form>
                        <div class='-mb-12 bg-slate-900 mx-6 rounded-xl'>
                            <h3 class='py-4 px-3 dark:text-white font-bold'>Save To <span>Single Videos( Default
                        Folder)</span></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-10 bg-[#202940] rounded-xl py-3">
            <div class="text-white text-lg font-bold pl-3 pt-3">File Upload</div>
            <hr class="h-px my-3 bg-transparent bg-gradient-to-r from-transparent via-white to-transparent border-none" />
            <div class="text-center text-emerald-500 font-bold">
                No Active Tasks
            </div>


        </div>
    </div>
@endsection
