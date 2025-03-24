<?php
session_start();
if (!isset($_SESSION['identifiant'])) {
    header("Location: ../../../index.php");
    exit();
}

include ("../../../include_bdd/connexion.bdd.php");

if (!isset($_GET['id'])) {
    header("Location: ajouter-admin.php");
    exit();
}

$id = $_GET['id'];
$sql = "SELECT * FROM `admin` WHERE `ID_admin` = $id";
$resultat = $connexion->query($sql);

if ($resultat->num_rows == 0) {
    header("Location: ajouter-admin.php");
    exit();
}

$admin = $resultat->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un Administrateur - Administration Supercar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
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
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <i class="fas fa-user-edit me-2"></i>Modifier un Administrateur
            </a>
            <a href="ajouter-admin.php" class="btn back-btn">
                <i class="fas fa-arrow-left me-2"></i>Retour
            </a>
        </div>
    </nav>

    <div class="container">
        <h1 class="page-title">Modifier l'Administrateur</h1>

        <div class="form-container">
            <form action="fonction_php/modifier-admin-base.php" method="post">
                <input type="hidden" name="id" value="<?php echo $admin['ID_admin']; ?>">
                <div class="mb-3">
                    <label for="identifiant" class="form-label">Identifiant</label>
                    <input type="text" class="form-control" id="identifiant" name="identifiant" value="<?php echo $admin['identifiant']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="mot_de_passe" class="form-label">Nouveau mot de passe (laissez vide pour ne pas le modifier)</label>
                    <input type="password" class="form-control" id="mot_de_passe" name="mot_de_passe">
                </div>
                <div class="d-flex justify-content-center gap-3">
                    <button type="submit" class="btn btn-submit">
                        <i class="fas fa-save me-2"></i>Enregistrer les modifications
                    </button>
                    <button type="reset" class="btn btn-reset">
                        <i class="fas fa-undo me-2"></i>Réinitialiser
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 