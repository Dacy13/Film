
<!--prikaz pet najskorijih festivala-->
     
      <table class="table">
          <thead class="thead-dark">
            <tr>
              <th scope="col">Festival</th>
              <th scope="col">Pocinje</th>
              <th scope="col">Zavrsava</th>
              <th scope="col">Detalji</th>
              <th scope="col">Mesto odrzavanja</th>
            </tr>
          </thead>
          <tbody>
              <?php
   
             $imena = array();
             foreach ($festivali as $fest) {  
                    ?>
            <tr>
               <td>
                   <?php 
                        $ime = $fest['NameFest'];
                        if(!in_array($ime, $imena)){
                            echo "$ime";
                            $imena[] = $ime;
                         }
                    ?>
              <td><?php echo $fest['StartDate']; ?> </td>
              <td><?php echo $fest['EndDate']; ?> </td>
              <td><?php echo $fest['Description']; ?> </td>
              <td><?php echo $fest['CityName']; ?></td>
            </tr>
            <?php 
              } ?>
                           
          </tbody>
       </table>



<!--   forma za pretragu festivala i filmova-->

<!--    <div class="row justify-content-center">
        <form name='pretraga' method='GET' action='value="<?php //$imeFest ?? ""  ?>"'>
        Naziv festivala:  
        <input type="text" name="imeFest" value="<?php //$engNaziv ?? "" ?>">
        Pocetak festivala: 
        <input type="date" name="od" value="<?php// $pocetak ?? "" ?>">
        Kraj festivala: 
        <input type="date" name="do" value="<?php //$zavrsetak ?? "" ?>">
         Original naziv filma: 
        <input type="text" name="engNaziv" value="<?php //$engNaziv ?? "" ?>">
        Srpski naziv filma: 
        <input type="text" name="srbNaziv" value="<?php //$srbNaziv ?? "" ?>">
        <input type='submit' name='trazi' value='Search'>
        </form>
    </div>
<div>
    <?php  
    // var_dump($svi);
//            foreach ($svi as $row){
//                //$id=$row[0]; 
//                echo $row['NameFest']." "
//                   ." <a href='fest_info.php?id='>INFO</a> "
//                   ."<br>";
//            }
        ?>
</div>-->

    <div class="container">
       <br />
       <br />
       <br />
       <h2 align="center">Pretraga festivala i filmova</h2><br />
       <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon">Pretraga</span>
                <input type="text" name="search_text" id="search_text" placeholder="Pretraga po detaljima" class="form-control" />
            </div>
       </div>
       <br />
       <div id="result"></div>
    </div>
    <div style="clear:both"></div>
      <br />
      <br />
      <br />
      <br />

<script>
$(document).ready(function(){

 load_data();

 function load_data(query){
    $.ajax({
       url:"<?php echo base_url(); ?>ajaxkontroler/fetch",
       method:"POST",
       data:{query:query},
       success:function(data){
          $('#result').html(data);
       }
    })
 }

    $('#search_text').keyup(function(){
        var search = $(this).val();
        if(search != ''){
          load_data(search);
        }
        else {
         load_data();
        }
       });
      });
</script>


 