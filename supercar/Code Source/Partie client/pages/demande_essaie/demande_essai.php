<?php
// Démarrer la session
session_start();

// Empêcher la mise en cache du navigateur
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");

// Vérification stricte de la session
if (!isset($_SESSION['nom_utilisateur']) || empty($_SESSION['nom_utilisateur'])) {
    header("Location: ../login/seconnecter.php");
    exit();
}

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
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../voitures/css/bootstrap.css" rel="stylesheet"/>
    <link href="../voitures/css/style_steve.css" type="text/css" rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../../css/footer.css">
    <title>Demande d'essai</title>

    <style>
        :root {
            --primary-color: #4892D7;
            --secondary-color: #2c3e50;
            --accent-color: #e74c3c;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('image/pdc.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            min-height: 100vh;
            color: white;
            margin: 0;
            padding: 0;
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
            color: var(--secondary-color) !important;
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

        /* Formulaire moderne */
        .form-container {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 2rem;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            margin: 2rem 0;
        }

        .form-title {
            color: white;
            text-align: center;
            font-size: 2.5rem;
            margin-bottom: 2rem;
            font-weight: 700;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            color: white;
            margin-bottom: 0.5rem;
            font-weight: 500;
            display: block;
        }

        .form-control {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 10px;
            padding: 0.8rem 1rem;
            color: white;
            width: 100%;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            background: rgba(255, 255, 255, 0.15);
            border-color: var(--primary-color);
            box-shadow: 0 0 0 2px rgba(72, 146, 215, 0.2);
            outline: none;
        }

        .form-control::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }

        select.form-control {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' fill='white' viewBox='0 0 16 16'%3E%3Cpath d='M8 11L3 6h10l-5 5z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 1rem center;
            padding-right: 2.5rem;
        }

        .btn-group {
            display: flex;
            gap: 1rem;
            justify-content: center;
            margin-top: 2rem;
        }

        .btn {
            padding: 0.8rem 2rem;
            border-radius: 30px;
            border: none;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .btn-reset {
            background: rgba(255, 255, 255, 0.1);
            color: white;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .btn-reset:hover {
            background: rgba(255, 255, 255, 0.2);
        }

        .btn-submit {
            background: var(--primary-color);
            color: white;
        }

        .btn-submit:hover {
            background: #357abd;
            transform: translateY(-2px);
        }

        /* Footer moderne */
        .footer {
            background: rgba(44, 62, 80, 0.95);
            color: white;
            padding: 2rem 0;
            backdrop-filter: blur(10px);
        }

        .footer-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .footer-links {
            display: flex;
            gap: 1.5rem;
            flex-wrap: wrap;
        }

        .footer-links a {
            color: white;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer-links a:hover {
            color: var(--primary-color);
        }

        .social-icons {
            display: flex;
            gap: 1rem;
        }

        .social-icons img {
            transition: transform 0.3s ease;
            height: 20px;
            width: 20px;
        }

        .social-icons img:hover {
            transform: scale(1.2);
        }
    </style>
</head>
<body>
<?php
// Inclusion de la connexion à la base de données
include ("../../include_bdd/connexion.bdd.php");

// Vérification de la soumission du formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifier si l'utilisateur est connecté
    if (!isset($_SESSION['nom_utilisateur'])) {
        header("Location: ../login/seconnecter.php");
        exit();
    }

    // Récupération des données du formulaire
    $nom_modele = $_POST['nom_modele'];
    $date_demande = $_POST['date_demande'];
    $heure_arriver = $_POST['heure_arriver'];
    $nom_utilisateur = $_SESSION['nom_utilisateur'];

    // Vérification de la disponibilité en utilisant la procédure stockée
    $stmt = $connexion->prepare("CALL VerifierDisponibiliteVoiture(?, ?, ?, @disponible)");
    $stmt->bind_param("sss", $nom_modele, $date_demande, $heure_arriver);
    $stmt->execute();
    
    // Récupération du résultat
    $result = $connexion->query("SELECT @disponible as disponible");
    $row = $result->fetch_assoc();
    $disponible = $row['disponible'];
    
    if ($disponible) {
        // Vérifier si l'utilisateur n'a pas déjà une demande en attente pour ce modèle
        $stmt = $connexion->prepare("SELECT COUNT(*) as nb_demandes FROM demande_essai WHERE nom_utilisateur = ? AND nom_modele = ? AND etat = 'en attente'");
        $stmt->bind_param("ss", $nom_utilisateur, $nom_modele);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        
        if ($row['nb_demandes'] == 0) {
            // Insertion de la demande d'essai
            $stmt = $connexion->prepare("INSERT INTO demande_essai (date_demande, nom_utilisateur, nom_modele, heure_arriver, etat) VALUES (?, ?, ?, ?, 'en attente')");
            $stmt->bind_param("ssss", $date_demande, $nom_utilisateur, $nom_modele, $heure_arriver);
            
            if ($stmt->execute()) {
                $message_success = "Votre demande d'essai a été enregistrée avec succès !";
            } else {
                $message_erreur = "Une erreur est survenue lors de l'enregistrement de votre demande.";
            }
        } else {
            $message_erreur = "Vous avez déjà une demande en attente pour ce modèle.";
        }
    } else {
        $message_erreur = "Désolé, la voiture n'est pas disponible à cette date et heure.";
    }
}

// Vérifie si la connexion est bien établie
if ($connexion->connect_error) {
    die("Connexion à la base de données échouée : " . $connexion->connect_error);
}

// Récupérer les modèles de voitures triés par la marque
$sql = "SELECT m.nom_modele, ma.nom_marque 
        FROM modele m 
        JOIN marque ma ON m.id_marque = ma.id_marque 
        ORDER BY ma.nom_marque, m.nom_modele";
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
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="form-container">
                        <h1 class="form-title">Demande d'essai</h1>
                        <?php if (isset($_SESSION['message_success'])): ?>
                            <div class="alert alert-success" role="alert">
                                <?php 
                                    echo $_SESSION['message_success'];
                                    unset($_SESSION['message_success']);
                                ?>
                            </div>
                        <?php endif; ?>

                        <?php if (isset($_SESSION['message_erreur'])): ?>
                            <div class="alert alert-danger" role="alert">
                                <?php 
                                    echo $_SESSION['message_erreur'];
                                    unset($_SESSION['message_erreur']);
                                ?>
                            </div>
                        <?php endif; ?>

                        <form action="fonction_php/fonction_demande_essai.php" method="POST">
                            <div class="form-group">
                                <label class="form-label">Date (6j/7)</label>
                                <input type="date" name="date_demande" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Identifiant</label>
                                <input type="text" name="nom_utilisateur" class="form-control" value="<?php echo htmlspecialchars($nom_utilisateur); ?>" required>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Modèle de la voiture</label>
                                <?php
                                if ($resultat->num_rows > 0) {
                                    echo "<select name='nom_modele' class='form-control' required>";
                                    echo "<option value=''>Sélectionnez un modèle</option>";
                                    while ($row = $resultat->fetch_assoc()) {
                                        echo "<option value='" . htmlspecialchars($row["nom_modele"]) . "'>" . htmlspecialchars($row["nom_modele"]) . "</option>";
                                    }
                                    echo "</select>";
                                } else {
                                    echo "<p class='text-danger'>Aucune information trouvée</p>";
                                }
                                ?>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Heure (08:00/16:00)</label>
                                <input type="time" name="heure_arriver" class="form-control" min="08:00" max="16:00" step="1800" required>
                            </div>

                            <div class="btn-group">
                                <button type="reset" class="btn btn-reset">Réinitialiser</button>
                                <button type="submit" class="btn btn-submit">Envoyer</button>
                            </div>
                        </form>
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
