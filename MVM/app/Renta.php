<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Renta extends Model
{
    protected $table = 'rentas';
    // public $timestamps= false;

    const CREATED_AT = 'creation_date';
    const UPDATED_AT = 'last_update';

    public $primaryKey='id';

    public function clientes(){

        return $this->belongsTo('App\Cliente', 'cliente');
    }

    public function entregas(){
        return $this->hasOne('App\Entrega');
    }
}
