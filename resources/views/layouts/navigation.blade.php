<nav class="shadow-lg px-2 py-5  bg-gradient-to-br from-slate-200 to-gray-200 sticky top-0 left-0 font-semibold">
    <div class="flex flex-row justify-between px-28 ">
        <big class="font-bold text-2xl">{{ $companyname }}</big>
        <div class=" flex flex-shrink gap-16 justify-center items-center">
            <a href="{{ route('home') }}">Home</a>
            @if (!auth()->user())
                <a href="{{ route('login') }}">Login</a>
            @else
                <livewire:user-menu />
            @endif
        </div>

    </div>
    <div class="hidden bg-blue-400 h-56 min-w-fit absolute top-[4.5rem] right-12 rounded shadow-lg">
        <p class="text-lg font-semibold p-2 text-center">Notification</p>
        <hr class="h-1">

        <div class="p-2 m-2 rounded shadow-md w-96">
            <p>Notication Text</p>
            <small class=" flex justify-end ">Sent Time</small>
        </div>

    </div>
</nav>


<script>
    window.addEventListener('scroll', function() {



    });
</script>
