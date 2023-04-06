<?php
require("./inc/config.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <header>
        <?php include_once("./inc/nav-inc.php") ?>
    </header>
    <?php
    if (isset($_SESSION['user']['role']) == 1 || isset($_SESSION['user']['role']) == 2) {
        $request = $bdd->prepare("SELECT * FROM utilisateur ");
        $request->execute();
        $result = $request->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $key => $value) {
    ?>
            <form method="post">
                <fieldset>
                    <p>User : <?= $value['nom'] ?> / <?= $value['prenom'] ?></p>
                    <p>Role : <?= $value['role'] ?></p>
                    <p>Email : <?= $value['email'] ?></p>
                    <?php
                    if ($_SESSION['user']['role'] == 2) {
                    ?>
                        <label for="<?= $value['id'] ?>">Admin</label>
                        <input type="radio" id="<?= $value['id'] ?>" value="2" name="role">
                        <label for="<?= $value['id'] ?>">Modo</label>
                        <input type="radio" id="<?= $value['id'] ?>" value='1' name="role">
                        <label for="<?= $value['id'] ?>">Aucun</label>
                        <input type="radio" id="<?= $value['id'] ?>" value="0" name="role">
                        <input type="submit" id="<?= $value['id'] ?>" value="Update" name="update<?= $value['id'] ?>">
                    <?php } ?>
                </fieldset>
            </form>

    <?php
            if (isset($_POST['update' . $value['id']])) {

                $accept = $bdd->prepare("UPDATE utilisateur SET role = ? WHERE id = ? ");
                $accept->execute([$_POST['role'], $value['id']]);
                header("Location: ./user.php");
            }
        }
    }
    ?>
</body>

</html>