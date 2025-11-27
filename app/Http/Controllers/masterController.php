<?php

namespace App\Http\Controllers;

use App\Models\rs_detail_trx;
use App\Models\rs_kunjungan;
use App\Models\rs_pasien;
use App\Models\rs_trx;
use Illuminate\Http\Request;

class masterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    function indexPasien(Request $request) {
        if($request->has('cari')){
            if($request->cari==""){
                $data=rs_pasien::paginate(10);
            }else{
                $param=$request->cari;
                $data=rs_pasien::where('nama_pasien','like','%'.$param.'%')
                    ->orWhere('no_rm','like','%'.$param.'%')
                    ->orWhere('alamat','like','%'.$param.'%')
                    ->paginate(100);
            }
        }else{
            $data=rs_pasien::paginate(5);
        }
        return view('admin.pasien',compact('data'));
    }
    function addPasien(Request $request){

        $validate=$request->validate([
            'nama'=>'required',
            'alamat'=>'required',
            'tanggal_lahir'=>'required',
            'jenis_kelamin'=>'required',
        ]);
        $normnya=$this->generateNoRkm();
        rs_pasien::create([
            'nama_pasien'=>$request->nama,
            'no_rm'=>$normnya,
            'alamat'=>$request->alamat,
            'tanggal_lahir'=>$request->tanggal_lahir,
            'jenis_kelamin'=>$request->jenis_kelamin,
        ]);
        return redirect('pasien/index-pasien')->with('sukses','Data Berhasil Disimpan');
    }
    function generateNoRkm(){
        $data=rs_pasien::latest()->first();
        if($data==null){
            $no_rm=1;
        }else{
            $no_rm=(int)$data->no_rm+1;
        }
        return $no_rm;
    }
    function deletePasien($id){
        $data=rs_pasien::find($id);
        $data->delete();
        return redirect('pasien/index-pasien')->with('sukses','Data Berhasil Dihapus');
    }
    function editPasien($id){
        $data=rs_pasien::find($id);
        return view('admin.edit_pasien',compact('data'));
    }
    function updatePasien(Request $request,$id){
        $validate=$request->validate([
            'nama'=>'required',
            'alamat'=>'required',
            'tanggal_lahir'=>'required',
            'jenis_kelamin'=>'required',
        ]);
        $data=rs_pasien::find($id);
        $data->update([
            'nama_pasien'=>$request->nama,
            'alamat'=>$request->alamat,
            'tanggal_lahir'=>$request->tanggal_lahir,
            'jenis_kelamin'=>$request->jenis_kelamin,
        ]);
        return redirect('pasien/index-pasien')->with('sukses','Data Berhasil Diupdate');
    }
    function detailPasien($id){
        $data=rs_pasien::where('no_rm','=',$id)->first();
        $kunjungan=rs_kunjungan::where('rs_kunjungan.no_rm','=',$id)
        ->leftJoin('rs_dokter','rs_dokter.kode_dokter','=','rs_kunjungan.kode_dokter')
        ->leftJoin('rs_pasien','rs_pasien.no_rm','=','rs_kunjungan.no_rm')
        ->leftJoin('rs_poli','rs_poli.kode_poli','=','rs_kunjungan.id_poli')
        ->leftJoin('rs_penjamin','rs_penjamin.id_penjamin','=','rs_kunjungan.penjamin_id')
        ->select('rs_kunjungan.*','rs_pasien.*','rs_dokter.nama_dokter','rs_poli.nama_poli','rs_penjamin.penjamin')
        ->paginate(10);
        return view('admin.detail_pasien',compact('data','kunjungan'));
    }
    function cariPasien(Request $request){
        $param=$request->search;
        $data=rs_pasien::orWhere('no_rm','like','%'.$param.'%')
            ->get();
            return response()->json($data);
    }



    function indexBilling(){
        $kunjungan=rs_kunjungan::leftJoin('rs_pasien','rs_pasien.no_rm','=','rs_kunjungan.no_rm')
        ->leftJoin('rs_dokter','rs_dokter.kode_dokter','=','rs_kunjungan.kode_dokter')
        ->leftJoin('rs_poli','rs_poli.kode_poli','=','rs_kunjungan.id_poli')
        ->leftJoin('rs_penjamin','rs_penjamin.id_penjamin','=','rs_kunjungan.penjamin_id')
        ->leftJoin('rs_trx','rs_trx.no_register','=','rs_kunjungan.no_registrasi')
        ->select('rs_kunjungan.*','rs_pasien.*','rs_dokter.nama_dokter','rs_poli.nama_poli','rs_penjamin.penjamin','rs_trx.*')
        ->paginate(10);
        return view('admin.billing',compact('kunjungan'));
    }
    function pembayaranBilling($id){
        $data=rs_kunjungan::where('no_registrasi','=',$id)
        ->leftJoin('rs_pasien','rs_pasien.no_rm','=','rs_kunjungan.no_rm')
        ->first();
        return view('admin.pembayaran_billing',compact('data'));
    }

    function addPembayaran(Request $request){
        $tgl=date('Y-m-d');
        $nobil=$this->generateNoBill();
        rs_trx::create([
            'no_transaksi'=>$nobil,
            'tanggal'=>$tgl,
            'no_register'=>$request->no_register,
            'total_harga'=>$request->total,
        ]);
        rs_detail_trx::create([
            'no_transaksi'=>$nobil,
            'nama_tindakan'=>$request->tindakan,
            'harga'=>$request->harga,
            'qty'=>$request->qty,
            'subtotal'=>$request->total,
        ]);
        return redirect('billing/index-billing')->with('sukses','Data Berhasil Disimpan');
    }
    function generateNoBill(){
        $tgl=date('Y-m-d');
        $c=rs_trx::where('tanggal','like','%'.$tgl.'%')->max('no_transaksi');
        $dt = "TX".date('Ymd');
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
    function detailBilling($id) {
        $data=rs_detail_trx::where('no_transaksi','=',$id)->get();        
        return view('admin.detail_billing',compact('data'));
    }
    function hapusBilling($id){
        rs_detail_trx::where('no_transaksi','=',$id)->delete();
        rs_trx::where('no_transaksi','=',$id)->delete();
        return redirect('billing/index-billing')->with('sukses','Data Berhasil Dihapus');
    }

}

