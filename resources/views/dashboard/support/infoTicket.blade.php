@extends('dashboard.layouts.app')

@section('content')
    <div class="flex flex-wrap -mx-3 flex-col-reverse lg:flex-row">
        <div class="w-full max-w-full px-3 mt-0 text-white lg:flex-none">
            <div
                class="border-[#121520] rounded-b-xl rounded-tr-xl gap-2 bg-[#121520] bg-top [border-width:var(--tab-border)] undefined">
                <div class="lg:h-[calc(100vh-8em)] h-[calc(100vh-10em)]">
                    <div class="rounded-xl">
                        <div class="relative rounded-xl">
                            <div class="px-2 pt-4 md:p-4">
                                <div id="box-content" support
                                     class="tab-content flex flex-col bg-clip-border rounded-xl text-gray-700 bg-transparent">
                                    <div>
                                        <div class="flex justify-between items-center w-full mb-3">
                                            <div class="mb-2" id='title'>
                                                <h5 class="items-start text-white flex flex-col">
                                                    <span>Subject Ticket: {{ $tickets->subject }}</span>
                                                    <span>Topic: {{ $tickets->topic }}</span>
                                                </h5>
                                            </div>
                                            <div class="text-white font-lg font-bold">
                                                <a href="{{route('complete.ticket',['ticketID'=> $tickets->id])}}" class="rounded-lg bg-[#142132] hover:bg-[#009fb2] px-3 py-1.5">Complete</a>
                                                <a href="/support?tab=ticket" class="rounded-lg bg-[#142132] hover:bg-[#009fb2] px-3 py-1.5">All Ticket</a>
                                                <a href="/support?tab=newticket" class="ml-3 rounded-lg bg-[#142132] hover:bg-[#009fb2] px-3 py-1.5">New Ticket</a>
                                            </div>
                                        </div>
                                        <hr class="h-px mt-0 bg-transparent bg-gradient-to-r from-transparent via-white to-transparent border-none" />
                                        <div class="relative h-[calc(100vh-16em)] lg:h-[calc(100vh-14em)] text-base">
                                            @php
                                                $currentDate = null;
                                                $data = json_decode($tickets->message, true);
                                                $previousType = null;
                                            @endphp
                                            <div class="lg:max-h-[calc(100vh-20em)] max-h-[calc(100vh-22em)] overflow-auto pb-2 px-2 overscroll-y-auto snap-y"  id="box-message">
                                                @foreach($data as $value)

                                                    @php
                                                        $messageDate = date("m/d/Y", strtotime($value['date']));
                                                    @endphp
                                                    @if($messageDate !== $currentDate)
                                                        <div class="flex justify-center items-center w-full my-3 sticky top-3">
                                                            <h5 class=" text-white">
                                                                {{ date("m/d/Y", strtotime($value['date'])) }}
                                                            </h5>
                                                        </div>

                                                        @php
                                                            $currentDate = $messageDate;
                                                        @endphp
                                                    @endif
                                                    <div class="flex flex-col {{ $value['type'] == 2 ? 'items-end' : 'items-start'}} snap-end">
                                                        <div class="message-class  text-slate-200 {{ $value['type'] !== $previousType ? '' : 'hidden'}}
                                                                mb-2">
                                                            <h4 class="italic">
                                                                {{ $value['type'] == 2 ? Auth::user()->name : 'StreamSilk'}}
                                                            </h4>
                                                        </div>
                                                        @php
                                                            $previousType = $value['type'];
                                                        @endphp

                                                        @if($value['url_file'] != 0)
                                                            <div class="max-w-[40%] mb-2 rounded-3xl">
                                                                <img src="{{ $value['url_file'] }}" alt="File Image" class=" rounded-3xl">
                                                            </div>
                                                        @endif
                                                            <div class="message-class {{ $value['type'] == 2 ? 'text-white bg-[#009FB2]' : 'text-black bg-slate-200'}} px-5 py-2.5 mb-2 max-w-[70%] rounded-3xl" data-date="{{ date("m/d/Y", strtotime($value['date'])) }}">
                                                                <h4>
                                                                    {!! nl2br(html_entity_decode($value['message'])) !!}
                                                                    <span class="{{ $value['type'] == 2 ?'text-white' : 'text-gray-600'}} text-xs -mb-2 relative -bottom-1 ml-2">
                                                                    {{ date("h:m a", strtotime($value['date'])) }}
                                                                    </span>
                                                                </h4>
                                                            </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                            @if( $tickets -> status === 'pending')
                                                <div class="w-full absolute bottom-3 bg-[#142132] text-white rounded-3xl py-2">
                                                    <form action="/support" method="POST" enctype="multipart/form-data" class="text-white">
                                                        @csrf
                                                        <input type="text" class="hidden" name="ticketID" value="{{ $tickets->id }}"
                                                               placeholder="Subject" readonly>
                                                        <div class="flex justify-between px-3 items-center">
                                                            <div class="bg-[#142132] rounded-lg text-center flex relative h-max box-img  hover:text-[#009fb2]">
                                                                <input name="file" type="file" id="file-attach" accept=".jpg, .png, .jpeg"
                                                                       class="absolute opacity-0 file-img cursor-pointer w-full">
                                                                <label for="file-attach" class="w-max cursor-pointer">
                                                                    <i class="material-symbols-outlined opacity-1 text-white text-3xl">attach_file</i>
                                                                </label>
                                                            </div>
                                                            <textarea name="message" id="myTextarea" rows="1" class="ml-2 m-0 resize-none border-0 bg-transparent px-0
                                                        text-token-text-primary focus:ring-0 focus-visible:ring-0 max-h-52 outline-none w-full" placeholder="message"></textarea>
                                                            <div class="text-center">
                                                                <button type="submit" class="!bg-transparent cursor-pointer rounded-lg hover:text-[#009fb2] text-white" disabled>
                                                                    <i class="material-symbols-outlined opacity-1 text-white text-3xl">send</i>
                                                                </button>
                                                            </div>
                                                        </div>

                                                    </form>
                                                </div>
                                            @endif

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
