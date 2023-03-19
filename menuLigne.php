<?php
session_start();
if (isset($_SESSION['pseudo'])) {
    $nomJoueurConnecte = $_SESSION['pseudo'];
?>
    <!DOCTYPE html>

    <head>
        <meta charset="UTF-8">
        <title>Puissance 4</title>
        <link href="CSS/indexStyle.css" rel="stylesheet" />
        <link rel="shortcut icon" type="image/png" href="favicon.png">
        <script src="JS/jquery-3.6.3.min.js"></script>
        <script src="JS/actionLigne.js"></script>
        <script>
            var nomJoueurConnecte = "<?php echo $nomJoueurConnecte; ?>";
            console.log(nomJoueurConnecte);
        </script>
    </head>


    <body>
        <IMG class="displayed" src="logo.png">
        <p id="titre">Bienvenue <?php echo $_SESSION['pseudo']; ?></p>
        <div id="block_button">
            <button id="jaune" onclick="window.location.href='profil.php'">Voir le profil</button>
            <button id="rouge" onclick="window.location.href='demarrerPartieLigne.php'">Trouver une partie</button>
        </div>
        <button id="retourJ" onclick="window.location.href='connexionForm.php'">Retour Menu</button>

    </body>

    </html>
<?php
} else {
    header("location:connexionForm.php"); 
    exit(); 
}
?>