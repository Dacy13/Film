
<div>
    

</div>

<div>
    <table class="table">
        <thead class="thead-light">
            <tr>
              <th>Naziv festivala</th>
              <th>Datum pocetka</th>
              <th>Datum kraja</th>
              <th>Mesto</th>
              <th>O festivalu</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($festival as $fest){ ?>
            <tr>
              <td><?php echo $fest->NameFest ?></td>
              <td><?php echo $fest->StartDate ?></td>
              <td><?php echo $fest->EndDate ?></td>
              <td><?php echo $fest->CityName ?></td>
              <td><?php echo $fest->Description ?></td>              
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<br>
<br>

<?php foreach($festival as $fest){ ?>

<h3 align="center">Program projekcija za  <?php echo $fest->NameFest ?>  filmski festival</h3>
<?php } ?>
<br>
<br>
<table class="table">
    <thead class="thead-light">
        <tr>          
          <th>Datum projekcije</th>
          <th>Vreme projekcije</th>
          <th>Naziv filma</th>
          <th>Orginalan naziv</th>
          <th>Mesto projekcije</th>
          <th>Lokacija projekcije</th>
          <th>Sala</th>
          <th>IMDB za film</th>
          <th>Vise o filmu</th>
        </tr>
    </thead>
  <tbody>
      
      <?php foreach($projekcije as $proj) { ?>
      <tr>
          
          <td><?php echo $proj->Date?></td>
          <td><?php echo $proj->Time ?></td>
          <td><?php echo $proj->SerbianTitle ?></td>
          <td><?php echo $proj->OriginalTitle ?></td>
          <td><?php echo $proj->CityName ?></td>
          <td><?php echo $proj->Theater ?></td>
          <td><?php echo $proj->Room ?></td>
          <td><?php echo "<a href='$proj->IMDB' target='_blank'>IMDB link</a>" ?></td>
          <td><?php echo "<a href='".site_url('FilmKontroler/index')."?id=".$proj->IdFilm."'>O filmu</a>"; ?></td>
      </tr>
      <?php } ?>
  </tbody>
</table>
