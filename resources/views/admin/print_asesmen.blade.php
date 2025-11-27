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
    <script type="text/javascript">
        $("#odontogram").odontogram('init', {
            width: "1250px",
            height: "430px"
        });
        // var canvas = document.getElementsByTagName('odontogram')[0];
        // canvas.width  = $(window).width()*2; 
        // canvas.height = 630*2;
        $("#odontogram").odontogram('setGeometryByPos', [
            // {
            //     code: 'AMF',
            //     pos: '18-R'
            // },
            // {
            //     code: 'AMF',
            //     pos: '18-L'
            // },
            // {
            //     code: 'SOU',
            //     pos: '83'
            // },
            // {
            //     code: 'ARROW_TOP_LEFT',
            //     pos: '84'
            // },
        ]);
        var hasil_odontogram = [];
        $('#odontogram').on('change', function(_, geometry) {
            console.log(geometry)
            hasil_odontogram = [];
            hasil_odontogram.push(geometry);
            loadDataOdontogram(geometry);
        })
        loadAsesmenData();

        function loadAsesmenData() {
            var noreg = $('#no_registrasi').val();
            // ambil hasil asesmen
            $.ajax({
                url: '/asesmen/get-asesmen/' + noreg,
                dataType: 'JSON',
                type: 'get',
                success: function(res) {
                    var data_odo = [];
                    data_odo = res.detail;
                    // load odontogram data
                    $("#odontogram").odontogram('setGeometryByPos', data_odo);
                    // load keteranagn
                    var baris = "";
                    $.each(data_odo, function(index, value) {
                        baris += `<div class="col-12 col-md-6 col-lg-6 mt-2">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">${value.pos} | ${value.code}</span>
                                    </div>  
                                    <input type="text" id="ket_odontogram_${value.code}_${value.pos}" name="ket_odontogram[]" placeholder="${value.keterangan}" name="ket_odontogram" class="form-control">
                                    <button type="button" class="btn btn-danger" onclick="hapusKeterangan('${value.code}_${value.pos}')"><i class="bi bi-trash"></i></button>
                                </div>
                            </div>`;
                    })
                    $('#isian_odontogram').html(baris);
                    var asesmen = res.asesmen;
                    // plot ke asesmen medis
                    $('#oclusi').html(asesmen.oclusi);
                    $('#torus_palatinus').html(asesmen.torus_palatinus);
                    $('#torus_mandibularis').html(asesmen.torus_mandibularis);
                    $('#palatum').html(asesmen.palatum);
                    $('#diastema').html(asesmen.diastema);
                    if (asesmen.diastema == 'Ada') {
                        $('#diastema').html(asesmen.diastema + ' : ' + asesmen.diastema_ket);
                    }
                    $('#dst_ada_ket').val(asesmen.diastema_ket);

                    $('#lainLain').html(asesmen.ket_lain);
                    // explode by | 
                    var dmf = asesmen.d_m_f;
                    dmf = dmf.split('|');
                    $('#d_typ').html(dmf[0]);
                    $('#m_typ').html(dmf[1]);
                    $('#f_typ').html(dmf[2]);
                    $('#ket_photo').html(asesmen.jum_poto);
                    $('#jenis_photo').html(asesmen.foto_ot);
                    $('#ket_photo_rg').html(asesmen.jum_poto_rg);
                    $('#jenis_photo_org').html(asesmen.foto_ot_rg);
                }
            })
        }
        $("#ODONTOGRAM_MODE_HAPUS").click(function() {
            $("#odontogram").odontogram('setMode', ODONTOGRAM_MODE_HAPUS);
        });
        $("#ODONTOGRAM_MODE_DEFAULT").click(function() {
            $("#odontogram").odontogram('setMode', ODONTOGRAM_MODE_DEFAULT);
        });
        $("#ODONTOGRAM_MODE_AMF").click(function() {
            $("#odontogram").odontogram('setMode', ODONTOGRAM_MODE_AMF);
        });
        $("#ODONTOGRAM_MODE_COF").click(function() {
            $("#odontogram").odontogram('setMode', ODONTOGRAM_MODE_COF);
        });
        $("#ODONTOGRAM_MODE_FIS").click(function() {
            $("#odontogram").odontogram('setMode', ODONTOGRAM_MODE_FIS);
        });
        $("#ODONTOGRAM_MODE_NVT").click(function() {
            $("#odontogram").odontogram('setMode', ODONTOGRAM_MODE_NVT);
        });
        $("#ODONTOGRAM_MODE_RCT").click(function() {
            $("#odontogram").odontogram('setMode', ODONTOGRAM_MODE_RCT);
        });
        $("#ODONTOGRAM_MODE_NON").click(function() {
            $("#odontogram").odontogram('setMode', ODONTOGRAM_MODE_NON);
        });
        $("#ODONTOGRAM_MODE_UNE").click(function() {
            $("#odontogram").odontogram('setMode', ODONTOGRAM_MODE_UNE);
        });
        $("#ODONTOGRAM_MODE_PRE").click(function() {
            $("#odontogram").odontogram('setMode', ODONTOGRAM_MODE_PRE);
        });
        $("#ODONTOGRAM_MODE_ANO").click(function() {
            $("#odontogram").odontogram('setMode', ODONTOGRAM_MODE_ANO);
        });
        $("#ODONTOGRAM_MODE_CARIES").click(function() {
            $("#odontogram").odontogram('setMode', ODONTOGRAM_MODE_CARIES);
        });
        $("#ODONTOGRAM_MODE_CFR").click(function() {
            $("#odontogram").odontogram('setMode', ODONTOGRAM_MODE_CFR);
        });
        $("#ODONTOGRAM_MODE_FMC").click(function() {
            $("#odontogram").odontogram('setMode', ODONTOGRAM_MODE_FMC);
        });
        $("#ODONTOGRAM_MODE_POC").click(function() {
            $("#odontogram").odontogram('setMode', ODONTOGRAM_MODE_POC);
        });
        $("#ODONTOGRAM_MODE_RRX").click(function() {
            $("#odontogram").odontogram('setMode', ODONTOGRAM_MODE_RRX);
        });
        $("#ODONTOGRAM_MODE_MIS").click(function() {
            $("#odontogram").odontogram('setMode', ODONTOGRAM_MODE_MIS);
        });
        $("#ODONTOGRAM_MODE_IPX").click(function() {
            $("#odontogram").odontogram('setMode', ODONTOGRAM_MODE_IPX);
        });
        $("#ODONTOGRAM_MODE_FRM_ACR").click(function() {
            $("#odontogram").odontogram('setMode', ODONTOGRAM_MODE_FRM_ACR);
        });
        $("#ODONTOGRAM_MODE_BRIDGE").click(function() {
            $("#odontogram").odontogram('setMode', ODONTOGRAM_MODE_BRIDGE);
        });
        $("#ODONTOGRAM_MODE_ARROW_TOP_LEFT").click(function() {
            $("#odontogram").odontogram('setMode', ODONTOGRAM_MODE_ARROW_TOP_LEFT);
        })
        $("#ODONTOGRAM_MODE_ARROW_TOP_RIGHT").click(function() {
            $("#odontogram").odontogram('setMode', ODONTOGRAM_MODE_ARROW_TOP_RIGHT);
        })
        $("#ODONTOGRAM_MODE_ARROW_TOP_TURN_LEFT").click(function() {
            $("#odontogram").odontogram('setMode', ODONTOGRAM_MODE_ARROW_TOP_TURN_LEFT);
        })
        $("#ODONTOGRAM_MODE_ARROW_TOP_TURN_RIGHT").click(function() {
            $("#odontogram").odontogram('setMode', ODONTOGRAM_MODE_ARROW_TOP_TURN_RIGHT);
        })
        $("#ODONTOGRAM_MODE_ARROW_BOTTOM_LEFT").click(function() {
            $("#odontogram").odontogram('setMode', ODONTOGRAM_MODE_ARROW_BOTTOM_LEFT);
        })
        $("#ODONTOGRAM_MODE_ARROW_BOTTOM_RIGHT").click(function() {
            $("#odontogram").odontogram('setMode', ODONTOGRAM_MODE_ARROW_BOTTOM_RIGHT);
        })
        $("#ODONTOGRAM_MODE_ARROW_BOTTOM_TURN_LEFT").click(function() {
            $("#odontogram").odontogram('setMode', ODONTOGRAM_MODE_ARROW_BOTTOM_TURN_LEFT);
        })
        $("#ODONTOGRAM_MODE_ARROW_BOTTOM_TURN_RIGHT").click(function() {
            $("#odontogram").odontogram('setMode', ODONTOGRAM_MODE_ARROW_BOTTOM_TURN_RIGHT);
        })

        $("#download").click(function() {
            window.open($("#odontogram").odontogram('getDataURL'));
        })
        diastema_ket();

        function diastema_ket() {
            $('#diastema').on('change', function() {
                if (this.value == 'Ada') {
                    $('#dst_ada_ket').removeClass('d-none');
                } else {
                    $('#dst_ada_ket').addClass('d-none');
                }
            })
        }

        // simpan asesmen dan hasil odontogram
        function simpanAsesmen() {
            var hasil_keterangan = [];
            var no_registrasi = $('#no_registrasi').val();
            var oclusi = $('#oclusi').val();
            var torus_palatinus = $('#torus_palatinus').val();
            var torus_mandibularis = $('#torus_mandibularis').val();
            var palatum = $('#palatum').val();
            var diastema = $('#diastema').val();
            var diastema_ket = $('#dst_ada_ket').val();
            var lain = $('#lainLain').val();
            var d_typ = $('#d_typ').val();
            var m_typ = $('#m_typ').val();
            var f_typ = $('#f_typ').val();
            var jum_poto = $('#ket_photo').val();
            var poto_ot = $('#jenis_photo').val();
            var jum_poto_rg = $('#ket_photo_rg').val();
            var poto_ot_rg = $('#jenis_photo_org').val();
            // ambil keterangan
            $('input[name="ket_odontogram[]"]').each(function() {
                var item_ket_odontogram = {}
                var itemnya = $(this).val();
                item_ket_odontogram['ket'] = itemnya;
                hasil_keterangan.push(item_ket_odontogram);
            })
            // insert ke terangan pada odontogram

            let index_o = 0;
            const obj_data = hasil_odontogram[0];
            if (obj_data) {
                Object.keys(obj_data).forEach(key => {
                    obj_data[key].forEach(item => {
                        item.keterangan = hasil_keterangan[index_o].ket;
                        index_o++;
                    });
                });
            }
            var params = {
                'odontogram': hasil_odontogram,
                'no_registrasi': no_registrasi,
                'oclusi': oclusi,
                'torus_palatinus': torus_palatinus,
                'torus_mandibularis': torus_mandibularis,
                'palatum': palatum,
                'diastema': diastema,
                'diastema_ket': diastema_ket,
                'lain': lain,
                'd_typ': d_typ,
                'm_typ': m_typ,
                'f_typ': f_typ,
                'jum_poto': jum_poto,
                'poto_ot': poto_ot,
                'jum_poto_rg': jum_poto_rg,
                'poto_ot_rg': poto_ot_rg
            };
            console.log(params);
            $.ajax({
                url: '/asesmen/simpan-asesmen',
                data: JSON.stringify(params),
                type: 'POST',
                dataType: 'JSON',
                success: function(res) {
                    if (res.code == '200') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: 'Data berhasil disimpan',
                            showConfirmButton: false,
                            timer: 1500
                        })
                        setTimeout(() => {
                            window.location.href = '/kunjungan/index-kunjungan';
                        }, 1500);
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal',
                            text: 'Data gagal disimpan',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    }
                }
            })
        }
        function loadDataOdontogram(geometry) {
            var baris = "";
            $.each(geometry, function(index, value) {
                var key_geom = index;
                $.each(value, function(index2, value2) {
                    baris += `<div class="col-12 col-md-6 col-lg-6 mt-2">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">${value2.pos} | ${value2.name}</span>
                                    </div>  
                                    <input type="text" id="ket_odontogram_${value2.name}_${value2.pos}" name="ket_odontogram[]" placeholder="Isi Keterangan" name="ket_odontogram" class="form-control">
                                    <input type="hidden" id="vert_code_${value2.name}"  class="form-control" name="vert_code[]" value="${value2.name}">
                                    <input type="hidden" id="vert_pos_${value2.pos}"  class="form-control" name="vert_pos[]" value="${value2.pos}">
                                </div>
                            </div>`;
                })
            })
            $('#isian_odontogram').html(baris);
        }
        setTimeout(() => {
            window.print();
            window.close();
        }, 1000);
    </script>
@endpush
