<!DOCTYPE html>
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
            background-image: url('https://img.freepik.com/premium-photo/car-road-with-motion-blur-blue-sky-background_1151213-1084.jpg'); /* Remplacez 'votre-image.jpg' par le chemin de votre image */
            background-size: cover; /* Cette option permet à l'image de couvrir toute la page */
            background-repeat: no-repeat; /* Empêche la répétition de l'image */
            background-attachment: fixed; /* L'image reste fixe lors du défilement de la page */
            background-position: center; /* Centrer l'image dans la page */
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
                <button class="btn btn-info">
                    <a href="../../admin-voitures.php"> Retour</a>
                </button>
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
                                    Details modèle
                                    </h2>
                                    <br>
                                    <div class="row justify-content-center">
                                        <div class="col-md-2">
                                            <a href="crud/ajouter_voiture.php">
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
                                    Modifier image modèle  
                                    </h2>
                                    <br>
                                    <div class="row justify-content-center">
                                        <div class="col-md-2">
                                            <a href="crud/modifier_img_voiture.php">
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
                                        Modifier prix modèle 
                                    </h2>
                                    <br>
                                    <div class="row justify-content-center">
                                        <div class="col-md-2">
                                            <a href="crud/modifier_prix_voiture.php">
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
                                        Supprimer modèle 
                                    </h2>
                                    <br>
                                    <div class="row justify-content-center">
                                        <div class="col-md-2">
                                            <a href="crud/supprimer_voiture.php">
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

