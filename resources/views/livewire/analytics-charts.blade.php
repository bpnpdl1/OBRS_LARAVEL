   <div class="flex flex-col m-2">
       {{-- Success is as dangerous as failure. --}}
       {{ $month }}
       <p>{{ $sn }}</p>

       <div class="flex flex-row ">
           <div class="flex flex-col flex-1">
               <div class="flex flex-row justify-between w-full bg-red-300">
                   <p>Rental Report</p>
                   <input type="month" class="rounded" value="{{ date('Y-m') }}" wire:model.lazy="month"
                       onchange="updatechart()">
               </div>
               <div class="">
                   <p>Added Bikes: </p>
                   <p>Total Renenve: </p>
                   <p> Total Rents: </p>
               </div>
           </div>
           <x-doughnut-chart idvalue="Credit" :month="$month" />
       </div>


       <div class="" class="grid grid-rows-2  justify-between flex-1 bg-red-500">
           <x-variants-chart idvalue="revenue" :month="$month" />
           <x-revenve-chart :month="$month" />



       </div>


       <script>
           function updatechart() {

               variantchart.update();
           }
       </script>





   </div>


   {{--  --}}
