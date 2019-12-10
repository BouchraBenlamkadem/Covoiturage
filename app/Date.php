<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Date extends Model
{
    
     public $table="dates";
     public $timestamps=false;

     /*public function trajets()
        {
            return $this->belongsTo('App\Trajet');
        }
 */

}
