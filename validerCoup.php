<?php
session_start();
$grille = $_SESSION["grille"];
$col = $_GET["col"];
$tour = $_SESSION["tour"];
include 'jouerCoup.php';

echo $tour;
print_r($_SESSION);

?>