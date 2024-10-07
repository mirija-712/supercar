<?php
session_start(); // Démarrer la session

// Vérifier si l'utilisateur est connecté
if (isset($_SESSION['nom_utilisateur'])) {
    $lien_demande_essai = "../voitures/demande_essai.php";
    $lien_connexion = "../login/fonction_php/deconnexion.php"; // Lien de déconnexion lorsque l'utilisateur est connecté
    $icone_connexion = "../../icones/icone_connexion/icons8-logout-96.png"; // Icône de déconnexion
} else {
    $lien_demande_essai = "../login/seconnecter.php";
    $lien_connexion = "../login/inscription_main.php"; // Lien d'inscription lorsque l'utilisateur n'est pas connecté
    $icone_connexion = "../../icones/icone_connexion/icons8-connexion-96.png"; // Icône de connexion
}
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../voitures/css/bootstrap.css" rel="stylesheet"/>
    <link href="../voitures/css/style_steve.css" type="text/css" rel="stylesheet"/>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Demande d'essai</title>

    <style>
        body {
            background-image: url('https://www.hdcarwallpapers.com/download/mercedes_amg_gt_63_s_4matic__4_door_coupe_audi_rs_7_sportback_bmw_m8_competition_gran_coupe-1920x1080.jpg');
            background-size: cover; /* Ensure the image covers the entire screen */
            background-position: center; /* Keep the image centered */
            background-repeat: no-repeat; /* No repeating of the background image */
            background-attachment: fixed; /* Keep the background fixed during scrolling */
            height: 100vh;
            margin: 0;
            padding: 0;
            color: white; /* Set text color to white for better contrast */
        }
    </style>

</head>
<body>

<?php
    // Informations de connexion à la base de données
    $serveur = "localhost"; // ou "127.0.0.1"
    $utilisateur = "root";
    $mot_de_passe = "";
    $nom_bdd = "supercar";

    // Connexion à la base de données
    $connexion = new mysqli($serveur, $utilisateur, $mot_de_passe, $nom_bdd);

    // Vérifier la connexion
    if ($connexion->connect_error) {
        die("Connexion échouée: " . $connexion->connect_error);
    }

    // AVEC TROIS TABLE ?
    $sql = "SELECT nom_modele FROM modele";
    $resultat = $connexion->query($sql);

    ?>

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
                            <a class="nav-link" href="">DEMANDE ESSAI</a>
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


        <br><br><br>
        <div class="row justify-content-center">

            <br>
            
            <div class="col-md-6">
                <div class="row justify-content-center">
                        <label id="lbl-demande-esssai">
                            <h1 align="center" id="txt-contact">
                                Demande d'essai
                            </h1> 
                            <br>

                            <form action="demande.essaie.php" method="post">
                                
                                    - Date : (6j/7)
                                    <input type="date" name="date_demande"> <br><br>
                                    
                                    - Identifiant :
                                    <input type="text" placeholder="Veuillez écrire votre identifiant..." name="nom_utilisateur"> <br><br>


                                   - Modèle de la voiture :
                                   <?php
                                        if ($resultat->num_rows > 0) {
                                            echo "<select name='nom_modele' id=''>";
                                            echo "<option>...</option>";
                                            while ($row = $resultat->fetch_assoc()) {
                                                echo "<option>" . $row["nom_modele"] . "</option>";
                                            }
                                            echo "<option>...</option>";
                                            echo "</select>"; // Fermeture de la balise select
                                            echo "<br><br>";
                                        } else {
                                            echo "<option> Aucune information trouvée </option>";
                                        }
                                    ?>


                                    - Heure : (08:00/16:00)
                                    <input type="time" id="" name="heure_arriver" min="00:00" max="23:59" required> 
                                    <br><br>
                                    <div class="row justify-content-center">
                                        <div class="col-6">
                                            <input type="reset" name="" >
                                        </div>
                                        <div class="col-6">
                                            <input type="submit" name="" >
                                        </div>
                                        <br><br>
                                    </div>
                            </form>
                        </label>
                </div>
            </div>
        </div>
        <br><br><br>


</body>
<footer class="footer">
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
                        |   Suivez-nous sur <img src="icones/icons8-facebook-32.png" alt="" height="20px" width="20px">
                                            <img src="icones/icons8-instagram-48.png" alt="" height="20px" width="20px">
                                            <img src="icones/icons8-logo-linkedin-48 (1).png" alt="" height="20px" width="20px">
                                            <img src="icones/icons8-logo-skype-48.png" alt="" height="20px" width="20px"> | <br>
                </label>               
            </div>
        </div>
    </div>
</footer>
</html>