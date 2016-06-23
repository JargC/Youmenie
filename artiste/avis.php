<?php
include('comments/inc_rate.php');
getComments("1");

//Seulement si l'utilisateur n'a pas posté d'avis
$test='SELECT COUNT(*) AS verif_exist FROM comments WHERE name="'.$_SESSION["login_artist"].'" AND id_oeuvre="'.$_GET["ID"].'"';
$res_test = mysql_query($test);
$test_data = @mysql_fetch_array($res_test);
	
	
		if($test_data['verif_exist'] < 1)
		{
			submitComments("1",$_SERVER['PHP_SELF']);
		} 
//IMPORTANT: Replace "1" with a unique number for the page. For example, for this page, I use "1".
?>

