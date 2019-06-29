<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nama extends Model
{
    protected $fillable=[
        'name', 'id_hobi', 'id_kategori'
    ];

    public function kategori(){
        return $this->belongsTo(kategori::class, 'id_kategori');
    }

    public function hobi(){
        return $this->belongsTo(hobi::class, 'id_hobi');
    }
}
