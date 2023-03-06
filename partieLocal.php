<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title>Puissance 4</title>
    <!--lien avec le css-->
    <link href="CSS/style.css" rel="stylesheet"/>
</head>

<body>
    <?php
    session_start();
    $_SESSION["nomJoueur1"] = $_GET["joueur1"];
    $_SESSION["nomJoueur2"] = $_GET["joueur2"];
    $_SESSION["tour"]="Joueur1";

    $grille = array_fill(0, 6, array_fill(0, 7, 0));

    $_SESSION["grille"]=$grille;
    ?>

    <h1>Ma grille :</h1>
    <div id="ma-grille">
    <?php
    
      for ($ligne = 0; $ligne < 6; $ligne++) {
        for ($colonne = 0; $colonne < 7; $colonne++) {
            $numCase = $ligne*6+$colonne;
            echo "<div id=".$numCase." data-ligne=".$ligne." data-colonne=".$colonne." class=case ></div>";
        }
      }
    ?>
    
    </div>
 
</body>

</html>