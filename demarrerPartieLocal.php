<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title>Choix Joueurs</title>
    <!--lien avec le css-->
    <link href="CSS/indexStyle.css" rel="stylesheet" />
</head>

<body>
<button id="retour" onclick="window.location.href='index.html'">Retour Menu</button>

<form method="get" action="partieLocal.php">
    <!--On demande le nom des joueurs-->
    <div id="names">
	    <label for="joueur1">Nom du joueur 1 : </label><pre>
	    <input type="text" id="joueur1" name="joueur1"><pre>

	    <label for="joueur2">Nom du joueur 2 : </label><pre>
	    <input type="text" id="joueur2" name="joueur2"><pre>
    </div>
		
	<input type="submit" value="Valider">
</form>


</body>

</html>