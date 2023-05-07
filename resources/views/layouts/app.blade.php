<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <script src="https://kit.fontawesome.com/a21da4aff9.js" crossorigin="anonymous"></script>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 flex flex-row text-white min-w-screen">
          <div class="w-64 bg-black min-h-full p-6 space-y-8">
           <div>
            Online Bike Rental System
           </div>

           <div>
            <ul>
                <li>Dashboard</li>
                <li>Bikes</li>
                <li>Variants</li>
                <li>Updates</li>
                <li>Rents</li>

            </ul>
           </div>
          </div>
          <div class="flex-1 text-black flex flex-col">
            <div class="h-16 bg-gray-100 shadow-md flex flex-row justify-end items-center p-8 space-x-4">
                <p>Admin</p>
                <i class="fa fa-user"></i>
            </div>
            <div class="flex-1 p-6">
             
                @yield('content')

               <div>

                <div>
                  
                </div>
               </div>

            </div>
          </div>
        </div>
    </body>
</html>
