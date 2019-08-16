<div class="container-fluid p-1" id="content">
   <div class="container mt-5" class="result">
      <div class="col-12 p-1" id="content">
         <h2 class="text-center mb-3">Dodaj film</h2>
         <form class="col-12 p-2" id="filmNovi" method="POST" action="<?php echo site_url('AdminKontroler/noviFilm') ?>" enctype="multipart/form-data">

            <div class="form-row">
               <div class="form-group col-md-6">
                  <label for="text">Originalni naziv</label>
                  <input type="text" name="original" class="form-control" id="Originalni" placeholder="Originalni naziv filma" required>
               </div>
               <div class="form-group col-md-6">
                  <label for="text">Srpski naziv</label>
                  <input type="text" name="srpski" class="form-control" id="Srpski" placeholder="Srpski naziv filma" required>
               </div>
            </div>
            <div class="form-row">
               <div class="form-group col-md-4">
                  <label for="rezija">Reziser</label>
                  <input type="text" name="rezija" class="form-control" id="rezija" placeholder="Upisite Ime i Prezime rezisera" required>
               </div>
               <div class="form-group col-md-8">
                  <label for="glumci">Glavni glumci</label>
                  <input type="text" name="glumci" class="form-control" id="glumci" placeholder="Upisite glavne glumce filma" required>  
               </div>
            </div>  
            <div class="form-row">
               <div class="form-group col-md-4">
                  <label for="datum">Datum izdavanja</label>
                  <input type="date" name="datum" class="form-control" id="datum" required>
               </div>
               <div class="form-group col-md-4">
                  <label for="trajanje">Trajanje filma</label>
                  <input type="number" name="trajanje" class="form-control" id="trajanje" placeholder="Upisite trajanje filma(minuta)" required>  
               </div>
               <div class="form-group col-md-4">
                  <label for="zemlja">Zemlja porekla</label>
                  <input type="text" name="zemlja" class="form-control" id="zemlja" placeholder="Upisite zemlju porekla filma" required>
               </div>
            </div>
            <div class="form-row">
               <div class="form-group col-md-8">
                  <label for="opisF">Opis</label>
                  <input type="text" name="opisF" class="form-control" id="opisF" placeholder="Kratak opis filma" required>
               </div>
               <div class="form-group col-md-4">
                  <label for="imdb">IMDB</label>
                  <input type="text" name="imdb" class="form-control" id="imdb" placeholder="IMDB link filma" required>
               </div>
            </div>    
            <div class="form-group col-md-4">
               <label for="lposter">Poster filma</label>
               <input type="file" name="poster" class="form-control-file" id="posterF" required>
               <small id="podrzani" class="form-text text-muted">( 'jpg','png,'gif' )</small>
               <small id="errorMsg" class="form-text text-muted"><?php echo form_error('poster'); ?> </small>
            </div>
            <!--        <button type="submit" name="dodajFilm" class="btn btn-primary mt-3">Dodaj film</button>-->
            <input type="submit" name="dodajFilm" class="btn btn-info mt-5" value="Dodaj film">

         </form>
      </div>
   </div>
</div>
