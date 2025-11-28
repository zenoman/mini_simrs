@extends('layouts.admin_layout')
@section('title')
    Detail Asesmen Gigi
@endsection
@section('head-title')
    Detail Asesmen Gigi
@endsection
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.23.0/sweetalert2.min.css"
        integrity="sha512-Ivy7sPrd6LPp20adiK3al16GBelPtqswhJnyXuha3kGtmQ1G2qWpjuipfVDaZUwH26b3RDe8x707asEpvxl7iA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="card-title">Detail Asesmen</div>
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
                                <input type="hidden" id="no_gambar" >
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="col-12">
                    @include('admin.odontogram_edit')
                </div>
                <div class="col-12 mb-3">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Keterangan Odontogram</div>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr >
                                        <th>Posisi Gigi</th>
                                        <th>Detail</th>
                                        <th>Keterangan</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody id="tampil_isi_ket">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-12 mb-3">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Pemeriksaan</div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-lg-3 col-md-3">
                                    <div class="form-group">
                                        <label for="">Keluhan Utama</label>
                                        <input type="text" id="keluhan" class="form-control">
                                    </div>
                                </div>
                                <div class="col-12 col-lg-3 col-md-3">
                                    <div class="form-group">
                                        <label for="">Diagnosa</label>
                                        <input type="text" id="diagnosa" class="form-control">
                                    </div>
                                </div>
                                <div class="col-12 col-lg-3 col-md-3">
                                    <div class="form-group">
                                        <label for="">Planing</label>
                                        <input type="text" id="planing" class="form-control">
                                    </div>
                                </div>
                                <div class="col-12 col-lg-3 col-md-3">
                                    <div class="form-group">
                                        <label for="">Edukasi</label>
                                        <input type="text" id="edukasi" class="form-control">
                                    </div>
                                </div>
                                <div class="col-12 col-lg-3 col-md-3">
                                    <div class="form-group">
                                        <label for="">Tekanan Darah</label>
                                        <input type="text" id="tkd" class="form-control">
                                    </div>
                                </div>
                                <div class="col-12 col-lg-3 col-md-3">
                                    <div class="form-group">
                                        <label for="">Suhu</label>
                                        <input type="text" id="suhu" class="form-control">
                                    </div>
                                </div>
                                <div class="col-12 col-lg-3 col-md-3">
                                    <div class="form-group">
                                        <label for="">Nadi</label>
                                        <input type="text" id="nadi" class="form-control">
                                    </div>
                                </div>
                                <div class="col-12 col-lg-3 col-md-3">
                                    <div class="form-group">
                                        <label for="">SPO2</label>
                                        <input type="text" id="spo2" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Asesmen Gigi</div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-lg-2 col-md-2 mt-2">
                                    1. <b>OCLUSI</b>
                                </div>
                                <div class="col-12 col-lg-3 col-md-3">
                                    <div class="form-group">
                                        {{-- <input checked value="Normal Bite" id="nb" type="radio" id="nb"
                                            name="rocl" class="custom-control-input">
                                        <label for="nb">Normal Bite</label> --}}
                                        <select name="oclusi_select" id="oclusi" class="form-control">
                                            <option value="Normal Bite">Normal Bite</option>
                                            <option value="Cross Bite">Cross Bite</option>
                                            <option value="Steep Bite">Steep Bite</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-2 col-md-2 mt-2">
                                    4. <b>TORUS PALATINUS</b>
                                </div>
                                <div class="col-12 col-lg-3 col-md-3">
                                    <div class="form-group">
                                        <select name="" id="torus_palatinus" class="form-control">
                                            <option value="Tidak Ada">Tidak Ada</option>
                                            <option value="Kecil">Kecil</option>
                                            <option value="Besar">Besar</option>
                                            <option value="Sedang">Sedang</option>
                                            <option value="Multiple">Multiple</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-12 col-lg-2 col-md-2 mt-2">
                                    2. <b>TORUS MANDIBULARIS</b>
                                </div>
                                <div class="col-12 col-lg-3 col-md-3">
                                    <div class="form-group">
                                        <select name="" id="torus_mandibularis" class="form-control">
                                            <option value="Tidak Ada">Tidak Ada</option>
                                            <option value="Sisi Kiri">Sisi Kiri</option>
                                            <option value="Sisi Kanan">Sisi Kanan</option>
                                            <option value="Kedua Sisi">Kedua Sisi</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-2 col-md-2 mt-2">
                                    5. <b>PALATUM</b>
                                </div>
                                <div class="col-12 col-lg-3 col-md-3">
                                    <div class="form-group">
                                        <select name="" id="palatum" class="form-control">
                                            <option value="Dalam">Dalam</option>
                                            <option value="Sedang">Sedang</option>
                                            <option value="Rendah">Rendah</option>
                                        </select>
                                    </div>
                                </div>

                            </div>
                            <div class="row mt-3">
                                <div class="col-12 col-lg-2 col-md-2">
                                    3. <b>Diastema</b>
                                </div>
                                <div class="col-12 col-lg-3 col-md-3">
                                    <div class="form-group">
                                        <select name="" id="diastema" class="form-control">
                                            <option value="Tidak Ada">Tidak Ada</option>
                                            <option value="Ada">Ada</option>
                                        </select>
                                        <div class="form-group mt-2">
                                            <input type="text" id="dst_ada_ket" class="form-control d-none"
                                                placeholder="Ketrangan Tambahan">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-2 col-md-2">
                                    6. <b>Lain Lain</b>
                                </div>
                                <div class="col-12 col-lg-4 col-md-4">
                                    <div class="form-group">
                                        <input type="text" id="lainLain" value="" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-12 mb-3">
                                    <hr>
                                </div>
                                <div class="col-12 col-lg-4 col-md-4">
                                    <div class="input-group">
                                        <div class="input-prepend">
                                            <span class="input-group-text">D</span>
                                        </div>
                                        <input type="text" value="-" class="form-control" id="d_typ">
                                    </div>
                                </div>
                                <div class="col-12 col-lg-4 col-md-4">
                                    <div class="input-group">
                                        <div class="input-prepend">
                                            <span class="input-group-text">M</span>
                                        </div>
                                        <input type="text" value="-" class="form-control" id="m_typ">
                                    </div>
                                </div>
                                <div class="col-12 col-lg-4 col-md-4">
                                    <div class="input-group">
                                        <div class="input-prepend">
                                            <span class="input-group-text">F</span>
                                        </div>
                                        <input type="text" value="-" class="form-control" id="f_typ">
                                    </div>
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
                                        <input type="text" id="ket_photo" name="ket_photo" class="form-control">
                                    </div>
                                </div>
                                <div class="col-12 col-lg-2 col-md-2">
                                    <div class="form-group">
                                        <select name="" id="jenis_photo" class="form-control">
                                            <option value="-">-</option>
                                            <option value="Digital">Digital</option>
                                            <option value="Intraoral">Intraoral</option>
                                        </select>
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
                                        <input type="text" id="ket_photo_rg" name="ket_photo_rg"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-12 col-lg-4 col-md-4">
                                    <div class="form-group">
                                        <select name="" id="jenis_photo_org" class="form-control">
                                            <option value="-">-</option>
                                            <option value="PA">PA</option>
                                            <option value="OPG">OPG</option>
                                            <option value="CEP">CEP</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer d-flex justify-content-end">
            <div class="btn-group">
                <button type="button" onclick="printAsesmen('{{ $data->no_registrasi }}')" class="btn  btn-warning "><i
                        class="bi bi-printer"></i> Print
                    Asesmen</button>
                <button type="button" onclick="updateAsesmen()" class="btn  btn-primary "><i class="bi bi-save"></i> Simpan
                    Data Asesmen</button>
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
        loadAsesmenData("detail");
        // initial_data();
    </script>
@endpush
