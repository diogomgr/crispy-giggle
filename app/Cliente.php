<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    //

    public function user()
    {
    return $this->belongsTo('App\User', 'id');

    }   

    public function encomenda()
    {
    return $this->hasMany('App\Encomenda');
    }   

    public function estampa()
    {
    return $this->hasMany('App\Estampa');
    }   


}
