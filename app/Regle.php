<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Regle extends Model
{
    
     public $table="regles";
     public $timestamps=false;

     public function users()
        {
            return $this->belongsTo('App\User');
        }
 

}
