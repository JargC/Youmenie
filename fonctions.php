<?php 
	//fonction créant la connexion à la base
	function connexionBDD(){
		// on essaie de faire la connexion
		try{ 
			$pdo = new PDO("mysql:dbname=talent;host=127.0.0.1", "root", ""); //connexion (BDD, user, mdp)
			return $pdo; // on renvoie l'objet contenant la connexion
		} // si elle ne fonctionne pas on renvoie un message d'erreur
		catch (PDOException $e) {
    		echo 'Connexion échouée : ' . $e->getMessage();
		}
	}

	//fonction insérant une annonce
	function insertannonce($type, $description, $prix, $img, $connexion){ 
		//on vérifie que le prix entré correspond bien à un prix
		$reg = "/([0-9]*[.])?[0-9]+/";
		if(preg_match($reg, $prix)){

			//requête d'insertion (on n'insère l'image par la suite pour avoir l'id)
			$req_insert = "INSERT INTO annonces (type, description, prix) VALUES ('".$type."','".$description."','".$prix."')"; 
			$req_insert = $connexion->prepare($req_insert); //préparation de la requête (gagne du temps)
			if($req_insert->execute()){   //si la requête s'execute correctement
				if($img["name"] != ""){  //si l'insertion s'est bien déroulée et qu'une image a été uploadée            
					$req_last_id = $connexion->prepare("SELECT * FROM annonces ORDER BY id DESC LIMIT 1"); //requête visant à récupérer l'id
					$req_last_id->execute(); 
					$result = $req_last_id->fetch(PDO::FETCH_ASSOC); // on fetch les données pour qu'elles soient exploitable
					//si a partir des données, on peut effectuer le déplacement de l'image, on le fait 
					if(transform_img($img, $result['id'])){ 
						//requête mettant à jour la ligne entrée avec le nouveau nom de l'image
						$req_update_img_article = $connexion->prepare("UPDATE annonces SET photo = 'img-".$result['id'].".png' WHERE id=".$result['id']);
						if($req_update_img_article->execute()){ //si cette dernière requête s'est bien déroulée
							return true;
						}
						else{ //sinon si l'insert id ne s'est pas bien déroulée						
							return false;
						}
					}
					else{	//si on n'a pas put déplacer l'image				
						return false;
					}
				}
				else{ //si aucune image n'a été trouvée				
					return false;
				}			
			}
			else{ //si la première requête d'insertion s'est mal executée			
				return false;
			}
		}
		else{ //si le prix n'en n'est pas un 
			return false;
		}
	}

	//fonction permettant de récupérer les annonces 
	function selectAllannonce($connexion){ 
		$req_select = "SELECT * FROM annonces ORDER BY date_publication DESC"; //requête de selection dans l'ordre inverse de leur parution
		$req_select = $connexion->prepare($req_select); //préparation de la requête
		
		$row = $req_select->execute(); //on récupère le résultat
		$i = 0;
		while($row = $req_select->fetch(PDO::FETCH_ASSOC)){ // on fetch pour récup les données pour chaque ligne du résultat(utilisé quand on récupère des tableaux)
			$tab[$i] = $row; //chaque ligne traité est ajouté dans un autre tableau
			$i++;
		}            
		if(count($tab)>=1){ //si il y a au moins une ligne dans les résultats
			return $tab; //on retourne la liste
		}
		else{
			return false; //sinon il n'y a rien
		}   
	}

	//fonction permettant de récupérer l'image
	function transform_img($img, $id){
            $nom = $img['name']; // récupération du nom
            $newname = "img-".$id.".png"; //nouveau nom
            
            $destination = "./img/".$newname; //destionation de stockage de l'image
                
            if(rename($img['tmp_name'], $destination)){ //si la récupération marche
                chmod('./img/'.$newname, 0644); //on renomme l'image en lui donnant les droits de modification dessus (au cas où ça bloque)
                return true;
            }
            else{
                return false;
            }
        }     


    //clean la chaine donnée pour la sécurité        
    function clean_chaine($chaine){
    	$chaine_propre = filter_var($chaine, FILTER_SANITIZE_STRING, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    	return $chaine_propre;
    }

	
?>
	