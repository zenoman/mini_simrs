@extends('layouts.admin_layout')
@section('title')
    Asesmen Gigi
@endsection
@section('head-title')
    Asesmen Gigi
@endsection
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.23.0/sweetalert2.min.css"
        integrity="sha512-Ivy7sPrd6LPp20adiK3al16GBelPtqswhJnyXuha3kGtmQ1G2qWpjuipfVDaZUwH26b3RDe8x707asEpvxl7iA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="card-title">Isian Asesmen</div>
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
                    @include('admin.odontogram')
                </div>
                <div class="col-12 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row" id="isian_odontogram">
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
                <button type="button" onclick="" class="btn  btn-primary "><i class="bi bi-save"></i> Simpan
                    Data Asesmen</button>
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
            // add array pada locpos
            addArrayPos(geometry);
            
            
            // loadDataOdontogram(geometry);
        })
        var loc_pos = [];
        var loc_pos2 = [];
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
                        var item = {}
                        item['code'] = value.code;
                        item['pos'] = value.pos;
                        item['keterangan'] = value.keterangan;
                        loc_pos.push(item);
                        baris += `<div class="col-12 col-md-6 col-lg-6 mt-2">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">${value.pos} | ${value.code}</span>
                                    </div>  
                                    <input type="text" id="ket_odontogram_${value.code}_${value.pos}" name="ket_odontogram[]" value="${value.keterangan}" name="ket_odontogram" class="form-control">
                                    <button type="button" class="btn btn-danger" onclick="hapusKeterangan('${value.id}')"><i class="bi bi-trash"></i></button>
                                </div>
                            </div>`;
                    })
                    $('#isian_odontogram').html(baris);
                    var asesmen = res.asesmen;
                    // plot ke asesmen medis
                    $('#oclusi').val(asesmen.oclusi).trigger('change');
                    $('#torus_palatinus').val(asesmen.torus_palatinus).trigger('change');
                    $('#torus_mandibularis').val(asesmen.torus_mandibularis).trigger('change');
                    $('#palatum').val(asesmen.palatum).trigger('change');
                    $('#diastema').val(asesmen.diastema).trigger('change');
                    $('#no_gambar').val(asesmen.kode_gambar_gigi);
                    if (asesmen.diastema == 'Ada') {
                        $('#dst_ada_ket').removeClass('d-none');
                    }
                    $('#dst_ada_ket').val(asesmen.diastema_ket);

                    $('#lainLain').val(asesmen.ket_lain);
                    // explode by | 
                    var dmf = asesmen.d_m_f;
                    dmf = dmf.split('|');
                    $('#d_typ').val(dmf[0]);
                    $('#m_typ').val(dmf[1]);
                    $('#f_typ').val(dmf[2]);
                    $('#ket_photo').val(asesmen.jum_poto);
                    $('#jenis_photo').val(asesmen.foto_ot).trigger('change');
                    $('#ket_photo_rg').val(asesmen.jum_poto_rg);
                    $('#jenis_photo_org').val(asesmen.foto_ot_rg).trigger('change');
                    console.log(loc_pos);
                }
            })
        }

        function addArrayPos(data) {
            loc_pos2 = [];
            
            // ambil name dan pos
            $.each(data, function(index, value) {
                $.each(value, function(index2, value2) {
                    var item = {}
                    item['code'] = value2.name;
                    item['pos'] = value2.pos;
                    loc_pos2.push(item);
                })
            })
            // tambahkan pada array loc_pos yang belum exist
            $.each(loc_pos2, function(index, value) {
                var found = false;
                $.each(loc_pos, function(index2, value2) {
                    if (value.code == value2.code && value.pos == value2.pos) {
                        found = true;
                    }
                })
                if (!found) {
                    loc_pos.push(value);
                    // tambah input keterangan 
                    var baris = `<div class="col-12 col-md-6 col-lg-6 mt-2" id="inar${index}">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">${value.pos} | ${value.code}</span>
                                    </div>  
                                    <input type="text" id="ket_odontogram_${value.code}_${value.pos}" name="ket_odontogram[]" placeholder="Isi Keterangan" name="ket_odontogram" class="form-control">
                                    <input type="hidden" id="vert_code_${value.code}"  class="form-control" name="vert_code[]" value="${value.code}">
                                    <input type="hidden" id="vert_pos_${value.pos}"  class="form-control" name="vert_pos[]" value="${value.pos}">
                                    <button type="button" class="btn btn-danger" onclick="hapusArrayLoc('${index}')"><i class="bi bi-trash"></i></button>
                                </div>
                            </div>`;
                    $('#isian_odontogram').append(baris);
                }
            })
            console.log(loc_pos);
        }
        function hapusArrayLoc(id){
            loc_pos2=[];
            loc_pos.splice(id, 1);
            // hapus input nya 
            $('#inar'+id).remove();
            console.log(loc_pos);
            // load odontogram
            $("#odontogram").odontogram('setGeometryByPos', loc_pos);
        }
        function loadGeomEDit() {
            $("#odontogram").odontogram('setGeometryByPos', loc_pos);
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

        function printAsesmen(noreg) {
            // buka link
            window.open('/asesmen/print-asesmen/' + noreg, '_blank');
        }

        function hapusKeterangan(id) {
            $.ajax({
                url: '/asesmen/hapus-detail-asesmen/' + id,
                dataType: 'JSON',
                type: 'get',
                success: function(res) {
                    if (res.code == '200') {
                        loadAsesmenData();
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: 'Data berhasil dihapus',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal',
                            text: 'Data gagal dihapus',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    }
                }
            })
        }
    </script>
@endpush
