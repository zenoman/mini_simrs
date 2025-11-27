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
            'foto_ot_rg'=>$poto_ot_rg
        ]);
        // 
        foreach ($odontogram as $value) {
            foreach ($value as $item) {
                for ($i=0; $i < count($item); $i++) { 
                    // simpan gambar pos, code ,pos-detail
                    $code=$item[$i]['name'];
                    $pos=$item[$i]['pos'];
                    // ambil pos 2 angka didepam
                    $pos_general=substr($pos,0,2);
                    rs_gambar_gigi::create([
                        'kode_gambar'=>$kode_gambar,
                        'code_loc'=>$code,
                        'pos_loc'=>$pos,
                        'pos_loc_general'=>$pos_general,
                        'keterangan'=>$item[$i]['keterangan']
                    ]);
                }
            }
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
        $data=rs_kunjungan::where('no_registrasi',$noregister)
        ->leftJoin('rs_pasien','rs_pasien.no_rm','=','rs_kunjungan.no_rm')
        ->leftJoin('rs_dokter','rs_dokter.kode_dokter','=','rs_kunjungan.kode_dokter')
        ->leftJoin('rs_poli','rs_poli.kode_poli','=','rs_kunjungan.id_poli')
        ->leftJoin('rs_penjamin','rs_penjamin.id_penjamin','=','rs_kunjungan.penjamin_id')
        ->first();
        return view('admin.detail_asesmen',compact('data'));
    }
    function  getAsesmen($noreg) {
        $data=rs_asesmen_medis::where('no_register','=',$noreg)
        ->leftJoin('rs_gambar_gigi','rs_gambar_gigi.kode_gambar','=','rs_asesmen_medis.kode_gambar_gigi')
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
        ->leftJoin('rs_gambar_gigi','rs_gambar_gigi.kode_gambar','=','rs_asesmen_medis.kode_gambar_gigi')
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
}
