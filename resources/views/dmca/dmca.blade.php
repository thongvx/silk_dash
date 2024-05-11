@extends('layouts.app')

@section('content')
    <div class="flex flex-wrap -mx-3 flex-col-reverse lg:flex-row">
        <div class="w-full max-w-full px-3 mt-0 text-white lg:flex-none ">
            <div class="mt-3 md:mt-0 rounded-b-box rounded-se-box relative  max-w-full w-full rounded-xl">
                <div
                    class="border-[#121520] rounded-b-box rounded-se-box gap-2 bg-[#121520] bg-top [border-width:var(--tab-border)] undefined">
                    <div class="lg:min-h-[calc(100vh-8em)]" id="box-content" page-video>
                        <div class="rounded-xl">
                            <div class="relative rounded-xl">
                                <div class="px-2 pt-4 md:p-4  rounded-xl">
                                    <div class="mb-2" id='title'>
                                        <h5 class="items-center text-transparent flex bg-clip-text bg-gradient-to-r from-purple-500 to-pink-500">
                                            <span>DMCA</span>
                                        </h5>
                                    </div>
                                    <div class="flex justify-between items-center w-full mb-3">
                                        <div class="text-sm bg-[#142132] rounded-lg p-2">
                                            <label for="limit">Show:</label>
                                            <select name="limit" class="bg-transparent outline-transparent"
                                                    id="limit">
                                                <option value="10"
                                                        class="limit">
                                                    10
                                                </option>
                                                <option value="20"
                                                        class="limit">
                                                    20
                                                </option>
                                                <option value="50"
                                                        class="limit">
                                                    50
                                                </option>
                                                <option value="100"
                                                        class="limit">
                                                    100
                                                </option>
                                            </select>
                                            <span>entries</span>
                                        </div>
                                    </div>
                                    <div class="tab-content flex flex-col bg-clip-border rounded-xl text-gray-700 bg-transparent">
                                        <div class="px-0 pt-0 overflow-auto max-h-[calc(100vh-20em)] ">
                                            <table id="datatable" datatable data-page-size="10" data-column-table="id"
                                                   data-column-direction="asc"
                                                   class="text-sm border-separate table-auto overflow-y-clip w-full min-w-max text-white text-left !border-t-0">
                                                <thead class="sticky top-0 z-10">
                                                <tr class="bg-[#142132] transition-colors text-md">
                                                    <th class="py-2.5 px-3 text-center">Report ID</th>
                                                    <th class="py-2.5 px-3 text-center">From</th>
                                                    <th class="py-2.5 px-3 text-center">Status</th>
                                                    <th class="py-2.5 px-3 text-center">Created at</th>
                                                    <th class="py-2.5 px-3 text-center">Date due</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    <tr class="my-3 h-12 bg-[#142132]">
                                                        <td class="text-center">1</td>
                                                        <td><a href="/dmca/1" class="hover:text-[#009FB2]">copyright@govinet.com</a></td>
                                                        <td class="text-center">
                                                            <button class="bg-emerald-400 px-3 py-1 rounded-md">open</button>
                                                        </td>
                                                        <td class="text-center">04/01/2022</td>
                                                        <td class="text-center">04/02/2022</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="button-table pt-4 text-white text-sm flex justify-between items-center">
                                            <div class="dataTables_info bg-[#142132] rounded-lg">
                                                <p class="p-2">
                                                    Showing
                                                    <span class="font-medium">20</span>
                                                    to
                                                    <span class="font-medium">30</span>
                                                    of
                                                    <span class="font-medium">100</span>
                                                    results
                                                </p>
                                            </div>
                                            <div class="pagination flex items-center">
                                                {{-- Previous Page Link --}}
                                                <span
                                                    class="text-white opacity-50 py-2 px-3 w-max rounded-lg cursor-not-allowed bg-[#142132]">Previous</span>


                                                {{-- Pagination Elements --}}
                                                <li class="page list-none " data-page="1">
                                                    <a class="hover:bg-[#009FB2] text-white mx-1 py-2 px-3 w-max rounded-lg bg-[#142132]"
                                                       href="javascript:void(0)">1</a>
                                                </li>



                                                {{-- Next Page Link --}}
                                                <span class="text-white opacity-50 py-2 px-3 w-max rounded-lg cursor-not-allowed bg-[#142132]">Next</span>
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
