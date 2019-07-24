<?php
//var_dump($rez)."<br> ";
var_dump($k);
var_dump($r);
var_dump($o);
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
                        $sat = $karta->DateOfRez;
                        $sati = date("Y-m-d", strtotime($sat));
                        echo $sati;
                        ?>
               </td>
                   <?php $tip = $karta->StatusRez;
                         if($tip = $k){ ?>
              <td style="color: red"><?php echo $karta->StatusRez; ?> </td>
                         <?php }?>
              <td><?php echo $karta->Tickets; ?> </td>
            </tr>
            <?php 
              } ?>
                           
          </tbody>
       </table>