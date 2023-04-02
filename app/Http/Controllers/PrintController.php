<?php

namespace App\Http\Controllers;

use App\pengaduan;
use App\tanggapan;
use App\User;
use PDF ;
use Illuminate\Http\Request;

class PrintController extends Controller
{
    public function index()
    {
        $user = User::where('level', 'user')->get();
        // var_dump($user);
        return view('main.Print.index', compact('user'));
    }

    public function printUser()
    {
        $user = User::all();
        // return view('main.Print.printUser', compact('user'));
        $pdf = PDF::loadview('main.print.printUser',compact('user'));
	    return $pdf->download('laporan-user-pdf');
    }

    public function printTanggapan()
    {
        $tanggapan = tanggapan::all();
        $pdf = PDF::loadview('main.print.printTanggapan',compact('tanggapan'));
        return $pdf->download('laporan-tanggapan-pdf');
    }

    public function printPengaduan(Request $request)
    {
        if (!empty($request->nik)) {
            $pengaduan = pengaduan::where('nik', $request->nik)->get();
        }else{
            $pengaduan = pengaduan::all();
        }
        $pdf = PDF::loadview('main.print.printPengaduan',compact('pengaduan'));
        return $pdf->download('laporan-user-pdf');
    }
}
