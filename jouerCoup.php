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
    //Si le coup est possible
    if (coupPossible($grille, $col)) {
        for ($i = 5; $i >= 0; $i--) {
            if ($grille[$i][$col] == 0) {
                $position = $i;
                if ($_SESSION["tour"] == "Joueur1") {
                    $grille[$i][$col] = 1;
                    if(victoire($grille,$position,$col,$_SESSION["tour"])){
                        echo json_encode(true);
                        exit;
                    }else{
                        $_SESSION["grille"] = $grille;
                        $_SESSION["tour"] = "Joueur2";
                        $data = array('couleur'=>'red' ,'nomJoueur' => $_SESSION["nomJoueur2"], 'grille' => $grille, 'position' => $position);
                        echo json_encode($data);
                        exit;
                    }
                } if ($_SESSION["tour"] == "Joueur2"){
                    $grille[$i][$col] = 2;
                    if(victoire($grille,$position,$col,$_SESSION["tour"])){
                        echo json_encode(true);
                        exit;
                    }else{
                        $_SESSION["tour"] = "Joueur1";
                        $_SESSION["grille"] = $grille;
                        $data = array('couleur'=>'yellow' ,'nomJoueur' => $_SESSION["nomJoueur1"], 'grille' => $grille, 'position' => $position);
                        echo json_encode($data);
                        exit;
                    }
                }
            }
        }
        
    } else {
        echo "<script>alert('Choisir une autre colonne');</script>";
    }
    if(victoire($_SESSION["grille"],$position,$col,$_SESSION["tour"])){
        echo json_encode(true);
        sleep(2);
        header("Location:demarrerPartieLocal");
    }
}

function verifDroit($grille, $position, $col, $tour)
{
    $cpt1 = 0;
    $cpt2 = 0;
    if ($col + 3 <= 6) {
        for ($i = 0; $i < 4; $i++) {
            if ($tour == "Joueur1") {
                if ($grille[$position][$col + $i] == 1) {
                    $cpt1++;
                } else {
                    return false;
                }
                
            } else {
                if ($grille[$position][$col + $i] == 2) {
                    $cpt2++;
                } else {
                    return false;
                }
                
            }
        }
    }
    if ($tour == "Joueur1") {
        if ($cpt1 == 4) {
            return true;
        }else {
            return false;
        }
    }else{
        if ($cpt2 == 4) {
            return true;
        }else {
            return false;
        }
    }
}

function verifGauche($grille, $position, $col, $tour)
{
    $cpt1 = 0;
    $cpt2 = 0;
    if ($col - 3 >= 0) {
        for ($i = 0; $i < 4; $i++) {
            if ($tour == "Joueur1") { //si le joueur 1 joue
                if ($grille[$position][$col - $i] == 1) {
                    $cpt1++;
                } else {
                    return false;
                }
            }
            if ($tour == "Joueur2") { //si le joueur 2 joue
                if ($grille[$position][$col - $i] == 2) {
                    $cpt2++;
                } else {
                    return false;
                }
            }
        }
    }
    if ($tour == "Joueur1") {
        if ($cpt1 == 4) {
            return true;
        }else {
            return false;
        }
    }else{
        if ($cpt2 == 4) {
            return true;
        }else {
            return false;
        }
    }
}

function verifHaut($grille, $position, $col, $tour)
{
    $cpt1 = 0;
    $cpt2 = 0;
    if ($position + 3 <= 5) {
        for ($i = 0; $i < 4; $i++) {
            if ($tour == "Joueur1") { //si le joueur 1 joue
                if ($grille[$position + $i][$col] == 1) {
                    $cpt1++;
                } else {
                    return false;
                }
            }
            if ($tour == "Joueur2") { //si le joueur 2 joue
                if ($grille[$position + $i][$col] == 2) {
                    $cpt2++;
                } else {
                    return false;
                }
            }
        }
    }
    if ($tour == "Joueur1") {
        if ($cpt1 == 4) {
            return true;
        }else {
            return false;
        }
    }else{
        if ($cpt2 == 4) {
            return true;
        }else {
            return false;
        }
    }
}

function verifBas($grille, $position, $col, $tour)
{
    $cpt1 = 0;
    $cpt2 = 0;
    if ($position - 3 >= 0) {
        for ($i = 0; $i < 4; $i++) {
            if ($tour == "Joueur1") {
                if ($grille[$position - $i][$col] == 1) {
                    $cpt1++;
                } else {
                    return false;
                }
            } else {
                if ($grille[$position - $i][$col] == 2) {
                    $cpt2++;
                } else {
                    return false;
                }
            }
            
        }
    }
    if ($tour == "Joueur1") {
        if ($cpt1 == 4) {
            return true;
        }else {
            return false;
        }
    }else{
        if ($cpt2 == 4) {
            return true;
        }else {
            return false;
        }
    }
}

function verifHautDroit($grille, $position, $col, $tour)
{
    $cpt1 = 0;
    $cpt2 = 0;
    if ($position - 3 >=0 && $col + 3 <= 6) {
        for ($i = 0; $i < 4; $i++) {
            if ($tour == "Joueur1") {
                if ($grille[$position - $i][$col + $i] == 1) {
                    $cpt1++;
                } else {
                    return false;
                }
            } else {
                if ($grille[$position - $i][$col + $i] == 2) {
                    $cpt2++;
                } else {
                    return false;
                }
            }
            
        }
    }
    if ($tour == "Joueur1") {
        if ($cpt1 == 4) {
            return true;
        }else {
            return false;
        }
    }else{
        if ($cpt2 == 4) {
            return true;
        }else {
            return false;
        }
    }
    
}

function verifHautGauche($grille, $position, $col, $tour)
{
    $cpt1 = 0;
    $cpt2 = 0;
    if ($position - 3 >=0 && $col - 3 >= 0) {
        for ($i = 0; $i < 4; $i++) {
            if ($tour == "Joueur1") {
                if ($grille[$position - $i][$col - $i] == 1) {
                    $cpt1++;
                } else {
                    return false;
                }
                
            } else {
                if ($grille[$position - $i][$col - $i] == 2) {
                    $cpt2++;
                } else {
                    return false;
                }
            
            }
        }
    }
    if ($tour == "Joueur1") {
        if ($cpt1 == 4) {
            return true;
        }else {
            return false;
        }
    }else{
        if ($cpt2 == 4) {
            return true;
        }else {
            return false;
        }
    }
}

function verifBasDroit($grille, $position, $col, $tour)
{
    $cpt1 = 0;
    $cpt2 = 0;
    if ($position + 3 <=5 && $col + 3 <=6) {
        for ($i = 0; $i < 4; $i++) {
            if ($tour == "Joueur1") {
                if ($grille[$position + $i][$col + $i] == 1) {
                    $cpt1++;
                } else {
                    exit;
                }
              
            } else {
                if ($grille[$position + $i][$col + $i] == 2) {
                    $cpt2++;
                } else {
                    exit;
                }
               
            }
        }
    }
    if ($tour == "Joueur1") {
        if ($cpt1 == 4) {
            return true;
        }else {
            return false;
        }
    }else{
        if ($cpt2 == 4) {
            return true;
        }else {
            return false;
        }
    }
}

function verifBasGauche($grille, $position, $col, $tour)
{
    $cpt1 = 0;
    $cpt2 = 0;
    if ($position + 3 <= 5 && $col - 3 >= 0) {
        for ($i = 0; $i < 3; $i++) {
            if ($tour == "Joueur1") {
                if ($grille[$position + $i][$col - $i] == 1) {
                    $cpt1++;
                } else {
                    exit;
                }
              
            } else {
                if ($grille[$position + $i][$col - $i] == 2) {
                    $cpt2++;
                } else {
                    exit;
                }
              
            }
        }
    }
    if ($tour == "Joueur1") {
        if ($cpt1 == 4) {
            return true;
        }else {
            return false;
        }
    }else{
        if ($cpt2 == 4) {
            return true;
        }else {
            return false;
        }
    }
}

//si une des verifs est ok, on valide la victoire et pousse la grille 
function victoire($grille, $position, $col, $tour)
{
    /*$grille = $_POST["grille"];;
    $position = $_POST["position"];
    $col = $_POST["nc"];
    $tour = $_POST["nomJoueurOld"];*/
    if (verifBas($grille, $position, $col, $tour) || verifHaut($grille, $position, $col, $tour) || verifGauche($grille, $position, $col, $tour) || verifDroit($grille, $position, $col, $tour) || verifBasDroit($grille, $position, $col, $tour) || verifBasGauche($grille, $position, $col, $tour) || verifHautDroit($grille, $position, $col, $tour) || verifHautGauche($grille, $position, $col, $tour)) {
        return true;
    } else {
        return false;
    }
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
