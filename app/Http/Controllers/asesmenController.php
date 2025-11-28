<?php

namespace App\Http\Controllers;

use App\Models\rs_asesmen_medis;
use App\Models\rs_gambar_gigi;
use App\Models\rs_kunjungan;
use Illuminate\Http\Request;

class asesmenController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    function indexAsesmen() {
        $data=rs_asesmen_medis::leftJoin('rs_kunjungan','rs_kunjungan.no_registrasi','=','rs_asesmen_medis.no_register')
            ->leftJoin('rs_pasien','rs_pasien.no_rm','=','rs_kunjungan.no_rm')
            ->leftJoin('rs_dokter','rs_dokter.kode_dokter','=','rs_kunjungan.kode_dokter')
            ->leftJoin('rs_poli','rs_poli.kode_poli','=','rs_kunjungan.id_poli')
            ->leftJoin('rs_penjamin','rs_penjamin.id_penjamin','=','rs_kunjungan.penjamin_id')
            ->select('rs_asesmen_medis.*','rs_kunjungan.*','rs_pasien.*','rs_dokter.nama_dokter','rs_poli.nama_poli','rs_penjamin.penjamin')
            ->paginate(10);
        return view('admin.data_asesmen',compact('data'));
    }
    function simpanAsesmen(Request $request) {
        $json=$request->json()->all();
        $odontogram=$json['odontogram'];
        $odontogram_ket=$json['odontogram_ket'];
        $no_register=$json['no_registrasi'];
        $oclusi=$json['oclusi'];
        $torus_palatinus=$json['torus_palatinus'];
        $torus_mandibularis=$json['torus_mandibularis'];
        $palatum=$json['palatum'];
        $diastema=$json['diastema'];
        $diastema_ket=$json['diastema_ket'];
        $lain=$json['lain'];
        $d_typ=$json['d_typ'];
        $m_typ=$json['m_typ'];
        $f_typ=$json['f_typ'];
        $jum_poto=$json['jum_poto'];
        $poto_ot=$json['poto_ot'];
        $jum_poto_rg=$json['jum_poto_rg'];
        $poto_ot_rg=$json['poto_ot_rg'];
        $keluhan=$json['keluhan'];
        $diagnosa=$json['diagnosa'];
        $planing= $json['planing'];
        $edukasi= $json['edukasi'];
        $tkd= $json['tkd'];
        $suhu=$json['suhu'];
        $nadi=$json['nadi'];
        $spo2=$json['spo2'];

        $kode_gambar=$this->generateGambarKode();
        // simpan ke asesmen
        $simpan=rs_asesmen_medis::create([
            'no_register'=>$no_register,
            'tanggal'=>date('Y-m-d'),
            'kode_gambar_gigi'=>$kode_gambar,
            'oclusi'=>$oclusi,
            'torus_palatinus'=>$torus_palatinus,
            'torus_mandibularis'=>$torus_mandibularis,
            'palatum'=>$palatum,
            'diastema'=>$diastema,
            'ket_lain'=>$lain,
            'd_m_f'=>$d_typ."|".$m_typ.'|'.$f_typ,
            'jum_foto'=>$jum_poto,
            'jum_foto_rontgen'=>$jum_poto_rg,
            'diastema_ket'=>$diastema_ket,
            'foto_ot'=>$poto_ot,
            'foto_ot_rg'=>$poto_ot_rg,
            'keluhan'=>$keluhan,
            "diagnosa"=>$diagnosa,
            "planning"=>$planing,
            "edukasi"=>$edukasi,
            'tkd'=>$tkd,
            'suhu'=>$suhu,
            'nadi'=>$nadi,
            'spo2'=>$spo2,
            'hasil_odontogram'=>$odontogram,
            'ket_odontogram'=>$odontogram_ket
        ]);
        // ambil keterangan
        $data_ket=json_decode($odontogram_ket,true);
        // dd($data_ket);
        // simpan ke detail gambar
        $array_ket_teeth=$data_ket['teeth_ket'];
        $array_ket_bridge=$data_ket['bridge_ket'];
        // dd($array_ket_bridge);
        for ($i=0; $i < count($array_ket_bridge); $i++) { 
            // dd($array_ket_bridge[$i]['pos']);
            $pos_general=$array_ket_bridge[$i]['pos'];
            // split dengan bridge
            $pos_general=explode(' bridge ', $pos_general);
            foreach ($pos_general as  $value_b) {
                rs_gambar_gigi::create([
                    'kode_gambar'=>$no_register,
                    'code_loc'=>$array_ket_bridge[$i]['name'],
                    'pos_loc'=>$value_b,
                    'pos_loc_general'=>$value_b,
                    'keterangan'=>$array_ket_bridge[$i]['keterangan']
                ]);
            }
        }
        for ($i=0; $i < count($array_ket_teeth); $i++) { 
            $pos_general=$array_ket_teeth[$i]['pos'];
            // ambil 2 nomor paling depan
            $pos_general=substr($pos_general, 0,2);
            rs_gambar_gigi::create([
                'kode_gambar'=>$no_register,
                'code_loc'=>$array_ket_teeth[$i]['code'],
                'pos_loc'=>$array_ket_teeth[$i]['pos'],
                'pos_loc_general'=>$pos_general,
                'keterangan'=>$array_ket_teeth[$i]['keterangan']
            ]);

        }
       
        if ($simpan) {
            return response()->json([
                'code'=>200,
                'message'=>'Data berhasil disimpan'
            ]);
        }else{
            return response()->json([
                'code'=>400,
                'message'=>'Data gagal disimpan'
            ]);
        }
    }
    function detailAsesmen($noregister) {
        $allTeeth = [
            18,17,16,15,14,13,12,11,
            21,22,23,24,25,26,27,28,
            55,54,53,52,51,
            61,62,63,64,65,
            85,84,83,82,81,
            71,72,73,74,75,
            48,47,46,45,44,43,42,41,
            31,32,33,34,35,36,37,38
        ];
        $data=rs_kunjungan::where('no_registrasi',$noregister)
        ->leftJoin('rs_pasien','rs_pasien.no_rm','=','rs_kunjungan.no_rm')
        ->leftJoin('rs_dokter','rs_dokter.kode_dokter','=','rs_kunjungan.kode_dokter')
        ->leftJoin('rs_poli','rs_poli.kode_poli','=','rs_kunjungan.id_poli')
        ->leftJoin('rs_penjamin','rs_penjamin.id_penjamin','=','rs_kunjungan.penjamin_id')
        ->first();
        return view('admin.detail_asesmen',compact('data','allTeeth'));
    }
    function  getAsesmen($noreg) {
        $data=rs_asesmen_medis::where('no_register','=',$noreg)
        ->leftJoin('rs_gambar_gigi','rs_gambar_gigi.kode_gambar','=','rs_asesmen_medis.no_register')
        ->select('rs_asesmen_medis.no_register','rs_gambar_gigi.id','rs_gambar_gigi.code_loc as code','rs_gambar_gigi.pos_loc as pos','rs_gambar_gigi.pos_loc_general','rs_gambar_gigi.keterangan')
        ->get();
        $asesmen=rs_asesmen_medis::where('no_register','=',$noreg)->first();
        $print=[
            'asesmen'=>$asesmen,
            'detail'=>$data
        ];
        return response()->json($print);
    }
    function printAsesmen($noreg) {
        $data=rs_kunjungan::where('no_registrasi',$noreg)
        ->leftJoin('rs_pasien','rs_pasien.no_rm','=','rs_kunjungan.no_rm')
        ->leftJoin('rs_dokter','rs_dokter.kode_dokter','=','rs_kunjungan.kode_dokter')
        ->leftJoin('rs_poli','rs_poli.kode_poli','=','rs_kunjungan.id_poli')
        ->leftJoin('rs_penjamin','rs_penjamin.id_penjamin','=','rs_kunjungan.penjamin_id')
        ->first();
        $asesmen=rs_asesmen_medis::where('no_register','=',$noreg)->first();
        $detail_gambar=rs_asesmen_medis::where('no_register','=',$noreg)
        ->leftJoin('rs_gambar_gigi','rs_gambar_gigi.kode_gambar','=','rs_asesmen_medis.no_register')
        ->select('rs_asesmen_medis.no_register','rs_gambar_gigi.code_loc as code','rs_gambar_gigi.pos_loc as pos','rs_gambar_gigi.pos_loc_general','rs_gambar_gigi.keterangan')
        ->get();
        return view('admin.print_asesmen',compact('asesmen','data','detail_gambar'));
    }
    function generateGambarKode() {
        $tgl=date('Y-m-d');
        $c=rs_asesmen_medis::where('tanggal','like','%'.$tgl.'%')->max('kode_gambar_gigi');
        $dt = "GB".date('Ymd');
        // dd($c);
        if ($c) {
            $xp = (int)substr($c,10,14);
            $xp++;
            $nml = $dt .  sprintf("%04s", $xp);
        } else {
            $nml = $dt . '0001';
        }
        // return $nml;
        return $nml;
    }
    function hapusDetailAsesmen($id){
        $data=rs_gambar_gigi::find($id);
        $data->delete();
        return response()->json([
            'code'=>200,
            'message'=>'Data berhasil dihapus'
        ]);
    }
    function updateAsesmen(Request $request){
        $json=$request->json()->all();
        $odontogram=$json['odontogram'];
        $odontogram_ket=$json['odontogram_ket'];
        $no_register=$json['no_registrasi'];
        $oclusi=$json['oclusi'];
        $torus_palatinus=$json['torus_palatinus'];
        $torus_mandibularis=$json['torus_mandibularis'];
        $palatum=$json['palatum'];
        $diastema=$json['diastema'];
        $diastema_ket=$json['diastema_ket'];
        $lain=$json['lain'];
        $d_typ=$json['d_typ'];
        $m_typ=$json['m_typ'];
        $f_typ=$json['f_typ'];
        $jum_poto=$json['jum_poto'];
        $poto_ot=$json['poto_ot'];
        $jum_poto_rg=$json['jum_poto_rg'];
        $poto_ot_rg=$json['poto_ot_rg'];
        $keluhan=$json['keluhan'];
        $diagnosa=$json['diagnosa'];
        $planing= $json['planing'];
        $edukasi= $json['edukasi'];
        $tkd= $json['tkd'];
        $suhu=$json['suhu'];
        $nadi=$json['nadi'];
        $spo2=$json['spo2'];

        $kode_gambar=$this->generateGambarKode();
        // simpan ke asesmen
        $simpan=rs_asesmen_medis::where('no_register','=',$no_register)
            ->update([
            'tanggal'=>date('Y-m-d'),
            'kode_gambar_gigi'=>$kode_gambar,
            'oclusi'=>$oclusi,
            'torus_palatinus'=>$torus_palatinus,
            'torus_mandibularis'=>$torus_mandibularis,
            'palatum'=>$palatum,
            'diastema'=>$diastema,
            'ket_lain'=>$lain,
            'd_m_f'=>$d_typ."|".$m_typ.'|'.$f_typ,
            'jum_foto'=>$jum_poto,
            'jum_foto_rontgen'=>$jum_poto_rg,
            'diastema_ket'=>$diastema_ket,
            'foto_ot'=>$poto_ot,
            'foto_ot_rg'=>$poto_ot_rg,
            'keluhan'=>$keluhan,
            "diagnosa"=>$diagnosa,
            "planning"=>$planing,
            "edukasi"=>$edukasi,
            'tkd'=>$tkd,
            'suhu'=>$suhu,
            'nadi'=>$nadi,
            'spo2'=>$spo2,
            'hasil_odontogram'=>$odontogram,
            'ket_odontogram'=>$odontogram_ket
        ]);
        // ambil keterangan
        $data_ket=json_decode($odontogram_ket,true);
        // dd($data_ket);
        // simpan ke detail gambar
        $array_ket_teeth=$data_ket['teeth_ket'];
        $array_ket_bridge=$data_ket['bridge_ket'];
        // dd($array_ket_bridge);
        for ($i=0; $i < count($array_ket_bridge); $i++) { 
            // dd($array_ket_bridge[$i]['pos']);
            $pos_general=$array_ket_bridge[$i]['pos'];
            // split dengan bridge
            $pos_general=explode(' bridge ', $pos_general);
            foreach ($pos_general as  $value_b) {
                rs_gambar_gigi::where([
                    'kode_gambar'=>$no_register,
                    'code_loc'=>$array_ket_bridge[$i]['name'],
                    'pos_loc'=>$value_b,
                    'pos_loc_general'=>$value_b,
                    ])
                    ->update([
                    'keterangan'=>$array_ket_bridge[$i]['keterangan']
                ]);
            }
        }
        for ($i=0; $i < count($array_ket_teeth); $i++) { 
            $pos_general=$array_ket_teeth[$i]['pos'];
            // ambil 2 nomor paling depan
            $pos_general=substr($pos_general, 0,2);
            rs_gambar_gigi::where([
                    'kode_gambar'=>$no_register,
                    'code_loc'=>$array_ket_teeth[$i]['code'],
                    'pos_loc'=>$array_ket_teeth[$i]['pos'],
                    'pos_loc_general'=>$pos_general,
                ])
                ->update([
                'keterangan'=>$array_ket_teeth[$i]['keterangan']
            ]);

        }
       
        if ($simpan) {
            return response()->json([
                'code'=>200,
                'message'=>'Data berhasil disimpan'
            ]);
        }else{
            return response()->json([
                'code'=>400,
                'message'=>'Data gagal disimpan'
            ]);
        }
    }
}
