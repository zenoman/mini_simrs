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
                <div class="col-12 col-lg-12 col-md-12">
                    <p> Detail Billing</p>
                    <div class="row">
                        <div class="col-12">
                            <table class="table table-bordered table-striped">
                            <thead>
                                <th>No</th>
                                <th>No Transaksi</th>
                                <th>Tindakan</th>
                                <th>Harga</th>
                                <th>Jumlah</th>
                                <th>Total</th>
                            </thead>
                            <tbody>
                               @if (count($data)===0)
                                   <tr>
                                    <td colspan="9" align="center">No data</td>
                                   </tr>
                               @else
                                   @foreach ($data as $item)
                                       <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->no_transaksi }}</td>
                                            <td>{{ $item->nama_tindakan }}</td>
                                            <td>{{ $item->harga }}</td>
                                            <td>{{ $item->qty }}</td>
                                            <td>{{ $item->subtotal }}</td>
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
