<?php
    session_start();
    include "coDB.php";
    seConnecter();
?>
<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <!--lien avec le css-->
    <link href="CSS/indexStyle.css" rel="stylesheet" />
    <link rel="shortcut icon" type="image/png" href="favicon.png">
</head>

<body>
<IMG class="displayed" src="logo.png">

<p id="titreJ">Choisissez votre nom</p>

<form method="post" action="connexionJoueur.php">
    <!--On demande le nom des joueurs-->
    <div id="name1">
	    <input type="text" id="joueur1" name="joueur1" placeholder="Nom du joueur 1" required>
        <?php ?>
    </div>
    <div>
        <!-- <label for="password">Mot de passe :</label>-->
        <input type="password" id="password "name="password" placeholder="Mot de passe "required><br><br>

    </div>
    
	<input id="val" type="submit" value="Valider">
</form>
<button id="retourJ" onclick="window.location.href='index.html'">Retour Menu</button>


</body>

</html>