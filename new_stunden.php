<?php
include ("check_user.php");
include ("connect_db_zeit.inc.php");
?>

<!DOCTYPE html>
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
			<h2>Stundensatz anlegen</h2>
			<form action="create_new_stunden.php" method="post">
				<ul>
					<li>
						<label>Datum</label><span class="right">
							<input type="date" name="datum"   class="input-date" />
						</span>
					</li>
					<li>
						<label>Kommt</label><span class="right">
							<input type="time" min="06:00" max="19:00" step="900" name="kommt"   class="input-date" />
						</span>
					</li>
					<li>
						<label>Geht</label><span class="right">
							<input type="time" min="06:00" max="19:00" step="900" name="geht"   class="input-date" />
						</span>
					</li>
					<li>
						<label>Pause</label><span class="right">
							<select name="pause" class="input-option">
								<option value='0.0'>0 min</p></option>
								<option value='0.25'>15 min</option>
								<option value='0.5'>30 min</option>
								<option selected value='0.75'>45 min</option>
							</select> </span>
					</li>
					<li class="arrow">
						<label>Eintragen</label><span class="right">
							<input type="submit" value="eintragen" name="eintragen" class="submit" />
						</span>
					</li>
				</ul>
				<ul>
					
					<li class="arrow">
						<label>Urlaub</label><span class="right">
							<input type="submit" value="urlaub" name="eintragen" class="submit" />
						</span>
					</li>
					<li class="arrow">
						<label>Feiertag</label><span class="right">
							<input type="submit" value="feiertag" name="eintragen" class="submit" />
						</span>
					
					</li>
				</ul>
			</form>
		</div>
	</body>
</html>