<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title>Puissance 4 Local</title>
    <!--lien avec le css-->
    <link href="../CSS/style.css" rel="stylesheet"/>
    <link rel="shortcut icon" type="image/png" href="../Image/favicon.png">
    <script src="../JS/jquery-3.6.3.min.js"></script>
    <script src="../JS/actionLocal.js"></script>

</head>

<body>
    <?php
    session_start();
    $_SESSION["nomJoueur1"] = $_GET["joueur1"];
    $_SESSION["nomJoueur2"] = $_GET["joueur2"];
    $_SESSION["tour"]="Joueur1";
    

    $grille = array_fill(0, 6, array_fill(0, 7, 0));

    $_SESSION["grille"]=$grille;
    $nomjoueur1 = $_SESSION["nomJoueur1"];
    $nomjoueur2 = $_SESSION["nomJoueur2"];

    require_once '../Connexion/connexionDB.php'; 
    //$cnx = new PDO('mysql:host=localhost;dbname=aitbouqdir1','root','');
    

    $res1 = $cnx->prepare("SELECT nbvictoire FROM partielocal WHERE nomjoueur = ?");
    $res1->execute([$nomjoueur1]);
    $tabJoueur1 = $res1->fetchAll();

    if(count($tabJoueur1) > 0){
      $victoireJ1 = $tabJoueur1[0]['nbvictoire'];
    }else{

      $req = $cnx->prepare("INSERT INTO partielocal(nomjoueur,record,nbvictoire) VALUES (:nomjoueur,:record,:nbvictoire)");
      $req->execute(array(
        'nomjoueur' => $nomjoueur1,
        'record' => 0,
        'nbvictoire' => 0
      ));

      $res1 = $cnx->prepare("SELECT nbvictoire FROM partielocal WHERE nomjoueur = ?");
      $res1->execute([$nomjoueur1]);
      $tabJoueur1 = $res1->fetchAll();
      //var_dump($tabJoueur1);
      $victoireJ1 = $tabJoueur1[0]['nbvictoire'];
    }

    $res2 = $cnx->prepare("SELECT nbvictoire FROM partielocal WHERE nomjoueur = ?");
    $res2->execute([$nomjoueur2]);
    $tabJoueur2 = $res2->fetchAll();

    if(count($tabJoueur2) > 0){
      $victoireJ2 = $tabJoueur2[0]['nbvictoire'];
    }else{
      $req = $cnx->prepare("INSERT INTO partielocal(nomjoueur,record,nbvictoire) VALUES (:nomjoueur,:record,:nbvictoire)");
      $req->execute(array(
        'nomjoueur' => $nomjoueur2,
        'record' => 0,
        'nbvictoire' => 0
      ));

      $res2 = $cnx->prepare("SELECT nbvictoire FROM partielocal WHERE nomjoueur = ?");
      $res2->execute([$nomjoueur1]);
      $tabJoueur2 = $res2->fetchAll();
      $victoireJ2 = $tabJoueur2[0]['nbvictoire'];
    }


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
    echo "<button id=\"retourJeu\" onclick=\"window.location.href='demarrerPartieLocal.php'\">Retour Menu</button>";
    echo "<p id=\"score\">Nombre de victoire :</br>".$nomjoueur1." : ".$victoireJ1."</br>".$nomjoueur2." : ".$victoireJ2."</p>";
    ?>
    
    </div>
 
</body>

</html>