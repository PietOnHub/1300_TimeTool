<!DOCTYPE HTML>
<html>
	<head>
		<title>Stundentool</title>
		<meta name="viewport" content="user-scalable=no, width=device-width"/>
		<meta name="apple-mobile-web-app-capable" content="yes" />
		<link rel="stylesheet" type="text/css" href="css/iphone.css" media="screen"/>
	</head>
	<body>
		<div>
			<form action="logout.php" method="post" >
				<input type="submit" value="logout" name="einloggen" class="button2-50" />
			</form>
			<form action="overview.php" method="post" >
				<input type="submit" value="men&uuml;" name="overview" class="button-mehr-50" />
			</form>
			<h1>L&ouml;schen</h1>
			
				<?php
				include ("check_user.php");
				include ("connect_db_zeit.inc.php");

				// Definition der Benutzer
				$stunden_id = $_POST["stunden_id"];
				



				$erg = mysql_query("SELECT DATE_FORMAT(Datum, '%W, %e.%m.%Y'), DATE_FORMAT(Kommt, '%H:%i'), 
											DATE_FORMAT(Geht, '%H:%i'), DATE_FORMAT(Pause, '%i')
											FROM Stunden WHERE Stunden_ID = '$stunden_id'");

				$ergebnis = mysql_fetch_row($erg); 
				
				echo "<form action='entferne_stunden.php' method='post'>";
				echo "<ul>";
				echo "<li>";
				echo "<label>Datum:</label>";
				echo "<span class='right'><b>$ergebnis[0]</b> </span>";
				echo "</li>";
				echo "<li>";
				echo "<label>Kommt:</label>";
				echo "<span class='right'><b>$ergebnis[1]</b> </span>";
				echo "</li>";
				echo "<li>";
				echo "<label>Geht:</label>";
				echo "<span class='right'><b>$ergebnis[2]</b> </span>";
				echo "</li>";
				echo "<li>";
				echo "<label>Pause:</label>";
				echo "<span class='right'><b> $ergebnis[3] min</b> </span>";
				echo "</li>";
				echo "<li class='arrow'>";
				echo "<label>Stundensatz l&ouml;schen</label>";
				echo "<span class='right'> <input type='submit' value='$stunden_id' name='stundenid' class='submit' onclick=\"return confirm('M&ouml;chtest du diese Stunden wirklich l&ouml;schen?')\" /></span>";
				echo "</li>";
				echo "</ul>";
				echo "</form>";	
								
				?>
		</div>
	</body>
</html>