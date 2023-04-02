<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tanggapan extends Model
{
    protected $table = 'tanggapan';
    protected $fillable = [
        'id_pengaduan', 'tgl_tanggapan', 'tanggapan', 'nik'
    ];
    protected $primaryKey = 'id';

    public function pengaduan()
    {
        return $this->belongsTo('App\pengaduan', 'id_pengaduan');
    }
}
