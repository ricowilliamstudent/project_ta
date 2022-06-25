@extends('layout.template')

@section('container')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 font-weight-bold text-gray-800"><i class="fa fa-bell" aria-hidden="true"></i> Halaman Iptables</h1>
    </div>
    <div class="card">
        <div class="notifikasi">
            {{-- Content --}}
            <div class="mt-3">
                <table id="myTable" class="table table-bordered">
                    <thead style="text-align: center">
                        <td><b>No.</td>
                        <td><b>Sumber IP</td>
                        <td><b>Waktu</td>
                        <td><b>Status</td>
                        <td><b>Tipe</td>
                        <td><b>Aksi</td>
                    </thead>
                    <tbody style="text-align: center">
                        @foreach ($iptables as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->sumberip }}</td>
                                <td>{{\Carbon\Carbon::parse($item->waktu)->format('d-m-Y H:m:s') }}</td>
                                <td>{{ $item->status }}</td>
                                <td>{{ $item->tipe }}</td>
                                <td>
                                    <a class="btn btn-success @if($item->status == 'accept')disabled @endif" href="/iptables/accept/{{ $item->sumberip }}/{{str_replace(' ','.',$item->waktu)}}/{{ $item->tipe }}">Accept</a>
                                    <a class="btn btn-warning @if($item->status == 'reject')disabled @endif"  href="/iptables/reject/{{ $item->sumberip }}/{{str_replace(' ','.',$item->waktu)}}/{{ $item->tipe }}">Reject</a>
                                    <a class="btn btn-danger @if($item->status == 'drop')disabled @endif" href="/iptables/drop/{{ $item->sumberip }}/{{str_replace(' ','.',$item->waktu)}}/{{ $item->tipe }}">Drop</a>
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
                $('#myTable').DataTable( {
                    "columnDefs":[
                        {"searchable": false,
                        "targets": 5,

                    }
                ]
                } );
            });
        </script>
    @endpush
