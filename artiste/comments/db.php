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

//Please set the following variables for your mysql database:
$db_hostname = "localhost";  //usually "localhost be default"
$db_username = "root";  //your user name
$db_pass = "";  //the password for your user
$db_name = "talent";  //the name of the database


/*MYSQL DATABASE CONNECTION/ TRACKING FUNCTIONS
--------------------------------------*/
// connect to database
$dbh = @mysql_connect ($db_hostname, $db_username, $db_pass) or die ('I cannot connect to the database because: ' . mysql_error());
@mysql_select_db ($db_name);


?>