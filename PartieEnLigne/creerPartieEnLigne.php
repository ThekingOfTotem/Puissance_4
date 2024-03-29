<?php
session_start();

// Récupération du fichier de connexion à la base de données
require_once '../Connexion/connexionDB.php';

$grille = array_fill(0, 6, array_fill(0, 7, 0));
// Sélectionne 2 utilisateurs aléatoirement
$req = "SELECT ID_joueur,Nom_joueur FROM joueur ORDER BY RAND() LIMIT 2";
$res = $cnx->prepare($req);
$res->execute(); // Exécute la requête
$tabJoueurs = $res->fetchAll();
//echo json_encode($tabJoueurs);
// Vérifie si 2 joueurs ont été sélectionnés
if(count($tabJoueurs) == 2){
    // Crée la partie enregistrant les joueurs et les détails de la partie dans la base de données
    $req = "INSERT INTO parties(Nom_Joueur1, Nom_Joueur2, Statut, Tour,grille) VALUES (?, ?, ?, ?,?)";
    $res = $cnx->prepare($req);
    $res->execute([$tabJoueurs[0]['Nom_joueur'], $tabJoueurs[1]['Nom_joueur'], "en cours", "Joueur1",json_encode($grille)]);
    // Récupère l'ID de la partie créée
    $id_partie = $cnx->lastInsertId();
    
    // Enregistre les joueurs actifs dans la session
    $_SESSION["nomJoueur1"] = $tabJoueurs[0]['Nom_joueur'];
    $_SESSION["nomJoueur2"] = $tabJoueurs[1]['Nom_joueur'];
    
    // Redirige les joueurs vers la page de jeu avec l'ID de la partie dans l'URL
    header("Location: ../PartieEnLigne/jouerPartieLigne.php?id_partie=$id_partie");
    exit();

}else{
    // Si moins de deux joueurs ont été sélectionnés, renvoyer une erreur
    echo "Erreur: Impossible de trouver deux joueurs.";
}
?>