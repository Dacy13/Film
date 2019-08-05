<?php



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
<!--prikaz kupljenih karata--> 
<body class='bg-dark'>
<div class="mt-5">
    
<div class="shadow p-3 mb-5 bg-warning bg-warning-rounded col-sm-4 offset-1">
    <b> Kupljene karte: </b>
    <br><br>
    
    <table class="table table-dark text-warning">
  <thead>
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
</div>
<!--prikaz otkazanih karata-->
<div class="shadow p-3 mb-5 bg-warning rounded col-sm-4 offset-2">
    <table class="table table-dark text-warning">
  <thead>
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
                   <?php echo "<td style='color: red'>".$karta['StatusRez']."</td>"; ?>
             <?php } ?>
          </tbody>
</table>
</div>

<!--prikaz rezervisanih karata-->
<div class="shadow p-3 mb-5 bg-warning rounded col-sm-10 offset-1">
     <table class="table table-dark text-warning">
  <thead>
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
                   <?php echo "<td style='color: red'>".$karta['StatusRez']."</td>"; ?>
               <form method="post" name="tajna" action="<?php site_url('KorisnikKontroler/otkaziRez');?>">
               <input type='hidden' id='idRez' name='red' value="<?php echo $karta['IdRez']?>">
               <td><input type='submit' name='otkazi' class="btn btn-outline-warning" Value='Otkazi' onclick='izbrisiRez()'></td>
          </form>
             <?php } ?>
          </tbody>
</table>
</div>
</div>



<!--tabele za ispis kupljenih, otkazanih i rezervisanih karata-->

<!--<table class="table">
    <thead class="thead-dark">
            <tr>
              <th scope="col">Datum rezervacije</th>
              <th scope="col">Broj karata</th>
              <th scope="col">Status</th>
            </tr>
          </thead>
          <tbody>
              <?php
//             foreach ($k as $karta) {  
                    ?>
              <tr>
               <td>
                   //<?php 
//                        $dan = $karta['DateOfRez'];
//                        $dani = date("Y-m-d", strtotime($dan));
//                        echo $dani;
//                        ?>
                   <td><?php // echo $karta['Tickets']; ?> </td>
               </td>
                   <?php // echo "<td style='color: blue'>".$karta['StatusRez']."</td>"; ?>
             <?php // } ?>
          </tbody>
</table>-->
<!--<table class="table">
    <thead class="thead-dark">
            <tr>
              <th scope="col">Datum rezervacije</th>
              <th scope="col">Broj karata</th>
              <th scope="col">Status</th>
              
            </tr>
          </thead>
          <tbody>
              <?php
//             foreach ($r as $karta) {  
                    ?>
              <tr>
               <td>
                   <?php 
//                        $dan = $karta['DateOfRez'];
//                        $dani = date("Y-m-d", strtotime($dan));
//                        echo $dani;
//                        ?>
                    <td><?php // echo $karta['Tickets']; ?> </td>
               </td>
                   <?php //  echo "<td style='color: red'>".$karta['StatusRez']."</td>"; ?>
             <?php // } ?>
          </tbody>
</table>-->
<!--<table class="table">
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
//             foreach ($r as $karta) {  
                    ?>
              <tr>
               <td>
                   <?php 
//                        $dan = $karta['DateOfRez'];
//                        $dani = date("Y-m-d", strtotime($dan));
//                        echo $dani;
//                        ?>
                   <td><?php // echo $karta['Tickets']; ?> </td>
               </td>
                   <?php // echo "<td>".$karta['StatusRez']."</td>";  ?>
          <form method="post" name="tajna" action="<?php //site_url('KorisnikKontroler/otkaziRez');?>">
               <input type='hidden' id='idRez' name='red' value="<?php //echo $karta['IdRez']?>">
               <td><input type='submit' name='otkazi' class="btn-warning"Value='Otkazi' onclick='izbrisiRez()'></td>
          </form>
             
             <?php // }?>
          </tbody>
</table>-->
                   
 <script>
  function izbrisiRez(idRez){
            
            xmlhttp=new XMLHttpRequest();
            xmlhttp.onreadystatechange=function(){
                if(this.readyState==4&&this.status==200){
                    document.getElementById("idRez").innerHTML=this.responseText;
                }
            }
            xmlhttp.open("POST", "<?php echo site_url('KorisnikKontroler/otkaziRez')?>?idRez=" + idRez, true);
            xmlhttp.send();   
            }
</script>