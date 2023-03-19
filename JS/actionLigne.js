var nc, j;

function traiterClic(button) {
    nc = button.getAttribute("data-colonne"); // On récupère la colonne du bouton
    $.ajax({ // On vérifie que le coup soit possible
        url: "validerCoup.php",
        type: "GET",
        data: {
            joueur: j,
            col: nc
        },
        success: function(response) { // Si le coup est possible on l'execute
            traiterCoup()
        }
    });
}

function traiterCoup() {

    $.ajax({ // On joue le coup
        url: "jouerCoup.php", // On va executer le script
        type: "POST", // En envoyant des valeurs en méthode POST
        data: {
            action: "jouerCoup",
            col: nc // On détaille les valeurs envoyées
        },
        success: function(response) {
            data = JSON.parse(response); // On adapte le contenu JSON
            nomJoueurOld = document.getElementById("nomJoueur").textContent; // On stock le nom du Joueur aillant joué
            if (data == "autre colonne") { // Si la colonne choisie n'est pas adapté
                alert("choisissez une autre colonne");
            } else { // Sinon on poursuit les opérations
                grille = data["grille"];
                position = data["position"];
                var div = document.querySelector('[data-ligne="' + position + '"][data-colonne="' + nc + '"]'); // On récupère la case à modifier
                div.classList.add(data["couleur"]); // On modifie la couleur de la case
                if (data['victoire'] == true) { // Si le coup fait gagner le joueur 
                    setTimeout(function() {
                        alert("La partie est gagnée par " + nomJoueurOld); // On affiche un message
                        window.location.replace("menuLigne.php"); // On redirige vers la page de démarrage
                    }, 20);
                } else { // Si le coup ne fait pas gagner
                    document.getElementById("nomJoueur").textContent = data["nomJoueur"]; // On change l'affichage pour indiquer le prochain tour
                }
            }
            $.ajax({ // On verifie que la grille n'est pas remplie
                url: "jouerCoup.php",
                type: "POST",
                data: {
                    action: "grilleRemplie"
                },
                success: function(response) {
                    data = JSON.parse(response);
                    if (data == "true") { // Si elle est remplie on arrête la partie et on redirige vers la page de démarrage
                        alert("La partie se termine sur une égalité !");
                        window.location.replace("menuLigne.php");
                    }
                }
            });
        }
    })
};

$(document).ready(function() {
    // Récupération des parties en cours via une requête AJAX
    $.ajax({
        url: "recupererPartiesEnCours.php",
        type: "GET",
        dataType: "json",
        success: function(result) {
            // Affichage des parties dans la liste
            var listeParties = $("#liste-parties");
            for (var i = 0; i < result.length; i++) {
                var partie = result[i];
                var nomJoueur1 = partie.Nom_Joueur1;
                var nomJoueur2 = partie.Nom_Joueur2;
                var statut = partie.Statut;
                var idPartie = partie.ID_partie;
                var li = $("<li>");
                var a = $("<a>").attr("href", "partieLigne.php?id_partie=" + idPartie).text(nomJoueur1 + " vs " + nomJoueur2 + " (" + statut + ")");
                li.append(a);
                listeParties.append(li);
            }
        },
        error: function() {
            alert("Une erreur est survenue lors de la récupération des parties en cours.");
        }
    });
});