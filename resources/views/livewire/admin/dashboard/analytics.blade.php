
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="w-full" style="height:50%;">
                    <div class="px-10" id="chart">

                    </div>
                </div>
            </div>
        </div>
    </div>


@push('js')
<script>
    var options = {
        chart: {
            type: 'line',
            height:'280px',
        },
        series: [{
            name: 'sales',
            data: @json($subscribers)
        }],
        xaxis: {
            categories: @json($days)
        }
    }

    var chart = new ApexCharts(document.querySelector("#chart"), options);

    chart.render();
</script>
@endpush
