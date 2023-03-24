<?php

namespace App\Http\Controllers;

use App\Models\Kuota;
use App\Models\Satuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class KuotaController extends Controller
{
    public function index()
    {
        $kuota = Kuota::with('satuan')->get();
        $satuan = Satuan::get();
        $data = [
            'kuota'=> $kuota,
            'satuan'=> $satuan,
        ];

        return view('kuota.get',$data);
    }

    public function create(Request $request)
    {
        $kuota = Kuota::create($request->all());
        Session::flash('message', 'Data berhasil di tambah');
        return redirect('/kuota');
    }

    public function update_status(Request $request, $id)
    {
        $aktif = $request->input('aktif');
        DB::table('kuotas')
        ->where('id', $id)
        ->update(['aktif' => $aktif]);
        Session::flash('message', 'Data berhasil di update');
        return redirect('/kuota');
    }

    public function update(Request $request, $id)
    {
      $nama_paket = $request->input('nama_paket');
      $berat = $request->input('berat');
      $harga = $request->input('harga');
      $cabang = $request->input('cabang');
      $satuan_id = $request->input('satuan_id');

      DB::table('kuotas')
      ->where('id', $id)
      ->update(['nama_paket' => $nama_paket, 'berat' => $berat, 'harga' => $harga,
       'cabang' => $cabang, 'satuan_id' => $satuan_id]);
      Session::flash('message', 'Data berhasil di update');
        return redirect('/kuota');
    }
}
