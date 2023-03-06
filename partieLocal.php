<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title>Puissance 4</title>
    <!--lien avec le css-->
    <link href="/css/style.css" />
</head>

<body>

    <div id="grille">
		<div class="piece"></div><div class="piece"></div><div class="piece"></div><div class="piece"></div><div class="piece"></div><div class="piece"></div><div class="piece"></div>
		<div class="piece"></div><div class="piece"></div><div class="piece"></div><div class="piece"></div><div class="piece"></div><div class="piece"></div><div class="piece"></div>
		<div class="piece"></div><div class="piece"></div><div class="piece"></div><div class="piece"></div><div class="piece"></div><div class="piece"></div><div class="piece"></div>
		<div class="piece"></div><div class="piece"></div><div class="piece"></div><div class="piece"></div><div class="piece"></div><div class="piece"></div><div class="piece"></div>
		<div class="piece"></div><div class="piece"></div><div class="piece"></div><div class="piece"></div><div class="piece"></div><div class="piece"></div><div class="piece"></div>
		<div class="piece"></div><div class="piece"></div><div class="piece"></div><div class="piece"></div><div class="piece"></div><div class="piece"></div><div class="piece"></div>
	</div>
 
</body>

</html>



<?php
session_start();
$_SESSION["nomJoueur1"] = $_GET["joueur1"];
$_SESSION["nomJoueur2"] = $_GET["joueur2"];
$_SESSION["tour"]="Joueur1";

$grille = array_fill(0, 6, array_fill(0, 7, 0));

$_SESSION["grille"]=$grille;


?>