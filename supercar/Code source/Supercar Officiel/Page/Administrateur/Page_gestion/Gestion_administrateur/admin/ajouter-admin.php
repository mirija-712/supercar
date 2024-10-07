<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter-Admin</title>

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
            <h1>AJOUTER UN ADMINISTRATEUR</h1>
        </div>
    </div>
    <br>
    
    <div class="container">

        <div class="row">
            <div class="col-md-12 text-center">
                <div class="form-container thin-form">
                    <center>
                        <img src="../img/account-pin-box-line.png" alt="Image au dessus" width="100">
                    </center>

                    <form id="form-admin" method="POST" action="ajouter-admin-base.php">
                        <center>
                        <br>
                        <div class="mb-3">
                            <label for="identifiant" class="form-label">Identifiant</label>
                            <input type="text" class="form-control" id="identifiant" name="identifiant">
                        </div>
                        <br>
                        <div class="mb-3">
                            <label for="mot_de_passe" class="form-label">Mot de passe</label>
                            <input type="password" class="form-control" id="motdepasse" name="motdepasse">
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Ajouter cet admin</button>
                        </center>
                        
                    </form>

                </div>
            </div>
        </div>
    </div>
</body>
</html>