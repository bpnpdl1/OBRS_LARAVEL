@extends('layouts.app')

@section('content')
    
<div class="flex flex-col space-y-2">
    <h2 class="text-2xl font-bold">Bikes</h2>

    <hr class="h-1 bg-black">
   </div>

   @php
       $sn=1
   @endphp

   <div class="flex flex-row justify-end m-3">
      <a href="{{route('bikes.create')}}" class="bg-blue-500 text-white py-2 px-4 rounded-md">Add Bike</a>
   </div>
   <div class="px-1 shadow-lg">
    
<table id="mytable" >
   <thead>
      <tr>
         <th>Sn</th>
         <th>Bike Number Plate</th>
         <th>cc</th>
         <th>Bike Brand</th>
         <th>Variant name</th>
         <th>Bill Book</th>
         <th>Model Year</th>
         <th>Status</th>
         <th>Added date</th>
         <th>Action</th>
      </tr>
   </thead>
   <tbody>
      @foreach ($bikes as $bike)
          
      
      <tr>
         <td>{{$sn++}}</td>
         <td>{{$bike['number_plate']}}</td>
         <td>{{$bike['cc']}}</td>
         <td>{{$bike['brand_name']}}</td>
         <td>{{$bike['variant_name']}}</td>
         <td><a class="bg-blue-500 rounded-md text-white p-1" href="{{asset('storage/bike_images/'.$bike['billbook'])}}"  target="_blank"><small>Click to View Bill Book</small></a></td>
         <td>{{$bike['model_year']}}</td>
         
         <td>
            @if ($bike['status']=='Available')
            <small class="bg-green-500 p-1 rounded-sm text-white">Available</small>
      @else
           
            <small class="bg-red-500 p-1 rounded-sm text-white">Unavailable</small>
         
            @endif
         </td>
         <td>{{$bike['created_at']->diffForHumans()}}</td>
         <td>
            <a href="{{route('bikes.edit',$bike['id'])}}" class="bg-blue-500 text-white py-1 px-2 rounded-md">Edit</a>
            <a href="" class="bg-red-500 text-white py-1 px-2 rounded-md">Delete</a>
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