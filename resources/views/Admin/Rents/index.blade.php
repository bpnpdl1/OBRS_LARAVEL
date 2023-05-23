@extends('layouts.app')

@section('content')
    
<div class="flex flex-col space-y-2">
    <h2 class="text-2xl font-bold">Rents</h2>

    <hr class="h-1 bg-black">
   </div>


   <div class="flex flex-row justify-end m-3">
      <a href="{{route('rents.create')}}" class="bg-blue-500 text-white py-2 px-4 rounded-md">Add Rent</a>
   </div>
   <div class="flex flex-row space-x-2 py-6 min-w-full justify-center shadow-lg">
    

@php
$sn=1;
@endphp

<table id="mytable" >
   <thead>
      <tr>
         <th>Sn</th>
         <th>Renter Name</th>
         <th>Rental Bike</th>
         <th>Booking Date</th>
         <th>From Date</th>
         <th>To Date</th>
         <th>Total Rental Price</th>
         <th>Rental Status</th>
         <th>Action</th>
      </tr>
   </thead>
   <tbody>
      @foreach ($rents as $rent)
          
     
      <tr>
         <td>{{$sn++}}</td>
         <td>{{$rent['name']}}</td>
         <td>{{$rent['number_plate']}}</td>
         <td>{{$rent['created_at']->diffForHumans()}}</td>
         <td>{{$rent['rent_from_date']}}</td>
         <td>{{$rent['rent_to_date']}}</td>
         <td>Rs {{$rent['total_rental_price']}}</td>
         <td>
            @if($rent['status']=='Available')
            <small class="bg-green-500 p-1 rounded-sm text-white">Available</small>
            @else
            <small class="bg-red-500 p-1 rounded-sm text-white">Unavailable</small>
            @endif
         </td>
         <td>
        <div class="flex flex-row gap-2">
            <a href="" class="bg-blue-500 text-white py-1 px-2 rounded-sm">Edit</a>
            <a href="" class="bg-red-500 text-white py-1 px-2 rounded-sm">Delete</a>
            
        </div>    
        </td>
      </tr>
       @endforeach
   </tbody>
</table>

   </div>


<script>
   let table=new DataTable('#mytable')
</script>

@endsection