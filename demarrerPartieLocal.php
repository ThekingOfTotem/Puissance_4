<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title>Choix Joueurs</title>
    <!--lien avec le css-->
    <link href="CSS/indexStyle.css" rel="stylesheet" />
</head>

<body>
<IMG class="displayed" src="logo.png">

<form method="get" action="partieLocal.php">
    <!--On demande le nom des joueurs-->
    <div id="names">
	    <label for="joueur1">Nom du joueur 1 : </label>
	    <input type="text" id="joueur1" name="joueur1"><br>
		
	    <label for="joueur2">Nom du joueur 2 : </label>
	    <input type="text" id="joueur2" name="joueur2"><br>
    </div>
		
	<input id="val" type="submit" value="Valider">
</form>
<button id="retour" onclick="window.location.href='index.html'">Retour Menu</button>


</body>

</html>