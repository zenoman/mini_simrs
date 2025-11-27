@extends('layouts.admin_layout')
@section('head-title')
    Register Pasien
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="card-title">Registrasi pasien</div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12 mb-4">
                    <form action="/kunjungan/simpan-kunjungan" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                @session('success')
                                    <div class="alert alert-success" role="alert">
                                        {{ $value }}
                                    </div>
                                @endsession
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </div>
                            <div class="col-12 col-md-3 col-lg-3">
                                <div class="form-group">
                                    <label for="">No Rekam Medis <span class="text-danger">*</span></label>
                                    <input name="no_rm" required type="text" class="form-control"
                                        placeholder="isikan Norekam Medis">
                                </div>
                            </div>
                            <div class="col-12 col-md-3 col-lg-3">
                                <div class="form-group">
                                    <label for="">Nama <span class="text-danger">*</span></label>
                                    <input name="nama" required type="text" class="form-control"
                                        placeholder="isikan nama">
                                </div>
                            </div>
                            <div class="col-12 col-md-3 col-lg-3">
                                <div class="form-group">
                                    <label for="">Tgl. Lahir <span class="text-danger">*</span></label>
                                    <input name="tanggal_lahir" required type="text" class="form-control sl"
                                        placeholder="isikan Tgl Lahir">
                                </div>
                            </div>
                            <div class="col-12 col-md-3 col-lg-3">
                                <div class="form-group">
                                    <label for="">Jenis Kelamin</label>
                                    <select name="" id="" class="form-control">
                                        <option value="L">Laki-Laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-md-3 col-lg-3">
                                <div class="form-group">
                                    <label for="">Alamat <span class="text-danger">*</span></label>
                                    <input required name="alamat" type="text" class="form-control"
                                        placeholder="isikan Alamat">
                                </div>
                            </div>
                            <div class="col-12">
                                <hr>
                            </div>
                            <div class="col-12 col-md-3 col-lg-3">
                                <label for="">Poli </label>
                                <select class="form-control" name="id_poli" id="">
                                    @foreach ($poli as $item)
                                        <option value="{{ $item->kode_poli }}">{{ $item->nama_poli }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 col-md-3 col-lg-3">
                                <label for="">Dokter </label>
                                <select class="form-control" name="id_dokter" id="id_dokter">
                                    @foreach ($dokter as $item)
                                        <option value="{{ $item->kode_dokter }}">{{ $item->nama_dokter }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 col-md-3 col-lg-3">
                                <label for="">Penjamin </label>
                                <select class="form-control" name="id_penjamin" id="">
                                    @foreach ($penjamin as $item)
                                        <option value="{{ $item->id_penjamin }}">{{ $item->penjamin }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 col-md-3 col-lg-3">
                                <label for="">Instalasi </label>
                                <select class="form-control" name="instalasi" id="">
                                    <option value="Rawat Jalan">Rawat Jalan</option>
                                    <option value="Rawat Inap">Rawat Inap</option>
                                </select>
                            </div>
                            <div class="col-12 col-md-3 col-lg-3 mt-4">
                                <button type="submit" class="btn btn-primary">
                                    Register Pasien
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-12">
                <div class="row">
                    <div class="col-12 mb-3">
                        <div class="card card-info">
                            <div class="card-header">
                                <div class="card-title">Cari Kunjungan</div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 col-md-3 col-lg-3">
                                        <form method="get">
                                            @csrf
                                            <div class="form-group">
                                                <label for="">Cari Pasien</label>
                                                <div class="input-group">
                                                    <input type="text" name="cari" class="form-control"
                                                        placeholder="cari Nama / NO RM / Alamat">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-info"><i class="bi bi-search"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
                                            <td>{{ $item->no_rm }}</td>
                                            <td>{{ $item->nama_pasien }}</td>
                                            <td>{{ $item->tanggal_lahir }}</td>
                                            <td>{{ $item->jenis_kelamin }}</td>
                                            <td>{{ $item->nama_dokter }}</td>
                                            <td>{{ $item->nama_poli }}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-primary btn-sm"
                                                        data-bs-toggle="dropdown" aria-expanded="true">
                                                        #
                                                    </button>
                                                    <ul class="dropdown-menu" data-popper-placement="bottom-start">
                                                        <li><a class="dropdown-item"
                                                                href="/billing/pembayaran/{{ $item->no_registrasi }}">Billing</a>
                                                        </li>
                                                        <li>
                                                            <hr>
                                                        </li>
                                                        @if ($item->id_poli == 'GIGI')
                                                            <li class="dropdown-item">
                                                                <a href="/kunjungan/asesmen-gigi/{{ $item->no_registrasi }}">Asesmen
                                                                    Gigi</a>
                                                            </li>
                                                            <li>
                                                                <hr>
                                                            </li>
                                                        @endif
                                                        <li><a class="dropdown-item"
                                                                href="/kunjungan/edit-kunjungan/{{ $item->id_kunjungan }}">Edit</a>
                                                        </li>
                                                        <li><a class="dropdown-item"
                                                                href="/kunjungan/delete-kunjungan/{{ $item->id_kunjungan }}">Delete</a>
                                                        </li>
                                                        <li><a class="dropdown-item"
                                                                href="/pasien/detail-pasien/{{ $item->no_rm }}">Detail
                                                                Pasien</a></li>
                                                    </ul>
                                                </div>
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
