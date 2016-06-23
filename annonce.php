<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> 



<html class="no-js"> <!--<![endif]-->
    <head>

        <title>annonce</title>
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

		   

	<?php

$webmaster = "youmenie.ecetech@gmail.com"; 



if(isset($_POST['envoyer'])){ // si une action est faite par l'utilisateur
    
    $alerte = $_POST['envoyer']; //chargement du button envoyer
    $nom = htmlentities($_POST['nom'], ENT_NOQUOTES); // chargement du nom + mise en forme de la varible
    $mail = htmlspecialchars($_POST['mail'], ENT_QUOTES); // chargement du mail  + mise en forme de la varible
    $tel = htmlspecialchars($_POST['tel'], ENT_QUOTES); // chargement du tel + mise en forme de la varible
    $sujet = htmlspecialchars($_POST['sujet'], ENT_QUOTES); // chargement du sujet + mise en forme de la varible
    $message = htmlspecialchars($_POST['msg'], ENT_QUOTES); // chargement du message + mise en forme de la varible
	
}

function verif_null($var){ // fonction qui verifie si le champs est vide
    if($var!=""){
     return $var;
   }
}

function verif_mail($var) // fonction qui verifie si le mail est correct et si le champs est vide
{
   $code_syntaxe='#^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,5}$#'; // chargement de la syntaxe mail valide  
      if(preg_match($code_syntaxe,$var)){ // compare la syntaxe mail valide au mail saisie
        return $var;
      }   
}

function verif_tel($var) // fonction qui verifie si le n° de tel est correct 
{
   $code_syntaxe='#^[0-9]{9,18}$#'; // chargement de la syntaxe tel valide  
      if(preg_match($code_syntaxe,$var)){ // compare la syntaxe tel valide au tel saisie
        return $var;
      }
}
function envoi_mail($webmaster,$nom,$mail,$sujet,$tel,$message){ //fonction qui envoie le mail
       $contenu_message = "Nom : ".$nom."\nMail : ".$mail."\nSujet : ".$sujet."\nTelephone : ".$tel."\nMessage : ".$message;
	   $entete = "From: ".$nom." <".$mail."> \nContent-Type: text/html; charset=iso-8859-1";
	 
       mail($webmaster,$sujet,$contenu_message,$entete);
	
	   
}
 

function verif_form($webmaster,$nom,$mail,$sujet,$tel,$message){ //fonction qui verifie si le formulaire est pret a etre envoyer
        if(verif_null($nom) && verif_null($sujet) && verif_null($message) && verif_tel($tel)&& verif_mail($mail)){ // verifie si toute les fontions sont a true
		   envoi_mail($webmaster,$nom,$mail,$sujet,$tel,$message);
		   echo "<font color=\"red\"  size=\"3\" face=\"Verdana, Arial, Helvetica, sans-serif\" ><strong>Tout les champs sont valider le mail est envoyé. Merci</strong></font><br>"; // Le mail est envoyé
		}else{
		   echo "<font color=\"red\" size=\"3\" face=\"Verdana, Arial, Helvetica, sans-serif\" ><strong>Veuillez saisir correctement tous les champs en rouge.</strong></font><br>"; // Une erreur dans le formulaire
		}
}

?>

<br />
<?php 
if(isset($alerte)){ 
   verif_form($webmaster,$nom,$mail,$sujet,$tel,$message); 
}
?>
<br />

<div style="text-align:center;">

<form method="post">
  <table width="44%" height="317" border="0">
    <tr>
      <td width="14%" align="left" valign="middle">
	  <font size="3" face="Verdana, Arial, Helvetica, sans-serif"> Nom :</font>
      </td>
      <td width="86%">
	 <input type="text" name="nom"  size="50" 
	 <?php  if(isset($alerte)){  
              if(verif_null($nom)){ 
                 echo $style_input_blanc; 
              }else { 
                echo $style_input_rouge; 
              }
           } ?> 
        value="<?php  if(isset($alerte)){ echo $nom; } ?>"> 
      </td>
    </tr>
    <tr>
      <td align="left" valign="middle">
	  <font size="3" face="Verdana, Arial, Helvetica, sans-serif">Mail :</font></td>
      <td>	    
	 <input type="text" name="mail" size="50"  
	 <?php  if(isset($alerte)){  //si verif_mail est false on background en rouge 
              if(verif_mail($mail)){ 
                 echo $style_input_blanc; 
              }else { 
                echo $style_input_rouge; 
              }
           } ?> 
        value="<?php  if(isset($alerte)){ echo $mail; } ?>">  
      </td>
    </tr>
    <tr>
      <td valign="middle">
      <font size="3" face="Verdana, Arial, Helvetica, sans-serif">Tel :</font></td>
      <td>  
	 <input type="text" name="tel" size="20"  
	 <?php  if(isset($alerte)){  //si verif_tel est false on background en rouge 
              if(verif_tel($tel)){ 
                 echo $style_input_blanc; 
              }else { 
                echo $style_input_rouge; 
              }
           } ?> 
        value="<?php  if(isset($alerte)){ echo $tel; } ?>"> 
      </td>
    </tr>
      <td align="left" valign="middle">
	 <font size="3" face="Verdana, Arial, Helvetica, sans-serif">Sujet :</font>
      </td>
      <td>
	<input type="text" name="sujet" size="50" 
        <?php  if(isset($alerte)){  
              if(verif_null($sujet)){ 
                 echo $style_input_blanc; 
              }else { 
                echo $style_input_rouge; 
              }
           } ?> 
        value="<?php  if(isset($alerte)){ echo $sujet; } ?>"> 
      </td>
    </tr>
    <tr>
      <td height="181" valign="top">
	 <font size="3" face="Verdana, Arial, Helvetica, sans-serif">Message : </font>
      </td>
      <td valign="top">  
<textarea name="msg"  cols="47" rows="10" <?php  if(isset($alerte)){ if(verif_null($message)){ echo $style_textarea_blanc; }else { echo $style_textarea_rouge; }} ?> ><?php  if(isset($alerte)){ echo $message; } ?></textarea>
      </td>
    </tr>
    <tr>
      <td>
        &nbsp;  
      </td>
      <td>
	<input type="submit"  name="envoyer" value="Envoyer">
        &nbsp;&nbsp;
        <input type="reset" value="Effacer" name="effacer" >
      </td>
    </tr>
  </table>
</form>
</div>
				

            <?php include "footer.php"; ?>
            
        </div> <!-- end of /#home-page -->

  </body>
</html>