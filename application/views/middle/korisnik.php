
<!--prikaz pet najskorijih festivala-->
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
     
<!--pretraga festivala i filmova-->
     
<div>
        <h3 class="title">
           Pretraga festivala i filmova
        </h3>
      </div>

   <div class="row d-flex justify-content-center col-sm-12">
   <form name='pretraga' method='POST' action="<?php echo site_url('KorisnikKontroler/index');?>">
       <div >  <!-- class='card-body'  da mi iskoci onako forma-->
        <div class="form-group col-sm-2">
            <label for="inputEmail4">Naziv festivala:</label>
            <input type="text" class="form-control" name="imeFest" placeholder="Unesite naziv festivala..">
       </div>
       <div class="form-group col-sm-2">
          <label for="inputEmail4">Pocetak festivala:</label>
            <input type="date" class="form-control" name="od" >
       </div>
       <div class="form-group col-sm-2">
           <label for="inputEmail4">Kraj festivala:</label>
            <input type="date" class="form-control" name="do" >
       </div>
       <div class="form-group col-sm-2">
           <label for="inputEmail4">Original naziv filma:</label>
            <input type="text" class="form-control" name="engNaziv" placeholder="Unesite naziv filma..">
       </div>
       <div class="form-group col-sm-2">
           <label for="inputEmail4">Srpski naziv filma:</label>
            <input type="text" class="form-control" name="srbNaziv" placeholder="Unesite naziv filma..">
       </div>
       <div class='row'>
   <div class=" buttonBox">
       <input type='submit' name='trazi' value='Pretraga' class=" btn btn-outline-warning">
   </div>
       </div>
       </div>
</form>
   </div>

   <!-- ispis rezultata pretrage-->
   
   <div class="container">

    <hgroup class="mb20">
		<h1>Rezultati pretrage</h1>
		<h2 class="lead"><strong class="text-danger">3</strong> rezultata je pronadjeno za <strong class="text-danger">Lorem</strong></h2>								
	</hgroup>
<?php if(!empty($filmovi)){ ?>
    <section class="col-xs-12 col-sm-6 col-md-12">
        <?php foreach($filmovi as $f){?>
		<article class="search-result row">
			<div class="col-xs-12 col-sm-12 col-md-3">
				<a href="#" title="Lorem ipsum" class="thumbnail"><img src="http://lorempixel.com/250/140/people" alt="Lorem ipsum" /></a>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-2">
				<ul class="meta-search">
					<li><i class="glyphicon glyphicon-calendar"></i> <span><?php echo $f->StartDate?></span></li>
					<li><i class="glyphicon glyphicon-calendar"></i> <span><?php echo $f->EndDate?></span></li>
					<li><i class="glyphicon glyphicon-tags"></i> <span><?php echo $f->CityName?></span></li>
				</ul>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-7 excerpet">
				<h3><?php  $id = $f->IdFest ?> <?php echo "<a href='FestKontroler'?id=$id> $f->NameFest </a>" ?></h3>
                                <?php  if(!empty($this->input->post('srbNaziv')) 
                                       || !empty($this->input->post('engNaziv'))) { ?>
				<p>
                                <ul class="meta-search">
                                    <li><i class="glyphicon glyphicon-film"></i> <span><?php  echo $f->SerbianTitle?></span></li>
                                    <li><i class="glyphicon glyphicon-film"></i> <span> <?php  echo $f->OriginalTitle?></span></li>
                                    <li><i class="glyphicon glyphicon-calendar"></i> <span><?php  echo $f->Date?></span></li>
                                    <li><i class="glyphicon glyphicon-time"></i> <span><?php  $sat = $f->Time;
                                                                                                $sati = date("H:i", strtotime($sat));
                                                                                                echo $sati.' h' ?></span></li>
                                </p>	
                                       <?php } ?>
                <span class="plus"><a href="#" title="Lorem ipsum"><i class="glyphicon glyphicon-plus"></i></a></span>
			</div>
			<span class="clearfix borda"></span>
		</article>
        <?php } ?>
        <?php } ?>
    </section>
   </div>
  

