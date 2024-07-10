<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/png" href="{{ asset('image/logo/logo4.webp') }}" />
    <title>Stream Silk</title>
    @vite('resources/css/app.css')
    <link rel="preload" href="{{ asset('assets/fonts/materialsymbolsoutlined.woff2') }}" as="font" type="font/woff2" crossorigin="anonymous">
    <style>
        @font-face {
            font-family: 'Material Symbols Outlined';
            src: url('{{ asset('assets/fonts/materialsymbolsoutlined.woff2') }}') format('woff2');
            font-display: swap;
        }
    </style>
    <script src="{{asset('assets/js/jquery-3.6.0.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery-ui.min.js')}}"></script>
    <script>

        $(document).on('click', '[dropdown-trigger]', function (e) {
            e.stopPropagation(); // Prevent click event from propagating to the document
            $('[dropdown-trigger]').attr('aria-expanded', function (i, attr) {
                return attr === 'true' ? 'false' : 'true';
            });
            if($(this).attr('aria-expanded') === 'true') {
                $('[dropdown-menu]').removeClass('hidden');
                $('[dropdown-menu]').addClass('bg-[#142132] text-white');
                $('[navbar-main]').addClass('bg-[#142132]');
            } else {
                $('[dropdown-menu]').addClass('hidden');
                $('[dropdown-menu]').removeClass('bg-[#142132] text-white');
                $('[navbar-main]').removeClass('bg-[#142132]');

            }
        });

        $(document).on('click', function (e) {
            if($(this).attr('aria-expanded') === 'true') {
                $('[dropdown-menu]').removeClass('hidden');
                $('[dropdown-menu]').addClass('bg-[#142132] text-white');
                $('[navbar-main]').addClass('bg-[#142132]');
            } else {
                $('[dropdown-menu]').addClass('hidden');
                $('[dropdown-menu]').removeClass('bg-[#142132] text-white');
                $('[navbar-main]').removeClass('bg-[#142132]');

            }
        });

        // Prevent dropdown menu from closing when clicking inside it
        $(document).on('click', '[dropdown-menu]', function (e) {
            e.stopPropagation(); // Prevent click inside dropdown from propagating to the document
        });
    </script>
</head>
