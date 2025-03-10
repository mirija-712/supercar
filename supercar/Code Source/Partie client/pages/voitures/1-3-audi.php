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

        #card-voiture{
            border : none ;
        }
        
        #h2-audi{
            background-image: url('https://i0.wp.com/blog.audiblainville.com/wp-content/uploads/2024/08/audi-q5-2024.jpg?fit=1920%2C1080&ssl=1');
            background-size: cover; /* Redimensionne l'image pour couvrir tout l'arrière-plan */
            background-position: center; /* Centre l'image */
            background-attachment: fixed; /* Fixe l'image en place, pour qu'elle reste en arrière-plan lors du défilement */
            height: 100%; /* 100% de la hauteur de la fenêtre */
            width: 100%; /* 100% de la largeur de la fenêtre */
            color: rgb(255, 255, 255);
        }
        /* Style de base pour la section */
        .sct-voiture {
            padding: 100px; /* Espacement intérieur */
            transition: transform 1s; /* Transition sur la transformation */
            }   
        
        /* Style au survol */
        .sct-voiture:hover {
            transform: scale(1.2); /* Grandissement au survol */
        }    


    </style>

    <title>Audi</title>
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
            <div>
                <h1 align="center" id="h2-audi">
                    <br><br><br><br>
                    "Avance par la technologie"
                    <br><br><br><br>
                </h1>
            </div>
        </div>
        
        <div class="row justify-content-center">
            <p align="center" id="para-voiture">
                <br>
                <a href="1-0-voitures.php" id="ln-voiture">
                    <img src="icone_marque/icons8-audi-50.png" alt="" height="50px" width="50px" > <br>
                </a>
            </p>
        </div>


        <br><br><br><br>        

<?php
// Inclusion de la connexion à la base de données
include("../../include_bdd/connexion.bdd.php");

// Vérifie si la connexion est bien établie
if ($connexion->connect_error) {
    die("Connexion à la base de données échouée : " . $connexion->connect_error);
}

// Récupération des données de la base
$query = "SELECT * FROM voitures WHERE marque='AUDI'";
$result = $connexion->query($query);

// Construire le container Bootstrap avec les données de la voiture
$container_nouv = '<div class="container mt-4">';
$container_nouv .= '<div class="row g-4">'; // Début de la ligne avec espacement entre les colonnes

if ($result->num_rows > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        // Début de la carte
        $container_nouv .= '<div class="col-lg-3 col-md-4 col-sm-6">'; // Responsive columns
        $container_nouv .= '<div class="card shadow rounded">';

        // Image de la voiture
        $container_nouv .= '<img src="' . $row["photo_1"] . '" class="card-img-top rounded-top" alt="Photo de ' . $row["nom_modele"] . '">';

        // Corps de la carte
        $container_nouv .= '<div class="card-body">';
        $container_nouv .= '<h5 class="card-title text-center">' . $row["nom_modele"] . '</h5>';
        $container_nouv .= '<p class="card-text text-muted">Prix : <strong>' . $row["prix"] . ' €</strong></p>';
        $container_nouv .= '</div>';

        // Pied de carte avec les boutons
        $container_nouv .= '<div class="card-footer bg-white border-0">';
        $container_nouv .= '<div class="d-flex justify-content-between">';

        // Bouton "Demande d'essai"
        if (isset($_SESSION['nom_utilisateur'])) {
            $container_nouv .= '<a href="../demande_essaie/demande_essai.php" class="btn btn-success flex-fill me-1">Demande essaie</a>';
        } else {
            $container_nouv .= '<a href="../login/inscription_main.php" class="btn btn-success flex-fill me-1">Demande essaie</a>';
        }

        // Bouton "Voir plus" avec formulaire
        $container_nouv .= '<a href="affichage_details.php?id=' . $row['id_voiture'] . '" class="btn btn-primary flex-fill me-1">Voir plus</a>';



        $container_nouv .= '</div>'; // Fin du conteneur des boutons
        $container_nouv .= '</div>'; // Fin du footer
        $container_nouv .= '</div>'; // Fin de la carte
        $container_nouv .= '</div>'; // Fin de la colonne
    }
} else {
    // Afficher un message convivial si aucun résultat n'est trouvé
    $container_nouv .= '<div class="col-12 text-center">';
    $container_nouv .= '<p class="text-muted">Aucune voiture Mercedes n\'a été trouvée.</p>';
    $container_nouv .= '</div>';
}

$container_nouv .= '</div>'; // Fin de la ligne
$container_nouv .= '</div>'; // Fin du container

// Affichage du contenu de $container_nouv
echo $container_nouv;

// Fermer la connexion à la base de données
$connexion->close();
?>

 <br><br><br><br> <br><br><br><br>

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