<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes';

    public $timestamps= false;

    public $primaryKey= 'client_id';

    public function renta()
{
    return $this->hasMany('App\Renta');
}

    public function compañia(){
        return $this->belongsTo('App\Compañia', 'id_comp');
    }

}

