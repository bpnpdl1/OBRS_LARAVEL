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

        {{-- Datatables --}}
        <script src="{{asset('datatable/jquery-3.6.0.js')}}"></script>
        <link rel="stylesheet" href="{{asset('datatable/datatables.css')}}">
        <script src="{{asset('datatable/datatables.js')}}"></script>
    </head>
    <body class="font-sans antialiased">

@if(Session::has('success'))
<div id="success" class="bg-green-500 text-white p-2 w-fit rounded-md fixed top-3 right-3">
  {{session('success')}}
</div>
<script>
  $(document).ready(function(){
  
    $("#success").fadeOut(3000);
});
</script>
@endif



        <div class="min-h-screen bg-gray-100 flex flex-row text-white min-w-screen">
          <div class="w-64 bg-black min-h-full p-6 space-y-8">
           <div>
            Online Bike Rental System
           </div>

           <div class="flex flex-col">
             
                <a href="{{ route('dashboard') }}" class="hover:bg-gray-400 p-2  border-b-2 border-b-gray-200">Dashboard</a>
                <a href="{{ route('brands.index')}}" class="hover:bg-gray-400 p-2  border-b-2 border-b-gray-200">Brands</a>
                <a  href="{{ route('variants.index')}}" class="hover:bg-gray-400 p-2  border-b-2 border-b-gray-200">Variants</a>
                <a  href="{{ route('bikes.index')}}" class="hover:bg-gray-400 p-2  border-b-2 border-b-gray-200">Bikes</a>
                <a href="{{ route('rents.index')}}" class="hover:bg-gray-400 p-2  border-b-2 border-b-gray-200">Rents</a>
                <a class="hover:bg-gray-400 p-2  border-b-2 border-b-gray-200">Updates</a>
                <a class="hover:bg-gray-400 p-2  border-b-2 border-b-gray-200">Reports</a>


           </div>
          </div>
          <div class="flex-1 text-black flex flex-col">
            
            <div class="h-16 bg-gray-100 shadow-md flex flex-row justify-end items-center p-8 space-x-4">
             <a ><i class="fa fa-bell  hover:bg-slate-300 p-3 rounded-full" aria-hidden="true" onclick="show('notifications')"></i> </a>
                <a href=""><i class="fa fa-user hover:bg-slate-300 p-3 rounded-full"></i></a>
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



        <div class="fixed top-16 right-24 bg-slate-200 rounded-md shadow-sm p-2 flex flex-col w-72 hidden">
           <div>
            <p class="text-xl font-semibold">Notifications</p>
           
           </div>
           <hr class="h-0.5 bg-black">
           <div>
            <ul>
                <li>kdfksj</li>
                <li>kjkj</li>
                <li>jjfgy</li>
                <li>reke</li>
                <li>ghugyu</li>
               </ul>
           </div>
        </div>
        <script>
          var notifications;
          function show(notifications){
            var component=document.getElementById(notifications)
            component.style.display="flex"
          }

        </script>
    </body>
</html>
