<!--
*********************************************
**               _   _     _       _       **
**    __ _ _ __ | |_(_) __| | ___ | |_     **
**   / _` | '_ \| __| |/ _` |/ _ \| __|	   **
**  | (_| | | | | |_| | (_| | (_) | |_     **
**   \__,_|_| |_|\__|_|\__,_|\___/ \__|    **
**                                         **
*********************************************
-->
<?php
//déclaration des variables pour la connection
$host="127.0.0.1";
$user="userFai";
$password="passFai";
$db="FAI";
// connect mysql
$link = mysql_connect($host,$user,$password);
if (!$link) {
    die('Not connected : ' . mysql_error());
}
// select la base FAI
$db_selected = mysql_select_db($db, $link);
if (!$db_selected) {
    die ('Can\'t use '. $db .' : ' . mysql_error());
}
?>
