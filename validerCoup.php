<?php
session_start();
$grille = $_GET["grille"];
$col = $_GET["col"];
$tour = $_SESSION["joueur"];
include 'jouerCoup.php';

coupPossible($grille, $col);
echo $tour;


?>