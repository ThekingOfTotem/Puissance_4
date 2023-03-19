var nc, j;

function traiterClic(button) {
  nc = button.getAttribute("data-colonne"); // On récupère la colonne du bouton
  $.ajax({ // On vérifie que le coup soit possible
    url: "validerCoup.php",
    type: "GET",
    data: {
      joueur: j, col: nc
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
      action:"jouerCoup", col: nc // On détaille les valeurs envoyées
    },
    success: function(response) {
      data = JSON.parse(response); // On adapte le contenu JSON
      nomJoueurOld=document.getElementById("nomJoueur").textContent; // On stock le nom du Joueur aillant joué
      if(data=="autre colonne"){ // Si la colonne choisie n'est pas adapté
        alert("choisissez une autre colonne");
      }else{ // Sinon on poursuit les opérations
        grille=data["grille"];
        position=data["position"];
        var div = document.querySelector('[data-ligne="'+position+'"][data-colonne="'+nc+'"]'); // On récupère la case à modifier
        div.classList.add(data["couleur"]); // On modifie la couleur de la case
        if(data['victoire']==true){ // Si le coup fait gagner le joueur 
          setTimeout(function(){
            alert("La partie est gagnée par "+nomJoueurOld); // On affiche un message
            window.location.replace("demarrerPartieLocal.php"); // On redirige vers la page de démarrage
          }, 20);
        }else{ // Si le coup ne fait pas gagner
          document.getElementById("nomJoueur").textContent=data["nomJoueur"]; // On change l'affichage pour indiquer le prochain tour
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
            window.location.replace("demarrerPartieLocal.php");
          }
        }
      });
    }
  })
};