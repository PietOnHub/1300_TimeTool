
<html>
	<head><title>entferne</title></head>
	<body>
		<?php

include ("check_user.php");
include ("connect_db_zeit.inc.php");

$stunid = $_POST["stundenid"];

$loeschen = "DELETE FROM Stunden WHERE Stunden_ID = '$stunid'";
$loesch = mysql_query($loeschen);

header("Location: stunden.php");

mysql_close();
?>
		
		
		
	</body>
</html>
