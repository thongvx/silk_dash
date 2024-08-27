@extends('auth.app')

@section('content')
    <section>
        <div class="relative grid grid-cols-2 items-center w-full min-h-screen p-0 overflow-hidden">
            <div class="absolute -top-2 sm:-top-14 -left-60 sm:left-0">
                <img src="{{ asset('image/auth/bg-sign-up.png') }}" alt="" loading="lazy" class="w-full object-cover hidden sm:block">
                <img src="{{ asset('image/auth/bg-top-5.png') }}" alt="" loading="lazy" class="h-full object-cover block sm:hidden">
            </div>
            <div class="absolute bottom-0 right-0">
                <img src="{{ asset('image/auth/bg-bottom-register.png') }}" loading="lazy" alt="" class="w-full object-cover">
            </div>
            <div class="col-span-full lg:col-span-1 mt-16 sm:mt-0">
                <div class="flex justify-center">
                    <div class="flex -mx-3 rounded-2xl xl:w-7/12 md:w-10/12 w-11/12 text-[#142132]">
                        <div class="relative w-full flex flex-col items-center min-w-0 break-words border-0 shadow-none lg:py4">
                            <div class="py-6 pb-0 mb-0 text-center">
                                <h4 class="font-semibold text-3xl sm:text-4xl text-[#009FB2] sm:text-[#142132]">Welcome to <span class="text-[#142132] sm:text-[#009FB2]">StreamSilk</span></h4>
                                <p class="mb-0">Fill out the details below</p>
                            </div>
                            <div class="w-11/12 px-0 py-3 sm:p-6 text-white">
                                <form method="post" action="{{ route('register') }}">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="text-[#142132] font-medium">Name</label>
                                        <div class="rounded-xl flex items-center bg-[#142132] hover:bg-[#009FB2]">
                                            <i class="material-symbols-outlined opacity-1 text-2xl p-1 ml-3">person</i>
                                            <input type="text" name="name" autocomplete="off" value=""
                                                   class="@error('name') is-invalid @enderror bg-transparent text-white placeholder:text-gray-200 w-full mx-1 pl-2 appearance-none outline-none autofill:bg-yellow-200"
                                                   placeholder="Full name">
                                        </div>
                                        @error('name')
                                        <span class="font-italic error invalid-feedback text-red-500" role="alert">
                                        {{ $message }}
                                    </span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label  class="text-[#142132] font-medium">Email</label>
                                        <div class="rounded-xl flex items-center bg-[#142132] hover:bg-[#009FB2]">
                                            <i class="material-symbols-outlined opacity-1 text-2xl p-1 ml-3">email</i>
                                            <input type="email" name="email" autocomplete="off" value=""
                                                   class="@error('email') is-invalid @enderror bg-transparent text-white placeholder:text-gray-200 w-full mx-1 pl-2 appearance-none outline-none autofill:bg-yellow-200"
                                                   placeholder="email">
                                        </div>
                                        @error('email')
                                        <span class="font-italic error invalid-feedback text-red-500" role="alert">
                                        {{ $message }}
                                    </span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label  class="text-[#142132] font-medium">Password</label>
                                        <div class="rounded-xl flex items-center bg-[#142132] hover:bg-[#009FB2]">
                                            <i class="material-symbols-outlined opacity-1 text-2xl p-1 ml-3">key</i>
                                            <input type="password" name="password" autocomplete="off" value=""
                                                   class="@error('password') is-invalid @enderror bg-transparent text-white placeholder:text-gray-200 w-full mx-1 pl-2 appearance-none outline-none autofill:bg-yellow-200"
                                                   placeholder="password">
                                        </div>
                                        @error('password')
                                        <span class="font-italic  error invalid-feedback text-red-500" role="alert">
                                        {{ $message }}
                                    </span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label  class="text-[#142132] font-medium">Retype Password</label>
                                        <div class="rounded-xl flex items-center bg-[#142132] hover:bg-[#009FB2]">
                                            <i class="material-symbols-outlined opacity-1 text-2xl p-1 ml-3">key</i>
                                            <input type="password" name="password_confirmation" autocomplete="off" value=""
                                                   class="bg-transparent text-white placeholder:text-gray-200 w-full mx-1 pl-2 appearance-none outline-none autofill:bg-yellow-200"
                                                   placeholder="Retype password">
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label  class="text-[#142132] font-medium">Website</label>
                                        <div class="rounded-xl flex items-center bg-[#142132] hover:bg-[#009FB2]">
                                            <i class="material-symbols-outlined opacity-1 text-2xl p-1 ml-3">link</i>
                                            <input type="text" name="website" autocomplete="off" value=""
                                                   class="@error('website') is-invalid @enderror bg-transparent text-white placeholder:text-gray-200 w-full mx-1 pl-2 appearance-none outline-none autofill:bg-yellow-200"
                                                   placeholder="website">
                                        </div>
                                        @error('website')
                                        <span class="font-italic  error invalid-feedback text-red-500" role="alert">
                                        {{ $message }}
                                    </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <div class="flex justify-between w-full items-center">
                                            <label  class="text-[#142132] font-medium">Contact</label>
                                            <div class="flex w-max py-1.5">
                                                <div class="cursor-pointer tab-contact bg-[#009FB2] hover:bg-[#009FB2] px-3 py-1 rounded-full">Telegram</div>
                                                <div class="ml-3 cursor-pointer tab-contact bg-[#121520] hover:bg-[#009FB2] px-3 py-1 rounded-full">Skype</div>
                                            </div>
                                        </div>

                                        <div class="rounded-xl flex items-center bg-[#142132] hover:bg-[#009FB2]">
                                            <i class="material-symbols-outlined opacity-1 text-2xl p-1 ml-3" id="icon-contact">contacts</i>
                                            <input type="text" name="telegram" autocomplete="off" value="" id="contact"
                                                   class="bg-transparent text-white placeholder:text-gray-200 w-full mx-1 pl-2 appearance-none outline-none autofill:bg-yellow-200"
                                                   placeholder="telegram">
                                        </div>
                                        @error('telegram')
                                        <span class="font-italic error invalid-feedback text-red-500" role="alert">
                                            {{ $message }}
                                        </span><br>
                                        @enderror
                                        @error('skype')
                                        <span class="font-italic error invalid-feedback text-red-500" role="alert">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="row">
                                        <div class="col-8">
                                            <div class="icheck-primary">
                                                <input type="checkbox" id="agreeTerms" name="terms" value="agree" required class="w-4 h-4 ease rounded-md checked:bg-[#009FB2] after:text-xxs after:material-symbols-outlined
                                                          after:duration-250 after:ease-in-out duration-250 relative float-left mt-1 cursor-pointer appearance-none border
                                                          border-solid border-[#009FB2] bg-white bg-contain bg-center bg-no-repeat align-top transition-all after:absolute after:flex after:h-full
                                                          after:w-full after:items-center after:justify-center after:text-white after:opacity-0 after:transition-all after:content-['✓']
                                                          checked:border-0 checked:border-transparent checked:after:opacity-100"
                                                >
                                                <label for="agreeTerms" class="ml-2 text-[#142132]">
                                                    I agree to the <a href="/terms" class="hover:text-[#009FB2]">terms</a>
                                                </label>
                                            </div>
                                        </div>
                                        <!-- reCAPTCHA widget -->
                                        <div class="g-recaptcha" data-sitekey="{{ config('services.recaptcha.site_key') }}"></div>
                                        @error('g-recaptcha-response')
                                            <span class="font-italic error invalid-feedback text-red-500" role="alert">
                                            {{ $message }}
                                            </span>
                                        @enderror
                                        <!-- /.col -->
                                        <div class="flex justify-center">
                                            <button type="submit"  class="inline-block w-full px-16 py-3.5 mt-4 mb-0 font-bold leading-normal text-center
                                                 text-white align-middle transition-all bg-[#009FB2] hover:bg-[#00cdcd]
                                                  border-0 rounded-lg cursor-pointer hover:-translate-y-px active:opacity-85 hover:shadow-xs text-sm ease-in tracking-tight-rem shadow-md bg-150 bg-x-25">
                                                Register</button>
                                        </div>
                                        <!-- /.col -->
                                    </div>

                                </form>
                            </div>
                            <div class="border-black/12.5 rounded-b-2xl border-t-0 border-solid p-6 text-center pt-0 px-1 sm:px-6">
                                <p class="mx-auto mb-6 leading-normal text-sm  text-[#142132]">
                                    Already have an account? <a href="{{ route('login') }}" class="font-semibold text-[#009FB2]">Sign in</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="xl:pr-18 z-index-20 relative hidden lg:block">
                <div>
                    <img src="{{ asset('image/auth/register-r.svg') }}" loading="lazy" alt="" class="xl:w-4/5">
                </div>
            </div>
        </div>
    </section>
    <script src="https://www.google.com/recaptcha/api.js?hl=en" async defer></script>
    <script>
        const tabs = document.querySelectorAll('.tab-contact');
        const contact = document.getElementById('contact');
        $(document).on('click', '.tab-contact', function () {
            tabs.forEach(tab => {
                tab.classList.remove('bg-[#009FB2]');
                tab.classList.add('bg-[#121520]');
            });
            $(this).removeClass('bg-[#121520]');
            $(this).addClass('bg-[#009FB2]');
            contact.placeholder = $(this).text().toLowerCase();
            contact.name = $(this).text().toLowerCase();
        });
        $(document).on('submit', 'form', function () {
            $(this).find('button').attr('disabled', true);
            $(this).find('button').css('cursor', 'not-allowed');
            $(this).find('button').removeClass('hover:bg-[#009FB2] bg-[#009FB2]/70');
            $(this).find('button').addClass('bg-[#009FB2]');
            $(this).find('button').html('Processing...');
        });
    </script>
@endsection

