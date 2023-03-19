<?php
    session_start();
    require_once 'connexionDB.php'; 

    if (!isset($_SESSION['pseudo'])) {
        header("Location: menuLigne.php");
        exit();
    }

    $pseudo = $_SESSION['pseudo'];

    // récupérer les informations de l'utilisateur à partir de la base de données
    $req = "SELECT Nom_joueur, Victoire FROM joueur WHERE Nom_joueur = ?";
    $res = $cnx->prepare($req);
    $res->execute([$pseudo]);
    $tabStat = $res->fetch();

    // afficher les informations de l'utilisateur dans la page HTML
?>



<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title>Puissance 4</title>
    <link href="CSS/indexStyle.css" rel="stylesheet" />
    <link rel="shortcut icon" type="image/png" href="favicon.png">
</head>


<body>
    <IMG class="displayed" src="logo.png">
    <h1>Profile de <?php echo $tabStat['Nom_joueur']; ?></h1>
    <p>Nombre de victoires : <?php echo $tabStat['Victoire']; ?></p>
</body>

</html>