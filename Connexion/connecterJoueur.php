<?php
    session_start();
	require_once 'connexionDB.php'; 
    if (!isset($_POST['pseudo'],$_POST['password']))
    {
        header("location:connexionForm.php"); 
        exit(); 
    }

    $pseudo = $_POST['pseudo'];
    $password = $_POST['password'];

    $erreurs = [];
    // Vérifiez si le nom d'utilisateur et le mot de passe sont corrects

    $req = "SELECT * FROM joueur WHERE Nom_joueur = ?";
    $res = $cnx->prepare($req);
    $res->execute([$pseudo]);
    $tabJoueur = $res->fetch();

    if (!$tabJoueur) {
        $erreurs[] = "Erreur sur le nom d'utilisateur ou le mot de passe";
    } elseif (!password_verify($password,$tabJoueur['Mot_de_passe'])) {
        $erreurs[] = "Erreur sur le nom d'utilisateur ou le mot de passe";
        echo("test");
    }
//var_dump($tabJoueur);
    if (empty($erreurs)) {
        // Si les informations de connexion sont valides, redirigez l'utilisateur vers une page de menu
        header("Location: ../PartieEnLigne/afficherMenuEnLigne.php");
        $_SESSION['pseudo']=$tabJoueur['Nom_joueur'];
        exit();
    }else {
        // Affichez et rediriger les erreurs éventuelles
       $_SESSION['erreurs'] = $erreurs;
       header("location:seConnecterForm.php"); 
       exit();    
   }

