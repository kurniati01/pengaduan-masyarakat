<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'nik', 'jen_kel', 'level', 'alamat', 'telp', 'rt', 'rw', 'kode_pos', 'id_province', 'id_regency', 'id_district', 'id_village'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static $rules = [
        'email' => 'required|unique:users,email',
        'nik' => 'required|unique:users,nik',
        'name' => 'required:users,name',
        'password' => 'required:users,password',
    ];

    public function pengaduan()
    {
        return $this->hasMany(pengaduan::class, 'nik', 'nik');
    }
}
