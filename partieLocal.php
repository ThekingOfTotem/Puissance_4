<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title>Puissance 4</title>
    <!--lien avec le css-->
    <link href="/CSS/style.css" />
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
    <table class="ma-grille">
    <?php
      for ($i = 0; $i < 6; $i++) {
        echo "<tr>";
        for ($j = 0; $j < 7; $j++) {
          if ($grille[$i][$j] == 1) {
            echo "<td style='background-color: red;' class=piece></td>";
          } elseif ($grille[$i][$j] == 2) {
            echo "<td style='background-color: yellow;' class=piece></td>";
          }else {
            echo "<td style='background-color: white;' class=piece></td>";
          }
        }
        echo "</tr>";
      }
    ?>
    </table>
 
</body>

</html>