function traiterClic(nc) {
    //appeler le serv
    $.get("/validerCoup.php", { joueur: "1", col: nc }, traiterRepServ);

}

function traiterRepServ(data) {
    //data.grille
    //data.resultat
    //->afficher
}