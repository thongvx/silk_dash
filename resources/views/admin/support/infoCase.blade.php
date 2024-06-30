@extends('admin.layouts.app')

@section('content')
    <div class="flex flex-wrap -mx-3 flex-col-reverse lg:flex-row">
        <div class="w-full max-w-full px-3 mt-0 text-white lg:flex-none">
            <div
                class="my-4 border-[#121520] rounded-b-xl rounded-tr-xl gap-2 bg-[#121520] bg-top [border-width:var(--tab-border)] undefined">
                <div class="lg:h-[calc(100vh-12em)] h-[calc(100vh-12.5em)]">
                    <div class="rounded-xl">
                        <div class="relative rounded-xl">
                            <div class="px-2 pt-4 md:p-4">
                                <div id="box-content" support
                                     class="tab-content flex flex-col bg-clip-border rounded-xl text-gray-700 bg-transparent">
                                    <div>
                                        <div class="flex justify-between items-center w-full mb-3">
                                            <div class="mb-2" id='title'>
                                                <h5 class="items-start text-white flex flex-col">
                                                    <span>Subject Ticket: {{ $ticket[0]['subject'] }}</span>
                                                    <span>Topic: {{ $ticket[0]['topic'] }}</span>
                                                </h5>
                                            </div>
                                            <div class="text-white font-lg font-bold">
                                                <a href="/admin/support?tab=cases" class="rounded-lg bg-[#142132] hover:bg-[#009fb2] px-3 py-1.5">All Ticket</a>
                                            </div>
                                        </div>
                                        <hr class="h-px mt-0 bg-transparent bg-gradient-to-r from-transparent via-white to-transparent border-none" />
                                        <div class="relative h-[calc(100vh-18em)]">
                                            @php
                                                $currentDate = null;
                                            @endphp
                                            @foreach($ticket[0]['messages'] as $message)
                                                @php
                                                    $messageDate = date("m/d/Y", strtotime($message['created_at']));
                                                @endphp
                                                @if($messageDate !== $currentDate)
                                                    <div class="flex justify-center items-center w-full my-3">
                                                        <h5 class=" text-white">
                                                            {{ date("h:m", strtotime($message['created_at'])) }}, {{ date("m/d/Y", strtotime($message['created_at'])) }}
                                                        </h5>
                                                    </div>
                                                    @php
                                                        $currentDate = $messageDate;
                                                    @endphp
                                                @endif
                                                <div class="flex  {{ $message['message']['type'] == 2 ? 'justify-start' : 'justify-end'}}">
                                                    <div class="{{ $message['message']['type'] == 2 ? 'text-black bg-white' : 'text-white bg-indigo-500'}} py-2 px-3 rounded-full mb-2 max-w-64 w-max">
                                                        <h4 >{{ $message['message']['message'] }}</h4>
                                                    </div>
                                                </div>

                                            @endforeach
                                            <div class="w-full absolute bottom-3 bg-[#142132] text-white rounded-xl py-2">
                                                <form action="/admin/support" method="POST" enctype="multipart/form-data" class="text-white">
                                                    @csrf
                                                    <input type="text" class="hidden" name="subject" value="{{ $ticket[0]['subject'] }}"
                                                           placeholder="Subject" readonly>
                                                    <input type="text" class="hidden" name="topic" value="{{ $ticket[0]['topic'] }}"
                                                           placeholder="Subject" readonly>
                                                    <input type="text" class="hidden" name="user_id" value="{{ $user_id }}"
                                                           placeholder="Subject" readonly>
                                                    <textarea name="message" class="outline-none bg-transparent w-full  px-3 py-1"></textarea>
                                                    <div class="flex justify-between px-3">
                                                        <div class="bg-[#142132] rounded-lg text-center flex relative h-max box-img  hover:text-[#009fb2]">
                                                            <input name="file" type="file" id="file-attach" accept=".jpg, .png, .jpeg"
                                                                   class="absolute opacity-0 file-img cursor-pointer w-full">
                                                            <label for="file-attach" class="w-max py-2 cursor-pointer">
                                                                <i class="material-symbols-outlined opacity-1 text-white text-3xl">attach_file</i>
                                                            </label>
                                                        </div>
                                                        <div class="text-center">
                                                            <button type="submit" class=" cursor-pointer px-10 py-2 rounded-lg bg-[#009FB2]/70 hover:bg-[#009fb2] text-white" disabled>Save</button>
                                                        </div>
                                                    </div>

                                                </form>
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

    </div>
@endsection
@section('scripts')
    @vite('resources/css/vs2015.css')
@endsection
