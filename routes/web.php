<?php

use App\Http\Controllers\Authcontroller;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/login','Authcontroller@login')->name('login');
Route::get('/register','Authcontroller@register')->name('register');

Route::post('/postlogin', 'AuthController@postlogin');
Route::post('/postregis', 'AuthController@postregis');

Route::get('/logout', 'AuthController@logout');

Route::get('/' , function() {
    return view('main.Auth.login');
});

Route::middleware(['auth', 'prevent'])->group(function () {

    Route::group(['middleware' => ['admin']], function () {
        Route::get('/tanggapan/edit/{id}', 'TanggapanController@edit')->name('tanggapan.edit');
        Route::post('/tanggapan/update/{id}', 'TanggapanController@update')->name('');
        Route::get('/tanggapan/delete/{id}', 'TanggapanController@delete')->name('');

        Route::get('/pengaduan/delete/{id}', 'PengaduanController@delete')->name('');

        Route::get('/print', 'PrintController@index')->name('print');
        Route::get('/print/pengaduan' , 'PrintController@printPengaduan');
        Route::get('/print/user' , 'PrintController@printUser');
        Route::get('/print/tanggapan' , 'PrintController@printTanggapan');
    });

    Route::group(['middleware' => ['petugas']], function () {
        Route::post('/pengaduan/update/status/{id}', 'PengaduanController@updateStatus')->name('');
    });

    Route::group(['middleware' => [ 'user']], function () {
        Route::post('/pengaduan/create', 'PengaduanController@create')->name('pengaduan.create');
    });

    Route::get('/tanggapan/index', 'TanggapanController@index')->name('tanggapan');
    Route::post('/tanggapan/create', 'TanggapanController@create')->name('tanggapan.create');

    Route::get('/pengaduan/index', 'PengaduanController@index')->name('pengaduan');
    Route::get('/pengaduan/edit/{id}', 'PengaduanController@edit')->name('pengaduan.edit');
    Route::post('/pengaduan/update/{id}', 'PengaduanController@update')->name('');

    Route::get('/index', 'IndexController@index')->name('dashboard');

    Route::get('/profile','AuthController@index');
	Route::post('/profile','AuthController@update');
});
