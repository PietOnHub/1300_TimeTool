<!DOCTYPE HTML>
<html>
	<head>
		<title>Neuer Benutzer</title>
		<meta name="viewport" content="user-scalable=no, width=device-width"/>
		<meta name="apple-mobile-web-app-capable" content="yes" />
		<link rel="stylesheet" type="text/css" href="css/iphone.css" media="screen"/>
	</head>
	<body>
		<div>
			<h1>Neuer Nutzer</h1>
			<?php
			include ("connect_db_zeit.inc.php");
			// Definition der Benutzer

			$vorname = $_POST["vorname"];
			$mail = $_POST["mail"];
			$vertragsstunden = $_POST["vertragsstunden"];
			$urlaubstage = $_POST["urlaubstage"];
			$stunden_uebertrag = $_POST["stunden_uebertrag"];
			$urlaub_uebertrag = $_POST["urlaub_uebertrag"];
			$nickname = $_POST["nickname"];
			$passwort = $_POST["passwort"];
			// Daten eintragen

			if($vorname == "" OR $mail == "" OR $vertragsstunden == "" OR $nickname == "" OR $passwort == "" OR $urlaubstage == "" OR $stunden_uebertrag == "" OR $urlaub_uebertrag == "")
    {
    echo "<h2>Bitte alle Felder korrekt ausf&uuml;llen</h2>";
	echo "<form action='new_user.php' method='post'>";
	echo "<ul>";
	echo "	<li class='arrow'>";
	echo "			<label>neuer Versuch</label><span class='right'>";
	echo "				<input type='submit' value='eintragen' name='new_user' class='submit' />";
	echo "			</span>";
	echo "		</li>";
	echo "</ul>";
	echo "</form>";	
    exit;
    }
	$passwort = md5($passwort);
	$result = mysql_query("SELECT Nutzer_ID FROM Nutzer WHERE Nickname = '$nickname'");
	$menge = mysql_num_rows($result);
	
	if($menge == 0)
    	{
	    $eintrag = "INSERT INTO Nutzer (Vorname, Mail, Vertragsstunden, Urlaubstage, Stunden_Uebertrag, Urlaub_Uebertrag, Nickname, Passwort) 
	    VALUES ('$vorname', '$mail', '$vertragsstunden', '$urlaubstage', '$stunden_uebertrag', '$urlaub_uebertrag', '$nickname', '$passwort')";
	    $eintragen = mysql_query($eintrag);
	
	    if($eintragen == true)
	        {
	        echo "<h2>Wilkommen $vorname</h2>";
	        echo "<form action='index.html' method='post'>";
	        echo "<ul>";
	        echo "	<li class='arrow'>";
			echo "			<label>zum Login</label><span class='right'>";
			echo "				<input type='submit' value='eintragen' name='new_user' class='submit' />";
			echo "			</span>";
			echo "		</li>";
			echo "</ul>";
			echo "</form>";
	        }
	    	else
	        {
	        echo "<h2>Fehler beim Speichern des Benutzernames</h2>";
	        echo "<form action='new_user.php' method='post'>";
	        echo "<ul>";
	        echo "	<li class='arrow'>";
			echo "			<label>neuer Versuch</label><span class='right'>";
			echo "				<input type='submit' value='eintragen' name='new_user' class='submit' />";
			echo "			</span>";
			echo "		</li>";
			echo "</ul>";
			echo "</form>";
	        }
		}
		else
		    {
		    echo "<h2>Benutzername schon vorhanden</h2>";
	        echo "<form action='new_user.php' method='post'>";
	        echo "<ul>";
	        echo "	<li class='arrow'>";
			echo "			<label>neuer Versuch</label><span class='right'>";
			echo "				<input type='submit' value='eintragen' name='new_user' class='submit' />";
			echo "			</span>";
			echo "		</li>";
			echo "</ul>";
			echo "</form>";
		    }
			mysql_close();
			?>
		</div>
	</body>
</html>