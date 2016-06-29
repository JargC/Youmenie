<?php

/*
Author : Qazi Ishtiyaq Ahmad
URL : www.XtremeXtension.com

Copyright Qazi Ishtiyaq Ahmad
Licensed under the terms of the GNU General Public License.

Please feel free to pass the free version of this comment script on, at no cost, to others.
The comment script is protected by the copyright laws of the United States and international copyright treaties.
You may not rent, lease, or otherwise receive any compensation for this script...
*/

include "../../con_sql.php";


	  
if(isset($_REQUEST['post'])){
$name = $_POST['name'];
//Récupération des informations de l'artiste via l'ID de son oeuvre 
$req_info='select * from user_artist where login="'.$name.'"';
$resultat_info = mysql_query($req_info);
$info = mysql_fetch_array($resultat_info);
////////////////////////////////////////////

$tuturl = $_POST['tuturl'];
$id_oeuvre = $_POST['id_oeuvre'];

if(isset($_SESSION["login_artist"]))
{	
$url = "artiste.php?ID=1";
} else $url = "#";

$description = $_POST['message'];
$date = date("d/m/Y, H:i");




//Check form
if ($description == ''){
	
	echo'Please fill in all fields before submitting the comment.';
	exit();
}



//Submit data
$query = "INSERT INTO comments VALUES('','$name','$description','$url','$date', '$id_oeuvre')";
mysql_query($query);
echo "<h1>Submission Successful</h1>";
echo "Your comment has been submitted.  You will now be redirected back to the last page you visited.  Thanks!";
echo "<meta http-equiv='refresh' content='2;URL=$tuturl'>";
} else {
echo "There was an error with the submission. ";
}


?>