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
    $nom_utilisateur = $_SESSION['nom_utilisateur']; // Récupération du nom d'utilisateur
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
    <link href="../voitures/css/bootstrap.css" rel="stylesheet"/>
    <link href="../voitures/css/style_steve.css" type="text/css" rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Demande d'essai</title>

    <style>
        body {
            background-image: url('image/pdc.jpg');
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
// Inclusion de la connexion à la base de données
include ("../../include_bdd/connexion.bdd.php");

// Vérifie si la connexion est bien établie
if ($connexion->connect_error) {
    die("Connexion à la base de données échouée : " . $connexion->connect_error);
}
    // Récupérer les modèles de voitures triés par la marque (extrait du nom du modèle)
    $sql = "SELECT id_modele, nom_modele FROM modele ORDER BY nom_modele";
    $resultat = $connexion->query($sql);
?> 

        <!-- NAVBAR -->
        <nav class="navbar navbar-expand-md navbar-dark bg-light">
            <div class="container"> 
                <a class="navbar-brand" href="#">
                    <img src="../../Logo_page/supercar.png" alt="" id="logo">
                </a>
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
        <br><br><br><br><br><br>
        <div class="row justify-content-center">
            <br>
            <div class="col-md-5">
                <div class="row justify-content-center">
                        <label id="lbl-demande-esssai">
                            <h1 align="center" id="txt-contact">Demande d'essai</h1> 
                            <br>
                            <form action="fonction_php/demande.essaie.php" method="post">
                                <label for=""> - Date : (6j/7)</label>
                                <input type="date" name="date_demande"> <br><br>
                                <label for=""> - Identifiant :</label>
                                <input id="plc_name" type="text" name="nom_utilisateur" value="<?php echo htmlspecialchars($nom_utilisateur); ?>"> <br><br>
                                <label for=""> - Modèle de la voiture :</label>
                                <?php 
                                    if ($resultat->num_rows > 0) {
                                        echo "<select name='nom_modele' id=''>";
                                        echo "<option>...</option>";
                                        while ($row = $resultat->fetch_assoc()) {
                                            echo "<option>" . $row["nom_modele"] . "</option>";
                                        }
                                        echo "</select>"; // Fermeture de la balise select
                                        echo "<br><br>";
                                    } else {
                                        echo "<option> Aucune information trouvée </option>";
                                    }
                                ?>
                                    <label for=""> - Heure : (08:00/16:00)</label>
                                    <input type="time" id="" name="heure_arriver" min="08:00" max="16:00" required> 
                                    <br><br>
                                    <div class="row justify-content-center">
                                        <div class="col-6">
                                            <input type="reset" value="Réinitialiser">
                                        </div>
                                        <div class="col-6">
                                            <input type="submit" value="Envoyer">
                                        </div>
                                        <br><br>
                                    </div>
                            </form>
                        </label>
                </div>
            </div>
        </div><br><br><br><br><br><br><br><br><br>
</body>

<footer class="footer">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <label for="" align="left">
                        © 2023 SUPER CAR.MU .Tous droits réservés. <br>
                        | MU.lot54 Battiment4  | 
                        | contact@supercar.com | 
                        |   +230 3215 8794     | 
                        | <a href="" id="link-footer">Politique de confidentialité</a> | 
                        |  <a href="" id="link-footer">Conditions d'utilisation</a> |
                </label>
            </div>
        </div>
</footer>
</html>
