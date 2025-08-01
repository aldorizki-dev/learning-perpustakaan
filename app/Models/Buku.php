<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    //
    protected $fillable = [
        'judul_buku',
        'rak_id',
    ];

    public function rak(){
        return $this->belongsTo(Rak::class,'rak_id','id');
    }

}
