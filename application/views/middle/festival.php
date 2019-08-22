<body class="m-0 p-0">
    
    <!--  pocetak kontejnera -->
    
    <div class="container-fluid p-0">
        
        
        <div class="row m-0 p-0" style="background: #444444">        
                                 
            <!--  levi meni div -->
            
            <div class="col-2 responsive m-0 p-0">
                
                <div class="row m-0 p-0">
                    
<!--                    <div class=" col-1">
                    </div>-->
                    
                    <div class="col-12 m-0 p-0">
                        
<!--                        <div  class="rounded p-3">-->
                        <br>
                        <br>

                            <div class="rounded p-3 table-responsive">
                                    <table class="table table-borderless table-fixed">
                                        <thead>
                                            <tr class="bg-dark text-warning">
                                                <th class="">Festivali u ponudi</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                                <?php foreach ($svifestivali as $sf) { ?>             
                                                        <tr class="text-dark">                                                     
                                                            <td class="" onclick="izaberifestival(<?php echo $sf['IdFest']; ?>)"><?php  $id = $sf['IdFest']; ?> <?php echo "<a class='text-dark badge badge-warning' href='".site_url('FestivalKontroler/index')."?id=".$id."'>". $sf['NameFest']." </a>" ?></td>
                                                        </tr>

                                                 <?php } ?>
                                        </tbody>
                                    </table>
                                
                                                    <script>                            
                                                            function izaberifestival(IdFest){

                                                             var xhttp = new XMLHttpRequest();
                                                             xhttp.onreadystatechange = function() {
                                                               if (this.readyState == 4 && this.status == 200) {


                                                                        document.getElementById('ovde').innerHTML=this.responseText;
                                                               }
                                                             };

                                                             xhttp.open("POST", "<?php echo site_url('FestivalKontroler/prikazifestival'); ?>", true); //pozivas kontrolera
                                                             xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                                                             xhttp.send('IdFest='+IdFest); //uradi ovo ovde   // prvo TekstKomentara je ono sto u kontroleru u toj funkciju poyivam kroy input post a ovo drugo = + je ono sto sam gore definissala
                                                         }
                                                </script>

                            </div>


<!--                        </div>-->
                    </div>
                
<!--                    <div class=" col-1">
                    </div>-->
                
                </div>
                
            </div>
            <!--  KRAJ levog meni diva -->
            
            
            
            
            

            <!--  centralni div za ispis  -->
            
            <div class="col-9 responsive m-0 p-0" style="background: #888888">
                
                <div class="row m-0">
                    
                   <div class="col-1">                
                   </div>
                    
                   <div class="col-9">
                       
                        <div  class="rounded p-3 active">
                        <br>
                        <br>

                            <div class="table-responsive">
                                    <table class="table table-dark table-fixed">
                                        <thead>
                                            <tr class="text-warning">
                                              <th >Naziv festivala</th>
                                              <th >Datum pocetka</th>
                                              <th >Datum kraja</th>
                                              <th >Mesto</th>
                                              <th >O festivalu</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($festival as $fest){ ?>
                                            <tr class="bg-warning text-dark font-weight-bolder">
                                              <td class="align-middle"><?php echo $fest->NameFest ?></td>
                                              <td class="align-middle"><?php echo $fest->StartDate ?></td>
                                              <td class="align-middle"><?php echo $fest->EndDate ?></td>
                                              <td class="align-middle"><?php echo $fest->CityName ?></td>
                                              <td class="align-middle"><?php echo $fest->Description ?></td>              
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                            </div>
                                <br>

                            <div class="responsive">
                                <?php foreach($festival as $fest){ ?>

                                  <h2 class="text-dark font-weight-bolder"  align="center">Program projekcija za  <?php echo $fest->NameFest ?></h2>

                                      <?php } ?>
                            </div>
                                <br>
                                <br>

                            <div class="table-responsive">
                                    <table class="table table-dark table-fixed">
                                        <thead>
                                            <tr class="bg-warning text-dark">          
                                              <th >Datum projekcije</th>
                                              <th >Vreme projekcije</th>
                                              <th >Naziv filma</th>
                                              <th >Orginalan naziv</th>
                                              <th >Mesto projekcije</th>
                                              <th >Lokacija projekcije</th>
                                              <th >Sala</th>
    <!--                                          <th>IMDB za film</th>-->
                                              <th>Vise o filmu</th>
                                            </tr>
                                        </thead>
                                      <tbody>

                                          <?php foreach($projekcije as $proj) { ?>
                                          <tr class="text-warning text-wrap">
                                              <td class="align-middle"><?php echo $proj->Date?></td>
                                              <td class="align-middle"><?php echo $proj->Time ?></td>
                                              <td class="align-middle"><?php echo $proj->SerbianTitle ?></td>
                                              <td class="align-middle"><?php echo $proj->OriginalTitle ?></td>
                                              <td class="align-middle"><?php echo $proj->CityName ?></td>
                                              <td class="align-middle"><?php echo $proj->Theater ?></td>
                                              <td class="align-middle"><?php echo $proj->Room ?></td>
    <!--                                          <td><?php echo "<a class='text-dark badge badge-warning' href='$proj->IMDB' target='_blank'>IMDB link</a>" ?></td>-->
                                              <td class="align-middle"><?php echo "<a class='text-dark badge badge-warning' href='".site_url('FilmKontroler/index')."?id=".$proj->IdFilm."'>O filmu</a>"; ?></td>
                                          </tr>
                                          <?php } ?>
                                      </tbody>
                                    </table>
                            </div>

                        </div>
                                 
                  </div>
                    
                  <div class="col-1">                
                  </div>
                    
                </div>
                
            </div> 
            
            <!--  KRAJ centralnog diva za ispis  -->
            
            <!--  desni meni div -->
            
            <div class="col-1 m-0 p-0">                
            </div>  
            
            <!--  KRAJ desnog meni diva -->
            
            
        </div>  
        
    </div>
    
    <!--  KRAJ kontejnera -->
