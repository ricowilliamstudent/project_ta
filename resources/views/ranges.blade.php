@extends('layout.template')

@section('container')
    <div class="ranges">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 font-weight-bold text-gray-800"><i class="fa fa-pencil" aria-hidden="true"></i> Halaman Ranges</h1>
        </div>
        <div class="card">

            {{-- Content --}}
            <div class="mt-3">
                <table class="table table-bordered">
                    <thead style="text-align: center">
                        <td><b>No.</td>
                        <td><b>Serangan</td>
                        <td><b>Ringan</td>
                        <td><b>Sedang</td>
                        <td><b>Berat</td>
                        <td><b>Aksi</td>
                    </thead>
                    <tbody style="text-align: center">
                        <tr>
                            <td>1</td>
                            <td>TCP</td>
                            <td>100</td>
                            <td>450</td>
                            <td>1000</td>
                            <td>
                                <button class="btn btn-primary">Ubah</button>
                                <button class="btn btn-danger">Hapus</button>
                            </td>
                        </tr>

                        <tr>
                            <td>2</td>
                            <td>ICMP</td>
                            <td>100</td>
                            <td>350</td>
                            <td>500</td>
                            <td>
                                <button class="btn btn-primary">Ubah</button>
                                <button class="btn btn-danger">Hapus</button>
                            </td>
                        </tr>

                        <tr>
                            <td>3</td>
                            <td>AKSI</td>
                            <td>100</td>
                            <td>150</td>
                            <td>1000</td>
                            <td>
                                <button class="btn btn-primary">Ubah</button>
                                <button class="btn btn-danger">Hapus</button>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
            {{-- end content --}}
        </div>
    </div>
@endsection
