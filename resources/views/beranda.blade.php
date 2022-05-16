@extends('layout.main')
@section('container')
            <div class="beranda">
                <h1 style="color: black">Halaman Beranda</h1>
                <hr>

                {{-- Pembungkus Card --}}
                <div class="row mt-3">
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
            </div>
@endsection