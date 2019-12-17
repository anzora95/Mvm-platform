<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Machinery extends Model
{
    protected $table ='machinery';

    public $primaryKey='id_machinery';

    public function rentas(){

        return $this->hasOne('App\Renta');
    }

    public function disponibilidad(){

        return $this->hasMany('App\Disponibilidads');

    }
}
