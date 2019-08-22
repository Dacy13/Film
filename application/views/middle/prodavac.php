

<table class="table">
    <thead class="thead-light">
    <form name="pretragaRezervacija" method="post" action="<?php echo site_url('ProdavacKontroler/search');?>">
        <tr>
            <td>Pretraga:</td>
          
        </tr>    
        <tr>
            <td>Ime:</td>
         <div >
             <td><input type="text" name="imeKor" autocomplete="off" onkeyup="hint()">
             <div id="predlozi1"></div></td>               
        </div> 
        </tr>
        <tr>
            <td>Prezime:</td>
            <td><input type="text" name="prezimeKor" autocomplete="off" onkeyup="hintPrezime()">
            <div id="predlozi2"></div></td>
        </tr>
        <tr>
            <td><input type="submit" name="trazi" value="trazi" ></td>
        </tr>
      </form>  
    
        
    <tr>
      <th>Ime</th>
      <th>Prezime</th>
      <th>Korisničko ime</th>
      <th>Naziv filma</th>
      <th>Datum rezervacije</th>
      <th>Broj karata</th>
      <th></th>
      <th></th>
    </tr>
    </thead>
  <tbody>
      <tr>
   
      <?php if (!isset($_POST['trazi'])) {
          foreach ($rezervacije as $r){
           ?>
  <td><?php echo $r['Name'];?></td>
  <td><?php echo $r['Surname'];?></td>
  <td><?php echo $r['Username'];?></td>
  <td><?php echo $r['OriginalTitle'];?></td>
  <td><?php echo date('d.m.Y H:i:s', strtotime($r['DateOfRez']));?></td>
  <td><?php echo $r['Tickets'];?></td>
  <td><?php echo form_submit("odobri","Odobri!"); ?> </td>
  <td><?php echo form_submit("odbij","Odbij!"); ?> </td>
  <td><?php echo form_close();?></td>
  
  </tr>
    <tr>  
       <?php  }}
   
       else {
           foreach ($search as $s){           
           ?>
 <td><?php echo $s['Name'];?></td>
  <td><?php echo $s['Surname'];?></td>
  <td><?php echo $s['Username'];?></td>
  <td><?php echo $s['OriginalTitle'];?></td>
  <td><?php echo date('d.m.Y H:i:s', strtotime($s['DateOfRez']));?></td>
  <td><?php echo $s['Tickets'];?></td>
  <td><?php echo form_submit("odobri","Odobri!"); ?> </td>
  <td><?php echo form_submit("odbij","Odbij!"); ?> </td>
  <td><?php echo form_close();?></td>
    </tr>        

       <?php }} ?>
   
  </tbody>
</table>

<?php
echo $this->pagination->create_links();
?>

<script>
    
    function hint() {
        var ime=document.pretragaRezervacija.imeKor.value;
         xmlhttp=new XMLHttpRequest();
                xmlhttp.onreadystatechange =function(){
                    if(this.readyState==4 && this.status==200){
                        
                        document.getElementById("predlozi1").innerHTML
                                =this.responseText;
                    }
                }
                
        xmlhttp.open("GET", "<?php echo site_url('ProdavacKontroler/predlog'); ?>?ime="+ime,true);
                xmlhttp.send();
    
    }
    
    function izbor(vrednost){
                document.pretragaRezervacija.imeKor.value=vrednost;
                document.getElementById("predlozi1").innerHTML="";
            }
            
            
     function hintPrezime () {
         var prezime=document.pretragaRezervacija.prezimeKor.value;
         xmlhttp=new XMLHttpRequest();
                xmlhttp.onreadystatechange =function(){
                    if(this.readyState==4 && this.status==200){
                        
                        document.getElementById("predlozi2").innerHTML
                                =this.responseText;
                    }
                }
         xmlhttp.open("GET", "<?php echo site_url('ProdavacKontroler/predlogPrezime'); ?>?prezime="+prezime,true);
                xmlhttp.send();       
         
     }       
     function izborPrezime(vr){
                document.pretragaRezervacija.prezimeKor.value=vr;
                document.getElementById("predlozi2").innerHTML="";
            }
     
            
</script>

  





     