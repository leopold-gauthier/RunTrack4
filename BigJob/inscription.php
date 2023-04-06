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
        </div>
        <div class="mb-3">
            <label class="form-label" for="prenom">Prénom :</label>
            <input class="form-control" type="text" id="prenom" name="prenom">
        </div>
        <div class="mb-3">
            <label class="form-label" for="email">Email :</label>
            <input placeholder="name@example.com" class="form-control" type="email" id="email" name="email">
        </div>
        <div class="mb-3">
            <label class="form-label" for="mdp">Mot de passe :</label>
            <input class="form-control" type="password" id="mdp" name="mdp">
        </div>
        <div class="mb-3">
            <label class="form-label" for="mdp_confirm">Confirmez le mot de passe :</label>
            <input class="form-control" type="password" id="mdp_confirm" name="mdp_confirm">
        </div>
        <div class="mb-3">
            <input name="submit" type="submit" value="S'inscrire">
        </div>
        <div>
            <span class="form-label" id="erreur"></span>
        </div>
    </form>
</body>
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