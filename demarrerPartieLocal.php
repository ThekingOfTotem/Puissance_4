<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title>Puissance 4</title>
    <!--lien avec le css-->
    <link href="/css/style.css" />
</head>

<body>

<form method="get" action="jeuLocal.php">
    <!--On demande le nom des joueurs-->
	<label for="Joueur1">Nom du joueur 1 : </label>
	<input type="text" id="joueur1" name="joueur1"><br>
		
	<label for="Joueur2">Nom du joueur 2 : </label>
	<input type="text" id="joueur2" name="joueur2"><br>
		
	<input type="submit" value="Valider">
</form>
<?php
$grille = array(
    array(0, 0, 0, 0, 0, 0, 0), // ligne 1
    array(0, 0, 0, 0, 0, 0, 0), // ligne 2
    array(0, 0, 0, 0, 0, 0, 0), // ligne 3
    array(0, 0, 0, 0, 0, 0, 0), // ligne 4
    array(0, 0, 0, 0, 0, 0, 0), // ligne 5
    array(0, 0, 0, 0, 0, 0, 0) // ligne 6
);
$_SESSION["grille"] = $grille;
$_SESSION["Joueur1"] = $joueur1;
$_SESSION["Joueur2"] = $joueur2;
?>
</body>

</html>