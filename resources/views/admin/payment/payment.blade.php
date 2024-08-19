@extends('admin.layouts.app')
@section('content')
    <!-- cards -->
    <div class="w-full mx-auto mt-5">
        <div class="flex flex-wrap -mx-3 flex-col-reverse lg:flex-row">
            <div class="w-full max-w-full px-2 mt-0 text-white lg:flex-none">
                <div class="lg:mr-2 flex flex-col font-semibold">
                    <div class="mt-3 md:mt-0 rounded-b-xl rounded-tr-xl relative  max-w-full w-full">
                        <div class="border-base-300 rounded-b-xl rounded-tr-xl gap-2 bg-[#121520] bg-top">
                            <div class="tab-content-video">
                                <div class="rounded-xl" id="box-content">
                                    <div class="px-0 pt-0">
                                        <div class="relative rounded-xl bg-[#121520]" id="manage-task">
                                            <div class="pt-4 md:p-4">
                                                <div class="flex justify-between items-center w-full mb-3">
                                                    <div class="text-sm bg-[#142132] rounded-lg p-2">
                                                        <label for="limit">Show:</label>
                                                        <select name="limit" class="bg-transparent outline-none"
                                                                id="limit">
                                                            <option value="20"
                                                                    class="limit" {{ $payments->perPage() == 20 ? 'selected' : '' }}>
                                                                20
                                                            </option>
                                                            <option value="50"
                                                                    class="limit" {{ $payments->perPage() == 50 ? 'selected' : '' }}>
                                                                50
                                                            </option>
                                                            <option value="100"
                                                                    class="limit" {{ $payments->perPage() == 100 ? 'selected' : '' }}>
                                                                100
                                                            </option>
                                                        </select>
                                                        <span>entries</span>
                                                    </div>
                                                    <div class="items-center md:ml-auto px-2 flex">
                                                        <form class="flex items-center relative bg-[#142132] w-full rounded-lg ease" id="form-search-user" search>
                                                            <label for="search-user" class="p-1 flex bg-[#142132] items-center translate-x-3 transition duration-300 ease-in-out z-30 absolute text-slate-400">Search User</label>
                                                            <input type="text" id="search-user" name="videoID" value="" search-user
                                                                   class="z-20 px-3 py-2 text-sm relative -ml-px block min-w-0 lg:w-52 flex-auto text-white rounded-lg bg-transparent bg-clip-padding focus:outline-none
                                                                    border border-solid border-[#142132]"
                                                            />
                                                            <input type="submit" value="Search" class="hidden" />
                                                        </form>
                                                    </div>
                                                </div>
                                                <div
                                                    class="flex flex-col bg-clip-border rounded-xl text-gray-700 bg-transparent">
                                                    <div class="px-0 pt-0" id="box-datatable">
                                                        @include('admin.payment.table')
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
        </div>
    </div>
@endsection
