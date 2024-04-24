@extends('layouts.app')

@section('content')
    <div class="flex flex-wrap -mx-3 flex-col-reverse lg:flex-row">
        <div class="w-full max-w-full px-3 mt-0 text-white lg:flex-none">
            <div
                class="flex flex-col font-semibold" box-lifted data-page="support">
                <div
                    class="tabs tabs-lifted z-10 -mb-[var(--tab-border)] justify-self-start items-start grid-cols-2 grid-rows-2 md:!flex">
                    <button
                        class="tab-upload ticket hover:text-[#009FB2] tab-lifted [--tab-border-color:#202940] tab text-white font-bold h-auto text-md px-4 [--tab-bg:#121520] !border-b-0 md:!border-b-1 !rounded-b-lg md:!rounded-b-none before:!hidden md:before:!block"
                        data-content="ticket">
                        <span class="px-2 py-1">Ticket</span>
                    </button>
                    <button
                        class="tab-upload apiDocuments hover:text-[#009FB2] tab-lifted [--tab-border-color:#202940] tab text-white font-bold h-auto text-md px-4 [--tab-bg:#121520] !border-b-0 md:!border-b-1 !rounded-b-lg md:!rounded-b-none before:!hidden md:before:!block"
                        data-content="apiDocuments">
                        <span class="px-2 py-1">API documents</span>
                    </button>
                    <button
                        class="tab-upload knowledge hover:text-[#009FB2] tab-lifted [--tab-border-color:#202940] tab text-white font-bold h-auto text-md px-4 [--tab-bg:#121520] !border-b-0 md:!border-b-1 !rounded-b-lg md:!rounded-b-none before:!hidden md:before:!block"
                        data-content="knowledge">
                        <span class="px-2 py-1">Knowledge Base</span>
                    </button>
                </div>
                <div class="mt-3 md:mt-0 rounded-b-box rounded-se-box relative  max-w-full w-full">
                    <div
                        class="border-[#121520] rounded-b-box rounded-se-box gap-2 bg-[#121520] bg-top [border-width:var(--tab-border)] undefined">
                        <div class="lg:min-h-[calc(100vh-11em)]">
                            <div class="rounded-xl">
                                <div class="relative rounded-xl">
                                    <div class="px-2 pt-4 md:p-4">
                                        <div id="box-content" support
                                             class="tab-content flex flex-col bg-clip-border rounded-xl text-gray-700 bg-transparent">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
