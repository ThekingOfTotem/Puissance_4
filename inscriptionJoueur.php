<?php
    session_start();
	require_once 'connexionDB.php'; 
    if (!isset($_POST["pseudo"],$_POST["password"],$_POST["password_confirmation"] ))
    {
        header("location:partieLocal.php"); 
        exit(); 
    }

    $pseudo = $_POST['pseudo'];
    $password = $_POST['password'];
    $password_confirmation = $_POST['password_confirmation'];

    if ($password != $password_confirmation) {
        $errors[] = "Les mots de passe ne correspondent pas";
    } 
    
    if (!empty($errors)) {
        echo '<script>';
        echo 'alert("';
        echo implode('\n', $errors);
        echo '");';
        echo '</script>';
    }













