@extends('layouts.app')

@section('content')
    <div class="flex flex-wrap -mx-3 flex-col-reverse lg:flex-row">
        <div class="w-full max-w-full px-3 mt-0 text-white lg:flex-none ">
            <div class="mt-3 md:mt-0 rounded-b-box rounded-se-box relative  max-w-full w-full rounded-xl">
                <div class="rounded-xl gap-2 bg-[#121520] pb-4">
                    <div class="px-2 pt-4 md:p-4 ">
                        <div class="flex justify-center items-center w-full mb-3">
                            <div class="text-transparent bg-clip-text bg-gradient-to-r from-purple-500 to-pink-500">
                                <h4 class="text-xl">DMCA Report From "copyright@govinet.com"</h4>
                            </div>
                        </div>
                        <div class="tab-content flex flex-col bg-clip-border rounded-xl text-gray-700 bg-transparent">
                            <div class="px-0 pt-0 overflow-auto text-white text-lg">
                                <div class="flex items-center">
                                    <h4 class="text-[#009FB2]">Status:</h4>
                                    <span class="bg-emerald-400 px-4 py-0.5 rounded-md ml-5">open</span>
                                </div>
                                <div class="flex mt-5">
                                    <div class="flex">
                                        <h4 class="text-[#009FB2]">Created at:</h4>
                                        <span class="ml-5">2021-09-01 12:00:00</span>
                                    </div>
                                    <div class="flex ml-20">
                                        <h4 class="text-[#009FB2]">Date due:</h4>
                                        <span class="ml-5">2021-09-08 12:00:00</span>
                                    </div>
                                </div>
                                <div class="flex justify-center mt-8">
                                    <button btn-clone-reported class="bg-[#142132] px-6 py-0.5 rounded-md text-sky-600 hover:bg-sky-600 hover:text-white">Clone reported videos</button>
                                    <button btn-delete-reported class="bg-[#142132] px-6 py-0.5 rounded-md text-rose-600 hover:bg-rose-600 hover:text-white mx-6">Delete all reported videos</button>
                                    <button btn-mark-reported class="bg-[#142132] px-6 py-0.5 rounded-md text-emerald-400 hover:bg-emerald-600 hover:text-white">Mark as resolved</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="rounded-xl gap-2 bg-[#121520] mt-10">
                    <div class="px-2 pt-4 md:p-4 lg:min-h-[calc(100vh-25em)] overflow-auto max-h-[calc(100vh-25em)]">
                        <div class="tab-content flex flex-col bg-clip-border rounded-xl text-gray-700 bg-transparent">
                            <div class="px-0 pt-0 overflow-auto text-white">
                                <div class="text-lg">
                                    <h4 class="text-[#009FB2]">Report Videos</h4>
                                    <ul class="text-sm">
                                        <li>https://spatikona.com/t/JGBhcRXJEdWyjTajBVnx</li>
                                        <li>https://spatikona.com/t/liwImsnIbctGluWSLGJj</li>
                                        <li>https://spatikona.com/t/shWU0GwwmDIOPgQDzg80</li>
                                        <li>https://spatikona.com/t/HBGwhtvMrlVjXSrGtDgr</li>
                                        <li>https://spatikona.com/t/swS9erRErHASwXoTcSwx</li>
                                        <li>https://spatikona.com/t/JGBhcRXJEdWyjTajBVnx</li>
                                        <li>https://spatikona.com/t/liwImsnIbctGluWSLGJj</li>
                                        <li>https://spatikona.com/t/shWU0GwwmDIOPgQDzg80</li>
                                        <li>https://spatikona.com/t/HBGwhtvMrlVjXSrGtDgr</li>
                                        <li>https://spatikona.com/t/swS9erRErHASwXoTcSwx</li>
                                        <li>https://spatikona.com/t/JGBhcRXJEdWyjTajBVnx</li>
                                        <li>https://spatikona.com/t/liwImsnIbctGluWSLGJj</li>
                                        <li>https://spatikona.com/t/shWU0GwwmDIOPgQDzg80</li>
                                        <li>https://spatikona.com/t/HBGwhtvMrlVjXSrGtDgr</li>
                                        <li>https://spatikona.com/t/swS9erRErHASwXoTcSwx</li>
                                    </ul>
                                </div>
                                <div class="text-lg mt-5">
                                    <h4 class="text-[#009FB2]">Report Videos</h4>
                                    <ul class="text-sm">
                                        <li>https://spatikona.com/t/JGBhcRXJEdWyjTajBVnx</li>
                                        <li>https://spatikona.com/t/liwImsnIbctGluWSLGJj</li>
                                        <li>https://spatikona.com/t/shWU0GwwmDIOPgQDzg80</li>
                                        <li>https://spatikona.com/t/HBGwhtvMrlVjXSrGtDgr</li>
                                        <li>https://spatikona.com/t/swS9erRErHASwXoTcSwx</li>
                                        <li>https://spatikona.com/t/JGBhcRXJEdWyjTajBVnx</li>
                                        <li>https://spatikona.com/t/liwImsnIbctGluWSLGJj</li>
                                        <li>https://spatikona.com/t/shWU0GwwmDIOPgQDzg80</li>
                                        <li>https://spatikona.com/t/HBGwhtvMrlVjXSrGtDgr</li>
                                        <li>https://spatikona.com/t/swS9erRErHASwXoTcSwx</li>
                                        <li>https://spatikona.com/t/JGBhcRXJEdWyjTajBVnx</li>
                                        <li>https://spatikona.com/t/liwImsnIbctGluWSLGJj</li>
                                        <li>https://spatikona.com/t/shWU0GwwmDIOPgQDzg80</li>
                                        <li>https://spatikona.com/t/HBGwhtvMrlVjXSrGtDgr</li>
                                        <li>https://spatikona.com/t/swS9erRErHASwXoTcSwx</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div fixed-video>
        <!-- -right-90 in loc de 0-->
        <div fixed-video-card
             class="opacity-0 hidden bg-black/20 z-50 shadow-3xl w-screen ease fixed top-0 left-0 flex h-full  backdrop-blur-sm
           min-w-0 flex-col break-words rounded-none border-0 bg-clip-border duration-200 justify-center items-center px-3" id="fixed-video">
            <div class="absolute h-full w-full fixed-plugin-close-button z-10" fixed-video-close-button>
            </div>
            <div
                class="bg-[#121520] w-max w-max-11/12 sm:w-max-4/5 xl:w-max-3/5 z-20 py-4 px-3 rounded-lg relative shadow-lg shadow-slate-900">
                <div class="absolute right-4 top-3">
                    <button fixed-video-close-button
                            class="inline-block p-0 text-sm font-bold leading-normal text-center uppercase align-middle transition-all ease-in bg-transparent border-0 rounded-lg shadow-none cursor-pointer hover:-translate-y-px tracking-tight-rem bg-150 bg-x-25 active:opacity-85 dark:text-white text-slate-700">
                        <i class="material-symbols-outlined text-3xl">close</i>
                    </button>
                </div>
                <div  id="fixed-box-control">
                    <div class="hidden" id="clone">
                        <h5 class="mb-0 text-[#009FB2] text-lg font-semibold">Clone reported videos</h5>
                        <div class="px-0 pt-0 overflow-auto max-h-[calc(100vh-20em)] ">
                            <table id="datatable" datatable data-page-size="10" data-column-table="id"
                                   data-column-direction="asc"
                                   class="text-sm border-separate table-auto overflow-y-clip w-full min-w-max text-white text-left !border-t-0">
                                <thead class="sticky top-0 z-10">
                                <tr class="bg-[#142132] transition-colors text-md">
                                    <th class="py-2.5 px-3 text-center">Title</th>
                                    <th class="py-2.5 px-3 text-center">Old Urls</th>
                                    <th class="py-2.5 px-3 text-center">New Urls</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr class="my-3 h-12 odd:bg-transparent even:bg-[#142132]">
                                        <td class="text-center px-2">Elbet Bir Gun - Capitulo 1.mp4</td>
                                        <td class="text-center px-2">https://spatikona.com/t/JGBhcRXJEdWyjTajBVnx</td>
                                        <td class="text-center px-2">https://spatikona.com/t/4JW6sZp04ZI8bTbjKYGi</td>
                                    </tr>
                                    <tr class="my-3 h-12 odd:bg-transparent even:bg-[#142132]">
                                        <td class="text-center px-2">Elbet Bir Gun - Capitulo 1.mp4</td>
                                        <td class="text-center px-2">https://spatikona.com/t/JGBhcRXJEdWyjTajBVnx</td>
                                        <td class="text-center px-2">https://spatikona.com/t/4JW6sZp04ZI8bTbjKYGi</td>
                                    </tr>
                                    <tr class="my-3 h-12 odd:bg-transparent even:bg-[#142132]">
                                        <td class="text-center px-2">Elbet Bir Gun - Capitulo 1.mp4</td>
                                        <td class="text-center px-2">https://spatikona.com/t/JGBhcRXJEdWyjTajBVnx</td>
                                        <td class="text-center px-2">https://spatikona.com/t/4JW6sZp04ZI8bTbjKYGi</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="delete hidden" id="delete-report">
                        <form action="" class="px-8">
                            <h5 class="text-center text-white text-lg">Are you sure you want to remove the selected video?</h5>
                            <input type="text" class="hidden" name="videos-report" value="">
                            <div class="flex justify-center mt-3 text-white ">
                                <button type="button" class="px-7 py-1.5 rounded-lg bg-gray-400 hover:bg-gray-600 mr-4" fixed-video-close-button>Cancel</button>
                                <button type="submit" class="px-7 py-1.5 rounded-lg bg-rose-400 hover:bg-rose-600">Delete</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
