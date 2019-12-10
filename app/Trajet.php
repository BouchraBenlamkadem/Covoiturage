<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trajet extends Model
{
    
     public $table="trajets";
     public $timestamps=false;

     public function users()
        {
            return $this->belongsTo('App\User');
        }
	 public function dates()
	    {
	        return $this->hasOne('App\Date');
	    }
    public function vehicules()
        {
            return $this->hasOne('App\Vehicule');
        }
}
