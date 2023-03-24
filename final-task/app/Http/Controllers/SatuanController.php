<?php

namespace App\Http\Controllers;

use App\Models\Satuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class SatuanController extends Controller
{
    public function index()
    {
        $satuan = Satuan::get();
        $data = [
            'satuan'=> $satuan,
        ];

        return view('satuan.get',$data);
    }

    public function store(Request $request)
    {
        $satuan = Satuan::create($request->all());
        Session::flash('message', 'Data berhasil di tambah');
        return redirect('/');
    }


    public function update_status(Request $request, $id)
    {
        $status = $request->input('status');
        DB::table('satuans')
        ->where('id', $id)
        ->update(['status' => $status]);
        Session::flash('message', 'Data berhasil di tambah');
        return redirect('/');
    }

    public function update(Request $request, $id)
    {
      $satuan = $request->input('nama_satuan');
      $deskripsi = $request->input('deskripsi');

      DB::table('satuans')
      ->where('id', $id)
      ->update(['nama_satuan' => $satuan, 'deskripsi' => $deskripsi]);
      Session::flash('message', 'Data berhasil di update');
        return redirect('/');
    }
}
