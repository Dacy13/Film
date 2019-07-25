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
                <form name='pretragaFestivala' method='POST' action='<?php echo $_SERVER['PHP_SELF'];?>'>
                   
                    <?php //echo site_url('Login/festivali')?>
                    <div class="row">
                      <div class="col">
                        <input type="text" class="form-control" name="imeFestivala" placeholder="Unesi festival">
                      </div>
                      <div class="col">
                        <input type="date" class="form-control" name="datumOd">
                      </div>
                      <div class="col">
                        <input type="date" class="form-control" name="datumDo">
                      </div>
                        <button type="submit" name='Pretrazi' class="btn btn-outline-light">Pretrazi</button>
                    </div>
                </form>
            </div>
                       
            <!--<h3 class="d-flex justify-content-center">Rezultat</h3>-->
            <div class="col d-flex justify-content-center">  

                <ul class="list-group list-group-flush w-50 text-center">
   
                    
                    <table class="table">
    <thead class="thead-light">
    <tr>
      <th>Rezultat:<?php //var_dump($festivali);?></th>
      
    </tr>
    </thead>
<tbody>
      <?php 
      var_dump($festivali);
      foreach($festivali as $f):?>
      <tr>
          <td><?php echo $f->NameFest?></td>
          <td><?php echo $f->StartDate?></td>
          <td><?php echo $f->EndDate?></td>
      </tr>
<?php endforeach ?>
  
  </tbody>
    
    
    
</table>


<!--    <script>
            var idKonv=-1;
            function prikazi(id) {
              var xhttp = new XMLHttpRequest();
              xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("nova_poruka_tekst").value ="";
                    document.getElementById("poruke").innerHTML = this.responseText;
                }
              };
              xhttp.open("GET", "<?php //echo site_url('User/prikazi'); ?>?id="+id, true);
              xhttp.send();
              idKonv=id;
            }

    </script>-->
    
<!--                <li class="list-group-item bg-transparent">Cras justo odio</li>
                    <li class="list-group-item bg-transparent">Dapibus ac facilisis in</li>
                    <li class="list-group-item bg-transparent">Morbi leo risus</li>
                    <li class="list-group-item bg-transparent">Porta ac consectetur ac</li>
                    <li class="list-group-item bg-transparent">Vestibulum at eros</li>
                    <li class="list-group-item bg-transparent">Vestibulum at eros</li>
                    <li class="list-group-item bg-transparent">Cras justo odio</li>
                    <li class="list-group-item bg-transparent">Dapibus ac facilisis in</li>
                    <li class="list-group-item bg-transparent">Morbi leo risus</li>
                    <li class="list-group-item bg-transparent">Porta ac consectetur ac</li>
                    <li class="list-group-item bg-transparent">Vestibulum at eros</li>
                    <li class="list-group-item bg-transparent">Vestibulum at eros</li>-->
                  </ul>
            </div>
       	</div>		  		
    <!--</div>-->
</div>