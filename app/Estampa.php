<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estampa extends Model
{
    public function tshirt()
    {
        return $this->hasMany('App\Tshirt');
    }

    public function categoria()
    {
        return $this->belongsTo('App\Categoria');
    }

    public function cliente()
    {
        return $this->belongsTo('App\Cliente');
    }
}
