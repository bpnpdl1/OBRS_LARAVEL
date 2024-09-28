<div>
    <!-- Google Charts Loader -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <!-- Chart Container -->
    <div id="chart_div"></div>

    <script>
        document.addEventListener('livewire:load', function() {
            // Load Google Charts Library
            google.charts.load('current', {
                'packages': ['gantt']
            });

            // Listen for the 'show-gantt-chart' event emitted from Livewire
            window.addEventListener('show-gantt-chart', function(event) {
                drawChart(event.detail.ganttData);
            });

            // Function to Draw Gantt Chart
            function drawChart(ganttData) {
                // Ensure Gantt data is available
                if (!ganttData) return;

                // Initialize Google DataTable
                var data = new google.visualization.DataTable();
                data.addColumn('string', 'Task ID');
                data.addColumn('string', 'Task Name');
                data.addColumn('date', 'Start Date');
                data.addColumn('date', 'End Date');
                data.addColumn('number', 'Duration');
                data.addColumn('number', 'Percent Complete');
                data.addColumn('string', 'Dependencies');

                // Parse the Gantt data for Google Charts
                var transformedData = ganttData.map(item => [
                    item[0], // Task ID (action)
                    item[1], // Task Name or Description
                    new Date(item[2]), // Start Date
                    new Date(item[3]), // End Date
                    item[4], // Duration (null in this case)
                    item[5], // Percent Complete
                    item[6] // Dependencies (null in this case)
                ]);

                // Add rows to the chart
                data.addRows(transformedData);

                // Chart options
                var options = {
                    height: 400,
                    width: 800,
                };

                // Render the chart in the specified div
                var chart = new google.visualization.Gantt(document.getElementById('chart_div'));
                chart.draw(data, options);
            }
        });
    </script>
</div>
