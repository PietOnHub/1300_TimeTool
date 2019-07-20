<!DOCTYPE HTML>
<html>
	<head>
		<title>Neuer Nutzer</title>
		<meta name="viewport" content="user-scalable=no, width=device-width"/>
		<meta name="apple-mobile-web-app-capable" content="yes" />
		<link rel="stylesheet" type="text/css" href="css/iphone.css" media="screen"/>
	</head>
	<body>
		<div>
			<h1>Neuer Nutzer</h1>
		
			<form action="index.html" method="post" >
				<input type="submit" value="zur&uuml;ck" name="einloggen" class="button2-50" />
			</form>
			<form action="create_new_user.php" method="post">
				<ul>
					<li>
						<label>Vorname</label><span class="right">
							<input type="text" name="vorname"  class="input"  />
						</span>
					</li>
					<li>
						<label>E-Mail</label><span class="right">
							<input type="email" name="mail"  class="input"  />
						</span>
					</li>
					<li>
						<label>Vertragsstunden</label><span class="right">
							<input type="number" name="vertragsstunden" class="input" />
						</span>
					</li>
					<li>
						<label>Urlaubstage p.a. </label><span class="right">
							<input type="number" name="urlaubstage" class="input" />
						</span>
					</li>
					<li>
						<label>Resturlaub</label><span class="right">
							<input type="number" name="urlaub_uebertrag" class="input" />
						</span>
					</li>
					<li>
						<label>Zeitkonto &Uuml;bertrag </label><span class="right">
							<input type="text" name="stunden_uebertrag" class="input" placeholder="z.B. 12.5"/>
						</span>
					</li>
					<li>
						<label>Loginname</label><span class="right">
							<input type="text" name="nickname"  class="input" />
						</span>
					</li>
					<li>
						<label>Passwort</label><span class="right">
							<input type="password" name="passwort"  class="input" />
						</span>
					</li>
					<li class="arrow">
						<label>Eintragen</label><span class="right">
							<input type="submit" value="eintragen" name="new_user" class="submit" />
						</span>
					</li>
				</ul>
			</form>
		</div>
	</body>
</html>