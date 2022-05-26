@extends('layout.main')
@section('container')
            <div class="beranda">
                <h1 style="color: black">Halaman Beranda</h1>
                <hr>

                {{-- Pembungkus Card --}}
                <div class="row mt-3" >
                    <div class="col">
                      <div class="card">
                        <div class="card-body">
                          <h5 align="center" class="card-title">Total Serangan</h5>
                          <h2 align="center">0</h2>
                        </div>
                      </div>
                    </div>

                    <div class="col">
                      <div class="card">
                        <div class="card-body">
                          <h5 align="center" class="card-title">Serangan SSH</h5>
                          <h2 align="center">0</h2>
                        </div>
                      </div>
                    </div>

                    <div class="col">
                        <div class="card">
                          <div class="card-body">
                            <h5 align="center" class="card-title">Serangan Telnet</h5>
                            <h2 align="center">0</h2>
                          </div>
                        </div>
                      </div>
                  </div>
                  {{-- End Pembungkus Card --}}


                {{-- <div class="row mt 3">
                    <div>
                        <canvas id="myChart"></canvas>
                    </div>
                    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                    <script>
                        const labels = [
                          'Januari',
                          'Februari',
                          'Maret',
                          'April',
                          'Mei',
                          'Juni',
                          'Juli',
                          'Agustus',
                          'Septermber',
                          'Oktober',
                          'November',
                          'Desember',
                        ];

                        const data = {
                          labels: labels,
                          datasets: [{
                            label: 'SSH',
                            backgroundColor: 'rgb(255,165,0)',
                            borderColor: 'rgb(255,165,0)',
                            data: [0, 10, 5, 2, 20, 30, 45],
                          }]
                        };

                        const config = {
                          type: 'line',
                          data: data,
                          options: {}
                        };
                         </script>

                        <script>
                            const myChart = new Chart(
                            document.getElementById('myChart'),
                            config
                            );
                        </script>
                </div> --}}

            </div>
@endsection
