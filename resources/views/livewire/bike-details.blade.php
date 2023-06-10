<div>
    {{-- Stop trying to control. --}}


<div class="p-4 shadow-md shadow-black">
    <h2 class="text-3xl font-semibold text-center">Bike Details</h2>

<div class="flex flex-row justify-center items-center gap-4 m-5 shadow-sm shadow-gray-800 rounded-md py-8" >

    <div>
       
        <img src="{{ 'storage/variant_images/'.$bike->variant->variant_image }}" alt="" class="w-[350px] h-[300px] object-cover" >

        <div class="flex flex-row gap-4 justify-center">
            <div >
                <p>From date</p>
                <input type="date" name="" id="" class="w-[100%] bg-slate-200 rounded" wire:model="from_date">
            </div>
            <div>
                <p>To date</p>
                <input type="date" name="" id="" class="w-[100%] bg-slate-200 rounded" wire:model="to_date">
            </div>
        </div>
    @if ($dateerror)
         <div class="flex flex-row justify-center py-1"> <span class="text-red-600 text-sm">{{ $dateerror }}</span></div>
    @endif
        
    </div>

   <div>
     <div class="font-normal  grid grid-cols-2 gap-6 text-md ">
       <div>
         <ul>
            <li>Bike Name:</li>
            <li>Bike Brand:</li>
            <li>Bike Variant:</li>
            <li>Rental Price Per Day:</li>
            <li>Bike cc:</li>
            <li>Bike Rides :</li>
            <li>Bike Model Year: </li>
            <li>Bike Number Plate</li>
            <li>View Bill Book:</li>
            
        </ul>
       </div>
       <div>
         <ul>
            <li>{{ $bike->number_plate }}</li>
            <li>{{ $bike->variant->brand->brand_name }}</li>
            <li>{{ $bike->variant->variant_name }}</li>
            <li>{{ $bike->variant->variant_rental_price }}</li>
            <li>{{ $bike->cc }}</li>
            <li>{{ $rentcounts }}</li>
            <li>{{ $bike->model_year }}</li>
            <li>Bike Number Plate</li>
            <li>View <button class="bg-gray-900 text-white py-0.5 px-3 text-sm rounded" wire:click="billbookdialog">Click me</button></li>
            
        </ul>
       </div>
         
    </div>
    <Button class="min-w-full text-white rounded py-1.5 hover:bg-black my-4  bg-slate-700" wire:click="toogle">Rent Bike</Button>
   </div>

</div>



<div class="w-screen h-screen {{ $billbookdisplay }} top-0 right-0 backdrop-blur-sm bg-opacity-70 bg-gray-300 flex justify-center items-center">

   <div class="bg-white">

    <div class="bg-white rounded relative p-2">
 <button  type="button" wire:click="billbookdialog(2)" class=" absolute top-2 right-2"> <i class="fa fa-times hover:bg-black hover:text-white rounded-full p-1" aria-hidden="true" ></i>
   </button>
   <p class="text-lg font-semibold p-3">BillBook View</p>
   <hr class="h-1">

   <div class="h-[400px] overflow-y-auto min-w-[600px]">
     <img src="{{ asset($image_url) }}" alt="image"  class="w-full object-cover">
   </div>
</div>
   </div>
</div>




  

@if ($recommendedbikes)

<div class=" m-5 shadow-sm shadow-gray-800 rounded-md py-5">
     <h2 class="text-2xl font-semibold text-center pb-3">Recommentdation Bikes</h2>

   <div class="flex flex-row text-sm justify-center gap-4">
@forelse ($recommendedbikes as $rbike)
    <div class="flex flex-row gap-3 border-2 w-60 rounded">
        <div>
        <img src="{{ asset('storage/variant_images/'.$rbike->variant->variant_image) }}" alt="image" class="w-[100px] h-[180px] object-cover">
       
    </div>
    <div>
        <ul>
            <li> <p>{{ $rbike->variant->brand->brand_name }}</p></li>
            <li> <p>{{ $rbike->variant->variant_name }}</p></li>
             <li> <p>Rental Price: {{ $rbike->variant->variant_rental_price }}</p></li>
               <li> <p>cc: {{ $rbike->cc }}</p></li>
        </ul>
       <form ction="{{ route('renter.bikedetails') }}"  method="POST">
        @csrf
        <input type="hidden" name="bike_id" value="{{ $rbike->id }}">
         <button type="submit" class="bg-slate-600 text-white hover:bg-black text-ellipsis min-w-full px-3 rounded-sm align-middle ">View Details</button>
  
       </form>
    </div>
    </div>

    @empty

      <h2 class="text-xl font-mono text-center pb-3">No Bikes Availables</h2>

@endforelse
   

    
   </div>
 
    
@endif
   <div>
   
   </div>


</div>
</div>

@if ($toogledialog=="show")
    


<div class=" fixed  top-0 h-screen w-screen backdrop-blur-[10px] flex justify-center items-center" id="resultdialog">
 <div class="bg-white inline-block p-6 rounded relative shadow-2xl shadow-black hover:scale-105">
<button class="absolute top-2 right-4" wire:click="toogle()"  title="close dialog"><i class="fas fa-times scale-110 rounded"></i>
</button>

<p class="text-xl font-semibold text-center p-3">Rental Billing Details  </p>
<hr class="bg-slate-900">
<div class="grid grid-cols-2 gap-5 p-3">

    <div>
     <ul>
    <li>Bike varinat:</li>
    <li>Bike number:</li>
    <li>From date:</li>
    <li>To date:</li>
    <li>Rental price:</li>
    <li>Rental Days:</li>
    <li>Total Rental Price :</li>
     </ul>
    </div>

    <div>
     <ul>
    <li>{{ $bike->variant->variant_name }}</li>
    <li>{{ $bike->number_plate }}</li>
    <li>{{ $from_date }} </li>
    <li>{{ $to_date }} </li>
    <li>Rs {{ $bike->variant->variant_rental_price }}</li>
    <li>{{ $rentaldays }} </li>
    <li>Rs {{ $total_rental_price }} </li>
     </ul>
    </div>
    
</div>

<div>
    <h1 class="font-semibold">Payment Methods</h1>
    <div class="flex flex-row justify-center gap-3 py-1">
        <button class="bg-slate-800 hover:bg-black text-sm px-3 py-0.5 rounded-sm text-white" wire:click="checkout">Cash on Hand
            <small>(Credit)</small>
        </button>
        <button class="bg-violet-950 hovwe:bg-violet-500  text-sm px-3 py-0.5 rounded-sm text-white">Pay with Khalti</button> 
    </div>
</div>

{{ $checkout }}

@if($checkout=="show")
<div class="flex flex-col justify-center">
    <p class="text-slate-950 text-center font-semibold p-2 text-sm">Are you sure to Check out ? </p>
    <button class="bg-slate-500 text-white text-sm hover:bg-black rounded  px-3 py-1"  wire:click="rentbike">Rent Bike on Cash on Hand</button>
</div>
@endif

 </div>
@endif


</div>


</div>
