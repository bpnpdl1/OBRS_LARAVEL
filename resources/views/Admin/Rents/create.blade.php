@extends('layouts.app')

@section('content')

<div>
 <p class="font-bold text-xl">Rent New Bike</p>

    <form action="{{route('variants.store')}}" method="post" enctype="multipart/form-data">
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
                <select name="brand" id="brand" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                    <option value="">Brand</option>
                    @foreach ($brands as $brand)
                    <option value="{{$brand->id}}">{{$brand->brand_name}}</option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('variant_rental_price')" class="mt-2" />
            </div>
            <div>
                <rental_price for="variant_rental_price">Choose Bike Variant</rental_price>
                <select name="" id="" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                    <option value="">Varinat</option>
                </select>
                <x-input-error :messages="$errors->get('variant_rental_price')" class="mt-2" />
            </div>
            <div>
                <rental_price for="variant_rental_price">Choose Bike </rental_price>
                <select name="" id="" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                    <option value="">Bike</option>
                </select><x-input-error :messages="$errors->get('variant_rental_price')" class="mt-2" />
            </div>
        </div>
      </div>

         <div>
           <label for="variant_image">Upload  Variant Image</label>
           <p>Choose Renter</p>
          <x-input-error :messages="$errors->get('variant_image')" class="mt-2" />
        </div>
        <div>
            <input class="bg-black text-white w-full rounded-lg py-2" type="submit" value="Add Variant">
        </div>
       </div>
    </form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<script>
    jQuery(document).ready(function(){
        jQuery('#brand').change(function(){
            let brand_id=jQuery(this).val();
           jQuery.ajax({
            url:'/getVariant',
            type:'post',
            data:'brand_id='+brand_id+'&_token='+{{csrf_token()}}
            success:function(result){
                console.log(result);
                jQuery('#brand').html(result)
            }
           })
        })
    })
</script>

@endsection