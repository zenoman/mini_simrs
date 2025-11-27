@extends('layouts.admin_layout')
@section('head-title')
    Detail Pasien
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="card-title">Data Pasien</div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-lg-4 col-md-4">
                    <div class="form-group">
                        <label for="">Nomor Rekam Medis</label>
                        {{ $data->no_rm }}
                    </div>
                    <div class="form-group">
                        <label for="">Nama Pasien</label>
                        {{ $data->nama_pasien }}
                    </div>
                    <div class="form-group">
                        <label for="">Alamat</label>
                            {{ $data->alamat }}
                    </div>
                    <div class="form-group">
                        <label for="">Tanggal Lahir</label>
                            {{ $data->tanggal_lahir }}
                    </div>
                    <div class="form-group">
                        <label for="">Jenis Kelamin</label>
                            {{ $data->jenis_kelamin }}
                    </div>
                </div>
                <div class="col-12 col-lg-8 col-md-8">
                    <p>Riwayat Kunjungan</p>
                    <div class="row">
                        <div class="col-12">
                            <table class="table table-bordered table-striped">
                            <thead>
                                <th>No</th>
                                <th>No Register</th>
                                <th>No Rekam Medis</th>
                                <th>Nama</th>
                                <th>Tanggal Lahir</th>
                                <th>Jenis Kelamin</th>
                                <th>Dokter</th>
                                <th>Poli</th>
                            </thead>
                            <tbody>
                               @if (count($kunjungan)===0)
                                   <tr>
                                    <td colspan="9" align="center">No data</td>
                                   </tr>
                               @else
                                   @foreach ($kunjungan as $item)
                                       <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->no_registrasi }}</td>
                                            <td>{{ $item->no_rm }}</td>
                                            <td>{{ $item->nama_pasien }}</td>
                                            <td>{{ $item->tanggal_lahir }}</td>
                                            <td>{{ $item->jenis_kelamin }}</td>
                                            <td>{{ $item->nama_dokter }}</td>
                                            <td>{{ $item->nama_poli }}</td>
                                       </tr>
                                   @endforeach
                               @endif
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
@endsection
