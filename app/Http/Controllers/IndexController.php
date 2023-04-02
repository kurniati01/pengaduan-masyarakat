<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dashboard;
use App\pengaduan;
use App\tanggapan;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function censorWordsExceptFirst($words)
    {
        $censored = [];
        foreach ($words as $key => $word) {
            if ($key === 0) {
                $censored[] = $word;
            } else {
                $censored[] = str_repeat('*', strlen($word));
            }
        }
        return implode(' ', $censored);
    }

    public function index()
    {
        $tanggapan = tanggapan::all();
        $pengaduan = pengaduan::all();
        $index = Dashboard::all();

        return view('main.Dashboard.index', compact('index', 'pengaduan', 'tanggapan'));
    }

    public function create(Request $request)
    {
        Dashboard::create($request->all());
        return redirect('/index');
    }

    public function delete($id)
    {
        Dashboard::find($id)->delete();
        return redirect('/index');
    }
}
