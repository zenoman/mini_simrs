@extends('layouts.admin_layout')

@section('content')
    @extends('layouts.admin_layout')
@section('head-title')
    Data Billing
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="card-title">Billing pasien</div>
        </div>
        <div class="card-body">
            <div class="row">
                <table class="table table-bordered table-striped">
                    <thead>
                        <th>No</th>
                        <th>No Register</th>
                        <th>No Billing</th>
                        <th>No Rekam Medis</th>
                        <th>Nama</th>
                        <th>Billing</th>
                        <th>Opsi</th>
                    </thead>
                    <tbody>
                        @if (count($kunjungan) === 0)
                            <tr>
                                <td colspan="9" align="center">No data</td>
                            </tr>
                        @else
                            @foreach ($kunjungan as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->no_registrasi }}</td>
                                    <td>{{ $item->no_transaksi }}</td>
                                    <td>{{ $item->no_rm }}</td>
                                    <td>{{ $item->nama_pasien }}</td>
                                    <td>{{ number_format($item->total_harga, 0, ',', '.') }} </td>
                                    <td>
                                        @if ($item->no_transaksi!="")
                                            <a href="/billing/detail-billing/{{$item->no_transaksi}}" class="btn mr-2 btn-sm btn-primary">Detail</a>
                                            <a href="/billing/hapus-billing/{{$item->no_transaksi}}" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></a>
                                        @else
                                            Belum Terbilling
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
                <div class="mb-2">
                    {{ $kunjungan->links() }}
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
@section('js')
    <script>
        $('.sl2').select2({
            minimumInputLength: 1,
            ajax: {
                url: "/cari-pasien",
                data: function(params) {
                    var query = {
                        search: params.term,
                    }
                    return query;
                },
            }
        })
    </script>
@endsection

@endsection
