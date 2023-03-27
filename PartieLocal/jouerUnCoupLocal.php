<?php
session_start();

require '../Connexion/connexionDB.php';
//$cnx = new PDO('mysql:host=localhost;dbname=aitbouqdir1','root','');

$grille = $_SESSION["grille"];
$tour = $_SESSION["tour"];
$nomjoueur1 = $_SESSION['nomJoueur1'];
$nomjoueur2 = $_SESSION['nomJoueur2'];

if ($_SERVER['REQUEST_METHOD'] === 'GET') { // Si le script reçoit des variable GET
    $col = $_GET["col"];
    coupPossible($grille,$col);
    
}else{ //Sinon on execute la fonction appelée
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
        echo json_encode("true"); // la grille est remplie
    } else {
        echo json_encode("false"); //la grille n'est pas remplie
    }
}

//On joue le coup

function jouerCoup()
{
  global $position;
  global $grille;
  $col=$_POST["col"];
  $victoire=false; // On considère que personne n'a encore gagné
    //Si le coup est possible
    if (coupPossible($grille, $col)) {
        for ($i = 5; $i >= 0; $i--) {
            if ($grille[$i][$col] == 0) {//On cherche en partant du bas de la colonne la prochaine case à remplir
                $position = $i;
                if ($_SESSION["tour"] == "Joueur1") {
                    $grille[$i][$col] = 1; //Si c'est au tour du Joueur 1, on rempli la case avec la valeur 1
                    $_SESSION["grille"] = $grille; // On met à jour la grille
                    if(victoire($grille, 1)){
                        $victoire=true; // Si le coup joué permet de gagner, on change la valeur de la variable victoire
                    }
                        $_SESSION["tour"] = "Joueur2"; // On change de joueur
                        $data = array('couleur'=>'red','nomJoueurOld' => $_SESSION["nomJoueur1"] ,'nomJoueur' => $_SESSION["nomJoueur2"], 'grille' => $grille, 'position' => $position, 'victoire' => $victoire);
                        echo json_encode($data); // On renvoie les valeurs nécessaires 0à la poursuite du jeu
                        exit;
                } if ($_SESSION["tour"] == "Joueur2"){
                    $grille[$i][$col] = 2; //Si c'est au tour du Joueur 2, on rempli la case avec la valeur 2
                    $_SESSION["grille"] = $grille; // On met à jour la grille
                    if(victoire($grille, 2)){
                        $victoire=true; // Si le coup joué permet de gagner, on change la valeur de la variable victoire
                    }
                        $_SESSION["tour"] = "Joueur1"; // On change de joueur
                        $data = array('couleur'=>'yellow','nomJoueurOld' => $_SESSION["nomJoueur2"] ,'nomJoueur' => $_SESSION["nomJoueur1"], 'grille' => $grille, 'position' => $position, 'victoire' => $victoire);
                        echo json_encode($data); // On renvoie les valeurs nécessaires 0à la poursuite du jeu
                        exit;
                }
            }
        }
        
    } else {
        echo json_encode("autre colonne"); // Si le coup n'est pas possible
    }
}




// Cette fonction vérifie si le jeton posé permet de gagner la partie
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
                    ajouterVictoire($player);
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
                    ajouterVictoire($player);
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
                    ajouterVictoire($player);
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
                    ajouterVictoire($player);
                    return true;
            }
        }
    }
    
    return false; // Aucune victoire n'a été trouvée
}

function ajouterVictoire($player){
global $cnx;
global $nomjoueur1;
global $nomjoueur2;

    if($player == 1){
        $res1 = $cnx->prepare("SELECT nbvictoire FROM partielocal WHERE nomjoueur = ?");
        $res1->execute([$nomjoueur1]);
        $tab = $res1->fetchAll();
        $victoire = $tab[0]['nbvictoire']+1;
        $req = $cnx->prepare("UPDATE partielocal SET nbvictoire = $victoire WHERE nomjoueur = :nomjoueur");
        $req->execute(array(
          'nomjoueur' => $nomjoueur1
        ));
      }
      if ($player == 2) {
          $res1 = $cnx->prepare("SELECT nbvictoire FROM partielocal WHERE nomjoueur = ?");
          $res1->execute([$nomjoueur2]);
          $tab = $res1->fetchAll();
          $victoire = $tab[0]['nbvictoire']+1;
          $req = $cnx->prepare("UPDATE partielocal SET nbvictoire = $victoire WHERE nomjoueur = :nomjoueur");
          $req->execute(array(
            'nomjoueur' => $nomjoueur2
          ));
      } 
}