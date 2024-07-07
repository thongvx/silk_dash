@extends('auth.app')

@section('content')
    <section>
        <div class="relative grid grid-cols-2 items-center w-full px-0 overflow-hidden min-h-screen">
            <div class="absolute top-0 left-0">
                <img src="{{ asset('image/auth/bg-top.png') }}" alt="" class="w-full hidden sm:block">
                <img src="{{ asset('image/auth/bg-top-5.png') }}" alt="" class="h-full block sm:hidden">
            </div>
            <div class="col-span-2 lg:col-span-1 px-5 xl:pl-24 lg:px-0 pt-10 xl:pt-20 hidden lg:block">
                <div>
                    <img src="{{ asset('image/auth/reset-password-animate.svg') }}" alt="" class="w-full">
                </div>
            </div>
            <div class="col-span-2 lg:col-span-1 flex justify-center h-max -mt-20">
                <div class="flex -mx-3 rounded-2xl xl:w-7/12 sm:w-10/12 w-11/12">
                    <div class="relative w-full flex flex-col items-center min-w-0 break-words border-0 shadow-none lg:py4">
                        <div class="p-6 pb-0 mb-0 text-[#142132] flex items-center flex-col">
                            <h1 class="text-3xl mb-3 font-bold">Create new password</h1>
                            <h4 class="text-normal text-wrap">Your new password must be different from previous used passwords </h4>
                        </div>
                        <div class="w-full p-6 text-[#142132]">
                            <form method="post" action="{{ route('password.update') }}">
                                @csrf
                                @php
                                    if (!isset($token)) {
                                        $token = \Request::route('token');
                                    }
                                @endphp

                                <input type="hidden" name="token" value="{{ $token }}">
                                <div class="mb-2">
                                    <label class="" for="email">Email</label>
                                    <div class="rounded-xl flex items-center text-white bg-[#142132] hover:bg-[#009FB2] mt-3">
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
                                <div class="mb-2">
                                    <label class="" for="Password">Password</label>
                                    <div class="rounded-xl flex items-center text-white bg-[#142132] hover:bg-[#009FB2] mt-3">
                                        <i class="material-symbols-outlined opacity-1 text-2xl p-1 ml-3">key</i>
                                        <input type="password" name="password" value="" placeholder="Password" id="Password"
                                               class="autofill:bg-yellow-200 {{ $errors->has('password') ? ' is-invalid' : '' }} focus:shadow-primary-outline text-sm leading-5.6 w-full
                                                       appearance-none rounded-xl bg-clip-padding p-3 font-normal outline-none transition-all
                                                       bg-transparent placeholder:text-gray-200 focus:border-fuchsia-300 focus:outline-none" />
                                    </div>
                                    @if ($errors->has('email'))
                                        <span class="error invalid-feedback text-red-600">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>
                                <div class="mb-2">
                                    <label class="" for="password_confirmation">Password Confirmation</label>
                                    <div class="rounded-xl flex items-center text-white bg-[#142132] hover:bg-[#009FB2] mt-3">
                                        <i class="material-symbols-outlined opacity-1 text-2xl p-1 ml-3">key</i>
                                        <input type="password" name="password_confirmation" value="" placeholder="Confirm Password" id="password_confirmation"
                                               class="autofill:bg-yellow-200 {{ $errors->first('password_confirmation') }} focus:shadow-primary-outline text-sm leading-5.6 w-full
                                                       appearance-none rounded-xl bg-clip-padding p-3 font-normal outline-none transition-all
                                                       bg-transparent placeholder:text-gray-200 focus:border-fuchsia-300 focus:outline-none" />
                                    </div>
                                    @if ($errors->has('password_confirmation'))
                                        <span
                                            class="error invalid-feedback text-red-600">{{ $errors->first('password_confirmation') }}</span>
                                    @endif
                                </div>
                                <div class="row mt-3">
                                    <div class="col-12 text-center text-white">
                                        <button type="submit" class='w-full sm:w-1/3 bg-[#009FB2]/70 hover:bg-[#009FB2] rounded-lg py-2 font-medium'>Reset Password</button>
                                    </div>
                                    <!-- /.col -->
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

