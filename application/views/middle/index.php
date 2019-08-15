
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
            <div class="col d-flex justify-content-center" name="imeFestivala" >

                    <div class="row">
                      <div class="col">
                        <input type="text" class="form-control" id='imeFestivala' placeholder="Unesi festival">
                      </div>
                      <div class="col">
                        <input type="date" class="form-control" id='datumOd' name="datumOd">
                      </div>
                      <div class="col">
                        <input type="date" class="form-control" id='datumDo'  name="datumDo">
                      </div>
                         <div class="col">
                        <input type="submit" name='Pretrazi' class='btn btn-warning' style="color: black; font-weight: bold;" onclick="prikaziFestivale()" value="Pretraži"/>
                         </div>
                    </div>
      
            </div>
         
            <div class="col  w-30 d-flex list-group list-group-flush justify-content-center text-center" id='Ljuba' >
               
            </div>         
                     
       	</div>		  		
   
</div>    
            <script>

function prikaziFestivale(){
   // if(IdFilm==-1)
      //  return;
   imeFestivala=document.getElementById("imeFestivala").value;  //uzmi ovo odavde ovo i definisala ovde sta je tekst
    datumOd=document.getElementById("datumOd").value;
    datumDo=document.getElementById("datumDo").value;
    if(imeFestivala=="" && datumOd=="" && datumDo=="")
        return; //ako je prayno nista
//    datumOd=document.getElementById("datumOd").value;  //uzmi ovo odavde ovo i definisala ovde sta je tekst
//    if(datumOd=="")
//        return; //ako je prayno nista
//    datumDo=document.getElementById("datumDo").value;  //uzmi ovo odavde ovo i definisala ovde sta je tekst
//    if(datumDo=="")
//        return; //ako je prayno nista
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
          document.getElementById("imeFestivala","datumDo","datumOd").value ="";  // ovo sluyi kada posaljes da ne stoji vise tu upisano
          document.getElementById("Ljuba").innerHTML= this.responseText;
      }
    };

    xhttp.open("POST", "<?php echo site_url('GostKontroler/dohvatiSveFestivale'); ?>", true); //pozivas kontrolera
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("imeFestivala="+imeFestivala+"&datumOd="+datumOd+"&datumDo="+datumDo); //uradi ovo ovde   // prvo TekstKomentara je ono sto u kontroleru u toj funkciju poyivam kroy input post a ovo drugo = + je ono sto sam gore definissala
}


</script>
            
 
