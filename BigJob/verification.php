<?php
require("./inc/config.php");
if (isset($_SESSION['user']['role']) != 1 || isset($_SESSION['user']['role']) != 2) {
    header("Location: ./index.php");
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vérification</title>
</head>

<body>
    <header>
        <?php include_once("./inc/nav-inc.php") ?>
    </header>
    <?php

    if (isset($_SESSION['user']['role']) == 1 || isset($_SESSION['user']['role']) == 2) {
        $request = $bdd->prepare("SELECT * FROM demande WHERE accepted = 0 ");
        $request->execute();
        $result = $request->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $key => $value) {
    ?>
            <form method="post">
                <fieldset>
                    <p>Date :<?= $value['date'] ?></p>
                    <p>Editeur :<?= $value['name'] ?></p>
                    <p>Demande :<?= $value['ask'] ?></p>
                    <input type="submit" id="<?= $value['id'] ?>" value="Accept" name="ask_accept<?= $value['id'] ?>">
                    <input type="submit" id="<?= $value['id'] ?>" value="Decline" name="ask_decline<?= $value['id'] ?>">
                </fieldset>
            </form>

    <?php
            if (isset($_POST['ask_accept' . $value['id']])) {
                $accept = $bdd->prepare("UPDATE demande SET accepted = ? WHERE id = ? ");
                $accept->execute([1, $value['id']]);
                header("Location: ./verification.php");
            } elseif (isset($_POST['ask_decline' . $value['id']])) {
                $accept = $bdd->prepare("UPDATE demande SET accepted = ? WHERE id = ?");
                $accept->execute([2, $value['id']]);
                header("Location: ./verification.php");
            }
        }
    }
    ?>
</body>

</html>