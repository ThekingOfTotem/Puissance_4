

<form method="get" action="resultats.php">
	<label for="joueur1">Nom du joueur 1:</label>
	<input type="text" id="joueur1" name="joueur1"><br>
		
	<label for="joueur2">Nom du joueur 2:</label>
	<input type="text" id="joueur2" name="joueur2"><br>
		
	<input type="submit" value="Valider">
</form>

<?php

session_start();
$_SESSION["Joueur1"] = $_GET["name1"];
$_SESSION["Joueur2"] = $_GET["name2"];

$grille = array(
    array(0, 0, 0, 0, 0, 0, 0), // ligne 1
    array(0, 0, 0, 0, 0, 0, 0), // ligne 2
    array(0, 0, 0, 0, 0, 0, 0), // ligne 3
    array(0, 0, 0, 0, 0, 0, 0), // ligne 4
    array(0, 0, 0, 0, 0, 0, 0), // ligne 5
    array(0, 0, 0, 0, 0, 0, 0) // ligne 6
);

$_SESSION["grille"]=$grille;