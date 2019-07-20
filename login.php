<?php
session_start();
?>

<?php
include ("connect_db_zeit.inc.php");

$username = $_POST["username"];
$passwort = md5($_POST["password"]);

$abfrage = "SELECT Nickname, Passwort FROM Nutzer WHERE Nickname LIKE '$username' LIMIT 1";
$ergebnis = mysql_query($abfrage);
$row = mysql_fetch_object($ergebnis);

if ($row -> Passwort == $passwort) {
	$_SESSION["username"] = $username;
	header("Location: overview.php");
} else {

}
mysql_close();
?>
<html>
	<head>
		<title>Anmeldung</title>
		<meta name="viewport" content="user-scalable=no, width=device-width"/>
		<meta name="apple-mobile-web-app-capable" content="yes" />
		<link rel="stylesheet" type="text/css" href="css/iphone.css" media="screen"/>
	</head>
	<body>
		<div>
			<h1>Login fehlgeschlagen</h1>
			<h2>Login / Passwort nicht erkannt</h2>
			<form action='index.html' method='post'>
				<ul>
					<li class='arrow'>
						<label>zum Login</label><span class='right'>
							<input type='submit' value='eintragen' name='new_user' class='submit' />
						</span>
					</li>
				</ul>
			</form>
		</div>
	</body>
</html>