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

$sql = "SELECT * FROM voitures";
$resultat = $connexion->query($sql);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification des Images - Administration Supercar</title>

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
            max-width: 1400px;
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

        .table {
            margin-bottom: 0;
            width: 100%;
        }

        .table thead th {
            background-color: var(--primary-color);
            color: white;
            border: none;
            padding: 0.6rem;
            font-weight: 600;
            font-size: 0.8rem;
            white-space: nowrap;
            position: sticky;
            top: 0;
            z-index: 1;
            text-align: center;
        }

        .table tbody td {
            padding: 0.4rem;
            vertical-align: middle;
            text-align: center;
            font-size: 0.8rem;
        }

        .table tbody tr:hover {
            background-color: rgba(44, 62, 80, 0.02);
        }

        .image-preview {
            width: 120px;
            height: 120px;
            object-fit: cover;
            border-radius: 4px;
            margin-bottom: 0.3rem;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .form-control {
            border: 1px solid var(--border-color);
            border-radius: 4px;
            padding: 0.3rem 0.5rem;
            transition: all 0.3s ease;
            font-size: 0.8rem;
            width: 100%;
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(44, 62, 80, 0.1);
        }

        .btn-submit {
            background: var(--accent-color);
            color: white;
            border: none;
            border-radius: 4px;
            padding: 0.3rem 0.6rem;
            transition: all 0.3s ease;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            gap: 0.3rem;
            white-space: nowrap;
            font-size: 0.8rem;
        }

        .btn-submit:hover {
            background: #a93226;
            transform: translateY(-1px);
            color: white;
        }

        .model-id {
            font-weight: 600;
            color: var(--primary-color);
            white-space: nowrap;
            font-size: 0.85rem;
        }

        .model-name {
            font-weight: 500;
            color: var(--secondary-color);
            white-space: nowrap;
            font-size: 0.85rem;
        }

        .table-responsive {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
            margin: 0 -1rem;
            padding: 0 1rem;
        }

        @media (max-width: 768px) {
            .container {
                padding: 1rem;
            }
            
            .card {
                padding: 1rem;
            }
            
            .section-title {
                font-size: 1.5rem;
            }

            .image-preview {
                width: 120px;
                height: 120px;
            }

            .table tbody td {
                padding: 0.3rem;
            }

            .form-control {
                padding: 0.3rem 0.4rem;
            }
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <i class="fas fa-images"></i>
                Modification des Images
            </a>
            <a href="../choix_modification_modifier.php" class="btn back-btn">
                <i class="fas fa-arrow-left"></i>
                Retour
            </a>
        </div>
    </nav>

    <div class="container">
        <h1 class="section-title">Modification des Images</h1>
        
        <div class="card">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>    
                            <th>ID Modèle</th>
                            <th>Nom Modèle</th>
                            <th>Photo 1</th>
                            <th>Photo 2</th>
                            <th>Photo 3</th>
                            <th>Photo 4</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($resultat->num_rows > 0) {
                            while ($row = $resultat->fetch_assoc()) {
                                echo "<tr>";
                                echo "<form action='../../../fonction_php_voiture/manage_informations_voiture.php' method='POST'>";
                                
                                // ID Modele
                                echo "<td class='model-id'>
                                        <input type='hidden' name='id_modele' value='" . htmlspecialchars($row["id_modele"]) . "'>" . 
                                        htmlspecialchars($row["id_modele"]) . "
                                      </td>";
                                
                                // Nom Modele
                                echo "<td class='model-name'>" . htmlspecialchars($row["nom_modele"]) . "</td>";

                                // Images avec champs de modification
                                for ($i = 1; $i <= 4; $i++) {
                                    echo "<td>
                                            <img src='" . htmlspecialchars($row["photo_" . $i]) . "' class='image-preview'><br>
                                            <input type='text' name='photo_" . $i . "' value='" . htmlspecialchars($row["photo_" . $i]) . "' class='form-control' style='font-size: 0.8rem;'>
                                          </td>";
                                }

                                // Bouton pour modifier
                                echo "<td>
                                        <button type='submit' name='update_img' class='btn btn-submit'>
                                            <i class='fas fa-save'></i> Modifier
                                        </button>
                                      </td>";
                                echo "</form>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='7' class='text-center'>Aucune voiture trouvée.</td></tr>";
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