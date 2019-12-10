@extends('layouts.app2')

@section('content')
<style type="text/css">
  
  ::-webkit-datetime-edit-ampm-field,
::-webkit-inner-spin-button{
  -webkit-appearance: none;
    margin: 0;
}
</style>


<?php 
                                     
                                      $villes=array();
                                      $villes[0]="Casablanca";
                                      $villes[1]="Fès";
                                      $villes[5]="Nador";
                                      $villes[3]="Hoceima";
                                      $villes[4]="Tanger";
                                      $villes[2]="Meknès";
                                      $villes[6]="Rabat"; ?>
    <div class="hero-wrap js-fullheight" style="background-image: url('images/bg_1.jpg');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
          <div class="col-md-9 ftco-animate mb-5 pb-5 text-center text-md-left" data-scrollax=" properties: { translateY: '70%' }">
            <h1 class="mb-4" style="text-shadow: 0 0 1px #aaaaaa, 0 0 2px #ffffff;" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Voyagez <br>sans limites!</h1>
            <p style="text-shadow: 0 0 1px #aaaaaa, 0 0 2px #ffffff;" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Pour conducteurs et passagers</p>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section ftco-animate justify-content-end ftco-search" data-scrollax=" properties: { translateY: '70%' }>
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
              		<div class="row"style="background-color: rgba(255, 255, 200, 0.3);">
              			<div class="col-md align-items-end">
              				<div class="form-group">
              					<label for="#">Départ</label>
	              				<div class="form-field">
	              					<div class="icon"><span class="icon-my_location"></span></div>
					                <select style="background-color: rgba(255, 255, 255, 1) !important;" type="text" class="form-control" placeholder="De" name="depart"><option value="" hidden="true">De</option>
                            <?php 
                                     
                                     
                                      
foreach($villes as $data)
 { echo "<option value= $data   >  $data  </option>" ;}
  ?>                                  
                          </select>
					              </div>
				              </div>
              			</div>
              			<div class="col-md align-items-end">
              				<div class="form-group">
              					<label for="#">Destination</label>
              					<div class="form-field">
	              					<div class="icon"><span class="icon-map-marker"></span></div>
					                <select  style="background-color: rgba(255, 255, 255, 1) !important; " type="text" class="form-control" placeholder="A" name="destination"><option value="" hidden="true">A</option>
                            <?php 
                                 
foreach($villes as $data)
 { echo "<option value= $data   >  $data  </option>" ;}
  ?>                                  
                          </select>
					              </div>
				              </div>
              			</div>
              			<div class="col-md align-items-end">
              				<div class="form-group">
              					<label for="#">Date</label>
              					<div class="form-field">
	              					<div class="icon"><span class="icon-map-marker"></span></div>
					                <input style="background-color: rgba(255, 255, 255, 1) !important;" type="text" class="form-control checkin_date"  placeholder="Le" name="date">
					              </div>
				              </div>
              			</div>
              			<div class="col-sm8 align-items-end" style="margin-right: 20px;" >
                      <div class="form-group"style="width: 90px;">
                        <label for="#" >Heure</label>
                        <div class="form-field">
                          <div class="icon"><span class="icon-map-marker"></span></div>
                          <input style="background-color: rgba(255, 255, 255, 1) !important; " type="time" min="00:00" max="23:59" class="form-control "  name="heure">
                        </div>
                      </div>
                    </div>
              			<div class="col-sm8 align-items-end" >
              				<div class="form-group"style="width: 90px;">
              					<label for="#">Personnes</label>
              					<div class="form-field">
	              					<div class="select-wrap">
			                      <div class="icon"><span class="ion-ios-arrow-down"></span></div>
			                      <select style="background-color: rgba(255, 255, 255, 1) !important;" name="" id="" class="form-control">
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
    	</div>
    
<br/><br/>
</section>
<!---------------------------------------------villes------------------------------------------------------->

    <section class="ftco-section-2">
      <div class="container-fluid" style="position: relative;">
        <div  class="row d-flex no-gutters">
<?php 
       $top=DB::select('SELECT `depart`,`destination`,COUNT(`depart`) AS nb_depart FROM `trajets` GROUP by `depart`,`destination` ORDER by COUNT(`depart`) DESC '); 
//echo count($top);


foreach ($top as $key => $value) {
  if($key < 8 )
 { echo '
 <div style="height: 350px;" class="col-md-3 model-entry ftco-animate">
              <div class="model-img" style="background-image: url(images/'."$value->destination".'.jpg);">
              <a href="recherche/'."$value->depart -> $value->destination".'">  
                <div style="height: 200px;background-color: rgba(155,100,100,0.9);" class="text">
                  <div class="d-flex models-info">
                    <div class="pr-md-3">
                      <p >  <span style="font-size: 20px;font-weight: bolder;"> '."$value->destination".'</span> <br/> '."$value->depart -> $value->destination".'</p>
                    </div>
                  </div>
                </div></a>
              </div>
            </div>';
          }
}
/*
for ($i = 0; $i <= 6; $i++)
{ $x=($i+1)%7;
  echo '
 <div style="height: 350px;" class="col-md-3 model-entry ftco-animate">
              <div class="model-img" style="background-image: url(images/'."$villes[$i]".'.jpg);">
              <a href="recherche/'."$villes[$x] -> $villes[$i]".'">  
                <div style="height: 200px;background-color: rgba(155,100,100,0.9);" class="text">
                  <div class="d-flex models-info">
                    <div class="pr-md-3">
                      <p >  <span style="font-size: 20px;font-weight: bolder;"> '."$villes[$i]".'</span> <br/> '."$villes[$x] -> $villes[$i]".'</p>
                    </div>
                  </div>
                </div></a>
              </div>
            </div>';
}
$i=1;$x=($i+3)%7;

echo '
 <div style="height: 350px;" class="col-md-3 model-entry ftco-animate">
              <div class="model-img" style="background-image: url(images/'."$villes[$i]".'.jpg);">
              <a href="recherche/'."$villes[$x] -> $villes[$i]".'">  
                <div style="height: 200px;background-color: rgba(155,100,100,0.9);" class="text">
                  <div class="d-flex models-info">
                    <div class="pr-md-3">
                      <p >  <span style="font-size: 20px;font-weight: bolder;"> '."$villes[$i]".'</span> <br/> '."$villes[$x] -> $villes[$i]".'</p>
                    </div>
                  </div>
                </div></a>
              </div>
            </div>';

*/

                                      ?>
     
        
          
        
    			<div style="position: absolute; width: 100% ; " class="row justify-content-center text-block">
          <div class="col-md-7 heading-section text-center ftco-animate">
            <h2 class="mb-4">Trajets populaires</h2>
          </div>
        </div>
    		</div>
    	</div>
    </section>

  
		<section class="ftco-about d-md-flex">
    	
    	<div class="one-half ftco-animate">
        <div class="heading-section ftco-animate ">
          <h2 class="mb-4">Pourquoi le covoiturage?</h2>
        </div>
        <div>
  				<table  style="width: 600px;  "><tr style="text-align: center;"> <td><span style="font-weight: bold;">Pratique</span></td><td><span style="font-weight: bold;">Facile<br/></span></td>
</tr>


<tr> <td  style="padding-right:  20px; "style="width: 200px;">
  <p style="justify-content: center; text-align: justify;">
    Trouvez rapidement un covoiturage à proximité parmi les millions de trajets proposés.
</p>
</td><td style="width: 200px;">
  <p style="justify-content: center; text-align: justify;">
Réservez le trajet parfait ! Il suffit d'entrer votre adresse exacte et de choisir avec qui vous voulez voyager.
</p></td></tr>

<tr style="text-align: center;">
<td style="width: 100px;"><span style="font-weight: bold;">low-cost<br/></span></td>
<td style="width: 200px;"><span style="font-weight: bold;">Direct<br/></span></td><td style="width: 100px;">&nbsp; &nbsp;</td>


</tr>


<tr><td style="width: 100px;padding-right:  20px; "><p style="justify-content: center; text-align: justify;">
Prenez votre trajet habituel à prix convenablement bas!
</p></td>
<td  style="width: 200px;">
  <p style="justify-content: center; text-align: justify;">
Vous arrivez à l'adresse exacte de votre destination sans perdre de temps sur le quai ou dans les files d'attente.
</p></td><td style="width: 100px;">&nbsp; &nbsp;</td>


</tr>
</table>


  			</div>
    	</div>
      <div class="one-half ftco-animate">
        <div class="heading-section ftco-animate ">
          <h2 class="mb-4">Pourquoi nous choisir?</h2>
        </div>
        <div>
          
            <table style="width: 500px;"><tr style="text-align: center;"> <td><span style="font-weight: bold;">Avoir le choix</span></td><td><span style="font-weight: bold;">Communauté<br/></span>
</tr><tr> <td  style="padding-right:  20px; "style="width: 250px;"><p style="justify-content: center; text-align: justify;">
L'avantage des routes ? Elles vont partout ! Littéralement. Profitez de milliers de destinations.</p></td><td style="width: 250px;"><p style="justify-content: center; text-align: justify;">
Nous connaissons chacun de nos membres. Comment ? Nous vérifions profils, avis, et pièces d'identité. Vous savez ainsi avec qui vous voyagez.</p></td></tr>
</table>
        </div>
      </div>
    </section>

    

    <section class="ftco-section ftco-counter img" id="section-counter" style="background-image: url(images/bg_1.jpg);" data-stellar-background-ratio="0.5">
    	<div class="container">
    		<div class="row justify-content-center">
    			<div class="col-md-10">
		    		<div class="row">
		          <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center">
		              <div class="text">
		                <strong class="number" data-number="100000">0</strong>
		                <span>clients</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center">
		              <div class="text">
		                <strong class="number" data-number="40000">0</strong>
		                <span>trajets</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center">
		              <div class="text">
		                <strong class="number" data-number="87000">0</strong>
		                <span>Villes</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center">
		              <div class="text">
		                <strong class="number" data-number="56400">0</strong>
		                <span>Conducteurs</span>
		              </div>
		            </div>
		          </div>
		        </div>
	        </div>
        </div>
    	</div>
    </section>





    <section  id="reviews" class="reviews" style="padding-top: 30px; ">
      
<div class="reviews-content"style="margin-top: 0px !important;"><div class="section-header">
        
        <div class="row justify-content-center mb-5 pb-3" style="margin-bottom: 0px !important;">
          <div class="col-md-7 heading-section text-center ftco-animate">
            <h2 class="mb-4" style="margin-bottom: 0px !important;"><strong>Nouveaux</strong></h2>
          </div>
        </div>        
      </div><!--/.section-header-->
        <div class="testimonial-carousel">
        
<?php 
       $new=DB::select('SELECT * FROM `trajets` GROUP by `id` desc '); 
//echo count($new);


foreach ($new as $key => $value) {
if ($key <5) {
  $marge=explode(",", $value->prix);
  $min=$marge[0];
  $max=$marge[1];
/////////////////////////////recherche du temps/////////////////////////////////
    $id_date=$value->id_date;
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
$owner=DB::select('select * from users where id=? ',[$value->id_user]);
    $conducteur=$owner[0];
  echo ' <div class="single-testimonial-box" style="background-color:white;" > 
            <div  class=" col-md-4 col-sm-6">
              <div style="width: 370px;" >
                <div class="single-explore-img" style="width: 370px;height: 250px; " >
                  <img src="images/'.$value->destination.'.jpg" style="width : 100% ; height: 100%;"alt="explore image">
                  <div class="single-explore-img-info">
                    
                    <div class="single-explore-image-icon-box">
                      <ul>
                        <li>
                          <div class="single-explore-image-icon">
                            <i class="fa fa-arrows-alt"></i>
                          </div>
                        </li>
                        <li>
                          <div class="single-explore-image-icon">
                            <i class="fa fa-bookmark-o"></i>
                          </div>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="single-explore-txt bg-theme-1">
                  <h2 style="color: #F9BE37; font-size:17px;">'.$value->depart.' -> '.$value->destination.' <br/> '.$date.' </h2>
                  <p class="explore-rating-price">
                    <span class="explore-rating">'.$value->places.'</span>
                     places disponibles
                    <span class="explore-price-box">
                      Prix
                      <span class="explore-price">'.$min.'MAD-'.$max.'MAD</span>
                    </span>
                  
                  </p>
                  <div class="explore-person" >
                    <div class="row">
                      <div class="col-sm-4" >
                        <div class="explore-person-img" style="width: 100px;height: 100px; text-align: center;margin-bottom:20px;">
                          <div style="clip-path: circle(30px at center);">
                            '; echo '<img src="images/pdp/'.$conducteur->photo.'" alt="explore person">';  echo '
                          
                          </div>
                                                    
                          <button class="close-btn" style="line-height: 1; font-size: 14px;">'.$conducteur->nom.'</button>
                          
                        </div>

                      </div>
                      <div class="col-sm-8">

                        <p style="padding-top: 16px;">
                         '; if ($value->description!=null) echo $value->description;else echo "(Description de l'offre non disponible)"; echo ' 
                        </p>
                      </div>
                    </div>
                    <p></p>
                  </div>
                  <div class="explore-open-close-part">
                    <div class="row">
                      <div class="col-sm-12"  style="text-align: center;">
                        <a class="close-btn open-btn" style=" color: #70A9FF;cursor:pointer;" href="trajet/'.$value->id.'">Voir <span style="text-transform: lowercase;"> offre</span></a>
                      </div>
                      <div class="col-sm-0">
                        <div class="explore-map-icon">
                          
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
         </div>';
}}
?>
         
        <!------
  
          <div class="single-testimonial-box" style="background-color:white;" > 
            <div  class=" col-md-4 col-sm-6">
              <div style="width: 370px;" >
                <div class="single-explore-img" style="width: 370px;height: 250px; ">
                  <img src="images/tanger.jpg" style="width : 100% ; height: 100%;"alt="explore image">
                  <div class="single-explore-img-info">
                    <button onclick="window.location.href='#'">best rated</button>
                    <div class="single-explore-image-icon-box">
                      <ul>
                        <li>
                          <div class="single-explore-image-icon">
                            <i class="fa fa-arrows-alt"></i>
                          </div>
                        </li>
                        <li>
                          <div class="single-explore-image-icon">
                            <i class="fa fa-bookmark-o"></i>
                          </div>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="single-explore-txt bg-theme-1">
                  <h2><a href="#">Casablanca -> Fès</a></h2>
                  <p class="explore-rating-price">
                    <span class="explore-rating">2</span>
                    <a href="#"> places disponibles</a> 
                    <span class="explore-price-box">
                      Prix
                      <span class="explore-price">50MAD-300MAD</span>
                    </span>
                  
                  </p>
                  <div class="explore-person" >
                    <div class="row">
                      <div class="col-sm-4" >
                        <div class="explore-person-img" style="width: 100px;height: 100px; text-align: center;">
                          <a href="#" style="clip-path: circle(30px at center);">
                            <img src="images/tanger.jpg" alt="explore person">
                          
                          </a>
                          <button class="close-btn" style="line-height: 1; font-size: 14px;">nom et prénom de la personne</button>
                          
                        </div>

                      </div>
                      <div class="col-sm-8">

                        <p style="padding-top: 16px;">
                          Description de l'offre, Description de l'offre, Description de l'offre,Description de l'offre.... 
                        </p>
                      </div>
                    </div>
                    <p></p>
                  </div>
                  <div class="explore-open-close-part">
                    <div class="row">
                      <div class="col-sm-5"  style="text-align: center;">
                        <button class="close-btn open-btn" style=" color: #70A9FF;" onclick="window.location.href='#'">Voir offre</button>
                      </div>
                      <div class="col-sm-7">
                        <div class="explore-map-icon">
                          <a href="#"><i data-feather="map-pin"></i></a>
                          <a href="#"><i data-feather="heart"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
         </div>
         <div class="single-testimonial-box" style="background-color:white;" > 
            <div  class=" col-md-4 col-sm-6">
              <div style="width: 370px;" >
                <div class="single-explore-img" style="width: 370px;height: 250px; ">
                  <img src="images/casablanca.jpg" style="width : 100% ; height: 100%;"alt="explore image">
                  <div class="single-explore-img-info">
                    <button onclick="window.location.href='#'">best rated</button>
                    <div class="single-explore-image-icon-box">
                      <ul>
                        <li>
                          <div class="single-explore-image-icon">
                            <i class="fa fa-arrows-alt"></i>
                          </div>
                        </li>
                        <li>
                          <div class="single-explore-image-icon">
                            <i class="fa fa-bookmark-o"></i>
                          </div>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="single-explore-txt bg-theme-1">
                  <h2><a href="#">Casablanca -> Fès</a></h2>
                  <p class="explore-rating-price">
                    <span class="explore-rating">2</span>
                    <a href="#"> places disponibles</a> 
                    <span class="explore-price-box">
                      Prix
                      <span class="explore-price">50MAD-300MAD</span>
                    </span>
                  
                  </p>
                  <div class="explore-person" >
                    <div class="row">
                      <div class="col-sm-4" >
                        <div class="explore-person-img" style="width: 100px;height: 100px; text-align: center;">
                          <a href="#" style="clip-path: circle(30px at center);">
                            <img src="images/casablanca.jpg" alt="explore person">
                          
                          </a>
                          <button class="close-btn" style="line-height: 1; font-size: 14px;">nom et prénom de la personne</button>
                          
                        </div>

                      </div>
                      <div class="col-sm-8">

                        <p style="padding-top: 16px;">
                          Description de l'offre, Description de l'offre, Description de l'offre,Description de l'offre.... 
                        </p>
                      </div>
                    </div>
                    <p></p>
                  </div>
                  <div class="explore-open-close-part">
                    <div class="row">
                      <div class="col-sm-5"  style="text-align: center;">
                        <button class="close-btn open-btn" style=" color: #70A9FF;" onclick="window.location.href='#'">Voir offre</button>
                      </div>
                      <div class="col-sm-7">
                        <div class="explore-map-icon">
                          <a href="#"><i data-feather="map-pin"></i></a>
                          <a href="#"><i data-feather="heart"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
         </div>
         <div class="single-testimonial-box" style="background-color:white;" > 
            <div  class=" col-md-4 col-sm-6">
              <div style="width: 370px;" >
                <div class="single-explore-img" style="width: 370px;height: 250px; ">
                  <img src="images/nador.jpg" style="width : 100% ; height: 100%;"alt="explore image">
                  <div class="single-explore-img-info">
                    <button onclick="window.location.href='#'">best rated</button>
                    <div class="single-explore-image-icon-box">
                      <ul>
                        <li>
                          <div class="single-explore-image-icon">
                            <i class="fa fa-arrows-alt"></i>
                          </div>
                        </li>
                        <li>
                          <div class="single-explore-image-icon">
                            <i class="fa fa-bookmark-o"></i>
                          </div>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="single-explore-txt bg-theme-1">
                  <h2><a href="#">Casablanca -> Fès</a></h2>
                  <p class="explore-rating-price">
                    <span class="explore-rating">2</span>
                    <a href="#"> places disponibles</a> 
                    <span class="explore-price-box">
                      Prix
                      <span class="explore-price">50MAD-300MAD</span>
                    </span>
                  
                  </p>
                  <div class="explore-person" >
                    <div class="row">
                      <div class="col-sm-4" >
                        <div class="explore-person-img" style="width: 100px;height: 100px; text-align: center;">
                          <a href="#" style="clip-path: circle(30px at center);">
                            <img src="images/nador.jpg" alt="explore person">
                          
                          </a>
                          <button class="close-btn" style="line-height: 1; font-size: 14px;">nom et prénom de la personne</button>
                          
                        </div>

                      </div>
                      <div class="col-sm-8">

                        <p style="padding-top: 16px;">
                          Description de l'offre, Description de l'offre, Description de l'offre,Description de l'offre.... 
                        </p>
                      </div>
                    </div>
                    <p></p>
                  </div>
                  <div class="explore-open-close-part">
                    <div class="row">
                      <div class="col-sm-5"  style="text-align: center;">
                        <button class="close-btn open-btn" style=" color: #70A9FF;" onclick="window.location.href='#'">Voir offre</button>
                      </div>
                      <div class="col-sm-7">
                        <div class="explore-map-icon">
                          <a href="#"><i data-feather="map-pin"></i></a>
                          <a href="#"><i data-feather="heart"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
         </div>
         <div class="single-testimonial-box" style="background-color:white;" > 
            <div  class=" col-md-4 col-sm-6">
              <div style="width: 370px;" >
                <div class="single-explore-img" style="width: 370px;height: 250px; ">
                  <img src="images/rabat.jpg" style="width : 100% ; height: 100%;"alt="explore image">
                  <div class="single-explore-img-info">
                    <button onclick="window.location.href='#'">best rated</button>
                    <div class="single-explore-image-icon-box">
                      <ul>
                        <li>
                          <div class="single-explore-image-icon">
                            <i class="fa fa-arrows-alt"></i>
                          </div>
                        </li>
                        <li>
                          <div class="single-explore-image-icon">
                            <i class="fa fa-bookmark-o"></i>
                          </div>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="single-explore-txt bg-theme-1">
                  <h2><a href="#">Casablanca -> Fès</a></h2>
                  <p class="explore-rating-price">
                    <span class="explore-rating">2</span>
                    <a href="#"> places disponibles</a> 
                    <span class="explore-price-box">
                      Prix
                      <span class="explore-price">50MAD-300MAD</span>
                    </span>
                  
                  </p>
                  <div class="explore-person" >
                    <div class="row">
                      <div class="col-sm-4" >
                        <div class="explore-person-img" style="width: 100px;height: 100px; text-align: center;">
                          <a href="#" style="clip-path: circle(30px at center);">
                            <img src="images/rabat.jpg" alt="explore person">
                          
                          </a>
                          <button class="close-btn" style="line-height: 1; font-size: 14px;">nom et prénom de la personne</button>
                          
                        </div>

                      </div>
                      <div class="col-sm-8">

                        <p style="padding-top: 16px;">
                          Description de l'offre, Description de l'offre, Description de l'offre,Description de l'offre.... 
                        </p>
                      </div>
                    </div>
                    <p></p>
                  </div>
                  <div class="explore-open-close-part">
                    <div class="row">
                      <div class="col-sm-5"  style="text-align: center;">
                        <button class="close-btn open-btn" style=" color: #70A9FF;" onclick="window.location.href='#'">Voir offre</button>
                      </div>
                      <div class="col-sm-7">
                        <div class="explore-map-icon">
                          <a href="#"><i data-feather="map-pin"></i></a>
                          <a href="#"><i data-feather="heart"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
         </div>
          
          ------>

          </div>
        </div>
      
    </section><!--/.explore-->
    <!--explore end -->
@guest
		<section class="ftco-section-parallax">
      <div class="parallax-img d-flex align-items-center">
        <div class="container">
          <div class="row d-flex justify-content-center">
            <div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
              <h2>Qu'attendez vous pour vous inscrire ?</h2>
              <p>Joignez maintenant la communauté qui fait la différence!</p>
              <div class="row d-flex justify-content-center mt-5">
                <div class="col-md-8">
                  <form action="register" class="subscribe-form">
                    <div class="form-group d-flex"style=" margin-left: 150px; width: 100px;">
                     <a href="register"> <input type="button" value="S'iscrire"  class="submit px-3"></a>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
     @endguest
@endsection
   