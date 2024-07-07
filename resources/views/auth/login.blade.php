@extends('auth.app')

@section('content')
    <section>
        <div class="relative grid grid-cols-2 items-center w-full min-h-screen p-0 overflow-hidden">
            <div class="absolute top-0 left-0">
                <img src="{{ asset('image/auth/bg-top.png') }}" alt="" class="w-full hidden sm:block">
                <img src="{{ asset('image/auth/bg-top-5.png') }}" alt="" class="h-full block sm:hidden">
            </div>
            <div class="absolute bottom-0 right-0">
                <img src="{{ asset('image/auth/bg-bottom.png') }}" alt="" class="w-full">
            </div>
            <div class="pl-32 z-index-20 relative hidden lg:block">
                <div>
                    <img src="{{ asset('image/auth/Tablet-login-amico.svg') }}" alt="" class="w-full">
                </div>
            </div>
            <div class="col-span-full lg:col-span-1">
                <div class="flex justify-center">
                    <div class="flex -mx-3 rounded-2xl xl:w-7/12 sm:w-10/12 w-11/12">
                        <div
                            class="relative w-full flex flex-col items-center min-w-0 break-words border-0 shadow-none lg:py4">
                            <div class="py-6 pb-0 mb-0 text-blue-950 text-center">
                                <h4 class="font-semibold text-4xl">Welcome back</h4>
                                <p class="mb-0">fill out the details below</p>
                            </div>
                            <div class="w-11/12 p-6">
                                <form method="post" action="{{ url('/login') }}">
                                    @csrf
                                    <div class="mb-4 text-white">
                                        <label class="text-blue-950 font-bold">Email</label>
                                        <div class="rounded-xl flex items-center bg-[#142132] hover:bg-[#009FB2] focus:bg-[#009fb2]">
                                            <i class="material-symbols-outlined opacity-1 text-2xl p-1 ml-3">email</i>
                                            <input type="email" name="email" value="{{ old('email') }}" placeholder="Email"
                                                   class="autofill:bg-yellow-200 @error('email') @enderror focus:shadow-primary-outline text-sm leading-5.6 w-full
                                                       appearance-none rounded-xl bg-clip-padding p-3 font-normal transition-all outline-none text-md
                                                       bg-transparent text-white placeholder:text-white focus:border-fuchsia-300 focus:outline-none"/>
                                        </div>
                                        @error('email')
                                        <span class="error invalid-feedback text-red-500">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-4 text-white">
                                        <label class="text-blue-950 font-bold">Password</label>
                                        <div class="rounded-xl flex items-center bg-[#142132] hover:bg-[#009FB2] focus:bg-[#009fb2]">
                                            <i class="material-symbols-outlined opacity-1 text-2xl p-1 ml-3">key</i>
                                            <input type="password" name="password" placeholder="Password"
                                                   class=" @error('password') @enderror  focus:shadow-primary-outline text-sm leading-5.6 w-full appearance-none rounded-xl
                                                       bg-transparent bg-clip-padding p-3 font-normal transition-all outline-none text-md
                                                       placeholder:text-white text-white focus:border-fuchsia-300 focus:outline-none"/>
                                        </div>
                                        @error('password')
                                        <span class="error invalid-feedback text-red-500">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="flex items-center mb-0.5 text-left min-h-6 justify-between">
                                        <div>
                                            <input name="remember" id="remember" class="w-4 h-4 ease rounded-md checked:bg-[#009FB2] after:text-xxs after:material-symbols-outlined
                                                          after:duration-250 after:ease-in-out duration-250 relative float-left mt-1 cursor-pointer appearance-none border
                                                          border-solid border-[#009FB2] bg-white bg-contain bg-center bg-no-repeat align-top transition-all after:absolute after:flex after:h-full
                                                          after:w-full after:items-center after:justify-center after:text-white after:opacity-0 after:transition-all after:content-['✓']
                                                          checked:border-0 checked:border-transparent checked:after:opacity-100"
                                                   type="checkbox">
                                            <label for="remember"
                                                   class="ml-2 font-normal cursor-pointer select-none text-sm text-slate-950">Remember
                                                me</label>
                                        </div>
                                        <div>
                                            <a href="{{ route('password.request') }}"
                                               class="text-[#009FB2] text-sm font-semibold">Forgot your password?</a>
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit"
                                                class="inline-block w-full px-16 py-3.5 mt-6 mb-0 font-bold leading-normal text-center
                                                 text-white align-middle transition-all bg-[#009FB2]/70 hover:bg-[#009FB2]
                                                  border-0 rounded-lg cursor-pointer hover:-translate-y-px active:opacity-85 hover:shadow-xs text-sm ease-in tracking-tight-rem shadow-md bg-150 bg-x-25">
                                            Sign in
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div
                                class="border-black/12.5 rounded-b-2xl border-t-0 border-solid p-6 text-center pt-0 px-1 sm:px-6">
                                <p class="mx-auto mb-6 leading-normal text-sm text-slate-950">
                                    Don't have an account?
                                    <a href="{{ route('register') }}" class="font-semibold text-[#009FB2]">Sign up</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
