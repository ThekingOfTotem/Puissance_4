<?php


    //connexion a la BDD
    //$pdo = new PDO('mysql:host=fafa.kroko.xyz;dbname=aitbouqdir1', "aitbouqdir","crotocu" );
    //code erreur si un soucis
    //$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    //$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
    //return $pdo;

   /* try{
        $pdo= new PDO('mysql:host=fafa.kroko.xyz;dbname=aitbouqdir1', "aitbouqdir","bOPLxL8A");
    }catch(PDOException $e){
        echo "Erreur PDO : ".$e->getMessage()."<br/>";
        die();
    }
    return $pdo;*/
    try{
        $cnx = new PDO('mysql:host=localhost;dbname=aitbouqdir1','root','');
    }catch(PDOException $e){
        echo "Erreur PDO : ".$e->getMessage()."<br/>";
        die();
    }
    
