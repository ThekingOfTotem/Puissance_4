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
    <div id="name1">
	    <input type="text" id="joueur1" name="joueur1" placeholder="Nom du joueur 1">
    </div>

    <div id="name2">
	    <input type="text" id="joueur2" name="joueur2" placeholder="Nom du joueur 2">
    </div>
		
	<input id="val" type="submit" value="Valider">
</form>
<button id="retour" onclick="window.location.href='index.html'">Retour Menu</button>


</body>

</html>