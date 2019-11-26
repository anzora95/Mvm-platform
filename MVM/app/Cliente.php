<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    public $timestamps= false;

    public function user()
{
    return $this->belongsTo('App\Compañia', 'foreign_key');
}

}

