@extends('layouts.app2')

@section('content') 


<?php 
                                     
                                      $villes=array();
                                      $villes[0]="Casablanca";
                                      $villes[1]="Fès";
                                      $villes[5]="Nador";
                                      $villes[3]="Hoceima";
                                      $villes[4]="Tanger";
                                      $villes[2]="Meknès";
                                      $villes[6]="Rabat"; 
 ?>

<?php 
$id=Storage::get('trajet_id');
$query=DB::select('select * from trajets where id=? ',[$id]);
$trajet=$query[0];
$marge=explode(",", $trajet->prix);
$min=$marge[0];
$max=$marge[1];




/////////////////////////////recherche du temps/////////////////////////////////
    $id_date=$trajet->id_date;
    $date=" ";$lun=0;$mar=0; $mer=0; $jeu=0; $ven=0; $sam=0; $dim=0;
    $dates=DB::select('select * from dates where id=? ',[$id_date]);
    if ($dates[0]->unique==1) {
      $date='Le: '.$dates[0]->date_unique;
    }else
    {
      $date_jour=explode(",", $dates[0]->jour);
      foreach ($date_jour as $key ) {
        switch ($key) {
          case 'lun':
            $lun=1;
            break;
          case 'mar':
            $mar=1;
            break;case 'mer':
            $mer=1;
            break;case 'jeu':
            $jeu=1;
            break;case 'ven':
            $ven=1;
            break;case 'sam':
            $sam=1;
            break;case 'dim':
            $dim=1;
            break;
          default:
            
            break;
        }
        $date="";
      }
      
    }
$heure_tt="".$dates[0]->heure;
$heure=explode(":", $heure_tt);
$h=$heure[0];
$m=$heure[1];
/////////////////////////////////////////////////////////////////////
    $owner=Auth::id();

    ///////////////////old : changements à resaisir en cas d'erreur /////////
    if (old('lun')=='lun') {//////////////////////////////////////bug : cas où l'utilisateur a decocher une case remplie de la bd elle revient ( on ne peut pas differencier entre old() decochee et old() d'une page nouvelle les deux sont =='')
      $lun=1;
    }else if (Storage::get('modifier_offre_first')==2) {
      $lun=0;
    }
    if (old('mar')=='mar') {
      $mar=1;
    }else if (Storage::get('modifier_offre_first')==2) {
      $mar=0;
    }
    if (old('mer')=='mer') {
      $mer=1;
    }else if (Storage::get('modifier_offre_first')==2) {
      $mer=0;
    }
    if (old('jeu')=='jeu') {
      $jeu=1;
    }else if (Storage::get('modifier_offre_first')==2) {
      $jeu=0;
    }
    if (old('ven')=='ven') {
      $ven=1;
    }else if (Storage::get('modifier_offre_first')==2) {
      $ven=0;
    }
    if (old('sam')=='sam') {
      $sam=1;
    }else if (Storage::get('modifier_offre_first')==2) {
      $sam=0;
    }
    if (old('dim')=='dim') {
      $dim=1;
    }else if (Storage::get('modifier_offre_first')==2) {
      $dim=0;
    }
      if((old('depart')!=$trajet->depart)&&(old('depart')!=""))
        $trajet->depart=old('depart');
      if((old('destination')!=$trajet->destination)&&(old('destination')!=""))
        $trajet->destination=old('destination');
      if((old('nbr')!=$trajet->places)&&(old('nbr')!=""))
        $trajet->places=old('nbr');
       if((old('min')!=$min)&&(old('min')!=""))
        $min=old('min');
       if((old('max')!=$max)&&(old('max')!=""))
        $max=old('max');
      if((old('description')!=$trajet->description)&&(old('description')!=""))
        $trajet->description=old('description');

      $description=$trajet->description;
    ////////////////////////////////////////////////////////////////////////
?>


<br/><br/><br/><form action="save" >


<div style="background-color: rgba(113,113,113,0.1); padding-left: 250px;"><br/>
<div style="margin-left: 50px; " ><table style="width: 780px;">
    <td valign="top" style="width: 775px; ">
          <div  class="single-testimonial-box" style="width: 770px;background-color:  rgb(245,245,205); padding-top: 0px; padding-bottom: 0px; border-radius: 10px; " > <!--      padding: 20px 0px;   --->
            <h2 style="text-align: center; color: #F9BD3B;">Modifier trajet</h2>
              <div style="width: 780px;" >
               
                <div class="single-explore-txt bg-theme-1  " style="background-color:  rgb(255,255,255);">
                 <a  style="color: #F9BD3B; font-size: 13px; padding-right: 70px;  float: right;">( * : &nbsp; Champs obligatoires)</a> <br/> <table><tr> <td style="width: 375px;"> <a style="color: #F9BD3B;">Départ : &nbsp; *</a> </td>
<td style="width: 375px;">
<div class="field">
                                    <select style="border-width: 2px; border-radius: 4px;width: 314px; height: 40px; " id="depart" name="depart"  onchange="EnregistrerON();"><option value="">De</option>
                                         <?php 
                                      $old=$trajet->depart;
                                    
                                      if ($errors->has('depart')){
foreach($villes as $data)
 { echo "<option value= $data   >  $data  </option>" ;}
}else {foreach($villes as $data)
 { if($old == $data)
    {echo "<option value= $data   selected   > $data  </option>" ;}
    else {
 { echo "<option value= $data   >  $data  </option>" ;}
      
    }
  }}  ?>

                                    </select>
                                    @if ($errors->has('depart'))
   <span style="color: red;" > {{ $errors->first('depart') }}</span>
@endif
                                </div><br/>
</td>
</tr><tr >
   <td style="width: 375px;">              <a style="color: #F9BD3B;">   Destination : &nbsp; *</a> </td>
 <td style="width: 375px;">

<div class="field">
                                    <select style="border-width: 2px; border-radius: 4px;width: 314px; height: 40px; " id="destinationd" name="destination" onchange="EnregistrerON();" ><option value="" >Vers</option>
                                      <?php 
                                      $old=$trajet->destination;
                                   
                                      if ($errors->has('destination')){
foreach($villes as $data)
 { echo "<option value= $data   >  $data  </option>" ;}
}else {foreach($villes as $data)
 { if($old == $data)
    {echo "<option value= $data   selected   > $data  </option>" ;}
    else {
 { echo "<option value= $data   >  $data  </option>" ;}

    }
  }}  ?>

                                    </select>
                                    @if ($errors->has('destination'))
   <span style="color: red;" > {{ $errors->first('destination') }}</span>
@endif
                                </div> <br/>
</td>
</tr>
<tr>
  <td>
   <a style="color: #F9BD3B;">  places disponibles : &nbsp; * </a> </td><td>

<div class="field">
                                    <select style="border-width: 2px; border-radius: 4px;width: 100px; height: 40px; " id="nbr" name="nbr"  onchange="EnregistrerON();">
                                         <?php 
                                      $old=$trajet->places;
                                      $nbr=array();
                                      $nbr[0]="1";
                                      $nbr[1]="2";
                                      $nbr[2]="3";
                                      if ($errors->has('nbr')){
foreach($nbr as $data)
 { echo "<option value= $data   >  $data  </option>" ;}
}else {foreach($nbr as $data)
 { if($old == $data)
    {echo "<option value= $data   selected   > $data  </option>" ;}
    else {
 { echo "<option value= $data   >  $data  </option>" ;}

    }
  }}  ?>
                                    </select>
                                    
                                </div>

     <br/>
  </td>
</tr>
<tr>
  <td>
   <a style="color: #F9BD3B;">  L'heure de départ : &nbsp; * </a> </td><td><div class="field">
                                    <input name="heure" id="heure" type="text" placeholder="Heure" style="width: 314px; " class="datepicker"value="{{ $h}}:{{$m }}"  onchange="EnregistrerON();">
@if ($errors->has('heure'))
   <span style="color: red;" > {{ $errors->first('heure') }}</span>
@endif


                                </div>  <br/>
  </td>
</tr>
<tr>
  <td valign="top">
   <a style="color: #F9BD3B; ">  Le : &nbsp; * </a> </td><td><div class="field">
                                    <input name="date" id="date" type="text" placeholder="Date" class=" checkin_date datepicker" style="width: 314px; " value="{{ $date }}"  onchange="EnregistrerON();">

@if ($errors->has('date'))
   <span style="color: red;" > {{ $errors->first('date') }}</span>
@endif
                                </div> ou <br/>  <input  style="border-width: 2px; width: 16px; height: 16px; " type="checkbox" name="lun" id="lun" value="lun" {{  $lun==1  ? 'checked' : '' }}  onchange="EnregistrerON();"/> lundi<br/>
  <input type="checkbox" style="border-width: 2px; width: 16px; height: 16px; " name="mar" id="mar" value="mar" {{ $mar==1 ? 'checked' : '' }} onchange="EnregistrerON();"/> mardi<br/>
  <input type="checkbox"style="border-width: 2px; width: 16px; height: 16px; "name="mer" id="mer" value="mer" {{ $mer==1 ? 'checked' : '' }} onchange="EnregistrerON();"/> mercredi<br/>
  <input type="checkbox"style="border-width: 2px; width: 16px; height: 16px; " name="jeu" id="jeu" value="jeu"{{ $jeu==1 ? 'checked' : '' }} onchange="EnregistrerON();"/> jeudi<br/>
  <input type="checkbox"style="border-width: 2px; width: 16px; height: 16px; " name="ven" id="ven" value="ven"{{ $ven==1 ? 'checked' : '' }}  onchange="EnregistrerON();"/> vendredi<br/>
  <input type="checkbox"style="border-width: 2px; width: 16px; height: 16px; " name="sam" id="sam" value="sam" {{ $sam==1 ? 'checked' : '' }} onchange="EnregistrerON();"/> samedi<br/>
  <input type="checkbox"style="border-width: 2px; width: 16px; height: 16px; " name="dim" id="dim" value="dim" {{ $dim==1 ? 'checked' : '' }} onchange="EnregistrerON();"/> dimanche

  <br/><br/>
  </td>
</tr>
<tr>
  <td>
   <a style="color: #F9BD3B;">
Prix : &nbsp; * </a> </td><td>
                     <div class="field">
                                    <input name="min" type="text" placeholder="Min" class="datepicker" style="width: 100px; " value="{{ $min }}"  onchange="EnregistrerON();"> MAD - <input name="max" type="text" placeholder="Max" class="datepicker" style="width: 100px; "value="{{ $max }}"  onchange="EnregistrerON();"> MAD
                                
                @if ($errors->has('min'))
   <span style="color: red;padding-left: 19px;" > {{ $errors->first('min') }}</span>
   @elseif ($errors->has('max'))
   <span style="color: red;padding-left: 19px;" > {{ $errors->first('max') }}</span>
@endif
                </div> <br/></td></tr> 


<tr>
  <td>
   <a style="color: #F9BD3B;">
Description / Instructions </a> </td><td>
                     <div class="field">
                                    
                 <textarea name="description" id="description" class="form-control"  rows="3" style="border-width: 2px; border-radius: 4px;background-color: white; width: 314px; "  onchange="EnregistrerON();"> <?php echo $description; ?> </textarea>
                </div>  </td></tr> 




              </table>
                  <div class="explore-person" >
                    
                  </div>
                 <div class="explore-open-close-part">
                   
                      <div  >
                        <button type="submit"  class="close-btn open-btn" style=" color: #70A9FF; float: right;cursor: pointer;" onclick="window.location.href='#'" id="submit">Enregistrer</button><br/>
                      </div>
                      
                   
                  </div>
                </div>
              </div>
            </div>
         </td>


                           
</table></div><br/><br/></div>
 </form>


<!--
<script type="text/javascript">
  var data = new Array(13);
  var name = new Array(13);
  var description = document.getElementById("description");
  data[0] = description.options[description.selectedIndex].value;
  var depart = document.getElementById("depart");
  data[1] = depart.options[depart.selectedIndex].value;
  var destinationd = document.getElementById("destinationd");
  data[2] = destinationd.options[destinationd.selectedIndex].value;
  name[0]=description;
  name[1]=depart;
  name[2]=destinationd;

 /*
  e[3] = document.getElementById("nbr");
  data[3] = e[3].options[e[3].selectedIndex].value;
  e[4] = document.getElementById("heure");
  data[4] = e[4].options[e[4].selectedIndex].value;
  e[5] = document.getElementById("date");
  data[5] = e[5].options[e[5].selectedIndex].value;
  e[6] = document.getElementById("lun");
  data[6] = e[6].options[e[6].selectedIndex].value;
  e[7] = document.getElementById("mar");
  data[7] = e[7].options[e[7].selectedIndex].value;
  e[8] = document.getElementById("mer");
  data[8] = e[8].options[e[8].selectedIndex].value;
  e[9] = document.getElementById("jeu");
  data[9] = e[9].options[e[9].selectedIndex].value;
  e[10] = document.getElementById("ven");
  data[10] = e[10].options[e[10].selectedIndex].value;
  e[11] = document.getElementById("sam");
  data[11] = e[11].options[e[11].selectedIndex].value;
  e[12] = document.getElementById("dim");
  data[12] = e[12].options[e[12].selectedIndex].value;
 */
</script>
-->

<script type="text/javascript">

    EnregistrerOFF();
    
</script>
@endsection
        