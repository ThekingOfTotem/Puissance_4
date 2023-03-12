<?php
session_start();
$grille = $_GET["grille"];
$col = $_GET["col"];
$tour = $_GET["joueur"];
include 'jouerCoup.php';


coupPossible($grille, $col);
echo $tour;


?>