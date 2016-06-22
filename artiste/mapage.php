<?php
session_start();
include "../con_sql.php";
include "../verif_artist.php";

$req_info='select * from user_artist where login="'.$_SESSION["login_artist"].'"';
$resultat_info = mysql_query($req_info);
$info = mysql_fetch_array($resultat_info);


//Résultat du formulaire d'ajout d'une oeuvre
if(isset($_POST["ajout_oeuvre"]))
{

//Si c'est une IMAGE
if($_POST["type"]=="Images")
{
$type = $_POST["type"];
$titre = $_POST["titre"];
$desc = $_POST["description"];


$nom_fichier = $_FILES['fichier']['name'];  
$user = $_SESSION["login_artist"];


	
if ($_FILES['fichier']['error'] > 0) {$erreur = "Erreur lors du transfert";}
/*
if ($_FILES['icone']['size'] > $maxsize) $erreur = "Le fichier est trop gros"; 
*/

$extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png' );
//1. strrchr renvoie l'extension avec le point (« . »).
//2. substr(chaine,1) ignore le premier caractère de chaine.
//3. strtolower met l'extension en minuscules.
$extension_upload = strtolower(  substr(  strrchr($_FILES['fichier']['name'], '.')  ,1)  );
if ( in_array($extension_upload,$extensions_valides) ) 
{
	echo "Extension correcte";

/*Vérification de la taille de l'mage
$image_sizes = getimagesize($_FILES['icone']['tmp_name']);
if ($image_sizes[0] > $maxwidth OR $image_sizes[1] > $maxheight) $erreur = "Image trop grande"; */

//Déplacement du fichier
$nom = "{$type}/{$user}.{$nom_fichier}";
$resultat = move_uploaded_file($_FILES['fichier']['tmp_name'],$nom);
if ($resultat) $erreur = "Transfert réussi";
else $erreur = "Transfert fail";


//Ajout à la base de données
$req_base="insert into oeuvres (type, titre, description, user, fichier, icone)
                  values('$type','$titre','$desc','$user','$nom','$nom')";
mysql_query($req_base);

//Redirection
header("location:mapage.php#confirm_ajout");


}else echo "Extension incorrecte";


}


//Si c'est une VIDEO
if($_POST["type"]=="Videos")
{
$type = $_POST["type"];
$titre = $_POST["titre"];
$desc = $_POST["description"];


$nom_icone = $_FILES['icone']['name'];
$nom_fichier = $_FILES['fichier']['name'];  
$user = $_SESSION["login_artist"];


	
if ($_FILES['icone']['error'] > 0) {$erreur = "Erreur lors du transfert";}
if ($_FILES['fichier']['error'] > 0) {$erreur = "Erreur lors du transfert";}
/*
if ($_FILES['icone']['size'] > $maxsize) $erreur = "Le fichier est trop gros"; 
*/

//Vérification si l'icone est bien une image valide.
$extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png' );
//1. strrchr renvoie l'extension avec le point (« . »).
//2. substr(chaine,1) ignore le premier caractère de chaine.
//3. strtolower met l'extension en minuscules.
$extension_upload = strtolower(  substr(  strrchr($_FILES['icone']['name'], '.')  ,1)  );

//Vérification si le fichier est bien une musique valide.
$extensions_valides_fichier = array( 'mp4' , 'wmv' );
//1. strrchr renvoie l'extension avec le point (« . »).
//2. substr(chaine,1) ignore le premier caractère de chaine.
//3. strtolower met l'extension en minuscules.
$extension_upload_fichier = strtolower(  substr(  strrchr($_FILES['fichier']['name'], '.')  ,1)  );

if ( in_array($extension_upload,$extensions_valides) && in_array($extension_upload_fichier,$extensions_valides_fichier) ) 
{
	echo "Extension correcte";

/*Vérification de la taille de l'mage
$image_sizes = getimagesize($_FILES['icone']['tmp_name']);
if ($image_sizes[0] > $maxwidth OR $image_sizes[1] > $maxheight) $erreur = "Image trop grande"; */

//Déplacement du fichier Icone
$nom_icon = "{$type}/{$user}.{$nom_icone}";
$resultat = move_uploaded_file($_FILES['icone']['tmp_name'],$nom_icon);
if ($resultat) $erreur = "Transfert réussi de l'icone";
else $erreur = "Transfert fail de l'icone";
//Déplacement du fichier musique.
$nom_file = "{$type}/{$user}.{$nom_fichier}";
$resultat2 = move_uploaded_file($_FILES['fichier']['tmp_name'],$nom_file);
if ($resultat2) $erreur = "Transfert réussi du fichier";
else $erreur = "Transfert fail du fichier";

//Ajout à la base de données
$req_base="insert into oeuvres (type, titre, description, user, fichier, icone)
                  values('$type','$titre','$desc','$user','$nom_file','$nom_icon')";
mysql_query($req_base);


//Redirection
header("location:mapage.php#confirm_ajout");


}else echo "Extension incorrecte";


}


//Si c'est une MUSIQUE
if($_POST["type"]=="Musiques")
{
$type = $_POST["type"];
$titre = $_POST["titre"];
$desc = $_POST["description"];


$nom_icone = $_FILES['icone']['name'];
$nom_fichier = $_FILES['fichier']['name'];  
$user = $_SESSION["login_artist"];


	
if ($_FILES['icone']['error'] > 0) {$erreur = "Erreur lors du transfert";}
if ($_FILES['fichier']['error'] > 0) {$erreur = "Erreur lors du transfert";}
/*
if ($_FILES['icone']['size'] > $maxsize) $erreur = "Le fichier est trop gros"; 
*/

//Vérification si l'icone est bien une image valide.
$extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png' );
//1. strrchr renvoie l'extension avec le point (« . »).
//2. substr(chaine,1) ignore le premier caractère de chaine.
//3. strtolower met l'extension en minuscules.
$extension_upload = strtolower(  substr(  strrchr($_FILES['icone']['name'], '.')  ,1)  );

//Vérification si le fichier est bien une musique valide.
$extensions_valides_fichier = array( 'mp3' , 'FLAC' );
//1. strrchr renvoie l'extension avec le point (« . »).
//2. substr(chaine,1) ignore le premier caractère de chaine.
//3. strtolower met l'extension en minuscules.
$extension_upload_fichier = strtolower(  substr(  strrchr($_FILES['fichier']['name'], '.')  ,1)  );

if ( in_array($extension_upload,$extensions_valides) && in_array($extension_upload_fichier,$extensions_valides_fichier) ) 
{
	echo "Extension correcte";

/*Vérification de la taille de l'mage
$image_sizes = getimagesize($_FILES['icone']['tmp_name']);
if ($image_sizes[0] > $maxwidth OR $image_sizes[1] > $maxheight) $erreur = "Image trop grande"; */

//Déplacement du fichier Icone
$nom_icon = "{$type}/{$user}.{$nom_icone}";
$resultat = move_uploaded_file($_FILES['icone']['tmp_name'],$nom_icon);
if ($resultat) $erreur = "Transfert réussi de l'icone";
else $erreur = "Transfert fail de l'icone";
//Déplacement du fichier musique.
$nom_file = "{$type}/{$user}.{$nom_fichier}";
$resultat2 = move_uploaded_file($_FILES['fichier']['tmp_name'],$nom_file);
if ($resultat2) $erreur = "Transfert réussi du fichier";
else $erreur = "Transfert fail du fichier";

//Ajout à la base de données
$req_base="insert into oeuvres (type, titre, description, user, fichier, icone)
                  values('$type','$titre','$desc','$user','$nom_file','$nom_icon')";
mysql_query($req_base);


//Redirection
header("location:mapage.php#confirm_ajout");


}else echo "Extension incorrecte";


}


//Si c'est un TEXTE
if($_POST["type"]=="Textes")
{
$type = $_POST["type"];
$titre = $_POST["titre"];
$desc = $_POST["description"];



$fichier =  $_POST["fichier"];
$user = $_SESSION["login_artist"];


//Ajout à la base de données
$req_base="insert into oeuvres (type, titre, description, user, fichier, icone)
                  values('$type','$titre','$desc','$user','$fichier','Textes/text.jpg')";
mysql_query($req_base);


//Redirection
header("location:mapage.php#confirm_ajout");





}

}

?>
	
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> 



<html class="no-js"> <!--<![endif]-->
    <head>

<script type="text/javascript">

function fetch_select(val)
{
   $.ajax({
     type: 'post',
     url: 'fetch_data.php',
     data: {
       get_option:val
     },
     success: function (response) {
       document.getElementById("new_select").innerHTML=response; 
     }
   });
}

</script>

        <title>Ma page</title>

        <!-- meta -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        
        <!-- stylesheets -->
        <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="../assets/css/animate.css">
        <link rel="stylesheet" href="../assets/css/owl.carousel.css">
        <link rel="stylesheet" href="../assets/css/owl.theme.css">
        <link rel="stylesheet" href="../assets/css/style.css">


        <!-- scripts -->
        <script type="text/javascript" src="../assets/js/modernizr.custom.97074.js"></script>

    </head>

    <body>

        <div id="home-page">

           <!-- Ajout du HEADER -->
		   <?php include "header.php"; ?>


            

            <div class="main-content">
                <div class="container">

				<!-- begin our designation section -->

                <section class="bg-white designation">
                    <div class="container">

                        <div class="headline text-center">
                            <div class="row">
                                <div class="col-md-6 col-md-offset-3">
                                    <h2 class="section-title"><b>Ma page</b> <?php if(isset($erreur)) echo $erreur; ?></h2>
                                </div>
                            </div>
                        </div> <!-- /.headline -->

                        
                    </div>
                </section>
                 <!-- end of designation section -->

                    <!-- contact adresses section begin -->
                    <section class="contact-address bg-white">
                        <div class="row">

                            <div class="col-md-4 col-xs-12">
                                <div class="address-info">
                                    <div class="row">

                                        <div class="col-md-3 col-xs-3">
                                            <div class="address-info-icon text-center center-block bg-light-gray">
											<i class="fa fa-user" aria-hidden="true"></i>
                                                
                                            </div> <!-- /.address-info-icon -->
                                        </div>

                                        <div class="col-md-9 col-xs-9 address-info-desc">
                                            <h3>Pseudo :</h3>
                                            <p>
                                                <?php 
															echo $info["login"]; 
													 ?>
                                            </p>
                                        </div> <!-- /.address-info-desc -->

                                    </div>
                                </div> <!-- /.address-info -->
                            </div>

                            <div class="col-md-4 col-xs-12">
                                <div class="address-info">
                                    <div class="row">

                                        <div class="col-md-3 col-xs-3">
                                            <div class="address-info-icon text-center center-block bg-light-gray">
                                                <i class="fa fa-info" aria-hidden="true"></i>
                                            </div> <!-- /.address-info-icon -->
                                        </div>

                                        <div class="col-md-9 col-xs-9 address-info-desc">
                                            <h3>Informations</h3>
                                            <p>
                                                Nom : <?php echo $info["nom"]; ?>
                                                <br/>
                                                Prenom : <?php echo $info["prenom"]; ?>
												
                                            </p>
                                        </div> <!-- /.address-info-desc -->

                                    </div>
                                </div> <!-- /.address-info -->
                            </div>

                            <div class="col-md-4 col-xs-12">
                                <div class="address-info">
                                    <div class="row">

                                        <div class="col-md-3 col-xs-3">
                                            <div class="address-info-icon text-center center-block bg-light-gray">
                                                <i class="fa fa-envelope-o"></i>
                                            </div> <!-- /.address-info-icon -->
                                        </div>

                                        <div class="col-md-9 col-xs-9 address-info-desc">
                                            <h3>Adresse Email</h3>
                                            <p>
                                                <?php echo $info["email"]; ?>
                                            </p>
                                        </div> <!-- /.address-info-desc -->

                                    </div>
                                </div> <!-- /.address-info -->
                            </div>

                        </div>
                    </section> <!-- /.contact-address -->
					
					<!--  begin portfolio section  -->
                <section class="bg-light-gray">
                    

                        <div class="headline text-center">
                            <div class="row">
                                <div class="col-md-6 col-md-offset-3">
                                    <h2 class="section-title"><u>Vos oeuvres</u></h2>
                                    <p class="section-sub-title">
                                        
                                    </p> <!-- /.section-sub-title -->
                                </div>
                            </div>
                        </div> <!-- /.headline -->
						
						<?php
						$req="SELECT * FROM oeuvres WHERE user LIKE '".$_SESSION["login_artist"]."' ";
						$sql=mysql_query($req);
						if(mysql_num_rows($sql)<1)
						{
							echo "<center><h2>Vous n'avez pas encore d'oeuvres.</h2></center>";
						}
						else {
							$data = mysql_fetch_assoc($sql);
							?>
							
							<div class="portfolio-item-list">
                            <div class="row">
							
							<?php

							while($data)
							{
						?>
						

                        
							<!-- Affichage oeuvre -->
                                <div class="col-md-4 col-sm-6">
                                    <div class="portfolio-item">
                                        <div class="item-image">
                                            <a href="oeuvre.php?ID=<?php echo $data["id"] ?>">
                                                <img src="<?php echo $data["icone"]?>" class="img-responsive center-block" alt="portfolio 1">
                                                <div><span><i class="fa fa-plus"></i></span></div>
                                            </a>
                                        </div>

                                        <div class="item-description">
                                            <div class="row">
                                                <div class="col-xs-6">
                                                    <span class="item-name">
                                                        <?php echo $data["titre"]?>
                                                    </span>
                                                    <span>
                                                        <?php echo $data["description"]?>
                                                    </span>
                                                </div>
                                                <div class="col-xs-6">
                                                    <span class="like">
                                                        <i class="fa fa-heart-o"></i>
                                                        <?php echo $data["likes"] ?>
                                                    </span>
                                                </div>
                                            </div>
                                        </div> <!-- end of /.item-description -->
                                    </div> <!-- end of /.portfolio-item -->
                                </div>

                                                                                                                                              

                            
						<?php $data=mysql_fetch_assoc($sql);}
						?>
						</div>
                        </div> <!-- end of portfolio-item-list -->
						<?php } ?>

                        <div id="morePortfolio"></div>
                        <div class="text-center">
						
                            <a href="#ajouter_oeuvre" id="loadPortfolio" class="hidden-xs btn btn-white">
                                <i class="fa fa-plus-circle" aria-hidden="true"></i> Ajouter une oeuvre 
                            </a>
                        </div>
                            
                    
                </section> 
                <!--   end of portfolio section  -->

				<br>
				<a href="logout.php"><button type="submit" id="logout" name="logout" class="btn btn-black"><i class="fa fa-power-off" aria-hidden="true"></i> Déconnexion</button></a>
				<br><br>
                    

                </div> <!-- container -->
            </div>
            <!-- main-content end -->

            <?php include "footer.php"; ?>
            
        </div> <!-- end of /#home-page -->
		
		<!--Pop up CSS - Ajouter Oeuvre -->

		<div id="ajouter_oeuvre" class="overlay">
	<div class="popup"><center>
		<h2>Ajout d'une oeuvre</h2>
		<a class="close" href="#">&times;</a>
		<div class="content">
			<hr width="60%" color="silver" size="4" />
	
	<form action="" method="post" enctype="multipart/form-data">
	
	<div class="form-group">
	<label for="icone">Type de l'oeuvre :</label><br />
     <select onchange="fetch_select(this.value);" name="type" class="form-control" required="required">
		<option value="Musiques" selected="selected">Musique</option>
		<option value="Videos">Vidéo</option>
		<option value="Images">Image</option>
		<option value="Textes">Texte</option>
	 </select>
    </div>
	
	<div class="form-group">
     <input  name="titre" type="text" class="form-control" id="titre" required="required" placeholder="Titre">
	 <div id="result4"></div>
    </div>
	
	<div class="form-group">
     <input  name="description" type="text" class="form-control" id="description" required="required" placeholder="Description">
	 <div id="result4"></div>
    </div>
	
	<hr width="60%" color="silver" size="4" />
	
	<!-- <h3>Fichiers :</h3>
	<div class="form-group">
     <label for="icone">Icône du fichier (JPG, PNG ou GIF | max. 15 Ko) :</label><br />
     <input type="file" name="icone" id="icone" class="form-control" required="required" />
	</div>
	
	<div class="form-group">
     <label for="icone">Fichier (JPG, PNG ou GIF | max. 15 Ko) :</label><br />
     <input type="file" name="fichier" id="ficher" />
	</div> -->
	<div id="new_select"></div>
	
	<label for="error"><?php if(isset($erreur)) echo $erreur; ?></label>
	
	
	<hr width="60%" color="silver" size="4" />
	
	<button type="submit" id="submit" name="ajout_oeuvre" class="btn btn-black">Ajouter</button></center>
	
	</form>
	
		</div>
	</div>
</div>

<!--Pop up CSS - Confirmer oeuvre -->

<div id="confirm_ajout" class="overlay">
	<div class="popup"><center>
		<h2>Oeuvre ajoutée</h2>
		<a class="close" href="#">&times;</a>
		<div class="content">
			<hr width="60%" color="silver" size="4" />
			Vous pouvez maintenant la consulter dans "Vos Oeuvres"
	
	
	
		</div>
	</div>
</div>
		
		

        <!--  Necessary scripts  -->

        <script type="text/javascript" src="../assets/js/jquery-2.1.3.min.js"></script>
        <script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="../assets/js/owl.carousel.js"></script>
        <script type="text/javascript" src="../assets/js/jquery.hoverdir.js"></script>


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
		
		
  

    </body>
</html>