<?php
include_once("./inc/config.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <script src="inscription.js"></script>
    <?php require("./inc/head-inc.php") ?>
</head>

<body class="m-5">
    <header>
        <?php include_once("./inc/nav-inc.php") ?>
    </header>
    <h1 class="mt-3 mb-3">Connexion</h1>
    <form class="row g-3 needs-validation m-5" id="connexion" method="post" action="" onsubmit="return validerFormulaire()">
        <div>
            <label class="form-label" for="email">Email :</label>
            <input placeholder="name@example.com" class="form-control" type="email" id="email" name="email">
        </div>
        <div class="mb-3">
            <label class="form-label" for="mdp">Mot de passe :</label>
            <input class="form-control" type="password" id="mdp" name="mdp">
        </div>
        <br>
        <div class="mb-3">
            <input name="submit" type="submit" value="Se connecter">
        </div>
        <span class="form-label" id="erreur"></span>

    </form>

</body>
<?php
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $mdp = $_POST['mdp'];
    if (!empty($email) && !empty($mdp)) {
        $recupUser = $bdd->prepare("SELECT * FROM utilisateur WHERE email = ? AND password = ?");
        $recupUser->execute([$email, $mdp]);

        if ($recupUser->rowCount() > 0) {
            $recupUser = $recupUser->fetchAll(PDO::FETCH_ASSOC);
            $_SESSION['user'] = $recupUser[0];
            header("Location: ./index.php");
        } else {
?>
            <script>
                document.getElementById("erreur").textContent = "Veuillez entrer une adresse email ou un mot de passe valide.";
            </script>
        <?php
        }
    } else {
        ?>
        <script>
            document.getElementById("erreur").textContent = "Veuillez entrer une adresse email ou un mot de passe valide.";
        </script>
<?php
    }
}
?>

</html>