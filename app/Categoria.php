<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    public function estampa()
    {
        return $this->hasMany('App\Estampa');
    }

}
