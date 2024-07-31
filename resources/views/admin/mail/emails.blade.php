<div class="px-0 pt-0">
    <div class="relative rounded-xl bg-[#121520]" id="manage-task">
        <div class="pt-4 md:p-4">
            <div class="mb-2 flex justify-between">
                <h5 class="text-white">
                    We included several modern account management email templates to help you communicate with your users.
                </h5>
            </div>
            <div class="grid gird-cols-1 sm:grid-cols-2 xl:grid-cols-3">
                <div class="bg-[#142132] rounded-xl text-center p-4">
                    <div>Email Gift</div>
                    <div>
                        <a href="">
                            <img src="" alt="">
                        </a>
                    </div>
                    <form  class="flex items-center select user" id="gift-mail">
                        <label for="select-user" class='text-start font-bold w-28 sm:w-24 text-[#009FB2]'>User</label>
                        <select class="select2 w-full bg-[#009FB2]" name="user" id="select-user" data-placeholder="Select user">
                            <option value="null" selected>All User</option>
                            @foreach(Auth::user()->whereNotNull('email_verified_at')
                                    ->whereDoesntHave('roles', function($query) {
                                        $query->where('name', 'admin');
                                    })
                                    ->get() as $user)
                                <option value="{{ $user }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                        <button type="submit" disabled class="bg-[#121520] rounded-xl px-5 py-2 h-max ml-3">
                            Send
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>


</div>
