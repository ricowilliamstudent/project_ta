@extends('layout.main')

@section('container')
    <div class="log_serangan">
        <h1>Halaman Log Serangan</h1>
        <hr>

        {{-- Content --}}
        <div class="mt-3">
            <table class="table table-bordered">
                <thead style="text-align: center">
                    <td><b>No.</td>
                    <td><b>Sumber IP</td>
                    <td><b>Waktu</td>
                    <td><b>Aksi</td>
                </thead>
                <tbody style="text-align: center">
                    <tr>
                        <td>1</td>
                        <td>192.168.0.101</td>
                        <td>2022-03-30 14.28.23</td>
                        <td>
                            <button class="btn btn-success">Accept</button>
                            <button class="btn btn-warning">Reject</button>
                            <button class="btn btn-danger">Drop</button>
                        </td>
                    </tr>

                    <tr>
                        <td>2</td>
                        <td>192.168.0.102</td>
                        <td>2022-03-31 15.27.24</td>
                        <td>
                            <button class="btn btn-success">Accept</button>
                            <button class="btn btn-warning">Reject</button>
                            <button class="btn btn-danger">Drop</button>
                        </td>
                    </tr>

                    <tr>
                        <td>3</td>
                        <td>192.168.0.103</td>
                        <td>2022-04-10 12.27.22</td>
                        <td>
                            <button class="btn btn-success">Accept</button>
                            <button class="btn btn-warning">Reject</button>
                            <button class="btn btn-danger">Drop</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        {{-- End Content --}}
    </div>
@endsection
