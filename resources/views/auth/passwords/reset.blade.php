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
    <body class=" bg-cover bg-center bg-no-repeat font-sans antialiased h-screen font-normal text-start text-base leading-default
    text-slate-500 backdrop-blur-[2px]"
      style="background-image: url('{{asset('image/background.webp')}}')">
        <main class="mt-0 transition-all duration-200 ease-in-out auth">
        <section>
            <div class="relative flex items-center w-full min-h-screen p-0 overflow-hidden">
                <div class="w-full flex justify-center">
                    <div class="flex -mx-3 rounded-2xl lg:w-7/12 sm:w-10/12 w-11/12 backdrop-blur-md bg-black/40">
                        <div class="relative w-full flex flex-col items-center min-w-0 break-words border-0 shadow-none lg:py4">
                            <div class="p-6 pb-0 mb-0 text-white flex items-center flex-col">
                                <h1 class="text-3xl mb-3 font-bold">Create new password</h1>
                                <h4 class="text-normal text-wrap">Your new password must be different from previous used passwords </h4>
                            </div>
                            <div class="w-full p-6 text-white">
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
                                        <div class="rounded-xl flex items-center bg-black/70 hover:bg-black mt-3">
                                            <i class="material-symbols-outlined opacity-1 text-2xl p-1 ml-3">email</i>
                                            <input type="email" name="email" value="" placeholder="Email" id="email"
                                                   class="autofill:bg-yellow-200 {{ $errors->has('email') ? ' is-invalid' : '' }} focus:shadow-primary-outline text-sm leading-5.6 w-full
                                                       appearance-none rounded-xl bg-clip-padding p-3 font-normal outline-none transition-all
                                                       bg-transparent placeholder:text-gray-400 focus:border-fuchsia-300 focus:outline-none" />
                                        </div>
                                        @if ($errors->has('email'))
                                            <span class="error invalid-feedback text-red-600">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                    <div class="mb-2">
                                        <label class="" for="Password">Password</label>
                                        <div class="rounded-xl flex items-center bg-black/70 hover:bg-black mt-3">
                                            <i class="material-symbols-outlined opacity-1 text-2xl p-1 ml-3">key</i>
                                            <input type="password" name="password" value="" placeholder="Password" id="Password"
                                                   class="autofill:bg-yellow-200 {{ $errors->has('password') ? ' is-invalid' : '' }} focus:shadow-primary-outline text-sm leading-5.6 w-full
                                                       appearance-none rounded-xl bg-clip-padding p-3 font-normal outline-none transition-all
                                                       bg-transparent placeholder:text-gray-400 focus:border-fuchsia-300 focus:outline-none" />
                                        </div>
                                        @if ($errors->has('email'))
                                            <span class="error invalid-feedback text-red-600">{{ $errors->first('password') }}</span>
                                        @endif
                                    </div>
                                    <div class="mb-2">
                                        <label class="" for="password_confirmation">Password Confirmation</label>
                                        <div class="rounded-xl flex items-center bg-black/70 hover:bg-black mt-3">
                                            <i class="material-symbols-outlined opacity-1 text-2xl p-1 ml-3">key</i>
                                            <input type="password" name="password_confirmation" value="" placeholder="Confirm Password" id="password_confirmation"
                                                   class="autofill:bg-yellow-200 {{ $errors->first('password_confirmation') }} focus:shadow-primary-outline text-sm leading-5.6 w-full
                                                       appearance-none rounded-xl bg-clip-padding p-3 font-normal outline-none transition-all
                                                       bg-transparent placeholder:text-gray-400 focus:border-fuchsia-300 focus:outline-none" />
                                        </div>
                                        @if ($errors->has('password_confirmation'))
                                            <span
                                                class="error invalid-feedback text-red-600">{{ $errors->first('password_confirmation') }}</span>
                                        @endif
                                    </div>
                                    <div class="row">
                                        <div class="col-12 text-center">
                                            <button type="submit" class='w-full sm:w-1/3 bg-indigo-400 hover:bg-indigo-600 rounded-lg py-2 font-bold'>Reset Password</button>
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
    </main>
    </body>
</html>
