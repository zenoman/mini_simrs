@extends('layouts.layout_biasa')
@section('title')
    Print Asesmen Gigi
@endsection
@section('head-title')
    Print Asesmen Gigi
@endsection
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.23.0/sweetalert2.min.css"
        integrity="sha512-Ivy7sPrd6LPp20adiK3al16GBelPtqswhJnyXuha3kGtmQ1G2qWpjuipfVDaZUwH26b3RDe8x707asEpvxl7iA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        td {
            padding: 4px 6px;
            vertical-align: middle;
            font-size: 14px;
        }

        .page-break {
            page-break-after: always;
        }
    </style>
@endsection
@section('content')
    @php

        $array_index_gigi = [];

        for ($i = 11; $i <= 85; $i++) {
            // if($i!=19||$i!=20||$i!=29||$i!=30||$i!=39||$i!=40||$i!=49)
            $array_index_gigi[$i] = 'Sou';
        }
        // override isi array index gigi yang ada isinya
        foreach ($detail_gambar as $item) {
            $loc_general = (int) $item->pos_loc_general;
            $ket = $item->keterangan;
            $pos = $item->pos;
            $code = $item->code;
            $fill = $pos . ' (' . $code . ')' . ' ' . $ket;
            $array_index_gigi[$loc_general] = $fill;
        }
    @endphp
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-12">
                    <h4 class="text-center">
                        RUMAH SAKIT MINI SIMRS
                    </h4>
                    <p class="text-center">
                        Klinik Gigi dan Mulut
                        Jl. Kesehatan No. 123, Kota Sehat, Indonesia | Telp: (021) 1234567 | Email: info@minisimrs.com
                    </p>
                </div>
                <div class="col-12">
                    <hr>
                </div>
                <div class="col-12">
                    <h4 class="text-center">
                        FORMULIR PEMERIKSAAN ODONTOGRAM
                    </h4>
                </div>
            </div>
            {{-- <div class="card-title"> --}}
            {{-- </div> --}}
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <table class="table table-bordered">
                        <tr>
                            <td colspan="6" class="bg-info">
                                <h4>Identitas Pasien</h4>
                            </td>
                        </tr>
                        <tr>
                            <td><b>Pasien</b></td>
                            <td>{{ $data->no_rm . '-' . $data->nama_pasien }}</td>

                            <td><b>Tanggal</b> Kunjungan</td>
                            <td>{{ $data->tanggal_kunjungan }}</td>
                            <td><b>Dokter</b></td>
                            <td>{{ $data->nama_dokter }}</td>
                        </tr>
                        <tr>
                            <td><b>PoliKlinik</b></td>
                            <td>{{ $data->nama_poli }}</td>
                            <td><b>Penjamin</b></td>
                            <td colspan="3">
                                {{ $data->penjamin . ' (' . $data->no_registrasi . ')' }}
                                <input type="hidden" id="no_registrasi" value="{{ $data->no_registrasi }}">
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Odontogram</div>
                        </div>
                        <div class="card-body">
                            <div class="col-12 mb-3">
                                <div class="row">
                                    <div class="col-6 col-md-6 col-lg-6">
                                        <table class="table table-bordered">
                                            <tbody>
                                                <tr>
                                                    <td>11 [51]</td>
                                                    <td>
                                                        @foreach ($array_index_gigi as $key => $item)
                                                            @if ($key == 11)
                                                                {{ $key }} : {{ $item }} <br>
                                                            @endif
                                                        @endforeach
                                                        @foreach ($array_index_gigi as $key => $item)
                                                            @if ($key == 51)
                                                                {{ $key }} : {{ $item }}
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>12 [52]</td>
                                                    <td>
                                                        @foreach ($array_index_gigi as $key => $item)
                                                            @if ($key == 12)
                                                                {{ $key }} : {{ $item }} <br>
                                                            @endif
                                                        @endforeach
                                                        @foreach ($array_index_gigi as $key => $item)
                                                            @if ($key == 52)
                                                                {{ $key }} : {{ $item }}
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>13 [53]</td>
                                                    <td>
                                                        @foreach ($array_index_gigi as $key => $item)
                                                            @if ($key == 13)
                                                                {{ $key }} : {{ $item }} <br>
                                                            @endif
                                                        @endforeach
                                                        @foreach ($array_index_gigi as $key => $item)
                                                            @if ($key == 53)
                                                                {{ $key }} : {{ $item }}
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>14 [54]</td>
                                                    <td>
                                                        @foreach ($array_index_gigi as $key => $item)
                                                            @if ($key == 14)
                                                                {{ $key }} : {{ $item }} <br>
                                                            @endif
                                                        @endforeach
                                                        @foreach ($array_index_gigi as $key => $item)
                                                            @if ($key == 54)
                                                                {{ $key }} : {{ $item }}
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>15 [55]</td>
                                                    <td>
                                                        @foreach ($array_index_gigi as $key => $item)
                                                            @if ($key == 15)
                                                                {{ $key }} : {{ $item }} <br>
                                                            @endif
                                                        @endforeach
                                                        @foreach ($array_index_gigi as $key => $item)
                                                            @if ($key == 55)
                                                                {{ $key }} : {{ $item }}
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>16</td>
                                                    <td>
                                                        @foreach ($array_index_gigi as $key => $item)
                                                            @if ($key == 16)
                                                                {{ $key }} : {{ $item }}
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>17</td>
                                                    <td>
                                                        @foreach ($array_index_gigi as $key => $item)
                                                            @if ($key == 17)
                                                                {{ $key }} : {{ $item }}
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>18</td>
                                                    <td>
                                                        @foreach ($array_index_gigi as $key => $item)
                                                            @if ($key == 18)
                                                                {{ $key }} : {{ $item }}
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-6 col-md-6 col-lg-6">
                                        <table class="table table-bordered text-end">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        @foreach ($array_index_gigi as $key => $item)
                                                            @if ($key == 61)
                                                                {{ $key }} : {{ $item }} <br>
                                                            @endif
                                                        @endforeach
                                                        @foreach ($array_index_gigi as $key => $item)
                                                            @if ($key == 21)
                                                                {{ $key }} : {{ $item }}
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                    <td>[61] 21</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        @foreach ($array_index_gigi as $key => $item)
                                                            @if ($key == 62)
                                                                {{ $key }} : {{ $item }} <br>
                                                            @endif
                                                        @endforeach
                                                        @foreach ($array_index_gigi as $key => $item)
                                                            @if ($key == 22)
                                                                {{ $key }} : {{ $item }}
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                    <td>[62] 22</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        @foreach ($array_index_gigi as $key => $item)
                                                            @if ($key == 63)
                                                                {{ $key }} : {{ $item }} <br>
                                                            @endif
                                                        @endforeach
                                                        @foreach ($array_index_gigi as $key => $item)
                                                            @if ($key == 23)
                                                                {{ $key }} : {{ $item }}
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                    <td>[63] 23</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        @foreach ($array_index_gigi as $key => $item)
                                                            @if ($key == 64)
                                                                {{ $key }} : {{ $item }} <br>
                                                            @endif
                                                        @endforeach
                                                        @foreach ($array_index_gigi as $key => $item)
                                                            @if ($key == 24)
                                                                {{ $key }} : {{ $item }}
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                    <td>[64] 24</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        @foreach ($array_index_gigi as $key => $item)
                                                            @if ($key == 65)
                                                                {{ $key }} : {{ $item }} <br>
                                                            @endif
                                                        @endforeach
                                                        @foreach ($array_index_gigi as $key => $item)
                                                            @if ($key == 25)
                                                                {{ $key }} : {{ $item }}
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                    <td>[65] 25</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        @foreach ($array_index_gigi as $key => $item)
                                                            @if ($key == 26)
                                                                {{ $key }} : {{ $item }}
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                    <td>26</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        @foreach ($array_index_gigi as $key => $item)
                                                            @if ($key == 27)
                                                                {{ $key }} : {{ $item }}
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                    <td>27</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        @foreach ($array_index_gigi as $key => $item)
                                                            @if ($key == 28)
                                                                {{ $key }} : {{ $item }}
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                    <td>28</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-12 col-md-12 text-center">
                                <canvas id="odontogram" style="margin-top: 15px;">
                                    Browser anda tidak support canvas, silahkan update browser anda.
                                </canvas>
                            </div>
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-6 col-md-6 col-lg-6">
                                        <table class="table table-bordered">
                                            <tbody>
                                                <tr>
                                                    <td>48</td>
                                                    <td>
                                                        @foreach ($array_index_gigi as $key => $item)
                                                            @if ($key == 48)
                                                                {{ $key }} : {{ $item }}
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>47</td>
                                                    <td>
                                                        @foreach ($array_index_gigi as $key => $item)
                                                            @if ($key == 47)
                                                                {{ $key }} : {{ $item }}
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>46</td>
                                                    <td>
                                                        @foreach ($array_index_gigi as $key => $item)
                                                            @if ($key == 46)
                                                                {{ $key }} : {{ $item }}
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>45 [85]</td>
                                                    <td>
                                                        @foreach ($array_index_gigi as $key => $item)
                                                            @if ($key == 45)
                                                                {{ $key }} : {{ $item }} <br>
                                                            @endif
                                                        @endforeach
                                                        @foreach ($array_index_gigi as $key => $item)
                                                            @if ($key == 85)
                                                                {{ $key }} : {{ $item }}
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>44 [84]</td>
                                                    <td>
                                                        @foreach ($array_index_gigi as $key => $item)
                                                            @if ($key == 44)
                                                                {{ $key }} : {{ $item }} <br>
                                                            @endif
                                                        @endforeach
                                                        @foreach ($array_index_gigi as $key => $item)
                                                            @if ($key == 84)
                                                                {{ $key }} : {{ $item }}
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>43 [83]</td>
                                                    <td>
                                                        @foreach ($array_index_gigi as $key => $item)
                                                            @if ($key == 43)
                                                                {{ $key }} : {{ $item }} <br>
                                                            @endif
                                                        @endforeach
                                                        @foreach ($array_index_gigi as $key => $item)
                                                            @if ($key == 83)
                                                                {{ $key }} : {{ $item }}
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>42 [82]</td>
                                                    <td>
                                                        @foreach ($array_index_gigi as $key => $item)
                                                            @if ($key == 42)
                                                                {{ $key }} : {{ $item }} <br>
                                                            @endif
                                                        @endforeach
                                                        @foreach ($array_index_gigi as $key => $item)
                                                            @if ($key == 82)
                                                                {{ $key }} : {{ $item }}
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>41 [81]</td>
                                                    <td>
                                                        @foreach ($array_index_gigi as $key => $item)
                                                            @if ($key == 41)
                                                                {{ $key }} : {{ $item }} <br>
                                                            @endif
                                                        @endforeach
                                                        @foreach ($array_index_gigi as $key => $item)
                                                            @if ($key == 81)
                                                                {{ $key }} : {{ $item }}
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-6 col-md-6 col-lg-6">
                                        <table class="table table-bordered text-end font-bold">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        @foreach ($array_index_gigi as $key => $item)
                                                            @if ($key == 38)
                                                                {{ $key }} : {{ $item }}
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                    <td>38</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        @foreach ($array_index_gigi as $key => $item)
                                                            @if ($key == 37)
                                                                {{ $key }} : {{ $item }}
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                    <td>37</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        @foreach ($array_index_gigi as $key => $item)
                                                            @if ($key == 36)
                                                                {{ $key }} : {{ $item }}
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                    <td>36</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        @foreach ($array_index_gigi as $key => $item)
                                                            @if ($key == 75)
                                                                {{ $key }} : {{ $item }} <br>
                                                            @endif
                                                        @endforeach
                                                        @foreach ($array_index_gigi as $key => $item)
                                                            @if ($key == 35)
                                                                {{ $key }} : {{ $item }}
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                    <td>[75] 35</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        @foreach ($array_index_gigi as $key => $item)
                                                            @if ($key == 74)
                                                                {{ $key }} : {{ $item }} <br>
                                                            @endif
                                                        @endforeach
                                                        @foreach ($array_index_gigi as $key => $item)
                                                            @if ($key == 34)
                                                                {{ $key }} : {{ $item }}
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                    <td>[74] 34</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        @foreach ($array_index_gigi as $key => $item)
                                                            @if ($key == 73)
                                                                {{ $key }} : {{ $item }} <br>
                                                            @endif
                                                        @endforeach
                                                        @foreach ($array_index_gigi as $key => $item)
                                                            @if ($key == 33)
                                                                {{ $key }} : {{ $item }}
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                    <td>[73] 33</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        @foreach ($array_index_gigi as $key => $item)
                                                            @if ($key == 72)
                                                                {{ $key }} : {{ $item }} <br>
                                                            @endif
                                                        @endforeach
                                                        @foreach ($array_index_gigi as $key => $item)
                                                            @if ($key == 32)
                                                                {{ $key }} : {{ $item }}
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                    <td>[72] 32</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        @foreach ($array_index_gigi as $key => $item)
                                                            @if ($key == 71)
                                                                {{ $key }} : {{ $item }} <br>
                                                            @endif
                                                        @endforeach
                                                        @foreach ($array_index_gigi as $key => $item)
                                                            @if ($key == 31)
                                                                {{ $key }} : {{ $item }}
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                    <td>[71] 31</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="page-break"></div>
                <div class="col-12 mb-3 mt-3">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Pemeriksaan</div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-lg-3 col-md-3">
                                    <div class="form-group">
                                        <label for="">Keluhan Utama</label>
                                        : <b  id="keluhan"></b>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-3 col-md-3">
                                    <div class="form-group">
                                        <label for="">Diagnosa</label>
                                        : <b  id="diagnosa"></b>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-3 col-md-3">
                                    <div class="form-group">
                                        <label for="">Planing</label>
                                        : <b  id="planing"></b>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-3 col-md-3">
                                    <div class="form-group">
                                        <label for="">Edukasi</label>
                                        : <b  id="edukasi"></b>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-3 col-md-3">
                                    <div class="form-group">
                                        <label for="">Tekanan Darah</label>
                                        : <b  id="tkd"></b>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-3 col-md-3">
                                    <div class="form-group">
                                        <label for="">Suhu</label>
                                        : <b  id="suhu"></b>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-3 col-md-3">
                                    <div class="form-group">
                                        <label for="">Nadi</label>
                                        : <b  id="nadi"></b>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-3 col-md-3">
                                    <div class="form-group">
                                        <label for="">SPO2</label>
                                        : <b  id="spo2"></b>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 mt-4">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">
                                <h4>Asesmen Gigi</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-lg-2 col-md-2">
                                    1. <b>OCLUSI</b>
                                </div>
                                <div class="col-12 col-lg-3 col-md-3">
                                    : <b id="oclusi"></b>
                                </div>
                                <div class="col-12 col-lg-2 col-md-2">
                                    4. <b>TORUS PALATINUS</b>
                                </div>
                                <div class="col-12 col-lg-3 col-md-3">
                                    : <b id="torus_palatinus"></b>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-12 col-lg-2 col-md-2">
                                    2. <b>TORUS MANDIBULARIS</b>
                                </div>
                                <div class="col-12 col-lg-3 col-md-3">
                                    : <b id="torus_mandibularis"></b>
                                </div>
                                <div class="col-12 col-lg-2 col-md-2">
                                    5. <b>PALATUM</b>
                                </div>
                                <div class="col-12 col-lg-3 col-md-3">
                                    : <b id="palatum"></b>
                                </div>

                            </div>
                            <div class="row mt-3">
                                <div class="col-12 col-lg-2 col-md-2">
                                    3. <b>Diastema</b>
                                </div>
                                <div class="col-12 col-lg-3 col-md-3">
                                    <b id="diastema"></b>
                                </div>
                                <div class="col-12 col-lg-2 col-md-2">
                                    6. <b>Lain Lain</b>
                                </div>
                                <div class="col-12 col-lg-4 col-md-4">
                                    : <b id="lainLain"></b>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-12 mb-3">
                                    <hr>
                                </div>
                                <div class="col-12 col-lg-4 col-md-4">
                                    <span>D <i>(Decay)</i> : <b id="d_typ"></b></span>
                                </div>
                                <div class="col-12 col-lg-4 col-md-4">
                                    <span>M <i>(Missing)</i> : <b id="m_typ"></b></span>
                                </div>
                                <div class="col-12 col-lg-4 col-md-4">
                                    <span>F <i>(Filled)</i> : <b id="f_typ"></b></span>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-12">
                                    <hr>
                                </div>
                                <div class="col-12 col-lg-2 col-md-2">
                                    <div class="form-group">
                                        <label for="ket_photo"><i>Jumlah Photo Yang Diambil</i></label>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6 col-md-6">
                                    <div class="form-group">
                                        : <b id="ket_photo"></b>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-2 col-md-2">
                                    <div class="form-group">
                                        : <b id="jenis_photo"></b>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-12 col-lg-2 col-md-2">
                                    <div class="form-group">
                                        <label for="ket_photo_rg"><i>Jumlah Rontgen Photo Yang Diambil</i></label>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-4 col-md-4">
                                    <div class="form-group">
                                        : <b id="ket_photo_rg"></b>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-4 col-md-4">
                                    <div class="form-group">
                                        : <b name="" id="jenis_photo_org">
                                        </b>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <table border="0" width="100%" align="center">
                        <tr align="center">
                            <td>DIPERIKSA OLEH</td>
                            <td>TANGGAL PERIKSA</td>
                            <td>TANDA TANGAN PEMERIKSA</td>
                        </tr>
                        <tr>
                            <td colspan="3"></td>
                        </tr>
                        <tr>
                            <td colspan="3"></td>
                        </tr>
                        <tr>
                            <td colspan="3"></td>
                        </tr>
                        <tr>
                            <td colspan="3"></td>
                        </tr>
                        <tr align="center">
                            <td>{{ $data->nama_dokter }}</td>
                            <td>{{ $data->tanggal_kunjungan }}</td>
                            <td>
                                <i class="bi bi-qr-code" style="font-size: 2em"></i>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.23.0/sweetalert2.js"
        integrity="sha512-SAy+5di7/mSvHkp80IwlsrQxfB5Zo2V8DeYseepV20ttbmwaD18xGLrdQfLNr4W7o7LO0HsNGrngqqag6ZV50Q=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('js_custom/input.js') }}"></script>
    <script>
        loadAsesmenData('print');
        setTimeout(() => {
            window.print();
            window.close();
        }, 1000);
    </script>
@endpush
