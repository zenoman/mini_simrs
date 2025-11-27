var od = $("#odontogram").odontogram("init", {
    width: "1200px",
    height: "430px",
});
$(".sl2").select2({
    theme: "bootstrap4",
});
var saveData;
initial_data();
function initial_data() {
    const odonto = $("#odontogram").data("odontogram");

    if (saveData !== undefined) {
        // 2. Konversi data gigi biasa ke format geometry
        const teethGeometry = odonto.setGeometryByPos(saveData.teeth); // Ini return objek geometry
        // 3. Tambahkan bridge sebagai objek literal (bukan instance!)
        // Gunakan key khusus agar tidak bentrok
        if (!teethGeometry["BRIDGES"]) teethGeometry["BRIDGES"] = [];
        for (const bridge of saveData.bridges) {
            // Pastikan x/y tetap string atau number — tidak masalah karena convertGeomFromObject parse otomatis
            teethGeometry["BRIDGES"].push(bridge);
        }
        $("#odontogram").odontogram("setGeometry", teethGeometry);
        console.log(teethGeometry);
    }
    //
}

// var hasil_odontogram = [];
var odontogram_arr = [];
var odontogram_bridge_arr = [];
$("#odontogram").on("change", function (_, geometry) {
    odontogram_arr = [];
    odontogram_bridge_arr = [];
    final_odontogram_arr = [];
    Object.keys(geometry).forEach((key) => {
        const items = geometry[key];
        items.forEach((item) => {
            if (item.name == "BRIDGE") {
                odontogram_bridge_arr.push(item);
            } else {
                odontogram_arr.push({
                    code: item.name,
                    pos: item.pos ?? "", // kalau tidak ada pos, kosong
                });
            }
        });
    });
    final_odontogram_arr = {
        teeth: odontogram_arr,
        bridges: odontogram_bridge_arr,
    };
    console.log(final_odontogram_arr);
    addArrayKet();
});

$("#ODONTOGRAM_MODE_HAPUS").click(function () {
    $("#odontogram").odontogram("setMode", ODONTOGRAM_MODE_HAPUS);
});
$("#ODONTOGRAM_MODE_DEFAULT").click(function () {
    $("#odontogram").odontogram("setMode", ODONTOGRAM_MODE_DEFAULT);
});
$("#ODONTOGRAM_MODE_AMF").click(function () {
    $("#odontogram").odontogram("setMode", ODONTOGRAM_MODE_AMF);
});
$("#ODONTOGRAM_MODE_COF").click(function () {
    $("#odontogram").odontogram("setMode", ODONTOGRAM_MODE_COF);
});
$("#ODONTOGRAM_MODE_FIS").click(function () {
    $("#odontogram").odontogram("setMode", ODONTOGRAM_MODE_FIS);
});
$("#ODONTOGRAM_MODE_NVT").click(function () {
    $("#odontogram").odontogram("setMode", ODONTOGRAM_MODE_NVT);
});
$("#ODONTOGRAM_MODE_RCT").click(function () {
    $("#odontogram").odontogram("setMode", ODONTOGRAM_MODE_RCT);
});
$("#ODONTOGRAM_MODE_NON").click(function () {
    $("#odontogram").odontogram("setMode", ODONTOGRAM_MODE_NON);
});
$("#ODONTOGRAM_MODE_UNE").click(function () {
    $("#odontogram").odontogram("setMode", ODONTOGRAM_MODE_UNE);
});
$("#ODONTOGRAM_MODE_PRE").click(function () {
    $("#odontogram").odontogram("setMode", ODONTOGRAM_MODE_PRE);
});
$("#ODONTOGRAM_MODE_ANO").click(function () {
    $("#odontogram").odontogram("setMode", ODONTOGRAM_MODE_ANO);
});
$("#ODONTOGRAM_MODE_CARIES").click(function () {
    $("#odontogram").odontogram("setMode", ODONTOGRAM_MODE_CARIES);
});
$("#ODONTOGRAM_MODE_CFR").click(function () {
    $("#odontogram").odontogram("setMode", ODONTOGRAM_MODE_CFR);
});
$("#ODONTOGRAM_MODE_FMC").click(function () {
    $("#odontogram").odontogram("setMode", ODONTOGRAM_MODE_FMC);
});
$("#ODONTOGRAM_MODE_POC").click(function () {
    $("#odontogram").odontogram("setMode", ODONTOGRAM_MODE_POC);
});
$("#ODONTOGRAM_MODE_RRX").click(function () {
    $("#odontogram").odontogram("setMode", ODONTOGRAM_MODE_RRX);
});
$("#ODONTOGRAM_MODE_MIS").click(function () {
    $("#odontogram").odontogram("setMode", ODONTOGRAM_MODE_MIS);
});
$("#ODONTOGRAM_MODE_IPX").click(function () {
    $("#odontogram").odontogram("setMode", ODONTOGRAM_MODE_IPX);
});
$("#ODONTOGRAM_MODE_FRM_ACR").click(function () {
    $("#odontogram").odontogram("setMode", ODONTOGRAM_MODE_FRM_ACR);
});
$("#ODONTOGRAM_MODE_BRIDGE").click(function () {
    $("#odontogram").odontogram("setMode", ODONTOGRAM_MODE_BRIDGE);
});
$("#ODONTOGRAM_MODE_ARROW_TOP_LEFT").click(function () {
    $("#odontogram").odontogram("setMode", ODONTOGRAM_MODE_ARROW_TOP_LEFT);
});
$("#ODONTOGRAM_MODE_ARROW_TOP_RIGHT").click(function () {
    $("#odontogram").odontogram("setMode", ODONTOGRAM_MODE_ARROW_TOP_RIGHT);
});
$("#ODONTOGRAM_MODE_ARROW_TOP_TURN_LEFT").click(function () {
    $("#odontogram").odontogram("setMode", ODONTOGRAM_MODE_ARROW_TOP_TURN_LEFT);
});
$("#ODONTOGRAM_MODE_ARROW_TOP_TURN_RIGHT").click(function () {
    $("#odontogram").odontogram(
        "setMode",
        ODONTOGRAM_MODE_ARROW_TOP_TURN_RIGHT
    );
});
$("#ODONTOGRAM_MODE_ARROW_BOTTOM_LEFT").click(function () {
    $("#odontogram").odontogram("setMode", ODONTOGRAM_MODE_ARROW_BOTTOM_LEFT);
});
$("#ODONTOGRAM_MODE_ARROW_BOTTOM_RIGHT").click(function () {
    $("#odontogram").odontogram("setMode", ODONTOGRAM_MODE_ARROW_BOTTOM_RIGHT);
});
$("#ODONTOGRAM_MODE_ARROW_BOTTOM_TURN_LEFT").click(function () {
    $("#odontogram").odontogram(
        "setMode",
        ODONTOGRAM_MODE_ARROW_BOTTOM_TURN_LEFT
    );
});
$("#ODONTOGRAM_MODE_ARROW_BOTTOM_TURN_RIGHT").click(function () {
    $("#odontogram").odontogram(
        "setMode",
        ODONTOGRAM_MODE_ARROW_BOTTOM_TURN_RIGHT
    );
});

$("#download").click(function () {
    window.open($("#odontogram").odontogram("getDataURL"));
});

// add array
function addArrayKet() {
    // cari array node teeth pada final odontogram
    if (final_odontogram_arr.teeth.length > 0) {
        // cek apa sudah ada array ket pada teeth
        for (var i = 0; i < final_odontogram_arr.teeth.length; i++) {
            if (final_odontogram_arr.teeth[i].keterangan == undefined) {
                // final_odontogram_arr.teeth[i].ket = [];
                // tampilkan isian keterangan teeth
                $("#tambah_keterangan").removeClass("d-none");
                $("#teeth_isian").removeClass("d-none");
                $("#bridge_isian").addClass("d-none");
            }
        }
    }
    // cek apakah type bridge
    if (final_odontogram_arr.bridges.length > 0) {
        for (var i = 0; i < final_odontogram_arr.bridges.length; i++) {
            if (final_odontogram_arr.bridges[i].keterangan == undefined) {
                // final_odontogram_arr.bridge[i].ket = [];
                // tampilkan isian keterangan bridge
                $("#tambah_keterangan").removeClass("d-none");
                $("#teeth_isian").addClass("d-none");
                $("#bridge_isian").removeClass("d-none");
            }
        }
    }
}
function resetIsiKet() {
    $("#tambah_keterangan").addClass("d-none");
    $("#teeth_isian").addClass("d-none");
    $("#bridge_isian").addClass("d-none");
}
function simpanKetTeeth() {
    // tambahakan keterangan pada final odontogram teeth yang belum ada keteranagn
    for (var i = 0; i < final_odontogram_arr.teeth.length; i++) {
        if (final_odontogram_arr.teeth[i].keterangan == undefined) {
            final_odontogram_arr.teeth[i].keterangan = $("#teeth_ket").val();
        }
    }
    resetIsiKet();
    console.log(final_odontogram_arr);
    // tampilkan Pada keterangan
    tampilKeterangan()
}
function simpanKetBridge() {
    // tambahakan keterangan pada final odontogram teeth yang belum ada keteranagn
    for (var i = 0; i < final_odontogram_arr.bridges.length; i++) {
        if (final_odontogram_arr.bridges[i].keterangan == undefined) {
            final_odontogram_arr.bridges[i].keterangan = $("#bridge_ket").val();
            final_odontogram_arr.bridges[i].pos1 = $("#bridge1").val();
            final_odontogram_arr.bridges[i].pos2 = $("#bridge2").val();
        }
    }
    resetIsiKet();
    console.log(final_odontogram_arr);
    tampilKeterangan()
    
}
function tampilKeterangan(){
    var baris="";
    // teeth
    for (let index = 0; index <final_odontogram_arr.teeth.length; index++) {
        // tampilkan dalam tabel
        baris += `<tr>
        <td>${final_odontogram_arr.teeth[index].pos}</td>
        <td>${final_odontogram_arr.teeth[index].code}</td>
        <td>${final_odontogram_arr.teeth[index].keterangan}</td>
        </tr>`
        
    }
    // bridge
    for (let index = 0; index <final_odontogram_arr.bridges.length; index++) {
        // tampilkan dalam tabel
        baris += `<tr>
        <td>${final_odontogram_arr.bridges[index].pos1 + ' Bridge Ke ' + final_odontogram_arr.bridges[index].pos2}</td>
        <td>${final_odontogram_arr.bridges[index].name}</td>
        <td>${final_odontogram_arr.bridges[index].keterangan}</td>
        </tr>`
    }

    $("#tampil_isi_ket").html(baris);
}
diastema_ket();
function diastema_ket() {
    $("#diastema").on("change", function () {
        if (this.value == "Ada") {
            $("#dst_ada_ket").removeClass("d-none");
        } else {
            $("#dst_ada_ket").addClass("d-none");
        }
    });
}
// simpan asesmen dan hasil odontogram
function simpanAsesmen() {
    var hasil_keterangan = [];
    var no_registrasi = $("#no_registrasi").val();
    var oclusi = $("#oclusi").val();
    var torus_palatinus = $("#torus_palatinus").val();
    var torus_mandibularis = $("#torus_mandibularis").val();
    var palatum = $("#palatum").val();
    var diastema = $("#diastema").val();
    var diastema_ket = $("#dst_ada_ket").val();
    var lain = $("#lainLain").val();
    var d_typ = $("#d_typ").val();
    var m_typ = $("#m_typ").val();
    var f_typ = $("#f_typ").val();
    var jum_poto = $("#ket_photo").val();
    var poto_ot = $("#jenis_photo").val();
    var jum_poto_rg = $("#ket_photo_rg").val();
    var poto_ot_rg = $("#jenis_photo_org").val();
    // ambil keterangan
    $('input[name="ket_odontogram[]"]').each(function () {
        var item_ket_odontogram = {};
        var itemnya = $(this).val();
        item_ket_odontogram["ket"] = itemnya;
        hasil_keterangan.push(item_ket_odontogram);
    });
    // insert ke terangan pada odontogram

    let index_o = 0;
    const obj_data = hasil_odontogram[0];
    if (obj_data) {
        Object.keys(obj_data).forEach((key) => {
            obj_data[key].forEach((item) => {
                item.keterangan = hasil_keterangan[index_o].ket;
                index_o++;
            });
        });
    }
    var params = {
        odontogram: hasil_odontogram,
        no_registrasi: no_registrasi,
        oclusi: oclusi,
        torus_palatinus: torus_palatinus,
        torus_mandibularis: torus_mandibularis,
        palatum: palatum,
        diastema: diastema,
        diastema_ket: diastema_ket,
        lain: lain,
        d_typ: d_typ,
        m_typ: m_typ,
        f_typ: f_typ,
        jum_poto: jum_poto,
        poto_ot: poto_ot,
        jum_poto_rg: jum_poto_rg,
        poto_ot_rg: poto_ot_rg,
    };
    console.log(params);
    $.ajax({
        url: "/asesmen/simpan-asesmen",
        data: JSON.stringify(params),
        type: "POST",
        dataType: "JSON",
        success: function (res) {
            if (res.code == "200") {
                Swal.fire({
                    icon: "success",
                    title: "Berhasil",
                    text: "Data berhasil disimpan",
                    showConfirmButton: false,
                    timer: 1500,
                });
                setTimeout(() => {
                    window.location.href = "/kunjungan/index-kunjungan";
                }, 1500);
            } else {
                Swal.fire({
                    icon: "error",
                    title: "Gagal",
                    text: "Data gagal disimpan",
                    showConfirmButton: false,
                    timer: 1500,
                });
            }
        },
    });
}

function loadDataOdontogram(geometry) {
    var baris = "";
    hitungDMF();
    $.each(geometry, function (index, value) {
        var key_geom = index;
        $.each(value, function (index2, value2) {
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
        });
    });
    $("#isian_odontogram").html(baris);
}

function hitungDMF() {
    var array_d = ["CFR", "RCT", "HO", "KO", "KL", "PAS", "POC"];
    var array_m = ["M", "NVT", "X", "Missing"];
    var array_f = ["COF", "F", "FIL", "REST"];

    var d = 0;
    var m = 0;
    var f = 0;
    var dont = hasil_odontogram[0];
    for (var key in dont) {
        for (var i = 0; i < dont[key].length; i++) {
            if (array_d.includes(dont[key][i].name)) {
                d++;
            }
            if (array_m.includes(dont[key][i].name)) {
                m++;
            }
            if (array_f.includes(dont[key][i].name)) {
                f++;
            }
        }
    }
    $("#d_typ").val(d);
    $("#m_typ").val(m);
    $("#f_typ").val(f);
}
