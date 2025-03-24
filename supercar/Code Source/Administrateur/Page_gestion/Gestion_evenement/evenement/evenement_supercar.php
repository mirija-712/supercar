<?php
session_start();
// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['identifiant'])) {
    // Rediriger vers la page de connexion s'il n'est pas connecté
    header("Location: ../../../index.php");
    exit();
}
?><!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Événements - Administration Supercar</title>

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
            --success-color: #27ae60;
            --warning-color: #f39c12;
            --danger-color: #e74c3c;
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
            font-size: 1.8rem;
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

        .form-group {
            margin-bottom: 0.5rem;
        }

        .form-label {
            font-size: 0.85rem;
            margin-bottom: 0.3rem;
        }

        .form-control {
            padding: 0.4rem 0.6rem;
            font-size: 0.85rem;
        }

        textarea.form-control {
            min-height: 60px;
        }

        .g-3 {
            gap: 0.5rem;
        }

        .btn-action {
            padding: 0.6rem 1.2rem;
            border-radius: 6px;
            font-weight: 500;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            border: none;
            cursor: pointer;
        }

        .btn-success {
            background-color: var(--success-color);
            color: white;
        }

        .btn-warning {
            background-color: var(--warning-color);
            color: white;
        }

        .btn-danger {
            background-color: var(--danger-color);
            color: white;
        }

        .btn-action:hover {
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
            padding: 0.5rem 0.3rem;
            font-weight: 600;
            font-size: 0.75rem;
            white-space: nowrap;
            position: sticky;
            top: 0;
            z-index: 1;
            text-align: center;
            min-width: 50px;
        }

        .table tbody td {
            padding: 0.3rem;
            vertical-align: middle;
            text-align: center;
            border-bottom: 1px solid var(--border-color);
            font-size: 0.75rem;
        }

        .table tbody tr:hover {
            background-color: rgba(44, 62, 80, 0.02);
        }

        .table-responsive {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
            margin: 0 -0.5rem;
            padding: 0 0.5rem;
            background-color: white;
            border-radius: 6px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            max-height: 600px;
            overflow-y: auto;
        }

        .event-image {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 4px;
            transition: transform 0.3s ease;
            margin-bottom: 0.2rem;
        }

        .event-image:hover {
            transform: scale(1.05);
        }

        .table-actions {
            display: flex;
            gap: 0.3rem;
            justify-content: center;
            align-items: center;
        }

        .btn-table {
            padding: 0.2rem 0.4rem;
            border-radius: 3px;
            font-size: 0.7rem;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.2rem;
            border: none;
            cursor: pointer;
        }

        .btn-edit {
            background-color: var(--warning-color);
            color: white;
        }

        .btn-delete {
            background-color: var(--danger-color);
            color: white;
        }

        .btn-table:hover {
            transform: translateY(-2px);
            color: white;
        }

        .modal-content {
            border-radius: 10px;
            border: none;
        }

        .modal-header {
            background-color: var(--primary-color);
            color: white;
            border-radius: 10px 10px 0 0;
            padding: 1rem;
        }

        .modal-title {
            font-weight: 600;
            font-size: 1.2rem;
        }

        .modal-body {
            padding: 1.5rem;
        }

        .modal-footer {
            border-top: 1px solid var(--border-color);
            padding: 1rem;
        }

        .image-preview {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 0.5rem;
        }

        .image-preview input[type="file"] {
            width: 100%;
            font-size: 0.7rem;
            padding: 0.2rem;
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
                padding: 0.3rem 0.4rem;
            }

            .btn-action {
                padding: 0.5rem 1rem;
                font-size: 0.85rem;
            }

            .event-image {
                width: 60px;
                height: 60px;
            }
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <i class="fas fa-calendar-alt"></i>
                Gestion des Événements
            </a>
            <a href="../../../Accueil_admin/menu-admin.php" class="btn back-btn">
                <i class="fas fa-arrow-left"></i>
                Retour
            </a>
        </div>
    </nav>

    <div class="container">
        <!-- Formulaire d'ajout -->
        <div class="card mb-4">
            <h2 class="section-title">Ajouter un Événement</h2>
            <form action="fonction_php/manage_evenements.php" method="post" enctype="multipart/form-data">
                <div class="row g-3">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="form-label">Titre</label>
                            <input type="text" class="form-control" name="titre" required>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label class="form-label">Date</label>
                            <input type="date" class="form-control" name="date_evenement" required>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label class="form-label">Heure</label>
                            <input type="time" class="form-control" name="heure" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="form-label">Lieu</label>
                            <input type="text" class="form-control" name="lieu" required>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label class="form-label">Type</label>
                            <input type="text" class="form-control" name="type_voiture" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="form-label">Photo</label>
                            <input type="file" class="form-control" name="photo" required>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label class="form-label">Description</label>
                            <textarea class="form-control" name="description" required rows="2"></textarea>
                        </div>
                    </div>
                    <div class="col-12 text-center">
                        <button type="submit" class="btn btn-action btn-success" name="insert">
                            <i class="fas fa-plus"></i> Ajouter
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Tableau des événements -->
        <div class="card">
            <h2 class="section-title">Liste des Événements</h2>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Titre</th>
                            <th>Date</th>
                            <th>Heure</th>
                            <th>Lieu</th>
                            <th>Type</th>
                            <th>Description</th>
                            <th>Photo</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // mettre en ligne la connexion avec la base de données
                        include ("../../../include_bdd/connexion.bdd.php");

                        $sql = "SELECT * FROM evenements";
                        $resultat = $connexion->query($sql);

                        if ($resultat->num_rows > 0) {
                            while ($row = $resultat->fetch_assoc()) {
                                echo "<tr>";
                                echo "<form action='fonction_php/manage_evenements.php' method='post' enctype='multipart/form-data'>";
                                echo "<td>" . $row["id_evenement"] . "</td>";
                                echo "<td><input type='text' class='form-control' name='titre' value='" . htmlspecialchars($row["titre"]) . "' required></td>";
                                echo "<td><input type='date' class='form-control' name='date_evenement' value='" . $row["date_evenement"] . "' required></td>";
                                echo "<td><input type='time' class='form-control' name='heure' value='" . $row["heure"] . "' required></td>";
                                echo "<td><input type='text' class='form-control' name='lieu' value='" . htmlspecialchars($row["lieu"]) . "' required></td>";
                                echo "<td><input type='text' class='form-control' name='type_voiture' value='" . htmlspecialchars($row["type_voiture"]) . "' required></td>";
                                echo "<td><textarea class='form-control' name='description' required rows='2'>" . htmlspecialchars($row["description"]) . "</textarea></td>";
                                echo "<td>
                                    <div class='image-preview'>
                                        <img src='" . $row["photo"] . "' alt='Photo de l'événement' class='event-image'>
                                        <input type='file' class='form-control mt-2' name='photo' accept='image/*'>
                                    </div>
                                </td>";
                                echo "<td>
                                    <div class='table-actions'>
                                        <input type='hidden' name='id_evenement' value='" . $row["id_evenement"] . "'>
                                        <button type='submit' name='update' class='btn-table btn-edit'>
                                            <i class='fas fa-save'></i>
                                        </button>
                                        <button type='submit' name='delete' class='btn-table btn-delete' onclick='return confirm(\"Êtes-vous sûr de vouloir supprimer cet événement ?\")'>
                                            <i class='fas fa-trash'></i>
                                        </button>
                                    </div>
                                </td>";
                                echo "</form>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='9' class='text-center'>Aucun événement trouvé</td></tr>";
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