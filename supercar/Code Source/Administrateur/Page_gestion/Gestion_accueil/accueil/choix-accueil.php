<?php
session_start();
// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['identifiant'])) {
    // Rediriger vers la page de connexion s'il n'est pas connecté
    header("Location: ../../../index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion de l'Accueil - Administration Supercar</title>

    <!-- FICHIER CSS DE BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome pour les icônes -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <style>
        :root {
            --primary-color: #2c3e50;
            --secondary-color: #3498db;
            --accent-color: #e74c3c;
            --background-color: #f8f9fa;
            --text-color: #2c3e50;
            --card-bg: #ffffff;
        }

        body {
            background-color: var(--background-color);
            color: var(--text-color);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .navbar {
            background-color: var(--primary-color);
            padding: 1rem;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .navbar-brand {
            color: white !important;
            font-weight: 600;
        }

        .back-btn {
            background-color: var(--secondary-color);
            color: white;
            border: none;
            padding: 8px 20px;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .back-btn:hover {
            background-color: #2980b9;
            transform: translateY(-2px);
            color: white;
        }

        .main-container {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
        }

        .card {
            background-color: var(--card-bg);
            border: none;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            padding: 2rem;
            width: 100%;
            max-width: 500px;
            transition: all 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
        }

        .card-title {
            color: var(--primary-color);
            font-weight: 700;
            font-size: 1.8rem;
            text-align: center;
            margin-bottom: 2rem;
            position: relative;
        }

        .card-title::after {
            content: '';
            display: block;
            width: 100px;
            height: 3px;
            background: var(--secondary-color);
            margin: 15px auto;
            border-radius: 2px;
        }

        .form-check {
            margin-bottom: 1.5rem;
            padding: 1rem;
            border-radius: 10px;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .form-check:hover {
            background-color: rgba(52, 152, 219, 0.1);
        }

        .form-check-input {
            width: 1.2rem;
            height: 1.2rem;
            margin-top: 0.3rem;
        }

        .form-check-label {
            font-size: 1.1rem;
            font-weight: 500;
            margin-left: 0.5rem;
        }

        .btn-submit {
            background-color: var(--accent-color);
            color: white;
            border: none;
            padding: 12px 30px;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s ease;
            width: 100%;
            margin-top: 1rem;
        }

        .btn-submit:hover {
            background-color: #c0392b;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(231, 76, 60, 0.3);
        }

        .option-icon {
            margin-right: 10px;
            color: var(--secondary-color);
        }

        @media (max-width: 768px) {
            .card {
                padding: 1.5rem;
            }
            
            .card-title {
                font-size: 1.5rem;
            }
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <i class="fas fa-home me-2"></i>Gestion de l'Accueil
            </a>
            <a href="../../../Accueil_admin/menu-admin.php" class="btn back-btn">
                <i class="fas fa-arrow-left me-2"></i>Retour
            </a>
        </div>
    </nav>

    <div class="main-container">
        <div class="card">
            <h2 class="card-title">Que souhaitez-vous modifier ?</h2>
            
            <form action="choix-traitement.php" method="post">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="choix" id="choix1" value="modifierTitresTextes" checked>
                    <label class="form-check-label" for="choix1">
                        <i class="fas fa-font option-icon"></i>Titres et Textes
                    </label>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="radio" name="choix" id="choix2" value="modifierImagesVideos">
                    <label class="form-check-label" for="choix2">
                        <i class="fas fa-images option-icon"></i>Images et Vidéos
                    </label>
                </div>

                <button type="submit" class="btn btn-submit">
                    <i class="fas fa-check me-2"></i>Continuer
                </button>
            </form>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
