<!--proba za rotate card-->

      <div>
        <h1 class="title">
            Festivali u narednom periodu
        </h1>
      </div>
<div class="d-flex justify-content-center">
        <?php
   
             $imena = array();
             $brojac = 0;
             foreach ($festivali as $fest) {  
                  $brojac++ ;  
                  ?>

     <!--<div class="col-sm-12 ">-->
        <div class="col-sm-2 ">
         <!--<div class="col-md-4 col-sm-6">-->
             <div class="card-container">
                <div class="card">
                    <div class="front">
                        <div class="cover">
                            <img src="<?php echo base_url()?>/slike/fest.png"/>
                        </div>
                        <div class="user">
                            <img class="img-circle" src="<?php echo base_url()?>/slike/fest.png"/>
                        </div>
                        <div class="content">
                            <div class="main">
                                <h3 class="name"> 
                                    <?php 
                                          $ime = $fest['NameFest'];
                                            if(!in_array($ime, $imena)){
                                               echo "$ime";
                                               $imena[] = $ime;}
                                       ?></h3>
                                <p class="profession"><?php echo $fest['CityName']; ?></p>
                                <p class="text-center"></p>
                            </div>
                            <div class="footer">
                                <i class="fa fa-mail-forward"></i> Auto Rotation
                            </div>
                        </div>
                    </div> <!-- end front panel -->
                    <div class="back">
                        <div class="header">
                            <h5 class="motto"></h5>
                        </div>
                        <div class="content">
                            <div class="main">
                                <h4 class="text-center"><?php echo "Od ".$fest['StartDate']."<br> Do ".$fest['EndDate']; ?></h4>
                                <p class="text-center"><?php echo $fest['Description']; ?></p>

                                <div class="stats-container">
                                    <div class="stats">
                                        <h4>235</h4>
                                        <p>
                                            Followers
                                        </p>
                                    </div>
                                    <div class="stats">
                                        <h4>114</h4>
                                        <p>
                                            Following
                                        </p>
                                    </div>
                                    <div class="stats">
                                        <h4>35</h4>
                                        <p>
                                            Projects
                                        </p>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="footer">
                            <div class="social-links text-center">
                                <a href="#" class="facebook"><i class="fa fa-facebook fa-fw"></i></a>
                                <a href="#" class="google"><i class="fa fa-google-plus fa-fw"></i></a>
                                <a href="#" class="twitter"><i class="fa fa-twitter fa-fw"></i></a>
                            </div>
                        </div>
                    </div> <!-- end back panel -->
                </div> <!-- end card -->
            </div> <!-- end card-container -->
        </div> <!-- end col sm 3 -->
<!--         <div class="col-sm-1"></div> -->

<?php 
          if ($brojac == 5) {
                echo '<br>'; 
                $brojac = 0;}
          } ?>
</div>

<script src="js/jquery-1.10.2.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js" type="text/javascript"></script>

<script type="text/javascript">
    $().ready(function(){
        $('[rel="tooltip"]').tooltip();
        $('a.scroll-down').click(function(e){
            e.preventDefault();
            scroll_target = $(this).data('href');
             $('html, body').animate({
                 scrollTop: $(scroll_target).offset().top - 60
             }, 1000);
        });
    });
    function rotateCard(btn){
        var $card = $(btn).closest('.card-container');
        console.log($card);
        if($card.hasClass('hover')){
            $card.removeClass('hover');
        } else {
            $card.addClass('hover');
        }
    }
</script>
     
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
