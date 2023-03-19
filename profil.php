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

    // afficher les informations de l'utilisateur dans la page HTML
?>



<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title>Puissance 4</title>
    <link href="CSS/indexStyle.css" rel="stylesheet" />
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="shortcut icon" type="image/png" href="favicon.png">
    <style>
        /* Style pour centrer le tableau et ajouter un espace avec l'image */
        table {
            margin: 20px auto;
        }
        .displayed {
            margin-bottom: 20px;
        }
        /* Style pour l'entête du tableau */
        th {
            background-color: #FFC107; /* jaune */
            color: #FFF;
            padding: 10px;
        }

        /* Style pour les lignes du tableau */
        td {
            border: 1px solid #000; /* noir */
            padding: 10px;
        }

        /* Style pour la première ligne du tableau */
        tr:first-child {
            background-color: #1976D2; /* bleu */
            color: #FFF;
        }
    </style>
</head>


<body>
    <IMG class="displayed" src="logo.png">
    <div>
        <table class="table table-striped">
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