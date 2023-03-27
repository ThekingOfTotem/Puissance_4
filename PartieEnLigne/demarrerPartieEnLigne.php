<?php
?>
<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title>Puissance 4</title>
    <link href="/Puissance_4/CSS/indexStyle.css" rel="stylesheet" />
    <link rel="shortcut icon" type="image/png" href="/Puissance_4/Image/favicon.png">
    <script src="/Puissance_4/JS/jquery-3.6.3.min.js"></script>
    <script src="/Puissance_4/JS/actionLigne.js"></script>
</head>


<body>
    <IMG class="displayed" src="/Puissance_4/Image/logo.png">
    <div id="block_button_ligne">
    <button id="jaune" onclick="window.location.href='/Puissance_4/PartieEnLigne/creerPartieLigne.php'">Créer une partie</button>
    </div>

    <div id="parties-en-cours">
        <p id="titre-liste">Liste des parties en cours :</p>
    <ul id="liste-parties"></ul>

    <button id="retourJ" onclick="window.location.href='/Puissance_4/PartieEnLigne/afficherMenuEnLigne.php'">Retour Menu</button>

</div>
</body>

</html>