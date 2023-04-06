<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand fs-1 m-2" href="https://github.com/leopold-gauthier" target="_blank"><i class="fa-brands fa-github"></i></a>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <?php
                if (isset($_SESSION['user'])) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="./index.php">Présence</a>
                    </li>
                    <?php
                    if ($_SESSION['user']['role'] >= 1) { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="./verification.php">Vérification</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="./user.php">Utilisateurs</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="./historique.php">Historique de présence</a>
                        </li>
                    <?php
                    } else {
                    }
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="./deconnexion.php"><i class="fa-solid fa-right-from-bracket"></i></a>
                    </li>
                <?php
                } else {
                ?>
                    <li class="nav-item">
                        <a class="nav-link" href="./inscription.php">Inscription</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="./connexion.php">Connexion</a>
                    </li>

                <?php
                }
                ?>


            </ul>
        </div>
        <p id="horloge" class="navbar-brand align-baseline fs-6">
        </p>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>