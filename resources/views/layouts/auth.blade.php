<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    @vite(['resources/js/app.js', 'resources/js/editor.js'])
</head>

<body class="dark text-textPrimary h-full">
    <div class="w-full flex flex-col h-full justify-center items-center bg-blue-400">
        <div class="w-full flex h-full justify-center items-center overflow-auto ">
            <div
                class="flex flex-col max-w-md bg-primary  mx-auto w-full border-2 border-accent rounded shadow py-20 px-5">
                <div class="w-full justify-center flex">
                    <img alt="Masshouse Logo" src="{{ asset('images/logos/auth_logo.png') }}" alt="Masshouse Logo"
                        width="" height="" class="h-32 w-auto" />
                </div>
                @yield('content')
            </div>
        </div>
    </div>
</body>

</html>
