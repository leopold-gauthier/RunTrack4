<nav class=" navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">BigJob</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
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
    </div>
</nav>