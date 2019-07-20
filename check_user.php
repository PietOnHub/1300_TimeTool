<?php 
session_start (); 
$username = $_SESSION["username"];
if (!isset ($_SESSION["username"])) 
{ 
  header ("Location: index.html"); 
} 
?> 