 // Fonction de validation du formulaire
 function validerFormulaire() {
    var nom = document.getElementById("nom").value;
    var prenom = document.getElementById("prenom").value;
    var email = document.getElementById("email").value;
    var mdp = document.getElementById("mdp").value;
    var mdp_confirm = document.getElementById("mdp_confirm").value;

    // Vérification du nom et du prénom
    if (nom === "") {
        document.getElementById("erreur").textContent = "Veuillez entrer votre nom.";
        return false;
    } else {
        document.getElementById("erreur").textContent = "";
    }

    if (prenom === "") {
        document.getElementById("erreur").textContent = "Veuillez entrer votre prénom.";
        return false;
    } else {
        document.getElementById("erreur").textContent = "";
    }

    // Vérification de l'email
    if (email === "") {
        document.getElementById("erreur").textContent = "Veuillez entrer une adresse email valide.";
        return false;
    } else {
        document.getElementById("erreur").textContent = "";
    }

    // Vérification du mot de passe
    if (mdp === "") {
        document.getElementById("erreur").textContent = "Le mot de passe doit contenir au moins 8 caractères, dont au moins une lettre minuscule, une lettre majuscule et un chiffre.";
        return false;
    } else {
        document.getElementById("erreur").textContent = "";
    }

    // Vérification de la confirmation du mot de passe
    if (mdp_confirm !== mdp) {
        document.getElementById("erreur").textContent = "Les mots de passe ne sont pas identiques.";
        return false;
    } else {
        document.getElementById("erreur").textContent = "";
    }

    return true;
}



function afficherDate() {
    const maintenant = new Date(); // Obtenir la date et l'heure actuelles
    const mois = ["Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre"];
    const jour = maintenant.getDay(); // Obtenir le jour de la semaine (0-6)
    const jourMois = maintenant.getDate(); // Obtenir le jour du mois (1-31)
    const moisIndex = maintenant.getMonth(); // Obtenir le mois (0-11)
    const annee = maintenant.getFullYear(); // Obtenir l'année (ex : 2023)
    const heures = maintenant.getHours(); // Obtenir les heures (0-23)
    const minutes = maintenant.getMinutes(); // Obtenir les minutes (0-59)
    const secondes = maintenant.getSeconds(); // Obtenir les secondes (0-59)
  
    // Afficher la date et l'heure dans le format "JourSemaine, jourMois Mois Année, hh:mm:ss"
    const dateHeureAffichee = `${jourMois} ${mois[moisIndex]} ${annee}, ${heures.toString().padStart(2, '0')}:${minutes.toString().padStart(2, '0')}:${secondes.toString().padStart(2, '0')}`;
    
    document.getElementById("horloge").innerHTML = dateHeureAffichee; // Afficher la date et l'heure dans un élément HTML
  }
    //   initialisation pour l'apparation sans la premiére seconde
  afficherDate();
    //   rappel de la function toute les 1000 miliseconde = 1seconde
  setInterval(afficherDate, 1000);