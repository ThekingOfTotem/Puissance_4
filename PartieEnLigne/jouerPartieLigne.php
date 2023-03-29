<!DOCTYPE html>

<head>
  <meta charset="UTF-8">
  <title>Puissance 4 Local</title>
  <!--lien avec le css-->
  <link href="../CSS/style.css" rel="stylesheet" />
  <link rel="shortcut icon" type="image/png" href="../Image/favicon.png">
  <script src="../JS/jquery-3.6.3.min.js"></script>
  <script src="../JS/actionLigne.js"></script>

</head>

<body>
  <?php
  session_start();
  require_once '../Connexion/connexionDB.php';
  $req = "SELECT * FROM parties WHERE Id_partie = ?";
  $res = $cnx->prepare($req);
  $res->execute([$_GET['id_partie']]);
  $partie = $res->fetch();
  //echo json_encode($partie);
  $joueur1 = $partie['Nom_Joueur1'];
  $joueur2 = $partie['Nom_Joueur2'];




  // Enregistrement de la grille dans la session
  $grille = json_decode($partie['grille']);

  // Enregistrement des joueurs actifs dans la session
  $_SESSION['joueur1'] = $joueur1;
  $_SESSION['joueur2'] = $joueur2;


  $_SESSION['ID_Joueur'] = $partie['Tour'];
  
  ?>

  <h1 class="element-centre">Ma grille :</h1>

  <?php
  echo "<h1 class='element-centre'>" . $_SESSION['joueur2'] . " contre " . $_SESSION['joueur1'] . "</h1>";
  echo "<h2 id=nomJoueur class=element-centre style=z-index:2>C'est à " . $_SESSION['joueur1'] . " de jouer</h2>";
  echo "<div id=jeu class=element-centre>";
  echo "<div id=mes-boutons  >";
  for ($colonne = 0; $colonne <= 6; $colonne++) {
    $num = $colonne + 1;
    echo "<button data-colonne=" . $colonne . " class=Bouton onclick='traiterClic(this)'>$num</button>";
  }
  echo "</div>";

  echo "<div id=ma-grille>";

  for ($ligne = 0; $ligne < 6; $ligne++) {
    for ($colonne = 0; $colonne < 7; $colonne++) {
      $numCase = $ligne * 6 + $colonne;
      echo "<div id=" . $numCase . " data-ligne=" . $ligne . " data-colonne=" . $colonne . " class='case' ></div>";
    }
  }
  echo "</div>";
  echo "<button class=Bouton onclick='traiterClic(this)'>$num</button>";
  echo "</div>";
  echo "<button id=\"retourJeu\" onclick=\"window.location.href='../PartieEnLigne/demarrerPartieEnLigne.php'\">Retour Menu</button>";


  ?>

  </div>

</body>

</html>