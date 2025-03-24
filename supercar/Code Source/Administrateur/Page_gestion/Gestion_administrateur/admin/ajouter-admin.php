<?php
session_start();
// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['identifiant'])) {
    // Rediriger vers la page de connexion s'il n'est pas connecté
    header("Location: ../../../index.php");
    exit();
}

// Connexion à la base de données
include ("../../../include_bdd/connexion.bdd.php");

// Récupérer tous les administrateurs
$sql = "SELECT * FROM `administrateur`";
$resultat = $connexion->query($sql);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Administrateurs - Administration Supercar</title>

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

        .container {
            padding: 2rem;
        }

        .page-title {
            color: var(--primary-color);
            font-weight: 700;
            font-size: 2rem;
            text-align: center;
            margin-bottom: 2rem;
            position: relative;
        }

        .page-title::after {
            content: '';
            display: block;
            width: 100px;
            height: 3px;
            background: var(--secondary-color);
            margin: 15px auto;
            border-radius: 2px;
        }

        .form-container {
            background-color: var(--card-bg);
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            padding: 2rem;
            margin-bottom: 2rem;
        }

        .form-control {
            border-radius: 8px;
            border: 2px solid #e9ecef;
            padding: 0.8rem;
            transition: all 0.3s ease;
            font-size: 0.9rem;
        }

        .form-control:focus {
            border-color: var(--secondary-color);
            box-shadow: 0 0 0 0.2rem rgba(52, 152, 219, 0.25);
        }

        .form-label {
            font-weight: 500;
            margin-bottom: 0.5rem;
        }

        .btn-submit, .btn-reset {
            padding: 10px 25px;
            border-radius: 8px;
            border: none;
            transition: all 0.3s ease;
            font-weight: 500;
        }

        .btn-submit {
            background-color: var(--secondary-color);
            color: white;
        }

        .btn-reset {
            background-color: var(--accent-color);
            color: white;
        }

        .btn-submit:hover, .btn-reset:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .table-container {
            background-color: var(--card-bg);
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            padding: 2rem;
            margin-top: 2rem;
            overflow-x: auto;
            max-width: 800px;
            margin-left: auto;
            margin-right: auto;
        }

        .table {
            margin-bottom: 0;
            width: 100%;
        }

        .table thead th {
            background-color: var(--primary-color);
            color: white;
            border: none;
            padding: 0.75rem;
            font-weight: 600;
            white-space: nowrap;
            font-size: 0.9rem;
        }

        .table tbody td {
            padding: 0.75rem;
            vertical-align: middle;
            font-size: 0.9rem;
        }

        .btn-edit, .btn-delete {
            padding: 6px 12px;
            border-radius: 6px;
            border: none;
            transition: all 0.3s ease;
            margin: 0 2px;
            font-size: 0.85rem;
        }

        .btn-edit {
            background-color: var(--secondary-color);
            color: white;
        }

        .btn-delete {
            background-color: var(--accent-color);
            color: white;
        }

        .btn-edit:hover, .btn-delete:hover {
            transform: translateY(-2px);
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.2);
        }

        .status-badge {
            padding: 5px 10px;
            border-radius: 15px;
            font-size: 0.85rem;
            font-weight: 500;
        }

        .status-active {
            background-color: #d4edda;
            color: #155724;
        }

        .status-inactive {
            background-color: #f8d7da;
            color: #721c24;
        }

        .table-responsive {
            margin: 0 auto;
            max-width: 100%;
        }

        @media (max-width: 768px) {
            .container {
                padding: 1rem;
            }
            
            .form-container, .table-container {
                padding: 1rem;
            }
            
            .page-title {
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
                <i class="fas fa-users-cog me-2"></i>Gestion des Administrateurs
            </a>
            <a href="../../../Accueil_admin/menu-admin.php" class="btn back-btn">
                <i class="fas fa-arrow-left me-2"></i>Retour
            </a>
        </div>
    </nav>

    <div class="container">
        <h1 class="page-title">Ajouter un Administrateur</h1>

        <div class="form-container">
            <form action="fonction_php/ajouter-admin-base.php" method="post">
                <div class="mb-3">
                    <label for="identifiant" class="form-label">Identifiant</label>
                    <input type="text" class="form-control" id="identifiant" name="identifiant" required>
                </div>
                <div class="mb-3">
                    <label for="mot_de_passe" class="form-label">Mot de passe</label>
                    <input type="password" class="form-control" id="mot_de_passe" name="mot_de_passe" required>
                </div>
                <div class="d-flex justify-content-center gap-3">
                    <button type="submit" class="btn btn-submit">
                        <i class="fas fa-save me-2"></i>Enregistrer
                    </button>
                    <button type="reset" class="btn btn-reset">
                        <i class="fas fa-undo me-2"></i>Réinitialiser
                    </button>
                </div>
            </form>
        </div>

        <!-- Tableau des administrateurs -->
        <div class="table-container">
            <h2 class="mb-4 text-center">Liste des Administrateurs</h2>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Identifiant</th>
                            <th>Date de création</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM `admin` ORDER BY `date` DESC";
                        $resultat = $connexion->query($sql);
                        
                        if ($resultat->num_rows > 0) {
                            while($row = $resultat->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row['ID_admin'] . "</td>";
                                echo "<td>" . $row['identifiant'] . "</td>";
                                echo "<td>" . $row['date'] . "</td>";
                                echo "<td>
                                        <a href='modifier-admin.php?id=" . $row['ID_admin'] . "' class='btn btn-edit'>
                                            <i class='fas fa-edit'></i> Modifier
                                        </a>
                                        <a href='fonction_php/supprimer-admin-base.php?id=" . $row['ID_admin'] . "' class='btn btn-delete' onclick='return confirm(\"Êtes-vous sûr de vouloir supprimer cet administrateur ?\")'>
                                            <i class='fas fa-trash'></i> Supprimer
                                        </a>
                                      </td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='4' class='text-center'>Aucun administrateur trouvé</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>