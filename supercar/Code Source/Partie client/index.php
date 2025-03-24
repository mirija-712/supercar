<?php
session_start(); // Démarrer la session

// Inclusion du fichier de connexion à la base de données
include 'include_bdd/connexion.bdd.php';

// Vérifier si l'utilisateur est connecté
if (isset($_SESSION['nom_utilisateur'])) {
    $lien_demande_essai = "pages/demande_essaie/demande_essai.php";
    $lien_connexion = "pages/login/fonction_php/deconnexion.php";
    $icone_connexion = "icones/icone_connexion/icons8-logout-96.png";
} else {
    $lien_demande_essai = "pages/login/seconnecter.php";
    $lien_connexion = "pages/login/inscription_main.php";
    $icone_connexion = "icones/icone_connexion/icons8-connexion-96.png";
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil - Supercar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/footer.css">
    <style>
        :root {
            --primary-color: #4892D7;
            --secondary-color: #2c3e50;
            --accent-color: #e74c3c;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
        }

        /* Navbar moderne */
        .navbar {
            background: rgba(255, 255, 255, 0.95) !important;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 1rem 0;
        }

        .navbar-brand img {
            transition: transform 0.3s ease;
        }

        .navbar-brand img:hover {
            transform: scale(1.1);
        }

        .nav-link {
            position: relative;
            padding: 0.5rem 1rem;
            transition: all 0.3s ease;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: 0;
            left: 50%;
            background-color: var(--primary-color);
            transition: all 0.3s ease;
            transform: translateX(-50%);
        }

        .nav-link:hover::after {
            width: 100%;
        }

        /* Section principale */
        .main {
            position: relative;
            height: 100vh;
            overflow: hidden;
        }

        .main video {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1;
        }

        .main .titre {
            color: white;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            font-size: 3.5rem;
            font-weight: bold;
            margin-top: 20vh;
        }

        /* Section des marques */
        .marques-section {
            padding: 4rem 0;
            background: white;
        }

        .marque-card {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            text-align: center;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            margin-bottom: 2rem;
        }

        .marque-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        }

        .marque-card img {
            width: 80px;
            height: 80px;
            margin-bottom: 1rem;
        }

        .marque-card a {
            text-decoration: none;
            color: inherit;
        }

        .marque-card h4 {
            margin-top: 1rem;
            color: var(--secondary-color);
            font-weight: 600;
        }

        /* Sections voitures */
        .voiture-section {
            position: relative;
            height: 400px;
            margin: 2rem auto;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            width: 90%;
            max-width: 1200px;
        }

        .voiture-content {
            position: relative;
            z-index: 2;
            color: white;
            padding: 2rem;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            background: rgba(0, 0, 0, 0.2);
            backdrop-filter: blur(5px);
        }

        /* Footer moderne */
        .footer {
            background: var(--secondary-color);
            color: white;
            padding: 4rem 0 2rem;
        }

        .footer h3 {
            color: var(--primary-color);
            margin-bottom: 1.5rem;
            font-size: 1.5rem;
        }

        .footer a {
            color: #ecf0f1;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer a:hover {
            color: var(--primary-color);
        }

        .social-icons img {
            transition: transform 0.3s ease;
        }

        .social-icons img:hover {
            transform: scale(1.2);
        }

        .footer-bottom {
            border-top: 1px solid rgba(255,255,255,0.1);
            margin-top: 2rem;
            padding-top: 2rem;
        }

        /* Suppression des effets de survol des vidéos */
        .zoomable-video {
            border: 8px solid #E2E2E2;
        }

        .zoomable-video:hover {
            border-color: #4cbdda;
        }
    </style>
</head>
<body>
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-md navbar-dark bg-light">
        <div class="container"> 
            <a class="navbar-brand" href="#">
                <img src="Logo_page/supercar.png" alt="Supercar Logo" id="logo">
            </a>
    
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
    
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto text-center">
                    <li class="nav-item">
                        <a class="nav-link" href="#">ACCUEIL</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pages/voitures/1-0-voitures.php">VOITURES</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $lien_demande_essai; ?>">DEMANDE ESSAI</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pages/evenement/evenement.php">EVENEMENTS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pages/contact/contactez-nous.php">CONTACTEZ-NOUS</a>
                    </li>
                </ul>
            </div>
    
            <a href="<?php echo $lien_connexion; ?>" class="logo-container">
                <img src="<?php echo $icone_connexion; ?>" alt="Connexion">
            </a>
        </div>
    </nav>
    
    <!-- SECTION PRINCIPALE -->
    <section class="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1 class="titre">
                        <?php
                            $sql = "SELECT * FROM accueil WHERE id_partie = 0";
                            $result = $connexion->query($sql);
                            if ($result !== null && $result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo $row["titre"];
                                }
                            }
                        ?>
                    </h1>
                </div>
            </div>
        </div>

        <video autoplay loop muted>
            <?php
                $sql = "SELECT * FROM accueil WHERE id_partie = 0";
                $result = $connexion->query($sql);
                if ($result !== null && $result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<source src='mp4/".$row["video"]."' type='video/mp4'>";
                    }
                }
            ?>        
        </video>
    </section>

    <!-- SECTION DES MARQUES -->
    <div class="marques-section">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="marque-card">
                        <a href="#mod">
                            <img src="icones/icone-deco/icons8-voiture-100.png" alt="Voitures">
                            <h4>VOITURES</h4>
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="marque-card">
                        <a href="#ev">
                            <img src="icones/icone-deco/icons8-bookmark-book-128.png" alt="Événements">
                            <h4>EVENEMENTS</h4>
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="marque-card">
                        <a href="#qsn">
                            <img src="icones/icone-deco/icons8-groupe-d'utilisateurs-80.png" alt="Qui sommes-nous">
                            <h4>QUI SOMMES-NOUS ?</h4>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- SECTION DEMANDE D'ESSAI -->
    <section class="accueil-demande-essaie">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <?php
                        $sql = "SELECT * FROM accueil WHERE id_partie = 1";
                        $result = $connexion->query($sql);
                        if ($result !== null && $result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<h3><strong>" . $row["titre"] . "</strong></h3>";
                                echo "<p>" . $row["texte"] . "</p>";
                            }
                        }
                    ?>
                </div>
            </div>
        </div>

        <div class="container mt-4">
            <div class="row">
                <div class="col-md-12 text-center">
                    <a href="pages/login/seconnecter.php">
                        <video autoplay loop muted class="zoomable-video">
                            <?php
                                $sql = "SELECT * FROM accueil WHERE id_partie = 1";
                                $result = $connexion->query($sql);
                                if ($result !== null && $result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<source src='mp4/".$row["video"]."' type='video/mp4'>";
                                    }
                                }
                            ?>        
                        </video>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION VOITURES -->
    <section class="voitures-section" id="mod">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <?php
                        $sql = "SELECT * FROM accueil WHERE id_partie = 2";
                        $result = $connexion->query($sql);
                        if ($result !== null && $result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<h3><strong>" . $row["titre"] . "</strong></h3>";
                                echo "<p>" . $row["texte"] . "</p>";
                            }
                        }
                    ?>
                </div>
            </div>
        </div>

        <!-- MERCEDES -->
        <section class="voiture-section" id="mercedes">
            <div class="voiture-content">
                <a href="pages/voitures/1-2-mercedes.php">
                    <video autoplay loop muted class="zoomable-video">
                        <?php
                            $sql = "SELECT * FROM accueil WHERE id_partie = 3";
                            $result = $connexion->query($sql);
                            if ($result !== null && $result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<source src='mp4/".$row["video"]."' type='video/mp4'>";
                                }
                            }
                        ?>        
                    </video>
                </a>
            </div>
        </section>

        <!-- BMW -->
        <section class="voiture-section" id="bmw">
            <div class="voiture-content">
                <a href="pages/voitures/1-1-bmw.php">
                    <video autoplay loop muted class="zoomable-video">
                        <?php
                            $sql = "SELECT * FROM accueil WHERE id_partie = 4";
                            $result = $connexion->query($sql);
                            if ($result !== null && $result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<source src='mp4/".$row["video"]."' type='video/mp4'>";
                                }
                            }
                        ?>        
                    </video>
                </a>
            </div>
        </section>

        <!-- PORSCHE -->
        <section class="voiture-section" id="porsche">
            <div class="voiture-content">
                <a href="pages/voitures/1-4-porsche.php">
                    <video autoplay loop muted class="zoomable-video">
                        <?php
                            $sql = "SELECT * FROM accueil WHERE id_partie = 5";
                            $result = $connexion->query($sql);
                            if ($result !== null && $result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<source src='mp4/".$row["video"]."' type='video/mp4'>";
                                }
                            }
                        ?>        
                    </video>
                </a>
                <div class="container mt-4">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <?php
                                $sql = "SELECT * FROM accueil WHERE id_partie = 5";
                                $result = $connexion->query($sql);
                                if ($result !== null && $result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<h3><strong>" . $row["titre"] . "</strong></h3>";
                                        echo "<p>" . $row["texte"] . "</p>";
                                    }
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- AUDI -->
        <section class="voiture-section" id="audi">
            <div class="voiture-content">
                <a href="pages/voitures/1-3-audi.php">
                    <video autoplay loop muted class="zoomable-video">
                        <?php
                            $sql = "SELECT * FROM accueil WHERE id_partie = 6";
                            $result = $connexion->query($sql);
                            if ($result !== null && $result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<source src='mp4/".$row["video"]."' type='video/mp4'>";
                                }
                            }
                        ?>        
                    </video>
                </a>
            </div>
        </section>
    </section>

    <!-- SECTION ÉVÉNEMENTS -->
    <section class="evenements-section" id="ev">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <?php
                        $sql = "SELECT * FROM accueil WHERE id_partie = 7";
                        $result = $connexion->query($sql);
                        if ($result !== null && $result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<h3><strong>" . $row["titre"] . "</strong></h3>";
                                echo "<p>" . $row["texte"] . "</p>";
                            }
                        }
                    ?>
                </div>
            </div>
        </div>

        <div class="container mt-4">
            <div class="row">
                <div class="col-md-6">
                    <a href="pages/evenement/evenement.php">
                        <?php
                            $sql = "SELECT * FROM accueil WHERE id_partie = 7";
                            $result = $connexion->query($sql);
                            if ($result !== null && $result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<img src='pages/evenement/images/".$row["img"]."' class='zoomable-image' style='width: 100%; height: auto;'>";
                                }
                            }
                        ?>
                    </a>
                </div>
                <div class="col-md-6">
                    <a href="pages/evenement/evenement.php">
                        <?php
                            $sql = "SELECT * FROM accueil WHERE id_partie = 7";
                            $result = $connexion->query($sql);
                            if ($result !== null && $result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<img src='pages/evenement/images/".$row["img2"]."' class='zoomable-image' style='width: 100%; height: auto;'>";
                                }
                            }
                        ?>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION QUI SOMMES-NOUS -->
    <section class="qsn-section" id="qsn">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <?php
                        $sql = "SELECT * FROM accueil WHERE id_partie = 13";
                        $result = $connexion->query($sql);
                        if ($result !== null && $result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<h1>" . $row["titre"] . "</h1>";
                            }
                        }
                    ?>
                </div>
            </div>

            <div class="row mt-4">
                <?php
                    for ($i = 8; $i <= 10; $i++) {
                        $sql = "SELECT * FROM accueil WHERE id_partie = " . $i;
                        $result = $connexion->query($sql);
                        if ($result !== null && $result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<div class='col-md-4'>";
                                echo "<div class='qsn-card'>";
                                echo "<h3><strong>" . $row["titre"] . "</strong></h3>";
                                echo "<p>" . $row["texte"] . "</p>";
                                echo "</div>";
                                echo "</div>";
                            }
                        }
                    }
                ?>
            </div>
        </div>
    </section>

    <!-- SECTION CONTACT -->
    <section class="contact-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <?php
                        $sql = "SELECT * FROM accueil WHERE id_partie = 12";
                        $result = $connexion->query($sql);
                        if ($result !== null && $result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<h3><strong>" . $row["titre"] . "</strong></h3>";
                                echo "<p>" . $row["texte"] . "</p>";
                            }
                        }
                    ?>
                </div>
                <div class="col-md-6">
                    <a href="pages/contact/contactez-nous.php">
                        <?php
                            $sql = "SELECT * FROM accueil WHERE id_partie = 12";
                            $result = $connexion->query($sql);
                            if ($result !== null && $result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<img src='".$row["img"]."' class='zoomable-image' style='width: 100%; height: auto;'>";
                                }
                            }
                        ?>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h3>Accès rapide</h3>
                    <ul class="list-unstyled">
                        <li><a href="<?php echo $lien_demande_essai; ?>">Demande d'essai</a></li>
                        <li><a href="pages/contact/contactez-nous.php">Contact</a></li>
                        <li><a href="pages/voitures/1-0-voitures.php">Les véhicules disponibles</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h3>Modèles</h3>
                    <ul class="list-unstyled">
                        <li><a href="pages/voitures/1-1-bmw.php">BMW</a></li>
                        <li><a href="pages/voitures/1-2-mercedes.php">Mercedes-Benz</a></li>
                        <li><a href="pages/voitures/1-3-audi.php">Audi</a></li>
                        <li><a href="pages/voitures/1-4-porsche.php">Porsche</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h3>Événements</h3>
                    <ul class="list-unstyled">
                        <li><a href="pages/evenement/evenement.php">Les événements à venir</a></li>
                    </ul>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <p>© 2023 SUPER CAR.MU - Tous droits réservés</p>
                        <p>MU.lot54 Bâtiment 4 | contact@supercar.com | +230 3215 8794</p>
                        <p>
                            | <a href="pages/politique de confidentialité/politique_de_confidentialite.php">Politique de confidentialité</a> |
                            | <a href="pages/politique de confidentialité/gerer_cookies.php">Gérer vos cookies</a> |
                            | <a href="pages/politique de confidentialité/mentions_legales.php">Mentions légales</a> |
                            | <a href="pages/politique de confidentialité/condition_d'utilisation.php">Conditions d'utilisation</a> |
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <?php
    $connexion->close();
    ?>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


