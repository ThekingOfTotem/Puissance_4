<?php
session_start();
$grille = $_POST["grille"];
$_SESSION["nomJoueur"] = $_GET["nom"];
$_SESSION["col"] = $_GET["colonne"];

//Verifier l'autorisation du coup 
echo count($grille);
function coupPossible($grille, $col){
    for ($i = 0; $i < count($grille); $i++) {
        
    }


}