<?php
// This is a sample code in case you wish to check the username from a mysql db table

if(isset($_POST['login_artist_add'])) {
$username = $_POST['login_artist_add'];

include "con_sql.php";
$sql_check = mysql_query("select login from user_artist where login='".$username."'")
 or die(mysql_error());
 
if(mysql_num_rows($sql_check)) {
    echo '<div class="alert alert-danger"></span>L\'identifiant <strong>'.$username.'</strong> est déjà utilisé.</div>';
}
 else 
 {
    echo '<div class="alert alert-success"><img src="img/tick.gif"/> Identifiant Valide.</div>';
}

}

if(isset($_POST['login_public_add'])) {
$username = $_POST['login_public_add'];

include "con_sql.php";
$sql_check = mysql_query("select login from user_public where login='".$username."'")
 or die(mysql_error());
 
if(mysql_num_rows($sql_check)) {
    echo '<div class="alert alert-danger"></span>L\'identifiant <strong>'.$username.'</strong> est déjà utilisé.</div>';
}
 else 
 {
    echo '<div class="alert alert-success"><img src="img/tick.gif"/> Identifiant Valide.</div>';
}

}

?>