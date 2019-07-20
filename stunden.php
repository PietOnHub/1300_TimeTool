<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
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
			<h1>Stunden</h1>
			<ul>
				<?php
				include ("check_user.php");
				include ("connect_db_zeit.inc.php");

				// Definition der Benutzer
				$querry_user_id = mysql_query("SELECT Nutzer_ID, Vertragsstunden FROM Nutzer WHERE Nickname = '$username'");
				$user_idq = mysql_fetch_row($querry_user_id);
				$user_id = $user_idq[0];
				$vertragsstunden = $user_idq[1];

				$show_stunden_id = mysql_query("SELECT DATE_FORMAT(Datum, '%Y'), DATE_FORMAT(Datum, '%u'), 
											DATE_FORMAT(Datum, '%a, %e.%m'), DATE_FORMAT(Kommt, '%H:%i'), 
											DATE_FORMAT(Geht, '%H:%i'), DATE_FORMAT(Pause, '%i'),
											DATE_FORMAT(Netto, '%H:%i'), Netto_Dec, Stunden_ID, Status
											FROM Stunden WHERE Nutzer_ID = '$user_id' ORDER BY Datum DESC");

				$wochenstunden = 0;
				$f = 0;
				$b = 0;

				while ($row = mysql_fetch_row($show_stunden_id)) {

					//Prüfen ob KW sich ändert
					$kw = $row[1];
					//KW
					if ($f != $kw) {
						if ($f != '0') {
							echo "<li>";
							echo "<label>Wochenstunden:</label>";
							$zeitkonto = $wochenstunden - $vertragsstunden;
							echo "<span class='right'><b>$zeitkonto  |  $wochenstunden</b> </span>";
							$wochenstunden = 0;
							echo "</li>";
						}
						echo "</ul>";
						echo "<h2>$row[0] KW $row[1]</h2>";
						echo "<ul>";
					}
					echo "<li><form action='edit_stunden.php' method='post' >";
					echo "<label>$row[2]</label>";
					if ($row[9] == '0')
					echo "<span class='right'> $row[3] $row[4] $row[5] | <b>$row[6]</b>";
					else
					echo "<span class='right'><b>$row[9]</b>";
					echo "</span><input type='submit' value='$row[8]' name='stunden_id' class='submit-edit' />";
					echo "</form></li>";

					$f = $kw;
					$wochenstunden = $wochenstunden + $row[7];
				}
				if ($f != 0) {
					echo "<li>";
					echo "<label>Wochenstunden:</label>";
					$zeitkonto = $wochenstunden - $vertragsstunden;
					echo "<span class='right'><b>$zeitkonto  |  $wochenstunden</b> </span>";
					echo "</li>";
				}
				echo "</ul>";
				mysql_close();
				?>
		</div>
	</body>
</html>