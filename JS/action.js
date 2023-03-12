var nc, j;

function traiterClic(button) {
    console.log(" traiterClic ");
    nc = button.getAttribute("data-colonne");
    j = button.getAttribute("data-joueur");
    //appeler le serv
    //$.get("validerCoup.php", { joueur: j, col: nc }, traiterCoup);
    $.ajax({
        url: "validerCoup.php",
        type: "GET",
        data: {
            joueur: j, col: nc
        },
        success: function(response) {
          //mettre à jour le nom du joueur
          console.log(response)
          traiterCoup()
        }
      });
}

function traiterCoup() {
    $.ajax({
        url: "jouerCoup.php",
        type: "POST",
        data: {
          action: "grilleRemplie"
        },
        success: function(response) {
          if (response == true) {
            console.log("partie terminée");
          } else {
            $.ajax({
                url: "jouerCoup.php",
                type: "POST",
                data: {
                    action:"jouerCoup", col: nc
                },
                success: function(response) {
                    data = JSON.parse(response)
                    document.getElementById("nomJoueur").textContent=data["nomJoueur"]
                    grille=data["grille"]
                    position=data["position"]
                    var div = document.querySelector('[data-ligne="'+position+'"][data-colonne="'+nc+'"]');
                    div.classList.add(data["couleur"]);
                    console.log(data);
                }
              });
          }
        }
      });
}

function traiterVictoire(data) {
    console.log("colonne " + nc);
    console.log("joueur " + j);
    console.log(data);
    //data.grille
    //data.resultat
    //->afficher
}