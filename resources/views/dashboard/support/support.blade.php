@extends('dashboard.layouts.app')

@section('content')
    <div class="flex flex-wrap -mx-3 flex-col-reverse lg:flex-row">
        <div class="w-full max-w-full px-3 mt-0 text-white lg:flex-none">
            <div
                class="flex flex-col font-semibold" box-lifted>
                <div
                    class="tabs tabs-lifted z-10 -mb-[var(--tab-border)] justify-self-start items-start grid-cols-2 grid-rows-2 md:!flex">
                    <button
                        class="{{strpos(request()->get('tab'), 'ticket') !== false ? 'ticket tab-active !text-[#009FB2]' : 'ticket'}}
                        ticket newticket hover:text-[#009FB2]  text-white tab-lifted [--tab-border-color:#121520] tab font-bold h-auto text-md px-4 [--tab-bg:#121520] !border-b-0 md:!border-b-1 !rounded-b-lg md:!rounded-b-none before:!hidden md:before:!block"
                        data-content="ticket">
                        <span class="px-2 py-1">Ticket</span>
                    </button>
                    <button
                        class="{{request()->get('tab') === 'apiDocuments' ? 'apiDocuments tab-active !text-[#009FB2]' : 'apiDocuments'}}
                        apiDocuments hover:text-[#009FB2]  text-white tab-lifted [--tab-border-color:#121520] tab font-bold h-auto text-md px-4 [--tab-bg:#121520] !border-b-0 md:!border-b-1 !rounded-b-lg md:!rounded-b-none before:!hidden md:before:!block"
                        data-content="apiDocuments">
                        <span class="px-2 py-1">API documents</span>
                    </button>
                    <button
                        class="{{request()->get('tab') === 'knowledge' ? 'knowledge tab-active !text-[#009FB2]' : 'knowledge'}}
                        knowledge hover:text-[#009FB2]  text-white tab-lifted [--tab-border-color:#121520] tab font-bold h-auto text-md px-4 [--tab-bg:#121520] !border-b-0 md:!border-b-1 !rounded-b-lg md:!rounded-b-none before:!hidden md:before:!block"
                        data-content="knowledge">
                        <span class="px-2 py-1">Knowledge Base</span>
                    </button>
                </div>
                <div class="mt-3 md:mt-0 rounded-b-box rounded-se-box relative  max-w-full w-full">
                    <div
                        class="border-[#121520] rounded-b-box rounded-se-box gap-2 bg-[#121520] bg-top [border-width:var(--tab-border)] undefined">
                        <div class="lg:h-[calc(100vh-11em)] h-[calc(100vh-12.5em)]">
                            <div class="rounded-xl">
                                <div class="relative rounded-xl">
                                    <div class="px-2 pt-4 md:p-4">
                                        <div id="box-content" support
                                             class="tab-content flex flex-col bg-clip-border rounded-xl text-gray-700 bg-transparent">
                                            @include('dashboard.'.request()->path() . 'result-type' . request()->get('tab'))
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
@section('scripts')
    @vite('resources/css/vs2015.css')
@endsection
