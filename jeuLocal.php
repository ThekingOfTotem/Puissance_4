<?php

session_start();
$_SESSION["Joueur1"] = $_GET["joueur1"];
$_SESSION["Joueur2"] = $_GET["joueur2"];

$grille = array(
    array(0, 0, 0, 0, 0, 0, 0), // ligne 1
    array(0, 0, 0, 0, 0, 0, 0), // ligne 2
    array(0, 0, 0, 0, 0, 0, 0), // ligne 3
    array(0, 0, 0, 0, 0, 0, 0), // ligne 4
    array(0, 0, 0, 0, 0, 0, 0), // ligne 5
    array(0, 0, 0, 0, 0, 0, 0) // ligne 6
);

function coupAutorise($grille){


}

//echo json_encode($grid);
function afficherGrille($grille) {
    for ($i = 0; $i < count($grille); $i++) {
        for ($j = 0; $j < count($grille[$i]); $j++) {
            echo "| " . $grille[$i][$j] . " ";
        }
        echo "|<br>";
    }
    //echo "- --------------<br>";
}


$_SESSION["Joueur1"] = $nameplayer1;
$_SESSION["Joueur2"] = $nameplayer2;
$_SESSION["grille"] = $grille;
afficherGrille($grille);