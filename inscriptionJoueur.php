<?php
    session_start();
	require_once 'connexionDB.php'; 
    if (!isset($_POST["pseudo"],$_POST["password"],$_POST["password_confirmation"] ))
    {
        header("location:inscriptionForm.php"); 
        exit(); 
    }

    $pseudo = $_POST['pseudo'];
    $password = $_POST['password'];
    $password_confirmation = $_POST['password_confirmation'];

    $erreurs = [];

    if ($password != $password_confirmation) {
        $erreurs[] = "Les mots de passe ne correspondent pas";
    } 
    
    // Vérifiez si le nom d'utilisateur existe déjà dans la base de données
    $req = "SELECT * FROM joueur WHERE Nom_joueur = ?";
    $res = $cnx->prepare($req);
    $res->execute([$pseudo]);
    $tabJoueur = $res->fetch();
 
    if ($tabJoueur) {
      $erreurs[] = "Ce nom d'utilisateur est déjà pris";
    }

    // Si le nom d'utilisateur n'existe pas déjà, insérez les informations dans la table "joueur"
    if (empty($erreurs)) {
        $req = "INSERT INTO joueur (Nom_joueur, Mot_de_passe) VALUES (?, ?)";
        $res= $cnx->prepare($req);
        $res->execute([$pseudo, $password]);
         // Redirigez l'utilisateur vers une page de confirmation d'inscription
        header("Location: partieLocal.php"); 
        exit();
    } else {
         // Affichez et rediriger les erreurs éventuelles
         $_SESSION['erreurs'] = $erreurs;
        header("location:inscriptionForm.php"); 
        exit(); 
       
        
        
}




