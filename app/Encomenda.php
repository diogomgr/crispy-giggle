<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Encomenda extends Model
{
    public function tshirt()
    {
        return $this->hasMany('App\Tshirt');
    }

    public function cliente()
    {
        return $this->belongsTo('App\Cliente');
    }
}
