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
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="shortcut icon" type="image/png" href="favicon.png">
</head>


<body>
    <IMG class="displayed" src="logo.png">
    <div>
        <h1>Profile de <?php echo $tabStat['Nom_joueur']; ?></h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nombre de victoires</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $tabStat['Victoire']; ?></td>
                </tr>
            </tbody>
        </table>

    </div>
    <button id="retourJ" onclick="window.location.href='menuLigne.php'">Retour Menu</button>

</body>

</html>