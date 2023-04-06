<?php
ob_start();
require("./inc/config.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <?php require("./inc/head-inc.php") ?>
</head>

<body class="m-5">
    <header>
        <?php include_once("./inc/nav-inc.php") ?>
    </header>
    <h1 class="mt-3 mb-3">Inscription</h1>
    <form class="row needs-validation m-5" id="inscription" method="post" action="" onsubmit="return validerFormulaire()">
        <div>
            <label class="form-label" for="nom">Nom :</label>
            <input class="form-control" type="text" id="nom" name="nom">
            <span id="erreur_nom"></span>
        </div>
        <div class="mb-3">
            <label class="form-label" for="prenom">Prénom :</label>
            <input class="form-control" type="text" id="prenom" name="prenom">
            <span id="erreur_prenom"></span>
        </div>
        <div class="mb-3">
            <label class="form-label" for="email">Email :</label>
            <input placeholder="name@example.com" class="form-control" type="email" id="email" name="email">
            <span id="erreur_email"></span>
        </div>
        <div class="mb-3">
            <label class="form-label" for="mdp">Mot de passe :</label>
            <input class="form-control" type="password" id="mdp" name="mdp">
            <span id="erreur_mdp"></span>
        </div>
        <div class="mb-3">
            <label class="form-label" for="mdp_confirm">Confirmez le mot de passe :</label>
            <input class="form-control" type="password" id="mdp_confirm" name="mdp_confirm">
            <span id="erreur_mdp_confirm"></span>
        </div>
        <div>
            <input name="submit" type="submit" value="S'inscrire">
        </div>
    </form>
</body>



<script>
    // Fonction de validation du formulaire
    function validerFormulaire() {
        var nom = document.getElementById("nom").value;
        var prenom = document.getElementById("prenom").value;
        var email = document.getElementById("email").value;
        var mdp = document.getElementById("mdp").value;
        var mdp_confirm = document.getElementById("mdp_confirm").value;

        // Vérification du nom et du prénom
        if (nom === "") {
            document.getElementById("erreur_nom").textContent = "Veuillez entrer votre nom.";
            return false;
        } else {
            document.getElementById("erreur_nom").textContent = "";
        }

        if (prenom === "") {
            document.getElementById("erreur_prenom").textContent = "Veuillez entrer votre prénom.";
            return false;
        } else {
            document.getElementById("erreur_prenom").textContent = "";
        }

        // Vérification de l'email
        if (email === "") {
            document.getElementById("erreur_email").textContent = "Veuillez entrer une adresse email valide.";
            return false;
        } else {
            document.getElementById("erreur_email").textContent = "";
        }

        // Vérification du mot de passe
        if (mdp === "") {
            document.getElementById("erreur_mdp").textContent = "Le mot de passe doit contenir au moins 8 caractères, dont au moins une lettre minuscule, une lettre majuscule et un chiffre.";
            return false;
        } else {
            document.getElementById("erreur_mdp").textContent = "";
        }

        // Vérification de la confirmation du mot de passe
        if (mdp_confirm !== mdp) {
            document.getElementById("erreur_mdp_confirm").textContent = "Les mots de passe ne sont pas identiques.";
            return false;
        } else {
            document.getElementById("erreur_mdp_confirm").textContent = "";
        }

        return true;
    }
</script>
<?php
if (isset($_POST['submit'])) {
    $allowed_domain = 'laplateforme.io';
    $email = $_POST['email'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $mdp = $_POST['mdp'];

    // Extraire le domaine de l'adresse e-mail
    $domain = substr(strrchr($email, "@"), 1);

    // Vérifier si le domaine est autorisé
    if ($domain !== $allowed_domain) {
        // Afficher un message d'erreur et empêcher l'utilisateur de créer un compte
        header("Location: ./inscription.php");
        ob_end_flush();
    } else {
        $insertUser = $bdd->prepare("INSERT INTO utilisateur(nom,prenom,email,password)VALUES(?,?,?,?)");
        $insertUser->execute([$nom, $prenom, $email, $mdp]);
        header("Location: ./connexion.php");
        ob_end_flush();
    }
}

?>

</html>