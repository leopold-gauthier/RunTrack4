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
    <?php include_once("./inc/head-inc.php") ?>
    <title>Document</title>
</head>

<body class="m-5">
    <header>
        <?php include_once("./inc/nav-inc.php") ?>
    </header>
    <h1 class="mt-3 mb-3">Liste Utilisateur</h1>
    <div class="m-5">
        <?php
        if (isset($_SESSION['user']['role']) == 1 || isset($_SESSION['user']['role']) == 2) {
            $request = $bdd->prepare("SELECT * FROM utilisateur ORDER BY role DESC");
            $request->execute();
            $result = $request->fetchAll(PDO::FETCH_ASSOC);
            foreach ($result as $key => $value) {

        ?>

                <form class="bg-body-tertiary d-inline-flex row card p-2 border-2" method="POST">
                    <fieldset>
                        <p><i class="fa-solid fa-user"></i> : <?= $value['nom'] ?> / <?= $value['prenom'] ?></p>
                        <p><i class="fa-solid fa-envelope"></i> : <?= $value['email'] ?></p>
                        <?php
                        if ($_SESSION['user']['role'] > 1) {
                        ?>
                            <label><i class="fa-solid fa-user-secret"></i> : </label>
                            <div class="m-3">
                                <div class="form-check m-3">
                                    <label class="form-check-label" for="<?= $value['id'] ?>">Admin</label>
                                    <input class="form-check-input" type="radio" id="<?= $value['id'] ?>" value="2" name="role" <?php if ($value['role'] == 2) {
                                                                                                                                    echo "checked";
                                                                                                                                } ?>>
                                </div>
                                <div class="form-check m-3">
                                    <label class="form-check-label" for="<?= $value['id'] ?>">Modo</label>
                                    <input class="form-check-input" type="radio" id="<?= $value['id'] ?>" value="1" name="role" <?php if ($value['role'] == 1) {
                                                                                                                                    echo "checked";
                                                                                                                                } ?>>
                                </div>
                                <div class="form-check m-3">
                                    <label class="form-check-label" for="<?= $value['id'] ?>">Aucun</label>
                                    <input class="form-check-input" type="radio" id="<?= $value['id'] ?>" value="0" name="role" <?php if ($value['role'] == 0) {
                                                                                                                                    echo "checked";
                                                                                                                                } ?>>
                                </div>
                                <input type="submit" value="Update" name="update<?= $value['id'] ?>">
                            </div>
                        <?php
                        }
                        ?>
                    </fieldset>
                </form>

        <?php
                if (isset($_POST['update' . $value['id']])) {

                    $accept = $bdd->prepare("UPDATE utilisateur SET role = ? WHERE id = ? ");
                    $accept->execute([$_POST['role'], $value['id']]);
                    header("Location: ./user.php");
                    ob_end_flush();
                }
            }
        }

        ?>
    </div>
</body>

</html>