
<!--prikaz pet najskorijih festivala-->
     
      <table class="table">
          <thead class="thead-dark">
            <tr>
              <th scope="col">Festival</th>
              <th scope="col">Pocinje</th>
              <th scope="col">Zavrsava</th>
              <th scope="col">Detalji</th>
              <th scope="col">Mesto odrzavanja</th>
            </tr>
          </thead>
          <tbody>
              <?php
   
             $imena = array();
             foreach ($festivali as $fest) {  
                    ?>
            <tr>
               <td>
                   <?php 
                        $ime = $fest['NameFest'];
                        if(!in_array($ime, $imena)){
                            echo "$ime";
                            $imena[] = $ime;
                         }
                    ?>
              <td><?php echo $fest['StartDate']; ?> </td>
              <td><?php echo $fest['EndDate']; ?> </td>
              <td><?php echo $fest['Description']; ?> </td>
              <td><?php echo $fest['CityName']; ?></td>
            </tr>
            <?php 
              } ?>
                           
          </tbody>
       </table>


   <!--forma za pretragu festivala i filmova-->

    <div class="row justify-content-center">
        <form name='pretraga' method='POST' action="<?php echo site_url('KorisnikKontroler/index');?>">
        Naziv festivala:  
        <input type="text" name="imeFest" value="<?php ?>">
        Pocetak festivala: 
        <input type="date" name="od" value="<?php ?>">
        Kraj festivala: 
        <input type="date" name="do" value="<?php  ?>">
         Original naziv filma: 
        <input type="text" name="engNaziv"  value="<?php  ?>">
        Srpski naziv filma: 
        <input type="text" name="srbNaziv" value="<?php  ?>">
        <input type='submit' name='trazi' value='Search'>
        </form>
    </div>
   <div><?php
          if(!empty($filmovi)){?>
       <table class="table">
           <thead class="thead-dark">
                    <tr>
                        <td>Festival</td>
                        <td>Pocinje</td>
                        <td>Zavrsava</td>
                        <td>Grad</td>
                        <td>Detalji na linku</td>
                         <?php if(!empty($this->input->post('srbNaziv')) 
                                || !empty($this->input->post('engNaziv'))) { ?>
                        <td>Srpski naziv</td>
                        <td>Engleski naziv</td>
                        <td>Datum projekcije</td>
                        <td>Vreme projekcije</td>
                        <td>Detalji na linku</td>
                         
                        <?php } ?>
                    </tr>
                 </thead>
                 <tbody>
                   
                 <?php foreach($filmovi as $f){?>
                    <tr>
                        <td><?php echo $f->NameFest?></td>
                        <td><?php echo $f->StartDate?></td>
                        <td><?php echo $f->EndDate?></td>
                        <td><?php echo $f->CityName?></td>
                        <?php  $id = $f->IdFest ?>
                        <td><?php echo "<a href='FestKontroler'?id=$id>INFO</a> ";?></td>
                        <?php if(!empty($this->input->post('srbNaziv')) 
                                || !empty($this->input->post('engNaziv'))) { ?>
                        <td><?php echo $f->SerbianTitle?></td>
                        <td><?php echo $f->OriginalTitle?></td>
                        <td><?php echo $f->Date?></td>
                        <td><?php $sat = $f->Time;
                                  $sati = date("H:i", strtotime($sat));
                                  echo $sati ?></td>
                        <?php  $id = $f->IdFest ?>
                        <td><?php echo "<a href='FestKontroler'?id=$id>INFO</a> ";?></td>
                              <?php } ?>
                    </tr>

                 <?php } ?>         
                 </tbody>   
       </table>
   <?php } 
   else {
       
        echo 'Nema rezultata za zadatu pretragu';
   } 
       ?>
   </div>
   <br>
   <br>
   
   <!--search forma sa jednim poljem-->
   
<!--<div class="row justify-content-center">
       <form action="<?php //echo $_SERVER['PHP_SELF'];?> " method="post"> 
        <div class="input-group"> 
        <input type="text" name="search"  placeholder="Pretraga">
        <input type="submit" value="Search" name="save"/>
        </div>
    </form>
</div>
    <div>
        <table class="table">
                 <thead class="thead-dark">
                    <tr>
                        <td>Festival</td>
                        <td>Pocinje</td>
                        <td>Zavrsava</td>
                        <td>Grad</td>
                        <td>Srpski naziv</td>
                        <td>Engleski naziv</td>
                        <td>Datum projekcije</td>
                        <td>Vreme projekcije</td>
                        <td>Detalji na linku</td>
                    </tr>
                 </thead>
                 <tbody>
                 <?php //foreach($search as $search_show):?>
                    <tr>
                        <td><?php //echo $search_show->NameFest?></td>
                        <td><?php //echo $search_show->StartDate?></td>
                         <td><?php //echo$search_show->EndDate?></td>
                        <td><?php// echo $search_show->CityName?></td>
                        <td><?php //echo $search_show->SerbianTitle?></td>
                        <td><?php //echo $search_show->OriginalTitle?></td>
                        <td><?php //echo $search_show->Date?></td>
                        <td><?php //$sat = $search_show->Time;
                                 // $sati = date("H:i", strtotime($sat));
                                 // echo $sati ?></td>
                        <?php //$id = $search_show->IdFest?>
                        <td><?php //echo "<a href='FestKontroler'?id=$id>INFO</a> "?></td>
                            
                    </tr>

                 <?php //endforeach ?>
                 </tbody>
        </table>
    </div> 
   -->
  

   <!--funkcija za ajax koji delimicno radi kako treba-->
   
<!--<script>
function showHint(str) {
    if (str.length == 0) { 
        document.getElementById("result").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("result").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "KorisnikKontroler/ajax?q=" + str, true);
        xmlhttp.send();
    }
}
</script>-->
