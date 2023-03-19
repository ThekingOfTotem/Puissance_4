<?php
?>
<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title>Puissance 4</title>
    <link href="CSS/indexStyle.css" rel="stylesheet" />
    <link rel="shortcut icon" type="image/png" href="favicon.png">
    <script src="JS/jquery-3.6.3.min.js"></script>
    <script src="JS/actionLigne.js"></script>
</head>


<body>
    <IMG class="displayed" src="logo.png">
    <div id="block_button_ligne">
    <button id="jaune" onclick="window.location.href='creerPartieLigne.php'">Créer une partie</button>
    </div>

    <div id="parties-en-cours">
        <h2>Liste des parties en cours</h2>
    <ul id="liste-parties"></ul>

    <button id="retourJ" onclick="window.location.href='menuLigne.php'">Retour Menu</button>

</div>
</body>

</html>