<?php
session_start();

$col = $_SESSION["col"];
$tour = $_SESSION["tour"];
//$position;


//Verifier l'autorisation du coup 
//On vérifie si la colonne n'est pas vide
function coupPossible($grille, $col)
{
    return $grille[0][$col] == 0;
}

//On vérifie si la grille est remplie 
function grilleRemplie($grille)
{
    $cmp = 0;
    for ($i = 0; $i < 7; $i++) {
        if ($grille[0][$i] != 0) {
            //On compte le nombre de colonne remplie
            $cmp++;
        }
    }
    if ($cmp == 7) {
        return true; // la grille est remplie
    } else {
        return false; //la grille n'est pas remplie
    }
}

//On joue le coup

function jouerCoup($grille, $col)
{
  global  $position;
    //Si le coup est possible
    if (coupPossible($grille, $col)) {
        for ($i = 5; $i >= 0; $i--) {
            if ($grille[$i][$col] == 0) {
                $position = $i;
                if ($_SESSION["tour"] == "Joueur1") {
                    $grille[$i][$col] = 1;
                    $_SESSION["tour"] = "Joueur2";
                    exit;
                } else {
                    $grille[$i][$col] = 2;
                    $_SESSION["tour"] = "Joueur1";
                    exit;
                }
            }
        }
    } else {
        echo "Choisissez une autre colonne";
    }
}

function verifDroit($grille, $position, $col, $tour)
{
    $cpt = 0;
    if ($col + 3 <= 6) {
        for ($i = 0; $i < 4; $i++) {
            if ($tour == "Joueur1") {
                if ($grille[$position][$col + $i] == 1) {
                    $cpt++;
                } else {
                    return false;
                }
                
            } else {
                if ($grille[$position][$col + $i] == 2) {
                    $cpt++;
                } else {
                    return false;
                }
                
            }
        }
    }
    if ($cpt == 4) {
        return true;
    }else {
        return false;
    }
}

function verifGauche($grille, $position, $col, $tour)
{
    $cpt = 0;
    if ($col - 3 >= 0) {
        for ($i = 0; $i < 4; $i++) {
            if ($tour == "Joueur1") { //si le joueur 1 joue
                if ($grille[$position][$col - $i] == 1) {
                    $cpt++;
                } else {
                    return false;
                }
            }
            if ($tour == "Joueur2") { //si le joueur 2 joue
                if ($grille[$position][$col - $i] == 2) {
                    $cpt++;
                } else {
                    return false;
                }
            }
        }
    }
    if ($cpt == 4) {
        return true;
    } else {
        return false;
    }
}

function verifHaut($grille, $position, $col, $tour)
{
    $cpt = 0;
    if ($position + 3 <= 5) {
        for ($i = 0; $i < 4; $i++) {
            if ($tour == "Joueur1") { //si le joueur 1 joue
                if ($grille[$position + $i][$col] == 1) {
                    $cpt++;
                } else {
                    return false;
                }
            }
            if ($tour == "Joueur2") { //si le joueur 2 joue
                if ($grille[$position + $i][$col] == 2) {
                    $cpt++;
                } else {
                    return false;
                }
            }
        }
    }
    if ($cpt == 4) {
        return true;
    } else {
        return false;
    }
}

function verifBas($grille, $position, $col, $tour)
{
    $cpt = 0;
    if ($position - 3 >= 0) {
        for ($i = 0; $i < 4; $i++) {
            if ($tour == "Joueur1") {
                if ($grille[$position - $i][$col] == 1) {
                    $cpt++;
                } else {
                    return false;
                }
            } else {
                if ($grille[$position - $i][$col] == 2) {
                    $cpt++;
                } else {
                    return false;
                }
            }
            
        }
    }
    if ($cpt == 4) {
        return true;
    } else {
        return false;
    }
}

function verifHautDroit($grille, $position, $col, $tour)
{
    $cpt = 0;
    if ($position - 3 >=0 && $col + 3 <= 6) {
        for ($i = 0; $i < 4; $i++) {
            if ($tour == "Joueur1") {
                if ($grille[$position - $i][$col + $i] == 1) {
                    $cpt++;
                } else {
                    return false;
                }
            } else {
                if ($grille[$position - $i][$col + $i] == 2) {
                    $cpt++;
                } else {
                    return false;
                }
            }
            
        }
    }
    if ($cpt == 4) {
        return true;
    } else {
        return false;
    }
    
}

function verifHautGauche($grille, $position, $col, $tour)
{
    $cpt = 0;
    if ($position - 3 >=0 && $col - 3 >= 0) {
        for ($i = 0; $i < 4; $i++) {
            if ($tour == "Joueur1") {
                if ($grille[$position - $i][$col - $i] == 1) {
                    $cpt++;
                } else {
                    return false;
                }
                
            } else {
                if ($grille[$position - $i][$col - $i] == 2) {
                    $cpt++;
                } else {
                    return false;
                }
            
            }
        }
    }
    if ($cpt == 4) {
        return true;
    } else {
        return false;
    }
}

function verifBasDroit($grille, $position, $col, $tour)
{
    $cpt = 0;
    if ($position + 3 <=5 && $col + 3 <=6) {
        for ($i = 0; $i < 4; $i++) {
            if ($tour == "Joueur1") {
                if ($grille[$position + $i][$col + $i] == 1) {
                    $cpt++;
                } else {
                    exit;
                }
              
            } else {
                if ($grille[$position + $i][$col + $i] == 2) {
                    $cpt++;
                } else {
                    exit;
                }
               
            }
        }
    }
    if ($cpt == 4) {
        return true;
    } else {
        return false;
    }
}

function verifBasGauche($grille, $position, $col, $tour)
{
    $cpt = 0;
    if ($position + 3 <= 5 && $col - 3 >= 0) {
        for ($i = 0; $i < 3; $i++) {
            if ($tour == "Joueur1") {
                if ($grille[$position + $i][$col - $i] == 1) {
                    $cpt++;
                } else {
                    exit;
                }
              
            } else {
                if ($grille[$position + $i][$col - $i] == 2) {
                    $cpt++;
                } else {
                    exit;
                }
              
            }
        }
    }
    if ($cpt == 4) {
        return true;
    } else {
        return false;
    }
}

//si une des verifs est ok, on valide la victoire et pousse la grille 
function victoire($grille, $position, $col, $tour)
{
    if (verifBas($grille, $position, $col, $tour) || verifHaut($grille, $position, $col, $tour) || verifGauche($grille, $position, $col, $tour) || verifDroit($grille, $position, $col, $tour)) {
        if (verifBasDroit($grille, $position, $col, $tour) || verifBasGauche($grille, $position, $col, $tour) || verifHautDroit($grille, $position, $col, $tour) || verifHautGauche($grille, $position, $col, $tour)) {
            return true;
        } else {
            return false;
        }
    }
    $_SESSION["grille"] = $grille;
}
//

function changementTour($grille,$tour,$col,$position){
    
    if($tour == "Joueur1" && victoire($_SESSION["grille"] ,$position,$col,$tour)== false){
        $tour =="Joueur2";
        return $tour;
    }
    if($tour == "Joueur2"){
        $tour =="Joueur1";
        return $tour;
    }
}
