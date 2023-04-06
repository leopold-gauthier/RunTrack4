<?php
ob_start();
require("./inc/config.php");
if (isset($_SESSION['user']['role']) != 1 || isset($_SESSION['user']['role']) != 2) {
    header("Location: ./index.php");
    ob_end_flush();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require("./inc/head-inc.php") ?>

    <title>Vérification</title>
</head>

<body class="m-5">
    <header>
        <?php include_once("./inc/nav-inc.php") ?>
    </header>
    <h1 class="mt-3 mb-3">Autorisation de présence</h1>
    <div class="m-5">
        <?php
        if ($_SESSION['user']['role'] == 1 || $_SESSION['user']['role'] == 2) {
            $request = $bdd->prepare("SELECT * FROM demande WHERE accepted = 0 ORDER BY id DESC ");
            $request->execute();
            $result = $request->fetchAll(PDO::FETCH_ASSOC);
            foreach ($result as $key => $value) {
        ?>
                <form class="bg-body-tertiary d-inline-flex row card p-2 border-2" style="width: 14rem;" method="post">
                    <fieldset>
                        <p><i class="fa-solid fa-calendar-days"></i> : <?= $value['date'] ?></p>
                        <p><i class="fa-solid fa-user"></i> : <?= $value['name'] ?></p>
                        <p><i class="fa-solid fa-pen-to-square"></i> : <?= $value['ask'] ?></p>
                        <input class="bg-success border-0" type="submit" id="<?= $value['id'] ?>" value="Accept" name="ask_accept<?= $value['id'] ?>">
                        <input class="bg-danger border-0" type="submit" id="<?= $value['id'] ?>" value="Decline" name="ask_decline<?= $value['id'] ?>">
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
        } else {
            header("Location: ./connexion.php");
            ob_end_flush();
        }
        ?>
    </div>
</body>

</html>