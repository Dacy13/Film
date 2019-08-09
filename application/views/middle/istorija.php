<?php
  
//          $tiket = $this->KorisnikModel->karte();
//        foreach($tiket as $t){
//            //echo $t['IdProjekcija'].'<br>';
//           echo $a=(int)explode(',',$t['Tickets'])."<br>";
//        }
//          $ukupno = $this->KorisnikModel->ukupnoKarte();
//        foreach($ukupno as $u){
//            //echo $u['IdProjekcija'].'<br>';
//           //echo $b= (int)implode($u)."<br>";
//        }
//        
//        foreach ($tiket as $t){
//            $a =(int)explode(',', $t['Tickets']);
//            foreach ($ukupno as $u){
//                $b = (int)explode(',', $u['Tickets']);
//                     if($t['IdProjekcija'] === $u['IdProjekcija']){
//                   $c = $a+$b;
//                   echo $c;
//                }
////                $a=(int)implode($t['Tickets']);
////                $b= (int)implode($u['Tickets']);
////                echo $a+$b."<br>";
//            }
//        }
//        $tiket = $this->KorisnikModel->karte();
//        $ukupno = $this->KorisnikModel->ukupnoKarte();
////        var_dump($tiket).'<br>';
////        var_dump($ukupno).'<br>';
//        $c = array();
//        foreach (array_keys($tiket + $ukupno) as $key) {
//            print_r ($c[$key] = $tiket[$key] + $ukupno[$key]);
//          }
//          
//          
          
          
          
//        $c = array_map(function (...$arrays) {
//    return array_sum($arrays);
//}, $a, $b);
//
//print_r($c);
//        $c = array_map(function () {
//    return array_sum(func_get_args());
//}, $a, $b);
//
//print_r($c);
//        foreach (array_combine($tiket, $ukupno) as $t => $u) {
//            $a=(int)implode($t)."<br>";
//            $b= (int)implode($u)."<br>";
//    echo sum($a + $b);}

       
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
<div class='text-center'>
        <h2 class="text-warning">
            Moje kupovine
        </h2>
      </div>
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
     <b> Otkazane karte: </b>
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
     <b> Rezervisane karte: </b>
    <br><br>
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
                   <?php echo "<td>".$karta['StatusRez']."</td>"; ?>
               <form method="post" name="tajna" action="<?php site_url('KorisnikKontroler/otkaziRez');?>">
               <input type='hidden' id='idRez' name='red' value="<?php echo $karta['IdRez'] ?>">
               <input type='hidden' id='idP' name='pro' value="<?php echo $karta['IdProjekcija'] ?>">
               <td><input type='submit' name='otkazi' class="btn btn-outline-warning" Value='Otkazi' onclick='izbrisiRez()'></td>
          </form>
             <?php } ?>
          </tbody>
</table>
</div>
</div>

                
 <script>
  function izbrisiRez(idRez){
            
            xmlhttp=new XMLHttpRequest();
            xmlhttp.onreadystatechange=function(){
                if(this.readyState==4&&this.status==200){
                    document.getElementById("idRez").innerHTML=this.responseText;
                   // document.getElementById("idP").innerHTML=this.responseText;
                }
            }
            xmlhttp.open("POST", "<?php echo site_url('KorisnikKontroler/otkaziRez')?>?idRez=" + idRez, true);
            xmlhttp.send();   
            }
</script>