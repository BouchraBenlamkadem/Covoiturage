@extends('layouts.app2')

@section('content')
<style type="text/css">
  
  ::-webkit-datetime-edit-ampm-field,
::-webkit-inner-spin-button{
  -webkit-appearance: none;
    margin: 0;
}
</style>
 @auth
<?php
$user =Auth::user(); 

?>
@endauth
@guest
<?php
$user =['id' => 0]; 

?>
@endguest
	<?php

   function afficher($id,$depart,$destination,$id_date,$places,$id_user,$prix)
  {
    /////////////////////////////recherche du temps/////////////////////////////////
    $date=" ";
    $dates=DB::select('select * from dates where id=? ',[$id_date]);
    if ($dates[0]->unique==1) {
      $date='Le: '.$dates[0]->date_unique;
    }else
    {
      $date="Chaque : ";
      $date_jour=explode(",", $dates[0]->jour);
      foreach ($date_jour as $key ) {
        switch ($key) {
          case 'lun':
            $key='lundi';
            break;
          case 'mar':
            $key='mardi';
            break;case 'mer':
            $key='mercredi';
            break;case 'jeu':
            $key='jeudi';
            break;case 'ven':
            $key='vendredi';
            break;case 'sam':
            $key='samedi';
            break;case 'dim':
            $key='dimanche';
            break;
          default:
            
            break;
        }
        $date.=$key." ";
      }
      
    }
$heure_tt="".$dates[0]->heure;
$heure=explode(":", $heure_tt);
$h=$heure[0];
$m=$heure[1];
/////////////////////////////////////////////////////////////////////
////////////////////affichage des trajets futurs uniquement/////////
    
    $nbr=intval($places);
    $marge=explode(",", $prix);
    $owner=DB::select('select * from users where id=? ',[$id_user]);
    $img=$owner[0]->photo;
    $nom=$owner[0]->nom;
    
   echo '
<div   class="single-testimonial-box" style="width: 400px; "style="background-color:white;" > <!--      padding: 20px 0px;   --->
            <div  class=" col-md-4 col-sm-6" style="padding-left: 5px;">
              <div style="width: 400px;" >
               
                <div class="single-explore-txt bg-theme-1  " style="padding-left: 0px;padding-right: 0px;">
                  <h2 style="margin-bottom: 0px;height:85px;"><a  style="color: #F9BD3B;"><table> <td style="width: 300px;padding-left:15px;" valign="top"> Départ:'.$depart.' <br/> Destination:'.$destination.'</td><td style="width: 300px; text-align: right; padding-right:20px;">'.$date.' <br/> A: '.$h.'h'.$m.'  </td></table></a></h2>
                  <p class="explore-rating-price"><table> <td style="width: 300px;padding-left:15px;">
                     <div class="explore-person-img" style="width: 100px;height: 100px; text-align: center;">
                          <a href="#" style="clip-path: circle(30px at center);">
                            <img src="images/pdp/'. $img.'" alt="explore person">
                          </a>
                          <button class="close-btn" style="line-height: 1; font-size: 14px;">'.$nom.'</button>
                        </div>
                     </td><td style="width: 300px; text-align: right;padding-right:20px;">
                    <span class="explore-rating"style="margin-right: 70px;" >'.$nbr.'</span><br/>
                    <a href="#" style="color: #F9BD3B;"> places disponibles</a> <br/>
                      Prix
                      <span class="explore-price">'.$marge[0].'MAD-'.$marge[1].'MAD</span>
                    </td>
                  </table>
                  </p>
                        <a style=" color: #70A9FF; float: right;padding-right:20px;" href="trajet/'."$id".'">Voir</a>
                </div>
              </div>
            </div>
         </div>

   ';
  }



   ?>
	<!-- Storage::put('chap_num', '1'); Storage::get('cour_id');-->
	<br/><br/><br/>
<div style="background-image: url('images/back.jpg'); background-size: 50%" >
	<div style="margin-left: 40px;">
<?php


  /////////////////////////from to where////////////////////////////////////////
	$str=Storage::get('depart');
	if ($str=="depart") {
		echo '<div style="margin-left: 400px; font-weight: bold; font-size:40px;font-family:all; "> Liste complète des trajets</div>';//echo Storage::get('depart');
    echo'
    <br/><br/><br/><br/><br/><br/><br/>
    <section class="ftco-section  justify-content-end ftco-search" data-scrollax=" properties: { translateY: \'70%\' } >
      <div class="container-wrap mx-auto">
        <div class="row no-gutters">
  <!--         <div class="col-md-12 nav-link-wrap">
            <div class="nav nav-pills justify-content-center text-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
             <a class="nav-link active" id="v-pills-1-tab" data-toggle="pill" href="#v-pills-1" role="tab" aria-controls="v-pills-1" aria-selected="true">Recherche</a>

              <a class="nav-link" id="v-pills-2-tab" data-toggle="pill" href="#v-pills-2" role="tab" aria-controls="v-pills-2" aria-selected="false">Hotel</a>

              <a class="nav-link" id="v-pills-3-tab" data-toggle="pill" href="#v-pills-3" role="tab" aria-controls="v-pills-3" aria-selected="false">Car Rent</a>      
            </div>
          </div>-->
          <div class="col-md-12 tab-wrap">
            
            <div style="background-color: rgba(255, 255, 255, 0);" class="tab-content p-4 px-5" id="v-pills-tabContent">

              <div   class="tab-pane fade show active" id="v-pills-1" role="tabpanel" aria-labelledby="v-pills-nextgen-tab">
                <form action="research" class="search-destination">
                  <div class="row"style="background-color: rgba(0, 0, 0, 0.5);">
                    <div class="col-md align-items-end">
                      <div class="form-group">
                        <label for="#" style="color:white; font-weight: bold;">Départ</label>
                        <div class="form-field">
                        <div class="select-wrap">
                          <div class="icon"><span class="icon-my_location"></span></div>
                          <select style="background-color: rgba(255, 255, 255, 1) !important;" type="text" class="form-control" placeholder="De" name="depart"><option value="" hidden="true">De</option>';
                            
                           
$villes=array();
                                      $villes[0]="Casablanca";
                                      $villes[1]="Fès";
                                      $villes[5]="Nador";
                                      $villes[3]="Hoceima";
                                      $villes[4]="Tanger";
                                      $villes[2]="Meknès";
                                      $villes[6]="Rabat"; 
       
                                      
foreach($villes as $data)
 { echo "<option value= $data   >  $data  </option>" ;}
  echo '                                 
                          </select>
                        </div>
                      </div></div>
                    </div>
                    <div class="col-md align-items-end">
                      <div class="form-group">
                        <label for="#" style="color:white; font-weight: bold;">Destination</label>
                        <div class="form-field">
                        <div class="select-wrap">
                          <div class="icon"><span class="icon-map-marker"></span></div>

                          <select  style="background-color: rgba(255, 255, 255, 1) !important; " type="text" class="form-control" placeholder="A" name="destination"><option value="" hidden="true">A</option>';
                            
                           
$villes=array();
                                      $villes[0]="Casablanca";
                                      $villes[1]="Fès";
                                      $villes[5]="Nador";
                                      $villes[3]="Hoceima";
                                      $villes[4]="Tanger";
                                      $villes[2]="Meknès";
                                      $villes[6]="Rabat"; 
       
                                      
foreach($villes as $data)
 { echo "<option value= $data   >  $data  </option>" ;}
  echo '                                 
                          </select>
                        </div>
                      </div>
                    </div></div>
                    <div class="col-md align-items-end">
                      <div class="form-group">
                        <label for="#" style="color:white; font-weight: bold;">Date</label>
                        <div class="form-field">
                          <div class="icon"><span class="icon-map-marker"></span></div>
                          <input style="background-color: rgba(255, 255, 255, 1) !important;" type="text" class="form-control checkin_date" placeholder="Le" name="date" value="'.$date_re.'">
                        </div>
                      </div>
                    </div>
                   <div class="col-sm8 align-items-end" style="margin-right: 20px;" >
                      <div class="form-group"style="width: 90px;">
                        <label for="#" style="color:white; font-weight: bold;">Heure</label>
                        <div class="form-field">
                          <div class="icon"><span class="icon-map-marker"></span></div>
                          <input style="background-color: rgba(255, 255, 255, 1) !important; " type="time" min="00:00" max="23:59" class="form-control "  name="heure">
                        </div>
                      </div>
                    </div>
                    <div class="col-sm8 align-items-end" >
                      <div class="form-group"style="width: 90px;">
                        <label for="#" style="color:white; font-weight: bold;">Personnes</label>
                        <div class="form-field">
                          <div class="select-wrap">
                            <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                            <select style="background-color: rgba(255, 255, 255, 1) !important;" name="personnes_nbr" id="" class="form-control">
                              <option value="">1</option>
                              <option value="">2</option>
                              <option value="">3</option>
                              <option value="">4</option>
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md align-self-end">
                      <div class="form-group">
                        <div class="form-field">
                          <input type="submit" value="Chercher" class="form-control btn btn-primary">
                        </div>
                      </div>
                    </div>
                  </div>
                </form>
              </div>

             </div>
          </div>
        </div>
   
    
</section>';
	}else{
		
		$places=explode(" -> ", $str);
    $depart_place=$places[0];
		$destination_place=$places[1];
		if ($places[0]!=''&&$places[1]!='')
    echo '<div style="margin-left: 400px; font-weight: bold; font-size:40px;font-family:all; "> De '.$places[0].' vers '.$places[1].' </div>';//echo Storage::get('depart');
  if ($places[0]==''&&$places[1]!='')
    echo '<div style="margin-left: 400px; font-weight: bold; font-size:40px;font-family:all; "> Destination :  '.$places[1].' </div>';
  if ($places[0]!=''&&$places[1]=='')
    echo '<div style="margin-left: 400px; font-weight: bold; font-size:40px;font-family:all; "> Départ : '.$places[0].'  </div>';
    echo'
    <br/><br/><br/><br/><br/><br/><br/>
    <section class="ftco-section  justify-content-end ftco-search" data-scrollax=" properties: { translateY: \'70%\' } >
      <div class="container-wrap mx-auto">
        <div class="row no-gutters">
  <!--         <div class="col-md-12 nav-link-wrap">
            <div class="nav nav-pills justify-content-center text-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
             <a class="nav-link active" id="v-pills-1-tab" data-toggle="pill" href="#v-pills-1" role="tab" aria-controls="v-pills-1" aria-selected="true">Recherche</a>

              <a class="nav-link" id="v-pills-2-tab" data-toggle="pill" href="#v-pills-2" role="tab" aria-controls="v-pills-2" aria-selected="false">Hotel</a>

              <a class="nav-link" id="v-pills-3-tab" data-toggle="pill" href="#v-pills-3" role="tab" aria-controls="v-pills-3" aria-selected="false">Car Rent</a>      
            </div>
          </div>-->
          <div class="col-md-12 tab-wrap">
            
            <div style="background-color: rgba(255, 255, 255, 0);" class="tab-content p-4 px-5" id="v-pills-tabContent">

              <div   class="tab-pane fade show active" id="v-pills-1" role="tabpanel" aria-labelledby="v-pills-nextgen-tab">
                <form action="research" class="search-destination">
                  <div class="row"style="background-color: rgba(0, 0, 0, 0.5);">
                    <div class="col-md align-items-end">
                      <div class="form-group">
                        <label for="#" style="color:white; font-weight: bold;">Départ</label>
                        <div class="form-field">
                        <div class="select-wrap">
                          <div class="icon"><span class="icon-my_location"></span></div>
                          <select style="background-color: rgba(255, 255, 255, 1) !important;" type="text" class="form-control" placeholder="De" name="depart" >'; if ($places[0]!="") {
                            echo '<option value="'.$places[0].'" hidden="true">'.$places[0].'</option>';
                          }else echo '<option value="" hidden="true">De</option>';
                            
                           
$villes=array();
                                      $villes[0]="Casablanca";
                                      $villes[1]="Fès";
                                      $villes[5]="Nador";
                                      $villes[3]="Hoceima";
                                      $villes[4]="Tanger";
                                      $villes[2]="Meknès";
                                      $villes[6]="Rabat"; 
       
                                      
foreach($villes as $data)
 { echo "<option value= $data   >  $data  </option>" ;}
  echo '                                 
                          </select>
                        </div>
                      </div></div>
                    </div>
                    <div class="col-md align-items-end">
                      <div class="form-group">
                        <label for="#" style="color:white; font-weight: bold;">Destination</label>
                        <div class="form-field">
                        <div class="select-wrap">
                          <div class="icon"><span class="icon-map-marker"></span></div>

                          <select  style="background-color: rgba(255, 255, 255, 1) !important; " type="text" class="form-control" placeholder="A" name="destination" > '; if ($places[1]!="") {
                            echo '<option value="'.$places[1].'" hidden="true">'.$places[1].'</option>';
                          }else echo ' <option value="" hidden="true">A</option>';
                            
                           
$villes=array();
                                      $villes[0]="Casablanca";
                                      $villes[1]="Fès";
                                      $villes[5]="Nador";
                                      $villes[3]="Hoceima";
                                      $villes[4]="Tanger";
                                      $villes[2]="Meknès";
                                      $villes[6]="Rabat"; 
       
                                      
foreach($villes as $data)
 { echo "<option value= $data   >  $data  </option>" ;}
  echo '                                 
                         </select>
                        </div>
                      </div>
                    </div></div>
                    <div class="col-md align-items-end">
                      <div class="form-group">
                        <label for="#" style="color:white; font-weight: bold;">Date</label>
                        <div class="form-field">
                          <div class="icon"><span class="icon-map-marker"></span></div>
                          <input style="background-color: rgba(255, 255, 255, 1) !important;" type="text" class="form-control checkin_date" placeholder="Le" name="date" value="'.$date_re.'">
                        </div>
                      </div>
                    </div>
                   <div class="col-sm8 align-items-end" style="margin-right: 20px;" >
                      <div class="form-group"style="width: 90px;">
                        <label for="#" style="color:white; font-weight: bold;">Heure</label>
                        <div class="form-field">
                          <div class="icon"><span class="icon-map-marker"></span></div>
                          <input style="background-color: rgba(255, 255, 255, 1) !important; " type="time" min="00:00" max="23:59" class="form-control "  name="heure">
                        </div>
                      </div>
                    </div>
                    <div class="col-sm8 align-items-end" >
                      <div class="form-group"style="width: 90px;">
                        <label for="#" style="color:white; font-weight: bold;">Personnes</label>
                        <div class="form-field">
                          <div class="select-wrap">
                            <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                            <select style="background-color: rgba(255, 255, 255, 1) !important;" name="personnes_nbr" id="" class="form-control">
                              <option value="">1</option>
                              <option value="">2</option>
                              <option value="">3</option>
                              <option value="">4</option>
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md align-self-end">
                      <div class="form-group">
                        <div class="form-field">
                          <input type="submit" value="Chercher" class="form-control btn btn-primary">
                        </div>
                      </div>
                    </div>
                  </div>
                </form>
              </div>

             </div>
          </div>
        </div>
   
    
</section>';
    //////////////////////////////////////////////////////////////////////////////////////////
    
    //////////////////////////////////////////////////////////////////////////////////////////
	}
  echo '<br/><div style="display: grid; grid-template-columns: auto  auto auto; grid-gap: 20px;justify-items: center; ">';
	///////////////////////////////////////////////////////////////////////////////
  ?>
  


  @auth
  <?php 
  ////////////////////////////query//////////////////////////////////////////////
$trajet = Storage::get('depart');
$villes=explode(" -> ", $trajet);
  if($trajet=="depart")
  {
    if($date_re!="")
    $trajets =DB::select('select * from trajets INNER JOIN dates ON trajets.id = dates.id  where dates.id=trajets.id_date and ( dates.date_unique >= ? or dates.unique = \'0\') and id_user != ? order by dates.date_unique,dates.heure',[$date_re,$user->id]);
  else
    {$today=date("Y-m-d");
    $trajets =DB::select('select * from trajets INNER JOIN dates ON trajets.id = dates.id  where dates.id=trajets.id_date and ( dates.date_unique >= ? or dates.unique = \'0\') and id_user != ? order by dates.date_unique,dates.heure',[$today,$user->id]);}
    foreach ($trajets as $key ) {
      afficher($key->id,$key->depart,$key->destination,$key->id_date,$key->places,$key->id_user,$key->prix);
    }




          }else if(($villes[0]!='')&&($villes[1]!='')){
            if($date_re!="")
    $trajets =DB::select('select * from trajets INNER JOIN dates ON trajets.id = dates.id where depart=? and destination=? and ( dates.date_unique >= ? or dates.unique = \'0\') and id_user != ? order by dates.date_unique,dates.heure',[$villes[0],$villes[1],$date_re,$user->id]);
  else
    {$today=date("Y-m-d");
    $trajets =DB::select('select * from trajets INNER JOIN dates ON trajets.id = dates.id where depart=? and destination=? and ( dates.date_unique >= ? or dates.unique = \'0\') and id_user != ? order by dates.date_unique,dates.heure',[$villes[0],$villes[1],$today,$user->id]);}

/*
            $trajets =DB::select('select * from trajets INNER JOIN dates ON trajets.id = dates.id where depart=? and destination=? order by dates.date_unique,dates.heure',[$villes[0],$villes[1]]);*/
    foreach ($trajets as $key ) { 
      afficher($key->id,$key->depart,$key->destination,$key->id_date,$key->places,$key->id_user,$key->prix);
      }



          }else if(($villes[0]!='')&&($villes[1]=='')){
            

               if($date_re!="")
                  $trajets =DB::select('select * from trajets INNER JOIN dates ON trajets.id = dates.id where depart=?  and ( dates.date_unique >= ? or dates.unique = \'0\') and id_user != ? order by dates.date_unique,dates.heure',[$villes[0],$date_re,$user->id]);
                else
                  {$today=date("Y-m-d");
                  $trajets =DB::select('select * from trajets INNER JOIN dates ON trajets.id = dates.id where depart=?  and ( dates.date_unique >= ? or dates.unique = \'0\') and id_user != ? order by dates.date_unique,dates.heure',[$villes[0],$today,$user->id]);}


          /*  $trajets =DB::select('select * from trajets INNER JOIN dates ON trajets.id = dates.id where depart=? order by dates.date_unique,dates.heure',[$villes[0]]);*/
    foreach ($trajets as $key ) {
      afficher($key->id,$key->depart,$key->destination,$key->id_date,$key->places,$key->id_user,$key->prix);
      }
          


          }else if(($villes[0]=='')&&($villes[1]!='')){
            


             if($date_re!="")
                $trajets =DB::select('select * from trajets INNER JOIN dates ON trajets.id = dates.id where destination=? and ( dates.date_unique >= ? or dates.unique = \'0\') and id_user != ? order by dates.date_unique,dates.heure',[$villes[1],$date_re,$user->id]);
              else
                {$today=date("Y-m-d");
                $trajets =DB::select('select * from trajets INNER JOIN dates ON trajets.id = dates.id where destination=? and ( dates.date_unique >= ? or dates.unique = \'0\') and id_user != ? order by dates.date_unique,dates.heure',[$villes[1],$today,$user->id]);}


           /* $trajets =DB::select('select * from trajets INNER JOIN dates ON trajets.id = dates.id where destination=? order by dates.date_unique,dates.heure',[$villes[1]]);*/
    foreach ($trajets as $key ) {
      afficher($key->id,$key->depart,$key->destination,$key->id_date,$key->places,$key->id_user,$key->prix);
      }
          }
///////////////////////////////////////////////////////////////////////////////
          ?>
  @endauth
@guest
<?php 
  ////////////////////////////query//////////////////////////////////////////////
$trajet = Storage::get('depart');
$villes=explode(" -> ", $trajet);
  if($trajet=="depart")
  {
    if($date_re!="")
    $trajets =DB::select('select * from trajets INNER JOIN dates ON trajets.id = dates.id  where dates.id=trajets.id_date and ( dates.date_unique >= ? or dates.unique = \'0\')  order by dates.date_unique,dates.heure',[$date_re]);
  else
    {$today=date("Y-m-d");
    $trajets =DB::select('select * from trajets INNER JOIN dates ON trajets.id = dates.id  where dates.id=trajets.id_date and ( dates.date_unique >= ? or dates.unique = \'0\')  order by dates.date_unique,dates.heure',[$today]);}
    foreach ($trajets as $key ) {
      afficher($key->id,$key->depart,$key->destination,$key->id_date,$key->places,$key->id_user,$key->prix);
    }




          }else if(($villes[0]!='')&&($villes[1]!='')){
            if($date_re!="")
    $trajets =DB::select('select * from trajets INNER JOIN dates ON trajets.id = dates.id where depart=? and destination=? and ( dates.date_unique >= ? or dates.unique = \'0\')  order by dates.date_unique,dates.heure',[$villes[0],$villes[1],$date_re]);
  else
    {$today=date("Y-m-d");
    $trajets =DB::select('select * from trajets INNER JOIN dates ON trajets.id = dates.id where depart=? and destination=? and ( dates.date_unique >= ? or dates.unique = \'0\')  order by dates.date_unique,dates.heure',[$villes[0],$villes[1],$today]);}

/*
            $trajets =DB::select('select * from trajets INNER JOIN dates ON trajets.id = dates.id where depart=? and destination=? order by dates.date_unique,dates.heure',[$villes[0],$villes[1]]);*/
    foreach ($trajets as $key ) { 
      afficher($key->id,$key->depart,$key->destination,$key->id_date,$key->places,$key->id_user,$key->prix);
      }



          }else if(($villes[0]!='')&&($villes[1]=='')){
            

               if($date_re!="")
                  $trajets =DB::select('select * from trajets INNER JOIN dates ON trajets.id = dates.id where depart=?  and ( dates.date_unique >= ? or dates.unique = \'0\')  order by dates.date_unique,dates.heure',[$villes[0],$date_re]);
                else
                  {$today=date("Y-m-d");
                  $trajets =DB::select('select * from trajets INNER JOIN dates ON trajets.id = dates.id where depart=?  and ( dates.date_unique >= ? or dates.unique = \'0\')  order by dates.date_unique,dates.heure',[$villes[0],$today]);}


          /*  $trajets =DB::select('select * from trajets INNER JOIN dates ON trajets.id = dates.id where depart=? order by dates.date_unique,dates.heure',[$villes[0]]);*/
    foreach ($trajets as $key ) {
      afficher($key->id,$key->depart,$key->destination,$key->id_date,$key->places,$key->id_user,$key->prix);
      }
          


          }else if(($villes[0]=='')&&($villes[1]!='')){
            


             if($date_re!="")
                $trajets =DB::select('select * from trajets INNER JOIN dates ON trajets.id = dates.id where destination=? and ( dates.date_unique >= ? or dates.unique = \'0\')  order by dates.date_unique,dates.heure',[$villes[1],$date_re]);
              else
                {$today=date("Y-m-d");
                $trajets =DB::select('select * from trajets INNER JOIN dates ON trajets.id = dates.id where destination=? and ( dates.date_unique >= ? or dates.unique = \'0\')  order by dates.date_unique,dates.heure',[$villes[1],$today]);}


           /* $trajets =DB::select('select * from trajets INNER JOIN dates ON trajets.id = dates.id where destination=? order by dates.date_unique,dates.heure',[$villes[1]]);*/
    foreach ($trajets as $key ) {
      afficher($key->id,$key->depart,$key->destination,$key->id_date,$key->places,$key->id_user,$key->prix);
      }
          }
///////////////////////////////////////////////////////////////////////////////
          ?>
@endguest
    
	
	





</div> <!-- echo '<div>'; -->

<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
</div></div>
@endsection
