@extends('layout.main')

@section('container')
    <div class="notifikasi">
        <h1>Halaman Notifikasi</h1>
        <hr>

        {{-- Content --}}
        <div class="mt-3">
            <table class="table table-bordered">
                <thead style="text-align: center">
                    <td><b>No.</td>
                    <td><b>Sumber IP</td>
                    <td><b>Status Notifikasi</td>
                    <td><b>Waktu Pengiriman</td>
                </thead>
                <tbody style="text-align: center">
                    <tr>
                        <td>1</td>
                        <td>192.168.0.101</td>
                        <td><span class="badge badge-success">Terkirim</span></td>
                        <td>2022-03-30 14.28.23</td>
                    </tr>

                    <tr>
                        <td>2</td>
                        <td>192.168.1.102</td>
                        <td><span class="badge badge-success">Terkirim</span></td>
                        <td>2022-04-05 15.28.23</td>
                    </tr>

                    <tr>
                        <td>3</td>
                        <td>192.168.2.103</td>
                        <td><span class="badge badge-success">Terkirim</span></td>
                        <td>2022-04-04 16.30.26</td>
                    </tr>
                </tbody>
            </table>
        </div>
        {{-- End Content --}}
    </div>
@endsection