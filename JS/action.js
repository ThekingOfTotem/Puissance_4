function traiterClic(nc) {
    //appeler le serv
    $.get("https://fafa.kroko.xyz/~aitbouqdir/ProjetWeb/validerCoup.php", { joueur: "1", col: nc }, traiterRepServ);

}

function traiterRepServ(data) {
    //data.grille
    //data.resultat
    //->afficher
}