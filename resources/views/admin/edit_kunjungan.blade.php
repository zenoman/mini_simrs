@extends('layouts.admin_layout')
@section('head-title')
   Edit  Register Pasien
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="card-title">Edit Registrasi pasien</div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12 mb-4">
                    <form action="/kunjungan/update-kunjungan" method="post">
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
                                    <input  type="hidden" name="id_kunjungan" value="{{$data->id_kunjungan}}">
                                    <input readonly value="{{$data->no_rm}}" name="no_rm" required type="text" class="form-control"
                                        placeholder="isikan Norekam Medis">
                                </div>
                            </div>
                            <div class="col-12 col-md-3 col-lg-3">
                                <div class="form-group">
                                    <label for="">Nama <span class="text-danger">*</span></label>
                                    <input readonly value="{{$data->nama_pasien}}"  name="nama" required type="text" class="form-control"
                                        placeholder="isikan nama">
                                </div>
                            </div>
                            <div class="col-12 col-md-3 col-lg-3">
                                <div class="form-group">
                                    <label for="">Tgl. Lahir <span class="text-danger">*</span></label>
                                    <input readonly value="{{$data->tanggal_lahir}}"  name="tanggal_lahir" required type="text" class="form-control sl"
                                        placeholder="isikan Tgl Lahir">
                                </div>
                            </div>
                            <div class="col-12 col-md-3 col-lg-3">
                                <div class="form-group">
                                    <label for="">Jenis Kelamin</label>
                                    <select disabled name="" id="" class="form-control">
                                        <option value="{{$data->jenis_kelamin}}" selected>{{$data->jenis_kelamin}}</option>
                                        <option value="L">Laki-Laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-md-3 col-lg-3">
                                <div class="form-group">
                                    <label for="">Alamat <span class="text-danger">*</span></label>
                                    <input readonly  value="{{$data->alamat}}"" required name="alamat" type="text" class="form-control"
                                        placeholder="isikan Alamat">
                                </div>
                            </div>
                            <div class="col-12">
                                <hr>
                            </div>
                            <div class="col-12 col-md-3 col-lg-3">
                                <label for="">Poli </label>
                                <select class="form-control" name="id_poli" id="">
                                    <option value="{{$data->id_poli}}">{{$data->nama_poli}}</option>
                                    @foreach ($poli as $item)
                                        <option value="{{$item->kode_poli}}">{{$item->nama_poli}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 col-md-3 col-lg-3">
                                <label for="">Dokter </label>
                                <select class="form-control" name="id_dokter" id="id_dokter">
                                    <option value="{{$data->kode_dokter}}">{{$data->nama_dokter}}</option>
                                    @foreach ($dokter as $item)
                                        <option value="{{$item->kode_dokter}}">{{$item->nama_dokter}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 col-md-3 col-lg-3">
                                <label for="">Penjamin </label>
                                <select class="form-control" name="id_penjamin" id="">
                                    <option value="{{$data->penjamin_id}}">{{$data->penjamin}}</option>
                                    @foreach ($penjamin as $item)
                                        <option value="{{$item->id_penjamin}}">{{$item->penjamin}}</option>
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
                                    Update Register Pasien
                                </button>
                            </div>
                        </div>
                    </form>
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
            ajax:{
                url: "/cari-pasien",
                data: function (params) {
                    var query = {
                        search: params.term,
                    }
                    return query;
                },
            }
        })
    </script>
@endsection
