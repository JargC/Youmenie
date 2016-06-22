<?php
session_start();
include "con_sql.php";

//Connexion Public
if(isset($_POST["submit_login_public"]))
{
	$login_public = $_POST["login_public"];
	$mdp_public = $_POST["mdp_public"];
	
	$req = "SELECT * FROM user_public WHERE login='$login_public' AND mdp='$mdp_public'";
	$resultat = mysql_query($req);
	
	if(mysql_num_rows($resultat)>0)
	{
		$_SESSION["login_public"] = $login_public;
		header("location:artiste/mapage.php");
	}else $erreur = "Erreur, mauvais login ou mot de passe";
}

//Connexion Artiste
if(isset($_POST["submit_login_artist"]))
{
	$login_artist = $_POST["login_artist"];
	$mdp_artist = $_POST["mdp_artist"];
	
	$req = "SELECT * FROM user_artist WHERE login='$login_artist' AND mdp='$mdp_artist'";
	$resultat = mysql_query($req);
	
	if(mysql_num_rows($resultat)>0)
	{
		$_SESSION["login_artist"] = $login_artist;
		header("location:artiste/mapage.php");
	}else $erreur = "Erreur, mauvais login ou mot de passe";
}

//Inscription Artiste
if(isset($_POST["submit_add_artist"]))
{
	$login = $_POST["login_artist_add"];
	$mdp = $_POST["mdp_artist_add"];
	$mail = $_POST["mail_artist_add"];
	$nom = $_POST["nom_artist_add"];
	$prenom = $_POST["prenom_artist_add"];
	
	$req = "insert into user_artist (login, mdp, email, nom, prenom)
			values('$login', '$mdp', '$mail', '$nom', '$prenom')";
	$resultat = mysql_query($req);
	
	
}

//Inscription Public
if(isset($_POST["submit_add_public"]))
{
	$login = $_POST["login_public_add"];
	$mdp = $_POST["mdp_public_add"];
	$mail = $_POST["mail_public_add"];
	$nom = $_POST["nom_public_add"];
	$prenom = $_POST["prenom_public_add"];
	
	$req = "insert into user_public (login, mdp, email, nom, prenom)
			values('$login', '$mdp', '$mail', '$nom', '$prenom')";
	$resultat = mysql_query($req);
	
	
}

	?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> 



<html class="no-js"> <!--<![endif]-->
    <head>

        <title>Connexion</title>
        <link rel="icon" type="image/png" href="img/main_logo.jpg">
        <!-- meta -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        
        <!-- stylesheets -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/css/animate.css">
        <link rel="stylesheet" href="assets/css/owl.carousel.css">
        <link rel="stylesheet" href="assets/css/owl.theme.css">
        <link rel="stylesheet" href="assets/css/style.css">


        <!-- scripts -->
        <script type="text/javascript" src="assets/js/modernizr.custom.97074.js"></script>

    </head>

    <body>

        <div id="home-page">

           <!-- Ajout du HEADER -->
		   <?php include "header.php"; ?>


            

            <div class="main-content">




                <!-- begin pricing section -->
                <section class="bg-light-gray">
                    <div class="container">

                        <div class="headline text-center">
                            <div class="row">
                                <div class="col-md-6 col-md-offset-3">
                                    <h2 class="section-title">Connexion</h2>
                                    <p class="section-sub-title">
                                        Accédez à votre espace.
                                    </p> <!-- /.section-sub-title -->
                                </div>
                            </div>
                        </div> <!-- /.headline -->

					
                        <div class="row">
                            <div class="col-md-6">
                                <div class="price-box">
                                    <h3>Espace Public</h3>
                                    <div class="price-info">

                                        <span>Recherche d'oeuvre</span>
                                        <span>Recherche d'artiste</span>
                                        <span>Votez pour les oeuvres.</span>
                                        

                                        

                                    </div> <!-- /.price-info -->

                                    <a href="#popup_con_public" class="btn pricing-btn">Se connecter</a>
									<a href="#popup_add_public" class="btn pricing-btn">S'inscrire</a>
                                </div> <!-- /.price-box -->
                            </div>

                            <div class="col-md-6">
                                <div class="price-box">
                                    <h3>Espace Artiste</h3>
                                    <div class="price-info">

                                        <span>Montrez vos oeuvres</span>
                                        <span>Recevez des votes du public</span>
                                        <span>Gagnez en visibilité</span>
                                        

                                        

                                    </div> <!-- /.price-info -->

                                    <a href="#popup_con_artist" class="btn pricing-btn">Se connecter</a>
									<a href="#popup_add_artist" class="btn pricing-btn">S'inscrire</a>
                                </div> <!-- /.price-box -->
                            </div>

                            

                            
                        </div>
                    </div>
                </section>
                <!-- end of pricing section -->



                <br><br>
                            
            </div> <!-- end of /.main-content -->

            <?php include "footer.php"; ?>
            
        </div> <!-- end of /#home-page -->
		
		<!--  POPUP CSS  -->
		<div id="popup_con_public" class="overlay">
	<div class="popup"><center>
		<h2>Connexion à l'espace public </h2>
		<a class="close" href="#">&times;</a>
		<div class="content">
			<hr width="60%" color="silver" size="4" />
	
	<form action="" method="post">
	<?php if(isset($erreur)) echo "<h2> $erreur </h2>"; ?>
	<div class="form-group">
     <input  name="login_public" type="text" class="form-control" id="login_public" required="required" placeholder="Identifiant">
    </div>
	
	<div class="form-group">
     <input  name="mdp_public" type="password" class="form-control" id="mdp_public" required="required" placeholder="Mot de passe">
    </div>
	<hr width="60%" color="silver" size="4" />
	
	<button type="submit" id="submit" name="submit_login_public" class="btn btn-black">Connexion</button></center>
	
	</form>
	
		</div>
	</div>
</div>


<div id="popup_con_artist" class="overlay">
	<div class="popup"><center>
		<h2>Connexion à l'espace artiste </h2>
		<a class="close" href="#">&times;</a>
		<div class="content">
			<hr width="60%" color="silver" size="4" />
	
	<form action="" method="post">
	<?php if(isset($erreur)) echo "<h2> $erreur </h2>"; ?>
	<div class="form-group">
     <input  name="login_artist" type="text" class="form-control" id="login_artist" required="required" placeholder="Identifiant">
    </div>
	
	<div class="form-group">
     <input  name="mdp_artist" type="password" class="form-control" id="mdp_artist" required="required" placeholder="Mot de passe">
    </div>
	<hr width="60%" color="silver" size="4" />
	
	<button type="submit" id="submit" name="submit_login_artist" class="btn btn-black">Connexion</button></center>
	
	</form>
	
		</div>
	</div>
</div>

<!-- Inscription --->
<div id="popup_add_artist" class="overlay">
	<div class="popup"><center>
		<h2>Inscription Artiste </h2>
		<a class="close" href="#">&times;</a>
		<div class="content">
			<hr width="60%" color="silver" size="4" />
	
	<form action="" method="post">
	<?php if(isset($erreur)) echo "<h2> $erreur </h2>"; ?>
	<div class="form-group">
     <input  name="login_artist_add" type="text" class="form-control" id="login_artist_add" required="required" placeholder="Identifiant">
	 <div id="result"></div>
    </div>
	
	<div class="form-group">
     <input  name="mdp_artist_add" type="password" class="form-control" id="mdp_artist_add" required="required" placeholder="Mot de passe">
    </div>
	
	<div class="form-group">
     <input  name="mail_artist_add" type="text" class="form-control" id="mail_artist_add" required="required" placeholder="Adresse email">
	 <div id="result2"></div>
    </div>
	<hr width="60%" color="silver" size="4" />
	
	<div class="form-group">
     <input  name="nom_artist_add" type="text" class="form-control" id="nom_artist_add" required="required" placeholder="Votre nom">
    </div>
	<div class="form-group">
     <input  name="prenom_artist_add" type="text" class="form-control" id="prenom_artist_add" required="required" placeholder="Votre prénom">
    </div>
	
	<hr width="60%" color="silver" size="4" />
	
	<button type="submit" id="submit" name="submit_add_artist" class="btn btn-black">Inscription</button></center>
	
	</form>
	
		</div>
	</div>
</div>


<div id="popup_add_public" class="overlay">
	<div class="popup"><center>
		<h2>Inscription Publique </h2>
		<a class="close" href="#">&times;</a>
		<div class="content">
			<hr width="60%" color="silver" size="4" />
	
	<form action="" method="post">
	<?php if(isset($erreur)) echo "<h2> $erreur </h2>"; ?>
	<div class="form-group">
     <input  name="login_public_add" type="text" class="form-control" id="login_public_add" required="required" placeholder="Identifiant">
	 <div id="result3"></div>
    </div>
	
	<div class="form-group">
     <input  name="mdp_public_add" type="password" class="form-control" id="mdp_public_add" required="required" placeholder="Mot de passe">
    </div>
	
	<div class="form-group">
     <input  name="mail_public_add" type="text" class="form-control" id="mail_public_add" required="required" placeholder="Adresse email">
	 <div id="result4"></div>
    </div>
	<hr width="60%" color="silver" size="4" />
	
	<div class="form-group">
     <input  name="nom_public_add" type="text" class="form-control" id="nom_public_add" required="required" placeholder="Votre nom">
    </div>
	<div class="form-group">
     <input  name="prenom_public_add" type="text" class="form-control" id="prenom_public_add" required="required" placeholder="Votre prénom">
    </div>
	
	<hr width="60%" color="silver" size="4" />
	
	<button type="submit" id="submit" name="submit_add_public" class="btn btn-black">Inscription</button></center>
	
	</form>
	
		</div>
	</div>
</div>

        <!--  Necessary scripts  -->

        <script type="text/javascript" src="assets/js/jquery-2.1.3.min.js"></script>
        <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="assets/js/owl.carousel.js"></script>
        <script type="text/javascript" src="assets/js/jquery.hoverdir.js"></script>


        <!-- script for portfolio section using hoverdirection -->
        <script type="text/javascript">
            $(function() {

                $('.portfolio-item > .item-image').each( function() { $(this).hoverdir({
                    hoverDelay : 75
                }); } );

            });
        </script>


        <!-- script for twitter-feed using owl carousel-->
        <script type="text/javascript">
            $(document).ready(function() {
 
                $("#twit").owlCarousel({
                 
                    navigation : true, // Show next and prev buttons
                    slideSpeed : 100,
                    paginationSpeed : 400,
                    navigationText : false,
                    singleItem: true,
                    autoPlay: true,
                    pagination: false
                });
 
            });
        </script>


        <!-- script for testimonial section using owl carousel -->
        <script type="text/javascript">
            $(document).ready(function() {
 
                $("#client-speech").owlCarousel({
                 
                    autoPlay: 5000, //Set AutoPlay to 3 seconds
                    stopOnHover: true,
                    singleItem:true
                });
 
            });
        </script>
		
		<!-- Ajax Inscription checker -->
		<script type="text/javascript">
$(document).ready(function()
{    
 $("#login_artist_add").keyup(function()
 {  
  var name = $(this).val(); 
  
  if(name.length > 2)
  {  
   $("#result").html('<img src="loader.gif"/> Recherche...');
   
   $.post("inscription-checker.php", $("#reg-form").serialize())
    .done(function(data){
    $("#result").html(data);
   });
   
   $.ajax({
    
    type : 'POST',
    url  : 'inscription-checker.php',
    data : $(this).serialize(),
    success : function(data)
        {
              $("#result").html(data);
           }
    });
    return false;
   
  }
  else
  {
   $("#result").html('Doit contenir plus de 2 caractères');
  }
 });
 
 
  $("#mail_artist_add").keyup(function()
 {  
  var mail = $(this).val(); 
  
    if(mail.indexOf("@") >= 0)
	{
   $("#result2").html('<img src="loader.gif"/> Recherche...');
   
   $.post("mail-checker.php", $("#reg-form").serialize())
    .done(function(data){
    $("#result2").html(data);
   });
   
   $.ajax({
    
    type : 'POST',
    url  : 'mail-checker.php',
    data : $(this).serialize(),
    success : function(data)
        {
              $("#result2").html(data);
           }
    });
    return false;
	}
   else
  {
   $("#result2").html('<font class="red">Doit contenir un @</font>');
  }
  });
  
 });

</script>
<script type="text/javascript">
$(document).ready(function()
{    
 $("#login_public_add").keyup(function()
 {  
  var name = $(this).val(); 
  
  if(name.length > 2)
  {  
   $("#result3").html('<img src="loader.gif"/> Recherche...');
   
   $.post("inscription-checker.php", $("#reg-form").serialize())
    .done(function(data){
    $("#result3").html(data);
   });
   
   $.ajax({
    
    type : 'POST',
    url  : 'inscription-checker.php',
    data : $(this).serialize(),
    success : function(data)
        {
              $("#result3").html(data);
           }
    });
    return false;
   
  }
  else
  {
   $("#result3").html('Doit contenir plus de 2 caractères');
  }
 });
 
 
  $("#mail_public_add").keyup(function()
 {  
  var mail = $(this).val(); 
  
    if(mail.indexOf("@") >= 0)
	{
   $("#result4").html('<img src="loader.gif"/> Recherche...');
   
   $.post("mail-checker.php", $("#reg-form").serialize())
    .done(function(data){
    $("#result4").html(data);
   });
   
   $.ajax({
    
    type : 'POST',
    url  : 'mail-checker.php',
    data : $(this).serialize(),
    success : function(data)
        {
              $("#result4").html(data);
           }
    });
    return false;
	}
   else
  {
   $("#result4").html('<font class="red">Doit contenir un @</font>');
  }
  });
  
 });

</script>
  

    </body>
</html>