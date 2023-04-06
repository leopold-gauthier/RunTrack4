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