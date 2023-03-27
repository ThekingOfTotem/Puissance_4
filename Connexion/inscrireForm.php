<?php
     session_start();
     require_once 'connexionDB.php'; 
?>
<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
    <!--lien avec le css-->
    <link href="../CSS/indexStyle.css" rel="stylesheet" />
    <link rel="shortcut icon" type="image/png" href="../Image/favicon.png">
</head>

<body>
<IMG class="displayed" src="../Image/logo.png">

<p id="titreJ">Créez votre compte</p>

<form method="post" action="../Connexion/inscrireJoueur.php">
    <!--On demande le nom des joueurs-->
    <div id="name1">
	    <input type="text" id="pseudo" name="pseudo" placeholder="Nom du joueur" required>
        <?php ?>
    </div>
    <div>
        <!-- <label for="password">Mot de passe :</label>-->
        <input type="password" id="password "name="password" placeholder="Mot de passe "required><br><br>
    </div>
    <div>
       <!-- <label for="password_confirm">Confirmez votre mot de passe:</label>-->
        <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirmer votre mot de passe" required>
    </div>
    
	<input id="val" type="submit" value="S'inscrire">
</form>
<?php
		if(isset($_SESSION['erreurs'])){
			foreach($_SESSION['erreurs'] as $erreur){
				echo '<p id="msgErreur">ATTENTION ERREUR(S) : '.$erreur.'</p>';
			}
			unset($_SESSION['erreurs']);
		}
	?>
<button id="retourJ" onclick="window.location.href='../Connexion/seConnecterForm.php'">Retour Menu</button>


</body>

</html>