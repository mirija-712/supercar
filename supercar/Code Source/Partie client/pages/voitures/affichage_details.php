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
<html lang="en">
<head>
    <m<html lang="fr">
<head>
    <link href="css/bootstrap.css" rel="stylesheet"/>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/style_steve.css" type="text/css" rel="stylesheet"/>
    <link rel="stylesheet" href="../../css/footer.css">
    <title>Détails Voiture - Supercar</title>
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

        /* Section Détails */
        .details-section {
            padding: 4rem 0;
            background: white;
        }

        .car-title {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--secondary-color);
            margin-bottom: 2rem;
            text-align: center;
        }

        .specs-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            margin-bottom: 3rem;
        }

        .spec-item {
            background: white;
            padding: 1.5rem;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .spec-item:hover {
            transform: translateY(-5px);
        }

        .spec-item img {
            width: 40px;
            height: 40px;
            object-fit: contain;
        }

        .spec-item b {
            color: var(--secondary-color);
            font-size: 1.1rem;
        }

        .car-description {
            background: #f8f9fa;
            padding: 2rem;
            border-radius: 15px;
            margin: 2rem 0;
            line-height: 1.6;
            color: #666;
        }

        /* Carousel */
        .carousel-section {
            margin: 3rem 0;
        }

        .carousel {
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        .carousel-item img {
            height: 500px;
            object-fit: cover;
        }

        .carousel-indicators {
            bottom: 20px;
        }

        .carousel-indicators button {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            margin: 0 5px;
            background-color: rgba(255,255,255,0.5);
        }

        .carousel-indicators button.active {
            background-color: var(--primary-color);
        }

        /* Bouton d'essai */
        .test-drive-btn {
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
            text-align: center;
            margin: 2rem 0;
        }

        .test-drive-btn:hover {
            background: #357abd;
            transform: translateY(-2px);
            color: white;
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Détails du véhicule - Supercar</title>
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

    <?php
    include('../../include_bdd/connexion.bdd.php');

    if (isset($_GET['id'])) {
        $id_voiture = $_GET['id'];

        $query = "SELECT * FROM voitures WHERE id_voiture = ?";
        if ($stmt = $connexion->prepare($query)) {
            $stmt->bind_param("i", $id_voiture);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                ?>
                <section class="details-section">
                    <div class="container">
                        <h1 class="car-title"><?php echo htmlspecialchars($row["nom_modele"]); ?></h1>
                        
                        <div class="specs-grid">
                            <div class="spec-item">
                                <img src="icones/icons8-événement-48.png" alt="Année">
                                <b><?php echo htmlspecialchars($row["annee"]); ?></b>
                            </div>
                            <div class="spec-item">
                                <img src="icones/icons8-transmission-64.png" alt="Transmission">
                                <b><?php echo htmlspecialchars($row["transmission"]); ?></b>
                            </div>
                            <div class="spec-item">
                                <img src="icones/chauffage-de-siège.png" alt="Sièges">
                                <b><?php echo htmlspecialchars($row["sieges"]); ?></b>
                            </div>
                            <div class="spec-item">
                                <img src="icones/icons8-prix-100.png" alt="Prix">
                                <b><?php echo htmlspecialchars($row["prix"]); ?> €</b>
                            </div>
                            <div class="spec-item">
                                <img src="icones/compteur.png" alt="Vitesse max">
                                <b><?php echo htmlspecialchars($row["vitesse_max"]); ?> km/h</b>
                            </div>
                            <div class="spec-item">
                                <img src="icones/icons8-moteur-100.png" alt="Moteur">
                                <b><?php echo htmlspecialchars($row["moteur"]); ?></b>
                            </div>
                            <div class="spec-item">
                                <img src="icones/pompe-à-essence.png" alt="Consommation">
                                <b><?php echo htmlspecialchars($row["consommation"]); ?></b>
                            </div>
                            <div class="spec-item">
                                <img src="icones/icons8-panneau-chevaux-100.png" alt="Puissance">
                                <b><?php echo htmlspecialchars($row["puissance"]); ?> chevaux</b>
                            </div>
                        </div>

                        <div class="car-description">
                            <?php echo htmlspecialchars($row["description"]); ?>
                        </div>

                        <div class="carousel-section">
                            <div id="voiture" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-indicators">
                                    <button type="button" data-bs-target="#voiture" data-bs-slide-to="0" class="active"></button>
                                    <button type="button" data-bs-target="#voiture" data-bs-slide-to="1"></button>
                                    <button type="button" data-bs-target="#voiture" data-bs-slide-to="2"></button>
                                    <button type="button" data-bs-target="#voiture" data-bs-slide-to="3"></button>
                                </div>
                                <div class="carousel-inner">
                                    <?php
                                    for ($i = 1; $i <= 4; $i++) {
                                        $photo = "photo_$i";
                                        if (!empty($row[$photo])) {
                                            $activeClass = ($i === 1) ? 'active' : '';
                                            echo '<div class="carousel-item ' . $activeClass . '">';
                                            echo '<img src="' . htmlspecialchars($row[$photo]) . '" alt="Image ' . $i . '" class="d-block w-100">';
                                            echo '</div>';
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>

                        <div class="text-center">
                            <?php if (isset($_SESSION['nom_utilisateur'])): ?>
                                <a href="../demande_essaie/demande_essai.php" class="test-drive-btn">Essayer la voiture</a>
                            <?php else: ?>
                                <a href="../login/inscription_main.php" class="test-drive-btn">Essayer la voiture</a>
                            <?php endif; ?>
                        </div>
                    </div>
                </section>
                <?php
            } else {
                echo '<div class="container text-center mt-5"><p class="alert alert-danger">Aucun détail trouvé pour cette voiture.</p></div>';
            }
        } else {
            echo '<div class="container text-center mt-5"><p class="alert alert-danger">Erreur lors de la récupération des données.</p></div>';
        }
    } else {
        echo '<div class="container text-center mt-5"><p class="alert alert-danger">ID de voiture manquant dans l\'URL.</p></div>';
    }

    $connexion->close();
    ?>

    <!-- FOOTER -->
    <?php include '../../include/footer.php'; ?>

</body>
</html>
