<?php
session_start();
$grille = $_SESSION["grille"];
$tour = $_SESSION["tour"];

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $col = $_GET["col"];
    
}else{
    $action = $_POST["action"];
    call_user_func($action);
}

$position;
//Verifier l'autorisation du coup 
//On vérifie si la colonne n'est pas vide

function coupPossible($grille, $col)
{
    return $grille[0][$col] == 0;
}

//On vérifie si la grille est remplie 
function grilleRemplie()
{
    global $grille;
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

function jouerCoup()
{
  global $position;
  global $grille;
  $col=$_POST["col"];
  $victoire=false;
    //Si le coup est possible
    if (coupPossible($grille, $col)) {
        for ($i = 5; $i >= 0; $i--) {
            if ($grille[$i][$col] == 0) {
                $position = $i;
                if ($_SESSION["tour"] == "Joueur1") {
                    $grille[$i][$col] = 1;
                    $_SESSION["grille"] = $grille;
                    if(victoire($grille, 1)){
                        $victoire=true;
                        //echo json_encode(true);
                        //exit;
                    }//else{
                        $_SESSION["tour"] = "Joueur2";
                        $data = array('couleur'=>'red' ,'nomJoueur' => $_SESSION["nomJoueur2"], 'grille' => $grille, 'position' => $position, 'victoire' => $victoire);
                        echo json_encode($data);
                        exit;
                    //}
                } if ($_SESSION["tour"] == "Joueur2"){
                    $grille[$i][$col] = 2;
                    $_SESSION["grille"] = $grille;
                    if(victoire($grille, 2)){
                        $victoire=true;
                        //echo json_encode(true);
                        //exit;
                    }//else{
                        $_SESSION["tour"] = "Joueur1";
                        $data = array('couleur'=>'yellow' ,'nomJoueur' => $_SESSION["nomJoueur1"], 'grille' => $grille, 'position' => $position, 'victoire' => $victoire);
                        echo json_encode($data);
                        exit;
                    //}
                }
            }
        }
        
    } else {
        echo json_encode("autre colonne");
    }
}


function victoire($grid, $player) {
    $rows = count($grid);
    $cols = count($grid[0]);
    
    // Vérification des lignes
    for ($i = 0; $i < $rows; $i++) {
        for ($j = 0; $j < $cols - 3; $j++) {
            if ($grid[$i][$j] == $player &&
                $grid[$i][$j+1] == $player &&
                $grid[$i][$j+2] == $player &&
                $grid[$i][$j+3] == $player) {
                return true;
            }
        }
    }
    
    // Vérification des colonnes
    for ($i = 0; $i < $rows - 3; $i++) {
        for ($j = 0; $j < $cols; $j++) {
            if ($grid[$i][$j] == $player &&
                $grid[$i+1][$j] == $player &&
                $grid[$i+2][$j] == $player &&
                $grid[$i+3][$j] == $player) {
                return true;
            }
        }
    }
    
    // Vérification des diagonales ascendantes
    for ($i = 3; $i < $rows; $i++) {
        for ($j = 0; $j < $cols - 3; $j++) {
            if ($grid[$i][$j] == $player &&
                $grid[$i-1][$j+1] == $player &&
                $grid[$i-2][$j+2] == $player &&
                $grid[$i-3][$j+3] == $player) {
                return true;
            }
        }
    }
    
    // Vérification des diagonales descendantes
    for ($i = 3; $i < $rows; $i++) {
        for ($j = 3; $j < $cols; $j++) {
            if ($grid[$i][$j] == $player &&
                $grid[$i-1][$j-1] == $player &&
                $grid[$i-2][$j-2] == $player &&
                $grid[$i-3][$j-3] == $player) {
                return true;
            }
        }
    }
    
    return false; // Aucune victoire n'a été trouvée
}