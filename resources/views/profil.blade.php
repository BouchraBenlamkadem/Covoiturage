@extends('layouts.app2')

@section('content')
<?php $user =Auth::user(); 

?>

<?php 





 function afficher($id,$depart,$destination,$id_date,$places,$prix)
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
    
    
   echo '
<div   class="single-testimonial-box" style="width: 400px; font-size:12px; background-color:white;padding:0px;cursor: pointer; margin-bottom:10px;"  onclick="window.location.href=\'trajet/'.$id.'\'"> <!--      padding: 20px 0px;   --->
            <div  class=" col-md-4 col-sm-6" style="padding-left: 5px;">
              <div style="width: 400px;" >
               
                <div class="single-explore-txt bg-theme-1  " style="padding: 0px;">
                  <h2 style="margin-bottom: 0px;"><a  style="color: #F9BD3B;"><table> <td style="width: 300px;padding-left:15px;font-size:12px;" valign="top"> Départ:'.$depart.' <br/> Destination:'.$destination.'</td><td style="width: 300px; text-align: right;font-size:12px; padding-right:20px;">'.$date.' <br/> A: '.$h.'h'.$m.'  </td></table></a></h2>
                  <p class="explore-rating-price"><table><td style="width: 300px; text-align: right;padding-right:20px;">
                    <span class="explore-rating"style="margin-right: 70px;" >'.$nbr.'</span><br/>
                    <a href="#" style="color: #F9BD3B;"> places disponibles</a> <br/>
                      Prix
                      <span class="explore-price">'.$marge[0].'MAD-'.$marge[1].'MAD</span>
                    </td>
                  </table>
                  </p>
                        
                </div>
              </div>
            </div>
         </div>

   ';
  }



   ?>



   <?php
 function trajetliste($user)
{
	 $today=date("Y-m-d");
    $trajets =DB::select('select * from trajets INNER JOIN dates ON trajets.id = dates.id  where dates.id=trajets.id_date and ( dates.date_unique >= ? or dates.unique = \'0\') and id_user = ? order by dates.date_unique,dates.heure',[$today,$user->id]);
    foreach ($trajets as $key ) {
      afficher($key->id,$key->depart,$key->destination,$key->id_date,$key->places,$key->prix);
    
  }
}
   

   ?>
<!--<script type="text/javascript">

$(function(){
    $("#upload_link").on('click', function(e){
        e.preventDefault();
        $("#upload:hidden").trigger('click');
    });
});
/*
				$path = Storage::putFileAs(
   			    'user_pdp'+$user->id, $request->file('user_pdp'));
				javascript:Replace('contenu',1);*/
</script>-->
<script type="text/javascript">

	function Replace(id,content)
	{var afficher ='erreur '+content; 
		if (content==1)
		{
			 
			 
			afficher = '<table> <td style="padding-right:70px;"><div  class="single-testimonial-box" style="width: 420px; "style="background-color:white;" > <div class=" col-md-4 col-sm-6"> <div style="width: 400px;" >                <div class="single-explore-txt bg-theme-1  ">      <div class="explore-person" style="padding-bottom: 0px;" >                    <div class="row">                        <div class="col-sm-4" >                        <div class="explore-person-img" style="width: 150px;height: 150px; text-align: center;">                          <a href="#" style="clip-path: circle(45px at center);">                            <img src="images/pdp/'+'<?php echo $user->photo ?>'+'" alt="explore person">        </a>  </div></div><div class="col-sm-8" >    <button class="close-btn" style="line-height: 1; font-size: 14px; padding-left: 30px;text-align: left; ">Nom : '+'<?php echo $user->nom ?>'+' <br/><br/><br/> Age : '+'<?php echo $user->age ?>'+' <span style="text-transform: lowercase;">ans</span>  <br/><br/><br/>description : '+'<?php echo $user->description ?>'+'  <br/><br/><br/>Expérience : '+'<?php echo $user->experience ?>'+'  <br/><br/><br/>Avis : <?php if ($user->avis == null) echo "... /5  (aucun)"; else echo $user->avis ?></button>                     </div>                    </div>                    <p></p>                   </div>  <div class="explore-person" style="padding-bottom:0px;padding-top:10px;padding-left:20px;font-weight:bold;" >      Vérification d\'informations d\'identité     </div>      <div class="explore-person"  > <span style="font-size: 15px;padding-left: 20px;" > Pièce d\'identité vérifiée : <span style="font-size:12px;color:red;"> <img src="images/'+'<?php echo $user->identite_ver  ?>'+'.png" alt="en cours de vérification">'+'<?php if($user->identite_ver==2) echo ' en cours de vérification'?>'+'</span></span> <br/><span style="font-size: 15px;padding-left: 20px;" > Permit vérifié <span style="font-size:12px;color:red;">:  <img src="images/'+'<?php echo $user->permit_ver  ?>'+'.png" alt="en cours de vérification"></span></span><br/><span style="font-size: 15px;padding-left: 20px;" > Email vérifié<span style="font-size:12px;color:red;"> :  <img src="images/'+'<?php echo $user->email_ver  ?>'+'.png" alt="en cours de vérification"></span></span>    </div>  <div class="explore-open-close-part">                                        <div  style="align-content: center;">                      <button class="close-btn open-btn" style=" color: #70A9FF; margin:0 auto; display:block;" onclick="window.location.href=\'#\'"><a href="javascript:Replace(\'contenu\',\'4\')"style=" color: #70A9FF;" > Modifier</a> </button>                     </div>   </div>                    </div>              </div>            </div>         </div> </td> </table>';
			}else if (content==2)
			 afficher ='liste des commentaires';
			
			else if (content==3)
			 afficher ='messages';
			else if (content==4)
			 afficher = '<div  class="single-testimonial-box" style="width: 420px; "style="background-color:white;" > <div class=" col-md-4 col-sm-6"> <div style="width: 400px;" >                <div class="single-explore-txt bg-theme-1  ">      <div class="explore-person" style="padding-bottom: 0px;" >                    <div class="row">                        <div class="col-sm-4" >                        <div class="explore-person-img" style="width: 150px;height: 150px; text-align: center;">                          <a href="#" style="clip-path: circle(45px at center);">                            <img src="images/pdp/'+'<?php echo $user->photo ?>'+'" alt="explore person">        </a>  <button class="close-btn open-btn" style=" color: #70A9FF; margin:0 auto; display:block;" onclick="window.location.href=\'#\'"><a href="javascript:Modifier(\'pdp\')" id="upload_link"style=" color: #70A9FF;" > Changer photo de profile</a> </button></div></div><div class="col-sm-8" >    <button class="close-btn" style="line-height: 1; font-size: 14px; padding-left: 30px;text-align: left; ">Nom : '+'<?php echo $user->nom ?>'+' <br/><br/><br/> Age : '+'<?php echo $user->age ?>'+' <span style="text-transform: lowercase;">ans</span> <br/><br/><br/>description : '+'<?php if ($user->description ==null) echo " <a  href=\"javascript:Modifier(\'description\')\"style=\" color: #70A9FF;\" > ajouter</a> "; else {echo $user->description;echo "<br/> <a  href=\"javascript:Modifier(\'description\')\"style=\" color: #70A9FF;\" > modifier</a> ";}?>'+'   <br/><br/><br/>Expérience : '+'<?php echo $user->experience ?>'+'  <br/><br/><br/>Avis : ... /5</button>                     </div>                    </div>                    <p></p>                   </div>  <div class="explore-person" style="padding-bottom:0px;padding-top:10px;padding-left:20px;font-weight:bold;" >      Vérification d\'informations d\'identité     </div>      <div class="explore-person"  > <span style="font-size: 15px;padding-left: 20px;" > Pièce d\'identité vérifiée : <span style="font-size:12px;color:red;"> <img src="images/'+'<?php echo $user->identite_ver  ?>'+'.png" alt="en cours de vérification">'+'<?php if($user->identite_ver==2) echo ' en cours de vérification'?>'+'</span></span> <br/><span style="font-size: 15px;padding-left: 20px;" > Permit vérifié <span style="font-size:12px;color:red;">:  <img src="images/'+'<?php echo $user->permit_ver  ?>'+'.png" alt="en cours de vérification"></span></span><br/><span style="font-size: 15px;padding-left: 20px;" > Email vérifié<span style="font-size:12px;color:red;"> :  <img src="images/'+'<?php echo $user->email_ver  ?>'+'.png" alt="en cours de vérification"></span></span>'+'<?php if($user->identite_ver=='0') echo "<br/><span style=\"font-size: 15px;padding-left: 20px;color: #70A9FF;\" > <a  href=\"javascript:Modifier(\'identité\')\" \"style=\" color: #70A9FF;\" > Envoyer pièce d\'identité</a></span> "?>'+'  </div>            <div class="explore-open-close-part">                                        <div  style="align-content: center;">                      <button class="close-btn open-btn" style=" color: #70A9FF; margin:0 auto; display:block;" onclick="window.location.href=\'#\'"><a href="javascript:Replace(\'contenu\',\'4\')"style=" color: #70A9FF;" > Modifier</a> </button>                     </div>   </div>                </div>              </div>            </div>         </div>';
			
		var container = document.getElementById(id);
		container.innerHTML=afficher;
		if (content==5)
		{

		}
	}
	
</script>


 <br/><br/><br/>
<div style="background-color: rgba(113,113,113,0.1);padding-top: 1px;">
<div style="margin-left: 50px; " >

<table id="mytable" style="width: 800px;margin-top: 60px;"  >
<td style="width: 200px;height: 600px; padding-right: 100px;" valign="top" >

<div  class="single-testimonial-box" style="width: 220px; "style="background-color:white;" > <div class=" col-md-4 col-sm-6"> <div style="width: 200px;" >                <div class="single-explore-txt bg-theme-1  ">      <div class="explore-person" style="padding-bottom: 20px;" >      <a href="javascript:Replace('contenu','1')"  style="padding-left: 56px;" >profil</a>        </div>          <div class="explore-person" style="padding-bottom: 20px;" >     <a href="javascript:Replace('contenu','2')"   " style="padding-left: 22px;" ><br/>  Commentaires </a>        </div>       <a href="javascript:Replace('contenu','3')"  style="padding-left: 40px;"> <br/>  messages</a>                              </div>              </div>            </div>         </div>
  



</td>
<td  src="profil_content" style="width: 300px;" valign="top">
	<!--profil-->
	
<div name="contenu" id="contenu" >
</div>
</td>
<td style="width: 300px;" valign="top">
	<div  class="single-testimonial-box" style="width: 420px; "style="background-color:white;" ><div align="center">Trajets</div> <div style="width: 400px;" >                <div class="single-explore-txt bg-theme-1  ">    <?php trajetliste($user);?> </div>  </div></div>  
	
</td>
</table>


</div></div>


<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content" >
    <span class="close" style="width: 10px;">&times;</span> <form method="POST" action="Modifier_description">{{csrf_field()}}
    <textarea name="new_des" id="new_des" class="form-control" placeholder="<?php if ($user->description ==null) echo 'Je suis ...'; ?>" rows="5" style="background-color: white;"> <?php if ($user->description !=null)echo $user->description; ?></textarea>
    <button type="submit" class="close-btn open-btn" style=" color: #70A9FF; margin:0 auto; display:block;" onclick="window.location.href=\'#\'"> Enregistrer </button></form>
  </div>

</div>
<!-- The Modal 2-->
<div id="myModal2" class="modal">

  <!-- Modal content -->
  <div class="modal-content" >
    <span class="close" style="width: 10px;">&times;</span> <form method="POST" action="Modifier_pdp" enctype="multipart/form-data">{{csrf_field()}}
    <input type="file" id="photo" name="photo" accept="image/*" style="padding-left: 100px;"/>
    <button type="submit" class="close-btn open-btn" style=" color: #70A9FF; margin:0 auto; display:block;" onclick="window.location.href=\'#\'"> Enregistrer </button></form>
  </div>

</div>



<div id="myModal3" class="modal">

  <!-- Modal content -->
  <div class="modal-content" >
    <span class="close" style="width: 10px;">&times;</span> <form method="POST" action="Modifier_identité" enctype="multipart/form-data">{{csrf_field()}}
    <input type="file" id="identité" name="identité" accept="image/*" style="padding-left: 100px;"/>
    <button type="submit" class="close-btn open-btn" style=" color: #70A9FF; margin:0 auto; display:block;" onclick="window.location.href=\'#\'"> Enregistrer </button></form>
  </div>

</div>




<script type="text/javascript">Replace('contenu','1');</script>

<script>
	function Modifier(id)
	{
// Get the modal
if(id=="description")
var modal = document.getElementById('myModal');
else if(id=="pdp")
var modal = document.getElementById('myModal2');
else if(id=="identité")
var modal = document.getElementById('myModal3');

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 

  modal.style.display = "block";


// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
	}

</script>
@endsection