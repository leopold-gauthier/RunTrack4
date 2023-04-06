<?php
require("./inc/config.php");
if (!isset($_SESSION['user'])) {
    header("Location: ./connexion.php");
}
?>

<!DOCTYPE html>
<html lang="fr-FR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
</head>

<body>
    <header>
        <?php include_once("./inc/nav-inc.php") ?>
    </header>
    <?php
    if (isset($_POST['submit'])) {
        $date = $_POST['date'];
        $message = $_POST['message'];
        $user = $_SESSION['user']['nom'];
        // Vérifier si la date est passée
        $today = date('Y-m-d H:i:s');
        if ($date < $today) {
            $error = "La date est déjà passée, vous ne pouvez plus faire de demande.";
        } else {
            $ask = $bdd->prepare("INSERT INTO demande(date,ask,name)VALUES(?,?,?)");
            $ask->execute([$date, $message, $user]);
            $success = "Votre demande a été enregistrée.";
        }
    }
    if (isset($_SESSION['user'])) {
    ?>
        <h1>Calendrier</h1>
        <p>Bienvenue <?php echo $_SESSION['user']['nom']; ?> !</p>
        <p>Veuillez choisir une date :</p>
        <form method="post">
            <input type="datetime-local" name="date">
            <p>Veuillez saisir un message :</p>
            <textarea name="message"></textarea>
            <br><br>
            <input type="submit" name="submit" value="Envoyer la demande">
            <?php
            if (isset($error)) : ?>
                <p style="color: red;"><?php echo $error; ?></p>
            <?php endif; ?>
            <?php if (isset($success)) : ?>
                <p style="color: green;"><?php echo $success; ?></p>
            <?php endif; ?>
        </form>
    <?php
    }
    var_dump($_SESSION);

    ?>
</body>

</html>