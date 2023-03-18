<?php
    session_start();
	require_once 'connexionDB.php'; 
    if (!isset($_POST["pseudo"]) || !isset($_POST["password"]))
    {
        header("location:demarrerPartieLigne.php"); 
        exit(); 
    }

    $pseudo = $_POST['pseudo'];
    $password = $_POST['password'];














