var od = $("#odontogram").odontogram("init", {
    width: "1200px",
    height: "430px",
});
$(".sl2").select2({
    theme: "bootstrap4",
});
var saveData;
// initial_data();
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
    }
    //
}
function refreshOdontogramData(data) {
    const odonto = $("#odontogram").data("odontogram");
    if (data !== undefined) {
        // 2. Konversi data gigi biasa ke format geometry
        const teethGeometry = odonto.setGeometryByPos(data.teeth); // Ini return objek geometry
        // 3. Tambahkan bridge sebagai objek literal (bukan instance!)
        // Gunakan key khusus agar tidak bentrok
        if (!teethGeometry["BRIDGES"]) teethGeometry["BRIDGES"] = [];
        for (const bridge of data.bridges) {
            // Pastikan x/y tetap string atau number — tidak masalah karena convertGeomFromObject parse otomatis
            teethGeometry["BRIDGES"].push(bridge);
        }
        $("#odontogram").odontogram("setGeometry", teethGeometry);
    }
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
                // tambah keterangan dalam item
                // item.pos1 = "-";
                // item.pos2 = "-";
                // item.keterangan = "-";
            } else {
                odontogram_arr.push({
                    code: item.name,
                    pos: item.pos ?? "",
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
            // if (final_odontogram_arr.teeth[i].keterangan == '-') {
            // final_odontogram_arr.teeth[i].ket = [];
            // tampilkan isian keterangan teeth
            $("#tambah_keterangan").removeClass("d-none");
            $("#teeth_isian").removeClass("d-none");
            $("#id_teeth_ket").val(i);
            $("#bridge_isian").addClass("d-none");
            // }
        }
    }
    // cek apakah type bridge
    if (final_odontogram_arr.bridges.length > 0) {
        for (var i = 0; i < final_odontogram_arr.bridges.length; i++) {
            // if (final_odontogram_arr.bridges[i].keterangan == '-') {
            // final_odontogram_arr.bridge[i].ket = [];
            // tampilkan isian keterangan bridge
            $("#tambah_keterangan").removeClass("d-none");
            $("#id_bridge_ket").val(i);
            $("#teeth_isian").addClass("d-none");
            $("#bridge_isian").removeClass("d-none");
            // }
        }
    }
}
function resetIsiKet() {
    $("#tambah_keterangan").addClass("d-none");
    $("#teeth_isian").addClass("d-none");
    $("#teeth_ket").val("");
    $("#bridge_isian").addClass("d-none");
}
var odontogram_ket = [];
var odontogram_ket_bridge = [];
var final_ket_arr = [];
function simpanKetTeeth() {
    // cari pada final odontogram teeth dengan nomor array
    var id_array = $("#id_teeth_ket").val();
    var list_odo = final_odontogram_arr.teeth[id_array];
    // tambahkan pada odontogram_ket
    odontogram_ket.push({
        pos: list_odo.pos,
        code: list_odo.code,
        keterangan: $("#teeth_ket").val(),
    });
    final_ket_arr = {
        teeth_ket: odontogram_ket,
        bridge_ket: odontogram_ket_bridge,
    };
    // tambahakan keterangan pada final odontogram teeth yang belum ada keteranagn
    // for (var i = 0; i < final_odontogram_arr.teeth.length; i++) {
    //     if (final_odontogram_arr.teeth[i].keterangan == '-') {
    //         final_odontogram_arr.teeth[i].keterangan = $("#teeth_ket").val();
    //     }
    // }
    resetIsiKet();
    console.log(final_ket_arr);
    // tampilkan Pada keterangan
    tampilKeterangan();
}
function simpanKetBridge() {
    var id_array = $("#id_bridge_ket").val();
    var list_odo = final_odontogram_arr.bridges[id_array];
    odontogram_ket_bridge.push({
        pos: $("#bridge1").val() + " bridge " + $("#bridge2").val(),
        pos1: $("#bridge1").val(),
        pos2: $("#bridge2").val(),
        name: list_odo.name,
        keterangan: $("#bridge_ket").val(),
    });
    final_ket_arr = {
        teeth_ket: odontogram_ket,
        bridge_ket: odontogram_ket_bridge,
    };
    // tambahakan keterangan pada final odontogram teeth yang belum ada keteranagn
    // for (var i = 0; i < final_odontogram_arr.bridges.length; i++) {
    //     if (final_odontogram_arr.bridges[i].keterangan == '-') {
    //         final_odontogram_arr.bridges[i].keterangan = $("#bridge_ket").val();
    //         final_odontogram_arr.bridges[i].pos1 = $("#bridge1").val();
    //         final_odontogram_arr.bridges[i].pos2 = $("#bridge2").val();
    //     }
    // }
    resetIsiKet();
    console.log(final_ket_arr);
    tampilKeterangan();
}
function tampilKeterangan() {
    var baris = "";
    // teeth
    for (let index = 0; index < final_ket_arr.teeth_ket.length; index++) {
        // tampilkan dalam tabel
        baris += `<tr>
        <td>${final_ket_arr.teeth_ket[index].pos}</td>
        <td>${final_ket_arr.teeth_ket[index].code}</td>
        <td>
            <input type="text" class="form-control form-control-sm" id="teeth_ket_${index}" value="${final_ket_arr.teeth_ket[index].keterangan}">
        </td>
        <td>
            <button class="btn btn-sm btn-primary" onclick="editTeethKet('${index}')"><i class="bi bi-pencil"></i></button>
            <button class="btn btn-sm btn-danger" onclick="hapusTeethKet('${index}')"><i class="bi bi-trash"></i></button>
        </td>
        </tr>`;
    }
    // bridge
    for (let index = 0; index < final_ket_arr.bridge_ket.length; index++) {
        // tampilkan dalam tabel
        baris += `<tr>
        <td>${
            final_ket_arr.bridge_ket[index].pos1 +
            " Bridge Ke " +
            final_ket_arr.bridge_ket[index].pos2
        }</td>
        <td>${final_ket_arr.bridge_ket[index].name}</td>
        <td>
            <input type="text" class="form-control form-control-sm" id="bridge_ket_${index}" value="${
            final_ket_arr.bridge_ket[index].keterangan
        }">
        </td>
        <td>
            <button class="btn btn-sm btn-primary" onclick="editBridgeKet('${index}')"><i class="bi bi-pencil"></i></button>
            <button class="btn btn-sm btn-danger" onclick="hapusBridgeKet('${index}')"><i class="bi bi-trash"></i></button>
        </td>
        </tr>`;
    }
    $("#tampil_isi_ket").html(baris);
    initial_data();
}
function editTeethKet(id) {
    var ket = $("#teeth_ket_" + id).val();
    // update ke array
    final_ket_arr.teeth_ket[id].keterangan = ket;
    tampilKeterangan();
    Swal.fire({
        icon: "success",
        title: "Data berhasil diubah",
        showConfirmButton: false,
        timer: 1500,
    });
}
function hapusTeethKet(id) {
    final_ket_arr.teeth_ket.splice(id, 1);
    // hapus pada final odontogram
    final_odontogram_arr.teeth.splice(id, 1);
    tampilKeterangan();
    // console.log(final_odontogram_arr);
    refreshOdontogramData(final_odontogram_arr);
}
function hapusBridgeKet(id) {
    final_ket_arr.bridge_ket.splice(id, 1);
    final_odontogram_arr.bridges.splice(id, 1);
    tampilKeterangan();
    // console.log(final_odontogram_arr);
    refreshOdontogramData(final_odontogram_arr);
    console.log(final_odontogram_arr);
}
function editBridgeKet(id) {
    var ket = $("#bridge_ket_" + id).val();
    // update ke array
    final_ket_arr.bridge_ket[id].keterangan = ket;
    tampilKeterangan();
    Swal.fire({
        icon: "success",
        title: "Data berhasil diubah",
        showConfirmButton: false,
        timer: 1500,
    });
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
    var keluhan = $("#keluhan").val();
    var diagnosa = $("#diagnosa").val();
    var planing = $("#planing").val();
    var edukasi = $("#edukasi").val();
    var tkd = $("#tkd").val();
    var suhu = $("#suhu").val();
    var nadi = $("#nadi").val();
    var spo2 = $("#spo2").val();
    // ambil keterangan
    // $('input[name="ket_odontogram[]"]').each(function () {
    //     var item_ket_odontogram = {};
    //     var itemnya = $(this).val();
    //     item_ket_odontogram["ket"] = itemnya;
    //     hasil_keterangan.push(item_ket_odontogram);
    // });
    // insert ke terangan pada odontogram

    var params = {
        odontogram: JSON.stringify(final_odontogram_arr),
        odontogram_ket: JSON.stringify(final_ket_arr),
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
        keluhan: keluhan,
        diagnosa: diagnosa,
        planing: planing,
        edukasi: edukasi,
        tkd: tkd,
        suhu: suhu,
        nadi: nadi,
        spo2: spo2,
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

function hitungDMF() {
    var array_d = ["CFR", "RCT", "HO", "KO", "KL", "PAS", "POC"];
    var array_m = ["M", "NVT", "X", "Missing"];
    var array_f = ["COF", "F", "FIL", "REST"];

    var d = 0;
    var m = 0;
    var f = 0;
    var dont = final_odontogram_arr.teeth;
    // for (var key in dont) {
    for (var i = 0; i < dont.length; i++) {
        if (array_d.includes(dont[i].code)) {
            d++;
        }
        if (array_m.includes(dont[i].code)) {
            m++;
        }
        if (array_f.includes(dont[i].code)) {
            f++;
        }
    }
    // }
    $("#d_typ").val(d);
    $("#m_typ").val(m);
    $("#f_typ").val(f);
}

function loadAsesmenData(jenis) {
    var noreg = $("#no_registrasi").val();
    // ambil hasil asesmen
    $.ajax({
        url: "/asesmen/get-asesmen/" + noreg,
        dataType: "JSON",
        type: "get",
        success: function (res) {

            var asesmen = res.asesmen;
            if(jenis=="print"){
                $('#oclusi').html(asesmen.oclusi)
                $('#torus_palatinus').html(asesmen.torus_palatinus)
                $('#torus_mandibularis').html(asesmen.torus_mandibularis)
                $('#palatum').html(asesmen.palatum)
                $('#diastema').html(asesmen.diastema)
                $('#lainLain').html(asesmen.ket_lain)
                var dmf = asesmen.d_m_f;
                dmf = dmf.split("|");
                $("#d_typ").html(dmf[0]);
                $("#m_typ").html(dmf[1]);
                $("#f_typ").html(dmf[2]);
                $('#ket_photo').html(asesmen.jum_foto);
                $('#jenis_photo').html(asesmen.foto_ot);
                $('#ket_photo_rg').html(asesmen.jum_foto_rontgen);
                $('#jenis_photo_org').html(asesmen.foto_ot_rg);
                $('#keluhan').html(asesmen.keluhan)
                $('#diagnosa').html(asesmen.diagnosa)
                $('#planing').html(asesmen.planning)
                $('#edukasi').html(asesmen.edukasi)
                $('#tkd').html(asesmen.tkd)
                $('#suhu').html(asesmen.suhu)
                $('#nadi').html(asesmen.nadi)
                $('#spo2').html(asesmen.spo2)
                var lodont = asesmen.hasil_odontogram;
                hasil_odontogram = JSON.parse(lodont);
                refreshOdontogramData(hasil_odontogram);
            }else{
                $("#oclusi").val(asesmen.oclusi).trigger("change");
                $("#torus_palatinus")
                    .val(asesmen.torus_palatinus)
                    .trigger("change");
                $("#torus_mandibularis")
                    .val(asesmen.torus_mandibularis)
                    .trigger("change");
                $("#palatum").val(asesmen.palatum).trigger("change");
                $("#diastema").val(asesmen.diastema).trigger("change");
                $("#no_gambar").val(asesmen.kode_gambar_gigi);
                if (asesmen.diastema == "Ada") {
                    $("#dst_ada_ket").removeClass("d-none");
                }
                $("#dst_ada_ket").val(asesmen.diastema_ket);
    
                $("#lainLain").val(asesmen.ket_lain);
                // explode by |
                var dmf = asesmen.d_m_f;
                dmf = dmf.split("|");
                $("#d_typ").val(dmf[0]);
                $("#m_typ").val(dmf[1]);
                $("#f_typ").val(dmf[2]);
                $("#ket_photo").val(asesmen.jum_poto);
                $("#jenis_photo").val(asesmen.foto_ot).trigger("change");
                $("#ket_photo_rg").val(asesmen.jum_poto_rg);
                $("#jenis_photo_org").val(asesmen.foto_ot_rg).trigger("change");
            }
        },
    });
}
function printAsesmen(noreg) {
    // buka link
    window.open("/asesmen/print-asesmen/" + noreg, "_blank");
}
