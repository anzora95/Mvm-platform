<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Renta extends Model
{
    protected $table = 'my_rentas';
    // public $timestamps= false;
    
    const CREATED_AT = 'creation_date';
    const UPDATED_AT = 'last_update';
}
