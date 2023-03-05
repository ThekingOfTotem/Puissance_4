<?php
session_start();
$grille = $_POST["grille"];
$_SESSION["nomJoueur1"] = $_GET["nom1"];
$_SESSION["tour"]="Joueur1";
$_SESSION["col"] = $_GET["colonne"];
$col = $_SESSION["col"];

//Verifier l'autorisation du coup 
//On vérifie si la colonne n'est pas vide
function coupPossible($grille, $col){
    return $grille[5][$col] == 0;
}

//On joue le coup 
function jouerCoup($grille,$col){
    //Si le coup est possible
    if(coupPossible($grille,$col)){
        for($i = 0; $i<5;$i++){
            if($grille[$i][$col] == 0){
                $position = $i;
                if($_SESSION["tour"]=="Joueur1"){
                    $grille[$i][$col]=1;
                    $_SESSION["tour"]=="Joueur2";
                    exit;
                }else{
                    $grille[$i][$col]=2;
                    $_SESSION["tour"]=="Joueur1";
                    exit;
                }
            }
            
        }
    }else{
        echo "Choisissez une autre colonne";
    }
    
}

function victoire($grille){

    
$_SESSION["grille"] = $grille;
}


//
?>