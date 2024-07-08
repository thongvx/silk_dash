@extends('auth.app')

@section('content')
    <section>
        <div class="relative flex items-center w-full min-h-screen p-0 overflow-hidden">
            <div class="absolute top-0 left-0">
                <img src="{{ asset('image/auth/bg-top.png') }}" loading="lazy" alt="" class="w-full hidden sm:block">
                <img src="{{ asset('image/auth/bg-top-5.png') }}" loading="lazy" alt="" class="h-full block sm:hidden">
            </div>
            <div class="absolute top-2 -right-44 scale-75 opacity-30">
                <img src="{{ asset('image/auth/bg-email-1.png') }}" loading="lazy" alt="" class="h-full hidden sm:block">
            </div>
            <div class="absolute -bottom-24 -left-44 scale-50 opacity-45">
                <img src="{{ asset('image/auth/bg-email-1.png') }}" loading="lazy" alt="" class="h-full hidden sm:block">
            </div>
            <div class="w-full flex justify-center">
                <div class="flex -mx-3 rounded-2xl lg:w-7/12 sm:w-10/12 w-11/12 -mt-20">
                    <div class="relative w-full flex flex-col items-center min-w-0 break-words border-0 shadow-none lg:py-4 ">
                        @if (session('status'))
                            <div class="rounded-2xl mb-6 text-white flex items-center flex-col bg-[#009FB2]/10 w-40 h-40 bg-contain bg-center bg-no-repeat"
                                 style="background-image: url('{{asset('image/email.png')}}')">
                            </div>
                            <div class="p-6 pb-0 mb-0 flex items-center flex-col font-bold">
                                <h1 class="text-3xl mb-3 text-black">Check your mail</h1>
                                <h4 class="my-3 text-center">We have sent a password recover instructions to your email.</h4>
                                <a id="emailLink" href="mailto:" class="text-white w-6/12 py-2 rounded-lg bg-[#009FB2]/80 hover:bg-[#009FB2] text-center mt-12 mb-6">Open email</a>
                                <a href="{{ route('login') }}">Skip, I'll confirm later</a>
                            </div>
                            <div class="fixed bottom-10 font-bold">
                                <h4 class="text-center">
                                    Did not receive the email? Check your spam filter,
                                </h4>
                                <h4 class="text-center">
                                    or <a href="{{ route('password.request') }}" class="text-[#009FB2]">try another email address</a>
                                </h4>
                            </div>
                        @else
                            <div class="rounded-2xl mb-3 text-white flex items-center flex-col w-72 h-72 bg-contain bg-center bg-no-repeat"
                                 style="background-image: url('{{asset('image/auth/Forgot-password.svg')}}')">
                            </div>
                            <div class="pb-0 mb-0 text-[#142132] flex items-center flex-col">
                                <h1 class="text-3xl mb-3 font-bold">Reset Password</h1>
                                <h4 class="text-normal lg:w-2/3 text-wrap">Enter the email associated with your account and we'll send an email with instructions to reset your password.</h4>
                            </div>
                            <div class="w-full py-6 text-white">
                                <form method="post" action="{{ route('password.email') }}">
                                    @csrf
                                    <div class="mb-4">
                                        <label class="text-[#142132] font-bold" for="email">Email address</label>
                                        <div class="rounded-xl flex items-center bg-[#142132] hover:bg-[#009FB2] mt-3">
                                            <i class="material-symbols-outlined opacity-1 text-2xl p-1 ml-3">email</i>
                                            <input type="email" name="email" value="" placeholder="Email" id="email"
                                                   class="autofill:bg-yellow-200 {{ $errors->has('email') ? ' is-invalid' : '' }} focus:shadow-primary-outline text-sm leading-5.6 w-full
                                                   appearance-none rounded-xl bg-clip-padding p-3 font-normal outline-none transition-all
                                                   bg-transparent placeholder:text-gray-200 focus:border-fuchsia-300 focus:outline-none" />
                                        </div>
                                        @if ($errors->has('email'))
                                            <span class="error invalid-feedback text-red-600">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                    <div class="row text-center">
                                        <button type="submit" class='w-full sm:w-1/3 bg-[#009FB2]/70 hover:bg-[#009FB2] rounded-lg py-2 font-bold'>Send Instructions</button>
                                    </div>
                                </form>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        $('#emailLink').on('click', function (e) {
            if (/Mobi|Android/i.test(navigator.userAgent)) {
                // User is on a mobile device, let the 'mailto:' protocol handle the click
            } else {
                // User is not on a mobile device, prevent 'mailto:' from running and redirect to webmail
                event.preventDefault();
                window.location.href = 'https://mail.google.com/mail/u/0/#inbox';
            }
        })
        $('form').on('submit', function () {
            let bntSubmit = $(this).find('button[type="submit"]');
            bntSubmit.html(`
                     <div class="flex text-white justify-center">
                        <div class="loading">
                            <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                        </div>
                        <span>process</span>
                    </div>
                `)
            bntSubmit.prop('disabled', true);
        })
    </script>
@endsection

