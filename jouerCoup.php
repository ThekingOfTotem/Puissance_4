<?php
session_start();

$col = $_SESSION["col"];
$position;


//Verifier l'autorisation du coup 
//On vérifie si la colonne n'est pas vide
function coupPossible($grille, $col){
    return $grille[5][$col] == 0;
}

//On vérifie si la grille est remplie 
function grilleRemplie($grille){
    $cmp = 0;
    for ($i = 0; $i<7; $i++){
        if($grille[5][$i]!=0){
            //On compte le nombre de colonne remplie
            $cmp++;
        }
    }
    if($cmp==7){
        return true; // la grille est remplie
    }else{
        return false; //la grille n'est pas remplie
    }
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

function verifDroit($grille,$position,$col,$tour){
    $cpt=0;
    if($col+3 <=6){
        for($i=0;$i<3;$i++){
            if($tour == "Joueur1"){
                if($grille[$position][$col+$i]==1){
                    $cpt++;
                }else{
                    exit;
                }
                if($cpt == 4){
                    return true;
                }
            }else{
                if($grille[$position][$col+$i]==2){
                    $cpt++;
                }else{
                    exit;
                }
                if($cpt == 4){
                    return true;
                }
            }
        }   

    }
}

function verifGauche($grille,$position,$col){
    $cmp=0;
    if($col-3 >= 0){
        for ($i = 0; $i<3; $i++){
            if ($_SESSION["tour"]=="Joueur1"){ //si le joueur 1 joue
                if($grille[$position][$col-$i]==1){
                    $cmp++;
                }else{
                    exit;
                }
            }
            if ($_SESSION["tour"]=="Joueur2"){ //si le joueur 2 joue
                if($grille[$position][$col-$i]==2){
                    $cmp++;
                }else{
                    exit;
                }
            }
        }
    }
    if ($cmp==4){
        return true;
    }else{
        return false;
    }
}

function verifHaut($grille,$position,$col){
    $cmp=0;
    if($position+3 <= 5){
            for ($i = 0; $i<3; $i++){
                if ($_SESSION["tour"]=="Joueur1"){ //si le joueur 1 joue
                    if($grille[$position+$i][$col]==1){
                        $cmp++;
                    }else{
                        exit;
                    }
                }
                if ($_SESSION["tour"]=="Joueur2"){ //si le joueur 2 joue
                    if($grille[$position+$i][$col]==2){
                        $cmp++;
                    }else{
                        exit;
                    }
                }
            }
        }
    if ($cmp==4){
        return true;
    }else{
        return false;
    }
}


function verifBas($grille,$position,$col,$tour){
    $cpt=0;
    if($position-3 >=0){
        for($i=0;$i<3;$i++){
            if($tour == "Joueur1"){
                if($grille[$position-$i][$col]==1){
                    $cpt++;
                }else{
                    exit;
                }
                if($cpt == 4){
                    return true;
                }
            }else{
                if($grille[$position-$i][$col]==2){
                    $cpt++;
                }else{
                    exit;
                }
                if($cpt == 4){
                    return true;
                }
            }
        }   
    }
}

function verifHautDroit($grille,$position,$col,$tour){
    $cpt=0;
    if($position+3 <= 5 && $col+3 <=6){
        for($i=0;$i<3;$i++){
            if($tour == "Joueur1"){
                if($grille[$position+$i][$col+$i]==1){
                    $cpt++;
                }else{
                    exit;
                }
                if($cpt == 4){
                    return true;
                }
            }else{
                if($grille[$position+$i][$col+$i]==2){
                    $cpt++;
                }else{
                    exit;
                }
                if($cpt == 4){
                    return true;
                }
            }
        }   
    }
}

function verifHautGauche($grille,$position,$col,$tour){
    $cpt=0;
    if($position+3 <= 5 && $col-3 >= 0){
        for($i=0;$i<3;$i++){
            if($tour == "Joueur1"){
                if($grille[$position+$i][$col-$i]==1){
                    $cpt++;
                }else{
                    exit;
                }
                if($cpt == 4){
                    return true;
                }
            }else{
                if($grille[$position+$i][$col-$i]==2){
                    $cpt++;
                }else{
                    exit;
                }
                if($cpt == 4){
                    return true;
                }
            }
        }   
    }
}

function verifBasDroit($grille,$position,$col,$tour){
    $cpt=0;
    if($position-3 >= 0 && $col-3 >= 0){
        for($i=0;$i<3;$i++){
            if($tour == "Joueur1"){
                if($grille[$position-$i][$col-$i]==1){
                    $cpt++;
                }else{
                    exit;
                }
                if($cpt == 4){
                    return true;
                }
            }else{
                if($grille[$position-$i][$col-$i]==2){
                    $cpt++;
                }else{
                    exit;
                }
                if($cpt == 4){
                    return true;
                }
            }
        }   
    }
}

function verifBasGauche($grille,$position,$col,$tour){
    $cpt=0;
    if($position-3 >= 0 && $col+3 <= 6){
        for($i=0;$i<3;$i++){
            if($tour == "Joueur1"){
                if($grille[$position-$i][$col+$i]==1){
                    $cpt++;
                }else{
                    exit;
                }
                if($cpt == 4){
                    return true;
                }
            }else{
                if($grille[$position-$i][$col+$i]==2){
                    $cpt++;
                }else{
                    exit;
                }
                if($cpt == 4){
                    return true;
                }
            }
        }   
    }
}

function victoire($grille,$tour){    
$_SESSION["grille"] = $grille;
}


//
?>