<div>
    <p>{{ $month }} jsfdkj</p>

    <canvas id="variantcounts"></canvas>

    <script>
        // Data for the chart
        const labels = @json($variant_names);
        const data = @json($variant_counts);

        console.log(data);

        // Get the chart canvas element
        const variantcounts = document.getElementById('variantcounts').getContext('2d');

        // Create the bar chart
        var variantchart = new Chart(variantcounts, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Variants Rent Counts',
                    data: data,
                    backgroundColor: 'rgba(75, 192, 192, 0.8)', // Set the bar color
                    borderColor: 'rgba(75, 192, 192, 1)', // Set the border color
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

</div>
