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
    <link href="css/bootstrap.css" rel="stylesheet"/>
    <link href="css/style_steve.css" type="text/css" rel="stylesheet"/>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Voitures</title>
    <style>
        #bmw{
            background-image: url('https://api.freelogodesign.org/assets/blog/thumb/20200501114322210logo-bmw_1176x840.jpg');
            background-size: cover; /* Redimensionne l'image pour couvrir tout l'arrière-plan */
            background-position: center; /* Centre l'image */
            height: 100%; /* 100% de la hauteur de la fenêtre */
            width: 100%; /* 100% de la largeur de la fenêtre */
            border-radius: 5px;
        }
        #merco{
            background-image: url('https://dealerinspire-image-library-prod.s3.us-east-1.amazonaws.com/images/24s7GU1XuU4SqeEUnNc9OokqV2OUduhYyXwEQBqB.jpeg');
            background-size: cover; /* Redimensionne l'image pour couvrir tout l'arrière-plan */
            background-position: center; /* Centre l'image */
            height: 100%; /* 100% de la hauteur de la fenêtre */
            width: 100%; /* 100% de la largeur de la fenêtre */
            border-radius: 5px;
        }
        #audi{
            background-image: url('https://www.designyourway.net/blog/wp-content/uploads/2023/06/Featured-2-1-2.jpg');
            background-size: cover; /* Redimensionne l'image pour couvrir tout l'arrière-plan */
            background-position: center; /* Centre l'image */
            height: 100%; /* 100% de la hauteur de la fenêtre */
            width: 100%; /* 100% de la largeur de la fenêtre */
            border-radius: 5px;
        }
        #porsche{
            background-image: url('https://cdn.mos.cms.futurecdn.net/PtGq83dYkxTymTsibo4NvU.jpg');
            background-size: cover; /* Redimensionne l'image pour couvrir tout l'arrière-plan */
            background-position: center; /* Centre l'image */
            height: 100%; /* 100% de la hauteur de la fenêtre */
            width: 100%; /* 100% de la largeur de la fenêtre */
            border-radius: 5px;
        }

        /* ------------------------------ PARAMETRE DE LA NAVBAR ---------------------------------------- */

    /* LOGO D'INSCRIPTION */
    .logo-container img 
    {
        width: 30px; 
        height: auto;
    }

    /* LOGO DE SUPERCAR */
    #logo
    {
        margin-left: 4px; /* DISTANCE ENTRE LE LOGO EST LE BORD */
        max-width: 60px; /* LARGEUR  */
        height: auto;
    }

    .navbar-nav
    {
        margin: auto; /* METTRE TOUT AU MILIEU */
    }

    .navbar-nav .nav-link 
    {
        font-weight: bold; /* TEXTE EN GRAS */
        color: black !important ; /* LE !IMPORTANT PERMET LE PRIORITAIRE */
    }

    .navbar-nav .nav-item
    {
        margin-right: 20px; /* ESPACE ENTRE ITEMS */
    }

    /* BORDURE LORSQUE ITMES TOUCHE */
    .navbar-nav .nav-item:hover .nav-link
    {
        border: 1px solid #4892D7; 
        border-radius: 5px; /* COINS ARRONDIS DE 5px */
        background-color: #4892D7; 
        color: white; /* LORSQUE BORDURE COULEUR = BLANC */
    }

    /* Couleur du bouton à trois barres */
    .navbar-toggler-icon
    {
        background-color: rgba(70, 70, 70, 0.261) 
    }

     /* Style de base pour la section */
     .sct-voiture {
            padding: 100px; /* Espacement intérieur */
            transition: transform 1s; /* Transition sur la transformation */
        }
        
/* Style au survol */
    .sct-voiture:hover {
            transform: scale(1.3); /* Grandissement au survol */
        }
    </style>

</head>
<body>


<?php 
    // mettre en ligne la connexion avec la base de données
    include ("connexion.bdd/connexion.bdd.php");

    $selection = "SELECT distinct nom_marque, description_marque FROM marque where id_marque='1' ";
 
    // Execute the query to retrieve data into the $curseur variable    
    $curseur = mysqli_query($bdd, $selection);
 
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
    include ("connexion.bdd/connexion.bdd.php");

    $selection = "SELECT distinct nom_marque, description_marque FROM marque where id_marque='2' ";
 
    // Execute the query to retrieve data into the $curseur variable    
    $curseur = mysqli_query($bdd, $selection);
 
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
    include ("connexion.bdd/connexion.bdd.php");

    $selection = "SELECT distinct nom_marque, description_marque FROM marque where id_marque='3' ";
 
    // Execute the query to retrieve data into the $curseur variable    
    $curseur = mysqli_query($bdd, $selection);
 
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
    include ("connexion.bdd/connexion.bdd.php");

    $selection = "SELECT distinct nom_marque, description_marque FROM marque where id_marque='4' ";
 
    // Execute the query to retrieve data into the $curseur variable    
    $curseur = mysqli_query($bdd, $selection);
 
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
    

        <div class="row justify-content-center">
            <div class="row justify-content-center">
                <div class="col-md-3">
                    <p align="center">
                        <a href="1-1-bmw.php" id="ln-voiture">
                            <img src="icone_marque/icons8-bmw-48.png" height="50px" width="50px" > <br>
                            <b> <?php  echo $nom_marque_1; ?> </b>
                        </a>
                    </p>
                </div>
                <div class="col-md-3">
                    <p align="center">
                        <a href="1-2-mercedes.php" id="ln-voiture">
                            <img src="icone_marque/icons8-mercedes-48.png" alt="" height="50px" width="50px" > <br>
                            <b> <?php  echo $nom_marque_2; ?> </b>
                        </a>
                    </p>
                </div>
                <div class="col-md-3">
                    <p align="center">
                        <a href="1-3-audi.php" id="ln-voiture">
                            <img src="icone_marque/icons8-audi-50.png" alt="" height="50px" width="50px" > <br>
                            <b> <?php  echo $nom_marque_3; ?> </b>
                        </a>
                    </p>
                </div>
                <div class="col-md-3">
                    <p align="center">
                        <a href="1-4-porsche.php" id="ln-voiture">
                            <img src="icone_marque/icons8-porsche-48.png" alt="" height="50px" width="50px"> <br>
                            <b> <?php  echo $nom_marque_4; ?> </b>
                        </a>
                    </p>
                </div>
            </div>
        </div>
        


            <br><br>
            <section class="sct-voiture">
                <div class="row justify-content-center" id="bmw">
                    <div class="col-md-10">
                        <p align="center" id="para-voiture">
                            <br>
                            <a href="1-1-bmw.php" id="ln-voiture">
                                <img src="icone_marque/icons8-bmw-48.png" alt="" height="50px" width="50px" > <br>
                            </a>
                            <br>
                            <label id="lbl-voiture">
                            <?php  echo $description_marque_1; ?>
                            </label>
                            
                        </p>
                    </div>
                </div>
            </section>    
           

            <br><br>

            <section class="sct-voiture">
                <div class="row justify-content-center" id="merco">

                    <div class="col-md-10">
                        <p align="center" id="para-voiture">
                            <br>
                            <a href="1-2-mercedes.php" id="ln-voiture">
                                <img src="icone_marque/icons8-mercedes-48.png" alt="" height="50px" width="50px" > <br>
                            </a>
                            <br>
                            <label id="lbl-voiture">
                            <?php  echo $description_marque_2; ?>
                            </label>
                        </p>
                    </div>
                </div>
            </section>
                

            <br><br>

            <section class="sct-voiture">
                <div class="row justify-content-center" id="audi">
                    <div class="col-md-10">
                        <p align="center" id="para-voiture">
                            <br>
                            <a href="1-3-audi.php" id="ln-voiture">
                                <img src="icone_marque/icons8-audi-50.png" alt="" height="50px" width="50px" > <br>
                            </a>
                            <br>
                            <label id="lbl-voiture">
                            <?php  echo $description_marque_3; ?>
                            </label>
                        </p>
                    </div>
                </div>
            </section>
                

            <br><br>

            <section class="sct-voiture">
                <div class="row justify-content-center" id="porsche">
                    <div class="col-md-10">
                        <p align="center" id="para-voiture">
                            <br>
                            <a href="1-4-porsche.php" id="ln-voiture">
                                <img src="icone_marque/icons8-porsche-48.png" alt="" height="50px" width="50px"> <br>
                            </a>
                            <br>
                            <label id="lbl-voiture">
                            <?php  echo $description_marque_4; ?>
                            </label>
                        </p>
                    </div>
                </div>
            </section>

            
            <br><br><br><br>
                
</body>
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h3>
                    Accès rapide
                </h3>
                    <label for="">
                        <a href="../demande_essaie/demande_essai.php" id="link-footer">
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