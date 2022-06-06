@extends('layout.main')

@section('container')
    <div class="card mt-4 ml-4 p-4 mb-4">
        <div class="log_serangan">
            <h1>Halaman Log Serangan</h1>
            <hr>

            {{-- Content --}}
            <div class="mt-3">
                <table id="myTable" class="table table-bordered">
                    <thead style="text-align: center">
                        <td><b>No.</td>
                        <td><b>Sumber IP</td>
                        <td><b>Waktu</td>
                        <td><b>Pesan</td>
                        <td><b>Aksi</td>
                    </thead>
                    <tbody style="text-align: center">
                        @foreach ($log as $key => $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item[2] }}</td>
                                <td>{{ $item[0] }}</td>
                                <td>{{ $item[1] }}</td>
                                <td>
                                    <button class="btn btn-success">Accept</button>
                                    <button class="btn btn-warning">Reject</button>
                                    <button class="btn btn-danger">Drop</button>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            {{-- End Content --}}
        </div>
    @endsection

    @push('js')
        <script>
            $(document).ready(function() {
                $('#myTable').DataTable();
            });
        </script>
    @endpush
