<?php
session_start();
// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['identifiant'])) {
    // Rediriger vers la page de connexion s'il n'est pas connecté
    header("Location: ../index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration Supercar - Menu</title>

    <!-- FICHIER CSS DE BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome pour les icônes -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary-color: #2c3e50;
            --secondary-color: #34495e;
            --accent-color: #c0392b;
            --background-color: #f8f9fa;
            --text-color: #2c3e50;
            --card-bg: #ffffff;
            --border-color: #e0e0e0;
            --card-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        }

        body {
            background-color: var(--background-color);
            color: var(--text-color);
            font-family: 'Poppins', sans-serif;
            min-height: 100vh;
        }

        .navbar {
            background: var(--primary-color);
            padding: 1rem;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .navbar-brand {
            color: white !important;
            font-weight: 600;
            font-size: 1.3rem;
            letter-spacing: 0.5px;
            display: flex;
            align-items: center;
            gap: 0.8rem;
        }

        .navbar-brand i {
            font-size: 1.4rem;
        }

        .logout-btn {
            background: transparent;
            color: white;
            border: 1px solid rgba(255, 255, 255, 0.2);
            padding: 8px 20px;
            border-radius: 6px;
            transition: all 0.3s ease;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .logout-btn:hover {
            background: rgba(255, 255, 255, 0.1);
            transform: translateY(-2px);
            color: white;
        }

        .container {
            padding: 2rem;
            max-width: 1200px;
        }

        .section-title {
            color: var(--primary-color);
            font-weight: 700;
            font-size: 2rem;
            text-align: center;
            margin-bottom: 2rem;
            position: relative;
            padding-bottom: 1rem;
        }

        .section-title::after {
            content: '';
            display: block;
            width: 100px;
            height: 3px;
            background: var(--accent-color);
            margin: 15px auto;
            border-radius: 2px;
        }

        .card {
            background-color: var(--card-bg);
            border-radius: 10px;
            box-shadow: var(--card-shadow);
            padding: 2rem;
            margin-bottom: 2rem;
            border: 1px solid var(--border-color);
            transition: all 0.3s ease;
        }

        .card:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08);
        }

        .card-title {
            color: var(--primary-color);
            font-weight: 600;
            font-size: 1.3rem;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.8rem;
        }

        .card-title i {
            font-size: 1.4rem;
            color: var(--accent-color);
        }

        .btn-admin {
            background: var(--primary-color);
            color: white;
            border: none;
            border-radius: 6px;
            padding: 12px 25px;
            font-weight: 500;
            transition: all 0.3s ease;
            width: 100%;
            margin: 8px 0;
            text-align: left;
            display: flex;
            align-items: center;
            gap: 0.8rem;
            font-size: 0.95rem;
        }

        .btn-admin:hover {
            background: var(--secondary-color);
            transform: translateX(5px);
            color: white;
        }

        .btn-admin i {
            font-size: 1.1rem;
            width: 20px;
            text-align: center;
        }

        .section-divider {
            height: 2px;
            background: var(--border-color);
            margin: 3rem 0;
        }

        @media (max-width: 768px) {
            .container {
                padding: 1.5rem 1rem;
            }
            
            .card {
                padding: 1.5rem;
            }
            
            .section-title {
                font-size: 1.8rem;
            }

            .btn-admin {
                padding: 10px 20px;
                font-size: 0.9rem;
            }
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <i class="fas fa-shield-alt"></i>
                Administration Supercar
            </a>
            <form action="../Fonction_php/logout.php" method="post" class="ms-auto">
                <button type="submit" class="btn logout-btn">
                    <i class="fas fa-sign-out-alt"></i>
                    Se déconnecter
                </button>
            </form>
        </div>
    </nav>

    <div class="container">
        <h1 class="section-title">Gestion du Site</h1>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <h4 class="card-title">
                        <i class="fas fa-home"></i>
                        Page d'Accueil
                    </h4>
                    <a href="../Page_gestion/Gestion_accueil/accueil/choix-accueil.php" class="btn btn-admin">
                        <i class="fas fa-edit"></i>
                        Modifier la Page d'Accueil
                    </a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <h4 class="card-title">
                        <i class="fas fa-user-shield"></i>
                        Administrateurs
                    </h4>
                    <a href="../Page_gestion/Gestion_administrateur/admin/ajouter-admin.php" class="btn btn-admin">
                        <i class="fas fa-user-plus"></i>
                        Ajouter un Administrateur
                    </a>
                </div>
            </div>
        </div>

        <div class="section-divider"></div>

        <h1 class="section-title">Gestion des Véhicules</h1>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <h4 class="card-title">
                        <i class="fas fa-car"></i>
                        Véhicules
                    </h4>
                    <a href="../Page_gestion/Gestion_voiture/voiture/admin-voitures.php" class="btn btn-admin">
                        <i class="fas fa-list"></i>
                        Gérer les Véhicules
                    </a>
                    <a href="../Page_gestion/Gestion_demande_essai/demande-essai/voir_demande.php" class="btn btn-admin">
                        <i class="fas fa-calendar-check"></i>
                        Demandes d'Essai
                    </a>
                </div>
            </div>
        </div>

        <div class="section-divider"></div>

        <h1 class="section-title">Événements</h1>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <h4 class="card-title">
                        <i class="fas fa-calendar-alt"></i>
                        Événements
                    </h4>
                    <a href="../Page_gestion/Gestion_evenement/evenement/evenement_supercar.php" class="btn btn-admin">
                        <i class="fas fa-calendar-plus"></i>
                        Gérer les Événements
                    </a>
                </div>
            </div>
        </div>

        <div class="section-divider"></div>

        <h1 class="section-title">Gestion des Clients</h1>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <h4 class="card-title">
                        <i class="fas fa-users"></i>
                        Clients
                    </h4>
                    <a href="../Page_gestion/Gestion_client/client/voir_clients.php" class="btn btn-admin">
                        <i class="fas fa-user-friends"></i>
                        Liste des Clients
                    </a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <h4 class="card-title">
                        <i class="fas fa-envelope"></i>
                        Messages
                    </h4>
                    <a href="../Page_gestion/Gestion_contact/contact/voir_contactes.php" class="btn btn-admin">
                        <i class="fas fa-inbox"></i>
                        Messages Reçus
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
