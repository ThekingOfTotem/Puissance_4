<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title>Choix Joueurs</title>
    <!--lien avec le css-->
    <link href="CSS/indexStyle.css" rel="stylesheet" />
    <link rel="shortcut icon" type="image/png" href="favicon.png">
</head>

<body>
<IMG class="displayed" src="logo.png">

<p id="titreJ">Choisissez vos noms de joueurs</p>

<form method="get" action="partieLocal.php">
    <!--On demande le nom des joueurs-->
    <div id="name1">
	    <input type="text" id="joueur1" name="joueur1" placeholder="Nom du joueur" required>
    </div>
		
	<input id="val" type="submit" value="Valider">
</form>
<button id="retourJ" onclick="window.location.href='index.html'">Retour Menu</button>


</body>

</html>