<div class="flex gap-3">

    <a><i class="fa fa-bell  hover:bg-slate-300 p-3 rounded-full" aria-hidden="true"
            onclick="ToggleModal('notificationModal')"></i> </a>
    <a onclick="ToggleModal('userModal')"><i class="fa fa-user hover:bg-slate-300 p-3 rounded-full"></i></a>




    <div class="fixed z-10 top-16 right-24 bg-slate-200 rounded-md shadow-sm p-2 flex flex-col w-72 " style="display:none"
        id="notificationModal">
        <div>
            <p class="text-xl font-semibold">Notifications</p>

        </div>
        <hr class="h-0.5 bg-black">
        <div>
            <ul>
                <li>kdfksj</li>
                <li>kjkj</li>
                <li>jjfgy</li>
                <li>reke</li>
                <li>ghugyu</li>
            </ul>
        </div>
    </div>

    <div class="fixed z-10 top-16 right-9 bg-slate-200 rounded-md shadow-lg p-2 flex flex-col w-52  border-black "
        style="display:none" id="userModal">
        <div>
            <p class="text-xl font-semibold">{{ strtoupper(auth()->user()->role) }}: {{ auth()->user()->name }}</p>

        </div>
        <hr class="h-0.5 bg-black my-2">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <ul class="text-center">
                <li class="hover:bg-gray-300 p-1 cursor-pointer"><a href="{{ route('profile.edit') }}">Profile</a></li>
                <li class="hover:bg-gray-300 p-1 cursor-pointer"><input type="submit" value="Logout"
                        class="min-w-full min-h-full px-4"></li>
            </ul>
        </form>
    </div>
    <script>
        var notifications;

        function ToggleModal(notifications) {
            var component = document.getElementById(notifications)

            if (component.style.display == "none") {
                component.style.display = "flex";
            } else {
                component.style.display = "none";
            }
        }
    </script>









</div>
