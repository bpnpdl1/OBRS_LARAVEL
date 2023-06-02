@extends('layouts.renter')

@section('content')
  @include('frontend.partials.cover')


<div>
  <p class="text-3xl font-semibold text-center p-4">Top Bike Rental Brands</p>

 <div class="flex flex-row justify-around px-4 pb-6 ">


 @foreach ($brands->toArray() as $brand)
    <div class="max-w-xs mx-auto bg-white rounded-lg overflow-hidden shadow-lg border-2 border-gray-300">
   <img src="{{asset('storage/'.$brand['brand_logo'])}}" alt="{{$brand['brand_name']}}" class="object-cover mx-auto mt-0 py-4">
      <hr class="h-0.5 bg-black">
    <h2 class="text-2xl text-center my-2  font-semibold text-gray-800">{{$brand['brand_name']}}</h2>
   

</div>
 @endforeach

 </div>
</div>



@endsection