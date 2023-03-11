var nc, j;

function traiterClic(button) {
    nc = button.getAttribute("date-colonne");
    j = button.getAttribute("date-joueur");
    //appeler le serv
    $.get("validerCoup.php", { joueur: j, col: nc }, traiterRepServ);

}

function traiterRepServ(data) {
    console.log("colonne " + nc);
    console.log("joueur " + j);
    //data.grille
    //data.resultat
    //->afficher
}