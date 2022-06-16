@extends('layout.template')

@section('container')
    <div class="sensor">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 font-weight-bold text-gray-800"><i class="fa fa-heartbeat" aria-hidden="true"></i> Halaman Sensor</h1>
        </div>
        <div class="card">
            {{-- Content --}}
            <div class="mt-3">

                <link rel="stylesheet" href="css/sensor.css">
                <div class="form-group highcharts-figure col-12">
                    <div class="row">
                        <div class="col-md-4">
                            <div id="container-cpu" class="chart-container"></div>
                        </div>
                        <div class="col-md-4">
                            <div id="container-memory" class="chart-container"></div>
                        </div>
                        <div class="col-md-4">
                            <div id="container-disk" class="chart-container"></div>
                        </div>
                    </div>
                </div>

                {{-- Tabel --}}
                <table class="table table-bordered" width="600px">
                    <tr align="center">
                        <th width="300"> INFO CPU </th>
                        <th width="300"> INFO MEMORY </th>
                        <th width="300"> INFO DISK </th>
                    </tr>
                    <tr align="left">
                        <td>Processor :<span id="infocpu"></span></td>
                        <td>Memory Tersedia :<span id="infomemory"></span> GB</td>
                        <td>Disk Tersedia :<span id="infodisk"></span>GB</td>
                    </tr>
                    <tr align="left">
                        <td>CPU Cores :<span id="jumlahcore"></span></td>
                        <td>Memory Digunakan :<span id="memoryused"></span>GB</td>
                        <td>Disk Digunakan :<span id="diskdused"></span>GB</td>
                    </tr>
                    <tr align="left">
                        <td>Total Core : <span id="totalcore"></span></td>
                        <td>Total Memory : <span id="totalmemory"></span>GB</td>
                        <td>Total Disk :<span id="totaldisk"></span>GB</td>
                    </tr>
                </table>
                {{-- end tabel --}}

                <script>
                    var gaugeOptions = {
                        chart: {
                            type: 'solidgauge'
                        },

                        title: null,

                        pane: {
                            center: ['50%', '85%'],
                            size: '140%',
                            startAngle: -90,
                            endAngle: 90,
                            background: {
                                backgroundColor: Highcharts.defaultOptions.legend.backgroundColor || '#EEE',
                                innerRadius: '60%',
                                outerRadius: '100%',
                                shape: 'arc'
                            }
                        },

                        exporting: {
                            enabled: false
                        },

                        tooltip: {
                            enabled: false
                        },

                        // the value axis
                        yAxis: {
                            stops: [
                                [0.1, '#55BF3B'], // green
                                [0.5, '#DDDF0D'], // yellow
                                [0.9, '#DF5353'] // red
                            ],
                            lineWidth: 0,
                            tickWidth: 0,
                            minorTickInterval: null,
                            tickAmount: 2,
                            title: {
                                y: -70
                            },
                            labels: {
                                y: 16
                            }
                        },

                        plotOptions: {
                            solidgauge: {
                                dataLabels: {
                                    y: 5,
                                    borderWidth: 0,
                                    useHTML: true
                                }
                            }
                        }
                    };

                    // CPU
                    var chartcpu = Highcharts.chart('container-cpu', Highcharts.merge(gaugeOptions, {
                        yAxis: {
                            min: 0,
                            max: 100,
                            title: {
                                text: 'CPU'
                            }
                        },

                        credits: {
                            enabled: false
                        },

                        series: [{
                            name: 'cpu',
                            data: [0],
                            dataLabels: {
                                format: '<div style="text-align:center">' +
                                    '<span style="font-size:25px">{y}</span><br/>' +
                                    '<span style="font-size:12px;opacity:0.4">%</span>' +
                                    '</div>'
                            },
                            tooltip: {
                                valueSuffix: ' %'
                            }
                        }]

                    }));
                    // End CPU

                    // MEMORY
                    var chartmemory = Highcharts.chart('container-memory', Highcharts.merge(gaugeOptions, {
                        yAxis: {
                            min: 0,
                            max: 100,
                            title: {
                                text: 'MEMORY'
                            }
                        },

                        credits: {
                            enabled: false
                        },

                        series: [{
                            name: 'memory',
                            data: [0],
                            dataLabels: {
                                format: '<div style="text-align:center">' +
                                    '<span style="font-size:25px">{y}</span><br/>' +
                                    '<span style="font-size:12px;opacity:0.4">%</span>' +
                                    '</div>'
                            },
                            tooltip: {
                                valueSuffix: ' %'
                            }
                        }]

                    }));
                    // End Memory
                    // Disk
                    var chartdisk = Highcharts.chart('container-disk', Highcharts.merge(gaugeOptions, {
                        yAxis: {
                            min: 0,
                            max: 100,
                            title: {
                                text: 'DISK'
                            }
                        },

                        credits: {
                            enabled: false
                        },

                        series: [{
                            name: 'disk',
                            data: [0],
                            dataLabels: {
                                format: '<div style="text-align:center">' +
                                    '<span style="font-size:25px">{y}</span><br/>' +
                                    '<span style="font-size:12px;opacity:0.4">%</span>' +
                                    '</div>'
                            },
                            tooltip: {
                                valueSuffix: ' %'
                            }
                        }]

                    }));
                    // End Disk

                    function getsensor() {
                        $.ajax({
                            url: "{{ route('getconserver') }}",
                            type: 'get',
                            success: function(response) {
                                console.log(response);
                                chartcpu.series[0].points[0].update(parseFloat(response[0]));
                                chartmemory.series[0].points[0].update(parseFloat(response[1]));
                                chartdisk.series[0].points[0].update(parseFloat(response[2]));

                                $("#infocpu").text(response[3]);
                                $("#infomemory").text(response[4]);
                                $("#infodisk").text(response[5]);

                                $("#jumlahcore").text(response[6]);
                                $("#memoryused").text(response[7]);
                                $("#diskdused").text(response[8]);

                                $("#totalcore").text(response[9]);
                                $("#totalmemory").text(response[10]);
                                $("#totaldisk").text(response[11]);

                                $("#speedcpu").text(response[12]);

                            }
                        })
                    }
                    setInterval(function() {
                        getsensor();
                    }, 3000);
                </script>
            </div>
        </div>
    </div>
@endsection
