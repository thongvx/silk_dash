@extends('admin.layouts.app')

@section('content')
    <!-- cards -->
    <div class="w-full py-6 mx-auto">
      <!-- row 1 -->
      <div class="flex flex-wrap -mx-3">
        <!-- card1 -->
        <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 xl:mb-0 xl:w-1/4">
          <div class=' mt-2 shadow-xl drop-shadow-sm bg-[#121520] rounded-2xl py-2 px-5 shadow-gray-600/30 dark:shadow-slate-900'>
            <div class='flex items-center justify-between'>
              <div
                class='bg-[#009FB2] p-3 rounded-xl lg:-mt-14 shadow-lg shadow-gray-400/50 dark:shadow-slate-900'>
               <i class="material-symbols-outlined opacity-1 text-white text-3xl leading-none	">storage</i>
              </div>
              <div class='font-semibold'>
                <h3 class='text-lg text-[#009FB2]'>Storage</h3>
                <h5 class="mb-0 font-bold text-2xl text-white text-end">
                  5.1 GB
                </h5>
              </div>
            </div>
            <hr class="h-px mx-1 mt-4 mb-2 bg-transparent bg-gradient-to-r from-transparent via-white to-transparent border-none" />
            <div>
              <p class="mb-0 text-white opacity-0.8">
                <span class="text-sm font-bold leading-normal text-[#009FB2]">255</span>
                file
              </p>
            </div>
          </div>

        </div>

        <!-- card2 -->
        <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 xl:mb-0 xl:w-1/4">
          <div class=' mt-2 shadow-xl drop-shadow-sm bg-[#121520] rounded-2xl py-2 px-5 shadow-gray-600/30 dark:shadow-slate-900'>
            <div class='flex items-center justify-between'>
              <div
                class='bg-[#009FB2] p-3 rounded-xl lg:-mt-14 shadow-lg shadow-gray-400/50 dark:shadow-slate-900'>
               <i class="material-symbols-outlined opacity-1 text-white text-3xl leading-none	">trending_up</i>
              </div>
              <div class='font-semibold'>
                <h3 class='text-lg text-[#009FB2]'>Today’s Earning</h3>
                <h5 class="mb-0 font-bold text-2xl text-white text-end">
                  $53,000
                </h5>
              </div>
            </div>
            <hr class="h-px mx-1 mt-4 mb-2 bg-transparent bg-gradient-to-r from-transparent via-white to-transparent border-none" />
            <div>
              <p class="mb-0 text-white opacity-0.8">
                <span class="text-sm font-bold leading-normal text-[#009FB2]">+55%</span>
                since yesterday
              </p>
            </div>
          </div>

        </div>

        <!-- card3 -->
        <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 xl:mb-0 xl:w-1/4">
          <div class=' mt-2 shadow-xl drop-shadow-sm bg-[#121520] rounded-2xl py-2 px-5 shadow-gray-600/30 dark:shadow-slate-900'>
            <div class='flex items-center justify-between'>
              <div
                class='bg-[#009FB2] p-3 rounded-xl lg:-mt-14 shadow-lg shadow-gray-400/50 dark:shadow-slate-900'>
               <i class="material-symbols-outlined opacity-1 text-white text-3xl leading-none	">trending_up</i>
              </div>
              <div class='font-semibold'>
                <h3 class='text-lg text-[#009FB2]'>Yesterday’s Earning</h3>
                <h5 class="mb-0 font-bold text-2xl text-white text-end">
                  $53,000
                </h5>
              </div>
            </div>
            <hr class="h-px mx-1 mt-4 mb-2 bg-transparent bg-gradient-to-r from-transparent via-white to-transparent border-none" />
            <div>
              <p class="mb-0 text-white opacity-0.8">
                <span class="text-sm font-bold leading-normal text-[#009FB2]">+55%</span>
                since yesterday
              </p>
            </div>
          </div>

        </div>

        <!-- card4 -->
        <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 xl:mb-0 xl:w-1/4">
          <div class=' mt-2 shadow-xl drop-shadow-sm bg-[#121520] rounded-2xl py-2 px-5 shadow-gray-600/30 dark:shadow-slate-900'>
            <div class='flex items-center justify-between'>
              <div
                class='bg-[#009FB2] p-3 rounded-xl lg:-mt-14 shadow-lg shadow-gray-400/50 dark:shadow-slate-900'>
               <i class="material-symbols-outlined opacity-1 text-white text-3xl leading-none	">attach_money</i>
              </div>
              <div class='font-semibold'>
                <h3 class='text-lg text-[#009FB2]'>Total Balance</h3>
                <h5 class="mb-0 font-bold text-2xl text-white text-end">
                  $53,000
                </h5>
              </div>
            </div>
            <hr class="h-px mx-1 mt-4 mb-2 bg-transparent bg-gradient-to-r from-transparent via-white to-transparent border-none" />
            <div>
              <p class="mb-0 text-white opacity-0.8">
                <span class="text-sm font-bold leading-normal text-[#009FB2]">+55%</span>
                since yesterday
              </p>
            </div>
          </div>

        </div>
      </div>

      <!-- cards row 2 -->
      <div class="flex flex-wrap mt-6 -mx-3">
        <div class="w-full max-w-full px-3 mt-0 mb-6 lg:mb-0 lg:w-7/12 lg:flex-none">
          <div class="border-black/12.5 bg-[#121520] dark:shadow-dark-xl shadow-xl relative z-10 flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-clip-border">
            <div class="border-black/12.5 mb-0 rounded-t-2xl border-b-0 border-solid p-6 pt-4 pb-0">
              <h6 class="text-[#009FB2] font-bold">Statistics</h6>
              <p class="mb-0 text-sm leading-normal dark:text-white dark:opacity-60">
                <i class="fa fa-arrow-up text-[#009FB2]"></i>
                <span class="font-semibold">4% more</span> in 2024
              </p>
            </div>
            <div class="flex-auto p-4">
              <div>
                <canvas id="chart-line" height="350"></canvas>
              </div>
            </div>
          </div>
        </div>

        <div class="w-full max-w-full px-3 lg:w-5/12 lg:flex-none">
          <div class="border-black/12.5 bg-[#121520] dark:shadow-dark-xl shadow-xl relative z-10 flex min-w-0 flex-col break-words rounded-2xl
                      border-0 border-solid bg-clip-border pb-3">
            <div class="border-black/12.5 mb-0 rounded-t-2xl border-b-0 border-solid p-6 pt-4 pb-0">
              <h6 class="text-[#009FB2] font-bold">Notification</h6>
            </div>
            <div class="grid grid-cols-1 gap-4 px-4 mt-3 h-[calc(380px)] overflow-auto">
              <div class="bg-[#1a2035] flex items-center rounded-lg py-2 px-2 text-white shadow-lg drop-shadow-sm">
               <i class="material-symbols-outlined mr-3 text-3xl text-red-500">error</i>
                <div>
                  <h6 class="text-red-500 font-bold">
                    Error encoder video GoPNmF4T0oEjnennbwt5
                  </h6>
                  <p class="italic">
                    The video GoPNmF4T0oEjnennbwt5(PETS-036.mp4) has been deleted. Because I can not encode the video
                  </p>
                </div>
              </div>
              <div class="bg-[#1a2035] flex items-center rounded-lg py-2 px-2 text-white shadow-lg drop-shadow-sm">
               <i class="material-symbols-outlined mr-3 text-3xl text-red-500">error</i>
                <div>
                  <h6 class="text-red-500 font-bold">
                    Error encoder video GoPNmF4T0oEjnennbwt5
                  </h6>
                  <p class="italic">
                    The video GoPNmF4T0oEjnennbwt5(PETS-036.mp4) has been deleted. Because I can not encode the video
                  </p>
                </div>
              </div>
              <div class="bg-[#1a2035] flex items-center rounded-lg py-2 px-2 text-white shadow-lg drop-shadow-sm">
               <i class="material-symbols-outlined mr-3 text-3xl text-red-500">error</i>
                <div>
                  <h6 class="text-red-500 font-bold">
                    Error encoder video GoPNmF4T0oEjnennbwt5
                  </h6>
                  <p class="italic">
                    The video GoPNmF4T0oEjnennbwt5(PETS-036.mp4) has been deleted. Because I can not encode the video
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- cards row 3 -->

      <div class="flex flex-wrap mt-6 -mx-3">
        <div class="w-full max-w-full px-3 mt-0 mb-6 lg:mb-0 lg:w-7/12 lg:flex-none">
          <div class="relative flex flex-col min-w-0 break-wordsborder-0 border-solid shadow-xl bg-[#121520] dark:shadow-dark-xl border-black-125 rounded-2xl bg-clip-border">
            <div class="p-4 pb-0 mb-0 rounded-t-4">
              <div class="flex justify-between">
                <h6 class="mb-2 text-[#009FB2] font-bold text-lg">Top 10 viewed videos today</h6>
              </div>
            </div>
            <div class="overflow-auto h-[calc(25vh)]">
              <table class="items-center w-full mb-4 align-top border-collapse border-gray-200 overflow-hidden">
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
                        <h6 class="mb-0 text-sm leading-normal dark:text-white">3400</h6>
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
                        <h6 class="mb-0 text-sm leading-normal dark:text-white">3400</h6>
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
                        <h6 class="mb-0 text-sm leading-normal dark:text-white">3400</h6>
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
                        <h6 class="mb-0 text-sm leading-normal dark:text-white">3400</h6>
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
                        <h6 class="mb-0 text-sm leading-normal dark:text-white">3400</h6>
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
                        <h6 class="mb-0 text-sm leading-normal dark:text-white">3400</h6>
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
                        <h6 class="mb-0 text-sm leading-normal dark:text-white">3400</h6>
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
                        <h6 class="mb-0 text-sm leading-normal dark:text-white">3400</h6>
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
                        <h6 class="mb-0 text-sm leading-normal dark:text-white">3400</h6>
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
                        <h6 class="mb-0 text-sm leading-normal dark:text-white">3400</h6>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="w-full max-w-full px-3 mt-0 lg:w-5/12 lg:flex-none">
          <div class="border-black/12.5 shadow-xl bg-[#121520] dark:shadow-dark-xl relative flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-clip-border">
            <div class="p-4 pb-0 rounded-t-4">
              <h6 class="mb-0 text-[#009FB2] font-bold text-lg">Top Country</h6>
            </div>
            <div class="overflow-auto">
              <table class="items-center w-full mb-4 align-top border-collapse border-gray-200 dark:border-white/40">
                <tbody>
                  <tr>
                    <td class="p-2 align-middle bg-transparent border-b w-3/10 whitespace-nowrap dark:border-white/40">
                      <div class="flex items-center px-2 py-1">
                        <div>
                          <img src="../assets/img/icons/flags/US.png" alt="Country flag" />
                        </div>
                        <div class="ml-6">
                          <p class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60">Country:
                          </p>
                          <h6 class="mb-0 text-sm leading-normal dark:text-white">United States</h6>
                        </div>
                      </div>
                    </td>
                    <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40">
                      <div class="text-center">
                        <p class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60">Sales:</p>
                        <h6 class="mb-0 text-sm leading-normal dark:text-white">2500</h6>
                      </div>
                    </td>
                    <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40">
                      <div class="text-center">
                        <p class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60">Value:</p>
                        <h6 class="mb-0 text-sm leading-normal dark:text-white">$230,900</h6>
                      </div>
                    </td>
                    <td
                      class="p-2 text-sm leading-normal align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40">
                      <div class="flex-1 text-center">
                        <p class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60">Bounce:</p>
                        <h6 class="mb-0 text-sm leading-normal dark:text-white">29.9%</h6>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="p-2 align-middle bg-transparent border-b w-3/10 whitespace-nowrap dark:border-white/40">
                      <div class="flex items-center px-2 py-1">
                        <div>
                          <img src="../assets/img/icons/flags/DE.png" alt="Country flag" />
                        </div>
                        <div class="ml-6">
                          <p class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60">Country:
                          </p>
                          <h6 class="mb-0 text-sm leading-normal dark:text-white">Germany</h6>
                        </div>
                      </div>
                    </td>
                    <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40">
                      <div class="text-center">
                        <p class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60">Sales:</p>
                        <h6 class="mb-0 text-sm leading-normal dark:text-white">3.900</h6>
                      </div>
                    </td>
                    <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40">
                      <div class="text-center">
                        <p class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60">Value:</p>
                        <h6 class="mb-0 text-sm leading-normal dark:text-white">$440,000</h6>
                      </div>
                    </td>
                    <td
                      class="p-2 text-sm leading-normal align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40">
                      <div class="flex-1 text-center">
                        <p class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60">Bounce:</p>
                        <h6 class="mb-0 text-sm leading-normal dark:text-white">40.22%</h6>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="p-2 align-middle bg-transparent border-b w-3/10 whitespace-nowrap dark:border-white/40">
                      <div class="flex items-center px-2 py-1">
                        <div>
                          <img src="../assets/img/icons/flags/GB.png" alt="Country flag" />
                        </div>
                        <div class="ml-6">
                          <p class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60">Top Country:
                          </p>
                          <h6 class="mb-0 text-sm leading-normal dark:text-white">Great Britain</h6>
                        </div>
                      </div>
                    </td>
                    <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40">
                      <div class="text-center">
                        <p class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60">Sales:</p>
                        <h6 class="mb-0 text-sm leading-normal dark:text-white">1.400</h6>
                      </div>
                    </td>
                    <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40">
                      <div class="text-center">
                        <p class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60">Value:</p>
                        <h6 class="mb-0 text-sm leading-normal dark:text-white">$190,700</h6>
                      </div>
                    </td>
                    <td
                      class="p-2 text-sm leading-normal align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40">
                      <div class="flex-1 text-center">
                        <p class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60">Bounce:</p>
                        <h6 class="mb-0 text-sm leading-normal dark:text-white">23.44%</h6>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="p-2 align-middle bg-transparent border-0 w-3/10 whitespace-nowrap">
                      <div class="flex items-center px-2 py-1">
                        <div>
                          <img src="../assets/img/icons/flags/BR.png" alt="Country flag" />
                        </div>
                        <div class="ml-6">
                          <p class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60">Country:
                          </p>
                          <h6 class="mb-0 text-sm leading-normal dark:text-white">Brasil</h6>
                        </div>
                      </div>
                    </td>
                    <td class="p-2 align-middle bg-transparent border-0 whitespace-nowrap">
                      <div class="text-center">
                        <p class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60">Sales:</p>
                        <h6 class="mb-0 text-sm leading-normal dark:text-white">562</h6>
                      </div>
                    </td>
                    <td class="p-2 align-middle bg-transparent border-0 whitespace-nowrap">
                      <div class="text-center">
                        <p class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60">Value:</p>
                        <h6 class="mb-0 text-sm leading-normal dark:text-white">$143,960</h6>
                      </div>
                    </td>
                    <td class="p-2 text-sm leading-normal align-middle bg-transparent border-0 whitespace-nowrap">
                      <div class="flex-1 text-center">
                        <p class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60">Bounce:</p>
                        <h6 class="mb-0 text-sm leading-normal dark:text-white">32.14%</h6>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection


