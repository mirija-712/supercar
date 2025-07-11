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
  <title>Gérer cookies</title>
  <!-- Liens vers les fichiers CSS de Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../../css/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="../../css/footer.css">
  <style>
        body {
                background-image: url('https://img2.wallspic.com/previews/4/6/1/1/4/141164/141164-mercedes_benz_classe_s-voiture-voiture_de_luxe_personnels-x750.jpg');
                background-size: cover; /* Ensure the image covers the entire screen */
                background-position: center; /* Keep the image centered */
                background-repeat: no-repeat; /* No repeating of the background image */
                background-attachment: fixed; /* Keep the background fixed during scrolling */
                height: 100vh;
                margin: 0;
                padding: 0;
                color: white; /* Set text color to white for better contrast */
            }
        #corps_contact{
            background-color: rgba(62, 62, 81, 0.546);
        }
    </style>
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
                        <a class="nav-link" href="../voitures/1-0-voitures.php">VOITURES</a>
                    </li>
    
                    <li class="nav-item">
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

    <h1 align="center">
        Gérer cookies
    </h1>
    <label for="" align="center">

    </label>

    <section>
        <div class="container mt-4">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="card bg-dark text-white">
                        <div class="card-body">
                            <h2 class="card-title mb-4">Gestion des cookies</h2>
                            
                            <h3>1. Qu'est-ce qu'un cookie ?</h3>
                            <p>Un cookie est un petit fichier texte stocké sur votre ordinateur lors de la visite d'un site web. Il permet de :</p>
                            <ul>
                                <li>Mémoriser vos préférences</li>
                                <li>Améliorer votre expérience de navigation</li>
                                <li>Analyser l'utilisation du site</li>
                                <li>Personnaliser le contenu</li>
                            </ul>

                            <h3>2. Types de cookies utilisés</h3>
                            <div class="table-responsive">
                                <table class="table table-dark">
                                    <thead>
                                        <tr>
                                            <th>Type de cookie</th>
                                            <th>Finalité</th>
                                            <th>Durée de conservation</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Cookies essentiels</td>
                                            <td>Fonctionnement du site</td>
                                            <td>Session</td>
                                        </tr>
                                        <tr>
                                            <td>Cookies de session</td>
                                            <td>Gestion de la connexion</td>
                                            <td>Session</td>
                                        </tr>
                                        <tr>
                                            <td>Cookies analytiques</td>
                                            <td>Analyse d'audience</td>
                                            <td>13 mois</td>
                                        </tr>
                                        <tr>
                                            <td>Cookies de préférences</td>
                                            <td>Personnalisation</td>
                                            <td>6 mois</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <h3>3. Comment gérer vos cookies ?</h3>
                            <p>Vous pouvez gérer vos préférences de cookies de plusieurs façons :</p>
                            <ul>
                                <li><strong>Via notre bannière de cookies :</strong> Cliquez sur "Paramètres" pour personnaliser vos choix</li>
                                <li><strong>Via votre navigateur :</strong>
                                    <ul>
                                        <li>Chrome : Paramètres > Confidentialité et sécurité > Cookies</li>
                                        <li>Firefox : Options > Vie privée et sécurité > Cookies</li>
                                        <li>Safari : Préférences > Confidentialité > Cookies</li>
                                        <li>Edge : Paramètres > Cookies et autorisations de site</li>
                                    </ul>
                                </li>
                            </ul>

                            <h3>4. Impact de la désactivation</h3>
                            <p>La désactivation de certains cookies peut affecter :</p>
                            <ul>
                                <li>La mémorisation de vos préférences</li>
                                <li>L'accès à votre compte</li>
                                <li>La personnalisation de votre expérience</li>
                                <li>Certaines fonctionnalités du site</li>
                            </ul>

                            <h3>5. Mise à jour de la politique</h3>
                            <p>Nous nous réservons le droit de modifier cette politique de cookies. Les modifications seront publiées sur cette page et, si nécessaire, vous serez informé par email.</p>

                            <h3>6. Contact</h3>
                            <p>Pour toute question concernant notre utilisation des cookies :</p>
                            <ul>
                                <li>Email : privacy@supercar.com</li>
                                <li>Téléphone : +230 3215 8794</li>
                                <li>Adresse : MU.lot54 Battiment4</li>
                            </ul>
                        </div>
                    </div>
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