@extends('dashboard.layouts.app')

@section('content')
    <div class="flex flex-wrap -mx-3 flex-col-reverse lg:flex-row">
        <div class="w-full max-w-full px-3 mt-0 lg:w-9/12 text-white lg:flex-none">
            <div
                class="flex flex-col font-semibold" box-lifted>
                <div
                    class="tabs tabs-lifted z-10 -mb-[var(--tab-border)] justify-self-start items-start grid-cols-2 grid-rows-2 md:!flex">
                    <button
                        class="[--tab-border-color:#202940] md:shadow-[0_-8px_15px_0px_rgb(15,23,42,1)] row-start-auto tab tab-lifted w-max !text-green-400 text-white font-bold h-auto text-md px-4 tab-active [--tab-bg:#202940] !border-b-0 md:!border-b-1 !rounded-b-lg md:!rounded-b-none before:!hidden md:before:!block"
                        data-content="live"
                        data-title='<h5 class="text-green-400"><i class="material-icons">folder</i><i class="material-icons">navigate_next</i>folder1</h5>'>
                        <span class="px-2 py-1">Live Videos</span>
                    </button>
                    <button
                        class="[--tab-border-color:#202940] row-start-auto	tab tab-lifted w-max text-white font-bold h-auto text-md px-4 [--tab-bg:#202940] !border-b-0 md:!border-b-1 !rounded-b-lg md:!rounded-b-none before:!hidden md:before:!block"
                        data-content="processing" data-title='Processing Videos'>
                        <span class="px-2 py-1">Processing Videos</span>
                    </button>
                    <button
                        class="[--tab-border-color:#202940] row-start-auto	tab tab-lifted w-max text-white font-bold h-auto text-md px-4 [--tab-bg:#202940] !border-b-0 md:!border-b-1 !rounded-b-lg md:!rounded-b-none before:!hidden md:before:!block"
                        data-content="DMCA" data-title='DMCA Warnings'>
                        <span class="px-2 py-1">DMCA Warnings</span>
                    </button>
                    <button
                        class="[--tab-border-color:#202940] row-start-auto	tab tab-lifted w-max text-white font-bold h-auto text-md px-4 [--tab-bg:#202940] !border-b-0 md:!border-b-1 !rounded-b-lg md:!rounded-b-none before:!hidden md:before:!block"
                        data-content="removed" data-title='DMCA Warnings'>
                        <span class="px-2 py-1">Removed Videos</span>
                    </button>
                </div>
                <div class="mt-3 md:mt-0 rounded-b-box rounded-se-box relative  max-w-full w-full">
                    <div
                        class="border-[#202940] rounded-b-box rounded-se-box gap-2 bg-[#202940] bg-top [border-width:var(--tab-border)] undefined">
                        <div class="lg:min-h-[calc(100vh-11em)]">
                            <div class="rounded-xl">
                                <div class="relative rounded-xl bg-[#202940]">
                                    <div class="px-2 pt-4 md:p-4">
                                        <div class="mb-2 text-green-400" id='title'>
                                            <h5 class="">
                                                <i class="material-icons">folder</i>
                                                <i class="material-icons">navigate_next</i>
                                                {{ $currentFolderName -> name_folder }}
                                            </h5>
                                        </div>
                                        <div class="flex justify-between items-center w-full mb-3">
                                            <div class="text-sm bg-slate-900 rounded-lg p-2">
                                                <label for="limit">Show:</label>
                                                <select name="limit" class="bg-transparent outline-transparent" id="limit">
                                                    <option value="10" class="limit" {{ $videos->perPage() == 10 ? 'selected' : '' }}>10</option>
                                                    <option value="20" class="limit" {{ $videos->perPage() == 20 ? 'selected' : '' }}>20</option>
                                                    <option value="50" class="limit" {{ $videos->perPage() == 50 ? 'selected' : '' }}>50</option>
                                                    <option value="100" class="limit" {{ $videos->perPage() == 100 ? 'selected' : '' }}>100</option>
                                                </select>
                                                <span>entries</span>
                                            </div>
                                            <div class="grid grid-cols-4 grid-flow-col gap-2">
                                                <button type="button" btn-video disabled class="cursor-not-allowed"
                                                        title="delete">
                                                    <i btn-delete class="material-icons opacity-1 text-3xl">delete</i>
                                                </button>
                                                <button type="button" btn-video disabled class="cursor-not-allowed"
                                                        title="export">
                                                    <i btn-export
                                                       class="material-icons opacity-1 text-3xl">ios_share</i>
                                                </button>
                                                <button type="button" btn-video disabled class="cursor-not-allowed"
                                                        title="folder">
                                                    <i btn-move
                                                       class="material-icons opacity-1 text-3xl">folder_open</i>
                                                </button>
                                            </div>
                                        </div>
                                        <div id="live"
                                             class="tab-content flex flex-col bg-clip-border rounded-xl text-gray-700 bg-transparent">
                                            @include('dashboard.videos.table')
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div folder
             class="w-full max-w-full px-3 lg:w-3/12 lg:flex-none mb-5 lg:mb-0">
            <div class="mb-3">
                <div class="pl-3 rounded-lg flex justify-between items-center font-bold text-white">
                    <h3 class="text-lg">
                        My Folders
                    </h3>
                    <div class="flex items-center">
                <span
                    class="px-2 text-green-400 text-3xl h-full px-1 items-center flex material-icons cursor-pointer">create_new_folder</span>Add
                        Folder
                    </div>
                </div>
            </div>
            <div class="mb-3 mt-4 lg:mt-0">
                <div class="md:ml-auto">
                    <div class="flex items-center relative bg-slate-900 w-full rounded-lg ease" search>
                        <label
                            class="p-1 bg-slate-900 flex items-center translate-x-3 transition duration-300 ease-in-out z-10 absolute text-slate-400">Search
                            folder</label>
                        </span>
                        <input type="text" onkeyup="searchFolder(this)"
                               class="z-20 px-3 py-2 text-sm relative -ml-px block min-w-0 flex-auto rounded-lg text-white bg-transparent bg-clip-padding text-gray-700 focus:outline-none
                         border border-solid border-slate-900"
                               onfocus="focused(this)" onfocusout="defocused(this)"/>
                    </div>
                </div>

            </div>
            <div class="list-folder max-h-[calc(100vh-30em)] lg:max-h-[calc(100vh-14em)]  overflow-scroll">
                <div class="w-full overflow-hidden">
                    @foreach($folders as $folder)
                        @if ($folder -> name_folder === $currentFolderName -> name_folder)
                            <div class="item-folder rounded-lg text-white flex justify-between px-2 py-1.5 mb-2 bg-emerald-500">
                                <a href="{{ route("video.index", ['folderId' => $folder->id]) }}&limit={{ $videos->perPage() }}">
                                    {{$folder -> name_folder}}
                                </a>
                                <li class="list-none">
                                    <span class="relative"><a href="javascript:;" dropdown-trigger aria-expanded="false"><i
                                                class="material-icons">more_vert</i></a>
                                      <ul dropdown-menu
                                          class="text-sm transform-dropdown bg-[#1a2035] before:font-awesome before:leading-default before:duration-350 before:ease
                                             shadow-lg shadow-slate-900 duration-250 px-5 before:sm:right-1 before:text-5.5 pointer-events-none absolute right-1 top-8 z-10 lg:top-6
                                             origin-top list-none rounded-lg  bg-clip-padding text-white z-10
                                             px-2 py-4 text-left text-slate-500 opacity-0 transition-all before:absolute before:right-0 before:left-auto before:top-0 before:z-10
                                             before:inline-block before:font-normal before:text-[#1a2035] before:antialiased before:transition-all before:text-xl before:content-['▲'] sm:-mr-6                         lg:absolute lg:right-6 lg:left-auto lg:mt-2 lg:block lg:cursor-pointer">
                                        <!-- add show class on dropdown open js -->
                                        <li class="relative w-max"> <i class="material-icons opacity-1">edit_square</i> Edit File </li>
                                        <li class="relative my-3"> <i class="material-icons opacity-1">content_copy</i> Clone </li>
                                        <li class="relative"> <i class="material-icons opacity-1">delete</i> Delete </li>
                                      </ul>
                                    </span>
                                </li>
                            </div>
                        @else
                            <div class="item-folder rounded-lg text-white flex justify-between px-2 py-1.5 mb-2 bg-[#202940]">
                                <a href="{{ route("video.index", ['folderId' => $folder->id]) }}&limit={{ $videos->perPage() }}">
                                    {{$folder -> name_folder}}
                                </a>
                                <li class="list-none">
                                    <span class="relative"><a href="javascript:;" dropdown-trigger aria-expanded="false"><i
                                                class="material-icons">more_vert</i></a>
                                      <ul dropdown-menu
                                          class="text-sm transform-dropdown bg-[#1a2035] before:font-awesome before:leading-default before:duration-350 before:ease
                                             shadow-lg shadow-slate-900 duration-250 px-5 before:sm:right-1 before:text-5.5 pointer-events-none absolute right-1 top-8 z-10 lg:top-6
                                             origin-top list-none rounded-lg  bg-clip-padding text-white z-10
                                             px-2 py-4 text-left text-slate-500 opacity-0 transition-all before:absolute before:right-0 before:left-auto before:top-0 before:z-10
                                             before:inline-block before:font-normal before:text-[#1a2035] before:antialiased before:transition-all before:text-xl before:content-['▲'] sm:-mr-6                         lg:absolute lg:right-6 lg:left-auto lg:mt-2 lg:block lg:cursor-pointer">
                                        <!-- add show class on dropdown open js -->
                                        <li class="relative w-max"> <i class="material-icons opacity-1">edit_square</i> Edit File </li>
                                        <li class="relative my-3"> <i class="material-icons opacity-1">content_copy</i> Clone </li>
                                        <li class="relative"> <i class="material-icons opacity-1">delete</i> Delete </li>
                                      </ul>
                                    </span>
                                </li>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div fixed-video>
        <!-- -right-90 in loc de 0-->
        <div fixed-video-card
             class="opacity-0 hidden bg-black/20 z-50 shadow-3xl w-screen ease fixed top-0 left-0 flex h-full
           min-w-0 flex-col break-words rounded-none border-0 bg-clip-border duration-200 justify-center items-center px-3">
            <div class="absolute h-full w-full fixed-plugin-close-button z-10" fixed-video-close-button>
            </div>
            <div class="w-11/12 sm:w-4/5 xl:w-2/5 bg-[#202940] z-20 py-4 px-3 rounded-lg relative shadow-lg shadow-slate-900">
                <div class="absolute right-4 top-3">
                    <button fixed-video-close-button
                            class="inline-block p-0 text-sm font-bold leading-normal text-center uppercase align-middle transition-all ease-in bg-transparent border-0 rounded-lg shadow-none cursor-pointer hover:-translate-y-px tracking-tight-rem bg-150 bg-x-25 active:opacity-85 dark:text-white text-slate-700">
                        <i class="fa fa-close text-xl"></i>
                    </button>
                </div>
                <div>
                    <div class="edit hidden" id="edit">
                        <h5 class="mb-0 text-green-400 text-lg font-semibold">Edit file details</h5>
                        <form class="text-white mt-3">
                            <div class="grid grid-cols-3 gap-4 items-center">
                                <h5>
                                    Video title
                                </h5>
                                <div class="col-span-2 pr-2">
                                    <input type="text" class="pl-2 text-sm w-full focus:shadow-primary-outline ease leading-5.6 relative -ml-px block min-w-0 flex-auto rounded-lg border border-solid
                       border-gray-300 bg-slate-900 text-white bg-clip-padding py-2 pr-3 text-gray-700 transition-all placeholder:text-gray-500
                       focus:border-blue-500 focus:outline-none focus:transition-shadow" placeholder="title" />
                                </div>
                            </div>
                            <div class="grid grid-cols-3 gap-4 items-center my-4">
                                <h5>
                                    File URL
                                </h5>
                                <div class="col-span-2">
                                    https://cdnwish.com/2aw9nl106nz1
                                </div>
                            </div>
                            <div class="grid grid-cols-3 gap-4 items-center">
                                <h5>
                                    File name
                                </h5>
                                <div class="col-span-2 pr-2">
                                    <input type="text" class="pl-2 text-sm w-full focus:shadow-primary-outline ease leading-5.6 relative -ml-px block min-w-0 flex-auto rounded-lg border border-solid
                       border-gray-300 bg-slate-900 text-white bg-clip-padding py-2 pr-3 text-gray-700 transition-all placeholder:text-gray-500
                       focus:border-blue-500 focus:outline-none focus:transition-shadow" placeholder="title" />
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="export hidden" id="export">
                        <h5 class="mb-0 text-green-400 text-lg font-semibold">Files Export</h5>
                        <div class="grid mt-3" box-lifted>
                            <div
                                class="tabs tabs-lifted z-10 -mb-[var(--tab-border)] justify-self-start flex flex-col items-start md:grid">
                                <button
                                    class="[--tab-border-color:#202940] tab tab-lifted !text-green-400 text-white font-bold h-auto text-md px-4 tab-active [--tab-bg:#202940] !border-b-0 md:!border-b-1 !rounded-b-lg md:!rounded-b-none before:!hidden md:before:!block"
                                    data-content="EmbedLink">
                                    EmbedLink
                                </button>
                                <button
                                    class="[--tab-border-color:#202940] tab tab-lifted text-white font-bold h-auto text-md px-4 [--tab-bg:#202940] my-3 md:my-0 !border-b-0 md:!border-b-1 !rounded-b-lg md:!rounded-b-none before:!hidden md:before:~block"
                                    data-content="Embedcode">
                                    Embedcode
                                </button>
                                <button
                                    class="[--tab-border-color:#202940] tab tab-lifted text-white font-bold h-auto text-md px-4 [--tab-bg:#202940] !border-b-0 md:!border-b-1 !rounded-b-lg md:!rounded-b-none before:!hidden md:before:~block"
                                    data-content="Download">
                                    Download Link
                                </button>
                            </div>
                            <div class="mt-3 md:mt-0 rounded-b-box rounded-se-box relative">
                                <div
                                    class="border-[#202940] rounded-b-box rounded-se-box gap-2 bg-[#202940] bg-top py-4 pl-4 [border-width:var(--tab-border)] undefined">
                                    <div id="EmbedLink" class="tab-content">
                  <textarea class="bg-transparent w-full h-[calc(40vh)] text-white max-h-96 overflow-auto">
                  https://emturbovid.com/t/T5B4a98tFrsoP34cLEXt
https://emturbovid.com/t/bnUHFva0i5jxnL2CH3uj
https://emturbovid.com/t/I9UlNwqosiCbgX0PFvCt
https://emturbovid.com/t/4z0hxvOFTpE1B0E5bO1g
https://emturbovid.com/t/j0Fhz4cNCg12JmqwSaIe
https://emturbovid.com/t/HcRwsKuAUvMH3oHpNnc0
https://emturbovid.com/t/AAmAEtT7J7pTs69fhKs4
https://emturbovid.com/t/YkjmoAP32WsvvTYXuFjV
https://emturbovid.com/t/PofTAi0groYABBxRaPDT
https://emturbovid.com/t/gKOTOSJcHUt8H6sAbdqy
https://emturbovid.com/t/8J41s6OiwWTXRQWdM7n8
https://emturbovid.com/t/wKk6pazVdUHgjb0Y9o0G
https://emturbovid.com/t/1IKbid4fLVA6DqruNx6v
https://emturbovid.com/t/H4Vx40RHhSfVIxE25Qob
https://emturbovid.com/t/w8CSTdIZjEvChO5cyqrv
https://emturbovid.com/t/XPPNQ1XJLbzhAzslauEQ
https://emturbovid.com/t/7Uh3yUVXaBZtx16qElzH
https://emturbovid.com/t/OXHZT3WTrMLLyOH1RHoY
https://emturbovid.com/t/wkjtdUkcQHRc1K6zSaAf
https://emturbovid.com/t/rEOeEjT8OdHXIZekxRE2
https://emturbovid.com/t/GPamIJAd1cgnDAEW58h8
https://emturbovid.com/t/a6K4iE9uO13LvnsmpHT4
https://emturbovid.com/t/YCWpUaCpK60PAdGC22Ii
https://emturbovid.com/t/tn1Ldgdyc49U5eqcMrdC
https://emturbovid.com/t/SJA7xgbg6sfYU0CEtNoE
https://emturbovid.com/t/5jwFs9PQka9bai4saVgv
https://emturbovid.com/t/WWdV9xmbqnhy3g6XVhdI
https://emturbovid.com/t/BLhqpMHhSchG135wU8r6
https://emturbovid.com/t/wxSkYEYgZJvNR02lTTVl
https://emturbovid.com/t/yWUTmTKwVsGx6VBkanWK
https://emturbovid.com/t/I3Oawy50f4LVinNnQb8T
https://emturbovid.com/t/CySzCvbVuUeknAl40s0F
https://emturbovid.com/t/b5vhk5RAbfe7Jjn7PpWV
https://emturbovid.com/t/JNkxH7KxCaoczRZmugRS
https://emturbovid.com/t/uDe7W8NyGGlvfP5mPOFJ
https://emturbovid.com/t/DJvjAdX2c6t6YJ2UKYaw
https://emturbovid.com/t/WVLakiRxe33dIj91Gab2
https://emturbovid.com/t/ZLGB9YN1W9xF05mayTtW
https://emturbovid.com/t/YWHKzfujhDTffoQSyKq8
https://emturbovid.com/t/FshDhLoNA0j6RrlW0tAi
https://emturbovid.com/t/Bb3ZjDzYx30PuGyAVv0n
https://emturbovid.com/t/GWSMDJZplBRsj4kr6IBB
https://emturbovid.com/t/zmNOqP7vKSA3YisKOy3x
https://emturbovid.com/t/H7579TG9OFjpTi3wOQOY
https://emturbovid.com/t/wfeUsDAIRecyyEyH18Er
https://emturbovid.com/t/h1PhIX89DzBPORiH6ySg
https://emturbovid.com/t/XU8nUv4qymqxeGZAiGhw
https://emturbovid.com/t/MmsQlIKBWpHXymEDaUEc
https://emturbovid.com/t/Ooo0EYTAbcPwLw88CyHW
https://emturbovid.com/t/4TwzOXN6nBpu1uopS9bS

                </textarea>
                                    </div>
                                    <div id="Embedcode" class="tab-content">
                  <textarea class="bg-transparent w-full h-[calc(40vh)] text-white max-h-96 overflow-auto">
<iframe src="https://emturbovid.com/t/T5B4a98tFrsoP34cLEXt" width="800" height="600" allowfullscreen allowtransparency allow="autoplay" scrolling="no" frameborder="0"></iframe>
<iframe src="https://emturbovid.com/t/bnUHFva0i5jxnL2CH3uj" width="800" height="600" allowfullscreen allowtransparency allow="autoplay" scrolling="no" frameborder="0"></iframe>
<iframe src="https://emturbovid.com/t/I9UlNwqosiCbgX0PFvCt" width="800" height="600" allowfullscreen allowtransparency allow="autoplay" scrolling="no" frameborder="0"></iframe>
<iframe src="https://emturbovid.com/t/4z0hxvOFTpE1B0E5bO1g" width="800" height="600" allowfullscreen allowtransparency allow="autoplay" scrolling="no" frameborder="0"></iframe>
<iframe src="https://emturbovid.com/t/j0Fhz4cNCg12JmqwSaIe" width="800" height="600" allowfullscreen allowtransparency allow="autoplay" scrolling="no" frameborder="0"></iframe>
<iframe src="https://emturbovid.com/t/HcRwsKuAUvMH3oHpNnc0" width="800" height="600" allowfullscreen allowtransparency allow="autoplay" scrolling="no" frameborder="0"></iframe>
<iframe src="https://emturbovid.com/t/AAmAEtT7J7pTs69fhKs4" width="800" height="600" allowfullscreen allowtransparency allow="autoplay" scrolling="no" frameborder="0"></iframe>
<iframe src="https://emturbovid.com/t/YkjmoAP32WsvvTYXuFjV" width="800" height="600" allowfullscreen allowtransparency allow="autoplay" scrolling="no" frameborder="0"></iframe>
<iframe src="https://emturbovid.com/t/PofTAi0groYABBxRaPDT" width="800" height="600" allowfullscreen allowtransparency allow="autoplay" scrolling="no" frameborder="0"></iframe>
<iframe src="https://emturbovid.com/t/gKOTOSJcHUt8H6sAbdqy" width="800" height="600" allowfullscreen allowtransparency allow="autoplay" scrolling="no" frameborder="0"></iframe>
<iframe src="https://emturbovid.com/t/8J41s6OiwWTXRQWdM7n8" width="800" height="600" allowfullscreen allowtransparency allow="autoplay" scrolling="no" frameborder="0"></iframe>
<iframe src="https://emturbovid.com/t/wKk6pazVdUHgjb0Y9o0G" width="800" height="600" allowfullscreen allowtransparency allow="autoplay" scrolling="no" frameborder="0"></iframe>
<iframe src="https://emturbovid.com/t/1IKbid4fLVA6DqruNx6v" width="800" height="600" allowfullscreen allowtransparency allow="autoplay" scrolling="no" frameborder="0"></iframe>
<iframe src="https://emturbovid.com/t/H4Vx40RHhSfVIxE25Qob" width="800" height="600" allowfullscreen allowtransparency allow="autoplay" scrolling="no" frameborder="0"></iframe>
<iframe src="https://emturbovid.com/t/w8CSTdIZjEvChO5cyqrv" width="800" height="600" allowfullscreen allowtransparency allow="autoplay" scrolling="no" frameborder="0"></iframe>
<iframe src="https://emturbovid.com/t/XPPNQ1XJLbzhAzslauEQ" width="800" height="600" allowfullscreen allowtransparency allow="autoplay" scrolling="no" frameborder="0"></iframe>
<iframe src="https://emturbovid.com/t/7Uh3yUVXaBZtx16qElzH" width="800" height="600" allowfullscreen allowtransparency allow="autoplay" scrolling="no" frameborder="0"></iframe>
<iframe src="https://emturbovid.com/t/OXHZT3WTrMLLyOH1RHoY" width="800" height="600" allowfullscreen allowtransparency allow="autoplay" scrolling="no" frameborder="0"></iframe>
<iframe src="https://emturbovid.com/t/wkjtdUkcQHRc1K6zSaAf" width="800" height="600" allowfullscreen allowtransparency allow="autoplay" scrolling="no" frameborder="0"></iframe>
<iframe src="https://emturbovid.com/t/rEOeEjT8OdHXIZekxRE2" width="800" height="600" allowfullscreen allowtransparency allow="autoplay" scrolling="no" frameborder="0"></iframe>
<iframe src="https://emturbovid.com/t/GPamIJAd1cgnDAEW58h8" width="800" height="600" allowfullscreen allowtransparency allow="autoplay" scrolling="no" frameborder="0"></iframe>
<iframe src="https://emturbovid.com/t/a6K4iE9uO13LvnsmpHT4" width="800" height="600" allowfullscreen allowtransparency allow="autoplay" scrolling="no" frameborder="0"></iframe>
<iframe src="https://emturbovid.com/t/YCWpUaCpK60PAdGC22Ii" width="800" height="600" allowfullscreen allowtransparency allow="autoplay" scrolling="no" frameborder="0"></iframe>
<iframe src="https://emturbovid.com/t/tn1Ldgdyc49U5eqcMrdC" width="800" height="600" allowfullscreen allowtransparency allow="autoplay" scrolling="no" frameborder="0"></iframe>
<iframe src="https://emturbovid.com/t/SJA7xgbg6sfYU0CEtNoE" width="800" height="600" allowfullscreen allowtransparency allow="autoplay" scrolling="no" frameborder="0"></iframe>
<iframe src="https://emturbovid.com/t/5jwFs9PQka9bai4saVgv" width="800" height="600" allowfullscreen allowtransparency allow="autoplay" scrolling="no" frameborder="0"></iframe>
<iframe src="https://emturbovid.com/t/WWdV9xmbqnhy3g6XVhdI" width="800" height="600" allowfullscreen allowtransparency allow="autoplay" scrolling="no" frameborder="0"></iframe>
<iframe src="https://emturbovid.com/t/BLhqpMHhSchG135wU8r6" width="800" height="600" allowfullscreen allowtransparency allow="autoplay" scrolling="no" frameborder="0"></iframe>
<iframe src="https://emturbovid.com/t/wxSkYEYgZJvNR02lTTVl" width="800" height="600" allowfullscreen allowtransparency allow="autoplay" scrolling="no" frameborder="0"></iframe>
<iframe src="https://emturbovid.com/t/yWUTmTKwVsGx6VBkanWK" width="800" height="600" allowfullscreen allowtransparency allow="autoplay" scrolling="no" frameborder="0"></iframe>
<iframe src="https://emturbovid.com/t/I3Oawy50f4LVinNnQb8T" width="800" height="600" allowfullscreen allowtransparency allow="autoplay" scrolling="no" frameborder="0"></iframe>
<iframe src="https://emturbovid.com/t/CySzCvbVuUeknAl40s0F" width="800" height="600" allowfullscreen allowtransparency allow="autoplay" scrolling="no" frameborder="0"></iframe>
<iframe src="https://emturbovid.com/t/b5vhk5RAbfe7Jjn7PpWV" width="800" height="600" allowfullscreen allowtransparency allow="autoplay" scrolling="no" frameborder="0"></iframe>
<iframe src="https://emturbovid.com/t/JNkxH7KxCaoczRZmugRS" width="800" height="600" allowfullscreen allowtransparency allow="autoplay" scrolling="no" frameborder="0"></iframe>
<iframe src="https://emturbovid.com/t/uDe7W8NyGGlvfP5mPOFJ" width="800" height="600" allowfullscreen allowtransparency allow="autoplay" scrolling="no" frameborder="0"></iframe>
<iframe src="https://emturbovid.com/t/DJvjAdX2c6t6YJ2UKYaw" width="800" height="600" allowfullscreen allowtransparency allow="autoplay" scrolling="no" frameborder="0"></iframe>
<iframe src="https://emturbovid.com/t/WVLakiRxe33dIj91Gab2" width="800" height="600" allowfullscreen allowtransparency allow="autoplay" scrolling="no" frameborder="0"></iframe>
<iframe src="https://emturbovid.com/t/ZLGB9YN1W9xF05mayTtW" width="800" height="600" allowfullscreen allowtransparency allow="autoplay" scrolling="no" frameborder="0"></iframe>
<iframe src="https://emturbovid.com/t/YWHKzfujhDTffoQSyKq8" width="800" height="600" allowfullscreen allowtransparency allow="autoplay" scrolling="no" frameborder="0"></iframe>
<iframe src="https://emturbovid.com/t/FshDhLoNA0j6RrlW0tAi" width="800" height="600" allowfullscreen allowtransparency allow="autoplay" scrolling="no" frameborder="0"></iframe>
<iframe src="https://emturbovid.com/t/Bb3ZjDzYx30PuGyAVv0n" width="800" height="600" allowfullscreen allowtransparency allow="autoplay" scrolling="no" frameborder="0"></iframe>
<iframe src="https://emturbovid.com/t/GWSMDJZplBRsj4kr6IBB" width="800" height="600" allowfullscreen allowtransparency allow="autoplay" scrolling="no" frameborder="0"></iframe>
<iframe src="https://emturbovid.com/t/zmNOqP7vKSA3YisKOy3x" width="800" height="600" allowfullscreen allowtransparency allow="autoplay" scrolling="no" frameborder="0"></iframe>
<iframe src="https://emturbovid.com/t/H7579TG9OFjpTi3wOQOY" width="800" height="600" allowfullscreen allowtransparency allow="autoplay" scrolling="no" frameborder="0"></iframe>
<iframe src="https://emturbovid.com/t/wfeUsDAIRecyyEyH18Er" width="800" height="600" allowfullscreen allowtransparency allow="autoplay" scrolling="no" frameborder="0"></iframe>
<iframe src="https://emturbovid.com/t/h1PhIX89DzBPORiH6ySg" width="800" height="600" allowfullscreen allowtransparency allow="autoplay" scrolling="no" frameborder="0"></iframe>
<iframe src="https://emturbovid.com/t/XU8nUv4qymqxeGZAiGhw" width="800" height="600" allowfullscreen allowtransparency allow="autoplay" scrolling="no" frameborder="0"></iframe>
<iframe src="https://emturbovid.com/t/MmsQlIKBWpHXymEDaUEc" width="800" height="600" allowfullscreen allowtransparency allow="autoplay" scrolling="no" frameborder="0"></iframe>
<iframe src="https://emturbovid.com/t/Ooo0EYTAbcPwLw88CyHW" width="800" height="600" allowfullscreen allowtransparency allow="autoplay" scrolling="no" frameborder="0"></iframe>
<iframe src="https://emturbovid.com/t/4TwzOXN6nBpu1uopS9bS" width="800" height="600" allowfullscreen allowtransparency allow="autoplay" scrolling="no" frameborder="0"></iframe>
                </textarea>
                                    </div>
                                    <div id="Download" class="tab-content">
                  <textarea class="bg-transparent w-full h-[calc(40vh)] text-white max-h-96 overflow-auto">
<iframe src="https://emturbovid.com/t/T5B4a98tFrsoP34cLEXt" width="800" height="600" allowfullscreen allowtransparency allow="autoplay" scrolling="no" frameborder="0"></iframe>
<iframe src="https://emturbovid.com/t/bnUHFva0i5jxnL2CH3uj" width="800" height="600" allowfullscreen allowtransparency allow="autoplay" scrolling="no" frameborder="0"></iframe>
<iframe src="https://emturbovid.com/t/I9UlNwqosiCbgX0PFvCt" width="800" height="600" allowfullscreen allowtransparency allow="autoplay" scrolling="no" frameborder="0"></iframe>
<iframe src="https://emturbovid.com/t/4z0hxvOFTpE1B0E5bO1g" width="800" height="600" allowfullscreen allowtransparency allow="autoplay" scrolling="no" frameborder="0"></iframe>
<iframe src="https://emturbovid.com/t/j0Fhz4cNCg12JmqwSaIe" width="800" height="600" allowfullscreen allowtransparency allow="autoplay" scrolling="no" frameborder="0"></iframe>
<iframe src="https://emturbovid.com/t/HcRwsKuAUvMH3oHpNnc0" width="800" height="600" allowfullscreen allowtransparency allow="autoplay" scrolling="no" frameborder="0"></iframe>
<iframe src="https://emturbovid.com/t/AAmAEtT7J7pTs69fhKs4" width="800" height="600" allowfullscreen allowtransparency allow="autoplay" scrolling="no" frameborder="0"></iframe>
<iframe src="https://emturbovid.com/t/YkjmoAP32WsvvTYXuFjV" width="800" height="600" allowfullscreen allowtransparency allow="autoplay" scrolling="no" frameborder="0"></iframe>
<iframe src="https://emturbovid.com/t/PofTAi0groYABBxRaPDT" width="800" height="600" allowfullscreen allowtransparency allow="autoplay" scrolling="no" frameborder="0"></iframe>
<iframe src="https://emturbovid.com/t/gKOTOSJcHUt8H6sAbdqy" width="800" height="600" allowfullscreen allowtransparency allow="autoplay" scrolling="no" frameborder="0"></iframe>
<iframe src="https://emturbovid.com/t/8J41s6OiwWTXRQWdM7n8" width="800" height="600" allowfullscreen allowtransparency allow="autoplay" scrolling="no" frameborder="0"></iframe>
<iframe src="https://emturbovid.com/t/wKk6pazVdUHgjb0Y9o0G" width="800" height="600" allowfullscreen allowtransparency allow="autoplay" scrolling="no" frameborder="0"></iframe>
<iframe src="https://emturbovid.com/t/1IKbid4fLVA6DqruNx6v" width="800" height="600" allowfullscreen allowtransparency allow="autoplay" scrolling="no" frameborder="0"></iframe>
<iframe src="https://emturbovid.com/t/H4Vx40RHhSfVIxE25Qob" width="800" height="600" allowfullscreen allowtransparency allow="autoplay" scrolling="no" frameborder="0"></iframe>
<iframe src="https://emturbovid.com/t/w8CSTdIZjEvChO5cyqrv" width="800" height="600" allowfullscreen allowtransparency allow="autoplay" scrolling="no" frameborder="0"></iframe>
<iframe src="https://emturbovid.com/t/XPPNQ1XJLbzhAzslauEQ" width="800" height="600" allowfullscreen allowtransparency allow="autoplay" scrolling="no" frameborder="0"></iframe>
<iframe src="https://emturbovid.com/t/7Uh3yUVXaBZtx16qElzH" width="800" height="600" allowfullscreen allowtransparency allow="autoplay" scrolling="no" frameborder="0"></iframe>
<iframe src="https://emturbovid.com/t/OXHZT3WTrMLLyOH1RHoY" width="800" height="600" allowfullscreen allowtransparency allow="autoplay" scrolling="no" frameborder="0"></iframe>
<iframe src="https://emturbovid.com/t/wkjtdUkcQHRc1K6zSaAf" width="800" height="600" allowfullscreen allowtransparency allow="autoplay" scrolling="no" frameborder="0"></iframe>
<iframe src="https://emturbovid.com/t/rEOeEjT8OdHXIZekxRE2" width="800" height="600" allowfullscreen allowtransparency allow="autoplay" scrolling="no" frameborder="0"></iframe>
<iframe src="https://emturbovid.com/t/GPamIJAd1cgnDAEW58h8" width="800" height="600" allowfullscreen allowtransparency allow="autoplay" scrolling="no" frameborder="0"></iframe>
<iframe src="https://emturbovid.com/t/a6K4iE9uO13LvnsmpHT4" width="800" height="600" allowfullscreen allowtransparency allow="autoplay" scrolling="no" frameborder="0"></iframe>
<iframe src="https://emturbovid.com/t/YCWpUaCpK60PAdGC22Ii" width="800" height="600" allowfullscreen allowtransparency allow="autoplay" scrolling="no" frameborder="0"></iframe>
<iframe src="https://emturbovid.com/t/tn1Ldgdyc49U5eqcMrdC" width="800" height="600" allowfullscreen allowtransparency allow="autoplay" scrolling="no" frameborder="0"></iframe>
<iframe src="https://emturbovid.com/t/SJA7xgbg6sfYU0CEtNoE" width="800" height="600" allowfullscreen allowtransparency allow="autoplay" scrolling="no" frameborder="0"></iframe>
<iframe src="https://emturbovid.com/t/5jwFs9PQka9bai4saVgv" width="800" height="600" allowfullscreen allowtransparency allow="autoplay" scrolling="no" frameborder="0"></iframe>
<iframe src="https://emturbovid.com/t/WWdV9xmbqnhy3g6XVhdI" width="800" height="600" allowfullscreen allowtransparency allow="autoplay" scrolling="no" frameborder="0"></iframe>
<iframe src="https://emturbovid.com/t/BLhqpMHhSchG135wU8r6" width="800" height="600" allowfullscreen allowtransparency allow="autoplay" scrolling="no" frameborder="0"></iframe>
<iframe src="https://emturbovid.com/t/wxSkYEYgZJvNR02lTTVl" width="800" height="600" allowfullscreen allowtransparency allow="autoplay" scrolling="no" frameborder="0"></iframe>
<iframe src="https://emturbovid.com/t/yWUTmTKwVsGx6VBkanWK" width="800" height="600" allowfullscreen allowtransparency allow="autoplay" scrolling="no" frameborder="0"></iframe>
<iframe src="https://emturbovid.com/t/I3Oawy50f4LVinNnQb8T" width="800" height="600" allowfullscreen allowtransparency allow="autoplay" scrolling="no" frameborder="0"></iframe>
<iframe src="https://emturbovid.com/t/CySzCvbVuUeknAl40s0F" width="800" height="600" allowfullscreen allowtransparency allow="autoplay" scrolling="no" frameborder="0"></iframe>
<iframe src="https://emturbovid.com/t/b5vhk5RAbfe7Jjn7PpWV" width="800" height="600" allowfullscreen allowtransparency allow="autoplay" scrolling="no" frameborder="0"></iframe>
<iframe src="https://emturbovid.com/t/JNkxH7KxCaoczRZmugRS" width="800" height="600" allowfullscreen allowtransparency allow="autoplay" scrolling="no" frameborder="0"></iframe>
<iframe src="https://emturbovid.com/t/uDe7W8NyGGlvfP5mPOFJ" width="800" height="600" allowfullscreen allowtransparency allow="autoplay" scrolling="no" frameborder="0"></iframe>
<iframe src="https://emturbovid.com/t/DJvjAdX2c6t6YJ2UKYaw" width="800" height="600" allowfullscreen allowtransparency allow="autoplay" scrolling="no" frameborder="0"></iframe>
<iframe src="https://emturbovid.com/t/WVLakiRxe33dIj91Gab2" width="800" height="600" allowfullscreen allowtransparency allow="autoplay" scrolling="no" frameborder="0"></iframe>
<iframe src="https://emturbovid.com/t/ZLGB9YN1W9xF05mayTtW" width="800" height="600" allowfullscreen allowtransparency allow="autoplay" scrolling="no" frameborder="0"></iframe>
<iframe src="https://emturbovid.com/t/YWHKzfujhDTffoQSyKq8" width="800" height="600" allowfullscreen allowtransparency allow="autoplay" scrolling="no" frameborder="0"></iframe>
<iframe src="https://emturbovid.com/t/FshDhLoNA0j6RrlW0tAi" width="800" height="600" allowfullscreen allowtransparency allow="autoplay" scrolling="no" frameborder="0"></iframe>
<iframe src="https://emturbovid.com/t/Bb3ZjDzYx30PuGyAVv0n" width="800" height="600" allowfullscreen allowtransparency allow="autoplay" scrolling="no" frameborder="0"></iframe>
<iframe src="https://emturbovid.com/t/GWSMDJZplBRsj4kr6IBB" width="800" height="600" allowfullscreen allowtransparency allow="autoplay" scrolling="no" frameborder="0"></iframe>
<iframe src="https://emturbovid.com/t/zmNOqP7vKSA3YisKOy3x" width="800" height="600" allowfullscreen allowtransparency allow="autoplay" scrolling="no" frameborder="0"></iframe>
<iframe src="https://emturbovid.com/t/H7579TG9OFjpTi3wOQOY" width="800" height="600" allowfullscreen allowtransparency allow="autoplay" scrolling="no" frameborder="0"></iframe>
<iframe src="https://emturbovid.com/t/wfeUsDAIRecyyEyH18Er" width="800" height="600" allowfullscreen allowtransparency allow="autoplay" scrolling="no" frameborder="0"></iframe>
<iframe src="https://emturbovid.com/t/h1PhIX89DzBPORiH6ySg" width="800" height="600" allowfullscreen allowtransparency allow="autoplay" scrolling="no" frameborder="0"></iframe>
<iframe src="https://emturbovid.com/t/XU8nUv4qymqxeGZAiGhw" width="800" height="600" allowfullscreen allowtransparency allow="autoplay" scrolling="no" frameborder="0"></iframe>
<iframe src="https://emturbovid.com/t/MmsQlIKBWpHXymEDaUEc" width="800" height="600" allowfullscreen allowtransparency allow="autoplay" scrolling="no" frameborder="0"></iframe>
<iframe src="https://emturbovid.com/t/Ooo0EYTAbcPwLw88CyHW" width="800" height="600" allowfullscreen allowtransparency allow="autoplay" scrolling="no" frameborder="0"></iframe>
<iframe src="https://emturbovid.com/t/4TwzOXN6nBpu1uopS9bS" width="800" height="600" allowfullscreen allowtransparency allow="autoplay" scrolling="no" frameborder="0"></iframe>
                </textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="delete hidden" id="delete">
                        <h5 class="mt-4 mb-0 dark:text-white">delete</h5>
                    </div>
                    <div class="move hidden" id="move">
                        <h5 class="mb-0 text-green-400 text-lg font-semibold">Choose folder to move selected to</h5>
                        <div class="mt-3" folder>
                            <div class="grid grid-cols-3 md:flex items-center w-full">
                                <div class="col-span-2 relative flex flex-wrap mr-3 items-stretch transition-all rounded-lg ease">
                                <span
                                    class="text-sm ease leading-5.6 absolute z-10 -ml-px flex h-full items-center whitespace-nowrap rounded-lg rounded-tr-none rounded-br-none border border-r-0 border-transparent bg-transparent py-2 px-2.5 text-center font-normal text-slate-500 transition-all">
                                  <i class="fas fa-search"></i>
                                </span>
                                    <input type="text" onkeyup="searchFolder(this)"
                                           class="pl-9 text-sm focus:shadow-primary-outline ease leading-5.6 relative -ml-px block min-w-0 flex-auto rounded-lg border border-solid border-gray-300 bg-slate-900 text-white bg-clip-padding py-2 pr-3 text-gray-700 transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none focus:transition-shadow"
                                           placeholder="Search folder" />
                                </div>
                                <div class="rounded-lg bg-gradient-to-r from-blue-400 to-green-500 text-white">
                                    <button class="w-max font-semibold text-sm md:text-base	 py-2 px-1.5 md:px-3">
                                        Filter Folders
                                    </button>
                                </div>
                            </div>
                            <div class="grid grid-cols-3 sm:grid-cols-4 lg:grid-cols-6 gap-4 text-white mt-2 min-h-80 max-h-80 overflow-auto">
                                @foreach($folders as $folder)
                                    <div class="item-folder text-center">
                                        <div class="text-center">
                                            <i class="material-icons text-3xl">folder</i>
                                        </div>
                                        <h5>
                                            {{$folder -> name_folder}}
                                        </h5>
                                    </div>
                                @endforeach
                            </div>
                            <div class="pt-2 w-max text-white">
                                <button class="rounded-lg bg-gradient-to-r from-yellow-600 to-rose-400 w-max font-semibold text-md py-2.5 px-5">
                                    Move To Folder
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
