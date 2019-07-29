<?php
var_dump($id);


?>
<!--
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
//                foreach ($id as $i) {
//                       echo $i['IdRez'].'<br>';
//                               }
//             foreach ($rez as $karta) {  
                    ?>
            <tr>
               <td>
                   <?php 
//                        $dan = $karta->DateOfRez;
//                        $dani = date("Y-m-d", strtotime($dan));
//                        echo $dani;
                        ?>
               </td>
                   <?php  
                        // if//($karta->StatusRez == 'K'){
                             //echo "<td style='color: blue'>".$karta->StatusRez."</td>"; 
                       //  }
                      //   elseif //($karta->StatusRez == 'O'){
                          //   echo //"<td style='color: red'>".//$karta->StatusRez."</td>";
                             //echo "<td><a href=".site_url('KorisnikKontroler/otkaziRez/'.$id);">Izbrisi</a></td>";
                            // echo "<a href='site_url("'KorisnikKontroler/otkaziRez/'".$id);'>Delete</a></td>"
                            // echo "<input type='submit' name='otkazi' Value='Otkazi' onclick='izbrisiRez()'>";
                      //   }
                     //    else {
                     //        echo //"<td>".$karta->StatusRez."</td>".
                         //   "<input type='hidden' id='idRez' name='red_za_brisanje>' value=>";
                               
                            // var_dump($id->IdProjekcija);
                        // }
                       ?>
              <td><?php //echo $karta->Tickets; ?> </td>
            </tr>
            <?php 
            //  } ?>
                           
          </tbody>
       </table>-->

<table class="table">
    <thead class="thead-dark">
            <tr>
              <th scope="col">Datum rezervacije</th>
              <th scope="col">Broj karata</th>
              <th scope="col">Status</th>
            </tr>
          </thead>
          <tbody>
              <?php
             foreach ($k as $karta) {  
                    ?>
              <tr>
               <td>
                   <?php 
                        $dan = $karta['DateOfRez'];
                        $dani = date("Y-m-d", strtotime($dan));
                        echo $dani;
                        ?>
                   <td><?php echo $karta['Tickets']; ?> </td>
               </td>
                   <?php echo "<td style='color: blue'>".$karta['StatusRez']."</td>"; ?>
             <?php } ?>
          </tbody>
</table>
<table class="table">
    <thead class="thead-dark">
            <tr>
              <th scope="col">Datum rezervacije</th>
              <th scope="col">Broj karata</th>
              <th scope="col">Status</th>
              
            </tr>
          </thead>
          <tbody>
              <?php
             foreach ($o as $karta) {  
                    ?>
              <tr>
               <td>
                   <?php 
                        $dan = $karta['DateOfRez'];
                        $dani = date("Y-m-d", strtotime($dan));
                        echo $dani;
                        ?>
                    <td><?php echo $karta['Tickets']; ?> </td>
               </td>
                   <?php  echo "<td style='color: red'>".$karta['StatusRez']."</td>"; ?>
             <?php } ?>
          </tbody>
</table>
<table class="table">
    <thead class="thead-dark">
            <tr>
              <th scope="col">Datum rezervacije</th>
              <th scope="col">Broj karata</th>
              <th scope="col">Status</th>
              <th scope="col">Otkazi rezervaciju</th>
            </tr>
          </thead>
          <tbody>
              <?php
             foreach ($r as $karta) {  
                    ?>
              <tr>
               <td>
                   <?php 
                        $dan = $karta['DateOfRez'];
                        $dani = date("Y-m-d", strtotime($dan));
                        echo $dani;
                        ?>
                   <td><?php echo $karta['Tickets']; ?> </td>
               </td>
                   <?php echo "<td>".$karta['StatusRez']."</td>";  ?>
               <input type='hidden' id='idRez' name='red' value="<?php echo $karta['IdRez']?>">
              <?php var_dump($karta['IdRez']);?>
               <?php
                //echo "<td><a href=".site_url('KorisnikKontroler/otkaziRez/'.$id);">Izbrisi</a></td>";
                            // echo "<a href='site_url("'KorisnikKontroler/otkaziRez/'".$id);'>Delete</a></td>"
                             echo "<td><input type='submit' name='otkazi' Value='Otkazi' onclick='izbrisiRez()'></td>"; ?>
      
             <?php }?>
          </tbody>
</table>
                   
<script>
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
    
</script>