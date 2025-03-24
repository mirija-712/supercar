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
    <title>Voitures - Supercar</title>
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

        /* Section des marques */
        .marques-section {
            padding: 4rem 0;
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

        #bmw {
            background-image: url('https://api.freelogodesign.org/assets/blog/thumb/20200501114322210logo-bmw_1176x840.jpg');
        }

        #merco {
            background-image: url('https://dealerinspire-image-library-prod.s3.us-east-1.amazonaws.com/images/24s7GU1XuU4SqeEUnNc9OokqV2OUduhYyXwEQBqB.jpeg');
        }

        #audi {
            background-image: url('https://www.designyourway.net/blog/wp-content/uploads/2023/06/Featured-2-1-2.jpg');
        }

        #porsche {
            background-image: url('https://cdn.mos.cms.futurecdn.net/PtGq83dYkxTymTsibo4NvU.jpg');
        }

        .voiture-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(to bottom, rgba(0,0,0,0.2), rgba(0,0,0,0.7));
            z-index: 1;
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

        .voiture-content img {
            width: 100px;
            height: 100px;
            margin-bottom: 1rem;
            background: rgba(255, 255, 255, 0.9);
            padding: 15px;
            border-radius: 50%;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }

        .voiture-content label {
            font-size: 1.1rem;
            line-height: 1.6;
            max-width: 800px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        /* Container pour les sections */
        .sections-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 100%;
            padding: 2rem 0;
        }

        /* Footer moderne */
        .footer {
            background: #000000;
            color: #ffffff;
            padding: 4rem 0 2rem;
            border-top: 1px solid #333;
        }

        .footer h3 {
            color: #D4AF37;
            margin-bottom: 1.5rem;
            font-size: 1.5rem;
            font-weight: 600;
            letter-spacing: 1px;
        }

        .footer a {
            color: #ffffff;
            text-decoration: none;
            transition: all 0.3s ease;
            opacity: 0.8;
        }

        .footer a:hover {
            color: #D4AF37;
            opacity: 1;
            text-decoration: none;
        }

        .social-icons img {
            transition: transform 0.3s ease;
            opacity: 0.8;
            width: 30px;
            height: 30px;
            margin: 0 10px;
        }

        .social-icons img:hover {
            transform: scale(1.2);
            opacity: 1;
        }

        .footer-bottom {
            border-top: 1px solid #333;
            margin-top: 2rem;
            padding-top: 2rem;
        }

        .footer-bottom p {
            color: #ffffff;
            opacity: 0.7;
            margin: 0.5rem 0;
        }
    </style>
</head>
<body>


<?php 
    // mettre en ligne la connexion avec la base de données
    include ("../../include_bdd/connexion.bdd.php");

    $selection = "SELECT distinct nom_marque, description_marque FROM marque where id_marque='1' ";
 
    // Execute the query to retrieve data into the $curseur variable    
    $curseur = mysqli_query($connexion, $selection);
 
    // Make sure the query executed successfully
 
    if ($curseur) {
    while ($row = mysqli_fetch_array($curseur)) 
    {    
        $nom_marque_1 = $row['nom_marque'];
        $description_marque_1 = $row['description_marque'];
    }
    }
?>

<?php 
    // mettre en ligne la connexion avec la base de données
    include ("../../include_bdd/connexion.bdd.php");

    $selection = "SELECT distinct nom_marque, description_marque FROM marque where id_marque='2' ";
 
    // Execute the query to retrieve data into the $curseur variable    
    $curseur = mysqli_query($connexion, $selection);
 
    // Make sure the query executed successfully
 
    if ($curseur) {
    while ($row = mysqli_fetch_array($curseur)) 
    {    
        $nom_marque_2 = $row['nom_marque'];
        $description_marque_2 = $row['description_marque'];
    }
    }
?>

<?php 
    // mettre en ligne la connexion avec la base de données
    include ("../../include_bdd/connexion.bdd.php");

    $selection = "SELECT distinct nom_marque, description_marque FROM marque where id_marque='3' ";
 
    // Execute the query to retrieve data into the $curseur variable    
    $curseur = mysqli_query($connexion, $selection);
 
    // Make sure the query executed successfully
 
    if ($curseur) {
    while ($row = mysqli_fetch_array($curseur)) 
    {    
        $nom_marque_3 = $row['nom_marque'];
        $description_marque_3 = $row['description_marque'];
    }
    }
?>

<?php 
    // mettre en ligne la connexion avec la base de données
    include ("../../include_bdd/connexion.bdd.php");

    $selection = "SELECT distinct nom_marque, description_marque FROM marque where id_marque='4' ";
 
    // Execute the query to retrieve data into the $curseur variable    
    $curseur = mysqli_query($connexion, $selection);
 
    // Make sure the query executed successfully
 
    if ($curseur) {
    while ($row = mysqli_fetch_array($curseur)) 
    {    
        $nom_marque_4 = $row['nom_marque'];
        $description_marque_4 = $row['description_marque'];
    }
    }
?>


        <!-- NAVBAR -->
        <nav class="navbar navbar-expand-md navbar-dark bg-light">

            <div class="container"> 
        
                <a class="navbar-brand" href="#">
                    <img src="../../Logo_page/supercar.png" alt="" id = "logo" >
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
                            <a class="nav-link" href="#">VOITURES</a>
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
                    <img src="<?php echo $icone_connexion; ?>" alt="Logo">
                </a>
                
            </div>
        </nav>
        <br><br>
    

        <div class="marques-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="marque-card">
                            <a href="1-1-bmw.php">
                                <img src="icone_marque/icons8-bmw-48.png" alt="BMW">
                                <h4><?php echo $nom_marque_1; ?></h4>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="marque-card">
                            <a href="1-2-mercedes.php">
                                <img src="icone_marque/icons8-mercedes-48.png" alt="Mercedes">
                                <h4><?php echo $nom_marque_2; ?></h4>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="marque-card">
                            <a href="1-3-audi.php">
                                <img src="icone_marque/icons8-audi-50.png" alt="Audi">
                                <h4><?php echo $nom_marque_3; ?></h4>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="marque-card">
                            <a href="1-4-porsche.php">
                                <img src="icone_marque/icons8-porsche-48.png" alt="Porsche">
                                <h4><?php echo $nom_marque_4; ?></h4>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        


            <br><br>
            <div class="sections-container">
                <section class="voiture-section" id="bmw">
                    <div class="voiture-content">
                        <a href="1-1-bmw.php">
                            <img src="icone_marque/icons8-bmw-48.png" alt="BMW">
                        </a>
                        <label><?php echo $description_marque_1; ?></label>
                    </div>
                </section>    

                <section class="voiture-section" id="merco">
                    <div class="voiture-content">
                        <a href="1-2-mercedes.php">
                            <img src="icone_marque/icons8-mercedes-48.png" alt="Mercedes">
                        </a>
                        <label><?php echo $description_marque_2; ?></label>
                    </div>
                </section>

                <section class="voiture-section" id="audi">
                    <div class="voiture-content">
                        <a href="1-3-audi.php">
                            <img src="icone_marque/icons8-audi-50.png" alt="Audi">
                        </a>
                        <label><?php echo $description_marque_3; ?></label>
                    </div>
                </section>

                <section class="voiture-section" id="porsche">
                    <div class="voiture-content">
                        <a href="1-4-porsche.php">
                            <img src="icone_marque/icons8-porsche-48.png" alt="Porsche">
                        </a>
                        <label><?php echo $description_marque_4; ?></label>
                    </div>
                </section>
            </div>

            
            <br><br><br><br>
                
    <!-- FOOTER -->
    <?php include '../../include/footer.php'; ?>

</body>
</html>