<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="/assets/vendor/ckeditor5.css">

    <link rel="stylesheet" href="https://code.jquery.com/ui/1.14.0/themes/base/jquery-ui.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>

<body class="dark w-full bg-primary text-textPrimary h-screen max-h-screen overflow-auto ">
    <main class="w-full grid 2xl:grid-cols-8 grid-cols-12">
        @include('includes.sidebar')
        <div class="
            2xl:col-span-7 col-span-10
            flex flex-col overflow-auto h-screen  ">
            <div class="w-full flex flex-col h-full">
                @yield('content')
            </div>
        </div>
    </main>
</body>
{{-- load js --}}
@vite('resources/js/app.js')
<script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/d3/7.8.4/d3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>

<script src="https://d3js.org/d3.v7.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://code.jquery.com/ui/1.14.0/jquery-ui.js"></script>

{{-- load admin.js --}}
<script src="{{ asset('js/admin.js') }}"></script>
@vite('resources/js/editor.js')

</html>
