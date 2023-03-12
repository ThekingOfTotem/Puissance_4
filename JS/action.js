var nc, j;

function traiterClic(button) {
    console.log(" traiterClic ");
    nc = button.getAttribute("data-colonne");
    j = button.getAttribute("data-joueur");
    //appeler le serv
    $.get("validerCoup.php", { joueur: j, col: nc }, traiterRepServ);


}

function traiterRepServ(data) {
    console.log("colonne " + nc);
    console.log("joueur " + j);
    console.log(data);
    //data.grille
    //data.resultat
    //->afficher
}