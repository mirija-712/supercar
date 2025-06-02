<?php
session_start(); // Démarrer la session

// Vérifier si l'utilisateur est connecté
if (isset($_SESSION['nom_utilisateur'])) {
    // Vérifier la durée d'inactivité
    $timeout_duration = 180; // 180 secondes (3 minutes)
    
    // Si la dernière activité est définie et que l'inactivité dépasse 3 minutes, détruire la session
    if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > $timeout_duration)) {
        session_unset(); // Supprimer toutes les variables de session
        session_destroy(); // Détruire la session
        header("Location: ../login/seconnecter.php"); // Rediriger vers la page de connexion
        exit();
    }

    // Mettre à jour le timestamp de la dernière activité
    $_SESSION['last_activity'] = time(); // Réinitialiser le temps d'activité

    // Définir les liens pour les utilisateurs connectés
    $lien_demande_essai = "../demande_essaie/demande_essai.php";
    $lien_connexion = "../login/fonction_php/deconnexion.php"; // Lien de déconnexion lorsque l'utilisateur est connecté
    $icone_connexion = "../../icones/icone_connexion/icons8-logout-96.png"; // Icône de déconnexion
} else {
    // Définir les liens pour les utilisateurs non connectés
    $lien_demande_essai = "../login/seconnecter.php";
    $lien_connexion = "../login/inscription_main.php"; // Lien d'inscription lorsque l'utilisateur n'est pas connecté
    $icone_connexion = "../../icones/icone_connexion/icons8-connexion-96.png"; // Icône de connexion
}
?><!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.css" rel="stylesheet"/>
    <link href="css/style_steve.css" type="text/css" rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../../css/footer.css">
    <title>Mercedes-Benz - Supercar</title>
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

        /* Hero Section */
        .hero-section {
            position: relative;
            height: 60vh;
            background-image: url('https://i.gaw.to/content/photos/42/82/428219-toujours-lever-la-barre.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
            margin-bottom: 4rem;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(to bottom, rgba(0,0,0,0.3), rgba(0,0,0,0.7));
        }

        .hero-content {
            position: relative;
            z-index: 2;
            max-width: 800px;
            padding: 2rem;
        }

        .hero-content h1 {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
        }

        .hero-content p {
            font-size: 1.2rem;
            margin-bottom: 2rem;
        }

        /* Section Logo */
        .logo-section {
            text-align: center;
            margin-bottom: 4rem;
        }

        .logo-section img {
            width: 100px;
            height: 100px;
            background: white;
            padding: 15px;
            border-radius: 50%;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
        }

        .logo-section img:hover {
            transform: scale(1.1);
        }

        /* Cards Section */
        .cards-section {
            padding: 4rem 0;
        }

        .card {
            border: none;
            border-radius: 15px;
            overflow: hidden;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            margin-bottom: 2rem;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        }

        .card-img-top {
            height: 200px;
            object-fit: cover;
        }

        .card-body {
            padding: 1.5rem;
        }

        .card-title {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 1rem;
            color: var(--secondary-color);
        }

        .card-text {
            color: #666;
            margin-bottom: 1.5rem;
        }

        .btn {
            padding: 0.5rem 1.2rem;
            border-radius: 20px;
            font-weight: 500;
            transition: all 0.2s ease;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-size: 0.85rem;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        .btn-success {
            background: linear-gradient(45deg, #D4AF37, #C5A028);
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: white;
        }

        .btn-success:hover {
            background: linear-gradient(45deg, #C5A028, #D4AF37);
            box-shadow: 0 2px 12px rgba(212, 175, 55, 0.3);
        }

        .btn-primary {
            background: linear-gradient(45deg, #1a1a1a, #2c2c2c);
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: white;
        }

        .btn-primary:hover {
            background: linear-gradient(45deg, #2c2c2c, #1a1a1a);
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.2);
        }

        .btn:active {
            transform: translateY(1px);
            box-shadow: 0 1px 4px rgba(0,0,0,0.1);
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
    </style>
</head>
<body>
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-md navbar-dark bg-light">
        <div class="container"> 
            <a class="navbar-brand" href="#">
                <img src="../../Logo_page/supercar.png" alt="Supercar Logo" id="logo">
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
                        <a class="nav-link" href="1-0-voitures.php">VOITURES</a>
                    </li>
                    <li>
                        <a class="nav-link" href="<?php echo $lien_demande_essai; ?>">DEMANDE ESSAI</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../evenement/evenement.php">EVENEMENTS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../contact/contactez-nous.php">CONTACTEZ-NOUS</a>
                    </li>
                </ul>
            </div>

            <a href="<?php echo $lien_connexion; ?>" class="logo-container">
                <img src="<?php echo $icone_connexion; ?>" alt="Connexion">
            </a> 
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="hero-content">
            <h1>"Le meilleur ou rien"</h1>
            <p>Découvrez notre collection de Mercedes-Benz</p>
        </div>
    </section>

    <!-- Logo Section -->
    <section class="logo-section">
        <a href="1-0-voitures.php">
            <img src="icone_marque/icons8-mercedes-48.png" alt="Mercedes Logo">
        </a>
    </section>

    <!-- Cards Section -->
    <section class="cards-section">
        <div class="container">
            <div class="row g-4">
                <?php
                include("../../include_bdd/connexion.bdd.php");

                if ($connexion->connect_error) {
                    die("Connexion à la base de données échouée : " . $connexion->connect_error);
                }

                $query = "SELECT * FROM voitures WHERE marque='MERCEDES'";
                $result = $connexion->query($query);

                if ($result->num_rows > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<div class="col-lg-3 col-md-4 col-sm-6">';
                        echo '<div class="card">';
                        echo '<img src="' . $row["photo_1"] . '" class="card-img-top" alt="' . $row["nom_modele"] . '">';
                        echo '<div class="card-body">';
                        echo '<h5 class="card-title">' . $row["nom_modele"] . '</h5>';
                        echo '<p class="card-text">Prix : <strong>$' . $row["prix"] . '</strong></p>';
                        echo '<div class="d-flex justify-content-between">';
                        
                        if (isset($_SESSION['nom_utilisateur'])) {
                            echo '<a href="../demande_essaie/demande_essai.php" class="btn btn-success">Demande essai</a>';
                        } else {
                            echo '<a href="../login/inscription_main.php" class="btn btn-success">Demande essai</a>';
                        }
                        
                        echo '<a href="affichage_details.php?id=' . $row['id_voiture'] . '" class="btn btn-primary">Voir plus</a>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    }
                } else {
                    echo '<div class="col-12 text-center">';
                    echo '<p class="text-muted">Aucune voiture Mercedes n\'a été trouvée.</p>';
                    echo '</div>';
                }

                $connexion->close();
                ?>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h3>Accès rapide</h3>
                    <ul class="list-unstyled">
                        <li><a href="<?php echo $lien_demande_essai; ?>">Demande d'essai</a></li>
                        <li><a href="../contact/contactez-nous.php">Contact</a></li>
                        <li><a href="#">Les véhicules disponibles</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h3>Modèles</h3>
                    <ul class="list-unstyled">
                        <li><a href="1-1-bmw.php">BMW</a></li>
                        <li><a href="1-2-mercedes.php">Mercedes-Benz</a></li>
                        <li><a href="1-3-audi.php">Audi</a></li>
                        <li><a href="1-4-porsche.php">Porsche</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h3>Événements</h3>
                    <ul class="list-unstyled">
                        <li><a href="../evenement/evenement.php">Les événements à venir</a></li>
                    </ul>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <p>© 2023 SUPER CAR.MU - Tous droits réservés</p>
                        <p>MU.lot54 Bâtiment 4 | contact@supercar.com | +230 3215 8794</p>
                        <div class="social-icons">
                            <img src="../../icones/icone_reseau/icons8-facebook-96.png" alt="Facebook" height="30">
                            <img src="../../icones/icone_reseau/icons8-insta-96.png" alt="Instagram" height="30">
                            <img src="../../icones/icone_reseau/icons8-twitter-96.png" alt="Twitter" height="30">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>