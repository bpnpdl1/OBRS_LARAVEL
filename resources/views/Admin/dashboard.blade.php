@extends('layouts.app')

@section('content')
    
<div class="flex flex-col space-y-2">
    <h2 class="text-2xl font-bold">Dashboard</h2>

    <hr class="h-1 bg-black">
   </div>


   <div class="flex flex-row space-x-2 py-6">
    
<div class="bg-gray-800 w-32 rounded-md text-white flex flex-col align-center justify-center p-6">
    <h2 class="font-bold text-xl">Brands</h2>
    <p class="text-2xl">{{ $brands }}</p>
</div>
<div class="bg-gray-800 w-32 rounded-md text-white flex flex-col align-center justify-center p-6">
    <h2 class="font-bold text-xl">Variants</h2>
    <p class="text-2xl">{{ $variants }}</p>
</div>
<div class="bg-gray-800 w-32 rounded-md text-white flex flex-col align-center justify-center p-6">
    <h2 class="font-bold text-xl">Bikes</h2>
    <p class="text-2xl">{{$bikes}}</p>
</div>
<div class="bg-gray-800 w-32 rounded-md text-white flex flex-col align-center justify-center p-6">
    <h2 class="font-bold text-xl">Rents</h2>
    <p class="text-2xl">30</p>
</div>
<div class="bg-gray-800 w-32 rounded-md text-white flex flex-col align-center justify-center p-6">
    <h2 class="font-bold text-xl">Renters</h2>
    <p class="text-2xl">30</p>
</div>

   </div>


   <div class="border-2 border-gray-500 rounded-sm">
  <h2 class="font-bold text-xl px-2 py-6">Rental Records</h2>

 <center>
     <img src="https://blog.risingstack.com/wp-content/uploads/2021/08/calendar-heatmap-built-with-d3js-like-github-1024x232.png" alt="">

 </center>
    
   </div>

@endsection