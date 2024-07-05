@extends('landing-page.layouts.app')

@section('content')
    <section class="bg-[#142132] min-h-screen text-white ">
        <div class="bg-contain bg-no-repeat w-3/4 h-full fixed right-5"
             style='background-image: url({{ asset('image/affiliate/background.webp') }})'></div>
        <div class="flex justify-center relative z-index-30">
            <div class="container">
                <div class="text-center my-5">
                    <h1 class="text-3xl">Affiliate</h1>
                    <h2 class="text-xl">Earn money by hosting and sharing your videos with StreamSilk</h2>
                </div>
                <div class="grid grid-cols-4 gap-x-10 gap-y-5 w-full px-6 xl:px-0">
                    <div class="col-span-full sm:col-span-2 lg:col-span-1 rounded-xl px-8 py-6 bg-[#121520]/80">
                        <div class="flex justify-between items-center mt-2">
                            <h1 class="text-3xl">Tier 1</h1>
                            <span
                                class="px-6 py-2 font-semibold rounded-full bg-[#05ffff]/80 hover:bg-[#05ffff] text-white text-2xl italic">33$</span>
                        </div>
                        <h1 class="italic mt-4">Profit rates for each 10k views of your video</h1>
                        <div class="mt-5">
                            <div class="flex mb-3">
                                <img class="mr-3" src="{{ asset('image/affiliate/Australia.png') }}" alt="">
                                <h1>Australia</h1>
                            </div>
                            <div class="flex mb-3">
                                <img class="mr-3" src="{{ asset('image/affiliate/Canada.png') }}" alt="">
                                <h1>Canada</h1>
                            </div>
                            <div class="flex mb-3">
                                <img class="mr-3" src="{{ asset('image/affiliate/United-Kingdom.png') }}" alt="">
                                <h1>United Kingdom</h1>
                            </div>
                            <div class="flex mb-3">
                                <img class="mr-3" src="{{ asset('image/affiliate/United-States.png') }}" alt="">
                                <h1>United States</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-full sm:col-span-2 lg:col-span-1 rounded-xl px-8 py-6 bg-[#121520]/80">
                        <div class="flex justify-between items-center mt-2">
                            <h1 class="text-3xl">Tier 2</h1>
                            <span
                                class="px-6 py-2 font-semibold rounded-full bg-[#05ffff]/80 hover:bg-[#05ffff] text-white text-2xl italic">22$</span>
                        </div>
                        <h1 class="italic mt-4">Profit rates for each 10k views of your video</h1>
                        <div class="mt-5">
                            <div class="flex mb-3">
                                <img class="mr-3" src="{{ asset('image/affiliate/Denmark.png') }}" alt="">
                                <h1>Denmark</h1>
                            </div>
                            <div class="flex mb-3">
                                <img class="mr-3" src="{{ asset('image/affiliate/Finland.png') }}" alt="">
                                <h1>Finland</h1>
                            </div>
                            <div class="flex mb-3">
                                <img class="mr-3" src="{{ asset('image/affiliate/France.png') }}" alt="">
                                <h1>France</h1>
                            </div>
                            <div class="flex mb-3">
                                <img class="mr-3" src="{{ asset('image/affiliate/Germany.png') }}" alt="">
                                <h1>Germany</h1>
                            </div>
                            <div class="flex mb-3">
                                <img class="mr-3" src="{{ asset('image/affiliate/Norway.png') }}" alt="">
                                <h1>Norway</h1>
                            </div>
                            <div class="flex mb-3">
                                <img class="mr-3" src="{{ asset('image/affiliate/Sweden.png') }}" alt="">
                                <h1>Sweden</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-full sm:col-span-2 lg:col-span-1 rounded-xl px-8 py-6 bg-[#121520]/80">
                        <div class="flex justify-between items-center mt-2">
                            <h1 class="text-3xl">Tier 3</h1>
                            <span
                                class="px-6 py-2 font-semibold rounded-full bg-[#05ffff]/80 hover:bg-[#05ffff] text-white text-2xl italic">15$</span>
                        </div>
                        <h1 class="italic mt-4">Profit rates for each 10k views of your video</h1>
                        <div class="mt-5">
                            <div class="flex mb-3">
                                <img class="mr-3" src="{{ asset('image/affiliate/Austria.png') }}" alt="">
                                <h1>Austria</h1>
                            </div>
                            <div class="flex mb-3">
                                <img class="mr-3" src="{{ asset('image/affiliate/Italy.png') }}" alt="">
                                <h1>Italy</h1>
                            </div>
                            <div class="flex mb-3">
                                <img class="mr-3" src="{{ asset('image/affiliate/Japan.png') }}" alt="">
                                <h1>Japan</h1>
                            </div>
                            <div class="flex mb-3">
                                <img class="mr-3" src="{{ asset('image/affiliate/Netherlands.png') }}" alt="">
                                <h1>Netherlands</h1>
                            </div>
                            <div class="flex mb-3">
                                <img class="mr-3" src="{{ asset('image/affiliate/South-Africa.png') }}" alt="">
                                <h1>South Africa</h1>
                            </div>
                            <div class="flex mb-3">
                                <img class="mr-3" src="{{ asset('image/affiliate/Spain.png') }}" alt="">
                                <h1>Spain</h1>
                            </div>
                            <div class="flex mb-3">
                                <img class="mr-3" src="{{ asset('image/affiliate/Switzerland.png') }}" alt="">
                                <h1>Switzerland</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-full sm:col-span-2 lg:col-span-1 rounded-xl px-8 py-6 bg-[#121520]/80">
                        <div class="flex justify-between items-center mt-2">
                            <h1 class="text-3xl">Tier 4</h1>
                            <span
                                class="px-6 py-2 font-semibold rounded-full bg-[#05ffff]/80 hover:bg-[#05ffff] text-white text-2xl italic">11$</span>
                        </div>
                        <h1 class="italic mt-4">Profit rates for each 10k views of your video</h1>
                        <div class="mt-5">
                            <div class="flex mb-3">
                                <img class="mr-3" src="{{ asset('image/affiliate/Belgium.png') }}" alt="">
                                <h1>Belgium</h1>
                            </div>
                            <div class="flex mb-3">
                                <img class="mr-3" src="{{ asset('image/affiliate/India.png') }}" alt="">
                                <h1>India</h1>
                            </div>
                            <div class="flex mb-3">
                                <img class="mr-3" src="{{ asset('image/affiliate/Indonesia.png') }}" alt="">
                                <h1>Indonesia</h1>
                            </div>
                            <div class="flex mb-3">
                                <img class="mr-3" src="{{ asset('image/affiliate/Poland.png') }}" alt="">
                                <h1>Poland</h1>
                            </div>
                            <div class="flex mb-3">
                                <img class="mr-3" src="{{ asset('image/affiliate/Portugal.png') }}" alt="">
                                <h1>Portugal</h1>
                            </div>
                            <div class="flex mb-3">
                                <img class="mr-3" src="{{ asset('image/affiliate/Romania.png') }}" alt="">
                                <h1>Romania</h1>
                            </div>
                            <div class="flex mb-3">
                                <img class="mr-3" src="{{ asset('image/affiliate/Russian-Federation.png') }}" alt="">
                                <h1>Russian Federation</h1>
                            </div>
                            <div class="flex mb-3">
                                <img class="mr-3" src="{{ asset('image/affiliate/Singapore.png') }}" alt="">
                                <h1>Singapore</h1>
                            </div>
                            <div class="flex mb-3">
                                <img class="mr-3" src="{{ asset('image/affiliate/Slovak-Republic.png') }}" alt="">
                                <h1>Slovak Republic</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-full mt-3">
                        <h4>Earn a fixed amount per 10.000 downloads or streams. The payment amount is defined by the
                            origin country referred to in the Tier table above. Every other country that is not listed
                            in table is paid 8$/10k views (All durations).</h4>
                    </div>
                </div>
                <div class="mt-3 px-8 mb-10">
                    <div class="grid grid-cols-2 items-center">
                        <div class="px-5 col-span-full lg:col-span-1">
                            <img src="{{ asset('image/affiliate/revenue-animate.svg') }}" alt="" class="w-full">
                        </div>
                        <div class="col-span-full lg:col-span-1">
                            <ul class="list-disc text-lg grid gap-y-6">
                                <li>10% of video must be watched to be counted as paid. If below 10 minutes 60% required
                                    to be watched.
                                </li>
                                <li>Minimum payout amount - 50$</li>
                                <li>Rewards are not counted if advertising is being blocked.</li>
                                <li>2 Views or Downloads are counted per 24 hours per user ip</li>
                                <li>Payout Methods: USDT (TRC-20 or ERC-20)</li>
                                <li>Payout's are made every Monday</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
