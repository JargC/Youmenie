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
			$retour="c'est good";
		}	
		else{
			//message d'erreur général 
			$retour="annonce ou image non ajoutée, il se peut qu'il y ai une erreur dans les champs vérifier les données entrées.";
		}
	}
?>

<!-- Html contenant le formulaire de contacte -->
<form onsubmit ='return confirm("Enregistrer cette annonce telle quel ?")' enctype="multipart/form-data" method="POST">
	<label for="type">Type : </label><input type="text" name="type" value="<?php echo $type ;?>" required/>
	<label for="prix">Prix : </label><input type="text" name="prix" value="<?php echo $prix ;?>" required />
	<label for="photo">Photo : </label><input type="file" name="photo" required/>
	<label for="description">Description : </label><textarea name="description" required><?php echo $description;?></textarea>
	<input type="submit" value="Envoyé" name="sub" />
</form>

<?php 
	echo $retour; // affichage du message de retour 
?>