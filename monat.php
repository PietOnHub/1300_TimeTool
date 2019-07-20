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
				$querry_user_id = mysql_query("SELECT Nutzer_ID, Vertragsstunden, Stunden_Uebertrag FROM Nutzer WHERE Nickname = '$username'");
				$user_idq = mysql_fetch_row($querry_user_id);
				$user_id = $user_idq[0];
				$vertragsstunden = $user_idq[1];
				$stunden_uebertrag = $user_idq[2];

				$show_stunden_id = mysql_query("SELECT DATE_FORMAT(Datum, '%Y'), DATE_FORMAT(Datum, '%M'), 
											DATE_FORMAT(Datum, '%a, %e.%m'), DATE_FORMAT(Kommt, '%H:%i'), 
											DATE_FORMAT(Geht, '%H:%i'), DATE_FORMAT(Pause, '%i'),
											DATE_FORMAT(Netto, '%H:%i'), Netto_Dec, Stunden_ID
											FROM Stunden WHERE Nutzer_ID = '$user_id' ORDER BY Datum DESC");

				$monat_alt = 0;
				$bilanz = 0;

				while ($row = mysql_fetch_row($show_stunden_id)) {

					if ($row[1] != '0' AND $row[1] != $monat_alt) {
						
						
						
						
						
				echo "<li>";
				echo "<label>$monat_alt</label>";
				echo "<span class='right'><b>$bilanz</b></b>";
				echo "</span>";
				echo "</li>";
				$bilanz = 0;
				
					}
					
					$bilanz = $row[7] + $bilanz;
					$monat_alt = $row[1];
					
					
					
					
					
					
				}

				echo "<li>";
				echo "<label>$monat_alt</label>";
				echo "<span class='right'><b>$bilanz</b>";
				echo "</span>";
				echo "</li>";
				$bilanz = 0;
				
				mysql_close();

				?>
			</ul>
		</div>
	</body>
</html>