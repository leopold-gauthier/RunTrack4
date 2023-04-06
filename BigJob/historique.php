<?php
ob_start();
include("./inc/config.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require("./inc/head-inc.php") ?>
    <title>Demande</title>
</head>

<body class="m-5">
    <header>
        <?php include_once("./inc/nav-inc.php") ?>
    </header>
    <h1 class="mt-3 mb-3">Historique Présence</h1>
    <div class="m-5">
        <h2>Accepté</h2>
        <?php
        if ($_SESSION['user']['role'] == 1 || $_SESSION['user']['role'] == 2) {
            $requestaccepted = $bdd->prepare("SELECT * FROM demande WHERE accepted = 1 ORDER BY date DESC ");
            $requestaccepted->execute();
            $resultaccepted = $requestaccepted->fetchAll(PDO::FETCH_ASSOC);
            foreach ($resultaccepted as $key => $value) {
        ?>
                <div class="bg-success d-inline-flex row card p-2 border-2" style="width: 18rem;">
                    <fieldset>
                        <p><i class="fa-solid fa-calendar-days"></i> : <?= $value['date'] ?></p>
                        <p><i class="fa-solid fa-user"></i> : <?= $value['name'] ?></p>
                        <p><i class="fa-solid fa-pen-to-square"></i> : <?= $value['ask'] ?></p>
                    </fieldset>
                </div>

        <?php
            }
        } else {
            header("Location: ./connexion.php");
        }
        ?>
        <div>
            <h2>Refusé</h2>

            <?php
            if ($_SESSION['user']['role'] == 1 || $_SESSION['user']['role'] == 2) {
                $requestaccepted = $bdd->prepare("SELECT * FROM demande WHERE accepted = 2 ORDER BY date DESC ");
                $requestaccepted->execute();
                $resultaccepted = $requestaccepted->fetchAll(PDO::FETCH_ASSOC);
                foreach ($resultaccepted as $key => $value) {
            ?>
                    <div class="bg-danger d-inline-flex row card p-2 border-2" style="width: 18rem;">
                        <fieldset>
                            <p><i class="fa-solid fa-calendar-days"></i> : <?= $value['date'] ?></p>
                            <p><i class="fa-solid fa-user"></i> : <?= $value['name'] ?></p>
                            <p><i class="fa-solid fa-pen-to-square"></i> : <?= $value['ask'] ?></p>
                        </fieldset>
                    </div>

            <?php
                }
            } else {
                header("Location: ./connexion.php");
            }
            ?>

        </div>
</body>

</html>