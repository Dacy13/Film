<table class="table">
    <thead class="thead-light">
        <form name="pretragaRezervisanih" method="post" action="<?php echo site_url('Prodavac/search2');?>">
        <tr>
            <td>Pretraga:</td>
          
        </tr>    
        <tr>
            <td>Ime:</td>
            <td><input type="text" name="imeKor" autocomplete="off" onkeyup="hint()">
            <div id="predlozi1"></div></td> 
        </tr>
        <tr>
            <td>Prezime:</td>
            <td><input type="text" name="prezimeKor" autocomplete="off" onkeyup="hintPrezime()">
                <div id="predlozi2"></div></td>
        </tr>
        <tr>
            <td><input type="submit" name="trazi" value="Trazi"></td>
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
      <tr></tr>

       <?php if (!isset($_POST['trazi'])) {
          foreach ($rezervacije as $r){
           ?>
  <td><?php echo $r['Name'];?></td>
  <td><?php echo $r['Surname'];?></td>
  <td><?php echo $r['Username'];?></td>
  <td><?php echo $r['OriginalTitle'];?></td>
  <td><?php echo date('d.m.Y H:i:s', strtotime($r['DateOfRez']));?></td>
  <td><?php echo $r['Tickets'];?></td>
  <td><?php echo form_submit("kupljeno","Kupljeno!"); ?> </td>
  <td><?php echo form_close();?></td>
  
  </tr>
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
  <td><?php echo form_submit("kupljeno","Kupljeno!"); ?> </td>
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
        var ime=document.pretragaRezervisanih.imeKor.value;
         xmlhttp=new XMLHttpRequest();
                xmlhttp.onreadystatechange =function(){
                    if(this.readyState==4 && this.status==200){
                        
                        document.getElementById("predlozi1").innerHTML
                                =this.responseText;
                    }
                }
                
        xmlhttp.open("GET", "<?php echo site_url('Prodavac/predlog'); ?>?ime="+ime,true);
                xmlhttp.send();
    
    }
    
    function izbor(vrednost){
                document.pretragaRezervisanih.imeKor.value=vrednost;
                document.getElementById("predlozi1").innerHTML="";
            }
            
            
     function hintPrezime () {
         var prezime=document.pretragaRezervisanih.prezimeKor.value;
         xmlhttp=new XMLHttpRequest();
                xmlhttp.onreadystatechange =function(){
                    if(this.readyState==4 && this.status==200){
                        
                        document.getElementById("predlozi2").innerHTML
                                =this.responseText;
                    }
                }
         xmlhttp.open("GET", "<?php echo site_url('Prodavac/predlogPrezime'); ?>?prezime="+prezime,true);
                xmlhttp.send();       
         
     }       
     function izborPrezime(vr){
                document.pretragaRezervisanih.prezimeKor.value=vr;
                document.getElementById("predlozi2").innerHTML="";
            }
     
            
</script>




     
