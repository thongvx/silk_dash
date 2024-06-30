<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
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
text-slate-500 backdrop-blur-[2px]" style="background-image: url('{{asset('image/background-verify.webp')}}')">
<main class="mt-0 transition-all duration-200 ease-in-out">
    <section>
        <div class="relative w-screen min-h-screen p-0">
            <div class="box">
                <div class="flex justify-center items-center  w-full h-screen">
                    <div class="bg-white px-10 py-10 rounded-lg flex justify-center items-center flex-col">
                        <img src="{{ asset('image/email-verify.webp') }}" alt="logo" class="w-1/2" />
                        <h3 class="box-title text-5xl font-medium mb-3">Verify your email address</h3>
                        @if (session('resent'))
                            <div class="alert alert-success hidden">
                                A verification email has been sent to your email
                            </div>
                        @endif
                        <p>A verification email has been sent to your email</p>
                        <p>Please check vour email and click the link provided in the email to complete your account registration.</p>
                        <p class="mt-10 mb-6 w-3/5 text-center">If you do not receive the email within the next 5 minutes, use the button below to resend verification email.</p>
                        <a href="#" class="rounded-full bg-[#009FB2]/80 text-white px-14 py-3 text-lg hover:bg-[#009fb2] font-bold"
                           onclick="event.preventDefault(); document.getElementById('resend-form').submit();">
                            Resend Verification Email
                        </a>
                        <form id="resend-form" action="{{ route('verification.resend') }}" method="POST"
                              class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
</body>

</html>
