<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title>Puissance 4</title>
    <!--lien avec le css-->
    <link href="/css/style.css" />
</head>

<body>

<form method="get" action="jouerCoup.php">
    <!--On demande le nom des joueurs-->
	<label for="joueur1">Nom du joueur 1 : </label>
	<input type="text" id="joueur1" name="joueur1"><br>
		
	<label for="joueur2">Nom du joueur 2 : </label>
	<input type="text" id="joueur2" name="joueur2"><br>
		
	<input type="submit" value="Valider">
</form>
<?php
//on initialise notre grille vide
$grille = array(
    array(0, 0, 0, 0, 0, 0, 0), // ligne 1
    array(0, 0, 0, 0, 0, 0, 0), // ligne 2
    array(0, 0, 0, 0, 0, 0, 0), // ligne 3
    array(0, 0, 0, 0, 0, 0, 0), // ligne 4
    array(0, 0, 0, 0, 0, 0, 0), // ligne 5
    array(0, 0, 0, 0, 0, 0, 0) // ligne 6
);

//on attribue la grille et joueurs a la nouvelle partie 
$_SESSION["grille"] = $grille;
$_SESSION["joueur1"] = $joueur1;
$_SESSION["joueur2"] = $joueur2;
?>
</body>

</html>