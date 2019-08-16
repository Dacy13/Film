<?php
       
?>
 
<body class='bg-dark'>       
    
<div class='text-center'>
    <h2 class="text-warning">
        Moje kupovine
    </h2>
</div>

<!--prikaz kupljenih karata--> 
    
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
                  </td>
                  <td> <?php echo $karta['Tickets']; ?> </td>
                  
                       <?php echo "<td style='color: blue'>".$karta['StatusRez']."</td>"; ?>
                  </tr>
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
                  </td>
                  <td> <?php echo $karta['Tickets']; ?> </td>
                  
                       <?php echo "<td style='color: red'>".$karta['StatusRez']."</td>"; ?>
                  </tr>
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
                    </td>    
                    <td> <?php echo $karta['Tickets']; ?> </td>
                    
                         <?php echo "<td>".$karta['StatusRez']."</td>"; ?>
                
                
                    <form method="post" name="tajna" action="<?php site_url('KorisnikKontroler/otkaziRez');?>">
                        <input type='hidden' id='idRez' name='red' value="<?php echo $karta['IdRez'] ?>">
                        <td> <input type='submit' name='otkazi' class="btn btn-outline-warning" Value='Otkazi' onclick='otkazRez()'> </td>
                    </form>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

                
 <script>
  function otkazRez(idRez){
            
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