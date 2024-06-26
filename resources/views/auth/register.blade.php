<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('image/logo/logo1.png')}}"/>
    <link rel="icon" type="image/png" href="{{asset('image/logo/logo1.png')}}"/>
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
<main class="mt-0 transition-all duration-200 ease-in-out">
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
                <div class="flex -mx-3 rounded-2xl lg:w-7/12 md:w-9/12 w-11/12 backdrop-blur-md bg-black/40">
                    <div class="relative w-full flex flex-col items-center min-w-0 break-words border-0 shadow-none lg:py4">
                        <div class="py-6 pb-0 mb-0 text-white text-center">
                            <h4 class="font-semibold text-3xl">Create Account</h4>
                            <p class="mb-0">fill out the details below</p>
                        </div>
                        <div class="w-11/12 p-6 text-white">
                            <form method="post" action="{{ route('register') }}">
                                @csrf
                                <div class="mb-4">
                                    <label >Name</label>
                                    <div class="rounded-xl flex items-center bg-black/70 hover:bg-black">
                                        <i class="material-symbols-outlined opacity-1 text-2xl p-1 ml-3">person</i>
                                        <input type="text" name="name"
                                               class="@error('name') is-invalid @enderror bg-transparent text-white placeholder:text-gray-400 w-full mx-1 pl-2 appearance-none outline-none autofill:bg-yellow-200" value="{{ old('name') }}"
                                               placeholder="Full name">
                                    </div>
                                    @error('name')
                                    <span class="font-italic error invalid-feedback text-red-500" role="alert">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label >Email</label>
                                    <div class="rounded-xl flex items-center bg-black/70 hover:bg-black">
                                        <i class="material-symbols-outlined opacity-1 text-2xl p-1 ml-3">email</i>
                                        <input type="email" name="email"
                                               class="@error('email') is-invalid @enderror bg-transparent text-white placeholder:text-gray-400 w-full mx-1 pl-2 appearance-none outline-none autofill:bg-yellow-200" value="{{ old('name') }}"
                                               placeholder="Full name">
                                    </div>
                                    @error('email')
                                    <span class="font-italic error invalid-feedback text-red-500" role="alert">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label >Password</label>
                                    <div class="rounded-xl flex items-center bg-black/70 hover:bg-black">
                                        <i class="material-symbols-outlined opacity-1 text-2xl p-1 ml-3">key</i>
                                        <input type="password" name="password"
                                               class="@error('password') is-invalid @enderror bg-transparent text-white placeholder:text-gray-400 w-full mx-1 pl-2 appearance-none outline-none autofill:bg-yellow-200" value="{{ old('name') }}"
                                               placeholder="Full name">
                                    </div>
                                    @error('password')
                                    <span class="font-italic  error invalid-feedback text-red-500" role="alert">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label >Retype Password</label>
                                    <div class="rounded-xl flex items-center bg-black/70 hover:bg-black">
                                        <i class="material-symbols-outlined opacity-1 text-2xl p-1 ml-3">key</i>
                                        <input type="password" name="password_confirmation"
                                               class="bg-transparent text-white placeholder:text-gray-400 w-full mx-1 pl-2 appearance-none outline-none autofill:bg-yellow-200" value="{{ old('name') }}"
                                               placeholder="Retype password">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-8">
                                        <div class="icheck-primary">
                                            <input type="checkbox" id="agreeTerms" name="terms" value="agree" required class="w-4 h-4 ease rounded-md checked:bg-gradient-to-tl checked:from-blue-500 checked:to-violet-500 after:text-xxs after:material-symbols-outlined
                                                  after:duration-250 after:ease-in-out duration-250 relative float-left mt-1 cursor-pointer appearance-none border
                                                  border-solid border-slate-200 bg-white bg-contain bg-center bg-no-repeat align-top transition-all after:absolute after:flex after:h-full
                                                  after:w-full after:items-center after:justify-center after:text-white after:opacity-0 after:transition-all after:content-['✓']
                                                  checked:border-0 checked:border-transparent checked:bg-transparent checked:after:opacity-100"
                                                   >
                                            <label for="agreeTerms" class="ml-2">
                                                I agree to the <a href="#">terms</a>
                                            </label>
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                    <div class="flex justify-center mt-3">
                                        <button type="submit" class="rounded-lg bg-indigo-600 px-5 py-1.5">Register</button>
                                    </div>
                                    <!-- /.col -->
                                </div>
                            </form>
                        </div>
                        <div class="border-black/12.5 rounded-b-2xl border-t-0 border-solid p-6 text-center pt-0 px-1 sm:px-6">
                            <p class="mx-auto mb-6 leading-normal text-sm text-white">
                                Already have an account? <a href="{{ route('login') }}" class="font-semibold text-transparent bg-clip-text bg-fuchsia-500">Sign up</a>
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
