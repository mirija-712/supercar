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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.css" rel="stylesheet"/>
    <link href="css/style_steve.css" type="text/css" rel="stylesheet"/>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <style>

    </style>

    <title>Mercedes-Benz</title>
</head>
<body>

        <!-- NAVBAR -->
        <nav class="navbar navbar-expand-md navbar-dark bg-light">

            <div class="container"> 
        
                <a class="navbar-brand" href="#">
                    <img src="../../Logo_page/supercar.png" alt="" id = "logo">
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
                    <img src="<?php echo $icone_connexion; ?>" alt="Logo">
                </a>
                
            </div>
        </nav>
        <br><br>

        <div class="row justify-content-center">
            <h1 align="center">
                Details voitures
            </h1>
        </div>
        <br><br>

<?php
    // Inclure la connexion à la base de données
    include('../../include_bdd/connexion.bdd.php');

    // Vérifier si l'ID est passé dans l'URL
    if (isset($_GET['id'])) {
        $id_voiture = $_GET['id'];

        // Récupérer les détails de la voiture
        $query = "SELECT * FROM voitures WHERE id_voiture = ?";
        if ($stmt = $connexion->prepare($query)) {
            $stmt->bind_param("i", $id_voiture);
            $stmt->execute();
            $result = $stmt->get_result();

            // Vérifier si une voiture correspond à l'ID
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();

                // Génération du contenu
                $container_nouv = '';
                $container_nouv .= '<section class="sct-voiture">';
                $container_nouv .= '<div class="row justify-content-center" id="lbl-corps-voiture">';
                $container_nouv .= '<div class="col-md-5">';
                $container_nouv .= '<br>';
                $container_nouv .= '<h1 align="center">'. htmlspecialchars($row["nom_modele"]) .'</h1>';
                $container_nouv .= '<ul>';
                $container_nouv .= '<li><img src="icones/icons8-événement-48.png" height="20px" width="20px" alt=""><b> '. htmlspecialchars($row["annee"]) .'</b></li>';
                $container_nouv .= '<li><img src="icones/icons8-transmission-64.png" height="20px" width="20px" alt=""><b> '. htmlspecialchars($row["transmission"]) .'</b></li>';
                $container_nouv .= '<li><img src="icones/chauffage-de-siège.png" height="20px" width="20px" alt=""><b> '. htmlspecialchars($row["sieges"]) .'</b></li>';
                $container_nouv .= '<li><img src="icones/icons8-prix-100.png" height="20px" width="20px" alt=""><b> '. htmlspecialchars($row["prix"]) .' €</b></li>';
                $container_nouv .= '<li><img src="icones/compteur.png" height="20px" width="20px" alt=""><b> '. htmlspecialchars($row["vitesse_max"]) .' km/h</b></li>';
                $container_nouv .= '<li><img src="icones/icons8-moteur-100.png" height="20px" width="20px" alt=""><b> '. htmlspecialchars($row["moteur"]) .'</b></li>';
                $container_nouv .= '<li><img src="icones/pompe-à-essence.png" height="20px" width="20px" alt=""><b> '. htmlspecialchars($row["consommation"]) .'</b></li>';
                $container_nouv .= '<li><img src="icones/icons8-panneau-chevaux-100.png" height="20px" width="20px" alt=""><b> '. htmlspecialchars($row["puissance"]) .' chevaux</b></li>';
                $container_nouv .= '</ul>';
                $container_nouv .= '<h6>'. htmlspecialchars($row["description"]) .'</h6>';
                $container_nouv .= '<br><br><br>';
                $container_nouv .= '</div>';
                $container_nouv .= '<div class="col-md-6">';
                $container_nouv .= '<br>';
                $container_nouv .= '<div class="row justify-content-center">';
                $container_nouv .= '<div class="col-md-12">';
                $container_nouv .= '<div id="voiture" class="carousel slide" data-bs-ride="carousel">';
                $container_nouv .= '<div class="carousel-indicators">';
                $container_nouv .= '<button type="button" data-bs-target="#voiture" data-bs-slide-to="0" class="active"></button>';
                $container_nouv .= '<button type="button" data-bs-target="#voiture" data-bs-slide-to="1"></button>';
                $container_nouv .= '<button type="button" data-bs-target="#voiture" data-bs-slide-to="2"></button>';
                $container_nouv .= '<button type="button" data-bs-target="#voiture" data-bs-slide-to="3"></button>';
                $container_nouv .= '</div>';
                $container_nouv .= '<div class="carousel-inner">';
                for ($i = 1; $i <= 4; $i++) {
                    $photo = "photo_$i";
                    if (!empty($row[$photo])) {
                        $activeClass = ($i === 1) ? 'active' : '';
                        $container_nouv .= '<div class="carousel-item '. $activeClass .'">';
                        $container_nouv .= '<img src="'. htmlspecialchars($row[$photo]) .'" alt="Image '. $i .'" class="d-block w-100" id="img-voitures">';
                        $container_nouv .= '</div>';
                    }
                }
                $container_nouv .= '</div>';
                $container_nouv .= '</div>';
                $container_nouv .= '</div>';
                $container_nouv .= '</div>';
                $container_nouv .= '<br><br>';
                $container_nouv .= '<div class="row justify-content-center">';
                $container_nouv .= '<div class="col-md-6">';
                
                if (isset($_SESSION['nom_utilisateur'])) {
                    $container_nouv .= '<a href="../demande_essaie/demande_essai.php">';
                } else {
                    $container_nouv .= '<a href="../login/inscription_main.php">';
                }
                $container_nouv .= '<input class="mon-bouton" type="button" value="Essayer la voiture">';
                $container_nouv .= '</a>';
                $container_nouv .= '</div>';
                $container_nouv .= '</div>';
                $container_nouv .= '<br><br>';
                $container_nouv .= '</div>';
                $container_nouv .= '</div>';
                $container_nouv .= '</section>';

                echo $container_nouv;
            } else {
                echo '<p>Aucun détail trouvé pour cette voiture.</p>';
            }
        } else {
            echo '<p>Erreur lors de la récupération des données.</p>';
        }
    } else {
        echo '<p>ID de voiture manquant dans l\'URL.</p>';
    }
?>


<br><br>



</body>

<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h3>
                    Accès rapide
                </h3>
                    <label for="">
                        <a href="<?php echo $lien_demande_essai; ?>" id="link-footer">
                         - Demande d'essai  
                        </a>
                        <br>
                        <a href="../contact/contactez-nous.php" id="link-footer">
                         - contact
                        </a>
                        <br>
                        <a href="" id="link-footer">
                         - Les vehicules disponibles 
                        </a> 
                    </label>
            </div>
                <div class="col-md-4">
                    <h3>
                        Modèles
                    </h3>
                    <label for="">
                        <a href="1-1-bmw.php" id="link-footer">
                            - BMW
                        </a> 
                        <br>
                        <a href="1-2-mercedes.php" id="link-footer">
                            - Mercedes-Benz
                        </a>
                        <br>
                        <a href="1-3-audi.php" id="link-footer">
                            - Audi  
                        </a> 
                        <br>
                        <a href="1-4-porsche.php" id="link-footer">
                           - Porsche  
                        </a>

                    </label>
                </div>
                    <div class="col-md-4">
                        <h3>
                         - Evènement
                        </h3>
                        <a href="../evenement/evenement.php" id="link-footer">
                               - Les évènements à venir  
                        </a>
                    </div>
                </div>
        <div class="row justify-content-center">
            <div class="col-md-11">
                <label for="" align="left">
                        © 2023 SUPER CAR.MU .Tous droits réservés. <br>
                        | MU.lot54 Battiment4  | 
                        | contact@supercar.com | 
                        |   +230 3215 8794     | 
                        | <a href="" id="link-footer">
                            Politique de confidentialité
                        </a> | 
                        |  <a href="" id="link-footer">
                            Conditions d'utilisation
                        </a> | 
                        |  <a href="" id="link-footer">
                            Gérer vos cookies
                        </a> | 
                        |  <a href="" id="link-footer">
                            Mention légales
                        </a> | 
                            |   Suivez-nous sur <img src="../../icones/icone_reseau/icons8-facebook-96.png" alt="" height="20px" width="20px">
                                                <img src="../../icones/icone_reseau/icons8-insta-96.png" alt="" height="20px" width="20px">
                                                <img src="../../icones/icone_reseau/icons8-twitter-96.png" alt="" height="20px" width="20px"> | <br>
                </label>               
            </div>
        </div>
    </div>
</footer>

</html>