<?php
session_start();
$grille = $_SESSION["grille"];
$_SESSION["nomJoueur"] = $_GET["nom"];
