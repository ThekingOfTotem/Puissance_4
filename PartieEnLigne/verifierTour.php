<?php

session_start();

require '../Connexion/connexionDB.php';
$tutu = $_SESSION['ID_Partie'];
$req = "SELECT Tour,grille FROM parties WHERE Id_partie = ?";
$res = $cnx->prepare($req);
$res->execute([$tutu]);
$partie = $res->fetch();
print_r($partie);
//$grille = $_SESSION["grille"];
$tour = $partie['Tour'];
$grille = json_decode($partie['grille']);
var_dump($grille);
print_r($_SESSION['ID_Joueur']);
if($_SESSION['ID_Joueur'] == $tour){
    
  
    echo $grille;
    

}else{

    echo json_encode("false");

}