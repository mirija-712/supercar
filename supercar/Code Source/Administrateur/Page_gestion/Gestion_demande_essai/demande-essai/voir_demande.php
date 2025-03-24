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
    <title>Demandes d'Essai - Administration Supercar</title>

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
            font-size: 0.85rem;
            white-space: nowrap;
            position: sticky;
            top: 0;
            z-index: 1;
            text-align: center;
            min-width: 80px;
        }

        .table tbody td {
            padding: 0.6rem 0.5rem;
            vertical-align: middle;
            text-align: center;
            border-bottom: 1px solid var(--border-color);
            font-size: 0.85rem;
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

        .btn-action {
            padding: 0.4rem 0.8rem;
            border-radius: 4px;
            font-weight: 500;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            border: none;
            cursor: pointer;
            font-size: 0.8rem;
        }

        .btn-confirm {
            background-color: var(--danger-color);
            color: white;
        }

        .btn-confirm:hover {
            background-color: #c0392b;
            transform: translateY(-2px);
            color: white;
        }

        .btn-terminate {
            background-color: var(--warning-color);
            color: white;
        }

        .btn-terminate:hover {
            background-color: #d35400;
            transform: translateY(-2px);
            color: white;
        }

        .btn-delete {
            background-color: var(--danger-color);
            color: white;
        }

        .btn-delete:hover {
            background-color: #c0392b;
            transform: translateY(-2px);
            color: white;
        }

        .btn-disabled {
            background-color: var(--success-color);
            color: white;
            cursor: not-allowed;
            opacity: 0.8;
        }

        .status-badge {
            padding: 0.3rem 0.8rem;
            border-radius: 15px;
            font-weight: 500;
            font-size: 0.8rem;
        }

        .status-pending {
            background-color: #f1c40f;
            color: #fff;
        }

        .status-confirmed {
            background-color: #3498db;
            color: #fff;
        }

        .status-completed {
            background-color: var(--success-color);
            color: #fff;
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

            .table thead th,
            .table tbody td {
                padding: 0.5rem;
                font-size: 0.8rem;
            }

            .btn-action {
                padding: 0.3rem 0.6rem;
                font-size: 0.75rem;
            }

            .status-badge {
                padding: 0.2rem 0.6rem;
                font-size: 0.75rem;
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
                Demandes d'Essai
            </a>
            <a href="../../../Accueil_admin/menu-admin.php" class="btn back-btn">
                <i class="fas fa-arrow-left"></i>
                Retour
            </a>
        </div>
    </nav>

    <div class="container">
        <h1 class="section-title">Liste des Demandes d'Essai</h1>
        
        <div class="card">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Date de demande</th>
                            <th>Utilisateur</th>
                            <th>Modèle</th>
                            <th>Heure d'arrivée</th>
                            <th>État</th>
                            <th>Action</th>
                            <th>Supprimer</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // mettre en ligne la connexion avec la base de données
                        include ("../../../include_bdd/connexion.bdd.php");

                        // Requête SQL pour récupérer DEMANDE ESSAI
                        $sql = "SELECT * FROM `demande_essai`";
                        $resultat = $connexion->query($sql);

                        if ($resultat->num_rows > 0) {
                            while ($row = $resultat->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row["id_demande_essai"] . "</td>";
                                echo "<td>" . date('d/m/Y', strtotime($row["date_demande"])) . "</td>";
                                echo "<td>" . $row["nom_utilisateur"] . "</td>";
                                echo "<td>" . $row["nom_modele"] . "</td>";
                                echo "<td>" . $row["heure_arriver"] . "</td>";
                                
                                // Affichage du statut avec badge
                                $statusClass = '';
                                switch(strtolower(trim($row["etat"]))) {
                                    case "en attente":
                                        $statusClass = 'status-pending';
                                        break;
                                    case "confirmé":
                                        $statusClass = 'status-confirmed';
                                        break;
                                    case "terminé":
                                        $statusClass = 'status-completed';
                                        break;
                                }
                                echo "<td><span class='status-badge " . $statusClass . "'>" . $row["etat"] . "</span></td>";

                                // Boutons d'action
                                echo "<td>";
                                if (strtolower(trim($row["etat"])) == "en attente") {
                                    echo "<form action='fonction_php/traitement-confirmer-demande.php' method='post' style='display:inline;'>
                                        <input type='hidden' name='id_demande_essai' value='" . $row["id_demande_essai"] . "'>
                                        <button type='submit' class='btn btn-action btn-confirm' name='confirmer'>
                                            <i class='fas fa-check'></i> Confirmer
                                        </button>
                                    </form>";
                                } elseif (strtolower(trim($row["etat"])) == "confirmé") {
                                    echo "<form action='fonction_php/traitement-terminer-demande.php' method='post' style='display:inline;'>
                                        <input type='hidden' name='id_demande_essai' value='" . $row["id_demande_essai"] . "'>
                                        <button type='submit' class='btn btn-action btn-terminate'>
                                            <i class='fas fa-flag-checkered'></i> Terminer
                                        </button>
                                    </form>";
                                } else {
                                    echo "<button type='button' class='btn btn-action btn-disabled' disabled>
                                        <i class='fas fa-check-circle'></i> Terminé
                                    </button>";
                                }
                                echo "</td>";

                                // Bouton supprimer
                                echo "<td>
                                    <form action='fonction_php/traitement-supprimer-demande.php' method='post' style='display:inline;'>
                                        <input type='hidden' name='id_demande_essai' value='" . $row["id_demande_essai"] . "'>
                                        <button type='submit' class='btn btn-action btn-delete' name='supprimer'>
                                            <i class='fas fa-trash'></i> Supprimer
                                        </button>
                                    </form>
                                </td>";
                                
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='8' class='text-center'>Aucune demande trouvée</td></tr>";
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
