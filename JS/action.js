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
          data=response.data //mettre à jour le nom du joueur
          document.getElementById("nomJoueur").textContent=data
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
            jouerCoup($grille,nc);
          }
        }
      });
}

function traiterRepServ(data) {
    console.log("colonne " + nc);
    console.log("joueur " + j);
    console.log(data);
    //data.grille
    //data.resultat
    //->afficher
}