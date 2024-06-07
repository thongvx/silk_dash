<div class="mt-4">
    <div>
         @foreach($activities as $activity)
            <div class="mb-5 bg-[#142132] rounded-lg py-2 px-2 text-white shadow-lg drop-shadow-sm">
                <div class="font-normal">
                    <div class="flex justify-between w-full">
                        @php
                            $user_agent = json_decode($activity->user_agent, true);
                        @endphp
                        @if($user_agent)
                            <p class="text-white">
                                You logged in using {{ $user_agent['browser'] ?? 'Unknown' }} on {{ $user_agent['os'] ?? 'Unknown' }}
                            </p>
                        @else
                            <p class="text-white">
                                You have logged in using the IP address {{$activity -> ip_address }}
                            </p>
                        @endif
                        <h6 class="text-red-500">
                            {{$activity->created_at->diffForHumans()}}
                        </h6>
                    </div>
                    <div class="mt-2 flex items-center">
                        @if($activity -> location != ', , ')
                            <i class="material-symbols-outlined mr-3 text-3xl text-red-500">location_on</i>
                            <p class="italic">
                                {{$activity ->location }}
                            </p>
                        @else
                            <i class="material-symbols-outlined mr-3 text-3xl text-red-500">location_on</i>
                            <p class="italic">
                                {{$activity -> ip_address }}
                            </p>
                        @endif
                    </div>
                </div>
            </div>

         @endforeach
    </div>
</div>

