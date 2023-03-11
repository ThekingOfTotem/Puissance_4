function traiterClic(nc) {
    //appeler le serv
    $.get("/validerCoup.php", { joueur: "1", col: nc }, traiterRepServ);

}

function traiterRepServ(data) {
    console.log("colonne" + nc);
    //data.grille
    //data.resultat
    //->afficher
}