<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class hobi extends Model
{
    protected $fillable=[
        'name', 'id_kategori'
    ];

    public function kategori(){
        return $this->belongsTo(kategori::class, 'id_kategori');
    }

    public function nama(){
        return $this->hasMany(nama::class, 'id_hobi');
    }
}
