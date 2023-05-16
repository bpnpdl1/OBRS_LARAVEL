@extends('layouts.app')

@section('content')
    
<div class="flex flex-col space-y-2">
    <h2 class="text-2xl font-bold">Variants</h2>

    <hr class="h-1 bg-black">
   </div>


   <div class="flex flex-row justify-end m-3">
      <a href="{{  route('variants.create') }}" class="bg-blue-500 text-white py-2 px-4 rounded-md">Add Variant</a>
   </div>
   <div class="shadow-lg">
    
<table id="mytable" >
   <thead>
      <tr>
         <th>Sn</th>
         <th>Variant Image</th>
         <th>Variant Name</th>
         <th>Variant Brand</th>
         <th>Rental Price</th>
         <th>Action</th>
      </tr>
   </thead>
   <tbody>

    @php
        $sn=1;
   
    @endphp
   
    @foreach ($variants as $variant)
       
      <tr>
         <td>{{$sn++}}</td>
         <td><img src="{{ asset('storage/variant_images/'.$variant['variant_image']) }}" alt="variantlogo" style="object-fit: cover" class="h-20"></td>
         <td>{{ $variant['variant_name']}}</td>
         <td>{{ $variant['brand_name']}}</td>
         <td>{{ $variant['variant_rental_price']}}</td>
         <td>
            <a href="{{ route('variants.edit', ['id'=>$variant['id']]) }}" class="bg-blue-500 text-white py-1 px-2 rounded-md">Edit</a>
            <a onclick="toogle({{ $variant['id'] }})"  class="bg-red-500 text-white py-1 px-2 rounded-md" id="{{ 'btdelete'.$variant['id'] }}">Delete</a>
             

         </td>
      </tr>
      @endforeach
   </tbody>
</table>

   </div>

   <div id="DeleteModal" style="display: none;" class=" bg-gray-400 fixed top-0 left-0 h-screen w-screen backdrop-blur-2xl opacity-90  flex flex-row items-center justify-center">
    <div class="bg-white border border-black p-8 flex flex-col justify-center items-center w-fit rounded-md">
       <p> Are you Sure to Delete ?</p>
       <form action="" method="post">
         @csrf
         @method('delete')
         <input type="hidden" id="dataid" value="" name="id">
        <Button type="submit" class="bg-green-500 px-2 py-1 rounded-md text-white" onclick="delete()" alt="dsds" >Yes</Button>
        <Button class="bg-red-500 px-2 py-1 rounded-md text-white" onclick="toogle()">No</Button>
        
       </form>

    </div>
   </div>

<script>
   let table=new DataTable('#mytable')

   var component;

   var d1=document.getElementById()

   

   function toogle(x){
    component=document.getElementById("DeleteModal");

    if(component.style.display=="none"){
        component.style.display="flex";
        document.getElementById('dataid').value=x;


        
    }
    else{
        component.style.display="none";
    }



   }

</script>

@endsection