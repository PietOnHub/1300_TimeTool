<?php
include ("check_user.php");
include ("connect_db_zeit.inc.php");
?>
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
			<h1>Neue Stunden</h1>
			<?php

			$submit = $_POST["eintragen"];	
			$datum = $_POST["datum"];
			$kommt = $_POST["kommt"];
			$geht = $_POST["geht"];
			$pause = $_POST["pause"];

			
			
			
			if ($submit == 'urlaub'){
				 if($datum == "")
					 {
					 echo "<h2>Bitte Datum ausf&uuml;llen</h2>";
					 echo "<form action='new_stunden.php' method='post'>";
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
			 
			 $querry_user_id = mysql_query("SELECT Nutzer_ID, Vertragsstunden FROM Nutzer WHERE Nickname = '$username'");
			 $querry = mysql_fetch_row($querry_user_id);
			 $user_id = $querry[0];
			 $tagesstunden = $querry[1]/5;
			 $result = mysql_query("SELECT Stunden_ID FROM Stunden WHERE Datum = '$datum' AND Nutzer_ID = '$user_id'");
			 $menge = mysql_num_rows($result);

			 if($menge == 0)
				 {
	
				 $eintrag = "INSERT INTO Stunden (Nutzer_ID, Datum, Kommt, Geht, Pause, Netto, Netto_Dec, Status)
				 VALUES ('$user_id', '$datum','00:00:00', '00:00:00','00:00:00', '00:00:00' , '$tagesstunden', 'Urlaub')";
				 $eintragen = mysql_query($eintrag);
	
	
				 if($eintragen == true)
				 	{
				 	header("Location: stunden.php");
				 	}
				 else
				 {
				 echo "<h2>Fehler beim Speichern der Stunden1</h2>";
				 echo "<form action='new_stunden.php' method='post'>";
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
				 }
			 else
				 {
				 echo "<h2>Es ist schon ein Eintrag f&uuml;r dieses Datum vorhanden</h2>";
				 echo "<form action='new_stunden.php' method='post'>";
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
								
			}

			if ($submit == 'feiertag'){
				 if($datum == "")
					 {
					 echo "<h2>Bitte Datum ausf&uuml;llen</h2>";
					 echo "<form action='new_stunden.php' method='post'>";
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
			 
			 $querry_user_id = mysql_query("SELECT Nutzer_ID, Vertragsstunden FROM Nutzer WHERE Nickname = '$username'");
			 $querry = mysql_fetch_row($querry_user_id);
			 $user_id = $querry[0];
			 $tagesstunden = $querry[1]/5;
			 $result = mysql_query("SELECT Stunden_ID FROM Stunden WHERE Datum = '$datum' AND Nutzer_ID = '$user_id'");
			 $menge = mysql_num_rows($result);

			 if($menge == 0)
				 {
	
				 $eintrag = "INSERT INTO Stunden (Nutzer_ID, Datum, Kommt, Geht, Pause, Netto, Netto_Dec, Status)
				 VALUES ('$user_id', '$datum','00:00:00', '00:00:00','00:00:00', '00:00:00' , '$tagesstunden', 'Feiertag')";
				 $eintragen = mysql_query($eintrag);
	
	
				 if($eintragen == true)
				 	{
				 	header("Location: stunden.php");
				 	}
				 else
				 {
				 echo "<h2>Fehler beim Speichern der Stunden1</h2>";
				 echo "<form action='new_stunden.php' method='post'>";
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
				 }
			 else
				 {
				 echo "<h2>Es ist schon ein Eintrag f&uuml;r dieses Datum vorhanden</h2>";
				 echo "<form action='new_stunden.php' method='post'>";
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
								
			}

			 if($datum == "" OR $kommt == "" OR $geht == "" OR $pause == "")
			 {
			 echo "<h2>Bitte alle Felder korrekt ausf&uuml;llen</h2>";
			 echo "<form action='new_stunden.php' method='post'>";
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
			 
			$kommt_explode = explode(":", $kommt);
			$modulo_kommt = $kommt_explode[1] % 15;
			$kommt_explode[1] = $kommt_explode[1] - ($modulo_kommt);
			$kommt_ist = $kommt_explode[1] = $kommt_explode[1] / 60 + $kommt_explode[0];
			if ($modulo_kommt > 0)
				$kommt_ist = $kommt_ist + 0.25;

			$geht_explode = explode(":", $geht);
			$geht_explode[1] = $geht_explode[1] - ($geht_explode[1] % 15);
			$geht_ist = $geht_explode[1] = $geht_explode[1] / 60 + $geht_explode[0];
			
			$netto_dec = $geht_ist - $kommt_ist - $pause;

			$netto_dec2 = $netto_dec*100;
			$netto_h = $netto_dec2 - ($netto_dec2%100);
			$netto_h = $netto_h / 100;
			$netto_m = $netto_dec2 % 100; 
			$netto_m = $netto_m /100 * 60;
			$netto = "$netto_h:$netto_m";
			
			$pause = $pause*60;
			$pause = "00:$pause:00";
			 
			 
			 $querry_user_id = mysql_query("SELECT Nutzer_ID FROM Nutzer WHERE Nickname = '$username'");
			 $user_id = mysql_fetch_row($querry_user_id);
			 $user_id = $user_id[0];
			 $result = mysql_query("SELECT Stunden_ID FROM Stunden WHERE Datum = '$datum' AND Nutzer_ID = '$user_id'");
			 $menge = mysql_num_rows($result);

			 if($menge == 0)
			 {

			 $eintrag = "INSERT INTO Stunden (Nutzer_ID, Datum, Kommt, Geht, Pause, Netto, Netto_Dec, Status)
			 VALUES ('$user_id', '$datum','$kommt', '$geht','$pause', '$netto' , '$netto_dec', '0')";
			 $eintragen = mysql_query($eintrag);


			 if($eintragen == true)
			 {
			 header("Location: stunden.php");
			 }
			 else
			 {
			 echo "<h2>Fehler beim Speichern der Stunden</h2>";
			 echo "<form action='new_stunden.php' method='post'>";
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
			 echo "<h2>Es ist schon ein Eintrag f&uuml;r dieses Datum vorhanden</h2>";
			 echo "<form action='new_stunden.php' method='post'>";
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