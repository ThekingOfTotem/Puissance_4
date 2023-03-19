<?php
require_once "connexionDB.php";
$req = "SELECT * FROM parties WHERE Statut = 'en cours'";
$res = $cnx->prepare($req);
$res->execute();
$parties = $res->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($parties);

