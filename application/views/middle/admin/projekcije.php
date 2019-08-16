<div class="container-fluid m-0" id="content">

   <h3 class="text-center display-4">Filmske projekcije po lokacijama i salama</h3>
   <div class="row-sm-12 rounded">
      <!--forma za dodavanje projekcija u festival-->
      <form class="mt-5" name="novaProjekcija" id="novaProjekcija" method="POST" action="<?php echo site_url('AdminKontroler/dodajProjekcije') ?>">
         <div class="row mx-auto">
            <div class="form-group col-sm-2">
               <label for="inputCity">Datum</label>

               <?php
               foreach ($festivali as $fest) {
                  $od = date($fest['StartDate']);
                  ;
                  $do = date($fest['EndDate']);
               }
               ?>
               <input type="hidden" name="hiddenId" value="<?php echo $fest['IdFest']; ?>" />

               <input type="date" class="form-control" id="datum" name="datum"  min="<?php echo $od; ?>" max="<?php echo $do; ?>">
            </div>
            <div class="form-group col-sm-1">
               <label for="inputState">Vreme</label>
               <input type="time" class="form-control" id="vreme" name="vreme">
            </div>
            <div class="form-group col-sm-2">
               <label for="inputZip">Film</label>
               <select id="film" name="film" class="form-control">
                  <option disabled selected value="">Izaberite Film</option>
                  <?php
                  foreach ($filmovi as $film) {
                     $naziv = $film["OriginalTitle"];
                     $idGrad = $film["IdFilm"];
                     echo "<option value='$idGrad'>$naziv</option>";
                  }
                  ?>   
               </select>
            </div>
            <div class="form-group col-sm-2">
               <label for="inputZip">Lokacije</label>
               <select id="lokacije" name="lokacija" class="form-control">
                  <option disabled selected value="">Izaberite lokaciju</option>
                  <?php
                  foreach ($lokacije as $lok) {

                     $naziv = $lok["Theater"];
                     $idLok = $lok["IdLocation"];
                     $idGrad = $lok['IdGrad'];

                     if ($idGrad === $idLok) {

                        if (!in_array($naziv, $imena)) {

                           $imena[] = $naziv;
                           echo "<option value='$idLok'>$naziv</option>";
                        }
                     }
                  }
                  ?>   
               </select>
            </div>
            <div class="form-group col-sm-2">
               <label for="inputZip">Sala</label>
               <select id="sala" name="saleP" class="form-control">
                  <option disabled selected value="">Izaberite Salu</option>
                  <?php
                  foreach ($lokacije as $lok) {

                     $naziv = $lok["Room"];
                     $idSala = $lok["IdSale"];

                     if (!in_array($naziv, $imena)) {

                        $imena[] = $naziv;
                        echo "<option value='$idSala'>$naziv</option>";
                     }
                  }
                  ?>   
               </select>
            </div>
            <div class="form-group col-sm-1">
               <label for="karte">Karata</label>
               <input type="number" class="form-control" id="karata" name="karata">
            </div>
            <div class="form-group col-sm-1">
               <label for="cena">Cena</label>
               <input type="number" class="form-control" id="cena" name="cena">
            </div>
            <div class="form-group col-sm-1 ">
               <input type="submit" name="dodajP" class="btn btn-warning" value="Dodaj" onclick='prikazi("projekcije")'</>
            </div>
         </div>
      </form>
   </div>

   <div class="col-sm-12 rounded p-3" id='poruke'>
      <!--prikazivanje projekcija festivala -->
      <table class="table">
         <thead class="thead-light">
            <tr>          
               <th>Ime festivaal</th>
               <th>Datum projekcije</th>
               <th>Vreme projekcije</th>
               <th>Naziv Filma</th>
               <th>Lokacija projekcije</th>
               <th>Sala</th>
               <th>Cena</th>
               <th>Otkazi</th>
            </tr>
         </thead>
         <tbody>
            <?php foreach ($projekcije as $proj) { ?>
               <tr>
                  <td><?php echo $proj['NameFest'] ?></td>
                  <td><?php echo $proj['Date'] ?></td>
                  <td><?php echo $proj['Time'] ?></td>
                  <td><?php echo $proj['OriginalTitle'] ?></td>
                  <td><?php echo $proj['Theater'] ?></td>
                  <td><?php echo $proj['Room'] ?></td>
                  <td><?php echo $proj['Cena'] ?></td>
                  <?php // echo "<a href='" . site_url('FilmKontroler/index') . /* "?id=".$proj->IdFilm. */"'>Otkazi</a>";    ?>
                     <form method="post" name="otkPro" action="<?php site_url('AdminKontroler/projekcijuOtkazi()'); ?>">
                        <td>
                        <input type='hidden' id='idFilm' name='red' value="<?php echo $proj['IdProjekcija']; ?>">
                         
                           <input type='submit' name='otkazi' class="btn btn-warning btn-sm" Value='Otkazi' onclick='otkazFilm()'> 
                        </td>       
                     </form>             
               </tr>
            <?php } ?>           
         </tbody>
      </table>
      <?php  var_dump($proj['IdProjekcija']); ?>
   </div>
</div>
<!--ne radi-->
<script>

  function otkazFilm(idFilm){
            
            xmlhttp=new XMLHttpRequest();
            xmlhttp.onreadystatechange=function(){
                if(this.readyState==4&&this.status==200){
                    document.getElementById("idFilm").innerHTML=this.responseText;
                }
            };
            xmlhttp.open("POST", "<?php echo site_url('AdminKontroler/projekcijuOtkazi
               ')?>?idFilm=" + idFilm, true);
            xmlhttp.send();   
         }
</script>
