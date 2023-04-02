<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class regencies extends Model
{
    protected $table = 'regencies' ;
    protected $fillable = ['id_province', 'name'];
}
