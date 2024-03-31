<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/png" href="../assets/img/logo3.png" />
    <title>Stream Silk</title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Nucleo Icons -->
    <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Main Styling -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
    <body class="m-0 font-sans antialiased font-normal bg-white text-start text-base leading-default text-slate-500 bg-[url('../image/background.jpg')]">
    <main class="mt-0 transition-all duration-200 ease-in-out">
        <section>
            <div class="relative flex items-center w-full justify-center min-h-screen p-0 overflow-hidden">
                <div class="flex -mx-3 rounded-2xl md:w-6/12 backdrop-blur-xl bg-white/30 border-2 border-white/30">
                    <div class="relative w-full flex flex-col items-center min-w-0 break-words border-0 shadow-none lg:py4">
                        <div class="p-6 pb-0 mb-0 text-white text-center">
                            <h4 class="font-extrabold text-3xl">Sign In</h4>
                            <p class="mb-0">Enter your email and password to sign in</p>
                        </div>
                        <div class="w-10/12 p-6">
                            <form method="post" action="{{ url('/login') }}">
                                @csrf
                                <div class="mb-4">
                                    <input type="email" name="email" value="{{ old('email') }}" placeholder="Email" class="@error('email') @enderror focus:shadow-primary-outline text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding p-3 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none" />
                                    @error('email')
                                    <span class="error invalid-feedback text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <input type="password" name="password" placeholder="Password" class=" @error('password') @enderror  focus:shadow-primary-outline text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding p-3 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none" />
                                    @error('password')
                                    <span class="error invalid-feedback text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="flex items-center mb-0.5 text-left min-h-6">
                                    <input name="remember" id="remember" class="rounded-xl duration-200 ease-in-out after:rounded-full after:shadow-2xl
                                                         after:duration-200 checked:after:translate-x-5 h-5 relative
                                                         float-left mt-1 w-10 cursor-pointer appearance-none border
                                                         border-solid border-gray-200 bg-slate-800/10 bg-none bg-contain
                                                         bg-left bg-no-repeat align-top transition-all after:absolute
                                                         after:top-px after:h-4 after:w-4 after:translate-x-0.5 after:bg-white
                                                         after:content-[''] checked:border-green-500/95 checked:bg-green-500/95
                                                         checked:bg-none checked:bg-right" type="checkbox">
                                    <label for="remember" class="ml-2 font-normal cursor-pointer select-none text-sm text-slate-700" for="rememberMe">I forgot my password</label>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="inline-block w-full px-16 py-3.5 mt-6 mb-0 font-bold leading-normal text-center text-white align-middle transition-all bg-blue-500 border-0 rounded-lg cursor-pointer hover:-translate-y-px active:opacity-85 hover:shadow-xs text-sm ease-in tracking-tight-rem shadow-md bg-150 bg-x-25">Sign in</button>
                                </div>
                            </form>
                        </div>
                        <div class="border-black/12.5 rounded-b-2xl border-t-0 border-solid p-6 text-center pt-0 px-1 sm:px-6">
                            <p class="mx-auto mb-6 leading-normal text-sm text-white">
                                Don't have an account? <a href="{{ route('register') }}" class="font-semibold text-transparent bg-clip-text bg-gradient-to-tl from-blue-700 to-violet-700">Sign up</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    </body>

</html>
