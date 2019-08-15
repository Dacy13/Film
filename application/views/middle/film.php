<?php // var_dump($this->session->korisnik->Username) ?>
<div id="stage">
    <div class='container'>
        
<?php foreach($filmovi as $f):?>
            <div class="row">
                <div class="col"><img src="<?php  echo base_url()."images/".$f->Poster; ?>"  height="512" ></div>
                <iframe width="665" height="512" src="https://www.youtube.com/embed/Rs6B3uXXllI" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

            </div>

            <div class="row">
                <div class="col" style="font-size:120%; font-weight: bold; font-family: Tahoma, Geneva, sans-serif"><?php echo $f->SerbianTitle?></div>
        
            </div>
        
            <div class="row">
                <div class="col" style="color: #f9aa00; font-weight: bold; font-size:150%; font-family: Tahoma, Geneva, sans-serif "><?php echo $f->OriginalTitle?>(<?php echo $f->Year?>)</div>
        
            </div>
            
            <div class="row">
            
        
             
            <div class="col" style="  font-size:100%; font-family: Tahoma, Geneva, sans-serif ">OCENA: <span id='ovde'><?php  echo (round($rating,1)); ?></span>/10</div>
 
            
        <?php  if(!empty($rezervacija)){ ?>
               
                <div class='col'>
                   
                         <fieldset class="rating">

                            <legend>Oceni film </legend>
                                <input onclick="UbaciRating(10)" type="radio" id="star10" name="rating" value="10" /><label for="star10" title="Najbolji!">10</label>
                                <input onclick="UbaciRating(9)" type="radio" id="star9" name="rating" value="9" /><label for="star9" title="Odličan">9</label>
                                <input onclick="UbaciRating(8)" type="radio" id="star8" name="rating" value="8" /><label for="star8" title="Fenomenalan">8</label>
                                <input onclick="UbaciRating(7)" type="radio" id="star7" name="rating" value="7" /><label for="star7" title="Fantastičan">7</label>
                                <input onclick="UbaciRating(6)" type="radio" id="star6" name="rating" value="6" /><label for="star6" title="Sjajan">6</label>
                                <input onclick="UbaciRating(5)" type="radio" id="star5" name="rating" value="5" /><label for="star5" title="Dobar">5</label>
                                <input onclick="UbaciRating(4)" type="radio" id="star4" name="rating" value="4" /><label for="star4" title="Nije loš">4</label>
                                <input onclick="UbaciRating(3)" type="radio" id="star3" name="rating" value="3" /><label for="star3" title="Meh">3</label>
                                <input onclick="UbaciRating(2)" type="radio" id="star2" name="rating" value="2" /><label for="star2" title="Loš">2</label>
                                <input onclick="UbaciRating(1)" type="radio" id="star1" name="rating" value="1" /><label for="star1" title="Najgori">1</label>
                        </fieldset>
                    
                 
                </div>   
            
       <?php } ?>
  
            
 <script>
                   
  function UbaciRating(ocena){

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
       
        document.getElementById("ovde").innerHTML = this.responseText;
      }
    };

    xhttp.open("POST", "<?php echo site_url('FilmKontroler/rejting'); ?>", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("rating="+ocena);
}
</script>
                   
           
            </div>
            
            <div class="row mt-5">
                <div class="col-6" >
                    <?php echo $f->Description?>
                    <div>
                        <br>

                    </div>
                    <div>
                        <span  style="color: #f9aa00; font-weight: bold;" >Režiser: </span>
                        <span><?php echo $f->Director?></span>  
                    </div>
                    <div>
                        <span style="color: #f9aa00; font-weight: bold;" >Glavni glumci: </span>
                        <span class="col-4"><?php echo $f->Actors?></span>  
                    </div>
                    <div >
                        <span  style="color: #f9aa00; font-weight: bold;" >Trajanje filma: </span>
                        <span ><?php echo $f->Duration?></span>  
                    </div>
                    <div >
                        <span  style="color: #f9aa00; font-weight: bold;" >Zemlja: </span>
                        <span ><?php echo $f->Country?></span>  
                    </div>
                    <div >
                        <span   style="color: #f9aa00; font-weight: bold;" >IMDB: </span>
                        <span><a href="<?php echo ($f->IMDB) ?>" target="blank"> <?php echo $f->OriginalTitle?> </a></span>  
                    </div>
                </div>
                
                <div class="col-6">
                     
                    <div>  
                         <span> <img src="<?php  echo base_url()."images/".$f->Poster; ?>" width="20%" ></span>  
                         <span><img src="<?php  echo base_url()."images/".$f->Poster; ?>"  width="20%"  ></span>   
                         <span><img src="<?php  echo base_url()."images/".$f->Poster; ?>"  width="20%" ></span>     
                         <span><img src="<?php  echo base_url()."images/".$f->Poster; ?>" width="20%"  ></span>  
                         <span> <img src="<?php  echo base_url()."images/".$f->Poster; ?>" width="20%" ></span>    
                         <span><img src="<?php  echo base_url()."images/".$f->Poster; ?>"  width="20%"  ></span>   
                         <span><img src="<?php  echo base_url()."images/".$f->Poster; ?>"  width="20%" ></span>    
                         <span><img src="<?php  echo base_url()."images/".$f->Poster; ?>" width="20%"  ></span>  
                         <span> <img src="<?php  echo base_url()."images/".$f->Poster; ?>" width="20%" ></span>   
                         <span><img src="<?php  echo base_url()."images/".$f->Poster; ?>"  width="20%"  ></span>   
                         <span><img src="<?php  echo base_url()."images/".$f->Poster; ?>"  width="20%" ></span>     
                           
                    </div>   
                </div>
           </div>
 
            <div class="row">
                 <br>
                  
            </div>
            <div class="row">
                <div class="col-12" style="font-size:125%;">Festivali na kojima možete videti <span style="color: #f9aa00; font-weight: bold;"><?php echo $f->OriginalTitle?></span> su: </div>
                  
            </div>
            <div class="row">
                 <br>
                  
            </div>
          <div class="row">
                <div class='col-2'>
                    <span style="font-weight: bold; font-size:125%; "> Ime festivala </span>  
                </div> 
                <div class='col-2'> Grad</div> 
                <div class='col-2'> Datum projekcije</div> 
                <div class='col-2'> Cena karte</div> 
                </div> 
             <div class="row">
                 <br>
                  
            </div>
 <?php foreach($projekcije as $p):?>
            
        
            <div class="row">
                <div class='col-2'>
                    <span style="font-weight: bold; font-size:125%; "> <?php echo $p->NameFest?> </span>  
                </div> 
                <div class='col-2'> <?php echo $p->CityName?></div> 
                <div class='col-2'> <span style="font-weight: bold;"><?php echo $p->Date?></span>  </div> 
                <div class='col-2'><?php echo $p->Cena?> RSD </div> 
                <div class='col-4'  data-toggle="modal" data-target="#RezervacijaModal"> <button type="submit" name="rezervacija" class='btn btn-warning' style="color: black; font-weight: bold;" >REZERVIŠI KARTE</button></div>
            </div> 
            <div class="row">
                 <br>
                  
            </div>
 <?php endforeach ?>    
            
    
            <div class="row">
                 <br>
            </div>
            <div class="row">
              
                 <br>
            </div>
            
            
 <?php  if(!empty($rezervacija)){ ?>


            <div class='row'>
                <div class="col" style="font-size:125%;">
                        Komentari:
                </div>
                <div  class="col">
                     <textarea style="width: 100%; height: 50px;" id='noviKomentar'></textarea>
                </div>
                <div  class="col">
        <!--            <button style="width: 100%; height: 50px;" onclick="dodajKomentarAjax()">Dodaj</button>-->
                    <input type='button' class='btn btn-warning' style="color: black; font-weight: bold;" onclick="dodajKomentarAjax()" value='Dodaj komentar'>
                </div> 
            </div>
   
       
            <div class="row">
                <br>
            </div>
            <div class="row">
                <br>
            </div>

            <div class="row" id='komentari'>
       
                <?php foreach ($komentari as $kom) {
                echo "<div class='row' id='komentari'><div class='col-12' style='font-weight: bold;'>". $kom->Username. "</div></div><div class='row'><div class='col-12'>". $kom->TekstKomentara." </div></div><div class='row'><br></div>";
            
                }
                ?>
            </div>


<!--  AJAX  tutorial by Ljuba MODEL ISTI
  Kontroler -->
<script>

function dodajKomentarAjax(){
   // if(IdFilm==-1)
      //  return;
    TekstKomentara=document.getElementById("noviKomentar").value;  //uzmi ovo odavde ovo i definisala ovde sta je tekst
    if(TekstKomentara=="")
        return;  //ako je prayno nista
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
          document.getElementById("noviKomentar").value ="";  // ovo sluyi kada posaljes da ne stoji vise tu upisano
          document.getElementById("komentari").innerHTML= this.responseText;
      }
    };

    xhttp.open("POST", "<?php echo site_url('FilmKontroler/dodajKomentarAjax'); ?>", true); //pozivas kontrolera
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("TekstKomentara="+TekstKomentara); //uradi ovo ovde   // prvo TekstKomentara je ono sto u kontroleru u toj funkciju poyivam kroy input post a ovo drugo = + je ono sto sam gore definissala
}
</script>







    </div>
</div>  

<?php } ?>

<?php endforeach ?>


<div class="modal fade" id="RezervacijaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
	<div class="modal-content">
            <div class="modal-header">
		<h5 class="modal-title" id="exampleModalCenterTitle">REZERVACIJA</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
            <div class="form-group">
		<form name='rezervacija' method='POST' action='<?php echo site_url('FilmKontroler/rezervacija')?>'>
                     <small class="form-group text-muted alert-danger"><?php if(!empty($porukalogin)) echo $porukalogin; // moze i echo $poruka??";"; ?> </small><br>
                        <span style="font-weight: bold; font-size:125%;" >FESTIVAL </span> 
                        <span style="font-weight: bold; font-size:125%; color: #f9aa00;"> <?php echo $p->NameFest?> </span>  
		<br><br>
			<label for="exampleInputPassword1">Projekcija</label>
                        <select name='IdRezervacije'>
                             <?php foreach($projekcije as $p):?>
                               
                                <option value=" <?php echo $p->IdProjekcija?>">  <?php echo $p->Date?></option>
                                   
                             <?php endforeach ?>
                         
                        </select>
                               
		<br><br>
                       
                    Broj karata:
                       <input type='number' name='karte'>
                            <br><br><br>
			<button type="submit" name="Login" class="btn btn-warning" style="color: black; font-weight: bold;" >REZERVIŠI KARTE</button>  
                 </form> 
               
            </div>               
            </div>
        </div>
    </div>
</div>
   



