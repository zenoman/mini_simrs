<?php

namespace App\Http\Controllers;

use App\Models\model_rs_jadwal;
use App\Models\rs_dokter;
use App\Models\rs_kunjungan;
use App\Models\rs_pasien;
use App\Models\rs_penjamin;
use App\Models\rs_poli;
use App\Models\rs_trx;
use Illuminate\Http\Request;

class api_controller extends Controller
{
    function api_get_pasien(){
        $pasien = rs_pasien::all();
        return response()->json($pasien);
    }
    function api_get_pasien_id($id){
        $pasien = rs_pasien::where('no_rm',$id)->first();
        return response()->json($pasien);
    }
    function api_simpan_pasien(Request $request){
        $pasien = rs_pasien::create([
            'no_rm'=>$request->no_rm,
            'nama_pasien'=>$request->nama_pasien,
            'alamat'=>$request->alamat,
            'tanggal_lahir'=>$request->tanggal_lahir,
            'jenis_kelamin'=>$request->jenis_kelamin,
        ]);
        return response()->json($pasien);
    }
    function loginPasien(Request $request){
        $pasien = rs_pasien::where('no_rm',$request->no_rm)->first();
        if(empty($pasien)){
            return response()->json(['code'=>400,'message' => 'Data Tidak Ditemukan, Coba Menu Daftar Pasien!']);
        }else{
            $print=[
                'code'=>200,
                'message'=>'Login Berhasil!',
                'pasien'=>$pasien
            ];
            return response()->json($print);
        }
    }
    function daftarPasien(Request $request){
        $validate=$request->validate([  
            'nama_pasien'=>'required',
            'alamat'=>'required',
            'tanggal_lahir'=>'required',
            'jenis_kelamin'=>'required',
        ]);
    //   output validate ke json
        if($validate){
            $pasien = rs_pasien::create([
                'nama_pasien'=>$request->nama_pasien,
                'alamat'=>$request->alamat,
                'tanggal_lahir'=>$request->tanggal_lahir,
                'jenis_kelamin'=>$request->jenis_kelamin,
            ]);
            $print=[
                'code'=>200,
                'message'=>'Data Berhasil Disimpan',
                'data'=>$pasien
            ];
            return response()->json($pasien);
        }else{
            $print=[
                'code'=>400,
                'message'=>'Data Tidak Valid',
            ];
            return response()->json($print);
        }
    }
    function jadwalDokter($id){
        $data=model_rs_jadwal::leftJoin('rs_dokter','rs_dokter.kode_dokter','=','rs_jadwal_dokter.id_dokter')
            ->where('rs_dokter.kode_dokter','=',$id)
            ->leftJoin('rs_poli','rs_poli.kode_poli','=','rs_jadwal_dokter.kode_poli')
            ->select('rs_jadwal_dokter.*','rs_dokter.nama_dokter','rs_poli.nama_poli')
            ->get();
        return response()->json($data);
    }
    function listDokter() {
        $dokter=model_rs_jadwal::
        leftJoin('rs_dokter','rs_dokter.kode_dokter','=','rs_jadwal_dokter.id_dokter')
        ->leftJoin('rs_poli','rs_poli.kode_poli','=','rs_jadwal_dokter.kode_poli')
        ->select('rs_jadwal_dokter.*','rs_dokter.nama_dokter','rs_poli.nama_poli')
        // ->groupBy('rs_jadwal_dokter.id_dokter')
        ->groupBy('rs_jadwal_dokter.id_dokter')
        ->get();
        return response()->json($dokter);
    }
    function listPoli() {
        $poli=rs_poli::get();
        return response()->json($poli);
    }

    function listPenjamin() {
        $penjamin=rs_penjamin::get();
        return response()->json($penjamin);
    }
    function riwayatKunjungan($id){
        $kunjungan=rs_kunjungan::leftJoin('rs_dokter','rs_dokter.kode_dokter','=','rs_kunjungan.kode_dokter')
        ->leftJoin('rs_pasien','rs_pasien.no_rm','=','rs_kunjungan.no_rm')
        ->leftJoin('rs_poli','rs_poli.kode_poli','=','rs_kunjungan.id_poli')
        ->leftJoin('rs_penjamin','rs_penjamin.id_penjamin','=','rs_kunjungan.penjamin_id')
        ->select('rs_kunjungan.*','rs_kunjungan.id as id_kunjungan','rs_pasien.*','rs_dokter.nama_dokter','rs_poli.nama_poli','rs_penjamin.penjamin')
        ->where('rs_kunjungan.no_rm','=',$id)->get();
        return response()->json($kunjungan);
    }
    function listAntrian($norm){
        $kunjungan=rs_kunjungan::where('rs_kunjungan.no_rm',$norm)
            ->leftJoin('rs_pasien','rs_pasien.no_rm','=','rs_kunjungan.no_rm')
            ->leftJoin('rs_dokter','rs_dokter.kode_dokter','=','rs_kunjungan.kode_dokter')
            ->leftJoin('rs_poli','rs_poli.kode_poli','=','rs_kunjungan.id_poli')
            ->leftJoin('rs_penjamin','rs_penjamin.id_penjamin','=','rs_kunjungan.penjamin_id')
            ->select('rs_kunjungan.*','rs_kunjungan.id as id_kunjungan','rs_pasien.*','rs_dokter.nama_dokter','rs_poli.nama_poli','rs_penjamin.penjamin')
            ->orderBy('rs_kunjungan.id','desc')
            ->get();
        return response()->json($kunjungan);
    }
    function riwayatDetailKunjungan($id){
        $bill=rs_trx::leftJoin('rs_kunjungan','rs_kunjungan.no_registrasi','=','rs_trx.no_register')
            ->leftJoin('rs_pasien','rs_pasien.no_rm','=','rs_kunjungan.no_rm')
            ->leftJoin('rs_dokter','rs_dokter.kode_dokter','=','rs_kunjungan.kode_dokter')
            ->leftJoin('rs_poli','rs_poli.kode_poli','=','rs_kunjungan.id_poli')
            ->leftJoin('rs_penjamin','rs_penjamin.id_penjamin','=','rs_kunjungan.penjamin_id')
            ->select('rs_trx.*','rs_kunjungan.*','rs_pasien.*','rs_dokter.nama_dokter','rs_poli.nama_poli','rs_penjamin.penjamin')
            ->where('rs_trx.no_register','=',$id)->get();
        return response()->json($bill);
    }
    function ambilAntrian(Request $request){
        $tgl=$request->tgl_booking;
        $no_reg=$this->generateNoRegister($tgl);
        $no_antrian=$this->generateNoAntrian($tgl);
        rs_kunjungan::create([
            'tanggal_kunjungan'=>$tgl,
            'no_registrasi'=>$no_reg,
            'no_urut'=>$no_antrian,
            'no_rm'=>$request->no_rm,
            'kode_dokter'=>$request->id_dokter,
            'id_poli'=>$request->id_poli,
            'penjamin_id'=>$request->id_penjamin,
            'instalasi'=>$request->instalasi,
        ]);
        $print=[
            'code'=>200,
            'message'=>'Antrian Berhasil Disimpan',
            'no_reg'=>$no_reg
        ];
        return response()->json($print);
    }
    function generateNoRegister($tgl){
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
    function generateNoAntrian($tgl){
        $c=rs_kunjungan::where('tanggal_kunjungan','like','%'.$tgl.'%')->max('no_urut');
        $dt = "KJ".date('Ymd');
        // dd($c);
        if ($c) {
            $xp = (int)substr($c,0,3);
            $xp++;
            $nml = $dt .  sprintf("%04s", $xp);
        } else {
            $nml = $dt . '0001';
        }
        // return $nml;
        return $nml;
    }
}
