<?php

namespace App\Http\Controllers;

use App\pengaduan;
use App\tanggapan;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
Use Alert;


class TanggapanController extends Controller
{
    public function index()
    {
        $tanggapanNIK = DB::table('tanggapan')
        ->pluck('id_pengaduan')
        ->toArray();
        $pengaduanNIK = DB::table('pengaduan')
        ->pluck('id')
        ->toArray();

        $result = array_diff($pengaduanNIK, $tanggapanNIK);

        $pengaduan = DB::table('pengaduan')
        ->whereIn('id', $result)
        ->get();

        $tanggapan = tanggapan::all();
        return view('main.Tanggapan.index', compact('tanggapan', 'pengaduan', 'result'));
    }

    public function create(Request $request)
    {
        $pengaduan = pengaduan::where('id', $request -> id_pengaduan)->first();

        $create = [
            'id_pengaduan' => $request->id_pengaduan,
            'tgl_tanggapan' => $request->tgl_tanggapan,
            'tanggapan' => $request->tanggapan,
            'nik' => $pengaduan->nik,
        ];
        tanggapan::create($create);
        Alert::success('Success', 'Berhasil menambah tanggapan');
        return redirect()->back();
    }

    public function edit($id)
    {
        $tanggapan = tanggapan::find($id);
        return view('main.Tanggapan.edit', compact('tanggapan'));
    }

    public function update(Request $request, $id)
    {
        tanggapan::find($id)->update($request->all());
        Alert::success('Success', 'Berhasil update tanggapan');
        return redirect('/tanggapan/index');
    }

    public function delete($id)
    {
        tanggapan::find($id)->delete();
        Alert::success('Success', 'Success delete a data');
        return redirect('/tanggapan/index');
    }
}
