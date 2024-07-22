@extends('dashboard.layouts.app')

@section('content')
    <div class="flex flex-wrap -mx-3 flex-col-reverse lg:flex-row">
        <div class="w-full max-w-full px-3 mt-0 text-white lg:flex-none">
            <div class="mt-3 md:mt-0 rounded-b-xl rounded-tr-xl relative  max-w-full w-full">
                <div
                    class="rounded-b-xl rounded-tr-xl gap-2 bg-[#121520] bg-top">
                    <div class="min-h-[calc(100vh-9em)] px-6 pb-4">
                        <div class="text-center pt-6">
                            <h4 class="text-[#009FB2]">StreamSilk Partner Program</h4>
                            <p>Earn money by hosting and sharing your content with StreamSilk Partner.</p>
                        </div>
                        <div>

                        </div>
                        <div class="pt-4 md:p-4">
                            <div class="sm:grid grid-cols-5 text-center gap-3 mb-3 text-white hidden">
                                <div class="col-span-1 items-center">
                                    <h4>Tier / Length</h4>
                                </div>
                                <div class="col-span-4">
                                    <div class="grid grid-cols-4 h-full items-center">
                                        <div>
                                            <h4 >1-10 min</h4>
                                        </div>
                                        <div>
                                            <h4 >10-30 min</h4>
                                        </div>
                                        <div>
                                            <h4 >30-60 min</h4>
                                        </div>
                                        <div>
                                            <h4 >60-Longer min</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="grid grid-cols-5 text-center gap-3 mb-4 text-orange-400 text-2xl font-medium">
                                <div class="col-span-full sm:col-span-1 bg-[#142132] items-center flex justify-center">
                                    <h4>Tier 1</h4>
                                </div>
                                <div class="col-span-full sm:col-span-4 bg-[#142132] text-center">
                                    <div class="grid grid-cols-4 h-full items-center pt-4">
                                        <div>
                                            <h4>33$</h4>
                                        </div>
                                        <div>
                                            <h4>33$</h4>
                                        </div>
                                        <div>
                                            <h4>33$</h4>
                                        </div>
                                        <div>
                                            <h4>33$</h4>
                                        </div>
                                        <div class="col-span-full text-start text-xs pl-4 py-4">
                                            <h4>Australia, Germany, United Kingdom, United States</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="grid grid-cols-5 text-center gap-3 mb-4 text-teal-400 text-2xl font-medium">
                                <div class="col-span-full sm:col-span-1 bg-[#142132] items-center flex justify-center">
                                    <h4>Tier 2</h4>
                                </div>
                                <div class="col-span-full sm:col-span-4 bg-[#142132] text-center">
                                    <div class="grid grid-cols-4 h-full items-center pt-4">
                                        <div>
                                            <h4>22$</h4>
                                        </div>
                                        <div>
                                            <h4>22$</h4>
                                        </div>
                                        <div>
                                            <h4>22$</h4>
                                        </div>
                                        <div>
                                            <h4>22$</h4>
                                        </div>
                                        <div class="col-span-full text-start text-xs pl-4 py-4">
                                            <h4>Austria, Canada, Finland, France, Norway
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="grid grid-cols-5 text-center gap-3 mb-4 text-fuchsia-400 text-2xl font-medium">
                                <div class="col-span-full sm:col-span-1 bg-[#142132] items-center flex justify-center">
                                    <h4>Tier 3</h4>
                                </div>
                                <div class="col-span-full sm:col-span-4 bg-[#142132] text-center">
                                    <div class="grid grid-cols-4 h-full items-center pt-4">
                                        <div>
                                            <h4>15$</h4>
                                        </div>
                                        <div>
                                            <h4>15$</h4>
                                        </div>
                                        <div>
                                            <h4>15$</h4>
                                        </div>
                                        <div>
                                            <h4>15$</h4>
                                        </div>
                                        <div class="col-span-full text-start text-xs pl-4 py-4">
                                            <h4>Belgium, Croatia, Ireland, Italy, Netherlands, New Zealand, Spain, Sweden, Switzerland
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="grid grid-cols-5 text-center gap-3 mb-4 text-indigo-400 text-2xl font-medium">
                                <div class="col-span-full sm:col-span-1 bg-[#142132] items-center flex justify-center">
                                    <h4>Tier 4</h4>
                                </div>
                                <div class="col-span-full sm:col-span-4 bg-[#142132] text-center">
                                    <div class="grid grid-cols-4 h-full items-center pt-4">
                                        <div>
                                            <h4>11$</h4>
                                        </div>
                                        <div>
                                            <h4>11$</h4>
                                        </div>
                                        <div>
                                            <h4>11$</h4>
                                        </div>
                                        <div>
                                            <h4>11$</h4>
                                        </div>
                                        <div class="col-span-full text-start text-xs pl-4 py-4">
                                            <h4>Bosnia-Herzegovina, Brazil, Chile, Colombia, Cyprus, Czech Republic, Greece, Hong Kong, Hungary, Japan, Mexico, Romania, Serbia, Slovak Republic, Thailand, United Arab Emirates, Bulgaria
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="px-4 text-sm text-slate-400">
                            <h4>Earn a fixed amount per 10.000 downloads or streams. The payment amount is defined by the origin country referred to in the Tier table above. Every other country that is not listed in table is paid 8$/10k views (All durations).</h4>
                        </div>
                        <div class="pl-7 mt-5">
                            <ul class="list-disc grid grid-cols-2 gap-x-5 gap-y-3">
                                <li>5% of video must be watched to be counted as paid. If below 10 minutes 40% required to be watched.</li>
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
    </div>
@endsection
