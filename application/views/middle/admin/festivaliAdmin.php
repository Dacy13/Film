<!--<div class="parallaxFest"></div>-->
<div class="container-fluid p-1" id="content">
   <div class="container  mt-2" class="result">

      <h2 class="text-center mt-5">Festivali</h2>

      <div class="col2 text-dark" id="ajax">
         <table class="table table-hover table-sm p-4">
            <thead>
               <tr>
                  <th scope="col">Festival</th>
                  <th scope="col">Od</th>
                  <th scope="col">Do</th>
                  <th scope="col">Opis</th>
                  <th scope="col">Projekcije</th>
                  <th scope="col">MaxTickets</th>
                  <th scope="col">Grad</th>
                  <th scope="col">Izmeni</th>
               </tr>
            </thead>
            <tbody>  
               <tr>
                  <?php
                  $imena = array();
                  foreach ($festivali as $f) {
                     ?>     
                     <!--    za proveru datuma kraja festival-->
                     <?php
                     $danas = date("Y-m-d");
                     $baza = $f['EndDate'];

                     $sdt = new Datetime($danas); /* 'Y-m-d' nop */
                     $Fend = new Datetime($baza);

                     if ($Fend >= $sdt) {
                        ?>
                        <td>
                           <?php
                           // echo $f['NameFest'];
                           $ime = $f['NameFest'];
                           if (!in_array($ime, $imena)) {
                              echo "$ime";
                              $imena[] = $ime;
                              ?>
                           </td>
                           <td><?php echo date("d-m-Y", strtotime($f['StartDate'])); ?></td>
                           <td><?php echo date("d-m-Y", strtotime($f['EndDate'])); ?></td>
                           <td><?php echo $f['Description']; ?></td>
                           <td><?php echo $f['MaxTickets']; ?></td>
                           <td><?php echo $f['CityName']; ?></td>
                           <td>
                              <?php
                              $IdFest = $f['IdFest'];
                              ?>                             
                              <button type="button" id="projekcije" onclick='prikazi("projekcije")' class="btn btn-sm btn-outline-info">
                                 <?php
                                 echo "<a class='text-decoration-none text-light'  href='" . site_url('AdminKontroler/projekcije') . "?id=" . $IdFest . "'>Projekcije</a>";
                                 ?>
                              </button>
                           </td>
                           <td>
                              <?php
                              $IdFest = $f['IdFest'];
                              ?>                                
                              <button type="button" id="izmeni" onclick='prikazi("izmeniFestival")' class="btn btn-sm btn-outline-warning text-dark">
                                 <?php
                                 echo "<a class='text-decoration-none text-light'  href='" . site_url('AdminKontroler/izmeniFestival?id=') . $IdFest . "'>Izmeni</a>";
                                 ?>
                              </button>    
                           </td>
                        <?php } ?><!--  if za prikaz imena festivala  -->                     
                     </tr>                         
                     <!------------------------ else za proveru kraja/pocetk festivala ------------------->
                  <?php } else { ?>     
                     <!--    festivali koji su se zavrsili    -->
                     <tr class="" style="background-color: #cccccc;">
                        <td>
                           <?php
                           // echo $f['NameFest'];
                           $ime = $f['NameFest'];
                           if (!in_array($ime, $imena)) {
                              echo "$ime";
                              $imena[] = $ime;
                              ?>
                           </td>
                           <td><?php echo date("d-m-Y", strtotime($f['StartDate'])); ?></td>
                           <td><?php echo date("d-m-Y", strtotime($f['EndDate'])); ?></td>
                           <td><?php echo $f['Description']; ?></td>
                           <td><?php echo $f['MaxTickets']; ?></td>
                           <td><?php echo $f['CityName']; ?></td>
                           <td>
                              <?php
                              $IdFest = $f['IdFest'];
                              ?>                             
                              <button type="button" id="projekcije" class="btn btn-sm btn-outline-info" disabled>
                                 <?php
                                 echo "<a class='text-decoration-none text-body'>Projekcije</a>";
                                 ?>
                              </button>
                           </td>
                           <td>
                              <?php
                              $IdFest = $f['IdFest'];
                              ?>                                
                              <?php
                              $danas = date("Y-m-d");
                              $baza = $f['StartDate'];

                              $sdt = new Datetime($danas); /* 'Y-m-d' nop */
                              $Fsdt = new Datetime($baza);
//                                var_dump($sdt);
//                                var_dump($fstd);
                              if ($Fsdt <= $sdt) {
//                                    echo "Vec je poceo";
                                 echo '<button type="button" id="festival" class="btn btn-sm btn-outline-warning text-dark" disabled>Izmeni</button>';
                              };
                              ?>

                           </td>
                        <?php } ?> <!--- IF-a za prikazivanje jednog imena festa ...  --->     

                     <?php } ?> <!--  else kraj -->
                  </tr>
               <?php } ?> <!--- kraj foreach-a -->
            </tbody>
         </table>     
         <!--     paginacija-->
         <?php
//         echo $this->pagination->create_links();
         ?>
      </div>
   </div>
</div>
<!--</div>-->
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