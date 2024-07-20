@extends('admin.layouts.app')

@section('content')
    <!-- cards -->
    <div class="w-full mx-auto mt-5">
      <div class="flex flex-wrap -mx-3 flex-col-reverse lg:flex-row">
        <div class="w-full max-w-full px-2 mt-0 text-white lg:flex-none">
          <div class="lg:mr-2 flex flex-col font-semibold">
            <div
              class="tabs tabs-lifted z-[1] -mb-[var(--tab-border)] justify-self-start items-start grid-cols-2 grid-rows-2 md:!flex">
              <button
                  class="{{request()->get('tab') === 'storage' ? 'storage tab-active !text-[#009FB2]' : 'storage'}}
                    hover:text-[#009FB2] text-white tab-lifted [--tab-border-color:#121520] tab font-bold h-auto text-md px-4 [--tab-bg:#121520] !border-b-0 md:!border-b-1 !rounded-b-lg md:!rounded-b-none before:!hidden md:before:!block"
                  data-content="storage">
                <span class="px-2 py-1">Storage</span>
              </button>
              <button
                class="{{request()->get('tab') === 'encoder' ? 'encoder tab-active !text-[#009FB2]' : 'encoder'}}
                    hover:text-[#009FB2] text-white tab-lifted [--tab-border-color:#121520] tab font-bold h-auto text-md px-4 [--tab-bg:#121520] !border-b-0 md:!border-b-1 !rounded-b-lg md:!rounded-b-none before:!hidden md:before:!block"
                  data-content="encoder">
                <span class="px-2 py-1">Encoder</span>
              </button>
              <button
                class="{{request()->get('tab') === 'download' ? 'download tab-active !text-[#009FB2]' : 'download'}}
                    hover:text-[#009FB2] text-white tab-lifted [--tab-border-color:#121520] tab font-bold h-auto text-md px-4 [--tab-bg:#121520] !border-b-0 md:!border-b-1 !rounded-b-lg md:!rounded-b-none before:!hidden md:before:!block"
                  data-content="download">
                <span class="px-2 py-1">Download</span>
              </button>
              <button
                class="{{request()->get('tab') === 'stream' ? 'stream tab-active !text-[#009FB2]' : 'stream'}}
                    hover:text-[#009FB2] text-white tab-lifted [--tab-border-color:#121520] tab font-bold h-auto text-md px-4 [--tab-bg:#121520] !border-b-0 md:!border-b-1 !rounded-b-lg md:!rounded-b-none before:!hidden md:before:!block"
                  data-content="stream">
                <span class="px-2 py-1">Streaming system</span>
              </button>
            </div>
            <div class="mt-3 md:mt-0 rounded-b-xl rounded-tr-xl relative  max-w-full w-full">
              <div
                class="border-base-300 rounded-b-xl rounded-tr-xl gap-2 bg-[#121520] bg-top">
                <div class="tab-content-video box-datatable min-h-[calc(100vh-13em)]"  id="box-content">
                    @include(request()->path() . '.' . request()->get('tab'))
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
                class="w-11/12 sm:w-4/5 xl:w-2/5 bg-[#121520] z-20 py-4 px-3 rounded-lg relative shadow-lg shadow-slate-900">
                <div class="absolute right-4 top-3">
                    <button fixed-video-close-button
                            class="inline-block p-0 text-sm font-bold leading-normal text-center uppercase align-middle transition-all ease-in bg-transparent border-0 rounded-lg shadow-none cursor-pointer hover:-translate-y-px tracking-tight-rem bg-150 bg-x-25 active:opacity-85 dark:text-white text-slate-700">
                        <i class="material-symbols-outlined text-3xl">close</i>
                    </button>
                </div>
                <div  id="fixed-box-control">

                    <div class="export hidden" id="export">
                        <h5 class="mb-0 text-[#009FB2] text-lg font-semibold">Files Export</h5>
                        <div class="grid mt-3" box-lifted>
                            <div
                                class="tabs tabs-lifted z-10 -mb-[var(--tab-border)] justify-self-start flex flex-col items-start md:grid">
                                <button
                                    class="tab-export EmbedLink [--tab-border-color:#142132] tab !text-[#009FB2] text-white font-bold h-auto text-md px-4 tab-active [--tab-bg:#142132] !border-b-0 md:!border-b-1 !rounded-b-lg md:!rounded-b-none before:!hidden md:before:!block"
                                    data-content="EmbedLink">
                                    EmbedLink
                                </button>
                                <button
                                    class="tab-export Embedcode [--tab-border-color:#142132] tab text-white font-bold h-auto text-md px-4 [--tab-bg:#142132] my-3 md:my-0 !border-b-0 md:!border-b-1 !rounded-b-lg md:!rounded-b-none before:!hidden md:before:~block"
                                    data-content="Embedcode">
                                    Embedcode
                                </button>
                                <button
                                    class="tab-export Download [--tab-border-color:#142132] tab text-white font-bold h-auto text-md px-4 [--tab-bg:#142132] !border-b-0 md:!border-b-1 !rounded-b-lg md:!rounded-b-none before:!hidden md:before:~block"
                                    data-content="Download">
                                    Download Link
                                </button>
                            </div>
                            <div class="mt-3 md:mt-0 rounded-b-xl rounded-tr-xl relative">
                                <div
                                    class="border-[#142132] rounded-b-xl rounded-tr-xl gap-2 bg-[#142132] bg-top py-4 pl-4 [border-width:var(--tab-border)] undefined">
                                    <div id="EmbedLink" class="tab-content-export">
                                        <textarea class="bg-transparent w-full h-[calc(40vh)] text-white max-h-96 overflow-auto"></textarea>
                                    </div>
                                    <div id="Embedcode" class="tab-content-export hidden">
                                        <textarea class="bg-transparent w-full h-[calc(40vh)] text-white max-h-96 overflow-auto"> </textarea>
                                    </div>
                                    <div id="Download" class="tab-content-export hidden">
                                        <textarea class="bg-transparent w-full h-[calc(40vh)] text-white max-h-96 overflow-auto"></textarea>
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
