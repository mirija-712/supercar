<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../../css/footer.css">
    <style>
        body {
            background-image: url('https://wallpaper.forfun.com/fetch/4f/4fd56142f54f6eddf23c4cc1e8217cba.jpeg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            height: 100vh;
            margin: 0;
            padding: 0;
            color: white;
        }
        #connexion_main {
            font-family: Arial, Helvetica, sans-serif;
            color: rgb(255, 255, 255);
            size: 75px;
            background-color: rgba(0, 0, 0, 0.437);
            border-radius: 10px;
            box-shadow: 2px 2px 4px rgb(0, 0, 0);
        }

        /* Footer moderne */
        .footer {
            background: rgba(44, 62, 80, 0.95);
            color: white;
            padding: 4rem 0 2rem;
            backdrop-filter: blur(10px);
        }

        .footer h3 {
            color: #4892D7;
            margin-bottom: 1.5rem;
            font-size: 1.5rem;
        }

        .footer a {
            color: #ecf0f1;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer a:hover {
            color: #4892D7;
        }

        .footer-bottom {
            border-top: 1px solid rgba(255,255,255,0.1);
            margin-top: 2rem;
            padding-top: 2rem;
        }

        .social-icons img {
            transition: transform 0.3s ease;
            margin: 0 5px;
            height: 20px;
            width: 20px;
        }

        .social-icons img:hover {
            transform: scale(1.2);
        }
    </style>
</head>
<body>
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-md navbar-dark bg-light">
        <div class="container"> 
            <a class="navbar-brand" href="../../index.php">
                <img src="../../Logo_page/supercar.png" alt="" id="logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto text-center">
                    <li class="nav-item">
                        <a class="nav-link" href="../../index.php">ACCUEIL</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../voitures/1-0-voitures.php">VOITURES</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">DEMANDE ESSAI</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../evenement/evenement.php">EVENEMENTS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../contact/contactez-nous.php">CONTACTEZ-NOUS</a>
                    </li>
                </ul>
            </div>
            <a href="inscription_main.php" class="logo-container">
                <img src="../../icones/icone_connexion/icons8-connexion-96.png" alt="Logo">
            </a>
        </div>
    </nav>

    <section class="inscrit">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center">
                    <h1><br>SE CONNECTER À SUPERCAR</h1>
                </div>
                <div class="col-md-6" id="connexion_main">
                    <form id="formconnexion" method="POST" action="fonction_php/connexion.php">
                        <div class="mb-3">
                            <label for="username" class="form-label">Nom d'utilisateur</label>
                            <input type="text" class="form-control" id="username" name="nom_utilisateur" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Mot de passe</label>
                            <input type="password" class="form-control" id="password" name="mot_de_passe" required>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md-6">
                                <button class="btn btn-warning btn-sm" type="submit">Se connecter</button>
                            </div>
                            <div class="col-md-6">
                                <p align="right"><a href="inscription_main.php" class="btn btn-success btn-sm">S'inscrire</a></p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <?php include '../../include/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

