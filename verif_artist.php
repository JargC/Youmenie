<?php 
$req='select count(*) from user_artist where login="'.$_SESSION["login_artist"].'"';
  $resultat = mysql_query($req);
    $data = mysql_fetch_array($resultat);
    if(!$data[0])
    {
      header('Location: ../index.php');
      //Unsession Redirect
  exit();
    }
?>