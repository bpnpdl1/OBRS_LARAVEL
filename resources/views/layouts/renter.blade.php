<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $companyname }}</title>
    <!-- Include the Tailwind CSS CDN -->
    <link rel="stylesheet" href="{{asset('build/assets/style.css')}}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

  @vite(['resources/css/app.css', 'resources/js/app.js'])
  @livewireStyles()
</head>
<body class="font-sans antialiased bg-slate-100">
  @include('layouts.navigation')

  @include('layouts.successmsg')
  
  <div class=" min-h-[50vh]">
@yield('content')
  </div>

  

@include('frontend.partials.footer')
@livewireScripts()
</body>
</html>
