@extends('layouts.renter')

@section('content')


<div class="p-10">
    <p class="font-medium text-3xl">Bikes</p>
</div>


<div class="flex flex-row px-5 ml-2">

    <div class="w-64 h-full border-gray-200 shadow border-2 ">
         <h6 class="text-xl  text-center py-2 font-semibold">Filters</h6>
         <hr class="h-0.5 bg-slate-700 opacity-75">

         <div class="grid grid-row-3 py-2 justify-center hover:shadow-xl gap-4">
         
            <div>
                   <p class="font-medium">Prices</p>
                    <ul>
              
                <li class="px-6"><input type="radio" > Sort By High to Low </li>
                <li class="px-6"><input type="radio" > Sort By Low to High </li>
              
              </ul>
            </div>

            <div>
              <p class="font-medium">Brands</p>
              <ul>
                @foreach ($brands as $brand)
                <li class="px-6">{{$brand->brand_name}}</li>
                    
                @endforeach
              </ul>
            </div>
            <div>
               <p class="font-medium">cc</p>
               <ul>
                @foreach ($ccs as $cc)
                <li class="px-6">{{$cc}}</li>
                    
                @endforeach
              </ul>
            </div>

         </div>
        
    </div>

    <div class=" grid grid-cols-3 justify-evenly gap-6  mx-14 p-10 flex-1 hover:max-md:m-1">
    @foreach ($bikes as $bike)
        <div class="max-w-[20rem] mx-auto bg-white rounded-lg overflow-hidden shadow-md hover:shadow-xl  ">
  <img  style="width: 250px; height: 200px;object-fit: cover" src="{{asset('storage/variant_images/'.$bike->variant->variant_image)}}" alt="{{asset('storage/variant_images/'.$bike->variant->variant_name)}}">
  <div class="p-4">
    <h2 class="text-xl font-semibold text-gray-800">{{$bike->variant->variant_name}}</h2>
    <p class="mt-1">
      <span class="text-gray-700 font-semibold">  Brand:</span> 
     <span class=""text-gray-800 ml-2">{{$bike->variant->brand->brand_name}}.</span>
    </p>
    <div class="mt-1">
      <span class="text-gray-700 font-semibold">Rental Price:</span>
      <span class="text-gray-800 ml-2">{{$bike->variant->variant_rental_price}}</span>
    </div>
    <div class="mt-2">
      <a href="#" class="inline-block  w-full  text-center bg-gray-600 hover:bg-black text-white font-semibold py-2 px-4 rounded">
      Rent Bike
      </a>
    </div>
  </div>
</div>

    @endforeach
</div>
</div>



@endsection