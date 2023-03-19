<?php
session_start();

// Récupération du fichier de connexion à la base de données
require_once 'connexionDB.php';

// Sélectionne 2 utilisateurs aléatoirement
$req = "SELECT * FROM joueur ORDER BY RAND() LIMIT 2";
$res = $cnx->prepare($req);
$tabJoueurs = $res->fetchAll();
echo json_encode($tabJoueurs);
// Crée la partie enregistrant les joueurs et les détails de la partie dans la base de données
$req = "INSERT INTO parties(Nom_joueur1, Nom_joueur2) VALUES (?, ?)";
$res = $cnx->prepare($req);
$res->execute([$tabJoueurs[0]['Nom_joueur'], $tabJoueurs[1]['Nom_joueur']]);

// Récupère l'ID de la partie créée
$id_partie = $cnx->lastInsertId();

// Enregistre les joueurs actifs dans la session
$_SESSION['joueur1'] = $joueurs[0]['Nom_joueur'];
$_SESSION['joueur2'] = $joueurs[1]['Nom_joueur'];

// Redirige les joueurs vers la page de jeu avec l'ID de la partie dans l'URL
header("Location: partieLigne.php?id_partie=$id_partie");
exit();
?>