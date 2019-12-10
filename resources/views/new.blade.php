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


<br/><br/><br/><form action="save" >


<div style="background-color: rgba(113,113,113,0.1); padding-left: 250px;"><br/>
<div style="margin-left: 50px; " ><table style="width: 780px;">
    <td valign="top" style="width: 775px; ">
          <div  class="single-testimonial-box" style="width: 770px;background-color:  rgb(245,245,205); padding-top: 0px; padding-bottom: 0px; border-radius: 10px; " > <!--      padding: 20px 0px;   --->
            <h2 style="text-align: center; color: #F9BD3B;">Nouveau trajet</h2>
              <div style="width: 780px;" >
               
                <div class="single-explore-txt bg-theme-1  " style="background-color:  rgb(255,255,255);">
                 <a  style="color: #F9BD3B; font-size: 13px; padding-right: 70px;  float: right;">( * : &nbsp; Champs obligatoires)</a> <br/> <table><tr> <td style="width: 375px;"> <a style="color: #F9BD3B;">Départ : &nbsp; *</a> </td>
<td style="width: 375px;">
<div class="field">
                                    <select style="border-width: 2px; border-radius: 4px;width: 314px; height: 40px; " id="destination" name="depart"><option value="">De</option>
                                         <?php 
                                      $old=old('depart');
                                    
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
                                    <select style="border-width: 2px; border-radius: 4px;width: 314px; height: 40px; " id="destinationd" name="destination"  ><option value="">Vers</option>
                                      <?php 
                                      $old=old('destination');
                                   
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
                                    <select style="border-width: 2px; border-radius: 4px;width: 100px; height: 40px; " id="destination" name="nbr">
                                         <?php 
                                      $old=old('nbr');
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
                                    <input name="heure" type="text" placeholder="Heure" style="width: 314px; " class="datepicker"value="{{ old('heure') }}">
@if ($errors->has('heure'))
   <span style="color: red;" > {{ $errors->first('heure') }}</span>
@endif


                                </div>  <br/>
  </td>
</tr>
<tr>
  <td valign="top">
   <a style="color: #F9BD3B; ">  Le : &nbsp; * </a> </td><td><div class="field">
                                    <input name="date" type="text" placeholder="Date" class=" checkin_date datepicker" style="width: 314px; " value="{{ old('date') }}">

@if ($errors->has('date'))
   <span style="color: red;" > {{ $errors->first('date') }}</span>
@endif
                                </div> ou <br/>  <input  style="border-width: 2px; width: 16px; height: 16px; " type="checkbox" name="lun" value="lun" {{ old('lun') == 'lun' ? 'checked' : '' }} /> lundi<br/>
  <input type="checkbox" style="border-width: 2px; width: 16px; height: 16px; " name="mar" value="mar" {{ old('mar') == 'mar' ? 'checked' : '' }} /> mardi<br/>
  <input type="checkbox"style="border-width: 2px; width: 16px; height: 16px; "name="mer" value="mer" {{ old('mer') == 'mer' ? 'checked' : '' }}/> mercredi<br/>
  <input type="checkbox"style="border-width: 2px; width: 16px; height: 16px; " name="jeu" value="jeu"{{ old('jeu') == 'jeu' ? 'checked' : '' }}/> jeudi<br/>
  <input type="checkbox"style="border-width: 2px; width: 16px; height: 16px; " name="ven" value="ven"{{ old('ven') == 'ven' ? 'checked' : '' }} /> vendredi<br/>
  <input type="checkbox"style="border-width: 2px; width: 16px; height: 16px; " name="sam" value="sam" {{ old('sam') == 'sam' ? 'checked' : '' }}/> samedi<br/>
  <input type="checkbox"style="border-width: 2px; width: 16px; height: 16px; " name="dim" value="dim" {{ old('dim') == 'dim' ? 'checked' : '' }}/> dimanche

  <br/><br/>
  </td>
</tr>
<tr>
  <td>
   <a style="color: #F9BD3B;">
Prix : &nbsp; * </a> </td><td>
                     <div class="field">
                                    <input name="min" type="text" placeholder="Min" class="datepicker" style="width: 100px; " value="{{ old('min') }}"> MAD - <input name="max" type="text" placeholder="Max" class="datepicker" style="width: 100px; "value="{{ old('max') }}"> MAD
                                
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
                                    
                 <textarea name="description" id="description" class="form-control"  rows="3" style="border-width: 2px; border-radius: 4px;background-color: white; width: 314px; "> </textarea>
                </div>  </td></tr> 




              </table>
                  <div class="explore-person" >
                    
                  </div>
                 <div class="explore-open-close-part">
                   
                      <div  >
                        <button type="submit"  class="close-btn open-btn" style=" color: #70A9FF; float: right;cursor: pointer;" onclick="window.location.href='#'">Enregistrer</button><br/>
                      </div>
                      
                   
                  </div>
                </div>
              </div>
            </div>
         </td>


                           
</table></div><br/><br/></div>
 </form>

@endsection
        