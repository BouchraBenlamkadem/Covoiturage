<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nom','age','photo', 'email', 'password','description','experience','avis','commentaires','identite_ver','permit_ver','num_ver','email_ver'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

     public $table="users";
     public function regles()
        {
            return $this->hasMany('App\Regle');
        }
     public function vehicules()
        {
            return $this->hasMany('App\Vehicule');
        }
     public function trajets()
        {
            return $this->hasMany('App\Trajet');
        }


    /* ////////////////////////////////// relations////////////////////////////
    public $table="users";
    public function admin()
    {
        return $this->hasOne('App\Admin');
    }

    public function professeur()
    {
        return $this->hasOne('App\Professeur');
    }

    public function etudiant()
    {
        return $this->hasOne('App\Etudiant');
    }





<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    //

    public $table="tests";
    public $timestamps=false;

        public function chapitre()
        {
            return $this->belongsTo('App\Chapitre');
        }

         public function questions()
        {
            return $this->hasMany('App\Question');
        }


        public function etudiants()
        {
            return $this->belongToMany('App\Etudiant');
        }
}





class Etudiant extends Model
{
    //

    public $table="etudiants";
    public $timestamps=false;
        public function user()
        {
            return $this->belongsTo('App\User');
        }


        public function commentairs()
        {
            return $this->hasMany('App\Commentaire');
        }

         public function cours()
        {
            return $this->belongToMany('App\Cour');
        }










    
    */
}
