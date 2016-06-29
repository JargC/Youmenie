<?php
session_start();
unset($_SESSION["login_public"]);
session_destroy();
header("location:../index.php");
exit;
?>