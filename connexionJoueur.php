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
        $erreurs[] = "Le nom d'utilisateur n'existe pas";
    } elseif ($tabJoueur['Mot_de_passe'] != $password) {
        $erreurs[] = "Le mot de passe est incorrect";
    }


    if (empty($erreurs)) {
        // Si les informations de connexion sont valides, redirigez l'utilisateur vers une page de menu
        header("Location: menuLigne.php");
        $_SESSION['pseudo']=$tabJoueur['Nom_joueur'];
        exit();
    }else {
        // Affichez et rediriger les erreurs éventuelles
       $_SESSION['erreurs'] = $erreurs;
       header("location:connexionForm.php"); 
       exit();    
   }

