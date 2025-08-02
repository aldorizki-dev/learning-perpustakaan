<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rak extends Model
{
    //
    protected $fillable = [
        'nama_rak'
    ];

    public function buku()
    {
        return $this->hasMany(Buku::class,'rak_id','id');
    }
}
