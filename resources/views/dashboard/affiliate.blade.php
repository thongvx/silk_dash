@extends('dashboard.layouts.app')

@section('content')
    <div class="flex flex-wrap -mx-3 flex-col-reverse lg:flex-row">
        <div class="w-full max-w-full px-3 mt-0 text-white lg:flex-none">
            <div class="mt-3 md:mt-0 rounded-b-box rounded-se-box relative  max-w-full w-full">
                <div
                    class="rounded-b-box rounded-se-box gap-2 bg-[#121520] bg-top">
                    <div class="min-h-[calc(100vh-16em)]">
                        <div class="text-center pt-10">
                            <h4 class="text-[#009FB2]">StreamSilk Partner Program</h4>
                            <p>Earn money by hosting and sharing your content with StreamSilk Partner.</p>
                        </div>
                        <div class="px-2 pt-4 md:p-4">
                            <div class="px-0 pt-0 overflow-auto  mt-3">
                                <table id="live-table" datatable data-page-size="10"
                                       class="text-sm table-fixed overflow-y-clip w-full min-w-max text-white text-left border-none">
                                    <thead class="sticky top-0 z-10">
                                        <tr class="transition-colors text-md">
                                            <th class="py-2.5 px-3 text-center">Tier / Length</th>
                                            <th class="py-2.5 px-3">1-10 min</th>
                                            <th class="py-2.5 px-3">10-30 min</th>
                                            <th class="py-2.5 px-3">30-60 min</th>
                                            <th class="py-2.5 px-3">60-Longer min</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="pb-4 pr-1">
                                                <h4 class="bg-[#142132] text-center text-orange-500 text-2xl font-semibold py-6 px-4">Tier1</h4>
                                            </td>
                                            <td class="pb-4">
                                                <h4 class="bg-[#142132] text-center text-orange-500 text-2xl font-semibold py-6 px-4">$30</h4>
                                            </td>
                                            <td class="pb-4">
                                                <h4 class="bg-[#142132] text-center text-orange-500 text-2xl font-semibold py-6 px-4">$30</h4>
                                            </td>
                                            <td class="pb-4">
                                                <h4 class="bg-[#142132] text-center text-orange-500 text-2xl font-semibold py-6 px-4">$30</h4>
                                            </td>
                                            <td class="pb-4">
                                                <h4 class="bg-[#142132] text-center text-orange-500 text-2xl font-semibold py-6 px-4">$30</h4>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="pb-4 pr-1">
                                                <h4 class="bg-[#142132] text-center text-emerald-500 text-2xl font-semibold py-6 px-4">Tier2</h4>
                                            </td>
                                            <td class="pb-4">
                                                <h4 class="bg-[#142132] text-center text-emerald-500 text-2xl font-semibold py-6 px-4">$20</h4>
                                            </td>
                                            <td class="pb-4">
                                                <h4 class="bg-[#142132] text-center text-emerald-500 text-2xl font-semibold py-6 px-4">$20</h4>
                                            </td>
                                            <td class="pb-4">
                                                <h4 class="bg-[#142132] text-center text-emerald-500 text-2xl font-semibold py-6 px-4">$20</h4>
                                            </td>
                                            <td class="pb-4">
                                                <h4 class="bg-[#142132] text-center text-emerald-500 text-2xl font-semibold py-6 px-4">$20</h4>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="pb-4 pr-1">
                                                <h4 class="bg-[#142132] text-center text-cyan-500 text-2xl font-semibold py-6 px-4">Tier3</h4>
                                            </td>
                                            <td class="pb-4">
                                                <h4 class="bg-[#142132] text-center text-cyan-500 text-2xl font-semibold py-6 px-4">$13</h4>
                                            </td>
                                            <td class="pb-4">
                                                <h4 class="bg-[#142132] text-center text-cyan-500 text-2xl font-semibold py-6 px-4">$13</h4>
                                            </td>
                                            <td class="pb-4">
                                                <h4 class="bg-[#142132] text-center text-cyan-500 text-2xl font-semibold py-6 px-4">$13</h4>
                                            </td>
                                            <td class="pb-4">
                                                <h4 class="bg-[#142132] text-center text-cyan-500 text-2xl font-semibold py-6 px-4">$13</h4>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="pb-4 pr-1">
                                                <h4 class="bg-[#142132] text-center text-indigo-500 text-2xl font-semibold py-6 px-4">Tier4</h4>
                                            </td>
                                            <td class="pb-4">
                                                <h4 class="bg-[#142132] text-center text-indigo-500 text-2xl font-semibold py-6 px-4">$10</h4>
                                            </td>
                                            <td class="pb-4">
                                                <h4 class="bg-[#142132] text-center text-indigo-500 text-2xl font-semibold py-6 px-4">$10</h4>
                                            </td>
                                            <td class="pb-4">
                                                <h4 class="bg-[#142132] text-center text-indigo-500 text-2xl font-semibold py-6 px-4">$10</h4>
                                            </td>
                                            <td class="pb-4">
                                                <h4 class="bg-[#142132] text-center text-indigo-500 text-2xl font-semibold py-6 px-4">$10</h4>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
