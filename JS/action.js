var nc, j;

function traiterClic(button) {
    console.log(" traiterClic ");
    nc = button.getAttribute("data-colonne");
    j = button.getAttribute("data-joueur");
    //appeler le serv
    $.get("validerCoup.php", { joueur: j, col: nc }, traiterCoup);
}

function traiterCoup() {
    $.ajax({
        url: "jouerCoup.php",
        type: "POST",
        data: {
          action: "grilleRempli"
        },
        success: function(response) {
          if (response == true) {
            console.log("partie gagnée");
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