<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Authcontroller extends Controller
{
    public function login()
    {
        return view('main.Auth.login');
    }

    public function register()
    {
        return view('main.Auth.register');
    }

    public function postlogin(Request $request)
    {
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect('/index');
        }
        return redirect('/login');
    }

    public function postregis(Request $request)
    {
        $validatedData = $request->validate(User::$rules);

        DB::table('users')->insert([
            'nik' => $request->nik,
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'level' => 'user',
        ]);

        return redirect('/login');
    }

    public function logout()
    {
        Auth::Logout();
        return redirect('/login');
    }

    public function index()
    {
        $user = User::where('id', Auth::user()->id)->first();
        return view('main.Auth.profile', compact('user'));
    }

    public function update(Request $request)
    {

        // var_dump($user);

        $this->validate($request, [
            'password' => 'confirmed'

        ]);
        $user = User::where('id', Auth::user()->id)->first();
        // var_dump($user);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->nik = $request->nik;
        $user->jen_kel = $request->jen_kel;
        $user->alamat = $request->alamat;
        $user->telp = $request->telp;
        if (!empty($request->password)) {
            $user->password = bcrypt($request->password);
        }
        $user->update();

        return redirect('/profile');
    }
}
