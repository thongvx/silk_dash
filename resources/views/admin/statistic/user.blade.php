<div class=" h-[calc(100vh-14em)]">
    <div class="rounded-xl">
        <div class="flex relative rounded-xl bg-[#121520]">
            <div class="w-full max-w-full px-3 mt-0 mb-6 lg:mb-0 lg:w-2/12 lg:flex-none">
                <div
                    class="relative flex flex-col min-w-0 break-wordsborder-0 border-solid bg-[#121520] border-black-125 rounded-2xl bg-clip-border">
                    <div class="p-4 pb-0 mb-0 rounded-t-4">
                        <div class="flex justify-between">
                            <h6 class="mb-2 text-emerald-500 font-bold text-lg">User</h6>
                        </div>
                    </div>
                    <div class="">
                        <table
                            class="items-center w-full mb-4 align-top border-collapse border-gray-200 overflow-hidden">
                            <tbody>
                                @forelse($topUsers as $user)
                                    <tr>
                                        <td class="p-2 align-middle bg-transparent border-b w-3/10 whitespace-nowrap dark:border-white/40">
                                            <div class="flex items-center px-2 py-1">
                                                <div class="text-white">
                                                    {{ $user->name }}
                                                </div>
                                            </div>
                                        </td>
                                        <td
                                            class="p-2 text-sm leading-normal align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40">
                                            <div class="flex-1 text-center">
                                                <h6 class="mb-0 text-sm leading-normal dark:text-white">
                                                    3400</h6>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr class="my-3 h-12">
                                        <td colspan="12" class="text-white text-center">No data found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="w-full max-w-full px-6 mt-0 mb-6 lg:mb-0 lg:w-2/12 lg:flex-none">
                <div
                    class="relative flex flex-col min-w-0 break-wordsborder-0 border-solid bg-[#121520] border-black-125 rounded-2xl bg-clip-border">
                    <div class="p-4 pb-0 mb-0 rounded-t-4">
                        <div class="flex justify-between">
                            <h6 class="mb-2 text-indigo-500 font-bold text-lg">Vip User</h6>
                        </div>
                    </div>
                    <div class="">
                        <table
                            class="items-center w-full mb-4 align-top border-collapse border-gray-200 overflow-hidden">
                            <tbody>
                            <tr>
                                <td class="p-2 align-middle bg-transparent border-b w-3/10 whitespace-nowrap dark:border-white/40">
                                    <div class="flex items-center px-2 py-1">
                                        <div class="text-white">
                                            sub-WAAA-135.mp4
                                        </div>
                                    </div>
                                </td>
                                <td
                                    class="p-2 text-sm leading-normal align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40">
                                    <div class="flex-1 text-center">
                                        <h6 class="mb-0 text-sm leading-normal dark:text-white">
                                            3400</h6>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="p-2 align-middle bg-transparent border-b w-3/10 whitespace-nowrap dark:border-white/40">
                                    <div class="flex items-center px-2 py-1">
                                        <div class="text-white">
                                            sub-WAAA-135.mp4
                                        </div>
                                    </div>
                                </td>
                                <td
                                    class="p-2 text-sm leading-normal align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40">
                                    <div class="flex-1 text-center">
                                        <h6 class="mb-0 text-sm leading-normal dark:text-white">
                                            3400</h6>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="p-2 align-middle bg-transparent border-b w-3/10 whitespace-nowrap dark:border-white/40">
                                    <div class="flex items-center px-2 py-1">
                                        <div class="text-white">
                                            sub-WAAA-135.mp4
                                        </div>
                                    </div>
                                </td>
                                <td
                                    class="p-2 text-sm leading-normal align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40">
                                    <div class="flex-1 text-center">
                                        <h6 class="mb-0 text-sm leading-normal dark:text-white">
                                            3400</h6>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="p-2 align-middle bg-transparent border-b w-3/10 whitespace-nowrap dark:border-white/40">
                                    <div class="flex items-center px-2 py-1">
                                        <div class="text-white">
                                            sub-WAAA-135.mp4
                                        </div>
                                    </div>
                                </td>
                                <td
                                    class="p-2 text-sm leading-normal align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40">
                                    <div class="flex-1 text-center">
                                        <h6 class="mb-0 text-sm leading-normal dark:text-white">
                                            3400</h6>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="p-2 align-middle bg-transparent border-b w-3/10 whitespace-nowrap dark:border-white/40">
                                    <div class="flex items-center px-2 py-1">
                                        <div class="text-white">
                                            sub-WAAA-135.mp4
                                        </div>
                                    </div>
                                </td>
                                <td
                                    class="p-2 text-sm leading-normal align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40">
                                    <div class="flex-1 text-center">
                                        <h6 class="mb-0 text-sm leading-normal dark:text-white">
                                            3400</h6>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="p-2 align-middle bg-transparent border-b w-3/10 whitespace-nowrap dark:border-white/40">
                                    <div class="flex items-center px-2 py-1">
                                        <div class="text-white">
                                            sub-WAAA-135.mp4
                                        </div>
                                    </div>
                                </td>
                                <td
                                    class="p-2 text-sm leading-normal align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40">
                                    <div class="flex-1 text-center">
                                        <h6 class="mb-0 text-sm leading-normal dark:text-white">
                                            3400</h6>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="p-2 align-middle bg-transparent border-b w-3/10 whitespace-nowrap dark:border-white/40">
                                    <div class="flex items-center px-2 py-1">
                                        <div class="text-white">
                                            sub-WAAA-135.mp4
                                        </div>
                                    </div>
                                </td>
                                <td
                                    class="p-2 text-sm leading-normal align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40">
                                    <div class="flex-1 text-center">
                                        <h6 class="mb-0 text-sm leading-normal dark:text-white">
                                            3400</h6>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="p-2 align-middle bg-transparent border-b w-3/10 whitespace-nowrap dark:border-white/40">
                                    <div class="flex items-center px-2 py-1">
                                        <div class="text-white">
                                            sub-WAAA-135.mp4
                                        </div>
                                    </div>
                                </td>
                                <td
                                    class="p-2 text-sm leading-normal align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40">
                                    <div class="flex-1 text-center">
                                        <h6 class="mb-0 text-sm leading-normal dark:text-white">
                                            3400</h6>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="p-2 align-middle bg-transparent border-b w-3/10 whitespace-nowrap dark:border-white/40">
                                    <div class="flex items-center px-2 py-1">
                                        <div class="text-white">
                                            sub-WAAA-135.mp4
                                        </div>
                                    </div>
                                </td>
                                <td
                                    class="p-2 text-sm leading-normal align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40">
                                    <div class="flex-1 text-center">
                                        <h6 class="mb-0 text-sm leading-normal dark:text-white">
                                            3400</h6>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="p-2 align-middle bg-transparent border-b w-3/10 whitespace-nowrap dark:border-white/40">
                                    <div class="flex items-center px-2 py-1">
                                        <div class="text-white">
                                            sub-WAAA-135.mp4
                                        </div>
                                    </div>
                                </td>
                                <td
                                    class="p-2 text-sm leading-normal align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40">
                                    <div class="flex-1 text-center">
                                        <h6 class="mb-0 text-sm leading-normal dark:text-white">
                                            3400</h6>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- cards row 2 -->
            <div class="w-full max-w-full px-3 mt-0 mb-6 lg:mb-0 lg:w-8/12 lg:flex-none">
                <div
                    class="border-black/12.5 bg-[#121520] relative flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-clip-border">
                    <div class="mb-0 rounded-t-2xl p-6 pt-4 pb-0 flex justify-between">
                        <h6 class="text-[#009FB2] font-bold">
                            <a href="">Statistics</a>
                        </h6>
                        <div class="text-white">
                            <button class="rounded-lg px-4 py-1 bg-[#009FB2] switchButton week"
                                    data-chart="week" data-date="">User</button>
                            <button class="rounded-lg px-4 py-1 bg-[#142132] switchButton"
                                    data-chart="month" data-date="">Vip User</button>
                        </div>
                    </div>
                    <div class="h-80">
                        <canvas id="chart-line"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
