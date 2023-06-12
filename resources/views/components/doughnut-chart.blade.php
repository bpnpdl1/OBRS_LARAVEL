<div class="scale-95">
    <!-- Simplicity is the ultimate sophistication. - Leonardo da Vinci -->
    <div class="bg-white rounded shadow ">

        <p class="text-center">Total Revenve: {{ $totalcounts }}</p>
        {{ $month }}

        <div>
            <canvas id="{{ $idvalue }}" style="width: 100%;height: 100%;"></canvas>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const {{ $idvalue }} = document.getElementById("{{ $idvalue }}");

        new Chart({{ $idvalue }}, {
            type: 'doughnut',
            data: {
                labels: [
                    "Credit Transactions",
                    'Cash Transactions',
                    'Online Transactions'
                ],
                datasets: [{

                    data: @json($counts),
                    backgroundColor: [
                        '#000000',
                        '#A9A9A9',
                        '#708090'
                    ],
                    borderWidth: 0.5,
                    hoverOffset: 30
                }]
            },
        });
    </script>




</div>
