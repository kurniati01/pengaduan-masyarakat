<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pengaduan extends Model
{
    protected $table = 'pengaduan';
    protected $fillable = [
        'tgl_pengaduan', 'nik', 'isi_laporan', 'foto', 'status'
    ];
    protected $primaryKey = 'id';

    public function user()
    {
        return $this->belongsTo(User::class, 'nik', 'nik');
    }

    public function tanggapan()
    {
        return $this->hasOne('App\tanggapan', 'id_tanggapan', 'id');
    }
}
