<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kategori extends Model
{
    protected $fillable=[
        'name'
    ];

    public function hobi(){
        return $this->hasMany(hobi::class, 'id_kategori');
    }

    public function nama(){
        return $this->hasMany(nama::class, 'id_kategori');
    }
}
