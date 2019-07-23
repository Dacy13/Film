<?php
var_dump($rez);

foreach($rez as $karta){
    echo $karta->DateOfRez;
    echo $karta->StatusRez;
    echo $karta->Tickets;
} ?>
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
                        $sat = $karta->DateOfRez;
                        $sati = date("Y-m-d", strtotime($sat));
                        echo $sati;
                    ?>
              <td><?php echo $karta->StatusRez; ?> </td>
              <td><?php echo $karta->Tickets; ?> </td>
            </tr>
            <?php 
              } ?>
                           
          </tbody>
       </table>