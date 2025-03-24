<?php
session_start(); // Démarrer la session

// Vérifier si l'utilisateur est connecté
if (isset($_SESSION['nom_utilisateur'])) {
    $lien_demande_essai = "../demande_essaie/demande_essai.php";
    $lien_connexion = "../login/fonction_php/deconnexion.php"; // Lien de déconnexion lorsque l'utilisateur est connecté
    $icone_connexion = "../../icones/icone_connexion/icons8-logout-96.png"; // Icône de déconnexion
} else {
    $lien_demande_essai = "../login/seconnecter.php";
    $lien_connexion = "../login/inscription_main.php"; // Lien d'inscription lorsque l'utilisateur n'est pas connecté
    $icone_connexion = "../../icones/icone_connexion/icons8-connexion-96.png"; // Icône de connexion
}
?><!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Événements - Supercar</title>

    <!-- FICHIER CSS DE BOOTSTRAP -->
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

        /* Section Événements */
        .events-section {
            padding: 4rem 0;
        }

        .section-title {
            font-size: 2.5rem;
            font-weight: 700;
            text-align: center;
            margin-bottom: 3rem;
            color: white;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }

        .events-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            padding: 0 1rem;
        }

        .event-card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            overflow: hidden;
            transition: transform 0.3s ease;
            border: 1px solid rgba(255, 255, 255, 0.2);
            text-decoration: none;
            color: white;
        }

        .event-card:hover {
            transform: translateY(-10px);
        }

        .event-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .event-content {
            padding: 1.5rem;
        }

        .event-title {
            font-size: 1.4rem;
            font-weight: 600;
            margin-bottom: 1rem;
            color: var(--primary-color);
        }

        .event-date {
            font-size: 0.9rem;
            color: #ecf0f1;
            margin-bottom: 0.5rem;
        }

        .event-location {
            font-size: 0.9rem;
            color: #ecf0f1;
            margin-bottom: 1rem;
        }

        .event-type {
            display: inline-block;
            padding: 0.3rem 0.8rem;
            background: var(--primary-color);
            border-radius: 20px;
            font-size: 0.8rem;
            color: white;
        }

        /* Footer moderne */
        .footer {
            background: rgba(44, 62, 80, 0.95);
            color: white;
            padding: 4rem 0 2rem;
            backdrop-filter: blur(10px);
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

        .footer-bottom {
            border-top: 1px solid rgba(255,255,255,0.1);
            margin-top: 2rem;
            padding-top: 2rem;
        }

        .social-icons {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 15px;
            margin-top: 1rem;
        }

        .social-icons img {
            transition: transform 0.3s ease;
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
                <img src="../../Logo_page/supercar.png" alt="Supercar Logo" id="logo">
            </a>
    
            <!-- LE TOGGER A TROIS BARRES -->
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
                        <a class="nav-link" href="#">EVENEMENTS</a>
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
    
    <br><br>

    <section class="events-section">
        <div class="container">
            <h1 class="section-title">Événements Supercar</h1>

            <div class="events-grid">
                <?php
                // Inclusion de la connexion à la base de données
                include ("../../include_bdd/connexion.bdd.php");

                // Vérifie si la connexion est bien établie
                if ($connexion->connect_error) {
                    die("Connexion à la base de données échouée : " . $connexion->connect_error);
                }
                
                // Récupération des données de la base
                $query = "SELECT * FROM evenements";
                $result = $connexion->query($query);
                
                if ($result->num_rows > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <a href="details_evenement.php?id=<?php echo $row['id_evenement']; ?>" class="event-card">
                            <img src="<?php echo htmlspecialchars($row["photo"]); ?>" alt="Image de l'événement" class="event-image">
                            <div class="event-content">
                                <h2 class="event-title"><?php echo htmlspecialchars($row["titre"]); ?></h2>
                                <div class="event-date">
                                    <i class="fas fa-calendar"></i> <?php echo htmlspecialchars($row["date_evenement"]); ?> à <?php echo htmlspecialchars($row["heure"]); ?>
                                </div>
                                <div class="event-location">
                                    <i class="fas fa-map-marker-alt"></i> <?php echo htmlspecialchars($row["lieu"]); ?>
                                </div>
                                <span class="event-type"><?php echo htmlspecialchars($row["type_voiture"]); ?></span>
                            </div>
                        </a>
                        <?php
                    }
                } else {
                    echo '<div class="alert alert-info text-center">Aucun événement prévu pour le moment.</div>';
                }
                
                // Fermer la connexion à la base de données
                $connexion->close();
                ?>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <?php include '../../include/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</body>

</html>