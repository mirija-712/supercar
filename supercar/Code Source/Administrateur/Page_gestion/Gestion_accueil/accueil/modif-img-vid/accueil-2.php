<?php
session_start();
// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['identifiant'])) {
    // Rediriger vers la page de connexion s'il n'est pas connecté
    header("Location: ../../../../index.php");
    exit();
}

// mettre en ligne la connexion avec la base de données
include ("../../../../include_bdd/connexion.bdd.php");

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les valeurs soumises
    $id = $_POST["id"];
    $titre = $_POST["titre"];
    $img = $_POST["img"];
    $img2 = $_POST["img2"];
    $video = $_POST["video"];

    // Préparer et exécuter la requête de mise à jour
    $sql_update = "UPDATE `accueil` SET `video`='$video', `img2`='$img2', `img`='$img', `titre`='$titre' WHERE `id_partie`='$id'";
    if ($connexion->query($sql_update) === TRUE) {
        $success_message = "Mise à jour réussie.";
    } else {
        $error_message = "Erreur lors de la mise à jour : " . $connexion->error;
    }
}

// Requête SQL pour récupérer les données
$sql = "SELECT * FROM `accueil`";
$resultat = $connexion->query($sql);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification des Médias - Administration Supercar</title>

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

        .table-container {
            background-color: var(--card-bg);
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            padding: 2rem;
            margin-top: 2rem;
            overflow-x: auto;
        }

        .table {
            margin-bottom: 0;
        }

        .table thead th {
            background-color: var(--primary-color);
            color: white;
            border: none;
            padding: 1rem;
            font-weight: 600;
            white-space: nowrap;
        }

        .table tbody td {
            padding: 1rem;
            vertical-align: middle;
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

        .btn-edit {
            background-color: var(--accent-color);
            color: white;
            border: none;
            padding: 8px 20px;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .btn-edit:hover {
            background-color: #c0392b;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(231, 76, 60, 0.3);
        }

        .alert {
            border-radius: 10px;
            padding: 1rem;
            margin-bottom: 1rem;
        }

        .alert-success {
            background-color: #d4edda;
            border-color: #c3e6cb;
            color: #155724;
        }

        .alert-danger {
            background-color: #f8d7da;
            border-color: #f5c6cb;
            color: #721c24;
        }

        .media-preview {
            max-width: 150px;
            max-height: 100px;
            object-fit: cover;
            border-radius: 8px;
            margin-top: 0.5rem;
        }

        @media (max-width: 768px) {
            .container {
                padding: 1rem;
            }
            
            .table-container {
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
                <i class="fas fa-images me-2"></i>Modification des Médias
            </a>
            <a href="../choix-accueil.php" class="btn back-btn">
                <i class="fas fa-arrow-left me-2"></i>Retour
            </a>
        </div>
    </nav>

    <div class="container">
        <h1 class="page-title">Modifier les Images et Vidéos</h1>

        <?php if (isset($success_message)): ?>
            <div class="alert alert-success">
                <i class="fas fa-check-circle me-2"></i><?php echo $success_message; ?>
            </div>
        <?php endif; ?>

        <?php if (isset($error_message)): ?>
            <div class="alert alert-danger">
                <i class="fas fa-exclamation-circle me-2"></i><?php echo $error_message; ?>
            </div>
        <?php endif; ?>

        <div class="table-container">
            <form method="post" action="accueil-traitement-2.php">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Titre</th>
                            <th>Image 1</th>
                            <th>Image 2</th>
                            <th>Vidéo</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $index = 0;
                            while ($row = $resultat->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td class='text-center'>" . $row["id_partie"] . "</td>";
                                echo "<td><input class='form-control' type='text' name='titre[$index]' value='" . htmlspecialchars($row["titre"]) . "'></td>";
                                echo "<td><textarea class='form-control' name='img[$index]' rows='2'>" . htmlspecialchars($row["img"]) . "</textarea>";
                                if (!empty($row["img"])) {
                                    echo "<img src='" . htmlspecialchars($row["img"]) . "' class='media-preview' alt='Aperçu Image 1'>";
                                }
                                echo "</td>";
                                echo "<td><textarea class='form-control' name='img2[$index]' rows='2'>" . htmlspecialchars($row["img2"]) . "</textarea>";
                                if (!empty($row["img2"])) {
                                    echo "<img src='" . htmlspecialchars($row["img2"]) . "' class='media-preview' alt='Aperçu Image 2'>";
                                }
                                echo "</td>";
                                echo "<td><textarea class='form-control' name='video[$index]' rows='2'>" . htmlspecialchars($row["video"]) . "</textarea>";
                                if (!empty($row["video"])) {
                                    echo "<div class='media-preview'><i class='fas fa-video'></i> Vidéo</div>";
                                }
                                echo "</td>";
                                echo "<td class='text-center'><input type='hidden' name='id[$index]' value='" . $row["id_partie"] . "'><button type='submit' class='btn btn-edit'><i class='fas fa-save me-2'></i>Modifier</button></td>";
                                echo "</tr>";
                                $index++;
                            }
                        ?>
                    </tbody>
                </table>
            </form>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
