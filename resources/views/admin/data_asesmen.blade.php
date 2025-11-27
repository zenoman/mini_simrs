@extends('layouts.admin_layout')
@section('head-title')
    Data Asesmen Medis
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="card-title">Asesmen pasien</div>
        </div>
        <div class="card-body">
            <div class="row">
                <table class="table table-bordered table-striped">
                    <thead>
                        <th>No</th>
                        <th>No Register</th>
                        <th>Nama</th>
                        <th>Dokter</th>
                        <th>Poliklinik</th>
                        <th>Opsi</th>
                    </thead>
                    <tbody>
                        @if (count($data) === 0)
                            <tr>
                                <td colspan="9" align="center">No data</td>
                            </tr>
                        @else
                            @foreach ($data as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->no_register }}</td>
                                    <td>{{ $item->no_rm }} - {{ $item->nama_pasien }}</td>
                                    <td>{{ $item->nama_dokter }}</td>
                                    <td>{{ $item->nama_poli }}</td>
                                    <td>
                                        <a href="/asesmen/detail-asesmen/{{ $item->no_register }}"
                                            class="btn mr-2 btn-sm btn-primary">Detail</a>
                                        <a href="/asesmen/hapus-asesmen/{{ $item->no_transaksi }}"
                                            class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></a </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
                <div class="mb-2">
                    {{ $data->links() }}
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
