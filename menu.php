<?php

// Définition de la grille du Puissance 4
$grid = array(
    array(0, 0, 0, 0, 0, 0, 0), // ligne 1
    array(0, 0, 0, 0, 0, 0, 0), // ligne 2
    array(0, 0, 0, 0, 0, 0, 0), // ligne 3
    array(0, 0, 0, 0, 0, 0, 0), // ligne 4
    array(0, 0, 0, 0, 0, 0, 0), // ligne 5
    array(0, 0, 0, 0, 0, 0, 0) // ligne 6
);

// Fonction pour afficher la grille
function displayGrid($grid) {
    for ($i = 0; $i < count($grid); $i++) {
        for ($j = 0; $j < count($grid[$i]); $j++) {
            echo "| " . $grid[$i][$j] . " ";
        }
        echo "|\n";
    }
    echo "---------------\n";
}

// Fonction pour insérer un jeton dans la grille
function dropToken($grid, $column, $player) {
    for ($i = count($grid) - 1; $i >= 0; $i--) {
        if ($grid[$i][$column] == 0) {
            $grid[$i][$column] = $player;
            return $grid;
        }
    }
    return null;
}

// Fonction pour vérifier s'il y a un gagnant
function checkWinner($grid, $player) {
    // Vérification des lignes
    for ($i = 0; $i < count($grid); $i++) {
        for ($j = 0; $j < count($grid[$i]) - 3; $j++) {
            if ($grid[$i][$j] == $player && $grid[$i][$j+1] == $player && $grid[$i][$j+2] == $player && $grid[$i][$j+3] == $player) {
                return true;
            }
        }
    }
    // Vérification des colonnes
    for ($i = 0; $i < count($grid) - 3; $i++) {
        for ($j = 0; $j < count($grid[$i]); $j++) {
            if ($grid[$i][$j] == $player && $grid[$i+1][$j] == $player && $grid[$i+2][$j] == $player && $grid[$i+3][$j] == $player) {
                return true;
            }
        }
    }
    // Vérification des diagonales vers le haut
    for ($i = 3; $i < count($grid); $i++) {
        for ($j = 0; $j < count($grid[$i]) - 3; $j++) {
            if ($grid[$i][$j] == $player && $grid[$i-1][$j+1] == $player && $grid[$i-2][$j+2] == $player && $grid[$i-3][$j+3] == $player) {
                return
            }
        }
    }
}