@extends('layout.template')
@section('container')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 font-weight-bold text-gray-800"><i class="fa fa-tachometer" aria-hidden="true"></i> Halaman Beranda</h1>
    </div>
    <link rel="stylesheet" href="css/livechart.css">
    <div class="card">
        <div class="card-body">
            <div class="beranda">
                {{-- Pembungkus Card --}}
                <div class="row mt-3">
                    {{-- <div class="col">
                        <div class="card">
                            <div class="card-body text-white bg-warning">
                                <h5 align="center" class="card-title">Total Serangan IP</h5>
                                <h2 align="center">{{ $serangan }}</h2>
                            </div>
                        </div>
                    </div> --}}

                    <div class="col-xl-4 col-md-6 mb-4">
                        <div class="card border-left-warning shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                            Total Serangan IP</div>
                                        <div class="h1 mb-0 font-weight-bold text-gray-800">{{ $serangan }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-bug fa-3x text-yellow-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-md-6 mb-4">
                        <div class="card border-left-warning shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                            Serangan TCP</div>
                                        <div class="h1 mb-0 font-weight-bold text-gray-800">{{ $TCP }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-server fa-3x text-yellow-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="col">
                        <div class="card">
                            <div class="card-body text-white bg-warning">
                                <h5 align="center" class="card-title">Serangan TCP</h5>
                                <h2 align="center">{{ $TCP }}</h2>
                            </div>
                        </div>
                    </div> --}}

                    <div class="col-xl-4 col-md-6 mb-4">
                        <div class="card border-left-warning shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                            Serangan ICMP</div>
                                        <div class="h1 mb-0 font-weight-bold text-gray-800">{{ $ICMP }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-server fa-3x text-yellow-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="col">
                        <div class="card">
                            <div class="card-body text-white bg-warning">
                                <h5 align="center" class="card-title">Serangan ICMP</h5>
                                <h2 align="center">{{ $ICMP }}</h2>
                            </div>
                        </div>
                    </div> --}}
                </div>
                {{-- End Pembungkus Card --}}
            </div>
        </div>
    </div>
{{-- Live Chart CPU Memory --}}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <figure class="highcharts-figure">
                        <div id="container-cpu"></div>
                        <p class="highcharts-description">

                        </p>
                    </figure>
                </div>
                <div class="col-md-6">
                    <figure class="highcharts-figure">
                        <div id="container-memory"></div>
                        <p class="highcharts-description">

                        </p>
                    </figure>
                </div>
            </div>
        </div>
    </div>
{{-- END Live Chart CPU Memory --}}
    <div class="row mt-4 mb-4">
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            {{-- mychart TCP --}}
                            <div>
                                <canvas id="myChart"></canvas>
                            </div>
                            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                            <script>
                                const labels2 = [
                                    'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Juni', 'July', 'Aug', 'Sept', 'Oct', 'Nov', 'Des',
                                ];

                                const data = {
                                    labels: labels2,
                                    datasets: [{
                                        label: 'SERANGAN TCP',
                                        backgroundColor: 'rgb(255,165,0)',
                                        borderColor: 'rgb(255,165,0)',
                                        data: [20, 40, 60, 80, 100],
                                    }]
                                };

                                const config = {
                                    type: 'line',
                                    data: data,
                                    options: {}
                                };
                                const myChart = new Chart(
                                    document.getElementById('myChart'),
                                    config
                                );
                            </script>
                            {{-- end mychart TCP --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            {{-- mychart ICMP --}}
                            <div>
                                <canvas id="myChart2"></canvas>
                            </div>
                            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                            <script>
                                const labels = [
                                    'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Juni', 'July', 'Aug', 'Sept', 'Oct', 'Nov', 'Des',
                                ];
                                const data2 = {
                                    labels: labels,
                                    datasets: [{
                                        label: 'SERANGAN ICMP',
                                        backgroundColor: 'rgb(255,165,0)',
                                        borderColor: 'rgb(255,165,0)',
                                        data: [20, 40, 60, 80, 100],
                                    }]
                                };

                                const config2 = {
                                    type: 'line',
                                    data: data2,
                                    options: {}
                                };
                                const myChart2 = new Chart(
                                    document.getElementById('myChart2'),
                                    config2
                                );
                            </script>
                            {{-- end mychart ICMP --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
{{-- CPU data --}}
<script>
    var cpu = Highcharts.chart('container-cpu', {
    chart: {
        type: 'spline',
        animation: Highcharts.svg, // don't animate in old IE
        marginRight: 10,
        events: {
            load: function () {

                // set up the updating of the chart each second

                setInterval(function () {
                    getsensor();
                }, 3000);
            }
        }
    },

    time: {
        useUTC: false
    },

    title: {
        text: 'CPU'
    },

    accessibility: {
        announceNewData: {
            enabled: true,
            minAnnounceInterval: 15000,
            announcementFormatter: function (allSeries, newSeries, newPoint) {
                if (newPoint) {
                    return 'New point added. Value: ' + newPoint.y;
                }
                return false;
            }
        }
    },

    xAxis: {
        type: 'datetime',
        tickPixelInterval: 150
    },

    yAxis: {
        title: {
            text: 'Penggunaan CPU'
        },
        plotLines: [{
            value: 0,
            width: 1,
            color: '#808080'
        }]
    },

    tooltip: {
        headerFormat: '<b>{series.name}</b><br/>',
        pointFormat: '{point.x:%Y-%m-%d %H:%M:%S}<br/>{point.y:.2f}'
    },

    legend: {
        enabled: false
    },

    exporting: {
        enabled: false
    },

    credits: {
        enabled: false
    },

    series: [{
        name: 'Data CPU',
        data: [
            @foreach ($sensor as $data)
                {
                    x: (new Date()).getTime() + {{ $loop->iteration }} * 1000,
                    y: {{ $data->cpu }}
                },
            @endforeach
        ]
    }]
});

function getsensor() {
    $.ajax({
        url: "{{ route('getconserver') }}",
        type: 'get',
        success: function(response) {

            console.log(response[0]);

            var cpuseries = cpu.series[0];
            var x = (new Date()).getTime(), // current time
                y = parseFloat(response[0]);
            cpuseries.addPoint([x, y], true, true);

        }
    })
}
</script>
{{-- End CPU --}}

{{-- Memory --}}
<script>
    var memory = Highcharts.chart('container-memory', {
    chart: {
        type: 'spline',
        animation: Highcharts.svg, // don't animate in old IE
        marginRight: 10,
        events: {
            load: function () {

                // set up the updating of the chart each second

                setInterval(function () {
                    getmemory();
                }, 3000);
            }
        }
    },

    time: {
        useUTC: false
    },

    title: {
        text: 'Memory'
    },

    accessibility: {
        announceNewData: {
            enabled: true,
            minAnnounceInterval: 15000,
            announcementFormatter: function (allSeries, newSeries, newPoint) {
                if (newPoint) {
                    return 'New point added. Value: ' + newPoint.y;
                }
                return false;
            }
        }
    },

    xAxis: {
        type: 'datetime',
        tickPixelInterval: 150
    },

    yAxis: {
        title: {
            text: 'Penggunaan Memory'
        },
        plotLines: [{
            value: 0,
            width: 1,
            color: '#808080'
        }]
    },

    tooltip: {
        headerFormat: '<b>{series.name}</b><br/>',
        pointFormat: '{point.x:%Y-%m-%d %H:%M:%S}<br/>{point.y:.2f}'
    },

    legend: {
        enabled: false
    },

    exporting: {
        enabled: false
    },

    credits: {
        enabled: false
    },

    series: [{
        name: 'Data Memory',
        data: [
            @foreach ($sensor as $data)
                {
                    x: (new Date()).getTime() + {{ $loop->iteration }} * 1000,
                    y: {{ $data->memory }}
                },
            @endforeach
        ]
    }]
});

function getmemory() {
    $.ajax({
        url: "{{ route('getconserver') }}",
        type: 'get',
        success: function(response) {

            console.log(response[1]);

            var memoryseries = memory.series[0];
            var x = (new Date()).getTime(), // current time
                y = parseFloat(response[1]);
            memoryseries.addPoint([x, y], true, true);

        }
    })
}

</script>
{{-- Memory --}}
@endsection
