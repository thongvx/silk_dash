@extends('dashboard.layouts.app')

@section('content')
    <div class="flex flex-wrap -mx-3 flex-col-reverse lg:flex-row">
        <div class="w-full max-w-full px-3 mt-0 text-white lg:flex-none">
            <form class="flex flex-col font-semibold" action="/uploadSub" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mt-3 md:mt-0 rounded-xl relative  max-w-full w-full  bg-[#121520]">
                    <div class="pl-4 py-6" id="box-content" page-video>
                        <div class="my-4">
                            <div>
                                <div id="form-profile">
                                    <div class="text-slate-300 font-medium">
                                        <input type="text" name="slug" value="{{ $video->slug }}" class="hidden">
                                        <div class="grid grid-cols-4 gap-4 items-center">
                                            <h5 class="col-span-1 text-end">
                                                Video Title
                                            </h5>
                                            <div class="text-white col-span-3 md:col-span-2 rounded-lg flex items-center backdrop-blur-3xl px-2 bg-[#142132]/60">
                                                <input type="text" name="title" value="{{ $video->title }}"
                                                       class="py-2 bg-transparent text-white placeholder:text-gray-400/80 placeholder:font-normal w-full mx-1 pl-2 appearance-none outline-none autofill:bg-yellow-200"
                                                       placeholder="Video title">
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-4 gap-4 items-center mt-6">
                                            <h5 class="col-span-1 text-end">
                                                File URL
                                            </h5>
                                            <div class="text-[#009FB2] col-span-3 md:col-span-2 flex items-center px-2">
                                                <a href="https://streamsilk.com/t/{{ $video->slug }}" target="_black">https://streamsilk.com/t/{{ $video->slug }}</a>
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-4 gap-4 items-center mt-6">
                                            <h5 class="col-span-1 text-end">
                                                Subtitles
                                            </h5>
                                            <div class="text-white col-span-3 md:col-span-2 rounded-lg flex items-center px-2">
                                                @if( $video->is_sub == 1)
                                                    @foreach( $subtitles as $subtitle )
                                                        <div class="mr-3 bg-[#142132] pl-3 pr-7 py-2 rounded-lg relative">
                                                            <h4>
                                                                <a href="{{ $subtitle->file }}">{{ $subtitle->label }}</a>
                                                            </h4>
                                                            <div class="absolute right-1 top-0">
                                                                <div class="inline-block p-0 text-sm font-bold leading-normal text-center uppercase align-middle transition-all ease-in
                                                                bg-transparent border-0 rounded-lg shadow-none cursor-pointer hover:-translate-y-px tracking-tight-rem bg-150 bg-x-25
                                                                active:opacity-85 dark:text-white text-slate-700">
                                                                    <i class="material-symbols-outlined font-semibold text-lg hover:text-[#009fb2]">close</i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-4 gap-4 items-center mt-6">
                                            <h5 class="col-span-1 text-end">
                                                Subtitles Language
                                            </h5>
                                            <div class="text-white col-span-3 md:col-span-2 rounded-lg flex items-center backdrop-blur-3xl px-2 hover:bg-[#142132] bg-[#142132]/60">
                                                <select name="subtitle" class="py-2 w-full bg-transparent outline-none">
                                                    <option value="eng" selected>
                                                        English (eng)
                                                    </option>
                                                    <option value="spa">
                                                        Spanish (spa)
                                                    </option>
                                                    <option value="aze">
                                                        Azerbaijani (aze)
                                                    </option>
                                                    <option value="alb">
                                                        Albanian (alb)
                                                    </option>
                                                    <option value="ara">
                                                        Arabic (ara)
                                                    </option>
                                                    <option value="bul">
                                                        Bulgarian (bul)
                                                    </option>
                                                    <option value="chi">
                                                        Chinese (chi)
                                                    </option>
                                                    <option value="dnk">
                                                        Denmark (dnk)
                                                    </option>
                                                    <option value="per">
                                                        Persian (per)
                                                    </option>
                                                    <option value="fin">
                                                        Finland (fin)
                                                    </option>
                                                    <option value="fre">
                                                        French (fre)
                                                    </option>
                                                    <option value="ger">
                                                        German (ger)
                                                    </option>
                                                    <option value="gre">
                                                        Greek (gre)
                                                    </option>
                                                    <option value="heb">
                                                        Hebrew (heb)
                                                    </option>
                                                    <option value="hin">
                                                        Hindi (hin)
                                                    </option>
                                                    <option value="hun">
                                                        Hungarian (hun)
                                                    </option>
                                                    <option value="ind">
                                                        Indonesian (ind)
                                                    </option>
                                                    <option value="ita">
                                                        Italian (ita)
                                                    </option>
                                                    <option value="jpn">
                                                        Japanese (jpn)
                                                    </option>
                                                    <option value="kan">
                                                        Kannada (kan)
                                                    </option>
                                                    <option value="khm">
                                                        Khmer (khm)
                                                    </option>
                                                    <option value="kor">
                                                        Korean (kor)
                                                    </option>
                                                    <option value="mal">
                                                        Malayalam (mal)
                                                    </option>
                                                    <option value="may">
                                                        Malay (may)
                                                    </option>
                                                    <option value="nor">
                                                        Norway (nor)
                                                    </option>
                                                    <option value="pol">
                                                        Polish (pol)
                                                    </option>
                                                    <option value="por">
                                                        Portuguese (por)
                                                    </option>
                                                    <option value="rus">
                                                        Russian (rus)
                                                    </option>
                                                    <option value="sin">
                                                        Sinhala (sin)
                                                    </option>
                                                    <option value="slv">
                                                        Slovenian (slv)
                                                    </option>
                                                    <option value="srp">
                                                        Serbian (srp)
                                                    </option>
                                                    <option value="swe">
                                                        Sweden (swe)
                                                    </option>
                                                    <option value="tam">
                                                        Tamil (tam)
                                                    </option>
                                                    <option value="tha">
                                                        Thai (tha)
                                                    </option>
                                                    <option value="tur">
                                                        Turkish (tur)
                                                    </option>
                                                    <option value="ukr">
                                                        Ukrainian (ukr)
                                                    </option>
                                                    <option value="vie">
                                                        Vietnamese (vie)
                                                    </option>
                                                    <option value="rum">
                                                        Romanian (rum)
                                                    </option>
                                                    <option value="mar">
                                                        Marathi (mar)
                                                    </option>
                                                    <option value="aze">
                                                        Azerbaijan (aze)
                                                    </option>
                                                    <option value="cze">
                                                        Czech (cze)
                                                    </option>
                                                    <option value="slo">
                                                        Slovak (slo)
                                                    </option>
                                                    <option value="lit">
                                                        Lithuanian (lit)
                                                    </option>
                                                    <option value="kur">
                                                        Kurdish (kur)
                                                    </option>
                                                    <option value="dan">
                                                        Danish (dan)
                                                    </option>
                                                    <option value="bos">
                                                        Bosnian (bos)
                                                    </option>
                                                    <option value="hrv">
                                                        Croatian (hrv)
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-4 gap-4 items-center mt-6">
                                            <h5 class="col-span-1 text-end">
                                                Upload Subtitles <br> <span class="text-sm text-slate-400">(Upload SRT/VTT file)</span>
                                            </h5>
                                            <div class="text-white col-span-3 md:col-span-2 flex items-center">
                                                <div class="w-full rounded-lg  text-center hover:bg-[#142132] bg-[#142132]/60 flex relative h-max box-img  hover:text-[#009fb2]">
                                                    <input name="file-sub" type="file" id="file-attach" accept=".srt,.vtt" size="10"
                                                           class="absolute opacity-0 file-img cursor-pointer w-full">
                                                    <label for="file-attach" class="w-full py-2 cursor-pointer text-center">Choose File Subtitles</label>
                                                </div>
                                                <button type="submit" class="ml-4 px-5 py-2 rounded-lg bg-[#142132]" disabled>Upload</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ounded-xl relative  max-w-full w-full  bg-[#121520] mt-6">
                    <div class="pt-2 pl-4" id="box-content" page-video>
                        <div class="mt-4">
                            <div>
                                <div id="form-profile">
                                    <div class="text-slate-300">
                                        <div class="grid grid-cols-4 gap-4 items-center mt-6">
                                            <h5 class="col-span-1 text-end">
                                            </h5>
                                            <div class="flex box-img flex-col col-span-3 md:col-span-2">
                                                <h5 class="text-start mb-3  font-medium">
                                                    Poster
                                                </h5>
                                                <img src="{{ $video->poster }}" alt="" class="w-full mr-3 mb-3 rounded-lg">
                                                <div class="bg-[#142132] rounded-lg py-1 text-center mb-3 flex w-full items-center relative">
                                                    <input name="file-poster" type="file" id="file-poster" accept=".jpg, .png, .jpeg"
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
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center mt-4 mb-10">
                    <button type="submit" class="px-10 py-2 rounded-lg bg-[#009FB2]/80 hover:bg-[#009fb2] text-white" disabled>Save</button>
                </div>
            </form>
        </div>

    </div>
@endsection
