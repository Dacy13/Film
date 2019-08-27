<div class="container-fluid p-1" id="content">
    <div class="container mt-5" class="result">
        <h3 class="text-center display-4 text-dark  pt-5">Filmske projekcije po lokacijama i salama</h3>
        <div class="row-sm-12 rounded text-dark">
            <!--forma za dodavanje projekcija u festival-->
            <form class="mt-5 p-0" name="novaProjekcija" id="novaProjekcija" method="POST" action="<?php echo site_url('AdminKontroler/dodajProjekcije'); ?>">
                <div class="row mx-auto">
                    <?php foreach ($festivali as $fest) { ?>
                        <input type="hidden" name="hiddenId" value="<?php echo $fest->IdFest; ?>"/>
                    <?php } ?>
                    <div class="form-group col-sm-3">
                        <label for="datum">Datum</label>
                        <input type="date" class="form-control" id="datum" name="datum" min="<?php echo $fest->StartDate; ?>">
                    </div>
                    <div class="form-group col-sm-2">
                        <label for="vreme">Vreme</label>
                        <input type="text" min="00:00" max="23:59" class="form-control" id="vreme" name="vreme">
                    </div>
                    <div class="form-group col-sm-2">
                        <label for="film">Film</label>
                        <select id="film" name="film" class="form-control">
                            <option disabled selected value="">Izaberite Film</option>
                            <?php
                            foreach ($filmovi as $film) {
                                $naziv = $film["OriginalTitle"];
                                $idGrad = $film["IdFilm"];
                                echo "<option value='$idGrad'>$naziv</option>";
                            }
                            ?>   
                        </select>
                    </div>
                    <div class="form-group col-sm-2">
                        <label for="sale">Lokacijs/Sala</label>
                        <select id="sala" name="saleP" class="form-control overflow-auto">
                            <option disabled selected value="">Izaberite Salu</option>
                            <?php
                            foreach ($lokacije as $lok) {

                                $grad = $lok["CityName"];
                                $theater = $lok["Theater"];
                                $room = $lok["Room"];
                                $idSala = $lok["IdSale"];

                                echo "<option value='$idSala'>$grad-$theater-$room</option>";
                            }
                            ?>   
                        </select>
                    </div>
                    <div class="form-group col-sm-1">
                        <label for="karte">Karata</label>
                        <input type="number" class="form-control" id="karata" name="karata">
                    </div>
                    <div class="form-group col-sm-1">
                        <label for="cena">Cena</label>
                        <input type="number" class="form-control" id="cena" name="cena">
                    </div>
                    <div class="form-inline col-sm-1 p-0 m-0">
                        <input type="submit" name="dodajP" class="btn btn-warning" value="Dodaj" onclick='prikazi("projekcije")'</>
                    </div>
                </div>
            </form>
        </div>

        <div class="table-responsive-sm" id='poruke'>
            <!--prikazivanje projekcija festivala -->
            <table class="table text-dark">
                <thead class="thead-dark text-dark">
                    <tr>          
                        <th class="th-sm">Ime festivaal</th>
                        <th class="th-sm">Datum projekcije</th>
                        <th class="th-sm">Vreme projekcije</th>
                        <th class="th-sm">Naziv Filma</th>
                        <th class="th-sm">Lokacija projekcije</th>
                        <th class="th-sm">Sala</th>
                        <th class="th-sm">Cena</th>
                        <th class="th-sm">Info</th>
                        <th class="th-sm">Otkazi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($projekcije as $proj) { ?>
                                    <!--<tr>-->
                        <tr id="red<?php echo $proj['IdProjekcija'] ?>">
                            <td><?php echo $proj['NameFest'] ?></td>
                            <td><?php echo $proj['Date'] ?></td>
                            <td><?php echo $proj['Time'] ?></td>
                            <td><?php echo $proj['OriginalTitle'] ?></td>
                            <td><?php echo $proj['Theater'] ?></td>
                            <td><?php echo $proj['Room'] ?></td>
                            <td><?php echo $proj['Cena'] ?></td>

                            <!----------------   modal za izmenu projekcije  -------------->
<!--                    <div class="modal fade" id="IzmeniModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalCenterTitle">Izmeni projekciju</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form class="mt-5 p-0" name="novaProjekcija" id="novaProjekcija" method="POST" action="<?php echo site_url('AdminKontroler/izmeniProjekciju'); ?>">
                                        <div class="row mx-auto">
                                            <?php foreach ($festivali as $fest) { ?>
                                                <input type="hidden" name="hiddenId" value="<?php echo $fest->IdFest; ?>"/>
                                            <?php } ?>
                                            <div class="form-group col-sm-3">
                                                <label for="datum">Datum</label>
                                                <input type="text" class="form-control" id="datum" name="datum" value="<?php echo date("d-m-Y", strtotime($proj['Date'])); ?>">
                                            </div>
                                            <div class="form-group col-sm-2">
                                                <label for="vreme">Vreme</label>
                                                <input type="text" min="00:00" max="23:59" class="form-control" id="vreme" name="vreme" value="<?php echo $proj['Time']; ?>">
                                            </div>
                                            <div class="form-group col-sm-2">
                                                <label for="film">Film</label>
                                                <select id="film" name="film" class="form-control">
                                                    <option disabled selected value="<?php echo $proj['IdFilm'];?>"><?php echo $proj['OriginalTitle'];?></option>
                                                    <?php
                                                    foreach ($filmovi as $film) {
                                                        $naziv = $film["OriginalTitle"];
                                                        $idGrad = $film["IdFilm"];
                                                        echo "<option value='$idGrad'>$naziv</option>";
                                                    }
                                                    ?>   
                                                </select>
                                            </div>
                                            <div class="form-group col-sm-2">
                                                <label for="sale">Lokacijs/Sala</label>
                                                <select id="sala" name="saleP" class="form-control overflow-auto">
                                                    <option disabled selected value="<?php echo $proj['IdSale'];?>"<?php echo set_select('saleP', $proj['IdSale'])?>><?php echo $proj['Room'];?></option>
                                                    <?php
                                                    foreach ($lokacije as $lok) {

                                                        $grad = $lok["CityName"];
                                                        $theater = $lok["Theater"];
                                                        $room = $lok["Room"];
                                                        $idSala = $lok["IdSale"];

                                                        echo "<option value='$idSala'>$grad-$theater-$room</option>";
                                                    }
                                                    ?>   
                                                </select>
                                            </div>
                                            <div class="form-group col-sm-1">
                                                <label for="karte">Karata</label>
                                                <input type="number" class="form-control" id="karata" name="karata" value="<?php echo $proj['Tickets']; ?>">
                                            </div>
                                            <div class="form-group col-sm-1">
                                                <label for="cena">Cena</label>
                                                <input type="number" class="form-control" id="cena" name="cena" value="<?php echo $proj['Cena']; ?>">
                                            </div>
                                            <div class="form-inline col-sm-1 p-0 m-0">
                                                <input type="submit" name="izmeniP" class="btn btn-warning" value="Izmeni"</>
                                            </div>
                                        </div>
                                    </form>
                                </div>                            
                            </div>
                        </div>
                    </div>-->

            <!--                    <form method="post" name="izmeni" action="<?php // site_url('AdminKontroler/izmeniProjekciju()'); ?>">           -->
                    <td>
                        <input type='hidden' id='idFilm' name='izmeniH' value="<?php echo $proj['IdProjekcija']; ?>">
                        <input type='button' name='izmeniP' class="btn btn-info btn-sm" Value='Izmeni' 
                               data-toggle="modal" data-target="#IzmeniModalCenter"> 
                    </td>       
                    <!--                    </form>        -->
                    <form method="post" name="otkPro" action="<?php site_url('AdminKontroler/projekcijuOtkazi()'); ?>">
                        <td>
                            <input type='hidden' id='idFilm' name='red' value="<?php echo $proj['IdProjekcija']; ?>">
                            <input type='button' name='otkazi' class="btn btn-warning btn-sm" Value='Otkazi' 
                                   onclick='otkazFilm(<?php echo $proj['IdProjekcija']; ?>)' 
                                   onclick="<?php // site_url('AdminKontroler/posaljiEmail()');    ?>"> 
                        </td>       
                    </form>        
                    </tr>
                <?php } ?>           
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>

    function removeElement(id) {
        var elem = document.getElementById(id);
        return elem.parentNode.removeChild(elem);
    }

    function otkazFilm(idFilm) {
        xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                removeElement('red' + idFilm);
                document.getElementById("idFilm").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("POST", "<?php echo site_url('AdminKontroler/projekcijuOtkazi') ?>", true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send("id=" + idFilm);
    }
</script>
