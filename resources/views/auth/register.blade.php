@extends('auth.app')

@section('content')
    <section>
        <div class="relative grid grid-cols-2 items-center w-full min-h-screen p-0 overflow-hidden">
            <div class="absolute top-0 sm:-top-14 left-0">
                <img src="{{ asset('image/auth/bg-sign-up.png') }}" alt="" loading="lazy" class="w-full object-cover hidden sm:block">
                <img src="{{ asset('image/auth/bg-top-5.png') }}" alt="" loading="lazy" class="h-full object-cover block sm:hidden">
            </div>
            <div class="absolute bottom-0 right-0">
                <img src="{{ asset('image/auth/bg-bottom-register.png') }}" loading="lazy" alt="" class="w-full object-cover">
            </div>
            <div class="col-span-full lg:col-span-1">
                <div class="flex justify-center">
                    <div class="flex -mx-3 rounded-2xl xl:w-7/12 md:w-10/12 w-11/12 text-[#142132]">
                        <div class="relative w-full flex flex-col items-center min-w-0 break-words border-0 shadow-none lg:py4">
                            <div class="py-6 pb-0 mb-0 text-center">
                                <h4 class="font-semibold text-4xl">Welcome to <span class="text-[#009FB2]">StreamSilk</span></h4>
                                <p class="mb-0">Fill out the details below</p>
                            </div>
                            <div class="w-11/12 p-6 text-white">
                                <form method="post" action="{{ route('register') }}">
                                    @csrf
                                    <div class="mb-4">
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

                                    <div class="mb-4">
                                        <label  class="text-[#142132] font-medium">Email</label>
                                        <div class="rounded-xl flex items-center bg-[#142132] hover:bg-[#009FB2]">
                                            <i class="material-symbols-outlined opacity-1 text-2xl p-1 ml-3">email</i>
                                            <input type="email" name="email" autocomplete="off" value=""
                                                   class="@error('email') is-invalid @enderror bg-transparent text-white placeholder:text-gray-200 w-full mx-1 pl-2 appearance-none outline-none autofill:bg-yellow-200"
                                                   placeholder="Full name">
                                        </div>
                                        @error('email')
                                        <span class="font-italic error invalid-feedback text-red-500" role="alert">
                                        {{ $message }}
                                    </span>
                                        @enderror
                                    </div>

                                    <div class="mb-4">
                                        <label  class="text-[#142132] font-medium">Password</label>
                                        <div class="rounded-xl flex items-center bg-[#142132] hover:bg-[#009FB2]">
                                            <i class="material-symbols-outlined opacity-1 text-2xl p-1 ml-3">key</i>
                                            <input type="password" name="password" autocomplete="off" value=""
                                                   class="@error('password') is-invalid @enderror bg-transparent text-white placeholder:text-gray-200 w-full mx-1 pl-2 appearance-none outline-none autofill:bg-yellow-200"
                                                   placeholder="Full name">
                                        </div>
                                        @error('password')
                                        <span class="font-italic  error invalid-feedback text-red-500" role="alert">
                                        {{ $message }}
                                    </span>
                                        @enderror
                                    </div>

                                    <div class="mb-4">
                                        <label  class="text-[#142132] font-medium">Retype Password</label>
                                        <div class="rounded-xl flex items-center bg-[#142132] hover:bg-[#009FB2]">
                                            <i class="material-symbols-outlined opacity-1 text-2xl p-1 ml-3">key</i>
                                            <input type="password" name="password_confirmation" autocomplete="off" value=""
                                                   class="bg-transparent text-white placeholder:text-gray-200 w-full mx-1 pl-2 appearance-none outline-none autofill:bg-yellow-200"
                                                   placeholder="Retype password">
                                        </div>
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
                                        <!-- /.col -->
                                        <div class="flex justify-center">
                                            <button type="submit"  class="inline-block w-full px-16 py-3.5 mt-6 mb-0 font-bold leading-normal text-center
                                                 text-white align-middle transition-all bg-[#009FB2]/70 hover:bg-[#009FB2]
                                                  border-0 rounded-lg cursor-pointer hover:-translate-y-px active:opacity-85 hover:shadow-xs text-sm ease-in tracking-tight-rem shadow-md bg-150 bg-x-25">
                                                Register</button>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                </form>
                            </div>
                            <div class="border-black/12.5 rounded-b-2xl border-t-0 border-solid p-6 text-center pt-0 px-1 sm:px-6">
                                <p class="mx-auto mb-6 leading-normal text-sm  text-[#142132]">
                                    Already have an account? <a href="{{ route('login') }}" class="font-semibold text-[#009FB2]">Sign up</a>
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
@endsection

