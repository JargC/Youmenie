<?php
// This is a sample code in case you wish to check the username from a mysql db table
 
if(isset($_POST['mail_artist_add'])) {
$mail = $_POST['mail_artist_add'];

include "con_sql.php";
$sql_check = mysql_query("select email from user_artist where email='".$mail."'")
 or die(mysql_error());
 
if(mysql_num_rows($sql_check)) {
    echo '<div class="alert alert-danger">L\'email <strong>'.$mail.'</strong> est déjà utilisé.</div>';
} else {
    echo '<div class="alert alert-success"><img src="img/tick.gif"/> Email Valide.</div>';
}
}

if(isset($_POST['mail_public_add'])) {
$mail = $_POST['mail_public_add'];

include "con_sql.php";
$sql_check = mysql_query("select email from user_public where email='".$mail."'")
 or die(mysql_error());
 
if(mysql_num_rows($sql_check)) {
    echo '<div class="alert alert-danger">L\'email <strong>'.$mail.'</strong> est déjà utilisé.</div>';
} else {
    echo '<div class="alert alert-success"><img src="img/tick.gif"/> Email Valide.</div>';
}
}
?>