<div class="container-fluid p-1" id="content">
   <div class="container mt-5" class="result">

      <h2 class="text-center">Dodaj Festival</h2>

      <div class="container  text-dark" id="noviFestival">
         <form name="noviFestival" id="noviFest" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="form-row">
               <div class="form-group col-md-12">
                  <label for="imeFestivala">Ime festivala</label>
                  <input type="text" name="ime_festivala" class="form-control" id="imeFesta" placeholder="Upisite ime festivala" required>
               </div>                 
            </div>
            <div class="form-row">
               <div class="form-group col-md-6">
                  <label for="datumOd">Datum Od</label>
                  <input type="date" name="od" class="form-control" id="datum" min="<?php echo date("Y-m-d"); ?>" required>
               </div>
               <div class="form-group col-md-6">
                  <label for="datumDo">Datum Do</label>
                  <input type="date" name="do" class="form-control" id="datum" min="<?php echo date("Y-m-d"); ?>" required>
               </div>
            </div>
            <div class="form-group">
               <label for="opis">Opis festivala</label>
               <input type="text" name="opis" class="form-control" id="opis" placeholder="Dodajte kratak opis festivala" required>
            </div>
            <div class="form-row">
               <div class="form-group col-md-6">
                  <label for="ticketsMax">Maksimalno krarta</label>
                  <input type="number" name="max_Tickets" class="form-control" id="maxTickets" placeholder="Unesite maskimalan broj karata" required>
               </div>
               <div class="form-group col-md-6">
                  <label for="grad">Grad</label>
                  <select id="gradoviF" name="gradovi" class="form-control" required>
                     <option disabled selected value="">Izaberite Grad</option>
                     <?php
                     foreach ($lokacije as $lok) {
                        $naziv = $lok["CityName"];
                        $idGrad = $lok["IdGrad"];
                        echo "<option value='$idGrad'>$naziv</option>";
                     }
                     ?>   
                  </select>
               </div>                  
            </div>
            <input type="submit" name="dodajFest" class="btn btn-info mt-5" value="Dodaj Festival">
            <!--                <button type="submit" name="dodajFest" onclick="dodajF()" class="btn btn-primary mt-5">Dodaj Festival</button>-->
         </form>

      </div>
   </div>
</div>
<!--</div>-->
<script>
//   function prikazi(stranica) { 
//      var xhttp = new XMLHttpRequest();
//      xhttp.onreadystatechange = function() {
//         if (this.readyState == 4 && this.status == 200) {
//            //                document.getElementById("festival").value ="";
//            document.getElementById("rezultat").innerHTML = this.responseText;
//         }
//      };
//      xhttp.open("GET","<?php // echo site_url('AdminKontroler/'); ?>"+stranica, true);
//      xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
//      xhttp.send();    
//   }
          
   //        var dateToday = new Date();    
   //            $(function () {
   //                $("#datum").datepicker({ 
   //                  minDate: dateToday 
   //                });
   //            });   
  
}
        
</script>