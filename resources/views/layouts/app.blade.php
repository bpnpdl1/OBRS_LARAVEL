<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{  $companyname }}</title>
             <link rel="icon" type="image/x-icon" href="{{ asset('images/icons8-bike-16.png') }}">

       <link href='https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/ui-lightness/jquery-ui.css'  rel='stylesheet'>

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

        <style type="text/css">
        #ui-datepicker-div>div {
          background: black;
  
}
.disable_dates {
  background-color: rgba(8, 1, 1, 0.452); /* Change the background color as desired */
}
.disable_dates>span  {
  mix-blend-mode: darken;
}

@livewireStyles()

</style>
    </head>
    <body class="font-sans antialiased">

@include('layouts.successmsg')



        <div class="min-h-screen bg-gray-100 flex flex-row text-white min-w-screen">
          <div class="w-64 bg-black min-h-full p-6 space-y-8">
           <div>
            {{ $companyname }}
           </div>

           <div class="flex flex-col">
             
                <a href="{{ route('dashboard') }}" class="hover:bg-gray-400 p-2  border-b-2 border-b-gray-200">Dashboard</a>
                   <a class="hover:bg-gray-400 p-2  border-b-2 border-b-gray-200">Users</a>
                <a href="{{ route('brands.index')}}" class="hover:bg-gray-400 p-2  border-b-2 border-b-gray-200">Brands</a>
                <a  href="{{ route('variants.index')}}" class="hover:bg-gray-400 p-2  border-b-2 border-b-gray-200">Variants</a>
                <a  href="{{ route('bikes.index')}}" class="hover:bg-gray-400 p-2  border-b-2 border-b-gray-200">Bikes</a>
                <a href="{{ route('rents.index')}}" class="hover:bg-gray-400 p-2  border-b-2 border-b-gray-200">Rents</a>
                <a href="{{ route('analytics.index') }}"  class="hover:bg-gray-400 p-2  border-b-2 border-b-gray-200">Analytics</a>
                <a href="{{ route('company.index') }}"  class="hover:bg-gray-400 p-2  border-b-2 border-b-gray-200">Company setup</a>


           </div>
          </div>
          <div class="flex-1 text-black flex flex-col">
            
            <div class="h-16 bg-gray-100 shadow-md flex flex-row justify-end items-center p-8 space-x-4">
             <a ><i class="fa fa-bell  hover:bg-slate-300 p-3 rounded-full" aria-hidden="true" onclick="ToggleModal('notificationModal')"></i> </a>
                <a onclick="ToggleModal('userModal')"><i class="fa fa-user hover:bg-slate-300 p-3 rounded-full"></i></a>
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



        <div class="fixed top-16 right-24 bg-slate-200 rounded-md shadow-sm p-2 flex flex-col w-72 " style="display:none"  id="notificationModal">
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

          <div class="fixed top-16 right-9 bg-slate-200 rounded-md shadow-lg p-2 flex flex-col w-52  border-black " style="display:none"  id="userModal">
           <div>
            <p class="text-xl font-semibold">{{strtoupper(auth()->user()->role)}}: {{auth()->user()->name}}</p>
           
           </div>
           <hr class="h-0.5 bg-black my-2">
           <form action="{{route('logout')}}" method="POST">
            @csrf
            <ul class="text-center">
                <li class="hover:bg-gray-300 p-1 cursor-pointer"><a href="{{route('profile.edit')}}">Profile</a></li>
                <li class="hover:bg-gray-300 p-1 cursor-pointer"><input type="submit" value="Logout" class="min-w-full min-h-full px-4"  ></li>
                 </ul>
           </form>
        </div>
        <script>
          var notifications;
          function ToggleModal(notifications){
            var component=document.getElementById(notifications)
           
            if(component.style.display=="none"){
              component.style.display="flex";
            }
            else{
              component.style.display="none";
            }
          }

        </script>
        @livewireScripts()
    </body>
</html>
