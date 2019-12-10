@extends('layouts.app2')

@section('content') 

<?php 
$id=Storage::get('id');
$query=DB::select('select * from trajets where id=? ',[$id]);
$trajet=$query[0];
$marge=explode(",", $trajet->prix);
$min=$marge[0];
$max=$marge[1];




/////////////////////////////recherche du temps/////////////////////////////////
    $id_date=$trajet->id_date;
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
    $owner=DB::select('select * from users where id=? ',[$trajet->id_user]);
    $conducteur=$owner[0];
    Storage::put('conducteur',$trajet->id_user);
?>


<br/><br/><br/>
<div style="background-color: rgba(113,113,113,0.1);"><br/>
<div style="margin-left: 50px; " ><table style="width: 780px;">
    <td valign="top" style="width: 775px; ">
          <div  class="single-testimonial-box" style="width: 770px; "style="background-color:white;" > <!--      padding: 20px 0px;   --->
            <div  class=" col-md-4 col-sm-6">
              <div style="width: 750px;" >
               
                <div class="single-explore-txt bg-theme-1  ">
                  <h2 ><a href="#" style="color: #F9BD3B;"><table> <td style="width: 375px;"> Départ: <?php echo $trajet->depart; ?> <br/> Destination: <?php echo $trajet->destination; ?></td><td style="width: 375px; text-align: right;"><?php echo $date; ?> <br/> L'heure de départ: <?php echo $h.'h'.$m; ?> </td></table></a></h2>
                  <p class="explore-rating-price"><table> <td style="width: 375px;">
                    <span class="explore-rating"><?php echo $trajet->places; ?></span>
                    <a href="#" style="color: #F9BD3B;"> places disponibles</a> </td><td style="width: 375px; text-align: right;">
                    
                      Prix
                      <span class="explore-price"><?php echo $min; ?>MAD-<?php echo $max; ?>MAD</span>
                    </td>
                  </table>
                  </p>
                  <div class="explore-person" >
                    <div class="row">
                      <div class="col-sm-6" >
                        <p style="padding-top: 16px;">
                          <?php echo $trajet->description; ?>
                        </p>
                      </div>
                      <div class="col-sm-6">
                            <span style="width: 700px ;margin-left:50px;" class="explore-price-box" >
                        <p >
                          <p><img src="images/check.png" style="height: 15px; width: 15px;"></img> regle 1</p> 
                          <p><img src="images/X.png" style="height: 15px; width: 15px;"></img> regle 2</p> 
                          <p><img src="images/X.png" style="height: 15px; width: 15px;"></img> regle 3</p> 

                        </p></span>
                      </div>
                    </div>
                    <p></p>
                  </div>
                 <div class="explore-open-close-part">
                   
                      <div  >
                       <?php $user_id =Auth::id();  if($conducteur->id!=$user_id) echo" <button class=\"close-btn open-btn\" style=\" color: #70A9FF; float: right;\" onclick=\"window.location.href='#'\">Réserver</button>"; else echo" <button class=\"close-btn open-btn\" style=\" color: #70A9FF; float: right;\" onclick=\"window.location.href='modification/".$id."'\">Modifier</button>"; ?>
                      </div>
                      
                  
                  </div>
                </div>
              </div>
            </div>
         </div>  </td>

<td style="padding-left: 50px;">
   <div  class="single-testimonial-box" style="width: 420px; "style="background-color:white;" > 
            <div  class=" col-md-4 col-sm-6">
              <div style="width: 400px;" >
               
                <div class="single-explore-txt bg-theme-1  ">
                  
                 
                  <div class="explore-person" style="padding-bottom: 0px;" >
                    <div class="row">
                        <div class="col-sm-4" >
                        <div class="explore-person-img" style="width: 150px;height: 150px; text-align: center;">
                          <a href="#" style="clip-path: circle(45px at center);">
                            <?php  echo '<img src="images/pdp/'.$conducteur->photo.'" alt="explore person">';  ?>
                          
                          </a>
                          
                          
                        </div>
</div><div class="col-sm-8" >
    <button class="close-btn" style="line-height: 1; font-size: 14px; padding-left: 10px;"><?php echo $conducteur->nom; ?> <br/><br/><br/> <?php echo $conducteur->age; ?> <span style="text-transform: lowercase;">ans</span> <br/><br/><br/> Avis : <?php if ($conducteur->avis == null) echo "... /5  (aucun)"; else echo $conducteur->avis ?></button>
                     </div>
                     
                    </div>
                    <p></p>
                  </div>
                  <div class="explore-open-close-part">
                   
                      <div  style="align-content: center;">
                       
                         <?php $user_id =Auth::id();  if($conducteur->id!=$user_id) echo" <button class=\"close-btn open-btn\" style=\"  color: #70A9FF; margin:0 auto; display:block;\" onclick=\"window.location.href='conducteur'\">Voir le profile du conducteur</button>"; else echo" <button class=\"close-btn open-btn\" style=\" color: #70A9FF; margin:0 auto; display:block;\" onclick=\"window.location.href='profil'\">Retour à mon profile</button>"; ?>
                      </div>
                      
                   
                  </div>
                </div>
              </div>
            </div>
         </div>
<br/>
 <div  class="single-testimonial-box" style="width: 420px; padding-top: 0px;  "style="background-color:white;" > 
            <div  style="margin-left: 10px;">
              <div style="width: 400px;" >
               
                  
                        <h2 style=" text-align: center;"><a href="#" style="color: #F9BD3B;">Véhicule </a></h2>
                      
                 
                  <div class="explore-person" style="padding-bottom: 0px;" >
                   
                        <div class="explore-person-img" style="width: 400px;height: 280px; align-content: center;">
                          <a href="#" >
                            <img src="images/none.png" alt="explore person">
                          
                          </a>
                          
                          
                        </div>
   <br/>
                     </div>
                     
                    </div><div align="center">
                    <p > ( Nom non disponible)</p></div>
                  </div>
                 
              </div>
            
</td>



         
</table></div></div>
  <!--      <section class="main-content">

            <div class="container">
                <div class="row">

                    <div class="col-sm-12 col-md-12 col-xs-12">

                        <div class="page-sub-title textcenter">
                            <h2>Add new ride</h2>
                            <div class="line"></div>
                        </div><!-- end .page-sub-title -->

   <!--                  </div><!-- end .col-lg-12 -->
<!-- 
                    <div class="col-sm-12 col-md-12 col-xs-12">

                        <div class="page-content add-new-ride">

                            <form action="" novalidate autocomplete="off" class="idealforms add-ride">

                                <div class="field">
                                    <select id="destination" name="destination">
                                        <option value="default">From</option>
                                        <option>Sofia</option>
                                        <option>Plovdiv</option>
                                        <option>Hamburg</option>
                                        <option>Milano</option>
                                        <option>Paris</option>
                                        <option>Madrid</option>
                                        <option>Berlin</option>
                                    </select>
                                </div>

                                <div class="field">
                                    <select id="destinationd" name="destinationd">
                                        <option value="default">To</option>
                                        <option>Sofia</option>
                                        <option>Plovdiv</option>
                                        <option>Hamburg</option>
                                        <option>Milano</option>
                                        <option>Paris</option>
                                        <option>Madrid</option>
                                        <option>Berlin</option>
                                    </select>
                                </div>

                                <div class="field">
                                    <input name="event" type="text" placeholder="Date" class="datepicker">
                                </div>

                                <div class="field">
                                    <select id="destination" name="destination">
                                        <option value="default">Number of seats</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                    </select>
                                </div>

                                <div class="field buttons">
                                    <button type="submit" class="btn btn-lg green-color">Submit</button>
                                </div>

                            </form>

                        </div><!-- end .page-content -->

  <!--                   </div><!-- end .col-sm-12 -->

  <!--               </div><!-- end .row -->
  <!--           </div><!-- end .container -->

 <!--        </section><!-- end .main-content -->

@endsection
        