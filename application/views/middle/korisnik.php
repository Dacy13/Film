
<!--prikaz pet najskorijih festivala-->
     
      <table class="table">
          <thead class="thead-dark">
            <tr>
              <th scope="col">Festival</th>
              <th scope="col">Pocinje</th>
              <th scope="col">Zavrsava</th>
              <th scope="col">Mesto odrzavanja</th>
            </tr>
          </thead>
          <tbody>
              <?php
              
              
              
              var_dump($fest);
              
              
              
              
              
              
              
//              $imena = array();
//              if(is_array($pet)) {
//                    foreach ($pet as $fest) { 
//                        
//                    ?>
            <tr>
               <td>
                   <?php 
//                        $ime = $fest['NameFest'];
//                            if(!in_array($ime, $imena)){
//                                echo "$ime";
//                                $imena[] = $ime;
//                               }
//                    ?>
               </td><?php // echo $fest['NameFest']; ?> 
              <td><?php // echo $fest['StartDate']; ?> </td>
              <td><?php // echo $fest['EndDate']; ?> </td>
              <td><?php // echo $fest['CityName']; ?></td>
            </tr>
            <?php 
//              }
//                            } ?>
          </tbody>
       </table>



<!--   forma za pretragu festivala i filmova-->

    <div class="row justify-content-center">
        <form name='pretraga' method='GET' action='value="<?php  ?>"'>
        Naziv festivala:  
        <input type="text" name="imeFest" value="<?php  ?>">
        Pocetak festivala: 
        <input type="date" name="od" value="<?php  ?>">
        Kraj festivala: 
        <input type="date" name="do" value="<?php  ?>">
         Original naziv filma: 
        <input type="text" name="engNaziv" value="<?php  ?>">
        Srpski naziv filma: 
        <input type="text" name="srbNaziv" value="<?php  ?>">
        <input type='submit' name='trazi' value='Search'>
        </form>
    </div>


 