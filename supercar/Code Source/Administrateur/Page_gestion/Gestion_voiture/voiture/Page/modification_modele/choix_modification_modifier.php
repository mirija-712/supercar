<?php
session_start();
// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['identifiant'])) {
    // Rediriger vers la page de connexion s'il n'est pas connecté
    header("Location: ../../../../../index.php");
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
            background-image: url('../../image/pdp.jpg');
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
            background-color: #fff;
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
            background-color: #0056b3;
        }

    </style>

    <title>Modification modele voiture</title>
    
</head>
<body>

    <br><br><br>
    
    <div class="row justify-content-center">
        <div class="col-md-4"></div>
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <p align="center">
                <a href="../../admin-voitures.php"  class="btn btn-info"> Retour</a>
            </p>
        </div>
    </div>

    <div class="row justify-content-center">
         
        <div class="col-md-6">
            <div class="card" style="width : 40rem" id="card-modification">
                    <div class="col-md-12">
                        <section class="sct-voiture">
                            <div class="row justify-content-center">
                                <div class="col-md-12">
                                    <br>
                                    <h2 align="center">
                                        Modification Modele
                                    </h2>
                                    <br>
                                    <div class="row justify-content-center">
                                        <div class="col-md-2">
                                            <a href="page/modidier_modele_voiture.php">
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
                                        Modification Déscription Voiture  
                                    </h2>
                                    <br>
                                    <div class="row justify-content-center">
                                        <div class="col-md-2">
                                            <a href="page/modifier_desc_voiture.php">
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
                                        Modification Prix Voiture
                                    </h2>
                                    <br>
                                    <div class="row justify-content-center">
                                        <div class="col-md-2">
                                            <a href="page/modifier_prix_voiture.php">
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
        <div class="col-md-6">
            <div class="card" style="width : 40rem" id="card-modification">
                    <div class="col-md-12">
                        <section class="sct-voiture">
                            <div class="row justify-content-center" >
                                <div class="col-md-12">
                                    <br>
                                    <h2 align="center">
                                        Modification Image
                                    </h2>
                                    <br>
                                    <div class="row justify-content-center">
                                        <div class="col-md-2">
                                            <a href="page/modifier_img_voiture.php">
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

