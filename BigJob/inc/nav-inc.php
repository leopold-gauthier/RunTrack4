<nav>
    <?php
    if (isset($_SESSION['user'])) { ?>
        <a href="./index.php">Accueil</a>
        <a href="./deconnexion.php">Exit</a>
    <?php
    } else {
    ?>
        <a href="./inscription.php">Inscription</a>
        <a href="./connexion.php">Connexion</a>
    <?php
    }
    if (isset($_SESSION['user']['role']) == 1 || isset($_SESSION['user']['role']) == 2) { ?>
        <a href="./verification.php">Vérification</a>
        <a href="./user.php">Users</a>
    <?php
    }
    ?>

</nav>