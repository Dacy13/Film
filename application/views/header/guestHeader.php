<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Projekat code name P.U.F.F</title>
<!--	css-->
	<link rel="stylesheet" href="<?php echo base_url('/css/main.css'); ?>">
<!--	bootstrap-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<!--	bootstrap JS-->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
	</script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
	</script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
	</script>
        <!--dodato za Ajax-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body>

<div class="container-fluid p-0">
<?php // echo validation_errors ( ) ;?>

    <!--	donji navbar	--><!--style="background-color: #014441;  -->
        <nav class="navbar navbar-light p-3" id="traka"> 
            <div class="container d-flex justify-content-center">
                <h2 class="text-light">Projekat P.U.F.F.</h2>
            </div>
	</nav>
    
<!--   top 	login regg nav-->	
	<nav class="navbar-top d-flex sticky-top text-light m-0 " style="background-color: #f9aa00;">
		<div class="container d-flex">
	<!--	top left-->
			<ul class="nav mr-auto text-dark ">
				<li class="nav-item"><a class="nav-link text-dark" href="<?php echo site_url('Login/login');?>">Home</a> </li>
				<li class="nav-item"><a class="nav-link text-dark" href="#">Vesti</a> </li>
				<li class="nav-item"><a class="nav-link text-dark" href="#">Dogadjaji</a> 
				</li>
			</ul>
	<!--	top right-->
			<ul class="nav">
				<li class="nav-item">
					<a class="nav-link" data-toggle="modal" data-target="#LoginModalCenter">
					<!--<img src="icons/cikica.png" alt="">-->
                                         Login
                                        <img src="<?php echo base_url('icons/cikica.png');?>">
					</a>		
				</li>
				<li class="nav-item"> 
					<a class="nav-link" data-toggle="modal" data-target="#ReggModalCenter">
					<!--<img src="icons/regg.png" alt="">-->
                                        Registracija
                                        <img src="<?php echo base_url('icons/regg.png');?>">    
					</a> 			
				</li>
			</ul>
		</div>
	</nav>

<!--	Pooup modal za login -->
<!--   Button trigger modal -->

<!--  Modal -->
	<div class="modal fade" id="LoginModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content bg-dark text-light">
		  <div class="modal-header bg-dark text-light">
			<h5 class="modal-title" id="exampleModalCenterTitle">Login</h5>
			<button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
                    <div class="modal-body">
		  
	<!--	forma login-a-->
			<form name='login' method='POST' action='<?php echo site_url('Login/login')?>'>
			  <div class="form-group">
                             
<label for="exampleInputEmail1"> <?php if(!empty($poruka)) echo $poruka; // moze i echo $poruka??";"; ?> </label>

				<label for="exampleInputEmail1">Username</label>
				<input type="text" class="form-control" name='username' aria-describedby="emailHelp" placeholder="Username">
	<!--	<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
			  </div>
			  <div class="form-group">
				<label for="exampleInputPassword1">Password</label>
				<input type="password" class="form-control" name='password'  placeholder="Password">
			  </div>
			  <button type="submit" class="btn btn-success">Login</button>
			</form>
						
		  </div>
		  <div class="modal-footer"> 
			 <button type="button" class="btn btn-info">Zaboravljena lozinka</button>
		  </div>		 
		</div>
	  </div>
	</div>

<!--       registracija model    -->
         <!--    Registracija model popup   -->
            <!-- Modal -->
            <div class="modal fade" id="ReggModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content bg-dark text-light">
                        <div class="modal-header bg-dark text-light border-warning">
                            <h5 class="modal-title bg-dark text-light" id="exampleModalCenterTitle">Registracija</h5>
                            <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        
                        <div class="modal-body bg-dark text-light">                          
                            <!--forma registracije-->
                            <form name="registracija" method="POST" action="<?php echo site_url('RegistracijaKontroler/register') ?>">
                                <div class="form-group">
                                    <label for="korisnicko">Korisnicko Ime</label>
                                    <input type="text" class="form-control text-light border-warning" style="background-color: #000000;" name="korIme" 
                                           id="korisnicko" aria-describedby="userHelp" value="<?php echo set_value('username');?>">
                                    <small id="emailHelp" class="form-text text-muted">min 5 - max 11 karaktera bez spec.karaktera </small>
                                    <small id="errorMsg" class="form-text text-muted"><?php echo form_error('korIme'); ?> </small>
                                </div>
                                <div class="form-group">
                                    <label for="lozinka">Lozinka</label>
                                    <input type="password" class="form-control border-warning text-light" style="background-color: #000000;" name="password" id="lozinka" >
                                    <small id="emailHelp" class="form-text text-muted">Pocetno veliko slovo,Min 2 Velika,3 mala slova i 1 broj. Duzine 8-12 karaktera</small>
                                    <small id="errorMsg" class="form-text text-muted"><?php echo form_error('password'); ?> </small>
                                </div>
                                <div class="form-group">
                                    <label for="lozinkaProveera">Ponovi Lozinku</label>
                                    <input type="password" class="form-control border-warning text-light" style="background-color: #000000;" name="passwordConfirmation" id="proveriLozinku">
                                    <small id="errorMsg" class="form-text text-muted"><?php echo form_error(); ?> </small>
                                </div>
                                <div class="form-group">
                                    <label for="ime">Ime</label>
                                    <input type="text" class="form-control border-warning text-light" style="background-color: #000000;" name="ime" id="ime" aria-describedby="userHelp" value="<?php echo set_value('ime');?>">
                                    <small id="emailHelp" class="form-text text-muted">Duzine 5-15 slova</small>
                                    <small id="errorMsg" class="form-text text-muted"><?php echo form_error('ime'); ?> </small>
                                </div>
                                <div class="form-group">
                                    <label for="prezime">Prezime</label>
                                    <input type="text" class="form-control border-warning text-light" style="background-color: #000000;" name="prezime" id="prezime" aria-describedby="userHelp" value="<?php echo set_value('prezime');?>">
                                    <small id="emailHelp" class="form-text text-muted">Duzine 5-15 slova</small>
                                    <small id="errorMsg" class="form-text text-muted"><?php echo form_error('prezime'); ?> </small>
                                </div>
                                <div class="form-group">
                                    <label for="rodjendan">Datum rodjenja</label>
                                    <input type="date" class="form-control text-light border-warning" style="background-color: #000000;" name="rodjendan" id="rodjendan" aria-describedby="userHelp">
                                    <small id="errorMsg" class="form-text text-muted"><?php echo form_error(); ?> </small>
                                </div>
                                <div class="form-group">
                                    <label for="mobilni">Mobilni telefom</label>
                                    <input type="text" class="form-control border-warning text-light" style="background-color: #000000;" name="mobilni" id="mobilni" aria-describedby="userHelp" value="<?php echo set_value('mobilni');?>">
                                    <small id="errorMsg" class="form-text text-muted"><?php echo form_error('mobilni'); ?> </small>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control border-warning text-light" style="background-color: #000000;" name="email" id="email" aria-describedby="userHelp" value="<?php echo set_value('email');?>">
                                    <small id="errorMsg" class="form-text text-muted"><?php echo form_error('email'); ?> </small>
                                </div>
                                <button type="submit" class="btn btn-secondary text-dark" style="background-color: #f9aa00;">Submit</button>
                            </form>
                        </div>  
                        
                    </div>
                </div>
            </div>

<!--	<div class="parallax"></div>-->
