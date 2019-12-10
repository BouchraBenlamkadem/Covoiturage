<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicule extends Model
{
    
     public $table="vehicules";
     public $timestamps=false;

     public function users()
        {
            return $this->belongsTo('App\User');
        }
	
    public function trajets()
        {
            return $this->belongsTo('App\Trajet');
        }
}
