<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> 



<html class="no-js"> <!--<![endif]-->
    <head>

        <title>Annonces</title>
        <link rel="icon" type="image/ico" href="assets/img/site_LOGO.ico">
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

		   <?php 
	require_once("./fonctions.php"); // appel aux fonctions

	//variable qui serviront par la suite
	$retour      = ""; //message de retour indiquant si tout c'est bien déroulé ou non
	$type        = "";
	$description = "";
	$prix        = "";
	$photo       = "";

	// si le formulaire est envoyé
	if(isset($_POST['sub']) AND $_POST['sub'] == "Envoyé"){ //vérification qu'il y a bien les donénes
		$connexion = connexionBDD(); //instanciations de la connexion
		//récupération des données nettoyées
		$type = clean_chaine($_POST['type']);
		$description = clean_chaine($_POST['description']);
		$prix = $_POST['prix'];
		$photo =  $_FILES['photo'];       	
		//si l'insertion marche
		if(insertannonce($type, $description, $prix, $photo, $connexion)){
			//message indiquant que c'est bon (personnalisable en css en mettant une div/span/p autour)
			$retour="Annonce Validée";
		}	
		else{
			//message d'erreur général 
			$retour="annonce ou image non ajoutée, il se peut qu'il y ai une erreur dans les champs vérifier les données entrées.";
		}
	}
?>

<!-- Html contenant le formulaire de contacte -->
<section class="bg-light-gray">
  <div class="container">
     
<form onsubmit ='return confirm("Etes vous sur de vouloir poster cette annonce ?")' enctype="multipart/form-data" method="POST">
	<li><label for="type">Type : </label><input class="form-control type="text" name="type" value="<?php echo $type ;?>" required/></li><br>
	<li><label for="prix">Prix : </label><input class="form-control type="text" name="prix" value="<?php echo $prix ;?>" required /></li><br>
	<li><label for="photo">Photo : </label><input class="form-control-file" type="file" name="photo" required/></li><br>
	<li><label for="description">Description : </label><textarea class="form-control" name="description" required><?php echo $description;?></textarea></li><br>
	<li><input  class="btn btn-primary" type="submit" value="Envoyer" name="sub" /></li>
</form>
    
  </div>	
</section>

<?php 
	echo $retour; // affichage du message de retour 
?>
<?php 
	require_once("./fonctions.php"); // on fait appel aux fonctions

	$connexion = connexionBDD(); // instanciation de la connexion

	$liste = ""; //on déclare une liste vide pour éviter des bugs si la requête ne renvoie rien
	
	$tab = selectAllannonce($connexion); // on va chercher la liste dans la base
	
	if(isset($tab)){
	for($i = 0; $i<count($tab);$i++){ // pour chaque annonce
		// création de la liste HTML depuis les données récupérées
		$liste .= "<div class='annonce' style=' margin-top : 50px; '>"; 
		$liste .= "<p><b>Date de publication :</b> ".$tab[$i]["date_publication"]."</p>";
		$liste .= "<p><b>Type :</b> ".$tab[$i]["type"]."</p>";
		$liste .= "<p><b>Prix :</b> ".$tab[$i]["prix"]."</p>";
		$liste .= "<p><img src ='./img/".$tab[$i]["photo"]."' /></p>";
		$liste .= "<p><b>Description :</b> ".$tab[$i]["description"]."</p>";		
		$liste .= "</div>";
	}
	}

	echo $liste; // affichage de la liste html crée précedement 
?>



		

            <?php include "footer.php"; ?>
            
        </div> <!-- end of /#home-page -->

  </body>
</html>