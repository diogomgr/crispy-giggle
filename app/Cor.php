<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cor extends Model
{
    
    //
/**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cores';

    protected $primaryKey = 'codigo';
    protected $keyType = 'string';

    public function tshirt()
    {
    return $this->hasMany('App\Tshirt');
    }




}
