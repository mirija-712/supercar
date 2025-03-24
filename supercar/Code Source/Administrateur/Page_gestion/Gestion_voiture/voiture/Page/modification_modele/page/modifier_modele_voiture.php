<?php
session_start();
// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['identifiant'])) {
    // Rediriger vers la page de connexion s'il n'est pas connecté
    header("Location: ../../../../../../index.php");
    exit();
}

// mettre en ligne la connexion avec la base de données
include ("../../../../../../include_bdd/connexion.bdd.php");

// Récupérer les modèles de voitures triés par la marque (extrait du nom du modèle)
$sql = "SELECT id_modele, nom_modele FROM modele ORDER BY nom_modele";
$resultat = $connexion->query($sql);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification de Modèle - Administration Supercar</title>

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

        .back-btn {
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

        .back-btn:hover {
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

        .form-label {
            font-weight: 500;
            color: var(--primary-color);
            margin-bottom: 0.5rem;
        }

        .form-control, .form-select {
            border: 1px solid var(--border-color);
            border-radius: 4px;
            padding: 0.5rem;
            transition: all 0.3s ease;
            font-size: 0.8rem;
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(44, 62, 80, 0.1);
        }

        .btn-submit {
            background: var(--accent-color);
            color: white;
            border: none;
            border-radius: 6px;
            padding: 0.5rem 1rem;
            font-weight: 500;
            transition: all 0.3s ease;
            width: 100%;
            margin-top: 1rem;
            font-size: 0.8rem;
        }

        .btn-submit:hover {
            background: #a93226;
            transform: translateY(-2px);
            color: white;
        }

        .table {
            margin-bottom: 0;
        }

        .table thead th {
            background-color: var(--primary-color);
            color: white;
            border: none;
            padding: 0.6rem;
            font-weight: 600;
            font-size: 0.8rem;
        }

        .table tbody td {
            padding: 0.4rem;
            vertical-align: middle;
            font-size: 0.8rem;
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
        }

        .card-title {
            font-size: 1rem;
            margin-bottom: 1rem;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <i class="fas fa-edit"></i>
                Modification de Modèle
            </a>
            <a href="../choix_modification_modifier.php" class="btn back-btn">
                <i class="fas fa-arrow-left"></i>
                Retour
            </a>
        </div>
    </nav>

    <div class="container">
        <h1 class="section-title">Modifier un Modèle</h1>
        
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <form action="../../../fonction_php_voiture/manage_informations_modele.php" method="post">
                        <div class="mb-3">
                            <label for="id_modele" class="form-label">Modèles existants :</label>
                            <?php 
                                // Requêter les modèles pour le select
                                $sql_models = "SELECT id_modele, nom_modele FROM modele ORDER BY nom_modele";
                                $result_models = $connexion->query($sql_models);
                                if ($result_models->num_rows > 0) {
                                    echo "<select name='id_modele' id='id_modele' class='form-control'>";
                                    echo "<option value=''>Sélectionnez un modèle</option>";
                                    while ($row = $result_models->fetch_assoc()) {
                                        echo "<option value='" . $row['id_modele'] . "'>" . $row['nom_modele'] . "</option>";
                                    }
                                    echo "</select>";
                                } else {
                                    echo "<p class='text-muted'>Aucune information trouvée</p>";
                                }
                            ?>
                        </div>
                        
                        <div class="mb-3">
                            <label for="nom_modele" class="form-label">Nouveau nom modèle :</label>
                            <input type="text" id="nom_modele" name="nom_modele" class="form-control" required>
                        </div>

                        <button type="submit" name="update" class="btn btn-submit">
                            <i class="fas fa-save"></i> Modifier
                        </button>
                    </form>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <h4 class="card-title mb-4">
                        <i class="fas fa-list"></i>
                        Liste des Modèles
                    </h4>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>    
                                    <th>Nom Modèle</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // Affichage des modèles dans le tableau
                                if ($resultat->num_rows > 0) {
                                    while ($row_modele = $resultat->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td>" . htmlspecialchars($row_modele["nom_modele"]) . "</td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td class='text-center'>Aucun modèle trouvé.</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
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
