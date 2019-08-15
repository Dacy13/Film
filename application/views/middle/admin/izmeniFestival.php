<div class="container-fluid p-1" id="content">
   <div class="container mt-5" class="result">
      <h2 class="text-center">Izmeni Festival</h2>

      <div class="container  text-dark" id="noviFest">
         <form name="noviFestival" id="noviFest" method="POST" action="<?php echo site_url('AdminKontroler/izmeniFestival') ?>">
            <?php
               foreach ($festival as $f) {    
            }
            ?>   
            <input type="hidden" name="hiddenId" value="<?php echo $f->IdFest; ?>" /> <!---- za dohvatanje id i slanje u kontroler ---->
            <div class="form-row">
               <div class="form-group col-md-12">
                  <label for="imeFestivala">Ime festivala</label>
                  <input type="text" name="ime_festivala" class="form-control" id="imeFesta" value="<?php echo $f->NameFest; ?>">
               </div>                 
            </div>
            <div class="form-row">
               <div class="form-group col-md-6">
                  <label for="datumOd">Datum Od</label>
                  <input type="text" name="od" class="form-control" id="datum" value="<?php echo $f->StartDate; ?>">
               </div>
               <div class="form-group col-md-6">
                  <label for="datumDo">Datum Do</label>
                  <input type="text" name="do" class="form-control" id="datum" value="<?php echo $f->EndDate; ?>">
               </div>
            </div>
            <div class="form-group">
               <label for="opis">Opis festivala</label>
               <input type="text" name="opis" class="form-control" id="opis" value="<?php echo $f->Description; ?>">
            </div>
            <div class="form-row">
               <div class="form-group col-md-6">
                  <label for="ticketsMax">Maksimalno krarta</label>
                  <input type="text" name="max_Tickets" class="form-control" id="maxTickets" value="<?php echo $f->MaxTickets; ?>">
               </div>               
               <div class="form-group col-md-6">
                  <label for="grad">Grad</label>
                  <input type="hidden" name="hiddenIdG" value="<?php echo $f->IdGrad; ?>" />
                  <input type="text" name="gradovi" class="form-control" id="gradoviF" value="<?php echo $f->CityName; ?>" disabled>
<!--                  <select id="gradoviF" name="gradovi" class="form-control">   -->
<!--                     <option selected value="<?php // echo $f->IdGrad;  ?>"><?php // echo $f->CityName; ?></option>-->
                     <?php
//                     foreach ($lokacije as $lok) {
//                        $naziv = $f->CityName;
//                        $idGrad = $f->IdGrad;
//                        if($naziv == $idGrad){
//                           echo "<option selected value='$idGrad'>$naziv</option>";
//                        }
//                        echo "<option value='$idGrad'>$naziv</option>";
//                     }
                     ?>   
<!--                  </select>-->
               </div>                  
            </div>
            <input type="submit" name="izmeniFest" class="btn btn-warning mt-5" value="Izmeni Festival">
            <!--                <button type="submit" name="dodajFest" onclick="dodajF()" class="btn btn-primary mt-5">Dodaj Festival</button>-->
            <?php // }   ?>
         </form>
      </div>

   </div>
</div>
<!--</div>-->
