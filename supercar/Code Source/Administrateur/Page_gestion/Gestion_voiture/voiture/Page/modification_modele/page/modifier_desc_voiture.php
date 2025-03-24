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
    <title>Modification des Descriptions - Administration Supercar</title>

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
            font-size: 0.8rem;
            text-align: center;
        }

        .table tbody tr:hover {
            background-color: rgba(44, 62, 80, 0.02);
        }

        .form-control {
            border: 1px solid var(--border-color);
            border-radius: 4px;
            padding: 0.3rem 0.5rem;
            transition: all 0.3s ease;
            font-size: 0.8rem;
            width: 100%;
            text-align: center;
            background-color: #f8f9fa;
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(44, 62, 80, 0.1);
            background-color: white;
        }

        textarea.form-control {
            min-height: 50px;
            resize: vertical;
            text-align: left;
        }

        .btn-submit {
            padding: 0.3rem 0.6rem;
            font-size: 0.8rem;
            white-space: nowrap;
        }

        .model-name {
            font-weight: 600;
            color: var(--primary-color);
            white-space: nowrap;
            font-size: 0.85rem;
            text-align: left;
            padding-left: 1rem;
        }

        .table-responsive {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
            margin: 0 -1rem;
            padding: 0 1rem;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }

        .table tbody tr:hover {
            background-color: rgba(44, 62, 80, 0.02);
        }

        .table tbody tr:hover .form-control {
            background-color: white;
        }

        .input-group {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            justify-content: center;
        }

        .input-group input {
            flex: 1;
            text-align: center;
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

            .table-responsive {
                margin: 0 -0.5rem;
                padding: 0 0.5rem;
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
                <i class="fas fa-edit"></i>
                Modification des Descriptions
            </a>
            <a href="../choix_modification_modifier.php" class="btn back-btn">
                <i class="fas fa-arrow-left"></i>
                Retour
            </a>
        </div>
    </nav>

    <div class="container">
        <h1 class="section-title">Tableau de Modification des Descriptions</h1>
        
        <div class="card">
            <div class="table-responsive">
                <table class="table" id="tableau">
                    <thead>
                        <tr>    
                            <th>Nom modèle</th>
                            <th>Marque</th>
                            <th>Année</th>
                            <th>Transmission</th>
                            <th>Sièges</th>
                            <th>Vitesse Max</th>
                            <th>Moteur</th>
                            <th>Consommation</th>
                            <th>Puissance</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($resultat->num_rows > 0) {
                            while ($row = $resultat->fetch_assoc()) {
                                echo "<tr>";
                                echo "<form action='../../../fonction_php_voiture/manage_informations_voiture.php' method='post'>";
                                echo "<td class='model-name'>" . htmlspecialchars($row["nom_modele"]) . "</td>";
                                echo "<td><input type='text' name='marque' value='" . htmlspecialchars($row["marque"]) . "' required class='form-control'></td>";
                                echo "<td><input type='number' name='annee' value='" . htmlspecialchars($row["annee"]) . "' required class='form-control'></td>";
                                echo "<td><input type='text' name='transmission' value='" . htmlspecialchars($row["transmission"]) . "' required class='form-control'></td>";
                                echo "<td><input type='number' name='sieges' value='" . htmlspecialchars($row["sieges"]) . "' required class='form-control'></td>";
                                echo "<td><input type='number' name='vitesse_max' value='" . htmlspecialchars($row["vitesse_max"]) . "' required class='form-control'></td>";
                                echo "<td><input type='text' name='moteur' value='" . htmlspecialchars($row["moteur"]) . "' required class='form-control'></td>";
                                echo "<td><input type='text' name='consommation' value='" . htmlspecialchars($row["consommation"]) . "' required class='form-control'></td>";
                                echo "<td><input type='number' name='puissance' value='" . htmlspecialchars($row["puissance"]) . "' required class='form-control'></td>";
                                echo "<td><textarea name='description' required class='form-control' rows='2'>" . htmlspecialchars($row["description"]) . "</textarea></td>";
                                echo "<td>";
                                echo "<input type='hidden' name='id_voiture' value='" . $row['id_voiture'] . "'>";
                                echo "<button type='submit' name='update_desc' class='btn btn-submit'>";
                                echo "<i class='fas fa-save'></i> Modifier";
                                echo "</button>";
                                echo "</td>";
                                echo "</form>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='11' class='text-center'>Aucune voiture trouvée.</td></tr>";
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