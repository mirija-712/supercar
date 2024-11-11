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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter-Admin</title>
    
    <style>
    body{
        background-color: rgb(214, 210, 204);
    }
    .container{
        background-color: beige;
        border-radius: 10px;
    }
    </style>
</head>

<body>
    <br><br><h1 align="center"> Ajout Administrateur</h1><br>
    <div class="row justify-content-center">
        <div class="col-md-4">
            <p align="right">
                <a href="../../../Accueil_admin/menu-admin.php" class="btn btn-info"> Retour</a>
            </p>    
            <form action="fonction_php/ajouter-admin-base.php" method="post">
                <div class="container">
                    <br><br><label for="identifiant">Identifiant : </label>
                    <input type="text" class="form-control" name="identifiant" required>
                    <label for="identifiant">Mot de passe : </label>
                    <input type="password" class="form-control" name="mot_de_passe" required><br><br>
                    <div class="row">
                        <div class="col-md-6">
                            <p align="center"><input type="submit" class="btn btn-success"></p>
                        </div>
                        <div class="col-md-6">
                            <p align="center"><input type="reset" class="btn btn-danger"></p>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>