<?php
require("./inc/config.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <script src="inscription.js"></script>
</head>

<body>
    <header>
        <?php include_once("./inc/nav-inc.php") ?>
    </header>
    <h1>Connexion</h1>
    <form id="connexion" method="post" action="" onsubmit="return validerFormulaire()">
        <label for="email">Email :</label>
        <input type="email" id="email" name="email">
        <span id="erreur_email"></span>
        <br>
        <label for="mdp">Mot de passe :</label>
        <input type="password" id="mdp" name="mdp">
        <span id="erreur_mdp"></span>
        <br>
        <input name="submit" type="submit" value="Se connecter">
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
                document.getElementById("erreur_email").textContent = "Veuillez entrer une adresse email ou un mot de passe valide.";
            </script>
        <?php
        }
    } else {
        ?>
        <script>
            document.getElementById("erreur_email").textContent = "Veuillez entrer une adresse email ou un mot de passe valide.";
        </script>
<?php
    }
}
var_dump($_SESSION)
?>

</html>