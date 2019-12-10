<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use DB;

class UserController extends Controller
{
	var $user,$id;

    public function __construct()
    {
    	
        //$this->middleware('auth');
    }


     public function infos()
    {
		// Get the currently authenticated user...
		$user = Auth::user();

		// Get the currently authenticated user's ID...
		$id = Auth::id();    
	}
	
    public function show()
    {
        $user=file::all();
        return view('profil');
    }	    


    public function email_verifier()
    {
      $id = Auth::id(); 
    	DB::table('users')
            ->where('id', $id)
            ->update(['email_ver' => 1]);
            return view('profil');
    }




    
    public function store(Request $request ) 
    {
        $id = Auth::id();    
        $user = Auth::user();
        if(null!==($request->input('new_des'))){
       DB::table('users')
            ->where('id', $id)
            ->update(['description' => $request->input('new_des')]);}
            else /*if (null!==($request->file('photo')))*/ {
 if ($request->hasFile('photo')) {$file = $request->file('photo');
   $filename = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $picture ='user'. $id . '.' . $extension;
        $destinationPath = base_path() . '/public/images/pdp/';
        if(file_exists("/public/images/pdp/".$picture)) unlink("/public/images/pdp/".$picture);

         $request->file('photo')->move($destinationPath, $picture);
          DB::table('users')
            ->where('id', $id)
            ->update(['photo' => $picture ]);
       //Display File 
       //  $afficher="images/pdp/".$picture;
    // return "<img  src=\"$afficher\"  >";
            return redirect("profil");

 }else if ($request->hasFile('identité')) {$file = $request->file('identité');
   $filename = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $picture ='user'. $id . 'identité.' . $extension;
        $destinationPath = base_path() . '/public/images/identité/';
        if(file_exists("/public/images/identité/".$picture)) unlink("/public/images/identité/".$picture);

         $request->file('identité')->move($destinationPath, $picture);
          DB::table('users')
            ->where('id', $id)
            ->update(['identite_ver' => 2 ]);//0-non envoyé , 2-envoyé , 1-verifiee
      /*    DB::table('users')
            ->where('id', $id)
            ->update(['identité' => $picture ]);*////////////////////////////////////à ajouter?
       //Display File 
       //  $afficher="images/pdp/".$picture;
    // return "<img  src=\"$afficher\"  >";
            return redirect("profil");

 }


 else return $request->all(); 
                  /*   $path = Storage::putFileAs(
                'photo'.$user->id, $request->file('photo'), $user->id);


 return $path/*redirect('profil')*/;


/*
                DB::table('users')
            ->where('id', $id)
            ->update(['photo' => $request->input('photo')]);*/
            }
          //  return $path/*redirect('profil')*/;
    }
}
