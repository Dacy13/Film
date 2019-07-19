
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Projekat code name P.U.F.F</title>
<!--	css-->
	<link rel="stylesheet" href="<?php echo base_url()?>/css/main.css">
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

<!--   top 	login regg nav-->	
	<nav class="navbar-top d-flex sticky-top text-light m-0 " style="background-color: #3a9679;">
                    
		<div class="container d-flex">
	<!--	top left-->
                    <div class="navbar-brand text-dark">
                            <?php echo $this->session->korisnik['Name'].' ' ?>
                            <?php echo $name = $this->session->korisnik['Surname']?>
                    </div>
			<ul class="nav mr-auto text-dark ">
                                <li class="nav-item"><a class="nav-link text-dark" href="<?php echo site_url("KorisnikKontroler")?>">Home</a> </li>
                                <li class="nav-item"><a class="nav-link text-dark" href="<?php echo site_url( "KorisnikKontroler/nalog" ) ?>">Moj nalog</a> </li>
                                <li class="nav-item"><a class="nav-link text-dark" href="#">Rezervacija karata</a> </li>
				<li class="nav-item"><a class="nav-link text-dark" href="#">Vesti</a> </li>
				<li class="nav-item"><a class="nav-link text-dark" href="#">Dogadjaji</a> 
				</li>
			</ul>
	<!--	top right-->
			<ul class="nav">
				<li class="nav-item"><a class="nav-link text-dark" href="<?php echo site_url( "Login/logout" ) ?>">Log out</a> </li>

			</ul>

		</div>
	</nav>


	<!--donji navbar	style="background-color: #014441;-->  
        <nav class="navbar navbar-dark sticky-top p-3" id="traka"> 
		<div class="container d-flex justify-content-center">
                    <h3 class="text-light">Projekat</h3>
		</div>
	</nav>
<!--	<div class="parallax"></div>-->