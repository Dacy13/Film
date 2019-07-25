<?php
//var_dump($rez)."<br> ";

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
                   <?php $tip = $karta->StatusRez;
                         if(strcmp($tip, implode("",(array)$k))){ 
                             echo "<td style='color: red'>".$karta->StatusRez."</td>"; 
                          }
                         elseif(strcmp($tip, implode("",(array)$o))){ 
                             echo "<td style='color: blue'>".$karta->StatusRez."</td>";
                          }
                         elseif(strcmp($tip, implode("",(array)$r))){
                             echo "<td style='color: green'>".$karta->StatusRez."</td>";
                          }
                       ?>
              <td><?php echo $karta->Tickets; ?> </td>
            </tr>
            <?php 
              } ?>
                           
          </tbody>
       </table>