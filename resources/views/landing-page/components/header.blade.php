<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/png" href="{{ asset('image/logo/logo4.webp') }}" />
    <title>Stream Silk</title>
    @vite('resources/css/app.css')
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
        var currentDropdownTrigger = null;
        var currentDropdownMenu = null;

        $(document).on('click', '[dropdown-trigger]', function (e) {
            e.stopPropagation(); // Prevent click event from propagating to the document
            $('[dropdown-menu]').toggleClass('hidden'); // Toggle visibility
        });

        $(document).on('click', function (e) {
            $('[dropdown-menu]').addClass('hidden'); // Hide dropdown
        });

        // Prevent dropdown menu from closing when clicking inside it
        $(document).on('click', '[dropdown-menu]', function (e) {
            e.stopPropagation(); // Prevent click inside dropdown from propagating to the document
        });
    </script>
</head>
