<!DOCTYPE HTML>
<html>
	<head>
		<title>Stundentool</title>
		<meta name="viewport" content="user-scalable=no, width=device-width"/>
		<meta name="apple-mobile-web-app-capable" content="yes" />
		<link rel="stylesheet" type="text/css" href="css/iphone.css" media="screen"/>
	</head>
	<body>
		<?php
		include ("check_user.php");
		include ("connect_db_zeit.inc.php");
		?>
		<div>
			<h1>Stundentool</h1>
			<h2>&Uuml;bersicht</h2>
			<form action="logout.php" method="post" >
				<input type="submit" value="logout" name="logout" class="button2-50" />
			</form>
			<form action="new_stunden.php" method="post" >
				<input type="submit" value="+" name="newstunden" class="button-bold2" />
			</form>
			<ul>
				<li>
					<label> <?php
					include ("check_user.php");
					include ("connect_db_zeit.inc.php");

					// Definition der Benutzer
					$querry_user_id = mysql_query("SELECT Nutzer_ID, Vertragsstunden, Stunden_Uebertrag FROM Nutzer WHERE Nickname = '$username'");
					$user_idq = mysql_fetch_row($querry_user_id);
					$user_id = $user_idq[0];
					$vertragsstunden = $user_idq[1];
					$stunden_uebertrag = $user_idq[2];

					$abfrage_id = mysql_query("SELECT COUNT(DISTINCT DATE_FORMAT(Datum, '%u')), sum(Netto_Dec) FROM Stunden WHERE Nutzer_ID = '$user_id'");
					$abfrage = mysql_fetch_row($abfrage_id);
					$ist_summe = $abfrage[1];
					$soll_summe = ($abfrage[0]) * $vertragsstunden;

					$zeitkonto = $ist_summe - $soll_summe + $stunden_uebertrag;

					echo "Zeitkonto: <span class='right'><b>$zeitkonto h</b></span>";

					mysql_close();
						?></label><span class="right"> </span>
				</li>
			</ul>
			<ul>
				<li class="arrow">
					<form action="stunden.php" method="post">
						<label>eingegebene Stunden</label><span class="right">
							<input type="submit" value="" name="stunden" class="submit" />
						</span>
					</form>
				</li>
				<li class="arrow">
					<form action="monat.php" method="post">
						<label>Monats&uuml;bersicht</label><span class="right">
							<input type="submit" value="" name="stunden" class="submit" />
						</span>
					</form>
				</li>
			</ul>
			</ul>
		</div>
	</body>
</html>