<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title>Puissance 4 Local</title>
    <!--lien avec le css-->
    <link href="CSS/style.css" rel="stylesheet"/>
    <script src="JS/jquery-3.6.3.min.js"></script>
    <script src="JS/action.js"></script>

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

    <h1 class="element-centre">Ma grille :</h1>
    
    <?php
      echo "<div id=jeu class=element-centre>";
      echo "<div id=mes-boutons >";
      for ($colonne = 1; $colonne <=7 ; $colonne++) {
      
      echo "<button data-colonne=".$colonne." data-joueur=".$_SESSION["tour"]."class=Bouton onclick='traiterClic(this)'>$colonne</button>";
      }
      echo "</div>";

      echo "<div id=ma-grille>";

      for ($ligne = 0; $ligne < 6; $ligne++) {
        for ($colonne = 0; $colonne < 7; $colonne++) {
            $numCase = $ligne*6+$colonne;
            echo "<div id=".$numCase." data-ligne=".$ligne." data-colonne=".$colonne." class='case' ></div>";
        }
      }
      echo "</div>";
      echo "</div>";
    ?>
    
    </div>
 
</body>

</html>