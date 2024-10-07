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
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Evenement</title>

    <!-- FICHIER CSS DE BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="../../css/style.css">
    <style>
        body {
                background-image: url('https://sxdrv.com/images/med_64c0c7931066f.jpg');
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
                <img src="<?php echo $icone_connexion; ?>" alt="Logo">
            </a>
            
        </div>
    </nav>  
    
    <br><br>

    <section class="evenement">

        <div class="row justify-content-center">
            <div class="col-md-8">
                 <h1 align="center" id="">
                     <label>
                        <b>EVENEMENTS ORGANISES PAR SUPERCAR ! </b>
                     </label>                
                 </h1>    
            </div>        
        </div>
     
        <br><br><br>

      
<?php
 
 $servername = "localhost";
 $username = "root";
 $password = "";
 $dbname = "supercar";
    
 $connexion = new mysqli($servername, $username, $password, $dbname);
  
 if ($connexion->connect_error) {
     die("Connection failed: " . $connexion->connect_error);
 }
  
 // Récupération des données de la base
 $query = "SELECT * FROM evenements ";
 $result = $connexion->query($query);
  
 // Construire le container Bootstrap avec les données de la voiture
 $container_nouv = "";
  
 if ($result->num_rows > 0) {
     while($row = mysqli_fetch_assoc($result)) {
        $container_nouv .= '<div class="row justify-content-center" id="events">';
        $container_nouv .= '<div class="col-md-6">';
        $container_nouv .= '<img src="' . $row["photo"] . '" alt="Image de l\'événement">';
        $container_nouv .= '</div>';
        $container_nouv .= '<div class="col-md-6">';
        $container_nouv .= '<h2><b>'. $row["titre"] .'</b></h2>';
        $container_nouv .= '<p><b id="texte-gras">Date :</b>'. $row["date_evenement"] .'</p>';
        $container_nouv .= '<p><b id="texte-gras">Heure :</b>'. $row["heure"] .'</p>';
        $container_nouv .= '<p><b id="texte-gras">Lieu :</b>'. $row["lieu"] .'</p>';
        $container_nouv .= '<p><b id="texte-gras">Type de voiture :</b>'. $row["type_voiture"] .'</p>';
        $container_nouv .= '<p><b id="texte-gras">Description de l\'événement :</b>'. $row["description"] .'</p>';
        $container_nouv .= '<a href="../contact/contactez-nous.php" class="btn">Participer</a>';
        $container_nouv .= '</div>';
        $container_nouv .= '</div>';
        $container_nouv .= '<br><br><br>';

     }
 } else {
     $container_nouv = "0 résultats";
 }
 
 // Affichage du contenu de $container_nouv
 echo $container_nouv;
  
 // Fermer la connexion à la base de données
 $connexion->close();
 ?>
 

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
                            |   Suivez-nous sur <img src="icones/icons8-facebook-32.png" alt="" height="20px" width="20px" id="footer-image">
                                                <img src="icones/icons8-instagram-48.png" alt="" height="20px" width="20px" id="footer-image">
                                                <img src="icones/icons8-logo-linkedin-48 (1).png" alt="" height="20px" width="20px" id="footer-image">
                                                <img src="icones/icons8-logo-skype-48.png" alt="" height="20px" width="20px" id="footer-image"> | <br>
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