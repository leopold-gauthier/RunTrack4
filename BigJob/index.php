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
    <?php require("./inc/head-inc.php") ?>
    <title>Présence</title>
</head>

<body class="m-5">
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
        <h1 class="mt-3 mb-3">Calendrier</h1>
        <p>Bienvenue <?php echo $_SESSION['user']['nom']; ?> !</p>
        <p>Veuillez choisir une date :</p>
        <form class="row needs-validation m-5" method="post">
            <div class="mb-3">
                <label class="form-label" for="date">Choissisez votre date :</label>
                <input class="form-control" id="date" type="datetime-local" name="date">
            </div>
            <div class="mb-3">
                <label class="form-label" for="textarea">Veuillez saisir un message :</label>
                <textarea class="form-control" id="textarea" name="message"></textarea>
            </div>
            <div class="mb-3">
                <input type="submit" name="submit" value="Envoyer la demande">
            </div>
            <div>
                <?php
                if (isset($error)) : ?>
                    <p style="color: red;"><?php echo $error; ?></p>
                <?php endif; ?>
                <?php if (isset($success)) : ?>
                    <p style="color: green;"><?php echo $success; ?></p>
                <?php endif; ?>
            </div>
        </form>
    <?php
    }
    ?>
</body>

</html>