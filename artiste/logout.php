<?php
session_start();
unset($_SESSION["login_artist"]);
session_destroy();
header("location:../index.php");
exit;
?>