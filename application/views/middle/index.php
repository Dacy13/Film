
<div class="parallax">

</div>
<!--<div class="parallax bg-dark"></div>-->

<!--result panel-->
<div class="container-fluid p-5" id="content">
      <!--<div class="container p-3 mt-5" class="result">-->
        <div class="row d-flex justify-content-around">
           <h3 class="text-left text-light">Pretraga</h3>
           <h3 class="text-center" id="festival"></h3>
        </div>
        <div class="row">
            <div class="col d-flex justify-content-center">
                <form name='pretragaFestivala' method='POST' action='<?php echo site_url('GostKontroler/index')?>'>
                   
               
                    <div class="row">
                      <div class="col">
                        <input type="text" class="form-control" id='imeFestivala' name="imeFestivala" placeholder="Unesi festival">
                      </div>
                      <div class="col">
                        <input type="date" class="form-control" name="datumOd">
                      </div>
                      <div class="col">
                        <input type="date" class="form-control" name="datumDo">
                      </div>
                        <input type="submit" name='Pretrazi' class="btn btn-outline-light" value="Pretraži"/>
                    </div>
                </form>
            </div>
            <div id='Ljuba'>
                
                
                
            </div>         
           
            <div class="col d-flex  w-50  list-group list-group-flush justify-content-center text-center">  
              <?php  if(!empty($festivali)){ ?>
                
               
                <table class="table">
                   <thead class="thead">
                       <tr>
                         <th>Ime festivala:</th>
                         <th>Mesto:</th>    
                         <th>Datum od:</th>
                          <th>Datum do:</th>    
                        
                       </tr>    
                     </thead>        
                     <tbody>
                       <?php foreach($festivali as $f):?>
                             <tr>
                                 <td><?php echo $f->NameFest?></td>
                                 <td><?php echo $f->CityName?></td>
                                 <td><?php echo $f->StartDate?></td>
                                 <td><?php echo $f->EndDate?></td>
                             </tr>
                       <?php endforeach ?>

                     </tbody>
                </table>
                   <?php } ?>
            </div>
       	</div>		  		
   
</div>

<!--<script> ajaxxxxxxxxxxxx
    

function proba() {
  var ime =  document.getElementById("imeFestivala").value;
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        document.getElementById("Ljuba").innerHTML = this.responseText;
    }
  };
  xhttp.open("POST", "<?php //echo site_url('Login/dohvatiSveFestivale'); ?>?ime="+ime, true);
  xhttp.send();
  idKonv=id;
}  
    
 </script>-->