<?php
$host="localhost";
$usr="------";
$pwd="------";
$db="-----";
$connectionid  = mysql_connect($host,$usr,$pwd);
if(@mysql_connect($host,$usr,$pwd)) {
if(@mysql_select_db($db)) {
} else
echo "Datenbank <b>nicht OK</b>";
} else
echo "mySQL <b>nicht OK</b>  /  ";
?>
