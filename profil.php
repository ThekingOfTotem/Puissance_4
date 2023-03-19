<?php
    session_start();
    require_once 'connexionDB.php'; 

    if (!isset($_SESSION['pseudo'])) {
        header("Location: menuLigne.php");
        exit();
    }

    $pseudo = $_SESSION['pseudo'];

    // récupérer les informations de l'utilisateur à partir de la base de données
    $req = "SELECT * FROM joueur WHERE Nom_joueur = ?";
    //$req = "SELECT Nom_joueur, Victoire FROM joueur WHERE Nom_joueur = ?";
    $res = $cnx->prepare($req);
    $res->execute([$pseudo]);
    $tabStat = $res->fetch();
?>



<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title>Puissance 4</title>
    <!--<link rel="stylesheet" href="CSS/bootstrap.min.css">-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!--<link href="CSS/indexStyle.css" rel="stylesheet" />-->
    <link rel="shortcut icon" type="image/png" href="favicon.png">
</head>


<body>
    <IMG class="displayed" src="logo.png">
    <div>
        <table class="table-dark table-hover">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Victoire</th>
                    <th>Défaite</th>
                    <th>Nul</th>
                    <th>Total parties jouées</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $tabStat['Nom_joueur']; ?></td>
                    <td><?php echo $tabStat['Victoire']; ?></td>
                    <td><?php echo $tabStat['Defaite']; ?></td>
                    <td><?php echo $tabStat['Nul']; ?></td>
                    <td><?php echo $tabStat['Total_parties_jouees']; ?></td>
                </tr>
            </tbody>
        </table>

    </div>
    <button id="retourJ" onclick="window.location.href='menuLigne.php'">Retour Menu</button>

</body>

</html>