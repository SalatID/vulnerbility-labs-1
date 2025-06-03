@extends('index')

@section('title','Dashboard')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <canvas id="myAreaChart"></canvas>
            </div>
           
        </div>
    </div>
    @push('script')
        <script src="{{asset('template')}}/js/demo/chart-area-demo.js"></script>

        <script>
            function updateChart(labels, data) {
                console.log('Updating chart with labels:', labels, 'and data:', data);
                console.log('Current chart instance:', myLineChart);
                if (typeof myLineChart !== 'undefined') {
                    myLineChart.data.labels = labels;
                    myLineChart.data.datasets.forEach((dataset, i) => {
                        dataset.data = data[i];
                    });
                    myLineChart.update();
                }
            }
            const end_date = new Date();
            const start_date = new Date(end_date.getFullYear(), end_date.getMonth(), 1);

            fetch(`/api/dashboard-summary?start_date=${start_date.toISOString().slice(0,10)}&end_date=${end_date.toISOString().slice(0,10)}`)
            .then(response => response.json())
            .then(result => {
                // Assuming result = { labels: [...], data: [[...], [...], ...] }
                const labels = result.map(item => item.transaction_date);
                const data = [result.map(item => item.total)];
                updateChart(labels, data);
            })
            .catch(error => {
                console.error('Error fetching dashboard summary:', error);
            });
        
        </script>
    @endpush
    
@endsection