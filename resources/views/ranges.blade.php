@extends('layout.main')

@section('container')
    <div class="ranges">
        <h1>Halaman Range</h1>
        <hr>

        {{-- Content --}}
        <div class="mt-3">
            <table class="table table-bordered">
                <thead style="text-align: center">
                    <td><b>No.</td>
                    <td><b>Serangan</td>
                    <td><b>Ringan</td>
                    <td><b>Sedang</td>
                    <td><b>Parah</td>
                    <td><b>Aksi</td>
                </thead>
                <tbody style="text-align: center">
                    <tr>
                        <td>1</td>
                        <td>SSH</td>
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
                        <td>TELNET</td>
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
@endsection