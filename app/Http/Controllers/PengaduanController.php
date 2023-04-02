<?php

namespace App\Http\Controllers;

use App\Dashboard;
use Illuminate\Http\Request;
use App\pengaduan;
use Illuminate\Support\Facades\Auth;
Use Alert;

class PengaduanController extends Controller
{
    public function index()
    {
        $nik = Dashboard::all();

        if (Auth::user()->level == 'admin' || Auth::user()->level == 'petugas') {
            $pengaduan = pengaduan::all();
        }else{
            $pengaduan = pengaduan::where('nik', Auth::user()->nik)->get();
        }

        return view('main.Pengaduan.index', compact('pengaduan','nik'));
    }

    public function create(Request $request)
    {
        if(empty(auth()->user()->alamat) || empty(auth()->user()->telp)){
            return redirect('/profile')->with('error', 'Silakan lengkapi profile terlebih dahulu.');
        }

        $nm = $request->foto;
        $item = time().rand(100,999).".".$nm->getClientOriginalName();
        $nm->move(public_path().'/images',$item);

        $create = [
            'tgl_pengaduan' => $request -> tgl_pengaduan,
            'nik' => Auth::user()->nik,
            'isi_laporan' => $request->isi_laporan,
            'foto' => $item,
            'status' => "terkirim",
        ];
        pengaduan::create($create);
        Alert::success('Success', 'Berhasil mengirim pengaduan');
        return redirect()->back();
    }

    public function edit($id)
    {
        $pengaduan = pengaduan::find($id);
        return view('main.Pengaduan.edit', compact('pengaduan'));
    }

    public function detail($id)
    {
        $pengaduan = pengaduan::find($id);
        return view('main.Pengaduan.detail', compact('pengaduan'));
    }

    public function update(Request $request, $id)
    {

        // var_dump($request->tgl_pengaduan);

        $pengaduan = pengaduan::find($id);
    	$pengaduan->tgl_pengaduan = $request->tgl_pengaduan;
    	$pengaduan->isi_laporan = $request->isi_laporan;
    	$pengaduan->status = $request->status;

        if ($request->hasFile('foto')){
            $request->file('foto')->move('images/',$request->file('foto')->getClientOriginalName());
            $pengaduan->foto=$request->file('foto')->getClientOriginalName();
        }
         $pengaduan->save();

        Alert::success('Success', 'Berhasil update pengaduan');
        return redirect('/pengaduan/index');
    }

    public function updateStatus(Request $request, $id)
    {
        $create = [
            'status' => "sukses",
        ];
        pengaduan::find($id)->update($create);
        return redirect('/pengaduan/index');
    }

    public function delete($id)
    {
        pengaduan::find($id)->delete();
        Alert::success('Success', 'Success delete a data');
        return redirect('/pengaduan/index');
    }
}
