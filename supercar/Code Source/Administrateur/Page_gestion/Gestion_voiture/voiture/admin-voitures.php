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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link href="css/bootstrap.css" rel="stylesheet"/>
    <link href="css/style.css" type="text/css" rel="stylesheet"/>

    <style>
        body {
            background-image: url('../voiture/image/pdp.jpg');
            background-size: cover; 
            background-repeat: no-repeat; 
            background-attachment: fixed; 
            background-position: center;
        }

        /* Style pour la carte */
        .card {
        border: 1px solid #ccc;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        padding: 20px;
        margin: 20px auto;
        background-color: rgba(255, 255, 255, 0.8); /* Légère transparence pour l'effet de flou */
        backdrop-filter: blur(20px); /* Ajoute un effet de flou à l'arrière-plan */
    }


        /* Style pour le titre */
        .card h2 {
            color: #333;
            font-size: 24px;
            text-align: center;
        }

        /* Style pour le bouton */
        .card input[type="button"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
        }

        .card input[type="button"]:hover {
            background-color: green;
        }

    </style>

    <title>Voitures</title>
    
</head>
<body>

    <br><br><br>

    <div class="row justify-content-center">
        <p align="right">
            <a href="../../../Accueil_admin/menu-admin.php" class="btn btn-info"> Retour</a>
        </p>
        <div class="col-md-6">
            <div class="card" style="width : 40rem" id="card-modification">
                    <div class="col-md-12">
                        <section class="sct-voiture">
                            <div class="row justify-content-center">
                                <div class="col-md-12">
                                    <br>
                                    <h2 align="center">
                                    Création modèle
                                    </h2>
                                    <br>
                                    <div class="row justify-content-center">
                                        <div class="col-md-2">
                                            <a href="Page/ajout_modele/choix_modification_ajouter.php">
                                                <input type="button" value="Afficher">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card" style="width : 40rem" id="card-modification">
                    <div class="col-md-12">
                        <section class="sct-voiture">
                            <div class="row justify-content-center">
                                <div class="col-md-12">
                                    <br>
                                    <h2 align="center">
                                    Modification modèle  
                                    </h2>
                                    <br>
                                    <div class="row justify-content-center">
                                        <div class="col-md-2">
                                            <a href="Page/modification_modele/choix_modification_modifier.php">
                                                <input type="button" value="Modifier">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="card" style="width : 40rem" id="card-modification">
                    <div class="col-md-12">
                        <section class="sct-voiture">
                            <div class="row justify-content-center" >
                                <div class="col-md-12">
                                    <br>
                                    <h2 align="center">
                                    Suppréssion modèle
                                    </h2>
                                    <br>
                                    <div class="row justify-content-center">
                                        <div class="col-md-2">
                                            <a href="Page/suppression_modele/page/supprimer_modele_voiture.php">
                                                <input type="button" value="Modifier" >
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
            </div>
        </div>
    </div>
    
</body>
</html>

