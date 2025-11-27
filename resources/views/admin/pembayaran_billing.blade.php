@extends('layouts.admin_layout')
@section('head-title')
    Pembayaran
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="card-title">Pembayaran</div>
        </div>
        <div class="card-body">
            <form action="/billing/simpan-billing" method="post">
                @csrf
                {{-- @foreach ($data as $item) --}}
                    <div class="form-group">
                        <label for="">Namor rekam medis</label>
                        <input type="text" class="form-control" readonly name="id_pasien" value="{{ $data->no_rm }}">
                    </div>
                    <div class="form-group">
                        <label for="">Nama Pasien</label>
                        <input type="text" name="nama" class="form-control" value="{{ $data->nama_pasien }}">
                    </div>
                    <div class="form-group">
                        <label for="">No Register</label>
                        <input type="text" name="no_register" class="form-control" value="{{ $data->no_registrasi }}">
                    </div>
                    <div class="form-group">
                        <label for="">Tindakan</label>
                        <input type="text" name="tindakan" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label for="">Harga</label>
                        <input type="number" id="harga" name="harga" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label for="">qty</label>
                        <input type="number" value="1" id="qty" name="qty" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label for="">Total</label>
                        <input type="text" value="0" readonly name="total" id="total" class="form-control" >
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
@section('js')
    <script>
        $("#harga, #qty").on('keyup',function(){
            var harga = $("#harga").val();
            var qty = $("#qty").val();
            var total = harga * qty;
            $("#total").val(total);
        })
    </script>
@endsection
