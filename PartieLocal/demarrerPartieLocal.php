<!DOCTYPE html>

<?php
 session_start();
 session_destroy();
?>

<head>
    <meta charset="UTF-8">
    <title>Choix Joueurs</title>
    <!--lien avec le css-->
    <link href="/Puissance_4/CSS/indexStyle.css" rel="stylesheet" />
    <link rel="shortcut icon" type="image/png" href="/Puissance_4/Image/favicon.png">
</head>

<body>
<IMG class="displayed" src="/Puissance_4/Image/logo.png">

<p id="titreJ">Choisissez vos noms de joueurs</p>

<form method="get" action="/Puissance_4/PartieLocal/jouerPartieLocal.php">
    <!--On demande le nom des joueurs-->
    <div id="name1">
	    <input type="text" id="joueur1" name="joueur1" placeholder="Nom du joueur 1" required>
    </div>

    <div id="name2">
	    <input type="text" id="joueur2" name="joueur2" placeholder="Nom du joueur 2" required>
    </div>
		
	<input id="val" type="submit" value="Valider">
</form>
<button id="retourJ" onclick="window.location.href='/Puissance_4/index.html'">Retour Menu</button>


</body>

</html>