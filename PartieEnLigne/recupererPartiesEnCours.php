<?php
session_start();
require_once "../Connexion/connexionDB.php";
$req = "SELECT * FROM parties WHERE Statut = 'en cours' AND (Nom_Joueur1=:nomJoueurCo OR Nom_Joueur2=:nomJoueurCo)";
$res = $cnx->prepare($req);
$res->execute(array(
    "nomJoueurCo"=>$_SESSION['pseudo']
));
$parties = $res->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($parties);

