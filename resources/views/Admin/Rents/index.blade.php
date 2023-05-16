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
    
<table id="mytable" >
   <thead>
      <tr>
         <th>Sn</th>
         <th>Renter Name</th>
         <th>Rental Bike</th>
         <th>Booking Date</th>
         <th>From Date</th>
         <th>Rental Status</th>
         <th>Rental Price</th>
         <th>Status</th>
         <th>Action</th>
      </tr>
   </thead>
   <tbody>
      <tr>
         <td>Sn</td>
         <td>Rent Number Plate</td>
         <td>Variant</td>
         <td>Brand</td>
         <td>Model Year</td>
         <td>Bill Book </td>
         <td>150</td>
         <td><small class="bg-green-500 p-1 rounded-sm text-white">Available</small>
            <small class="bg-red-500 p-1 rounded-sm text-white">Unavailable</small>
         </td>
         <td>
        <div class="flex flex-row gap-2">
            <a href="" class="bg-blue-500 text-white py-1 px-2 rounded-md"><i class="fas fa-edit    "></i></a>
            <a href="" class="bg-red-500 text-white py-1 px-2 rounded-md"><i class="fa fa-trash" aria-hidden="true"></i></a>
            
        </div>    
        </td>
      </tr>
   </tbody>
</table>

   </div>


<script>
   let table=new DataTable('#mytable')
</script>

@endsection