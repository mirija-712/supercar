<?php
session_start();
// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['identifiant'])) {
    // Rediriger vers la page de connexion s'il n'est pas connecté
    header("Location: ../../../../../../index.php");
    exit();
}

// Connexion à la base de données
include ("../../../../../../include_bdd/connexion.bdd.php");

// Requête pour récupérer les voitures
$sql = "SELECT * FROM voitures";
$resultat = $connexion->query($sql);

// Requête pour récupérer les modèles
$sql_modele = "SELECT id_modele, nom_modele FROM modele";
$resultat_modele = $connexion->query($sql_modele);

// Vérifier si les requêtes ont réussi
if (!$resultat || !$resultat_modele) {
    die("Erreur dans les requêtes SQL : " . $connexion->error);
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout Description - Administration Supercar</title>

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

        .form-label {
            font-weight: 500;
            color: var(--secondary-color);
            margin-bottom: 0.5rem;
        }

        .form-control {
            border: 1px solid var(--border-color);
            border-radius: 6px;
            padding: 0.6rem 1rem;
            transition: all 0.3s ease;
            font-size: 0.9rem;
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
            padding: 0.8rem 2rem;
            transition: all 0.3s ease;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-submit:hover {
            background: #a93226;
            transform: translateY(-2px);
            color: white;
        }

        .table {
            margin-bottom: 0;
            width: 100%;
            background-color: white;
            border-collapse: separate;
            border-spacing: 0;
            font-size: 0.85rem;
        }

        .table thead th {
            background-color: var(--primary-color);
            color: white;
            border: none;
            padding: 0.8rem 0.5rem;
            font-weight: 600;
            font-size: 0.8rem;
            white-space: nowrap;
            position: sticky;
            top: 0;
            z-index: 1;
            text-align: center;
            min-width: 80px;
        }

        .table tbody td {
            padding: 0.5rem;
            vertical-align: middle;
            text-align: center;
            font-size: 0.8rem;
            border-bottom: 1px solid var(--border-color);
            min-width: 80px;
        }

        .table tbody tr:hover {
            background-color: rgba(44, 62, 80, 0.05);
        }

        .table-responsive {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
            margin: 0 -1rem;
            padding: 0 1rem;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            max-height: 600px;
            overflow-y: auto;
        }

        .image-preview {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .image-preview:hover {
            transform: scale(1.1);
        }

        .description-cell {
            max-width: 200px;
            white-space: normal;
            text-align: left;
            padding: 0.5rem;
            font-size: 0.75rem;
        }

        .price-cell {
            font-weight: 600;
            color: var(--accent-color);
            white-space: nowrap;
        }

        .model-cell {
            font-weight: 600;
            color: var(--primary-color);
            white-space: nowrap;
        }

        .compact-cell {
            white-space: nowrap;
            font-size: 0.75rem;
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

            .form-control {
                padding: 0.5rem 0.8rem;
            }

            .image-preview {
                width: 60px;
                height: 60px;
            }

            .table thead th,
            .table tbody td {
                padding: 0.5rem;
                font-size: 0.75rem;
            }

            .description-cell {
                max-width: 150px;
            }
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <i class="fas fa-car"></i>
                Ajout Description
            </a>
            <a href="../choix_modification_ajouter.php" class="btn back-btn">
                <i class="fas fa-arrow-left"></i>
                Retour
            </a>
        </div>
    </nav>

    <div class="container">
        <h1 class="section-title">Ajouter une Voiture</h1>
        
        <div class="card">
            <form action="../../../fonction_php_voiture/manage_informations_voiture.php" method="post">
                <div class="row">
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="nom_modele" class="form-label">Nom modèle :</label>
                            <select name="nom_modele" id="nom_modele" required class="form-control" onchange="this.options[this.selectedIndex].getAttribute('data-id')">
                                <?php
                                if ($resultat_modele->num_rows > 0) {
                                    while ($row_modele = $resultat_modele->fetch_assoc()) {
                                        echo "<option value='" . htmlspecialchars($row_modele['nom_modele']) . "' data-id='" . $row_modele['id_modele'] . "'>" . htmlspecialchars($row_modele['nom_modele']) . "</option>";
                                    }
                                } else {
                                    echo "<option>Aucune marque trouvée</option>";
                                }
                                ?>
                            </select>
                            <input type="hidden" name="id_modele" id="id_modele">
                        </div>

                        <div class="mb-3">
                            <label for="marque" class="form-label">Marque :</label>
                            <select name="marque" id="marque" required class="form-control">
                                <option value="">Choisir marque</option>
                                <option value="BMW">BMW</option>
                                <option value="MERCEDES">MERCEDES</option>
                                <option value="AUDI">AUDI</option>
                                <option value="PORSCHE">PORSCHE</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="annee" class="form-label">Année :</label>
                            <select name="annee" id="annee" required class="form-control">
                                <option value="">Choisir année</option>
                                <?php for($i = 2024; $i >= 2019; $i--) { ?>
                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="transmission" class="form-label">Transmission :</label>
                            <select name="transmission" id="transmission" required class="form-control">
                                <option value="">Choisir transmission</option>
                                <option value="Automatique">Automatique</option>
                                <option value="Manuel">Manuel</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="sieges" class="form-label">Sièges :</label>
                            <input type="number" name="sieges" required class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="prix" class="form-label">Prix :</label>
                            <input type="number" name="prix" required class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="vitesse_max" class="form-label">Vitesse max :</label>
                            <input type="number" name="vitesse_max" required class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="moteur" class="form-label">Moteur :</label>
                            <input type="text" name="moteur" required class="form-control">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="consommation" class="form-label">Consommation :</label>
                            <input type="text" name="consommation" required class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="puissance" class="form-label">Puissance :</label>
                            <input type="number" name="puissance" required class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description :</label>
                            <textarea id="description" name="description" rows="6" required class="form-control"></textarea>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="photo_1" class="form-label">Image 1 :</label>
                            <input type="url" name="photo_1" required class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="photo_2" class="form-label">Image 2 :</label>
                            <input type="url" name="photo_2" required class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="photo_3" class="form-label">Image 3 :</label>
                            <input type="url" name="photo_3" required class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="photo_4" class="form-label">Image 4 :</label>
                            <input type="url" name="photo_4" required class="form-control">
                        </div>

                        <div class="text-center">
                            <button type="submit" name="insert" class="btn btn-submit">
                                <i class="fas fa-plus"></i> Ajouter
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <h2 class="section-title">Liste des Voitures</h2>
        
        <div class="card">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>    
                            <th>ID modele</th>
                            <th>Nom modele</th>
                            <th>Marque</th>
                            <th>Année</th>
                            <th>Transmission</th>
                            <th>Sieges</th>
                            <th>Prix</th>
                            <th>Vitesse Max</th>
                            <th>Moteur</th>
                            <th>Consommation</th>
                            <th>Puissance</th>
                            <th>Description</th>
                            <th>Photo_1</th>
                            <th>Photo_2</th>
                            <th>Photo_3</th>
                            <th>Photo_4</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($resultat->num_rows > 0) {
                            while ($row = $resultat->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td class='compact-cell'>" . $row["id_modele"] . "</td>";
                                echo "<td class='model-cell'>" . $row["nom_modele"] . "</td>";
                                echo "<td class='compact-cell'>" . $row["marque"] . "</td>";
                                echo "<td class='compact-cell'>" . $row["annee"] . "</td>";
                                echo "<td class='compact-cell'>" . $row["transmission"] . "</td>";
                                echo "<td class='compact-cell'>" . $row["sieges"] . "</td>";
                                echo "<td class='price-cell'>" . number_format($row["prix"], 0, ',', ' ') . "€</td>";
                                echo "<td class='compact-cell'>" . $row["vitesse_max"] . "km/h</td>";
                                echo "<td class='compact-cell'>" . $row["moteur"] . "</td>";
                                echo "<td class='compact-cell'>" . $row["consommation"] . "L</td>";
                                echo "<td class='compact-cell'>" . $row["puissance"] . "ch</td>";
                                echo "<td class='description-cell'>" . substr($row["description"], 0, 50) . "...</td>";
                                echo "<td><img src='" . $row["photo_1"] . "' class='image-preview' alt='Photo 1'></td>";
                                echo "<td><img src='" . $row["photo_2"] . "' class='image-preview' alt='Photo 2'></td>";
                                echo "<td><img src='" . $row["photo_3"] . "' class='image-preview' alt='Photo 3'></td>";
                                echo "<td><img src='" . $row["photo_4"] . "' class='image-preview' alt='Photo 4'></td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='16' class='text-center'>Aucune voiture trouvée.</td></tr>";
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