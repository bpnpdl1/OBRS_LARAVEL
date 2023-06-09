<nav class="shadow-lg px-2 py-5  bg-gradient-to-br from-slate-200 to-gray-200 sticky top-0 left-0 font-semibold">
   <div class="flex flex-row justify-around ">
    <big class="font-bold text-2xl">{{ $companyname }}</big>
    <div class=" flex flex-shrink gap-16 justify-center">
        <a href="{{route('home')}}">Home</a>
        <a href="">About Us</a>
        <a href="">Our Bikes</a>
        <a href="{{route('login')}}">Login</a>
    </div>
    <div>
       <form action="">
        <div class="flex flex-row items-center">
            <input type="search " placeholder="Search Here" class="h-8 p-4 w-48 rounded-s-sm">
    <button class="bg-slate-600 px-4 py-1 text-white rounded-e-sm">Search</button>     

        </div>
         </form> 
    </div> 
   </div>
</nav>


<script>
    window.addEventListener('scroll',function(){
    


    });
</script>