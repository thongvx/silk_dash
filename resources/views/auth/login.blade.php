<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/png" href="../assets/img/logo3.png" />
    <title>Stream Silk</title>
    @vite('resources/css/app.css')
    <style>
        @font-face {
            font-family: 'Material Symbols Outlined';
            src: url('{{ asset('assets/fonts/materialsymbolsoutlined.woff2') }}') format('woff2');
            font-display: swap;
        }
    </style>
</head>
    <body class="m-0  bg-cover bg-center bg-no-repeat font-sans antialiased font-normal text-start text-base leading-default
    text-slate-500 backdrop-blur-[2px]"
      style="background-image: url('{{asset('image/background.webp')}}')">
    <main class="mt-0 transition-all duration-200 ease-in-out auth">
        <section>
            <div class="relative flex items-center w-full min-h-screen p-0 overflow-hidden">
                <div class="md:w-6/12 w-0 hidden md:block pl-20">
                    <div class="text-white">
                        <h4  class="text-6xl font-semibold">Welcome To</h4>
                        <h4 class="text-8xl font-semibold">Stream Silk</h4>
                    </div>
                    <div>
                        <div>

                        </div>
                    </div>
                </div>
                <div class="md:w-6/12 w-full flex justify-center">
                    <div class="flex -mx-3 rounded-2xl lg:w-7/12 sm:w-10/12 w-11/12 backdrop-blur-md bg-black/40">
                        <div class="relative w-full flex flex-col items-center min-w-0 break-words border-0 shadow-none lg:py4">
                            <div class="py-6 pb-0 mb-0 text-white text-center">
                                <h4 class="font-semibold text-3xl">Welcome back</h4>
                                <p class="mb-0">fill out the details below</p>
                            </div>
                            <div class="w-11/12 p-6 text-white">
                                <form method="post" action="{{ url('/login') }}">
                                    @csrf
                                    <div class="mb-4">
                                        <label >Email</label>
                                        <div class="rounded-xl flex items-center bg-black/70 hover:bg-black">
                                            <i class="material-symbols-outlined opacity-1 text-2xl p-1 ml-3">email</i>
                                            <input type="email" name="email" value="{{ old('email') }}" placeholder="Email"
                                                   class="autofill:bg-yellow-200 @error('email') @enderror focus:shadow-primary-outline text-sm leading-5.6 w-full
                                                   appearance-none rounded-xl bg-clip-padding p-3 font-normal outline-none transition-all
                                                   bg-transparent placeholder:text-gray-400 focus:border-fuchsia-300 focus:outline-none" />
                                        </div>
                                        @error('email')
                                        <span class="error invalid-feedback text-red-500">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-4">
                                        <label>Password</label>
                                        <div class="rounded-xl flex items-center bg-black/70 hover:bg-black">
                                            <i class="material-symbols-outlined opacity-1 text-2xl p-1 ml-3">key</i>
                                            <input type="password" name="password" placeholder="Password"
                                                   class=" @error('password') @enderror  focus:shadow-primary-outline text-sm leading-5.6 w-full appearance-none rounded-xl
                                                   bg-transparent bg-clip-padding p-3 font-normal outline-none transition-all
                                                   placeholder:text-gray-400 focus:border-fuchsia-300 focus:outline-none" />
                                        </div>
                                        @error('password')
                                        <span class="error invalid-feedback text-red-500">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="flex items-center mb-0.5 text-left min-h-6 justify-between">
                                        <div>
                                            <input name="remember" id="remember" class="w-4 h-4 ease rounded-md checked:bg-[#009FB2] after:text-xxs after:material-symbols-outlined
                                                      after:duration-250 after:ease-in-out duration-250 relative float-left mt-1 cursor-pointer appearance-none border
                                                      border-solid border-slate-200 bg-white bg-contain bg-center bg-no-repeat align-top transition-all after:absolute after:flex after:h-full
                                                      after:w-full after:items-center after:justify-center after:text-white after:opacity-0 after:transition-all after:content-['✓']
                                                      checked:border-0 checked:border-transparent checked:after:opacity-100" type="checkbox">
                                            <label for="remember" class="ml-2 font-normal cursor-pointer select-none text-sm text-white">Remember me</label>
                                        </div>
                                        <div>
                                            <a href="{{ route('password.request') }}" class="text-transparent bg-clip-text bg-fuchsia-500 text-sm">Forgot your password?</a>
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="inline-block w-full px-16 py-3.5 mt-6 mb-0 font-bold leading-normal text-center text-white align-middle transition-all bg-blue-400 hover:bg-blue-700 border-0 rounded-lg cursor-pointer hover:-translate-y-px active:opacity-85 hover:shadow-xs text-sm ease-in tracking-tight-rem shadow-md bg-150 bg-x-25">Sign in</button>
                                    </div>
                                </form>
                            </div>
                            <div class="border-black/12.5 rounded-b-2xl border-t-0 border-solid p-6 text-center pt-0 px-1 sm:px-6">
                                <p class="mx-auto mb-6 leading-normal text-sm text-white">
                                    Don't have an account? <a href="{{ route('register') }}" class="font-semibold text-transparent bg-clip-text bg-fuchsia-500">Sign up</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </main>
    </body>

</html>
