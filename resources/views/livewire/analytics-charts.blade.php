   <div class="flex flex-col m-2">
       {{-- Success is as dangerous as failure. --}}


       <div class="flex flex-row ">
           <div class="flex flex-col flex-1">
               <div class="flex flex-row justify-between w-full bg-red-300">
                   <p>Rental Report</p>
                   <input type="month" class="rounded" max="{{ $month }}" value="{{ $month }}"
                       onchange="changemonth(this.value)">
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
           {{-- <x-variants-chart idvalue="revenue" :month="$month" /> --}}


           <livewire:variants-chart :getmonth="$month" demo="jahdgdsjhgds" />
           {{-- <x-revenve-chart :month="$month" /> --}}
           <p>{{ $month }}</p>
           @livewire('revenve-chart', ['month' => $month])




       </div>


       <script>
           function changemonth(month) {

               var postData = {
                   _token: "{{ csrf_token() }}",
                   month: month
               }

               $.ajax({
                   type: 'POST',
                   url: '/changemonth',
                   data: postData,
                   success: function(response) {

                       let variants_names = response[1][1];
                       let variants_counts = response[1][0];

                       let dates = response[2][0];
                       let total_rental_price = response[2][1];

                       let total_revenve = response[3][1];
                       let revenve = response[3][0];

                       variantchart.data.labels = variants_names;
                       variantchart.data.datasets[0].data = variants_counts;

                       revenvechart.data.labels = dates;
                       revenvechart.data.datasets[0].data = total_rental_price;


                       Revenvedoughnut.data.datasets[0].data = revenve;

                       let totalrevenve = document.getElementById('totalrevenve');
                       totalrevenve.innerText = "Total Revenve: " + total_revenve;



                       revenvechart.update();
                       variantchart.update();
                       Revenvedoughnut.update();

                   },
                   error: function(xhr, status, error) {
                       // Handle the error
                       alert(error)
                   }
               });

           }
       </script>





   </div>


   {{--  --}}
