<?php
//var_dump($id);
//echo "<input type='submit' name='otkazi' Value='Otkazi' onclick='izbrisiRez()'>";
?>

<table class="table">
          <thead class="thead-dark">
            <tr>
              <th scope="col">Datum rezervacije</th>
              <th scope="col">Status</th>
              <th scope="col">Broj karata</th>
            </tr>
          </thead>
          <tbody>
              <?php

             foreach ($rez as $karta) {  
                    ?>
            <tr>
               <td>
                   <?php 
                        $dan = $karta->DateOfRez;
                        $dani = date("Y-m-d", strtotime($dan));
                        echo $dani;
                        ?>
               </td>
                   <?php  
                         if($karta->StatusRez == 'K'){
                             echo "<td style='color: blue'>".$karta->StatusRez."</td>"; 
                         }
                         elseif ($karta->StatusRez == 'O'){
                             echo "<td style='color: red'>".$karta->StatusRez."</td>";
                             //echo "<a href=".site_url('KorisnikKontroler/otkaziRez/'.$id);">Izbrisi</a>";
                            // echo "<a href='site_url("'KorisnikKontroler/otkaziRez/'".$id);'>Delete</a></td>"
                            // echo "<input type='submit' name='otkazi' Value='Otkazi' onclick='izbrisiRez()'>";
                         }
                         else {
                             echo "<td>".$karta->StatusRez."</td>";
                            // "<input type='hidden' id='idRez' name='red_za_brisanje>' value=$id; >";
                         }
                       ?>
              <td><?php echo $karta->Tickets; ?> </td>
            </tr>
            <?php 
              } ?>
                           
          </tbody>
       </table>

<!--<script>
    function izbrisiRez(){
        var request = new XMLHttpRequest();
        var id = document.getElementById('idRez').value;
            request.onreadystatechange = function() {
             if (this.readyState == 4 && this.status == 200) {
                  document.write(this.responseText);
      }
    request.open("POST", "<?php echo site_url('KorisnikKontroler/otkaziRez'.$id); ?>", true);
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    request.send("id="+idRez);
      
      
    }

    
</script>-->