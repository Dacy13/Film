<div class="container-fluid p-0" id="admin">
   <div class="row m-0" id="apanel">
      <div class="col-sm-2 col-md-2 col-lg-2 p-5 bg-dark">
         <!-----------------------------------------     stranica = fja u kontroleru-->
         <a href="#" id="festival" onclick='prikazi("festivaliSvi")'>Svi Festivali</a><br><br>      
         <a href="#" id="festival" onclick='prikazi("dodajFestival")'>Dodaj festival</a><br><br>      
         <a href="#" id="festival" onclick='prikazi("noviFilm")'>Dodaj film</a><br><br>
         <a href="#" id="festival" onclick='prikazi("")'>Korisnici</a><br><br>
         <a href="#">Admin</a><br><br>

      </div>
      <div class="col-sm-10 col-md-10 col-lg-10 p-0" id="rezultat"></div>

   </div>	
</div>
<!--ajax za prikazivanje strane u stranici-->
<script>
   /* definisana stranica(naziv funkcije u kontroleru */
   function prikazi(stranica) {
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function () {
         if (this.readyState == 4 && this.status == 200) {
            //            document.getElementById("festival").value = "";
            document.getElementById("rezultat").innerHTML = this.responseText;
         }
      };
      xhttp.open("GET", "<?php echo site_url('AdminKontroler/'); ?>" + stranica, true);
      //      xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhttp.send();
   }
</script>