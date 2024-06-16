@extends('dashboard.layouts.app')

@section('content')
    <div class="flex flex-wrap -mx-3 flex-col-reverse lg:flex-row">
        <div class="w-full max-w-full px-3 mt-0 text-white lg:flex-none ">
            <div class="mt-3 md:mt-0 rounded-b-xl rounded-tr-xl relative  max-w-full w-full rounded-xl">
                <div
                        class="border-[#121520] rounded-b-xl rounded-tr-xl gap-2 bg-[#121520] bg-top [border-width:var(--tab-border)] undefined">
                    <div class="lg:min-h-[calc(100vh-8em)]" id="box-content">
                        <div class="rounded-xl">
                            <div class="relative rounded-xl">
                                <div class="px-2 pt-4 md:p-4  rounded-xl">
                                    <div class="mb-2" id='title'>
                                        <h5 class="items-center text-transparent flex bg-clip-text bg-gradient-to-r from-purple-500 to-pink-500">
                                            <span>Premium</span>
                                        </h5>
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
