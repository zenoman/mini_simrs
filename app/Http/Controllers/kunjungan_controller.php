<?php

namespace App\Http\Controllers;

use App\Models\rs_dokter;
use App\Models\rs_kunjungan;
use App\Models\rs_penjamin;
use App\Models\rs_poli;
use Illuminate\Http\Request;

class kunjungan_controller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    function indexKunjungan(){
        $dokter=rs_dokter::all();
        $poli=rs_poli::all();
        $penjamin=rs_penjamin::all();
        $kunjungan=rs_kunjungan::leftJoin('rs_dokter','rs_dokter.kode_dokter','=','rs_kunjungan.kode_dokter')
        ->leftJoin('rs_pasien','rs_pasien.no_rm','=','rs_kunjungan.no_rm')
        ->leftJoin('rs_poli','rs_poli.kode_poli','=','rs_kunjungan.id_poli')
        ->leftJoin('rs_penjamin','rs_penjamin.id_penjamin','=','rs_kunjungan.penjamin_id')
        ->select('rs_kunjungan.*','rs_kunjungan.id as id_kunjungan','rs_pasien.*','rs_dokter.nama_dokter','rs_poli.nama_poli','rs_penjamin.penjamin')
        ->paginate(10);
        return view('admin.registrasi',compact('dokter','poli','penjamin','kunjungan'));
    }   
    function addKunjungan(Request $request){
        // $validate=$request->validate([
        //     'tgl_kunjungan'=>'required',
        //     'no_registrasi'=>'required',
        //     'no_rm'=>'required',
        //     'id_dokter'=>'required',
        //     'id_poli'=>'required',
        //     'penjamin_id'=>'required',
        // ]);
        $tgl=date('Y-m-d');
        $no_reg=$this->generateNoRegister();
        rs_kunjungan::create([
            'tanggal_kunjungan'=>$tgl,
            'no_registrasi'=>$no_reg,
            'no_rm'=>$request->no_rm,
            'kode_dokter'=>$request->id_dokter,
            'id_poli'=>$request->id_poli,
            'penjamin_id'=>$request->id_penjamin,
            'instalasi'=>$request->instalasi,
        ]);
        return redirect('kunjungan/index-kunjungan')->with('sukses','Data Berhasil Disimpan');
    }
    function generateNoRegister(){
        $tgl=date('Y-m-d');
        $c=rs_kunjungan::where('tanggal_kunjungan','like','%'.$tgl.'%')->max('no_registrasi');
        $dt = "KJ".date('Ymd');
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

    function deleteKunjungan($id){
        rs_kunjungan::where('id','=',$id)->delete();
        return redirect('kunjungan/index-kunjungan')->with('sukses','Data Berhasil Dihapus');
    }
    function editKunjungan($id){
        $data=rs_kunjungan::where('rs_kunjungan.id','=',$id)
        ->leftJoin('rs_dokter','rs_dokter.kode_dokter','=','rs_kunjungan.kode_dokter')
        ->leftJoin('rs_pasien','rs_pasien.no_rm','=','rs_kunjungan.no_rm')
        ->leftJoin('rs_poli','rs_poli.kode_poli','=','rs_kunjungan.id_poli')
        ->leftJoin('rs_penjamin','rs_penjamin.id_penjamin','=','rs_kunjungan.penjamin_id')
        ->select('rs_kunjungan.*','rs_kunjungan.id as id_kunjungan','rs_pasien.*','rs_dokter.nama_dokter','rs_poli.nama_poli','rs_penjamin.penjamin')
        ->first();
        $dokter=rs_dokter::all();
        $poli=rs_poli::all();
        $penjamin=rs_penjamin::all();
        return view('admin.edit_kunjungan',compact('data','dokter','poli','penjamin'));
    }
    function updateKunjungan(Request $request){
        // $validate=$request->validate([
        //     'tgl_kunjungan'=>'required',
        //     'no_registrasi'=>'required',
        //     'no_rm'=>'required',
        //     'id_dokter'=>'required',
        //     'id_poli'=>'required',
        //     'penjamin_id'=>'required',
        // ]);
        rs_kunjungan::where('id','=',$request->id_kunjungan)->update([
            'no_rm'=>$request->no_rm,
            'kode_dokter'=>$request->id_dokter,
            'id_poli'=>$request->id_poli,
            'penjamin_id'=>$request->id_penjamin,
            'instalasi'=>$request->instalasi,
        ]);
        return redirect('kunjungan/index-kunjungan')->with('sukses','Data Berhasil Diupdate');
    }
    function asesmenGigi($id){
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
        $data=rs_kunjungan::where('no_registrasi','=',$id)
        ->leftJoin('rs_pasien','rs_pasien.no_rm','=','rs_kunjungan.no_rm')
        ->leftJoin('rs_dokter','rs_dokter.kode_dokter','=','rs_kunjungan.kode_dokter')
        ->leftJoin('rs_poli','rs_poli.kode_poli','=','rs_kunjungan.id_poli')
        ->leftJoin('rs_penjamin','rs_penjamin.id_penjamin','=','rs_kunjungan.penjamin_id')
        ->first();
        return view('admin.asesmen_gigi',compact('id','data','allTeeth'));
    }
}
