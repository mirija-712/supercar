<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>

    <!-- FICHIER CSS DE BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        body {
            background-color: #f5f5dc; /* beige clair */
        }

        .container {
            margin-top: 50px;
        }

        .title {
            text-align: center;
            margin-bottom: 20px;
        }

        .subtitle {
            text-align: right;
        }

        .form-container {
            background-color: #fff; 
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* CREER UNE OMBRE ASSEZ CLAIRE */
        }

        .form-container h1 {
            font-size: 1.5rem;
            margin-bottom: 20px;
        }

        .form-container label {
            font-weight: bold; /* Texte en gras */
        }

        .form-control {
            border-radius: 3px; /* COIN ARRONDIE DANS LES CHAMPS DE TEXTES */
            border: 1px solid #ccc; /* Bordure grise */
        }

        .btn-primary {
            background-color: #007bff; /* Couleur bleue pour le bouton */
            border: 1px solid #007bff; /* Bordure bleue */
        }

        .btn-primary:hover {
            background-color: #0056b3; /* UN PEU PLUS FONCE QUAND POINTEUR SOURIS PASSE */
            border: 1px solid #0056b3;
        }

        .form-container img {
            max-width: 100%;
            height: auto;
        }

        .thin-form {
            max-width: 300px; /* Largeur personnalisée du formulaire */
            margin: auto; /* Centre le formulaire horizontalement */
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="title">
            <h1>ADMINISTRATION SUPERCAR</h1>
        </div>
    </div>
    <br>

    <!-- Partie 2: LOGO à gauche et formulaire à droite -->
    
    <div class="container">

        <div class="row">
            <div class="col-md-6">
                <img src="https://cours-informatique-gratuit.fr/wp-content/uploads/2014/05/administrateur.png" alt="Image à gauche">
            </div>

            <!-- POUR LE FORM -->
            <div class="col-md-6">
                <div class="form-container thin-form">
                    <center>
                        <img src="https://cdn.dribbble.com/users/1889528/screenshots/7239609/media/9618c7e174ae3ddf8aed3322cb86008e.jpg" alt="Image au dessus" width="100">
                    </center>

                    <form id="form-admin" method="POST" action="Fonction_php/connect-admin.php">
                        <div class="mb-3">
                            <label for="identifiant" class="form-label">Identifiant</label>
                            <input type="text" class="form-control" id="identifiant" name="identifiant">
                        </div>
                        <div class="mb-3">
                            <label for="mot_de_passe" class="form-label">Mot de passe</label>
                            <input type="password" class="form-control" id="mot_de_passe" name="mot_de_passe">
                        </div>
                        <button type="submit" class="btn btn-primary">Se connecter</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <!-- FICHIER JS DE BOOTSTRAP (dans body : éviter de ralentir la page > pas indispensable) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
