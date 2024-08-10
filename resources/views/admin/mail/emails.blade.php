<div class="px-0 pt-0">
    <div class="relative rounded-xl bg-[#121520]" id="manage-task">
        <div class="pt-4 md:p-4">
            <div class="mb-2 flex justify-between">
                <h5 class="text-white">
                    We included several modern account management email templates to help you communicate with your users.
                </h5>
            </div>
            <div class="grid gird-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-6">
                <div class="bg-[#142132] rounded-xl text-center p-4">
                    <div class="text-xl mb-2">Email Gift</div>
                    <hr class="h-px mt-0 bg-transparent bg-gradient-to-r from-transparent via-white to-transparent border-none" />
                    <div class="mt-2">
                        <a href="/email/view-discount-emails">
                            <img src="{{ asset('image/email/mail-gift.webp') }}" alt="" class="rounded-xl">
                        </a>
                    </div>
                    <form  class="flex items-center select user mt-3" id="gift-mail">
                        <label for="select-user" class='text-start font-bold w-28 sm:w-24 text-[#009FB2]'>User</label>
                        <select class="select2 w-full bg-[#009FB2]" name="user_id" id="select-user" data-placeholder="Select user">
                            <option value="none" selected>None</option>
                            <option value="all">All User</option>
                            @foreach(Auth::user()->whereNotNull('email_verified_at')
                                    ->whereDoesntHave('roles', function($query) {
                                        $query->where('name', 'admin');
                                    })
                                    ->get() as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                        <button type="submit" disabled class="bg-[#121520] rounded-xl px-5 py-1 h-max ml-3">
                            Send
                        </button>
                    </form>
                </div>
                <div class="bg-[#142132] rounded-xl text-center p-4">
                    <div class="text-xl mb-2">Email Zoom</div>
                    <hr class="h-px mt-0 bg-transparent bg-gradient-to-r from-transparent via-white to-transparent border-none" />
                    <div class="mt-2">
                        <a href="/email/view-discount-emails">
                            <img src="{{ asset('image/email/mail-gift.webp') }}" alt="" class="rounded-xl">
                        </a>
                    </div>
                    <form  class="flex items-center select user mt-3" id="notification-mail">
                        <label for="select-user" class='text-start font-bold w-28 sm:w-24 text-[#009FB2]'>User</label>
                        <select class="select2 w-full bg-[#009FB2]" name="user_id" id="select-user" data-placeholder="Select user">
                            <option value="none" selected>None</option>
                            <option value="all">All User</option>
                            @foreach(Auth::user()->whereNotNull('email_verified_at')
                                    ->whereDoesntHave('roles', function($query) {
                                        $query->where('name', 'admin');
                                    })
                                    ->get() as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                        <button type="submit" disabled class="bg-[#121520] rounded-xl px-5 py-1 h-max ml-3">
                            Send
                        </button>
                    </form>
                </div>

            </div>

        </div>
    </div>


</div>
