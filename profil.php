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
    <link href="CSS/indexStyle.css" rel="stylesheet" />
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="shortcut icon" type="image/png" href="favicon.png">
    <style>
        th {
            border: 1px solid #ddd;
            color: black;
            font-weight: bold;
            padding: 12px;
            text-align: center;
        }

        /* Style pour les lignes du tableau */
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
            color: white;
            font-weight: bold;
        }

        
        .table-statistiques{
            height: 25%;
            width: 25%;
            margin-top: 2%;
            margin-left: 38%;
        }
        .table-statistiques-c1{
            color: black;
            font-weight: bold;
        }
       
    </style>
</head>

<body>
    <IMG class="displayed" src="logo.png">
   
        <p id="titre">Vos statistiques <?php echo $_SESSION['pseudo']; ?> : </p>
   
    <div>
       

        <table class="table-statistiques">
            <thead>
                <tr>
                    <th>Statistiques</th>
                    <th>Valeurs</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td  class="table-statistiques-c1">Victoire</td>
                    <td><?php echo $tabStat['Victoire']; ?></td>
                </tr>
                <tr>
                    <td class="table-statistiques-c1">Défaite</td>
                    <td><?php echo $tabStat['Defaite']; ?></td>
                </tr>
                <tr>
                    <td class="table-statistiques-c1">Nul</td>
                    <td><?php echo $tabStat['Egalite']; ?></td>
                </tr>
                <tr>
                    <td class="table-statistiques-c1">Total parties jouées</td>
                    <td><?php echo $tabStat['Parties_jouees']; ?></td>
                </tr>
            </tbody>
        </table>

    </div>
    <button id="retourJ" onclick="window.location.href='menuLigne.php'">Retour Menu</button>

</body>

</html>