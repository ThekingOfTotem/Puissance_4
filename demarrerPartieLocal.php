<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title>Choix Joueurs</title>
    <!--lien avec le css-->
    <link href="CSS/indexStyle.css" rel="stylesheet" />
</head>

<body>
<button class="Retour" onclick="window.location.href='index.html'">Retour Menu</button>

<form method="get" action="partieLocal.php">
    <!--On demande le nom des joueurs-->
	<label for="joueur1">Nom du joueur 1 : </label>
	<input type="text" id="joueur1" name="joueur1"><br>
		
	<label for="joueur2">Nom du joueur 2 : </label>
	<input type="text" id="joueur2" name="joueur2"><br>
		
	<input type="submit" value="Valider">
</form>


</body>

</html>