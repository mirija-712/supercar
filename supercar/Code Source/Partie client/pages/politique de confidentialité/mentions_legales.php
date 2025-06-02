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
  <title>Mentions légales</title>
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

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card bg-dark text-white">
                    <div class="card-body">
                        <h2 class="card-title mb-4">Mentions légales</h2>
                        
                        <h3>1. Éditeur du site</h3>
                        <div class="table-responsive">
                            <table class="table table-dark">
                                <tbody>
                                    <tr>
                                        <th>Raison sociale</th>
                                        <td>SuperCar</td>
                                    </tr>
                                    <tr>
                                        <th>Siège social</th>
                                        <td>MU.lot54 Battiment4</td>
                                    </tr>
                                    <tr>
                                        <th>Numéro d'enregistrement</th>
                                        <td>MU123456789</td>
                                    </tr>
                                    <tr>
                                        <th>Email de contact</th>
                                        <td>contact@supercar.com</td>
                                    </tr>
                                    <tr>
                                        <th>Téléphone</th>
                                        <td>+230 3215 8794</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <h3>2. Hébergeur</h3>
                        <div class="table-responsive">
                            <table class="table table-dark">
                                <tbody>
                                    <tr>
                                        <th>Nom</th>
                                        <td>alwaysData</td>
                                    </tr>
                                    <tr>
                                        <th>Adresse</th>
                                        <td>91 rue du Faubourg Saint-Honoré, 75008 Paris, France</td>
                                    </tr>
                                    <tr>
                                        <th>Site web</th>
                                        <td>www.alwaysdata.com</td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td>support@alwaysdata.com</td>
                                    </tr>
                                    <tr>
                                        <th>Téléphone</th>
                                        <td>+33 1 84 16 23 40</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <h3>3. Propriété intellectuelle</h3>
                        <p>L'ensemble des éléments constituant le site SuperCar (textes, graphismes, logiciels, photographies, images, vidéos, sons, plans, logos, marques, etc.) sont la propriété exclusive de SuperCar ou de ses partenaires. Toute reproduction, représentation, modification, publication, transmission, dénaturation, totale ou partielle du site ou de son contenu, par quelque procédé que ce soit, et sur quelque support que ce soit est interdite sans l'autorisation écrite préalable de SuperCar.</p>

                        <h3>4. Liens externes</h3>
                        <p>Le site peut contenir des liens vers des sites tiers. SuperCar décline toute responsabilité quant au contenu de ces sites. L'insertion de ces liens ne signifie pas que SuperCar approuve les éléments contenus sur ces sites.</p>

                        <h3>5. Protection des données personnelles</h3>
                        <p>Conformément à la loi en vigueur, vous disposez des droits suivants :</p>
                        <ul>
                            <li>Droit d'accès à vos données</li>
                            <li>Droit de rectification</li>
                            <li>Droit à l'effacement</li>
                            <li>Droit d'opposition au traitement</li>
                            <li>Droit à la portabilité des données</li>
                        </ul>
                        <p>Pour exercer ces droits, contactez notre DPO à : privacy@supercar.com</p>

                        <h3>6. Loi applicable</h3>
                        <p>Les présentes mentions légales sont soumises au droit mauricien. En cas de litige, les tribunaux mauriciens seront seuls compétents.</p>

                        <h3>7. Crédits</h3>
                        <div class="table-responsive">
                            <table class="table table-dark">
                                <tbody>
                                    <tr>
                                        <th>Design et développement</th>
                                        <td>SuperCar</td>
                                    </tr>
                                    <tr>
                                        <th>Images</th>
                                        <td>© SuperCar - Tous droits réservés</td>
                                    </tr>
                                    <tr>
                                        <th>Icônes</th>
                                        <td>Icons8</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- FOOTER -->
    <?php include '../../include/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>