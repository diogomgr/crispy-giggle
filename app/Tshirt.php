<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tshirt extends Model
{
    public function core()
    {
        return $this->belongsTo('App\Core');
    }

    public function encomenda()
    {
        return $this->belongsTo('App\Encomenda');
    }

    public function estampa()
    {
        return $this->belongsTo('App\Estampa');
    }
}
