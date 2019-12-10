<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;
use App\Trajet;
use App\Date;
use DB;
use auth ;
use ValidatesRequests;
class trajetController extends Controller
{
 
  public function __construct()
    {
       // $this->middleware('auth');
    }
     
     public function valider(Request $request ) 
   {
    if( Storage::get('modifier_offre_first')==0)
    {
    $this->validate($request,[
        'heure' => 'required|date_format:H:i',
        'depart' => 'required',
        'date' => 'required_without_all:lun,mar,mer,jeu,ven,sam,dim|empty_when:lun,mar,mer,jeu,ven,sam,dim',
        'min' => 'required',
        'max' => 'required',
        'destination' => 'required',
            ],['heure.required' => ' vide!',
            'heure.date_format' => ' Format incorrecte !',
            'depart.required' => ' vide!',
            'date.required_without_all' => ' vide! Veuillez choisir une date précise ou des jours de la semaine correspondants à votre trajet',
            'date.empty_when' => 'Veuillez remplir un seul champ de date : choisir une date précise, ou bien des jours de la semaine',
            'min.required' => ' vide!',
            'max.required' => ' vide!',
            'destination.required' => ' vide!',
            ]);
    if (isset($validator)) {
      
    
    if($validator->fails()) {
    return redirect()->back()->withInput()
                    ->withErrors($errors, $this->errorBag());
}else {
  $trajet=new Trajet();
  ///date///
  $date=new Date();
  if (null !==($request->input('date'))) {
   $date->unique=1;
  $date->date_unique=$request->input('date');
    } else {
   $date->unique=0;
   
  $string=$request->input('lun').','.$request->input('mar').','.$request->input('mer').','.$request->input('jeu').','.$request->input('ven').','.$request->input('sam').','.$request->input('dim');
  $date->jour=$string;  }
  
  $date->heure=$request->input('heure');
  $date->save();
  /////////
  $trajet->depart=$request->input('depart');
  $trajet->destination=$request->input('destination');
  $trajet->places=$request->input('nbr');
  $trajet->prix=$request->input('min').",".$request->input('max');
  $trajet->id_user=auth::id();
  $trajet->id_date=$date->id;
  $trajet->description=$request->input('description');
  $trajet->save();
  Storage::put('id', $trajet->id);
  return redirect('trajet');
}}else {
  $trajet=new Trajet();
  ///date///
  $date=new Date();
  if (null !==($request->input('date'))) {
   $date->unique=1;
  $date->date_unique=$request->input('date');
    } else {
   $date->unique=0;
   $string=$request->input('lun').','.$request->input('mar').','.$request->input('mer').','.$request->input('jeu').','.$request->input('ven').','.$request->input('sam').','.$request->input('dim');
  $date->jour=$string;
    }
  $date->heure=$request->input('heure');
  $date->save();
  /////////
  $trajet->depart=$request->input('depart');
  $trajet->destination=$request->input('destination');
  $trajet->places=$request->input('nbr');
  $trajet->prix=$request->input('min').",".$request->input('max');
  $trajet->id_user=auth::id();
  $trajet->id_date=$date->id;
  $trajet->description=$request->input('description');
  $trajet->save();
  Storage::put('id', $trajet->id);
  return redirect('trajet');
}
    
   }
   else {
    Storage::put('modifier_offre_first', 2);
    $this->validate($request,[
        'heure' => 'required|date_format:H:i',
        'depart' => 'required',
        'date' => 'required_without_all:lun,mar,mer,jeu,ven,sam,dim|empty_when:lun,mar,mer,jeu,ven,sam,dim',
        'min' => 'required',
        'max' => 'required',
        'destination' => 'required',
            ],['heure.required' => ' vide!',
            'heure.date_format' => ' Format incorrecte !',
            'depart.required' => ' vide!',
            'date.required_without_all' => ' vide! Veuillez choisir une date précise ou des jours de la semaine correspondants à votre trajet',
            'date.empty_when' => 'Veuillez remplir un seul champ de date : choisir une date précise, ou bien des jours de la semaine',
            'min.required' => ' vide!',
            'max.required' => ' vide!',
            'destination.required' => ' vide!',
            ]);
    if (isset($validator)) {
      
    
    if($validator->fails()) {

    return redirect()->back()->withInput()
                    ->withErrors($errors, $this->errorBag());
}else {
  Storage::put('modifier_offre_first', 0);
  return redirect('trajet');
}}else {
  Storage::put('modifier_offre_first', 0);
  return redirect('trajet');
}
   } 
}

   public function research(Request $request ) 
   {$depart=$request->input('depart');
    $destination=$request->input('destination');
    $date=$request->input('date');
    if (($depart==$destination)) {
    Storage::put('depart', 'depart');
    
return $this->chercher_tout2($date);
  //   return redirect('/trajets');
    }
      else if (($depart!=$destination)&&($depart!="")&&(""!=$destination)) {
    $ou=$depart.' -> '.$destination;
     Storage::put('depart',$ou);
     return $this->chercher_villes2($ou,$date);
    /* return redirect('/recherche')->with( ['ou' => $ou] );*/
   
   } else if(($depart=="")&&(""!=$destination)){
$ou=$depart.' -> '.$destination;
     Storage::put('depart',$ou);
 return $this->chercher_villes2($ou,$date);
    /* return redirect('/recherche')->with( ['ou' => $ou] );*/
   }else if(($depart!="")&&(""==$destination)){
    $ou=$depart.' -> '.$destination;
     Storage::put('depart',$ou);
 return $this->chercher_villes2($ou,$date);
    /* return redirect('/recherche')->with( ['ou' => $ou] );*/
   }

   } 
   
/*
public function addchapitre(Request $Request ) 
   {
    
      $chap=new Chapitre;
    $chap ->titre_chapitre = $Request->input('titre_chapitre');
    $chap ->contenue = $Request->input('contenue');


    $idc = Storage::get('cour_id');
    $chap ->cour_id = $idc ;

    $num_chap = intval(Storage::get('chap_num')) ;

    $chap ->numero_chapitre =$num_chap;
    $chap ->save();

    $num_chap= $num_chap + 1;
    Storage::put('chap_num', $num_chap);
    Storage::put('chap_id', $chap->id);
    


       
return view('e_learning.ajouttest');
       
   }

*/



 public function chercher_tout()
 {
   Storage::put('depart', 'depart');
    return View::make('trajets_liste')->with('date_re','');
 }public function chercher_tout2($var)
 {
   Storage::put('depart', 'depart');
    return View::make('trajets_liste')->with('date_re',$var);
 }
  public function chercher_villes()
 {
    return view('trajets_liste')->with('date_re','');
 }
 public function chercher_villes2($ou,$var)
 { Storage::put('depart', $ou);
    return view('trajets_liste')->with('date_re',$var);
 }

}