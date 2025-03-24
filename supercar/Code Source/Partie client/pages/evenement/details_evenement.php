<?php
session_start();

if (isset($_SESSION['nom_utilisateur'])) {
    $lien_demande_essai = "../demande_essaie/demande_essai.php";
    $lien_connexion = "../login/fonction_php/deconnexion.php";
    $icone_connexion = "../../icones/icone_connexion/icons8-logout-96.png";
} else {
    $lien_demande_essai = "../login/seconnecter.php";
    $lien_connexion = "../login/inscription_main.php";
    $icone_connexion = "../../icones/icone_connexion/icons8-connexion-96.png";
}

// Vérifier si l'ID est fourni
if (!isset($_GET['id'])) {
    header('Location: evenement.php');
    exit();
}

$id_evenement = $_GET['id'];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de l'Événement - Supercar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/footer.css">
    <style>
        :root {
            --primary-color: #4892D7;
            --secondary-color: #2c3e50;
            --accent-color: #e74c3c;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('https://sxdrv.com/images/med_64c0c7931066f.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            color: white;
            min-height: 100vh;
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
            color: var(--secondary-color) !important;
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

        /* Section Détails */
        .event-details {
            padding: 4rem 0;
        }

        .event-header {
            text-align: center;
            margin-bottom: 3rem;
        }

        .event-title {
            font-size: 2.5rem;
            font-weight: 700;
            color: white;
            margin-bottom: 1rem;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }

        .event-meta {
            color: var(--primary-color);
            font-size: 1.2rem;
            margin-bottom: 2rem;
        }

        .event-image {
            width: 100%;
            max-height: 500px;
            object-fit: cover;
            border-radius: 15px;
            margin-bottom: 2rem;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }

        .event-info {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            padding: 2rem;
            margin-bottom: 2rem;
        }

        .info-item {
            display: flex;
            align-items: center;
            margin-bottom: 1rem;
            color: white;
        }

        .info-item i {
            color: var(--primary-color);
            margin-right: 1rem;
            font-size: 1.2rem;
        }

        .event-description {
            line-height: 1.8;
            color: #ecf0f1;
            margin: 2rem 0;
        }

        .participate-btn {
            display: inline-block;
            padding: 1rem 2rem;
            background: var(--primary-color);
            color: white;
            text-decoration: none;
            border-radius: 30px;
            font-weight: 600;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
        }

        .participate-btn:hover {
            background: #357abd;
            transform: translateY(-2px);
            color: white;
        }

        /* Animations */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes slideIn {
            from { transform: translateX(-20px); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }

        /* Améliorations visuelles */
        .event-image-container {
            position: relative;
            overflow: hidden;
            border-radius: 15px;
        }

        .event-image-container::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(to bottom, transparent 50%, rgba(0,0,0,0.3));
            pointer-events: none;
        }

        /* Scrollbar personnalisée */
        ::-webkit-scrollbar {
            width: 10px;
        }

        ::-webkit-scrollbar-track {
            background: rgba(255,255,255,0.1);
        }

        ::-webkit-scrollbar-thumb {
            background: var(--primary-color);
            border-radius: 5px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #357abd;
        }

        /* Effet de parallaxe */
        .parallax-section {
            position: relative;
            overflow: hidden;
        }

        .parallax-bg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-attachment: fixed;
            background-position: center;
            background-size: cover;
            z-index: -1;
        }
    </style>
</head>
<body>
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-md navbar-dark bg-light">
        <div class="container"> 
            <a class="navbar-brand" href="../../index.php">
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
                        <a class="nav-link" href="../voitures/1-0-voitures.php">VOITURES</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $lien_demande_essai; ?>">DEMANDE ESSAI</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="evenement.php">EVENEMENTS</a>
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

    <section class="event-details">
        <div class="container">
            <?php
            include ("../../include_bdd/connexion.bdd.php");

            if ($connexion->connect_error) {
                die("Connexion à la base de données échouée : " . $connexion->connect_error);
            }

            $query = "SELECT * FROM evenements WHERE id_evenement = ?";
            $stmt = $connexion->prepare($query);
            $stmt->bind_param("i", $id_evenement);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $event = $result->fetch_assoc();
                ?>
                <div class="event-header">
                    <h1 class="event-title"><?php echo htmlspecialchars($event["titre"]); ?></h1>
                    <div class="event-meta">
                        <i class="fas fa-calendar"></i> <?php echo htmlspecialchars($event["date_evenement"]); ?> à <?php echo htmlspecialchars($event["heure"]); ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-8">
                        <img src="<?php echo htmlspecialchars($event["photo"]); ?>" alt="Image de l'événement" class="event-image">
                    </div>
                    <div class="col-md-4">
                        <div class="event-info">
                            <div class="info-item">
                                <i class="fas fa-map-marker-alt"></i>
                                <span><?php echo htmlspecialchars($event["lieu"]); ?></span>
                            </div>
                            <div class="info-item">
                                <i class="fas fa-car"></i>
                                <span><?php echo htmlspecialchars($event["type_voiture"]); ?></span>
                            </div>
                            <div class="text-center mt-4">
                                <a href="../contact/contactez-nous.php" class="participate-btn">Participer à l'événement</a>
                            </div>
                            <div class="row mt-4">
                                <div class="col-12">
                                    <div class="event-description">
                                        <?php echo nl2br(htmlspecialchars($event["description"])); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

               

                <a href="evenement.php" class="back-button">
                    <i class="fas fa-arrow-left"></i>
                </a>
                <?php
            } else {
                echo '<div class="alert alert-danger text-center">Événement non trouvé.</div>';
            }

            $connexion->close();
            ?>
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
                        <li><a href="../voitures/1-0-voitures.php">Les véhicules disponibles</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h3>Modèles</h3>
                    <ul class="list-unstyled">
                        <li><a href="../voitures/1-1-bmw.php">BMW</a></li>
                        <li><a href="../voitures/1-2-mercedes.php">Mercedes-Benz</a></li>
                        <li><a href="../voitures/1-3-audi.php">Audi</a></li>
                        <li><a href="../voitures/1-4-porsche.php">Porsche</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h3>Événements</h3>
                    <ul class="list-unstyled">
                        <li><a href="evenement.php">Les événements à venir</a></li>
                    </ul>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <p>© 2023 SUPER CAR.MU - Tous droits réservés</p>
                        <p>MU.lot54 Bâtiment 4 | contact@supercar.com | +230 3215 8794</p>
                        <div class="social-icons">
                            <img src="../../icones/icone_reseau/icons8-facebook-96.png" alt="Facebook">
                            <img src="../../icones/icone_reseau/icons8-insta-96.png" alt="Instagram">
                            <img src="../../icones/icone_reseau/icons8-twitter-96.png" alt="Twitter">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</body>
</html> 