@extends('layouts.app')

@section('content')


<div>

 <p class="font-bold text-xl">Rent New Bike</p>

    <form action="{{route('rents.store')}}" method="post" enctype="multipart/form-data">
        @csrf
       <div class="flex flex-col gap-4 p-3 shadow-lg rounded-lg border border-b-2 border-gray-600">
      <div class="grid grid-cols-2 gap-3 px-2">
        <div>
            <label for="from_date">Booking From date</label>
            <input type="date" name="from_date" id="from_date" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" value="{{old('from_date')}}">
            <x-input-error :messages="$errors->get('from_date')" class="mt-2" />
        </div>
        <div>
            <label for="to_date">Booking To date</label>
            <input type="date" name="to_date" id="to_date" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" value="{{old('to_date')}}">
            <x-input-error :messages="$errors->get('to_date')" class="mt-2" />
        </div>
      </div>
      

      <div>
        <label for="" class="font-bold py-1">Choose Bike Form Rent</label>
        <div class="grid grid-cols-3 gap-2">
            <div>
                <label for="variant_rental_price">Choose Bike Brand</label>
                <select name="brand"  id="brand" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                    <option  value="">--Select Brand--</option>
                    @foreach ($brands as $brand)
                    <option value="{{$brand->id}}">{{$brand->brand_name}}</option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('variant_rental_price')" class="mt-2" />
            </div>
            <div>
                <label for="variant_rental_price">Choose Bike Variant</label>
                <select name="variant" id="variant" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                    
                </select>
                <x-input-error :messages="$errors->get('variant_rental_price')" class="mt-2" />
            </div>
            <div>
                <rental_price for="variant_rental_price">Choose Bike </rental_price>
                <select name="bike" id="bike" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                    
                </select><x-input-error :messages="$errors->get('variant_rental_price')" class="mt-2" />
            </div>
        </div>
      </div>

        
           <div class="p-2">
            <label for="variant_image" class="font-bold">Enter Renter Email</label>
            <input type="text" name="brand_name" id="name" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" value="{{old('brand_name')}}">
            
           </div>
         
        
               <div>
     <button class="bg-black text-white w-full rounded-lg py-2" onclick="toggle()" type="button">Add Bike on Rent</button>
        </div>
        </div>
    
       </div>
       
         <div class=" p-5 w-screen h-screen rounded-lg fixed top-0 left-0 flex flex-row justify-center items-center bg-slate-400 bg-opacity-70 backdrop-blur-sm" id="billModal" style="display: none">
           <div class="bg-white p-5 rounded-md flex flex-col gap-2 " style="width: 32rem">
             <label for="" class="font-bold text-lg">Billing Details</label>
             <hr class="h-0.5 bg-black rounded-md">



          
           
           <div class="grid grid-cols-2 justify-items-stretch">
            <div >
               <p class="text-sm">Rent price per Day: </p>
            <p class="text-sm">Rental Days: </p>
          
            
            </div>
            <div class="flex flex-col items-end">
              <p class="text-sm">Rs 150 </p>
            <p class="text-sm">4</p>
            
           
            </div>
          
           </div>
           <hr class="h-0.5 bg-slate-400">
              <div class="flex flex-row justify-between">
<p class="text-sm">Total Rental Price: </p>
 <p class="text-sm">Rs 600 </p>
            </div>
            <div class="flex flex-row justify-center gap-3 pt-3">
              
            <input class="bg-black text-white t rounded-md py-2 px-4" type="submit" value="Rent New Bike">
            <Button  class="bg-black text-white  rounded-md py-2 px-4" onclick="toggle()" type="button">Exit</Button>
       </div>
           </div>
          </div>
    </form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
   



<script>
  $(document).ready(function() {
    //brand>variant
    $('#brand').change(function() {
      // Get the selected option value
      var brand_id = $(this).val();
      
      // Create the data to be sent in the POST request
      var postData = {
        brand_id: brand_id,
        _token: "{{ csrf_token() }}"
      };

      // Send the POST request
      $.ajax({
        type: 'POST',
        url: '/getVariant',
        data: postData,
        dataType: 'json',
        success: function(response) {
          // Handle the success response
         
          // console.log(response);

          $('#variant').html('<option  value="">-- Select Variant --</option>');
                        $.each(response, function (key, value) {
                            $("#variant").append('<option value="' + value['id']+ '">' + value['variant_name'] + '</option>');
                               });
                        $('#bike').html('<option value="">-- Select Bike --</option>');
        },
        error: function(xhr, status, error) {
          // Handle the error
          alert(error)
        }
      });
    });

    //variant>bike

    $('#variant').change(function() {
      // Get the selected option value
      var variant_id = $(this).val();
      
      // Create the data to be sent in the POST request
      var bikeData = {
        variant_id: variant_id,
        _token: "{{ csrf_token() }}"
      };

      // Send the POST request
      $.ajax({
        type: 'POST',
        url: '/getBike',
        data: bikeData,
        dataType: 'json',
        success: function(response) {
          // Handle the success response
         
          // console.log(response);

          $('#bike').html('<option value="">-- Select Bike --</option>');
                        $.each(response, function (key, value) {
                            $("#bike").append('<option value="' + value['id']+ '">' + value['number_plate'] + '</option>');
                               });
                       
        },
        error: function(xhr, status, error) {
          // Handle the error
          console.log(error);
        }
      });
    });

    
    
  });


</script>

<script>

function toggle(){
  var billModal=document.getElementById('billModal');

  if(billModal.style.display=='none'){
    billModal.style.display='flex';
   
  }
  else{
    billModal.style.display='none';
     billModal.fadeOut(1000);
  }
 
 
}
</script>

@endsection