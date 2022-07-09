@extends('layout.template')

@section('container')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 font-weight-bold text-gray-800"><i class="fa fa-bug" aria-hidden="true"></i> Halaman Log Serangan</h1>
</div>
<div class="card">
    <div class="card-body">
        <div class="log_serangan">
            @php
                $tipe = "";
            @endphp
            {{-- Content --}}
            <div class="mt-3">
                <table id="myTable" class="table table-bordered">
                    <thead style="text-align: center">
                        <td><b>No.</td>
                        <td><b>Sumber IP</td>
                        <td><b>Waktu</td>
                        <td><b>Tipe</td>
                        <td><b>Aksi</td>
                    </thead>
                    <tbody style="text-align: center">
                        @foreach ($log as $item)
                            @if((!in_array(str_replace(" ", "", $item[2]), $nilai_sumberip)) && (!in_array($item[0], $nilai_waktu)))
                                <tr>
                                    @php
                                        if(str_contains($item[1], 'ICMP')){
                                            $tipe = "ICMP";
                                        }else if(str_contains($item[1], 'TCP')){
                                            $tipe = "TCP";
                                        }else{
                                            $tipe = "Tidak diketahui";
                                        }
                                    @endphp
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item[2] }}</td>
                                    <td>{{ $item[0] }}</td>
                                    <td>{{ $item[1] }}</td>
                                    <td>
                                        <a class="btn btn-success" href="/iptables/accept/{{str_replace(' ','',$item[2])}}/{{str_replace(' ','.',$item[0])}}/{{ $tipe }}">Accept</a>
                                        <a class="btn btn-warning" href="/iptables/reject/{{str_replace(' ','',$item[2])}}/{{str_replace(' ','.',$item[0])}}/{{ $tipe }}">Reject</a>
                                        <a class="btn btn-danger" href="/iptables/drop/{{str_replace(' ','',$item[2])}}/{{str_replace(' ','.',$item[0])}}/{{ $tipe }}">Drop</a>
                                    </td>
                                </tr>
                            @elseif((in_array(str_replace(" ", "", $item[2]), $nilai_sumberip)) && (!in_array($item[0], $nilai_waktu)))
                                <tr>
                                    @php
                                        if(str_contains($item[1], 'ICMP')){
                                            $tipe = "ICMP";
                                        }else if(str_contains($item[1], 'TCP')){
                                            $tipe = "TCP";
                                        }else{
                                            $tipe = "Tidak diketahui";
                                        }
                                    @endphp
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item[2] }}</td>
                                    <td>{{ $item[0] }}</td>
                                    <td>{{ $item[1] }}</td>
                                    <td>
                                        <a class="btn btn-success" href="/iptables/accept/{{str_replace(' ','',$item[2])}}/{{str_replace(' ','.',$item[0])}}/{{ $tipe }}">Accept</a>
                                        <a class="btn btn-warning" href="/iptables/reject/{{str_replace(' ','',$item[2])}}/{{str_replace(' ','.',$item[0])}}/{{ $tipe }}">Reject</a>
                                        <a class="btn btn-danger" href="/iptables/drop/{{str_replace(' ','',$item[2])}}/{{str_replace(' ','.',$item[0])}}/{{ $tipe }}">Drop</a>
                                    </td>
                                </tr>
                            @endif
                        @endforeach

                    </tbody>
                </table>
            </div>
            {{-- End Content --}}
        </div>
    </div>
    @endsection

    @push('js')
        <script>
            $(document).ready(function() {
                $('#myTable').DataTable({
                    order: [[2, 'desc']],
                });
            });
        </script>
    @endpush
