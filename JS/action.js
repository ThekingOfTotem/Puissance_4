var nc, j;

function traiterClic(button) {
    nc = button.getAttribute("data-colonne");
    j = button.getAttribute("data-joueur");
    $.ajax({
        url: "validerCoup.php",
        type: "GET",
        data: {
            joueur: j, col: nc
        },
        success: function(response) {
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
            alert("partie terminée");
            window.location.replace("demarrerPartieLocal.php");
          } else {
            $.ajax({
                url: "jouerCoup.php",
                type: "POST",
                data: {
                    action:"jouerCoup", col: nc
                },
                success: function(response) {
                    data = JSON.parse(response);
                    nomJoueurOld=document.getElementById("nomJoueur").textContent;
                    if(data=="autre colonne"){
                      alert("choisissez une autre colonne");
                    }else{
                      grille=data["grille"];
                      position=data["position"];
                      var div = document.querySelector('[data-ligne="'+position+'"][data-colonne="'+nc+'"]');
                      div.classList.add(data["couleur"]);
                      if(data['victoire']==true){
                        setTimeout(function(){
                          alert("La partie est gagnée par "+nomJoueurOld);
                          window.location.replace("demarrerPartieLocal.php");
                        }, 20);
                      }else{
                        document.getElementById("nomJoueur").textContent=data["nomJoueur"];
                      }
                    }
                }
              });
          }
        }
      });
      
}