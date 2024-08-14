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
                                                <div
                                                    class="flex flex-col bg-clip-border rounded-xl text-gray-700 bg-transparent">
                                                    <div class="px-0 pt-0">
                                                        <div class="px-0 pt-0 overflow-auto h-[calc(100vh-14em)] ">
                                                            <table id="datatable" datatable data-page-size="10"
                                                                   data-column-table="{{request()->get('column') ?? 'created_at'}}"
                                                                   data-column-direction="{{request()->get('direction') ?? 'desc'}}"
                                                                   class="text-sm border-separate table-auto overflow-y-clip w-full min-w-max text-white text-left !border-t-0">
                                                                <thead class="sticky top-0 z-10">
                                                                <tr class="bg-[#142132] transition-colors text-md">
                                                                    <th class="before:!bottom-2 after:!bottom-2 pl-2 py-2 cursor-pointer text-start px-1">
                                                                        User ID
                                                                    </th>
                                                                    <th class="before:!bottom-2 after:!bottom-2 pl-2 py-2 cursor-pointer px-1">
                                                                        USDT Address
                                                                    </th>
                                                                    <th class="before:!bottom-2 after:!bottom-2 pl-2 py-2 cursor-pointer px-1">
                                                                        Network
                                                                    </th>
                                                                    <th class="before:!bottom-2 after:!bottom-2 pl-2 py-2 cursor-pointer">
                                                                        Amount
                                                                    </th>
                                                                    <th class="before:!bottom-2 after:!bottom-2 pl-2 py-2 cursor-pointer text-center">
                                                                        Comment
                                                                    </th>
                                                                    <th class="before:!bottom-2 after:!bottom-2 pl-2 py-2 cursor-pointer text-center">
                                                                        Status
                                                                    </th>
                                                                    <th class="before:!bottom-2 after:!bottom-2 pl-2 py-2 cursor-pointer px-1">
                                                                        Created Date
                                                                    </th>
                                                                    <th class="before:!bottom-2 after:!bottom-2 pl-2 py-2 cursor-pointer px-1">
                                                                    </th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @forelse( $payments as $payment)
                                                                        <tr class="my-3 h-12 odd:bg-transparent even:bg-[#142132]" data-id="{{ $payment->id }}">
                                                                            <td class="text-center {{ $payment->status == 1 ? 'text-[#009FB2]' : '' }}">{{ $payment->user_ID }}</td>
                                                                            <td>{{ $payment->transaction_ID }}</td>
                                                                            <td>{{ $payment->network }}</td>
                                                                            <td>{{ $payment->amount + $payment->gift }}</td>
                                                                            <td class="px-3">
                                                                                @if($payment->status == 1)
                                                                                    {{ $payment->comment }}
                                                                                @else
                                                                                    <input type="email" name="comment" value="" input-comment
                                                                                           class=" bg-transparent text-white placeholder:text-gray-400/80 placeholder:font-normal w-full mx-1 pl-2 appearance-none outline-none autofill:bg-yellow-200"
                                                                                           placeholder="comment" >
                                                                                @endif
                                                                            </td>
                                                                            <td class=" text-center {{ $payment->status == 1 ? 'text-[#009FB2]' : '' }}">
                                                                                @if($payment->status == 0)
                                                                                    <select name="status" class="bg-[#009FB2] text-white placeholder:text-gray-400/80 placeholder:font-normal px-3 py-1.5 pl-2
                                                                                                        rounded-lg outline-none autofill:bg-yellow-200 w-max" select-status>
                                                                                        <option value="0" selected>Pending</option>
                                                                                        <option value="1">Paid</option>
                                                                                    </select>
                                                                                @else
                                                                                    Paid
                                                                                @endif
                                                                            </td>
                                                                            <td>{{ date('Y-m-d') }}</td>
                                                                            <td>
                                                                                <button btn-submit-payment id="all" class="px-4 py-1 rounded-lg text-white hover:bg-[#009FB2] ml-2 bg-blue-600" data-task="all">
                                                                                    <a href="javascript:;">Submit</a>
                                                                                </button>
                                                                            </td>
                                                                        </tr>
                                                                    @empty
                                                                        <tr>
                                                                            <td colspan="8" class="text-center py-4">No data
                                                                                available
                                                                            </td>
                                                                        </tr>
                                                                    @endforelse
                                                                </tbody>
                                                            </table>
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
    </div>
@endsection
