<?php 
	require_once("./fonctions.php"); // on fait appel aux fonctions

	$connexion = connexionBDD(); // instanciation de la connexion

	$liste = ""; //on déclare une liste vide pour éviter des bugs si la requête ne renvoie rien
	
	$tab = selectAllannonce($connexion); // on va chercher la liste dans la base
	
	for($i = 0; $i<count($tab);$i++){ // pour chaque annonce
		// création de la liste HTML depuis les données récupérées
		$liste .= "<div class='annonce' style=' margin-top : 50px; '>"; 
		$liste .= "<p>Date de publication :".$tab[$i]["date_publication"]."</p>";
		$liste .= "<p>Type :".$tab[$i]["type"]."</p>";
		$liste .= "<p>Prix :".$tab[$i]["prix"]."</p>";
		$liste .= "<p><img src ='./img/".$tab[$i]["photo"]."' /></p>";
		$liste .= "<p>Description :".$tab[$i]["description"]."</p>";		
		$liste .= "</div>";
	}

	echo $liste; // affichage de la liste html crée précedement 
?>


