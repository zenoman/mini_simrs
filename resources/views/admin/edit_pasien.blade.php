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
            <form action="/pasien/update-pasien/{{$data->id}}" method="post">
                @csrf
                {{-- @foreach ($data as $item) --}}
                    <input type="hidden" name="id_pasien" value="{{ $data->no_rm }}">
                    <div class="form-group">
                        <label for="">Nama Pasien</label>
                        <input type="text" name="nama" class="form-control" value="{{ $data->nama_pasien }}">
                    </div>
                    <div class="form-group">
                        <label for="">Alamat</label>
                        <input type="text" name="alamat" class="form-control" value="{{ $data->alamat }}">
                    </div>
                    <div class="form-group">
                        <label for="">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" class="form-control" value="{{ $data->tanggal_lahir }}">
                    </div>
                    <div class="form-group">
                        <label for="">Jenis Kelamin</label>
                        <input type="text" name="jenis_kelamin" class="form-control" value="{{ $data->jenis_kelamin }}">
                    </div>
                    <div class="form-group mt-2">
                        <button type="submit" class="btn btn-primary float-right">Simpan</button>
                    </div>
                {{-- @endforeach --}}
            </form>
        </div>
    </div>
    </div>
@endsection
