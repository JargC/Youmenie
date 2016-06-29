<?php
session_start();
include "../con_sql.php";



//Permet de voir si l'utilisateur a like ou non cette oeuvre
if(isset($_SESSION["login_artist"]))
{
$req_like_sql='select * from likes where oeuvre_id="'.$_SESSION["ID"].'" AND user="'.$_SESSION["login_artist"].'"';
$resultat_like_sql = mysql_query($req_like_sql);
$like_sql = mysql_fetch_array($resultat_like_sql);
$user = $_SESSION["login_artist"];
}

if(isset($_SESSION["login_public"]))
{
$req_like_sql='select * from likes where oeuvre_id="'.$_SESSION["ID"].'" AND user="'.$_SESSION["login_public"].'"';
$resultat_like_sql = mysql_query($req_like_sql);
$like_sql = mysql_fetch_array($resultat_like_sql);
$user = $_SESSION["login_public"];
}

$id = $_SESSION["ID"];


if(!$like_sql[0])
{
	//Si l'utilisateur n'a pas de like, on insère son like dans la BDD :
	
	$req_insert = "insert into likes (user, oeuvre_id)
			values('$user', '$id')";
	$resultat_insert = mysql_query($req_insert);
	
	//Puis on incrémente le compteur de like de l'oeuvre
	$update_like = "UPDATE oeuvres SET likes = likes + 1 WHERE id='".$id."'";
	$update_like_query = mysql_query($update_like) or die(mysql_error());
	
	//Total de likes
	$req_info_artist='select * from oeuvres where id="'.$_SESSION["ID"].'"';
	$resultat_info_artist = mysql_query($req_info_artist);
	$info_artist = mysql_fetch_array($resultat_info_artist);
	
	
	
	//On affiche le bouton like activé
	echo "<button><i class='fa fa-heart'></i></button><br>";
	echo $info_artist['likes'];
	echo " likes";
	
	
}else 
{
	//Sinon on retire ce like
	$req_delete = "DELETE FROM likes WHERE user = '".$user."' AND oeuvre_id = '".$id."'";
	$resultat_delete = mysql_query($req_delete);
	//Puis on décrémente le compteur de like de l'oeuvre
	$update_like_2 = "UPDATE oeuvres SET likes = likes - 1 WHERE id='".$id."'";
	$update_like_query_2 = mysql_query($update_like_2) or die(mysql_error());
	//Total de likes
	$req_info_artist='select * from oeuvres where id="'.$_SESSION["ID"].'"';
	$resultat_info_artist = mysql_query($req_info_artist);
	$info_artist = mysql_fetch_array($resultat_info_artist);
	//On affiche le bouton like désactivé
	echo "<button><i class='fa fa-heart-o'></i></button><br>";
	echo $info_artist['likes'];
	echo " likes";
	
	
}

?>
<script>
$(document).ready(function(){
    $("button").click(function(){
        $.ajax({url: "like_test.php", success: function(result){
            $("#divlike").html(result);
        }});
    });
});
</script>