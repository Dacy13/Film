<table class="table">
    <thead class="thead-light">
        <form name="pretragaRezervisanih">
        <tr>
            <td>Pretraga:</td>
          
        </tr>    
        <tr>
            <td>Ime:</td>
            <td><input type="text" name="imeKor"></td>
        </tr>
        <tr>
            <td>Prezime:</td>
            <td><input type="text" name="prezimeKor"></td>
        </tr>
        <tr>
            <td><input type="submit" name="trazi" value="Trazi"></td>
        </tr>
      </form>  
    <tr>
      <th>Ime</th>
      <th>Prezime</th>
      <th>Naziv filma</th>
      <th>Datum rezervacije</th>
      <th>Broj karata</th>
      <th></th>
      <th></th>
    </tr>
    </thead>
  <tbody>
      <tr></tr>

       <?php foreach ($rezervacije as $r){
           
           ?>
  <td><?php echo $r['Name'];?></td>
  <td><?php echo $r['Surname'];?></td>
  <td><?php echo $r['OriginalTitle'];?></td>
  <td><?php echo date('d.m.Y H:i:s', strtotime($r['DateOfRez']));?></td>
  <td><?php echo $r['Tickets'];?></td>
  <td><?php echo form_submit("kupljeno","Kupljeno!"); ?> </td>
  <td><?php echo form_close();?></td>
  
  </tr>
       <?php  }?>
         
  </tbody>
</table>
<?php
echo $this->pagination->create_links();
?>





     
