<?php
function seConnecter(){
    //connexion a la BDD
    $pdo = new PDO('mysql:host=fafa.kroko.xyz;dbname=aitbouqdir1', "aitbouqdir","crotocu" );
    //code erreur si un soucis
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);

    return $pdo;
}

?>