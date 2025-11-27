@extends('layouts.admin_layout')
@section('head-title')
    Data Pasien
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="card-title">Data Pasien</div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12 mb-4">
                    <form action="simpan-pasien" method="post">
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
                                    <label for="">Nama <span class="text-danger">*</span></label>
                                    <input name="nama" required type="text" class="form-control"
                                        placeholder="isikan nama">
                                </div>
                            </div>
                            <div class="col-12 col-md-3 col-lg-3">
                                <div class="form-group">
                                    <label for="">Tgl. Lahir <span class="text-danger">*</span></label>
                                    <input name="tanggal_lahir" required type="text" class="form-control"
                                        placeholder="isikan Tgl Lahir">
                                </div>
                            </div>
                            <div class="col-12 col-md-3 col-lg-3">
                                <div class="form-group">
                                    <label for="">Jenis Kelamin</label>
                                    <select name="jenis_kelamin" class="form-control" id="">
                                        <option value="L">Laki-Laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-md-3 col-lg-3">
                                <div class="form-group">
                                    <label for="">Alamat <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <input required name="alamat" type="text" class="form-control"
                                            placeholder="isikan Alamat">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary">Add</button>
                                        </div>
                                    </div>
                                </div>
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
                                <div class="card-title">Cari Pasien</div>
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
                                <th>No Rekam Medis</th>
                                <th>Nama</th>
                                <th>Tanggal Lahir</th>
                                <th>Jenis Kelamin</th>
                                <th>Alamat</th>
                                <th>Opsi</th>
                            </thead>
                            <tbody>
                                @if (count($data) == 0)
                                    <td colspan="7" align="center">
                                        No data
                                    </td>
                                @else
                                    @foreach ($data as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $item->no_rm }}</td>
                                            <td>{{ $item->nama_pasien }}</td>
                                            <td>{{ $item->tanggal_lahir }}</td>
                                            <td>{{ $item->jenis_kelamin }}</td>
                                            <td>{{ $item->alamat }}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-primary btn-sm"
                                                        data-bs-toggle="dropdown" aria-expanded="true">
                                                        #
                                                    </button>
                                                    <ul class="dropdown-menu" data-popper-placement="bottom-start">
                                                        <li><a class="dropdown-item" href="/pasien/edit-pasien/{{ $item->id }}">Edit</a></li>
                                                        <li><a class="dropdown-item" href="/pasien/delete-pasien/{{ $item->id }}">Delete</a></li>
                                                        <li><a class="dropdown-item" href="/pasien/detail-pasien/{{ $item->no_rm }}">Detail Pasien</a></li>
                                                    </ul>
                                                </div>
                                            </td>
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
    </div>
    </div>
@endsection
@section('js')
    <script>
        $('.sl').flatpickr()
    </script>
@endsection
