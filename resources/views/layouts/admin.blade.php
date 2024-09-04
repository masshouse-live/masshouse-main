<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
</head>
<body class="w-full bg-primary text-textPrimary h-screen max-h-screen overflow-auto font-nunito">
  <main  class="w-full grid 2xl:grid-cols-8 grid-cols-12">
    @include('includes.sidebar')
    
    <div
        class="
            2xl:col-span-7 col-span-10
            flex flex-col overflow-auto h-screen  " 
      >
        <div class="w-full flex flex-col h-full">
          @yield('content')
        </div>
      </div>
  </main>
</body>
{{-- load js --}}
@vite('resources/js/app.js')
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
{{-- load admin.js --}}
<script src="{{ asset('js/admin.js') }}"></script>
</html> 