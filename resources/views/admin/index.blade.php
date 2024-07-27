@extends('admin.layouts.app')

@section('content')
    <!-- cards -->
    <div class="w-full py-6 mx-auto">
      <!-- row 1 -->
      <div class="flex flex-wrap -mx-3">
          <!-- card1 -->
          <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 xl:mb-0 xl:w-1/5">
              <div class=' mt-2 bg-[#121520] rounded-2xl py-4 px-5'>
                  <div class='flex items-center justify-between'>
                      <div
                          class='bg-[#009FB2] h-12 w-12 rounded-xl flex justify-center items-center'>
                          <i class="material-symbols-outlined opacity-1 text-white text-3xl leading-none">visibility</i>
                      </div>
                      <div>
                          <h3 class='text-md text-slate-400 flex items-center'>
                              User Watching
                              <span class="ml-3 relative flex h-3 w-3">
                                  <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-sky-400 opacity-75"></span>
                                  <span class="relative inline-flex rounded-full h-3 w-3 bg-sky-500"></span>
                                </span>
                          </h3>
                          <h5 class="mb-0 text-2xl text-white text-end">
                              {{ $userWatching }}
                          </h5>
                      </div>
                  </div>
              </div>

          </div>
        <!-- card1 -->
        <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 xl:mb-0 xl:w-1/5">
          <div class=' mt-2 bg-[#121520] rounded-2xl py-4 px-5'>
            <div class='flex items-center justify-between'>
              <div
                class='bg-[#009FB2] h-12 w-12 rounded-xl flex justify-center items-center'>
               <i class="material-symbols-outlined opacity-1 text-white text-3xl leading-none">storage</i>
              </div>
              <div>
                <h3 class='text-md text-slate-400'>Total Storage</h3>
                <h5 class="mb-0 text-2xl text-white text-end">
                  {{ $storage }}
                </h5>
              </div>
            </div>
          </div>

        </div>

          <!-- card3 -->
          <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 xl:mb-0 xl:w-1/5">
              <div class=' mt-2 bg-[#121520] rounded-2xl py-4 px-5'>
                  <div class='flex items-center justify-between'>
                      <div
                          class='bg-[#009FB2] h-12 w-12 rounded-xl flex justify-center items-center'>
                          <i class="material-symbols-outlined opacity-1 text-white text-3xl leading-none">person</i>
                      </div>
                      <div>
                          <h3 class='text-md text-slate-400'>Total Users</h3>
                          <h5 class="mb-0 text-2xl text-white text-end">
                              {{ $users }}
                          </h5>
                      </div>
                  </div>
              </div>

          </div>
        <!-- card2 -->
        <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 xl:mb-0 xl:w-1/5">
          <div class=' mt-2 bg-[#121520] rounded-2xl py-4 px-5'>
            <div class='flex items-center justify-between'>
              <div
                class='bg-[#009FB2] h-12 w-12 rounded-xl flex justify-center items-center'>
               <i class="material-symbols-outlined opacity-1 text-white text-3xl leading-none">trending_up</i>
              </div>
              <div>
                <h3 class='text-md text-slate-400'>Today’s Earning</h3>
                <h5 class="mb-0 text-2xl text-white text-end">
                  ${{ number_format($todayEarning,2) }}
                </h5>
              </div>
            </div>
          </div>

        </div>
        <!-- card4 -->
        <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 xl:mb-0 xl:w-1/5">
          <div class=' mt-2 bg-[#121520] rounded-2xl py-4 px-5'>
            <div class='flex items-center justify-between'>
              <div
                class='bg-[#009FB2] h-12 w-12 rounded-xl flex justify-center items-center'>
               <i class="material-symbols-outlined opacity-1 text-white text-3xl leading-none">attach_money</i>
              </div>
              <div>
                <h3 class='text-md text-slate-400'>Total Balance</h3>
                <h5 class="mb-0 text-2xl text-white text-end">
                  $ {{ number_format($totalBalance, 0) }}
                </h5>
              </div>
            </div>
          </div>

        </div>
      </div>

      <!-- cards row 2 -->
      <div class="flex flex-wrap mt-6 -mx-3">
        <div class="w-full max-w-full px-3 mt-0 mb-6 lg:mb-0 lg:w-7/12 lg:flex-none">
            <div
                class="border-black/12.5 bg-[#121520] shadow-xl relative z-10 flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-clip-border">
                <div class="mb-0 rounded-t-2xl p-6 pt-4 pb-0 flex justify-between">
                    <h6 class="text-[#009FB2] font-bold">
                        <a href="">Statistics</a>
                    </h6>
                    <div class="text-white">
                        <button class="rounded-lg px-4 py-1 bg-[#009FB2] switchButton week"
                                data-chart="week" data-date="{{ $dates['week'] }}">Week</button>
                        <button class="rounded-lg px-4 py-1 bg-[#142132] switchButton"
                                data-chart="month" data-date="{{ $dates['month'] }}">Month</button>
                    </div>
                </div>
                <div class="h-80">
                    <canvas id="chart-line"></canvas>
                </div>
            </div>
        </div>

        <div class="w-full max-w-full px-3 lg:w-5/12 lg:flex-none">
          <div class="border-black/12.5 bg-[#121520] dark:shadow-dark-xl shadow-xl relative z-10 flex min-w-0 flex-col break-words rounded-2xl
                      border-0 border-solid bg-clip-border pb-3">
            <div class="border-black/12.5 mb-0 rounded-t-2xl border-b-0 border-solid p-6 pt-4 pb-0">
              <h6 class="text-[#009FB2] font-bold">Top View User</h6>
            </div>
            <div class="grid grid-cols-1 gap-4 px-4 mt-3">
                <div class="overflow-auto h-80">
                    <table class="items-center w-full align-top border-collapse border-gray-200">
                        <tbody>
                            @forelse( $topUsers as $user )
                                <tr>
                                    <td class="p-2 align-middle bg-transparent border-b w-3/10 whitespace-nowrap dark:border-white/40">
                                        <div class="flex items-center px-2 py-1">
                                            <div class="text-white">
                                                <a href="{{ route('user.show', ['user' => $user['id']]) }}" class="hover:text-[#009FB2] " target="_black">{{ $user['name'] }}</a>
                                            </div>
                                        </div>
                                    </td>
                                    <td
                                        class="p-2 text-sm leading-normal align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40">
                                        <div class="flex-1 text-center">
                                            <h6 class="mb-0 text-sm leading-normal dark:text-white">{{ $user['views'] }}</h6>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr class="my-3 h-12 text-white">
                                    <td class="text-center" colspan="2">No data available in table</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
          </div>
        </div>
      </div>

      <!-- cards row 3 -->

      <div class="flex flex-wrap mt-6 -mx-3">
        <div class="w-full max-w-full px-3 mt-0 mb-6 lg:mb-0 lg:w-7/12 lg:flex-none">
          <div class="relative flex flex-col min-w-0 px-2 pb-3 bg-[#121520] rounded-2xl">
            <div class="p-4 pb-0 mb-0 rounded-t-4">
              <div class="flex justify-between">
                <h6 class="mb-2 text-[#009FB2] font-bold text-lg">Top 10 viewed videos today</h6>
              </div>
            </div>
            <div class="overflow-auto h-80">
              <table class="items-center w-full mb-4 align-top border-collapse border-gray-200 overflow-hidden">
                <tbody>
                    @forelse($topVideos as $video)
                        <tr class="my-3 h-12 odd:bg-transparent even:bg-[#142132] text-white">
                            <td class="p-2  max-w-[4rem] truncate">
                                <a href="{{route('play', $video['slug'])}}" target="_black" class="hover:text-[#009FB2] ">{{ $video['title'] }}</a>
                            </td>
                            <td class="p-2 text-center">
                                {{ $video['views'] }}
                            </td>
                        </tr>
                    @empty
                        <tr class="my-3 h-12 text-white">
                            <td class="text-center" colspan="2">No data available in table</td>
                        </tr>
                    @endforelse


                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="w-full max-w-full px-3 mt-0 lg:w-5/12 lg:flex-none">
          <div class="bg-[#121520] px-2 pb-3 relative flex min-w-0 flex-col rounded-2xl ">
            <div class="p-4 pb-0 rounded-t-4">
              <h6 class="mb-2 text-[#009FB2] font-bold text-lg">Top Country</h6>
            </div>
            <div class="overflow-auto h-80">
              <table class="items-center w-full mb-4 align-top border-collapse border-gray-200 dark:border-white/40">
                  <thead class="bg-[#142132] transition-colors text-sm">
                      <tr class="text-white">
                          <th class="p-2 ">
                              Country
                          </th>
                          <th class="p-2">
                              Views
                          </th>
                          <th class="p-2">
                              Bounce
                          </th>
                      </tr>
                  </thead>
                  <tbody>
                  @forelse ($topCountries as $country => $data)
                      <tr class="my-3 h-12 odd:bg-transparent even:bg-[#142132]">
                          <td class="p-2">
                              <div class="flex items-center px-2 py-1">
                                  <div class="text-white">
                                      {{ $data['country'] }}
                                  </div>
                              </div>
                          </td>
                          <td
                              class="p-2">
                              <div class="flex-1 text-center text-white">
                                  <h6 class="mb-0 text-sm leading-normal">{{ $data['views'] }}</h6>
                              </div>
                          </td>
                          <td
                              class="p-2">
                              <div class="flex-1 text-center text-white">
                                  <h6 class="mb-0 text-sm leading-normal">{{ $data['percentage'] }}</h6>
                              </div>
                          </td>
                      </tr>
                  @empty
                      <tr class="my-3 h-12 text-white">
                          <td class="text-center" colspan="3">No data available in table</td>
                      </tr>
                  @endforelse

                  </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/chart/filechart.js') }}"></script>
@endsection
