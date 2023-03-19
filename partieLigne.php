<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title>Puissance 4 Local</title>
    <!--lien avec le css-->
    <link href="CSS/style.css" rel="stylesheet"/>
    <link rel="shortcut icon" type="image/png" href="favicon.png">
    <script src="JS/jquery-3.6.3.min.js"></script>
    <script src="JS/actionLigne.js"></script>

</head>

<body>
    <?php
    session_start();
    require_once 'connexionDB.php';
    $req = "SELECT * FROM parties WHERE Id_partie = ?";
    $res = $cnx->prepare($req);
    $res->execute([$_GET['id_partie']]);
    $partie = $res->fetch();
    //echo json_encode($partie);
    $joueur1 = $partie['Nom_Joueur1'];
    $joueur2 = $partie['Nom_Joueur2'];

    // Initialisation de la grille avec des zéros
    $grille = array_fill(0, 6, array_fill(0, 7, 0));

    // Enregistrement de la grille dans la session
    $_SESSION["grille"] = $grille;

    // Enregistrement des joueurs actifs dans la session
    $_SESSION['joueur1'] = $joueur1;
    $_SESSION['joueur2'] = $joueur2;

  
    $_SESSION['Tour'] = $partie["Tour"];
    ?>

    <h1 class="element-centre">Ma grille :</h1>
    
    <?php
      echo "<h1 class='element-centre'>".$_SESSION["nomJoueur1"]." contre ".$_SESSION["nomJoueur2"]."</h1>";
      echo "<h2 id=nomJoueur class=element-centre style=z-index:2>C'est à ".$_SESSION["nomJoueur1"]." de jouer</h2>";
      echo "<div id=jeu class=element-centre>";
      echo "<div id=mes-boutons >";
      for ($colonne = 0; $colonne <=6 ; $colonne++) {
        $num=$colonne+1;
        echo "<button data-colonne=".$colonne." class=Bouton onclick='traiterClic(this)'>$num</button>";
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
      echo "<button id=\"retourJeu\" onclick=\"window.location.href='demarrerPartieLigne.php'\">Retour Menu</button>";
      

    ?>
    
    </div>
 
</body>

</html>