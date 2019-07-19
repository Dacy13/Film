
    <form name="promeniPodatke" method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
        <?php foreach($podaci as $p) { ?>   
        <div class="form-group row">
            <label for="inputUsername" class="col-sm-2 col-form-label">Username</label>
                <div class="col-sm-10">
                    <input type="email" class="col-sm-2 col-form-label" id="inputUsername" disabled value="<?php echo $p->Username ?? "" ?>">
                </div>
        </div>
        <div class="form-group row">
            <label for="inputName" class="col-sm-2 col-form-label">Ime</label>
                <div class="col-sm-10">
                    <input type="text" class="col-sm-2 col-form-label" id="inputName" value="<?php echo $p->Name ?? "" ?>" >
                </div>
        </div>
        <div class="form-group row">
            <label for="inputSurname" class="col-sm-2 col-form-label">Prezime</label>
                <div class="col-sm-10">
                    <input type="text" class="col-sm-2 col-form-label" id="inputPrezime" value="<?php echo $p->Surname ?? ""; ?>">
                </div>
        </div>
        <div class="form-group row">
            <label for="inputDate" class="col-sm-2 col-form-label">Godina rodjenja</label>
                <div class="col-sm-10">
                    <input type="text" class="col-sm-2 col-form-label" id="inputDate" disabled value="<?php echo $p->DateOfBirth ?? ""; ?>">
                </div>
        </div>
        <div class="form-group row">
            <label for="inputBroj" class="col-sm-2 col-form-label">Broj telefona</label>
                <div class="col-sm-10">
                    <input type="text" class="col-sm-2 col-form-label" id="inputBroj" value="<?php echo $p->Mobile ?? ""; ?>">
                </div>
        </div>
        <div class="form-group row">
            <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" class="col-sm-2 col-form-label" id="inputEmail" value="<?php echo $p->Email ?? ""; ?>">
                </div>
        </div>
        <label>Promenite lozinku</label>
        <div class="form-group row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Trenutna lozinka</label>
                <div class="col-sm-10">
                    <input type="password" class="col-sm-2 col-form-label" id="inputPassword" >
                </div>
        </div>
        <div class="form-group row">
            <label for="inputNova" class="col-sm-2 col-form-label">Nova lozinka</label>
                <div class="col-sm-10">
                    <input type="password" class="col-sm-2 col-form-label" id="inputNova">
                </div>
        </div>
        <div class="form-group row">
            <label for="inputPotvrda" class="col-sm-2 col-form-label">Potvrdite lozinku</label>
                <div class="col-sm-10">
                    <input type="password" class="col-sm-2 col-form-label" id="inputPotvrda" >
                </div>
        </div>
        <div class="form-row">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Izmeni</button>
            </div>
        </div>
        <?php } ?>
    </form>
