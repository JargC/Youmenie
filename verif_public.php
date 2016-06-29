<?php 
$req='select count(*) from user_public where login="'.$_SESSION["login_public"].'"';
  $resultat = mysql_query($req);
    $data = mysql_fetch_array($resultat);
    if(!$data[0])
    {
      header('Location: ../index.php');
      //Unsession Redirect
  exit();
    }
?>