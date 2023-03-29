<?php

session_start();

require '../Connexion/connexionDB.php';
//$cnx = new PDO('mysql:host=localhost;dbname=aitbouqdir1','root','');
$req = "SELECT Tour,grille FROM parties WHERE Id_partie = ?";
$res = $cnx->prepare($req);
$res->execute([$_GET['id_partie']]);
$partie = $res->fetch();
//$grille = $_SESSION["grille"];
$tour = $partie['Tour'];


if($_SESSION['ID_Joueur'] == $tour){
    
    $grille = json_decode($partie['grille']);
    echo($grille);
    exit();

}else{

    echo(-1);

}