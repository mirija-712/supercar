<?php
session_start();
// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['identifiant'])) {
    // Rediriger vers la page de connexion s'il n'est pas connecté
    header("Location: ../../../index.php");
    exit();
}
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu-Admin</title>

    <!-- FICHIER CSS DE BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f5f5dc; /* beige clair */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .card {
            background-color: #fff; /* Couleur de fond blanc */
            border-radius: 10px; /* Coins arrondis */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Ombre */
            padding: 20px; /* Espacement intérieur de la carte */
            width: 80%; /* Largeur de la carte */
            max-width: 400px; /* Largeur maximale de la carte */
            margin: auto; /* Centre la carte */
        }

        .btn {
            border-radius: 5px; /* Coins arrondis des boutons */
        }
    </style>
</head>

<body>
    <div class="card">
        <h2 align = center class="card-title">QUE VOULEZ-VOUS MANIPULER ?</h2>
        <br>
        <form action="choix-traitement.php" method="post">

            <div class="form-check">
                <input class="form-check-input" type="radio" name="choix" id="choix1" value="modifierTitresTextes" checked>
                <label class="form-check-label" for="choix1">
                    TITRES ET TEXTES 
                </label>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="radio" name="choix" id="choix2" value="modifierImagesVideos">
                <label class="form-check-label" for="choix2">
                    IMAGES ET VIDEOS
                </label>
            </div>
            <br>
            <div class="row justify-content-center" >
                <div class="col-md-6">
                    <input type="submit" value="Modifier" class="btn btn-success">
                </div>
                <div class="col-md-6">
                    <p align="right">
                        <a href="../../../Accueil_admin/menu-admin.php" class="btn btn-info"> Retour</a>
                    </p>
                </div>
            </div>
        </form>
    </div>


    <!-- FICHIER JS DE BOOTSTRAP (dans body : éviter de ralentir la page > pas indispensable) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
