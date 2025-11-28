 $("#odontogram_edit").odontogram("init", {
    width: "1200px",
    height: "430px",
});


// var saveData;
// function initial_data() {
//     const odonto = $("#odontogram").data("odontogram");
//     if (saveData !== undefined) {
//         // 2. Konversi data gigi biasa ke format geometry
//         const teethGeometry = odonto.setGeometryByPos(saveData.teeth); // Ini return objek geometry
//         // 3. Tambahkan bridge sebagai objek literal (bukan instance!)
//         // Gunakan key khusus agar tidak bentrok
//         if (!teethGeometry["BRIDGES"]) teethGeometry["BRIDGES"] = [];
//         for (const bridge of saveData.bridges) {
//             // Pastikan x/y tetap string atau number — tidak masalah karena convertGeomFromObject parse otomatis
//             teethGeometry["BRIDGES"].push(bridge);
//         }
//         $("#odontogram").odontogram("setGeometry", teethGeometry);
//     }
//     //
// }

var odontogram_arr = [];
var odontogram_bridge_arr = [];
// var final_odontogram_arr = [];

$("#odontogram_edit").on("change", function (_, geometry) {
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
                var hasil_odontogram = JSON.parse(lodont);
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
                $('#keluhan').val(asesmen.keluhan)
                $('#diagnosa').val(asesmen.diagnosa)
                $('#planing').val(asesmen.planning)
                $('#edukasi').val(asesmen.edukasi)
                $('#tkd').val(asesmen.tkd)
                $('#suhu').val(asesmen.suhu)
                $('#nadi').val(asesmen.nadi)
                $('#spo2').val(asesmen.spo2)
                var lodont = asesmen.hasil_odontogram;
                var hasil_odontogram = JSON.parse(lodont);
                saveData = hasil_odontogram;
                // refreshOdontogramData(hasil_odontogram);
                var lokent=asesmen.ket_odontogram;
                var ket_odontogram = JSON.parse(lokent);
                final_ket_arr = ket_odontogram;
                tampilKeterangan();
                // console.log(saveData);
            }
        },
    });
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
function printAsesmen(noreg) {
    // buka link
    window.open("/asesmen/print-asesmen/" + noreg, "_blank");
}