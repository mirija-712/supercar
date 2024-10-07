<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inscription</title>
  <!-- Liens vers les fichiers CSS de Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../../css/style.css">
  <style>
        body {
            background-image: url('https://wallpaper.forfun.com/fetch/4f/4fd56142f54f6eddf23c4cc1e8217cba.jpeg');
            background-size: cover; /* Ensure the image covers the entire screen */
            background-position: center; /* Keep the image centered */
            background-repeat: no-repeat; /* No repeating of the background image */
            background-attachment: fixed; /* Keep the background fixed during scrolling */
            height: 100vh;
            margin: 0;
            padding: 0;
            color: white; /* Set text color to white for better contrast */
        }
        #inscription_main{
            font-family: Arial, Helvetica, sans-serif;
            color: rgb(255, 255, 255);
            size: 75px;
            background-color: rgba(0, 0, 0, 0.437);
            border-radius: 10px;
            box-shadow: 2px 2px 4px rgb(0, 0, 0);
        }
  </style>
</head>
<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-md navbar-dark bg-light">

        <div class="container"> 
    
            <a class="navbar-brand" href="../../index.php">
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
                        <a class="nav-link" href="#">DEMANDE ESSAI</a>
                    </li>
    
                    <li class="nav-item">
                        <a class="nav-link" href="../evenement/evenement.php">EVENEMENTS</a>
                    </li>
    
                    <li class="nav-item">
                        <a class="nav-link" href="../contact/contactez-nous.php">CONTACTEZ-NOUS</a>
                    </li>
    
                </ul>
            </div>
    
            <a href="inscription_main.php" class="logo-container"> <!-- Retirer fixed-right -->
                <img src="../../icones/icone_connexion/icons8-connexion-96.png" alt="Logo">
            </a>
        </div>
    </nav>

    <section class="inscrit">

        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center mb-4" >
                    <h1>SE CONNECTER À SUPERCAR</h1>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6" id="inscription_main">
                    <form id="form-connexion" method="POST" action="fonction_php/connexion.php">
                        <div class="mb-3">
                            <label for="identifiant" class="form-label">Identifiant</label>
                            <input type="text" class="form-control" id="nom_utilisateur" name="nom_utilisateur" required>
                        </div>
                        <div class="mb-3">
                            <label for="mot_de_passe" class="form-label">Mot de passe</label>
                            <input type="password" class="form-control" id="mot_de_passe" name="mot_de_passe" required>
                        </div>
                        <button class="btn btn-primary btn-sm" type="submit">SE CONNECTER</button>
                        <a href = "inscription_main.php" class="btn btn-primary btn-sm" >S'IDENTIFIER</a>
                    </form>
                </div>
            </div>
        </div>
    </section>


    <!-- LE FOOTER DE NOTRE SITE -->

    <footer class="footer">
        <div class="container">
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
                            |   Suivez-nous sur <img src="../voitures/icones/icons8-facebook-32.png" alt="" height="20px" width="20px">
                                                <img src="../voitures/icones/icons8-instagram-48.png" alt="" height="20px" width="20px">
                                                <img src="../voitures/icones/icons8-logo-linkedin-48 (1).png" alt="" height="20px" width="20px">
                                                <img src="../voitures/icones/icons8-logo-skype-48.png" alt="" height="20px" width="20px"> | <br>
                    </label>              
                </div>
            </div>
        </div>
    </footer>
        <!-- FICHIER JS DE BOOTSTRAP (dans body : eviter ralentir page > pas indispensable) -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

