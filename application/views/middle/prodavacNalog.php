
<?php echo validation_errors(); ?>

<form name="promeniPodatke" method="POST" action="<?php echo site_url('ProdavacKontroler/izmena');?>">
        <?php foreach($podaci as $p) { ?>   
        <div class="form-group row">
            <label for="inputUsername" class="col-sm-2 col-form-label">Username:</label>
                <div class="col-sm-10">
                    <input type="text" class="col-sm-2 col-form-label" name="username" disabled value="<?php echo $p->Username ?? "" ?>">
                </div>
        </div>
        <div class="form-group row">
            <label for="inputName" class="col-sm-2 col-form-label">Ime:</label>
                <div class="col-sm-10">
                    <input type="text" class="col-sm-2 col-form-label" name="ime" value="<?php echo $p->Name ?? "" ?>" >
                </div>
        </div>
        <div class="form-group row">
            <label for="inputSurname" class="col-sm-2 col-form-label">Prezime:</label>
                <div class="col-sm-10">
                    <input type="text" class="col-sm-2 col-form-label" name="prezime" value="<?php echo $p->Surname ?? ""; ?>">
                </div>
        </div>
        <div class="form-group row">
            <label for="inputDate" class="col-sm-2 col-form-label">Godina rođenja:</label>
                <div class="col-sm-10">
                    <input type="text" class="col-sm-2 col-form-label" name="godina" disabled value="<?php echo $p->DateOfBirth ?? ""; ?>">
                </div>
        </div>
        <div class="form-group row">
            <label for="inputBroj" class="col-sm-2 col-form-label">Broj telefona:</label>
                <div class="col-sm-10">
                    <input type="text" class="col-sm-2 col-form-label" name="broj" value="<?php echo $p->Mobile ?? ""; ?>">
                </div>
        </div>
        <div class="form-group row">
            <label for="inputEmail" class="col-sm-2 col-form-label">E-mail:</label>
                <div class="col-sm-10">
                    <input type="email" class="col-sm-2 col-form-label" name="mejl" value="<?php echo $p->Email ?? ""; ?>">
                </div>
        </div>
               <div class="form-group row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Trenutna lozinka:</label>
                <div class="col-sm-10">
                    <input type="password" class="col-sm-2 col-form-label" name="password" value="<?php echo $p->Password ?? ""; ?>" >
                </div>
        </div>
        <div class="form-group row">
            <label for="inputNova" class="col-sm-2 col-form-label">Nova lozinka:</label>
                <div class="col-sm-10">
                    <input type="password" class="col-sm-2 col-form-label" name="novip" >
                </div>
        </div>
        <div class="form-group row">
            <label for="inputPotvrda" class="col-sm-2 col-form-label">Potvrdite lozinku:</label>
                <div class="col-sm-10">
                    <input type="password" class="col-sm-2 col-form-label" name="potvrda" >
                </div>
        </div>
        <div class="form-row">
            <div class="col-sm-10">
                <input type="submit" name="izmeni" class="btn btn-primary" value="Izmeni">
            </div>
        </div>
        <?php } 
        ?>
    </form>

